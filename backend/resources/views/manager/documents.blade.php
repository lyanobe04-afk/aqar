{{-- Imported from client_demo/screens/documents_management/code.html; static demonstration data. --}}
@extends('layouts.manager')
@section('content')
<div class="flex flex-col w-full">
<!-- Top Context Header & Actions -->
<div class="flex flex-col gap-space-md mb-space-lg">
<!-- Breadcrumb & Access Level -->
<div class="flex flex-wrap items-center justify-between gap-space-sm">
<div class="flex items-center gap-space-xs text-on-surface-variant font-label-md text-label-md">
<span>Dashboard</span>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="text-on-surface font-semibold">Documents</span>
</div>
<div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-semibold tracking-wide">
<span class="material-symbols-outlined text-[14px]">shield</span>
<span>Document Repository — Manager Access</span>
</div>
</div>
<!-- Title Bar & Primary Actions -->
<div class="flex flex-col lg:flex-row lg:items-end justify-between gap-space-md">
<div class="max-w-3xl">
<h1 class="font-headline-xl text-headline-xl text-on-surface tracking-tight">Documents Management</h1>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">
          Securely organize property records, ownership documents, contracts, tenant files, inspection reports, and operational attachments.
        </p>
</div>
<div class="flex items-center gap-space-sm flex-shrink-0">
<button class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-surface-container-lowest text-on-surface hover:bg-surface-container-low transition-colors shadow-sm font-label-lg text-label-lg font-medium" type="button" data-demo="Export Document List">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">download</span>
<span>Export Document List</span>
</button>
<button class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-primary-container text-on-primary hover:bg-primary transition-colors shadow-sm font-label-lg text-label-lg font-semibold" type="button" data-demo="+ Upload Document">
<span class="material-symbols-outlined text-[18px]">add</span>
<span>+ Upload Document</span>
</button>
</div>
</div>
<!-- Governance Notice / Policy Banner -->
<div class="p-space-md rounded-xl bg-surface-container-low text-on-surface flex items-start gap-space-md">
<span class="material-symbols-outlined text-primary-container text-[20px] mt-0.5">policy</span>
<div class="flex-1">
<span class="font-label-md text-label-md font-semibold text-primary">Governance Notice:</span>
<span class="font-body-sm text-body-sm text-on-surface-variant ml-1">
          All document repository records are subject to strict role-based authorization controls. Uploaded files require authorized administrative review before formal ratification. Upload status does not imply legal execution or governmental registration.
        </span>
