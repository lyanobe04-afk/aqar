import test from 'node:test';
import assert from 'node:assert/strict';
import fs from 'node:fs';
import {DemoStore,STORE_KEY} from '../../public/assets/aqar/demo-store.js';
import {zonedToday} from '../../public/assets/aqar/global.js';
const seed=JSON.parse(fs.readFileSync(new URL('../../../demo/seed.json',import.meta.url),'utf8'));
class Memory {data=new Map();getItem(k){return this.data.get(k)||null;}setItem(k,v){this.data.set(k,v);}removeItem(k){this.data.delete(k);}}
async function setup(){const memory=new Memory(),tab=new Memory(),s=new DemoStore(seed,memory,tab);await s.login('manager@aqar.demo','Demo123!');return {s,memory,tab};}
const property={name:'Fictional Brooklyn House',description:'International presentation',country:'US',currency:'USD',timeZone:'America/New_York',region:'New York',city:'New York',district:'Brooklyn',address:'15 Fictional Demo Lane',postalCode:'11201',latitude:40.68,longitude:-73.94,category:'Apartment',ownerId:'owner1',unitCount:2,price:200,ratePeriod:'night',minNights:2,publication:'published',availability:'available',listingType:'rent',amenities:'Wi-Fi, Kitchen',policy:'instant'};
const dates={start:'2035-03-10',end:'2035-03-13'};
test('unit create form hidden empty ID cannot replace the generated record ID',async()=>{
 const {s,memory,tab}=await setup();const p=s.saveProperty(property);const u=s.saveUnit({id:'',propertyId:p.id,name:'Studio East',price:400,area:100,status:'vacant',ratePeriod:'night'});
 assert.ok(u.id.startsWith('u-'));assert.equal(new DemoStore(seed,memory,tab).state.units.find(v=>v.id===u.id).name,'Studio East');
});
test('Laravel empty-object JSON roundtrip does not discard saved draft or property records',async()=>{
 const {s,memory,tab}=await setup();const p=s.saveProperty(property);s.saveDraft({name:'Persisted international draft',country:'GB',currency:'GBP'});
 const phpSeed={...seed,draft:[]};const restored=new DemoStore(phpSeed,memory,tab);
 assert.equal(restored.state.draft.name,'Persisted international draft');assert.equal(restored.property(p.id).name,property.name);assert.equal(restored.recovery,undefined);
});
test('A: international property create, complete edit, related units and reload preserve edits',async()=>{
 const {s,memory,tab}=await setup();const p=s.saveProperty(property);assert.equal(p.country,'US');assert.equal(p.currency,'USD');assert.deepEqual(p.amenities,['Wi-Fi','Kitchen']);
 const edit={...p,name:'Edited London house',country:'GB',city:'London',currency:'GBP',timeZone:'Europe/London',region:'Greater London',postalCode:'W1K 0AA',price:250,repriceUnits:true,description:'Edited description',availability:'unavailable',publication:'unpublished',amenities:'Garden'};
 s.saveProperty(edit,p.id);const restored=new DemoStore(seed,memory,tab);assert.equal(restored.property(p.id).name,edit.name);assert.equal(restored.property(p.id).description,edit.description);assert.equal(restored.property(p.id).published,false);assert.equal(restored.property(p.id).timeZone,'Europe/London');assert(restored.state.units.filter(u=>u.propertyId===p.id).every(u=>u.currency==='GBP'&&u.price===250));
});
test('B: publication, independent availability, sales and unit status gate bookings',async()=>{
 const {s}=await setup();const p=s.saveProperty(property),u=s.state.units.find(u=>u.propertyId===p.id);const book=()=>s.createBooking({...dates,propertyId:p.id,unitId:u.id,tenantId:'tenant1'});
 for(const patch of [{publication:'draft'},{publication:'unpublished'},{availability:'maintenance'},{availability:'unavailable'},{listingType:'sale'}]) {s.saveProperty({...p,...patch},p.id);assert.throws(book);s.saveProperty({...p,publication:'published',availability:'available',listingType:'rent'},p.id);}
 s.saveUnit({...u,status:'unavailable'},u.id);assert.throws(book);s.saveUnit({...u,status:'vacant',price:300,ratePeriod:'night'},u.id);assert.equal(book().amount,900);
});
test('C: international instant and requested bookings preserve currency, timezone and duration',async()=>{
 const {s}=await setup();await s.login('tenant@aqar.demo','Demo123!');const b=s.createBooking({...dates,propertyId:'p-global-london',unitId:'p-global-london-u1'});assert.equal(b.amount,540);assert.equal(b.currency,'GBP');assert.equal(b.timeZone,'Europe/London');assert.equal(b.status,'confirmed');
 const request=s.createBooking({...dates,propertyId:'p-global-dubai',unitId:'p-global-dubai-u1'});assert.equal(request.status,'pending');assert.equal(request.amount,1950);assert.equal(request.currency,'AED');
 assert.throws(()=>s.createBooking({...dates,propertyId:b.propertyId,unitId:b.unitId}));
});
test('D: owner assignment, own maintenance and per-currency financial reports',async()=>{
 const {s}=await setup();const p=s.saveProperty(property),u=s.state.units.find(u=>u.propertyId===p.id);const b=s.createBooking({...dates,propertyId:p.id,unitId:u.id,tenantId:'tenant1'});s.recordPayment({bookingId:b.id,amount:200,status:'verified'});const contract=s.createContract({bookingId:b.id,title:'Fictional international rental'});assert.equal(contract.currency,'USD');assert.equal(contract.amount,b.amount);assert.equal(contract.timeZone,b.timeZone);
 assert.equal(s.totals('USD').collected,200);assert.equal(s.totals('SAR').collected,8600);assert.equal(s.currencyTotals().find(v=>v.currency==='USD').collected,200);
 await s.login('owner@aqar.demo','Demo123!');assert(s.properties().some(v=>v.id===p.id));assert.equal(s.totals('USD').collected,200);assert(!s.properties().some(v=>v.id==='p-global-newyork'));
});
test('preferences persist per account without relabelling property money or changing records',async()=>{
 const {s,memory,tab}=await setup();const p=s.property('p-global-london'),before=JSON.stringify(p);s.setPreferences({country:'US',currency:'USD',locale:'ar',timeZone:'America/New_York',dateFormat:'dd/MM/yyyy',measurement:'sqft',phoneCode:'+1'});
 assert.equal(JSON.stringify(p),before);assert.match(s.money(180,p),/GBP/);assert.equal(s.date('2035-03-10'),'10/03/2035');assert.match(s.area(100),/ft²/);assert.equal(new DemoStore(seed,memory,tab).preferences.currency,'USD');
 await s.login('owner@aqar.demo','Demo123!');assert.equal(s.preferences.currency,'SAR');await s.login('manager@aqar.demo','Demo123!');assert.equal(s.preferences.currency,'USD');
 assert.throws(()=>s.setPreferences({timeZone:'Not/AZone'}));assert.throws(()=>s.setPreferences({locale:'fr'}));assert.throws(()=>s.setPreferences({phoneCode:'abc'}));
});
test('history protects property/unit deletion and currency changes; eligible unit delete persists',async()=>{
 const {s,memory,tab}=await setup();assert.throws(()=>s.deleteProperty('p1'));assert.throws(()=>s.deleteUnit('u2'));assert.throws(()=>s.saveProperty({...s.property('p1'),currency:'USD',price:20,repriceUnits:true},'p1'));
 const p=s.saveProperty(property),u=s.state.units.find(u=>u.propertyId===p.id);s.deleteUnit(u.id);assert.equal(new DemoStore(seed,memory,tab).state.units.filter(u=>u.propertyId===p.id).length,1);assert.equal(s.property(p.id).unitCount,1);
 s.deleteProperty(p.id);assert.equal(new DemoStore(seed,memory,tab).property(p.id),undefined);
});
test('minimum stay, calendar date validity, original decimal precision and timezone date boundaries',async()=>{
 const {s}=await setup();const p=s.saveProperty(property),u=s.state.units.find(u=>u.propertyId===p.id);assert.throws(()=>s.createBooking({propertyId:p.id,unitId:u.id,tenantId:'tenant1',start:'2035-03-10',end:'2035-03-11'}));
 assert.equal(zonedToday('America/Los_Angeles',new Date('2026-01-01T00:30:00Z')),'2025-12-31');assert.equal(zonedToday('Asia/Tokyo',new Date('2026-01-01T00:30:00Z')),'2026-01-01');
 assert.match(s.money(1.234,'KWD'),/1.234/);assert.throws(()=>s.saveProperty({...property,latitude:100}));assert.throws(()=>s.saveProperty({...property,timeZone:'Bad/Zone'}));
});
test('legacy migration preserves local changes/accounts, merges fixtures once, and does not resurrect deletion',async()=>{
 const old=structuredClone(seed);delete old.globalRevision;old.properties=old.properties.filter(p=>!p.id.startsWith('p-global-'));old.units=old.units.filter(u=>!u.id.startsWith('p-global-'));old.properties[0].name='Existing edited name';old.accounts[0].name='Existing profile';
 const memory=new Memory(),tab=new Memory();memory.setItem(STORE_KEY,JSON.stringify(old));const s=new DemoStore(seed,memory,tab);assert.equal(s.property('p1').name,'Existing edited name');assert.equal(s.state.accounts[0].name,'Existing profile');await s.login('manager@aqar.demo','Demo123!');s.deleteProperty('p-global-london');assert.equal(new DemoStore(seed,memory,tab).property('p-global-london'),undefined);
});
