{{-- Imported from client_demo/screens/maintenance_management/code.html; static demonstration data. --}}
@extends('layouts.manager')
@section('content')
<div class="flex flex-col w-full pb-space-xl">
<!-- BREADCRUMB & HEADER -->
<div class="flex flex-col gap-space-sm mb-space-lg">
<div class="flex items-center gap-space-xs text-on-surface-variant font-label-md">
<span class="hover:text-primary transition-colors cursor-pointer" role="button" tabindex="0" data-demo="Dashboard">Dashboard</span>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="text-primary font-semibold">Maintenance</span>
</div>
<div class="flex flex-col lg:flex-row lg:items-center justify-between gap-space-md">
<div class="flex flex-col">
<div class="flex items-center gap-space-sm flex-wrap">
<h1 class="font-headline-lg text-headline-lg text-on-surface font-bold tracking-tight">Maintenance Management</h1>
<span class="px-2.5 py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed-variant font-label-sm uppercase tracking-wider font-bold">GCC ENTERPRISE</span>
</div>
<p class="font-body-md text-on-surface-variant mt-1 max-w-3xl">
          Track maintenance requests, assign work, coordinate repairs, and manage unit availability across the property portfolio.
        </p>
</div>
<div class="flex items-center gap-space-sm flex-shrink-0">
<button class="flex items-center gap-space-xs px-space-md h-10 rounded-lg bg-surface-container-lowest text-on-surface font-label-lg font-medium shadow-sm hover:bg-surface-container-high transition-all" type="button" data-demo="Export Work Orders">
<span class="material-symbols-outlined text-[18px]">download</span>
<span>Export Work Orders</span>
</button>
<button class="flex items-center gap-space-xs px-space-md h-10 rounded-lg bg-primary-container text-on-primary font-label-lg font-semibold shadow-sm hover:bg-primary transition-all active:scale-[0.99]" type="button" data-demo="+ Create Maintenance Request">
<span class="material-symbols-outlined text-[18px]">add</span>
<span>+ Create Maintenance Request</span>
</button>
</div>
</div>
</div>
<!-- STATUTORY / OPERATIONAL NOTICE BANNER -->
<div class="mb-space-lg rounded-xl bg-surface-container-lowest shadow-sm p-space-md flex items-start gap-space-md">
<div class="w-10 h-10 rounded-lg bg-primary-fixed/60 flex items-center justify-center text-primary flex-shrink-0 mt-0.5">
<span class="material-symbols-outlined text-[22px]">policy</span>
</div>
<div class="flex-1 flex flex-col md:flex-row md:items-center justify-between gap-space-sm">
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-primary font-bold leading-tight">Maintenance & Booking Availability Governance</span>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5 leading-relaxed">
          Maintenance work orders and booking restrictions are managed independently. A reported work order does not automatically block booking eligibility unless an explicit operational restriction is flagged by authorized property managers. Al-Yasmin Compound II currently has 0 maintenance requests recorded, 0 completed inspections, and remains unpublished.
        </p>
</div>
<span class="inline-flex items-center gap-1 text-primary font-label-sm font-semibold tracking-wider uppercase flex-shrink-0 self-start md:self-center bg-surface-container-low px-2 py-1 rounded">
<span class="material-symbols-outlined text-[14px]">verified_user</span> Dual-Ledger Sync
      </span>
</div>
</div>
<!-- 6 MAINTENANCE KPI CARDS -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-6 gap-space-md mb-2">
<!-- Card 1 -->
<div class="rounded-xl bg-surface-container-lowest p-space-md shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
<div class="flex items-center justify-between text-on-surface-variant mb-space-sm">
<span class="font-label-sm uppercase tracking-wider font-semibold">Total Work Orders</span>
<div class="w-7 h-7 rounded-lg bg-surface-container-low flex items-center justify-center text-on-surface">
<span class="material-symbols-outlined text-[16px]">build_circle</span>
</div>
</div>
<div class="flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl font-bold text-on-surface leading-none">24</span>
</div>
<span class="font-label-sm text-body-sm text-on-surface-variant mt-2">Across portfolio records</span>
</div>
<!-- Card 2 -->
<div class="rounded-xl bg-surface-container-lowest p-space-md shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
<div class="flex items-center justify-between text-on-surface-variant mb-space-sm">
<span class="font-label-sm uppercase tracking-wider font-semibold">Open Requests</span>
<div class="w-7 h-7 rounded-lg bg-error-container/70 flex items-center justify-center text-error">
<span class="material-symbols-outlined text-[16px]">priority_high</span>
</div>
</div>
<div class="flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl font-bold text-on-surface leading-none">6</span>
<span class="inline-flex items-center px-1.5 py-0.5 rounded text-[11px] font-semibold bg-error-container text-on-error-container">Triage Required</span>
</div>
<span class="font-label-sm text-body-sm text-error font-medium mt-2">Action required</span>
</div>
<!-- Card 3 -->
<div class="rounded-xl bg-surface-container-lowest p-space-md shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
<div class="flex items-center justify-between text-on-surface-variant mb-space-sm">
<span class="font-label-sm uppercase tracking-wider font-semibold">In Progress</span>
<div class="w-7 h-7 rounded-lg bg-surface-container-high flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[16px]">timelapse</span>
</div>
</div>
<div class="flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl font-bold text-on-surface leading-none">8</span>
</div>
<span class="font-label-sm text-body-sm text-on-surface-variant mt-2">Active repairs on-site</span>
</div>
<!-- Card 4 -->
<div class="rounded-xl bg-surface-container-lowest p-space-md shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
<div class="flex items-center justify-between text-on-surface-variant mb-space-sm">
<span class="font-label-sm uppercase tracking-wider font-semibold">Completed</span>
<div class="w-7 h-7 rounded-lg bg-surface-container-low flex items-center justify-center text-on-surface">
<span class="material-symbols-outlined text-[16px]">task_alt</span>
</div>
</div>
<div class="flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl font-bold text-on-surface leading-none">9</span>
</div>
<span class="font-label-sm text-body-sm text-on-surface-variant mt-2">Awaiting sign-off</span>
</div>
<!-- Card 5 -->
<div class="rounded-xl bg-surface-container-lowest p-space-md shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
<div class="flex items-center justify-between text-on-surface-variant mb-space-sm">
<span class="font-label-sm uppercase tracking-wider font-semibold">Cancelled</span>
<div class="w-7 h-7 rounded-lg bg-surface-container-low flex items-center justify-center text-outline">
<span class="material-symbols-outlined text-[16px]">cancel</span>
</div>
</div>
<div class="flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl font-bold text-on-surface-variant leading-none">1</span>
</div>
<span class="font-label-sm text-body-sm text-on-surface-variant mt-2">Withdrawn/invalid</span>
</div>
<!-- Card 6 -->
<div class="rounded-xl bg-surface-container-lowest p-space-md shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
<div class="flex items-center justify-between text-on-surface-variant mb-space-sm">
<span class="font-label-sm uppercase tracking-wider font-semibold text-primary">Booking Restrictions</span>
<div class="w-7 h-7 rounded-lg bg-primary-fixed flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[16px]">lock</span>
</div>
</div>
<div class="flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl font-bold text-primary leading-none">2</span>
<span class="inline-flex items-center px-1.5 py-0.5 rounded text-[11px] font-semibold bg-primary-fixed text-primary">Isolated</span>
</div>
<span class="font-label-sm text-body-sm text-primary font-medium mt-2">PG-03, PG-04 — Operational hold</span>
</div>
</div>
<div class="text-[11px] text-on-surface-variant/80 italic mb-space-lg">
    *The first 4 metrics total 24 work orders; booking restrictions represent a separate operational hold on unit calendars. Al-Yasmin Compound II currently has 0 recorded maintenance requests and 0 active booking restrictions.
  </div>
