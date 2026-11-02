# Aqar Property Platform

Global real estate platform: Laravel 12 Blade website and Flutter mobile frontend with interactive, locally persisted demonstration workflows for managers, owners and tenants.

See [the global upgrade report](docs/GLOBAL_UPGRADE.md) for international settings, property workflows and verified results.

Start with [the demo guide](INTERACTIVE_DEMO.md) for public demo accounts, run commands and three presentation scenarios. See [the delivery checklist](docs/DEMO_CHECKLIST.md) for completed work, limitations and verification.

- `backend/`: named Blade routes, shared shell, browser-local demo services and preserved design views.
- `mobile/`: Flutter app, Android/iOS scaffolds and verified Chrome preview; role screens, reusable widgets and SharedPreferences demo store.
- `demo/`: canonical fictional seed and English/Arabic translations.
- `client_demo/` and `aqar_dashboard/`: unchanged design references.

Website: run `php artisan serve` from `backend/`, then open http://127.0.0.1:8000/. Flutter: run `flutter pub get` and `flutter run -d chrome --web-port 8080` from `mobile/`.

All auth, bookings, payments and contracts are clearly labelled simulations. No CMS, MySQL operations, production APIs or external integrations were added. Website and mobile changes do not synchronize. Native Android/iOS release builds remain unverified.

Earlier static-phase reports in PLATFORM_FRONTENDS.md and backend/FRONTEND_DEMO.md describe the preserved design foundation; the interactive demo guide above is the current scope.
