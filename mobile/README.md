# Aqar mobile frontend demo

Native Flutter UI for Android and iOS, adapted from the existing Laravel/Stitch Property Manager screens. The separate `web` target is a local development preview; it does not replace the Laravel website.

## Current scope

- All 24 website screen equivalents, plus a mobile workspace menu (25 routes).
- Dashboard, property list/details, unit list/details, owners, tenants, bookings, contracts, payments, rent collection, maintenance, furniture, documents, two reports, settings, an Arabic dashboard preview, and all six Add Property steps.
- Shared navy/green design tokens, Inter typography, 26 copied local images, Material/Cupertino icons, branded Android/iOS launcher assets, phone navigation and tablet sidebar.
- Local sample search/filtering, property and unit details, static record preview sheets, and step navigation.
- Temporary form entries survive step navigation in memory only. They disappear when the app is restarted. Save, upload, booking approval and payment verification display explicit demo notices.

No CMS, database, APIs, authentication, authorization, network image fetches, real files/uploads, payments, booking logic or external integrations are implemented. Amounts, statuses, dates and attachment references are illustrative source data.

There was no existing Flutter app or mobile-specific design export in the inspected project. These screens are native mobile adaptations of the existing manager website, ready for UI review. Separate Owner/Tenant apps and full application localization have not been designed or implemented. The Arabic route adapts the existing Arabic dashboard; the rest of the navigation remains English.

## Run

Tested with Flutter 3.47.7 and Dart 3.13.5. From `C:\Project\aqar\mobile`:

```powershell
flutter pub get
flutter run
```

Choose a configured Android emulator or device. On macOS, open `ios/Runner.xcworkspace` with Xcode or run on an iOS Simulator. Platform scaffolds use the provisional `com.aqar.aqar_mobile` application identifier; signing and store distribution are outside this phase.

To preview on this Windows machine:

```powershell
flutter run -d chrome
```

For a static offline-engine preview:

```powershell
flutter build web --no-web-resources-cdn
python -m http.server 8080 --bind 127.0.0.1 --directory build/web
```

Open <http://127.0.0.1:8080>. `--no-web-resources-cdn` bundles the Flutter renderer locally. Preview servers used during testing are stopped after verification. Android/iOS apps use the same Dart screens; no WebView is used.

## Code map

- `lib/app.dart`: named screen routing and in-memory form lifecycle.
- `lib/core/theme.dart`: approved design tokens and reusable Flutter theme.
- `lib/data/demo_data.dart`: immutable presentation fixtures and navigation inventory.
- `lib/widgets`: shared responsive shell, cards, metrics, tags and demo notices.
- `lib/screens`: dashboard, property/unit views, module lists, reports/settings and wizard.
- `assets`: copied website images and fonts; no external downloads at runtime.
- `android`, `ios`: standard Flutter platform scaffolds.
- `test/frontend_test.dart`: screen, responsive and navigation checks.
- `tools/verify_web_parity.py`: route/color/asset parity and protected source hashes.
- `tools/brand_assets.py`: reproducible raster versions of the simple Aqar building mark, scoped to generated mobile icons only.
- `docs/qa`: screenshots from the actual Flutter preview.

## Verification and limits

```powershell
flutter analyze
flutter test --reporter expanded
python tools/verify_web_parity.py
```

83 widget/asset tests pass: 25 routes at 320px, 390px and 1024px, scrolled content, property filtering/detail navigation, all six form steps, honest save and approval notices, workspace navigation, larger text, first-step cancellation, unknown routes and local asset bytes. The parity script verifies 24 website paths, seven colors, 26 identical images, four identical fonts and 113 unchanged protected originals/configuration files. The release web preview compiles and has been checked in a browser at phone dimensions with local images and no console errors.

**Native build verification remains pending:** Flutter Doctor reports no Android SDK on this machine, so an APK/AAB was not compiled or tested on an Android device. The host is Windows; iOS compilation, signing and Simulator/device checks require macOS/Xcode. See the [official Android setup](https://docs.flutter.dev/platform-integration/android/setup) and [official iOS setup](https://docs.flutter.dev/platform-integration/ios/setup). No missing toolchains were installed or system configuration changed.

Dependencies are Flutter, its standard Cupertino icon font and development-only Flutter test/lint packages. There is no backend SDK or HTTP client package. Future business behavior should be introduced in a separately scoped phase after UI approval.
