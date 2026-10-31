{{-- Imported from client_demo/screens/settings_preferences/code.html; static demonstration data. --}}
@extends('layouts.manager')
@section('content')
<div class="flex flex-col w-full pb-24">
<!-- Page Header & Action Bar -->
<div class="flex flex-col lg:flex-row lg:items-center justify-between gap-space-md mb-space-lg">
<div>
<div class="flex items-center gap-space-xs text-on-surface-variant font-label-md text-label-md mb-1">
<a class="hover:text-primary transition-colors" href="{{ route('manager.dashboard') }}">Dashboard</a>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="text-on-surface font-semibold">Settings & Preferences</span>
</div>
<h1 class="font-headline-xl text-headline-xl text-primary font-bold tracking-tight">Settings & Preferences</h1>
<p class="font-body-md text-body-md text-on-surface-variant mt-0.5">
        Configure institutional parameters, sovereign localization, governance safeguards, and role permissions.
      </p>
</div>
<!-- Actions & Badge -->
<div class="flex flex-wrap items-center gap-space-sm">
<div class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-secondary-container/20 text-primary font-label-sm text-label-sm font-semibold">
<span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
        Prototype Mode — Unsaved Draft
      </div>
<button class="px-4 py-2 rounded-lg bg-surface-container-lowest text-on-surface hover:bg-surface-container font-label-lg text-label-lg font-medium shadow-sm transition-all duration-150" type="button" data-demo="Discard Changes">
        Discard Changes
      </button>
<button class="px-4 py-2 rounded-lg bg-primary hover:bg-primary-container text-on-primary font-label-lg text-label-lg font-medium shadow-md hover:shadow-lg flex items-center gap-1.5 transition-all duration-150 active:scale-95" type="button" data-demo="Save Changes">
<span class="material-symbols-outlined text-[18px]">check</span>
        Save Changes
      </button>
</div>
</div>
<!-- 2-Column Responsive Workspace Grid -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-start">
<!-- LEFT COLUMN: Sticky Vertical Sub-Navigation -->
<nav class="lg:col-span-3 sticky top-20 flex flex-col gap-1 p-2 bg-surface-container-lowest rounded-xl shadow-sm">
<div class="px-3 py-2 text-on-surface-variant font-label-sm text-label-sm uppercase tracking-wider font-semibold">
        Settings Hierarchy
      </div>
<a class="flex items-center justify-between px-3 py-2.5 rounded-lg bg-primary text-on-primary font-label-md text-label-md font-semibold shadow-sm transition-colors" href="#demo-notice" data-demo="1. Organization Profile">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px]">domain</span>
<span>1. Organization Profile</span>
</span>
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
</a>
<a class="flex items-center justify-between px-3 py-2.5 rounded-lg text-on-surface hover:bg-surface-container font-label-md text-label-md transition-colors" href="#demo-notice" data-demo="2. Regional & Localization">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">translate</span>
<span>2. Regional & Localization</span>
</span>
</a>
<a class="flex items-center justify-between px-3 py-2.5 rounded-lg text-on-surface hover:bg-surface-container font-label-md text-label-md transition-colors" href="#demo-notice" data-demo="3. Property & Rental Rules">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">real_estate_agent</span>
<span>3. Property & Rental Rules</span>
</span>
</a>
<a class="flex items-center justify-between px-3 py-2.5 rounded-lg text-on-surface hover:bg-surface-container font-label-md text-label-md transition-colors" href="#demo-notice" data-demo="4. Booking Governance">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">event_available</span>
<span>4. Booking Governance</span>
</span>
</a>
<a class="flex items-center justify-between px-3 py-2.5 rounded-lg text-on-surface hover:bg-surface-container font-label-md text-label-md transition-colors" href="#demo-notice" data-demo="5. Payments & Settlement">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">account_balance_wallet</span>
<span>5. Payments & Settlement</span>
</span>
</a>
<a class="flex items-center justify-between px-3 py-2.5 rounded-lg text-on-surface hover:bg-surface-container font-label-md text-label-md transition-colors" href="#demo-notice" data-demo="6. Team Roles (RBAC)">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">badge</span>
<span>6. Team Roles (RBAC)</span>
</span>
</a>
<a class="flex items-center justify-between px-3 py-2.5 rounded-lg text-on-surface hover:bg-surface-container font-label-md text-label-md transition-colors" href="#demo-notice" data-demo="7. Notifications & Dispatch">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">notifications_active</span>
<span>7. Notifications & Dispatch</span>
</span>
</a>
<a class="flex items-center justify-between px-3 py-2.5 rounded-lg text-on-surface hover:bg-surface-container font-label-md text-label-md transition-colors" href="#demo-notice" data-demo="8. Documents & Data">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">folder_managed</span>
<span>8. Documents & Data</span>
</span>
</a>
<a class="flex items-center justify-between px-3 py-2.5 rounded-lg text-on-surface hover:bg-surface-container font-label-md text-label-md transition-colors" href="#demo-notice" data-demo="9. Branding & Styling">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">palette</span>
<span>9. Branding & Styling</span>
</span>
</a>
<a class="flex items-center justify-between px-3 py-2.5 rounded-lg text-on-surface hover:bg-surface-container font-label-md text-label-md transition-colors" href="#demo-notice" data-demo="10. Security & Audit Log">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">shield</span>
<span>10. Security & Audit Log</span>
</span>
</a>
<!-- Quick Context Box -->
<div class="mt-4 p-3 bg-surface-container rounded-lg">
<div class="flex items-center gap-1.5 text-primary font-label-sm text-label-sm font-semibold mb-1">
<span class="material-symbols-outlined text-[16px]">info</span>
          Institutional Multi-Tenant
        </div>
<p class="font-body-sm text-body-sm text-on-surface-variant text-[11px] leading-relaxed">
          Tenant #ORG-9924-SA. Sovereign partitioning enforced across Riyad, Dubai, and London sub-registries.
        </p>
</div>
</nav>
<!-- RIGHT COLUMN: Main Content Area -->
<div class="lg:col-span-9 flex flex-col gap-space-lg w-full">
<!-- SECTION 1: Organization Profile -->
<section class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md" id="organization-profile">
<div class="flex items-start justify-between">
<div>
<div class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-primary"></span>
<h2 class="font-headline-md text-headline-md text-on-surface font-semibold">1. Organization Profile</h2>
</div>
<p class="font-body-md text-body-md text-on-surface-variant mt-0.5">
              Legal entity charter, central operational hub details, and executive identity.
            </p>
