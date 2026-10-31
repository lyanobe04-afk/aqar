{{-- Imported from client_demo/screens/bookings/code.html; static demonstration data. --}}
@extends('layouts.manager')
@section('content')
<div class="flex flex-col w-full gap-space-lg">
<!-- Breadcrumbs & Page Header -->
<div class="flex flex-col gap-space-xs">
<div class="flex items-center gap-2 font-label-md text-label-md text-on-surface-variant">
<a class="hover:text-primary transition-colors flex items-center gap-1" href="{{ route('manager.dashboard') }}">
<span class="material-symbols-outlined text-[16px]">grid_view</span>
        Dashboard
      </a>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="text-on-surface font-semibold">Bookings</span>
</div>
<div class="flex flex-col lg:flex-row lg:items-center justify-between gap-space-md mt-1">
<div>
<h1 class="font-headline-xl text-headline-xl text-primary tracking-tight font-bold">Bookings Management</h1>
<p class="font-body-md text-body-md text-on-surface-variant mt-0.5 max-w-3xl">
          Review booking requests, manage approval decisions, coordinate availability, and track upcoming stays across premier regional portfolios.
        </p>
</div>
<div class="flex items-center gap-space-sm self-start lg:self-auto">
<button class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-surface-container-lowest text-on-surface font-label-lg text-label-lg shadow-sm hover:bg-surface-container transition-all" type="button" data-demo="Calendar View">
<span class="material-symbols-outlined text-[18px] text-primary">calendar_month</span>
          Calendar View
        </button>
<button class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-primary-container text-on-primary font-label-lg text-label-lg shadow-sm hover:bg-primary transition-all" type="button" data-demo="Create Manual Booking Request">
<span class="material-symbols-outlined text-[18px]">add</span>
          Create Manual Booking Request
        </button>
</div>
</div>
</div>
<!-- Operational Protocol Banner -->
<div class="p-4 rounded-xl bg-surface-container-low flex flex-col md:flex-row md:items-center justify-between gap-3 shadow-sm">
<div class="flex items-start md:items-center gap-3">
<div class="w-8 h-8 rounded-lg bg-tertiary-container/15 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[20px] text-tertiary">verified_user</span>
</div>
<div>
<span class="font-label-lg text-label-lg text-tertiary font-semibold block sm:inline">Phase 1 Booking Protocol:</span>
<span class="font-body-md text-body-md text-on-surface-variant"> Request-to-Book model with manual property manager approval only. Instant booking, online payment gateways, and automatic contract generation are strictly disabled.</span>
</div>
</div>
<div class="flex items-center gap-2 text-primary font-label-md text-label-md shrink-0">
<span class="material-symbols-outlined text-[16px]">info</span>
<span>Manual Escrow Mode</span>
</div>
</div>
<!-- 1. Booking Summary KPI Cards (6 in a row) -->
<div class="flex flex-col gap-2">
<div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-6 gap-space-md">
<!-- Card 1 -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">Total Requests</span>
<span class="w-7 h-7 rounded-lg bg-surface-container flex items-center justify-center text-on-surface-variant">
<span class="material-symbols-outlined text-[16px]">all_inbox</span>
</span>
</div>
<div class="mt-3 flex items-baseline justify-between">
<span class="font-headline-xl text-headline-xl text-primary font-bold">18</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Portfolio-wide</span>
</div>
<div class="w-full bg-surface-container-high h-1 rounded-full mt-3 overflow-hidden">
<div class="bg-primary h-full w-full"></div>
</div>
</div>
<!-- Card 2 -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-tertiary">Pending Review</span>
<span class="w-7 h-7 rounded-lg bg-tertiary-fixed/40 flex items-center justify-center text-on-tertiary-fixed-variant">
<span class="material-symbols-outlined text-[16px]">hourglass_empty</span>
</span>
</div>
<div class="mt-3 flex items-baseline justify-between">
<span class="font-headline-xl text-headline-xl text-tertiary font-bold">4</span>
<span class="font-label-sm text-label-sm px-1.5 py-0.5 rounded bg-tertiary-fixed/60 text-on-tertiary-fixed-variant font-medium">Action Req.</span>
</div>
<div class="w-full bg-surface-container-high h-1 rounded-full mt-3 overflow-hidden">
<div class="bg-tertiary h-full w-[22%]"></div>
</div>
</div>
<!-- Card 3 -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">Approved</span>
<span class="w-7 h-7 rounded-lg bg-surface-container flex items-center justify-center text-secondary">
<span class="material-symbols-outlined text-[16px]">check_circle</span>
</span>
</div>
<div class="mt-3 flex items-baseline justify-between">
<span class="font-headline-xl text-headline-xl text-on-surface font-bold">8</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Awaiting offline</span>
</div>
<div class="w-full bg-surface-container-high h-1 rounded-full mt-3 overflow-hidden">
<div class="bg-primary-container h-full w-[44%]"></div>
</div>
</div>
<!-- Card 4 -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">Declined</span>
<span class="w-7 h-7 rounded-lg bg-surface-container flex items-center justify-center text-error">
<span class="material-symbols-outlined text-[16px]">cancel</span>
</span>
</div>
<div class="mt-3 flex items-baseline justify-between">
<span class="font-headline-xl text-headline-xl text-on-surface font-bold">3</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Schedule conflict</span>
</div>
<div class="w-full bg-surface-container-high h-1 rounded-full mt-3 overflow-hidden">
<div class="bg-error h-full w-[16%]"></div>
</div>
</div>
<!-- Card 5 -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">Cancelled</span>
<span class="w-7 h-7 rounded-lg bg-surface-container flex items-center justify-center text-on-surface-variant">
<span class="material-symbols-outlined text-[16px]">block</span>
</span>
</div>
<div class="mt-3 flex items-baseline justify-between">
<span class="font-headline-xl text-headline-xl text-on-surface font-bold">3</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">By guest</span>
</div>
<div class="w-full bg-surface-container-high h-1 rounded-full mt-3 overflow-hidden">
<div class="bg-on-surface-variant/40 h-full w-[16%]"></div>
</div>
</div>
<!-- Card 6 -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-primary">Upcoming Stays</span>
<span class="w-7 h-7 rounded-lg bg-primary-fixed flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[16px]">flight_land</span>
</span>
</div>
<div class="mt-3 flex items-baseline justify-between">
<span class="font-headline-xl text-headline-xl text-primary font-bold">2</span>
<span class="font-label-sm text-label-sm text-primary font-medium">Marina & Palm</span>
</div>
<div class="w-full bg-surface-container-high h-1 rounded-full mt-3 overflow-hidden">
<div class="bg-primary h-full w-[65%]"></div>
</div>
</div>
</div>
<div class="flex items-center gap-1.5 px-2 font-body-sm text-body-sm text-on-surface-variant">
<span class="material-symbols-outlined text-[14px]">balance</span>
<span>Values strictly aggregate: <strong>4 Pending + 8 Approved + 3 Declined + 3 Cancelled = 18 Total Requests</strong>. Upcoming check-ins represent an operational arrival subset. <em>Al-Yasmin Compound II</em> has 0 requests, 0 tenancies, and remains in Unpublished draft status.</span>
</div>
</div>
<!-- 4. Highlighted Pending Approval Queue Section -->
<div class="p-space-lg rounded-2xl bg-surface-container-lowest shadow-sm flex flex-col gap-space-md">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
<div>
<div class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-tertiary-container animate-pulse"></span>
<h2 class="font-headline-md text-headline-md text-on-surface font-semibold">4 Requests Awaiting Manager Review</h2>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
          Carefully inspect unit availability, schedule conflicts, and guest identity prior to confirming reservation.
        </p>
