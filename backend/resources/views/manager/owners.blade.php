{{-- Imported from client_demo/screens/owners/code.html; static demonstration data. --}}
@extends('layouts.manager')
@section('content')
<div class="flex flex-col w-full gap-space-lg">
<!-- PAGE HEADER & BREADCRUMB -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-space-md">
<div class="flex flex-col gap-1">
<nav class="flex items-center gap-2 font-label-md text-label-md text-on-surface-variant">
<a class="hover:text-primary transition-colors" href="{{ route('manager.dashboard') }}">Dashboard</a>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="text-on-surface font-semibold">Owners</span>
</nav>
<div class="flex items-baseline gap-3">
<h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Owners Management</h1>
<span class="font-label-sm text-label-sm px-2.5 py-0.5 rounded-full bg-surface-container-high text-on-surface-variant tracking-wider uppercase">Institutional Core</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant max-w-3xl">
        Manage recorded property title holders, proportionate equity allocations, governance mandates, portfolio assignments, and legal agreements.
      </p>
</div>
<!-- Header Actions -->
<div class="flex items-center gap-space-sm flex-shrink-0">
<button class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-lg bg-surface-container-lowest text-on-surface font-label-lg text-label-lg shadow-sm hover:bg-surface-container-high transition-all" type="button" data-demo="Export Owners">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">download</span>
<span>Export Owners</span>
</button>
<button class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-lg bg-primary-container text-on-primary font-label-lg text-label-lg shadow-sm hover:bg-primary transition-all active:scale-[0.98]" type="button" data-demo="Add New Owner">
<span class="material-symbols-outlined text-[18px]">add</span>
<span>Add New Owner</span>
</button>
</div>
</div>
<!-- SCOPE & FIDUCIARY NOTICE BANNER -->
<div class="rounded-xl bg-surface-container-low p-space-md flex items-start gap-space-md shadow-sm">
<div class="w-9 h-9 rounded-lg bg-primary-container/10 flex items-center justify-center text-primary flex-shrink-0">
<span class="material-symbols-outlined text-[20px]">account_balance</span>
</div>
<div class="flex flex-col md:flex-row md:items-center justify-between w-full gap-2">
<div>
<p class="font-label-lg text-label-lg text-on-surface font-semibold">Centralized Asset Ownership Directory</p>
<p class="font-body-sm text-body-sm text-on-surface-variant">
          Managing verified legal title equity across regional and cross-border portfolios. Equity figures reflect verified statutory registries and recorded title deeds.
        </p>
</div>
<div class="flex items-center gap-2 text-on-surface-variant flex-shrink-0 font-mono font-label-sm text-label-sm bg-surface-container px-3 py-1 rounded-md">
<span class="w-2 h-2 rounded-full bg-emerald-600"></span>
<span>REGISTRY SYNC: 100% BALANCED</span>
</div>
</div>
</div>
<!-- PORTFOLIO KPI SUMMARY CARDS -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-space-md">
<!-- Card 1 -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg flex flex-col justify-between shadow-sm relative overflow-hidden group hover:shadow-md transition-shadow">
<div class="flex items-start justify-between">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">Total Owners</span>
<h3 class="font-headline-xl text-headline-xl text-on-surface mt-1 font-semibold tracking-tight">5</h3>
</div>
<div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[22px]">groups</span>
</div>
</div>
<div class="flex items-center justify-between pt-4 mt-2">
<span class="font-body-sm text-body-sm text-on-surface-variant">Across Managed Portfolio</span>
<span class="font-label-sm text-label-sm px-2 py-0.5 rounded-full bg-surface-container text-on-surface font-mono">100% AUDITED</span>
</div>
</div>
<!-- Card 2 -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg flex flex-col justify-between shadow-sm relative overflow-hidden group hover:shadow-md transition-shadow">
<div class="flex items-start justify-between">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">Individual Owners</span>
<h3 class="font-headline-xl text-headline-xl text-on-surface mt-1 font-semibold tracking-tight">3</h3>
</div>
<div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center text-secondary">
<span class="material-symbols-outlined text-[22px]">person</span>
</div>
</div>
<div class="flex items-center justify-between pt-4 mt-2">
<span class="font-body-sm text-body-sm text-on-surface-variant">Private natural persons</span>
<span class="font-label-sm text-label-sm text-secondary font-medium">60% of total</span>
</div>
</div>
<!-- Card 3 -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg flex flex-col justify-between shadow-sm relative overflow-hidden group hover:shadow-md transition-shadow">
<div class="flex items-start justify-between">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">Corporate Owners</span>
<h3 class="font-headline-xl text-headline-xl text-on-surface mt-1 font-semibold tracking-tight">2</h3>
</div>
<div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center text-primary-container">
<span class="material-symbols-outlined text-[22px]">corporate_fare</span>
</div>
</div>
<div class="flex items-center justify-between pt-4 mt-2">
<span class="font-body-sm text-body-sm text-on-surface-variant">Holdings & Legal Entities</span>
<span class="font-label-sm text-label-sm text-primary font-medium">40% of total</span>
</div>
</div>
<!-- Card 4 -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg flex flex-col justify-between shadow-sm relative overflow-hidden group hover:shadow-md transition-shadow">
<div class="flex items-start justify-between">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">Properties Covered</span>
<h3 class="font-headline-xl text-headline-xl text-on-surface mt-1 font-semibold tracking-tight">3</h3>
</div>
<div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center text-tertiary">
<span class="material-symbols-outlined text-[22px]">domain_verification</span>
</div>
</div>
<div class="flex items-center justify-between pt-4 mt-2">
<span class="font-body-sm text-body-sm text-on-surface-variant">100% Portfolio Equity Mapped</span>
<span class="font-label-sm text-label-sm text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full font-medium">No Gaps</span>
</div>
</div>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant italic -mt-2">
    * Illustrative portfolio ownership records. Properties may encompass single sole-owners or syndicated co-ownership arrangements.
  </p>
