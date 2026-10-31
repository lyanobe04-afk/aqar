{{-- Imported from client_demo/screens/rent_collection_receivables/code.html; static demonstration data. --}}
@extends('layouts.manager')
@section('content')
<div class="flex flex-col w-full font-body-md text-on-surface">
<!-- Breadcrumb & Top Page Header -->
<header class="flex flex-col gap-space-sm mb-space-lg">
<nav aria-label="Breadcrumb" class="flex items-center gap-2">
<a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors flex items-center gap-1" data-path="dashboard" href="{{ route('manager.dashboard') }}">
<span class="material-symbols-outlined text-[16px]">dashboard</span>
<span>Dashboard</span>
</a>
<span class="text-outline-variant font-label-md text-label-md">/</span>
<span class="font-label-md text-label-md text-primary font-semibold">Rent Collection & Receivables</span>
</nav>
<div class="flex flex-col xl:flex-row xl:items-center justify-between gap-space-md mt-1">
<div>
<div class="flex flex-wrap items-center gap-3">
<h1 class="font-headline-lg text-headline-lg text-primary tracking-tight">Rent Collection & Receivables</h1>
<div class="flex items-center gap-1.5 px-2.5 py-1 bg-surface-container rounded-full text-on-surface-variant text-[11px] font-medium tracking-wide">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
<span>Offline Collections · Manual Verification · Multi-Currency</span>
</div>
</div>
<p class="font-body-md text-body-md text-on-surface-variant mt-1 max-w-4xl">
          Track rent obligations, upcoming dues, outstanding balances, manual collections, and owner reporting across your property portfolio.
        </p>
</div>
<!-- Header Primary & Secondary Action CTAs -->
<div class="flex flex-wrap items-center gap-2.5 shrink-0">
<button class="inline-flex items-center gap-2 px-3.5 py-2 rounded-lg bg-surface-container-lowest text-on-surface font-label-md text-label-md shadow-sm hover:bg-surface-container transition-all" type="button" data-demo="Export Receivables">
<span class="material-symbols-outlined text-[18px] text-secondary">file_download</span>
<span>Export Receivables</span>
</button>
<button class="inline-flex items-center gap-2 px-3.5 py-2 rounded-lg bg-surface-container-lowest text-on-surface font-label-md text-label-md shadow-sm hover:bg-surface-container transition-all" type="button" data-demo="Record Offline Payment">
<span class="material-symbols-outlined text-[18px] text-secondary">receipt_long</span>
<span>Record Offline Payment</span>
</button>
<button class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-primary text-on-primary font-label-md text-label-md shadow-sm hover:bg-primary-container transition-all active:scale-[0.98]" type="button" data-demo="+ Record Rent Obligation">
<span class="material-symbols-outlined text-[18px]">add_circle</span>
<span>+ Record Rent Obligation</span>
</button>
</div>
</div>
</header>
<!-- Workflow Clarity Banner -->
<section class="mb-space-lg rounded-xl bg-surface-container-lowest p-space-md shadow-sm">
<div class="flex items-start gap-3">
<div class="w-8 h-8 rounded-lg bg-primary-fixed flex items-center justify-center shrink-0 mt-0.5">
<span class="material-symbols-outlined text-primary text-[18px]">gavel</span>
</div>
<div class="flex-1">
<div class="flex items-center gap-2">
<span class="font-label-md text-label-md uppercase tracking-wider text-primary font-bold">Operational Governance</span>
<span class="text-outline text-label-sm font-label-sm">·</span>
<span class="font-label-sm text-label-sm text-on-surface-variant font-medium">Rent Obligations vs Payment Records</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1 leading-relaxed">
<strong class="text-on-surface font-semibold">Payments</strong> tracks submitted offline transactions and evidence verification. <strong class="text-on-surface font-semibold">Rent Collection & Receivables</strong> tracks contractual rent obligations, due dates, outstanding balances, collection follow-ups, and matching verified payments. Submissions do not constitute collected funds until manually verified and allocated by an authorized asset manager.
        </p>
</div>
</div>
</section>
<!-- Portfolio KPI Summary Cards (6 Cards) -->
<section class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-6 gap-space-md mb-space-xs">
<!-- Card 1 -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant font-semibold uppercase tracking-wider">Unpaid Obligations</span>
<span class="w-2 h-2 rounded-full bg-error"></span>
</div>
<div class="mt-2 flex items-baseline gap-1">
<span class="font-headline-xl text-headline-xl text-primary font-bold">2</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">obligations</span>
</div>
</div>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-2 pt-2 border-t border-surface-container leading-tight">
        Tracked separately from submissions
      </p>
</div>
<!-- Card 2 -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant font-semibold uppercase tracking-wider">Payment Records</span>
<span class="material-symbols-outlined text-[16px] text-outline">receipt</span>
</div>
<div class="mt-2 flex items-baseline gap-1">
<span class="font-headline-xl text-headline-xl text-on-surface font-bold">16</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">records</span>
</div>
</div>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-2 pt-2 border-t border-surface-container leading-tight">
        Total portfolio payment submissions
      </p>
</div>
<!-- Card 3 -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant font-semibold uppercase tracking-wider">Verified Payments</span>
<span class="w-2 h-2 rounded-full bg-secondary"></span>
</div>
<div class="mt-2 flex items-baseline gap-1">
<span class="font-headline-xl text-headline-xl text-primary font-bold">9</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">settled</span>
</div>
</div>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-2 pt-2 border-t border-surface-container leading-tight">
        Manager verified offline settlements
      </p>
</div>
<!-- Card 4 -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant font-semibold uppercase tracking-wider">Pending Verification</span>
<span class="w-2 h-2 rounded-full bg-tertiary-fixed-dim"></span>
</div>
<div class="mt-2 flex items-baseline gap-1">
<span class="font-headline-xl text-headline-xl text-tertiary-container font-bold">4</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">queued</span>
</div>
</div>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-2 pt-2 border-t border-surface-container leading-tight">
        Awaiting offline evidence review
      </p>
</div>
<!-- Card 5 -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant font-semibold uppercase tracking-wider">Rejected Payments</span>
<span class="material-symbols-outlined text-[16px] text-error">cancel</span>
</div>
<div class="mt-2 flex items-baseline gap-1">
<span class="font-headline-xl text-headline-xl text-error font-bold">1</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">invalid</span>
</div>
</div>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-2 pt-2 border-t border-surface-container leading-tight">
        Incomplete or unverified records
      </p>
</div>
<!-- Card 6 -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant font-semibold uppercase tracking-wider">Draft Payments</span>
<span class="material-symbols-outlined text-[16px] text-outline">edit_note</span>
</div>
<div class="mt-2 flex items-baseline gap-1">
<span class="font-headline-xl text-headline-xl text-on-surface font-bold">2</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">drafts</span>
</div>
</div>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-2 pt-2 border-t border-surface-container leading-tight">
        Unsubmitted or pending drafting
      </p>
