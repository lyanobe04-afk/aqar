{{-- Imported from client_demo/screens/payments/code.html; static demonstration data. --}}
@extends('layouts.manager')
@section('content')
<div class="flex flex-col w-full">
<!-- Content Container with strict adherence to architectural elevation, zero-border policy, and spacing tokens -->
<div class="px-space-lg py-space-lg flex flex-col gap-space-lg">
<!-- PAGE HEADER & BREADCRUMBS -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-space-md">
<div class="flex flex-col gap-space-xs">
<div class="flex items-center gap-space-xs text-on-surface-variant font-label-md text-label-md">
<span class="hover:text-primary transition-colors cursor-pointer" role="button" tabindex="0" data-demo="Dashboard">Dashboard</span>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="text-on-surface font-headline-sm">Payments</span>
</div>
<div class="flex items-center gap-space-sm mt-1">
<h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Payments Management</h1>
<span class="px-2 py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed font-label-sm text-label-sm uppercase tracking-wider">GCC Enterprise</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant max-w-3xl">
          Record offline rent payments, review submitted payment evidence, manage outstanding balances, and track financial records across properties.
        </p>
</div>
<div class="flex items-center gap-space-sm flex-shrink-0">
<button class="h-10 px-space-md rounded-lg bg-surface-container-lowest text-on-surface font-label-lg text-label-lg shadow-sm hover:bg-surface-container-high transition-all flex items-center gap-space-xs" type="button" data-demo="Export Payment Records">
<span class="material-symbols-outlined text-[18px]">download</span>
<span>Export Payment Records</span>
</button>
<button class="h-10 px-space-md rounded-lg bg-primary text-on-primary font-label-lg text-label-lg shadow-sm hover:bg-primary-container transition-all flex items-center gap-space-xs" type="button" data-demo="+ Record Offline Payment">
<span class="material-symbols-outlined text-[18px]">add</span>
<span>+ Record Offline Payment</span>
</button>
</div>
</div>
<!-- 1. PHASE 1 PAYMENT POLICY BANNER -->
<div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm flex flex-col md:flex-row items-start gap-space-md relative overflow-hidden">
<div class="w-1.5 absolute inset-y-0 start-0 bg-primary"></div>
<div class="w-10 h-10 rounded-lg bg-primary-fixed flex items-center justify-center flex-shrink-0 text-primary">
<span class="material-symbols-outlined text-[24px]">verified_user</span>
</div>
<div class="flex flex-col flex-1 gap-1">
<div class="flex items-center gap-2">
<span class="font-headline-sm text-headline-sm text-on-surface">Offline Payment Management Protocol (Phase 1)</span>
<span class="px-2 py-0.5 rounded text-[11px] font-label-sm bg-surface-container-high text-on-surface-variant">Statutory Compliance</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          Phase 1 supports physical cash settlements, official bank wire transfers, manual offline record entries, administrative payment validation by authorized property managers, and secure physical/digital evidence attachments.
        </p>
<div class="mt-1 flex items-center gap-2 text-on-error-container bg-error-container/30 px-3 py-1.5 rounded-lg w-fit">
<span class="material-symbols-outlined text-[16px] text-error">info</span>
<span class="font-label-sm text-label-sm text-error">
            Strict Architecture Constraint: Does NOT support Stripe, credit card payments, online checkout gateways, automated recurring debits, automated refunds, or escrow integrations. All settlements are verified strictly offline.
          </span>
</div>
</div>
</div>
<!-- 2. PAYMENT SUMMARY KPI CARDS (Count-based metrics, independent currencies) -->
<div class="flex flex-col gap-space-xs">
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-space-md">
<!-- Total Payment Records -->
<div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Total Records</span>
<div class="w-8 h-8 rounded-lg bg-surface-container-high flex items-center justify-center text-on-surface-variant">
<span class="material-symbols-outlined text-[18px]">receipt_long</span>
</div>
</div>
<div class="mt-space-md flex flex-col">
<span class="font-headline-xl text-headline-xl text-on-surface font-headline-sm">16</span>
<span class="font-label-sm text-label-sm text-on-surface-variant mt-0.5">Across portfolio</span>
</div>
</div>
<!-- Verified Payments -->
<div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Verified</span>
<span class="px-2 py-0.5 rounded-full bg-[#EBF6F0] text-[#2E7D32] font-label-sm text-[11px] flex items-center gap-1">
<span class="w-1.5 h-1.5 rounded-full bg-[#2E7D32]"></span> Verified
            </span>
</div>
<div class="mt-space-md flex flex-col">
<span class="font-headline-xl text-headline-xl text-on-surface font-headline-sm">9</span>
<span class="font-label-sm text-label-sm text-on-surface-variant mt-0.5">Manager verified</span>
</div>
</div>
<!-- Pending Verification -->
<div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Pending</span>
<span class="px-2 py-0.5 rounded-full bg-[#FFFAEB] text-[#D35400] font-label-sm text-[11px] flex items-center gap-1">
<span class="w-1.5 h-1.5 rounded-full bg-[#D35400]"></span> Action Req.
            </span>