<!-- SEARCH & ADVANCED FILTER TOOLBAR -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col gap-space-md">
<div class="flex flex-col lg:flex-row gap-space-sm items-stretch lg:items-center">
<!-- Search Input -->
<div class="relative flex-1">
<span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]">search</span>
<input class="w-full h-11 pl-10 pr-4 bg-surface-container-low rounded-lg font-body-md text-body-md text-on-surface placeholder:text-on-surface-variant/70 focus:outline-none focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary-container/20 transition-all" placeholder="Search owner name, company, property, or owner ID..." type="search">
</div>
<!-- Quick Action Controls -->
<div class="flex items-center gap-space-sm flex-wrap lg:flex-nowrap">
<button class="h-11 px-4 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface font-label-md text-label-md flex items-center gap-2 transition-colors" type="button" data-demo="More Filters">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">filter_list</span>
<span>More Filters</span>
</button>
<button class="h-11 px-3.5 rounded-lg bg-transparent hover:bg-surface-container-low text-on-surface-variant font-label-md text-label-md flex items-center gap-1.5 transition-colors" type="button" data-demo="Clear Filters">
<span class="material-symbols-outlined text-[18px]">clear_all</span>
<span>Clear Filters</span>
</button>
</div>
</div>
<!-- Filter Dropdown Strips -->
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-space-sm pt-2">
<!-- Filter 1: Owner Type -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm text-on-surface-variant uppercase">Owner Type</label>
<div class="relative">
<select class="w-full h-9 pl-3 pr-8 bg-surface-container-low text-on-surface font-body-sm text-body-sm rounded-lg appearance-none focus:outline-none focus:ring-1 focus:ring-primary-container cursor-pointer">
<option>All Types</option>
<option>Individual</option>
<option>Corporate</option>
</select>
<span class="material-symbols-outlined absolute right-2.5 top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none text-[16px]">arrow_drop_down</span>
</div>
</div>
<!-- Filter 2: Country -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm text-on-surface-variant uppercase">Country</label>
<div class="relative">
<select class="w-full h-9 pl-3 pr-8 bg-surface-container-low text-on-surface font-body-sm text-body-sm rounded-lg appearance-none focus:outline-none focus:ring-1 focus:ring-primary-container cursor-pointer">
<option>All Jurisdictions</option>
<option>Saudi Arabia</option>
<option>United Arab Emirates</option>
<option>Bahrain</option>
</select>
<span class="material-symbols-outlined absolute right-2.5 top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none text-[16px]">arrow_drop_down</span>
</div>
</div>
<!-- Filter 3: Assigned Property -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm text-on-surface-variant uppercase">Assigned Property</label>
<div class="relative">
<select class="w-full h-9 pl-3 pr-8 bg-surface-container-low text-on-surface font-body-sm text-body-sm rounded-lg appearance-none focus:outline-none focus:ring-1 focus:ring-primary-container cursor-pointer">
<option>All Properties</option>
<option>Al-Yasmin Compound II</option>
<option>Palm Grove Chalets</option>
<option>Marina View Residences</option>
</select>
<span class="material-symbols-outlined absolute right-2.5 top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none text-[16px]">arrow_drop_down</span>
</div>
</div>
<!-- Filter 4: Ownership Status -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm text-on-surface-variant uppercase">Ownership Status</label>
<div class="relative">
<select class="w-full h-9 pl-3 pr-8 bg-surface-container-low text-on-surface font-body-sm text-body-sm rounded-lg appearance-none focus:outline-none focus:ring-1 focus:ring-primary-container cursor-pointer">
<option>All Statuses</option>
<option>Active (Verified)</option>
<option>Pending Verification</option>
</select>
<span class="material-symbols-outlined absolute right-2.5 top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none text-[16px]">arrow_drop_down</span>
</div>
</div>
<!-- Filter 5: Assigned Manager -->
<div class="flex flex-col gap-1 col-span-2 md:col-span-1">
<label class="font-label-sm text-label-sm text-on-surface-variant uppercase">Assigned Manager</label>
<div class="relative">
<select class="w-full h-9 pl-3 pr-8 bg-surface-container-low text-on-surface font-body-sm text-body-sm rounded-lg appearance-none focus:outline-none focus:ring-1 focus:ring-primary-container cursor-pointer">
<option>All Managers</option>
<option>Eng. Sultan Al-Shammari</option>
<option>Assigned Manager</option>
</select>
<span class="material-symbols-outlined absolute right-2.5 top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none text-[16px]">arrow_drop_down</span>
</div>
</div>
</div>
<!-- Active Indicator Bar -->
<div class="flex items-center justify-between text-on-surface-variant pt-1">
<span class="font-label-md text-label-md text-on-surface font-medium">Showing 5 of 5 Owner Records</span>
<div class="flex items-center gap-2">
<span class="font-body-sm text-body-sm">Sort by:</span>
<button class="font-label-md text-label-md text-primary font-semibold flex items-center gap-0.5" type="button" data-demo="Owner ID">
<span>Owner ID</span>
<span class="material-symbols-outlined text-[16px]">north</span>
</button>
</div>
</div>
</div>
<!-- MAIN OWNERS DIRECTORY TABLE -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden flex flex-col">
<div class="overflow-x-auto w-full">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low text-on-surface-variant font-label-md text-label-md">
<th class="py-3.5 px-4 w-10">
<input class="rounded text-primary-container focus:ring-primary-container" type="checkbox">
</th>
<th class="py-3.5 px-4 font-semibold uppercase tracking-wider text-label-sm">Owner ID</th>
<th class="py-3.5 px-4 font-semibold uppercase tracking-wider text-label-sm">Owner / Entity</th>
<th class="py-3.5 px-4 font-semibold uppercase tracking-wider text-label-sm">Type</th>
<th class="py-3.5 px-4 font-semibold uppercase tracking-wider text-label-sm">Domicile</th>
<th class="py-3.5 px-4 font-semibold uppercase tracking-wider text-label-sm">Linked Property</th>
<th class="py-3.5 px-4 font-semibold uppercase tracking-wider text-label-sm">Equity Share</th>
<th class="py-3.5 px-4 font-semibold uppercase tracking-wider text-label-sm">Assigned Manager</th>
<th class="py-3.5 px-4 font-semibold uppercase tracking-wider text-label-sm">Status</th>
<th class="py-3.5 px-4 text-right font-semibold uppercase tracking-wider text-label-sm">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container">
<!-- ROW 1 (Highlighted / Primary Record) -->
<tr class="hover:bg-surface-container-low/70 transition-colors group bg-primary-fixed/10">
<td class="py-4 px-4">
<input checked="" class="rounded text-primary-container focus:ring-primary-container" type="checkbox">
</td>
<td class="py-4 px-4 font-mono font-label-md text-label-md text-primary font-semibold">
              OWN-001
            </td>