</div>
<span class="font-label-md text-label-md px-3 py-1 rounded-lg bg-surface-container font-medium text-on-surface self-start sm:self-auto">
        Response SLA: 24h
      </span>
</div>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-space-md">
<!-- Queue Card 1 -->
<div class="p-space-md rounded-xl bg-surface-container-low shadow-sm flex flex-col justify-between gap-4 hover:shadow-md transition-shadow">
<div class="flex items-start justify-between gap-3">
<div class="flex items-start gap-3">
<div class="w-12 h-12 rounded-xl bg-surface-container-highest flex items-center justify-center text-primary font-bold text-headline-sm shrink-0">
              SM
            </div>
<div>
<div class="flex items-center gap-2">
<span class="font-label-lg text-label-lg font-bold text-on-surface">Sara Mahmoud</span>
<span class="px-2 py-0.5 rounded-full bg-surface-container font-label-sm text-label-sm text-on-surface-variant">Prospective Tenant</span>
</div>
<div class="font-body-sm text-body-sm text-on-surface-variant mt-0.5 flex items-center gap-2">
<span class="font-mono text-primary font-medium">BKG-2026-003</span>
<span>•</span>
<span>Created today, 10:14 AM</span>
</div>
</div>
</div>
<span class="px-2.5 py-1 rounded-md bg-tertiary-fixed/60 text-on-tertiary-fixed-variant font-label-sm text-label-sm font-semibold flex items-center gap-1">
<span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span>
            Pending Review
          </span>
</div>
<div class="grid grid-cols-2 sm:grid-cols-3 gap-2 p-3 rounded-lg bg-surface-container-lowest">
<div>
<span class="font-label-sm text-label-sm uppercase text-on-surface-variant block">Property & Unit</span>
<span class="font-label-md text-label-md text-on-surface font-medium truncate block">Marina View Residences</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Unit MV-102 (Studio, 52 m²)</span>
</div>
<div>
<span class="font-label-sm text-label-sm uppercase text-on-surface-variant block">Cadence / Term</span>
<span class="font-label-md text-label-md text-on-surface font-medium block">Monthly Lease</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">May 15 – Nov 14 (6 Mos)</span>
</div>
<div class="col-span-2 sm:col-span-1">
<span class="font-label-sm text-label-sm uppercase text-on-surface-variant block">Rate / Deposit</span>
<span class="font-headline-sm text-headline-sm text-primary font-bold block">USD 1,250<span class="font-body-sm text-body-sm text-on-surface-variant font-normal">/mo</span></span>
<span class="font-label-sm text-label-sm text-on-surface-variant">USD 1,250 Sec. Dep.</span>
</div>
</div>
<div class="flex items-center justify-between pt-1 gap-2 flex-wrap">
<button class="text-primary hover:underline font-label-md text-label-md flex items-center gap-1" type="button" data-demo="Review Details & Availability">
<span class="material-symbols-outlined text-[16px]">visibility</span>
            Review Details & Availability
          </button>
<div class="flex items-center gap-2">
<button class="px-3 py-1.5 rounded-lg bg-surface-container text-error hover:bg-error-container hover:text-on-error-container font-label-md text-label-md transition-colors" type="button" data-demo="Decline Request">
              Decline Request
            </button>
<button class="px-3 py-1.5 rounded-lg bg-primary text-on-primary hover:bg-primary-container font-label-md text-label-md shadow-sm transition-all flex items-center gap-1" type="button" data-demo="Approve Request">
<span class="material-symbols-outlined text-[16px]">check</span>
              Approve Request
            </button>
</div>
</div>
</div>
<!-- Queue Card 2 -->
<div class="p-space-md rounded-xl bg-surface-container-low shadow-sm flex flex-col justify-between gap-4 hover:shadow-md transition-shadow">
<div class="flex items-start justify-between gap-3">
<div class="flex items-start gap-3">
<div class="w-12 h-12 rounded-xl bg-surface-container-highest flex items-center justify-center text-primary font-bold text-headline-sm shrink-0">
              OK
            </div>
<div>
<div class="flex items-center gap-2">
<span class="font-label-lg text-label-lg font-bold text-on-surface">Omar Khalid</span>
<span class="px-2 py-0.5 rounded-full bg-surface-container font-label-sm text-label-sm text-on-surface-variant">Prospective Tenant</span>
</div>
<div class="font-body-sm text-body-sm text-on-surface-variant mt-0.5 flex items-center gap-2">
<span class="font-mono text-primary font-medium">BKG-2026-004</span>
<span>•</span>
<span>Yesterday, 04:30 PM</span>
</div>
</div>
</div>
<span class="px-2.5 py-1 rounded-md bg-tertiary-fixed/60 text-on-tertiary-fixed-variant font-label-sm text-label-sm font-semibold flex items-center gap-1">
<span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span>
            Pending Review
          </span>
</div>
<div class="grid grid-cols-2 sm:grid-cols-3 gap-2 p-3 rounded-lg bg-surface-container-lowest">
<div>
<span class="font-label-sm text-label-sm uppercase text-on-surface-variant block">Property & Unit</span>
<span class="font-label-md text-label-md text-on-surface font-medium truncate block">Palm Grove Chalets</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Unit PG-01 (1BR, Pool View)</span>
</div>
<div>
<span class="font-label-sm text-label-sm uppercase text-on-surface-variant block">Cadence / Term</span>
<span class="font-label-md text-label-md text-on-surface font-medium block">Daily Rental</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">May 10 – May 14 (4 Nights)</span>
</div>
<div class="col-span-2 sm:col-span-1">
<span class="font-label-sm text-label-sm uppercase text-on-surface-variant block">Rate / Deposit</span>
<span class="font-headline-sm text-headline-sm text-primary font-bold block">AED 850<span class="font-body-sm text-body-sm text-on-surface-variant font-normal">/night</span></span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Total: AED 3,400</span>
</div>
</div>
<div class="flex items-center justify-between pt-1 gap-2 flex-wrap">
<button class="text-primary hover:underline font-label-md text-label-md flex items-center gap-1" type="button" data-demo="Review Details & Availability">
<span class="material-symbols-outlined text-[16px]">visibility</span>
            Review Details & Availability
          </button>
