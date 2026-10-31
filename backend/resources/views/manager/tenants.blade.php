{{-- Imported from client_demo/screens/tenants/code.html; static demonstration data. --}}
@extends('layouts.manager')
@section('content')
<div class="flex flex-col w-full">
<!-- Top Page Header -->
<div class="flex flex-col lg:flex-row lg:items-end justify-between gap-space-md mb-space-lg">
<div class="flex flex-col gap-1">
<nav class="flex items-center gap-2 font-label-md text-label-md text-on-surface-variant">
<span>Dashboard</span>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="text-primary font-semibold">Tenants</span>
</nav>
<div class="flex items-center gap-space-sm mt-1">
<h1 class="font-headline-xl text-headline-xl text-on-surface tracking-tight">Tenants Management</h1>
<span class="bg-surface-container-high px-2 py-0.5 rounded text-on-surface-variant font-label-sm text-label-sm uppercase tracking-wider">GCC Enterprise</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant max-w-3xl">
        Manage tenant profiles, rental relationships, documentation, occupancy, and communication across properties.
      </p>
</div>
<!-- Actions -->
<div class="flex items-center gap-space-sm flex-wrap">
<button class="inline-flex items-center gap-2 h-10 px-4 rounded-lg bg-surface-container-lowest text-on-surface hover:bg-surface-container shadow-sm transition-all font-label-lg text-label-lg" type="button" data-demo="Export Tenants">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">file_download</span>
<span>Export Tenants</span>
</button>
<button class="inline-flex items-center gap-2 h-10 px-4 rounded-lg bg-primary-container text-on-primary hover:bg-primary shadow-sm hover:shadow transition-all font-label-lg text-label-lg" type="button" data-demo="Add New Tenant">
<span class="material-symbols-outlined text-[18px]">add</span>
<span>Add New Tenant</span>
</button>
</div>
</div>
<!-- 1. Tenant Summary KPI Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-space-md mb-space-xs">
<!-- Card 1 -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-all">
<div class="flex items-start justify-between">
<span class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Total Tenant Profiles</span>
<div class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[18px]">group</span>
</div>
</div>
<div class="mt-4 flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl text-on-surface">12</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Across portfolio</span>
</div>
<div class="w-full bg-surface-container h-1 rounded-full mt-3 overflow-hidden">
<div class="bg-primary h-full w-full"></div>
</div>
</div>
<!-- Card 2 -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-all">
<div class="flex items-start justify-between">
<span class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Active Tenancies</span>
<div class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-secondary">
<span class="material-symbols-outlined text-[18px]">key</span>
</div>
</div>
<div class="mt-4 flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl text-on-surface">10</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">83.3% Occupied</span>
</div>
<div class="w-full bg-surface-container h-1 rounded-full mt-3 overflow-hidden">
<div class="bg-primary-container h-full w-[83%]"></div>
</div>
</div>
<!-- Card 3 -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-all">
<div class="flex items-start justify-between">
<span class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Prospective Tenants</span>
<div class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-on-surface-variant">
<span class="material-symbols-outlined text-[18px]">person_search</span>
</div>
</div>
<div class="mt-4 flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl text-on-surface">2</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Pending unit</span>
</div>
<div class="w-full bg-surface-container h-1 rounded-full mt-3 overflow-hidden">
<div class="bg-secondary-container h-full w-[17%]"></div>
</div>
</div>
<!-- Card 4 -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-all">
<div class="flex items-start justify-between">
<span class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Document Reviews</span>
<div class="w-8 h-8 rounded-lg bg-error-container flex items-center justify-center text-on-error-container">
<span class="material-symbols-outlined text-[18px]">pending_actions</span>
</div>
</div>
<div class="mt-4 flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl text-error">3</span>
<span class="font-label-sm text-label-sm text-error">Requires audit</span>
</div>
<div class="w-full bg-surface-container h-1 rounded-full mt-3 overflow-hidden">
<div class="bg-error h-full w-[25%]"></div>
</div>
</div>
<!-- Card 5 -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-all">
<div class="flex items-start justify-between">
<span class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Move-Ins Scheduled</span>
<div class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-on-surface-variant">
<span class="material-symbols-outlined text-[18px]">local_shipping</span>
</div>
</div>
<div class="mt-4 flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl text-on-surface">0</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">None this week</span>
</div>
<div class="w-full bg-surface-container h-1 rounded-full mt-3 overflow-hidden">
<div class="bg-surface-container-highest h-full w-0"></div>
</div>
</div>
</div>
<!-- Portfolio note -->
<div class="flex items-center gap-2 px-space-sm py-1.5 mb-space-lg text-on-surface-variant">
<span class="material-symbols-outlined text-[16px] text-primary">info</span>
<p class="font-body-sm text-body-sm leading-normal">
      Illustrative portfolio data. Tenant profiles, active tenancy records, and occupied units are tracked independently. <span class="font-medium text-on-surface">Al-Yasmin Compound II</span> currently has 0 tenants, 0 active tenancies, and 0 occupied units.
    </p>