<!-- STATUS TABS -->
<div class="flex items-center gap-space-xs overflow-x-auto pb-1 mb-space-md">
<button class="px-space-md py-1.5 rounded-lg bg-primary-container text-on-primary font-label-md font-semibold whitespace-nowrap shadow-sm" type="button" data-demo="All Work Orders (24)">
      All Work Orders (24)
    </button>
<button class="px-space-md py-1.5 rounded-lg bg-surface-container-lowest text-on-surface-variant hover:text-on-surface font-label-md font-medium whitespace-nowrap shadow-sm transition-colors" type="button" data-demo="Open (6)">
      Open (6)
    </button>
<button class="px-space-md py-1.5 rounded-lg bg-surface-container-lowest text-on-surface-variant hover:text-on-surface font-label-md font-medium whitespace-nowrap shadow-sm transition-colors" type="button" data-demo="In Progress (8)">
      In Progress (8)
    </button>
<button class="px-space-md py-1.5 rounded-lg bg-surface-container-lowest text-on-surface-variant hover:text-on-surface font-label-md font-medium whitespace-nowrap shadow-sm transition-colors" type="button" data-demo="Completed (9)">
      Completed (9)
    </button>
<button class="px-space-md py-1.5 rounded-lg bg-surface-container-lowest text-on-surface-variant hover:text-on-surface font-label-md font-medium whitespace-nowrap shadow-sm transition-colors" type="button" data-demo="Cancelled (1)">
      Cancelled (1)
    </button>
<button class="px-space-md py-1.5 rounded-lg bg-surface-container-lowest text-primary hover:bg-primary-fixed/30 font-label-md font-semibold whitespace-nowrap shadow-sm transition-colors flex items-center gap-1.5" type="button" data-demo="Booking Restrictions (2 Separate)">
<span class="material-symbols-outlined text-[14px]">lock</span>
      Booking Restrictions (2 Separate)
    </button>
</div>
<!-- SEARCH & ADVANCED FILTERS TOOLBAR -->
<div class="rounded-xl bg-surface-container-lowest shadow-sm p-space-md mb-space-md flex flex-col gap-space-md">
<div class="flex flex-col lg:flex-row items-stretch lg:items-center gap-space-md">
<!-- Search Input -->
<div class="relative flex-1">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-[18px]">search</span>
<input class="w-full h-10 pl-9 pr-3 rounded-lg bg-surface-container-low text-on-surface placeholder:text-outline font-body-sm text-body-sm outline-none focus:bg-surface-container-lowest transition-colors" placeholder="Search work order, property, unit, issue, or assignee..." type="text">
</div>
<!-- Quick Action Buttons -->
<div class="flex items-center gap-space-xs flex-shrink-0">
<button class="px-3 h-10 rounded-lg bg-surface-container-low text-on-surface font-label-md font-medium hover:bg-surface-container-high transition-colors flex items-center gap-1" type="button" data-demo="Advanced Filters">
<span class="material-symbols-outlined text-[16px]">tune</span>
<span>Advanced Filters</span>
</button>
<button class="px-3 h-10 rounded-lg text-outline hover:text-primary font-label-md font-medium transition-colors" type="button" data-demo="Clear Filters">
          Clear Filters
        </button>
