{{-- Imported from client_demo/screens/contracts_management/code.html; static demonstration data. --}}
@extends('layouts.manager')
@section('content')
<div class="flex flex-col w-full">
<!-- Interactive script for demo tabs & checkboxes -->

<!-- Top Hero & Breadcrumbs Section -->
<div class="px-space-xl pt-space-lg pb-space-md">
<!-- Breadcrumb & Top Indicator -->
<div class="flex items-center justify-between gap-space-md mb-space-sm">
<nav class="flex items-center gap-2 font-label-md text-label-md text-on-surface-variant">
<a class="hover:text-primary transition-colors flex items-center gap-1" href="{{ route('manager.dashboard') }}">
<span class="material-symbols-outlined text-[16px]">grid_view</span>
<span>Dashboard</span>
</a>
<span class="text-outline-variant">/</span>
<span class="text-on-surface font-headline-sm text-headline-sm">Contracts</span>
</nav>
<div class="flex items-center gap-2 px-space-sm py-1 bg-surface-container-high rounded-full">
<span class="w-2 h-2 rounded-full bg-emerald-600 animate-pulse"></span>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">Ejar / Wafi Synchronized Sandbox</span>
</div>
</div>
<!-- Main Header Bar -->
<div class="flex flex-col lg:flex-row lg:items-center justify-between gap-space-md mb-space-md">
<div class="flex flex-col gap-1">
<div class="flex items-center gap-space-sm">
<h1 class="font-headline-lg text-headline-lg text-on-surface font-headline-xl tracking-tight">Contracts Management</h1>
<span class="px-2.5 py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed font-label-sm text-label-sm tracking-wider uppercase">GCC Enterprise</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant max-w-3xl">
          Manage rental agreements, management contracts, contract documentation, renewals, and agreement lifecycles across the property portfolio.
        </p>
</div>
<!-- Header CTAs -->
<div class="flex items-center gap-space-sm self-start lg:self-center shrink-0">
<button class="h-10 px-space-md bg-surface-container-lowest text-on-surface font-label-lg text-label-lg rounded-lg shadow-sm hover:bg-surface-container-high hover:text-primary transition-all flex items-center gap-2" type="button" data-demo="Export Contracts">
<span class="material-symbols-outlined text-[18px]">file_download</span>
<span>Export Contracts</span>
</button>
<button class="h-10 px-space-lg bg-primary hover:bg-primary-container text-on-primary font-label-lg text-label-lg rounded-lg shadow-[0_2px_8px_rgba(108,12,32,0.25)] hover:shadow-lg transition-all flex items-center gap-2" type="button" data-demo="+ Create New Contract">
<span class="material-symbols-outlined text-[18px]">add_circle</span>
<span>+ Create New Contract</span>
</button>
</div>
</div>
<!-- Operational Note Banner -->
<div class="p-space-md rounded-xl bg-surface-container-low shadow-sm flex items-start gap-space-md mb-space-lg">
<div class="w-8 h-8 rounded-lg bg-primary-fixed text-on-primary-fixed flex items-center justify-center shrink-0 mt-0.5">
<span class="material-symbols-outlined text-[18px]">info</span>
</div>
<div class="flex flex-col flex-1">
<div class="flex items-center gap-2">
<span class="font-headline-sm text-headline-sm text-primary">Governance Portfolio Advisory</span>
<span class="text-label-sm font-label-sm px-1.5 py-0.5 rounded bg-surface-container-highest text-on-surface-variant">Read-only Notice</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
          Illustrative portfolio data. Active rental contracts correspond to active tenancies. Management agreements are tracked separately. <span class="font-headline-sm text-on-surface">Al-Yasmin Compound II</span> currently has 0 rental contracts, 0 active tenancies, and 0 occupied units.
        </p>