</div>
<!-- 2. Search & Multi-tier Filter Toolbar -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm p-space-md flex flex-col gap-space-sm mb-space-md">
<!-- Top row: Search and primary button controls -->
<div class="flex flex-col lg:flex-row gap-space-sm items-center justify-between">
<div class="relative w-full lg:max-w-xl">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]">search</span>
<input class="w-full h-10 pl-10 pr-4 bg-surface-container-low rounded-lg font-body-sm text-body-sm text-on-surface placeholder:text-on-surface-variant/70 focus:outline-none focus:bg-surface-container-lowest transition-all" placeholder="Search tenant name, tenant ID, property, or unit..." type="search">
</div>
<div class="flex items-center gap-space-sm w-full lg:w-auto justify-end">
<button class="h-10 px-3.5 rounded-lg bg-surface-container-low text-on-surface hover:bg-surface-container flex items-center gap-1.5 font-label-md text-label-md transition-colors" type="button" data-demo="Advanced Filters">
<span class="material-symbols-outlined text-[16px] text-on-surface-variant">filter_alt</span>
<span>Advanced Filters</span>
</button>
<button class="h-10 px-3 rounded-lg text-on-surface-variant hover:text-on-surface hover:bg-surface-container-low flex items-center gap-1 font-label-md text-label-md transition-colors" type="button" data-demo="Clear Filters">
<span class="material-symbols-outlined text-[16px]">restart_alt</span>
<span>Clear Filters</span>
</button>
</div>
</div>
<!-- Dropdowns Grid -->
<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-2 pt-space-xs">
<!-- Property -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm text-on-surface-variant">Property</label>
<select class="h-9 px-2 bg-surface-container-low rounded-lg font-body-sm text-body-sm text-on-surface focus:outline-none">
<option>All Properties</option>
<option>Al-Yasmin Compound II</option>
<option>Marina View Residences</option>
<option>Palm Grove Chalets</option>
</select>
</div>
<!-- Country -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm text-on-surface-variant">Country</label>
<select class="h-9 px-2 bg-surface-container-low rounded-lg font-body-sm text-body-sm text-on-surface focus:outline-none">
<option>All Jurisdictions</option>
<option>Saudi Arabia</option>
<option>UAE</option>
<option>Bahrain</option>
</select>
</div>
<!-- Tenant Status -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm text-on-surface-variant">Tenant Status</label>
<select class="h-9 px-2 bg-surface-container-low rounded-lg font-body-sm text-body-sm text-on-surface focus:outline-none">
<option>All Statuses</option>
<option>Active</option>
<option>Prospective</option>
<option>Archived</option>
</select>
</div>
<!-- Tenancy Status -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm text-on-surface-variant">Tenancy Status</label>
<select class="h-9 px-2 bg-surface-container-low rounded-lg font-body-sm text-body-sm text-on-surface focus:outline-none">
<option>All Tenancies</option>
<option>Active</option>
<option>Upcoming</option>
<option>Completed</option>
<option>None</option>
</select>
</div>
<!-- Document Review Status -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm text-on-surface-variant">Document Status</label>
<select class="h-9 px-2 bg-surface-container-low rounded-lg font-body-sm text-body-sm text-on-surface focus:outline-none">
<option>All Documents</option>
<option>Review Complete</option>
<option>Pending Review</option>
<option>Documents Missing</option>
<option>Requires Update</option>
</select>
</div>
<!-- Rental Period -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm text-on-surface-variant">Rental Period</label>
<select class="h-9 px-2 bg-surface-container-low rounded-lg font-body-sm text-body-sm text-on-surface focus:outline-none">
<option>All Periods</option>
<option>Daily</option>
<option>Weekly</option>
<option>Monthly</option>
<option>Yearly</option>
</select>
</div>
<!-- Assigned Manager -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm text-on-surface-variant">Assigned Manager</label>
<select class="h-9 px-2 bg-surface-container-low rounded-lg font-body-sm text-body-sm text-on-surface focus:outline-none">
<option>All Managers</option>
<option>Eng. Sultan Al-Shammari</option>
<option>Assigned Manager</option>
</select>
</div>
</div>
<!-- Filter Meta info -->
<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between pt-space-xs text-on-surface-variant text-label-md">
<div class="flex items-center gap-2">
<span class="font-label-lg text-label-lg font-semibold text-on-surface">Showing 6 of 12 Tenant Profiles</span>
<span class="w-1.5 h-1.5 rounded-full bg-surface-container-highest"></span>
<span class="text-on-surface-variant font-label-md text-label-md">Filters active: 0</span>
</div>
<div class="flex items-center gap-1.5 text-on-surface-variant font-label-sm text-label-sm mt-1 sm:mt-0">
<span class="material-symbols-outlined text-[15px] text-primary">verified_user</span>
<span>Sensitive personal contact identifiers protected under role-based access control</span>
</div>
</div>
</div>
<!-- 3. Main Tenants Enterprise Table -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden mb-space-lg">
<div class="w-full overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low text-on-surface-variant font-label-md text-label-md uppercase tracking-wider">
<th class="py-3.5 px-4 w-10 text-center">
<input class="rounded accent-primary w-4 h-4 cursor-pointer" type="checkbox">
</th>
<th class="py-3.5 px-4">Tenant ID</th>
<th class="py-3.5 px-4">Tenant Name</th>
<th class="py-3.5 px-4">Property / Unit</th>
<th class="py-3.5 px-4">Country</th>
<th class="py-3.5 px-4">Tenant Status</th>
<th class="py-3.5 px-4">Tenancy Status</th>
<th class="py-3.5 px-4">Lease Period</th>
<th class="py-3.5 px-4">Document Status</th>
<th class="py-3.5 px-4">Assigned Manager</th>
<th class="py-3.5 px-4 text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container font-body-md text-body-md">
<!-- Row 1 (TEN-001) - Active selection highlight -->
<tr class="hover:bg-surface-container-low transition-colors bg-surface-container-low/40">
<td class="py-3.5 px-4 text-center">
<input checked="" class="rounded accent-primary w-4 h-4 cursor-pointer" type="checkbox">
</td>
<td class="py-3.5 px-4 font-mono font-medium text-primary text-body-sm">TEN-001</td>
<td class="py-3.5 px-4">
<div class="flex items-center gap-2.5">
<div class="w-7 h-7 rounded-full bg-primary-container text-on-primary font-label-sm text-label-sm flex items-center justify-center font-bold">AF</div>
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-on-surface leading-tight">Ahmed Al-Farsi</span>
<span class="font-label-sm text-label-sm text-on-surface-variant font-mono">ID: SA-****8821</span>
</div>
</div>
</td>
<td class="py-3.5 px-4">
<div class="flex flex-col">
<span class="font-medium text-on-surface">Marina View Residences</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Unit MV-101 (2BR)</span>
</div>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 font-label-md text-label-md text-on-surface">
<span class="w-2 h-2 rounded-full bg-secondary"></span> UAE
              </span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container text-on-surface font-label-sm text-label-sm">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span> Active Profile
              </span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container text-primary font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Active Tenancy
              </span>