</div>
</div>
</div>
<!-- KPI Summary Cards (6 Cards) -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-space-md mb-space-xl">
<!-- Card 1 -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface-variant">Total Document Records</span>
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">source</span>
</div>
<div class="mt-3">
<div class="font-headline-lg text-headline-lg text-on-surface">48</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Across managed portfolio</p>
</div>
</div>
<!-- Card 2 -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface-variant">Uploaded Files</span>
<span class="material-symbols-outlined text-[18px] text-primary">check_circle</span>
</div>
<div class="mt-3">
<div class="font-headline-lg text-headline-lg text-on-surface">36</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Stored & cataloged</p>
</div>
</div>
<!-- Card 3 -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface-variant">Pending Upload</span>
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">cloud_upload</span>
</div>
<div class="mt-3">
<div class="font-headline-lg text-headline-lg text-primary">8</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Action required</p>
</div>
</div>
<!-- Card 4 -->
<div class="bg-surface-container-lowest p-space-md rounded-xl border-t-2 border-primary-container shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface-variant">Pending Review</span>
<span class="material-symbols-outlined text-[18px] text-primary-container">rule</span>
</div>
<div class="mt-3">
<div class="font-headline-lg text-headline-lg text-primary-container">4</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Manager audit queue</p>
</div>
</div>
<!-- Card 5 -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface-variant">Expiring Soon</span>
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">timelapse</span>
</div>
<div class="mt-3">
<div class="font-headline-md text-headline-md text-on-surface-variant font-medium">Not Calculated</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Lifecycle tracker</p>
</div>
</div>
<!-- Card 6 -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface-variant">Restricted Docs</span>
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">lock</span>
</div>
<div class="mt-3">
<div class="font-headline-lg text-headline-lg text-on-surface">12</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">RBAC Tier 3 access</p>
</div>
</div>
</div>
<!-- Repository Category Tabs -->
<div class="overflow-x-auto pb-space-xs mb-space-md">
<div class="flex items-center gap-space-xs min-w-max p-1 bg-surface-container-low rounded-xl">
<button class="flex items-center gap-2 px-3.5 py-2 rounded-lg bg-surface-container-lowest text-primary font-label-md text-label-md font-semibold shadow-sm" type="button" data-demo="All Documents (48)">
<span class="material-symbols-outlined text-[18px]">folder</span>
<span>All Documents (48)</span>
</button>
<button class="flex items-center gap-2 px-3.5 py-2 rounded-lg text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-colors font-label-md text-label-md" type="button" data-demo="Property Documents (14)">
<span class="material-symbols-outlined text-[18px]">domain</span>
<span>Property Documents (14)</span>
</button>
<button class="flex items-center gap-2 px-3.5 py-2 rounded-lg text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-colors font-label-md text-label-md" type="button" data-demo="Ownership Records (8)">
<span class="material-symbols-outlined text-[18px]">badge</span>
<span>Ownership Records (8)</span>
</button>
<button class="flex items-center gap-2 px-3.5 py-2 rounded-lg text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-colors font-label-md text-label-md" type="button" data-demo="Management Agreements (3)">
<span class="material-symbols-outlined text-[18px]">handshake</span>
<span>Management Agreements (3)</span>
</button>
<button class="flex items-center gap-2 px-3.5 py-2 rounded-lg text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-colors font-label-md text-label-md" type="button" data-demo="Rental Contracts (10)">
<span class="material-symbols-outlined text-[18px]">history_edu</span>
<span>Rental Contracts (10)</span>
</button>
<button class="flex items-center gap-2 px-3.5 py-2 rounded-lg text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-colors font-label-md text-label-md" type="button" data-demo="Tenant Documents (6)">
<span class="material-symbols-outlined text-[18px]">person</span>
<span>Tenant Documents (6)</span>
</button>
<button class="flex items-center gap-2 px-3.5 py-2 rounded-lg text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-colors font-label-md text-label-md" type="button" data-demo="Maintenance Attachments (4)">
<span class="material-symbols-outlined text-[18px]">build</span>
<span>Maintenance Attachments (4)</span>
</button>
<button class="flex items-center gap-2 px-3.5 py-2 rounded-lg text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-colors font-label-md text-label-md" type="button" data-demo="Inspection Reports (1)">
<span class="material-symbols-outlined text-[18px]">fact_check</span>
<span>Inspection Reports (1)</span>
</button>
<button class="flex items-center gap-2 px-3.5 py-2 rounded-lg text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-colors font-label-md text-label-md" type="button" data-demo="Financial Documents (2)">
<span class="material-symbols-outlined text-[18px]">receipt_long</span>
<span>Financial Documents (2)</span>
</button>
<button class="flex items-center gap-2 px-3.5 py-2 rounded-lg text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-colors font-label-md text-label-md" type="button" data-demo="Other Files">
<span class="material-symbols-outlined text-[18px]">more_horiz</span>
<span>Other Files</span>
</button>
</div>
</div>
<!-- Search & Multi-Dimensional Filters Bar -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm mb-space-lg flex flex-col gap-space-md">
<div class="grid grid-cols-1 md:grid-cols-12 gap-space-sm items-center">
<!-- Search Field -->
<div class="md:col-span-6 relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-[20px] text-on-surface-variant">search</span>
<input class="w-full h-10 pl-10 pr-4 bg-surface-container-low rounded-lg font-body-md text-body-md text-on-surface placeholder:text-on-surface-variant focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="Search document name, reference, property, unit, owner, tenant, or contract..." type="text">
</div>
<!-- Quick Dropdowns -->
<div class="md:col-span-3">
<div class="relative w-full">
<select class="w-full h-10 px-3 pr-8 appearance-none bg-surface-container-low rounded-lg font-body-md text-body-md text-on-surface focus:outline-none focus:ring-2 focus:ring-primary/20">
<option>All Properties</option>
<option>Al-Yasmin Compound II</option>
<option>Marina View Residences</option>
<option>Palm Grove Chalets</option>
</select>
<span class="material-symbols-outlined absolute right-2.5 top-1/2 -translate-y-1/2 pointer-events-none text-[18px] text-on-surface-variant">expand_more</span>
</div>
</div>
<div class="md:col-span-3 flex items-center justify-end gap-2">
<button class="flex items-center gap-1.5 px-3 py-2 rounded-lg bg-surface-container-low text-on-surface font-label-md text-label-md hover:bg-surface-container transition-colors" type="button" data-demo="Advanced Filters">
<span class="material-symbols-outlined text-[18px]">tune</span>
<span>Advanced Filters</span>
</button>
<button class="px-3 py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container-low transition-colors" type="button" data-demo="Clear">
          Clear
        </button>
</div>
</div>
<!-- Secondary Filter Pills Row -->
<div class="flex flex-wrap items-center justify-between gap-space-sm pt-space-xs text-on-surface-variant font-label-sm text-label-sm">
<div class="flex flex-wrap items-center gap-space-xs">
<span class="font-medium text-on-surface mr-1">Active Criteria:</span>
<span class="px-2.5 py-1 rounded bg-surface-container-low flex items-center gap-1">Category: All <span class="material-symbols-outlined text-[12px] cursor-pointer" role="button" tabindex="0" data-demo="close">close</span></span>
<span class="px-2.5 py-1 rounded bg-surface-container-low flex items-center gap-1">Status: All Statuses <span class="material-symbols-outlined text-[12px] cursor-pointer" role="button" tabindex="0" data-demo="close">close</span></span>
<span class="px-2.5 py-1 rounded bg-surface-container-low flex items-center gap-1">Access: All Levels <span class="material-symbols-outlined text-[12px] cursor-pointer" role="button" tabindex="0" data-demo="close">close</span></span>
<span class="px-2.5 py-1 rounded bg-surface-container-low flex items-center gap-1">Format: PDF, Images <span class="material-symbols-outlined text-[12px] cursor-pointer" role="button" tabindex="0" data-demo="close">close</span></span>
</div>
<div class="font-label-md text-label-md font-medium text-on-surface-variant">
        Showing <span class="text-on-surface font-semibold">8</span> of <span class="text-on-surface font-semibold">48</span> Document Records
      </div>
