{{-- Imported from client_demo/screens/reports_analytics/code.html; static demonstration data. --}}
@extends('layouts.manager')
@section('content')
<div class="flex flex-col w-full">
<!-- Top Utility Context Bar -->
<div class="flex flex-wrap items-center justify-between gap-y-3 pb-space-md mb-space-md">
<div class="flex flex-col gap-1">
<div class="flex items-center gap-2">
<span class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface cursor-pointer" role="button" tabindex="0" data-demo="Dashboard">Dashboard</span>
<span class="material-symbols-outlined text-outline-variant text-[14px]">chevron_right</span>
<span class="font-label-md text-label-md text-primary font-semibold">Reports & Analytics</span>
<span class="ml-2 font-label-sm text-label-sm px-2.5 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed uppercase tracking-wider font-semibold">Audited Ledger Model</span>
</div>
<div class="flex items-baseline gap-3 mt-1">
<h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Reports & Portfolio Analytics</h1>
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest hidden md:inline">REP-MOD-2026.04-KSA</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant max-w-4xl">
        Understand institutional portfolio performance, verified occupancy, rental velocity, collection status, maintenance burdens, and segregated owner distributions.
      </p>
</div>
<!-- Action Bar -->
<div class="flex items-center gap-3">
<button class="flex items-center gap-2 px-4 h-10 rounded-lg bg-surface-container-lowest text-on-surface hover:bg-surface-container-low transition-all shadow-sm" data-demo="Configure Report" type="button">
<span class="material-symbols-outlined text-[18px] text-primary">tune</span>
<span class="font-label-lg text-label-lg font-medium">Configure Report</span>
</button>
<button class="flex items-center gap-2 px-5 h-10 rounded-lg bg-primary-container text-on-primary hover:bg-primary transition-all shadow-sm" id="exportModalBtn" data-demo="Export Report" type="button">
<span class="material-symbols-outlined text-[18px]">ios_share</span>
<span class="font-label-lg text-label-lg font-semibold">Export Report</span>
</button>
</div>
</div>
<!-- Global Analytical Filter Bar -->
<div class="w-full bg-surface-container-lowest rounded-xl p-space-md mb-space-lg shadow-sm">
<div class="flex items-center justify-between pb-3 mb-3 border-b border-surface-container-high">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[20px]">filter_alt</span>
<span class="font-label-lg text-label-lg font-semibold text-on-surface">Dimensional Filters</span>
<span class="font-label-sm text-label-sm text-on-surface-variant ml-2">Static Analytical Snapshot (Q2 Fiscal Baseline)</span>
</div>
<div class="flex items-center gap-2">
<button class="font-label-md text-label-md text-primary hover:underline font-medium" data-demo="Reset All" type="button">Reset All</button>
<span class="text-surface-container-high">•</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Applied: 8 Dimensions</span>
</div>
</div>
<!-- Filter Inputs Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-3">
<!-- Period -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm text-on-surface-variant uppercase">Period</label>
<div class="relative">
<select class="w-full h-9 pl-2.5 pr-7 bg-surface-container-low text-on-surface font-body-sm text-body-sm rounded-lg appearance-none focus:outline-none focus:bg-surface-container-lowest">
<option>This Month</option>
<option>Last Month</option>
<option selected="">This Quarter</option>
<option>This Year</option>
<option>Custom Range</option>
</select>
<span class="material-symbols-outlined absolute right-2 top-2.5 text-[16px] text-on-surface-variant pointer-events-none">expand_more</span>
</div>
</div>
<!-- Country / Jurisdiction -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm text-on-surface-variant uppercase">Country</label>
<div class="relative">
<select class="w-full h-9 pl-2.5 pr-7 bg-surface-container-low text-on-surface font-body-sm text-body-sm rounded-lg appearance-none focus:outline-none focus:bg-surface-container-lowest">
<option selected="">All Jurisdictions</option>
<option>Saudi Arabia (KSA)</option>
<option>United Arab Emirates</option>
</select>
<span class="material-symbols-outlined absolute right-2 top-2.5 text-[16px] text-on-surface-variant pointer-events-none">expand_more</span>
</div>
</div>
<!-- Property -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm text-on-surface-variant uppercase">Property</label>
<div class="relative">
<select class="w-full h-9 pl-2.5 pr-7 bg-surface-container-low text-on-surface font-body-sm text-body-sm rounded-lg appearance-none focus:outline-none focus:bg-surface-container-lowest">
<option selected="">All Properties</option>
<option>Al-Yasmin Compound II</option>
<option>Marina View Residences</option>
<option>Palm Grove Chalets</option>
</select>
<span class="material-symbols-outlined absolute right-2 top-2.5 text-[16px] text-on-surface-variant pointer-events-none">expand_more</span>
</div>
</div>
<!-- Property Type -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm text-on-surface-variant uppercase">Type</label>
<div class="relative">
<select class="w-full h-9 pl-2.5 pr-7 bg-surface-container-low text-on-surface font-body-sm text-body-sm rounded-lg appearance-none focus:outline-none focus:bg-surface-container-lowest">
<option selected="">All Types</option>
<option>Residential Compound</option>
<option>Waterfront Tower</option>
<option>Luxury Chalets</option>
</select>
<span class="material-symbols-outlined absolute right-2 top-2.5 text-[16px] text-on-surface-variant pointer-events-none">expand_more</span>
</div>
</div>
<!-- Owner -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm text-on-surface-variant uppercase">Owner</label>
<div class="relative">
<select class="w-full h-9 pl-2.5 pr-7 bg-surface-container-low text-on-surface font-body-sm text-body-sm rounded-lg appearance-none focus:outline-none focus:bg-surface-container-lowest">
<option selected="">All Owners</option>
<option>Muqrin Real Estate Holdings</option>
<option>Al-Rajhi Family Trust</option>
<option>Gulf Capital Assets</option>
</select>
<span class="material-symbols-outlined absolute right-2 top-2.5 text-[16px] text-on-surface-variant pointer-events-none">expand_more</span>
</div>
</div>
<!-- Rental Period -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm text-on-surface-variant uppercase">Cadence</label>
<div class="relative">
<select class="w-full h-9 pl-2.5 pr-7 bg-surface-container-low text-on-surface font-body-sm text-body-sm rounded-lg appearance-none focus:outline-none focus:bg-surface-container-lowest">
<option selected="">All (Monthly/Daily/Yearly)</option>
<option>Monthly Long-Term</option>
<option>Daily Hospitality</option>
<option>Yearly Commercial</option>
</select>
<span class="material-symbols-outlined absolute right-2 top-2.5 text-[16px] text-on-surface-variant pointer-events-none">expand_more</span>
</div>
</div>
<!-- Currency Rule -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm text-on-surface-variant uppercase">Currency Mode</label>
<div class="relative">
<select class="w-full h-9 pl-2.5 pr-7 bg-surface-container-low text-on-surface font-body-sm text-body-sm rounded-lg appearance-none focus:outline-none focus:bg-surface-container-lowest font-medium text-primary">
<option selected="">Original Currency</option>
<option>SAR (Saudi Riyal)</option>
<option>USD (US Dollar)</option>
<option>AED (Dirham)</option>
</select>
<span class="material-symbols-outlined absolute right-2 top-2.5 text-[16px] text-on-surface-variant pointer-events-none">expand_more</span>
</div>
</div>
<!-- Category -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm text-on-surface-variant uppercase">Report Focus</label>
<div class="relative">
<select class="w-full h-9 pl-2.5 pr-7 bg-surface-container-low text-on-surface font-body-sm text-body-sm rounded-lg appearance-none focus:outline-none focus:bg-surface-container-lowest">
<option selected="">Portfolio Performance</option>
<option>Occupancy Auditing</option>
<option>Rent Collection</option>
<option>Maintenance Burden</option>
<option>Owner Statements</option>
</select>
<span class="material-symbols-outlined absolute right-2 top-2.5 text-[16px] text-on-surface-variant pointer-events-none">expand_more</span>
</div>
</div>
</div>
<!-- Governance Rule Tagline -->
<div class="flex items-center gap-2 mt-3 pt-3 bg-surface-container-low rounded-lg px-3 py-2">
<span class="material-symbols-outlined text-[16px] text-secondary">verified_user</span>
<p class="font-label-md text-label-md text-on-surface-variant leading-tight">
<strong class="font-semibold text-on-surface">Statutory Ledger Governance:</strong> Currencies are maintained independently. Multi-currency totals are strictly not commingled without statutory daily exchange settlements.
      </p>
