# Aqar master requirements gap analysis

Delivery update: the user subsequently approved Track A priorities A1/A2. See [the dated demo delivery report](A1_A2_DEMO_DELIVERY.md) for changes since this baseline; the original audit below is preserved.

Review date: 2 November 2026. Status: scope proposal for approval; no application changes authorized or made by this review.

## Reference, method and status definitions

The master reference is [Aqar.pdf](Aqar.pdf), a single unusually tall PDF page containing **15 numbered sections**, not 15 PDF pages. I reviewed the entire rendered diagram in enlarged left/right segments, including Arabic branches and the notes, and compared it with both current frontend implementations. PDF SHA-256: `A02153262C4C5A8F39591392D82E9FE330BED67DD42D580A6B3A4F4E708E9BD8`.

**Aqar is a worldwide property management platform.** Saudi examples, SAR defaults and a Riyadh photograph do not define its market. The PDF explicitly expands worldwide languages, currencies and regional behavior in section 14. Section 13's older EN/AR design guidance is a current subset, not a restriction on the master scope.

Each row below identifies actual coverage, rather than treating a screen name or a passing navigation test as completion:

- **Full (demo):** the described local interaction exists in both frontends unless a difference is stated. This never means production readiness.
- **Partial:** some UI/data/actions exist, but one or more PDF requirements are absent or simplified.
- **Missing:** no substantive implementation found. Static original design content does not count as an interactive feature.
- **Clarify:** the PDF explicitly flags uncertain source details or leaves the business rule undefined. No values or rules are inferred.
- **Production missing:** a real shared service, secure authorization, persistence, integration or operational guarantee is absent. Existing Laravel framework scaffolding does not satisfy these requirements.

This is a requirements/code review, not a new acceptance-test run. Prior verified results are documented in [GLOBAL_UPGRADE.md](GLOBAL_UPGRADE.md): 71 PHP tests/372 assertions, 19 JS tests, 203 Flutter tests; an HTTP audit of 89 pages/762 links/472 asset references. Those results demonstrate existing tested behavior, **not completion of the PDF**. Native Android/iOS acceptance remains unverified.

## Current architecture and evidence index

| Evidence | Files inspected and what they establish |
|---|---|
| E1 - website delivery | `backend/routes/web.php`, `backend/config/manager.php`, `backend/config/demo.php`, `backend/app/Http/Controllers/Manager/ScreenController.php`: GET presentation routes, shared seed/route configuration, 24 original manager reference views plus interactive role/account pages. No business API. |
| E2 - website workflows | `backend/public/assets/aqar/demo-app.js`: `wizard`, `propertyDetails`, `listRecords`, `people`, `inspection`, `finances`, action/form handlers. Downloads are sample TXT/CSV or browser print, not an archived PDF workflow. |
| E3 - website domain | `backend/public/assets/aqar/demo-store.js`, `global.js`: local transactions, role filtering, property/unit CRUD, bookings, simulated payments/contracts, maintenance, generic inspections, per-currency totals and preferences. |
| E4 - Flutter shell/account | `mobile/lib/demo/interactive_app.dart`, `interactive_page.dart`, `screens/account_screens.dart`, `widgets/login_layout.dart`, `welcome_layout.dart`: local role routing, account forms, settings, EN/AR and responsive presentation. |
| E5 - Flutter workflows | `mobile/lib/demo/screens/property_screens.dart`, `record_screens.dart`, `widgets/record_dialogs.dart`, `booking_property_fields.dart`: property wizard, unit dialogs, bookings, sample contract/download, property-level furniture and generic inspection UI. |
| E6 - Flutter domain | `mobile/lib/demo/services/demo_store.dart`, `global_support.dart`: SharedPreferences/local records; analogous domain validation and original-currency amounts; offline IANA time-zone data. |
| E7 - global configuration | `demo/global.json`, `seed.json`, `i18n.json`, `tools/sync_demo_assets.py`: 244 country/region choices, 152 currencies, English/Arabic only enabled, fictional international properties and copied frontend assets. |
| E8 - verification/preservation | `backend/tools/ui/{demo-store.test.mjs,global-store.test.mjs,verification.json}`, `backend/tests/Feature/DemoPagesTest.php`, `mobile/test/{demo_store_test.dart,global_store_test.dart,interactive_widget_test.dart}`, `mobile/tools/verification.json`, previous QA captures. Earlier preservation check: 113 protected files unchanged. |
| E9 - backend baseline | `backend/app/Models/User.php` and framework user/cache/jobs migrations exist. No Property, Unit, Lease, Payment, MaintenanceRequest, InventoryItem or InventoryReport business models/migrations/services were found. Database contents and `.env` were not inspected or changed. |