</div>
</div>
<!-- Dropdown Filters Row -->
<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-8 gap-2">
<!-- Property -->
<div class="flex flex-col">
<label class="text-[10px] font-label-sm font-semibold uppercase text-outline mb-1">Property</label>
<select class="h-9 px-2 rounded-lg bg-surface-container-low text-on-surface font-label-sm outline-none cursor-pointer">
<option>All Properties</option>
<option>Marina View Residences</option>
<option>Palm Grove Chalets</option>
<option>Al-Yasmin Compound II (0)</option>
</select>
</div>
<!-- Country -->
<div class="flex flex-col">
<label class="text-[10px] font-label-sm font-semibold uppercase text-outline mb-1">Country</label>
<select class="h-9 px-2 rounded-lg bg-surface-container-low text-on-surface font-label-sm outline-none cursor-pointer">
<option>All GCC</option>
<option>Saudi Arabia (KSA)</option>
<option>United Arab Emirates</option>
<option>Qatar</option>
<option>Kuwait</option>
</select>
</div>
<!-- Unit -->
<div class="flex flex-col">
<label class="text-[10px] font-label-sm font-semibold uppercase text-outline mb-1">Unit</label>
<select class="h-9 px-2 rounded-lg bg-surface-container-low text-on-surface font-label-sm outline-none cursor-pointer">
<option>All Units</option>
<option>Unit MV-102</option>
<option>Unit PG-03</option>
<option>Unit MV-105</option>
<option>Unit PG-04</option>
<option>Unit MV-104</option>
<option>Unit PG-05</option>
</select>
</div>
<!-- Status -->
<div class="flex flex-col">
<label class="text-[10px] font-label-sm font-semibold uppercase text-outline mb-1">Status</label>
<select class="h-9 px-2 rounded-lg bg-surface-container-low text-on-surface font-label-sm outline-none cursor-pointer">
<option>All Statuses</option>
<option>Open</option>
<option>In Progress</option>
<option>Completed</option>
<option>Cancelled</option>
</select>
</div>
<!-- Priority -->
<div class="flex flex-col">
<label class="text-[10px] font-label-sm font-semibold uppercase text-outline mb-1">Priority</label>
<select class="h-9 px-2 rounded-lg bg-surface-container-low text-on-surface font-label-sm outline-none cursor-pointer">
<option>All Priorities</option>
<option>Urgent</option>
<option>High</option>
<option>Medium</option>
<option>Low</option>
</select>
</div>
<!-- Category -->
<div class="flex flex-col">
<label class="text-[10px] font-label-sm font-semibold uppercase text-outline mb-1">Category</label>
<select class="h-9 px-2 rounded-lg bg-surface-container-low text-on-surface font-label-sm outline-none cursor-pointer">
<option>All Categories</option>
<option>Plumbing</option>
<option>Electrical</option>
<option>HVAC</option>
<option>Appliances</option>
<option>Structural</option>
<option>Preventive</option>
</select>
</div>
<!-- Booking Restriction -->
<div class="flex flex-col">
<label class="text-[10px] font-label-sm font-semibold uppercase text-outline mb-1">Restriction</label>
<select class="h-9 px-2 rounded-lg bg-surface-container-low text-on-surface font-label-sm outline-none cursor-pointer">
<option>All Calendar Status</option>
<option>Booking Restricted (Hold)</option>
<option>No Restriction (Clear)</option>
</select>
</div>
<!-- Date Range -->
<div class="flex flex-col">
<label class="text-[10px] font-label-sm font-semibold uppercase text-outline mb-1">Date Range</label>
<select class="h-9 px-2 rounded-lg bg-surface-container-low text-on-surface font-label-sm outline-none cursor-pointer">
<option>All Dates</option>
<option>Past 7 Days</option>
<option>Past 30 Days</option>
<option>Current Quarter</option>
</select>
</div>
</div>
<!-- Active counter subtitle -->
<div class="flex items-center justify-between text-xs text-on-surface-variant pt-1">
<div class="flex items-center gap-1.5">
<span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
<span class="font-medium text-on-surface">Showing 6 of 24 Work Orders</span>
<span class="text-outline">•</span>
<span>Independent operational dispatch active</span>
</div>
<span class="text-[11px] text-outline">Sorted by: Urgency & Status</span>
</div>
</div>
<!-- MAIN MAINTENANCE MANAGEMENT TABLE -->
<div class="rounded-xl bg-surface-container-lowest shadow-sm overflow-hidden mb-space-lg">
<div class="overflow-x-auto">
<table class="w-full text-left font-body-sm text-body-sm border-collapse">
<thead>
<tr class="bg-surface-container-low text-on-surface-variant uppercase text-[11px] tracking-wider font-semibold">
<th class="py-3 px-4 w-10 text-center">
<input class="rounded accent-primary cursor-pointer" type="checkbox">
</th>
<th class="py-3 px-4">WORK ORDER REF</th>
<th class="py-3 px-4">PROPERTY / UNIT</th>
<th class="py-3 px-4">ISSUE / CATEGORY</th>
<th class="py-3 px-4">PRIORITY</th>
<th class="py-3 px-4">STATUS</th>
<th class="py-3 px-4">ASSIGNED TO</th>
<th class="py-3 px-4">BOOKING RESTRICTION</th>
<th class="py-3 px-4">DATE REPORTED</th>
<th class="py-3 px-4 text-center">ACTIONS</th>
</tr>
</thead>
<tbody>
<!-- Row 1 -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-3.5 px-4 text-center">
<input class="rounded accent-primary cursor-pointer" type="checkbox">
</td>
<td class="py-3.5 px-4 font-semibold text-primary font-mono tracking-tight">
              MNT-2026-001
            </td>
<td class="py-3.5 px-4">
<div class="font-medium text-on-surface">Marina View Residences</div>
<div class="text-[11px] text-on-surface-variant">Unit MV-102</div>
</td>
<td class="py-3.5 px-4">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-secondary">ac_unit</span>
<div>
<div class="text-on-surface font-medium">Air Conditioning</div>
<div class="text-[11px] text-on-surface-variant">Cooling issue</div>
</div>
</div>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold bg-tertiary-fixed text-on-tertiary-fixed-variant">High</span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-surface-container-high text-primary">
<span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span> In Progress
              </span>
</td>
<td class="py-3.5 px-4">
<div class="text-on-surface">Assigned Technician</div>
<div class="text-[11px] text-on-surface-variant">Operations Team A</div>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-surface-container-low text-on-surface-variant">
<span class="material-symbols-outlined text-[13px] text-primary">check_circle</span> No Restriction
              </span>
</td>
<td class="py-3.5 px-4 text-outline text-[12px] italic">
              Date Not Specified
            </td>
<td class="py-3.5 px-4 text-center">
<button class="w-8 h-8 rounded-lg hover:bg-surface-container-high text-on-surface-variant flex items-center justify-center transition-colors" type="button" data-demo="more_vert" aria-label="more vert">
<span class="material-symbols-outlined text-[18px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 2 (Selected Row Highlight) -->
<tr class="bg-surface-container-low transition-colors">
<td class="py-3.5 px-4 text-center">
<input checked="" class="rounded accent-primary cursor-pointer" type="checkbox">
</td>
<td class="py-3.5 px-4 font-semibold text-primary font-mono tracking-tight flex items-center gap-1.5">
<span>MNT-2026-002</span>
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
</td>
<td class="py-3.5 px-4">
<div class="font-medium text-on-surface">Palm Grove Chalets</div>
<div class="text-[11px] text-on-surface-variant font-semibold">Unit PG-03</div>
</td>
<td class="py-3.5 px-4">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-primary">water_drop</span>
<div>
<div class="text-on-surface font-semibold">Plumbing</div>
<div class="text-[11px] text-on-surface-variant">Water leakage</div>
</div>
</div>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-bold bg-error-container text-on-error-container">Urgent</span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-error-container/60 text-error">Open</span>
</td>
<td class="py-3.5 px-4">
<span class="text-outline italic text-[12px]">Unassigned</span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-primary-fixed text-primary">
<span class="material-symbols-outlined text-[13px]">lock</span> Restricted
              </span>
</td>
<td class="py-3.5 px-4 text-outline text-[12px] italic">
              Date Not Specified
            </td>
