# Dashboard and account selection refinement

## Scope

Focused presentation changes to the shared Laravel and Flutter Manager, Owner and Tenant dashboards and account-type selection. Existing demo calculations, currency selection, record scoping, registration, navigation, dialog callbacks and A1/A2 handover workflows remain in use. No new dependencies or production services were introduced.

## Layout changes

- Grouped dashboard title, financial-formatting context and role-specific primary/secondary actions in one responsive page header.
- Replaced cramped five-column summaries with three cards followed by two balanced wider cards. Tenant summaries use a balanced two-column grid. Narrow screens reflow naturally.
- Kept each monetary value as a single line, with responsive fitting for unusually long values and full accessible text. Values still come from existing demo totals and record-specific currency formatters; no currency conversion was introduced.
- Unified card padding, rounded corners, borders, subdued shadows, typography, action spacing and visual hierarchy.
- Rebuilt Recent bookings with aligned property names, dates, amounts, badges and View details actions, plus an explicit empty state.
- Rebuilt Portfolio overview with paired Properties/Occupancy metric blocks, an emphasized Collected amount, subtle simulated-activity information and a consistent report/payment footer action.
- Improved sidebar proportions, active states and content margins while preserving existing navigation and the compact shared header.
- Replaced the account-type page with an integrated wordmark/language control, stronger heading and larger consistent role cards. Cards retain the existing registration role selection.

Laravel uses shared dashboard rendering and scoped CSS. Flutter uses reusable dashboard, money and account-selection widgets. Existing welcome/login and unrelated module designs are preserved.

## Verification

- Laravel: **74 tests passed, 381 assertions**; Blade compilation and shared-shell checks passed.
- JavaScript: **32 tests passed**, including four new dashboard rendering tests; existing business/demo journey and handover tests passed.
- Flutter: **295 tests passed**, including 44 new dashboard/account layout cases. All **44 focused layout tests passed again against the final source**. Analysis reported **no issues**; release web build passed.
- HTTP/link/asset audit: **92 screens, 765 links, 691 asset references**, no failures.
- **113 protected original files unchanged** and all six client-gallery targets passed.
- Browser geometry audit found no horizontal page overflow or oversized monetary runs in the 30 Laravel role/locale/viewport dashboard samples.
- Browser action checks covered dashboard navigation, booking detail dialogs, booking/payment/maintenance dialog opening and cancellation, role-specific property and approval destinations, and Portfolio report/payment destinations. New Flutter tests also verify role-card registration destinations, responsive rendering, long amounts and unchanged store state.

## Visual evidence

[Open paired before/after screenshot gallery](qa/dashboard-layout/index.html).

The complete comparison matrix contains **160 screenshots (80 before, 80 after)** at 1440×1000, 1280×900, 1024×900, 768×1024 and 390×844 CSS viewports, English and Arabic, for account selection and all three roles. All files exist and all requested/observed dimensions match. The machine-readable capture manifest records these dimensions. Representative desktop, tablet and phone images were visually reviewed, including Arabic RTL and both Portfolio/Recent bookings arrangements. Capture problems caused by unfinished font loading were corrected by retaking the affected web images.

Both applications retain their existing independently stored demo sessions, so displayed records can differ between platforms; no demo data was reset to force matching amounts. Flutter browser checks verified the booking-details dialog and tenant maintenance form opening in the release preview. Full journey coverage is also retained in the automated suites.

Flutter images are from its release web preview, not native Android/iOS devices. Native-device visual verification remains a separate check.
