{{-- Imported from client_demo/screens/units_management/code.html; static demonstration data. --}}
@extends('layouts.manager')
@section('content')
<div class="flex flex-col w-full">
<!-- PAGE HEADER & BREADCRUMB -->
<div class="flex flex-col md:flex-row md:items-start md:justify-between gap-space-md mb-space-lg">
<div class="flex flex-col">
<!-- Breadcrumb -->
<nav aria-label="Breadcrumb" class="flex items-center gap-2 mb-2">
<a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors flex items-center gap-1" href="{{ route('manager.dashboard') }}">
<span class="material-symbols-outlined text-[16px]">dashboard</span>
<span>Dashboard</span>
</a>
<span class="material-symbols-outlined text-[14px] text-outline-variant">chevron_right</span>
<span class="font-label-md text-label-md text-primary font-semibold">Units</span>
</nav>
<!-- Title & Subtitle -->
<div class="flex items-center gap-3">
<h1 class="font-headline-xl text-headline-xl text-on-surface tracking-tight">Units Management</h1>
<span class="px-2.5 py-0.5 rounded-full bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm tracking-wide uppercase">30 Total Units</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant mt-1 max-w-3xl">
        Manage rental units, configurations, occupancy, pricing, and availability across your property portfolio.
      </p>
<div class="flex items-center gap-2 mt-2">
<span class="material-symbols-outlined text-[16px] text-secondary">info</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Manage unit records independently from property publishing and booking availability.</span>
</div>
</div>
<!-- Header Actions -->
<div class="flex items-center gap-space-sm self-start shrink-0">
<button class="inline-flex items-center gap-2 px-space-md py-2.5 rounded-lg bg-surface-container-lowest text-on-surface hover:bg-surface-container-low transition-all shadow-sm font-label-lg text-label-lg" type="button" data-demo="Export Units">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">download</span>
<span>Export Units</span>
</button>
<button class="inline-flex items-center gap-2 px-space-lg py-2.5 rounded-lg bg-primary-container text-on-primary hover:bg-primary transition-all shadow-md active:scale-95 font-label-lg text-label-lg font-semibold" type="button" data-demo="Add New Unit">
<span class="material-symbols-outlined text-[18px]">add</span>
<span>Add New Unit</span>
</button>
</div>
</div>
<!-- PORTFOLIO SUMMARY KPI CARDS (6 COMPACT TILES) -->
<section aria-label="Portfolio Key Metrics" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-space-md mb-space-md">
<!-- Card 1: Total Planned Units -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
<div class="flex items-center justify-between mb-3">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">Total Planned</span>
<div class="w-8 h-8 rounded-lg bg-surface-container-low flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[18px]">apartment</span>
</div>
</div>
<div>
<div class="font-headline-lg text-headline-lg text-on-surface leading-none mb-1">30</div>
<p class="font-body-sm text-body-sm text-on-surface-variant truncate">3 properties total</p>
</div>
</div>
<!-- Card 2: Configured Units -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
<div class="flex items-center justify-between mb-3">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">Configured</span>
<div class="w-8 h-8 rounded-lg bg-surface-container-low flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[18px]">check_circle</span>
</div>
</div>
<div>
<div class="flex items-baseline gap-2 mb-1">
<span class="font-headline-lg text-headline-lg text-on-surface leading-none">21</span>
<span class="px-1.5 py-0.5 rounded bg-surface-container-high text-on-surface font-label-sm text-label-sm">70%</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant truncate">Inventory complete</p>
</div>
</div>
<!-- Card 3: Pending Configuration -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
<div class="flex items-center justify-between mb-3">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">Pending Specs</span>
<div class="w-8 h-8 rounded-lg bg-tertiary-container/15 flex items-center justify-center text-tertiary-container">
<span class="material-symbols-outlined text-[18px]">pending</span>
</div>
</div>
<div>
<div class="flex items-baseline gap-2 mb-1">
<span class="font-headline-lg text-headline-lg text-tertiary-container leading-none">9</span>
<span class="px-1.5 py-0.5 rounded bg-tertiary-container/10 text-tertiary-container font-label-sm text-label-sm">Needs Setup</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant truncate">Incomplete data</p>
</div>
</div>
<!-- Card 4: Occupied Units -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
<div class="flex items-center justify-between mb-3">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">Occupied</span>
<div class="w-8 h-8 rounded-lg bg-surface-container-low flex items-center justify-center text-secondary">
<span class="material-symbols-outlined text-[18px]">person_check</span>
</div>
</div>
<div>
<div class="font-headline-lg text-headline-lg text-on-surface leading-none mb-1">10</div>
<p class="font-body-sm text-body-sm text-on-surface-variant truncate">Active tenancies</p>
</div>
</div>
<!-- Card 5: Vacant Units -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
<div class="flex items-center justify-between mb-3">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">Vacant Units</span>
<div class="w-8 h-8 rounded-lg bg-surface-container-low flex items-center justify-center text-primary-container">
<span class="material-symbols-outlined text-[18px]">door_open</span>
</div>
</div>
<div>
<div class="font-headline-lg text-headline-lg text-on-surface leading-none mb-1">11</div>
<p class="font-body-sm text-body-sm text-on-surface-variant truncate">Unoccupied inventory</p>
</div>
</div>
<!-- Card 6: Under Maintenance -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
<div class="flex items-center justify-between mb-3">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">Maintenance</span>
<div class="w-8 h-8 rounded-lg bg-error-container/40 flex items-center justify-center text-error">
<span class="material-symbols-outlined text-[18px]">build</span>
</div>
</div>
<div>
<div class="flex items-baseline gap-2 mb-1">
<span class="font-headline-lg text-headline-lg text-error leading-none">2</span>
<span class="px-1.5 py-0.5 rounded bg-error-container/30 text-error font-label-sm text-label-sm">Active Hold</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant truncate">Under inspection</p>
</div>
</div>
</section>
<!-- Explanatory note below KPI cards -->
<p class="font-body-sm text-body-sm text-on-surface-variant/80 mb-space-lg flex items-center gap-1.5">
<span class="material-symbols-outlined text-[14px]">insights</span>
    Illustrative portfolio data. Unit configuration, occupancy, maintenance, and booking availability are tracked separately.
  </p>