<td class="py-4 px-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-lg bg-primary-container text-on-primary flex items-center justify-center font-bold text-xs flex-shrink-0">
                  MR
                </div>
<div class="flex flex-col min-w-0">
<span class="font-label-lg text-label-lg font-semibold text-on-surface truncate">Muqrin Real Estate Holdings Ltd.</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">CR: 1010892241 • Riyadh HQ</span>
</div>
</div>
</td>
<td class="py-4 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-semibold uppercase tracking-wider">
<span class="material-symbols-outlined text-[13px]">apartment</span>
                Corporate
              </span>
</td>
<td class="py-4 px-4 font-body-md text-body-md text-on-surface">
              Saudi Arabia
            </td>
<td class="py-4 px-4">
<span class="font-label-md text-label-md text-on-surface font-medium block">Al-Yasmin Compound II</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">PRP-RYD-2026-0089</span>
</td>
<td class="py-4 px-4">
<span class="font-mono font-headline-sm text-headline-sm text-primary font-bold">100.0%</span>
</td>
<td class="py-4 px-4">
<div class="flex items-center gap-2">
<div class="w-6 h-6 rounded-full bg-surface-container-high flex items-center justify-center text-[10px] font-bold text-on-surface">
                  SA
                </div>
<span class="font-label-md text-label-md text-on-surface">Eng. Sultan Al-Shammari</span>
</div>
</td>
<td class="py-4 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-800 font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>
                Active
              </span>
</td>
<td class="py-4 px-4 text-right">
<div class="inline-flex items-center gap-1">
<button class="p-1.5 rounded-md hover:bg-surface-container text-on-surface-variant hover:text-primary transition-colors" title="Quick Dossier" type="button" data-demo="Quick Dossier" aria-label="Quick Dossier">
<span class="material-symbols-outlined text-[18px]">visibility</span>
</button>
<button class="p-1.5 rounded-md hover:bg-surface-container text-on-surface-variant hover:text-on-surface transition-colors" title="More Options" type="button" data-demo="More Options" aria-label="More Options">
<span class="material-symbols-outlined text-[18px]">more_vert</span>
</button>
</div>
</td>
</tr>
<!-- ROW 2 -->
<tr class="hover:bg-surface-container-low/70 transition-colors group">
<td class="py-4 px-4">
<input class="rounded text-primary-container focus:ring-primary-container" type="checkbox">
</td>
<td class="py-4 px-4 font-mono font-label-md text-label-md text-on-surface-variant font-medium">
              OWN-002
            </td>
<td class="py-4 px-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-lg bg-surface-container text-on-surface-variant flex items-center justify-center font-bold text-xs flex-shrink-0">
                  SM
                </div>
<div class="flex flex-col min-w-0">
<span class="font-label-lg text-label-lg font-semibold text-on-surface truncate">Sarah Al-Mansouri</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Private Equity Partner</span>
</div>
</div>
</td>
<td class="py-4 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-surface-container text-on-surface font-label-sm text-label-sm font-semibold uppercase tracking-wider">
<span class="material-symbols-outlined text-[13px]">person</span>
                Individual
              </span>
</td>
<td class="py-4 px-4 font-body-md text-body-md text-on-surface">
              United Arab Emirates
            </td>
<td class="py-4 px-4">
<span class="font-label-md text-label-md text-on-surface font-medium block">Palm Grove Chalets</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">PRP-RAK-2026-0042</span>
</td>
<td class="py-4 px-4">
<span class="font-mono font-headline-sm text-headline-sm text-on-surface font-bold">60.0%</span>
</td>
<td class="py-4 px-4">
<span class="font-label-md text-label-md text-on-surface-variant italic">Assigned Manager</span>
</td>
<td class="py-4 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-800 font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>
                Active
              </span>