</div>
</section>
<!-- Multi-Currency Isolation Callout -->
<div class="flex items-center gap-2 px-1 py-1 mb-space-lg text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[15px] text-secondary">info</span>
<span>Multi-Currency Notice: Balances and collections are maintained discretely in SAR, USD, and AED without arbitrary foreign exchange commingling.</span>
</div>
<!-- Rent Collection Filter Toolbar -->
<section class="rounded-xl bg-surface-container-lowest p-space-md shadow-sm mb-space-lg flex flex-col gap-3">
<div class="flex flex-col xl:flex-row gap-3">
<!-- Search Input -->
<div class="relative flex-1">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-[18px]">search</span>
<input class="w-full h-10 pl-9 pr-3 bg-surface-container-low rounded-lg font-body-sm text-body-sm text-on-surface placeholder:text-outline focus:outline-none focus:bg-surface-container-lowest transition-all" placeholder="Search by tenant, property, unit, contract, or obligation reference..." type="text">
</div>
<!-- Action Toggles -->
<div class="flex items-center gap-2 shrink-0">
<button class="inline-flex items-center gap-1.5 h-10 px-3 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface font-label-md text-label-md transition-colors" type="button" data-demo="Advanced Filters">
<span class="material-symbols-outlined text-[18px] text-secondary">tune</span>
<span>Advanced Filters</span>
</button>
<button class="inline-flex items-center gap-1 h-10 px-3 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface-variant font-label-md text-label-md transition-colors" type="button" data-demo="Clear Filters">
<span class="material-symbols-outlined text-[16px]">close</span>
<span>Clear Filters</span>
</button>
</div>
</div>
<!-- Filter Dropdown Selectors -->
<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-2 pt-1 border-t border-surface-container">
<div class="flex flex-col">
<label class="font-label-sm text-label-sm text-on-surface-variant mb-1">Property</label>
<select class="h-8 px-2 bg-surface-container-low rounded-lg font-label-sm text-label-sm text-on-surface focus:outline-none cursor-pointer">
<option>All Properties</option>
<option>Marina View Residences</option>
<option>Palm Grove Chalets</option>
<option>Al-Yasmin Compound II</option>
</select>
</div>
<div class="flex flex-col">
<label class="font-label-sm text-label-sm text-on-surface-variant mb-1">Owner</label>
<select class="h-8 px-2 bg-surface-container-low rounded-lg font-label-sm text-label-sm text-on-surface focus:outline-none cursor-pointer">
<option>All Owners</option>
<option>Al-Rajhi Family Trust</option>
<option>Gulf Capital Hospitality</option>
<option>Muqrin Real Estate Holdings Ltd.</option>
</select>
</div>
<div class="flex flex-col">
<label class="font-label-sm text-label-sm text-on-surface-variant mb-1">Country</label>
<select class="h-8 px-2 bg-surface-container-low rounded-lg font-label-sm text-label-sm text-on-surface focus:outline-none cursor-pointer">
<option>All Countries</option>
<option>Saudi Arabia (KSA)</option>
<option>United Arab Emirates (UAE)</option>
</select>
</div>
<div class="flex flex-col">
<label class="font-label-sm text-label-sm text-on-surface-variant mb-1">Currency</label>
<select class="h-8 px-2 bg-surface-container-low rounded-lg font-label-sm text-label-sm text-on-surface focus:outline-none cursor-pointer">
<option>All Currencies</option>
<option>SAR (Saudi Riyal)</option>
<option>AED (UAE Dirham)</option>
<option>USD (US Dollar)</option>
</select>
</div>
<div class="flex flex-col">
<label class="font-label-sm text-label-sm text-on-surface-variant mb-1">Rental Cadence</label>
<select class="h-8 px-2 bg-surface-container-low rounded-lg font-label-sm text-label-sm text-on-surface focus:outline-none cursor-pointer">
<option>All Cadences</option>
<option>Daily</option>
<option>Weekly</option>
<option>Monthly</option>
<option>Yearly</option>
<option>Custom</option>
</select>
</div>
<div class="flex flex-col">
<label class="font-label-sm text-label-sm text-on-surface-variant mb-1">Obligation Status</label>
<select class="h-8 px-2 bg-surface-container-low rounded-lg font-label-sm text-label-sm text-on-surface focus:outline-none cursor-pointer">
<option>All Statuses</option>
<option>Upcoming</option>
<option>Due</option>
<option>Partially Paid</option>
<option>Paid (Verified)</option>
<option>Overdue</option>
<option>Pending Verification</option>
<option>Cancelled</option>
</select>
</div>
<div class="flex flex-col">
<label class="font-label-sm text-label-sm text-on-surface-variant mb-1">Due Date Range</label>
<div class="relative">
<input class="h-8 w-full px-2 bg-surface-container-low rounded-lg font-label-sm text-label-sm text-on-surface placeholder:text-outline focus:outline-none cursor-pointer" placeholder="Select cycle" type="text">
<span class="material-symbols-outlined text-[14px] text-outline absolute right-2 top-2">calendar_today</span>
</div>
</div>
</div>
</section>
<!-- Main Rent Schedule Table & Side Drawer Workspace -->
<section class="grid grid-cols-1 2xl:grid-cols-12 gap-space-lg mb-space-xl items-start">
<!-- Table Container (8 cols on 2xl) -->
<div class="2xl:col-span-8 rounded-xl bg-surface-container-lowest shadow-sm overflow-hidden flex flex-col">
<div class="p-space-md border-b border-surface-container flex items-center justify-between">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[20px]">account_balance_wallet</span>
<h2 class="font-headline-sm text-headline-sm text-on-surface">Rent Schedule & Obligation Registry</h2>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant bg-surface-container px-2 py-0.5 rounded">6 Active Records</span>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low text-on-surface-variant font-label-sm text-label-sm uppercase tracking-wider border-b border-surface-container">
<th class="py-3 px-3 font-semibold">Ref</th>
<th class="py-3 px-3 font-semibold">Tenant</th>
<th class="py-3 px-3 font-semibold">Property / Unit</th>
<th class="py-3 px-3 font-semibold">Contract</th>
<th class="py-3 px-2 font-semibold">Cadence</th>
<th class="py-3 px-2 font-semibold">Due Date</th>
<th class="py-3 px-2 font-semibold">Cur.</th>
<th class="py-3 px-3 font-semibold text-right">Amount Due</th>
<th class="py-3 px-3 font-semibold text-right">Verified Applied</th>
<th class="py-3 px-3 font-semibold text-right">Outstanding</th>
<th class="py-3 px-3 font-semibold text-center">Status</th>
<th class="py-3 px-2 font-semibold text-center">Action</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container font-body-sm text-body-sm">
<!-- Row 1: Ahmed Al-Farsi -->
<tr class="hover:bg-surface-container-low/60 transition-colors cursor-pointer group">
<td class="py-3.5 px-3 font-mono text-label-sm text-primary font-semibold">OBL-2026-001</td>
<td class="py-3.5 px-3 font-medium text-on-surface">Ahmed Al-Farsi</td>
<td class="py-3.5 px-3">
<div class="flex flex-col">
<span class="text-on-surface">Marina View Residences</span>
<span class="text-label-sm font-label-sm text-on-surface-variant">Unit MV-101</span>
</div>
</td>
<td class="py-3.5 px-3 font-mono text-label-sm text-on-surface-variant">CTR-2026-001</td>
<td class="py-3.5 px-2">Monthly</td>
<td class="py-3.5 px-2 text-on-surface-variant whitespace-nowrap">Established Period</td>
<td class="py-3.5 px-2 font-semibold text-secondary">USD</td>
<td class="py-3.5 px-3 text-right font-mono font-medium">2,100.00</td>
<td class="py-3.5 px-3 text-right">
<div class="flex flex-col items-end">
<span class="font-mono text-secondary font-medium">USD 2,100.00</span>
<span class="text-[10px] text-on-surface-variant font-mono">(from PAY-2026-001)</span>
</div>
</td>
<td class="py-3.5 px-3 text-right font-mono text-on-surface-variant">USD 0.00</td>
<td class="py-3.5 px-3 text-center">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-surface-container text-on-surface text-[11px] font-medium">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
<span>Paid (Verified)</span>
</span>
</td>
<td class="py-3.5 px-2 text-center">
<button class="p-1 rounded hover:bg-surface-container text-on-surface-variant hover:text-primary" type="button" data-demo="more_horiz" aria-label="more horiz">
<span class="material-symbols-outlined text-[18px]">more_horiz</span>
</button>
</td>
</tr>
<!-- Row 2: Fatima Al-Nuaimi (Selected in Drawer) -->
<tr class="bg-primary-fixed/20 border-l-4 border-primary transition-colors cursor-pointer group">
<td class="py-3.5 px-3 font-mono text-label-sm text-primary font-bold">OBL-2026-002</td>
<td class="py-3.5 px-3 font-semibold text-primary">Fatima Al-Nuaimi</td>
<td class="py-3.5 px-3">
<div class="flex flex-col">
<span class="text-on-surface font-medium">Palm Grove Chalets</span>
<span class="text-label-sm font-label-sm text-on-surface-variant">Unit PG-02</span>
</div>
</td>
<td class="py-3.5 px-3 font-mono text-label-sm text-on-surface-variant">CTR-2026-002</td>
<td class="py-3.5 px-2">Daily</td>
<td class="py-3.5 px-2 text-on-surface-variant whitespace-nowrap">Established Period</td>
<td class="py-3.5 px-2 font-semibold text-secondary">AED</td>
<td class="py-3.5 px-3 text-right font-mono font-medium">950.00</td>
<td class="py-3.5 px-3 text-right">
<div class="flex flex-col items-end">
<span class="font-mono text-tertiary-container font-medium">Pending Triage</span>
<span class="text-[10px] text-tertiary font-mono">(PAY-2026-002)</span>
</div>
</td>
<td class="py-3.5 px-3 text-right font-mono font-semibold text-primary">AED 950.00</td>
<td class="py-3.5 px-3 text-center">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed text-[11px] font-medium">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
<span>Pending Verification</span>
</span>
</td>
<td class="py-3.5 px-2 text-center">
<button class="p-1 rounded bg-surface-container text-primary" type="button" data-demo="visibility" aria-label="visibility">
<span class="material-symbols-outlined text-[18px]">visibility</span>
</button>
</td>
</tr>
<!-- Row 3: Daniel Carter -->
<tr class="hover:bg-surface-container-low/60 transition-colors cursor-pointer group">
<td class="py-3.5 px-3 font-mono text-label-sm text-primary font-semibold">OBL-2026-003</td>
<td class="py-3.5 px-3 font-medium text-on-surface">Daniel Carter</td>
<td class="py-3.5 px-3">
<div class="flex flex-col">
<span class="text-on-surface">Marina View Residences</span>
<span class="text-label-sm font-label-sm text-on-surface-variant">Unit MV-104</span>
</div>
</td>
<td class="py-3.5 px-3 font-mono text-label-sm text-on-surface-variant">CTR-2026-003</td>
<td class="py-3.5 px-2">Monthly</td>
<td class="py-3.5 px-2 text-on-surface-variant whitespace-nowrap">Periodic Cycle</td>
<td class="py-3.5 px-2 font-semibold text-secondary">USD</td>
<td class="py-3.5 px-3 text-right font-mono text-on-surface-variant">Amount Not Set</td>
<td class="py-3.5 px-3 text-right">
<div class="flex flex-col items-end">
<span class="font-mono text-tertiary-container">Pending Verification</span>
<span class="text-[10px] text-on-surface-variant font-mono">(PAY-2026-003)</span>
</div>
</td>
<td class="py-3.5 px-3 text-right font-mono text-outline">Not Recorded</td>
<td class="py-3.5 px-3 text-center">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed text-[11px] font-medium">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
<span>Pending Verification</span>
</span>
</td>
<td class="py-3.5 px-2 text-center">
<button class="p-1 rounded hover:bg-surface-container text-on-surface-variant hover:text-primary" type="button" data-demo="more_horiz" aria-label="more horiz">
<span class="material-symbols-outlined text-[18px]">more_horiz</span>
</button>
</td>
</tr>
<!-- Row 4: Mariam Hassan -->
<tr class="hover:bg-surface-container-low/60 transition-colors cursor-pointer group">
<td class="py-3.5 px-3 font-mono text-label-sm text-primary font-semibold">OBL-2026-004</td>
<td class="py-3.5 px-3 font-medium text-on-surface">Mariam Hassan</td>
<td class="py-3.5 px-3">
<div class="flex flex-col">
<span class="text-on-surface">Marina View Residences</span>
<span class="text-label-sm font-label-sm text-on-surface-variant">Unit MV-105</span>
</div>
</td>
<td class="py-3.5 px-3 font-mono text-label-sm text-on-surface-variant">CTR-2026-004</td>
<td class="py-3.5 px-2">Yearly</td>
<td class="py-3.5 px-2 text-on-surface-variant whitespace-nowrap">Annual Cycle</td>
<td class="py-3.5 px-2 font-semibold text-secondary">SAR</td>
<td class="py-3.5 px-3 text-right font-mono text-on-surface-variant">Amount Not Set</td>
<td class="py-3.5 px-3 text-right font-mono text-outline">USD/SAR Unlinked</td>
<td class="py-3.5 px-3 text-right font-mono text-outline">Not Recorded</td>
<td class="py-3.5 px-3 text-center">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface text-[11px] font-medium">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
<span>Due</span>
</span>
</td>
<td class="py-3.5 px-2 text-center">
<button class="p-1 rounded hover:bg-surface-container text-on-surface-variant hover:text-primary" type="button" data-demo="more_horiz" aria-label="more horiz">
<span class="material-symbols-outlined text-[18px]">more_horiz</span>
</button>
</td>
</tr>
<!-- Row 5: Unpaid Obligation 1 (Details Pending) -->
<tr class="hover:bg-surface-container-low/60 transition-colors cursor-pointer group">
<td class="py-3.5 px-3 font-mono text-label-sm text-primary font-semibold">OBL-2026-005</td>
<td class="py-3.5 px-3 font-medium text-outline italic">Details Pending</td>
<td class="py-3.5 px-3">
<div class="flex flex-col">
<span class="text-outline italic">Unassigned</span>
<span class="text-label-sm font-label-sm text-on-surface-variant">Portfolio Ledger</span>
</div>
</td>
<td class="py-3.5 px-3 font-mono text-label-sm text-outline italic">Pending Record</td>
<td class="py-3.5 px-2 text-outline">Cadence Not Set</td>
<td class="py-3.5 px-2 text-outline whitespace-nowrap">Due Date Not Set</td>
<td class="py-3.5 px-2 font-semibold text-secondary">SAR</td>
<td class="py-3.5 px-3 text-right font-mono text-outline italic">Details Pending</td>
<td class="py-3.5 px-3 text-right font-mono text-on-surface-variant">SAR 0.00</td>
<td class="py-3.5 px-3 text-right font-mono font-medium text-primary">Unpaid Obligation 1</td>
<td class="py-3.5 px-3 text-center">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface text-[11px] font-medium">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
<span>Due</span>
</span>
</td>
<td class="py-3.5 px-2 text-center">
<button class="p-1 rounded hover:bg-surface-container text-on-surface-variant hover:text-primary" type="button" data-demo="more_horiz" aria-label="more horiz">
<span class="material-symbols-outlined text-[18px]">more_horiz</span>
</button>
</td>
</tr>
<!-- Row 6: Unpaid Obligation 2 (Details Pending) -->
<tr class="hover:bg-surface-container-low/60 transition-colors cursor-pointer group">
<td class="py-3.5 px-3 font-mono text-label-sm text-primary font-semibold">OBL-2026-006</td>
<td class="py-3.5 px-3 font-medium text-outline italic">Details Pending</td>
<td class="py-3.5 px-3">
<div class="flex flex-col">
<span class="text-outline italic">Unassigned</span>
<span class="text-label-sm font-label-sm text-on-surface-variant">Portfolio Ledger</span>
</div>
</td>
<td class="py-3.5 px-3 font-mono text-label-sm text-outline italic">Pending Record</td>
<td class="py-3.5 px-2 text-outline">Cadence Not Set</td>
<td class="py-3.5 px-2 text-outline whitespace-nowrap">Due Date Not Set</td>
<td class="py-3.5 px-2 font-semibold text-secondary">AED</td>
<td class="py-3.5 px-3 text-right font-mono text-outline italic">Details Pending</td>
<td class="py-3.5 px-3 text-right font-mono text-on-surface-variant">AED 0.00</td>
<td class="py-3.5 px-3 text-right font-mono font-medium text-primary">Unpaid Obligation 2</td>
<td class="py-3.5 px-3 text-center">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface text-[11px] font-medium">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
<span>Due</span>
</span>
</td>
<td class="py-3.5 px-2 text-center">
<button class="p-1 rounded hover:bg-surface-container text-on-surface-variant hover:text-primary" type="button" data-demo="more_horiz" aria-label="more horiz">
<span class="material-symbols-outlined text-[18px]">more_horiz</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Table Footnote & Demarcation Rule -->
<div class="p-space-md bg-surface-container-low/50 border-t border-surface-container flex flex-col md:flex-row md:items-center justify-between gap-2 text-on-surface-variant font-label-sm text-label-sm">
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-secondary">verified</span>
<span>Ahmed Al-Farsi settled via PAY-2026-001. Fatima Al-Nuaimi PAY-2026-002 cash record remains in offline triage.</span>
</div>
<span class="text-outline">Al-Yasmin Compound II: 0 Active Rental Obligations</span>
</div>
</div>
<!-- Collection Detail Drawer (4 cols on 2xl) - Previews OBL-2026-002 -->
<div class="2xl:col-span-4 rounded-xl bg-surface-container-lowest shadow-md overflow-hidden flex flex-col">
<div class="p-space-md bg-surface-container border-b border-surface-container-high flex items-center justify-between">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-primary font-bold">Obligation Dossier</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface mt-0.5">OBL-2026-002</h3>
</div>
<div class="flex items-center gap-1">
<span class="inline-flex items-center px-2 py-0.5 rounded bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm">
            Pending Triage
          </span>
