---
name: Aqar Portal 
colors:
  surface: '#F4F6F9'
  surface-dim: '#dcd9d9'
  surface-bright: '#F4F6F9'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#f6f3f2'
  surface-container: '#f0eded'
  surface-container-high: '#eae7e7'
  surface-container-highest: '#e4e2e1'
  on-surface: '#1b1c1c'
  on-surface-variant: '#564242'
  inverse-surface: '#303030'
  inverse-on-surface: '#f3f0ef'
  outline: '#897172'
  outline-variant: '#ddc0c0'
  surface-tint: '#a43946'
  primary: '#1F4E78'
  on-primary: '#ffffff'
  primary-container: '#163D60'
  on-primary-container: '#ffa3a9'
  inverse-primary: '#ffb2b6'
  secondary: '#904854'
  on-secondary: '#ffffff'
  secondary-container: '#ffa5b1'
  on-secondary-container: '#7b3743'
  tertiary: '#483100'
  on-tertiary: '#ffffff'
  tertiary-container: '#654600'
  on-tertiary-container: '#e6b45c'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#ffdadb'
  primary-fixed-dim: '#ffb2b6'
  on-primary-fixed: '#40000d'
  on-primary-fixed-variant: '#842131'
  secondary-fixed: '#ffd9dd'
  secondary-fixed-dim: '#ffb2bb'
  on-secondary-fixed: '#3c0614'
  on-secondary-fixed-variant: '#73313d'
  tertiary-fixed: '#ffdeaa'
  tertiary-fixed-dim: '#f1be65'
  on-tertiary-fixed: '#271900'
  on-tertiary-fixed-variant: '#5f4100'
  background: '#F4F6F9'
  on-background: '#1b1c1c'
  surface-variant: '#e4e2e1'
typography:
  headline-xl:
    fontFamily: IBM Plex Sans
    fontSize: 36px
    fontWeight: '700'
    lineHeight: 44px
    letterSpacing: -0.02em
  headline-xl-mobile:
    fontFamily: IBM Plex Sans
    fontSize: 28px
    fontWeight: '700'
    lineHeight: 36px
    letterSpacing: -0.01em
  headline-lg:
    fontFamily: IBM Plex Sans
    fontSize: 28px
    fontWeight: '600'
    lineHeight: 36px
    letterSpacing: -0.01em
  headline-lg-mobile:
    fontFamily: IBM Plex Sans
    fontSize: 22px
    fontWeight: '600'
    lineHeight: 30px
    letterSpacing: '0'
  headline-md:
    fontFamily: IBM Plex Sans
    fontSize: 20px
    fontWeight: '600'
    lineHeight: 28px
  headline-sm:
    fontFamily: IBM Plex Sans
    fontSize: 16px
    fontWeight: '600'
    lineHeight: 24px
  body-lg:
    fontFamily: IBM Plex Sans
    fontSize: 16px
    fontWeight: '400'
    lineHeight: 26px
  body-md:
    fontFamily: IBM Plex Sans
    fontSize: 14px
    fontWeight: '400'
    lineHeight: 22px
  body-sm:
    fontFamily: IBM Plex Sans
    fontSize: 12px
    fontWeight: '400'
    lineHeight: 18px
  label-lg:
    fontFamily: IBM Plex Sans
    fontSize: 14px
    fontWeight: '500'
    lineHeight: 20px
  label-md:
    fontFamily: IBM Plex Sans
    fontSize: 12px
    fontWeight: '500'
    lineHeight: 16px
  label-sm:
    fontFamily: IBM Plex Sans
    fontSize: 10px
    fontWeight: '600'
    lineHeight: 14px
rounded:
  sm: 0.25rem
  DEFAULT: 0.5rem
  md: 0.75rem
  lg: 1rem
  xl: 1.5rem
  full: 9999px
spacing:
  gutter: 1.5rem
  gutter-mobile: 1rem
  margin: 2rem
  margin-mobile: 1rem
  space-xs: 0.25rem
  space-sm: 0.5rem
  space-md: 1rem
  space-lg: 1.5rem
  space-xl: 2.5rem