</div>
<span class="px-2.5 py-1 rounded bg-surface-container text-on-surface font-label-sm text-label-sm">Org ID: MJL-CORP-01</span>
</div>
<!-- Logo Uploader Component -->
<div class="flex items-center gap-space-md p-4 bg-surface-container-low rounded-lg">
<div class="w-20 h-20 rounded-xl bg-primary text-on-primary flex flex-col items-center justify-center font-headline-lg font-bold shadow-md">
<span>مج</span>
<span class="font-label-sm text-[10px] tracking-widest uppercase text-primary-fixed-dim">MAJLIS</span>
</div>
<div class="flex flex-col gap-1">
<span class="font-label-lg text-label-lg font-semibold text-on-surface">Organization Seal & Brand Monogram</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Recommended 400x400px transparent PNG or SVG vector. Max file weight 2MB.</span>
<div class="flex items-center gap-2 mt-1">
<button class="px-3 py-1.5 rounded-lg bg-surface-container-lowest hover:bg-surface-container text-on-surface font-label-md text-label-md font-medium shadow-sm transition-colors" type="button" data-demo="Upload New Logo">
                Upload New Logo
              </button>
<button class="px-3 py-1.5 rounded-lg text-error hover:bg-error-container/30 font-label-md text-label-md font-medium transition-colors" type="button" data-demo="Remove">
                Remove
              </button>
</div>
</div>
</div>
<!-- Form 2-Column Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md font-semibold text-on-surface">Organization Legal Name</label>
<input class="px-3 py-2 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary shadow-inner" type="text" value="Majlis Hospitality & Real Estate Management Ltd.">
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md font-semibold text-on-surface">Commercial Registration / Tax ID (Optional)</label>
<input class="px-3 py-2 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary shadow-inner" type="text" value="CR-1010-89240">
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md font-semibold text-on-surface">Primary Administrative Email</label>
<input class="px-3 py-2 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary shadow-inner" type="email" value="operations@majlisportal.com">
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md font-semibold text-on-surface">Central Operations Phone</label>
<input class="px-3 py-2 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary shadow-inner" type="text" value="+966 11 450 8890">
</div>
<div class="flex flex-col gap-1.5 md:col-span-2">
<label class="font-label-md text-label-md font-semibold text-on-surface">Corporate Institutional Domain</label>
<input class="px-3 py-2 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary shadow-inner" type="url" value="https://www.majlisproperties.com">
</div>
<!-- Operating Jurisdictions Multi-select -->
<div class="flex flex-col gap-1.5 md:col-span-2">
<div class="flex items-center justify-between">
<label class="font-label-md text-label-md font-semibold text-on-surface">Authorized Operating Jurisdictions</label>
<span class="font-label-sm text-label-sm text-on-surface-variant">Sovereign multi-region governance</span>
</div>
<div class="flex flex-wrap items-center gap-2 p-2 rounded-lg bg-surface-container-low min-h-12">
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container-lowest text-on-surface font-label-md text-label-md shadow-sm">
<span class="material-symbols-outlined text-[16px] text-primary">flag</span>
                Saudi Arabia (KSA)
                <button class="hover:text-error ml-1 leading-none" type="button" data-demo="×">×</button>
</span>
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container-lowest text-on-surface font-label-md text-label-md shadow-sm">
<span class="material-symbols-outlined text-[16px] text-primary">flag</span>
                United Arab Emirates (UAE)
                <button class="hover:text-error ml-1 leading-none" type="button" data-demo="×">×</button>
</span>
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container-lowest text-on-surface font-label-md text-label-md shadow-sm">
<span class="material-symbols-outlined text-[16px] text-primary">flag</span>
                United Kingdom (UK)
                <button class="hover:text-error ml-1 leading-none" type="button" data-demo="×">×</button>
</span>
<button class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-primary/10 text-primary hover:bg-primary/20 font-label-md text-label-md font-medium transition-colors" type="button" data-demo="Add Country">
<span class="material-symbols-outlined text-[16px]">add</span>
                Add Country
              </button>
</div>
</div>
<div class="flex flex-col gap-1.5 md:col-span-2">
<label class="font-label-md text-label-md font-semibold text-on-surface">Registered Head Office Address</label>
<textarea class="px-3 py-2 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary shadow-inner" rows="2">King Fahd Road, Al-Olaya District, Riyadh 12214, Kingdom of Saudi Arabia</textarea>
</div>
</div>
</section>
<!-- SECTION 2: Regional & Localization -->
<section class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md" id="regional-localization">
<div>
<div class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-primary"></span>
<h2 class="font-headline-md text-headline-md text-on-surface font-semibold">2. Regional & Localization</h2>
</div>
<p class="font-body-md text-body-md text-on-surface-variant mt-0.5">
            Autonomous language, calendar systems, and unbundled currency partitions.
          </p>