</div>
</div>
<!-- 1. CONTRACT SUMMARY CARDS (5 cards row: 10 + 2 + 1 + 1 = 14) -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-space-md mb-space-lg">
<!-- Total -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface-variant">Total Contract Records</span>
<div class="w-8 h-8 rounded-lg bg-surface-container-low text-primary flex items-center justify-center">
<span class="material-symbols-outlined text-[20px]">description</span>
</div>
</div>
<div class="mt-space-md">
<div class="font-headline-xl text-headline-xl text-on-surface tracking-tight">14</div>
<div class="flex items-center gap-1.5 mt-1">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Across portfolio records</span>
</div>
</div>
</div>
<!-- Active -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface-variant">Active Contracts</span>
<div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-800 flex items-center justify-center">
<span class="material-symbols-outlined text-[20px]">verified_user</span>
</div>
</div>
<div class="mt-space-md">
<div class="flex items-baseline justify-between">
<span class="font-headline-xl text-headline-xl text-on-surface tracking-tight">10</span>
<span class="px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 font-label-sm text-label-sm font-headline-sm">Active Leases</span>
</div>
<div class="flex items-center gap-1.5 mt-1">
<span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>
<span class="font-label-sm text-label-sm text-on-surface-variant">10 Tenancies linked</span>
</div>
</div>
</div>
<!-- Draft -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface-variant">Draft Contracts</span>
<div class="w-8 h-8 rounded-lg bg-surface-container text-on-surface-variant flex items-center justify-center">
<span class="material-symbols-outlined text-[20px]">edit_note</span>
</div>
</div>
<div class="mt-space-md">
<div class="font-headline-xl text-headline-xl text-on-surface tracking-tight">2</div>
<div class="flex items-center gap-1.5 mt-1">
<span class="w-1.5 h-1.5 rounded-full bg-outline"></span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Incomplete setups</span>
</div>
</div>
</div>
<!-- Pending Signature -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface-variant">Pending Signature</span>
<div class="w-8 h-8 rounded-lg bg-amber-50 text-amber-900 flex items-center justify-center">
<span class="material-symbols-outlined text-[20px]">draw</span>
</div>
</div>
<div class="mt-space-md">
<div class="flex items-baseline justify-between">
<span class="font-headline-xl text-headline-xl text-on-surface tracking-tight">1</span>
<span class="px-2 py-0.5 rounded-full bg-amber-100 text-amber-900 font-label-sm text-label-sm font-headline-sm">Action Req.</span>
</div>
<div class="flex items-center gap-1.5 mt-1">
<span class="w-1.5 h-1.5 rounded-full bg-amber-600"></span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Prepared dossier</span>
</div>
</div>
</div>
<!-- Expired -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface-variant">Expired Contracts</span>
<div class="w-8 h-8 rounded-lg bg-surface-container-high text-on-surface-variant flex items-center justify-center">
<span class="material-symbols-outlined text-[20px]">history</span>
</div>
</div>
<div class="mt-space-md">
<div class="font-headline-xl text-headline-xl text-on-surface tracking-tight">1</div>
<div class="flex items-center gap-1.5 mt-1">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Historical record</span>
</div>
</div>
</div>
</div>
<!-- 2. CONTRACT CATEGORY TABS -->
<div class="flex items-center gap-space-xs overflow-x-auto pb-2 mb-space-md">
<button class="px-space-md py-2.5 rounded-lg bg-primary text-on-primary font-label-lg text-label-lg flex items-center gap-2 shadow-sm transition-all whitespace-nowrap" data-demo="All Rental Contracts 14" type="button">
<span>All Rental Contracts</span>
<span class="px-1.5 py-0.2 rounded-full bg-primary-container text-on-primary text-[11px] leading-tight font-headline-sm">14</span>
</button>
<button class="px-space-md py-2.5 rounded-lg bg-surface-container-lowest hover:bg-surface-container-high text-on-surface font-label-lg text-label-lg flex items-center gap-2 transition-all whitespace-nowrap shadow-sm" data-demo="Active 10" type="button">
<span>Active</span>
<span class="px-1.5 py-0.2 rounded-full bg-surface-container text-on-surface-variant text-[11px] leading-tight">10</span>
</button>
<button class="px-space-md py-2.5 rounded-lg bg-surface-container-lowest hover:bg-surface-container-high text-on-surface font-label-lg text-label-lg flex items-center gap-2 transition-all whitespace-nowrap shadow-sm" data-demo="Draft 2" type="button">
<span>Draft</span>
<span class="px-1.5 py-0.2 rounded-full bg-surface-container text-on-surface-variant text-[11px] leading-tight">2</span>
</button>
<button class="px-space-md py-2.5 rounded-lg bg-surface-container-lowest hover:bg-surface-container-high text-on-surface font-label-lg text-label-lg flex items-center gap-2 transition-all whitespace-nowrap shadow-sm" data-demo="Pending Signature 1" type="button">
<span>Pending Signature</span>
<span class="px-1.5 py-0.2 rounded-full bg-surface-container text-on-surface-variant text-[11px] leading-tight">1</span>
</button>
<button class="px-space-md py-2.5 rounded-lg bg-surface-container-lowest hover:bg-surface-container-high text-on-surface font-label-lg text-label-lg flex items-center gap-2 transition-all whitespace-nowrap shadow-sm" data-demo="Expired 1" type="button">
<span>Expired</span>
<span class="px-1.5 py-0.2 rounded-full bg-surface-container text-on-surface-variant text-[11px] leading-tight">1</span>
</button>
<button class="px-space-md py-2.5 rounded-lg bg-surface-container-lowest hover:bg-surface-container-high text-primary font-label-lg text-label-lg flex items-center gap-2 transition-all whitespace-nowrap shadow-sm" data-demo="Management Agreements 1 Separate" type="button">
<span class="material-symbols-outlined text-[16px]">admin_panel_settings</span>
<span>Management Agreements</span>
<span class="px-1.5 py-0.2 rounded-full bg-primary-fixed text-on-primary-fixed text-[11px] leading-tight font-headline-sm">1 Separate</span>
</button>
</div>
<!-- 3. SEARCH & FILTERS TOOLBAR -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm mb-space-lg flex flex-col gap-space-md">
<!-- Top Row Filters -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-space-sm">
<!-- Search bar -->
<div class="relative flex items-center">
<span class="material-symbols-outlined absolute start-3 text-on-surface-variant text-[20px] pointer-events-none">search</span>
<input class="w-full h-10 ps-10 pe-space-md rounded-lg bg-surface-container-low text-on-surface font-body-sm text-body-sm placeholder:text-on-surface-variant focus:outline-none focus:bg-surface-container-lowest focus:shadow-sm transition-all" placeholder="Search contract ID, tenant, property, or unit..." type="text">
</div>
<!-- Property Dropdown -->
<div class="relative flex items-center">
<span class="material-symbols-outlined absolute start-3 text-on-surface-variant text-[18px] pointer-events-none">domain</span>
<select class="w-full h-10 ps-10 pe-8 rounded-lg bg-surface-container-low text-on-surface font-body-sm text-body-sm appearance-none focus:outline-none focus:bg-surface-container-lowest cursor-pointer">
<option value="">All Properties</option>
<option value="yasmin">Al-Yasmin Compound II (0 Contracts)</option>
<option value="marina">Marina View Residences</option>
<option value="palm">Palm Grove Chalets</option>
</select>
<span class="material-symbols-outlined absolute end-3 text-on-surface-variant text-[18px] pointer-events-none">expand_more</span>
</div>
<!-- Country / Jurisdiction Dropdown -->
<div class="relative flex items-center">
<span class="material-symbols-outlined absolute start-3 text-on-surface-variant text-[18px] pointer-events-none">public</span>
<select class="w-full h-10 ps-10 pe-8 rounded-lg bg-surface-container-low text-on-surface font-body-sm text-body-sm appearance-none focus:outline-none focus:bg-surface-container-lowest cursor-pointer">
<option value="">All Jurisdictions</option>
<option value="uae">United Arab Emirates</option>
<option value="sa">Kingdom of Saudi Arabia</option>
<option value="bh">Kingdom of Bahrain</option>
</select>
<span class="material-symbols-outlined absolute end-3 text-on-surface-variant text-[18px] pointer-events-none">expand_more</span>
</div>
<!-- Contract Type Dropdown -->
<div class="relative flex items-center">
<span class="material-symbols-outlined absolute start-3 text-on-surface-variant text-[18px] pointer-events-none">category</span>
<select class="w-full h-10 ps-10 pe-8 rounded-lg bg-surface-container-low text-on-surface font-body-sm text-body-sm appearance-none focus:outline-none focus:bg-surface-container-lowest cursor-pointer">
<option value="">All Contract Types</option>
<option value="res">Residential Rental Agreement</option>
<option value="short">Short-Stay Rental Agreement</option>
<option value="com">Commercial Lease</option>
</select>
<span class="material-symbols-outlined absolute end-3 text-on-surface-variant text-[18px] pointer-events-none">expand_more</span>
</div>
</div>
<!-- Secondary Filters Row -->
<div class="flex flex-wrap items-center justify-between gap-space-sm pt-2">
<div class="flex flex-wrap items-center gap-space-sm">
<!-- Status Dropdown -->
<select class="h-9 px-3 rounded-lg bg-surface-container-low text-on-surface font-label-md text-label-md appearance-none focus:outline-none cursor-pointer">
<option>All Statuses</option>
<option>Active</option>
<option>Draft</option>
<option>Pending Signature</option>
<option>Expired</option>
</select>
<!-- Period Dropdown -->
<select class="h-9 px-3 rounded-lg bg-surface-container-low text-on-surface font-label-md text-label-md appearance-none focus:outline-none cursor-pointer">
<option>All Periods</option>
<option>Monthly</option>
<option>Yearly</option>
<option>Daily</option>
</select>
<!-- Date inputs simulated -->
<div class="flex items-center gap-1 bg-surface-container-low px-2 py-1 rounded-lg">
<span class="material-symbols-outlined text-[16px] text-on-surface-variant">calendar_today</span>
<input class="bg-transparent w-24 text-body-sm font-body-sm text-on-surface focus:outline-none placeholder:text-on-surface-variant" placeholder="Start Date" type="text">
<span class="text-on-surface-variant text-label-sm">to</span>
<input class="bg-transparent w-24 text-body-sm font-body-sm text-on-surface focus:outline-none placeholder:text-on-surface-variant" placeholder="End Date" type="text">
</div>
<!-- Manager filter -->
<select class="h-9 px-3 rounded-lg bg-surface-container-low text-on-surface font-label-md text-label-md appearance-none focus:outline-none cursor-pointer">
<option>All Managers</option>
<option>Eng. Sultan Al-Shammari</option>
<option>Tariq Mansoor</option>
</select>
</div>
<div class="flex items-center gap-space-sm">
<button class="h-9 px-3 text-primary hover:bg-surface-container-high rounded-lg font-label-md text-label-md flex items-center gap-1.5 transition-colors" type="button" data-demo="Advanced Filters">
<span class="material-symbols-outlined text-[16px]">tune</span>
<span>Advanced Filters</span>
</button>
<button class="h-9 px-3 text-on-surface-variant hover:text-on-surface rounded-lg font-label-md text-label-md flex items-center gap-1 transition-colors" type="button" data-demo="Clear Filters">
<span class="material-symbols-outlined text-[16px]">close</span>
<span>Clear Filters</span>
</button>
</div>
</div>
<!-- Result Count & Shield Banner -->
<div class="flex items-center justify-between text-on-surface-variant font-label-sm text-label-sm px-1 pt-1">
<div class="flex items-center gap-2">
<span class="font-headline-sm text-on-surface">Showing 7 of 14 Contract Records</span>
<span>•</span>
<span class="flex items-center gap-1 text-on-surface-variant">
<span class="material-symbols-outlined text-[14px] text-primary">security</span>
<span>Sensitive legal covenants shielded under role-based governance</span>
</span>
</div>
<span class="text-on-surface-variant font-mono text-[11px]">LEDGER: KSA-REG-2026</span>
</div>
</div>
<!-- 4. MAIN CONTRACTS DATA TABLE -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden mb-space-lg">
<div class="overflow-x-auto">
<table class="w-full text-start border-collapse">
<thead>
<tr class="bg-surface-container-low text-on-surface-variant font-label-sm text-label-sm uppercase tracking-wider text-start">
<th class="p-space-md w-12 text-center">
<input class="w-4 h-4 rounded text-primary focus:ring-0 cursor-pointer" type="checkbox">
</th>
<th class="py-space-md px-space-sm font-headline-sm">Contract Reference</th>
<th class="py-space-md px-space-sm font-headline-sm">Tenant / Parties</th>
<th class="py-space-md px-space-sm font-headline-sm">Property & Unit</th>
<th class="py-space-md px-space-sm font-headline-sm">Contract Type</th>
<th class="py-space-md px-space-sm font-headline-sm">Rental Period</th>
<th class="py-space-md px-space-sm font-headline-sm">Start / End Dates</th>
<th class="py-space-md px-space-sm font-headline-sm">Contract Amount</th>
<th class="py-space-md px-space-sm font-headline-sm">Contract Status</th>
<th class="py-space-md px-space-sm font-headline-sm">Document Status</th>
<th class="py-space-md px-space-md font-headline-sm text-end">Actions</th>
</tr>
</thead>
<tbody class="font-body-sm text-body-sm text-on-surface divide-y divide-surface-container">
<!-- Row 1 -->
<tr class="hover:bg-surface-container-low/60 transition-colors bg-primary/5">
<td class="p-space-md text-center">
<input checked="" class="contract-checkbox w-4 h-4 rounded text-primary focus:ring-0 cursor-pointer" type="checkbox">
</td>
<td class="py-space-md px-space-sm">
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-primary">CTR-2026-001</span>
<span class="text-[11px] text-on-surface-variant font-mono">EJ-DXB-99104</span>
</div>
</td>
<td class="py-space-md px-space-sm">
<div class="flex items-center gap-2">
<div class="w-7 h-7 rounded-full bg-primary-fixed text-on-primary-fixed flex items-center justify-center font-headline-sm text-[11px]">AF</div>
<div class="flex flex-col">
<span class="font-headline-sm text-on-surface">Ahmed Al-Farsi</span>
<span class="text-[11px] text-on-surface-variant">GCC Resident</span>
</div>
</div>
</td>
<td class="py-space-md px-space-sm">
<div class="flex flex-col">
<span class="font-headline-sm text-on-surface">Marina View Residences</span>
<span class="text-[11px] text-on-surface-variant">Unit MV-101 (2BHK)</span>
</div>
</td>
<td class="py-space-md px-space-sm text-on-surface">
                Residential Rental Agreement
              </td>