Website storage (`aqar.interactive.v2`) and mobile storage (`aqar.mobile.interactive.v2`) are **separate local simulations**. They do not synchronize users, preferences, inventory, bookings or payments. The website embeds the fictional seed in a public presentation response; client-side role guards are not a security boundary.

## Executive findings

The current product is a useful international interactive frontend foundation, not a completed implementation of the master requirements. None of the broad operational modules should be marked fully complete against the PDF's production scope.

**Already working at demo level:** three role workspaces; local accounts/profiles; EN/AR/RTL; country/currency/time-zone preferences; six-step property editing; units; tenant search/booking; original-currency simulated collections; owner portfolio filtering; maintenance approvals; financial summaries.

**Largest missing journeys:** section 9's unit inventory → check-in → check-out → comparison → damage review → settlement → PDF archive; contract renewal/signatures; installment schedules/invoices/deposits/commissions; broker-owner delegation; technician assignment; CRM/leads/messages; the five additional named languages and property-content translations.

**Important mismatches:** owner add/edit property permission is described in the PDF but currently manager-only; furniture/inspection records are property-level rather than unit/lease/item snapshots; owner contract lists are not a dedicated implemented journey; native builds and shared API/MySQL workflows are absent. Existing report/navigation screens do not compensate for these gaps.

## 01 - Project scope / نطاق المشروع

| PDF requirement | Web / Flutter status | Remaining scope |
|---|---|---|
| Laravel website; Flutter iOS/Android | Full (demo website and Flutter source/Chrome preview); native distribution partial | Android/iOS source scaffolds exist; native builds, permissions, device QA, signing and release remain. E1/E4/E8. |
| Shared Laravel API + MySQL | Missing in both | Separate production project phase: business schema, services, API contracts, shared identities/data and synchronization. Framework installation is not this implementation. E1/E9. |
| Worldwide multilingual RTL/LTR | Partial in both | EN/AR implemented; FR/ES/DE/ZH/HI and other approved markets missing. See section 14. |
| Villas, apartments, floors; furnished/unfurnished; residential/commercial | Partial in both | Category choices include villas/apartments/commercial and other demo types. Explicit floor-as-property category and structured furnished/unfurnished classification are absent; rooms/amenities are not substitutes. E2/E5/E7. |
| Owner, broker/manager, tenant | Full (three demo roles) | Production permissions and broker delegation missing. Broker/manager is currently one role, not two separate permission models. |

## 02 - Login and permissions / الدخول والصلاحيات

| PDF requirement | Web / Flutter status | Remaining scope |
|---|---|---|
| Login, registration, profile/account management | Full (demo core) in both | Local credentials and sessions only; production identity verification, secure recovery, server sessions/tokens and account lifecycle missing. E2-E6. |
| Password recovery (PDF marks screen as proposed) | Full (explicit local simulation) in both | No verified email/SMS delivery, expiring server reset token or abuse protection. |
| Role-based access | Partial in both | Client role routing/filtering exists; server authorization and tests against cross-user/resource access missing. Public seed includes other fictional users' data. |
| Broker linked to owner and properties | Partial in both | `ownerId` links property to owner; no explicit broker assignment, owner invitation, delegated rights or revocation. |
| Property- and unit-scoped permissions | Partial in both | Owners filtered by property; tenants by bookings/property links. No granular unit access grants, delegation history or server enforcement. |

## 03 - Owner screens / المالك

| PDF branch | Web / Flutter status | Missing or incomplete requirement |
|---|---|---|
| Dashboard: revenue, occupancy, vacant units, late payments, maintenance approvals | Partial in both | Income, occupancy and approval data exist; dashboard does not reproduce every requested vacancy/late-payment metric and drilldown. Collection is a simulated verified-payment sum, not accounting revenue. |
| My properties/buildings, property/unit details, occupancy | Partial in both | Assigned portfolio/details/occupancy exist; full owner unit workflow and requested owner property add/edit permission absent (manager-only today). |
| Contracts: active, upcoming, expired, details | Partial in both | Shared contract records and sample details exist; no dedicated owner contract navigation/list with all lifecycle groupings and links. |
| Furnished-unit inventory; receive/return comparison; approve damage deductions | Partial inventory view; comparison and deductions missing | Owner sees property-level items only. No unit snapshots, comparison or settlement approval. |
| Maintenance requests; approve quotation/budget | Partial in both | Pending request approve/reject and estimated cost exist. No separate quotation, approved budget, variation or invoice approval. |
| Financial reports: income, expenses, by property, export | Partial in both | Per-currency totals, property rows and sample CSV exist. No complete property/date/currency report filtering or archived financial PDFs. |
| Owner data, bank accounts, linked brokers | Partial in both | Basic local profile exists; banking and broker relationship settings missing. Do not collect real banking details in the current demo. |