</div>
<!-- Policy Banner -->
<div class="p-3.5 rounded-lg bg-primary/5 flex items-start gap-3">
<span class="material-symbols-outlined text-primary text-[20px] mt-0.5">verified_user</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-primary">Independent Dimension Policy</span>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5 leading-relaxed">
              Language layout, calendar locale, and sovereign transaction currency operate independently. Currencies are managed discretely in separate balance books without synthetic FX commingling.
            </p>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-space-md">
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md font-semibold text-on-surface">Default UI Language</label>
<select class="px-3 py-2 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-primary">
<option selected="">English (LTR)</option>
<option disabled="">العربية (Arabic RTL - Phase 2)</option>
</select>
<span class="font-label-sm text-label-sm text-on-surface-variant">Dual-engine translation staged</span>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md font-semibold text-on-surface">Primary Operational Anchor</label>
<select class="px-3 py-2 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-primary">
<option selected="">Saudi Arabia (KSA)</option>
<option>United Arab Emirates (UAE)</option>
<option>United Kingdom (UK)</option>
</select>
<span class="font-label-sm text-label-sm text-on-surface-variant">Determines VAT/ZATCA templates</span>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md font-semibold text-on-surface">System Timezone</label>
<select class="px-3 py-2 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-primary">
<option selected="">(GMT+03:00) AST — Riyadh</option>
<option>(GMT+04:00) GST — Dubai</option>
<option>(GMT+00:00) GMT — London</option>
</select>
<span class="font-label-sm text-label-sm text-on-surface-variant">Applied to calendar lockouts</span>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md font-semibold text-on-surface">Date Presentation Protocol</label>
<select class="px-3 py-2 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-primary">
<option selected="">DD/MM/YYYY (e.g. 24/05/2026)</option>
<option>YYYY-MM-DD (ISO 8601)</option>
<option>DD Month YYYY</option>
</select>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md font-semibold text-on-surface">Number & Separator Syntax</label>
<select class="px-3 py-2 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-primary">
<option selected="">1,234,567.89 (Standard)</option>
<option>1 234 567,89 (European Space)</option>
</select>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md font-semibold text-on-surface">Default Portfolio Ledger Currency</label>
<select class="px-3 py-2 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-primary">
<option selected="">SAR — Saudi Riyal (ر.س)</option>
<option>AED — UAE Dirham (د.إ)</option>
<option>USD — US Dollar ($)</option>
<option>GBP — British Pound (£)</option>
</select>
</div>
</div>
<!-- Discrete Secondary Currencies -->
<div class="flex flex-col gap-2 pt-2">
<label class="font-label-md text-label-md font-semibold text-on-surface">Supported Secondary Sovereign Ledgers</label>
<div class="flex flex-wrap gap-2">
<span class="px-3 py-1.5 rounded-lg bg-surface-container text-on-surface font-label-md text-label-md flex items-center gap-1.5">
<span class="w-2 h-2 rounded-full bg-emerald-600"></span>
              USD ($) — US Dollar
            </span>
<span class="px-3 py-1.5 rounded-lg bg-surface-container text-on-surface font-label-md text-label-md flex items-center gap-1.5">
<span class="w-2 h-2 rounded-full bg-emerald-600"></span>
              AED (د.إ) — UAE Dirham
            </span>
<span class="px-3 py-1.5 rounded-lg bg-surface-container text-on-surface font-label-md text-label-md flex items-center gap-1.5">
<span class="w-2 h-2 rounded-full bg-emerald-600"></span>
              EUR (€) — Euro
            </span>
<span class="px-3 py-1.5 rounded-lg bg-surface-container text-on-surface font-label-md text-label-md flex items-center gap-1.5">
<span class="w-2 h-2 rounded-full bg-emerald-600"></span>
              GBP (£) — British Pound
            </span>
<button class="px-3 py-1.5 rounded-lg bg-surface-container-lowest hover:bg-surface-container text-primary font-label-md text-label-md font-semibold shadow-sm transition-colors" type="button" data-demo="+ Enable Currency">
              + Enable Currency
            </button>
</div>
</div>
</section>
<!-- SECTION 3: Property & Rental Preferences -->
<section class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md" id="property-rental-preferences">
<div>
<div class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-primary"></span>
<h2 class="font-headline-md text-headline-md text-on-surface font-semibold">3. Property & Rental Preferences</h2>
</div>
<p class="font-body-md text-body-md text-on-surface-variant mt-0.5">
            Rental tenure structures, building nomenclature, and decentralized fee governance.
          </p>
</div>
<!-- Rental Cadences -->
<div class="flex flex-col gap-2">
<label class="font-label-md text-label-md font-semibold text-on-surface">Authorized Rental Tenures</label>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
<label class="flex items-start gap-2.5 p-3 rounded-lg bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors">
<input checked="" class="mt-1 accent-primary rounded" type="checkbox">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Daily Cadence</span>
<span class="font-body-sm text-body-sm text-on-surface-variant text-[11px]">Short-stay / Vacation chalets</span>
</div>
</label>
<label class="flex items-start gap-2.5 p-3 rounded-lg bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors">
<input checked="" class="mt-1 accent-primary rounded" type="checkbox">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Weekly Cadence</span>
<span class="font-body-sm text-body-sm text-on-surface-variant text-[11px]">Executive short corporate lets</span>
</div>
</label>
<label class="flex items-start gap-2.5 p-3 rounded-lg bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors">
<input checked="" class="mt-1 accent-primary rounded" type="checkbox">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Monthly Cadence</span>
<span class="font-body-sm text-body-sm text-on-surface-variant text-[11px]">Mid-term residential agreements</span>
</div>
</label>
<label class="flex items-start gap-2.5 p-3 rounded-lg bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors">
<input checked="" class="mt-1 accent-primary rounded" type="checkbox">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Yearly (Annual)</span>
<span class="font-body-sm text-body-sm text-on-surface-variant text-[11px]">Standard Ejar statutory terms</span>
</div>
</label>
<label class="flex items-start gap-2.5 p-3 rounded-lg bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors">
<input checked="" class="mt-1 accent-primary rounded" type="checkbox">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Custom Tenure</span>
<span class="font-body-sm text-body-sm text-on-surface-variant text-[11px]">Bespoke diplomatic & corporate</span>
</div>
</label>
</div>
</div>
<!-- Management Fee Policy -->
<div class="p-4 rounded-lg bg-surface-container-low flex flex-col gap-3">
<span class="font-label-lg text-label-lg font-semibold text-on-surface">Decentralized Management Fee Configuration</span>
<div class="flex flex-col gap-2">
<label class="flex items-center gap-2 cursor-pointer">
<input checked="" class="accent-primary" name="mgmt_fee_rule" type="radio">
<span class="font-label-md text-label-md font-medium text-on-surface">Configurable per Property & Mandate Agreement (Institutional Mode)</span>
</label>
<label class="flex items-center gap-2 cursor-pointer opacity-60">
<input class="accent-primary" disabled="" name="mgmt_fee_rule" type="radio">
<span class="font-label-md text-label-md font-medium text-on-surface">Uniform Global Fee Default (Not Permitted in Phase 1)</span>
</label>
</div>
<div class="p-3 rounded bg-surface-container-lowest text-on-surface-variant font-body-sm text-body-sm text-[12px] leading-relaxed">
<strong class="text-primary">Explicit Governance Rule:</strong> Management fees are established per individual property management agreement (e.g., 8.5% for Al-Yasmin Compound II under mandate AGR-2026-YAS-003). There is no blanket cross-portfolio fee percentage.
          </div>