</div>
</div>
<!-- Primary KPI Grid: Portfolio Overview & Capacity Analysis -->
<div class="mb-space-lg">
<div class="flex items-center justify-between mb-3">
<div class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-primary"></span>
<h2 class="font-headline-sm text-headline-sm text-on-surface tracking-tight uppercase">Portfolio Inventory & Operational Capacity</h2>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">Real-time occupancy registry baseline</span>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-space-md">
<!-- Card 1: Total Units -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between text-on-surface-variant mb-2">
<span class="font-label-sm text-label-sm uppercase font-semibold">Planned Units</span>
<span class="material-symbols-outlined text-[18px]">domain_add</span>
</div>
<div class="flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl text-on-surface font-bold">30</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Units</span>
</div>
<div class="mt-2 pt-2 text-on-surface-variant font-body-sm text-body-sm">
          Entire multi-asset master registry
        </div>
</div>
<!-- Card 2: Configured Units -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between text-on-surface-variant mb-2">
<span class="font-label-sm text-label-sm uppercase font-semibold">Configured Inventory</span>
<span class="material-symbols-outlined text-[18px]">fact_check</span>
</div>
<div class="flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl text-primary font-bold">21</span>
<span class="font-label-sm text-label-sm font-semibold px-2 py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed">70.0% setup</span>
</div>
<div class="mt-2 pt-2 text-on-surface-variant font-body-sm text-body-sm">
          9 units pending onboarding specs
        </div>
</div>
<!-- Card 3: Occupied Units -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between text-on-surface-variant mb-2">
<span class="font-label-sm text-label-sm uppercase font-semibold">Occupied Units</span>
<span class="material-symbols-outlined text-[18px] text-tertiary">key</span>
</div>
<div class="flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl text-on-surface font-bold">10</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Active leases</span>
</div>
<div class="mt-2 pt-2 text-on-surface-variant font-body-sm text-body-sm">
          Across Marina & Palm Grove
        </div>
</div>
<!-- Card 4: Vacant Units -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between text-on-surface-variant mb-2">
<span class="font-label-sm text-label-sm uppercase font-semibold">Vacant Units</span>
<span class="material-symbols-outlined text-[18px]">meeting_room</span>
</div>
<div class="flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl text-on-surface font-bold">11</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Marketable</span>
</div>
<div class="mt-2 pt-2 text-on-surface-variant font-body-sm text-body-sm">
          4 units in Yasmin (unpublished)
        </div>
</div>
<!-- Card 5: Configured Occupancy Rate -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between text-on-surface-variant mb-2">
<span class="font-label-sm text-label-sm uppercase font-semibold">Configured Occupancy</span>
<span class="material-symbols-outlined text-[18px] text-primary">percent</span>
</div>
<div class="flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl text-primary font-bold">47.6%</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">10 / 21 units</span>
</div>
<div class="mt-2 pt-2 text-on-surface-variant font-body-sm text-body-sm">
          Excludes 9 unconfigured units
        </div>
</div>
<!-- Card 6: Maintenance Restrictions -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between text-on-surface-variant mb-2">
<span class="font-label-sm text-label-sm uppercase font-semibold">Holds & Restrictions</span>
<span class="material-symbols-outlined text-[18px] text-error">handyman</span>
</div>
<div class="flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl text-error font-bold">2</span>
<span class="font-label-sm text-label-sm font-semibold px-2 py-0.5 rounded-full bg-error-container text-on-error-container">PG-03, PG-04</span>
</div>
<div class="mt-2 pt-2 text-on-surface-variant font-body-sm text-body-sm">
          Active operational holds
        </div>
</div>
</div>
<!-- Footnote for Calculation Rigor -->
<div class="px-space-md py-2 mt-2 bg-surface-container-low rounded-lg flex items-center justify-between">
<span class="font-body-sm text-body-sm text-on-surface-variant">
<strong>Mathematical Balance:</strong> 10 occupied + 11 vacant = 21 configured units. 9 units pending onboarding configuration. Maintenance restrictions (2) represent calendar operational holds and may overlap vacant inventory.
      </span>