<div class="flex items-center gap-2">
<button class="px-3 py-1.5 rounded-lg bg-surface-container text-error hover:bg-error-container hover:text-on-error-container font-label-md text-label-md transition-colors" type="button" data-demo="Decline Request">
              Decline Request
            </button>
<button class="px-3 py-1.5 rounded-lg bg-primary text-on-primary hover:bg-primary-container font-label-md text-label-md shadow-sm transition-all flex items-center gap-1" type="button" data-demo="Approve Request">
<span class="material-symbols-outlined text-[16px]">check</span>
              Approve Request
            </button>
</div>
</div>
</div>
</div>
</div>
<!-- 2. Booking Status Tabs & Filtering Section -->
<div class="p-space-lg rounded-2xl bg-surface-container-lowest shadow-sm flex flex-col gap-space-md">
<!-- Tabs Bar -->
<div class="flex items-center justify-between border-b-0 pb-1 overflow-x-auto">
<div class="flex items-center gap-2 sm:gap-4 shrink-0">
<button class="relative pb-3 font-label-lg text-label-lg font-bold text-primary flex items-center gap-2" type="button" data-demo="All Requests 18">
<span>All Requests</span>
<span class="px-2 py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed text-label-sm font-semibold">18</span>
<span class="absolute bottom-0 left-0 right-0 h-0.5 bg-primary rounded-full"></span>
</button>
<button class="relative pb-3 font-label-lg text-label-lg text-on-surface-variant hover:text-on-surface flex items-center gap-2 transition-colors" type="button" data-demo="Pending Review 4">
<span>Pending Review</span>
<span class="px-2 py-0.5 rounded-full bg-surface-container text-on-surface-variant text-label-sm">4</span>
</button>
<button class="relative pb-3 font-label-lg text-label-lg text-on-surface-variant hover:text-on-surface flex items-center gap-2 transition-colors" type="button" data-demo="Approved 8">
<span>Approved</span>
<span class="px-2 py-0.5 rounded-full bg-surface-container text-on-surface-variant text-label-sm">8</span>
</button>
<button class="relative pb-3 font-label-lg text-label-lg text-on-surface-variant hover:text-on-surface flex items-center gap-2 transition-colors" type="button" data-demo="Declined 3">
<span>Declined</span>
<span class="px-2 py-0.5 rounded-full bg-surface-container text-on-surface-variant text-label-sm">3</span>
</button>
<button class="relative pb-3 font-label-lg text-label-lg text-on-surface-variant hover:text-on-surface flex items-center gap-2 transition-colors" type="button" data-demo="Cancelled 3">
<span>Cancelled</span>
<span class="px-2 py-0.5 rounded-full bg-surface-container text-on-surface-variant text-label-sm">3</span>
</button>
</div>
<div class="hidden xl:flex items-center gap-2 text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[16px]">sync</span>
<span>Auto-synced with Property Ledger</span>
</div>
</div>
<!-- Search & Filter Controls -->
<div class="flex flex-col gap-3">
<!-- Search Input -->
<div class="relative w-full">
<span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]">search</span>
<input class="w-full h-11 pl-11 pr-4 rounded-xl bg-surface-container-low font-body-md text-body-md text-on-surface placeholder:text-on-surface-variant/70 focus:bg-surface-container-lowest focus:outline-none focus:ring-2 focus:ring-primary-container transition-all" placeholder="Search booking reference, guest, property, or unit..." type="text">
</div>
<!-- Filters Row -->
<div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-7 gap-2">
<!-- Filter: Property -->
<select class="h-10 px-3 rounded-lg bg-surface-container-low font-body-sm text-body-sm text-on-surface focus:outline-none focus:ring-1 focus:ring-primary">
<option>All Properties</option>
<option>Marina View Residences</option>
<option>Palm Grove Chalets</option>
<option disabled="">Al-Yasmin Compound II (Unpublished)</option>
</select>
<!-- Filter: Country -->
<select class="h-10 px-3 rounded-lg bg-surface-container-low font-body-sm text-body-sm text-on-surface focus:outline-none focus:ring-1 focus:ring-primary">
<option>All Countries</option>
<option>Saudi Arabia</option>
<option>United Arab Emirates</option>
<option>Kuwait</option>
<option>Bahrain</option>
</select>
<!-- Filter: Booking Status -->
<select class="h-10 px-3 rounded-lg bg-surface-container-low font-body-sm text-body-sm text-on-surface focus:outline-none focus:ring-1 focus:ring-primary">
<option>All Statuses</option>
<option>Pending Review</option>
<option>Approved</option>
<option>Declined</option>
<option>Cancelled</option>
</select>
<!-- Filter: Date Range -->
<select class="h-10 px-3 rounded-lg bg-surface-container-low font-body-sm text-body-sm text-on-surface focus:outline-none focus:ring-1 focus:ring-primary">
<option>Any Date Range</option>
<option>Next 7 Days</option>
<option>Next 30 Days</option>
<option>This Quarter</option>
<option>Custom Window...</option>
</select>
<!-- Filter: Rental Period -->
<select class="h-10 px-3 rounded-lg bg-surface-container-low font-body-sm text-body-sm text-on-surface focus:outline-none focus:ring-1 focus:ring-primary">
<option>Rental Period</option>
<option>Daily</option>
<option>Monthly</option>
<option>Yearly</option>
</select>
<!-- Filter: Assigned Manager -->
<select class="h-10 px-3 rounded-lg bg-surface-container-low font-body-sm text-body-sm text-on-surface focus:outline-none focus:ring-1 focus:ring-primary">
<option>All Managers</option>
<option>Eng. Sultan Al-Shammari</option>
<option>Noura Al-Hassan</option>
</select>
<!-- Filter: Payment Verification Status -->
<select class="h-10 px-3 rounded-lg bg-surface-container-low font-body-sm text-body-sm text-on-surface focus:outline-none focus:ring-1 focus:ring-primary">
<option>All Payment Statuses</option>
<option>Not Paid</option>
<option>Verification Pending</option>
<option>Offline Payment Recorded</option>
</select>
</div>
<!-- Filter Buttons & Summary -->
<div class="flex items-center justify-between pt-1">
<span class="font-body-sm text-body-sm text-on-surface-variant">
          Filtering <strong>18 total requests</strong> across 2 published developments
        </span>
<div class="flex items-center gap-2">
<button class="px-3 py-1.5 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors" type="button" data-demo="Clear Filters">
            Clear Filters
          </button>