<td class="py-space-md px-space-sm">
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface font-label-sm text-label-sm">Monthly</span>
</td>
<td class="py-space-md px-space-sm text-on-surface-variant font-label-md">
                Dates Not Specified
              </td>
<td class="py-space-md px-space-sm font-headline-sm text-on-surface font-mono">
                USD 2,100 <span class="text-[11px] text-on-surface-variant font-normal">/ mo</span>
</td>
<td class="py-space-md px-space-sm">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-800 font-label-sm text-label-sm font-headline-sm">
<span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>
<span>Active</span>
</span>
</td>
<td class="py-space-md px-space-sm">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded bg-emerald-100/80 text-emerald-900 font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[14px]">check_circle</span>
<span>On File</span>
</span>
</td>
<td class="py-space-md px-space-md text-end">
<button class="w-8 h-8 rounded-lg hover:bg-surface-container flex items-center justify-center text-on-surface-variant transition-colors ms-auto" type="button" data-demo="more_vert" aria-label="more vert">
<span class="material-symbols-outlined text-[18px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="p-space-md text-center">
<input class="contract-checkbox w-4 h-4 rounded text-primary focus:ring-0 cursor-pointer" type="checkbox">
</td>
<td class="py-space-md px-space-sm">
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-primary">CTR-2026-002</span>
<span class="text-[11px] text-on-surface-variant font-mono">ST-AUH-10492</span>
</div>
</td>
<td class="py-space-md px-space-sm">
<div class="flex items-center gap-2">
<div class="w-7 h-7 rounded-full bg-surface-container-high text-on-surface flex items-center justify-center font-headline-sm text-[11px]">FN</div>
<div class="flex flex-col">
<span class="font-headline-sm text-on-surface">Fatima Al-Nuaimi</span>
<span class="text-[11px] text-on-surface-variant">UAE Citizen</span>
</div>
</div>
</td>
<td class="py-space-md px-space-sm">
<div class="flex flex-col">
<span class="font-headline-sm text-on-surface">Palm Grove Chalets</span>
<span class="text-[11px] text-on-surface-variant">Unit PG-02 (Villa)</span>
</div>
</td>
<td class="py-space-md px-space-sm text-on-surface">
                Short-Stay Rental Agreement
              </td>
