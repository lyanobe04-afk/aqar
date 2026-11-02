# Login viewport review — 2 November 2026

The website and Flutter login now use a 55% architectural photograph / 45% form composition on desktop. The photograph is untinted above the text area, with a localized lower gradient. There is one bilingual wordmark and one language switcher inside the form column. No separate login navigation bar or building icons remain.

The form centers within the available desktop height. Content retains its natural minimum height: validation errors, expanded preview accounts, smaller windows and larger text can make the page scroll rather than clip.

## Actual rendered screenshots

These are browser-rendered screenshots of the Laravel Blade page and the built Flutter CanvasKit app, not mockups or widget-test golden images. Captures use the exact CSS viewport dimensions below, with visual viewport scale 1 and no CSS zoom/transform applied to fit the page. Mobile heights are 844px and 932px for the requested 390px and 430px widths.

| Viewport | Website | Flutter app |
|---|---|---|
| 1366 × 768 | [Screenshot](web-1366x768.jpg) | [Screenshot](flutter-1366x768.jpg) |
| 1920 × 1080 | [Screenshot](web-1920x1080.jpg) | [Screenshot](flutter-1920x1080.jpg) |
| 390 × 844 | [Screenshot](web-390x844.jpg) | [Screenshot](flutter-390x844.jpg) |
| 430 × 932 | [Screenshot](web-430x932.jpg) | [Screenshot](flutter-430x932.jpg) |
| Arabic RTL, 1366 × 768 | [Screenshot](web-ar-1366x768.jpg) | [Screenshot](flutter-ar-1366x768.jpg) |

All four base website viewports fit the complete collapsed login without page scrolling or horizontal overflow. The Flutter desktop checks verify zero scroll extent at both requested sizes in English and Arabic, and an image width of 55%. Preview access remains visible in the phone captures. Expanded controls and errors can scroll when needed.

Measured browser viewport, document dimensions, image loading and preview-control positions are recorded in [geometry.json](geometry.json). The Flutter document is a fixed canvas viewport; its internal scrolling is additionally checked in widget tests.

## Verification

- Flutter analysis: no issues. Full suite: 192 tests passed. The 12 login size/language cases passed again after the final phone alignment adjustment.
- Flutter web build completed with local rendering assets.
- Laravel: 70 tests, 368 assertions passed.
- Actual website browser checks: empty submission validation, password visibility, preview role selection, successful sign-in, logout, Forgot password, Create account, Arabic/RTL and restoration to English.
- At 1024 × 500 with validation and expanded preview access, the website grows to 758px and scrolls normally, without hidden form overflow. Flutter tests also cover 1024 × 600 and 320px width.
- Original design exports, client gallery, environment and migration hashes remain unchanged (113 protected files checked). No database operations were introduced.

## Implementation boundaries

- Website styling is in `backend/public/assets/aqar/login.css`, included only for the login view. The shared page's login branch supplies the login markup; dashboard rendering is unchanged.
- Flutter presentation is in `mobile/lib/demo/widgets/login_layout.dart`, used only for `/login`. Only that route bypasses the shared app bar and content-width limit.
- Demo account/session services, role behavior and validation are retained. No dashboard, database, original Stitch image or original export file was modified for this review.