</div>
</div>
<!-- Main Documents Data Table -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden mb-space-xl">
<div class="overflow-x-auto">
<table class="w-full text-left font-body-md text-body-md">
<thead>
<tr class="bg-surface-container-low text-on-surface-variant font-label-md text-label-md uppercase tracking-wider">
<th class="py-3.5 px-4 font-semibold">Reference</th>
<th class="py-3.5 px-4 font-semibold">Document Name</th>
<th class="py-3.5 px-4 font-semibold">Category</th>
<th class="py-3.5 px-4 font-semibold">Related Property / Record</th>
<th class="py-3.5 px-4 font-semibold">Type</th>
<th class="py-3.5 px-4 font-semibold">Upload Status</th>
<th class="py-3.5 px-4 font-semibold">Review Status</th>
<th class="py-3.5 px-4 font-semibold">Access Level</th>
<th class="py-3.5 px-4 font-semibold">Expiry</th>
<th class="py-3.5 px-4 font-semibold text-right">Actions</th>
</tr>
</thead>
<tbody class="text-on-surface">
<!-- Row 1 -->
<tr class="hover:bg-surface-container-low/70 transition-colors">
<td class="py-3.5 px-4 font-mono font-medium text-on-surface-variant text-body-sm">DOC-2026-001</td>
<td class="py-3.5 px-4 font-medium">Property Overview Document</td>
<td class="py-3.5 px-4 text-on-surface-variant">Property Documents</td>
<td class="py-3.5 px-4">Al-Yasmin Compound II</td>
<td class="py-3.5 px-4"><span class="px-2 py-0.5 rounded bg-surface-container font-label-sm text-label-sm font-semibold">PDF</span></td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-surface-container-low font-label-sm text-label-sm font-medium text-on-surface">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>Uploaded
              </span>
</td>
<td class="py-3.5 px-4 text-on-surface-variant font-body-sm">Not Reviewed</td>
<td class="py-3.5 px-4 text-body-sm">Manager Restricted</td>
<td class="py-3.5 px-4 text-on-surface-variant font-body-sm">Not Recorded</td>
<td class="py-3.5 px-4 text-right">
<div class="inline-flex items-center gap-1">
<button class="p-1.5 hover:bg-surface-container rounded text-on-surface-variant hover:text-primary transition-colors" title="Preview" type="button" data-demo="Preview" aria-label="Preview"><span class="material-symbols-outlined text-[18px]">visibility</span></button>
<button class="p-1.5 hover:bg-surface-container rounded text-on-surface-variant hover:text-on-surface transition-colors" title="Download" type="button" data-demo="Download" aria-label="Download"><span class="material-symbols-outlined text-[18px]">download</span></button>
</div>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-surface-container-low/70 transition-colors">
<td class="py-3.5 px-4 font-mono font-medium text-on-surface-variant text-body-sm">DOC-2026-002</td>
<td class="py-3.5 px-4 font-medium">Ownership Supporting Document</td>
<td class="py-3.5 px-4 text-on-surface-variant">Ownership Records</td>
<td class="py-3.5 px-4">
<div class="leading-tight">
<div>Al-Yasmin Compound II</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Muqrin Real Estate Holdings Ltd.</div>
</div>
</td>
<td class="py-3.5 px-4"><span class="px-2 py-0.5 rounded bg-surface-container font-label-sm text-label-sm font-semibold">PDF</span></td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-surface-container-low font-label-sm text-label-sm font-medium text-on-surface">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>Uploaded
              </span>
</td>
<td class="py-3.5 px-4 text-on-surface-variant font-body-sm">Not Reviewed</td>
<td class="py-3.5 px-4 text-body-sm">Restricted</td>
<td class="py-3.5 px-4 text-on-surface-variant font-body-sm">Not Recorded</td>
<td class="py-3.5 px-4 text-right">
<div class="inline-flex items-center gap-1">
<button class="p-1.5 hover:bg-surface-container rounded text-on-surface-variant hover:text-primary transition-colors" type="button" data-demo="visibility" aria-label="visibility"><span class="material-symbols-outlined text-[18px]">visibility</span></button>
<button class="p-1.5 hover:bg-surface-container rounded text-on-surface-variant hover:text-on-surface transition-colors" type="button" data-demo="download" aria-label="download"><span class="material-symbols-outlined text-[18px]">download</span></button>
</div>
</td>
</tr>
<!-- Row 3: ACTIVE SELECTED RECORD -->
<tr class="bg-surface-container-low font-medium shadow-inner">
<td class="py-3.5 px-4 font-mono font-semibold text-primary text-body-sm flex items-center gap-2">
<span class="w-1.5 h-4 bg-primary rounded-full inline-block"></span>
              DOC-2026-003
            </td>
<td class="py-3.5 px-4 font-semibold text-primary">Property Management Agreement</td>
<td class="py-3.5 px-4 text-on-surface">Management Agreements</td>
<td class="py-3.5 px-4">
<div class="leading-tight">
<div class="font-semibold">Al-Yasmin Compound II</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Muqrin Real Estate Holdings Ltd.</div>
</div>
</td>
<td class="py-3.5 px-4"><span class="px-2 py-0.5 rounded bg-primary-fixed text-on-primary-fixed font-label-sm text-label-sm font-semibold">PDF</span></td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-surface-container-lowest font-label-sm text-label-sm font-semibold text-on-surface shadow-xs">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>Uploaded
              </span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-semibold">
                Pending Review
              </span>
</td>
<td class="py-3.5 px-4 text-body-sm">Restricted</td>
<td class="py-3.5 px-4 text-on-surface-variant font-body-sm">Not Recorded</td>
<td class="py-3.5 px-4 text-right">
<div class="inline-flex items-center gap-1">
<button class="p-1.5 rounded bg-primary text-on-primary" title="Active Inspection" type="button" data-demo="Active Inspection" aria-label="Active Inspection"><span class="material-symbols-outlined text-[18px]">visibility</span></button>
<button class="p-1.5 hover:bg-surface-container rounded text-on-surface" title="Download" type="button" data-demo="Download" aria-label="Download"><span class="material-symbols-outlined text-[18px]">download</span></button>
</div>
</td>
</tr>
<!-- Row 4 -->
<tr class="hover:bg-surface-container-low/70 transition-colors">
<td class="py-3.5 px-4 font-mono font-medium text-on-surface-variant text-body-sm">DOC-2026-004</td>
<td class="py-3.5 px-4 font-medium">Property Reference Plan</td>
<td class="py-3.5 px-4 text-on-surface-variant">Property Documents</td>
<td class="py-3.5 px-4">Al-Yasmin Compound II</td>
<td class="py-3.5 px-4"><span class="px-2 py-0.5 rounded bg-surface-container font-label-sm text-label-sm font-semibold">PDF</span></td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-surface-container-low font-label-sm text-label-sm font-medium text-on-surface">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>Uploaded
              </span>