<!-- ATTENTION / ALERT BANNER -->
<div class="p-space-md mb-space-lg rounded-xl bg-surface-container-lowest shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-space-md">
<div class="flex items-start gap-space-md">
<div class="w-10 h-10 rounded-lg bg-tertiary-container/10 text-tertiary-container flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[24px]">assignment_late</span>
</div>
<div class="flex flex-col">
<div class="flex flex-wrap items-center gap-2">
<h2 class="font-headline-sm text-headline-sm text-on-surface">9 Units Need Configuration</h2>
<span class="px-2.5 py-0.5 rounded-full bg-surface-container-high text-on-surface font-label-sm text-label-sm">8 pending units — Al-Yasmin Compound II</span>
<span class="px-2.5 py-0.5 rounded-full bg-surface-container-high text-on-surface font-label-sm text-label-sm">1 pending unit — Palm Grove Chalets</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
          Complete missing unit information before enabling eligible rental operations and inventory listings.
        </p>
</div>
</div>
<button class="inline-flex items-center gap-1.5 px-space-md py-2 rounded-lg bg-surface-container-low text-primary hover:bg-surface-container font-label-lg text-label-lg font-semibold shrink-0 transition-colors" type="button" data-demo="Review Pending Units">
<span>Review Pending Units</span>
<span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</button>
</div>
<!-- SEARCH & FILTER TOOLBAR -->
<div class="p-space-md rounded-t-xl bg-surface-container-lowest shadow-sm space-y-space-sm">
<!-- Top Row: Search Input + Result Count & Fast Action -->
<div class="flex flex-col lg:flex-row lg:items-center gap-space-md justify-between">
<div class="relative flex-1 max-w-xl">
<span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]">search</span>
<input class="w-full h-10 pl-11 pr-4 bg-surface-container-low rounded-lg font-body-sm text-body-sm text-on-surface placeholder:text-on-surface-variant/60 focus:outline-none focus:bg-surface-container-lowest transition-all" placeholder="Search unit ID, property, unit type, or location..." type="text">
</div>
<div class="flex items-center gap-space-sm justify-between lg:justify-end">
<span class="font-label-md text-label-md text-on-surface-variant">
          Showing <strong class="text-on-surface">30 Units</strong> (10 displayed below)
        </span>
<div class="flex items-center gap-2">
<button class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-surface-container text-on-surface hover:bg-surface-container-high font-label-sm text-label-sm transition-colors" type="button" data-demo="Advanced Filters">
<span class="material-symbols-outlined text-[16px]">tune</span>
<span>Advanced Filters</span>
</button>
<button class="px-2.5 py-1.5 text-primary hover:text-primary-container font-label-sm text-label-sm transition-colors" type="button" data-demo="Clear Filters">
            Clear Filters
          </button>