<button class="p-1 rounded hover:bg-surface-container-high text-on-surface-variant" type="button" data-demo="close" aria-label="close">
<span class="material-symbols-outlined text-[18px]">close</span>
</button>
</div>
</div>
<div class="p-space-md space-y-4">
<!-- Tenant & Property Details -->
<div class="grid grid-cols-2 gap-3 pb-3 border-b border-surface-container">
<div>
<span class="font-label-sm text-label-sm text-on-surface-variant block">Linked Tenant</span>
<span class="font-body-md text-body-md text-on-surface font-semibold">Fatima Al-Nuaimi</span>
</div>
<div>
<span class="font-label-sm text-label-sm text-on-surface-variant block">Contract Identifier</span>
<span class="font-mono text-label-md text-primary font-medium">CTR-2026-002</span>
</div>
<div>
<span class="font-label-sm text-label-sm text-on-surface-variant block">Property & Unit</span>
<span class="font-body-sm text-body-sm text-on-surface font-medium">Palm Grove Chalets</span>
<span class="font-label-sm text-label-sm text-on-surface-variant block">Unit PG-02</span>
</div>
<div>
<span class="font-label-sm text-label-sm text-on-surface-variant block">Rental Cadence</span>
<span class="font-body-sm text-body-sm text-on-surface">Daily (Short-Stay)</span>
<span class="font-label-sm text-label-sm text-on-surface-variant block">AED 950.00 / night</span>
</div>
</div>
<!-- Financial Position Balance Ledger -->
<div class="p-3 bg-surface-container-low rounded-lg space-y-2">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant">Original Amount</span>
<span class="font-mono text-label-md text-on-surface font-semibold">AED 950.00</span>
</div>
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant">Verified Payments Applied</span>
<span class="font-mono text-label-md text-on-surface font-medium">AED 0.00</span>
</div>
<div class="flex items-center justify-between pt-2 border-t border-surface-container">
<span class="font-label-sm text-label-sm text-primary font-bold uppercase">Remaining Balance</span>
<span class="font-mono text-headline-sm text-headline-sm text-primary font-bold">AED 950.00</span>
</div>
</div>
<!-- Related Payment Submission Card -->
<div class="p-3 bg-surface-container rounded-lg space-y-2">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm font-semibold text-on-surface flex items-center gap-1">
<span class="material-symbols-outlined text-[16px] text-secondary">payments</span>
<span>Related Submission: PAY-2026-002</span>
</span>
<span class="font-label-sm text-label-sm text-tertiary-container font-medium">Offline Physical Cash</span>
</div>
<p class="font-label-sm text-label-sm text-on-surface-variant leading-relaxed">
            Status: <strong class="text-on-surface">Pending Verification</strong><br>
            Evidence: Manager Cash Voucher Pending Physical Attestation
          </p>