</td>
<td class="py-4 px-4 text-right">
<div class="inline-flex items-center gap-1">
<button class="p-1.5 rounded-md hover:bg-surface-container text-on-surface-variant hover:text-primary transition-colors" title="Quick Dossier" type="button" data-demo="Quick Dossier" aria-label="Quick Dossier">
<span class="material-symbols-outlined text-[18px]">visibility</span>
</button>
<button class="p-1.5 rounded-md hover:bg-surface-container text-on-surface-variant hover:text-on-surface transition-colors" title="More Options" type="button" data-demo="More Options" aria-label="More Options">
<span class="material-symbols-outlined text-[18px]">more_vert</span>
</button>
</div>
</td>
</tr>
<!-- ROW 3 -->
<tr class="hover:bg-surface-container-low/70 transition-colors group">
<td class="py-4 px-4">
<input class="rounded text-primary-container focus:ring-primary-container" type="checkbox">
</td>
<td class="py-4 px-4 font-mono font-label-md text-label-md text-on-surface-variant font-medium">
              OWN-003
            </td>
<td class="py-4 px-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-lg bg-surface-container text-on-surface-variant flex items-center justify-center font-bold text-xs flex-shrink-0">
                  OM
                </div>
<div class="flex flex-col min-w-0">
<span class="font-label-lg text-label-lg font-semibold text-on-surface truncate">Omar Al-Mansouri</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Private Equity Partner</span>
</div>
</div>
</td>
<td class="py-4 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-surface-container text-on-surface font-label-sm text-label-sm font-semibold uppercase tracking-wider">
<span class="material-symbols-outlined text-[13px]">person</span>
                Individual
              </span>
</td>
<td class="py-4 px-4 font-body-md text-body-md text-on-surface">
              United Arab Emirates
            </td>
<td class="py-4 px-4">
<span class="font-label-md text-label-md text-on-surface font-medium block">Palm Grove Chalets</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">PRP-RAK-2026-0042</span>
</td>
<td class="py-4 px-4">
<span class="font-mono font-headline-sm text-headline-sm text-on-surface font-bold">40.0%</span>
</td>
<td class="py-4 px-4">
<span class="font-label-md text-label-md text-on-surface-variant italic">Assigned Manager</span>
</td>
<td class="py-4 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-800 font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>
                Active
              </span>
</td>
<td class="py-4 px-4 text-right">
<div class="inline-flex items-center gap-1">
<button class="p-1.5 rounded-md hover:bg-surface-container text-on-surface-variant hover:text-primary transition-colors" title="Quick Dossier" type="button" data-demo="Quick Dossier" aria-label="Quick Dossier">
<span class="material-symbols-outlined text-[18px]">visibility</span>
</button>
<button class="p-1.5 rounded-md hover:bg-surface-container text-on-surface-variant hover:text-on-surface transition-colors" title="More Options" type="button" data-demo="More Options" aria-label="More Options">
<span class="material-symbols-outlined text-[18px]">more_vert</span>
</button>
</div>
</td>
</tr>
<!-- ROW 4 -->
<tr class="hover:bg-surface-container-low/70 transition-colors group">
<td class="py-4 px-4">
<input class="rounded text-primary-container focus:ring-primary-container" type="checkbox">
</td>
<td class="py-4 px-4 font-mono font-label-md text-label-md text-on-surface-variant font-medium">
              OWN-004
            </td>
<td class="py-4 px-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-lg bg-primary-container/10 text-primary flex items-center justify-center font-bold text-xs flex-shrink-0">
                  MP
                </div>
<div class="flex flex-col min-w-0">
<span class="font-label-lg text-label-lg font-semibold text-on-surface truncate">Marina Property Investments Ltd.</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">DIFC SPV Registered</span>
</div>
</div>
</td>
<td class="py-4 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-semibold uppercase tracking-wider">
<span class="material-symbols-outlined text-[13px]">apartment</span>
                Corporate
              </span>
</td>
<td class="py-4 px-4 font-body-md text-body-md text-on-surface">
              United Arab Emirates
            </td>
<td class="py-4 px-4">
<span class="font-label-md text-label-md text-on-surface font-medium block">Marina View Residences</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">PRP-DXB-2026-0105</span>
</td>
<td class="py-4 px-4">
<span class="font-mono font-headline-sm text-headline-sm text-on-surface font-bold">70.0%</span>
</td>
<td class="py-4 px-4">
<span class="font-label-md text-label-md text-on-surface-variant italic">Assigned Manager</span>
</td>
<td class="py-4 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-800 font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>
                Active
              </span>
</td>
<td class="py-4 px-4 text-right">
<div class="inline-flex items-center gap-1">
<button class="p-1.5 rounded-md hover:bg-surface-container text-on-surface-variant hover:text-primary transition-colors" title="Quick Dossier" type="button" data-demo="Quick Dossier" aria-label="Quick Dossier">
<span class="material-symbols-outlined text-[18px]">visibility</span>
</button>
<button class="p-1.5 rounded-md hover:bg-surface-container text-on-surface-variant hover:text-on-surface transition-colors" title="More Options" type="button" data-demo="More Options" aria-label="More Options">
<span class="material-symbols-outlined text-[18px]">more_vert</span>
</button>
</div>
</td>
</tr>
<!-- ROW 5 -->
<tr class="hover:bg-surface-container-low/70 transition-colors group">
<td class="py-4 px-4">
<input class="rounded text-primary-container focus:ring-primary-container" type="checkbox">
</td>
<td class="py-4 px-4 font-mono font-label-md text-label-md text-on-surface-variant font-medium">
              OWN-005
            </td>