<span class="font-label-sm text-label-sm text-primary font-semibold">REIT Compliance Grade</span>
</div>
</div>
<!-- Secondary KPI Grid: Bookings & Contract Lifecycle -->
<div class="mb-space-lg">
<div class="flex items-center justify-between mb-3">
<div class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-secondary"></span>
<h2 class="font-headline-sm text-headline-sm text-on-surface tracking-tight uppercase">Operational Velocity & Contract Pipeline</h2>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">Booking pipeline & verification queue</span>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-space-md">
<!-- Total Booking Requests -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between text-on-surface-variant mb-2">
<span class="font-label-sm text-label-sm uppercase font-semibold">Booking Requests</span>
<span class="material-symbols-outlined text-[18px]">calendar_month</span>
</div>
<div class="flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl text-on-surface font-bold">18</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Total Vol.</span>
</div>
<div class="flex items-center gap-1.5 mt-2 flex-wrap font-label-sm text-label-sm">
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface">8 Approved</span>
<span class="px-2 py-0.5 rounded bg-secondary-fixed text-on-secondary-fixed">4 Pending</span>
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface-variant">6 Declined/Cncl</span>
</div>
</div>
<!-- Upcoming Stays -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between text-on-surface-variant mb-2">
<span class="font-label-sm text-label-sm uppercase font-semibold">Upcoming Stays</span>
<span class="material-symbols-outlined text-[18px] text-tertiary">flight_land</span>
</div>
<div class="flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl text-tertiary font-bold">2</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Next 72 Hours</span>
</div>
<div class="mt-2 pt-2 text-on-surface-variant font-body-sm text-body-sm">
          Marina View (MV-102) & Palm Grove (PG-01)
        </div>
</div>
<!-- Total Rental Contracts -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between text-on-surface-variant mb-2">
<span class="font-label-sm text-label-sm uppercase font-semibold">Rental Contracts</span>
<span class="material-symbols-outlined text-[18px] text-primary">gavel</span>
</div>
<div class="flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl text-on-surface font-bold">14</span>
<span class="font-label-sm text-label-sm font-semibold px-2 py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed">10 Active</span>
</div>
<div class="mt-2 pt-2 text-on-surface-variant font-body-sm text-body-sm">
          2 Drafts • 1 Pending Signature • 1 Expired
        </div>
</div>
<!-- Payment Submissions -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between text-on-surface-variant mb-2">
<span class="font-label-sm text-label-sm uppercase font-semibold">Payment Submissions</span>
<span class="material-symbols-outlined text-[18px]">receipt_long</span>
</div>
<div class="flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl text-on-surface font-bold">16</span>
<span class="font-label-sm text-label-sm text-primary font-semibold">9 Verified</span>
</div>
<div class="mt-2 pt-2 text-on-surface-variant font-body-sm text-body-sm">
          4 Pending Audit • 1 Rejected • 2 Draft
        </div>
</div>
<!-- Outstanding Obligations -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between text-on-surface-variant mb-2">
<span class="font-label-sm text-label-sm uppercase font-semibold">Outstanding Dues</span>
<span class="material-symbols-outlined text-[18px] text-error">pending_actions</span>
</div>
<div class="flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl text-error font-bold">2</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Tenants</span>
</div>
<div class="mt-2 pt-2 text-on-surface-variant font-body-sm text-body-sm">
          Unpaid tenant dues tracked independently
        </div>
</div>
</div>
<!-- Alert Note on Manual Protocol -->
<div class="flex items-center justify-between p-3 mt-2 rounded-lg bg-surface-container-low text-on-surface">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-primary">security_update_warning</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">
<strong>Institutional Governance Notice:</strong> Manual approval protocol strictly active. Approved bookings require offline bank deposit verification before physical key card dispatch. Zero bookings or contracts recorded for Al-Yasmin Compound II.
        </span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant whitespace-nowrap">Gatekeeper Mode: Active</span>