</div>
<!-- Unit Reference Naming -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-md items-end">
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md font-semibold text-on-surface">Unit Nomenclature Standard</label>
<select class="px-3 py-2 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-primary">
<option selected="">Building Prefix + Floor + Unit Number (e.g., MV-101, A-101)</option>
<option>Sequential Numbering (e.g., UNIT-001, UNIT-002)</option>
<option>Custom Architectural Tag</option>
</select>
</div>
<div class="flex items-center justify-between p-2.5 rounded-lg bg-surface-container-low">
<span class="font-label-md text-label-md text-on-surface font-medium">Auto-generate Unit Identifier</span>
<div class="w-11 h-6 bg-primary rounded-full relative cursor-pointer flex items-center justify-end px-1 shadow-inner">
<div class="w-4 h-4 rounded-full bg-on-primary shadow-sm"></div>
</div>
</div>
</div>
</section>
<!-- SECTION 4: Booking Policies (Phase 1 Governance) -->
<section class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md" id="booking-policies">
<div>
<div class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-primary"></span>
<h2 class="font-headline-md text-headline-md text-on-surface font-semibold">4. Booking Policies & Availability Rules</h2>
</div>
<p class="font-body-md text-body-md text-on-surface-variant mt-0.5">
            Manager triage enforcement, inventory gating, and calendar decoupled holds.
          </p>
</div>
<!-- Booking Intake Model -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
<div class="p-4 rounded-lg bg-primary/5 flex flex-col gap-2">
<div class="flex items-center justify-between">
<span class="font-label-lg text-label-lg font-bold text-primary">Request-to-Book with Manager Triage</span>
<span class="px-2 py-0.5 rounded text-[11px] font-bold bg-primary text-on-primary">ACTIVE</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
              Enforced Phase 1 Rule: Every tenant inquiry undergoes property manager verification, identity verification, and manual approval before status transitions to confirmed.
            </p>
</div>
<div class="p-4 rounded-lg bg-surface-container-low opacity-60 flex flex-col gap-2">
<div class="flex items-center justify-between">
<span class="font-label-lg text-label-lg font-semibold text-on-surface">Instant Automated Booking</span>
<span class="px-2 py-0.5 rounded text-[11px] font-semibold bg-surface-container-highest text-on-surface-variant">DISABLED IN P1</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
              Instant autonomous checkout without administrative pre-qualification is strictly restricted for institutional assets.
            </p>
</div>
</div>
<!-- Safeguard Toggles -->
<div class="flex flex-col gap-3">
<div class="flex items-center justify-between p-3.5 rounded-lg bg-surface-container-low">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Strict Gatekeeping: Unpublished Properties</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">
                Properties marked as "Saved — Unpublished" (e.g. Al-Yasmin Compound II) cannot receive external inquiries or feed availability.
              </span>
</div>
<span class="px-2.5 py-1 rounded bg-surface-container-lowest font-label-sm text-label-sm font-bold text-primary shadow-sm">LOCKED ON</span>
</div>
<div class="flex items-center justify-between p-3.5 rounded-lg bg-surface-container-low">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Block Unconfigured Units from Feed</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">
                Units pending handover configuration (such as PG-03 or pending Al-Yasmin units) are automatically excluded from the scheduling ledger.
              </span>
</div>
<span class="px-2.5 py-1 rounded bg-surface-container-lowest font-label-sm text-label-sm font-bold text-primary shadow-sm">LOCKED ON</span>
</div>
</div>
<!-- Dual-Ledger Rule Callout -->
<div class="p-3.5 rounded-lg bg-surface-container-low flex items-start gap-3">
<span class="material-symbols-outlined text-secondary text-[22px] mt-0.5">lock_clock</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Decoupled Maintenance Holds (Dual-Ledger Rule)</span>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5 leading-relaxed">
              Maintenance holds (e.g. PG-03, PG-04) lock calendar availability independently of lease dates. Resolving an active work order does NOT automatically release calendar dates without formal manager verification.
            </p>
</div>
</div>
</section>
<!-- SECTION 5: Payments & Rent Collection -->
<section class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md" id="payments-collection">
<div>
<div class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-primary"></span>
<h2 class="font-headline-md text-headline-md text-on-surface font-semibold">5. Payments & Rent Collection Protocol</h2>
</div>
<p class="font-body-md text-body-md text-on-surface-variant mt-0.5">
            Offline settlement parameters, verification workflows, and segregated monetary ledgers.
          </p>
</div>
<!-- Permitted Methods -->
<div class="flex flex-col gap-2">
<label class="font-label-md text-label-md font-semibold text-on-surface">Permitted Institutional Settlement Channels</label>
<div class="grid grid-cols-1 md:grid-cols-3 gap-3">
<div class="p-3 rounded-lg bg-surface-container-low flex items-start gap-2.5">
<span class="material-symbols-outlined text-primary text-[20px]">account_balance</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Direct Bank Wire / IBAN</span>
<span class="font-body-sm text-body-sm text-on-surface-variant text-[11px]">Manual slip audit & reconciliation</span>
</div>
</div>
<div class="p-3 rounded-lg bg-surface-container-low flex items-start gap-2.5">
<span class="material-symbols-outlined text-primary text-[20px]">payments</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Physical Cash Collection</span>
<span class="font-body-sm text-body-sm text-on-surface-variant text-[11px]">Official leasing desk receipt voucher</span>
</div>
</div>
<div class="p-3 rounded-lg bg-surface-container-low flex items-start gap-2.5">
<span class="material-symbols-outlined text-primary text-[20px]">receipt_long</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Certified Manager Cheque</span>
<span class="font-body-sm text-body-sm text-on-surface-variant text-[11px]">Physical clearance verification</span>
</div>
</div>
</div>
</div>
<!-- Strictly Prohibited Box -->
<div class="p-4 rounded-lg bg-error-container/40 flex items-start gap-3">
<span class="material-symbols-outlined text-error text-[22px] mt-0.5">block</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-error">Phase 1 Restricted Mechanisms</span>
<p class="font-body-sm text-body-sm text-on-surface mt-0.5 leading-relaxed">
              Online credit card payment gateways, Stripe/Checkout widgets, automatic account debits, direct electronic refunds, and third-party escrow pools are strictly disabled in Phase 1 deployments. All settlements are verified offline.
            </p>
