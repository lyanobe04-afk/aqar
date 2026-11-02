# Aqar global functionality upgrade — verified 2 November 2026

The existing Laravel Blade and Flutter frontends now support international fictional portfolios. This extends the existing local demonstration; it adds no production CMS, database operations, API, live authentication, payments or external integrations.

## Audit and changes

Audited the 24 original manager screens, shared interactive manager/owner/tenant workspaces and account flows, and 89 named Laravel pages including preserved design references. Flutter equivalents retain their role navigation and English/Arabic layouts.

| Area | Implemented and checked |
|---|---|
| Account/settings | Per-account country, preferred currency, EN/AR language, IANA time zone, three date formats, sqm/sqft, international phone prefix and notification preference; refresh persistence and account isolation |
| Properties | Six-step create/edit, flexible country/region/city/street/district/postal/coordinates, owner, original currency, price/duration/minimum stay, rent/sale, booking policy, amenities, local photos/documents; independent publication and availability |
| Editing | Changes survive every wizard step, save, related views and reload; cancel leaves records unchanged; inherited unit rates follow property edits while custom rates remain independent |
| Units | Create/edit, local media, amenities, beds/baths/area, original-currency rates and duration, availability, confirmed delete; booking/financial history protects records |
| Tenant | Country/city/category/search filters, details, available units, property-time-zone dates, minimum stay, overlap checks, instant confirmation/request approval; unpublished and unavailable states respected |
| Finance/contracts | Booking/payment/contract/expense amounts retain original currency; preferred-currency summaries filter records; reports group totals by currency; no exchange-rate conversion |
| Owner/maintenance | Assigned portfolio only, request approval, completion creates expense in property currency, derived income/expense/profit |
| Mobile presentation | Global photographic welcome/onboarding, single-action role cards, matching navy/green login/registration, usable phone navigation and RTL |

Fixed two persistence regressions found through actual browser actions: Laravel JSON encoding changed empty objects into arrays and rejected saved drafts; a hidden empty unit identifier replaced newly generated IDs. Added regression tests and recovery for existing malformed unit IDs. Also fixed Flutter edit precedence overwriting wizard edits and search controller behavior.

The catalogue is configurable in `demo/global.json`: 244 country/region choices, 152 currencies, EN/AR translations. Three fictional fixtures were added: Mayfair Garden Residence (London, GBP, instant), Marina Horizon Apartment (Dubai, AED, request), Hudson Terrace Loft (New York, USD, instant). Original accounts and existing saved records migrate in place; fixtures merge once. No reset is required.

## Actual scenario verification

- **A:** Manager created Client Portfolio — London through all six web steps, attached a local photo, selected GB/GBP/Europe/London and owner Noura, saved, edited name/description/rate to GBP330, and refreshed. Fields and unit prices persisted. Flutter has matching store and widget flow tests including all six edit steps and cancel.
- **B:** Unpublished property disappeared from tenant browse. Published but unavailable property remained visible without booking access. Restored availability, changed units/media/prices; eligible deletion Cancel/Confirm worked. Unavailable Studio East was excluded from booking choices. Booked property deletion produced a history-protection error. Original seed unit A-101 was restored to its original vacant state after QA.
- **C:** Tenant filtered GB/London and booked U-001 for 2035-03-10 through 2035-03-13: confirmed GBP990. Duplicate dates returned an overlap error. In the rebuilt Flutter browser, country/city/search selected Mayfair, dates 2035-04-10 through 2035-04-13 produced confirmed GBP540. Web/mobile stores are independent.
- **D:** Assigned owner saw the London property, approved International heating service (GBP50), manager completed it, and a simulated GBP100 verified receipt was recorded. Owner report displayed GBP100 income / GBP50 expenses / GBP50 profit separately from SAR5000 / SAR1050 / SAR3950.
- Web manager preferences changed to US/USD/America/New_York/dd/MM/yyyy/sqft/+1 and persisted on refresh; London still displayed GBP330 and converted area only (100sqm → 1076.4sqft). These preferences and fictional QA records remain for review.

Screenshots of actual rendered pages: `docs/qa/global/` (web foreign booking, owner currency totals, global property; Flutter welcome, role selection, foreign property and confirmed booking). Prior desktop/mobile login screenshots remain in `docs/qa/login-viewport/`.

## Final verification

- Laravel: **71 tests / 372 assertions passed**; **89 named routes**; Blade view compilation passed.
- JavaScript: **19 tests passed**, including international settings, edit/reload, original currency, time-zone boundaries, deletion/history, malformed draft and empty unit ID regressions.
- Flutter: **203 tests passed**, analysis clean, release web build succeeded. Includes role routes, English/Arabic responsive layouts, property wizard/edit/cancel, settings controls, eligible deletion and booking flows.
- HTTP/static audit: **89 pages, 762 links, 472 asset references**, no failures; client gallery targets valid.
- Parity/preservation: shared data matched, 24 reference screens, seven palette tokens, 26 images, four fonts; **113 protected files unchanged**. Git whitespace check passed.
- No unresolved test failures at delivery. Native Android/iOS builds and physical device testing remain unverified.

## Main files changed in this upgrade

- Canonical data: `demo/global.json`, `demo/seed.json`, `demo/i18n.json`, `tools/sync_demo_assets.py`; synchronized web/mobile data copies.
- Laravel: `backend/app/Http/Controllers/Manager/ScreenController.php`; shared `backend/public/assets/aqar/{global.js,demo-store.js,demo-app.js,demo.css}`; `backend/tests/Feature/DemoPagesTest.php`; `backend/tools/ui/global-store.test.mjs` and adjusted existing store tests.
- Flutter: `mobile/lib/demo/services/{global_support.dart,demo_store.dart}`, `interactive_app.dart`, `interactive_page.dart`, property/record/account screens and dialogs, booking fields, welcome/login widgets; `mobile/pubspec.yaml` and lock (offline timezone data); global/store/widget tests.
- Delivery: this report, `INTERACTIVE_DEMO.md`, `docs/DEMO_CHECKLIST.md`, QA images and verification JSON.

## Practical limits

Local browser/SharedPreferences data is fictional, editable and device-specific, with no web/mobile synchronization or production access control. Never use real credentials or financial information. Real CMS/auth, APIs, database writes, legal contract execution and payment processing remain separate work.

No exchange rates are available. Preferred currency does not convert historical records; changing a property currency is blocked after financial/booking history. Night/week/month/year estimates use days and 7/30/365-day proration; taxes, deposits, hourly inventory and real concurrency are not implemented. Sales are displayed but cannot be booked; purchase/viewing workflows are outside this demo.

Addresses are flexible, with country names and optional regional/postal fields; they are not legally validated or geocoded. EN/AR are the only enabled translated languages; additional languages require dictionaries and Flutter localization support. IANA time-zone data is bundled offline. Country/currency catalogues are presentation configuration, not a compliance or availability claim.

Photos are limited to four small local images per record (500KB each in UI), stored locally, subject to device quota. Document references and simulated exports do not upload to a server. Native Android requires the SDK/tooling/licenses; iOS requires macOS/Xcode. Chrome preview verification does not certify native devices.

Original Stitch exports, `client_demo`, `.env`, existing migrations and MySQL were not modified.