</div>
<!-- Internal Notes -->
<div>
<span class="font-label-sm text-label-sm text-on-surface-variant block mb-1">Internal Operations Note</span>
<div class="p-2.5 bg-surface-container-low rounded font-body-sm text-body-sm text-on-surface text-xs leading-relaxed italic">
            “Tenant paid cash at property reception on check-in. Receptionist voucher pending Operations Manager formal attestation.”
          </div>
</div>
<!-- Guardrail Alert -->
<div class="p-3 bg-surface-container-high rounded-lg flex items-start gap-2">
<span class="material-symbols-outlined text-[18px] text-primary shrink-0 mt-0.5">shield</span>
<p class="font-label-sm text-label-sm text-on-surface-variant leading-tight">
<strong class="text-on-surface">Verification Guardrail:</strong> Verified payment can be allocated only after confirming the correct obligation and avoiding duplicate allocation. Automatic bank reconciliation is not active in Phase 1.
          </p>
</div>
<!-- Drawer Action Buttons -->
<div class="flex flex-col gap-2 pt-2">
<div class="grid grid-cols-2 gap-2">
<button class="px-3 py-2 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md flex items-center justify-center gap-1.5 transition-colors" type="button" data-demo="Review Evidence">
<span class="material-symbols-outlined text-[16px] text-secondary">visibility</span>
<span>Review Evidence</span>
</button>
<button class="px-3 py-2 rounded-lg bg-primary hover:bg-primary-container text-on-primary font-label-md text-label-md flex items-center justify-center gap-1.5 transition-colors" type="button" data-demo="Match Payment">
<span class="material-symbols-outlined text-[16px]">link</span>
<span>Match Payment</span>
</button>
</div>
<div class="grid grid-cols-3 gap-2">
<button class="px-2 py-1.5 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface font-label-sm text-label-sm flex items-center justify-center gap-1 transition-colors" type="button" data-demo="New Payment">
<span class="material-symbols-outlined text-[14px]">add</span>
<span>New Payment</span>
</button>
<button class="px-2 py-1.5 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface font-label-sm text-label-sm flex items-center justify-center gap-1 transition-colors" type="button" data-demo="Add Note">
<span class="material-symbols-outlined text-[14px]">edit_note</span>
<span>Add Note</span>
</button>
<button class="px-2 py-1.5 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface font-label-sm text-label-sm flex items-center justify-center gap-1 transition-colors" type="button" data-demo="Prepare Notice">
<span class="material-symbols-outlined text-[14px]">send</span>
<span>Prepare Notice</span>
</button>
</div>
</div>
</div>
</div>
</section>
<!-- 1. Manual Collection Workflow Pipeline -->
<section class="rounded-xl bg-surface-container-lowest p-space-lg shadow-sm mb-space-lg">
<div class="flex flex-col md:flex-row md:items-center justify-between gap-2 pb-space-md border-b border-surface-container mb-space-md">
<div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[20px]">account_tree</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Manual Collection Workflow Pipeline</h3>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">End-to-end audit lifecycle from contractual creation through offline settlement verification</p>
</div>
<div class="flex flex-wrap items-center gap-1.5">
<span class="px-2 py-0.5 rounded bg-surface-container font-label-sm text-label-sm text-on-surface-variant">Pending Verification</span>
<span class="px-2 py-0.5 rounded bg-surface-container font-label-sm text-label-sm text-on-surface-variant">Rejected Payment</span>
<span class="px-2 py-0.5 rounded bg-surface-container font-label-sm text-label-sm text-on-surface-variant">Partial Payment</span>
<span class="px-2 py-0.5 rounded bg-surface-container font-label-sm text-label-sm text-on-surface-variant">Unpaid Obligation</span>
<span class="px-2 py-0.5 rounded bg-primary-fixed font-label-sm text-label-sm text-primary font-semibold">Completed Collection</span>
</div>
</div>
<!-- Stepper Grid -->
<div class="grid grid-cols-1 md:grid-cols-6 gap-3 relative">
<!-- Step 1 -->
<div class="p-3 rounded-lg bg-surface-container-low flex flex-col justify-between">
<div>
<span class="font-label-sm text-label-sm text-primary font-bold uppercase">Step 01</span>
<h4 class="font-label-md text-label-md text-on-surface font-semibold mt-1">Obligation Created</h4>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-1 leading-tight">Contract terms generate schedule</p>
</div>
<span class="material-symbols-outlined text-outline text-[18px] mt-3">assignment_turned_in</span>
</div>
<!-- Step 2 -->
<div class="p-3 rounded-lg bg-surface-container-low flex flex-col justify-between">
<div>
<span class="font-label-sm text-label-sm text-primary font-bold uppercase">Step 02</span>
<h4 class="font-label-md text-label-md text-on-surface font-semibold mt-1">Due Date Reached</h4>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-1 leading-tight">Receivable marked active for collection</p>
</div>
<span class="material-symbols-outlined text-outline text-[18px] mt-3">calendar_month</span>
</div>
<!-- Step 3 -->
<div class="p-3 rounded-lg bg-surface-container-low flex flex-col justify-between">
<div>
<span class="font-label-sm text-label-sm text-primary font-bold uppercase">Step 03</span>
<h4 class="font-label-md text-label-md text-on-surface font-semibold mt-1">Offline Record</h4>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-1 leading-tight">Physical cash/cheque/wire receipt entered</p>
</div>
<span class="material-symbols-outlined text-outline text-[18px] mt-3">receipt</span>
</div>
<!-- Step 4 -->
<div class="p-3 rounded-lg bg-surface-container border-2 border-primary/20 flex flex-col justify-between">
<div>
<span class="font-label-sm text-label-sm text-primary font-bold uppercase">Step 04</span>
<h4 class="font-label-md text-label-md text-primary font-semibold mt-1">Manual Verification</h4>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-1 leading-tight">Manager attests physical bank voucher</p>
</div>
<span class="material-symbols-outlined text-primary text-[18px] mt-3">fact_check</span>
</div>
<!-- Step 5 -->
<div class="p-3 rounded-lg bg-surface-container-low flex flex-col justify-between">
<div>
<span class="font-label-sm text-label-sm text-primary font-bold uppercase">Step 05</span>
<h4 class="font-label-md text-label-md text-on-surface font-semibold mt-1">Match & Allocate</h4>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-1 leading-tight">Verified payment applied to specific ref</p>
</div>
<span class="material-symbols-outlined text-outline text-[18px] mt-3">link</span>
</div>
<!-- Step 6 -->
<div class="p-3 rounded-lg bg-primary-fixed/30 flex flex-col justify-between">
<div>
<span class="font-label-sm text-label-sm text-primary font-bold uppercase">Step 06</span>
<h4 class="font-label-md text-label-md text-primary font-semibold mt-1">Balance Settled</h4>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-1 leading-tight">Ledger updated & owner statement ready</p>
</div>
<span class="material-symbols-outlined text-primary text-[18px] mt-3">check_circle</span>
</div>
</div>
<div class="mt-4 pt-3 border-t border-surface-container flex items-center gap-2 text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[16px] text-primary">warning</span>
<span>Governance Mandate: Uploading payment evidence does NOT automatically mark an obligation as paid. Formal manager verification and allocation required.</span>
</div>
</section>
<!-- 2. Aging & Overdue Analysis (4 Bucket Cards) -->
<section class="rounded-xl bg-surface-container-lowest p-space-lg shadow-sm mb-space-lg">
<div class="flex items-center justify-between pb-space-md border-b border-surface-container mb-space-md">
<div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[20px]">timelapse</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Receivables Aging & Overdue Analysis</h3>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Bucket categorization across contractual maturity intervals</p>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">Strict Aging Protocol</span>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-space-md">
<!-- 0-30 Days -->
<div class="p-space-md rounded-xl bg-surface-container-low flex flex-col justify-between">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">0–30 Days</span>
<p class="font-body-sm text-body-sm text-outline italic mt-3">Aging Data Not Yet Available</p>
</div>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-4 pt-2 border-t border-surface-container">
          Requires finalized due dates & verified ledger balances.
        </p>