</div>
</div>
</div>
<!-- Filter Selectors Grid -->
<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-9 gap-2 pt-2">
<!-- Property -->
<select class="h-9 px-2.5 rounded-lg bg-surface-container-low text-on-surface font-body-sm text-body-sm focus:outline-none cursor-pointer">
<option selected="">All Properties</option>
<option>Al-Yasmin Compound II</option>
<option>Marina View Residences</option>
<option>Palm Grove Chalets</option>
</select>
<!-- Country -->
<select class="h-9 px-2.5 rounded-lg bg-surface-container-low text-on-surface font-body-sm text-body-sm focus:outline-none cursor-pointer">
<option selected="">All Countries</option>
<option>Saudi Arabia (KSA)</option>
<option>United Arab Emirates (UAE)</option>
</select>
<!-- City -->
<select class="h-9 px-2.5 rounded-lg bg-surface-container-low text-on-surface font-body-sm text-body-sm focus:outline-none cursor-pointer">
<option selected="">All Cities</option>
<option>Riyadh</option>
<option>Dubai</option>
<option>Ras Al Khaimah</option>
</select>
<!-- Unit Type -->
<select class="h-9 px-2.5 rounded-lg bg-surface-container-low text-on-surface font-body-sm text-body-sm focus:outline-none cursor-pointer">
<option selected="">All Types</option>
<option>Apartment</option>
<option>Studio</option>
<option>Villa</option>
<option>Chalet</option>
<option>Commercial</option>
</select>
<!-- Setup Status -->
<select class="h-9 px-2.5 rounded-lg bg-surface-container-low text-on-surface font-body-sm text-body-sm focus:outline-none cursor-pointer">
<option selected="">All Statuses</option>
<option>Configured</option>
<option>Pending</option>
</select>
<!-- Occupancy -->
<select class="h-9 px-2.5 rounded-lg bg-surface-container-low text-on-surface font-body-sm text-body-sm focus:outline-none cursor-pointer">
<option selected="">All Occupancy</option>
<option>Occupied</option>
<option>Vacant</option>
<option>Not Assigned</option>
</select>
<!-- Maintenance -->
<select class="h-9 px-2.5 rounded-lg bg-surface-container-low text-on-surface font-body-sm text-body-sm focus:outline-none cursor-pointer">
<option selected="">All Maintenance</option>
<option>Clear</option>
<option>Maintenance</option>
<option>Not Assessed</option>
</select>
<!-- Booking Availability -->
<select class="h-9 px-2.5 rounded-lg bg-surface-container-low text-on-surface font-body-sm text-body-sm focus:outline-none cursor-pointer">
<option selected="">All Booking</option>
<option>Available</option>
<option>Occupied</option>
<option>Unavailable</option>
<option>Not Published</option>
</select>
<!-- Rental Period -->
<select class="h-9 px-2.5 rounded-lg bg-surface-container-low text-on-surface font-body-sm text-body-sm focus:outline-none cursor-pointer">
<option selected="">All Periods</option>
<option>Daily</option>
<option>Weekly</option>
<option>Monthly</option>
<option>Yearly</option>
</select>
</div>
</div>
<!-- BULK ACTIONS SUBTLE PREVIEW BAR -->
<div class="px-space-md py-2.5 bg-surface-container-low flex flex-wrap items-center justify-between gap-space-sm">
<div class="flex items-center gap-2">
<div class="w-5 h-5 rounded flex items-center justify-center bg-surface-container-lowest">
<input class="rounded accent-primary cursor-pointer w-3.5 h-3.5" id="selectAllCheckbox" type="checkbox">
</div>
<span class="font-label-md text-label-md text-on-surface-variant">
<span class="font-semibold text-on-surface" id="selectedCount">0</span> units selected
      </span>
</div>
<div class="flex items-center gap-2">
<button class="px-3 py-1 rounded bg-surface-container-lowest hover:bg-surface-container-high text-on-surface font-label-sm text-label-sm transition-colors shadow-2xs" type="button" data-demo="Assign Property Manager">
        Assign Property Manager
      </button>
<button class="px-3 py-1 rounded bg-surface-container-lowest hover:bg-surface-container-high text-on-surface font-label-sm text-label-sm transition-colors shadow-2xs" type="button" data-demo="Update Rental Policy">
        Update Rental Policy
      </button>
<button class="px-3 py-1 rounded bg-surface-container-lowest hover:bg-surface-container-high text-on-surface font-label-sm text-label-sm transition-colors shadow-2xs" type="button" data-demo="Mark for Maintenance Review">
        Mark for Maintenance Review
      </button>
<button class="px-3 py-1 rounded bg-surface-container-lowest hover:bg-surface-container-high text-on-surface font-label-sm text-label-sm transition-colors shadow-2xs" type="button" data-demo="Export Selected">
        Export Selected
      </button>