<td class="py-space-md px-space-sm">
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface font-label-sm text-label-sm">Daily</span>
</td>
<td class="py-space-md px-space-sm text-on-surface-variant font-label-md">
                Dates Not Specified
              </td>
<td class="py-space-md px-space-sm font-headline-sm text-on-surface font-mono">
                AED 950 <span class="text-[11px] text-on-surface-variant font-normal">/ night</span>
</td>
<td class="py-space-md px-space-sm">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-800 font-label-sm text-label-sm font-headline-sm">
<span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>
<span>Active</span>
</span>
</td>
<td class="py-space-md px-space-sm">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded bg-emerald-100/80 text-emerald-900 font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[14px]">check_circle</span>
<span>On File</span>
</span>
</td>
<td class="py-space-md px-space-md text-end">
<button class="w-8 h-8 rounded-lg hover:bg-surface-container flex items-center justify-center text-on-surface-variant transition-colors ms-auto" type="button" data-demo="more_vert" aria-label="more vert">
<span class="material-symbols-outlined text-[18px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="p-space-md text-center">
<input class="contract-checkbox w-4 h-4 rounded text-primary focus:ring-0 cursor-pointer" type="checkbox">
</td>
<td class="py-space-md px-space-sm">
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-primary">CTR-2026-003</span>
<span class="text-[11px] text-on-surface-variant font-mono">EJ-DXB-99105</span>
</div>
</td>
<td class="py-space-md px-space-sm">
<div class="flex items-center gap-2">
<div class="w-7 h-7 rounded-full bg-surface-container-high text-on-surface flex items-center justify-center font-headline-sm text-[11px]">DC</div>
<div class="flex flex-col">
<span class="font-headline-sm text-on-surface">Daniel Carter</span>
<span class="text-[11px] text-on-surface-variant">Corporate Expat</span>
</div>
</div>
</td>
<td class="py-space-md px-space-sm">
<div class="flex flex-col">
<span class="font-headline-sm text-on-surface">Marina View Residences</span>
<span class="text-[11px] text-on-surface-variant">Unit MV-104 (1BHK)</span>
</div>
</td>
<td class="py-space-md px-space-sm text-on-surface">
                Residential Rental Agreement
              </td>
<td class="py-space-md px-space-sm">
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface font-label-sm text-label-sm">Monthly</span>
</td>
<td class="py-space-md px-space-sm text-on-surface-variant font-label-md">
                Dates Not Specified
              </td>
<td class="py-space-md px-space-sm font-label-md text-on-surface-variant italic">
                Amount Not Set
              </td>
<td class="py-space-md px-space-sm">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-800 font-label-sm text-label-sm font-headline-sm">
<span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>
<span>Active</span>
</span>
</td>
<td class="py-space-md px-space-sm">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded bg-emerald-100/80 text-emerald-900 font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[14px]">check_circle</span>
<span>On File</span>
</span>
</td>
<td class="py-space-md px-space-md text-end">
<button class="w-8 h-8 rounded-lg hover:bg-surface-container flex items-center justify-center text-on-surface-variant transition-colors ms-auto" type="button" data-demo="more_vert" aria-label="more vert">
<span class="material-symbols-outlined text-[18px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 4 -->
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="p-space-md text-center">
<input class="contract-checkbox w-4 h-4 rounded text-primary focus:ring-0 cursor-pointer" type="checkbox">
</td>
<td class="py-space-md px-space-sm">
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-primary">CTR-2026-004</span>
<span class="text-[11px] text-on-surface-variant font-mono">EJ-DXB-99106</span>
</div>
</td>
<td class="py-space-md px-space-sm">
<div class="flex items-center gap-2">
<div class="w-7 h-7 rounded-full bg-surface-container-high text-on-surface flex items-center justify-center font-headline-sm text-[11px]">MH</div>
<div class="flex flex-col">
<span class="font-headline-sm text-on-surface">Mariam Hassan</span>
<span class="text-[11px] text-on-surface-variant">UAE Citizen</span>
</div>
</div>
</td>
<td class="py-space-md px-space-sm">
<div class="flex flex-col">
<span class="font-headline-sm text-on-surface">Marina View Residences</span>
<span class="text-[11px] text-on-surface-variant">Unit MV-105 (3BHK)</span>
</div>
</td>
<td class="py-space-md px-space-sm text-on-surface">
                Residential Rental Agreement
              </td>
<td class="py-space-md px-space-sm">
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface font-label-sm text-label-sm">Yearly</span>
</td>
<td class="py-space-md px-space-sm text-on-surface-variant font-label-md">
                Dates Not Specified
              </td>
<td class="py-space-md px-space-sm font-label-md text-on-surface-variant italic">
                Amount Not Set
              </td>
<td class="py-space-md px-space-sm">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-800 font-label-sm text-label-sm font-headline-sm">
<span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>
<span>Active</span>
</span>
</td>
<td class="py-space-md px-space-sm">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded bg-emerald-100/80 text-emerald-900 font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[14px]">check_circle</span>
<span>On File</span>
</span>
</td>
<td class="py-space-md px-space-md text-end">
<button class="w-8 h-8 rounded-lg hover:bg-surface-container flex items-center justify-center text-on-surface-variant transition-colors ms-auto" type="button" data-demo="more_vert" aria-label="more vert">
<span class="material-symbols-outlined text-[18px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 5 (Draft) -->
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="p-space-md text-center">
<input class="contract-checkbox w-4 h-4 rounded text-primary focus:ring-0 cursor-pointer" type="checkbox">
</td>
<td class="py-space-md px-space-sm">
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-on-surface">CTR-2026-011</span>
<span class="text-[11px] text-on-surface-variant font-mono">DRAFT-GEN</span>
</div>
</td>
<td class="py-space-md px-space-sm">
<div class="flex items-center gap-2">
<div class="w-7 h-7 rounded-full bg-surface-container text-on-surface-variant flex items-center justify-center">
<span class="material-symbols-outlined text-[16px]">person_off</span>
</div>
<span class="font-label-md text-on-surface-variant italic">Unassigned Tenant</span>
</div>
</td>
<td class="py-space-md px-space-sm">
<span class="font-label-md text-on-surface-variant italic">Unassigned Property / Unit</span>
</td>
<td class="py-space-md px-space-sm text-on-surface">
                Residential Rental Agreement
              </td>