</div>
</div>
<!-- Row 1: Occupancy Distribution & Booking Funnel Analytics -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg mb-space-lg">
<!-- Occupancy by Property Horizontal Visual -->
<div class="lg:col-span-7 bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between pb-3 mb-4 border-b border-surface-container-high">
<div>
<h3 class="font-headline-md text-headline-md text-on-surface">Occupancy Breakdown by Property</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Calculated against configured physical capacity</p>
</div>
<span class="px-2.5 py-1 rounded-full bg-surface-container text-on-surface font-label-sm text-label-sm">3 Assets Loaded</span>
</div>
<!-- Property Bar 1: Al-Yasmin Compound II -->
<div class="mb-5">
<div class="flex items-center justify-between mb-1.5">
<div class="flex items-center gap-2">
<span class="font-label-lg text-label-lg font-semibold text-on-surface">Al-Yasmin Compound II</span>
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface-variant font-label-sm text-label-sm">Unpublished Master</span>
</div>
<span class="font-label-md text-label-md font-bold text-on-surface">0.0% Occupancy</span>
</div>
<!-- Stacked Bar -->
<div class="w-full h-4 bg-surface-container-high rounded-full overflow-hidden flex">
<!-- 0% Occupied -->
<div class="h-full bg-surface-container-highest" style="width: 33.3%;" title="4 Vacant"></div>
<div class="h-full bg-surface-container" style="width: 66.7%;" title="8 Pending Configuration"></div>
</div>
<div class="flex items-center justify-between text-on-surface-variant font-label-sm text-label-sm mt-1.5">
<span>4 Configured • 0 Occupied • 4 Vacant • 8 Pending Onboarding</span>
<span class="text-secondary italic">Vacancy ≠ Booking Eligible (Draft state)</span>
</div>
</div>
<!-- Property Bar 2: Marina View Residences -->
<div class="mb-5">
<div class="flex items-center justify-between mb-1.5">
<div class="flex items-center gap-2">
<span class="font-label-lg text-label-lg font-semibold text-on-surface">Marina View Residences</span>
<span class="px-2 py-0.5 rounded bg-primary-fixed text-on-primary-fixed font-label-sm text-label-sm">Active Tenancies</span>
</div>
<span class="font-label-md text-label-md font-bold text-primary">60.0% Occupancy</span>
</div>
<!-- Stacked Bar -->
<div class="w-full h-4 bg-surface-container-high rounded-full overflow-hidden flex">
<div class="h-full bg-primary" style="width: 60%;" title="6 Occupied"></div>
<div class="h-full bg-secondary-fixed" style="width: 40%;" title="4 Vacant"></div>
</div>
<div class="flex items-center justify-between text-on-surface-variant font-label-sm text-label-sm mt-1.5">
<span>10 Configured Total • 6 Occupied • 4 Vacant Marketable</span>
<span class="text-on-surface font-medium">Fully Published</span>
</div>
</div>
<!-- Property Bar 3: Palm Grove Chalets -->
<div>
<div class="flex items-center justify-between mb-1.5">
<div class="flex items-center gap-2">
<span class="font-label-lg text-label-lg font-semibold text-on-surface">Palm Grove Chalets</span>
<span class="px-2 py-0.5 rounded bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm">Hospitality & Leisure</span>
</div>
<span class="font-label-md text-label-md font-bold text-on-surface">57.1% Occupancy</span>
</div>
<!-- Stacked Bar -->
<div class="w-full h-4 bg-surface-container-high rounded-full overflow-hidden flex">
<div class="h-full bg-primary" style="width: 57.1%;" title="4 Occupied"></div>
<div class="h-full bg-secondary-fixed" style="width: 14.3%;" title="1 Vacant Clean"></div>
<div class="h-full bg-error" style="width: 28.6%;" title="2 Maintenance Restricted"></div>
</div>
<div class="flex items-center justify-between text-on-surface-variant font-label-sm text-label-sm mt-1.5">
<span>7 Configured • 4 Occupied • 1 Vacant • 2 Maintenance Holds</span>
<span class="text-error font-medium">Holds on PG-03 & PG-04</span>
</div>
</div>
</div>
<!-- Legend -->
<div class="pt-4 mt-4 border-t border-surface-container-high flex flex-wrap items-center gap-4 text-on-surface-variant font-label-sm text-label-sm">
<div class="flex items-center gap-1.5"><span class="w-3 h-3 rounded bg-primary"></span><span>Occupied Contract</span></div>
<div class="flex items-center gap-1.5"><span class="w-3 h-3 rounded bg-secondary-fixed"></span><span>Vacant Marketable</span></div>
<div class="flex items-center gap-1.5"><span class="w-3 h-3 rounded bg-error"></span><span>Maintenance Restriction Hold</span></div>
<div class="flex items-center gap-1.5"><span class="w-3 h-3 rounded bg-surface-container"></span><span>Pending Configuration</span></div>
</div>
</div>
<!-- Booking Distribution Donut & SLA Widget -->
<div class="lg:col-span-5 bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between pb-3 mb-4 border-b border-surface-container-high">
<div>
<h3 class="font-headline-md text-headline-md text-on-surface">Booking Request Funnel</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">18 Lifetime booking requests status triage</p>
</div>
<span class="material-symbols-outlined text-[20px] text-on-surface-variant">donut_large</span>
</div>
<div class="flex items-center justify-center gap-6 py-2">
<!-- Inline SVG Donut Chart (Exact 18 Total) -->
<div class="relative w-40 h-40 flex items-center justify-center">
<svg class="w-full h-full -rotate-90" viewBox="0 0 36 36">
<!-- Background Circle -->
<circle class="stroke-surface-container" cx="18" cy="18" fill="none" r="14" stroke-width="4"></circle>
<!-- Approved: 8/18 = 44.4% -> dasharray 39.1 87.96 -->
<circle class="stroke-primary" cx="18" cy="18" fill="none" r="14" stroke-dasharray="39.1 88" stroke-dashoffset="0" stroke-width="4"></circle>
<!-- Pending: 4/18 = 22.2% -> dasharray 19.5 87.96 -->
<circle class="stroke-secondary-fixed-dim" cx="18" cy="18" fill="none" r="14" stroke-dasharray="19.5 88" stroke-dashoffset="-39.1" stroke-width="4"></circle>
<!-- Declined: 3/18 = 16.7% -> dasharray 14.7 87.96 -->
<circle class="stroke-on-surface-variant" cx="18" cy="18" fill="none" r="14" stroke-dasharray="14.7 88" stroke-dashoffset="-58.6" stroke-width="4"></circle>
<!-- Cancelled: 3/18 = 16.7% -> dasharray 14.7 87.96 -->
<circle class="stroke-outline-variant" cx="18" cy="18" fill="none" r="14" stroke-dasharray="14.7 88" stroke-dashoffset="-73.3" stroke-width="4"></circle>
</svg>
<div class="absolute flex flex-col items-center justify-center text-center">
<span class="font-headline-lg text-headline-lg font-bold text-on-surface leading-none">18</span>
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase mt-1">Requests</span>
</div>
</div>
<!-- Distribution Breakdown Metrics -->
<div class="flex flex-col gap-2 flex-1">
<div class="flex items-center justify-between p-2 rounded bg-surface-container-low">
<div class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-primary"></span>
<span class="font-label-md text-label-md font-medium text-on-surface">Approved</span>
</div>
<span class="font-label-md text-label-md font-bold text-on-surface">8 (44.4%)</span>
</div>
<div class="flex items-center justify-between p-2 rounded bg-surface-container-low">
<div class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-secondary-fixed-dim"></span>
<span class="font-label-md text-label-md font-medium text-on-surface">Pending Review</span>
</div>
<span class="font-label-md text-label-md font-bold text-on-surface">4 (22.2%)</span>
</div>
<div class="flex items-center justify-between p-2 rounded bg-surface-container-low">
<div class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-on-surface-variant"></span>
<span class="font-label-md text-label-md font-medium text-on-surface">Declined</span>
</div>
<span class="font-label-md text-label-md font-bold text-on-surface">3 (16.7%)</span>
</div>
<div class="flex items-center justify-between p-2 rounded bg-surface-container-low">
<div class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-outline-variant"></span>
<span class="font-label-md text-label-md font-medium text-on-surface">Cancelled</span>
</div>
<span class="font-label-md text-label-md font-bold text-on-surface">3 (16.7%)</span>
</div>
</div>
</div>
</div>
<!-- SLA Performance Micro-strip -->
<div class="pt-3 border-t border-surface-container-high flex items-center justify-between">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-tertiary">pace</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Triage SLA Target: <strong class="text-on-surface">24h</strong></span>
</div>
<span class="font-label-sm text-label-sm text-primary font-semibold">Property Manager Manual Review</span>
</div>
</div>
</div>
<!-- Row 2: Rent Collection & Financial Performance Ledger -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg mb-space-lg">
<!-- Rent Collections Chart Container -->
<div class="lg:col-span-7 bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between pb-3 mb-4 border-b border-surface-container-high">
<div>
<h3 class="font-headline-md text-headline-md text-on-surface">Rental Collections by Cadence (H1 2026)</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Verified receipts against lease expectations</p>
</div>
<div class="flex items-center gap-3">
<span class="font-label-sm text-label-sm text-on-surface-variant">SAR Standard Scale</span>
</div>
</div>
<!-- Analytical Bar Grid / Watermark Area -->
<div class="relative w-full h-56 rounded-lg bg-surface-container-low p-4 flex flex-col justify-between overflow-hidden">
<!-- Background Grid Lines -->
<div class="absolute inset-0 flex flex-col justify-between p-4 pointer-events-none opacity-40">
<div class="w-full border-b border-outline-variant"></div>
<div class="w-full border-b border-outline-variant"></div>
<div class="w-full border-b border-outline-variant"></div>
<div class="w-full border-b border-outline-variant"></div>
</div>
<!-- Bar Visual Elements (Abstract Representation) -->
<div class="relative z-10 h-full flex items-end justify-between px-4 pb-2">
<div class="flex flex-col items-center gap-1.5 w-10">
<div class="w-full bg-primary/20 rounded-t h-16 flex items-end">
<div class="w-full bg-primary rounded-t h-10"></div>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">Jan</span>
</div>
<div class="flex flex-col items-center gap-1.5 w-10">
<div class="w-full bg-primary/20 rounded-t h-24 flex items-end">
<div class="w-full bg-primary rounded-t h-16"></div>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">Feb</span>
</div>
<div class="flex flex-col items-center gap-1.5 w-10">
<div class="w-full bg-primary/20 rounded-t h-32 flex items-end">
<div class="w-full bg-primary rounded-t h-20"></div>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">Mar</span>
</div>
<div class="flex flex-col items-center gap-1.5 w-10">
<div class="w-full bg-primary/20 rounded-t h-28 flex items-end">
<div class="w-full bg-primary rounded-t h-14"></div>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">Apr</span>
</div>
<div class="flex flex-col items-center gap-1.5 w-10">
<div class="w-full bg-primary/20 rounded-t h-36 flex items-end">
<div class="w-full bg-primary rounded-t h-24"></div>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">May</span>
</div>
<div class="flex flex-col items-center gap-1.5 w-10">
<div class="w-full bg-primary/20 rounded-t h-40 flex items-end">
<div class="w-full bg-primary rounded-t h-28"></div>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">Jun</span>
</div>
</div>
<!-- Ledger Verification Notice Overprint -->
<div class="absolute inset-0 bg-surface/75 backdrop-blur-[2px] flex items-center justify-center p-6 text-center z-20">
<div class="max-w-md bg-surface-container-lowest p-4 rounded-xl shadow-md">
<span class="material-symbols-outlined text-[24px] text-primary mb-1">lock</span>
<p class="font-label-lg text-label-lg font-semibold text-on-surface">Verified Settlement Protocol Active</p>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
                Aggregate currency visualization disabled. Financial period aggregates appear dynamically once cross-border exchange reconciliations are certified by institutional controllers.
              </p>