</td>
<td class="py-3.5 px-4 font-label-md text-label-md text-on-surface">Monthly</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-surface-container text-primary font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[14px]">check_circle</span> Review Complete
              </span>
</td>
<td class="py-3.5 px-4 font-body-sm text-body-sm text-on-surface-variant">Eng. Sultan Al-Shammari</td>
<td class="py-3.5 px-4 text-right">
<button class="p-1 rounded hover:bg-surface-container text-on-surface-variant hover:text-on-surface" type="button" data-demo="more_horiz" aria-label="more horiz">
<span class="material-symbols-outlined text-[18px]">more_horiz</span>
</button>
</td>
</tr>
<!-- Row 2 (TEN-002) -->
<tr class="hover:bg-surface-container-low transition-colors">
<td class="py-3.5 px-4 text-center">
<input class="rounded accent-primary w-4 h-4 cursor-pointer" type="checkbox">
</td>
<td class="py-3.5 px-4 font-mono font-medium text-primary text-body-sm">TEN-002</td>
<td class="py-3.5 px-4">
<div class="flex items-center gap-2.5">
<div class="w-7 h-7 rounded-full bg-secondary text-on-secondary font-label-sm text-label-sm flex items-center justify-center font-bold">FN</div>
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-on-surface leading-tight">Fatima Al-Nuaimi</span>
<span class="font-label-sm text-label-sm text-on-surface-variant font-mono">ID: AE-****4901</span>
</div>
</div>
</td>
<td class="py-3.5 px-4">
<div class="flex flex-col">
<span class="font-medium text-on-surface">Palm Grove Chalets</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Unit PG-02 (Villa)</span>
</div>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 font-label-md text-label-md text-on-surface">
<span class="w-2 h-2 rounded-full bg-secondary"></span> UAE
              </span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container text-on-surface font-label-sm text-label-sm">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span> Active Profile
              </span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container text-primary font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Active Stay
              </span>