<button class="px-3 py-1.5 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md transition-colors flex items-center gap-1.5" type="button" data-demo="Advanced Filters">
<span class="material-symbols-outlined text-[16px]">tune</span>
            Advanced Filters
          </button>
</div>
</div>
</div>
<!-- 3. Main Bookings Enterprise Table -->
<div class="overflow-x-auto rounded-xl">
<table class="w-full text-left min-w-[1050px]">
<thead>
<tr class="bg-surface-container-low text-on-surface-variant font-label-sm text-label-sm uppercase tracking-wider">
<th class="py-3 px-4">Booking Reference</th>
<th class="py-3 px-4">Guest / Tenant</th>
<th class="py-3 px-4">Property & Unit</th>
<th class="py-3 px-4">Requested Dates</th>
<th class="py-3 px-4">Rental Period</th>
<th class="py-3 px-4">Booking Amount</th>
<th class="py-3 px-4">Booking Status</th>
<th class="py-3 px-4">Payment Status</th>
<th class="py-3 px-4">Assigned Manager</th>
<th class="py-3 px-4 text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y-0">
<!-- Row 1 -->
<tr class="hover:bg-surface-container-low/70 transition-colors">
<td class="py-3.5 px-4 font-mono font-semibold text-primary">BKG-2026-001</td>
<td class="py-3.5 px-4">
<div class="font-label-md text-label-md font-semibold text-on-surface">Ahmed Al-Farsi</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">a.farsi@investor.sa</div>
</td>
<td class="py-3.5 px-4">
<div class="font-body-md text-body-md text-on-surface">Marina View Residences</div>
<div class="font-label-sm text-label-sm text-on-surface-variant">Unit MV-101 (2BR Executive)</div>
</td>
<td class="py-3.5 px-4">
<span class="font-body-sm text-body-sm text-on-surface">Dates on Record</span>
<div class="font-label-sm text-label-sm text-on-surface-variant">01 Jun 2026 – 31 Aug 2026</div>
</td>
<td class="py-3.5 px-4">
<span class="px-2 py-0.5 rounded bg-surface-container font-label-sm text-label-sm text-on-surface">Monthly</span>
</td>
<td class="py-3.5 px-4 font-mono font-medium text-on-surface">USD 2,100 /mo</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-secondary-fixed/50 text-on-secondary-fixed font-label-sm text-label-sm font-medium">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                Approved
              </span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-secondary-fixed/50 text-on-secondary-fixed font-label-sm text-label-sm font-medium">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                Offline Payment Recorded
              </span>
</td>
<td class="py-3.5 px-4 font-body-sm text-body-sm text-on-surface">Eng. Sultan Al-Shammari</td>
<td class="py-3.5 px-4 text-right">
<button class="w-8 h-8 rounded-lg hover:bg-surface-container inline-flex items-center justify-center text-on-surface-variant transition-colors" title="Actions" type="button" data-demo="Actions" aria-label="Actions">
<span class="material-symbols-outlined text-[18px]">more_horiz</span>
</button>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-surface-container-low/70 transition-colors bg-surface-container-lowest">
<td class="py-3.5 px-4 font-mono font-semibold text-primary">BKG-2026-002</td>
<td class="py-3.5 px-4">
<div class="font-label-md text-label-md font-semibold text-on-surface">Fatima Al-Nuaimi</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">fatima.n@dubaiholdings.ae</div>
</td>
<td class="py-3.5 px-4">
<div class="font-body-md text-body-md text-on-surface">Palm Grove Chalets</div>
<div class="font-label-sm text-label-sm text-on-surface-variant">Unit PG-02 (2BR Royal)</div>
</td>
<td class="py-3.5 px-4">
<span class="font-body-sm text-body-sm text-on-surface">Dates on Record</span>
<div class="font-label-sm text-label-sm text-on-surface-variant">20 May 2026 – 25 May 2026</div>
</td>
<td class="py-3.5 px-4">
<span class="px-2 py-0.5 rounded bg-surface-container font-label-sm text-label-sm text-on-surface">Daily</span>
</td>
<td class="py-3.5 px-4 font-mono font-medium text-on-surface">AED 950 /night</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-secondary-fixed/50 text-on-secondary-fixed font-label-sm text-label-sm font-medium">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                Approved
              </span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-tertiary-fixed/60 text-on-tertiary-fixed-variant font-label-sm text-label-sm font-medium">
<span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span>
                Verification Pending
              </span>
</td>
<td class="py-3.5 px-4 font-body-sm text-body-sm text-on-surface">Assigned Manager</td>
<td class="py-3.5 px-4 text-right">
<button class="w-8 h-8 rounded-lg hover:bg-surface-container inline-flex items-center justify-center text-on-surface-variant transition-colors" title="Actions" type="button" data-demo="Actions" aria-label="Actions">
<span class="material-symbols-outlined text-[18px]">more_horiz</span>
</button>
</td>
</tr>
<!-- Row 3 (Highlighted pending) -->
<tr class="hover:bg-surface-container-low/70 transition-colors bg-tertiary-fixed/10">
<td class="py-3.5 px-4 font-mono font-semibold text-primary">BKG-2026-003</td>
<td class="py-3.5 px-4">
<div class="font-label-md text-label-md font-semibold text-on-surface">Sara Mahmoud</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">sara.m@techmena.com</div>
</td>
<td class="py-3.5 px-4">
<div class="font-body-md text-body-md text-on-surface">Marina View Residences</div>
<div class="font-label-sm text-label-sm text-on-surface-variant">Unit MV-102 (Studio)</div>
</td>
<td class="py-3.5 px-4">
<span class="font-body-sm text-body-sm text-on-surface">Dates on Record</span>
<div class="font-label-sm text-label-sm text-on-surface-variant">15 May 2026 – 14 Nov 2026</div>
</td>
<td class="py-3.5 px-4">
<span class="px-2 py-0.5 rounded bg-surface-container font-label-sm text-label-sm text-on-surface">Monthly</span>
</td>
<td class="py-3.5 px-4 font-mono font-medium text-on-surface">USD 1,250 /mo</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-tertiary-fixed/60 text-on-tertiary-fixed-variant font-label-sm text-label-sm font-medium">
<span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span>
                Pending Review
              </span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm font-medium">
<span class="w-1.5 h-1.5 rounded-full bg-on-surface-variant"></span>
                Not Paid
              </span>
</td>
<td class="py-3.5 px-4 font-body-sm text-body-sm text-on-surface">Eng. Sultan Al-Shammari</td>
<td class="py-3.5 px-4 text-right">
<button class="px-3 py-1.5 rounded-lg bg-primary-container text-on-primary font-label-sm text-label-sm font-medium hover:bg-primary transition-all shadow-sm" type="button" data-demo="Review Request">
                Review Request
              </button>