## 04 - Broker / manager screens / الوسيط ومدير العقار

| PDF branch | Web / Flutter status | Missing or incomplete requirement |
|---|---|---|
| Dashboard: vacancies, expiring contracts, arrears, urgent maintenance, commissions | Partial in both | Generic operational/financial metrics exist. Explicit expiring-lease alerts, commission computation and the complete requested widget set are missing. |
| Property list; add/edit unit; vacant/rented/reserved/maintenance; prices/specifications/furnishing | Partial in both | CRUD, rates, area, rooms, media, amenities and operational status exist. Reserved/rented lifecycle is not a fully synchronized booking/lease state model; structured furnishing missing. |
| Rental applications, permitted review, current tenants, payment history | Partial in both | Instant/request bookings, approve/reject, tenant list and payments exist. No full rental application dossier, screening workflow or defined application-to-lease process. |
| Create, electronically sign, renew, terminate contract | Partial creation/status; signing/renewal missing | Draft/title from booking and manual status changes exist; no renewal linkage, amendment/version history, termination calculation or signatures. |
| Invoices, record payment, follow arrears, commissions | Partial in both | Simulated receipts/verification and derived outstanding amounts exist. Invoice lifecycle, installment due dates, reminders and commissions missing. |
| Receive maintenance, assign technician, update status, costs | Partial in both | Request/status/cost/comments/photos and completion expense exist. Technician directory/assignment, unit link, SLA and work-order tracking missing. |
| Inventory items, furniture photos/condition, check-in and check-out reports | Partial in both | Item creation and simple condition update exist; item photos/unit linkage/baseline and both inspection reports missing. |
| Leads: enquiries and visit scheduling | Missing in both | No lead pipeline, enquiry records or appointment calendar. |

## 05 - Tenant screens / المستأجر

| PDF branch | Web / Flutter status | Missing or incomplete requirement |
|---|---|---|
| Dashboard: upcoming rent, maintenance status, alerts | Partial in both | Booking/payment/maintenance summaries and local notices exist; no true next installment schedule or due-rent reminder engine. |
| My contract: details, start/end, rent, PDF download | Partial in both | Sample contract details and dates/amount exist; download is a fictional TXT, not contract PDF or signed archive. |
| Dues, payment history, invoices, electronic payment/bank transfer | Partial simulated records; invoices/live payment missing | No bank reconciliation, processor, payment intent, refund or real transfer receipt validation. |
| Maintenance: create, describe, photos, follow status | Full (basic property-level demo) in both | Unit/lease linkage, production storage/notifications and complete state lifecycle remain. |
| Furniture list, confirm check-in condition, notes/photos, electronic signature, check-out report | Partial generic inspection; item confirmation/signature/check-out missing | Inspection notes/photos/overall condition are not per-item intake acceptance or a paired outgoing report. |
| Chat with broker or owner | Missing in both | Maintenance comments exist, but are not a general conversation inbox/chat. |
| Rent due, maintenance changes, messages notifications | Partial in both | Local event notifications/read state exist; scheduled rent alerts, message events, push/email/SMS missing. |

## 06 - Property and unit management / إدارة العقارات والوحدات

| PDF requirement | Web / Flutter status | Remaining scope |
|---|---|---|
| Property/building owner, address/city, type, child units | Full (basic demo fields/relationship) in both | Multi-owner interests and building/floor hierarchy are not defined/implemented. Country-specific validation remains partial. |
| Unit number/name, rooms, bathrooms, area, rental value, photos, state | Full (core demo create/edit/detail) in both | Full validation/uniqueness, secure media persistence and concurrency are production work. |
| Furnished/unfurnished | Missing as structured field in both | Amenities and inventory do not provide a reliable furnished classification. |
| Add/edit/detail/status operations | Full (demo core) in both | Protected deletion also exists. Publication and operational availability are independent. Leased/reserved transitions still need one agreed state model. |
| International property forms and original currency | Full (core demo country/currency/time-zone inputs) in both | Dependent country-city catalogue, configurable categories/equipment and country-specific form rules missing. |

