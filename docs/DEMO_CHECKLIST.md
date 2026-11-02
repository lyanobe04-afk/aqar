# Global upgrade verification — 2 November 2026

Latest approved batch: [unit inventory, paired inspections and fictional settlement](A1_A2_DEMO_DELIVERY.md). Open **Unit inventory & handover** in each role menu. Read its configurable assumptions and confirmation steps before presenting.

Latest delivery: [full audit and limitations](GLOBAL_UPGRADE.md).

- [x] Per-account global settings and refresh persistence; EN/AR only.
- [x] Original-currency prices and histories; separate currency totals; no fake conversion.
- [x] Six-step international property create/edit/reload and related unit updates.
- [x] Publication/availability independent; unavailable/sale booking protection.
- [x] Unit media, amenities, rates/duration, area formats, confirmed guarded deletion.
- [x] Country/city search, instant/request bookings, overlaps, minimum stay and property time zone.
- [x] Owner assignment, maintenance approval/completion and foreign-currency expense/report.
- [x] Flutter global onboarding, role selection, login and registration.
- [x] Actual web scenarios A–D; actual rebuilt Flutter foreign booking; store/widget coverage.
- [x] 71 PHP tests (372 assertions), 19 JS tests, 203 Flutter tests; analysis/build passed.
- [x] 89 pages / 762 links / 472 asset references checked; 113 protected files unchanged.
- [ ] Native Android/iOS build and physical-device acceptance testing.
- [ ] Future backend/CMS, server authentication, synchronization, legal/payment integrations (outside scope).

The following earlier checklist documents the preceding interactive foundation. Its baseline gaps were resolved in that phase, rather than describing the current state.

# Interactive demo implementation checklist

The November 2026 task supersedes the earlier static-only presentation scope. All persistence and authentication in this phase are isolated simulations, not production services.

## Audit baseline

- 24 Laravel manager routes and Blade exports are present.
- 25 Flutter routes are present, including the mobile workspace menu.
- Shared colors and copied local assets are present.
- Missing: account/onboarding flows, owner/tenant experiences, persistent record actions, meaningful notifications, bilingual controls and reset.
- Existing mutation controls show preview notices; property lists are static and totals are not derived from mutable records.
- Original Stitch exports and client gallery remain read-only references.

## Batches (updated after verification)

| Batch | Scope | Status |
|---|---|---|
| 1 | Shared fictional seed, demo auth, localization, navigation | Complete |
| 2 | Manager properties/units, bookings, payments, contracts, maintenance | Complete |
| 3 | Owner assigned portfolio, income/expenses/profit, approvals | Complete |
| 4 | Tenant browse/filter/calendar/bookings, maintenance/inspection | Complete |
| 5 | Flutter persisted workflows and role navigation | Complete |
| 6 | Tests, reset, responsive/browser QA and handoff | Complete for Chrome; native device QA pending |

Web and mobile stores are separate and do not synchronize. No MySQL schema, `.env`, CMS, bank, email, SMS or government integrations are part of this work.

## Completed functionality

- Welcome/onboarding, mobile loading splash, role selection, validated demo login/register, password visibility, remember me, simulated reset/change password, profile/edit, logout and session expiry.
- Manager property search/filter/pagination, six-step create/edit/draft, confirmed delete, generated/editable units, owner/tenant records, booking approval/rejection/cancellation, payment recording/verification, sample contracts/status/export, maintenance/comments/photos/status, inventory/condition, document references, reports, notifications and settings.
- Owner assigned portfolio/details, occupancy, verified income, expenses, derived profit/reports, maintenance approvals, furniture/documents, notifications/profile/settings.
- Tenant published browsing and filters, details, 14-day availability calendar, instant confirmation/request-to-book, own bookings/contracts/documents/payments, maintenance/photos/comments, condition inspection/photos/notes/history, notifications/profile/settings.
- Invalid date/overlap/amount checks; related-screen totals; rollback after persistence failure; corrupt-state recovery; local reset; English/Arabic controls, RTL and SAR; responsive layouts and loading/empty/error/success states.
- All 24 original manager Blade designs and existing Flutter adaptations remain in the manager's read-only Design references gallery.

## Partially completed / demo limits

- Android/iOS scaffolds exist, but native builds/device installation were not verified. This Windows machine has no Android SDK; iOS needs macOS/Xcode. Chrome is the verified demonstration target.
- Arabic translates interface controls, statuses and seeded account/property names. Entered notes, fictional addresses, some document titles and archived original content retain their source language.
- Photos are local PNG/JPEG/WebP, up to four at 500 KB each. Documents are sample references/generated text, without cloud storage or signatures. Browser storage limits apply.
- Availability is a short demonstration calendar. Pricing is nightly for short stays or 30-day prorating for monthly properties, without taxes/deposits/billing rules.
- Editing planned unit count does not delete or reconcile configured units; existing units are managed separately.
- The interactive workspace reuses the visual system; the archive preserves original compositions. New role/account screens are consistent adaptations, not additional original Stitch exports.
- Role guards filter fictional records for presentation. All seed data is public; this is not server authorization or production security.

## Unimplemented — separate production phase

CMS, business models/migrations, MySQL writes, APIs, secure authentication/authorization, real booking inventory locks, real payments/refunds, email/SMS, Ejar/Nafath/bank integrations, signed legal contracts, cloud file storage, cross-device/web-mobile synchronization and native release certification.

Optional features without meaningful local behavior display a visible demo-unavailable notice. No demo action moves money, sends messages or executes legal agreements.

## Verification

- Flutter analysis clean; **192 tests passed** (83 preserved frontend checks, 8 store checks, 101 interactive widget checks); web build succeeded.
- Laravel **70 tests / 368 assertions** passed, route list and Blade compilation passed. Feature tests reject database connections.
- Web store: **9 Node tests** passed across all three roles, validation, auth lifecycle, reset, contracts, delete guards and storage failure.
- Shared JSON, 26 images, four fonts and seven palette tokens match; **113 protected files unchanged**.
- Browser journeys: manager six-step creation/units, booking approval/payment verification; owner assigned portfolio/totals/approval; tenant search/calendar/instant booking, maintenance, inspection, own contracts/payments; Arabic/RTL; reset/logout/login. Flutter Chrome login/workspace rendering checked separately.
- HTTP/assets/gallery audit: `backend/tools/ui/verification.json`; cross-platform parity: `mobile/tools/verification.json`.

Accounts, run commands and presentation scenarios: [INTERACTIVE_DEMO.md](../INTERACTIVE_DEMO.md).