</td>
<td class="py-3.5 px-4 font-label-md text-label-md text-on-surface">Daily</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-surface-container text-primary font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[14px]">check_circle</span> Review Complete
              </span>
</td>
<td class="py-3.5 px-4 font-body-sm text-body-sm text-on-surface-variant">Assigned Manager</td>
<td class="py-3.5 px-4 text-right">
<button class="p-1 rounded hover:bg-surface-container text-on-surface-variant hover:text-on-surface" type="button" data-demo="more_horiz" aria-label="more horiz">
<span class="material-symbols-outlined text-[18px]">more_horiz</span>
</button>
</td>
</tr>
<!-- Row 3 (TEN-003) -->
<tr class="hover:bg-surface-container-low transition-colors">
<td class="py-3.5 px-4 text-center">
<input class="rounded accent-primary w-4 h-4 cursor-pointer" type="checkbox">
</td>
<td class="py-3.5 px-4 font-mono font-medium text-primary text-body-sm">TEN-003</td>
<td class="py-3.5 px-4">
<div class="flex items-center gap-2.5">
<div class="w-7 h-7 rounded-full bg-surface-container-high text-on-surface font-label-sm text-label-sm flex items-center justify-center font-bold">DC</div>
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-on-surface leading-tight">Daniel Carter</span>
<span class="font-label-sm text-label-sm text-on-surface-variant font-mono">ID: GB-****7119</span>
</div>
</div>
</td>
<td class="py-3.5 px-4">
<div class="flex flex-col">
<span class="font-medium text-on-surface">Marina View Residences</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Unit MV-104 (1BR)</span>
</div>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 font-label-md text-label-md text-on-surface">
<span class="w-2 h-2 rounded-full bg-secondary"></span> UAE
              </span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container text-on-surface font-label-sm text-label-sm">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span> Active Profile
              </span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container text-primary font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Active Tenancy
              </span>
</td>
<td class="py-3.5 px-4 font-label-md text-label-md text-on-surface">Monthly</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-tertiary-fixed text-on-tertiary-fixed-variant font-label-sm text-label-sm font-semibold">
<span class="material-symbols-outlined text-[14px]">warning</span> Review Pending
              </span>
</td>
<td class="py-3.5 px-4 font-body-sm text-body-sm text-on-surface-variant">Assigned Manager</td>
<td class="py-3.5 px-4 text-right">
<button class="p-1 rounded hover:bg-surface-container text-on-surface-variant hover:text-on-surface" type="button" data-demo="more_horiz" aria-label="more horiz">
<span class="material-symbols-outlined text-[18px]">more_horiz</span>
</button>
</td>
</tr>
<!-- Row 4 (TEN-004) -->
<tr class="hover:bg-surface-container-low transition-colors">
<td class="py-3.5 px-4 text-center">
<input class="rounded accent-primary w-4 h-4 cursor-pointer" type="checkbox">
</td>
<td class="py-3.5 px-4 font-mono font-medium text-primary text-body-sm">TEN-004</td>
<td class="py-3.5 px-4">
<div class="flex items-center gap-2.5">
<div class="w-7 h-7 rounded-full bg-primary-container text-on-primary font-label-sm text-label-sm flex items-center justify-center font-bold">MH</div>
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-on-surface leading-tight">Mariam Hassan</span>
<span class="font-label-sm text-label-sm text-on-surface-variant font-mono">ID: AE-****0092</span>
</div>
</div>
</td>
<td class="py-3.5 px-4">
<div class="flex flex-col">
<span class="font-medium text-on-surface">Marina View Residences</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Unit MV-105 (3BR)</span>
</div>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 font-label-md text-label-md text-on-surface">
<span class="w-2 h-2 rounded-full bg-secondary"></span> UAE
              </span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container text-on-surface font-label-sm text-label-sm">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span> Active Profile
              </span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container text-primary font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Active Tenancy
              </span>
</td>
<td class="py-3.5 px-4 font-label-md text-label-md text-on-surface">Yearly</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-surface-container text-primary font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[14px]">check_circle</span> Review Complete
              </span>