</td>
</tr>
<!-- Row 4 (Highlighted pending) -->
<tr class="hover:bg-surface-container-low/70 transition-colors bg-tertiary-fixed/10">
<td class="py-3.5 px-4 font-mono font-semibold text-primary">BKG-2026-004</td>
<td class="py-3.5 px-4">
<div class="font-label-md text-label-md font-semibold text-on-surface">Omar Khalid</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">omar.khalid@capital.sa</div>
</td>
<td class="py-3.5 px-4">
<div class="font-body-md text-body-md text-on-surface">Palm Grove Chalets</div>
<div class="font-label-sm text-label-sm text-on-surface-variant">Unit PG-01 (1BR Pool)</div>
</td>
<td class="py-3.5 px-4">
<span class="font-body-sm text-body-sm text-on-surface">Dates on Record</span>
<div class="font-label-sm text-label-sm text-on-surface-variant">10 May 2026 – 14 May 2026</div>
</td>
<td class="py-3.5 px-4">
<span class="px-2 py-0.5 rounded bg-surface-container font-label-sm text-label-sm text-on-surface">Daily</span>
</td>
<td class="py-3.5 px-4 font-mono font-medium text-on-surface">AED 850 /night</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-tertiary-fixed/60 text-on-tertiary-fixed-variant font-label-sm text-label-sm font-medium">
<span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span>
                Pending Review
              </span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm font-medium">
<span class="w-1.5 h-1.5 rounded-full bg-on-surface-variant"></span>
                Not Paid
              </span>
</td>
<td class="py-3.5 px-4 font-body-sm text-body-sm text-on-surface">Assigned Manager</td>
<td class="py-3.5 px-4 text-right">
<button class="px-3 py-1.5 rounded-lg bg-primary-container text-on-primary font-label-sm text-label-sm font-medium hover:bg-primary transition-all shadow-sm" type="button" data-demo="Review Request">
                Review Request
              </button>
</td>
</tr>
<!-- Row 5 -->
<tr class="hover:bg-surface-container-low/70 transition-colors">
<td class="py-3.5 px-4 font-mono font-semibold text-primary">BKG-2026-005</td>
<td class="py-3.5 px-4">
<div class="font-label-md text-label-md font-semibold text-on-surface">Daniel Carter</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">d.carter@globalpartners.uk</div>
</td>
<td class="py-3.5 px-4">
<div class="font-body-md text-body-md text-on-surface">Marina View Residences</div>
<div class="font-label-sm text-label-sm text-on-surface-variant">Unit MV-104 (3BR Penthouse)</div>
</td>
<td class="py-3.5 px-4">
<span class="font-body-sm text-body-sm text-on-surface">Dates on Record</span>
<div class="font-label-sm text-label-sm text-on-surface-variant">01 Jul 2026 – 31 Dec 2026</div>
</td>
<td class="py-3.5 px-4">
<span class="px-2 py-0.5 rounded bg-surface-container font-label-sm text-label-sm text-on-surface">Monthly</span>
</td>
<td class="py-3.5 px-4 font-mono text-on-surface-variant">Amount Not Set</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-error-container text-on-error-container font-label-sm text-label-sm font-medium">
<span class="w-1.5 h-1.5 rounded-full bg-error"></span>
                Declined
              </span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm font-medium">
<span class="w-1.5 h-1.5 rounded-full bg-on-surface-variant"></span>
                Not Applicable
              </span>
</td>
<td class="py-3.5 px-4 font-body-sm text-body-sm text-on-surface">Assigned Manager</td>
<td class="py-3.5 px-4 text-right">
<button class="w-8 h-8 rounded-lg hover:bg-surface-container inline-flex items-center justify-center text-on-surface-variant transition-colors" title="Actions" type="button" data-demo="Actions" aria-label="Actions">
<span class="material-symbols-outlined text-[18px]">more_horiz</span>
</button>
</td>
</tr>
<!-- Row 6 -->
<tr class="hover:bg-surface-container-low/70 transition-colors">
<td class="py-3.5 px-4 font-mono font-semibold text-primary">BKG-2026-006</td>
<td class="py-3.5 px-4">
<div class="font-label-md text-label-md font-semibold text-on-surface">Mariam Hassan</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">m.hassan@gccadvisory.com</div>
</td>
<td class="py-3.5 px-4">
<div class="font-body-md text-body-md text-on-surface">Marina View Residences</div>
<div class="font-label-sm text-label-sm text-on-surface-variant">Unit MV-105 (2BR)</div>
</td>
<td class="py-3.5 px-4">
<span class="font-body-sm text-body-sm text-on-surface">Dates on Record</span>
<div class="font-label-sm text-label-sm text-on-surface-variant">01 Aug 2026 – 31 Jul 2027</div>
</td>
<td class="py-3.5 px-4">
<span class="px-2 py-0.5 rounded bg-surface-container font-label-sm text-label-sm text-on-surface">Yearly</span>
</td>
<td class="py-3.5 px-4 font-mono text-on-surface-variant">Amount Not Set</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm font-medium">
<span class="w-1.5 h-1.5 rounded-full bg-on-surface-variant"></span>
                Cancelled
              </span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm font-medium">
<span class="w-1.5 h-1.5 rounded-full bg-on-surface-variant"></span>
                Not Applicable
              </span>
</td>
<td class="py-3.5 px-4 font-body-sm text-body-sm text-on-surface">Assigned Manager</td>
<td class="py-3.5 px-4 text-right">
<button class="w-8 h-8 rounded-lg hover:bg-surface-container inline-flex items-center justify-center text-on-surface-variant transition-colors" title="Actions" type="button" data-demo="Actions" aria-label="Actions">
<span class="material-symbols-outlined text-[18px]">more_horiz</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Table Footer with Pagination -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pt-3">
<div class="font-body-sm text-body-sm text-on-surface-variant">
        Showing <strong>6 of 18</strong> booking requests
      </div>
<div class="flex items-center gap-1 self-end sm:self-auto">
<button class="px-3 py-1.5 rounded-lg bg-surface-container text-on-surface-variant font-label-md text-label-md hover:bg-surface-container-high transition-colors" disabled="" type="button" data-demo="Previous">
          Previous
        </button>
<button class="w-8 h-8 rounded-lg bg-primary-container text-on-primary font-label-md text-label-md flex items-center justify-center font-semibold shadow-sm" type="button" data-demo="1">
          1
        </button>
<button class="w-8 h-8 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md flex items-center justify-center transition-colors" type="button" data-demo="2">
          2
        </button>
<button class="w-8 h-8 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md flex items-center justify-center transition-colors" type="button" data-demo="3">
          3
        </button>
<button class="px-3 py-1.5 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md transition-colors" type="button" data-demo="Next">
          Next
        </button>
