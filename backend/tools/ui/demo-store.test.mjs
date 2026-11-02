import test from 'node:test';
import assert from 'node:assert/strict';
import fs from 'node:fs';
import {DemoStore, today, STORE_KEY} from '../../public/assets/aqar/demo-store.js';
const seed=JSON.parse(fs.readFileSync(new URL('../../../demo/seed.json',import.meta.url),'utf8'));
class MemoryStorage {values=new Map();getItem(k){return this.values.get(k)||null;}setItem(k,v){this.values.set(k,v);}removeItem(k){this.values.delete(k);}}
async function setup(role='manager'){const storage=new MemoryStorage(),tabs=new MemoryStorage(),store=new DemoStore(seed,storage,tabs);await store.login(`${role}@aqar.demo`,'Demo123!');return {store,storage,tabs};}
const input={name:'Presentation villa',category:'Villa',city:'Riyadh',address:'Fictional Lane 10',ownerId:'owner1',price:1500,unitCount:2,policy:'instant',published:true};
const dates={start:'2035-01-10',end:'2035-01-13'};
test('manager scenario: create/edit property and units; approve booking; record and verify payment; maintenance',async()=>{
 const {store,storage,tabs}=await setup();const p=store.saveProperty(input);assert.equal(store.properties().length,seed.properties.length+1);assert.equal(store.state.units.filter(u=>u.propertyId===p.id).length,2);
 store.saveProperty({...input,name:'Updated demo villa'},p.id);assert.equal(store.property(p.id).name,'Updated demo villa');
 store.updateBooking('b2','approved');assert.equal(store.state.bookings.find(b=>b.id==='b2').status,'approved');
 const before=store.totals().collected;const pay=store.recordPayment({bookingId:'b2',amount:1000});assert.equal(store.totals().collected,before);store.verifyPayment(pay.id);assert.equal(store.totals().collected,before+1000);
 assert.throws(()=>store.verifyPayment(pay.id));store.updateMaintenance('m1','approved');store.comment('m1','Fictional technician visit scheduled.');store.updateMaintenance('m1','completed');const expense=store.totals().expense;store.updateMaintenance('m1','completed');assert.equal(store.totals().expense,expense);
 const restored=new DemoStore(seed,storage,tabs);assert.equal(restored.property(p.id).name,'Updated demo villa');assert.equal(restored.state.maintenance.find(m=>m.id==='m1').comments.length,1);
});
test('owner scenario: assigned assets only, derived totals and approval ownership guard',async()=>{
 const {store}=await setup('owner');assert.deepEqual(store.properties().map(p=>p.id),['p1','p2']);assert(store.records('payments').every(p=>['p1','p2'].includes(p.propertyId)));
 assert.equal(store.totals().collected,5000);assert.equal(store.totals().expense,1050);assert.equal(store.totals().profit,3950);
 store.updateMaintenance('m1','approved');assert.throws(()=>store.updateMaintenance('m3','approved'));assert.throws(()=>store.saveProperty(input));assert.throws(()=>store.verifyPayment('pay2'));
 assert(store.records('notifications').every(n=>n.accountId==='owner1'));
});
test('tenant scenario: instant and request booking, own records, maintenance and inspection',async()=>{
 const {store}=await setup('tenant');assert.equal(store.properties({browse:true}).length,seed.properties.filter(p=>p.published).length);assert(!store.canSeeProperty('p4',true));
 const b=store.createBooking({propertyId:'p2',unitId:'u5',...dates});assert.equal(b.status,'confirmed');assert.equal(b.amount,2550);
 const pending=store.createBooking({propertyId:'p3',unitId:'u6',start:'2035-02-10',end:'2035-02-12'});assert.equal(pending.status,'pending');
 assert(store.records('bookings').every(b=>b.tenantId==='tenant1'));assert(!store.records('bookings').some(b=>b.id==='b3'));
 const m=store.createMaintenance({propertyId:'p1',title:'Sample tap',description:'Fictional leak',photos:[]});assert.equal(m.status,'pending approval');store.comment(m.id,'Test note');
 const inspection=store.inspect({propertyId:'p1',notes:'Sample wall mark',condition:'damaged'});assert.equal(inspection.condition,'damaged');
 store.updateBooking(pending.id,'cancelled');assert.equal(pending.status,'cancelled');assert.throws(()=>store.updateBooking('b3','cancelled'));
 assert.throws(()=>store.updateBooking('b2','approved'));assert.deepEqual(store.records('expenses'),[]);
});
test('invalid dates, overlaps, amounts and required fields are rejected without changing state',async()=>{
 const {store}=await setup('tenant');const count=store.state.bookings.length;
 for(const range of [{start:'2035-01-10',end:'2035-01-09'},{start:'2035-02-30',end:'2035-03-02'},{start:'2020-01-01',end:'2020-01-02'}])assert.throws(()=>store.createBooking({propertyId:'p2',unitId:'u5',...range}));
 store.createBooking({propertyId:'p2',unitId:'u5',...dates});assert.throws(()=>store.createBooking({propertyId:'p2',unitId:'u5',...dates}));assert.equal(store.state.bookings.length,count+1);
 for(const amount of [0,-1,Infinity,NaN,999999])assert.throws(()=>store.recordPayment({bookingId:'b1',amount}));
 assert.throws(()=>store.createMaintenance({propertyId:'p1',title:'',description:''}));assert.throws(()=>store.inspect({propertyId:'p4',notes:'Not assigned'}));
});
test('registration, password recovery/change, logout and expiry are simulated locally',async()=>{
 const {store,storage,tabs}=await setup();await assert.rejects(()=>store.login('manager@aqar.demo','wrong'));await assert.rejects(()=>store.register({name:'',email:'x',role:'tenant',password:'short'}));
 await store.register({name:'Demo visitor',email:'visitor@aqar.demo',role:'tenant',password:'Visitor123!',confirm:'Visitor123!'});await store.login('visitor@aqar.demo','Visitor123!',true);assert.equal(store.user.name,'Demo visitor');
 store.updateProfile({name:'Updated visitor',phone:'0500000000'});await store.changePassword('Visitor123!','Changed123!','Changed123!');store.logout();assert.equal(store.user,null);
 await store.login('visitor@aqar.demo','Changed123!');store.expire();assert.equal(store.user,null);assert(store.session);await store.resetPassword('visitor@aqar.demo','Reset123!','Reset123!');await store.login('visitor@aqar.demo','Reset123!');assert.equal(store.user.role,'tenant');
 const restored=new DemoStore(seed,storage,tabs);assert.equal(restored.user.name,'Updated visitor');store.reset();assert.equal(store.user,null);assert.equal(store.state.accounts.length,3);
});
test('reset restores all seed records and keeps a seed account signed in',async()=>{
 const {store}=await setup();store.saveProperty(input);store.updateBooking('b2','approved');store.setLocale('ar');store.reset();assert.equal(store.state.properties.length,seed.properties.length);assert.equal(store.state.bookings.find(b=>b.id==='b2').status,'pending');assert.equal(store.locale,'en');assert.equal(store.user.id,'manager1');
});
test('sample contracts require approved booking and never represent legal execution',async()=>{
 const {store}=await setup();assert.throws(()=>store.createContract({bookingId:'b2',title:'Sample'}));const c=store.createContract({bookingId:'b1',title:'Sample tenancy'});assert.equal(c.status,'draft');store.updateContract(c.id,'active');assert.equal(c.status,'active');
});
test('delete confirmation target can remove a new property but protects linked financial history',async()=>{
 const {store}=await setup();const p=store.saveProperty(input);store.deleteProperty(p.id);assert(!store.property(p.id));assert(!store.state.units.some(u=>u.propertyId===p.id));assert.throws(()=>store.deleteProperty('p1'));
});
test('corrupt or incompatible local data recovers; quota failures roll back mutations',async()=>{
 const storage=new MemoryStorage();storage.setItem(STORE_KEY,'not json');const store=new DemoStore(seed,storage);assert.equal(store.state.properties.length,seed.properties.length);await store.login('manager@aqar.demo','Demo123!');storage.setItem=()=>{throw Error('quota');};assert.throws(()=>store.saveProperty(input));assert.equal(store.state.properties.length,seed.properties.length);
});
