import fs from 'node:fs';
import path from 'node:path';
import crypto from 'node:crypto';
const base=path.resolve(import.meta.dirname,'../..');
const output=path.join(base,'public/assets/aqar');
const {assets}=JSON.parse(fs.readFileSync(path.join(import.meta.dirname,'assets.json'),'utf8'));
const failures=[];
const request=async url=>{const res=await fetch(url,{signal:AbortSignal.timeout(30000),headers:{'User-Agent':'Mozilla/5.0'}});if(!res.ok)throw Error(`HTTP ${res.status}`);return res;};
const save=async(url,file)=>{
 const dest=path.join(output,file);if(fs.existsSync(dest)&&fs.statSync(dest).size>0)return;
 fs.mkdirSync(path.dirname(dest),{recursive:true});
 for(let i=0;i<3;i++){try{const res=await request(url);const data=Buffer.from(await res.arrayBuffer());fs.writeFileSync(dest,data);return;}catch(e){if(i===2)failures.push({url,file,error:e.message});}}
};
const queue=Object.entries(assets);
await Promise.all(Array.from({length:4},async()=>{while(queue.length){const [url,info]=queue.shift();if(/^https?:/.test(url))await save(url,info.file);else {const from=path.resolve(base,'../client_demo/screens',info.source,url);const to=path.join(output,info.file);fs.mkdirSync(path.dirname(to),{recursive:true});if(fs.existsSync(from))fs.copyFileSync(from,to);else failures.push({url,error:'Missing original local file'});}}}));
let css='';
for(const family of ['Inter:wght@300;400;500;600;700','IBM+Plex+Sans+Arabic:wght@400;500;600;700','Material+Symbols+Outlined:wght,FILL@100..700,0..1']){
 try{
  let fontCss=await (await request(`https://fonts.googleapis.com/css2?family=${family}&display=swap`)).text();
  const urls=[...new Set([...fontCss.matchAll(/url\((https:[^)]+)\)/g)].map(m=>m[1]))];
  for(const url of urls){const ext=new URL(url).pathname.split('.').pop();const file=`fonts/${crypto.createHash('sha256').update(url).digest('hex').slice(0,16)}.${ext}`;await save(url,file);fontCss=fontCss.replaceAll(url,file);}
  css+=fontCss+'\n';
 }catch(e){failures.push({family,error:e.message});}
}
if(css)fs.writeFileSync(path.join(output,'fonts.css'),css);
fs.writeFileSync(path.join(import.meta.dirname,'asset-results.json'),JSON.stringify({images:Object.keys(assets).length,failures},null,2));
console.log(JSON.stringify({images:Object.keys(assets).length,fonts:fs.existsSync(path.join(output,'fonts'))?fs.readdirSync(path.join(output,'fonts')).length:0,failures},null,2));
if(failures.length)process.exitCode=1;