</td>
<td class="py-3.5 px-4 text-on-surface-variant font-body-sm">Not Reviewed</td>
<td class="py-3.5 px-4 text-body-sm">Manager Restricted</td>
<td class="py-3.5 px-4 text-on-surface-variant font-body-sm">Not Recorded</td>
<td class="py-3.5 px-4 text-right">
<div class="inline-flex items-center gap-1">
<button class="p-1.5 hover:bg-surface-container rounded text-on-surface-variant hover:text-primary transition-colors" type="button" data-demo="visibility" aria-label="visibility"><span class="material-symbols-outlined text-[18px]">visibility</span></button>
<button class="p-1.5 hover:bg-surface-container rounded text-on-surface-variant hover:text-on-surface transition-colors" type="button" data-demo="download" aria-label="download"><span class="material-symbols-outlined text-[18px]">download</span></button>
</div>
</td>
</tr>
<!-- Row 5 -->
<tr class="hover:bg-surface-container-low/70 transition-colors">
<td class="py-3.5 px-4 font-mono font-medium text-on-surface-variant text-body-sm">DOC-2026-005</td>
<td class="py-3.5 px-4 font-medium">Rental Contract — CTR-2026-001</td>
<td class="py-3.5 px-4 text-on-surface-variant">Rental Contracts</td>
<td class="py-3.5 px-4">Marina View Residences / MV-101</td>
<td class="py-3.5 px-4"><span class="px-2 py-0.5 rounded bg-surface-container font-label-sm text-label-sm font-semibold">PDF</span></td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-surface-container-low font-label-sm text-label-sm font-medium text-on-surface">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>Uploaded
              </span>
</td>
<td class="py-3.5 px-4 text-on-surface-variant font-body-sm">Review Not Recorded</td>
<td class="py-3.5 px-4 text-body-sm">Restricted</td>
<td class="py-3.5 px-4 text-on-surface-variant font-body-sm">Not Recorded</td>
<td class="py-3.5 px-4 text-right">
<div class="inline-flex items-center gap-1">
<button class="p-1.5 hover:bg-surface-container rounded text-on-surface-variant hover:text-primary transition-colors" type="button" data-demo="visibility" aria-label="visibility"><span class="material-symbols-outlined text-[18px]">visibility</span></button>
<button class="p-1.5 hover:bg-surface-container rounded text-on-surface-variant hover:text-on-surface transition-colors" type="button" data-demo="download" aria-label="download"><span class="material-symbols-outlined text-[18px]">download</span></button>
</div>
</td>
</tr>
<!-- Row 6 -->
<tr class="hover:bg-surface-container-low/70 transition-colors">
<td class="py-3.5 px-4 font-mono font-medium text-on-surface-variant text-body-sm">DOC-2026-006</td>
<td class="py-3.5 px-4 font-medium">Tenant Supporting Documents</td>
<td class="py-3.5 px-4 text-on-surface-variant">Tenant Documents</td>
<td class="py-3.5 px-4">Marina View Residences / MV-101</td>
<td class="py-3.5 px-4"><span class="px-2 py-0.5 rounded bg-surface-container font-label-sm text-label-sm font-semibold">PDF</span></td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-surface-container font-label-sm text-label-sm text-on-surface-variant">
<span class="w-1.5 h-1.5 rounded-full bg-on-surface-variant"></span>Pending Upload
              </span>
</td>
<td class="py-3.5 px-4 text-on-surface-variant font-body-sm">Not Reviewed</td>
<td class="py-3.5 px-4 text-body-sm">Restricted</td>
<td class="py-3.5 px-4 text-on-surface-variant font-body-sm">Not Recorded</td>
<td class="py-3.5 px-4 text-right">
<div class="inline-flex items-center gap-1">
<button class="p-1.5 hover:bg-surface-container rounded text-on-surface-variant hover:text-primary transition-colors" type="button" data-demo="upload_file" aria-label="upload file"><span class="material-symbols-outlined text-[18px]">upload_file</span></button>
</div>
</td>
</tr>
<!-- Row 7 -->
<tr class="hover:bg-surface-container-low/70 transition-colors">
<td class="py-3.5 px-4 font-mono font-medium text-on-surface-variant text-body-sm">DOC-2026-007</td>
<td class="py-3.5 px-4 font-medium">Maintenance Attachment — MNT-2026-002</td>
<td class="py-3.5 px-4 text-on-surface-variant">Maintenance Attachments</td>
<td class="py-3.5 px-4">Palm Grove Chalets / PG-03</td>
<td class="py-3.5 px-4"><span class="px-2 py-0.5 rounded bg-surface-container font-label-sm text-label-sm font-semibold">Image</span></td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-surface-container font-label-sm text-label-sm text-on-surface-variant">
<span class="w-1.5 h-1.5 rounded-full bg-on-surface-variant"></span>Pending Upload
              </span>