</div>
<div class="mt-space-md flex flex-col">
<span class="font-headline-xl text-headline-xl text-primary font-headline-sm">4</span>
<span class="font-label-sm text-label-sm text-on-surface-variant mt-0.5">Evidence submitted</span>
</div>
</div>
<!-- Rejected Records -->
<div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Rejected</span>
<div class="w-8 h-8 rounded-lg bg-[#FEF3F2] flex items-center justify-center text-[#C0392B]">
<span class="material-symbols-outlined text-[18px]">cancel</span>
</div>
</div>
<div class="mt-space-md flex flex-col">
<span class="font-headline-xl text-headline-xl text-on-surface font-headline-sm">1</span>
<span class="font-label-sm text-label-sm text-on-surface-variant mt-0.5">Incomplete / Invalid</span>
</div>
</div>
<!-- Unpaid Obligations -->
<div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Unpaid Dues</span>
<div class="w-8 h-8 rounded-lg bg-surface-container-high flex items-center justify-center text-on-surface-variant">
<span class="material-symbols-outlined text-[18px]">priority_high</span>
</div>
</div>
<div class="mt-space-md flex flex-col">
<span class="font-headline-xl text-headline-xl text-on-surface font-headline-sm">2</span>
<span class="font-label-sm text-label-sm text-on-surface-variant mt-0.5">Separate tenant liabilities</span>
</div>
</div>
</div>
<span class="font-body-sm text-[11px] text-on-surface-variant italic px-1">
        * The first 4 metrics represent recorded payment submissions (9 verified + 4 pending + 1 rejected + 2 draft = 16 records); Unpaid obligations are separate pending tenant liabilities. Figures are illustrative. Currencies are aggregated independently. Al-Yasmin Compound II currently has 0 payment records and 0 tenancies.
      </span>
</div>
<!-- 3. PAYMENT STATUS TABS -->
<div class="flex items-center gap-space-xs bg-surface-container-low p-1.5 rounded-xl overflow-x-auto shadow-sm">
<button class="px-space-md py-2 rounded-lg bg-primary text-on-primary font-label-lg text-label-lg shadow-sm flex items-center gap-2 whitespace-nowrap" type="button" data-demo="All Records 16">
<span>All Records</span>
<span class="px-1.5 py-0.2 rounded-full bg-white/20 text-on-primary font-label-sm text-label-sm">16</span>
</button>
<button class="px-space-md py-2 rounded-lg text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high font-label-lg text-label-lg transition-all flex items-center gap-2 whitespace-nowrap" type="button" data-demo="Pending Verification 4">
<span>Pending Verification</span>
<span class="px-1.5 py-0.2 rounded-full bg-surface-variant text-on-surface-variant font-label-sm text-label-sm">4</span>
</button>
<button class="px-space-md py-2 rounded-lg text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high font-label-lg text-label-lg transition-all flex items-center gap-2 whitespace-nowrap" type="button" data-demo="Verified 9">
<span>Verified</span>
<span class="px-1.5 py-0.2 rounded-full bg-surface-variant text-on-surface-variant font-label-sm text-label-sm">9</span>
</button>
<button class="px-space-md py-2 rounded-lg text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high font-label-lg text-label-lg transition-all flex items-center gap-2 whitespace-nowrap" type="button" data-demo="Rejected 1">
<span>Rejected</span>
<span class="px-1.5 py-0.2 rounded-full bg-surface-variant text-on-surface-variant font-label-sm text-label-sm">1</span>
</button>
<button class="px-space-md py-2 rounded-lg text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high font-label-lg text-label-lg transition-all flex items-center gap-2 whitespace-nowrap" type="button" data-demo="Draft 2">
<span>Draft</span>
<span class="px-1.5 py-0.2 rounded-full bg-surface-variant text-on-surface-variant font-label-sm text-label-sm">2</span>
</button>
<div class="h-5 w-px bg-outline-variant mx-1"></div>
<button class="px-space-md py-2 rounded-lg text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high font-label-lg text-label-lg transition-all flex items-center gap-2 whitespace-nowrap" type="button" data-demo="Unpaid Obligations 2 Separate">
<span>Unpaid Obligations</span>
<span class="px-1.5 py-0.2 rounded-full bg-error-container text-on-error-container font-label-sm text-label-sm">2 Separate</span>
</button>
</div>
<!-- 4. SEARCH & FILTERS TOOLBAR -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col gap-space-md">
<div class="flex flex-col lg:flex-row items-center gap-space-md">
<!-- Search bar -->
<div class="relative flex-1 w-full">
<span class="material-symbols-outlined absolute start-3 top-2.5 text-on-surface-variant text-[20px] pointer-events-none">search</span>
<input class="w-full h-10 ps-10 pe-space-md rounded-lg bg-surface-container-low text-on-surface font-body-sm text-body-sm placeholder:text-on-surface-variant focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all" placeholder="Search payment reference, tenant, property, or contract..." type="text">
</div>
<div class="flex items-center gap-space-xs w-full lg:w-auto overflow-x-auto pb-1 lg:pb-0">
<button class="h-10 px-space-md rounded-lg bg-surface-container-low text-on-surface font-label-md text-label-md flex items-center gap-space-xs hover:bg-surface-container-high transition-colors whitespace-nowrap" type="button" data-demo="Advanced Filters">
<span class="material-symbols-outlined text-[18px]">tune</span>
<span>Advanced Filters</span>
</button>
<button class="h-10 px-space-md rounded-lg bg-surface-container-low text-on-surface-variant font-label-md text-label-md hover:bg-surface-container-high hover:text-on-surface transition-colors whitespace-nowrap" type="button" data-demo="Clear Filters">
            Clear Filters
          </button>
