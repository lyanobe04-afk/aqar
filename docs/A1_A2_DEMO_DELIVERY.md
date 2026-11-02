# Aqar A1/A2 interactive demo delivery

2 November 2026. Implements the approved relationships and unit-inventory/handover priorities from the master gap analysis. All records, confirmations, signatures, valuations and settlement are local simulations. No business database schema, CMS, API, live payment or legally binding signature was added.

## New journey

Open **Unit inventory & handover** from any role's navigation. Website routes are `/handover`, `/owner/handover` and `/tenant/handover`; Flutter uses the same paths in its navigation. The previous property-level furniture and generic inspection pages remain available, preserving their existing records.

1. Primary manager chooses a unit and assigns its property owner and delegated broker accounts. The existing manager is the primary demo administrator; additional broker accounts can be registered with the manager/broker role. Delegated managers see assigned properties. Owners review their handovers; tenants see handovers for their own bookings.
2. Manager/broker creates unit inventory with room, item, whole quantity, condition, value in property currency and up to four small photos per item. Items can be edited or deleted; a snapshotted item cannot be deleted. Existing property/unit forms also include structured furnishing and an optional equipment/finishing description, without guessing the unclear handwritten taxonomy.
3. Manager starts one paired handover for an approved/confirmed booking, entering a fictional deposit and explicit editable assumptions. The unit, booking, optional existing sample contract, owner, designated broker, tenant, currency, time zone, participant names and full inventory are snapshotted. An existing legal lease is not invented when there is only a booking.
4. Record every incoming item condition, present quantity, notes and optional evidence. Tenant and designated broker type their own account name and acknowledge a **simulated signature**. The first confirmation locks the stage; both confirmations are required to begin check-out.
5. Check-out starts a new observation set without copying incoming notes/photos as outgoing evidence. Record every item again. Both parties confirm the outgoing inspection.
6. Compare incoming and outgoing quantity/condition and photos; missing quantity and changed items are derived. Proposed charges are entered manually, with a reason, rather than calculated as automatic legal liability. Unchanged items cannot receive a charge.
7. Assigned owner and designated broker approve/reject the same proposal revision with reasons. Changing the proposal clears prior approvals. Finalization requires both approvals and locks the fictional settlement. Payments, expenses and original booking/contract amounts are unaffected.
8. Any assigned participant can download a sample PDF including inventory baseline, observations, evidence, confirmations/timestamps, comparison, proposed settlement, reviews and final/draft status. Reports are generated entirely on the device. English and Arabic report output are supported; report values remain in their original currency.

## Demo assumptions requiring client approval

- One owner per property; one designated broker and one tenant per handover; the property can have multiple delegated brokers. The primary manager can oversee all demo properties. Broker and manager remain one account role.
- Owner property editing remains disabled pending the permission decision in the master review. The owner can review settlement for their snapshotted handovers.
- One paired handover per booking. Snapshots retain the original participants even if property assignments later change. No legal lease lifecycle is implied by the booking link.
- Item value is per item in original property currency. No FX conversion. Booking and item currencies must agree before handover.
- Present quantity must be a whole number within the original baseline; zero requires the missing condition. Conditions are good, worn, damaged or missing as appropriate. Photos/notes can document detail beyond these labels.
- All item observations must be recorded before confirmation. The first signature locks the stage; editing signed reports/reopening/amendments are not part of this demo. This confirmation rule needs client validation before production.
- Charges are manual estimates. There is no approved depreciation, wear-and-tear, repair/replacement or liability formula. A change in condition/quantity is necessary for a proposed charge, but does not itself establish liability.
- Fictional deduction is capped at the entered deposit. Refund is the remainder; excess is informational only. Finalization moves no money and creates no accounting entry. Disputes, legal enforcement, refunds and tax rules remain unimplemented.
- Signatures are typed-name confirmations with role, account and UTC timestamp, always marked simulated. They do not verify identity or execute a contract. Time zone is preserved on the report; timestamps explicitly use UTC.
- Existing owner/tenant records without login accounts must be linked through an actual local registered account/property/booking before the complete confirmation journey. The UI returns an explanatory error rather than creating inaccessible approvals.
- Room and equipment names are editable demo descriptions. Original handwritten examples, final taxonomy, country-specific policies and optional country-linked city catalogue remain client decisions; this delivery does not claim to close every A1 subitem or all 15 master sections.