## 07 - Contracts and finance / العقود والمالية

| PDF requirement | Web / Flutter status | Remaining scope |
|---|---|---|
| Contract creation | Partial in both | Derived fictional record from approved/confirmed booking; no full lease parties, clauses, deposit, obligations or versioning. |
| Signature | Missing in both | No drawn/signature confirmation UI, identity evidence or legal execution service. A future demo signature must remain explicitly non-binding. |
| Renewal | Missing in both | No next term, recalculation, prior-lease link or approval. |
| Termination | Partial in both | Manual `terminated` status only; no notice/effective date, final invoice, release or settlement. |
| PDF archiving | Missing in both | Web print/TXT sample and mobile TXT are not generated/stored/permissioned PDF archives. |
| Installment schedule, due dates, overdue rent | Partial in both | Booking start/date and aggregate outstanding balance are used; no installments, partial-allocation schedule, aging or rescheduling. |
| Invoices and receipts | Partial receipt-like simulated records; invoices missing | No numbered invoice/receipt documents, line items, taxes, credit notes or issue/void lifecycle. |
| Deposits / التأمينات | Missing in both | No deposit ledger, held/refunded balances or linkage to damage deductions. |
| Expenses | Partial in both | Seed expenses and completion-generated maintenance expense exist; general expense entry/approval/attachments and allocation missing. |
| Commissions / العمولات | Missing in both | No broker terms, percentage/fixed base, accrual, payout or statement. |
| Profit/loss reports | Partial in both | Verified receipts minus simple expenses, grouped by currency. Not accrual accounting, tax reporting or complete P&L. |
| Production finance | Production missing | Exact-money representation, ledger/audit controls, transactions, idempotency, reconciliation and authorized adjustments must be designed separately. |

## 08 - Maintenance / الصيانة

| PDF requirement | Web / Flutter status | Remaining scope |
|---|---|---|
| Unit and tenant linked request | Partial in both | Property/tenant linked; explicit unit and lease/request context absent. |
| Description and photos | Full (small local demo attachments) in both | Secure file upload/storage and evidence retention absent. |
| Priority | Full (demo field) in both | PDF labels priority as a design proposal; confirm required levels/escalation rules. |
| New → in progress → resolved → closed | Partial in both | Current statuses are pending approval/approved/rejected/in progress/completed. Separate resolved/closed and controlled transition/reopen rules missing. |
| Technician assignment | Missing in both | No technician records or work orders. |
| Approvals and cost | Partial in both | Owner approves estimated request and completion creates one expense; no quotation/budget/cost revisions or settlement. |
| Status notifications | Partial in both | Local in-app notices/comments exist; reliable cross-device delivery and dispatch missing. |

## 09 - Furniture inventory and inspection / جرد الأثاث والفحص - الميزة المحورية

This is explicitly labelled **the central feature** in the PDF. Current furniture and inspection pages do not complete it.

| PDF subrequirement | Web / Flutter status | Exact gap |
|---|---|---|
| Prepare unit inventory: room, item, quantity | Partial in both | Records have room/name/quantity but link to property, not a specific unit. No lease-specific snapshot. |
| Item value, photos, original condition | Partial condition only | No item valuation/currency, item photo set or immutable baseline condition. Updating condition overwrites one value. |
| Check-in: inspect every item | Missing | Generic property inspection cannot record per-item findings against an inventory version. |
| Present / damaged / missing | Partial | Generic good/damaged/not-assessed values; no per-item present/missing quantity/status at check-in/out. |
| Check-in notes/photos | Partial | Overall notes/photos exist, not item-level evidence or a check-in stage. |
| Tenant confirmation | Missing | No acceptance/rejection or disputed items. |
| Both parties sign | Missing | No signatures or dated sign-off snapshots. |
| Check-in PDF report | Missing | No inventory report generation/archive. |
| Check-out: reinspect items; document damage/loss; notes/photos | Missing paired workflow | Generic inspection capture exists but cannot pair an outgoing inspection with the signed incoming baseline. |
| Check-out signatures | Missing | No parties/sign-off status. |
| Comparison: incoming state, outgoing state, differences | Missing | No before/after matching, quantity deltas or comparison screen. |
| Damage estimation | Missing | No valuation, wear-and-tear, repair/replacement calculation or disputed amount. |
| Owner/broker review | Missing | Maintenance approval is a separate workflow, not approval of inventory differences or damages. |
| Deposit deduction under contract | Missing | No settlement proposal, approval, deposit ledger, refund or dispute workflow. |
| PDF reports, photo history, saved signatures, authorized-only archive | Missing as a complete archive | Local generic photos/history and role filters are insufficient; no immutable unit/lease evidence package or secure archive. |