</div>
</div>
<!-- Filter Controls Strip -->
<div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-8 gap-space-xs pt-1">
<select class="h-9 px-2 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface focus:outline-none cursor-pointer">
<option selected="">Property: All</option>
<option>Marina View Residences</option>
<option>Palm Grove Chalets</option>
<option>Al-Yasmin Compound II (0)</option>
</select>
<select class="h-9 px-2 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface focus:outline-none cursor-pointer">
<option selected="">Country: All GCC</option>
<option>Saudi Arabia</option>
<option>UAE</option>
<option>Kuwait</option>
</select>
<select class="h-9 px-2 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface focus:outline-none cursor-pointer">
<option selected="">Currency: All</option>
<option>USD</option>
<option>AED</option>
<option>SAR</option>
</select>
<select class="h-9 px-2 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface focus:outline-none cursor-pointer">
<option selected="">Method: All</option>
<option>Bank Transfer</option>
<option>Cash</option>
<option>Manager Cheque</option>
</select>
<select class="h-9 px-2 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface focus:outline-none cursor-pointer">
<option selected="">Status: All Statuses</option>
<option>Verified</option>
<option>Pending Verification</option>
<option>Rejected</option>
<option>Draft</option>
</select>
<select class="h-9 px-2 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface focus:outline-none cursor-pointer">
<option selected="">Period: All Periods</option>
<option>Q1 2026</option>
<option>Q2 2026</option>
<option>Annual 2026</option>
</select>
<select class="h-9 px-2 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface focus:outline-none cursor-pointer">
<option selected="">Date Range: All</option>
<option>Last 7 Days</option>
<option>Last 30 Days</option>
<option>Year to Date</option>
</select>
<select class="h-9 px-2 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface focus:outline-none cursor-pointer">
<option selected="">Manager: All</option>
<option>Eng. Sultan Al-Shammari</option>
<option>Noura Al-Dosari</option>
</select>
</div>
<div class="flex items-center justify-between text-on-surface-variant font-label-sm text-label-sm pt-1">
<span>Showing <strong class="text-on-surface font-headline-sm">6</strong> of <strong class="text-on-surface font-headline-sm">16</strong> Payment Records</span>
<span class="flex items-center gap-1 text-primary">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
          Independent currency aggregation active (No cross-currency conversion)
        </span>
</div>
</div>
<!-- 5. MAIN PAYMENTS DATA TABLE -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden flex flex-col">
<div class="overflow-x-auto">
<table class="w-full text-start border-collapse">
<thead>
<tr class="bg-surface-container-low text-on-surface-variant font-label-sm text-label-sm uppercase tracking-wider text-start">
<th class="py-3 px-space-md text-start">Payment Reference</th>
<th class="py-3 px-space-md text-start">Tenant / Payer</th>
<th class="py-3 px-space-md text-start">Property / Unit</th>
<th class="py-3 px-space-md text-start">Contract Reference</th>
<th class="py-3 px-space-md text-start">Amount & Currency</th>
<th class="py-3 px-space-md text-start">Payment Method</th>
<th class="py-3 px-space-md text-start">Date Recorded</th>
<th class="py-3 px-space-md text-start">Verification Status</th>
<th class="py-3 px-space-md text-start">Evidence</th>
<th class="py-3 px-space-md text-end">Actions</th>
</tr>
</thead>
<tbody class="divide-y-0 text-on-surface font-body-sm text-body-sm">
<!-- Row 1 -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-3.5 px-space-md font-headline-sm text-primary">PAY-2026-001</td>
<td class="py-3.5 px-space-md">
<div class="flex flex-col">
<span class="font-headline-sm text-on-surface">Ahmed Al-Farsi</span>
<span class="font-label-sm text-on-surface-variant text-[11px]">Primary Tenant</span>
</div>
</td>
<td class="py-3.5 px-space-md">
<div class="flex flex-col">
<span>Marina View Residences</span>
<span class="font-label-sm text-on-surface-variant">MV-101</span>
</div>
</td>
<td class="py-3.5 px-space-md font-label-md text-on-surface-variant">CTR-2026-001</td>
<td class="py-3.5 px-space-md font-headline-sm text-on-surface">USD 2,100</td>
<td class="py-3.5 px-space-md">
<span class="flex items-center gap-1.5 font-label-md">
<span class="material-symbols-outlined text-[16px] text-on-surface-variant">account_balance</span>
                  Bank Transfer
                </span>
</td>
<td class="py-3.5 px-space-md text-on-surface-variant font-label-md">Date Not Recorded</td>
<td class="py-3.5 px-space-md">
<span class="px-2.5 py-1 rounded-full bg-[#EBF6F0] text-[#2E7D32] font-label-sm text-[11px] inline-flex items-center gap-1.5">
<span class="w-1.5 h-1.5 rounded-full bg-[#2E7D32]"></span> Verified
                </span>
</td>
<td class="py-3.5 px-space-md">
<span class="px-2.5 py-1 rounded-full bg-[#EBF6F0] text-[#2E7D32] font-label-sm text-[11px] inline-flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">attachment</span> Evidence On File
                </span>
</td>
<td class="py-3.5 px-space-md text-end">
<button class="w-8 h-8 rounded-lg inline-flex items-center justify-center text-on-surface-variant hover:bg-surface-container-high transition-colors" type="button" data-demo="more_vert" aria-label="more vert">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 2 -->
<tr class="bg-primary/5 hover:bg-primary/10 transition-colors">
<td class="py-3.5 px-space-md font-headline-sm text-primary">PAY-2026-002</td>
<td class="py-3.5 px-space-md">
<div class="flex flex-col">
<span class="font-headline-sm text-on-surface">Fatima Al-Nuaimi</span>
<span class="font-label-sm text-on-surface-variant text-[11px]">Primary Tenant</span>
</div>
</td>
<td class="py-3.5 px-space-md">
<div class="flex flex-col">
<span>Palm Grove Chalets</span>
<span class="font-label-sm text-on-surface-variant">PG-02</span>
</div>
</td>
<td class="py-3.5 px-space-md font-label-md text-on-surface-variant">CTR-2026-002</td>
<td class="py-3.5 px-space-md font-headline-sm text-on-surface">AED 950</td>
<td class="py-3.5 px-space-md">
<span class="flex items-center gap-1.5 font-label-md">
<span class="material-symbols-outlined text-[16px] text-on-surface-variant">payments</span>
                  Cash
                </span>
</td>
<td class="py-3.5 px-space-md text-on-surface-variant font-label-md">Date Not Recorded</td>
<td class="py-3.5 px-space-md">
<span class="px-2.5 py-1 rounded-full bg-[#FFFAEB] text-[#D35400] font-label-sm text-[11px] inline-flex items-center gap-1.5">
<span class="w-1.5 h-1.5 rounded-full bg-[#D35400]"></span> Pending Verification
                </span>