</div>
</div>
<!-- MAIN UNITS MANAGEMENT TABLE -->
<div class="bg-surface-container-lowest shadow-sm overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low text-on-surface-variant font-label-sm text-label-sm uppercase tracking-wider">
<th class="py-3 px-4 w-10 text-center" scope="col">
<span class="sr-only">Select</span>
</th>
<th class="py-3 px-4" scope="col">Unit ID</th>
<th class="py-3 px-4" scope="col">Property</th>
<th class="py-3 px-4" scope="col">Type & Specs</th>
<th class="py-3 px-4" scope="col">Rental Price</th>
<th class="py-3 px-4" scope="col">Setup</th>
<th class="py-3 px-4" scope="col">Occupancy</th>
<th class="py-3 px-4" scope="col">Maintenance</th>
<th class="py-3 px-4" scope="col">Booking Eligibility</th>
<th class="py-3 px-4 text-right" scope="col">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container-low">
<!-- Row 1: A-101 -->
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-3 px-4 text-center">
<input class="unit-row-cb rounded accent-primary cursor-pointer w-4 h-4" type="checkbox">
</td>
<td class="py-3 px-4">
<a class="font-headline-sm text-headline-sm text-primary hover:underline font-semibold font-mono" href="{{ route('manager.unit-details') }}">A-101</a>
</td>
<td class="py-3 px-4">
<div class="font-label-lg text-label-lg text-on-surface font-medium">Al-Yasmin Compound II</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Riyadh, KSA</div>
</td>
<td class="py-3 px-4">
<div class="font-label-md text-label-md text-on-surface">2BR Apartment</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">2 Bed, 2 Bath • 115 m² • Furnished</div>
</td>
<td class="py-3 px-4">
<span class="font-label-lg text-label-lg text-on-surface font-semibold font-mono">SAR 7,500</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">/mo</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface font-label-sm text-label-sm">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
<span>Configured</span>
</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md bg-surface-container-high text-on-surface font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[13px] text-secondary">door_open</span>
<span>Vacant</span>
</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1 text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[16px] text-secondary">check</span>
<span>Clear</span>
</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-tertiary-container/10 text-tertiary-container font-label-sm text-label-sm">
<span class="w-2 h-2 rounded-full bg-tertiary-container"></span>
<span>Not Published (Unpublished)</span>
</span>
</td>
<td class="py-3 px-4 text-right">
<button class="p-1 rounded hover:bg-surface-container text-on-surface-variant" title="Options" type="button" data-demo="Options" aria-label="Options">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 2: A-102 -->
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-3 px-4 text-center">
<input class="unit-row-cb rounded accent-primary cursor-pointer w-4 h-4" type="checkbox">
</td>
<td class="py-3 px-4">
<a class="font-headline-sm text-headline-sm text-primary hover:underline font-semibold font-mono" href="{{ route('manager.unit-details') }}">A-102</a>
</td>
<td class="py-3 px-4">
<div class="font-label-lg text-label-lg text-on-surface font-medium">Al-Yasmin Compound II</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Riyadh, KSA</div>
</td>
<td class="py-3 px-4">
<div class="font-label-md text-label-md text-on-surface">3BR Apartment</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">3 Bed, 3 Bath • 145 m² • Partial</div>
</td>
<td class="py-3 px-4">
<span class="font-label-lg text-label-lg text-on-surface font-semibold font-mono">SAR 9,200</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">/mo</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface font-label-sm text-label-sm">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
<span>Configured</span>
</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md bg-surface-container-high text-on-surface font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[13px] text-secondary">door_open</span>
<span>Vacant</span>
</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1 text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[16px] text-secondary">check</span>
<span>Clear</span>
</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-tertiary-container/10 text-tertiary-container font-label-sm text-label-sm">
<span class="w-2 h-2 rounded-full bg-tertiary-container"></span>
<span>Not Published (Unpublished)</span>
</span>
</td>
<td class="py-3 px-4 text-right">
<button class="p-1 rounded hover:bg-surface-container text-on-surface-variant" title="Options" type="button" data-demo="Options" aria-label="Options">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 3: B-201 -->
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-3 px-4 text-center">
<input class="unit-row-cb rounded accent-primary cursor-pointer w-4 h-4" type="checkbox">
</td>
<td class="py-3 px-4">
<a class="font-headline-sm text-headline-sm text-primary hover:underline font-semibold font-mono" href="{{ route('manager.unit-details') }}">B-201</a>
</td>
<td class="py-3 px-4">
<div class="font-label-lg text-label-lg text-on-surface font-medium">Al-Yasmin Compound II</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Riyadh, KSA</div>
</td>
<td class="py-3 px-4">
<div class="font-label-md text-label-md text-on-surface">1BR Studio</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">1 Bed, 1.5 Bath • 78 m² • Furnished</div>
</td>
<td class="py-3 px-4">
<span class="font-label-lg text-label-lg text-on-surface font-semibold font-mono">SAR 5,400</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">/mo</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface font-label-sm text-label-sm">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
<span>Configured</span>
</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md bg-surface-container-high text-on-surface font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[13px] text-secondary">door_open</span>
<span>Vacant</span>
</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1 text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[16px] text-secondary">check</span>
<span>Clear</span>
</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-tertiary-container/10 text-tertiary-container font-label-sm text-label-sm">
<span class="w-2 h-2 rounded-full bg-tertiary-container"></span>
<span>Not Published (Unpublished)</span>
</span>
</td>
<td class="py-3 px-4 text-right">
<button class="p-1 rounded hover:bg-surface-container text-on-surface-variant" title="Options" type="button" data-demo="Options" aria-label="Options">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 4: V-01 -->
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-3 px-4 text-center">
<input class="unit-row-cb rounded accent-primary cursor-pointer w-4 h-4" type="checkbox">
</td>
<td class="py-3 px-4">
<a class="font-headline-sm text-headline-sm text-primary hover:underline font-semibold font-mono" href="{{ route('manager.unit-details') }}">V-01</a>
</td>
<td class="py-3 px-4">
<div class="font-label-lg text-label-lg text-on-surface font-medium">Al-Yasmin Compound II</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Riyadh, KSA</div>
</td>
<td class="py-3 px-4">
<div class="font-label-md text-label-md text-on-surface">4BR Villa</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">4 Bed, 5 Bath • 380 m² • Unfurnished</div>
</td>
<td class="py-3 px-4">
<span class="font-label-lg text-label-lg text-on-surface font-semibold font-mono">SAR 180,000</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">/yr</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface font-label-sm text-label-sm">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
<span>Configured</span>
</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md bg-surface-container-high text-on-surface font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[13px] text-secondary">door_open</span>
<span>Vacant</span>
</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md bg-error-container/30 text-error font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[14px]">handyman</span>
<span>Turnover Check</span>
</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-error-container/30 text-error font-label-sm text-label-sm">
<span class="w-2 h-2 rounded-full bg-error"></span>
<span>Unavailable (Maintenance Block)</span>
</span>
</td>
<td class="py-3 px-4 text-right">
<button class="p-1 rounded hover:bg-surface-container text-on-surface-variant" title="Options" type="button" data-demo="Options" aria-label="Options">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 5: B-202 -->
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-3 px-4 text-center">
<input class="unit-row-cb rounded accent-primary cursor-pointer w-4 h-4" type="checkbox">
</td>
<td class="py-3 px-4">
<a class="font-headline-sm text-headline-sm text-primary hover:underline font-semibold font-mono" href="{{ route('manager.unit-details') }}">B-202</a>
</td>
<td class="py-3 px-4">
<div class="font-label-lg text-label-lg text-on-surface font-medium">Al-Yasmin Compound II</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Riyadh, KSA</div>
</td>
<td class="py-3 px-4">
<div class="font-label-md text-label-md text-on-surface">Apartment</div>
<div class="font-body-sm text-body-sm text-tertiary-container italic">Specs Not Set • Level 2</div>
</td>
<td class="py-3 px-4">
<span class="font-body-sm text-body-sm text-on-surface-variant italic">Not Set</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-tertiary-container/10 text-tertiary-container font-label-sm text-label-sm">
<span class="w-1.5 h-1.5 rounded-full bg-tertiary-container"></span>
<span>Pending</span>
</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center px-2 py-0.5 rounded-md bg-surface-container text-on-surface-variant font-label-sm text-label-sm">
              Not Assigned
            </span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center text-on-surface-variant/70 font-label-sm text-label-sm">
              Not Assessed
            </span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm">