<td class="py-4 px-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-lg bg-surface-container text-on-surface-variant flex items-center justify-center font-bold text-xs flex-shrink-0">
                  NK
                </div>
<div class="flex flex-col min-w-0">
<span class="font-label-lg text-label-lg font-semibold text-on-surface truncate">Noura Al-Khalifa</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Private Investor</span>
</div>
</div>
</td>
<td class="py-4 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-surface-container text-on-surface font-label-sm text-label-sm font-semibold uppercase tracking-wider">
<span class="material-symbols-outlined text-[13px]">person</span>
                Individual
              </span>
</td>
<td class="py-4 px-4 font-body-md text-body-md text-on-surface">
              Bahrain
            </td>
<td class="py-4 px-4">
<span class="font-label-md text-label-md text-on-surface font-medium block">Marina View Residences</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">PRP-DXB-2026-0105</span>
</td>
<td class="py-4 px-4">
<span class="font-mono font-headline-sm text-headline-sm text-on-surface font-bold">30.0%</span>
</td>
<td class="py-4 px-4">
<span class="font-label-md text-label-md text-on-surface-variant italic">Assigned Manager</span>
</td>
<td class="py-4 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-800 font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>
                Active
              </span>
</td>
<td class="py-4 px-4 text-right">
<div class="inline-flex items-center gap-1">
<button class="p-1.5 rounded-md hover:bg-surface-container text-on-surface-variant hover:text-primary transition-colors" title="Quick Dossier" type="button" data-demo="Quick Dossier" aria-label="Quick Dossier">
<span class="material-symbols-outlined text-[18px]">visibility</span>
</button>
<button class="p-1.5 rounded-md hover:bg-surface-container text-on-surface-variant hover:text-on-surface transition-colors" title="More Options" type="button" data-demo="More Options" aria-label="More Options">
<span class="material-symbols-outlined text-[18px]">more_vert</span>
</button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Table Footer / Pagination Notice -->
<div class="px-space-md py-3 bg-surface-container-low flex items-center justify-between font-body-sm text-body-sm text-on-surface-variant">
<span>5 active records verified under institutional governance protocols</span>
<div class="flex items-center gap-2">
<span class="font-label-sm text-label-sm">Role-Protected Registry View</span>
</div>
</div>
</div>
<!-- OWNERSHIP DISTRIBUTION BY PROPERTY (PROPORTIONAL BARS) -->
<div class="flex flex-col gap-space-sm pt-2">
<div>
<h2 class="font-headline-md text-headline-md text-on-surface tracking-tight">Ownership Distribution by Property</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">
        Capital allocation and statutory equity share verification across active properties. Each property balance strictly aggregates to 100%.
      </p>
</div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-space-md mt-1">
<!-- Property Card 1 -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-start justify-between">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-primary font-semibold">Riyadh, Saudi Arabia</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface mt-0.5">Al-Yasmin Compound II</h3>
</div>
<span class="p-1.5 rounded-lg bg-primary-fixed/30 text-primary">
<span class="material-symbols-outlined text-[20px]">villa</span>
</span>
</div>
<!-- Progress Bar (100% Sole Owner) -->
<div class="w-full bg-surface-container rounded-full h-3 mt-4 overflow-hidden flex">
<div class="bg-primary-container h-full rounded-full transition-all" style="width: 100%"></div>
</div>
<div class="mt-4 flex flex-col gap-2">
<div class="flex items-center justify-between text-body-sm">
<div class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-primary-container flex-shrink-0"></span>
<span class="font-label-md text-label-md text-on-surface font-medium truncate max-w-[190px]">Muqrin Real Estate Holdings Ltd.</span>
</div>
<span class="font-mono font-label-md text-label-md text-on-surface font-semibold">100%</span>
</div>
</div>
</div>
<div class="mt-6 pt-3 border-t-0 bg-surface-container-low p-2.5 rounded-lg flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant">Ownership Architecture</span>
<span class="font-label-sm text-label-sm text-primary font-semibold flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">verified</span>
            Sole Ownership Validated
          </span>
</div>
</div>
<!-- Property Card 2 -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-start justify-between">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary font-semibold">Ras Al Khaimah, UAE</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface mt-0.5">Palm Grove Chalets</h3>
</div>
<span class="p-1.5 rounded-lg bg-surface-container text-on-surface">
<span class="material-symbols-outlined text-[20px]">holiday_village</span>
</span>
</div>
<!-- Progress Bar (60% / 40%) -->
<div class="w-full bg-surface-container rounded-full h-3 mt-4 overflow-hidden flex gap-0.5">
<div class="bg-primary-container h-full rounded-l-full transition-all" style="width: 60%"></div>
<div class="bg-tertiary-container h-full rounded-r-full transition-all" style="width: 40%"></div>
</div>
<div class="mt-4 flex flex-col gap-2">
<div class="flex items-center justify-between text-body-sm">
<div class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-primary-container flex-shrink-0"></span>
<span class="font-label-md text-label-md text-on-surface font-medium truncate max-w-[190px]">Sarah Al-Mansouri</span>
</div>
<span class="font-mono font-label-md text-label-md text-on-surface font-semibold">60%</span>
</div>
<div class="flex items-center justify-between text-body-sm">
<div class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-tertiary-container flex-shrink-0"></span>
<span class="font-label-md text-label-md text-on-surface font-medium truncate max-w-[190px]">Omar Al-Mansouri</span>
</div>
<span class="font-mono font-label-md text-label-md text-on-surface font-semibold">40%</span>
</div>
</div>
</div>
<div class="mt-6 pt-3 border-t-0 bg-surface-container-low p-2.5 rounded-lg flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant">Ownership Architecture</span>
<span class="font-label-sm text-label-sm text-emerald-800 font-semibold flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">balance</span>
            Co-Ownership Validated (100%)
          </span>