Proposed demo boundary: unit inventory and dated snapshot records, paired inspections, explicit simulated confirmations/signatures, comparison, a fictional settlement calculation and sample PDF. Real legal signatures, money movement and enforceable deposit decisions belong to a separately approved production phase.

## 10 - Communication and reports / التواصل والتقارير

| PDF requirement | Web / Flutter status | Remaining scope |
|---|---|---|
| CRM: owners and tenants | Partial in both | Add/list/view fictional people; no complete edit/archive/identity/contact dossier or relationship history. |
| CRM: brokers, leads, communication log | Missing in both | One seeded manager role is not broker CRM; no lead/contact activity timeline. |
| Messaging | Missing in both | Maintenance comments only. |
| Notifications | Partial in both | Local event lists/read markers/preferences; no delivery/scheduling/retention service. |
| Occupancy, revenue, arrears reports | Partial in both | Basic derived summaries and rows exist; no complete date/property/currency filters, aging or historical snapshots. |
| Maintenance reports | Partial in both | Request list/export exists; no dedicated cost/status/technician/SLA analytics. The operational report route largely reuses financial rendering. |
| Inventory reports | Partial list/export; missing inspection reporting | Furniture CSV does not provide incoming/outgoing comparison, damage totals or signed PDFs. |

## 11 - Data model / نموذج البيانات

| PDF entity | Local representation | Production status / required design |
|---|---|---|
| User | Accounts/owners/tenants arrays | Partial framework User scaffold; business relationships/delegation and secure identity missing. |
| Property | Property maps and `ownerId` | Missing business model/table/API and ownership history. |
| Unit | Maps linked by `propertyId` | Missing model/table/API, unique identifiers and effective availability constraints. |
| Lease | Simplified `contracts` from booking | Missing complete lease aggregate, lifecycle/versioning and payment schedule. |
| Payment | Simulated maps linked to booking | Missing ledger, invoice allocations, verified processing and reconciliation. |
| MaintenanceRequest | Maps with property/tenant/comments/photos | Missing unit/technician work order and backend lifecycle. |
| InventoryItem | Simplified property-level furniture maps | Missing unit inventory/value/media/baseline schema. |
| InventoryReport | Generic property inspection maps | Missing paired item-level report/snapshot/signatures/comparison/settlement aggregates. |

The PDF explicitly says relationships and permissions require further detail before programming. Do not generate business migrations from these names alone. Worldwide locale/currency fields and exact-money representation must be included in the approved schema; section 14's proposed field names are requirements guidance, not existing columns.

## 12 - Development roadmap / خارطة التطوير

| PDF phase | Current status |
|---|---|
| 1 Foundations: login/permissions, users, properties/units | Partial: strong local demo foundation; delegated roles and production foundation missing. |
| 2 Operations: contracts, payments, maintenance | Partial: simplified simulations; full lease/financial/work-order lifecycles missing. |
| 3 Inventory: items, check-in/out, comparison and PDF | Mostly missing: basic list/condition and generic inspection only. Highest-value next demo scope. |
| 4 Reports/improvements: dashboards, reports, notifications/messages, testing/beta | Partial: responsive/demo tests and basic reports exist; messaging, complete analytics and production/native beta acceptance missing. |

Recommendation below preserves these dependencies while making the central inventory journey the next client-visible priority. The PDF roadmap is not authorization to start backend implementation during this review.

## 13 - Website and mobile design plan / خطة التصميم - موقع وتطبيق