</td>
<td class="py-3.5 px-4 text-on-surface-variant font-body-sm">Not Reviewed</td>
<td class="py-3.5 px-4 text-body-sm">Restricted</td>
<td class="py-3.5 px-4 text-on-surface-variant font-body-sm">Not Recorded</td>
<td class="py-3.5 px-4 text-right">
<div class="inline-flex items-center gap-1">
<button class="p-1.5 hover:bg-surface-container rounded text-on-surface-variant hover:text-primary transition-colors" type="button" data-demo="upload_file" aria-label="upload file"><span class="material-symbols-outlined text-[18px]">upload_file</span></button>
</div>
</td>
</tr>
<!-- Row 8 -->
<tr class="hover:bg-surface-container-low/70 transition-colors">
<td class="py-3.5 px-4 font-mono font-medium text-on-surface-variant text-body-sm">DOC-2026-008</td>
<td class="py-3.5 px-4 font-medium text-on-surface-variant italic">Initial Condition Report</td>
<td class="py-3.5 px-4 text-on-surface-variant">Inspection Reports</td>
<td class="py-3.5 px-4">Al-Yasmin Compound II / A-101</td>
<td class="py-3.5 px-4"><span class="px-2 py-0.5 rounded bg-surface-container font-label-sm text-label-sm font-semibold text-on-surface-variant">PDF</span></td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-surface-container font-label-sm text-label-sm text-on-surface-variant">
<span class="w-1.5 h-1.5 rounded-full bg-outline"></span>Not Generated
              </span>
</td>
<td class="py-3.5 px-4 text-on-surface-variant font-body-sm">Not Reviewed</td>
<td class="py-3.5 px-4 text-body-sm">Restricted</td>
<td class="py-3.5 px-4 text-on-surface-variant font-body-sm">Not Applicable</td>
<td class="py-3.5 px-4 text-right">
<div class="inline-flex items-center gap-1">
<button class="p-1.5 hover:bg-surface-container rounded text-on-surface-variant hover:text-primary transition-colors" type="button" data-demo="edit_note" aria-label="edit note"><span class="material-symbols-outlined text-[18px]">edit_note</span></button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
<div class="p-space-md bg-surface-container-low/50 flex flex-wrap items-center justify-between text-on-surface-variant font-body-sm text-body-sm">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[16px] text-primary">info</span>
<span>Portfolio onboarding note: Al-Yasmin Compound II currently has 4 verified onboarding records. DOC-2026-008 represents an uninitialized inspection placeholder.</span>
</div>
<div class="font-label-md text-label-md">Page 1 of 1</div>
</div>
</div>
<!-- Mid & Bottom Sections: Two-Column Dossier & Operations Architecture -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg">
<!-- LEFT COLUMN: Selected Document Dossier & Organization Hierarchy (7 cols) -->
<div class="lg:col-span-7 flex flex-col gap-space-lg">
<!-- Selected Document Preview Panel -->
<div class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm">
<div class="flex flex-wrap items-start justify-between gap-space-sm mb-space-md">
<div class="flex items-start gap-space-md">
<div class="w-12 h-12 rounded-lg bg-surface-container-low flex items-center justify-center text-primary-container flex-shrink-0">
<span class="material-symbols-outlined text-[32px]">description</span>
</div>
<div>
<div class="flex items-center gap-2">
<span class="font-label-md text-label-md font-mono text-primary bg-primary-fixed/40 px-2 py-0.5 rounded">DOC-2026-003</span>
<span class="font-label-sm text-label-sm uppercase font-semibold text-on-surface-variant px-2 py-0.5 bg-surface-container rounded">v1.0 (Initial)</span>
</div>
<h2 class="font-headline-md text-headline-md text-on-surface mt-1">Property Management Agreement</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Al-Yasmin Compound II • Muqrin Real Estate Holdings Ltd.</p>
</div>
</div>
<div class="flex items-center gap-2">
<button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container-low text-on-surface hover:bg-surface-container transition-colors font-label-md text-label-md font-medium" type="button" data-demo="Download">
<span class="material-symbols-outlined text-[18px]">download</span>
<span>Download</span>
</button>
<button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-primary-container text-on-primary hover:bg-primary transition-colors font-label-md text-label-md font-medium" type="button" data-demo="Preview File">
<span class="material-symbols-outlined text-[18px]">open_in_new</span>
<span>Preview File</span>
</button>
</div>
</div>
<!-- Document Preview Canvas Frame (SVG & Typography Rich) -->
<div class="relative bg-surface-container-low rounded-xl p-space-lg mb-space-md overflow-hidden min-h-[300px] flex flex-col justify-between">
<!-- Subtle watermark style backdrop -->
<div class="absolute -right-12 -bottom-12 opacity-5 pointer-events-none">
<span class="material-symbols-outlined text-[240px] text-primary">contract</span>
</div>
<!-- Document Top Bar Visual -->
<div class="flex items-center justify-between pb-space-sm bg-surface-container-lowest/80 backdrop-blur-md p-space-sm rounded-lg shadow-xs">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-primary">gavel</span>
<span class="font-label-sm text-label-sm font-semibold tracking-wider uppercase text-on-surface">Standard Institutional Property Management Charter</span>
</div>
<div class="font-mono text-label-sm font-medium text-on-surface-variant">REF // SAR-RUH-2026-PM</div>
</div>
<!-- Document Content Excerpt simulation -->
<div class="py-space-md px-space-sm max-w-xl">
<div class="font-label-sm text-label-sm uppercase font-semibold text-primary mb-1">Clause 4.1 — Management Compensation</div>
<p class="font-body-md text-body-md text-on-surface leading-relaxed">
              “The Manager shall be entitled to an illustrative management fee benchmark of <strong class="text-primary font-semibold">8.5% (Eight point five percent)</strong> of the total gross rent collected from all leased residential units within Al-Yasmin Compound II, calculated and disbursed on a per-quarter schedule.”
            </p>