</td>
<td class="py-3.5 px-4 font-body-sm text-body-sm text-on-surface-variant">Assigned Manager</td>
<td class="py-3.5 px-4 text-right">
<button class="p-1 rounded hover:bg-surface-container text-on-surface-variant hover:text-on-surface" type="button" data-demo="more_horiz" aria-label="more horiz">
<span class="material-symbols-outlined text-[18px]">more_horiz</span>
</button>
</td>
</tr>
<!-- Row 5 (TEN-005) -->
<tr class="hover:bg-surface-container-low transition-colors">
<td class="py-3.5 px-4 text-center">
<input class="rounded accent-primary w-4 h-4 cursor-pointer" type="checkbox">
</td>
<td class="py-3.5 px-4 font-mono font-medium text-primary text-body-sm">TEN-005</td>
<td class="py-3.5 px-4">
<div class="flex items-center gap-2.5">
<div class="w-7 h-7 rounded-full bg-surface-container-high text-on-surface font-label-sm text-label-sm flex items-center justify-center font-bold">SM</div>
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-on-surface leading-tight">Sara Mahmoud</span>
<span class="font-label-sm text-label-sm text-on-surface-variant font-mono">ID: EG-****1382</span>
</div>
</div>
</td>
<td class="py-3.5 px-4">
<span class="font-body-sm text-body-sm text-on-surface-variant italic">No Unit Assigned</span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 font-label-md text-label-md text-on-surface">
<span class="w-2 h-2 rounded-full bg-secondary"></span> UAE
              </span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-secondary-fixed text-on-secondary-fixed-variant font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span> Prospective
              </span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center px-2 py-0.5 rounded bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm">
                No Active Tenancy
              </span>
</td>
<td class="py-3.5 px-4 font-body-sm text-body-sm text-on-surface-variant">Not Set</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-error-container text-on-error-container font-label-sm text-label-sm font-semibold">
<span class="material-symbols-outlined text-[14px]">error</span> Documents Missing
              </span>
</td>
<td class="py-3.5 px-4 font-body-sm text-body-sm text-on-surface-variant">Assigned Manager</td>
<td class="py-3.5 px-4 text-right">
<button class="p-1 rounded hover:bg-surface-container text-on-surface-variant hover:text-on-surface" type="button" data-demo="more_horiz" aria-label="more horiz">
<span class="material-symbols-outlined text-[18px]">more_horiz</span>
</button>
</td>
</tr>
<!-- Row 6 (TEN-006) -->
<tr class="hover:bg-surface-container-low transition-colors">
<td class="py-3.5 px-4 text-center">
<input class="rounded accent-primary w-4 h-4 cursor-pointer" type="checkbox">
</td>
<td class="py-3.5 px-4 font-mono font-medium text-primary text-body-sm">TEN-006</td>
<td class="py-3.5 px-4">
<div class="flex items-center gap-2.5">
<div class="w-7 h-7 rounded-full bg-surface-container-high text-on-surface font-label-sm text-label-sm flex items-center justify-center font-bold">OK</div>
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-on-surface leading-tight">Omar Khalid</span>
<span class="font-label-sm text-label-sm text-on-surface-variant font-mono">ID: KW-****3094</span>
</div>
</div>
</td>
<td class="py-3.5 px-4">
<span class="font-body-sm text-body-sm text-on-surface-variant italic">No Unit Assigned</span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 font-label-md text-label-md text-on-surface">
<span class="w-2 h-2 rounded-full bg-secondary"></span> UAE
              </span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-secondary-fixed text-on-secondary-fixed-variant font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span> Prospective
              </span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center px-2 py-0.5 rounded bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm">
                No Active Tenancy
              </span>
</td>
<td class="py-3.5 px-4 font-body-sm text-body-sm text-on-surface-variant">Not Set</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-tertiary-fixed text-on-tertiary-fixed-variant font-label-sm text-label-sm font-semibold">
<span class="material-symbols-outlined text-[14px]">warning</span> Review Pending
              </span>
</td>
<td class="py-3.5 px-4 font-body-sm text-body-sm text-on-surface-variant">Assigned Manager</td>
<td class="py-3.5 px-4 text-right">
<button class="p-1 rounded hover:bg-surface-container text-on-surface-variant hover:text-on-surface" type="button" data-demo="more_horiz" aria-label="more horiz">
<span class="material-symbols-outlined text-[18px]">more_horiz</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination Footer -->
<div class="p-space-md bg-surface-container-lowest flex flex-col sm:flex-row items-center justify-between gap-space-sm border-t border-surface-container-high">
<span class="font-label-md text-label-md text-on-surface-variant">
        Showing <span class="font-semibold text-on-surface">1–6</span> of <span class="font-semibold text-on-surface">12</span> tenant profiles
      </span>
