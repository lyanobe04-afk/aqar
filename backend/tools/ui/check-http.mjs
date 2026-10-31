import fs from 'node:fs';
import path from 'node:path';
import crypto from 'node:crypto';
import {load} from 'cheerio';
const base=path.resolve(import.meta.dirname,'../..');
const root=path.dirname(base);
const origin='http://127.0.0.1:8000';
const inventory=JSON.parse(fs.readFileSync(path.join(import.meta.dirname,'inventory.json'),'utf8'));
const responses=new Map();let links=0,assets=0;const failures=[];
async function request(url){if(!responses.has(url)){const res=await fetch(url);responses.set(url,{status:res.status,text:await res.text()});}return responses.get(url);}
for(const screen of inventory){
 const url=origin+screen.url;
 const response=await request(url);
 if(response.status!==200){failures.push(`${screen.key}: ${response.status}`);continue;}
 const $=load(response.text);
 for(const el of $('a[href]').toArray()){
  const href=$(el).attr('href');const dest=new URL(href,url);links++;
  if(dest.origin!==origin){failures.push(`${screen.key}: external link ${href}`);continue;}
  if((await request(dest.origin+dest.pathname)).status!==200)failures.push(`${screen.key}: broken link ${href}`);
  if(dest.hash && !$(dest.hash).length && dest.pathname===new URL(url).pathname)failures.push(`${screen.key}: missing fragment ${href}`);
 }
 const urls=new Set($('[src],link[href]').toArray().map(el=>$(el).attr('src')||$(el).attr('href')));
 $('[style]').each((_,el)=>{for(const match of $(el).attr('style').matchAll(/url\(['"]?([^)'" ]+)/g))urls.add(match[1]);});
 for(const href of urls){if(href.startsWith('data:'))continue;const dest=new URL(href,url);assets++;if(dest.origin!==origin||!fs.existsSync(path.join(base,'public',decodeURIComponent(dest.pathname))))failures.push(`${screen.key}: missing/nonlocal asset ${href}`);}
 if($('aside.manager-sidebar').length!==1||$('header.manager-header').length!==1||$('main').length!==1)failures.push(`${screen.key}: duplicate shell`);
 if($('a[href="#"]').length||$('[onclick]').length||$('script[src*="tailwind"]').length)failures.push(`${screen.key}: placeholder or runtime code`);
 if(screen.key.startsWith('add-property-')&&$('.property-step-navigation a').length!==6)failures.push(`${screen.key}: incorrect step navigation`);
}
const css=fs.readFileSync(path.join(base,'public/assets/aqar/fonts.css'),'utf8');
for(const match of css.matchAll(/url\(([^)]+)\)/g))if(!fs.existsSync(path.join(base,'public/assets/aqar',match[1])))failures.push(`Missing font ${match[1]}`);
const hashes=JSON.parse(fs.readFileSync(path.join(import.meta.dirname,'protected-hashes.json'),'utf8'));
let protectedFiles=0;
for(const [file,hash] of Object.entries(hashes)){
 if(file==='backend/routes/web.php')continue;
 const actual=crypto.createHash('sha256').update(fs.readFileSync(path.join(root,file))).digest('hex');protectedFiles++;
 if(actual!==hash)failures.push(`Protected file changed: ${file}`);
}
let galleryLinks=0;
const gallery=load(fs.readFileSync(path.join(root,'client_demo/index.html'),'utf8'));
gallery('a[href],img[src]').each((_,el)=>{const href=gallery(el).attr('href')||gallery(el).attr('src');if(!/^(?:https?:|#|data:)/.test(href)){galleryLinks++;if(!fs.existsSync(path.resolve(root,'client_demo',decodeURIComponent(href))))failures.push(`Client gallery missing target ${href}`);}});
const report={screens:inventory.length,linksChecked:links,assetReferencesChecked:assets,uniqueHttpTargets:responses.size,protectedFilesUnchanged:protectedFiles,galleryLinksChecked:galleryLinks,failures};
fs.writeFileSync(path.join(import.meta.dirname,'verification.json'),JSON.stringify(report,null,2));console.log(JSON.stringify(report,null,2));
if(failures.length)process.exitCode=1;