</div>
</div>
</div>
</div>
<div class="pt-4 mt-4 border-t border-surface-container-high flex items-center justify-between">
<div class="flex items-center gap-4 text-on-surface-variant font-label-sm text-label-sm">
<div class="flex items-center gap-1.5"><span class="w-3 h-3 rounded bg-primary"></span><span>Verified Collections</span></div>
<div class="flex items-center gap-1.5"><span class="w-3 h-3 rounded bg-primary/20"></span><span>Expected Rent Baseline</span></div>
<div class="flex items-center gap-1.5"><span class="w-3 h-3 rounded bg-error"></span><span>Outstanding Arrears</span></div>
</div>
<span class="font-label-sm text-label-sm text-secondary font-medium">Multi-Currency Aggregation Suppressed</span>
</div>
</div>
<!-- Multi-Currency Sovereign Table & Maintenance Analytics -->
<div class="lg:col-span-5 flex flex-col gap-space-lg">
<!-- Multi-Currency Sovereign Table -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm">
<div class="flex items-center justify-between pb-3 mb-3 border-b border-surface-container-high">
<div>
<h3 class="font-headline-md text-headline-md text-on-surface">Sovereign Ledger Summary</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Segregated accounting by operating currency</p>
</div>
<span class="material-symbols-outlined text-[20px] text-secondary">account_balance</span>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left font-body-sm text-body-sm">
<thead>
<tr class="bg-surface-container-low text-on-surface-variant font-label-sm text-label-sm uppercase">
<th class="py-2 px-3 rounded-l">Currency</th>
<th class="py-2 px-3">Expected</th>
<th class="py-2 px-3">Verified</th>
<th class="py-2 px-3">Outstanding</th>
<th class="py-2 px-3 rounded-r">Net Yield</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container-high text-on-surface">
<tr>
<td class="py-2.5 px-3 font-semibold text-primary">SAR</td>
<td class="py-2.5 px-3 text-on-surface-variant italic">Not Calculated</td>
<td class="py-2.5 px-3 text-on-surface-variant italic">Not Calculated</td>
<td class="py-2.5 px-3 text-on-surface-variant italic">Not Calculated</td>
<td class="py-2.5 px-3 text-on-surface-variant italic font-medium">Pending Audit</td>
</tr>
<tr>
<td class="py-2.5 px-3 font-semibold text-primary">USD</td>
<td class="py-2.5 px-3 text-on-surface-variant italic">Not Calculated</td>
<td class="py-2.5 px-3 text-on-surface-variant italic">Not Calculated</td>
<td class="py-2.5 px-3 text-on-surface-variant italic">Not Calculated</td>
<td class="py-2.5 px-3 text-on-surface-variant italic font-medium">Pending Audit</td>
</tr>
<tr>
<td class="py-2.5 px-3 font-semibold text-primary">AED</td>
<td class="py-2.5 px-3 text-on-surface-variant italic">Not Calculated</td>
<td class="py-2.5 px-3 text-on-surface-variant italic">Not Calculated</td>
<td class="py-2.5 px-3 text-on-surface-variant italic">Not Calculated</td>
<td class="py-2.5 px-3 text-on-surface-variant italic font-medium">Pending Audit</td>
</tr>
</tbody>
</table>
</div>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-3 italic">
          * Currencies are not commingled into a single artificial total without explicit statutory conversion filings.
        </p>