<span class="w-2 h-2 rounded-full bg-outline"></span>
<span>Unavailable (Setup Incomplete)</span>
</span>
</td>
<td class="py-3 px-4 text-right">
<button class="p-1 rounded hover:bg-surface-container text-on-surface-variant" title="Options" type="button" data-demo="Options" aria-label="Options">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 6: MV-101 -->
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-3 px-4 text-center">
<input class="unit-row-cb rounded accent-primary cursor-pointer w-4 h-4" type="checkbox">
</td>
<td class="py-3 px-4">
<a class="font-headline-sm text-headline-sm text-primary hover:underline font-semibold font-mono" href="{{ route('manager.unit-details') }}">MV-101</a>
</td>
<td class="py-3 px-4">
<div class="font-label-lg text-label-lg text-on-surface font-medium">Marina View Residences</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Dubai, UAE</div>
</td>
<td class="py-3 px-4">
<div class="font-label-md text-label-md text-on-surface">2BR Apartment</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">2 Bed, 2 Bath • 110 m² • Luxury</div>
</td>
<td class="py-3 px-4">
<span class="font-label-lg text-label-lg text-on-surface font-semibold font-mono">USD 2,100</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">/mo</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface font-label-sm text-label-sm">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
<span>Configured</span>
</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[13px]">person</span>
<span>Occupied</span>
</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1 text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[16px] text-secondary">check</span>
<span>Clear</span>
</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-surface-container-highest text-on-surface-variant font-label-sm text-label-sm">
<span class="w-2 h-2 rounded-full bg-on-surface-variant"></span>
<span>Occupied (Active Lease)</span>
</span>
</td>
<td class="py-3 px-4 text-right">
<button class="p-1 rounded hover:bg-surface-container text-on-surface-variant" title="Options" type="button" data-demo="Options" aria-label="Options">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 7: MV-102 -->
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-3 px-4 text-center">
<input class="unit-row-cb rounded accent-primary cursor-pointer w-4 h-4" type="checkbox">
</td>
<td class="py-3 px-4">
<a class="font-headline-sm text-headline-sm text-primary hover:underline font-semibold font-mono" href="{{ route('manager.unit-details') }}">MV-102</a>
</td>
<td class="py-3 px-4">
<div class="font-label-lg text-label-lg text-on-surface font-medium">Marina View Residences</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Dubai, UAE</div>
</td>
<td class="py-3 px-4">
<div class="font-label-md text-label-md text-on-surface">Studio</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">1 Bed, 1 Bath • 52 m² • Furnished</div>
</td>
<td class="py-3 px-4">
<span class="font-label-lg text-label-lg text-on-surface font-semibold font-mono">USD 1,250</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">/mo</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface font-label-sm text-label-sm">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
<span>Configured</span>
</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md bg-surface-container-high text-on-surface font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[13px] text-secondary">door_open</span>
<span>Vacant</span>
</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1 text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[16px] text-secondary">check</span>
<span>Clear</span>
</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-semibold">
<span class="w-2 h-2 rounded-full bg-secondary"></span>
<span>Available (Request to Book)</span>
</span>
</td>
<td class="py-3 px-4 text-right">
<button class="p-1 rounded hover:bg-surface-container text-on-surface-variant" title="Options" type="button" data-demo="Options" aria-label="Options">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 8: PG-01 -->
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-3 px-4 text-center">
<input class="unit-row-cb rounded accent-primary cursor-pointer w-4 h-4" type="checkbox">
</td>
<td class="py-3 px-4">
<a class="font-headline-sm text-headline-sm text-primary hover:underline font-semibold font-mono" href="{{ route('manager.unit-details') }}">PG-01</a>
</td>
<td class="py-3 px-4">
<div class="font-label-lg text-label-lg text-on-surface font-medium">Palm Grove Chalets</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Ras Al Khaimah, UAE</div>
</td>
<td class="py-3 px-4">
<div class="font-label-md text-label-md text-on-surface">Chalet</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">1 Bed, 1 Bath • 85 m² • Pool View</div>
</td>
<td class="py-3 px-4">
<span class="font-label-lg text-label-lg text-on-surface font-semibold font-mono">AED 850</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">/night</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface font-label-sm text-label-sm">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
<span>Configured</span>
</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md bg-surface-container-high text-on-surface font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[13px] text-secondary">door_open</span>
<span>Vacant</span>
</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1 text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[16px] text-secondary">check</span>
<span>Clear</span>
</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-semibold">
<span class="w-2 h-2 rounded-full bg-secondary"></span>
<span>Available (Request to Book)</span>
</span>
</td>
<td class="py-3 px-4 text-right">
<button class="p-1 rounded hover:bg-surface-container text-on-surface-variant" title="Options" type="button" data-demo="Options" aria-label="Options">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 9: PG-02 -->
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-3 px-4 text-center">
<input class="unit-row-cb rounded accent-primary cursor-pointer w-4 h-4" type="checkbox">
</td>
<td class="py-3 px-4">
<a class="font-headline-sm text-headline-sm text-primary hover:underline font-semibold font-mono" href="{{ route('manager.unit-details') }}">PG-02</a>
</td>
<td class="py-3 px-4">
<div class="font-label-lg text-label-lg text-on-surface font-medium">Palm Grove Chalets</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Ras Al Khaimah, UAE</div>
</td>
<td class="py-3 px-4">
<div class="font-label-md text-label-md text-on-surface">Chalet</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">2 Bed, 2 Bath • 120 m² • Private Garden</div>
</td>
<td class="py-3 px-4">
<span class="font-label-lg text-label-lg text-on-surface font-semibold font-mono">AED 950</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">/night</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface font-label-sm text-label-sm">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
<span>Configured</span>
</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[13px]">person</span>
<span>Occupied</span>
</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1 text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[16px] text-secondary">check</span>
<span>Clear</span>
</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-surface-container-highest text-on-surface-variant font-label-sm text-label-sm">
<span class="w-2 h-2 rounded-full bg-on-surface-variant"></span>
<span>Occupied (Active Booking)</span>
</span>
</td>
<td class="py-3 px-4 text-right">
<button class="p-1 rounded hover:bg-surface-container text-on-surface-variant" title="Options" type="button" data-demo="Options" aria-label="Options">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 10: PG-03 -->
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-3 px-4 text-center">
<input class="unit-row-cb rounded accent-primary cursor-pointer w-4 h-4" type="checkbox">
</td>
<td class="py-3 px-4">
<a class="font-headline-sm text-headline-sm text-primary hover:underline font-semibold font-mono" href="{{ route('manager.unit-details') }}">PG-03</a>
</td>
<td class="py-3 px-4">
<div class="font-label-lg text-label-lg text-on-surface font-medium">Palm Grove Chalets</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Ras Al Khaimah, UAE</div>
</td>
<td class="py-3 px-4">
<div class="font-label-md text-label-md text-on-surface">Chalet</div>
<div class="font-body-sm text-body-sm text-tertiary-container italic">Specs Not Set • Chalet Wing C</div>
</td>
<td class="py-3 px-4">
<span class="font-body-sm text-body-sm text-on-surface-variant italic">Not Set</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-tertiary-container/10 text-tertiary-container font-label-sm text-label-sm">
<span class="w-1.5 h-1.5 rounded-full bg-tertiary-container"></span>
<span>Pending</span>
</span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center px-2 py-0.5 rounded-md bg-surface-container text-on-surface-variant font-label-sm text-label-sm">
              Not Assigned
            </span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center text-on-surface-variant/70 font-label-sm text-label-sm">
              Not Assessed
            </span>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm">