<div class="mt-4 flex flex-wrap gap-4 font-body-sm text-body-sm text-on-surface-variant">
<div><span class="font-medium text-on-surface">Custodian Manager:</span> Eng. Sultan Al-Shammari</div>
<div><span class="font-medium text-on-surface">Review Status:</span> Pending Manager Confirmation</div>
</div>
</div>
<!-- Version Notes Badge -->
<div class="bg-surface-container-lowest/90 backdrop-blur-sm p-space-sm rounded-lg flex items-center justify-between">
<div class="flex items-center gap-2 font-body-sm text-body-sm text-on-surface-variant">
<span class="material-symbols-outlined text-[16px] text-primary">history</span>
<span>Upload notes: <em>Initial onboarding upload by Eng. Sultan Al-Shammari</em></span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">File size: 2.4 MB (PDF)</span>
</div>
</div>
<!-- Management Actions & Disclaimer Notice -->
<div class="flex flex-col sm:flex-row items-center justify-between gap-space-md pt-space-xs">
<div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
<span class="material-symbols-outlined text-[16px] text-primary">verified_user</span>
<span>Illustrative agreement. Document is not government registered or digitally signed.</span>
</div>
<div class="flex items-center gap-space-sm">
<button class="px-3 py-1.5 rounded-lg bg-surface-container-low text-on-surface font-label-md text-label-md hover:bg-surface-container transition-colors" type="button" data-demo="Replace Document">
              Replace Document
            </button>
<button class="px-3 py-1.5 rounded-lg bg-surface-container-low text-on-surface font-label-md text-label-md hover:bg-surface-container transition-colors" type="button" data-demo="Manage Access">
              Manage Access
            </button>
</div>
</div>
</div>
<!-- Hierarchical Document Library Folder Tree -->
<div class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm">
<div class="flex items-center justify-between mb-space-md">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[22px]">account_tree</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Portfolio Hierarchy & Folders</h3>
</div>
<div class="relative w-48">
<span class="material-symbols-outlined absolute left-2.5 top-1/2 -translate-y-1/2 text-[16px] text-on-surface-variant">search</span>
<input class="w-full h-8 pl-8 pr-3 bg-surface-container-low rounded-lg font-body-sm text-body-sm text-on-surface focus:outline-none" placeholder="Filter folders..." type="text">
</div>
</div>
<!-- Folder Tree Items -->
<div class="flex flex-col gap-1 font-body-md text-body-md">
<!-- Root 1 -->
<div class="flex items-center gap-2 py-1 px-2 rounded hover:bg-surface-container-low cursor-pointer" role="button" tabindex="0" data-demo="Properties Root 3 Managed Assets">
<span class="material-symbols-outlined text-[18px] text-primary">folder_open</span>
<span class="font-semibold text-on-surface">Properties Root</span>
<span class="font-label-sm text-label-sm text-on-surface-variant ml-auto">3 Managed Assets</span>
</div>
<!-- Level 1: Al-Yasmin Compound II (Expanded) -->
<div class="ml-6 flex flex-col gap-1">
<div class="flex items-center gap-2 py-1 px-2 rounded bg-surface-container-low text-primary font-medium cursor-pointer" role="button" tabindex="0" data-demo="Al-Yasmin Compound II 4 Docs">
<span class="material-symbols-outlined text-[18px]">domain</span>
<span>Al-Yasmin Compound II</span>
<span class="font-label-sm text-label-sm text-primary font-semibold ml-auto">4 Docs</span>
</div>
<!-- Level 2 Children -->
<div class="ml-6 flex flex-col gap-1 text-body-sm">
<div class="flex items-center gap-2 py-1 px-2 rounded hover:bg-surface-container-low cursor-pointer text-on-surface" role="button" tabindex="0" data-demo="Property Records 2 files">
<span class="material-symbols-outlined text-[16px] text-on-surface-variant">folder</span>
<span>Property Records</span>
<span class="font-label-sm text-label-sm text-on-surface-variant ml-auto">2 files</span>
</div>
<div class="flex items-center gap-2 py-1 px-2 rounded hover:bg-surface-container-low cursor-pointer text-on-surface" role="button" tabindex="0" data-demo="Ownership & Title 1 file">
<span class="material-symbols-outlined text-[16px] text-on-surface-variant">folder</span>
<span>Ownership & Title</span>
<span class="font-label-sm text-label-sm text-on-surface-variant ml-auto">1 file</span>
</div>
<div class="flex items-center gap-2 py-1 px-2 rounded bg-primary-fixed/30 text-primary font-semibold cursor-pointer" role="button" tabindex="0" data-demo="Management Agreement DOC-2026-003">
<span class="material-symbols-outlined text-[16px]">folder</span>
<span>Management Agreement</span>
<span class="font-label-sm text-label-sm ml-auto">DOC-2026-003</span>
</div>
<!-- Units Subdirectory -->
<div class="flex items-center gap-2 py-1 px-2 rounded hover:bg-surface-container-low cursor-pointer text-on-surface" role="button" tabindex="0" data-demo="Units (A-101 to A-120)">
<span class="material-symbols-outlined text-[16px] text-on-surface-variant">folder_open</span>
<span>Units (A-101 to A-120)</span>
</div>
<div class="ml-6 flex flex-col gap-1 text-on-surface-variant">
<div class="flex items-center gap-2 py-0.5 px-2">
<span class="material-symbols-outlined text-[14px]">subdirectory_arrow_right</span>
<span>Unit A-101 / Condition Reports</span>
<span class="font-label-sm text-label-sm text-on-surface-variant italic ml-auto">(Empty)</span>
</div>
</div>
</div>
<!-- Level 1: Other Assets -->
<div class="flex items-center gap-2 py-1 px-2 rounded hover:bg-surface-container-low cursor-pointer text-on-surface" role="button" tabindex="0" data-demo="Marina View Residences 2 Docs">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">apartment</span>
<span>Marina View Residences</span>
<span class="font-label-sm text-label-sm text-on-surface-variant ml-auto">2 Docs</span>
</div>
<div class="flex items-center gap-2 py-1 px-2 rounded hover:bg-surface-container-low cursor-pointer text-on-surface" role="button" tabindex="0" data-demo="Palm Grove Chalets 1 Doc">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">villa</span>
<span>Palm Grove Chalets</span>
<span class="font-label-sm text-label-sm text-on-surface-variant ml-auto">1 Doc</span>
</div>
</div>
</div>
</div>
<!-- Empty State Card: No Condition Report Generated -->
<div class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm flex items-start gap-space-md">
<div class="w-10 h-10 rounded-full bg-surface-container-low flex items-center justify-center text-on-surface-variant flex-shrink-0">
<span class="material-symbols-outlined text-[20px]">assignment_late</span>
</div>
<div class="flex-1">
<div class="flex items-center justify-between">
<h4 class="font-headline-sm text-headline-sm text-on-surface">No Condition Report Generated — Unit A-101</h4>
<span class="font-label-sm text-label-sm px-2 py-0.5 rounded bg-surface-container text-on-surface-variant font-medium">Al-Yasmin Compound II</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
            Initial property condition inspection has not been started. A ratified condition record is required before generating tenant handover folios.
          </p>