</td>
<td class="py-3.5 px-space-md">
<span class="px-2.5 py-1 rounded-full bg-[#FFFAEB] text-[#D35400] font-label-sm text-[11px] inline-flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">warning</span> Evidence Not Uploaded
                </span>
</td>
<td class="py-3.5 px-space-md text-end">
<button class="w-8 h-8 rounded-lg inline-flex items-center justify-center text-on-surface-variant hover:bg-surface-container-high transition-colors" type="button" data-demo="more_vert" aria-label="more vert">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-3.5 px-space-md font-headline-sm text-primary">PAY-2026-003</td>
<td class="py-3.5 px-space-md">
<div class="flex flex-col">
<span class="font-headline-sm text-on-surface">Daniel Carter</span>
<span class="font-label-sm text-on-surface-variant text-[11px]">Commercial Tenant</span>
</div>
</td>
<td class="py-3.5 px-space-md">
<div class="flex flex-col">
<span>Marina View Residences</span>
<span class="font-label-sm text-on-surface-variant">MV-104</span>
</div>
</td>
<td class="py-3.5 px-space-md font-label-md text-on-surface-variant">CTR-2026-003</td>
<td class="py-3.5 px-space-md text-on-surface-variant italic font-body-sm">Amount Not Set</td>
<td class="py-3.5 px-space-md">
<span class="flex items-center gap-1.5 font-label-md">
<span class="material-symbols-outlined text-[16px] text-on-surface-variant">account_balance</span>
                  Bank Transfer
                </span>
</td>
<td class="py-3.5 px-space-md text-on-surface-variant font-label-md">Date Not Recorded</td>
<td class="py-3.5 px-space-md">
<span class="px-2.5 py-1 rounded-full bg-[#FFFAEB] text-[#D35400] font-label-sm text-[11px] inline-flex items-center gap-1.5">
<span class="w-1.5 h-1.5 rounded-full bg-[#D35400]"></span> Pending Verification
                </span>
</td>
<td class="py-3.5 px-space-md">
<span class="px-2.5 py-1 rounded-full bg-[#F0F4F8] text-[#364E68] font-label-sm text-[11px] inline-flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">file_present</span> Evidence Submitted
                </span>
</td>
<td class="py-3.5 px-space-md text-end">
<button class="w-8 h-8 rounded-lg inline-flex items-center justify-center text-on-surface-variant hover:bg-surface-container-high transition-colors" type="button" data-demo="more_vert" aria-label="more vert">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 4 -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-3.5 px-space-md font-headline-sm text-primary">PAY-2026-004</td>
<td class="py-3.5 px-space-md">
<div class="flex flex-col">
<span class="font-headline-sm text-on-surface">Mariam Hassan</span>
<span class="font-label-sm text-on-surface-variant text-[11px]">Primary Tenant</span>
</div>
</td>
<td class="py-3.5 px-space-md">
<div class="flex flex-col">
<span>Marina View Residences</span>
<span class="font-label-sm text-on-surface-variant">MV-105</span>
</div>
</td>
<td class="py-3.5 px-space-md font-label-md text-on-surface-variant">CTR-2026-004</td>
<td class="py-3.5 px-space-md text-on-surface-variant italic font-body-sm">Amount Not Set</td>
<td class="py-3.5 px-space-md">
<span class="flex items-center gap-1.5 font-label-md">
<span class="material-symbols-outlined text-[16px] text-on-surface-variant">account_balance</span>
                  Bank Transfer
                </span>
</td>
<td class="py-3.5 px-space-md text-on-surface-variant font-label-md">Date Not Recorded</td>
<td class="py-3.5 px-space-md">
<span class="px-2.5 py-1 rounded-full bg-[#EBF6F0] text-[#2E7D32] font-label-sm text-[11px] inline-flex items-center gap-1.5">
<span class="w-1.5 h-1.5 rounded-full bg-[#2E7D32]"></span> Verified
                </span>
</td>
<td class="py-3.5 px-space-md">
<span class="px-2.5 py-1 rounded-full bg-[#EBF6F0] text-[#2E7D32] font-label-sm text-[11px] inline-flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">attachment</span> Evidence On File
                </span>
</td>
<td class="py-3.5 px-space-md text-end">
<button class="w-8 h-8 rounded-lg inline-flex items-center justify-center text-on-surface-variant hover:bg-surface-container-high transition-colors" type="button" data-demo="more_vert" aria-label="more vert">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 5 -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-3.5 px-space-md font-headline-sm text-primary">PAY-2026-005</td>
<td class="py-3.5 px-space-md">
<div class="flex flex-col">
<span class="font-headline-sm text-on-surface">Assigned Tenant</span>
<span class="font-label-sm text-on-surface-variant text-[11px]">Unlinked Account</span>
</div>
</td>
<td class="py-3.5 px-space-md">
<div class="flex flex-col">
<span>Marina View Residences</span>
<span class="font-label-sm text-on-surface-variant">Unit Unspecified</span>
</div>
</td>
<td class="py-3.5 px-space-md text-on-surface-variant italic font-body-sm">Contract Not Linked</td>
<td class="py-3.5 px-space-md text-on-surface-variant italic font-body-sm">Amount Not Set</td>
<td class="py-3.5 px-space-md">
<span class="flex items-center gap-1.5 font-label-md">
<span class="material-symbols-outlined text-[16px] text-on-surface-variant">payments</span>
                  Cash
                </span>
</td>
<td class="py-3.5 px-space-md text-on-surface-variant font-label-md">Date Not Recorded</td>
<td class="py-3.5 px-space-md">
<span class="px-2.5 py-1 rounded-full bg-[#FEF3F2] text-[#C0392B] font-label-sm text-[11px] inline-flex items-center gap-1.5">
<span class="w-1.5 h-1.5 rounded-full bg-[#C0392B]"></span> Rejected
                </span>
</td>
<td class="py-3.5 px-space-md">
<span class="px-2.5 py-1 rounded-full bg-[#FEF3F2] text-[#C0392B] font-label-sm text-[11px] inline-flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">error_outline</span> Requires Review
                </span>