<span class="w-2 h-2 rounded-full bg-outline"></span>
<span>Unavailable (Setup Incomplete)</span>
</span>
</td>
<td class="py-3 px-4 text-right">
<button class="p-1 rounded hover:bg-surface-container text-on-surface-variant" title="Options" type="button" data-demo="Options" aria-label="Options">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- TABLE PAGINATION & FOOTER -->
<div class="p-space-md rounded-b-xl bg-surface-container-lowest shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-space-md mb-space-xl">
<div class="flex items-center gap-space-md">
<span class="font-body-sm text-body-sm text-on-surface-variant">Showing <strong class="text-on-surface">1–10</strong> of 30 units</span>
<div class="flex items-center gap-2">
<label class="font-body-sm text-body-sm text-on-surface-variant" for="rowsPerPage">Rows per page:</label>
<select class="h-8 px-2 rounded-md bg-surface-container-low text-on-surface font-body-sm text-body-sm focus:outline-none cursor-pointer" id="rowsPerPage">
<option selected="">10 rows</option>
<option>25 rows</option>
<option>50 rows</option>
</select>
</div>
</div>
<!-- Page Controls -->
<div class="flex items-center gap-1">
<button class="px-2.5 py-1.5 rounded-lg bg-surface-container-low text-on-surface-variant hover:bg-surface-container disabled:opacity-40 transition-colors font-label-sm text-label-sm flex items-center gap-1" disabled="" type="button" data-demo="Previous">
<span class="material-symbols-outlined text-[16px]">chevron_left</span>
<span>Previous</span>
</button>
<button class="w-8 h-8 rounded-lg bg-primary-container text-on-primary font-label-sm text-label-sm font-semibold shadow-xs" type="button" data-demo="1">
        1
      </button>