</div>
<!-- 31-60 Days -->
<div class="p-space-md rounded-xl bg-surface-container-low flex flex-col justify-between">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">31–60 Days</span>
<p class="font-body-sm text-body-sm text-outline italic mt-3">Aging Data Not Yet Available</p>
</div>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-4 pt-2 border-t border-surface-container">
          Clear distinction between Due and Overdue enforced.
        </p>
</div>
<!-- 61-90 Days -->
<div class="p-space-md rounded-xl bg-surface-container-low flex flex-col justify-between">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">61–90 Days</span>
<p class="font-body-sm text-body-sm text-outline italic mt-3">Aging Data Not Yet Available</p>
</div>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-4 pt-2 border-t border-surface-container">
          Zero simulated interest or penalty compounding.
        </p>
</div>
<!-- 90+ Days -->
<div class="p-space-md rounded-xl bg-surface-container-low flex flex-col justify-between">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">90+ Days</span>
<p class="font-body-sm text-body-sm text-outline italic mt-3">Aging Data Not Yet Available</p>
</div>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-4 pt-2 border-t border-surface-container">
          Pending Verification records isolated from delinquency.
        </p>
</div>
</div>
</section>
<!-- 3. Collection Reminders Center -->
<section class="rounded-xl bg-surface-container-lowest p-space-lg shadow-sm mb-space-lg">
<div class="flex flex-col md:flex-row md:items-center justify-between gap-2 pb-space-md border-b border-surface-container mb-space-md">
<div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[20px]">notifications_active</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Collection Reminders Center</h3>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Formal notice drafting for pending obligations and evidence reconciliation</p>
</div>
<div class="flex items-center gap-2">
<span class="inline-flex items-center gap-1 px-2.5 py-1 bg-surface-container-low rounded-lg font-label-sm text-label-sm text-on-surface">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
<span>In-App Active</span>
</span>
<span class="inline-flex items-center gap-1 px-2.5 py-1 bg-surface-container-low rounded-lg font-label-sm text-label-sm text-outline">
<span class="w-1.5 h-1.5 rounded-full bg-outline"></span>
<span>Email & WhatsApp Offline</span>
</span>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse font-body-sm text-body-sm">
<thead>
<tr class="bg-surface-container-low text-on-surface-variant font-label-sm text-label-sm uppercase tracking-wider border-b border-surface-container">
<th class="py-2.5 px-3">Tenant</th>
<th class="py-2.5 px-3">Property / Unit</th>
<th class="py-2.5 px-2">Due Date</th>
<th class="py-2.5 px-3">Reminder Type</th>
<th class="py-2.5 px-3">Channel</th>
<th class="py-2.5 px-3">Dispatch Status</th>
<th class="py-2.5 px-3 text-right">Action</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container">
<tr class="hover:bg-surface-container-low/50">
<td class="py-3 px-3 font-medium text-on-surface">Fatima Al-Nuaimi</td>
<td class="py-3 px-3 text-on-surface-variant">Palm Grove Chalets (PG-02)</td>
<td class="py-3 px-2 text-on-surface-variant">On Record</td>
<td class="py-3 px-3 text-on-surface">Payment Receipt Request</td>
<td class="py-3 px-3">
<span class="inline-flex items-center gap-1 font-label-sm text-label-sm text-secondary font-medium">
<span class="material-symbols-outlined text-[14px]">smartphone</span>
<span>In-App (Active)</span>
</span>
</td>
<td class="py-3 px-3">
<span class="inline-flex items-center px-2 py-0.5 rounded bg-surface-container font-label-sm text-label-sm text-on-surface">
                Draft Ready
              </span>