<td class="py-space-md px-space-sm">
<span class="text-on-surface-variant font-label-md italic">Not Set</span>
</td>
<td class="py-space-md px-space-sm text-on-surface-variant font-label-md">
                Dates Not Specified
              </td>
<td class="py-space-md px-space-sm font-label-md text-on-surface-variant italic">
                Amount Not Set
              </td>
<td class="py-space-md px-space-sm">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm font-headline-sm">
<span class="w-1.5 h-1.5 rounded-full bg-outline"></span>
<span>Draft</span>
</span>
</td>
<td class="py-space-md px-space-sm">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded bg-amber-50 text-amber-900 font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[14px]">pending</span>
<span>Not Uploaded</span>
</span>
</td>
<td class="py-space-md px-space-md text-end">
<button class="w-8 h-8 rounded-lg hover:bg-surface-container flex items-center justify-center text-on-surface-variant transition-colors ms-auto" type="button" data-demo="more_vert" aria-label="more vert">
<span class="material-symbols-outlined text-[18px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 6 (Draft) -->
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="p-space-md text-center">
<input class="contract-checkbox w-4 h-4 rounded text-primary focus:ring-0 cursor-pointer" type="checkbox">
</td>
<td class="py-space-md px-space-sm">
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-on-surface">CTR-2026-012</span>
<span class="text-[11px] text-on-surface-variant font-mono">DRAFT-GEN</span>
</div>
</td>
<td class="py-space-md px-space-sm">
<div class="flex items-center gap-2">
<div class="w-7 h-7 rounded-full bg-surface-container text-on-surface-variant flex items-center justify-center">
<span class="material-symbols-outlined text-[16px]">person_off</span>
</div>
<span class="font-label-md text-on-surface-variant italic">Unassigned Tenant</span>
</div>
</td>
<td class="py-space-md px-space-sm">
<span class="font-label-md text-on-surface-variant italic">Unassigned Property / Unit</span>
</td>
<td class="py-space-md px-space-sm text-on-surface">
                Residential Rental Agreement
              </td>
<td class="py-space-md px-space-sm">
<span class="text-on-surface-variant font-label-md italic">Not Set</span>
</td>
<td class="py-space-md px-space-sm text-on-surface-variant font-label-md">
                Dates Not Specified
              </td>
<td class="py-space-md px-space-sm font-label-md text-on-surface-variant italic">
                Amount Not Set
              </td>
<td class="py-space-md px-space-sm">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm font-headline-sm">
<span class="w-1.5 h-1.5 rounded-full bg-outline"></span>
<span>Draft</span>
</span>
</td>
<td class="py-space-md px-space-sm">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded bg-amber-50 text-amber-900 font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[14px]">pending</span>
<span>Not Uploaded</span>
</span>
</td>
<td class="py-space-md px-space-md text-end">
<button class="w-8 h-8 rounded-lg hover:bg-surface-container flex items-center justify-center text-on-surface-variant transition-colors ms-auto" type="button" data-demo="more_vert" aria-label="more vert">
<span class="material-symbols-outlined text-[18px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 7 (Pending Signature) -->
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="p-space-md text-center">
<input class="contract-checkbox w-4 h-4 rounded text-primary focus:ring-0 cursor-pointer" type="checkbox">
</td>
<td class="py-space-md px-space-sm">
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-primary">CTR-2026-013</span>
<span class="text-[11px] text-on-surface-variant font-mono">SIG-PENDING</span>
</div>
</td>
<td class="py-space-md px-space-sm">
<div class="flex items-center gap-2">
<div class="w-7 h-7 rounded-full bg-amber-100 text-amber-900 flex items-center justify-center font-headline-sm text-[11px]">AT</div>
<div class="flex flex-col">
<span class="font-headline-sm text-on-surface">Assigned Tenant</span>
<span class="text-[11px] text-on-surface-variant">KYC Verified</span>
</div>
</div>
</td>
<td class="py-space-md px-space-sm">
<div class="flex flex-col">
<span class="font-headline-sm text-on-surface">Marina View Residences</span>
<span class="text-[11px] text-on-surface-variant italic">Unit To Be Assigned</span>
</div>
</td>
<td class="py-space-md px-space-sm text-on-surface">
                Residential Rental Agreement
              </td>
<td class="py-space-md px-space-sm">
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface font-label-sm text-label-sm">Monthly</span>
</td>
<td class="py-space-md px-space-sm text-on-surface-variant font-label-md">
                Dates Not Specified
              </td>
<td class="py-space-md px-space-sm font-label-md text-on-surface-variant italic">
                Amount Not Set
              </td>