<button class="w-8 h-8 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface font-label-sm text-label-sm transition-colors" type="button" data-demo="2">
        2
      </button>
<button class="w-8 h-8 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface font-label-sm text-label-sm transition-colors" type="button" data-demo="3">
        3
      </button>
<button class="px-2.5 py-1.5 rounded-lg bg-surface-container-low text-on-surface hover:bg-surface-container transition-colors font-label-sm text-label-sm flex items-center gap-1" type="button" data-demo="Next">
<span>Next</span>
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
</button>
</div>
</div>
<!-- BOTTOM SECTIONS (TWO-COLUMN ARCHITECTURE) -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg mb-space-lg">
<!-- LEFT COLUMN: Unit Configuration Progress (7 cols) -->
<section class="lg:col-span-7 p-space-lg rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-2">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[22px]">tune</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Unit Configuration Progress</h3>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant font-medium">Portfolio Completion: 70%</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-space-lg">
          Track setup completeness per asset. Fully configured units inherit automatic compliance scoring.
        </p>
<!-- Progress List -->
<div class="space-y-space-md">
<!-- Property 1: Al-Yasmin Compound II -->
<div class="p-space-md rounded-lg bg-surface-container-low space-y-2">
<div class="flex items-center justify-between">
<div>
<span class="font-label-lg text-label-lg text-on-surface font-semibold">Al-Yasmin Compound II</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block">Riyadh, Saudi Arabia</span>
</div>
<div class="text-right">
<span class="font-label-md text-label-md text-tertiary-container font-semibold">4 of 12 configured (33%)</span>
<span class="font-label-sm text-label-sm text-error block">8 Pending</span>
</div>
</div>
<!-- Progress Bar -->
<div class="w-full h-2 rounded-full bg-surface-container-highest overflow-hidden">
<div class="h-full bg-tertiary-container rounded-full transition-all duration-500" style="width: 33.3%;"></div>
</div>
<div class="flex items-center justify-between pt-1 font-label-sm text-label-sm">
<a class="text-primary hover:underline font-semibold flex items-center gap-1" href="#demo-notice" data-demo="Complete Setup">
<span>Complete Setup</span>
<span class="material-symbols-outlined text-[14px]">arrow_forward</span>
</a>
<a class="text-on-surface-variant hover:text-on-surface" href="{{ route('manager.property-details') }}">View Property</a>
</div>
</div>
<!-- Property 2: Marina View Residences -->
<div class="p-space-md rounded-lg bg-surface-container-low space-y-2">
<div class="flex items-center justify-between">
<div>
<span class="font-label-lg text-label-lg text-on-surface font-semibold">Marina View Residences</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block">Dubai Marina, UAE</span>
</div>
<div class="text-right">
<span class="font-label-md text-label-md text-secondary font-semibold">10 of 10 configured (100%)</span>
<span class="px-2 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-semibold inline-block mt-0.5">Fully Configured</span>
</div>
</div>
<!-- Progress Bar -->
<div class="w-full h-2 rounded-full bg-surface-container-highest overflow-hidden">
<div class="h-full bg-secondary rounded-full transition-all duration-500" style="width: 100%;"></div>
</div>
<div class="flex items-center justify-between pt-1 font-label-sm text-label-sm">
<span class="text-secondary flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">verified</span>
<span>Active & Ready</span>
</span>
<a class="text-on-surface-variant hover:text-on-surface" href="{{ route('manager.property-details') }}">View Property</a>
</div>
</div>
<!-- Property 3: Palm Grove Chalets -->
<div class="p-space-md rounded-lg bg-surface-container-low space-y-2">
<div class="flex items-center justify-between">
<div>
<span class="font-label-lg text-label-lg text-on-surface font-semibold">Palm Grove Chalets</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block">Ras Al Khaimah, UAE</span>
</div>
<div class="text-right">
<span class="font-label-md text-label-md text-on-surface font-semibold">7 of 8 configured (88%)</span>
<span class="font-label-sm text-label-sm text-tertiary-container block">1 Pending</span>
</div>
</div>
<!-- Progress Bar -->
<div class="w-full h-2 rounded-full bg-surface-container-highest overflow-hidden">
<div class="h-full bg-primary-container rounded-full transition-all duration-500" style="width: 87.5%;"></div>
</div>
<div class="flex items-center justify-between pt-1 font-label-sm text-label-sm">
<a class="text-primary hover:underline font-semibold flex items-center gap-1" href="#demo-notice" data-demo="Complete Setup (1 Pending)">
<span>Complete Setup (1 Pending)</span>
<span class="material-symbols-outlined text-[14px]">arrow_forward</span>
</a>
<a class="text-on-surface-variant hover:text-on-surface" href="{{ route('manager.property-details') }}">View Property</a>
</div>
</div>
</div>
</div>
<!-- Footnote -->
<div class="mt-space-md pt-space-sm flex items-center justify-between text-on-surface-variant font-label-sm text-label-sm">
<span>Portfolio status: <strong class="text-on-surface">21 configured</strong> / 30 planned units</span>
<span class="font-mono text-secondary">Ready: 70.0%</span>
</div>
</section>
<!-- RIGHT COLUMN: How Unit Availability Works (Governance Panel) (5 cols) -->
<section class="lg:col-span-5 p-space-lg rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center gap-2 mb-2">
<span class="material-symbols-outlined text-primary text-[22px]">policy</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">How Unit Availability Works</h3>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md">
          Availability logic evaluates 4 sovereign parameters in real time before publishing to booking channels:
        </p>
