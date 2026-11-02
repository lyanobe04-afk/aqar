// Presentation state only: moving between steps never saves domain records.
export const handoverSteps=[
 ['Select unit','Choose a unit or return to a saved handover.'],
 ['Manage inventory','Prepare the rooms, items and evidence for this unit.'],
 ['Assign participants','Check the owner, broker and tenant before starting the inspection.'],
 ['Check-in inspection','Record each incoming item, then confirm with both parties.'],
 ['Check-out inspection','Record the outgoing condition against the preserved check-in.'],
 ['Compare condition','Review changed conditions, missing quantities and supporting evidence.'],
 ['Review settlement','Propose charges, collect reviews and finalize a fictional settlement.'],
 ['Generate PDF','Download a clearly labelled sample report with the complete audit trail.'],
];
export const confirmed=stage=>!!(stage?.signatures?.manager&&stage?.signatures?.tenant);
export function stepCompletion(unit,items,h){return [!!unit,items.length>0,!!h,confirmed(h?.checkin),confirmed(h?.checkout),confirmed(h?.checkout),!!h?.settledAt,false];}