</td>
<td class="py-3.5 px-space-md text-end">
<button class="w-8 h-8 rounded-lg inline-flex items-center justify-center text-on-surface-variant hover:bg-surface-container-high transition-colors" type="button" data-demo="more_vert" aria-label="more vert">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 6 -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-3.5 px-space-md font-headline-sm text-primary">PAY-2026-006</td>
<td class="py-3.5 px-space-md text-on-surface-variant italic font-body-sm">Unassigned</td>
<td class="py-3.5 px-space-md text-on-surface-variant italic font-body-sm">Property Not Assigned</td>
<td class="py-3.5 px-space-md text-on-surface-variant italic font-body-sm">Not Linked</td>
<td class="py-3.5 px-space-md text-on-surface-variant italic font-body-sm">Amount Not Set</td>
<td class="py-3.5 px-space-md text-on-surface-variant italic font-body-sm">Method Not Selected</td>
<td class="py-3.5 px-space-md text-on-surface-variant font-label-md">Date Not Recorded</td>
<td class="py-3.5 px-space-md">
<span class="px-2.5 py-1 rounded-full bg-surface-container-high text-on-surface-variant font-label-sm text-[11px] inline-flex items-center gap-1.5">
<span class="w-1.5 h-1.5 rounded-full bg-on-surface-variant"></span> Draft
                </span>
</td>
<td class="py-3.5 px-space-md">
<span class="px-2.5 py-1 rounded-full bg-surface-container-high text-on-surface-variant font-label-sm text-[11px] inline-flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">draft</span> Not Uploaded
                </span>
</td>
<td class="py-3.5 px-space-md text-end">
<button class="w-8 h-8 rounded-lg inline-flex items-center justify-center text-on-surface-variant hover:bg-surface-container-high transition-colors" type="button" data-demo="more_vert" aria-label="more vert">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination bar -->
<div class="p-space-md bg-surface-container-low/30 flex items-center justify-between">
<span class="font-body-sm text-body-sm text-on-surface-variant">
          Showing <span class="font-headline-sm text-on-surface">1–6</span> of <span class="font-headline-sm text-on-surface">16</span> payment records
        </span>
<div class="flex items-center gap-space-xs">
<button class="w-8 h-8 rounded-lg flex items-center justify-center text-on-surface-variant/40 bg-surface-container-low cursor-not-allowed" disabled="" type="button" data-demo="chevron_left" aria-label="chevron left">
<span class="material-symbols-outlined text-[18px]">chevron_left</span>
</button>
<button class="w-8 h-8 rounded-lg flex items-center justify-center font-label-md text-label-md bg-primary text-on-primary shadow-sm" type="button" data-demo="1">1</button>
<button class="w-8 h-8 rounded-lg flex items-center justify-center font-label-md text-label-md text-on-surface-variant hover:bg-surface-container-high transition-colors" type="button" data-demo="2">2</button>
<button class="w-8 h-8 rounded-lg flex items-center justify-center font-label-md text-label-md text-on-surface-variant hover:bg-surface-container-high transition-colors" type="button" data-demo="3">3</button>
<button class="w-8 h-8 rounded-lg flex items-center justify-center text-on-surface-variant bg-surface-container-low hover:bg-surface-container-high transition-colors" type="button" data-demo="chevron_right" aria-label="chevron right">
<span class="material-symbols-outlined text-[18px]">chevron_right</span>
</button>
</div>
</div>
</div>
<!-- 6. VERIFICATION QUEUE & SELECTED PAYMENT REVIEW -->
<div class="flex flex-col gap-space-md">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2">
<h2 class="font-headline-md text-headline-md text-on-surface">4 Payments Awaiting Verification</h2>
<span class="px-2 py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed font-label-sm text-label-sm">High Priority Queue</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">Manual auditor review mandate strictly applied</span>
</div>
<!-- Preview Cards Row -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-space-md">
<!-- Card A (Selected state) -->
<div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-md ring-2 ring-primary flex flex-col justify-between">
<div class="flex items-start justify-between">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center">
<span class="material-symbols-outlined text-[20px]">payments</span>
</div>
<div class="flex flex-col">
<div class="flex items-center gap-2">
<span class="font-headline-sm text-headline-sm text-primary">PAY-2026-002</span>
<span class="px-2 py-0.5 rounded-full bg-[#FFFAEB] text-[#D35400] font-label-sm text-[10px]">Pending Verification</span>
</div>
<span class="font-label-lg text-label-lg text-on-surface">Fatima Al-Nuaimi</span>
</div>
</div>
<div class="text-end">
<span class="font-headline-md text-headline-md text-on-surface">AED 950</span>
<span class="block font-label-sm text-label-sm text-on-surface-variant">Cash Settlement</span>
</div>
</div>
<div class="mt-space-md pt-space-sm bg-surface-container-low/40 p-2.5 rounded-lg flex items-center justify-between font-label-sm text-label-sm text-on-surface-variant">
<span>Palm Grove Chalets (Unit PG-02)</span>
<div class="flex items-center gap-space-xs">
<button class="px-2.5 py-1 rounded bg-surface-container-lowest text-on-surface font-label-md text-label-md hover:bg-surface-container-high transition-colors" type="button" data-demo="View Evidence">View Evidence</button>
<button class="px-2.5 py-1 rounded bg-primary text-on-primary font-label-md text-label-md shadow-sm" type="button" data-demo="Reviewing">Reviewing</button>
</div>
</div>
</div>
<!-- Card B -->
<div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
<div class="flex items-start justify-between">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-lg bg-surface-container-high text-on-surface-variant flex items-center justify-center">
<span class="material-symbols-outlined text-[20px]">account_balance</span>
</div>
<div class="flex flex-col">
<div class="flex items-center gap-2">
<span class="font-headline-sm text-headline-sm text-on-surface">PAY-2026-003</span>
<span class="px-2 py-0.5 rounded-full bg-[#FFFAEB] text-[#D35400] font-label-sm text-[10px]">Pending Verification</span>
</div>
<span class="font-label-lg text-label-lg text-on-surface">Daniel Carter</span>
</div>
</div>
<div class="text-end">
<span class="font-headline-md text-headline-md text-on-surface-variant italic">Amount Not Set</span>
<span class="block font-label-sm text-label-sm text-on-surface-variant">Bank Transfer</span>
</div>
</div>
<div class="mt-space-md pt-space-sm bg-surface-container-low/40 p-2.5 rounded-lg flex items-center justify-between font-label-sm text-label-sm text-on-surface-variant">
<span>Marina View Residences (Unit MV-104)</span>
<div class="flex items-center gap-space-xs">
<button class="px-2.5 py-1 rounded bg-surface-container-lowest text-on-surface font-label-md text-label-md hover:bg-surface-container-high transition-colors" type="button" data-demo="View Evidence">View Evidence</button>
<button class="px-2.5 py-1 rounded bg-surface-container-high text-on-surface font-label-md text-label-md hover:bg-primary hover:text-on-primary transition-colors" type="button" data-demo="Review Payment">Review Payment</button>
</div>
</div>
</div>
</div>
<!-- SELECTED PAYMENT REVIEW PANEL (PAY-2026-002) -->
<div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm flex flex-col gap-space-lg">
<div class="flex flex-col lg:flex-row lg:items-center justify-between gap-space-md pb-space-sm bg-surface-container-low/50 p-space-md rounded-xl">
<div class="flex flex-wrap items-center gap-x-space-lg gap-y-space-xs font-label-md text-label-md text-on-surface">
<div>
<span class="text-on-surface-variant font-label-sm block">Reference</span>
<strong class="font-headline-sm text-primary">PAY-2026-002</strong>
</div>
<div>
<span class="text-on-surface-variant font-label-sm block">Tenant</span>
<span class="font-headline-sm">Fatima Al-Nuaimi</span>
</div>
<div>
<span class="text-on-surface-variant font-label-sm block">Property & Unit</span>
<span>Palm Grove Chalets (PG-02)</span>
</div>
<div>
<span class="text-on-surface-variant font-label-sm block">Contract Link</span>
<span class="font-headline-sm">CTR-2026-002</span>
</div>
<div>
<span class="text-on-surface-variant font-label-sm block">Amount</span>
<strong class="font-headline-sm text-on-surface">AED 950</strong>
</div>
<div>
<span class="text-on-surface-variant font-label-sm block">Method</span>
<span>Cash Physical</span>
</div>
<div>
<span class="text-on-surface-variant font-label-sm block">Evidence State</span>
<span class="text-error font-label-sm">Not Uploaded</span>
</div>
</div>
<span class="px-3 py-1 rounded-full bg-[#FFFAEB] text-[#D35400] font-label-sm text-label-sm flex items-center gap-1.5 self-start lg:self-auto">
<span class="w-2 h-2 rounded-full bg-[#D35400]"></span> Pending Manager Sign-off
          </span>