<td class="py-space-md px-space-sm">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-amber-100 text-amber-900 font-label-sm text-label-sm font-headline-sm">
<span class="w-1.5 h-1.5 rounded-full bg-amber-600"></span>
<span>Pending Signature</span>
</span>
</td>
<td class="py-space-md px-space-sm">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded bg-sky-100 text-sky-900 font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[14px]">description</span>
<span>Prepared</span>
</span>
</td>
<td class="py-space-md px-space-md text-end">
<button class="w-8 h-8 rounded-lg hover:bg-surface-container flex items-center justify-center text-on-surface-variant transition-colors ms-auto" type="button" data-demo="more_vert" aria-label="more vert">
<span class="material-symbols-outlined text-[18px]">more_vert</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination bar -->
<div class="p-space-md bg-surface-container-low flex flex-col sm:flex-row items-center justify-between gap-space-md">
<span class="font-label-md text-label-md text-on-surface-variant">Showing 1–7 of 14 contract records</span>
<div class="flex items-center gap-1">
<button class="w-8 h-8 rounded-lg bg-surface-container-lowest text-on-surface-variant flex items-center justify-center disabled:opacity-50" disabled="" type="button" data-demo="chevron_left" aria-label="chevron left">
<span class="material-symbols-outlined text-[18px]">chevron_left</span>
</button>
<button class="w-8 h-8 rounded-lg bg-primary text-on-primary font-headline-sm text-label-md flex items-center justify-center shadow-sm" type="button" data-demo="1">1</button>
<button class="w-8 h-8 rounded-lg bg-surface-container-lowest hover:bg-surface-container-high text-on-surface font-label-md text-label-md flex items-center justify-center transition-colors" type="button" data-demo="2">2</button>
<button class="w-8 h-8 rounded-lg bg-surface-container-lowest hover:bg-surface-container-high text-on-surface-variant flex items-center justify-center transition-colors" type="button" data-demo="chevron_right" aria-label="chevron right">
<span class="material-symbols-outlined text-[18px]">chevron_right</span>
</button>
</div>
</div>
</div>
<!-- 5. CONTRACT LIFECYCLE WORKFLOW (Horizontal component) -->
<div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm mb-space-lg">
<div class="flex items-center justify-between mb-space-md">
<div class="flex items-center gap-2">
<div class="w-7 h-7 rounded-lg bg-primary-fixed text-on-primary-fixed flex items-center justify-center">
<span class="material-symbols-outlined text-[18px]">account_tree</span>
</div>
<span class="font-headline-sm text-headline-sm text-on-surface">Institutional Agreement Lifecycle Workflow</span>
</div>
<span class="text-label-sm font-label-sm text-on-surface-variant bg-surface-container-low px-2 py-0.5 rounded">Standard SOP-CON-04</span>
</div>
<!-- Linear Stepper -->
<div class="grid grid-cols-2 md:grid-cols-6 gap-2 relative mb-space-md">
<!-- Step 1: Draft -->
<div class="p-3 rounded-lg bg-surface-container-low flex flex-col justify-between">
<div class="flex items-center justify-between mb-2">
<span class="w-5 h-5 rounded-full bg-surface-container-highest text-on-surface-variant font-label-sm text-label-sm flex items-center justify-center">1</span>
<span class="material-symbols-outlined text-[16px] text-on-surface-variant">edit</span>
</div>
<div>
<span class="font-headline-sm text-label-md text-on-surface block leading-tight">Draft</span>
<span class="text-[11px] text-on-surface-variant">Terms drafted</span>
</div>
</div>
<!-- Step 2: Under Review -->
<div class="p-3 rounded-lg bg-surface-container-low flex flex-col justify-between">
<div class="flex items-center justify-between mb-2">
<span class="w-5 h-5 rounded-full bg-surface-container-highest text-on-surface-variant font-label-sm text-label-sm flex items-center justify-center">2</span>
<span class="material-symbols-outlined text-[16px] text-on-surface-variant">fact_check</span>
</div>
<div>
<span class="font-headline-sm text-label-md text-on-surface block leading-tight">Under Review</span>
<span class="text-[11px] text-on-surface-variant">Legal validation</span>
</div>
</div>
<!-- Step 3: Ready for Signature -->
<div class="p-3 rounded-lg bg-surface-container-low flex flex-col justify-between">
<div class="flex items-center justify-between mb-2">
<span class="w-5 h-5 rounded-full bg-surface-container-highest text-on-surface-variant font-label-sm text-label-sm flex items-center justify-center">3</span>
<span class="material-symbols-outlined text-[16px] text-on-surface-variant">assignment_turned_in</span>
</div>
<div>
<span class="font-headline-sm text-label-md text-on-surface block leading-tight">Ready</span>
<span class="text-[11px] text-on-surface-variant">Dossier packaged</span>
</div>
</div>
<!-- Step 4: Pending Signature (Active highlighted stage) -->
<div class="p-3 rounded-lg bg-amber-50 shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between mb-2">
<span class="w-5 h-5 rounded-full bg-amber-200 text-amber-900 font-label-sm text-label-sm flex items-center justify-center font-headline-sm">4</span>
<span class="material-symbols-outlined text-[16px] text-amber-800">draw</span>
</div>
<div>
<span class="font-headline-sm text-label-md text-amber-950 block leading-tight">Pending Sig.</span>
<span class="text-[11px] text-amber-800">Parties signing</span>
</div>
</div>
<!-- Step 5: Active -->
<div class="p-3 rounded-lg bg-emerald-50/70 flex flex-col justify-between">
<div class="flex items-center justify-between mb-2">
<span class="w-5 h-5 rounded-full bg-emerald-200 text-emerald-950 font-label-sm text-label-sm flex items-center justify-center font-headline-sm">5</span>
<span class="material-symbols-outlined text-[16px] text-emerald-800">verified</span>
</div>
<div>
<span class="font-headline-sm text-label-md text-emerald-950 block leading-tight">Active</span>
<span class="text-[11px] text-emerald-800">Tenancy linked</span>
</div>
</div>
<!-- Step 6: Expired / Terminated -->
<div class="p-3 rounded-lg bg-surface-container-low flex flex-col justify-between">
<div class="flex items-center justify-between mb-2">
<span class="w-5 h-5 rounded-full bg-surface-container-highest text-on-surface-variant font-label-sm text-label-sm flex items-center justify-center">6</span>
<span class="material-symbols-outlined text-[16px] text-on-surface-variant">archive</span>
</div>
<div>
<span class="font-headline-sm text-label-md text-on-surface block leading-tight">Expired</span>
<span class="text-[11px] text-on-surface-variant">Archived status</span>
</div>
</div>
</div>
<!-- Explanatory Guidelines Footer -->
<div class="p-3 rounded-lg bg-surface-container-low flex items-start gap-2.5">
<span class="material-symbols-outlined text-primary text-[18px] mt-0.5 shrink-0">gavel</span>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
<span class="font-headline-sm text-on-surface">Operational Protocol:</span> Contract status changes require authorized manager sign-off. A draft is not legally effective. A document marked Prepared is not signed. Signatures must be recorded through a supported manual or certified offline process. Contract activation does not occur automatically upon booking approval.
        </p>
</div>
</div>
<!-- 6. TWO-COLUMN OPERATIONAL SECTIONS -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg mb-space-xl">
<!-- LEFT COLUMN (Span 6) -->
<div class="lg:col-span-6 flex flex-col gap-space-lg">
<!-- Selected Contract Dossier Preview -->
<div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between pb-space-sm mb-space-md border-b-0">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-lg bg-primary-fixed text-on-primary-fixed flex items-center justify-center">
<span class="material-symbols-outlined text-[18px]">badge</span>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Selected Contract Dossier Preview</h3>
<span class="font-mono text-label-sm text-primary font-headline-sm">CTR-2026-001 — Ahmed Al-Farsi</span>
</div>
</div>
<span class="px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-900 font-label-sm text-label-sm font-headline-sm flex items-center gap-1">
<span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span> Active Agreement
              </span>