</div>
</div>
</div>
<!-- 5. Deep-Dive Section (Two Columns) -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg">
<!-- LEFT COLUMN (Span 7) -->
<div class="lg:col-span-7 flex flex-col gap-space-lg">
<!-- A. Selected Booking Request Review Dossier -->
<div class="p-space-lg rounded-2xl bg-surface-container-lowest shadow-sm flex flex-col gap-space-md">
<div class="flex flex-col sm:flex-row sm:items-center justify-between pb-3 gap-2">
<div>
<div class="flex items-center gap-2">
<span class="px-2 py-0.5 rounded bg-primary-fixed text-primary font-mono text-label-sm font-semibold">Active Review</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">Dossier: BKG-2026-003 — Sara Mahmoud</h3>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
              Review applicant eligibility checklist prior to executing manual reservation lock.
            </p>
</div>
<span class="font-mono text-label-md text-label-md text-primary font-bold self-start sm:self-auto">
            REF #BKG-2026-003
          </span>
</div>
<!-- Target Parameters -->
<div class="grid grid-cols-2 sm:grid-cols-4 gap-3 p-4 rounded-xl bg-surface-container-low">
<div>
<span class="font-label-sm text-label-sm uppercase text-on-surface-variant block">Target Unit</span>
<span class="font-label-md text-label-md text-on-surface font-semibold block mt-0.5">Marina View</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">MV-102 (Studio)</span>
</div>
<div>
<span class="font-label-sm text-label-sm uppercase text-on-surface-variant block">Requested Tariff</span>
<span class="font-label-md text-label-md text-primary font-semibold block mt-0.5">USD 1,250 / mo</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Offline Bank Remittance</span>
</div>
<div>
<span class="font-label-sm text-label-sm uppercase text-on-surface-variant block">Booking Status</span>
<span class="inline-flex items-center gap-1 mt-0.5 px-2 py-0.5 rounded bg-tertiary-fixed/60 text-on-tertiary-fixed-variant font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span>
              Pending Review
            </span>
</div>
<div>
<span class="font-label-sm text-label-sm uppercase text-on-surface-variant block">Payment Status</span>
<span class="inline-flex items-center gap-1 mt-0.5 px-2 py-0.5 rounded bg-surface-container text-on-surface-variant font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-on-surface-variant"></span>
              Not Paid
            </span>
</div>
</div>
<!-- Manager Pre-Approval Verification Checklist -->
<div class="flex flex-col gap-2">
<span class="font-label-md text-label-md font-semibold text-on-surface uppercase tracking-wider">
            Manager Pre-Approval Verification Checklist
          </span>
<div class="space-y-2">
<div class="p-3 rounded-lg bg-surface-container-low flex items-center justify-between">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-secondary text-[20px]">check_circle</span>
<div>
<span class="font-label-md text-label-md text-on-surface font-medium block">Unit configured in system</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Floor plan, baseline inventory, and tariffs validated</span>
</div>
</div>
<span class="px-2 py-0.5 rounded bg-secondary-fixed/50 text-on-secondary-fixed font-label-sm text-label-sm font-semibold">100% Configured</span>
</div>
<div class="p-3 rounded-lg bg-surface-container-low flex items-center justify-between">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-secondary text-[20px]">check_circle</span>
<div>
<span class="font-label-md text-label-md text-on-surface font-medium block">Property published status</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Marina View Residences is actively live and verified</span>
</div>
</div>
<span class="px-2 py-0.5 rounded bg-secondary-fixed/50 text-on-secondary-fixed font-label-sm text-label-sm font-semibold">Published</span>
</div>
<div class="p-3 rounded-lg bg-surface-container-low flex items-center justify-between">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-secondary text-[20px]">check_circle</span>
<div>
<span class="font-label-md text-label-md text-on-surface font-medium block">Maintenance hold verification</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Zero open work orders or scheduled inspections for MV-102</span>
</div>
</div>
<span class="px-2 py-0.5 rounded bg-secondary-fixed/50 text-on-secondary-fixed font-label-sm text-label-sm font-semibold">Clear</span>
</div>
<div class="p-3 rounded-lg bg-tertiary-fixed/15 flex items-center justify-between">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-tertiary text-[20px]">radio_button_unchecked</span>
<div>
<span class="font-label-md text-label-md text-on-surface font-medium block">Requested dates checked for calendar conflicts</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">May 15 – Nov 14 span requires operator sign-off</span>
</div>
</div>
<span class="px-2 py-0.5 rounded bg-tertiary-fixed/60 text-on-tertiary-fixed-variant font-label-sm text-label-sm font-semibold">Not Yet Reviewed</span>
</div>
<div class="p-3 rounded-lg bg-tertiary-fixed/15 flex items-center justify-between">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-tertiary text-[20px]">radio_button_unchecked</span>
<div>
<span class="font-label-md text-label-md text-on-surface font-medium block">Rental terms & deposit policy reviewed</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Security deposit matching 1 month tariff required</span>
</div>
</div>
<span class="px-2 py-0.5 rounded bg-tertiary-fixed/60 text-on-tertiary-fixed-variant font-label-sm text-label-sm font-semibold">Not Yet Reviewed</span>
</div>
<div class="p-3 rounded-lg bg-tertiary-fixed/15 flex items-center justify-between">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-tertiary text-[20px]">radio_button_unchecked</span>
<div>
<span class="font-label-md text-label-md text-on-surface font-medium block">Guest ID & profile background checked</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">National ID / Passport copy matching prospective tenant</span>
</div>
</div>
<span class="px-2 py-0.5 rounded bg-tertiary-fixed/60 text-on-tertiary-fixed-variant font-label-sm text-label-sm font-semibold">Not Yet Reviewed</span>
</div>
</div>
</div>
<!-- Workflow Actions -->
<div class="flex flex-col sm:flex-row items-center justify-between gap-3 pt-2">
<button class="w-full sm:w-auto px-4 py-2.5 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md transition-colors flex items-center justify-center gap-2" type="button" data-demo="Request Additional Information">
<span class="material-symbols-outlined text-[18px]">chat_bubble_outline</span>
            Request Additional Information
          </button>
<div class="flex items-center gap-2 w-full sm:w-auto">
<button class="flex-1 sm:flex-none px-4 py-2.5 rounded-lg bg-surface-container text-error hover:bg-error-container hover:text-on-error-container font-label-md text-label-md transition-colors" type="button" data-demo="Decline Request">
              Decline Request
            </button>
<button class="flex-1 sm:flex-none px-5 py-2.5 rounded-lg bg-primary-container text-on-primary hover:bg-primary font-label-md text-label-md font-semibold shadow-md transition-all flex items-center justify-center gap-1.5" type="button" data-demo="Approve Request (Opens Confirmation)">
<span class="material-symbols-outlined text-[18px]">done_all</span>
              Approve Request (Opens Confirmation)
            </button>