<div class="mt-space-md">
<button class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface font-label-md text-label-md font-semibold transition-colors" type="button" data-demo="Start Condition Inspection">
<span class="material-symbols-outlined text-[18px]">play_arrow</span>
<span>Start Condition Inspection</span>
</button>
</div>
</div>
</div>
</div>
<!-- RIGHT COLUMN: Upload Zone, Lifecycle & Governance (5 cols) -->
<div class="lg:col-span-5 flex flex-col gap-space-lg" id="upload-section">
<!-- Interactive Upload Component & Classification Form -->
<div class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm">
<div class="flex items-center justify-between mb-space-md">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[22px]">cloud_upload</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Upload & Classify Document</h3>
</div>
<span class="font-label-sm text-label-sm text-primary bg-primary-fixed/40 px-2 py-0.5 rounded font-semibold">New Entry</span>
</div>
<!-- Drag & Drop Zone -->
<div class="p-space-lg rounded-xl bg-surface-container-low flex flex-col items-center justify-center text-center cursor-pointer hover:bg-surface-container transition-colors mb-space-md" role="button" tabindex="0" data-demo="Drag and drop document files here or Browse Files Supported: PDF, JPG, PNG, DOCX (Max 25MB)">
<div class="w-12 h-12 rounded-full bg-surface-container-lowest flex items-center justify-center text-primary mb-2 shadow-xs">
<span class="material-symbols-outlined text-[24px]">upload_file</span>
</div>
<span class="font-label-lg text-label-lg font-semibold text-on-surface">Drag and drop document files here</span>
<span class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">or <span class="text-primary underline font-medium">Browse Files</span></span>
<span class="font-label-sm text-label-sm text-on-surface-variant mt-2">Supported: PDF, JPG, PNG, DOCX (Max 25MB)</span>
</div>
<!-- Metadata Classification Form Fields -->
<div class="flex flex-col gap-space-sm font-body-md text-body-md">
<div>
<label class="block font-label-md text-label-md font-medium text-on-surface mb-1">Document Title *</label>
<input class="w-full h-10 px-3 bg-surface-container-low rounded-lg text-on-surface placeholder:text-on-surface-variant focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="e.g. 2026 Facility Insurance Endorsement" type="text">
</div>
<div class="grid grid-cols-2 gap-space-sm">
<div>
<label class="block font-label-md text-label-md font-medium text-on-surface mb-1">Category *</label>
<select class="w-full h-10 px-3 bg-surface-container-low rounded-lg text-on-surface focus:outline-none">
<option>Property Documents</option>
<option>Ownership Records</option>
<option>Management Agreements</option>
<option>Rental Contracts</option>
<option>Tenant Documents</option>
<option>Inspection Reports</option>
</select>
</div>
<div>
<label class="block font-label-md text-label-md font-medium text-on-surface mb-1">Access Level *</label>
<select class="w-full h-10 px-3 bg-surface-container-low rounded-lg text-on-surface focus:outline-none">
<option>Property Manager (Tier 2)</option>
<option>Operations Team (Tier 1)</option>
<option>Finance Group (Tier 3)</option>
<option>Authorized Administrator (Tier 4)</option>
</select>
</div>
</div>
<div class="grid grid-cols-2 gap-space-sm">
<div>
<label class="block font-label-md text-label-md font-medium text-on-surface mb-1">Related Property</label>
<select class="w-full h-10 px-3 bg-surface-container-low rounded-lg text-on-surface focus:outline-none">
<option>Al-Yasmin Compound II</option>
<option>Marina View Residences</option>
<option>Palm Grove Chalets</option>
</select>
</div>
<div>
<label class="block font-label-md text-label-md font-medium text-on-surface mb-1">Unit Link (Optional)</label>
<input class="w-full h-10 px-3 bg-surface-container-low rounded-lg text-on-surface placeholder:text-on-surface-variant focus:outline-none" placeholder="e.g. A-101" type="text">
</div>
</div>
<div>
<label class="block font-label-md text-label-md font-medium text-on-surface mb-1">Expiry Date (Optional)</label>
<input class="w-full h-10 px-3 bg-surface-container-low rounded-lg text-on-surface focus:outline-none" type="date">
</div>
<div>
<label class="block font-label-md text-label-md font-medium text-on-surface mb-1">Internal Notes</label>
<textarea class="w-full p-3 bg-surface-container-low rounded-lg text-on-surface placeholder:text-on-surface-variant focus:outline-none resize-none" placeholder="Record internal reference remarks, revision context..." rows="2"></textarea>
</div>
<!-- Notice regarding initial upload state -->
<div class="p-2.5 rounded bg-surface-container-low text-on-surface-variant font-body-sm text-body-sm flex items-start gap-2">
<span class="material-symbols-outlined text-[16px] text-primary-container mt-0.5">lock</span>
<span>Uploads remain in a private staging state visible only to your management tier until categorized and ratified.</span>
</div>
<!-- Upload Form CTA Buttons -->
<div class="flex items-center gap-space-sm pt-space-xs mt-1">
<button class="flex-1 py-2.5 rounded-lg bg-primary-container text-on-primary hover:bg-primary font-label-lg text-label-lg font-semibold shadow-sm transition-colors text-center" type="button" data-demo="Upload Document">
              Upload Document
            </button>