<td class="py-3.5 px-4 text-center">
<button class="w-8 h-8 rounded-lg bg-surface-container-high text-primary flex items-center justify-center transition-colors" type="button" data-demo="more_vert" aria-label="more vert">
<span class="material-symbols-outlined text-[18px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-3.5 px-4 text-center">
<input class="rounded accent-primary cursor-pointer" type="checkbox">
</td>
<td class="py-3.5 px-4 font-semibold text-primary font-mono tracking-tight">
              MNT-2026-003
            </td>
<td class="py-3.5 px-4">
<div class="font-medium text-on-surface">Marina View Residences</div>
<div class="text-[11px] text-on-surface-variant">Unit MV-105</div>
</td>
<td class="py-3.5 px-4">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-secondary">bolt</span>
<div>
<div class="text-on-surface font-medium">Electrical</div>
<div class="text-[11px] text-on-surface-variant">Lighting fault</div>
</div>
</div>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold bg-surface-container-high text-on-surface-variant">Medium</span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-surface-container-low text-on-surface">Completed</span>
</td>
<td class="py-3.5 px-4">
<div class="text-on-surface">Assigned Technician</div>
<div class="text-[11px] text-on-surface-variant">Field Electrician</div>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-surface-container-low text-on-surface-variant">
<span class="material-symbols-outlined text-[13px] text-primary">check_circle</span> No Restriction
              </span>
</td>
<td class="py-3.5 px-4 text-outline text-[12px] italic">
              Date Not Specified
            </td>
<td class="py-3.5 px-4 text-center">
<button class="w-8 h-8 rounded-lg hover:bg-surface-container-high text-on-surface-variant flex items-center justify-center transition-colors" type="button" data-demo="more_vert" aria-label="more vert">
<span class="material-symbols-outlined text-[18px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 4 -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-3.5 px-4 text-center">
<input class="rounded accent-primary cursor-pointer" type="checkbox">
</td>
<td class="py-3.5 px-4 font-semibold text-primary font-mono tracking-tight">
              MNT-2026-004
            </td>
<td class="py-3.5 px-4">
<div class="font-medium text-on-surface">Palm Grove Chalets</div>
<div class="text-[11px] text-on-surface-variant font-semibold">Unit PG-04</div>
</td>
<td class="py-3.5 px-4">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-secondary">door_front</span>
<div>
<div class="text-on-surface font-medium">Structural</div>
<div class="text-[11px] text-on-surface-variant">Door lock damage</div>
</div>
</div>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold bg-tertiary-fixed text-on-tertiary-fixed-variant">High</span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-surface-container-high text-primary">
<span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span> In Progress
              </span>
</td>
<td class="py-3.5 px-4">
<div class="text-on-surface">Assigned Technician</div>
<div class="text-[11px] text-on-surface-variant">Carpentry Specialist</div>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-primary-fixed text-primary">
<span class="material-symbols-outlined text-[13px]">lock</span> Restricted
              </span>
</td>
<td class="py-3.5 px-4 text-outline text-[12px] italic">
              Date Not Specified
            </td>
<td class="py-3.5 px-4 text-center">
<button class="w-8 h-8 rounded-lg hover:bg-surface-container-high text-on-surface-variant flex items-center justify-center transition-colors" type="button" data-demo="more_vert" aria-label="more vert">
<span class="material-symbols-outlined text-[18px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 5 -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-3.5 px-4 text-center">
<input class="rounded accent-primary cursor-pointer" type="checkbox">
</td>
<td class="py-3.5 px-4 font-semibold text-primary font-mono tracking-tight">
              MNT-2026-005
            </td>
<td class="py-3.5 px-4">
<div class="font-medium text-on-surface">Marina View Residences</div>
<div class="text-[11px] text-on-surface-variant">Unit MV-104</div>
</td>
<td class="py-3.5 px-4">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-secondary">kitchen</span>
<div>
<div class="text-on-surface font-medium">Appliance</div>
<div class="text-[11px] text-on-surface-variant">Refrigerator cooling fault</div>
</div>
</div>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold bg-surface-container-high text-on-surface-variant">Low</span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-tertiary-fixed text-on-tertiary-fixed-variant">Open</span>
</td>
<td class="py-3.5 px-4">
<span class="text-outline italic text-[12px]">Unassigned</span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-surface-container-low text-on-surface-variant">
<span class="material-symbols-outlined text-[13px] text-primary">check_circle</span> No Restriction
              </span>
</td>
<td class="py-3.5 px-4 text-outline text-[12px] italic">
              Date Not Specified
            </td>
<td class="py-3.5 px-4 text-center">
<button class="w-8 h-8 rounded-lg hover:bg-surface-container-high text-on-surface-variant flex items-center justify-center transition-colors" type="button" data-demo="more_vert" aria-label="more vert">
<span class="material-symbols-outlined text-[18px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 6 -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-3.5 px-4 text-center">
<input class="rounded accent-primary cursor-pointer" type="checkbox">
</td>
<td class="py-3.5 px-4 font-semibold text-primary font-mono tracking-tight">
              MNT-2026-006
            </td>
<td class="py-3.5 px-4">
<div class="font-medium text-on-surface">Palm Grove Chalets</div>
<div class="text-[11px] text-on-surface-variant">Unit PG-05</div>
</td>
<td class="py-3.5 px-4">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-secondary">build</span>
<div>
<div class="text-on-surface font-medium">Preventive Maint.</div>
<div class="text-[11px] text-on-surface-variant">Annual MEP inspection</div>
</div>
</div>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold bg-surface-container-high text-on-surface-variant">Low</span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-surface-container-high text-outline">Cancelled</span>
</td>
<td class="py-3.5 px-4">
<span class="text-outline italic text-[12px]">Unassigned</span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-surface-container-low text-on-surface-variant">
<span class="material-symbols-outlined text-[13px] text-primary">check_circle</span> No Restriction
              </span>
</td>
<td class="py-3.5 px-4 text-outline text-[12px] italic">
              Date Not Specified
            </td>
<td class="py-3.5 px-4 text-center">
<button class="w-8 h-8 rounded-lg hover:bg-surface-container-high text-on-surface-variant flex items-center justify-center transition-colors" type="button" data-demo="more_vert" aria-label="more vert">
<span class="material-symbols-outlined text-[18px]">more_vert</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination Footer -->
<div class="p-space-md bg-surface-container-low flex flex-col sm:flex-row items-center justify-between gap-space-md">
<div class="font-body-sm text-body-sm text-on-surface-variant">
        Showing <span class="font-semibold text-on-surface">1–6</span> of <span class="font-semibold text-on-surface">24</span> work orders
      </div>