---

## Brand & Style

This design system serves high-value enterprise real estate asset managers, regional REIT directors, and commercial property executives operating across bilingual Middle Eastern markets. The visual identity establishes an aura of institutional authority, architectural dignity, and quiet luxury. 

The aesthetic is grounded in **Corporate Contemporary Minimalist** design with regional hospitality sensibilities:
- High typographic discipline, treating Arabic and Latin scripts as co-equal partners in visual weight.
- Generous breathable spaces that convey clarity and unhurried operational precision.
- Tactile warmth through off-white foundational canvas rather than sterile enterprise grey.
- Restrained, premium architectural color choices dominated by rich, deep red wine and burgundy notes, avoiding standard SaaS generic blues.

## Colors

The palette balances institutional gravitas with actionable clarity across data-heavy dashboards:

- **Primary Accent (`#163D60`):** Deep Burgundy. Used for core interactive elements, high-level navigational anchors, active states, and primary KPI indicators.
- **Secondary Accent (`#581C28`):** Dark Burgundy. Reserved for persistent structural navigation headers, elevated active states, text emphasis on badges, and primary hover treatments.
- **Tertiary Accent (`#C99A45`):** Warm Muted Gold. Used sparingly for high-tier assets, VIP lease designations, and premier property performance markers.
- **Neutral & Text (`#242424`):** Dark Charcoal. Provides deep legibility across Arabic diacritics and compact numeric tables without the harsh glare of pure `#000000`.
- **Foundations:**
  - Background Canvas: Warm Off-White (`#FAF8F7`).
  - Card & Modal Surfaces: Pure White (`#FFFFFF`).
  - Dividers & Outlines: Pale Stone Border (`#EAE5E3`).
  - Subdued Text / Secondary Metadata: Deep Taupe Gray (`#6E6865`).

### Operational Status Colors
- **Occupancy & Healthy Leases:** Emerald Green (Default: `#1F7A4D`, Light tint: `#EBF6F0`).
- **Payments & Arrears:** Alert Crimson (Default: `#B42318`, Light tint: `#FEF3F2`).
- **Maintenance & Pending Work Orders:** Amber Ochre (Default: `#B54708`, Light tint: `#FFFAEB`).
- **Vacant & Under Preparation:** Soft Slate Blue (Default: `#364E68`, Light tint: `#F0F4F8`).

## Typography

Typography prioritizes bilingual parity. The primary system relies on **IBM Plex Sans** paired seamlessly with its companion **IBM Plex Sans Arabic** (or Cairo for high-impact display numbers and localized marketing summaries).

### Script & Direction Mechanics
- **Right-to-Left (RTL) Primary:** Base typography must enforce Arabic-first line heights, which are tuned 10%–15% taller than Latin baselines to prevent clipping of diacritics (`Tashkeel`) and sweeping descenders.
- **Numerals:** Financial ledgers, asset square meters, and occupancy rates support both Western Arabic (`123`) and Eastern Arabic (`١٢٣`) glyph sets without disrupting tabular baseline alignment through tabular figures (`tnum`).
- **Weights:** Restricted strictly to Medium (500) and SemiBold (600) for structural items; Bold (700) is reserved for top-level financial metrics and primary portfolio hero headers.

## Layout & Spacing

The architecture operates on an adaptive 12-column fluid grid built on an 8px modular baseline.

### RTL Grid Flow & Spatial Rules
- **Reading Vector:** Flow runs starting from right to left (`dir="rtl"`). Navigation trees anchor right; content workspaces and metrics cards expand leftwards.
- **Margins & Gutters:**
  - Desktop (≥1200px): 12 columns, `margin: 2rem`, `gutter: 1.5rem`.
  - Tablet (768px – 1199px): 8 columns, `margin: 1.5rem`, `gutter: 1rem`.
  - Mobile (<768px): 4 columns, `margin: 1rem`, `gutter: 1rem`.
