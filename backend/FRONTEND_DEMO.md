> Historical static-phase report. The current interactive role-based demo, verification and limitations are documented in [INTERACTIVE_DEMO.md](../INTERACTIVE_DEMO.md). Its scope supersedes the static-only statements below.

# Aqar Laravel frontend demo

## Scope and status

All 24 HTML exports in `client_demo/screens` are integrated as static Laravel 12 Blade screens. The portal folder contains design documentation only. No requested manager screen is missing. Separate Owner and Tenant dashboard designs are absent; the Tenants management screen is a manager screen.

This phase contains no CMS, business models, migrations, CRUD, authentication, roles, APIs, payment processing, booking logic, contract logic, or external service integrations. No `.env` or database changes are required. Every demo route accepts GET/HEAD only and omits database session middleware. When backend development begins, introduce normal session, CSRF, authentication, validation, and authorization middleware for those new endpoints.

## Preview

From `C:\Project\aqar\backend`:

```powershell
php artisan serve --host=127.0.0.1 --port=8000
```

Open <http://127.0.0.1:8000>. PHP dependencies are already installed. The checked-in public stylesheet, scripts, images, and fonts require no frontend development server or external CDN. The original `client_demo/index.html` gallery remains available at its original location.

## Structure

- `config/manager.php`: explicit inventory and route metadata for every discovered screen.
- `routes/web.php`: named `manager.*` presentation routes. The prior root dashboard route is retained as a source backup in `tools/ui/backups/web.php.original`; the previous dashboard view and Bootstrap layout remain untouched.
- `app/Http/Controllers/Manager/ScreenController.php`: selects static views and shared presentation metadata only.
- `resources/views/layouts/manager.blade.php`: one shared responsive shell.
- `resources/views/components/manager`: header, active sidebar, and six-step property navigation.
- `resources/views/manager`: individual imported screen content, including the original Arabic dashboard and both reports variants.
- `resources/css/manager.css`: shared shell and responsive fixes; documented palette variables.
- `public/assets/aqar`: compiled CSS, demo behavior, 26 deduplicated source images, local fonts, favicon, and image fallback.
- `tools/ui`: reproducible import/build scripts, asset inventory, protected-file hashes, route results, and link verification.

## Styling decision

To preserve the Stitch layouts efficiently, the export utilities are compiled at build time into a single local CSS file using isolated Tailwind 3 build tooling. There is no Tailwind CDN/runtime and no Bootstrap mixed into the manager layout. The previous Bootstrap layout is preserved and unused by the new manager routes. A full Bootstrap component rewrite was not performed in this UI phase; introducing it later requires a separate visual regression pass. No packages were added to Laravel's application Composer or root npm dependencies.

The theme uses primary `#1F4E78`, dark navy `#0F2942`, emerald `#2E7D32`, background `#F4F6F9`, warning `#D35400`, error `#C0392B`, and success `#27AE60`. Burgundy-derived primary/secondary tokens and chart neutrals are remapped; warning and error meaning is retained.

## Demonstration behavior

- Sidebar links, breadcrumbs, related management screens, property/unit details, both reports, and language dashboard links use named Laravel routes.
- Property titles and unit identifiers open the corresponding single sample detail design. Multiple source cards intentionally share a sample detail page; there are no dynamic records.
- All six property steps support direct links, previous/next navigation, cancellation, and returning to Properties. Inputs are temporary presentation state and reset on navigation; there is no persistence.
- Property grid/list switching and the mobile navigation menu work locally.
- Header screen search selects a named screen from a local list.
- Unsupported actions open an accessible demo notice stating that nothing was saved, sent, uploaded, or changed. There are no simulated successful mutations or downloads. In-screen tabs/filters without exported alternate content are preview controls; native inputs remain editable for demonstration.
- Sample totals, dates, availability, staged files, charts, and statuses are the export's static data and do not represent live records.

## Inventory

| Route name (`manager.` prefix) | URL | Export folder |
| --- | --- | --- |
| dashboard | `/` | dashboard |
| properties | `/properties` | properties |
| bookings | `/bookings` | bookings |
| property-details | `/properties/demo` | property_details |
| units | `/units` | units_management |
| unit-details | `/units/demo` | unit_details |
| owners | `/owners` | owners |
| tenants | `/tenants` | tenants |
| contracts | `/contracts` | contracts_management |
| payments | `/payments` | payments |
| receivables | `/receivables` | rent_collection_receivables |
| maintenance | `/maintenance` | maintenance_management |
| furniture | `/furniture` | furniture_inventory |
| documents | `/documents` | documents_management |
| reports | `/reports` | reports_analytics |
| reports-operations | `/reports/operations` | reports_analytics_2 |
| settings | `/settings` | settings_preferences |
| dashboard-ar | `/dashboard/ar` | property_manager_dashboard |
| add-property-1 | `/properties/add/step-1` | add-property-step-1 |
| add-property-2 | `/properties/add/step-2` | add-property-step-2 |
| add-property-3 | `/properties/add/step-3` | add_new_property_step_3 |
| add-property-4 | `/properties/add/step-4` | add_new_property_step_4 |
| add-property-5 | `/properties/add/step-5` | add_new_property_step_5 |
| add-property-6 | `/properties/add/step-6` | add_new_property_step_6 |

## Repeatable verification

Completed checks: 24 named page routes, Blade compilation, 28 passing PHPUnit tests with 197 assertions, all sidebar clicks and active states, all six wizard steps and next links, demo save notice, property grid/list switching, unit-detail and return navigation, desktop and mobile loading for every screen, and representative tablet layouts. Browser checks found no broken images or console errors. The Step 4 action bar and Settings notification/audit rows were adjusted to prevent mobile overflow. The final HTTP audit checked 697 links, 122 asset references, six gallery targets, and 113 unchanged protected files with no failures. Its output is in `tools/ui/verification.json`; the desktop preview is in `docs/qa/dashboard-desktop.jpg`.

From `backend`:

```powershell
php artisan route:list --except-vendor
php artisan view:cache
php vendor/phpunit/phpunit/phpunit --configuration phpunit.xml
php tools/ui/check-render.php
# With the local preview running:
node tools/ui/check-http.mjs
```

The HTTP audit checks every anchor target, fragment, local asset reference, fonts, gallery target, single shared shell, and hashes of protected sources, `.env`, migrations, and previous views. The PHP feature suite rejects database connections and write endpoints. The root route is intentionally changed and excluded from the protected hash comparison.

The sandbox on this Windows host allows PHP includes but reports `is_readable()` false to PHPUnit. Running PHPUnit with approved normal host permissions resolves this environment limitation. Local HTTP checks also require localhost network permission in this environment.

## Rebuild/import

From `backend/tools/ui`:

```powershell
npm ci --no-audit --no-fund
npm run build
```

`npm run migrate` regenerates manager views and route metadata from the protected HTML exports. It overwrites generated manager views; maintain any intentional import-wide changes in `migrate.mjs`, or edit Blade views directly and avoid reimporting them. `node download-assets.mjs` refreshes local source images/fonts and requires network access; it makes no runtime integration with Google services.

Backend implementation and missing role-specific dashboards remain a separate phase after client UI approval.