<div class="flex items-center gap-space-md">
<div class="flex items-center gap-1">
<button class="w-8 h-8 rounded-lg bg-surface-container-lowest text-outline hover:text-on-surface flex items-center justify-center transition-colors disabled:opacity-40" disabled="" type="button" data-demo="chevron_left" aria-label="chevron left">
<span class="material-symbols-outlined text-[18px]">chevron_left</span>
</button>
<button class="w-8 h-8 rounded-lg bg-primary-container text-on-primary font-label-md font-semibold flex items-center justify-center shadow-sm" type="button" data-demo="1">1</button>
<button class="w-8 h-8 rounded-lg bg-surface-container-lowest text-on-surface-variant hover:bg-surface-container-high font-label-md font-medium flex items-center justify-center transition-colors" type="button" data-demo="2">2</button>
<button class="w-8 h-8 rounded-lg bg-surface-container-lowest text-on-surface-variant hover:bg-surface-container-high font-label-md font-medium flex items-center justify-center transition-colors" type="button" data-demo="3">3</button>
<button class="w-8 h-8 rounded-lg bg-surface-container-lowest text-on-surface-variant hover:bg-surface-container-high font-label-md font-medium flex items-center justify-center transition-colors" type="button" data-demo="4">4</button>
<button class="w-8 h-8 rounded-lg bg-surface-container-lowest text-on-surface-variant hover:text-on-surface flex items-center justify-center transition-colors" type="button" data-demo="chevron_right" aria-label="chevron right">
<span class="material-symbols-outlined text-[18px]">chevron_right</span>
</button>
</div>
<div class="flex items-center gap-2 border-l border-outline-variant/30 pl-space-md">
<span class="text-xs text-on-surface-variant">Rows per page:</span>
<select class="h-8 px-2 rounded-lg bg-surface-container-lowest text-on-surface font-label-sm outline-none cursor-pointer">
<option>10</option>
<option>25</option>
<option>50</option>
</select>
</div>
</div>
</div>
</div>
<!-- PRIORITY DEFINITIONS & MAINTENANCE CATEGORIES -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-md mb-space-lg">
<!-- Priority Legend (4 cols) -->
<div class="lg:col-span-4 rounded-xl bg-surface-container-lowest p-space-md shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center gap-2 mb-space-sm">
<span class="material-symbols-outlined text-primary text-[20px]">flag</span>
<h2 class="font-headline-sm text-headline-sm text-on-surface font-bold">Priority Triage Governance</h2>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md">
          Standardized GCC operational priority response framework for resident habitability and property integrity:
        </p>
<div class="flex flex-col gap-space-sm">
<div class="flex items-start gap-2.5 p-2 rounded-lg bg-surface-container-low">
<span class="w-2.5 h-2.5 rounded-full bg-error mt-1.5 flex-shrink-0"></span>
<div>
<div class="font-label-md font-bold text-on-surface">Urgent Priority</div>
<div class="text-[11px] text-on-surface-variant">Immediate response (&lt; 2 hrs). Water burst, power outage, or habitability impact.</div>
</div>
</div>
<div class="flex items-start gap-2.5 p-2 rounded-lg bg-surface-container-low">
<span class="w-2.5 h-2.5 rounded-full bg-tertiary mt-1.5 flex-shrink-0"></span>
<div>
<div class="font-label-md font-bold text-on-surface">High Priority</div>
<div class="text-[11px] text-on-surface-variant">Prompt scheduling required (&lt; 12 hrs). HVAC degradation or safety hardware fault.</div>
</div>
</div>
<div class="flex items-start gap-2.5 p-2 rounded-lg bg-surface-container-low">
<span class="w-2.5 h-2.5 rounded-full bg-secondary mt-1.5 flex-shrink-0"></span>
<div>
<div class="font-label-md font-bold text-on-surface">Medium Priority</div>
<div class="text-[11px] text-on-surface-variant">Standard operational repair (&lt; 48 hrs). Fixtures, lighting, minor plumbing.</div>
</div>
</div>
<div class="flex items-start gap-2.5 p-2 rounded-lg bg-surface-container-low">
<span class="w-2.5 h-2.5 rounded-full bg-outline mt-1.5 flex-shrink-0"></span>
<div>
<div class="font-label-md font-bold text-on-surface">Low Priority</div>
<div class="text-[11px] text-on-surface-variant">Routine upkeep and cosmetic works scheduled in weekly batches.</div>
</div>
</div>
</div>
</div>
<div class="mt-4 pt-3 border-t border-surface-container-high flex items-center justify-between text-[11px] text-outline">
<span>SLA Tracking: Active</span>
<span>Escalation: Level 2 On-Call</span>
</div>
</div>
<!-- 8 Categories Grid (8 cols) -->
<div class="lg:col-span-8 rounded-xl bg-surface-container-lowest p-space-md shadow-sm">
<div class="flex items-center justify-between mb-space-sm">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[20px]">category</span>
<h2 class="font-headline-sm text-headline-sm text-on-surface font-bold">Standard Maintenance Categories</h2>
</div>
<span class="font-label-sm text-primary font-semibold">8 Active Disciplines</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md">
        All physical inventory and work tickets are assigned to verified trade categories for precise dispatch and cost accounting:
      </p>