</div>
<!-- Dossier Grid Specs -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-space-sm p-space-md rounded-xl bg-surface-container-low mb-space-md font-body-sm">
<div class="flex flex-col">
<span class="text-label-sm text-on-surface-variant font-label-sm uppercase tracking-wider">Tenant</span>
<span class="font-headline-sm text-on-surface">Ahmed Al-Farsi</span>
</div>
<div class="flex flex-col">
<span class="text-label-sm text-on-surface-variant font-label-sm uppercase tracking-wider">Associated Property</span>
<span class="font-headline-sm text-on-surface">Marina View Residences</span>
</div>
<div class="flex flex-col">
<span class="text-label-sm text-on-surface-variant font-label-sm uppercase tracking-wider">Unit Identifier</span>
<span class="font-headline-sm text-on-surface">MV-101 (2BHK)</span>
</div>
<div class="flex flex-col">
<span class="text-label-sm text-on-surface-variant font-label-sm uppercase tracking-wider">Contract Type</span>
<span class="font-headline-sm text-on-surface">Residential Rental Agreement</span>
</div>
<div class="flex flex-col">
<span class="text-label-sm text-on-surface-variant font-label-sm uppercase tracking-wider">Rental Period & Rent</span>
<span class="font-headline-sm text-on-surface">Monthly — USD 2,100 / month</span>
</div>
<div class="flex flex-col">
<span class="text-label-sm text-on-surface-variant font-label-sm uppercase tracking-wider">Document Status</span>
<span class="font-headline-sm text-emerald-800 flex items-center gap-1">
<span class="material-symbols-outlined text-[16px]">verified</span> On File
                </span>
</div>
<div class="flex flex-col">
<span class="text-label-sm text-on-surface-variant font-label-sm uppercase tracking-wider">Contract Dates</span>
<span class="font-label-md text-on-surface-variant">Dates on Record (Not Specified)</span>
</div>
<div class="flex flex-col">
<span class="text-label-sm text-on-surface-variant font-label-sm uppercase tracking-wider">Assigned Portfolio Manager</span>
<span class="font-headline-sm text-on-surface">Eng. Sultan Al-Shammari</span>
</div>
</div>
</div>
<!-- Dossier Action Buttons -->
<div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
<a class="h-9 px-2 rounded-lg bg-surface-container-high hover:bg-primary hover:text-on-primary text-on-surface font-label-md text-label-md transition-colors flex items-center justify-center gap-1 shadow-sm" href="{{ route('manager.contracts') }}">
<span class="material-symbols-outlined text-[16px]">visibility</span>
<span>View Contract</span>
</a>
<a class="h-9 px-2 rounded-lg bg-surface-container-high hover:bg-primary hover:text-on-primary text-on-surface font-label-md text-label-md transition-colors flex items-center justify-center gap-1 shadow-sm" href="{{ route('manager.tenants') }}">
<span class="material-symbols-outlined text-[16px]">person</span>
<span>View Tenant</span>
</a>
<a class="h-9 px-2 rounded-lg bg-surface-container-high hover:bg-primary hover:text-on-primary text-on-surface font-label-md text-label-md transition-colors flex items-center justify-center gap-1 shadow-sm" href="{{ route('manager.unit-details') }}">
<span class="material-symbols-outlined text-[16px]">meeting_room</span>
<span>View Unit</span>
</a>
<a class="h-9 px-2 rounded-lg bg-surface-container-high hover:bg-primary hover:text-on-primary text-on-surface font-label-md text-label-md transition-colors flex items-center justify-center gap-1 shadow-sm" href="{{ route('manager.documents') }}">
<span class="material-symbols-outlined text-[16px]">folder</span>
<span>View Documents</span>
</a>
</div>
</div>
<!-- Contract Renewals & Expirations Card -->
<div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-space-md">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-lg bg-secondary-fixed text-on-secondary-fixed flex items-center justify-center">
<span class="material-symbols-outlined text-[18px]">update</span>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Contract Renewals & Expirations</h3>
<span class="text-label-sm text-on-surface-variant">Lifecycle rollover monitor</span>
</div>
</div>
<span class="font-label-sm text-label-sm px-2 py-0.5 rounded bg-surface-container text-on-surface-variant">Q2 Review Cycle</span>
</div>
<div class="grid grid-cols-3 gap-space-sm p-space-md rounded-xl bg-surface-container-low mb-space-md text-center">
<div class="flex flex-col">
<span class="font-headline-lg text-headline-lg text-on-surface">1</span>
<span class="text-label-sm text-on-surface-variant font-label-sm">Expired Contracts</span>
</div>
<div class="flex flex-col">
<span class="font-headline-lg text-headline-lg text-on-surface-variant">--</span>
<span class="text-label-sm text-on-surface-variant font-label-sm">Upcoming Renewals</span>
<span class="text-[10px] text-on-surface-variant italic">Not Calculated</span>
</div>
<div class="flex flex-col">
<span class="font-headline-lg text-headline-lg text-on-surface">0</span>
<span class="text-label-sm text-on-surface-variant font-label-sm">Renewal Requests</span>
<span class="text-[10px] text-on-surface-variant italic">None Recorded</span>
</div>
</div>
<!-- Neutral Timeline Placeholder -->
<div class="p-space-md rounded-xl bg-surface-container-low mb-space-md flex items-center gap-3">
<div class="w-2 h-10 rounded bg-outline-variant shrink-0"></div>
<div class="flex flex-col">
<span class="font-headline-sm text-label-md text-on-surface">Automated Rollover Trigger Paused</span>
<p class="text-body-sm text-body-sm text-on-surface-variant">
                  Tenancies require minimum 60-day legal notice before automated extension covenants activate.
                </p>