</div>
</div>
</div>
<!-- B. Booking Approval & Fulfillment Workflow Visualization -->
<div class="p-space-lg rounded-2xl bg-surface-container-lowest shadow-sm flex flex-col gap-space-md">
<div class="flex flex-col gap-1">
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">Booking Approval & Fulfillment Workflow</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Phase 1 operational lifecycle. Every milestone necessitates manual oversight by the portfolio operator.
          </p>
</div>
<!-- Horizontal Pipeline Diagram -->
<div class="grid grid-cols-1 md:grid-cols-5 gap-2 relative">
<!-- Step 1 -->
<div class="p-3 rounded-xl bg-surface-container-low flex flex-col justify-between gap-2">
<div class="flex items-center justify-between">
<span class="font-mono text-label-sm text-label-sm font-bold text-primary">01</span>
<span class="material-symbols-outlined text-secondary text-[18px]">send</span>
</div>
<div>
<span class="font-label-md text-label-md text-on-surface font-bold block">Request Submitted</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Guest requests dates</span>
</div>
<span class="font-label-sm text-label-sm text-secondary font-semibold">Completed</span>
</div>
<!-- Step 2 -->
<div class="p-3 rounded-xl bg-tertiary-fixed/30 flex flex-col justify-between gap-2 ring-1 ring-tertiary-container/30">
<div class="flex items-center justify-between">
<span class="font-mono text-label-sm text-label-sm font-bold text-tertiary">02</span>
<span class="material-symbols-outlined text-tertiary text-[18px]">verified</span>
</div>
<div>
<span class="font-label-md text-label-md text-on-surface font-bold block">Eligibility Review</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Manager inspects dossier</span>
</div>
<span class="font-label-sm text-label-sm text-tertiary font-bold">Current Stage</span>
</div>
<!-- Step 3 -->
<div class="p-3 rounded-xl bg-surface-container-low flex flex-col justify-between gap-2">
<div class="flex items-center justify-between">
<span class="font-mono text-label-sm text-label-sm font-bold text-on-surface-variant">03</span>
<span class="material-symbols-outlined text-on-surface-variant text-[18px]">how_to_reg</span>
</div>
<div>
<span class="font-label-md text-label-md text-on-surface font-bold block">Approval Decision</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Manual lock / release</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">Next Step</span>
</div>
<!-- Step 4 -->
<div class="p-3 rounded-xl bg-surface-container-low flex flex-col justify-between gap-2">
<div class="flex items-center justify-between">
<span class="font-mono text-label-sm text-label-sm font-bold text-on-surface-variant">04</span>
<span class="material-symbols-outlined text-on-surface-variant text-[18px]">receipt_long</span>
</div>
<div>
<span class="font-label-md text-label-md text-on-surface font-bold block">Offline Payment</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Wire/Cash verified</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">Pending</span>
</div>
<!-- Step 5 -->
<div class="p-3 rounded-xl bg-surface-container-low flex flex-col justify-between gap-2">
<div class="flex items-center justify-between">
<span class="font-mono text-label-sm text-label-sm font-bold text-on-surface-variant">05</span>
<span class="material-symbols-outlined text-on-surface-variant text-[18px]">key</span>
</div>
<div>
<span class="font-label-md text-label-md text-on-surface font-bold block">Lease & Check-In</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Key handover & access</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">Final Stage</span>
</div>
</div>
<div class="p-3 rounded-xl bg-surface-container-low flex items-start gap-2.5">
<span class="material-symbols-outlined text-[18px] text-primary shrink-0 mt-0.5">policy</span>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
<strong>Institutional Mandate:</strong> Approval is an explicit manual decision. Offline payment (certified wire, bank draft, or physical cash at leasing office) must be received and recorded in the ledger before keys or access codes are issued. Never attempt automatic recurring pulls or third-party gateway charges.
          </p>
</div>
</div>
</div>
<!-- RIGHT COLUMN (Span 5) -->
<div class="lg:col-span-5 flex flex-col gap-space-lg">
<!-- C. Booking & Availability Calendar Preview -->
<div class="p-space-lg rounded-2xl bg-surface-container-lowest shadow-sm flex flex-col gap-space-md">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[20px]">date_range</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">Booking & Availability Matrix</h3>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">May 2026</span>
</div>
<!-- Weekly Matrix Visualizer -->
<div class="flex flex-col gap-2">
<!-- Calendar Days Header -->
<div class="grid grid-cols-8 gap-1 text-center font-label-sm text-label-sm text-on-surface-variant">
<div class="text-left font-semibold">Unit</div>
<div>01-05</div>
<div>06-10</div>
<div>11-15</div>
<div>16-20</div>
<div>21-25</div>
<div>26-30</div>
<div>31+</div>
</div>
<!-- Matrix Row 1: MV-101 -->
<div class="grid grid-cols-8 gap-1 items-center font-body-sm text-body-sm">
<span class="font-mono text-label-sm text-on-surface font-semibold truncate">MV-101</span>
<div class="col-span-7 h-6 rounded bg-primary-container text-on-primary flex items-center justify-center font-label-sm text-[10px] font-semibold tracking-wide">
              Occupied (Ahmed Al-Farsi)
            </div>
</div>
<!-- Matrix Row 2: MV-102 -->
<div class="grid grid-cols-8 gap-1 items-center font-body-sm text-body-sm">
<span class="font-mono text-label-sm text-on-surface font-semibold truncate">MV-102</span>
<div class="col-span-2 h-6 rounded bg-surface-container flex items-center justify-center font-label-sm text-[10px] text-on-surface-variant">
              Vacant
            </div>
<div class="col-span-5 h-6 rounded bg-tertiary-fixed/80 text-on-tertiary-fixed-variant flex items-center justify-center font-label-sm text-[10px] font-semibold animate-pulse">
              Request BKG-2026-003 (Sara M.)
            </div>
</div>
<!-- Matrix Row 3: PG-01 -->
<div class="grid grid-cols-8 gap-1 items-center font-body-sm text-body-sm">
<span class="font-mono text-label-sm text-on-surface font-semibold truncate">PG-01</span>
<div class="col-span-1 h-6 rounded bg-surface-container flex items-center justify-center font-label-sm text-[10px] text-on-surface-variant">
              Open
            </div>
<div class="col-span-2 h-6 rounded bg-tertiary-fixed/80 text-on-tertiary-fixed-variant flex items-center justify-center font-label-sm text-[10px] font-semibold">
              Req BKG-2026-004
            </div>
<div class="col-span-4 h-6 rounded bg-surface-container flex items-center justify-center font-label-sm text-[10px] text-on-surface-variant">
              Available for Requests
            </div>
</div>
<!-- Matrix Row 4: PG-02 -->
<div class="grid grid-cols-8 gap-1 items-center font-body-sm text-body-sm">
<span class="font-mono text-label-sm text-on-surface font-semibold truncate">PG-02</span>
<div class="col-span-3 h-6 rounded bg-surface-container flex items-center justify-center font-label-sm text-[10px] text-on-surface-variant">
              Open
            </div>