</div>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-space-lg">
<!-- Manager Review Checklist -->
<div class="flex flex-col gap-space-sm">
<span class="font-headline-sm text-headline-sm text-on-surface">Manager Review Checklist</span>
<div class="flex flex-col gap-2 bg-surface-container-low p-space-md rounded-xl">
<label class="flex items-center gap-space-sm cursor-pointer">
<input checked="" class="w-4 h-4 rounded text-primary focus:ring-0 cursor-not-allowed accent-primary" disabled="" type="checkbox">
<span class="font-body-sm text-body-sm text-on-surface font-label-md">Payer identified (<span class="font-headline-sm">Fatima Al-Nuaimi</span>)</span>
</label>
<label class="flex items-center gap-space-sm cursor-pointer">
<input checked="" class="w-4 h-4 rounded text-primary focus:ring-0 cursor-not-allowed accent-primary" disabled="" type="checkbox">
<span class="font-body-sm text-body-sm text-on-surface font-label-md">Contract linked (<span class="font-headline-sm">CTR-2026-002</span>)</span>
</label>
<label class="flex items-center gap-space-sm cursor-pointer">
<input checked="" class="w-4 h-4 rounded text-primary focus:ring-0 cursor-not-allowed accent-primary" disabled="" type="checkbox">
<span class="font-body-sm text-body-sm text-on-surface font-label-md">Amount confirmed (<span class="font-headline-sm">AED 950</span>)</span>
</label>
<label class="flex items-center gap-space-sm cursor-pointer">
<input checked="" class="w-4 h-4 rounded text-primary focus:ring-0 cursor-not-allowed accent-primary" disabled="" type="checkbox">
<span class="font-body-sm text-body-sm text-on-surface font-label-md">Payment method confirmed (Cash on site)</span>
</label>
<label class="flex items-center gap-space-sm cursor-pointer">
<input class="w-4 h-4 rounded text-primary focus:ring-0 accent-primary" type="checkbox">
<span class="font-body-sm text-body-sm text-on-surface">Supporting evidence reviewed (<span class="text-error">Manager Cash Receipt Pending</span>)</span>
</label>
<label class="flex items-center gap-space-sm cursor-pointer">
<input class="w-4 h-4 rounded text-primary focus:ring-0 accent-primary" type="checkbox">
<span class="font-body-sm text-body-sm text-on-surface">Duplicate payment checked (Pending physical reconciliation)</span>
</label>
</div>
<p class="font-body-sm text-[11px] text-on-surface-variant italic">
              * Cash payments require a signed manager-issued receipt or certified physical acknowledgment prior to ledger sign-off.
            </p>
