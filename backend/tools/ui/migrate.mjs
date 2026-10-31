// One-way, reproducible import. Reads original exports; writes only generated manager files.
import fs from 'node:fs';
import path from 'node:path';
import crypto from 'node:crypto';
import vm from 'node:vm';
import { load } from 'cheerio';

const backend = path.resolve(import.meta.dirname, '../..');
const root = path.dirname(backend);
const write = (name, data) => { const file = path.join(backend, name); fs.mkdirSync(path.dirname(file), {recursive:true}); fs.writeFileSync(file, data); };
const screens = [
 ['dashboard','dashboard','Dashboard','/','grid_view'],
 ['properties','properties','Properties','/properties','domain'],
 ['bookings','bookings','Bookings','/bookings','event_available'],
 ['property_details','property-details','Property Details','/properties/demo','apartment'],
 ['units_management','units','Units','/units','meeting_room'],
 ['unit_details','unit-details','Unit Details','/units/demo','meeting_room'],
 ['owners','owners','Owners','/owners','corporate_fare'],
 ['tenants','tenants','Tenants','/tenants','group'],
 ['contracts_management','contracts','Contracts','/contracts','description'],
 ['payments','payments','Payments','/payments','payments'],
 ['rent_collection_receivables','receivables','Rent Collection','/receivables','account_balance_wallet'],
 ['maintenance_management','maintenance','Maintenance','/maintenance','build'],
 ['furniture_inventory','furniture','Furniture Inventory','/furniture','chair'],
 ['documents_management','documents','Documents','/documents','folder'],
 ['reports_analytics','reports','Reports & Analytics','/reports','monitoring'],
 ['reports_analytics_2','reports-operations','Operational Reports','/reports/operations','analytics'],
 ['settings_preferences','settings','Settings','/settings','settings'],
 ['property_manager_dashboard','dashboard-ar','لوحة المدير','/dashboard/ar','translate'],
 ...Array.from({length:6},(_,i)=>[i<2?`add-property-step-${i+1}`:`add_new_property_step_${i+1}`,`add-property-${i+1}`,`Add Property — Step ${i+1}`,`/properties/add/step-${i+1}`,'add_home'])
].map(([source,key,title,url,icon])=>({source,key,title,url,icon}));
const discovered = fs.readdirSync(path.join(root,'client_demo/screens')).filter(d=>fs.existsSync(path.join(root,'client_demo/screens',d,'code.html')));
if (discovered.some(d=>!screens.some(s=>s.source===d))) throw Error('Unmapped export detected');
if (process.argv.includes('--inventory')) { console.log(JSON.stringify(screens,null,2)); process.exit(); }
// Snapshot protected sources once, before import; never read .env contents into output.
const snapshotFile = path.join(backend,'tools/ui/protected-hashes.json');
if (!fs.existsSync(snapshotFile)) {
 const hashes={};
 const walk=(p)=>{ for(const e of fs.readdirSync(p,{withFileTypes:true})){const f=path.join(p,e.name); if(e.isDirectory())walk(f);else hashes[path.relative(root,f).replaceAll('\\','/')]=crypto.createHash('sha256').update(fs.readFileSync(f)).digest('hex');}};
 walk(path.join(root,'client_demo')); walk(path.join(root,'aqar_dashboard')); walk(path.join(backend,'database/migrations'));
 for(const name of ['.env','routes/web.php','resources/views/dashboard.blade.php','resources/views/layouts/app.blade.php']){const f=path.join(backend,name); if(fs.existsSync(f))hashes[`backend/${name}`]=crypto.createHash('sha256').update(fs.readFileSync(f)).digest('hex');}
 write('tools/ui/protected-hashes.json',JSON.stringify(hashes,null,2));
 fs.mkdirSync(path.join(backend,'tools/ui/backups'),{recursive:true});
 fs.copyFileSync(path.join(backend,'routes/web.php'),path.join(backend,'tools/ui/backups/web.php.original'));
}
const tokens={};
const assets={};
const fontUrls=new Set();
const selected = process.argv.includes('--core') ? screens.slice(0,3) : screens;
write('tools/ui/inventory.json',JSON.stringify(screens,null,2));
const alias = { 'furniture-inventory':'furniture', 'rent-collection':'receivables', 'rent-collection-receivables':'receivables', 'reports-analytics':'reports', 'add-property':'add-property-1' };
const route = key => `{{ route('manager.${key}') }}`;
const palettes={
 primary:'#1F4E78','primary-container':'#0F2942','on-primary':'#ffffff','on-primary-container':'#e6eef5',
 'primary-fixed':'#e6eef5','primary-fixed-dim':'#bed3e5','on-primary-fixed':'#0F2942','on-primary-fixed-variant':'#1F4E78','surface-tint':'#1F4E78','inverse-primary':'#bed3e5',
 secondary:'#2E7D32','secondary-container':'#e8f3e9','on-secondary-container':'#215a25','secondary-fixed':'#e8f3e9','secondary-fixed-dim':'#b9dcbc','on-secondary-fixed':'#173e19','on-secondary-fixed-variant':'#2E7D32',
 background:'#F4F6F9',surface:'#F4F6F9','surface-bright':'#F4F6F9','surface-dim':'#d9dfe6', 'surface-container-lowest':'#ffffff','surface-container-low':'#f0f3f7','surface-container':'#eaf0f5','surface-container-high':'#e1e8ef','surface-container-highest':'#d7e0e9','surface-variant':'#e1e8ef',
 'on-surface':'#1f2937','on-background':'#1f2937','on-surface-variant':'#526172',outline:'#788797','outline-variant':'#d8e0e8',
 error:'#C0392B','on-error':'#ffffff','error-container':'#fcebe9','on-error-container':'#85281e',success:'#27AE60',warning:'#D35400'
};
const replaceColors = html => html.replace(/#(?:8b2635|842131|581c28|40000d|a43946|7b3743|73313d|904854|3c0614|163d60)\b/gi, m=>/904854|7b3743|73313d|3c0614/i.test(m)?'#2E7D32':'#1F4E78')
 .replace(/#(?:ffdadb|ffd9dd|ffa5b1|ffb2bb|ffb2b6|ffa3a9)\b/gi,'#e6eef5').replace(/#1f7a4d\b/gi,'#2E7D32').replace(/#b42318\b/gi,'#C0392B').replace(/#b54708\b/gi,'#D35400')
 .replace(/#ddc0c0\b/gi,'#d8e0e8').replace(/#897172\b/gi,'#788797').replace(/#f0eded\b/gi,'#eaf0f5').replace(/#eae7e7\b/gi,'#e1e8ef').replace(/#dcd9d9\b/gi,'#d9dfe6');
const textOf = ($,el) => {const x=$(el).clone();x.find('.material-symbols-outlined,.material-icons').remove();return x.text().replace(/\s+/g,' ').trim();};
for(const screen of screens){
 const source = fs.readFileSync(path.join(root,'client_demo/screens',screen.source,'code.html'),'utf8');
 const $=load(source);
 const context={tailwind:{}};vm.runInNewContext($('#tailwind-config').text(),context,{timeout:1000});
 const ext=context.tailwind.config?.theme?.extend??{};
 for(const [key,val] of Object.entries(ext))tokens[key]={...tokens[key],...val};
 $('link[rel="stylesheet"]').each((_,el)=>{const url=$(el).attr('href');if(url?.includes('fonts.googleapis.com'))fontUrls.add(url);});
 const main=$('main').first();
 if(!main.length)throw Error(`No main in ${screen.source}`);
 main.find('script').remove();
 main.find('*').each((_,el)=>{for(const attr of Object.keys(el.attribs??{})){if(attr.startsWith('on'))$(el).removeAttr(attr);}});
 // Keep content headings, but remove exported shell positioning from content itself.
 main.find('img').each((_,el)=>{const img=$(el);img.attr('alt',img.attr('alt')||img.attr('data-alt')||'Demonstration property image');});
 main.find('[src], [style]').each((_,el)=>{
  const e=$(el);for(const attr of ['src','style']){const value=e.attr(attr);if(!value)continue;
   const urls=attr==='src'?[value]:[...value.matchAll(/url\(['"]?(.*?)['"]?\)/g)].map(m=>m[1]);
   let result=value;
   for(const raw of urls){if(raw.startsWith('data:'))continue;const ext=/\.(png|jpg|jpeg|svg|webp)(?:\?|$)/i.exec(raw)?.[1]||'jpg';const name=`images/${crypto.createHash('sha256').update(raw).digest('hex').slice(0,20)}.${ext}`;
    assets[raw]={file:name,source:screen.source};result=result.replace(raw,`{{ asset('assets/aqar/${name}') }}`);
   }e.attr(attr,result);
  }
 });
 const step=Number(screen.key.match(/add-property-(\d)/)?.[1]||0);
 main.find('a,button,[role="button"]').each((_,el)=>{
  const e=$(el), label=textOf($,el), icon=e.find('.material-symbols-outlined').first().text().trim();
  let target=null; const data=e.attr('data-path'); const href=e.attr('href')||'';
  const exactScreen=screens.find(s=>s.title.toLowerCase()===label.toLowerCase());if(exactScreen)target=exactScreen.key;
  if(data){const k=alias[data]||data;if(screens.some(s=>s.key===k))target=k;}
  const stepLink=(href+' '+label).match(/(?:step[-_ /]|Edit Step\s+|\(Step\s+)([1-6])/i);
  if(stepLink && (step || /add.property/i.test(href))) target=`add-property-${stepLink[1]}`;
  if(step){
   if(/continue|next step|proceed|review.*property/i.test(label) && step<6)target=`add-property-${step+1}`;
   if(/back.*(?:step|location|ownership|management|photos|basic)|previous step/i.test(label)&&step>1)target=`add-property-${step-1}`;
   if(/edit basic information/i.test(label))target='add-property-1';
   if(/^cancel$|back to properties/i.test(label))target='properties';
   if(/view property dashboard/i.test(label))target='property-details';
  }
  if(/^(?:\+\s*)?add (?:new )?property$|إضافة عقار/i.test(label))target='add-property-1';
  if(/manage (?:\d+ )?units?|units console|view unit$|^units\s*\d/i.test(label))target=screen.key==='units'?'unit-details':'units';
  if(/^view unit$/i.test(label))target='unit-details';
  if(/^back to units$/i.test(label))target='units';
  if(/Al-Yasmin Compound II/i.test(label)&&el.tagName==='a')target='property-details';
  if(screen.key==='properties'&&/^manage villa$/i.test(label))target='unit-details';
  if(screen.key==='properties'&&/^manage$/i.test(label))target='unit-details';
  if(screen.key==='property-details'&&/^edit property$/i.test(label))target='add-property-1';
  if(/view property$|^properties$|back to properties/i.test(label))target=label.toLowerCase().includes('back')||label==='Properties'?'properties':'property-details';
  if(/view documents|review documents|photos.*documents|^documents(?:\s*\(|$)/i.test(label))target='documents';
  if(/furniture inventory|full inventory/i.test(label)||icon==='chair')target='furniture';
  if(/view tenant$|tenants.*bookings|booking history|bookings.*tenancy|pending bookings|مراجعة الحجوزات/i.test(label))target=label.toLowerCase().includes('tenant')&&!/booking/i.test(label)?'tenants':'bookings';
  if(/view contract$|contracts.*payments|tenancy details|tenancy history/i.test(label))target='contracts';
  if(/maintenance history|^maintenance$|inspect.*follow up|معاينة ومتابعة/i.test(label))target='maintenance';
  if(/view all financial records|عرض كافة السجلات المالية/i.test(label))target='payments';
  if(screen.key==='dashboard'){
   if(/add tenant/i.test(label))target='tenants';if(/create contract/i.test(label))target='contracts';if(/record.*payment/i.test(label))target='payments';if(/review.*approve|^details$/i.test(label))target='bookings';if(/cash flow report/i.test(label))target='reports';if(/open new ticket/i.test(label))target='maintenance';
  }
  if(screen.key==='dashboard-ar'){
   if(/إضافة مستأجر/.test(label))target='tenants';if(/إنشاء عقد/.test(label))target='contracts';if(/تسجيل دفعة/.test(label))target='payments';if(/مراجعة وقبول|التفاصيل/.test(label))target='bookings';if(/تقرير التدفق النقدي/.test(label))target='reports';if(/فتح طلب صيانة/.test(label))target='maintenance';
  }
  if(screen.key==='properties' && (icon==='visibility'||/view details/i.test(label)))target='property-details';
  if(screen.key==='units' && (/^[A-Z]+-\d+$/.test(label)||icon==='visibility'))target='unit-details';
  if(screen.key==='reports'&&/view report/i.test(label))target='reports-operations';
  // A mutation must never be presented as a successful backend action.
  if(/save|delete|publish|approve|reject|decline|upload|verify|verified|record offline|record payment|update unit/i.test(label))target=null;
  if(target){el.tagName='a';e.attr('href',route(target)).removeAttr('type').removeAttr('data-demo');}
  else {
   if(el.tagName==='a')e.attr('href','#demo-notice');
   e.attr('data-demo',label||e.attr('title')||icon||'This action');
   if(el.tagName==='button')e.attr('type','button');
  }
  if(!label)e.attr('aria-label',e.attr('title')||icon.replaceAll('_',' ')||'Demo action');
  if(target)e.removeClass('pointer-events-none');
 });
 // Link static property/unit identifiers without changing their typography.
 if(['properties','units'].includes(screen.key))main.find(screen.key==='properties'?'h3,tbody td:first-child':'tbody td:nth-child(2)').each((_,el)=>{const e=$(el);const isUnit=screen.key==='units'||/UNT-/.test(e.text());if(!e.find('a,button,input').length&&e.text().trim()&&!(el.tagName==='h3'&&/Directory/.test(e.text())))e.wrapInner(`<a href="${route(isUnit?'unit-details':'property-details')}"></a>`);});
 // Implement the original visual grid/list toggle entirely in the browser.
 for(const [id,mode] of [['viewGridBtn','grid'],['viewListBtn','list']])main.find('#'+id).removeAttr('data-demo').attr('data-view-mode',mode).attr('aria-pressed',mode==='grid'?'true':'false');
 main.find('[class*="cursor-pointer"]').each((_,el)=>{const e=$(el);if(['a','button','label','input','select'].includes(el.tagName)||e.find('a,button,input,select,[data-demo]').length)return;if(e.text().trim())e.attr('role','button').attr('tabindex','0').attr('data-demo',textOf($,el)||'This control');});
 main.find('form').attr('data-demo-form','').removeAttr('action').removeAttr('method');
 // Remove misleading post-save panel exported in the review screen.
 if(step){
  const tracker=main.children().first().children('div').filter((_,el)=>{const t=$(el).text();return t.length<3000&&/Basic Info/.test(t)&&/Location/.test(t)&&/Ownership/.test(t)&&/Review/.test(t)&&!$(el).find('input,select').length;}).first();
  if(!tracker.length)throw Error(`Wizard tracker not found: ${step}`);
  tracker.replaceWith('<div data-shared-wizard></div>');
 }
 if(step===5)main.find('*').filter((_,el)=>$(el).children().length===0&&/Autosaved at/.test($(el).text())).text('Sample media · No uploads saved');
 if(step===6){
  const preview=main.find('section').filter((_,el)=>$(el).text().includes('Success Confirmation Preview'));
  preview.find('h4').first().text('Review complete — UI preview');
  preview.find('h4').last().text('No property has been saved');
  preview.find('p').first().text('Explore the sample property screens below. Saving will be available in the backend phase.');
  preview.find('p').last().text('Al-Yasmin Compound II and its reference are static sample data.');
 }
 if(['dashboard','dashboard-ar'].includes(screen.key)){
  main.find('svg rect[fill="#1F4E78"]').attr('fill','#2E7D32');
  main.find('span').filter((_,el)=>$(el).text().trim()==='Actual Collected (SAR)'||$(el).text().trim()==='المحصل الفعلي (ر.س)').each((_,el)=>$(el).parent().find('[class*="bg-primary"]').removeClass('bg-primary bg-primary-container').addClass('bg-secondary'));
 }
 if(!selected.includes(screen))continue;
 let content=replaceColors(main.html()).replaceAll('&amp;','&').replace('<div data-shared-wizard=""></div>',"@include('components.manager.property-steps')");
 // Cheerio entity serialization inside Blade attribute expressions is decoded here.
 content=content.replaceAll('&#39;',"'").replaceAll('&quot;','"');
 write(`resources/views/manager/${screen.key}.blade.php`,`{{-- Imported from client_demo/screens/${screen.source}/code.html; static demonstration data. --}}\n@extends('layouts.manager')\n@section('content')\n${content}\n@endsection\n`);
}
tokens.colors={...tokens.colors,...palettes};
tokens.fontFamily={...tokens.fontFamily};for(const key of Object.keys(tokens.fontFamily))tokens.fontFamily[key]=['Inter','IBM Plex Sans Arabic','sans-serif'];
write('tools/ui/design-tokens.json',JSON.stringify(tokens,null,2));
write('tools/ui/assets.json',JSON.stringify({assets,fontUrls:[...fontUrls]},null,2));
const phpQuote=s=>`'${s.replaceAll("'","\\'")}'`;
const entries=screens.map(s=>`    ${phpQuote(s.key)} => ['title' => ${phpQuote(s.title)}, 'path' => ${phpQuote(s.url)}, 'icon' => ${phpQuote(s.icon)}, 'source' => ${phpQuote(s.source)}],`).join('\n');
write('config/manager.php',`<?php\n\n// UI inventory only. No business data or database access.\nreturn [\n${entries}\n];\n`);
console.log(`Imported ${selected.length} Blade screens; ${Object.keys(assets).length} unique media assets discovered.`);
