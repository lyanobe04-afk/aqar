import {validatePhotos} from './global.js';
const copy=v=>JSON.parse(JSON.stringify(v));
const fail=message=>{throw Error(message);};
const text=v=>String(v||'').trim();
const number=v=>{const n=Number(v);if(v===''||v===null||!Number.isFinite(n)||n<0)fail('Enter a non-negative demo amount or quantity.');return n;};
export const demoPolicy={label:'Configurable demo assumptions — client approval required',ownerEditing:false,valuation:'Manual proposed charges; no automatic depreciation or liability policy.',settlement:'Deduction capped at the fictional deposit; excess shown separately. No money moved.'};
export function normalizeHandover(state){
  state.unitInventory ||= [];state.handovers ||= [];state.handoverPolicy={...demoPolicy,...state.handoverPolicy};
  for(const p of state.properties)p.brokerIds ||= ['manager1'];
 for(const h of state.handovers)for(const stage of ['checkin','checkout'])if(h[stage])for(const row of h[stage].rows)row.reviewed ??=Object.keys(h[stage].signatures).length>0;
}
export const handoverMethods={
  isDemoAdmin(){return this.user?.id==='manager1';},
  managesUnit(unitId){const u=this.state.units.find(u=>u.id===unitId),p=u&&this.property(u.propertyId);return this.user?.role==='manager'&&p&&(this.isDemoAdmin()||p.brokerIds.includes(this.user.id));},
  assignDemoRelationships(propertyId,ownerId,brokerIds){
    this.requireRole('manager');if(!this.isDemoAdmin())fail('Only the primary demo manager can change assignments.');
    const p=this.property(propertyId);if(!p||!this.state.owners.some(o=>o.id===ownerId)||!brokerIds.length||brokerIds.some(id=>!this.state.accounts.some(a=>a.id===id&&a.role==='manager')))fail('Choose an existing owner and at least one broker account.');
    this.transaction(()=>{p.ownerId=ownerId;p.brokerIds=[...new Set(brokerIds)];});
  },
  inventory(unitId){
    const u=this.state.units.find(u=>u.id===unitId);if(!u||!this.canSeeProperty(u.propertyId))return [];
    if(this.user.role==='tenant'&&!this.state.bookings.some(b=>b.unitId===unitId&&b.tenantId===this.user.id&&['approved','confirmed'].includes(b.status)))return [];
    return this.state.unitInventory.filter(i=>i.unitId===unitId);
  },
  saveInventory(input,id){
    this.requireRole('manager');const old=this.state.unitInventory.find(i=>i.id===id);if(id&&!old)fail('Record not found.');
    const unitId=old?.unitId||input.unitId,u=this.state.units.find(u=>u.id===unitId);if(!this.managesUnit(unitId))fail('This unit is not assigned to your broker account.');
    const quantity=number(input.quantity),value=number(input.value),photos=input.photos||old?.photos||[];
    if(!text(input.name)||!text(input.room)||!Number.isInteger(quantity)||quantity<1||!['good','worn','damaged'].includes(input.condition))fail('Enter room, item, positive whole quantity and condition.');validatePhotos(photos);
    return this.transaction(()=>{const i=old||{id:this.id('item'),unitId,propertyId:u.propertyId};Object.assign(i,{name:text(input.name),room:text(input.room),quantity,value,condition:input.condition,photos:copy(photos),currency:this.property(u.propertyId).currency});if(!old)this.state.unitInventory.push(i);return i;});
  },
  deleteInventory(id){const i=this.state.unitInventory.find(i=>i.id===id);if(!i||!this.managesUnit(i.unitId))fail('Record not found or not assigned.');if(this.state.handovers.some(h=>h.items.some(v=>v.id===id)))fail('A handover snapshot protects this item. Keep the archived baseline.');this.transaction(()=>this.state.unitInventory=this.state.unitInventory.filter(v=>v.id!==id));},
  handoverList(){const user=this.user;if(!user)return [];return this.state.handovers.filter(h=>user.role==='tenant'?h.tenantId===user.id:user.role==='owner'?h.ownerId===user.id:this.isDemoAdmin()||h.brokerId===user.id);},
  handover(id){const h=this.handoverList().find(h=>h.id===id);if(!h)fail('Handover not found or not assigned.');return h;},
  createHandover(input){
    this.requireRole('manager');const b=this.state.bookings.find(b=>b.id===input.bookingId);if(!b||!['approved','confirmed'].includes(b.status)||!this.managesUnit(b.unitId))fail('Choose an assigned approved booking.');
    if(this.state.handovers.some(h=>h.bookingId===b.id))fail('A paired handover already exists for this booking.');
    const p=this.property(b.propertyId),brokerId=input.brokerId||p.brokerIds[0];if(!p.brokerIds.includes(brokerId))fail('Choose an assigned broker.');
    if(![p.ownerId,b.tenantId].every(id=>this.state.accounts.some(a=>a.id===id)))fail('Choose owner and tenant accounts available for confirmation.');const items=this.inventory(b.unitId);if(!items.length)fail('Prepare this unit inventory before check-in.');if(items.some(i=>i.currency!==b.currency))fail('Reprice inventory explicitly in the booking currency before handover.');
    const deposit=number(input.deposit),assumptions=text(input.assumptions);if(!assumptions)fail('Describe the configurable demo assumptions.');
    return this.transaction(()=>{const h={id:this.id('handover'),bookingId:b.id,contractId:this.state.contracts.find(c=>c.bookingId===b.id)?.id||'',unitId:b.unitId,propertyId:b.propertyId,propertyName:p.name,unitName:this.state.units.find(u=>u.id===b.unitId).name,ownerId:p.ownerId,brokerId,tenantId:b.tenantId,participants:Object.fromEntries([p.ownerId,brokerId,b.tenantId].map(id=>[id,this.state.accounts.find(a=>a.id===id)?.name||this.state.owners.find(a=>a.id===id)?.name||this.state.tenants.find(a=>a.id===id)?.name||id])),currency:b.currency,timeZone:b.timeZone,deposit,assumptions,policy:copy(this.state.handoverPolicy),items:copy(items),checkin:{rows:copy(items).map(i=>({itemId:i.id,quantity:i.quantity,condition:i.condition,notes:'',photos:[],reviewed:false})),signatures:{}},checkout:null,proposal:null,createdAt:new Date().toISOString()};this.state.handovers.unshift(h);return h;});
  },
  stageEditor(h){return this.user?.id===h.tenantId||this.user?.role==='manager'&&(this.isDemoAdmin()||this.user.id===h.brokerId);},
  saveObservation(id,stage,itemId,input){const h=this.handover(id),s=h[stage];if(!['checkin','checkout'].includes(stage)||!s||!this.stageEditor(h)||Object.keys(s.signatures).length||h.settledAt)fail('This inspection is locked or not assigned.');const baseline=h.items.find(i=>i.id===itemId),quantity=number(input.quantity);if(!baseline||!Number.isInteger(quantity)||quantity>baseline.quantity||!['good','worn','damaged','missing'].includes(input.condition)||(quantity===0)!==(input.condition==='missing'))fail('Use a whole present quantity within the baseline; zero means missing.');const photos=input.photos||[];validatePhotos(photos);this.transaction(()=>Object.assign(s.rows.find(r=>r.itemId===itemId),{quantity,condition:input.condition,notes:text(input.notes),photos:copy(photos),reviewed:true}));},
  signInspection(id,stage,input){const h=this.handover(id),s=h[stage],role=this.user?.role==='tenant'?'tenant':'manager';if(!['checkin','checkout'].includes(stage)||!s||!this.stageEditor(h)||h.settledAt||s.signatures[role])fail('Confirmation is unavailable.');if(role==='manager'&&this.user.id!==h.brokerId)fail('The designated broker must confirm this inspection.');if(s.rows.some(r=>!r.reviewed))fail('Record every item condition before confirmation.');if(input.accepted!==true||text(input.name)!==this.user.name)fail('Type your account name and acknowledge a simulated signature.');this.transaction(()=>s.signatures[role]={accountId:this.user.id,name:this.user.name,at:new Date().toISOString(),simulated:true});},
  beginCheckout(id){const h=this.handover(id);if(this.user.role!=='manager'||!this.stageEditor(h)||h.checkout||!h.checkin.signatures.tenant||!h.checkin.signatures.manager)fail('Both check-in confirmations are required before check-out.');this.transaction(()=>h.checkout={rows:copy(h.checkin.rows).map(r=>({...r,notes:'',photos:[],reviewed:false})),signatures:{},startedAt:new Date().toISOString()});},
  comparison(id){const h=this.handover(id);return h.items.map(i=>{const before=h.checkin.rows.find(r=>r.itemId===i.id),after=h.checkout?.rows.find(r=>r.itemId===i.id);return {...i,before,after,missing:after?Math.max(0,before.quantity-after.quantity):0,changed:!!after&&(before.quantity!==after.quantity||before.condition!==after.condition),charge:h.proposal?.charges?.[i.id]||0};});},
  proposeSettlement(id,input){const h=this.handover(id);if(this.user.role!=='manager'||!this.stageEditor(h)||h.settledAt||!h.checkout?.signatures.tenant||!h.checkout?.signatures.manager)fail('Both check-out confirmations are required before proposing settlement.');const charges={};for(const i of this.comparison(id)){const charge=number(input.charges?.[i.id]??0);if(charge&&!i.changed)fail('Only changed or missing items may have a proposed charge.');charges[i.id]=charge;}
    if(!text(input.notes))fail('Explain proposed charges and demo assumptions.');const total=Object.values(charges).reduce((a,b)=>a+b,0);this.transaction(()=>h.proposal={charges,total,deduction:Math.min(h.deposit,total),refund:Math.max(0,h.deposit-total),excess:Math.max(0,total-h.deposit),notes:text(input.notes),reviews:{},at:new Date().toISOString(),revision:(h.proposal?.revision||0)+1});},
  reviewSettlement(id,input){const h=this.handover(id),role=this.user.role==='owner'&&this.user.id===h.ownerId?'owner':this.user.role==='manager'&&this.user.id===h.brokerId?'broker':null;if(!role||!h.proposal||h.settledAt||!['approved','rejected'].includes(input.decision)||!text(input.notes))fail('Only assigned owner and broker may review a proposal with a reason.');this.transaction(()=>h.proposal.reviews[role]={accountId:this.user.id,decision:input.decision,notes:text(input.notes),at:new Date().toISOString()});},
  settleHandover(id){const h=this.handover(id);if(this.user.role!=='manager'||!this.stageEditor(h)||h.settledAt||h.proposal?.reviews.owner?.decision!=='approved'||h.proposal?.reviews.broker?.decision!=='approved')fail('Owner and broker approval are required.');this.transaction(()=>h.settledAt=new Date().toISOString());}
};