## Preservation and limits

Store version 2 is retained. New collections initialize in existing local stores without resetting accounts, preferences or records. Legacy property-level furniture is not silently assigned to a guessed unit. Original exports, gallery, `.env`, migrations and MySQL are unchanged. Local website and Flutter stores remain independent; changing a record on one does not update the other.

Local data is not secure or tamper-proof. Media and PDF generation are subject to device storage/memory; use fictional information only. Browser/native role filtering is a demonstration, not server authorization. Camera/file-save behavior on physical Android/iOS devices still requires device acceptance. PDFs are samples, not certified archives; web reports rasterize Unicode text/evidence, while Flutter reports embed fonts and text.

## Verification

- Batch A1/domain: inventory create/edit/delete validation, persistence, scoped broker access and assignment checks.
- Batch A2/domain: full manager → tenant → manager → tenant → broker/owner review → fictional settlement, immutable baseline, protected deletion, revision invalidation and no payment/expense mutations.
- Website actual UI journey: existing fictional London/GBP booking; two Oak chairs, GBP100 per item, local sample attachment, GBP150 deposit, manager and tenant confirmations, outgoing quantity one/damaged, owner and broker approval of GBP100, final fictional GBP50 refund. Actual downloaded two-page A4 PDF was rendered and visually inspected. The existing architectural image was used solely to exercise attachment mechanics; it is not evidence of a real chair.
- Flutter actual browser journey: A-102/b1, two chairs, SAR150 deposit; item observations, manager and tenant confirmations, one missing/damaged outgoing chair, SAR100 proposal, broker and owner approval, final SAR50 fictional refund. English/Arabic views were captured, and an actual Arabic PDF was downloaded and rendered. Mixed-direction report comparisons were refined to separate before/after labels.
- Laravel: 74 tests / 381 assertions passed; Blade compilation passed.
- JavaScript: 23 tests passed, including the four new A1/A2 domain scenarios.
- Flutter: 207 tests passed; the four focused A1/A2 tests were rerun successfully after the final assignment/PDF refinements; analysis clean; final release web build succeeded. New tests cover assignment, cross-role snapshots/observations/reviews, guarded mutations, EN/AR PDF bytes, and phone form cancel/save/create actions.
- HTTP audit: 92 pages, 765 links, 487 asset references; no failures.
- Parity/preservation: shared assets matched, 24 design references, seven palette colors, 26 images/four fonts, 113 protected files unchanged.

Sample reports: [actual website export](qa/handover/web-sample-inspection.pdf), [verified Flutter English report](qa/handover/flutter-verified-en.pdf), [verified Flutter Arabic report](qa/handover/flutter-verified-ar.pdf). Rendered UI proof is saved in `docs/qa/handover/`.

## Main changed files

- Website: `backend/public/assets/aqar/handover-store.js`, `handover-ui.js`, `inspection-pdf.js`; integration in `demo-store.js`, `demo-app.js`, `demo.css`; three named presentation routes through `backend/config/demo.php`.
- Flutter: `mobile/lib/demo/services/handover_store.dart`, `inspection_pdf.dart`; `screens/handover_workspace.dart`; navigation/store integration and furnishing fields; offline `pdf` dependency and lockfile.
- Shared Arabic labels: `demo/handover-i18n.json`, merged into canonical translations by `tools/sync_demo_assets.py`; copied web/mobile translation assets.
- Tests: `backend/tools/ui/handover-store.test.mjs`, `mobile/test/handover_test.dart`; existing test suites retained.
- Documentation: this delivery report, demo guide/checklist and a dated delivery pointer in the original master gap analysis.

The original gap analysis remains the requirements baseline. A3-A7 and Track B are not claimed complete by this delivery.