<button class="px-4 py-2.5 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface font-label-lg text-label-lg font-medium transition-colors" type="button" data-demo="Save as Draft">
              Save as Draft
            </button>
</div>
</div>
</div>
<!-- Document Review & Versioning Lifecycle (Interactive Diagram) -->
<div class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm">
<div class="flex items-center justify-between mb-space-md">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[22px]">sync_alt</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Lifecycle & Audit Trail</h3>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">4-Stage Pipeline</span>
</div>
<!-- Horizontal Flow Step Indicators -->
<div class="grid grid-cols-4 gap-2 mb-space-md">
<div class="flex flex-col items-center text-center p-2 rounded bg-surface-container-low">
<span class="material-symbols-outlined text-[20px] text-on-surface-variant mb-1">upload</span>
<span class="font-label-sm text-label-sm font-semibold text-on-surface">1. Draft</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Staging</span>
</div>
<div class="flex flex-col items-center text-center p-2 rounded bg-surface-container-low">
<span class="material-symbols-outlined text-[20px] text-primary mb-1">cloud_done</span>
<span class="font-label-sm text-label-sm font-semibold text-primary">2. Uploaded</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Cataloged</span>
</div>
<div class="flex flex-col items-center text-center p-2 rounded bg-primary-fixed/50">
<span class="material-symbols-outlined text-[20px] text-primary-container mb-1">pending_actions</span>
<span class="font-label-sm text-label-sm font-semibold text-on-primary-fixed">3. Review</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Active</span>
</div>
<div class="flex flex-col items-center text-center p-2 rounded bg-surface-container-low opacity-60">
<span class="material-symbols-outlined text-[20px] text-on-surface-variant mb-1">check_circle</span>
<span class="font-label-sm text-label-sm font-semibold text-on-surface">4. Ratified</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Archived</span>
</div>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
          Files follow an immutable chronological version history. Any replacement creates a subsequent revision record (v1.1+) while preserving the historical onboarding snapshot.
        </p>
</div>
<!-- Document Expiration Monitoring -->
<div class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm">
<div class="flex items-center justify-between mb-space-md">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[22px]">event_repeat</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Expiration Tracker</h3>
</div>
<span class="font-label-sm text-label-sm px-2 py-0.5 rounded bg-surface-container font-medium text-on-surface-variant">System Monitoring</span>
</div>
<div class="flex flex-col gap-space-sm mb-space-md">
<div class="flex items-center justify-between p-2.5 rounded bg-surface-container-low text-body-sm">
<span class="text-on-surface">Expiring Within 30 Days</span>
<span class="font-mono font-medium text-on-surface-variant">Not Calculated</span>
</div>
<div class="flex items-center justify-between p-2.5 rounded bg-surface-container-low text-body-sm">
<span class="text-on-surface">Expired Documents</span>
<span class="font-mono font-medium text-on-surface-variant">Not Calculated</span>
</div>
<div class="flex items-center justify-between p-2.5 rounded bg-secondary-fixed/40 text-body-sm">
<span class="text-on-secondary-fixed font-medium">Missing Expiry Metadata</span>
<span class="font-mono font-semibold text-primary">Review Required (48)</span>
</div>
</div>
<div class="flex items-center gap-2">
<button class="flex-1 py-2 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface font-label-md text-label-md font-medium transition-colors text-center" type="button" data-demo="Review Expirations">
            Review Expirations
          </button>
<button class="flex-1 py-2 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface font-label-md text-label-md font-medium transition-colors text-center flex items-center justify-center gap-1" type="button" data-demo="Configure Reminders (Future)">
<span>Configure Reminders</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">(Future)</span>
</button>
</div>
</div>
<!-- Document Access & Privacy Governance Info Card -->
<div class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm">
<div class="flex items-center gap-2 mb-space-sm">
<span class="material-symbols-outlined text-primary text-[20px]">security</span>
<h4 class="font-label-lg text-label-lg font-semibold text-on-surface">Privacy & RBAC Framework</h4>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md">
          Strict separation of sensitive property intelligence: Tenant PII is masked by default for operational field maintenance crews. Only Tier 3 (Finance) and Tier 4 (Authorized Administrator) hold unredacted contract inspection clearance.
        </p>
<div class="grid grid-cols-2 gap-2 font-label-sm text-label-sm">
<div class="p-2 rounded bg-surface-container-low">
<span class="font-semibold text-on-surface block">Tier 1 — Ops Crew</span>
<span class="text-on-surface-variant">Work orders & site logs</span>
</div>
<div class="p-2 rounded bg-surface-container-low">
<span class="font-semibold text-on-surface block">Tier 2 — Property Mgr</span>
<span class="text-on-surface-variant">Full property dossiers</span>
</div>
<div class="p-2 rounded bg-surface-container-low">
<span class="font-semibold text-on-surface block">Tier 3 — Finance</span>
<span class="text-on-surface-variant">Contracts & remittances</span>
</div>
<div class="p-2 rounded bg-surface-container-low">
<span class="font-semibold text-on-surface block">Tier 4 — Administrator</span>
<span class="text-on-surface-variant">Audit logs & ratification</span>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