<div class="grid grid-cols-2 sm:grid-cols-4 gap-space-sm">
<!-- 1. Plumbing -->
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col items-center text-center hover:bg-surface-container transition-colors">
<div class="w-9 h-9 rounded-lg bg-primary-fixed/60 text-primary flex items-center justify-center mb-1.5">
<span class="material-symbols-outlined text-[20px]">water_drop</span>
</div>
<span class="font-label-md font-bold text-on-surface">Plumbing</span>
<span class="text-[11px] text-on-surface-variant">Pipes, valves, drainage</span>
</div>
<!-- 2. Electrical -->
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col items-center text-center hover:bg-surface-container transition-colors">
<div class="w-9 h-9 rounded-lg bg-tertiary-fixed text-on-tertiary-fixed-variant flex items-center justify-center mb-1.5">
<span class="material-symbols-outlined text-[20px]">bolt</span>
</div>
<span class="font-label-md font-bold text-on-surface">Electrical</span>
<span class="text-[11px] text-on-surface-variant">Circuits, breakers, DB</span>
</div>
<!-- 3. HVAC -->
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col items-center text-center hover:bg-surface-container transition-colors">
<div class="w-9 h-9 rounded-lg bg-surface-container-high text-primary flex items-center justify-center mb-1.5">
<span class="material-symbols-outlined text-[20px]">ac_unit</span>
</div>
<span class="font-label-md font-bold text-on-surface">HVAC</span>
<span class="text-[11px] text-on-surface-variant">Chillers, ducted splits</span>
</div>
<!-- 4. Appliances -->
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col items-center text-center hover:bg-surface-container transition-colors">
<div class="w-9 h-9 rounded-lg bg-surface-container-high text-secondary flex items-center justify-center mb-1.5">
<span class="material-symbols-outlined text-[20px]">kitchen</span>
</div>
<span class="font-label-md font-bold text-on-surface">Appliances</span>
<span class="text-[11px] text-on-surface-variant">Refrigerators, ovens</span>
</div>
<!-- 5. Structural -->
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col items-center text-center hover:bg-surface-container transition-colors">
<div class="w-9 h-9 rounded-lg bg-surface-container-high text-on-surface flex items-center justify-center mb-1.5">
<span class="material-symbols-outlined text-[20px]">door_front</span>
</div>
<span class="font-label-md font-bold text-on-surface">Structural</span>
<span class="text-[11px] text-on-surface-variant">Doors, locks, masonry</span>
</div>
<!-- 6. Cleaning -->
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col items-center text-center hover:bg-surface-container transition-colors">
<div class="w-9 h-9 rounded-lg bg-surface-container-high text-secondary flex items-center justify-center mb-1.5">
<span class="material-symbols-outlined text-[20px]">cleaning_services</span>
</div>
<span class="font-label-md font-bold text-on-surface">Cleaning</span>
<span class="text-[11px] text-on-surface-variant">Deep sanitization, facade</span>
</div>
<!-- 7. Preventive Maintenance -->
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col items-center text-center hover:bg-surface-container transition-colors">
<div class="w-9 h-9 rounded-lg bg-primary-fixed/60 text-primary flex items-center justify-center mb-1.5">
<span class="material-symbols-outlined text-[20px]">event_repeat</span>
</div>
<span class="font-label-md font-bold text-on-surface">Preventive</span>
<span class="text-[11px] text-on-surface-variant">Quarterly MEP audits</span>
</div>
<!-- 8. Other -->
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col items-center text-center hover:bg-surface-container transition-colors">
<div class="w-9 h-9 rounded-lg bg-surface-container-high text-outline flex items-center justify-center mb-1.5">
<span class="material-symbols-outlined text-[20px]">more_horiz</span>
</div>
<span class="font-label-md font-bold text-on-surface">Other</span>
<span class="text-[11px] text-on-surface-variant">Specialist artisan works</span>
</div>
</div>
</div>
</div>
<!-- SELECTED WORK ORDER PREVIEW & BOOKING RESTRICTION MANAGEMENT (TWO-COLUMN DEEP OPERATIONAL LAYOUT) -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-md">
<!-- LEFT COLUMN (6 cols) -->
<div class="lg:col-span-6 flex flex-col gap-space-md">
<!-- Selected Work Order Dossier -->
<div class="rounded-xl bg-surface-container-lowest p-space-md shadow-sm">
<div class="flex items-center justify-between pb-space-sm border-b border-surface-container-high">
<div class="flex items-center gap-space-sm">
<div class="w-3 h-3 rounded-full bg-error animate-ping"></div>
<div>
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">MNT-2026-002</span>
<span class="text-on-surface-variant text-body-sm block">Palm Grove Chalets (Unit PG-03)</span>
</div>
</div>
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-error-container text-on-error-container">Urgent Priority</span>
</div>
<!-- Badge Row -->
<div class="flex items-center gap-2 my-space-md flex-wrap">
<span class="px-2 py-0.5 rounded-md bg-surface-container-high text-on-surface text-xs font-semibold">Status: Open</span>
<span class="px-2 py-0.5 rounded-md bg-primary-fixed text-primary text-xs font-bold flex items-center gap-1">
<span class="material-symbols-outlined text-[13px]">lock</span> Booking Restriction: Active
          </span>
<span class="px-2 py-0.5 rounded-md bg-surface-container-low text-on-surface-variant text-xs">Escalated: 08:30 AM AST</span>
</div>
<!-- Details Grid -->
<div class="grid grid-cols-2 gap-space-sm p-space-sm rounded-lg bg-surface-container-low mb-space-md text-xs">
<div>
<span class="text-outline uppercase text-[10px] font-semibold block">Category</span>
<span class="font-semibold text-on-surface">Plumbing</span>
</div>
<div>
<span class="text-outline uppercase text-[10px] font-semibold block">Reported Date</span>
<span class="text-outline italic">Date Not Specified</span>
</div>
<div class="col-span-2">
<span class="text-outline uppercase text-[10px] font-semibold block">Specific Issue</span>
<span class="text-on-surface font-medium">Water leakage behind kitchen supply line and isolation valve manifold.</span>
</div>
<div>
<span class="text-outline uppercase text-[10px] font-semibold block">Assigned Staff</span>
<span class="text-error font-medium italic">Unassigned (Awaiting dispatch)</span>
</div>
<div>
<span class="text-outline uppercase text-[10px] font-semibold block">Tenant Presence</span>
<span class="text-on-surface">Access Code Provided</span>
</div>
</div>
<!-- Internal Notes -->
<div class="mb-space-md">
<label class="text-[11px] font-semibold uppercase text-outline block mb-1">Supervisor Operational Notes</label>
<div class="p-space-sm rounded-lg bg-surface-container-high/40 text-on-surface text-xs leading-relaxed italic">
            "Water main shutoff engaged at 09:15 AM to prevent subfloor damage. Dedicated plumber required on-site to inspect high-pressure flex connectors before unit calendar reopening."
          </div>
</div>
<!-- Attachments Placeholders (2 photo placeholders) -->
<div class="mb-space-md">
<label class="text-[11px] font-semibold uppercase text-outline block mb-1">Field Inspection Photos (2 Stage Locked)</label>
<div class="grid grid-cols-2 gap-space-sm">
<div class="relative rounded-lg overflow-hidden h-28 bg-surface-container shadow-sm group">
<img class="w-full h-full object-cover" data-alt="Close up architectural detail of polished copper plumbing pipe connections and shutoff valves behind a residential kitchen utility cabinet in a luxury Middle Eastern villa with warm spotlighting." src="{{ asset('assets/aqar/images/f2650bfc7f3b0098d3ad.jpg') }}" alt="Close up architectural detail of polished copper plumbing pipe connections and shutoff valves behind a residential kitchen utility cabinet in a luxury Middle Eastern villa with warm spotlighting.">
<div class="absolute inset-0 bg-on-surface/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
<span class="text-[11px] text-surface-container-lowest font-medium flex items-center gap-1">
<span class="material-symbols-outlined text-[16px]">visibility</span> Inspect
                </span>