</td>
<td class="py-3 px-3 text-right">
<button class="px-2.5 py-1 rounded bg-surface-container hover:bg-surface-container-high text-primary font-label-sm text-label-sm font-semibold transition-colors" type="button" data-demo="Prepare Reminder">
                Prepare Reminder
              </button>
</td>
</tr>
<tr class="hover:bg-surface-container-low/50">
<td class="py-3 px-3 font-medium text-on-surface">Daniel Carter</td>
<td class="py-3 px-3 text-on-surface-variant">Marina View Residences (MV-104)</td>
<td class="py-3 px-2 text-on-surface-variant">Periodic</td>
<td class="py-3 px-3 text-on-surface">Payment Verification Notice</td>
<td class="py-3 px-3">
<span class="inline-flex items-center gap-1 font-label-sm text-label-sm text-secondary font-medium">
<span class="material-symbols-outlined text-[14px]">smartphone</span>
<span>In-App (Active)</span>
</span>
</td>
<td class="py-3 px-3">
<span class="inline-flex items-center px-2 py-0.5 rounded bg-surface-container font-label-sm text-label-sm text-on-surface">
                Draft Ready
              </span>
</td>
<td class="py-3 px-3 text-right">
<button class="px-2.5 py-1 rounded bg-surface-container hover:bg-surface-container-high text-primary font-label-sm text-label-sm font-semibold transition-colors" type="button" data-demo="Prepare Reminder">
                Prepare Reminder
              </button>