</div>
</div>
<!-- Segregation Toggles -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
<div class="p-3.5 rounded-lg bg-surface-container-low flex items-start justify-between gap-3">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Sovereign Ledger Segregation</span>
<span class="font-body-sm text-body-sm text-on-surface-variant text-[12px]">Never merge SAR, USD, or AED into unified totals without formal statutory exchange reconciliation.</span>
</div>
<div class="w-10 h-5 bg-primary rounded-full relative flex items-center justify-end px-0.5 shrink-0 mt-1">
<div class="w-4 h-4 rounded-full bg-on-primary"></div>
</div>
</div>
<div class="p-3.5 rounded-lg bg-surface-container-low flex items-start justify-between gap-3">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Obligation vs. Slip Decoupling</span>
<span class="font-body-sm text-body-sm text-on-surface-variant text-[12px]">Unpaid invoices remain isolated; uploaded slips never register as settled revenue until audited by Finance.</span>
</div>
<div class="w-10 h-5 bg-primary rounded-full relative flex items-center justify-end px-0.5 shrink-0 mt-1">
<div class="w-4 h-4 rounded-full bg-on-primary"></div>
</div>
</div>
</div>
</section>
<!-- SECTION 6: Team Roles & Permissions (RBAC Matrix) -->
<section class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md" id="team-roles-permissions">
<div class="flex items-start justify-between flex-wrap gap-2">
<div>
<div class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-primary"></span>
<h2 class="font-headline-md text-headline-md text-on-surface font-semibold">6. Team Roles & Permissions (RBAC)</h2>
</div>
<p class="font-body-md text-body-md text-on-surface-variant mt-0.5">
              Granular role-based authorization matrix. Phase 1 operates under authorized internal staff only.
            </p>
</div>
<button class="px-3 py-1.5 rounded-lg bg-primary hover:bg-primary-container text-on-primary font-label-md text-label-md font-medium shadow-sm transition-colors flex items-center gap-1" type="button" data-demo="+ Invite Team Member">
<span class="material-symbols-outlined text-[16px]">person_add</span>
            + Invite Team Member
          </button>
</div>
<div class="p-3 rounded-lg bg-surface-container-low text-on-surface font-body-sm text-body-sm">
<strong>Governance Note:</strong> Owner self-management portal is currently not active in Phase 1. All portfolio operations are administered by authorized operations and property managers.
        </div>
<!-- Permissions Matrix Table -->
<div class="overflow-x-auto rounded-lg bg-surface-container-low">
<table class="w-full text-left font-body-sm text-body-sm">
<thead class="bg-surface-container text-on-surface font-label-sm text-label-sm uppercase tracking-wider">
<tr>
<th class="p-3 font-semibold">Operational Scope / Module</th>
<th class="p-3 font-semibold text-primary">Operations Mgr</th>
<th class="p-3 font-semibold">Property Mgr</th>
<th class="p-3 font-semibold">Finance Staff</th>
<th class="p-3 font-semibold">Maintenance</th>
<th class="p-3 font-semibold">Auditor (Viewer)</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container-highest bg-surface-container-lowest">
<tr class="hover:bg-surface-container-low transition-colors">
<td class="p-3 font-medium text-on-surface">Property & Unit Architecture</td>
<td class="p-3 text-primary font-semibold">Full Access</td>
<td class="p-3 text-on-surface">Full Access</td>
<td class="p-3 text-on-surface-variant">View Only</td>
<td class="p-3 text-on-surface-variant">View Only</td>
<td class="p-3 text-on-surface-variant">View Only</td>
</tr>
<tr class="hover:bg-surface-container-low transition-colors">
<td class="p-3 font-medium text-on-surface">Tenant PII & KYC Identification</td>
<td class="p-3 text-primary font-semibold">Full (Unmasked)</td>
<td class="p-3 text-on-surface">Masked Logs</td>
<td class="p-3 text-on-surface-variant">Masked PII</td>
<td class="p-3 text-error font-medium">Restricted</td>
<td class="p-3 text-error font-medium">Restricted</td>
</tr>
<tr class="hover:bg-surface-container-low transition-colors">
<td class="p-3 font-medium text-on-surface">Booking Approvals & Triage</td>
<td class="p-3 text-primary font-semibold">Authorize & Sign</td>
<td class="p-3 text-on-surface font-medium">Review & Submit</td>
<td class="p-3 text-on-surface-variant">View Only</td>
<td class="p-3 text-on-surface-variant">View Only</td>
<td class="p-3 text-on-surface-variant">View Only</td>
</tr>
<tr class="hover:bg-surface-container-low transition-colors">
<td class="p-3 font-medium text-on-surface">Contracts & Formal Terms</td>
<td class="p-3 text-primary font-semibold">Authorize & Sign</td>
<td class="p-3 text-on-surface">Draft & Review</td>
<td class="p-3 text-on-surface-variant">View Financials</td>
<td class="p-3 text-error font-medium">No Access</td>
<td class="p-3 text-on-surface-variant">View Only</td>
</tr>
<tr class="hover:bg-surface-container-low transition-colors">
<td class="p-3 font-medium text-on-surface">Offline Settlement Verification</td>
<td class="p-3 text-primary font-semibold">Full Attestation</td>
<td class="p-3 text-on-surface-variant">Record Only</td>
<td class="p-3 text-primary font-semibold">Audit & Verify</td>
<td class="p-3 text-error font-medium">No Access</td>
<td class="p-3 text-on-surface-variant">View Only</td>
</tr>
<tr class="hover:bg-surface-container-low transition-colors">
<td class="p-3 font-medium text-on-surface">Work Orders & Calendar Holds</td>
<td class="p-3 text-primary font-semibold">Full Access</td>
<td class="p-3 text-on-surface">Full Access</td>
<td class="p-3 text-on-surface-variant">View Costs</td>
<td class="p-3 text-on-surface font-medium">Assign & Update</td>
<td class="p-3 text-on-surface-variant">View Only</td>
</tr>
<tr class="hover:bg-surface-container-low transition-colors">
<td class="p-3 font-medium text-on-surface">Owner Financial Statements</td>
<td class="p-3 text-primary font-semibold">Full Access</td>
<td class="p-3 text-on-surface-variant">View Only</td>
<td class="p-3 text-primary font-semibold">Generate & Audit</td>
<td class="p-3 text-error font-medium">No Access</td>
<td class="p-3 text-error font-medium">No Access</td>
</tr>
</tbody>
</table>
</div>
<!-- Active Staff Strip -->
<div class="flex flex-col gap-2 pt-1">
<span class="font-label-md text-label-md font-semibold text-on-surface">Active Institutional Operators (4 Assigned)</span>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2.5">
<div class="p-2.5 rounded-lg bg-surface-container-low flex items-center gap-2">
<div class="w-8 h-8 rounded-full bg-primary text-on-primary font-bold flex items-center justify-center text-[12px]">SA</div>
<div class="flex flex-col truncate">
<span class="font-label-md text-label-md font-semibold text-on-surface truncate">Sultan Al-Shammari</span>
<span class="font-label-sm text-label-sm text-on-surface-variant truncate">Ops Mgr • Admin</span>
</div>
</div>
<div class="p-2.5 rounded-lg bg-surface-container-low flex items-center gap-2">
<div class="w-8 h-8 rounded-full bg-secondary text-on-secondary font-bold flex items-center justify-center text-[12px]">TH</div>
<div class="flex flex-col truncate">
<span class="font-label-md text-label-md font-semibold text-on-surface truncate">Tariq Al-Husseini</span>
<span class="font-label-sm text-label-sm text-on-surface-variant truncate">Property Manager</span>
</div>
</div>
<div class="p-2.5 rounded-lg bg-surface-container-low flex items-center gap-2">
<div class="w-8 h-8 rounded-full bg-surface-container-highest text-on-surface font-bold flex items-center justify-center text-[12px]">RK</div>
<div class="flex flex-col truncate">
<span class="font-label-md text-label-md font-semibold text-on-surface truncate">Reem Al-Khatib</span>
<span class="font-label-sm text-label-sm text-on-surface-variant truncate">Finance Officer</span>
</div>
</div>
<div class="p-2.5 rounded-lg bg-surface-container-low flex items-center gap-2">
<div class="w-8 h-8 rounded-full bg-surface-container-highest text-on-surface font-bold flex items-center justify-center text-[12px]">ZM</div>
<div class="flex flex-col truncate">
<span class="font-label-md text-label-md font-semibold text-on-surface truncate">Zaid Mansour</span>
<span class="font-label-sm text-label-sm text-on-surface-variant truncate">Lead Maintenance</span>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 7: Notifications & Dispatch Channels -->
<section class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md" id="notifications-alerts">
<div>
<div class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-primary"></span>
<h2 class="font-headline-md text-headline-md text-on-surface font-semibold">7. Notifications & Dispatch Channels</h2>
</div>
<p class="font-body-md text-body-md text-on-surface-variant mt-0.5">
            Operational event triggers, escalation relays, and gateway connection states.
          </p>