| PDF requirement | Web / Flutter status | Remaining scope |
|---|---|---|
| Shared login/profile/alerts | Full (basic demo UI) in both | Production delivery/security separate. |
| Website detailed dashboards/tables/reports, property/contract management | Partial | Property management works; full report and lease requirements remain as above. |
| Mobile simplified dashboard and maintenance | Full (basic demo UI) | Native device and accessibility acceptance still required. |
| Mobile furniture photography, check-in/out and signatures | Partial local generic photo picker; principal journey missing | No item-level capture, dedicated intake/return or signing. Camera/native permissions unverified. |
| Arabic RTL and English LTR | Full (supported demo locales/layout direction) | Complete content/template translation and future locales remain partial under section 14. |
| Screen allocation | Clarify/design decision | PDF itself states the website/mobile division is a design decision, not an explicit original-document prescription. Confirm parity vs mobile simplification; retain working screens. |

## 14 - Worldwide languages, currencies and internationalization / اللغات والعملات والعالمية

| PDF subrequirement | Web / Flutter status | Remaining scope |
|---|---|---|
| Extensible localization without changing application code | Partial | Catalogue/dictionary mechanism exists, but controls/direction/formatting still assume EN/AR in places; new locale configuration alone does not prove support. Flutter fonts/delegates must be validated. |
| Arabic and English | Full (enabled demo interface locales) | Locale QA does not imply every dynamic user string/notification or legal document is translated. |
| French, Spanish, German, Chinese, Hindi; others by market | Missing translations in both | Confirm launch priorities; add real dictionaries, suitable fonts, formatting, direction metadata and coverage tests. Do not show untranslated locale choices as completed. |
| Select language in website/app and save account preference | Full (EN/AR demo) | Preferences are per local account/device, not shared between apps. |
| Translate screens/messages/notifications/templates | Partial | UI dictionaries exist; dynamic notification composition and document templates/content are not comprehensively localized. |
| Translated property descriptions with fallback | Missing structured translation workflow | Selected seeded `nameAr` values and interface fallback exist; no locale/entity/field content records or translated description editing. |
| RTL/LTR forms and icons | Full for current EN/AR demo layouts | Other direction/locale combinations need an extensible model and QA. |
| Extensible ISO 4217 list including SAR/USD/EUR/GBP/AED/KWD/QAR | Full (current demo catalogue/options) | 152 codes configured; catalogue maintenance/validation is not a production currency service. |
| Preferred display currency saved per user | Full (preference); converted display missing | Current preference filters summaries; amounts remain original. This avoids false conversion but does not satisfy the requested converted display. |
| Original property, contract and invoice currency | Partial | Properties/units/bookings/contracts/payments/expenses retain codes; there is no invoice entity. Contract currency derives from booking rather than a full lease editor. |
| FX source, timestamp, estimated original/converted display | Missing by deliberate prior demo scope | No exchange-rate records/provider/rate source/time. Can later use clearly dated fictional rates in an approved demo; real provider integration separately approved. |
| Preserve contract/payment originals when changing display currency | Full (demo behavior) | Currency changes on properties with history are blocked. Production immutable ledger still missing. |
| Currency rounding; store money as Decimal/integer units | Partial | Display/proration uses currency fraction digits; storage/calculation uses JS Number/Dart num, not a fixed-point ledger. |
| Cross-border payments and fees by gateway/country | Missing | No live payment integration, method eligibility, fee/settlement rules or cross-border reconciliation. |
| Country/city/time zone per user/property | Partial | Country and time-zone fields exist; user city/profile-region setup and country-linked city catalogue incomplete. Property city is free text; browse choices derive from records rather than a dependent worldwide city list. |
| Dates, numbers, separators | Partial | Three date formats and EN/AR formatting exist; not a complete locale-specific date/calendar/number policy. |
| DST and due dates | Partial | IANA property-day booking checks exist; no installment due-time/DST scheduler. |
| m² / ft² | Full (demo preferences/input conversion/display) | Production storage precision policy remains to be approved. |
| Country-sensitive addresses and phones | Partial | Flexible region/postal/coordinates and editable prefix exist; no country-specific required fields/phone validation; web/native address presentation differs. |
| Country-specific contracts, taxes, payment methods | Missing | Requires market selection, reviewed templates and country policy configuration; no universal legal assumptions. |
| Language/currency selectors in registration/settings and screens | Partial | Language switch/settings and country registration exist; preferred currency is set in settings, not a full registration selection; property/unit currency input exists, full lease currency authoring missing. |
| Admin management of translations/currencies/countries (proposed extension) | Missing UI; configuration files exist | Separate optional admin scope. Do not build a CMS merely to satisfy a proposed extension without approval. |
| Data/API: users locale/preferred currency/timezone; property country/currency; lease/payment currencies | Partial local equivalents; production missing | No corresponding business tables or APIs. |
| Translation records; exchange rates base/quote/rate/provider/updated_at | Missing | Need localized-content model and immutable quoted-rate snapshots if conversion is approved. |
| API Accept-Language/locale-aware responses | Missing | No business API currently exists. |
| Permissions/audit for FX and original-currency edits | Partial demo guard | History protection exists; no privileged adjustments, audit trail or administrative policy. |
| Global architecture now; staged languages/countries/payments/legal rollout | Partial architectural preparation | Prioritize explicit launch locales/markets. Global design does not mean every market is legally/payment enabled. PDF notes this is an updated project decision/addition. |