</div>
<span class="absolute bottom-1 right-1 bg-on-surface/75 text-surface-container-lowest text-[10px] px-1.5 py-0.5 rounded">Valve_Point_01.jpg</span>
</div>
<div class="relative rounded-lg overflow-hidden h-28 bg-surface-container shadow-sm group">
<img class="w-full h-full object-cover" data-alt="Subfloor moisture inspection camera view of a modern luxury apartment under-sink cabinet floor with dry absorbent barrier installed in Riyadh compound." src="{{ asset('assets/aqar/images/c0cb298e7d9f5e137c75.jpg') }}" alt="Subfloor moisture inspection camera view of a modern luxury apartment under-sink cabinet floor with dry absorbent barrier installed in Riyadh compound.">
<div class="absolute inset-0 bg-on-surface/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
<span class="text-[11px] text-surface-container-lowest font-medium flex items-center gap-1">
<span class="material-symbols-outlined text-[16px]">visibility</span> Inspect
                </span>
</div>
<span class="absolute bottom-1 right-1 bg-on-surface/75 text-surface-container-lowest text-[10px] px-1.5 py-0.5 rounded">Moisture_Floor_02.jpg</span>
</div>
</div>
</div>
<!-- Actions -->
<div class="flex flex-wrap items-center gap-2 pt-2 border-t border-surface-container-high">
<button class="px-space-md h-9 rounded-lg bg-primary-container text-on-primary font-label-md font-semibold hover:bg-primary transition-colors flex items-center gap-1 shadow-sm" type="button" data-demo="Assign Technician">
<span class="material-symbols-outlined text-[16px]">person_add</span> Assign Technician
          </button>
<button class="px-space-md h-9 rounded-lg bg-surface-container-low text-on-surface font-label-md font-medium hover:bg-surface-container-high transition-colors" type="button" data-demo="Update Status">
            Update Status
          </button>
<button class="px-space-md h-9 rounded-lg bg-surface-container-low text-primary font-label-md font-medium hover:bg-primary-fixed/40 transition-colors flex items-center gap-1" type="button" data-demo="Manage Restriction">
<span class="material-symbols-outlined text-[16px]">lock_open</span> Manage Restriction
          </button>
<button class="px-space-md h-9 rounded-lg text-outline hover:text-on-surface font-label-md font-medium transition-colors ml-auto" type="button" data-demo="View Full Work Order">
            View Full Work Order
          </button>
</div>
</div>
<!-- Maintenance & Booking Availability Panel -->
<div class="rounded-xl bg-surface-container-lowest p-space-md shadow-sm">
<div class="flex items-center justify-between mb-space-sm">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[20px]">event_busy</span>
<h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">Maintenance & Booking Availability Governance</h3>
</div>
<span class="px-2 py-0.5 rounded bg-primary-fixed text-primary text-xs font-bold">2 Restricted</span>
</div>
<div class="flex flex-col gap-space-sm mb-space-md">
<div class="p-space-sm rounded-lg bg-surface-container-low flex items-center justify-between">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-error text-[18px]">lock</span>
<div>
<span class="font-label-md font-bold text-on-surface">PG-03 (Palm Grove Chalets)</span>
<span class="text-[11px] text-on-surface-variant block">Water leakage behind kitchen supply line</span>
</div>
</div>
<span class="px-2 py-0.5 rounded text-[11px] font-bold bg-error-container text-on-error-container">Active Restriction</span>
</div>
<div class="p-space-sm rounded-lg bg-surface-container-low flex items-center justify-between">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-error text-[18px]">lock</span>
<div>
<span class="font-label-md font-bold text-on-surface">PG-04 (Palm Grove Chalets)</span>
<span class="text-[11px] text-on-surface-variant block">Entry master door lock cylinder replacement</span>
</div>
</div>
<span class="px-2 py-0.5 rounded text-[11px] font-bold bg-error-container text-on-error-container">Active Restriction</span>
</div>
</div>
<div class="p-space-sm rounded-lg bg-surface-container-high/50 text-xs text-on-surface-variant leading-relaxed mb-space-md">
<div class="font-semibold text-primary mb-0.5">Operational Governance Rule:</div>
          Maintenance work orders and booking restrictions are distinct records. A work order does not automatically block bookings; restrictions are manually flagged by property managers and must be verified before lifting. Clearing restrictions requires authorized sign-off.
        </div>
<button class="w-full h-10 rounded-lg bg-surface-container-low text-primary font-label-md font-bold hover:bg-primary-fixed/40 transition-colors flex items-center justify-center gap-2" type="button" data-demo="Review Restricted Units">
<span class="material-symbols-outlined text-[18px]">calendar_view_week</span>
          Review Restricted Units
        </button>
</div>
</div>
<!-- RIGHT COLUMN (6 cols) -->
<div class="lg:col-span-6 flex flex-col gap-space-md">
<!-- Maintenance Workflow Pipeline -->
<div class="rounded-xl bg-surface-container-lowest p-space-md shadow-sm">
<div class="flex items-center justify-between mb-space-md">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[20px]">account_tree</span>
<h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">Maintenance Workflow Pipeline</h3>
</div>
<span class="text-xs text-outline font-mono">STAGES 1–6</span>
</div>
<!-- Stepper / Pipeline -->
<div class="flex flex-col gap-space-sm relative">
<!-- Step 1 -->
<div class="flex items-start gap-space-sm">
<div class="w-7 h-7 rounded-full bg-surface-container-high text-primary flex items-center justify-center font-bold text-xs flex-shrink-0">
              1
            </div>
<div class="flex-1 pb-2 border-b border-surface-container-high">
<div class="flex items-center justify-between">
<span class="font-label-md font-bold text-on-surface">Request Submitted</span>
<span class="text-[11px] text-outline">Logged</span>
</div>
<p class="text-[12px] text-on-surface-variant mt-0.5">Tenant inquiry or on-site staff inspection logged into registry.</p>
</div>
</div>
<!-- Step 2 (Active for Selected PG-03) -->
<div class="flex items-start gap-space-sm">
<div class="w-7 h-7 rounded-full bg-primary-container text-on-primary flex items-center justify-center font-bold text-xs flex-shrink-0 shadow-sm">
              2
            </div>