</div>
<!-- 3 Dispatch Channels -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-space-md">
<div class="p-4 rounded-lg bg-surface-container-low flex flex-col justify-between gap-3">
<div class="flex items-start justify-between">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[20px]">notifications</span>
<span class="font-label-lg text-label-lg font-semibold text-on-surface">In-App Alert Relay</span>
</div>
<span class="w-2 h-2 rounded-full bg-emerald-600"></span>
</div>
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant">System Default</span>
<span class="font-label-md text-label-md font-bold text-primary">Connected</span>
</div>
</div>
<div class="p-4 rounded-lg bg-surface-container-low flex flex-col justify-between gap-3">
<div class="flex items-start justify-between">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-on-surface-variant text-[20px]">mail</span>
<span class="font-label-lg text-label-lg font-semibold text-on-surface">SMTP Email Dispatch</span>
</div>
<span class="w-2 h-2 rounded-full bg-amber-500"></span>
</div>
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant">Gateway Setup Req.</span>
<span class="font-label-md text-label-md font-medium text-on-surface-variant">Not Connected</span>
</div>
</div>
<div class="p-4 rounded-lg bg-surface-container-low flex flex-col justify-between gap-3">
<div class="flex items-start justify-between">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-on-surface-variant text-[20px]">chat</span>
<span class="font-label-lg text-label-lg font-semibold text-on-surface">WhatsApp Business API</span>
</div>
<span class="w-2 h-2 rounded-full bg-neutral-400"></span>
</div>
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant">Meta Auth Pending</span>
<span class="font-label-md text-label-md font-medium text-on-surface-variant">Disabled</span>
</div>
</div>
</div>
<div class="p-3 rounded bg-surface-container-low text-on-surface-variant font-body-sm text-body-sm text-[12px]">
<strong>Illustrative UI Notice:</strong> External email and messaging webhooks are intentionally detached in this environment. No external network transmissions are fired.
        </div>