<div class="col-span-3 h-6 rounded bg-primary-container text-on-primary flex items-center justify-center font-label-sm text-[10px] font-semibold truncate px-1">
              Occupied (Fatima N.)
            </div>
<div class="col-span-1 h-6 rounded bg-surface-container flex items-center justify-center font-label-sm text-[10px] text-on-surface-variant">
              Open
            </div>
</div>
<!-- Matrix Row 5: Al-Yasmin Units -->
<div class="grid grid-cols-8 gap-1 items-center font-body-sm text-body-sm">
<span class="font-mono text-label-sm text-on-surface-variant font-semibold truncate">AY-01..</span>
<div class="col-span-7 h-6 rounded bg-surface-container-highest/60 text-on-surface-variant/80 flex items-center justify-center font-label-sm text-[10px] italic">
              Al-Yasmin Compound II (Unpublished Draft — 0 Tenancies)
            </div>
</div>
</div>
<!-- Matrix Legend -->
<div class="flex flex-wrap items-center gap-3 pt-2 font-label-sm text-label-sm text-on-surface-variant">
<div class="flex items-center gap-1.5">
<span class="w-3 h-3 rounded bg-primary-container"></span>
<span>Confirmed Occupied</span>
</div>
<div class="flex items-center gap-1.5">
<span class="w-3 h-3 rounded bg-tertiary-fixed/80"></span>
<span>Pending Request</span>
</div>
<div class="flex items-center gap-1.5">
<span class="w-3 h-3 rounded bg-surface-container"></span>
<span>Available</span>
</div>
<div class="flex items-center gap-1.5">
<span class="w-3 h-3 rounded bg-surface-container-highest"></span>
<span>Unpublished Draft</span>
</div>
</div>
<button class="w-full py-2.5 rounded-lg bg-surface-container-low hover:bg-surface-container text-primary font-label-lg text-label-lg font-semibold transition-colors flex items-center justify-center gap-1.5" type="button" data-demo="Open Full Availability Calendar">
<span>Open Full Availability Calendar</span>
<span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</button>
</div>
<!-- D. Offline Payment Recording & Settlement Rules -->
<div class="p-space-lg rounded-2xl bg-surface-container-lowest shadow-sm flex flex-col gap-space-md">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-secondary text-[20px]">payments</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">Offline Payment & Settlement Rules</h3>
</div>
<span class="px-2 py-0.5 rounded bg-surface-container font-label-sm text-label-sm font-mono text-on-surface">Phase 1</span>
</div>
<div class="flex flex-col gap-2">
<span class="font-label-sm text-label-sm uppercase text-on-surface-variant font-semibold">Permitted Settlement Mechanisms</span>
<div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
<div class="p-3 rounded-lg bg-surface-container-low flex flex-col gap-1 text-center">
<span class="material-symbols-outlined text-primary text-[20px] mx-auto">account_balance</span>
<span class="font-label-md text-label-md font-semibold text-on-surface">Manual Wire</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Swift / IBAN</span>
</div>
<div class="p-3 rounded-lg bg-surface-container-low flex flex-col gap-1 text-center">
<span class="material-symbols-outlined text-primary text-[20px] mx-auto">edit_document</span>
<span class="font-label-md text-label-md font-semibold text-on-surface">Certified Cheque</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Manager Escrow</span>
</div>
<div class="p-3 rounded-lg bg-surface-container-low flex flex-col gap-1 text-center">
<span class="material-symbols-outlined text-primary text-[20px] mx-auto">storefront</span>
<span class="font-label-md text-label-md font-semibold text-on-surface">Physical Cash</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Leasing Office</span>
</div>
</div>
</div>
<div class="space-y-2">
<span class="font-label-sm text-label-sm uppercase text-on-surface-variant font-semibold">Payment Status Lifecycle</span>
<div class="p-2.5 rounded-lg bg-surface-container-low flex items-center justify-between font-body-sm text-body-sm">
<span class="font-medium text-on-surface">Not Paid</span>
<span class="text-on-surface-variant">Request approved, invoice issued offline</span>
</div>
<div class="p-2.5 rounded-lg bg-surface-container-low flex items-center justify-between font-body-sm text-body-sm">
<span class="font-medium text-on-surface">Verification Pending</span>
<span class="text-on-surface-variant">Bank slip submitted, awaiting clearance</span>
</div>
<div class="p-2.5 rounded-lg bg-surface-container-low flex items-center justify-between font-body-sm text-body-sm">
<span class="font-medium text-on-surface">Offline Payment Recorded</span>
<span class="text-secondary font-medium">Funds credited, key release authorized</span>
</div>
</div>
<div class="p-3 rounded-lg bg-error-container/40 flex items-start gap-2">
<span class="material-symbols-outlined text-error text-[18px] shrink-0 mt-0.5">warning</span>
<span class="font-body-sm text-body-sm text-on-error-container">
<strong>Strict Compliance Warning:</strong> No credit card gateways or automated recurring pulls are connected. Do not solicit CVVs or raw payment card data from prospective tenants.
          </span>
</div>
</div>
<!-- E. Availability & Booking Restrictions Policy -->
<div class="p-space-lg rounded-2xl bg-surface-container-lowest shadow-sm flex flex-col gap-3">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[20px]">rule</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">Booking Restrictions Policy</h3>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
          Booking requests are automatically blocked or flagged if any of the following constraints are triggered:
        </p>
<ul class="space-y-2 font-body-sm text-body-sm text-on-surface">
<li class="flex items-start gap-2">
<span class="material-symbols-outlined text-error text-[16px] shrink-0 mt-1">block</span>
<span><strong>Unconfigured Unit:</strong> Unit configuration must be 100% complete prior to accepting guest holds.</span>
</li>
<li class="flex items-start gap-2">
<span class="material-symbols-outlined text-error text-[16px] shrink-0 mt-1">block</span>
<span><strong>Unpublished Property:</strong> Properties in draft status (such as <em>Al-Yasmin Compound II</em>) reject all external inquiries.</span>
</li>
<li class="flex items-start gap-2">
<span class="material-symbols-outlined text-error text-[16px] shrink-0 mt-1">block</span>
<span><strong>Active Maintenance Ticket:</strong> Work orders in progress automatically restrict arrival dates until supervisor sign-off.</span>
</li>
<li class="flex items-start gap-2">
<span class="material-symbols-outlined text-error text-[16px] shrink-0 mt-1">block</span>
<span><strong>Date Overlaps:</strong> Double-booking is strictly prohibited under institutional asset management protocols.</span>
</li>
</ul>
</div>
</div>
</div>
</div>
@endsection
