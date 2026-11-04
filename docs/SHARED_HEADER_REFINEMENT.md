# Shared Aqar header refinement

Completed 4 November 2026. Focused change to shared interactive frontend headers; other screens retain their existing layouts.

## Result

- Three aligned compact controls: globe with chevron, notification bell with unread-count badge, and avatar with chevron. Logout is inside the account menu.
- Language menu lists the configured language catalogue, clearly marks the current language, and retains existing locale preferences and RTL/LTR switching. The same component supports future configured languages.
- Notification menu shows up to four recent role-scoped notifications, their read status, existing mark-as-read actions and a link to the existing role-specific notifications page. Unread badges respect the existing notification preference and disappear at zero. Opening a menu does not mark records as read.
- Account menu shows the existing account name and role, View profile and Log out. It uses the existing profile route and logout behavior; no additional confirmation policy was introduced.
- Menus support outside-click/tap and Escape dismissal, focus states and keyboard operation. Only one header menu opens at a time. Shared control sizes and restrained borders/shadows follow the navy/green branding.

## Implementation

Laravel uses `backend/public/assets/aqar/shared-header.js` and `shared-header.css`, mounted by the existing interactive shell and loaded in its shared Blade workspace. Header event listeners are cleaned up on re-render. Labels, notification titles and account names are escaped. Language selection and read actions use the existing demo store. Profile/logout and View all links use the existing named route map.

Flutter uses `mobile/lib/demo/widgets/shared_header.dart` in the existing shared AppBar. Material MenuAnchor components provide menu placement, outside dismissal and keyboard handling. Trigger focus nodes ensure Escape also works after a touch/mouse opening. The component uses the existing store and navigation callbacks, including role-scoped notifications and existing logout handling.

No dependencies were added. Original Stitch/reference screens, database files, configuration, migrations, production backend, demo permissions and business workflows were not changed. Existing dedicated authentication layouts were kept intact.

## Verification

| Check | Result |
|---|---|
| Laravel suite | 74 passed, 381 assertions |
| JavaScript suite | 28 passed, including 3 new header tests |
| Flutter suite | 249 passed, including 18 new shared-header cases |
| Flutter analysis | No issues found |
| Flutter release web build | Passed |
| Blade compilation | Passed |
| Route / link / asset audit | 92 screens, 765 links, 623 asset references; no failures |
| Protected original files | 113 unchanged |
| Client gallery | 6 links passed |
| Shared seed, translation, palette, image and font parity | Passed |

The 18 new Flutter cases exercise Manager, Owner and Tenant in English/Arabic at desktop 1366×768, tablet 768×1024 and phone 390×844. They cover menu visibility, Escape and outside dismissal, language changes, notification reads, View all navigation, profile navigation and logout. JavaScript tests cover selected/configured languages, zero/empty notifications, scoped links, nested logout and HTML escaping.

Rendered web checks verified ArrowDown opening/focus, Escape, outside click, selected language, read-count update, View all and profile navigation, logout, and the Manager/Owner/Tenant notification route destinations. Rendered Flutter checks verified keyboard Enter opening, language selection, a read action, View all/profile navigation and responsive EN/AR menus. Native Android/iOS visual QA was not performed.

## Screenshots

[Open the screenshot gallery](qa/shared-header/index.html).

- [Laravel desktop English notifications](qa/shared-header/web-desktop-en-notifications.jpg)
- [Laravel desktop Arabic account menu](qa/shared-header/web-desktop-ar-profile.jpg)
- [Laravel phone English profile](qa/shared-header/web-mobile-en-profile.jpg)
- [Laravel phone Arabic notifications](qa/shared-header/web-mobile-ar-notifications.jpg)
- [Flutter desktop English account menu](qa/shared-header/flutter-desktop-en-profile.jpg)
- [Flutter desktop Arabic language menu](qa/shared-header/flutter-desktop-ar-language.jpg)
- [Flutter phone English language menu](qa/shared-header/flutter-mobile-en-language.jpg)
- [Flutter phone Arabic notifications](qa/shared-header/flutter-mobile-ar-notifications.jpg)

## Unread-bell animation follow-up

The unread indicator now repeats every 2.8 seconds while unread notifications remain: a ringing/bouncing bell and an expanding soft navy halo. Marking everything read removes the effect. Normal motion uses rotation and scale; reduced-motion mode keeps the bell stationary and gently fades the halo instead. Inactive Flutter tickers remain static. This fixes the earlier brief effect, which was easy to miss and fully suppressed in the browser's reduced-motion mode.

Animation tests cover repeated cycles, stopping at zero, and visible halo fading without bell movement in reduced-motion mode. Header interaction tests advance a bounded number of frames so the continuous decorative animation remains active while route/menu interactions are checked.

Final animation verification: all 251 Flutter tests passed, including normal/reduced-motion animation checks and all existing cross-role journeys. Flutter analysis is clean. The web preview reports the low-motion halo animation running with infinite repetitions even when Reduce Motion is enabled.