## 15 - Notes / ملاحظات

The PDF adds four note groups. They are requirements/clarification instructions, not proof of extra source documents in this repository.

| Note group and leaf requirements | Coverage and gap |
|---|---|
| 15.01 First sheet/example: illustrative property, type, location/neighborhood, area, rooms/baths, furnishing/equipment/air-conditioning, price/rent/deposit/commission, detail and add/edit screens | Partial: fictional examples, locations, unit area/rooms and price editing exist; structured equipment/furnishing/AC and deposit/commission missing. Property aggregate area/room definitions need confirmation. Exact handwritten example figures are not present in this PDF and must not be invented. |
| 15.02 Second sheet/settings: country dropdown, country-linked city, global currency/language lists and RTL/LTR; manageable property types, furnishing/finishing/equipment by type; owner/broker/tenant data; link options to property/contract/user forms | Partial: country/currency and EN/AR settings work. Country-linked city choices, manageable taxonomy/equipment options, complete broker data and full contract form binding missing. The furnishing/finishing/equipment wording is explicitly flagged by the PDF for confirmation. |
| 15.03 Third sheet/workflow: owner monitoring/management; broker acts on behalf of owner within permissions; tenant housing/lease/requests; role-specific property/unit links; connect contracts/payments/maintenance/inventory | Partial: three local role flows and some links exist. Delegated broker rights, owner editing rules, complete lease and inventory relationships missing. PDF says operational explanation is not a final technical plan before review. |
| 15.04 Traceability/preservation: first=example, second=settings, third=explanation; preserve prior map; confirm unclear fields/values/numbers; map every item to website/app | This report provides a section-by-section traceability baseline and preserves existing work. Client confirmation and original handwritten sheets remain outstanding. Existing behavior should be extended, not discarded. |

## Clarifications required before implementation

The typeset Arabic in this PDF is readable after enlargement. It **refers to unclear handwriting in underlying first/second/third sheets**, but those handwritten originals are not embedded in the supplied map. I cannot validate their exact labels, numbers or price/deposit/commission figures from this PDF.

| ID | Question / decision | Why it blocks detailed scope |
|---|---|---|
| C1 | Provide/confirm the referenced example/settings/workflow sheets and exact handwritten fields/numbers. Which furnishing/finishing/equipment/AC labels are intended? | Sections 15.01-15.04 explicitly request confirmation; no guessing. |
| C2 | May owners create/edit properties directly, submit changes for manager approval, or remain read-only? Can one property have several owners/brokers, and can brokers be revoked per unit? | Owner branch requests add/edit, current implementation is manager-only; relationship cardinalities and delegation are unspecified. |
| C3 | Are inventory baselines tied to unit, lease/booking, or both? Who performs, confirms, signs and disputes each intake/return report? | Determines snapshots, permissions and handover workflow. |
| C4 | How are fair wear, damage value, missing quantity, repairs, depreciation and deposit deductions approved/disputed/refunded? | The PDF names settlement, but supplies no valuation or liability formula. |
| C5 | Which languages launch first beyond EN/AR (FR/ES/DE/ZH/HI), and which countries/contract/tax/payment policies are in the first release? | Worldwide capability is required; market rollout is explicitly staged. |
| C6 | Is estimated FX needed in the next local demo, or deferred with real rates? What rate time/source/rounding and disclosure rules apply? | Current no-conversion behavior is deliberate; PDF's converted display is an additional gap. |
| C7 | What lease terms, installments, deposits, commission bases, renewals and termination rules should the demo show? | Aggregate bookings are not a complete rent/financial policy. |
| C8 | Confirm maintenance new/in-progress/resolved/closed versus approval stages, technician roles and budget approval. | Current statuses differ from the master lifecycle. |
| C9 | Must mobile mirror every management screen, or focus on simplified dashboards, maintenance, photos and handover? | Section 13 identifies screen allocation as a design decision. |
| C10 | Which signatures and PDFs are presentation-only first, and what identity/legal/archive requirements apply in production? | Prevents a demo confirmation being represented as legal execution. |

