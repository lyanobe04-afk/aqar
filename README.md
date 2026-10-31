# Aqar

Aqar Property Platform frontend demonstration: a Laravel 12 Blade website and a Flutter mobile UI for Android and iOS.

Both frontends use the approved navy/green palette, static demonstration data, local assets, and connected screens. CMS, database operations, APIs, authentication, and real booking/payment functionality are outside the current phase.

## Project structure

- `backend/` — existing Laravel application; 24 Blade screens.
- `mobile/` — Flutter frontend; 25 navigable routes, Android/iOS scaffolds and a development web preview.
- `client_demo/` — preserved client gallery and copied design exports.
- `aqar_dashboard/` — preserved original Google Stitch exports.

## Run the website

From `backend/`, install PHP dependencies with `composer install`, configure your own local `.env` from `.env.example`, and run `php artisan key:generate` for a fresh checkout. Do not replace an existing environment file. Start the demo with `php artisan serve` and open <http://127.0.0.1:8000>.

The demo routes use static data and do not require database access. Compiled presentation assets are included; no frontend development server is required.

## Run the mobile frontend

From `mobile/`, run `flutter pub get`, then `flutter run` for a configured device or `flutter run -d chrome` for a development preview. Android requires its SDK; iOS builds require macOS/Xcode. Native build verification is pending on the necessary toolchains.

## Documentation and verification

- [Frontend delivery report](PLATFORM_FRONTENDS.md)
- [Laravel frontend details](backend/FRONTEND_DEMO.md)
- [Flutter frontend instructions](mobile/README.md)

Verified: 28 Laravel tests and 83 Flutter tests. The repository excludes credentials, local databases, dependencies, caches and generated build directories.