</div>
</div>
<!-- Property Card 3 -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-start justify-between">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary font-semibold">Dubai Marina, UAE</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface mt-0.5">Marina View Residences</h3>
</div>
<span class="p-1.5 rounded-lg bg-surface-container text-on-surface">
<span class="material-symbols-outlined text-[20px]">apartment</span>
</span>
</div>
<!-- Progress Bar (70% / 30%) -->
<div class="w-full bg-surface-container rounded-full h-3 mt-4 overflow-hidden flex gap-0.5">
<div class="bg-primary-container h-full rounded-l-full transition-all" style="width: 70%"></div>
<div class="bg-secondary h-full rounded-r-full transition-all" style="width: 30%"></div>
</div>
<div class="mt-4 flex flex-col gap-2">
<div class="flex items-center justify-between text-body-sm">
<div class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-primary-container flex-shrink-0"></span>
<span class="font-label-md text-label-md text-on-surface font-medium truncate max-w-[190px]">Marina Property Investments</span>
</div>
<span class="font-mono font-label-md text-label-md text-on-surface font-semibold">70%</span>
</div>
<div class="flex items-center justify-between text-body-sm">
<div class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-secondary flex-shrink-0"></span>
<span class="font-label-md text-label-md text-on-surface font-medium truncate max-w-[190px]">Noura Al-Khalifa</span>
</div>
<span class="font-mono font-label-md text-label-md text-on-surface font-semibold">30%</span>
</div>
</div>
</div>
<div class="mt-6 pt-3 border-t-0 bg-surface-container-low p-2.5 rounded-lg flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant">Ownership Architecture</span>
<span class="font-label-sm text-label-sm text-secondary font-semibold flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">handshake</span>
            Institutional & Private (100%)
          </span>
</div>
</div>
</div>
</div>
<!-- OWNERSHIP VS MANAGEMENT GOVERNANCE EXPLANATION & DOSSIER -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-md">
<!-- LEFT: Governance Explanation (7 Columns) -->
<div class="lg:col-span-7 bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col justify-between">
<div class="flex flex-col gap-space-sm">
<div class="flex items-center justify-between">
<div>
<h2 class="font-headline-md text-headline-md text-on-surface tracking-tight">Ownership & Management Governance</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Legal separation of title equity interest versus operational execution responsibility.</p>
</div>
<span class="material-symbols-outlined text-primary text-[28px]">gavel</span>
</div>
<!-- 4-Pillar Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-space-sm mt-2">
<div class="p-3.5 rounded-lg bg-surface-container-low">
<div class="flex items-center gap-2 text-primary font-label-md text-label-md font-semibold">
<span class="material-symbols-outlined text-[18px]">real_estate_agent</span>
<span>Property Owner</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
              The individual or verified legal entity holding statutory recorded equity interest in the official real estate title deed.
            </p>
</div>
<div class="p-3.5 rounded-lg bg-surface-container-low">
<div class="flex items-center gap-2 text-secondary font-label-md text-label-md font-semibold">
<span class="material-symbols-outlined text-[18px]">manage_accounts</span>
<span>Property Manager</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
              Authorized professional party responsible for day-to-day operational execution, maintenance, contracts, and leasing mandates.
            </p>
</div>
<div class="p-3.5 rounded-lg bg-surface-container-low">
<div class="flex items-center gap-2 text-primary font-label-md text-label-md font-semibold">
<span class="material-symbols-outlined text-[18px]">pie_chart</span>
<span>Ownership Share</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
              Statutory percentage equity of title ownership (0–100%). Establishes capital returns and governance voting weights.
            </p>
</div>
<div class="p-3.5 rounded-lg bg-surface-container-low">
<div class="flex items-center gap-2 text-secondary font-label-md text-label-md font-semibold">
<span class="material-symbols-outlined text-[18px]">receipt_long</span>
<span>Management Fee</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
              Pre-agreed contractual compensation for professional management services, negotiated strictly on operational terms.
            </p>
</div>
</div>
<!-- Dedicated Callout Box for Al-Yasmin Compound II -->
<div class="rounded-xl bg-primary-fixed/20 p-space-md flex flex-col gap-2 mt-2">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-primary font-bold">Active Mandate Case Study • Al-Yasmin Compound II</span>
<span class="font-mono font-label-sm text-label-sm text-primary">AGR-2026-YAS-003</span>
</div>
<div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-1">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant">Owner of Record</span>
<span class="font-label-md text-label-md text-on-surface font-semibold">Muqrin RE Holdings (100%)</span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant">Appointed Manager</span>
<span class="font-label-md text-label-md text-on-surface font-semibold">Eng. Sultan Al-Shammari</span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant">Management Mandate Fee</span>
<span class="font-label-md text-label-md text-primary font-semibold">8.5% of Collected Rent</span>
</div>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant pt-1">
<strong class="text-on-surface">Institutional Governance Principle:</strong> Management fees are governed by independent operational service level agreements and are strictly never commingled with or deducted from recorded equity title shares.
          </p>