## Recommended implementation order for scope approval

### Track A - interactive demo, no CMS/database/API/integrations

| Order | Proposed batch | Acceptance boundary |
|---|---|---|
| A0 | Resolve C1-C10; agree role/action matrix, glossary, lifecycle diagrams, required fields and launch locales. | Approved requirement IDs and sample data; explicitly label remaining uncertain details. No implementation before scope approval. |
| A1 | Normalize unit/lease/person links; agree owner/broker demo permissions; add structured furnished/equipment fields and country-dependent location/taxonomy options. | Existing records migrate without reset; role actions and unit links are consistent on web/mobile; exact missing labels resolved first. |
| A2 | **Central inventory journey:** unit rooms/items/quantity/value/currency/photos/baseline; check-in and check-out snapshots; tenant/manager confirmation; clearly simulated signatures; side-by-side differences; owner/broker review and fictional settlement; sample PDF archive UI. | Two inspections of one fictional tenancy retain both baselines and evidence, show damaged/missing items, calculate only approved demo amounts and produce matching reports. No real deductions or legally executed signature. |
| A3 | Full sample lease lifecycle and finance presentation: clauses/parties, renew/terminate, installment schedule, invoice/receipt samples, deposit/commission/expense records. | Consistent original currency, no double counting, dates linked to lease/unit, sample PDFs clearly labelled; settlement from A2 traceable. Could split simple lease structure into A1 where A2 needs it. |
| A4 | Complete maintenance work-order demo: unit/lease, technician, quotations/budgets, resolved/closed transitions and notices. | Tenant → manager → owner approval → technician → completion → expense/report works without conflating approval and resolution. |
| A5 | CRM/broker delegation screens, leads/visits, local messages and notification scenarios; complete report filters/exports for occupancy, arrears, maintenance and inventory. | Every role sees its permitted records and useful drilldowns; no fake sent email/SMS/push. |
| A6 | Launch-language/content translation, remaining regional formatting and optional explicitly dated fictional FX display if approved. | No untranslated locale advertised as supported; original money preserved; all new flows work in agreed languages/RTL. Keep localization infrastructure in every earlier batch. |
| A7 | Full cross-role regression, web/mobile parity, accessibility/responsive review, Android/iOS device acceptance and client demo sign-off. | Master requirement IDs covered by actual flows; missing production capabilities remain explicit. |

**Recommended next approved coding scope:** A1 plus A2, with only the minimum lease identifiers needed for handover. This closes the PDF's central product gap before adding more generic dashboards. Backend, live signatures/payments and broad CMS work should remain outside that approval.

### Track B - production backend/API, separately approved

1. Approve international domain/schema and permission model: users/organizations, owner-broker delegation, property/unit, lease, schedules/invoices/payments/deposits, maintenance, inventory snapshots/reports, translation/currency/audit records. Design exact-money storage and resource boundaries before migrations.
2. Implement secure identity, verified recovery, server-enforced property/unit policies, transactional database services and versioned Laravel API. Preserve/migrate demo data only through an explicit agreed process; do not reset the existing database.
3. Connect web and Flutter to shared APIs, secure media storage, concurrency/booking guarantees, audit logs, backups and immutable signed-report snapshots. Client guards remain presentation aids.
4. Introduce country-reviewed contracts/taxes, approved signature provider, payment/transfer reconciliation, deposit/refund/commission controls and optional FX provider in staged market releases. Providers and legal rules require separate decisions, not assumptions in this report.
5. Add notifications/messages delivery, scheduling, reporting infrastructure, monitoring, privacy/retention controls, native distribution and operational/security acceptance.

## Approval boundary and preservation

This report is the requested scope review. It creates no business functionality, migrations, APIs, integrations or production credentials. No existing working feature, original Stitch export, gallery file, `.env` or database was changed. Intermediate PDF renders/text were generated under `tmp/pdfs/aqar-review/` for the visual reading only.

Approval should specify which Track A batches and clarification answers are accepted. Track B needs a separate backend scope. Earlier statements that the global *demo upgrade* was delivered must not be interpreted as completion of these 15 master sections.