<!-- Event Toggles Matrix -->
<div class="flex flex-col gap-2">
<div class="flex items-center justify-between text-on-surface-variant font-label-sm text-label-sm uppercase px-2">
<span>Portfolio Event Trigger</span>
<div class="flex gap-6 pr-2">
<span class="w-16 text-center">In-App</span>
<span class="w-16 text-center">Email</span>
<span class="w-16 text-center">WhatsApp</span>
</div>
</div>
<!-- Rows -->
<div class="flex flex-col gap-1.5">
<div class="flex items-center justify-between p-2.5 rounded bg-surface-container-low">
<span class="font-body-md text-body-md text-on-surface">New Booking Request Submitted</span>
<div class="flex gap-6 pr-2">
<span class="w-16 text-center font-label-md text-primary font-bold">ON</span>
<span class="w-16 text-center font-label-md text-on-surface-variant opacity-40">OFF</span>
<span class="w-16 text-center font-label-md text-on-surface-variant opacity-40">OFF</span>
</div>
</div>
<div class="flex items-center justify-between p-2.5 rounded bg-surface-container-low">
<span class="font-body-md text-body-md text-on-surface">Tenant Rent Due Reminder (7 Days Prior)</span>
<div class="flex gap-6 pr-2">
<span class="w-16 text-center font-label-md text-primary font-bold">ON</span>
<span class="w-16 text-center font-label-md text-on-surface-variant opacity-40">OFF</span>
<span class="w-16 text-center font-label-md text-on-surface-variant opacity-40">OFF</span>
</div>
</div>
<div class="flex items-center justify-between p-2.5 rounded bg-surface-container-low">
<span class="font-body-md text-body-md text-on-surface">Payment Slip Awaiting Verification</span>
<div class="flex gap-6 pr-2">
<span class="w-16 text-center font-label-md text-primary font-bold">ON</span>
<span class="w-16 text-center font-label-md text-on-surface-variant opacity-40">OFF</span>
<span class="w-16 text-center font-label-md text-on-surface-variant opacity-40">OFF</span>
</div>
</div>
<div class="flex items-center justify-between p-2.5 rounded bg-surface-container-low">
<span class="font-body-md text-body-md text-on-surface">Urgent Maintenance Ticket Raised</span>
<div class="flex gap-6 pr-2">
<span class="w-16 text-center font-label-md text-primary font-bold">ON</span>
<span class="w-16 text-center font-label-md text-on-surface-variant opacity-40">OFF</span>
<span class="w-16 text-center font-label-md text-on-surface-variant opacity-40">OFF</span>
</div>
</div>
<div class="flex items-center justify-between p-2.5 rounded bg-surface-container-low">
<span class="font-body-md text-body-md text-on-surface">Contract Renewal Window Reached (60 Days)</span>
<div class="flex gap-6 pr-2">
<span class="w-16 text-center font-label-md text-primary font-bold">ON</span>
<span class="w-16 text-center font-label-md text-on-surface-variant opacity-40">OFF</span>
<span class="w-16 text-center font-label-md text-on-surface-variant opacity-40">OFF</span>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 8: Documents & Data Management -->
<section class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md" id="documents-data">
<div>
<div class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-primary"></span>
<h2 class="font-headline-md text-headline-md text-on-surface font-semibold">8. Documents & Data Governance</h2>
</div>
<p class="font-body-md text-body-md text-on-surface-variant mt-0.5">
            Cryptographic retention standards, intake ceilings, and PII masking triggers.
          </p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-space-md">
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md font-semibold text-on-surface">Max Document Upload Size</label>
<select class="px-3 py-2 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-primary">
<option selected="">25 MB per document</option>
<option>50 MB per document</option>
<option>100 MB (Enterprise)</option>
</select>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md font-semibold text-on-surface">Default Classification Level</label>
<select class="px-3 py-2 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-primary">
<option selected="">Restricted (RBAC Level 2)</option>
<option>Confidential Executive</option>
<option>Standard Operations</option>
</select>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md font-semibold text-on-surface">Statutory Retention Cycle</label>
<select class="px-3 py-2 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-primary">
<option selected="">7 Years (Corporate Real Estate)</option>
<option>10 Years (Sovereign Mandates)</option>
<option>Permanent Archive</option>
</select>
</div>
</div>
<!-- Badges for extensions -->
<div class="flex flex-col gap-2">
<span class="font-label-md text-label-md font-semibold text-on-surface">Permitted MIME Types & Formats</span>
<div class="flex flex-wrap gap-2">
<span class="px-2.5 py-1 rounded bg-surface-container font-label-sm text-label-sm font-semibold text-on-surface">PDF (Standard)</span>
<span class="px-2.5 py-1 rounded bg-surface-container font-label-sm text-label-sm font-semibold text-on-surface">PNG (Scans)</span>
<span class="px-2.5 py-1 rounded bg-surface-container font-label-sm text-label-sm font-semibold text-on-surface">JPG / JPEG</span>
<span class="px-2.5 py-1 rounded bg-surface-container font-label-sm text-label-sm font-semibold text-on-surface">DOCX (Agreements)</span>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-md pt-2">
<div class="p-3.5 rounded-lg bg-surface-container-low flex items-center justify-between">
<div class="flex flex-col pr-2">
<span class="font-label-md text-label-md font-semibold text-on-surface">Automated National ID & Passport Masking</span>
<span class="font-body-sm text-body-sm text-on-surface-variant text-[12px]">Hides PII numbers on non-admin document viewports.</span>
</div>
<div class="w-10 h-5 bg-primary rounded-full relative flex items-center justify-end px-0.5 shrink-0">
<div class="w-4 h-4 rounded-full bg-on-primary"></div>
</div>
</div>
<div class="p-3.5 rounded-lg bg-surface-container-low flex items-center justify-between">
<div class="flex flex-col pr-2">
<span class="font-label-md text-label-md font-semibold text-on-surface">Bulk CSV / Excel Export Safeguard</span>
<span class="font-body-sm text-body-sm text-on-surface-variant text-[12px]">Requires Operations Manager attestation code before export.</span>
</div>
<div class="w-10 h-5 bg-primary rounded-full relative flex items-center justify-end px-0.5 shrink-0">
<div class="w-4 h-4 rounded-full bg-on-primary"></div>
</div>
</div>
</div>
</section>
<!-- SECTION 9: Branding & Visual Appearance -->
<section class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md" id="branding-appearance">
<div>
<div class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-primary"></span>
<h2 class="font-headline-md text-headline-md text-on-surface font-semibold">9. Branding & Visual Appearance</h2>
</div>
<p class="font-body-md text-body-md text-on-surface-variant mt-0.5">
            Palette configurations, typographic scale, and UI container density.
          </p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-space-md">
