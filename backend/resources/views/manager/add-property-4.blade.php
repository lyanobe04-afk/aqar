{{-- Imported from client_demo/screens/add_new_property_step_4/code.html; static demonstration data. --}}
@extends('layouts.manager')
@section('content')
<div class="flex flex-col w-full">
<!-- BREADCRUMB & HEADER -->
<div class="flex flex-col mb-space-lg">
<nav class="flex items-center gap-space-xs text-on-surface-variant font-label-md text-label-md mb-space-xs">
<a class="hover:text-primary transition-colors" href="{{ route('manager.properties') }}">Properties</a>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<a class="hover:text-primary transition-colors" href="{{ route('manager.add-property-1') }}">Add New Property</a>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="text-on-surface font-semibold">Step 4: Units & Rental Details</span>
</nav>
<div class="flex items-center justify-between">
<div>
<h2 class="font-headline-lg text-headline-lg text-on-surface font-bold tracking-tight">Step 4: Property Units & Rental Configuration</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">Configure rentable units, dimensions, furnishings, tariffs, and booking availability for this asset.</p>
</div>
<div class="flex items-center gap-space-sm">
<span class="font-label-sm text-label-sm uppercase tracking-wider px-3 py-1 bg-surface-container rounded-full text-on-surface-variant font-semibold">PRP-RYD-2026-0089</span>
</div>
</div>
</div>
<!-- 6-STEP PROGRESS TRACKER -->
@include('components.manager.property-steps')
<!-- MAIN CONTENT CONTAINER (2 COLUMNS: ~70% FORM, ~30% SIDEBAR) -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg items-start">
<!-- LEFT COLUMN: WIZARD WORKSPACE (8 COLUMNS) -->
<div class="lg:col-span-8 flex flex-col gap-space-xl">
<!-- SECTION 1: ARCHITECTURE & KPI STATS BAR -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md">
<div class="flex flex-wrap items-center justify-between gap-space-md pb-space-sm">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-lg bg-surface-container-high flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[24px]">corporate_fare</span>
</div>
<div>
<div class="flex items-center gap-2">
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">Multi-Unit Residential Compound</span>
<span class="px-2 py-0.5 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm uppercase tracking-wider font-semibold">Active Mode</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Selected in Step 1 for <strong class="text-on-surface">Al-Yasmin Compound II</strong>. Standalone villas/chalets can switch to Single-Unit mode.</p>
</div>
</div>
<div class="flex items-center gap-space-xs">
<button class="px-3 py-1.5 rounded-lg bg-surface-container-high hover:bg-surface-container text-on-surface font-label-md text-label-md font-medium transition-colors flex items-center gap-1.5" type="button" data-demo="Bulk Unit Generator">
<span class="material-symbols-outlined text-[18px]">auto_fix_high</span>
<span>Bulk Unit Generator</span>
</button>
<button class="px-3 py-1.5 rounded-lg bg-primary-container hover:bg-primary text-on-primary font-label-md text-label-md font-semibold transition-colors flex items-center gap-1.5 shadow-sm" type="button" data-demo="Add Single Unit">
<span class="material-symbols-outlined text-[18px]">add</span>
<span>Add Single Unit</span>
</button>
</div>
</div>
<!-- KPI Metrics Grid -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-space-sm pt-space-xs">
<div class="bg-surface-container-low rounded-lg p-space-md flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">Total Planned</span>
<div class="flex items-baseline gap-1 mt-1">
<span class="font-headline-md text-headline-md font-bold text-on-surface">12</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Units</span>
</div>
</div>
<div class="bg-surface-container-low rounded-lg p-space-md flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">Configured</span>
<div class="flex items-baseline gap-1 mt-1">
<span class="font-headline-md text-headline-md font-bold text-primary">4</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">/ 12 done</span>
</div>
</div>
<div class="bg-surface-container-low rounded-lg p-space-md flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">Pending Setup</span>
<div class="flex items-baseline gap-1 mt-1">
<span class="font-headline-md text-headline-md font-bold text-secondary">8</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Units left</span>
</div>
</div>
<div class="bg-surface-container-low rounded-lg p-space-md flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">Categories</span>
<div class="flex items-baseline gap-1 mt-1">
<span class="font-headline-md text-headline-md font-bold text-on-surface">2</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Types defined</span>
</div>
</div>
</div>
</div>
<!-- SECTION 2: UNITS INVENTORY TABLE -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md">
<div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-space-sm">
<div>
<h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">Units Inventory List</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">4 configured assets ready for rental syndication</p>
</div>
<!-- Filters -->
<div class="flex flex-wrap items-center gap-space-xs w-full md:w-auto">
<div class="relative flex-1 md:w-48">
<span class="material-symbols-outlined absolute left-2.5 top-2 text-on-surface-variant text-[18px]">search</span>
<input class="w-full h-8 pl-8 pr-3 text-body-sm font-body-sm bg-surface-container-low rounded-lg border-0 focus:ring-1 focus:ring-primary text-on-surface" placeholder="Search unit..." type="text">
</div>
<select class="h-8 px-2.5 text-body-sm font-body-sm bg-surface-container-low rounded-lg border-0 text-on-surface focus:ring-1 focus:ring-primary">
<option>All Blocks</option>
<option>Block A (Palm)</option>
<option>Block B (Oasis)</option>
<option>Zone C (Villas)</option>
</select>
<select class="h-8 px-2.5 text-body-sm font-body-sm bg-surface-container-low rounded-lg border-0 text-on-surface focus:ring-1 focus:ring-primary">
<option>All Types</option>
<option>Apartments</option>
<option>Studios</option>
<option>Villas</option>
</select>
</div>
</div>
<!-- Comprehensive Table -->
<div class="overflow-x-auto rounded-lg">
<table class="w-full text-left font-body-sm text-body-sm border-collapse">
<thead class="bg-surface-container-low text-on-surface-variant uppercase font-label-sm text-label-sm tracking-wider">
<tr>
<th class="py-3 px-space-md font-semibold">Unit & Location</th>
<th class="py-3 px-space-md font-semibold">Type & Specs</th>
<th class="py-3 px-space-md font-semibold">Furnishing</th>
<th class="py-3 px-space-md font-semibold">Tariff (SAR)</th>
<th class="py-3 px-space-md font-semibold">Status</th>
<th class="py-3 px-space-md font-semibold text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container">
<!-- Row 1: A-101 (Active Edit) -->
<tr class="bg-primary/5 hover:bg-primary/10 transition-colors">
<td class="py-3 px-space-md">
<div class="flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-primary shrink-0"></span>
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">A-101</span>
<span class="text-on-surface-variant font-label-sm text-label-sm">(Editing)</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">Ground Floor • Block A (Palm)</span>
</td>
<td class="py-3 px-space-md">
<span class="font-medium text-on-surface">2BHK Apartment</span>
<div class="text-on-surface-variant font-label-sm text-label-sm">2 Bed • 2 Bath • 115 m²</div>
</td>
<td class="py-3 px-space-md">
<span class="inline-flex items-center gap-1 text-on-surface font-medium">
<span class="material-symbols-outlined text-[16px] text-primary">check</span> Fully Furnished
                  </span>