- **Directional Offsets:** Never hardcode left/right positioning. Use logical properties (`padding-inline-start`, `margin-inline-end`, `inset-inline-start`) to guarantee dynamic inversion between Arabic and English interfaces.

## Elevation & Depth

Visual hierarchy combines tonal layering with soft ambient drop shadows tinted with warm neutral pigments, avoiding synthetic slate dropouts.

- **Level 0 (Flat Canvas):** `#FAF8F7`. Used for all root canvas environments and underlying dashboard viewports.
- **Level 1 (Structural Cards & Data Containers):** Pure White (`#FFFFFF`) surface framed by a 1px solid border in `#EAE5E3` and a soft ambient shadow: `0 1px 3px rgba(36, 36, 36, 0.04), 0 4px 12px rgba(88, 28, 40, 0.03)`.
- **Level 2 (Dropdowns, Popovers, & Contextual Action Sheets):** `#FFFFFF` surface with elevated drop: `0 4px 16px rgba(36, 36, 36, 0.08), 0 1px 4px rgba(88, 28, 40, 0.04)`, framed by `#EAE5E3`.
- **Level 3 (Modals & Slide-out Inspection Drawers):** `#FFFFFF` surface accompanied by a warm tinted backdrop: `rgba(36, 36, 36, 0.45)` with `backdrop-filter: blur(4px)`.

## Shapes

The system relies on restrained, architectural curvature that reflects corporate structural stability:

- Standard controls, chips, table row indicators, and input fields utilize `rounded` (8px / `0.5rem`).
- Cards, KPI panels, and modal shells utilize `rounded-lg` (12px / `0.75rem` up to `1rem`).
- Avatars, unit occupancy pips, and contextual toggle switches adopt circular geometries.
- Geometric sharpness is avoided to prevent visual aggression in high-density data matrices.

## Components

### Buttons
- **Primary:** Solid `#163D60` background, `#FFFFFF` text, 8px radius. Hover state transitions to `#581C28`. Active state deepens with a subtle scale compression (`scale(0.98)`).
- **Secondary:** Surface `#FFFFFF`, 1px border `#EAE5E3`, text `#242424`. Hover state brings background `#FAF8F7` and border `#163D60`.
- **Tertiary / Ghost:** Transparent background, `#163D60` text. Hover adds `#FAF8F7` fill.
- **RTL Icon Placement:** Trailing action icons (e.g., arrow chevron) sit at the inline-end (`margin-inline-start: 8px`), pointing leftward in RTL mode.

### Cards & KPI Tiles
- Pure `#FFFFFF` surface with 12px border radius and 1px border `#EAE5E3`.
- Internal card padding follows `space-lg` (24px).
- Metric cards display large IBM Plex Sans numbers paired with micro-labels and trend badges directly beside the currency figures.

### Status Chips & Badges
- 8px pill or rounded-rect geometry with muted fills and dark-tone text for accessibility:
  - **Occupied:** Background `#EBF6F0`, Text `#1F7A4D`, Dot indicator `#1F7A4D`.
  - **Overdue / Payment Due:** Background `#FEF3F2`, Text `#B42318`, Dot indicator `#B42318`.
  - **Maintenance Request:** Background `#FFFAEB`, Text `#B54708`, Dot indicator `#B54708`.
  - **Vacant:** Background `#F0F4F8`, Text `#364E68`, Dot indicator `#364E68`.

### Input Fields & Search Bars
- Background `#FFFFFF`, 1px border `#EAE5E3`, 8px radius.
- Height: 40px (default), 48px (prominent filters).
- Focus state: Border transitions to `#163D60` paired with a focused ring: `0 0 0 3px rgba(139, 38, 53, 0.12)`.
- RTL alignment: Search magnifying glass sits at the right edge; input text enters from the right and flows left.

### Tables & Property Lists
- Header row utilizes `#FAF8F7` background with uppercase label weights and border-bottom in `#EAE5E3`.
- Alternating hover states apply `#FAF8F7` gently over `#FFFFFF` rows.
- Monetary values and unit codes use monospace/tabular figures aligned consistently relative to script direction.