</div>
</div>
</div>
<!-- RIGHT: Selected Owner Preview Dossier (5 Columns) -->
<div class="lg:col-span-5 bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col justify-between">
<div class="flex flex-col gap-space-md">
<div class="flex items-start justify-between">
<div class="flex items-center gap-3">
<div class="w-12 h-12 rounded-xl bg-primary-container text-on-primary flex items-center justify-center font-bold text-lg shadow-sm">
              MR
            </div>
<div>
<span class="font-mono font-label-sm text-label-sm text-primary font-bold">OWN-001 • SELECTED DOSSIER</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold leading-tight">Muqrin Real Estate Holdings Ltd.</h3>
</div>
</div>
</div>
<!-- Dossier Attributes List -->
<div class="divide-y divide-surface-container">
<div class="py-2.5 flex items-center justify-between text-body-sm">
<span class="text-on-surface-variant">Entity Classification</span>
<span class="font-label-md text-label-md text-on-surface font-semibold">Corporate Entity (CR Verified)</span>
</div>
<div class="py-2.5 flex items-center justify-between text-body-sm">
<span class="text-on-surface-variant">Jurisdiction / Domicile</span>
<span class="font-label-md text-label-md text-on-surface font-semibold">Saudi Arabia (Riyadh)</span>
</div>
<div class="py-2.5 flex items-center justify-between text-body-sm">
<span class="text-on-surface-variant">Assigned Property</span>
<span class="font-label-md text-label-md text-on-surface font-semibold">Al-Yasmin Compound II</span>
</div>
<div class="py-2.5 flex items-center justify-between text-body-sm">
<span class="text-on-surface-variant">Total Title Share</span>
<span class="font-mono font-label-md text-label-md text-primary font-bold">100.0% Validated</span>
</div>
<div class="py-2.5 flex items-center justify-between text-body-sm">
<span class="text-on-surface-variant">Property Manager</span>
<span class="font-label-md text-label-md text-on-surface font-semibold">Eng. Sultan Al-Shammari</span>
</div>
<div class="py-2.5 flex items-center justify-between text-body-sm">
<span class="text-on-surface-variant">Executed Agreement</span>
<span class="font-label-sm text-label-sm px-2 py-0.5 rounded bg-emerald-50 text-emerald-800 font-mono font-medium">AGR-2026-YAS-003</span>
</div>
<div class="py-2.5 flex items-center justify-between text-body-sm">
<span class="text-on-surface-variant">Contact Records</span>
<span class="font-label-sm text-label-sm px-2 py-0.5 rounded bg-surface-container text-on-surface-variant flex items-center gap-1">
<span class="material-symbols-outlined text-[13px]">lock</span>
              Protected under RBAC
            </span>
</div>
</div>
</div>
<!-- Action Cluster -->
<div class="grid grid-cols-2 gap-2 mt-4 pt-3">
<button class="py-2 px-3 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md text-center transition-colors" type="button" data-demo="View Profile">
          View Profile
        </button>
<button class="py-2 px-3 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md text-center transition-colors" type="button" data-demo="Linked Properties">
          Linked Properties
        </button>
<button class="py-2 px-3 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md text-center transition-colors" type="button" data-demo="View Agreements">
          View Agreements
        </button>
<button class="py-2 px-3 rounded-lg bg-primary-container text-on-primary font-label-md text-label-md text-center hover:bg-primary transition-colors" type="button" data-demo="Manage Access">
          Manage Access
        </button>