</td>
<td class="py-3 px-space-md">
<div class="font-bold text-on-surface">7,500 <span class="text-on-surface-variant font-normal">/mo</span></div>
<div class="text-on-surface-variant font-label-sm text-label-sm">85,000 /yr</div>
</td>
<td class="py-3 px-space-md">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-label-sm font-label-sm font-semibold bg-[#EBF6F0] text-[#2E7D32]">
<span class="w-1.5 h-1.5 rounded-full bg-[#2E7D32]"></span> Available
                  </span>
</td>
<td class="py-3 px-space-md text-right">
<div class="inline-flex items-center gap-1">
<button class="p-1 hover:bg-surface-container rounded text-primary transition-colors" title="Edit Unit" data-demo="Edit Unit" type="button" aria-label="Edit Unit"><span class="material-symbols-outlined text-[18px]">edit</span></button>
<button class="p-1 hover:bg-surface-container rounded text-on-surface-variant transition-colors" title="Duplicate Unit" data-demo="Duplicate Unit" type="button" aria-label="Duplicate Unit"><span class="material-symbols-outlined text-[18px]">content_copy</span></button>
<button class="p-1 hover:bg-surface-container rounded text-error transition-colors" title="Delete Unit" data-demo="Delete Unit" type="button" aria-label="Delete Unit"><span class="material-symbols-outlined text-[18px]">delete</span></button>
</div>
</td>
</tr>
<!-- Row 2: A-102 -->
<tr class="hover:bg-surface-container-low transition-colors">
<td class="py-3 px-space-md">
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">A-102</span>
<div class="font-label-sm text-label-sm text-on-surface-variant">Ground Floor • Block A (Palm)</div>
</td>
<td class="py-3 px-space-md">
<span class="font-medium text-on-surface">3BHK Apartment</span>
<div class="text-on-surface-variant font-label-sm text-label-sm">3 Bed • 3 Bath • 145 m²</div>
</td>
<td class="py-3 px-space-md">
<span class="text-on-surface">Partially Furnished</span>
</td>
<td class="py-3 px-space-md">
<div class="font-bold text-on-surface">9,200 <span class="text-on-surface-variant font-normal">/mo</span></div>
<div class="text-on-surface-variant font-label-sm text-label-sm">105,000 /yr</div>
</td>
<td class="py-3 px-space-md">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-label-sm font-label-sm font-semibold bg-[#EBF6F0] text-[#2E7D32]">
<span class="w-1.5 h-1.5 rounded-full bg-[#2E7D32]"></span> Available
                  </span>
</td>
<td class="py-3 px-space-md text-right">
<div class="inline-flex items-center gap-1">
<button class="p-1 hover:bg-surface-container rounded text-on-surface-variant hover:text-primary transition-colors" title="Edit Unit" data-demo="Edit Unit" type="button" aria-label="Edit Unit"><span class="material-symbols-outlined text-[18px]">edit</span></button>
<button class="p-1 hover:bg-surface-container rounded text-on-surface-variant transition-colors" title="Duplicate Unit" data-demo="Duplicate Unit" type="button" aria-label="Duplicate Unit"><span class="material-symbols-outlined text-[18px]">content_copy</span></button>
<button class="p-1 hover:bg-surface-container rounded text-error transition-colors" title="Delete Unit" data-demo="Delete Unit" type="button" aria-label="Delete Unit"><span class="material-symbols-outlined text-[18px]">delete</span></button>
</div>
</td>
</tr>
<!-- Row 3: B-201 -->
<tr class="hover:bg-surface-container-low transition-colors">
<td class="py-3 px-space-md">
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">B-201</span>
<div class="font-label-sm text-label-sm text-on-surface-variant">Floor 2 • Block B (Oasis)</div>
</td>
<td class="py-3 px-space-md">
<span class="font-medium text-on-surface">1BHK Executive Studio</span>
<div class="text-on-surface-variant font-label-sm text-label-sm">1 Bed • 1.5 Bath • 78 m²</div>
</td>
<td class="py-3 px-space-md">
<span class="text-on-surface">Fully Furnished</span>
</td>
<td class="py-3 px-space-md">
<div class="font-bold text-on-surface">5,400 <span class="text-on-surface-variant font-normal">/mo</span></div>
<div class="text-on-surface-variant font-label-sm text-label-sm">60,000 /yr</div>
</td>
<td class="py-3 px-space-md">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-label-sm font-label-sm font-semibold bg-[#FEF3F2] text-[#C0392B]">
<span class="w-1.5 h-1.5 rounded-full bg-[#C0392B]"></span> Reserved
                  </span>
</td>
<td class="py-3 px-space-md text-right">
<div class="inline-flex items-center gap-1">
<button class="p-1 hover:bg-surface-container rounded text-on-surface-variant hover:text-primary transition-colors" title="Edit Unit" data-demo="Edit Unit" type="button" aria-label="Edit Unit"><span class="material-symbols-outlined text-[18px]">edit</span></button>
<button class="p-1 hover:bg-surface-container rounded text-on-surface-variant transition-colors" title="Duplicate Unit" data-demo="Duplicate Unit" type="button" aria-label="Duplicate Unit"><span class="material-symbols-outlined text-[18px]">content_copy</span></button>
<button class="p-1 hover:bg-surface-container rounded text-error transition-colors" title="Delete Unit" data-demo="Delete Unit" type="button" aria-label="Delete Unit"><span class="material-symbols-outlined text-[18px]">delete</span></button>
</div>
</td>
</tr>
<!-- Row 4: V-01 -->
<tr class="hover:bg-surface-container-low transition-colors">
<td class="py-3 px-space-md">
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">V-01</span>
<div class="font-label-sm text-label-sm text-on-surface-variant">Standalone • Zone C</div>
</td>
<td class="py-3 px-space-md">
<span class="font-medium text-on-surface">4BHK Luxury Villa</span>
<div class="text-on-surface-variant font-label-sm text-label-sm">4 Bed • 5 Bath • 380 m²</div>
</td>
<td class="py-3 px-space-md">
<span class="text-on-surface">Unfurnished</span>
</td>
<td class="py-3 px-space-md">
<div class="font-bold text-on-surface">180,000 <span class="text-on-surface-variant font-normal">/yr</span></div>
<div class="text-on-surface-variant font-label-sm text-label-sm">16,000 /mo eq.</div>
</td>
<td class="py-3 px-space-md">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-label-sm font-label-sm font-semibold bg-surface-container text-on-surface-variant">
<span class="w-1.5 h-1.5 rounded-full bg-outline"></span> Maintenance
                  </span>
</td>
<td class="py-3 px-space-md text-right">
<div class="inline-flex items-center gap-1">
<button class="p-1 hover:bg-surface-container rounded text-on-surface-variant hover:text-primary transition-colors" title="Edit Unit" data-demo="Edit Unit" type="button" aria-label="Edit Unit"><span class="material-symbols-outlined text-[18px]">edit</span></button>
<button class="p-1 hover:bg-surface-container rounded text-on-surface-variant transition-colors" title="Duplicate Unit" data-demo="Duplicate Unit" type="button" aria-label="Duplicate Unit"><span class="material-symbols-outlined text-[18px]">content_copy</span></button>
<button class="p-1 hover:bg-surface-container rounded text-error transition-colors" title="Delete Unit" data-demo="Delete Unit" type="button" aria-label="Delete Unit"><span class="material-symbols-outlined text-[18px]">delete</span></button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Table Footer / Pagination -->
<div class="flex items-center justify-between pt-space-xs text-on-surface-variant font-label-sm text-label-sm">
<span>Showing 4 of 12 planned units</span>
<div class="flex items-center gap-1">
<button class="px-2.5 py-1 rounded bg-surface-container text-on-surface-variant opacity-50 cursor-not-allowed" data-demo="Previous" type="button">Previous</button>
<button class="px-2.5 py-1 rounded bg-primary text-on-primary font-bold" data-demo="1" type="button">1</button>
<button class="px-2.5 py-1 rounded bg-surface-container hover:bg-surface-container-high text-on-surface transition-colors" data-demo="2" type="button">2</button>
<button class="px-2.5 py-1 rounded bg-surface-container hover:bg-surface-container-high text-on-surface transition-colors" data-demo="3" type="button">3</button>
<button class="px-2.5 py-1 rounded bg-surface-container hover:bg-surface-container-high text-on-surface transition-colors" data-demo="Next" type="button">Next</button>
</div>
</div>
</div>
<!-- SECTION 3: INLINE UNIT EDITOR (EDITING "A-101") -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-lg">
<div class="flex items-center justify-between pb-space-sm border-b border-surface-container">
<div class="flex items-center gap-space-sm">
<div class="w-9 h-9 rounded-lg bg-primary-container text-on-primary flex items-center justify-center font-bold font-label-md text-label-md">
              A-101
            </div>
<div>
<h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">Unit Identity & Architectural Specifications</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Currently editing details for Unit A-101 (Floor Ground, Palm Wing)</p>
</div>
</div>
<span class="px-3 py-1 bg-surface-container rounded-full font-label-sm text-label-sm font-semibold text-primary">Unit 1 of 12</span>
</div>
<!-- Identity & Location Fields -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-space-md">
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-semibold">Unit Number / Identifier *</label>
<input class="h-10 px-3 bg-surface-container-low rounded-lg border-0 text-on-surface font-medium focus:ring-2 focus:ring-primary" type="text" value="A-101">
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-semibold">Unit Type *</label>
<select class="h-10 px-3 bg-surface-container-low rounded-lg border-0 text-on-surface font-medium focus:ring-2 focus:ring-primary">
<option selected="">Residential Apartment</option>
<option>Executive Penthouse</option>
<option>Studio Loft</option>
<option>Townhouse</option>
</select>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-semibold">Building / Block *</label>
<input class="h-10 px-3 bg-surface-container-low rounded-lg border-0 text-on-surface font-medium focus:ring-2 focus:ring-primary" type="text" value="Block A — Palm Wing">
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-semibold">Floor Level *</label>
<input class="h-10 px-3 bg-surface-container-low rounded-lg border-0 text-on-surface font-medium focus:ring-2 focus:ring-primary" type="text" value="Ground Floor (Level 0)">
</div>
</div>
<!-- Specifications Steppers & Inputs -->
<div class="grid grid-cols-2 md:grid-cols-6 gap-space-md">
<div class="flex flex-col gap-1.5 col-span-2">
<div class="flex items-center justify-between">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-semibold">Total Floor Area</label>
<div class="flex bg-surface-container rounded p-0.5 text-label-sm font-label-sm">
<button class="px-2 py-0.5 rounded bg-surface-container-lowest text-on-surface font-bold shadow-xs" type="button" data-demo="m²">m²</button>
<button class="px-2 py-0.5 text-on-surface-variant hover:text-on-surface" type="button" data-demo="sq ft">sq ft</button>
</div>
</div>
<div class="relative">
<input class="h-10 w-full px-3 pr-10 bg-surface-container-low rounded-lg border-0 text-on-surface font-bold focus:ring-2 focus:ring-primary" type="number" value="115">
<span class="absolute right-3 top-2.5 font-label-sm text-label-sm text-on-surface-variant font-medium">m²</span>
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-semibold">Bedrooms</label>
<div class="flex items-center h-10 bg-surface-container-low rounded-lg px-2 justify-between">
<button class="text-on-surface-variant hover:text-primary" type="button" data-demo="remove" aria-label="remove"><span class="material-symbols-outlined text-[18px]">remove</span></button>
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">2</span>
<button class="text-on-surface-variant hover:text-primary" type="button" data-demo="add" aria-label="add"><span class="material-symbols-outlined text-[18px]">add</span></button>
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-semibold">Bathrooms</label>
<div class="flex items-center h-10 bg-surface-container-low rounded-lg px-2 justify-between">
<button class="text-on-surface-variant hover:text-primary" type="button" data-demo="remove" aria-label="remove"><span class="material-symbols-outlined text-[18px]">remove</span></button>
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">2</span>
<button class="text-on-surface-variant hover:text-primary" type="button" data-demo="add" aria-label="add"><span class="material-symbols-outlined text-[18px]">add</span></button>
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-semibold">Living Rooms</label>
<input class="h-10 px-3 bg-surface-container-low rounded-lg border-0 text-on-surface font-semibold text-center focus:ring-2 focus:ring-primary" type="number" value="1">
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-semibold">Kitchens</label>
<input class="h-10 px-3 bg-surface-container-low rounded-lg border-0 text-on-surface font-semibold text-center focus:ring-2 focus:ring-primary" type="number" value="1">
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-semibold">Max Occupants Capacity</label>
<input class="h-10 px-3 bg-surface-container-low rounded-lg border-0 text-on-surface focus:ring-2 focus:ring-primary" type="text" value="4 Adults + 1 Child">
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-semibold">Assigned Parking Bay</label>
<input class="h-10 px-3 bg-surface-container-low rounded-lg border-0 text-on-surface focus:ring-2 focus:ring-primary" type="text" value="1 Dedicated Bay (#P-14 Basement A)">
</div>
</div>
<!-- Furnishing Status -->
<div class="flex flex-col gap-space-xs">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-semibold">Furnishing Level</label>
<div class="grid grid-cols-1 md:grid-cols-3 gap-space-sm">
<label class="flex items-center gap-space-sm p-space-sm rounded-lg bg-primary/5 ring-1 ring-primary/30 cursor-pointer">
<input checked="" class="text-primary focus:ring-primary" name="furnishing_unit" type="radio">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-on-surface">Fully Furnished</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Move-in ready with furniture & appliances</span>
</div>
</label>
<label class="flex items-center gap-space-sm p-space-sm rounded-lg bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors">
<input class="text-primary focus:ring-primary" name="furnishing_unit" type="radio">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-on-surface">Partially Furnished</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Fitted kitchen, closets & white goods</span>
</div>
</label>
<label class="flex items-center gap-space-sm p-space-sm rounded-lg bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors">
<input class="text-primary focus:ring-primary" name="furnishing_unit" type="radio">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-on-surface">Unfurnished</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Bare shell ready for tenant decoration</span>
</div>
</label>
</div>
<div class="flex items-center gap-2 p-2.5 bg-surface-container rounded-lg text-on-surface-variant font-body-sm text-body-sm mt-1">
<span class="material-symbols-outlined text-[18px] text-primary">info</span>
<span>Detailed asset tagging and itemized inventory can be configured later in the <strong>Furniture Inventory</strong> module.</span>
</div>
</div>
<!-- Amenities Chips -->
<div class="flex flex-col gap-space-xs">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-semibold">Unit Amenities & Features</label>
<div class="flex flex-wrap gap-2">
<!-- Active Pills -->
<button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-primary-container text-on-primary font-label-md text-label-md font-medium shadow-xs" type="button" data-demo="Central AC">
<span class="material-symbols-outlined text-[16px]">ac_unit</span> Central AC
              <span class="material-symbols-outlined text-[14px]">check</span>
</button>
<button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-primary-container text-on-primary font-label-md text-label-md font-medium shadow-xs" type="button" data-demo="High-Speed Wi-Fi">
<span class="material-symbols-outlined text-[16px]">wifi</span> High-Speed Wi-Fi
              <span class="material-symbols-outlined text-[14px]">check</span>
</button>
<button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-primary-container text-on-primary font-label-md text-label-md font-medium shadow-xs" type="button" data-demo="Dedicated Parking">
<span class="material-symbols-outlined text-[16px]">local_parking</span> Dedicated Parking
              <span class="material-symbols-outlined text-[14px]">check</span>
</button>
<button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-primary-container text-on-primary font-label-md text-label-md font-medium shadow-xs" type="button" data-demo="Private Balcony">
<span class="material-symbols-outlined text-[16px]">balcony</span> Private Balcony
              <span class="material-symbols-outlined text-[14px]">check</span>
</button>
<button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-primary-container text-on-primary font-label-md text-label-md font-medium shadow-xs" type="button" data-demo="24/7 Security">
<span class="material-symbols-outlined text-[16px]">security</span> 24/7 Security
              <span class="material-symbols-outlined text-[14px]">check</span>
</button>
<!-- Inactive / Selectable Pills -->
<button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md font-medium transition-colors" type="button" data-demo="Swimming Pool Access">
<span class="material-symbols-outlined text-[16px]">pool</span> Swimming Pool Access
            </button>
<button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md font-medium transition-colors" type="button" data-demo="Private Garden">
<span class="material-symbols-outlined text-[16px]">yard</span> Private Garden
            </button>
<button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md font-medium transition-colors" type="button" data-demo="Elevator Access">
<span class="material-symbols-outlined text-[16px]">elevator</span> Elevator Access
            </button>
<button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md font-medium transition-colors" type="button" data-demo="Fitted Kitchen Appliances">
<span class="material-symbols-outlined text-[16px]">countertops</span> Fitted Kitchen Appliances
            </button>
<button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full border border-dashed border-outline-variant text-primary hover:bg-surface-container font-label-md text-label-md font-medium transition-colors" type="button" data-demo="Add Custom Amenity">
<span class="material-symbols-outlined text-[16px]">add</span> Add Custom Amenity
            </button>
</div>
</div>
</div>
<!-- SECTION 4: RENTAL TARIFF CONFIGURATION -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-lg">
<div class="flex items-center justify-between pb-space-sm border-b border-surface-container">
<div class="flex items-center gap-space-sm">
<div class="w-9 h-9 rounded-lg bg-surface-container-high flex items-center justify-center text-primary font-bold">
<span class="material-symbols-outlined text-[20px]">payments</span>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">Rental Tariff & Cadence Matrix</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Pricing structure and term boundaries for Unit A-101</p>
</div>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider font-semibold">Ejar Compliant Rates</span>
</div>
<!-- Rental Periods Supported -->
<div class="flex flex-col gap-space-xs">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-semibold">Enabled Billing Cadences</label>
<div class="grid grid-cols-2 sm:grid-cols-4 gap-space-sm">
<label class="flex items-center gap-2 p-space-sm bg-surface-container-low rounded-lg cursor-pointer">
<input checked="" class="text-primary focus:ring-primary rounded" type="checkbox">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-on-surface">Monthly</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Standard 30-day cycle</span>
</div>
</label>
<label class="flex items-center gap-2 p-space-sm bg-surface-container-low rounded-lg cursor-pointer">
<input checked="" class="text-primary focus:ring-primary rounded" type="checkbox">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-on-surface">Yearly</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Annual contractual lease</span>
</div>
</label>
<label class="flex items-center gap-2 p-space-sm bg-surface-container rounded-lg opacity-60 cursor-not-allowed">
<input class="text-on-surface-variant rounded" disabled="" type="checkbox">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-medium text-on-surface">Weekly</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Short term</span>
</div>
</label>
<label class="flex items-center gap-2 p-space-sm bg-surface-container rounded-lg opacity-60 cursor-not-allowed">
<input class="text-on-surface-variant rounded" disabled="" type="checkbox">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-medium text-on-surface">Daily (Hospitality)</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Requires tourism permit</span>
</div>
</label>
</div>
</div>
<!-- Tariff Inputs -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
<!-- Monthly Tariff -->
<div class="flex flex-col gap-1.5 p-space-md bg-surface-container-low rounded-xl">
<div class="flex items-center justify-between">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-bold">Monthly Rental Rate *</label>
<span class="font-label-sm text-label-sm text-primary font-semibold">Active Cadence</span>
</div>
<div class="flex items-center gap-2 mt-1">
<input class="h-11 w-full px-3 text-headline-sm font-headline-sm font-bold bg-surface-container-lowest rounded-lg border-0 text-on-surface focus:ring-2 focus:ring-primary" type="text" value="7,500">
<select class="h-11 px-3 bg-surface-container-lowest rounded-lg border-0 font-label-md text-label-md font-semibold text-on-surface">
<option selected="">SAR (﷼)</option>
<option>USD ($)</option>
<option>EUR (€)</option>
<option>AED (د.إ)</option>
<option>GBP (£)</option>
</select>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Billed monthly in advance via digital Ejar invoice</p>
</div>
<!-- Yearly Tariff -->
<div class="flex flex-col gap-1.5 p-space-md bg-surface-container-low rounded-xl">
<div class="flex items-center justify-between">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-bold">Annual Fixed Rate *</label>
<span class="font-label-sm text-label-sm text-primary font-semibold">Discounted Rate</span>
</div>
<div class="flex items-center gap-2 mt-1">
<input class="h-11 w-full px-3 text-headline-sm font-headline-sm font-bold bg-surface-container-lowest rounded-lg border-0 text-on-surface focus:ring-2 focus:ring-primary" type="text" value="85,000">
<div class="h-11 px-4 bg-surface-container rounded-lg flex items-center font-label-md text-label-md font-semibold text-on-surface shrink-0">
                SAR / Year
              </div>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Equivalent to 7,083 SAR / month (5.5% annual lease discount)</p>
</div>
</div>
<!-- Term Boundaries & Deposits -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-space-md">
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-semibold">Min Lease Term</label>
<select class="h-10 px-3 bg-surface-container-low rounded-lg border-0 text-on-surface font-medium focus:ring-2 focus:ring-primary">
<option>1 Month</option>
<option selected="">3 Months</option>
<option>6 Months</option>
<option>12 Months</option>
</select>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-semibold">Max Lease Term</label>
<select class="h-10 px-3 bg-surface-container-low rounded-lg border-0 text-on-surface font-medium focus:ring-2 focus:ring-primary">
<option>6 Months</option>
<option selected="">12 Months (1 Year)</option>
<option>24 Months (2 Years)</option>
<option>36 Months</option>
</select>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-semibold">Security Deposit</label>
<div class="relative">
<input class="h-10 w-full px-3 pr-12 bg-surface-container-low rounded-lg border-0 text-on-surface font-medium focus:ring-2 focus:ring-primary" type="text" value="5,000">
<span class="absolute right-3 top-2.5 font-label-sm text-label-sm text-on-surface-variant font-medium">SAR</span>
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-semibold">Move-In / Admin Fee</label>
<div class="relative">
<input class="h-10 w-full px-3 pr-12 bg-surface-container-low rounded-lg border-0 text-on-surface font-medium focus:ring-2 focus:ring-primary" type="text" value="450">
<span class="absolute right-3 top-2.5 font-label-sm text-label-sm text-on-surface-variant font-medium">SAR</span>
</div>
</div>
</div>
</div>
<!-- SECTION 5: AVAILABILITY & BOOKING SETTINGS -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-lg">
<div class="flex items-center justify-between pb-space-sm border-b border-surface-container">
<div class="flex items-center gap-space-sm">
<div class="w-9 h-9 rounded-lg bg-surface-container-high flex items-center justify-center text-primary font-bold">
<span class="material-symbols-outlined text-[20px]">event_available</span>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">Availability & Booking Governance</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Control occupancy scheduling, readiness dates, and tenant booking flow</p>
</div>
</div>
<span class="px-2.5 py-1 rounded bg-[#EBF6F0] text-[#2E7D32] font-label-sm text-label-sm font-bold">Ready to Market</span>
</div>
<!-- Availability Status Radios -->
<div class="flex flex-col gap-space-xs">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-semibold">Initial Availability Status</label>
<div class="grid grid-cols-2 sm:grid-cols-4 gap-space-sm">
<label class="flex items-center gap-2 p-space-sm rounded-lg bg-[#EBF6F0]/60 ring-1 ring-[#2E7D32]/30 cursor-pointer">
<input checked="" class="text-[#2E7D32] focus:ring-[#2E7D32]" name="unit_avail_status" type="radio">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-on-surface">Available</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Immediate leasing</span>
</div>
</label>
<label class="flex items-center gap-2 p-space-sm rounded-lg bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors">
<input class="text-primary focus:ring-primary" name="unit_avail_status" type="radio">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-on-surface">Occupied</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Existing lease active</span>
</div>
</label>
<label class="flex items-center gap-2 p-space-sm rounded-lg bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors">
<input class="text-primary focus:ring-primary" name="unit_avail_status" type="radio">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-on-surface">Reserved</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Holding deposit paid</span>
</div>
</label>
<label class="flex items-center gap-2 p-space-sm rounded-lg bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors">
<input class="text-primary focus:ring-primary" name="unit_avail_status" type="radio">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-on-surface">Maintenance</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Deep turnover repair</span>
</div>
</label>
</div>
</div>
<!-- Workflow Model -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
<div class="p-space-md rounded-xl bg-primary/5 ring-1 ring-primary/30 flex flex-col gap-2">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2">
<input checked="" class="text-primary focus:ring-primary" name="booking_model" type="radio">
<span class="font-label-md text-label-md font-bold text-on-surface">Request to Book</span>
</div>
<span class="font-label-sm text-label-sm uppercase tracking-wider bg-primary-container text-on-primary px-2 py-0.5 rounded font-semibold">Standard</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Prospective tenants submit an application. Property Manager manually screens credit score and approves contract.</p>
</div>
<div class="p-space-md rounded-xl bg-surface-container-low opacity-75 flex flex-col gap-2">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2">
<input class="text-outline focus:ring-outline cursor-not-allowed" disabled="" name="booking_model" type="radio">
<span class="font-label-md text-label-md font-semibold text-on-surface">Instant Booking</span>
</div>
<span class="font-label-sm text-label-sm uppercase tracking-wider bg-surface-container-highest text-on-surface-variant px-2 py-0.5 rounded font-semibold">Phase 2</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Automated Ejar verification and digital payment execution without human intervention. Coming soon.</p>
</div>
</div>
<!-- Date Range & Mini Calendar Preview -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-space-md items-center">
<div class="md:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-space-sm">
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-semibold">Available From</label>
<div class="relative">
<input class="h-10 w-full px-3 bg-surface-container-low rounded-lg border-0 text-on-surface font-medium focus:ring-2 focus:ring-primary" type="date" value="2026-04-01">
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-semibold">Available Until</label>
<div class="relative">
<input class="h-10 w-full px-3 bg-surface-container-low rounded-lg border-0 text-on-surface font-medium text-on-surface-variant cursor-not-allowed" readonly="" type="text" value="Open-Ended (No Expiry)">
</div>
</div>
<div class="col-span-full pt-1">
<label class="inline-flex items-center gap-2 text-on-surface font-body-sm text-body-sm cursor-pointer">
<input checked="" class="text-primary focus:ring-primary rounded" type="checkbox">
<span>Publish automatically to Majlis Tenant Marketplace once Step 6 is approved</span>
</label>
</div>
</div>
<!-- Mini Calendar Widget -->
<div class="md:col-span-5 bg-surface-container-low p-space-md rounded-xl flex flex-col gap-space-xs">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md font-bold text-on-surface">April 2026 Schedule</span>
<span class="font-label-sm text-label-sm text-primary font-semibold">30 Days Open</span>
</div>
<!-- Calendar Grid -->
<div class="grid grid-cols-7 gap-1 text-center font-label-sm text-label-sm pt-1">
<span class="text-on-surface-variant font-semibold">Su</span>
<span class="text-on-surface-variant font-semibold">Mo</span>
<span class="text-on-surface-variant font-semibold">Tu</span>
<span class="text-on-surface-variant font-semibold">We</span>
<span class="text-on-surface-variant font-semibold">Th</span>
<span class="text-on-surface-variant font-semibold">Fr</span>
<span class="text-on-surface-variant font-semibold">Sa</span>
<span class="p-1 opacity-30">29</span>
<span class="p-1 opacity-30">30</span>
<span class="p-1 opacity-30">31</span>
<span class="p-1 rounded bg-[#EBF6F0] text-[#2E7D32] font-bold">1</span>
<span class="p-1 rounded bg-[#EBF6F0] text-[#2E7D32] font-bold">2</span>
<span class="p-1 rounded bg-[#EBF6F0] text-[#2E7D32] font-bold">3</span>
<span class="p-1 rounded bg-[#EBF6F0] text-[#2E7D32] font-bold">4</span>
<span class="p-1 rounded bg-[#EBF6F0] text-[#2E7D32]">5</span>
<span class="p-1 rounded bg-[#EBF6F0] text-[#2E7D32]">6</span>
<span class="p-1 rounded bg-[#EBF6F0] text-[#2E7D32]">7</span>
<span class="p-1 rounded bg-[#EBF6F0] text-[#2E7D32]">8</span>
<span class="p-1 rounded bg-[#EBF6F0] text-[#2E7D32]">9</span>
<span class="p-1 rounded bg-[#EBF6F0] text-[#2E7D32]">10</span>
<span class="p-1 rounded bg-[#EBF6F0] text-[#2E7D32]">11</span>
<span class="p-1 rounded bg-[#EBF6F0] text-[#2E7D32]">12</span>
<span class="p-1 rounded bg-[#EBF6F0] text-[#2E7D32]">13</span>
<span class="p-1 rounded bg-[#EBF6F0] text-[#2E7D32]">14</span>
<span class="p-1 rounded bg-[#EBF6F0] text-[#2E7D32]">15</span>
<span class="p-1 rounded bg-[#EBF6F0] text-[#2E7D32]">16</span>
<span class="p-1 rounded bg-[#EBF6F0] text-[#2E7D32]">17</span>
<span class="p-1 rounded bg-[#EBF6F0] text-[#2E7D32]">18</span>
</div>
<div class="flex items-center gap-2 mt-1 pt-1 border-t border-surface-container font-label-sm text-label-sm text-on-surface-variant">
<span class="w-2 h-2 rounded-full bg-[#2E7D32]"></span> Available
              <span class="w-2 h-2 rounded-full bg-[#C0392B] ml-2"></span> Booked
            </div>
</div>
</div>
<!-- Inline Save / Discard for Unit A-101 -->
<div class="flex items-center justify-between pt-space-sm border-t border-surface-container">
<span class="font-body-sm text-body-sm text-on-surface-variant">Changes to <strong>Unit A-101</strong> will update inventory immediately</span>
<div class="flex items-center gap-space-xs">
<button class="px-3 py-1.5 rounded-lg bg-surface-container-high hover:bg-surface-container text-on-surface font-label-md text-label-md font-medium transition-colors" type="button" data-demo="Discard Unit Changes">Discard Unit Changes</button>
<button class="px-4 py-1.5 rounded-lg bg-primary-container hover:bg-primary text-on-primary font-label-md text-label-md font-semibold transition-colors shadow-sm" type="button" data-demo="Update Unit A-101">Update Unit A-101</button>
</div>
</div>
</div>
<!-- SECTION 6: BULK UNIT MANAGEMENT TOOL -->
<div class="bg-surface-container-low rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md">
<div class="flex items-start justify-between gap-space-md">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-lg bg-surface-container-highest flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[24px]">dataset</span>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">Need to create standard units in batches?</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Use the bulk generator pattern builder to quickly populate floors with uniform dimensions.</p>
</div>
</div>
<span class="px-2.5 py-1 rounded bg-surface-container-high text-on-surface font-label-sm text-label-sm font-semibold">Bulk Wizard</span>
</div>
<div class="bg-surface-container-lowest p-space-md rounded-lg flex flex-col gap-space-sm">
<div class="grid grid-cols-1 sm:grid-cols-5 gap-space-sm">
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">Prefix Pattern</label>
<input class="h-9 px-3 bg-surface-container-low rounded-lg border-0 text-on-surface font-medium focus:ring-2 focus:ring-primary" type="text" value="B-">
</div>
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">Start Number</label>
<input class="h-9 px-3 bg-surface-container-low rounded-lg border-0 text-on-surface font-medium focus:ring-2 focus:ring-primary" type="number" value="101">
</div>
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">Count</label>
<input class="h-9 px-3 bg-surface-container-low rounded-lg border-0 text-on-surface font-medium focus:ring-2 focus:ring-primary" type="number" value="8">
</div>
<div class="flex flex-col gap-1 sm:col-span-2">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">Clone Template Specs</label>
<select class="h-9 px-3 bg-surface-container-low rounded-lg border-0 text-on-surface font-medium focus:ring-2 focus:ring-primary">
<option>Copy from Unit A-101 (2BHK, 115m²)</option>
<option>Copy from Unit A-102 (3BHK, 145m²)</option>
<option>Start with blank defaults</option>
</select>
</div>
</div>
<div class="flex items-center justify-between pt-space-xs text-on-surface-variant font-body-sm text-body-sm">
<span>Pattern will generate: <code class="px-2 py-0.5 bg-surface-container rounded text-primary font-bold">B-101, B-102 ... B-108</code> (8 Units on Floor 1, Block B)</span>
<button class="px-3 py-1.5 rounded-lg bg-surface-container-high hover:bg-surface-container text-on-surface font-label-md text-label-md font-semibold transition-colors flex items-center gap-1" type="button" data-demo="Preview Bulk Generation">
<span class="material-symbols-outlined text-[16px]">play_arrow</span>
<span>Preview Bulk Generation</span>
</button>
</div>
</div>
</div>
</div>
<!-- RIGHT COLUMN: PROPERTY SUMMARY SIDEBAR (4 COLUMNS / ~30%) -->
<div class="lg:col-span-4 flex flex-col gap-space-md sticky top-24">
<!-- Progress Summary Card -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md">
<div class="flex items-center justify-between pb-space-sm border-b border-surface-container">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">Property Setup</span>
<h4 class="font-headline-sm text-headline-sm font-bold text-on-surface">Intake Overview</h4>
</div>
<!-- Circular Progress Ring / Percentage -->
<div class="flex items-center gap-2">
<div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold font-label-md text-label-md">
              66%
            </div>
</div>
</div>
<div class="p-space-sm bg-surface-container-low rounded-lg flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-full bg-primary-container text-on-primary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[18px]">apartment</span>
</div>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md font-bold text-on-surface truncate">Al-Yasmin Compound II</span>
<span class="font-body-sm text-body-sm text-on-surface-variant truncate">PRP-RYD-2026-0089</span>
</div>
</div>
<!-- Completed Accordion Summaries -->
<div class="flex flex-col gap-space-sm divide-y divide-surface-container">
<!-- Step 1 Summary -->
<div class="pt-space-sm flex flex-col gap-1">
<div class="flex items-center justify-between">
<div class="flex items-center gap-1.5 text-[#2E7D32] font-label-sm text-label-sm font-bold">
<span class="material-symbols-outlined text-[16px]">check_circle</span>
<span>STEP 1: BASIC INFO</span>
</div>
<a class="text-primary hover:underline font-label-sm text-label-sm font-medium" href="#demo-notice" data-demo="Edit">Edit</a>
</div>
<p class="font-body-sm text-body-sm text-on-surface font-medium">Residential Compound (Multi-Unit)</p>
<p class="font-label-sm text-label-sm text-on-surface-variant">Class A Prime • 12 Planned Units</p>
</div>
<!-- Step 2 Summary -->
<div class="pt-space-sm flex flex-col gap-1">
<div class="flex items-center justify-between">
<div class="flex items-center gap-1.5 text-[#2E7D32] font-label-sm text-label-sm font-bold">
<span class="material-symbols-outlined text-[16px]">check_circle</span>
<span>STEP 2: LOCATION & PARCEL</span>
</div>
<a class="text-primary hover:underline font-label-sm text-label-sm font-medium" href="#demo-notice" data-demo="Edit">Edit</a>
</div>
<p class="font-body-sm text-body-sm text-on-surface font-medium">Al-Yasmin District, Riyadh, KSA</p>
<p class="font-label-sm text-label-sm text-on-surface-variant">Parcel: 4092-B • Coordinates: 24.8256° N, 46.6391° E</p>
</div>
<!-- Step 3 Summary -->
<div class="pt-space-sm flex flex-col gap-1">
<div class="flex items-center justify-between">
<div class="flex items-center gap-1.5 text-[#2E7D32] font-label-sm text-label-sm font-bold">
<span class="material-symbols-outlined text-[16px]">check_circle</span>
<span>STEP 3: OWNERSHIP & MGMT</span>
</div>
<a class="text-primary hover:underline font-label-sm text-label-sm font-medium" href="#demo-notice" data-demo="Edit">Edit</a>
</div>
<p class="font-body-sm text-body-sm text-on-surface font-medium">Muqrin Real Estate Holdings (100%)</p>
<p class="font-label-sm text-label-sm text-on-surface-variant">Operator: Eng. Sultan Al-Shammari • Fee: 8.5%</p>
</div>
<!-- Step 4 Summary (Active) -->
<div class="pt-space-sm flex flex-col gap-1.5">
<div class="flex items-center justify-between">
<div class="flex items-center gap-1.5 text-primary font-label-sm text-label-sm font-bold">
<span class="material-symbols-outlined text-[16px]">radio_button_checked</span>
<span>STEP 4: UNITS & RENTAL (IN PROGRESS)</span>
</div>
</div>
<div class="bg-surface-container-low p-space-sm rounded-lg flex flex-col gap-1 font-body-sm text-body-sm">
<div class="flex justify-between">
<span class="text-on-surface-variant">Configured:</span>
<span class="font-bold text-on-surface">4 of 12 Units</span>
</div>
<div class="flex justify-between">
<span class="text-on-surface-variant">Monthly Tariffs:</span>
<span class="font-bold text-on-surface">5,400 – 16,000 SAR</span>
</div>
<div class="flex justify-between">
<span class="text-on-surface-variant">Annual Tariffs:</span>
<span class="font-bold text-on-surface">60,000 – 180,000 SAR</span>
</div>
<div class="flex justify-between">
<span class="text-on-surface-variant">Booking Approval:</span>
<span class="font-bold text-primary">Required</span>
</div>
</div>
</div>
</div>
</div>
<!-- Guidelines & Help Card -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col gap-space-sm">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[20px] text-tertiary">lightbulb</span>
<span class="font-label-md text-label-md font-bold text-on-surface">Portfolio Guidelines</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
          In Saudi real estate governance, each distinct residential or commercial unit requires an individual Ejari registration number. You may proceed to Step 5 with partial units and finalize remaining inventory after deed upload.
        </p>
<div class="flex items-center gap-2 pt-1 text-primary font-label-sm text-label-sm font-bold cursor-pointer hover:underline" role="button" tabindex="0" data-demo="View Ejar Integration Manual">
<span class="material-symbols-outlined text-[16px]">help</span>
<span>View Ejar Integration Manual</span>
</div>
</div>
</div>
</div>
<!-- BOTTOM NAVIGATION ACTION BAR -->
<div class="sticky bottom-0 bg-surface-container-lowest shadow-[0_-4px_16px_rgba(36,36,36,0.06)] py-space-md px-space-xl -mx-space-xl mt-space-xl flex items-center justify-between z-30">
<a class="px-space-md py-2.5 rounded-lg bg-surface-container-high hover:bg-surface-container text-on-surface font-label-lg text-label-lg font-medium transition-all flex items-center gap-2" href="{{ route('manager.add-property-3') }}">
<span class="material-symbols-outlined text-[20px]">arrow_back</span>
<span>Back to Ownership & Management</span>
</a>
<div class="flex items-center gap-space-md">
<button class="px-space-md py-2.5 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface font-label-lg text-label-lg font-medium transition-colors flex items-center gap-2" type="button" data-demo="Save Draft">
<span class="material-symbols-outlined text-[18px]">bookmark_border</span>
<span>Save Draft</span>
</button>
<a class="px-space-lg py-2.5 rounded-lg bg-primary-container hover:bg-primary text-on-primary font-label-lg text-label-lg font-bold shadow-md hover:shadow-lg transition-all flex items-center gap-2 group" href="{{ route('manager.documents') }}">
<span>Continue to Photos & Documents (Step 5)</span>
<span class="material-symbols-outlined text-[20px] transition-transform group-hover:translate-x-1">arrow_forward</span>
</a>
</div>
</div>
</div>
@endsection