<div class="flex items-center gap-1">
<button class="p-1.5 rounded-lg text-on-surface-variant opacity-40 cursor-not-allowed" disabled="" type="button" data-demo="chevron_left" aria-label="chevron left">
<span class="material-symbols-outlined text-[18px]">chevron_left</span>
</button>
<button class="w-8 h-8 rounded-lg bg-primary-container text-on-primary font-label-md text-label-md font-semibold" type="button" data-demo="1">1</button>
<button class="w-8 h-8 rounded-lg text-on-surface hover:bg-surface-container font-label-md text-label-md" type="button" data-demo="2">2</button>
<button class="p-1.5 rounded-lg text-on-surface hover:bg-surface-container" type="button" data-demo="chevron_right" aria-label="chevron right">
<span class="material-symbols-outlined text-[18px]">chevron_right</span>
</button>
</div>
</div>
</div>
<!-- 4. Two-Column Operational Details Section -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg mb-space-xl">
<!-- LEFT COLUMN (7 Cols) -->
<div class="lg:col-span-7 flex flex-col gap-space-lg">
<!-- Dossier Card -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm p-space-lg flex flex-col gap-space-md">
<div class="flex items-start justify-between pb-space-xs border-b border-surface-container">
<div class="flex items-center gap-space-sm">
<div class="w-12 h-12 rounded-xl bg-primary text-on-primary flex items-center justify-center font-headline-md text-headline-md font-bold shadow-sm">
              AF
            </div>
<div class="flex flex-col">
<div class="flex items-center gap-2">
<h3 class="font-headline-md text-headline-md text-on-surface">TEN-001 — Ahmed Al-Farsi</h3>
<span class="px-2 py-0.5 rounded-full bg-surface-container text-primary font-label-sm text-label-sm font-semibold">Primary Active</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">GCC Resident Profile • Tenant since Feb 2023</span>
</div>
</div>
<span class="material-symbols-outlined text-primary text-[22px]">badge</span>
</div>
<!-- Detail Metrics Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col gap-1">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Associated Property</span>
<span class="font-headline-sm text-headline-sm text-on-surface">Marina View Residences</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Dubai Marina, UAE</span>
</div>
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col gap-1">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Allocated Unit</span>
<span class="font-headline-sm text-headline-sm text-on-surface">MV-101 (2BR Apartment)</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Level 10 • Marina Front</span>
</div>
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col gap-1">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Tenancy Status & Cadence</span>
<div class="flex items-center gap-2">
<span class="font-headline-sm text-headline-sm text-primary">Active Tenancy</span>
<span class="font-label-sm text-label-sm bg-surface-container-high px-1.5 py-0.5 rounded text-on-surface">Monthly</span>
</div>
<span class="font-label-md text-label-md text-on-surface font-semibold">USD 2,100 / month</span>
</div>
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col gap-1">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Assigned Operations Manager</span>
<span class="font-headline-sm text-headline-sm text-on-surface">Eng. Sultan Al-Shammari</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Regional GCC Directorate</span>
</div>
</div>
<!-- RBAC Protected Contact & Compliance Banner -->
<div class="p-space-sm rounded-lg bg-surface-container flex items-start gap-space-sm">
<span class="material-symbols-outlined text-[20px] text-primary mt-0.5">shield</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Protected Contact Information (RBAC Level 3)</span>
<p class="font-body-sm text-body-sm text-on-surface-variant">
              Phone, personal email, and identity copies are masked. Authorization token valid for operations review under protocol ISO-27701.
            </p>
