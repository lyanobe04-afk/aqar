# Aqar interactive demonstration

Latest approved batch: [unit inventory, paired inspections and fictional settlement](docs/A1_A2_DEMO_DELIVERY.md). Open **Unit inventory & handover** in each role menu. Read its configurable assumptions and confirmation steps before presenting.

This phase adds locally persisted, fictional workflows to the Laravel Blade website and existing Flutter app. It supersedes the static-only phase in older audit documents. MySQL data, `.env`, migrations, original Stitch exports and client gallery files were not changed.

## Global portfolio upgrade

See [the verified global upgrade report](docs/GLOBAL_UPGRADE.md) for the action matrix, tests and limitations. Configure countries/currencies in `demo/global.json`, then run `python tools/sync_demo_assets.py` from the project root. Settings persist per account: country, currency, English/Arabic, time zone, date format, area units and phone prefix. Prices and historical records always retain their original currency; reports group totals by currency and no FX conversion is available.

London/GBP, Dubai/AED and New York/USD fictional properties supplement the existing portfolio. Use the six-step wizard for international addresses, rent/sale, duration, photos, independent publication/availability and owner assignment. Unit management supports create/edit/media/delete, with history protection. Existing local data migrates without resetting accounts.

## Demo accounts

All public fictional accounts use **`Demo123!`**. Expand Preview access on the login screen for account shortcuts.

| Role | Email |
|---|---|
| Property Manager / Broker | `manager@aqar.demo` |
| Property Owner | `owner@aqar.demo` |
| Tenant | `tenant@aqar.demo` |

Registration creates another local fictional account. New owners have no properties until a manager assigns one; new tenants have no private rental history until booking. Reset-password is deliberately unverified and labelled a simulation. Never enter real personal information or credentials.

## Run the website

```powershell
cd C:\Project\aqar\backend
php artisan serve --host=127.0.0.1 --port=8000
```

Open [Aqar website](http://127.0.0.1:8000/). Without a demo session it opens login. Presentation assets are local; no Vite server or database connection is needed for demo routes. Preserve the existing `.env`.

## Run Flutter

```powershell
cd C:\Project\aqar\mobile
flutter pub get
flutter run -d chrome --web-port 8080
```

Chrome opens the mobile frontend preview at [Aqar Flutter preview](http://localhost:8080/). No emulator is needed. Browser device sizing demonstrates phone layouts. Android needs its SDK; iOS needs macOS/Xcode. Native builds were not certified in this task.

Alternatively, serve the verified build:

```powershell
flutter build web --no-web-resources-cdn
python -m http.server 8080 --bind 127.0.0.1 --directory build/web
```

## Present three journeys

Start with **Settings → Reset preview data**, confirm, then switch accounts through Logout/Login. Reset affects the current app/browser origin and restores public passwords and sample records.

**Manager:** review Dashboard, Properties → Add property, complete six steps and save. Name, city, address and positive unit count/rate are required. View generated units or add/edit one in Units. Approve Al-Nakheel's pending booking. Record a simulated payment against it, verify the payment, and review updated totals and maintenance. Properties without linked bookings can be deleted after confirmation; financial history is protected.

**Owner:** view My properties, Rental income, Occupancy and Financial reports. Only properties assigned to Noura appear. Approve Bathroom water leak in Maintenance approvals. Verified payments count as income; completed maintenance creates one expense entry; profit derives from those records.

**Tenant:** filter Riyadh / Chalet, open Al-Nakheel, inspect availability and book free dates. Its instant policy confirms locally. Al-Yasmin or Al-Reef demonstrates a pending request; the manager can approve/reject it. Review bookings, submit maintenance with small sample photos, record a condition inspection, and view seeded contracts/payment history.

Dates/conflicts are validated. Rejected/cancelled bookings release sample availability. Verified payments reduce balances; pending payments do not count as collected. No payment is charged and no agreement legally executed.

## Data and architecture

- `demo/seed.json` and `demo/i18n.json` are canonical. Run `python tools/sync_demo_assets.py` after editing to copy them to both frontends.
- Named Laravel GET routes/controllers render a shared Blade shell; browser modules handle local interactions. All 24 original manager views remain in Design references.
- Flutter `lib/demo/` separates models, services, screens and widgets. `main.dart` launches `InteractiveAqarApp`; legacy `AqarApp` is retained for read-only design previews.
- Website state uses `aqar.interactive.v2` localStorage with expiring simulated sessions. Flutter uses `aqar.mobile.interactive.v2` SharedPreferences. **Web and mobile changes do not synchronize.** Other browser profiles/origins also have separate stores.
- Demo auth is public/client-controlled. Password hashes and role filters are presentation mechanics, not secure identity or authorization. There are no real account, booking, payment, email, SMS or government endpoints.
- Storage failures roll back mutations and show an error; remove large photos/reset to recover. Read-only design previews retain their preview notices.

## Verification and remaining scope

See the [completed/partial/unimplemented checklist](docs/DEMO_CHECKLIST.md). Verified with Flutter 3.47.7 / Dart 3.13.5. Screenshots are in `docs/qa/`.

```powershell
# From backend/
php artisan route:list
php artisan view:cache
php vendor/phpunit/phpunit/phpunit --configuration phpunit.xml

# From project root; Laravel server running for HTTP audit
node --test backend/tools/ui/demo-store.test.mjs
node backend/tools/ui/check-http.mjs
python mobile/tools/verify_web_parity.py

# From mobile/
flutter analyze
flutter test
flutter build web --no-web-resources-cdn
```

Production CMS, databases/APIs, secure identity, real payments/contracts, cloud storage and native release QA belong to a separate phase. These changes were not pushed automatically.

## Login presentation update

The website and app use a branded property-image login with responsive form layouts. Global demo banners and repetitive sample labels have been removed. Preview accounts are available in the collapsed Preview access section; local simulation behavior is unchanged. Financial/contract notices remain at the relevant actions. English/Arabic login layouts, validation and the expanded account shortcuts are covered by the current UI checks.