</div>
<!-- Maintenance Analytics Widget -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm">
<div class="flex items-center justify-between pb-2 mb-3 border-b border-surface-container-high">
<div>
<h3 class="font-headline-md text-headline-md text-on-surface">Maintenance Burden</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">24 Total recorded work orders</p>
</div>
<span class="material-symbols-outlined text-[20px] text-error">build_circle</span>
</div>
<div class="grid grid-cols-4 gap-2 mb-3 text-center">
<div class="p-2 rounded bg-surface-container-low">
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">9</span>
<span class="block font-label-sm text-label-sm text-on-surface-variant">Completed</span>
</div>
<div class="p-2 rounded bg-surface-container-low">
<span class="font-headline-sm text-headline-sm font-bold text-primary">8</span>
<span class="block font-label-sm text-label-sm text-on-surface-variant">In Progress</span>
</div>
<div class="p-2 rounded bg-surface-container-low">
<span class="font-headline-sm text-headline-sm font-bold text-tertiary">6</span>
<span class="block font-label-sm text-label-sm text-on-surface-variant">Open Queue</span>
</div>
<div class="p-2 rounded bg-surface-container-low">
<span class="font-headline-sm text-headline-sm font-bold text-on-surface-variant">1</span>
<span class="block font-label-sm text-label-sm text-on-surface-variant">Cancelled</span>
</div>
</div>
<div class="flex items-center justify-between pt-2 border-t border-surface-container-high font-body-sm text-body-sm">
<span class="text-on-surface-variant">Resolution SLA: <em class="text-on-surface">Not Calculated</em></span>
<span class="px-2 py-0.5 rounded bg-error-container text-on-error-container font-label-sm text-label-sm font-semibold">1 Urgent Hold (PG-03 Plumbing)</span>
</div>
</div>
</div>
</div>
<!-- Row 3: Owner Statements Ledger & Analytical Package Export Panel -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg mb-space-lg">
<!-- Owner Performance & Property Statement Table -->
<div class="lg:col-span-8 bg-surface-container-lowest rounded-xl p-space-lg shadow-sm">
<div class="flex items-center justify-between pb-3 mb-4 border-b border-surface-container-high">
<div>
<h3 class="font-headline-md text-headline-md text-on-surface">Owner Statements & Performance Ledger</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Contractual fee reconciliation & disbursement eligibility</p>
</div>
<div class="flex items-center gap-2">
<span class="font-label-sm text-label-sm px-2.5 py-1 rounded bg-surface-container text-on-surface">AGR-2026-YAS-003</span>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left font-body-sm text-body-sm">
<thead>
<tr class="bg-surface-container-low text-on-surface-variant font-label-sm text-label-sm uppercase">
<th class="py-2.5 px-3 rounded-l">Owner Entity</th>
<th class="py-2.5 px-3">Property</th>
<th class="py-2.5 px-3">Rental Cadence</th>
<th class="py-2.5 px-3">Collected Rent</th>
<th class="py-2.5 px-3">Fee (8.5%)</th>
<th class="py-2.5 px-3">Maintenance</th>
<th class="py-2.5 px-3">Net Owner</th>
<th class="py-2.5 px-3 rounded-r">Statement Status</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container-high text-on-surface">
<tr>
<td class="py-3 px-3 font-semibold text-on-surface">Muqrin Real Estate Holdings Ltd.</td>
<td class="py-3 px-3 text-on-surface-variant">Al-Yasmin Compound II</td>
<td class="py-3 px-3">Monthly</td>
<td class="py-3 px-3 text-on-surface-variant italic">No Payments Recorded</td>
<td class="py-3 px-3 text-on-surface-variant italic">Not Calculated</td>
<td class="py-3 px-3 text-on-surface-variant italic">Not Recorded</td>
<td class="py-3 px-3 text-on-surface-variant italic">Not Calculated</td>
<td class="py-3 px-3">
<span class="px-2 py-0.5 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm font-semibold">No Financial Activity</span>
</td>
</tr>
<tr>
<td class="py-3 px-3 font-semibold text-on-surface">Al-Rajhi Family Trust</td>
<td class="py-3 px-3 text-on-surface-variant">Marina View Residences</td>
<td class="py-3 px-3">Monthly</td>
<td class="py-3 px-3 text-on-surface-variant italic">In Settlement</td>
<td class="py-3 px-3 text-on-surface-variant italic">Contractual (7.0%)</td>
<td class="py-3 px-3 text-on-surface-variant italic">Under Audit</td>
<td class="py-3 px-3 text-on-surface-variant italic">Pending Verification</td>
<td class="py-3 px-3">
<span class="px-2 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-semibold">Auditing Ledger</span>
</td>
</tr>
<tr>
<td class="py-3 px-3 font-semibold text-on-surface">Gulf Capital Hospitality Partners</td>
<td class="py-3 px-3 text-on-surface-variant">Palm Grove Chalets</td>
<td class="py-3 px-3">Daily</td>
<td class="py-3 px-3 text-on-surface-variant italic">In Settlement</td>
<td class="py-3 px-3 text-on-surface-variant italic">Contractual (12.0%)</td>
<td class="py-3 px-3 text-error font-medium">Holds Pending</td>
<td class="py-3 px-3 text-on-surface-variant italic">Pending Verification</td>
<td class="py-3 px-3">
<span class="px-2 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-semibold">Auditing Ledger</span>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Statutory Contract Guidance Note -->
<div class="mt-4 p-3 bg-surface-container-low rounded-lg flex items-start gap-2.5">
<span class="material-symbols-outlined text-[18px] text-primary mt-0.5">policy</span>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
<strong class="font-semibold text-on-surface">Accounting Guidance:</strong> Management fee is strictly defined as 8.5% of verified collected rent under executed contract <span class="font-mono text-primary font-medium">AGR-2026-YAS-003</span>. Because zero verified collections have cleared escrow for Al-Yasmin Compound II, no management fee deduction or owner liability is calculated.
        </p>
</div>
</div>
<!-- Export & Background Runner Controls -->
<div class="lg:col-span-4 bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between pb-3 mb-4 border-b border-surface-container-high">
<div>
<h3 class="font-headline-md text-headline-md text-on-surface">Export Package</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Generate certified audit packages</p>
</div>
<span class="material-symbols-outlined text-[20px] text-primary">sim_card_download</span>
</div>
<!-- Format Options -->
<div class="flex flex-col gap-3 mb-4">
<span class="font-label-sm text-label-sm uppercase text-on-surface-variant">Format Destination</span>
<div class="grid grid-cols-3 gap-2">
<button class="flex flex-col items-center justify-center p-2 rounded-lg bg-primary-fixed text-on-primary-fixed font-label-sm text-label-sm font-semibold" data-demo="PDF Dossier" type="button">
<span class="material-symbols-outlined text-[20px] mb-1">picture_as_pdf</span>
              PDF Dossier
            </button>
<button class="flex flex-col items-center justify-center p-2 rounded-lg bg-surface-container text-on-surface font-label-sm text-label-sm hover:bg-surface-container-high transition-colors" data-demo="Excel (XLSX)" type="button">
<span class="material-symbols-outlined text-[20px] mb-1">table_view</span>
              Excel (XLSX)
            </button>