</div>
</div>
</div>
<!-- OWNERSHIP DOCUMENTS & REPOSITORY + OWNER COMMUNICATION -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-md">
<!-- Ownership Documents & Agreements Repository (7 Columns) -->
<div class="lg:col-span-7 bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col justify-between">
<div class="flex flex-col gap-space-sm">
<div class="flex items-center justify-between">
<div>
<h2 class="font-headline-md text-headline-md text-on-surface tracking-tight">Ownership Documents & Agreements</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Statutory registry documents and executed management covenants on file.</p>
</div>
<span class="material-symbols-outlined text-on-surface-variant text-[24px]">folder_special</span>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-space-sm mt-2">
<!-- Doc Item 1 -->
<div class="p-3.5 rounded-lg bg-surface-container-low flex items-start gap-3">
<span class="material-symbols-outlined text-primary text-[24px] mt-0.5">verified_user</span>
<div class="flex flex-col flex-1">
<span class="font-label-md text-label-md text-on-surface font-semibold">Title Deeds & Deeds of Trust</span>
<span class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">All 3 properties on file</span>
<div class="flex items-center gap-1.5 mt-2">
<span class="font-label-sm text-label-sm text-emerald-800 bg-emerald-50 px-2 py-0.5 rounded font-medium">On File</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Restricted Legal</span>
</div>
</div>
</div>
<!-- Doc Item 2 -->
<div class="p-3.5 rounded-lg bg-surface-container-low flex items-start gap-3">
<span class="material-symbols-outlined text-secondary text-[24px] mt-0.5">draw</span>
<div class="flex flex-col flex-1">
<span class="font-label-md text-label-md text-on-surface font-semibold">Management Agreements</span>
<span class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">AGR-2026-YAS-003 Executed</span>
<div class="flex items-center gap-1.5 mt-2">
<span class="font-label-sm text-label-sm text-emerald-800 bg-emerald-50 px-2 py-0.5 rounded font-medium">Active Mandate</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Executed Mar 1, 2026</span>
</div>
</div>
</div>
<!-- Doc Item 3 -->
<div class="p-3.5 rounded-lg bg-surface-container-low flex items-start gap-3">
<span class="material-symbols-outlined text-primary-container text-[24px] mt-0.5">business_center</span>
<div class="flex flex-col flex-1">
<span class="font-label-md text-label-md text-on-surface font-semibold">Commercial Registrations</span>
<span class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Corporate entity bylaws</span>
<div class="flex items-center gap-1.5 mt-2">
<span class="font-label-sm text-label-sm text-emerald-800 bg-emerald-50 px-2 py-0.5 rounded font-medium">Verified CR</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Muqrin & Marina</span>
</div>
</div>
</div>
<!-- Doc Item 4 -->
<div class="p-3.5 rounded-lg bg-surface-container-low flex items-start gap-3">
<span class="material-symbols-outlined text-tertiary text-[24px] mt-0.5">badge</span>
<div class="flex flex-col flex-1">
<span class="font-label-md text-label-md text-on-surface font-semibold">Power of Attorney / Delegation</span>
<span class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Authorized signer records</span>
<div class="flex items-center gap-1.5 mt-2">
<span class="font-label-sm text-label-sm text-amber-800 bg-amber-50 px-2 py-0.5 rounded font-medium">Review Required</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Annual audit cycle</span>
</div>
</div>
</div>
</div>
<div class="p-3 rounded-lg bg-surface-container-high/60 flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm mt-1">
<span class="material-symbols-outlined text-[18px] text-primary">security</span>
<span>Legal documents are shielded by access privileges and never displayed in public tenant catalogs.</span>
</div>
</div>
</div>
<!-- Owner Communication & Updates (5 Columns) -->
<div class="lg:col-span-5 bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col justify-between">
<div class="flex flex-col gap-space-sm">
<div class="flex items-center justify-between">
<div>
<h2 class="font-headline-md text-headline-md text-on-surface tracking-tight">Owner Communication</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Scheduled statements & operational dispatches.</p>
</div>
<span class="material-symbols-outlined text-on-surface-variant text-[24px]">forward_to_inbox</span>
</div>
<!-- Capability Matrix Badges -->
<div class="grid grid-cols-2 gap-2 mt-1">
<div class="p-2 rounded bg-surface-container-low font-label-sm text-label-sm text-on-surface flex items-center gap-1.5">
<span class="material-symbols-outlined text-[15px] text-primary">analytics</span>
<span>Monthly Statements</span>
</div>
<div class="p-2 rounded bg-surface-container-low font-label-sm text-label-sm text-on-surface flex items-center gap-1.5">
<span class="material-symbols-outlined text-[15px] text-primary">build</span>
<span>CAPEX &gt; 10k SAR</span>
</div>
<div class="p-2 rounded bg-surface-container-low font-label-sm text-label-sm text-on-surface flex items-center gap-1.5">
<span class="material-symbols-outlined text-[15px] text-primary">sync_alt</span>
<span>Operations Updates</span>
</div>
<div class="p-2 rounded bg-surface-container-low font-label-sm text-label-sm text-on-surface flex items-center gap-1.5">
<span class="material-symbols-outlined text-[15px] text-primary">event_busy</span>
<span>Document Renewal</span>
</div>
</div>
<!-- Empty State Preview -->
<div class="rounded-xl bg-surface-container-low p-6 flex flex-col items-center justify-center text-center mt-2">
<div class="w-12 h-12 rounded-full bg-surface-container-high flex items-center justify-center text-on-surface-variant mb-2">
<span class="material-symbols-outlined text-[24px]">mark_email_read</span>
</div>
<span class="font-label-md text-label-md text-on-surface font-semibold">All Communications Current</span>
<p class="font-body-sm text-body-sm text-on-surface-variant max-w-xs mt-1">
            No pending broadcast dispatches or outstanding CAPEX approvals required across recorded owners.
          </p>
</div>
</div>
<div class="pt-4 flex items-center justify-end">
<button class="inline-flex items-center gap-2 text-primary font-label-md text-label-md font-semibold hover:underline" type="button" data-demo="View Communication History">
<span>View Communication History</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</button>
</div>
</div>
</div>
<!-- PRIVACY, PERMISSIONS & ONBOARDING WORKFLOW BANNER -->
<div class="rounded-xl bg-surface-container-lowest p-space-lg shadow-sm flex flex-col md:flex-row items-start md:items-center justify-between gap-space-md">
<div class="flex items-start gap-space-md">
<div class="w-10 h-10 rounded-xl bg-primary-container text-on-primary flex items-center justify-center flex-shrink-0">
<span class="material-symbols-outlined text-[22px]">admin_panel_settings</span>
</div>
<div class="flex flex-col">
<h4 class="font-label-lg text-label-lg font-semibold text-on-surface">Data Privacy & Ownership Integrity Protocol</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant max-w-3xl mt-0.5">
          Owner identities and statutory equity ratios are governed under institutional compliance rules. Adding a new owner triggers an onboarding verification requiring proof of title and sum-of-equity checks (≤ 100% per property). Client portal credentials are not distributed until executive mandate validation.
        </p>
</div>
</div>
<div class="flex items-center gap-3 flex-shrink-0 w-full md:w-auto">
<button class="w-full md:w-auto px-4 py-2.5 rounded-lg bg-surface-container text-on-surface font-label-md text-label-md hover:bg-surface-container-high transition-colors text-center" type="button" data-demo="Governance Policy">
        Governance Policy
      </button>
<button class="w-full md:w-auto px-4 py-2.5 rounded-lg bg-primary text-on-primary font-label-md text-label-md hover:bg-primary-container transition-colors text-center shadow-sm" type="button" data-demo="Start Verification">
        Start Verification
      </button>
</div>
</div>
</div>
@endsection