<div class="p-3 rounded-lg bg-surface-container-low flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-primary shadow-sm"></div>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Primary Burgundy</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">#1F4E78 (Active Token)</span>
</div>
</div>
<div class="p-3 rounded-lg bg-surface-container-low flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-primary-container shadow-sm"></div>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Secondary Burgundy</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">#1F4E78 (Container)</span>
</div>
</div>
<div class="p-3 rounded-lg bg-surface-container-low flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-background shadow-inner"></div>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Warm Canvas Base</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">#F4F6F9 (Off-White)</span>
</div>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-md pt-2">
<div class="flex flex-col gap-2">
<span class="font-label-md text-label-md font-semibold text-on-surface">UI Spatial Density</span>
<div class="flex gap-4">
<label class="flex items-center gap-2 cursor-pointer">
<input checked="" class="accent-primary" name="density" type="radio">
<span class="font-body-md text-body-md text-on-surface">Comfortable (Standard)</span>
</label>
<label class="flex items-center gap-2 cursor-pointer">
<input class="accent-primary" name="density" type="radio">
<span class="font-body-md text-body-md text-on-surface">Compact (Dense Grid)</span>
</label>
</div>
</div>
<div class="flex flex-col gap-2">
<span class="font-label-md text-label-md font-semibold text-on-surface">Theme Mode Selection</span>
<div class="flex items-center gap-4">
<label class="flex items-center gap-2 cursor-pointer">
<input checked="" class="accent-primary" name="theme_mode" type="radio">
<span class="font-body-md text-body-md text-on-surface">Light Warm Luxury</span>
</label>
<label class="flex items-center gap-2 cursor-pointer opacity-50">
<input class="accent-primary" disabled="" name="theme_mode" type="radio">
<span class="font-body-md text-body-md text-on-surface">Dark Mode (Phase 2)</span>
</label>
</div>
</div>
</div>
</section>
<!-- SECTION 10: Security, Sessions & Audit Log -->
<section class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md" id="security-audit">
<div>
<div class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-primary"></span>
<h2 class="font-headline-md text-headline-md text-on-surface font-semibold">10. Security & Operational Audit Log</h2>
</div>
<p class="font-body-md text-body-md text-on-surface-variant mt-0.5">
            Session expiration rules, authentication safeguards, and immutable activity journal.
          </p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-space-md">
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md font-semibold text-on-surface">Session Inactivity Timeout</label>
<select class="px-3 py-2 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-primary">
<option selected="">30 Minutes (Recommended)</option>
<option>15 Minutes (High Security)</option>
<option>60 Minutes</option>
</select>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md font-semibold text-on-surface">Password Expiration Standard</label>
<select class="px-3 py-2 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-primary">
<option selected="">90 Days (Institutional Mandate)</option>
<option>180 Days</option>
<option>Never Expire</option>
</select>
</div>
<div class="flex flex-col justify-end">
<div class="flex items-center justify-between p-2 rounded-lg bg-surface-container-low h-10">
<span class="font-label-md text-label-md text-on-surface font-medium">MFA Mandatory for Managers</span>
<div class="w-9 h-5 bg-primary rounded-full relative flex items-center justify-end px-0.5">
<div class="w-3.5 h-3.5 rounded-full bg-on-primary"></div>
</div>
</div>
</div>
</div>
<!-- Static Prototype Notice -->
<div class="p-3.5 rounded-lg bg-surface-container-low flex items-start gap-3">
<span class="material-symbols-outlined text-primary text-[20px] mt-0.5">encrypted</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-primary">Prototype Security State Notice</span>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5 leading-relaxed">
              All settings presented herein are prototype configurations. No backend database persistence, encryption certification, or active authentication middleware is currently connected.
            </p>
</div>
</div>
<!-- Chronological Audit Log Snippet -->
<div class="flex flex-col gap-2 pt-2">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md font-semibold text-on-surface">Recent System Activity Audit Snippet</span>
<a class="font-label-sm text-label-sm font-semibold text-primary hover:underline" href="#demo-notice" data-demo="View Complete Audit Log →">View Complete Audit Log →</a>
</div>
<div class="flex flex-col divide-y divide-surface-container-highest rounded-lg bg-surface-container-low overflow-hidden">
<div class="p-3 flex items-center justify-between text-body-sm">
<div class="flex items-center gap-3">
<span class="font-label-sm text-label-sm font-semibold text-on-surface-variant w-28">Today 08:30 AST</span>
<span class="font-semibold text-on-surface">Eng. Sultan Al-Shammari</span>
<span class="text-on-surface-variant">Updated Booking Availability Restriction for Unit PG-03</span>
</div>
<span class="px-2 py-0.5 rounded text-[11px] font-semibold bg-surface-container-lowest text-on-surface shadow-sm">Audit Recorded</span>
</div>
<div class="p-3 flex items-center justify-between text-body-sm">
<div class="flex items-center gap-3">
<span class="font-label-sm text-label-sm font-semibold text-on-surface-variant w-28">Yesterday 14:15 AST</span>
<span class="font-semibold text-on-surface">Eng. Sultan Al-Shammari</span>
<span class="text-on-surface-variant">Uploaded Document DOC-2026-003 for Al-Yasmin Compound II</span>
</div>
<span class="px-2 py-0.5 rounded text-[11px] font-semibold bg-surface-container-lowest text-on-surface shadow-sm">Audit Recorded</span>
</div>
<div class="p-3 flex items-center justify-between text-body-sm">
<div class="flex items-center gap-3">
<span class="font-label-sm text-label-sm font-semibold text-on-surface-variant w-28">18 May 2026 11:20 AST</span>
<span class="font-semibold text-on-surface">Reem Al-Khatib</span>
<span class="text-on-surface-variant">Attested Offline Payment PAY-2026-001 (USD 2,100)</span>
</div>
<span class="px-2 py-0.5 rounded text-[11px] font-semibold bg-surface-container-lowest text-on-surface shadow-sm">Audit Recorded</span>
</div>
</div>
</div>
</section>
</div>
</div>
<!-- FLOATING PERSISTENT SAVE FOOTER -->
<div class="fixed bottom-0 left-72 right-0 bg-surface-container-lowest/95 backdrop-blur-md px-space-lg py-3 flex items-center justify-between z-30 shadow-xl">
<div class="flex items-center gap-2 text-on-surface-variant font-label-md text-label-md">
<span class="w-2.5 h-2.5 rounded-full bg-primary animate-ping"></span>
<span>Unsaved institutional parameters: <strong class="text-on-surface">0 modifications pending</strong></span>
</div>
<div class="flex items-center gap-space-sm">
<button class="px-4 py-1.5 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md font-medium transition-colors" type="button" data-demo="Discard All Changes">
        Discard All Changes
      </button>
<button class="px-5 py-1.5 rounded-lg bg-primary hover:bg-primary-container text-on-primary font-label-md text-label-md font-medium shadow-md transition-all flex items-center gap-1.5 active:scale-95" type="button" data-demo="Save All Settings">
<span class="material-symbols-outlined text-[18px]">save</span>
        Save All Settings
      </button>
</div>
</div>
</div>

@endsection