<button class="flex flex-col items-center justify-center p-2 rounded-lg bg-surface-container text-on-surface font-label-sm text-label-sm hover:bg-surface-container-high transition-colors" data-demo="Raw CSV" type="button">
<span class="material-symbols-outlined text-[20px] mb-1">csv</span>
              Raw CSV
            </button>
</div>
</div>
<!-- Inclusions -->
<div class="flex flex-col gap-2 mb-4">
<span class="font-label-sm text-label-sm uppercase text-on-surface-variant">Analytical Scope Inclusions</span>
<label class="flex items-center gap-2 cursor-pointer text-on-surface font-body-sm text-body-sm">
<input checked="" class="w-4 h-4 rounded text-primary focus:ring-primary accent-primary" type="checkbox">
<span>Include visual charts & distribution graphics</span>
</label>
<label class="flex items-center gap-2 cursor-pointer text-on-surface font-body-sm text-body-sm">
<input checked="" class="w-4 h-4 rounded text-primary focus:ring-primary accent-primary" type="checkbox">
<span>Include detailed unit-level ledgers</span>
</label>
<label class="flex items-center gap-2 cursor-pointer text-on-surface font-body-sm text-body-sm">
<input class="w-4 h-4 rounded text-primary focus:ring-primary accent-primary" type="checkbox">
<span>Include unverified pending transactions (Watermarked)</span>
</label>
</div>
<button class="w-full py-2.5 rounded-lg bg-primary text-on-primary hover:bg-primary-container transition-all font-label-lg text-label-lg font-semibold shadow-sm flex items-center justify-center gap-2" data-demo="Download Analytical Package" type="button">
<span class="material-symbols-outlined text-[18px]">download</span>
          Download Analytical Package
        </button>
</div>
<!-- Scheduled Reports State -->
<div class="pt-4 mt-4 border-t border-surface-container-high">
<div class="flex items-center justify-between mb-2">
<span class="font-label-sm text-label-sm uppercase font-semibold text-on-surface">Scheduled Job Runner</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Cloud Node Riyadh</span>
</div>
<div class="p-3 rounded-lg bg-surface-container-low text-center">
<span class="material-symbols-outlined text-[20px] text-on-surface-variant mb-1">schedule</span>
<p class="font-label-md text-label-md text-on-surface-variant">No automated recurring dispatches configured</p>
<div class="flex items-center justify-center gap-2 mt-2">
<button class="font-label-sm text-label-sm text-primary font-semibold hover:underline" data-demo="Save Template" type="button">Save Template</button>
<span class="text-on-surface-variant">•</span>
<button class="font-label-sm text-label-sm text-primary font-semibold hover:underline" data-demo="Configure Schedule" type="button">Configure Schedule</button>
</div>
</div>
</div>
</div>
</div>
<!-- Specialized Reports Library (10 Standard Institutional Modules) -->
<div class="mb-space-lg">
<div class="flex items-center justify-between mb-4">
<div>
<h2 class="font-headline-md text-headline-md text-on-surface">Reports Catalog & Granular Modules</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Instant access to certified real estate operational and fiduciary sub-ledgers</p>
</div>
<span class="font-label-md text-label-md text-on-surface-variant font-medium">10 Standard Ledgers</span>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-space-md">
<!-- 1: Portfolio Performance -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between hover:shadow-md transition-all group">
<div>
<div class="w-9 h-9 rounded-lg bg-primary-fixed text-on-primary-fixed flex items-center justify-center mb-3">
<span class="material-symbols-outlined text-[20px]">insights</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface mb-1">Portfolio Performance</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2">
            Comprehensive asset yield, operational expenditure, and capitalization metrics.
          </p>
</div>
<a class="mt-4 w-full py-1.5 rounded-lg bg-surface-container-low text-primary group-hover:bg-primary group-hover:text-on-primary transition-all font-label-md text-label-md font-semibold text-center flex items-center justify-center gap-1" href="{{ route('manager.reports-operations') }}">
<span>View Report</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
<!-- 2: Occupancy Report -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between hover:shadow-md transition-all group">
<div>
<div class="w-9 h-9 rounded-lg bg-secondary-fixed text-on-secondary-fixed flex items-center justify-center mb-3">
<span class="material-symbols-outlined text-[20px]">chair_alt</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface mb-1">Occupancy Report</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2">
            Vacancy timeline, absorption velocity, and lease expiry turnover analysis.
          </p>
</div>
<a class="mt-4 w-full py-1.5 rounded-lg bg-surface-container-low text-primary group-hover:bg-primary group-hover:text-on-primary transition-all font-label-md text-label-md font-semibold text-center flex items-center justify-center gap-1" href="{{ route('manager.reports-operations') }}">
<span>View Report</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
<!-- 3: Booking Activity -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between hover:shadow-md transition-all group">
<div>
<div class="w-9 h-9 rounded-lg bg-primary-fixed text-on-primary-fixed flex items-center justify-center mb-3">
<span class="material-symbols-outlined text-[20px]">calendar_month</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface mb-1">Booking Activity</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2">
            Request-to-book conversions, lead durations, and guest channel distributions.
          </p>
</div>
<a class="mt-4 w-full py-1.5 rounded-lg bg-surface-container-low text-primary group-hover:bg-primary group-hover:text-on-primary transition-all font-label-md text-label-md font-semibold text-center flex items-center justify-center gap-1" href="{{ route('manager.reports-operations') }}">
<span>View Report</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
<!-- 4: Rental Contracts -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between hover:shadow-md transition-all group">
<div>
<div class="w-9 h-9 rounded-lg bg-surface-container text-on-surface flex items-center justify-center mb-3">
<span class="material-symbols-outlined text-[20px]">history_edu</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface mb-1">Rental Contracts</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2">
            Standardized lease terms, covenant escalations, and active tenant rosters.
          </p>
</div>
<a class="mt-4 w-full py-1.5 rounded-lg bg-surface-container-low text-primary group-hover:bg-primary group-hover:text-on-primary transition-all font-label-md text-label-md font-semibold text-center flex items-center justify-center gap-1" href="{{ route('manager.reports-operations') }}">
<span>View Report</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
<!-- 5: Rent Collection -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between hover:shadow-md transition-all group">
<div>
<div class="w-9 h-9 rounded-lg bg-primary-fixed text-on-primary-fixed flex items-center justify-center mb-3">
<span class="material-symbols-outlined text-[20px]">account_balance_wallet</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface mb-1">Rent Collection</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2">
            Offline banking settlement registers, VAT invoices, and verified receipts.
          </p>
