# Aqar Flutter interactive demo

The existing Flutter app now launches `InteractiveAqarApp` from `lib/main.dart`, with local fictional manager, owner and tenant journeys. The earlier `AqarApp` remains available as a read-only manager design archive.

## Run in Chrome

```powershell
cd C:\Project\aqar\mobile
flutter pub get
flutter run -d chrome --web-port 8080
```

No emulator is required. For Android install the Android SDK; iOS builds require macOS/Xcode. Native builds were not verified here.

## Structure

- `lib/demo/screens/`: account, property and record screens.
- `lib/demo/widgets/`: forms, photo selection, record dialogs and booking fields.
- `lib/demo/models/`: local record types.
- `lib/demo/services/`: role filtering, validation, derived totals and SharedPreferences persistence.
- `lib/core/theme.dart`: shared navy/green visual tokens.
- `assets/data/`: copies of the canonical demo JSON under the repository's `demo/` directory.

Public accounts: `manager@aqar.demo`, `owner@aqar.demo`, `tenant@aqar.demo`; all use `Demo123!`. Settings offers Reset preview data. All actions affect fictional local state only. Web and mobile stores do not synchronize.

English/Arabic with RTL, SAR formatting, photo/notes inspections, six-step properties, booking policy/status actions, simulated payments, owner reports and approval workflows are implemented. Secure production auth, CMS, APIs, real bookings/payments and external integrations are outside this phase.

## Verification

`flutter analyze` clean, 192 tests passed, and `flutter build web --no-web-resources-cdn` succeeded. Tests cover the preserved designs and interactive routes at phone/tablet sizes, RTL, validation, local persistence, role guards, booking/payment state and reset.

See [the current demo guide](../INTERACTIVE_DEMO.md) and [delivery checklist](../docs/DEMO_CHECKLIST.md) for workflows and explicit limitations.