</div>
</div>
<!-- Action Bar -->
<div class="flex flex-wrap items-center gap-2 pt-2">
<button class="h-9 px-3.5 rounded-lg bg-primary-container text-on-primary hover:bg-primary font-label-md text-label-md transition-colors flex items-center gap-1.5" type="button" data-demo="View Full Profile">
<span class="material-symbols-outlined text-[16px]">visibility</span>
<span>View Full Profile</span>
</button>
<a class="h-9 px-3.5 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface font-label-md text-label-md transition-colors flex items-center gap-1.5" href="{{ route('manager.contracts') }}">
<span class="material-symbols-outlined text-[16px] text-on-surface-variant">contract</span>
<span>Tenancy Details</span>
</a>
<a class="h-9 px-3.5 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface font-label-md text-label-md transition-colors flex items-center gap-1.5" href="{{ route('manager.documents') }}">
<span class="material-symbols-outlined text-[16px] text-on-surface-variant">folder_open</span>
<span>Documents (4)</span>
</a>
<button class="h-9 px-3.5 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface font-label-md text-label-md transition-colors flex items-center gap-1.5" type="button" data-demo="Communication History">
<span class="material-symbols-outlined text-[16px] text-on-surface-variant">chat</span>
<span>Communication History</span>
</button>
</div>
</div>
<!-- Tenant Lifecycle Pipeline -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm p-space-lg flex flex-col gap-space-md">
<div class="flex items-center justify-between pb-space-xs border-b border-surface-container">
<div class="flex flex-col">
<h3 class="font-headline-sm text-headline-sm text-on-surface">Tenant Operational Lifecycle</h3>
<span class="font-body-sm text-body-sm text-on-surface-variant">Standard operating progression for property leases</span>
</div>
<span class="font-label-sm text-label-sm px-2 py-0.5 rounded bg-surface-container-high text-on-surface-variant uppercase">Phase 7 of 9</span>
</div>
<!-- Timeline / Flow -->
<div class="relative overflow-x-auto py-2">
<div class="flex items-center min-w-[700px] justify-between relative">
<!-- Background connecting line -->
<div class="absolute left-3 right-3 top-3 h-0.5 bg-surface-container -z-0"></div>
<!-- Step 1 -->
<div class="flex flex-col items-center gap-1.5 relative z-10">
<div class="w-6 h-6 rounded-full bg-primary text-on-primary flex items-center justify-center font-label-sm text-[10px]">✓</div>
<span class="font-label-sm text-label-sm text-on-surface text-center">1. Prospective</span>
</div>
<!-- Step 2 -->
<div class="flex flex-col items-center gap-1.5 relative z-10">
<div class="w-6 h-6 rounded-full bg-primary text-on-primary flex items-center justify-center font-label-sm text-[10px]">✓</div>
<span class="font-label-sm text-label-sm text-on-surface text-center">2. Profile Created</span>
</div>
<!-- Step 3 -->
<div class="flex flex-col items-center gap-1.5 relative z-10">
<div class="w-6 h-6 rounded-full bg-primary text-on-primary flex items-center justify-center font-label-sm text-[10px]">✓</div>
<span class="font-label-sm text-label-sm text-on-surface text-center">3. Documents Reviewed</span>
</div>
<!-- Step 4 -->
<div class="flex flex-col items-center gap-1.5 relative z-10">
<div class="w-6 h-6 rounded-full bg-primary text-on-primary flex items-center justify-center font-label-sm text-[10px]">✓</div>
<span class="font-label-sm text-label-sm text-on-surface text-center">4. Booking Approved</span>
</div>
<!-- Step 5 -->
<div class="flex flex-col items-center gap-1.5 relative z-10">
<div class="w-6 h-6 rounded-full bg-primary text-on-primary flex items-center justify-center font-label-sm text-[10px]">✓</div>
<span class="font-label-sm text-label-sm text-on-surface text-center">5. Contract Active</span>
</div>
<!-- Step 6 -->
<div class="flex flex-col items-center gap-1.5 relative z-10">
<div class="w-6 h-6 rounded-full bg-primary text-on-primary flex items-center justify-center font-label-sm text-[10px]">✓</div>
<span class="font-label-sm text-label-sm text-on-surface text-center">6. Check-In Inspect</span>
</div>
<!-- Step 7 (Current Active) -->
<div class="flex flex-col items-center gap-1.5 relative z-10">
<div class="w-6 h-6 rounded-full bg-primary-container text-on-primary ring-4 ring-secondary-fixed flex items-center justify-center font-label-sm text-[10px] font-bold">7</div>
<span class="font-label-sm text-label-sm font-bold text-primary text-center">7. Active Occupancy</span>
</div>
<!-- Step 8 -->
<div class="flex flex-col items-center gap-1.5 relative z-10 opacity-50">
<div class="w-6 h-6 rounded-full bg-surface-container text-on-surface-variant flex items-center justify-center font-label-sm text-[10px]">8</div>
<span class="font-label-sm text-label-sm text-on-surface-variant text-center">8. Check-Out</span>
</div>
<!-- Step 9 -->
<div class="flex flex-col items-center gap-1.5 relative z-10 opacity-50">
<div class="w-6 h-6 rounded-full bg-surface-container text-on-surface-variant flex items-center justify-center font-label-sm text-[10px]">9</div>
<span class="font-label-sm text-label-sm text-on-surface-variant text-center">9. Completed</span>
</div>
</div>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          Illustrative operational lifecycle. Booking approval is strictly manual, payments are verified offline, and check-in/check-out condition inspections are recorded separately.
        </p>