</div>
<a class="mt-4 w-full py-1.5 rounded-lg bg-surface-container-low text-primary group-hover:bg-primary group-hover:text-on-primary transition-all font-label-md text-label-md font-semibold text-center flex items-center justify-center gap-1" href="{{ route('manager.reports-operations') }}">
<span>View Report</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
<!-- 6: Outstanding Balances -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between hover:shadow-md transition-all group">
<div>
<div class="w-9 h-9 rounded-lg bg-error-container text-on-error-container flex items-center justify-center mb-3">
<span class="material-symbols-outlined text-[20px]">money_off</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface mb-1">Outstanding Balances</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2">
            Arrears aging reports (30/60/90 days) and automated penalty logs.
          </p>
</div>
<a class="mt-4 w-full py-1.5 rounded-lg bg-surface-container-low text-primary group-hover:bg-primary group-hover:text-on-primary transition-all font-label-md text-label-md font-semibold text-center flex items-center justify-center gap-1" href="{{ route('manager.reports-operations') }}">
<span>View Report</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
<!-- 7: Maintenance Performance -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between hover:shadow-md transition-all group">
<div>
<div class="w-9 h-9 rounded-lg bg-secondary-fixed text-on-secondary-fixed flex items-center justify-center mb-3">
<span class="material-symbols-outlined text-[20px]">handyman</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface mb-1">Maintenance Burdens</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2">
            Technician resolution latencies, preventative cost logs, and urgent work orders.
          </p>
</div>
<a class="mt-4 w-full py-1.5 rounded-lg bg-surface-container-low text-primary group-hover:bg-primary group-hover:text-on-primary transition-all font-label-md text-label-md font-semibold text-center flex items-center justify-center gap-1" href="{{ route('manager.reports-operations') }}">
<span>View Report</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
<!-- 8: Owner Financial Statements -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between hover:shadow-md transition-all group">
<div>
<div class="w-9 h-9 rounded-lg bg-primary-fixed text-on-primary-fixed flex items-center justify-center mb-3">
<span class="material-symbols-outlined text-[20px]">real_estate_agent</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface mb-1">Owner Statements</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2">
            Individual fiduciary payouts, management fees, and statutory escrow balances.
          </p>
</div>
<a class="mt-4 w-full py-1.5 rounded-lg bg-surface-container-low text-primary group-hover:bg-primary group-hover:text-on-primary transition-all font-label-md text-label-md font-semibold text-center flex items-center justify-center gap-1" href="{{ route('manager.reports-operations') }}">
<span>View Report</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
<!-- 9: Property Financial Summary -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between hover:shadow-md transition-all group">
<div>
<div class="w-9 h-9 rounded-lg bg-surface-container text-on-surface flex items-center justify-center mb-3">
<span class="material-symbols-outlined text-[20px]">account_balance</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface mb-1">Property Financials</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2">
            Asset-level Net Operating Income (NOI), CAPEX amortizations, and yield returns.
          </p>
</div>
<a class="mt-4 w-full py-1.5 rounded-lg bg-surface-container-low text-primary group-hover:bg-primary group-hover:text-on-primary transition-all font-label-md text-label-md font-semibold text-center flex items-center justify-center gap-1" href="{{ route('manager.reports-operations') }}">
<span>View Report</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
<!-- 10: Inventory & Condition Status -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between hover:shadow-md transition-all group">
<div>
<div class="w-9 h-9 rounded-lg bg-secondary-fixed text-on-secondary-fixed flex items-center justify-center mb-3">
<span class="material-symbols-outlined text-[20px]">inventory</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface mb-1">Inventory & Condition</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2">
            Furnishing wear assessments, move-in checklists, and capital asset registries.
          </p>
</div>
<a class="mt-4 w-full py-1.5 rounded-lg bg-surface-container-low text-primary group-hover:bg-primary group-hover:text-on-primary transition-all font-label-md text-label-md font-semibold text-center flex items-center justify-center gap-1" href="{{ route('manager.reports-operations') }}">
<span>View Report</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
</div>
</div>
<!-- Data Quality, Governance & Transparency Notice Banner -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm border-t-2 border-primary mb-space-md">
<div class="flex items-start gap-4">
<div class="w-10 h-10 rounded-full bg-primary-fixed text-primary flex items-center justify-center flex-shrink-0">
<span class="material-symbols-outlined text-[22px]">policy</span>
</div>
<div class="flex flex-col gap-2">
<h3 class="font-headline-sm text-headline-sm text-on-surface">Institutional Integrity & Analytical Data Safeguards</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          The figures compiled within this Analytical Workspace follow rigorous REIT accounting policies:
        </p>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-2">
<div class="p-3 rounded-lg bg-surface-container-low">
<span class="font-label-md text-label-md font-semibold text-on-surface block mb-1">1. Cash-Basis Verification</span>
<p class="font-body-sm text-body-sm text-on-surface-variant">
              Only verified payments recorded with matching bank transactions are counted in realized cash receipts. Unverified submissions remain strictly excluded.
            </p>
</div>
<div class="p-3 rounded-lg bg-surface-container-low">
<span class="font-label-md text-label-md font-semibold text-on-surface block mb-1">2. Executed Contracts Only</span>
<p class="font-body-sm text-body-sm text-on-surface-variant">
              Draft contracts and pending e-signatures are isolated from active yield forecasts until counter-signed by authorized fiduciaries.
            </p>
</div>
<div class="p-3 rounded-lg bg-surface-container-low">
<span class="font-label-md text-label-md font-semibold text-on-surface block mb-1">3. Sovereign Multi-Currency</span>
<p class="font-body-sm text-body-sm text-on-surface-variant">
              Currencies (SAR, USD, AED) are never artificially merged into an arbitrary synthetic total without daily central bank settlement parity.
            </p>
</div>
<div class="p-3 rounded-lg bg-surface-container-low">
<span class="font-label-md text-label-md font-semibold text-on-surface block mb-1">4. Role-Based Shielding</span>
<p class="font-body-sm text-body-sm text-on-surface-variant">
              All owner statements and yield distributions are compartmentalized. Property managers access aggregated operations; owners access only verified distributions.
            </p>
</div>
</div>
<div class="flex items-center justify-between pt-2 mt-2 border-t border-surface-container-high text-on-surface-variant font-label-sm text-label-sm">
<span>Engine: Majlis Real Estate Analytics v4.2 • Certified SAMA & GASTAT Compatible</span>
<span>Last Model Recalculation: 12 Minutes Ago</span>
</div>
</div>
</div>
</div>
</div>
<!-- Modal / Slide-out Simulator Script for Dynamic Feedback -->

@endsection