</div>
</div>
</div>
<div class="flex items-center gap-space-sm">
<button class="flex-1 h-9 px-3 rounded-lg bg-surface-container-high hover:bg-surface-container-highest text-on-surface font-label-md text-label-md transition-colors flex items-center justify-center gap-1.5 shadow-sm" type="button" data-demo="View Renewal Queue">
<span class="material-symbols-outlined text-[16px]">pending_actions</span>
<span>View Renewal Queue</span>
</button>
<button class="flex-1 h-9 px-3 rounded-lg bg-surface-container-high hover:bg-surface-container-highest text-on-surface font-label-md text-label-md transition-colors flex items-center justify-center gap-1.5 shadow-sm" type="button" data-demo="Review Expired Contracts">
<span class="material-symbols-outlined text-[16px]">history</span>
<span>Review Expired Contracts</span>
</button>
</div>
</div>
</div>
<!-- RIGHT COLUMN (Span 6) -->
<div class="lg:col-span-6 flex flex-col gap-space-lg">
<!-- Property Management Agreements Panel -->
<div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-space-md">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-lg bg-tertiary-fixed text-on-tertiary-fixed flex items-center justify-center">
<span class="material-symbols-outlined text-[18px]">real_estate_agent</span>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Property Management Agreements Panel</h3>
<span class="text-label-sm text-on-surface-variant">Owner-Operator fiduciary mandates</span>
</div>
</div>
<span class="px-2.5 py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed font-label-sm text-label-sm font-headline-sm">Separate Governance</span>
</div>
<!-- Mandate Specs -->
<div class="flex flex-col gap-2 p-space-md rounded-xl bg-surface-container-low mb-space-md font-body-sm">
<div class="flex items-center justify-between pb-2 border-b-0">
<span class="text-on-surface-variant text-label-sm">Property Asset:</span>
<span class="font-headline-sm text-on-surface">Al-Yasmin Compound II (PRP-RYD-2026-0089)</span>
</div>
<div class="flex items-center justify-between pb-2 border-b-0">
<span class="text-on-surface-variant text-label-sm">Beneficial Owner:</span>
<span class="font-headline-sm text-on-surface">Muqrin Real Estate Holdings Ltd. (100% Equity)</span>
</div>
<div class="flex items-center justify-between pb-2 border-b-0">
<span class="text-on-surface-variant text-label-sm">Assigned Asset Manager:</span>
<span class="font-headline-sm text-on-surface">Eng. Sultan Al-Shammari</span>
</div>
<div class="flex items-center justify-between pb-2 border-b-0">
<span class="text-on-surface-variant text-label-sm">Management Mandate Fee:</span>
<span class="font-headline-sm text-primary font-mono">8.5% of Collected Rent (Illustrative Mandate)</span>
</div>
<div class="flex items-center justify-between pb-2 border-b-0">
<span class="text-on-surface-variant text-label-sm">Agreement Instrument:</span>
<span class="font-headline-sm text-emerald-800 flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">description</span>
<span>On File (AGR-2026-YAS-003)</span>
</span>
</div>
<div class="flex items-center justify-between">
<span class="text-on-surface-variant text-label-sm">Registry Verification:</span>
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface-variant font-label-sm text-label-sm">
                  Not Independently Verified (Internal Record)
                </span>
</div>
</div>
<!-- Private Instrument Notice -->
<div class="p-3 rounded-lg bg-surface-container-low mb-space-md flex items-start gap-2.5">
<span class="material-symbols-outlined text-on-surface-variant text-[18px] shrink-0 mt-0.5">policy</span>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                Management agreements are private, role-restricted instruments distinct from tenant rental contracts. Fees are not commingled with ownership shares.
              </p>
</div>
</div>
<div class="flex items-center gap-space-sm">
<button class="flex-1 h-9 px-3 rounded-lg bg-primary hover:bg-primary-container text-on-primary font-label-md text-label-md transition-colors flex items-center justify-center gap-1.5 shadow-sm" type="button" data-demo="View Management Agreement">
<span class="material-symbols-outlined text-[16px]">visibility</span>
<span>View Management Agreement</span>
</button>
<a class="flex-1 h-9 px-3 rounded-lg bg-surface-container-high hover:bg-surface-container-highest text-on-surface font-label-md text-label-md transition-colors flex items-center justify-center gap-1.5 shadow-sm" href="{{ route('manager.property-details') }}">
<span class="material-symbols-outlined text-[16px]">domain</span>
<span>View Property</span>
</a>
</div>
</div>
<!-- Secure Contract Access & Governance Card -->
<div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-space-md">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-lg bg-surface-container text-on-surface flex items-center justify-center">
<span class="material-symbols-outlined text-[18px]">verified</span>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Secure Contract Access & Governance</h3>
<span class="text-label-sm text-on-surface-variant">Enterprise security & fiduciary controls</span>
</div>
</div>
<span class="font-label-sm text-label-sm px-2 py-0.5 rounded bg-primary-fixed text-on-primary-fixed font-headline-sm">RBAC Level 3</span>
</div>
<!-- Features Checklist -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-space-sm mb-space-md">
<div class="p-3 rounded-lg bg-surface-container-low flex items-start gap-2">
<span class="material-symbols-outlined text-primary text-[18px] shrink-0 mt-0.5">lock</span>
<div class="flex flex-col">
<span class="font-headline-sm text-label-md text-on-surface">Role-Based Document Permissions</span>
<span class="text-[11px] text-on-surface-variant">Tiered access for legal, ops & finance</span>
</div>
</div>
<div class="p-3 rounded-lg bg-surface-container-low flex items-start gap-2">
<span class="material-symbols-outlined text-primary text-[18px] shrink-0 mt-0.5">visibility_off</span>
<div class="flex flex-col">
<span class="font-headline-sm text-label-md text-on-surface">Restricted Contact Details</span>
<span class="text-[11px] text-on-surface-variant">Tenant & owner PII masked by default</span>
</div>
</div>
<div class="p-3 rounded-lg bg-surface-container-low flex items-start gap-2">
<span class="material-symbols-outlined text-primary text-[18px] shrink-0 mt-0.5">download_for_offline</span>
<div class="flex flex-col">
<span class="font-headline-sm text-label-md text-on-surface">Controlled Downloads</span>
<span class="text-[11px] text-on-surface-variant">Watermarked exports with IP & session ID</span>
</div>
</div>
<div class="p-3 rounded-lg bg-surface-container-low flex items-start gap-2">
<span class="material-symbols-outlined text-primary text-[18px] shrink-0 mt-0.5">history_edu</span>
<div class="flex flex-col">
<span class="font-headline-sm text-label-md text-on-surface">Audit Log Tracking</span>
<span class="text-[11px] text-on-surface-variant">Manager audit reviews logged in real-time</span>
</div>
</div>
</div>
<!-- Notice regarding digital registry -->
<div class="p-3 rounded-lg bg-surface-container-low flex items-start gap-2.5">
<span class="material-symbols-outlined text-on-surface-variant text-[18px] shrink-0 mt-0.5">shield</span>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                System maintains internal institutional governance standards. Future digital signature integrations are prepared for API onboarding. No false claims of government digital registration are asserted for pending drafts.
              </p>
</div>
</div>
<div class="pt-space-md flex items-center justify-between text-label-sm font-label-sm text-on-surface-variant">
<span>Last Compliance Scan: Today, 08:30 AST</span>
<button class="text-primary hover:underline font-headline-sm flex items-center gap-1" type="button" data-demo="View Governance Log">
<span>View Governance Log</span>
<span class="material-symbols-outlined text-[14px]">arrow_forward</span>
</button>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
