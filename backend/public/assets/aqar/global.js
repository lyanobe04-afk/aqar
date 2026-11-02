// Shared demo concepts: ISO currencies are never exchanged or relabelled.
export const list = value => Array.isArray(value) ? value : String(value||'').split(',').map(v=>v.trim()).filter(Boolean);
export function countryCode(value,catalogue){return catalogue.countries.find(c=>c.code===value||c.name===value)?.code||({'Saudi Arabia':'SA','United States':'US','United Kingdom':'GB'})[value]||value;}
export function normalizeState(state,seed){
  if(!state.draft||Array.isArray(state.draft))state.draft={};
  state.settings={...seed.global.defaults,...state.settings};
  if((state.globalRevision||0)<3){
    for(const p of seed.properties.filter(p=>p.id.startsWith('p-global-')))if(!state.properties.some(v=>v.id===p.id)){state.properties.push(structuredClone(p));state.units.push(...structuredClone(seed.units.filter(u=>u.propertyId===p.id)));}
  }
  for(const p of state.properties){p.country=countryCode(p.country||'SA',seed.global);Object.assign(p,{currency:p.currency||'SAR',timeZone:p.timeZone||'Asia/Riyadh',publication:p.publication||(p.published?'published':'draft'),availability:p.availability||'available',listingType:p.listingType||'rent',ratePeriod:p.ratePeriod||(['Chalet','Farm','Rest house'].includes(p.category)?'night':'month'),minNights:p.minNights||1,amenities:list(p.amenities),region:p.region||'',postalCode:p.postalCode||''});}
  for(const kind of ['units','bookings','payments','contracts','expenses','maintenance'])for(const r of state[kind]){const p=state.properties.find(p=>p.id===r.propertyId);r.currency ||=p?.currency||'SAR';if(['bookings','contracts'].includes(kind)){r.timeZone ||=p?.timeZone||'UTC';r.country ||=p?.country||'SA';r.ratePeriod ||=p?.ratePeriod||'month';}if(kind==='units'){if(!r.id)r.id=`u-recovered-${r.propertyId}-${state.units.indexOf(r)}`;r.ratePeriod ||=p?.ratePeriod||'month';r.amenities=list(r.amenities);}}
  for(const a of state.accounts){a.country ||=a.preferences?.country||'SA';a.phoneCode ||=a.preferences?.phoneCode||'+966';}
  state.globalRevision=3;
}
export function zonedToday(zone='UTC',now=new Date()){const parts=new Intl.DateTimeFormat('en-US',{timeZone:zone,year:'numeric',month:'2-digit',day:'2-digit'}).formatToParts(now);const part=k=>parts.find(p=>p.type===k).value;return `${part('year')}-${part('month')}-${part('day')}`;}
export function validateZone(zone){try{zonedToday(zone);}catch{throw Error('Enter a valid IANA time zone.');}}
export function validatePhotos(photos){if(!Array.isArray(photos)||photos.length>4||photos.some(p=>!/^data:image\/(jpeg|png|webp);base64,/.test(p)||p.length>700000))throw Error('Use up to four small PNG or JPEG photos.');}
export function globalProperty(input,old,seed){
  const p={...old,...input};p.country=countryCode(p.country||'SA',seed.global);
  p.currency ||=old?.currency||'SAR';p.timeZone ||=old?.timeZone||'Asia/Riyadh';validateZone(p.timeZone);
  if(!seed.global.countries.some(c=>c.code===p.country))throw Error('Select a supported country.');
  if(!seed.global.currencies[p.currency])throw Error('Select an ISO currency.');
  p.publication=input.publication??(input.published===undefined?old?.publication:(input.published===false||input.published==='false'?'draft':'published'))??'published';p.published=p.publication==='published';
  p.availability ||= 'available';p.listingType ||= 'rent';p.ratePeriod ||= ['Chalet','Farm','Rest house'].includes(p.category)?'night':'month';
  if(!['draft','published','unpublished'].includes(p.publication)||!['available','unavailable','maintenance'].includes(p.availability)||!['rent','sale'].includes(p.listingType)||!['night','week','month','year'].includes(p.ratePeriod))throw Error('Choose valid property statuses and rental duration.');
  p.minNights=Number(p.minNights||1);if(!Number.isInteger(p.minNights)||p.minNights<1)throw Error('Minimum stay must be positive.');
  for(const [key,limit]of [['latitude',90],['longitude',180]])if(p[key]!==undefined&&p[key]!==''){const n=Number(p[key]);if(!Number.isFinite(n)||Math.abs(n)>limit)throw Error('Enter valid coordinates.');p[key]=n;}
  p.amenities=list(p.amenities);p.photos ||= [];validatePhotos(p.photos);if(p.photos.length)p.cover=p.photos[0];
  return p;
}
export function bookable(property,unit){return property?.published&&property.availability==='available'&&property.listingType!=='sale'&&unit&&!['maintenance','unavailable'].includes(unit.status);}
export function bookingAmount(unit,property,start,end){const days=(Date.parse(end)-Date.parse(start))/86400000;if(days<Number(unit.minNights||property.minNights||1))throw Error('The date range is shorter than the minimum stay.');const divisor={night:1,week:7,month:30,year:365}[unit.ratePeriod||property.ratePeriod];return Number((unit.price*days/divisor).toFixed(new Intl.NumberFormat('en',{style:'currency',currency:property.currency}).resolvedOptions().maximumFractionDigits));}