<div class="flex-1 pb-2 border-b border-surface-container-high">
<div class="flex items-center justify-between">
<span class="font-label-md font-bold text-primary">Manager Review & Triage</span>
<span class="px-1.5 py-0.2 rounded text-[10px] font-bold bg-error-container text-on-error-container">Current Phase</span>
</div>
<p class="text-[12px] text-on-surface-variant mt-0.5">Priority evaluation, emergency water/electric isolation, and booking restriction check.</p>
</div>
</div>
<!-- Step 3 -->
<div class="flex items-start gap-space-sm">
<div class="w-7 h-7 rounded-full bg-surface-container text-outline flex items-center justify-center font-bold text-xs flex-shrink-0">
              3
            </div>
<div class="flex-1 pb-2 border-b border-surface-container-high">
<div class="flex items-center justify-between">
<span class="font-label-md font-medium text-on-surface">Assigned</span>
<span class="text-[11px] text-outline">Pending</span>
</div>
<p class="text-[12px] text-on-surface-variant mt-0.5">Allocation to internal maintenance technician or approved external contractor pool.</p>
</div>
</div>
<!-- Step 4 -->
<div class="flex items-start gap-space-sm">
<div class="w-7 h-7 rounded-full bg-surface-container text-outline flex items-center justify-center font-bold text-xs flex-shrink-0">
              4
            </div>
<div class="flex-1 pb-2 border-b border-surface-container-high">
<div class="flex items-center justify-between">
<span class="font-label-md font-medium text-on-surface">In Progress</span>
<span class="text-[11px] text-outline">Pending</span>
</div>
<p class="text-[12px] text-on-surface-variant mt-0.5">On-site diagnostic, parts procurement, and physical execution of repairs.</p>
</div>
</div>
<!-- Step 5 -->
<div class="flex items-start gap-space-sm">
<div class="w-7 h-7 rounded-full bg-surface-container text-outline flex items-center justify-center font-bold text-xs flex-shrink-0">
              5
            </div>
<div class="flex-1 pb-2 border-b border-surface-container-high">
<div class="flex items-center justify-between">
<span class="font-label-md font-medium text-on-surface">Work Completed</span>
<span class="text-[11px] text-outline">Pending</span>
</div>
<p class="text-[12px] text-on-surface-variant mt-0.5">Technician completion certification and photo proof upload.</p>
</div>
</div>
<!-- Step 6 -->
<div class="flex items-start gap-space-sm">
<div class="w-7 h-7 rounded-full bg-surface-container text-outline flex items-center justify-center font-bold text-xs flex-shrink-0">
              6
            </div>
<div class="flex-1">
<div class="flex items-center justify-between">
<span class="font-label-md font-medium text-on-surface">Manager Sign-off & Restriction Release</span>
<span class="text-[11px] text-outline">Final Stage</span>
</div>
<p class="text-[12px] text-on-surface-variant mt-0.5">Post-repair inspection, release of booking hold, and formal closing of work ticket.</p>
</div>
</div>
</div>
<div class="mt-4 p-space-sm rounded-lg bg-surface-container-low text-[11px] text-on-surface-variant flex items-center gap-2">
<span class="material-symbols-outlined text-[16px] text-secondary">info</span>
<span>Branches: On Hold | Cancelled | Reopened. Work completion does not automatically remove booking restrictions without manager inspection.</span>
</div>
</div>
<!-- Maintenance Cost Tracking & Vendor Dispatch -->
<div class="rounded-xl bg-surface-container-lowest p-space-md shadow-sm">
<div class="flex items-center justify-between mb-space-sm">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[20px]">receipt_long</span>
<h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">Cost Tracking & Vendor Dispatch</h3>
</div>
<span class="text-xs text-on-surface-variant font-mono">SAR / AED / USD</span>
</div>
<div class="grid grid-cols-3 gap-space-sm mb-space-md">
<div class="p-space-sm rounded-lg bg-surface-container-low">
<span class="text-[10px] uppercase font-semibold text-outline block">Estimated Costs</span>
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">Not Calculated</span>
<span class="text-[10px] text-outline block mt-0.5">Multi-currency SAR</span>
</div>
<div class="p-space-sm rounded-lg bg-surface-container-low">
<span class="text-[10px] uppercase font-semibold text-outline block">Actual Costs</span>
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">Not Recorded</span>
<span class="text-[10px] text-outline block mt-0.5">Pending billing</span>
</div>
<div class="p-space-sm rounded-lg bg-surface-container-low">
<span class="text-[10px] uppercase font-semibold text-outline block">Invoices</span>
<span class="font-headline-sm text-headline-sm font-bold text-outline">0 Uploaded</span>
<span class="text-[10px] text-outline block mt-0.5">Pending physical receipts</span>
</div>
</div>
<!-- Assignments & Service Providers -->
<div class="flex flex-col gap-space-sm mb-space-md">
<div class="flex items-center justify-between p-2 rounded-lg bg-surface-container-low text-xs">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[16px] text-primary">groups</span>
<span class="font-semibold text-on-surface">Internal Operations Pool:</span>
<span class="text-on-surface-variant">Assigned Technician</span>
</div>
<span class="text-primary font-semibold">Active Ready</span>
</div>
<div class="flex items-center justify-between p-2 rounded-lg bg-surface-container-low text-xs">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[16px] text-tertiary">pending_actions</span>
<span class="font-semibold text-on-surface">Unassigned Queue:</span>
<span class="text-on-surface-variant">2 Tickets awaiting triage</span>
</div>
<span class="text-error font-semibold">Needs Assignment</span>
</div>
<div class="flex items-center justify-between p-2 rounded-lg bg-surface-container-low text-xs">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[16px] text-secondary">handyman</span>
<span class="font-semibold text-on-surface">External MEP Contractors:</span>
<span class="text-on-surface-variant">Third-party specialized vendors</span>
</div>
<span class="text-outline font-semibold">On Demand</span>
</div>
</div>
<!-- Privacy & RBAC Level 3 Shield -->
<div class="p-space-sm rounded-lg bg-surface-container-low flex items-start gap-space-sm border-l-2 border-primary">
<span class="material-symbols-outlined text-primary text-[20px] flex-shrink-0 mt-0.5">shield</span>
<div class="flex flex-col">
<span class="font-label-sm font-bold text-on-surface">Enterprise Data Shield (RBAC Level 3 Active)</span>
<p class="text-[11px] text-on-surface-variant leading-relaxed mt-0.5">
              Tenant details, private room photos, and internal vendor invoices protected under RBAC Level 3. No public exposure across client booking channels.
            </p>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