<!-- 4 Operational Dimensions Grid -->
<div class="space-y-space-sm mb-space-md">
<div class="p-space-sm rounded-lg bg-surface-container-low flex items-start gap-space-sm">
<span class="w-5 h-5 rounded-full bg-surface-container-high text-on-surface font-label-sm text-label-sm flex items-center justify-center shrink-0 mt-0.5">1</span>
<div>
<span class="font-label-md text-label-md text-on-surface font-semibold block">Setup Status</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Whether a unit has the required configuration data, layout plans, and rental specifications.</span>
</div>
</div>
<div class="p-space-sm rounded-lg bg-surface-container-low flex items-start gap-space-sm">
<span class="w-5 h-5 rounded-full bg-surface-container-high text-on-surface font-label-sm text-label-sm flex items-center justify-center shrink-0 mt-0.5">2</span>
<div>
<span class="font-label-md text-label-md text-on-surface font-semibold block">Occupancy Status</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Whether a unit is actively occupied by a registered tenant, vacant, or unassigned.</span>
</div>
</div>
<div class="p-space-sm rounded-lg bg-surface-container-low flex items-start gap-space-sm">
<span class="w-5 h-5 rounded-full bg-surface-container-high text-on-surface font-label-sm text-label-sm flex items-center justify-center shrink-0 mt-0.5">3</span>
<div>
<span class="font-label-md text-label-md text-on-surface font-semibold block">Maintenance Status</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Whether the unit is clear, blocked by work orders, or awaiting formal inspection sign-off.</span>
</div>
</div>
<div class="p-space-sm rounded-lg bg-surface-container-low flex items-start gap-space-sm">
<span class="w-5 h-5 rounded-full bg-surface-container-high text-on-surface font-label-sm text-label-sm flex items-center justify-center shrink-0 mt-0.5">4</span>
<div>
<span class="font-label-md text-label-md text-on-surface font-semibold block">Booking Availability</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Synthesized eligibility determining if the unit can accept manager-approved booking requests.</span>
</div>
</div>
</div>
<!-- Phase 1 Protocol Reminder Callout -->
<div class="p-space-sm rounded-lg bg-primary-container/10 flex items-start gap-2">
<span class="material-symbols-outlined text-[18px] text-primary shrink-0 mt-0.5">lock_clock</span>
<p class="font-body-sm text-body-sm text-on-surface leading-tight">
<strong>Phase 1 Protocol:</strong> All eligible rental bookings require property manager review and manual verification. Instant booking and automated payment collections are not enabled.
          </p>
</div>
</div>
<!-- Footer Note -->
<div class="mt-space-md pt-space-sm flex items-center justify-between text-on-surface-variant font-label-sm text-label-sm">
<span class="flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">public</span>
<span>SAR, AED, USD Supported</span>
</span>
<span>Metric / Imperial • Bilingual AR/EN</span>
</div>
</section>
</div>
</div>

@endsection