</td>
</tr>
</tbody>
</table>
</div>
<div class="mt-3 pt-2 text-on-surface-variant font-label-sm text-label-sm">
      Channels note: In-App Dispatch is available. Email (Not Connected — SMTP Required) and WhatsApp (Not Connected — Business API Required) are offline. No automated 24h SLAs or artificial penalty dispatches.
    </div>
</section>
<!-- 4. Multi-Currency Collection Summary & Sovereign Ledgers -->
<section class="rounded-xl bg-surface-container-lowest p-space-lg shadow-sm mb-space-lg">
<div class="flex items-center justify-between pb-space-md border-b border-surface-container mb-space-md">
<div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[20px]">currency_exchange</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Multi-Currency Collection Summary & Sovereign Ledgers</h3>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Segregated portfolio accounting avoiding algorithmic or synthetic exchange conversions</p>
</div>
<span class="font-label-sm text-label-sm text-secondary font-semibold">Strict Ledger Isolation</span>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-space-md">
<!-- SAR Ledger Card -->
<div class="p-space-md rounded-xl bg-surface-container-low flex flex-col justify-between">
<div>
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md font-bold text-on-surface">SAR (Saudi Riyal)</span>
<span class="font-mono text-label-sm text-primary font-bold">KSA Ledger</span>
</div>
<div class="space-y-2 mt-4">
<div class="flex justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant">Expected Rent:</span>
<span class="font-mono text-outline italic">Not Calculated</span>
</div>
<div class="flex justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant">Verified Collections:</span>
<span class="font-mono font-semibold text-on-surface">SAR 0.00</span>
</div>
<div class="flex justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant">Pending Verification:</span>
<span class="font-mono font-semibold text-on-surface">SAR 0.00</span>
</div>
</div>
</div>
<div class="mt-4 pt-3 border-t border-surface-container flex items-center justify-between">
<span class="font-label-sm text-label-sm text-primary font-bold">Outstanding Balance</span>
<span class="font-mono text-label-sm text-primary font-medium">Uncalculated Dues</span>
</div>
</div>
<!-- USD Ledger Card -->
<div class="p-space-md rounded-xl bg-surface-container-low flex flex-col justify-between">
<div>
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md font-bold text-on-surface">USD (US Dollar)</span>
<span class="font-mono text-label-sm text-primary font-bold">Global RE Ledger</span>
</div>
<div class="space-y-2 mt-4">
<div class="flex justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant">Expected Rent:</span>
<span class="font-mono text-outline italic">Not Calculated</span>
</div>
<div class="flex justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant">Verified Collections:</span>
<span class="font-mono font-semibold text-primary">USD 2,100.00</span>
</div>
<div class="flex justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant">Pending Verification:</span>
<span class="font-mono text-outline italic">Amount Not Set</span>
</div>
</div>
</div>
<div class="mt-4 pt-3 border-t border-surface-container flex items-center justify-between">
<span class="font-label-sm text-label-sm text-primary font-bold">Outstanding Balance</span>
<span class="font-mono text-label-sm text-on-surface font-semibold">USD 0.00 Verified</span>
</div>
</div>
<!-- AED Ledger Card -->
<div class="p-space-md rounded-xl bg-surface-container-low flex flex-col justify-between">
<div>
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md font-bold text-on-surface">AED (UAE Dirham)</span>
<span class="font-mono text-label-sm text-primary font-bold">UAE Ledger</span>
</div>
<div class="space-y-2 mt-4">
<div class="flex justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant">Expected Rent:</span>
<span class="font-mono text-outline italic">Not Calculated</span>
</div>
<div class="flex justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant">Verified Collections:</span>
<span class="font-mono font-semibold text-on-surface">AED 0.00</span>
</div>
<div class="flex justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant">Pending Verification:</span>
<span class="font-mono font-semibold text-tertiary-container">AED 950.00</span>
</div>
</div>
</div>
<div class="mt-4 pt-3 border-t border-surface-container flex items-center justify-between">
<span class="font-label-sm text-label-sm text-primary font-bold">Outstanding Balance</span>
<span class="font-mono text-label-sm text-primary font-semibold">AED 950.00 Pending</span>
</div>
</div>
</div>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-4 pt-2 border-t border-surface-container">
      Explicit Policy: Sovereign Currency Independence: Currencies are maintained in segregated ledgers without automated FX synthesis.
    </p>
</section>
<!-- 5. Owner Statements & Management Fees Panel -->
<section class="rounded-xl bg-surface-container-lowest p-space-lg shadow-sm mb-space-lg">
<div class="flex flex-col md:flex-row md:items-center justify-between gap-2 pb-space-md border-b border-surface-container mb-space-md">
<div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[20px]">real_estate_agent</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Owner Statements & Management Fees Panel</h3>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Institutional reporting segregated by asset owner, management mandates, and verified collected proceeds</p>
</div>
<span class="font-label-sm text-label-sm text-outline">Phase 1 Contract Rules Active</span>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse font-body-sm text-body-sm">
<thead>
<tr class="bg-surface-container-low text-on-surface-variant font-label-sm text-label-sm uppercase tracking-wider border-b border-surface-container">
<th class="py-2.5 px-3">Owner Entity</th>
<th class="py-2.5 px-3">Property Portfolio</th>
<th class="py-2.5 px-3">Units Configured</th>
<th class="py-2.5 px-3 text-right">Collected Rent</th>
<th class="py-2.5 px-3 text-right">Management Fee</th>
<th class="py-2.5 px-3 text-right">Net Due</th>
<th class="py-2.5 px-3 text-center">Status</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container">
<!-- Row 1: Muqrin -->
<tr class="hover:bg-surface-container-low/50">
<td class="py-3 px-3 font-semibold text-on-surface">Muqrin Real Estate Holdings Ltd.</td>
<td class="py-3 px-3">
<span class="text-on-surface font-medium">Al-Yasmin Compound II</span>
<span class="text-label-sm font-label-sm text-on-surface-variant block">(Saved — Unpublished)</span>
</td>
<td class="py-3 px-3 text-on-surface-variant">12 planned, 4 configured/vacant, 8 pending</td>
<td class="py-3 px-3 text-right font-mono font-medium">SAR 0.00</td>
<td class="py-3 px-3 text-right font-mono text-on-surface-variant">8.5% (AGR-2026-YAS-003)</td>
<td class="py-3 px-3 text-right font-mono font-semibold">SAR 0.00</td>
<td class="py-3 px-3 text-center">
<span class="inline-flex items-center px-2 py-0.5 rounded bg-surface-container text-on-surface-variant font-label-sm text-label-sm">
                No Rental Activity
              </span>