</div>
<!-- Audit Log & Sign-off Actions -->
<div class="flex flex-col justify-between gap-space-md">
<div class="flex flex-col gap-space-xs bg-surface-container-low p-space-md rounded-xl">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Audit Trail & Attestation Note</span>
<div class="flex items-center gap-space-sm text-on-surface font-body-sm text-body-sm mt-1">
<span class="material-symbols-outlined text-[18px] text-primary">person</span>
<span>Reviewing Officer: <strong>Eng. Sultan Al-Shammari</strong> (ID #MGR-4091)</span>
</div>
<textarea class="w-full h-20 p-2.5 rounded-lg bg-surface-container-lowest text-on-surface font-body-sm text-body-sm placeholder:text-on-surface-variant focus:outline-none focus:ring-2 focus:ring-primary/20 resize-none mt-2" placeholder="Add administrative verification notes or non-compliance rationale..."></textarea>
</div>
<div class="flex flex-wrap items-center justify-end gap-space-sm">
<button class="h-10 px-space-md rounded-lg bg-surface-container-low text-on-surface font-label-md text-label-md hover:bg-surface-container-high transition-colors" type="button" data-demo="Request More Information">
                Request More Information
              </button>
<button class="h-10 px-space-md rounded-lg bg-error-container text-on-error-container font-label-md text-label-md hover:bg-error hover:text-on-error transition-colors" type="button" data-demo="Reject Record">
                Reject Record
              </button>
<button class="h-10 px-space-md rounded-lg bg-primary text-on-primary font-label-md text-label-md shadow-sm hover:bg-primary-container transition-all flex items-center gap-space-xs" type="button" data-demo="Mark as Verified (Requires Manager Sign-off)">
<span class="material-symbols-outlined text-[18px]">verified</span>
<span>Mark as Verified (Requires Manager Sign-off)</span>
</button>
</div>
</div>
</div>
</div>
</div>
<!-- 7. LOWER SECTION: TWO-COLUMN FINANCIAL ARCHITECTURE & WORKFLOW -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-space-lg">
<!-- LEFT COLUMN: Financial Overview & Outstanding Obligations -->
<div class="flex flex-col gap-space-lg">
<!-- Financial Overview by Sovereign Currency -->
<div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm flex flex-col gap-space-md">
<div class="flex items-center justify-between">
<div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined text-primary text-[22px]">account_balance_wallet</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Financial Overview by Sovereign Currency</h3>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">Independent Currency Ledger</span>
</div>
<div class="grid grid-cols-1 sm:grid-cols-3 gap-space-sm">
<!-- USD -->
<div class="p-space-md rounded-xl bg-surface-container-low flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant">USD Portfolio</span>
<span class="px-1.5 py-0.5 rounded bg-surface-container-high font-label-sm text-[10px]">USD</span>
</div>
<div class="mt-space-md flex flex-col">
<span class="font-headline-md text-headline-md text-on-surface-variant italic">Not Calculated</span>
<span class="font-label-sm text-label-sm text-on-surface-variant mt-0.5">Aggregated by Currency Ledger</span>
</div>
</div>
<!-- AED -->
<div class="p-space-md rounded-xl bg-surface-container-low flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant">AED Portfolio</span>
<span class="px-1.5 py-0.5 rounded bg-surface-container-high font-label-sm text-[10px]">AED</span>
</div>
<div class="mt-space-md flex flex-col">
<span class="font-headline-md text-headline-md text-on-surface-variant italic">Not Calculated</span>
<span class="font-label-sm text-label-sm text-on-surface-variant mt-0.5">Aggregated by Currency Ledger</span>
</div>
</div>
<!-- SAR -->
<div class="p-space-md rounded-xl bg-surface-container-low flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant">SAR Portfolio</span>
<span class="px-1.5 py-0.5 rounded bg-surface-container-high font-label-sm text-[10px]">SAR</span>
</div>
<div class="mt-space-md flex flex-col">
<span class="font-headline-md text-headline-md text-on-surface-variant italic">Not Calculated</span>
<span class="font-label-sm text-label-sm text-on-surface-variant mt-0.5">Al-Yasmin Compound II - 0 SAR Verified</span>
</div>
</div>
</div>
<div class="p-3 rounded-lg bg-surface-container-low/50 flex items-start gap-2">
<span class="material-symbols-outlined text-[16px] text-on-surface-variant mt-0.5">lock</span>
<span class="font-body-sm text-[11px] text-on-surface-variant">
              Financial totals require complete records and currency-specific aggregation. USD, AED, and SAR are never commingled into a single artificial total, guaranteeing statutory audit correctness across GCC jurisdiction boundaries.
            </span>
</div>
</div>
<!-- Outstanding Obligations Card -->
<div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between gap-space-md">
<div class="flex items-center justify-between">
<div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined text-error text-[22px]">pending_actions</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Outstanding Tenant Obligations</h3>
</div>
<span class="px-2 py-0.5 rounded-full bg-[#FEF3F2] text-[#C0392B] font-label-sm text-[11px]">2 Pending Items</span>
</div>
<div class="p-space-md rounded-xl bg-surface-container-low flex flex-col md:flex-row md:items-center justify-between gap-space-md">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant">Unpaid Contractual Obligations</span>
<span class="font-headline-md text-headline-md text-on-surface">2 Tenant Accounts</span>
<span class="font-label-sm text-label-sm text-on-surface-variant mt-0.5">Total Amount: <em class="italic">Not Calculated</em> (Multiple Sovereign Currencies)</span>
</div>
<div class="flex items-center gap-space-xs">
<button class="px-3 py-2 rounded-lg bg-surface-container-lowest text-on-surface font-label-md text-label-md hover:bg-surface-container-high transition-colors" type="button" data-demo="View Outstanding Items">
                View Outstanding Items
              </button>
<button class="px-3 py-2 rounded-lg bg-primary text-on-primary font-label-md text-label-md shadow-sm hover:bg-primary-container transition-colors" type="button" data-demo="Record Payment">
                Record Payment
              </button>
</div>
</div>
<span class="font-body-sm text-[11px] text-on-surface-variant italic">
            * Formal disclaimer: No invented overdue penalties or arbitrary due dates are applied prior to verified contractual notice periods.
          </span>
</div>
</div>
<!-- RIGHT COLUMN: Payment Workflow Pipeline & Supporting Evidence Repository -->
<div class="flex flex-col gap-space-lg">
<!-- Payment Workflow Pipeline -->
<div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm flex flex-col gap-space-md">
<div class="flex items-center justify-between">
<div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined text-primary text-[22px]">schema</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Payment Workflow Pipeline (Phase 1)</h3>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">Offline Assurance</span>
</div>
<!-- Step Progression diagram -->
<div class="grid grid-cols-2 sm:grid-cols-3 gap-2 py-1">
<div class="p-2.5 rounded-lg bg-surface-container-low flex flex-col">
<span class="font-label-sm text-[10px] text-on-surface-variant">Step 01</span>
<span class="font-label-md text-on-surface font-headline-sm">Payment Obligation</span>
<span class="font-body-sm text-[11px] text-on-surface-variant">Contractual schedule</span>
</div>
<div class="p-2.5 rounded-lg bg-surface-container-low flex flex-col">
<span class="font-label-sm text-[10px] text-on-surface-variant">Step 02</span>
<span class="font-label-md text-on-surface font-headline-sm">Offline Payment</span>
<span class="font-body-sm text-[11px] text-on-surface-variant">Cash or wire transfer</span>
</div>
<div class="p-2.5 rounded-lg bg-surface-container-low flex flex-col">
<span class="font-label-sm text-[10px] text-on-surface-variant">Step 03</span>
<span class="font-label-md text-on-surface font-headline-sm">Record Submission</span>
<span class="font-body-sm text-[11px] text-on-surface-variant">Payer & reference log</span>
</div>
<div class="p-2.5 rounded-lg bg-surface-container-low flex flex-col">
<span class="font-label-sm text-[10px] text-on-surface-variant">Step 04</span>
<span class="font-label-md text-on-surface font-headline-sm">Evidence Review</span>
<span class="font-body-sm text-[11px] text-on-surface-variant">Voucher verification</span>
</div>
<div class="p-2.5 rounded-lg bg-surface-container-low flex flex-col">
<span class="font-label-sm text-[10px] text-on-surface-variant">Step 05</span>
<span class="font-label-md text-on-surface font-headline-sm">Manager Sign-off</span>
<span class="font-body-sm text-[11px] text-on-surface-variant">Auditor sign & stamp</span>
</div>
<div class="p-2.5 rounded-lg bg-primary-fixed flex flex-col text-on-primary-fixed">
<span class="font-label-sm text-[10px] opacity-75">Final Resolution</span>
<span class="font-label-md font-headline-sm">Verified / Rejected</span>
<span class="font-body-sm text-[11px] opacity-75">Ledger posting</span>
</div>
</div>
<div class="flex flex-col gap-1 text-on-surface-variant font-body-sm text-body-sm bg-surface-container-low/40 p-3 rounded-lg">
<span class="font-label-sm text-on-surface uppercase">Operational Governance Directives:</span>
<ul class="list-disc ps-4 flex flex-col gap-1 text-[12px]">
<li>Recording an offline payment does not constitute financial verification.</li>
<li>Pending payments are never counted as collected revenue in corporate balance sheets.</li>
<li>Rejected records are fully excluded from fiscal performance tallies.</li>
<li>No automated third-party banking APIs or webhooks operate in Phase 1 deployments.</li>
</ul>
</div>
</div>
<!-- Payment Records & Supporting Evidence Repository -->
<div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm flex flex-col gap-space-md">
<div class="flex items-center justify-between">
<div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined text-primary text-[22px]">folder_shared</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Supporting Evidence Repository</h3>
</div>
<span class="px-2 py-0.5 rounded bg-surface-container-high font-label-sm text-label-sm text-on-surface-variant">RBAC Level 3</span>
</div>
<div class="grid grid-cols-2 sm:grid-cols-4 gap-space-xs">
<div class="p-3 rounded-lg bg-surface-container-low flex flex-col items-center text-center gap-1">
<span class="material-symbols-outlined text-primary text-[24px]">receipt</span>
<span class="font-label-md text-label-md text-on-surface">Bank Transfers</span>
<span class="font-label-sm text-[11px] text-on-surface-variant">5 Vouchers</span>
</div>
<div class="p-3 rounded-lg bg-surface-container-low flex flex-col items-center text-center gap-1">
<span class="material-symbols-outlined text-primary text-[24px]">local_atm</span>
<span class="font-label-md text-label-md text-on-surface">Cash Receipts</span>
<span class="font-label-sm text-[11px] text-on-surface-variant">2 Stamped</span>
</div>
<div class="p-3 rounded-lg bg-surface-container-low flex flex-col items-center text-center gap-1">
<span class="material-symbols-outlined text-primary text-[24px]">signature</span>
<span class="font-label-md text-label-md text-on-surface">Manager Acks</span>
<span class="font-label-sm text-[11px] text-on-surface-variant">7 Signed</span>
</div>
<div class="p-3 rounded-lg bg-surface-container-low flex flex-col items-center text-center gap-1">
<span class="material-symbols-outlined text-primary text-[24px]">attach_file</span>
<span class="font-label-md text-label-md text-on-surface">Attachments</span>
<span class="font-label-sm text-[11px] text-on-surface-variant">12 Files</span>
</div>
</div>
<div class="flex items-center justify-between text-on-surface-variant font-label-sm text-label-sm pt-1">
<span class="flex items-center gap-1">
<span class="material-symbols-outlined text-[16px] text-primary">policy</span>
              Auditable archival in compliance with Gulf real estate accounting standards.
            </span>
<button class="text-primary font-headline-sm hover:underline" type="button" data-demo="Batch Download">Batch Download</button>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