</div>
</div>
<!-- RIGHT COLUMN (5 Cols) -->
<div class="lg:col-span-5 flex flex-col gap-space-lg">
<!-- C. Tenant Documents & Reviews Repository -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm p-space-lg flex flex-col gap-space-md">
<div class="flex items-center justify-between pb-space-xs border-b border-surface-container">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[22px]">folder_special</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Documents & Reviews</h3>
</div>
<span class="px-2 py-0.5 rounded-full bg-error-container text-on-error-container font-label-sm text-label-sm font-bold">3 Pending</span>
</div>
<!-- Alert Notification Card -->
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col gap-1.5">
<div class="flex items-center gap-1.5 text-error font-label-md text-label-md font-semibold">
<span class="material-symbols-outlined text-[16px]">priority_high</span>
<span>Review Queue Action Required</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            3 Profiles require manager document verification: <span class="font-medium text-on-surface">Daniel Carter, Sara Mahmoud, Omar Khalid</span>.
          </p>
</div>
<!-- Document category items list -->
<div class="flex flex-col divide-y divide-surface-container font-body-sm text-body-sm">
<div class="py-2.5 flex items-center justify-between">
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">badge</span>
<div class="flex flex-col">
<span class="font-medium text-on-surface">Identity Documents</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Passport / Emirates ID (RBAC Protected)</span>
</div>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant font-mono">12 on file</span>
</div>
<div class="py-2.5 flex items-center justify-between">
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">description</span>
<div class="flex flex-col">
<span class="font-medium text-on-surface">Rental Agreements</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Executed Contracts (Signed Offline)</span>
</div>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant font-mono">10 executed</span>
</div>
<div class="py-2.5 flex items-center justify-between">
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">fact_check</span>
<div class="flex flex-col">
<span class="font-medium text-on-surface">Check-In Inspection Records</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Digital room & asset condition logs</span>
</div>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant font-mono">10 certified</span>
</div>
<div class="py-2.5 flex items-center justify-between">
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">assignment_return</span>
<div class="flex flex-col">
<span class="font-medium text-on-surface">Check-Out Inspection Records</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Damage settlement reports</span>
</div>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant font-mono">0 pending</span>
</div>
<div class="py-2.5 flex items-center justify-between">
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">attachment</span>
<div class="flex flex-col">
<span class="font-medium text-on-surface">Supporting Attachments</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Proof of Income / Sponsorship</span>
</div>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant font-mono">9 verified</span>
</div>
</div>
<div class="flex items-center gap-2 pt-1">
<a class="w-full h-9 rounded-lg bg-primary-container text-on-primary hover:bg-primary font-label-md text-label-md transition-colors" href="{{ route('manager.documents') }}">
            Review Documents
          </a>
<button class="w-full h-9 rounded-lg bg-surface-container-low text-on-surface hover:bg-surface-container font-label-md text-label-md transition-colors" type="button" data-demo="Manage Permissions">
            Manage Permissions
          </button>
</div>
</div>
<!-- D. Tenant Communication & Dispatches -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm p-space-lg flex flex-col gap-space-md">
<div class="flex items-center justify-between pb-space-xs border-b border-surface-container">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[22px]">campaign</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Communication & Dispatches</h3>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant font-mono">Channel Active</span>
</div>
<!-- Empty state illustration container -->
<div class="py-6 px-4 bg-surface-container-low rounded-lg flex flex-col items-center justify-center text-center">
<div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-on-surface-variant mb-2">
<span class="material-symbols-outlined text-[22px]">mark_email_read</span>
</div>
<span class="font-headline-sm text-headline-sm text-on-surface">All Communications Cleared</span>
<p class="font-body-sm text-body-sm text-on-surface-variant max-w-xs mt-1">
            No unread tenant inquiries or active escalation notices across managed tenancies. Routine check-in announcements scheduled for upcoming tenant intake.
          </p>
</div>
<button class="h-9 px-4 rounded-lg bg-surface-container-low text-on-surface hover:bg-surface-container font-label-md text-label-md transition-colors flex items-center justify-center gap-1.5" type="button" data-demo="View Communication Log">
<span class="material-symbols-outlined text-[16px] text-on-surface-variant">history</span>
<span>View Communication Log</span>
</button>
</div>
<!-- E. Privacy & Governance Protocol Banner -->
<div class="bg-surface-container-low rounded-xl p-space-md flex items-start gap-space-sm">
<div class="w-8 h-8 rounded-lg bg-primary-container text-on-primary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[18px]">lock</span>
</div>
<div class="flex flex-col gap-1">
<span class="font-label-md text-label-md font-semibold text-on-surface">Data Privacy & Access Governance</span>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Under UAE and KSA data confidentiality regulations, all personal telephone numbers, national identities, and signed agreements are shielded from unauthenticated access and are never exposed publicly.
          </p>
</div>
</div>
</div>
</div>
</div>
@endsection