</td>
</tr>
<!-- Row 2: Al-Rajhi -->
<tr class="hover:bg-surface-container-low/50">
<td class="py-3 px-3 font-semibold text-on-surface">Al-Rajhi Family Trust</td>
<td class="py-3 px-3">Marina View Residences</td>
<td class="py-3 px-3 text-on-surface-variant">Contractual Terms on File</td>
<td class="py-3 px-3 text-right font-mono font-semibold text-primary">USD 2,100.00</td>
<td class="py-3 px-3 text-right font-mono text-on-surface-variant">Terms on File</td>
<td class="py-3 px-3 text-right font-mono font-medium text-secondary">In Settlement</td>
<td class="py-3 px-3 text-center">
<span class="inline-flex items-center px-2 py-0.5 rounded bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-medium">
                In Settlement
              </span>
</td>
</tr>
<!-- Row 3: Gulf Capital -->
<tr class="hover:bg-surface-container-low/50">
<td class="py-3 px-3 font-semibold text-on-surface">Gulf Capital Hospitality</td>
<td class="py-3 px-3">Palm Grove Chalets</td>
<td class="py-3 px-3 text-on-surface-variant">Contractual Terms on File</td>
<td class="py-3 px-3 text-right font-mono text-on-surface-variant">
<span>AED 0.00</span>
<span class="text-[10px] text-tertiary-container block">(AED 950 Pending)</span>
</td>
<td class="py-3 px-3 text-right font-mono text-on-surface-variant">Terms on File</td>
<td class="py-3 px-3 text-right font-mono text-outline">Awaiting Verification</td>
<td class="py-3 px-3 text-center">
<span class="inline-flex items-center px-2 py-0.5 rounded bg-surface-container text-on-surface font-label-sm text-label-sm">
                Awaiting Verification
              </span>
</td>
</tr>
</tbody>
</table>
</div>
<div class="mt-3 pt-2 text-on-surface-variant font-label-sm text-label-sm border-t border-surface-container">
      Footnote: 8.5% fee applies strictly to Al-Yasmin Compound II under agreement AGR-2026-YAS-003. No fee due from rental collections until rent is verified and collected.
    </div>
</section>
<!-- 6. Access Control & Financial Privacy & Export Console -->
<section class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg mb-space-lg">
<!-- RBAC Matrix Card (7 cols) -->
<div class="lg:col-span-7 rounded-xl bg-surface-container-lowest p-space-md shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center gap-2 pb-space-sm border-b border-surface-container mb-3">
<span class="material-symbols-outlined text-primary text-[18px]">verified_user</span>
<h4 class="font-label-md text-label-md text-on-surface font-bold">Access Control & Financial Privacy Matrix</h4>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
<div class="p-2.5 bg-surface-container-low rounded-lg">
<span class="font-label-sm text-label-sm font-semibold text-primary block">Operations Manager</span>
<span class="font-body-sm text-body-sm text-on-surface text-xs leading-tight">Full Portfolio Oversight & Verification Attestation</span>
</div>
<div class="p-2.5 bg-surface-container-low rounded-lg">
<span class="font-label-sm text-label-sm font-semibold text-secondary block">Finance Staff</span>
<span class="font-body-sm text-body-sm text-on-surface text-xs leading-tight">Payment Verification & Receivables Matching</span>
</div>
<div class="p-2.5 bg-surface-container-low rounded-lg">
<span class="font-label-sm text-label-sm font-semibold text-on-surface block">Property Manager</span>
<span class="font-body-sm text-body-sm text-on-surface text-xs leading-tight">Permitted Property Workflows & Tenant Follow-up</span>
</div>
<div class="p-2.5 bg-surface-container-low rounded-lg">
<span class="font-label-sm text-label-sm font-semibold text-outline block">Maintenance Staff</span>
<span class="font-body-sm text-body-sm text-outline text-xs leading-tight">No Access to Financial Records or Balances</span>
</div>
</div>
</div>
<div class="mt-3 pt-2 text-[11px] text-on-surface-variant flex items-center gap-1 border-t border-surface-container">
<span class="material-symbols-outlined text-[14px] text-outline">lock</span>
<span>Cryptographic session enforcement aligned with Sovereign Real Estate Data residency standards.</span>
</div>
</div>
<!-- Export Console Card (5 cols) -->
<div class="lg:col-span-5 rounded-xl bg-surface-container-lowest p-space-md shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between pb-space-sm border-b border-surface-container mb-3">
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-secondary text-[18px]">download</span>
<h4 class="font-label-md text-label-md text-on-surface font-bold">Export Console</h4>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">Instant Dispatch</span>
</div>
<div class="space-y-3">
<div>
<label class="font-label-sm text-label-sm text-on-surface-variant block mb-1">Target Format</label>
<div class="grid grid-cols-3 gap-2">
<button class="py-1.5 rounded bg-primary text-on-primary font-label-sm text-label-sm font-medium" type="button" data-demo="CSV">CSV</button>
<button class="py-1.5 rounded bg-surface-container-low hover:bg-surface-container text-on-surface font-label-sm text-label-sm" type="button" data-demo="XLSX">XLSX</button>
<button class="py-1.5 rounded bg-surface-container-low hover:bg-surface-container text-on-surface font-label-sm text-label-sm" type="button" data-demo="PDF">PDF</button>
</div>
</div>
<div>
<label class="font-label-sm text-label-sm text-on-surface-variant block mb-1">Scope</label>
<select class="w-full h-8 px-2 bg-surface-container-low rounded font-label-sm text-label-sm text-on-surface focus:outline-none">
<option>All Properties · All Sovereign Currencies</option>
<option>Marina View Residences (USD Only)</option>
<option>Palm Grove Chalets (AED Only)</option>
<option>Al-Yasmin Compound II (SAR Only)</option>
</select>
</div>
</div>
</div>
<div class="mt-3 pt-2 text-[11px] text-on-surface-variant leading-tight border-t border-surface-container">
        Notice: Exports adhere to active user permissions and preserve sovereign currency separation.
      </div>
</div>
</section>
</div>
@endsection
