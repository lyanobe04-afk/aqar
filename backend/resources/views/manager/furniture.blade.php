{{-- Imported from client_demo/screens/furniture_inventory/code.html; static demonstration data. --}}
@extends('layouts.manager')
@section('content')
<div class="flex flex-col w-full">
<!-- BREADCRUMB & PAGE HEADER -->
<div class="flex flex-col gap-space-sm mb-space-lg">
<div class="flex items-center gap-space-xs text-on-surface-variant font-label-md text-label-md">
<span class="hover:text-primary cursor-pointer transition-colors" role="button" tabindex="0" data-demo="Dashboard">Dashboard</span>
<span class="material-symbols-outlined text-[14px] text-outline">chevron_right</span>
<span class="text-on-surface font-semibold">Furniture Inventory</span>
</div>
<div class="flex flex-col lg:flex-row lg:items-center justify-between gap-space-md">
<div class="flex flex-col gap-space-xs">
<div class="flex items-center gap-space-sm flex-wrap">
<h1 class="font-headline-xl text-headline-xl text-on-surface tracking-tight">Furniture Inventory</h1>
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed-variant font-label-sm text-label-sm font-semibold tracking-wide uppercase">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
            GCC Enterprise
          </span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant max-w-3xl">
          Manage furnishings, appliances, asset condition, inventory records, and room-level contents across managed properties.
        </p>
</div>
<div class="flex items-center gap-space-sm self-start lg:self-auto flex-shrink-0">
<button class="inline-flex items-center gap-space-xs px-4 h-10 rounded-lg bg-surface-container-lowest text-on-surface hover:bg-surface-container-high transition-colors font-label-lg text-label-lg font-medium shadow-sm" type="button" data-demo="Export Inventory">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">download</span>
<span>Export Inventory</span>
</button>
<button class="inline-flex items-center gap-space-xs px-4 h-10 rounded-lg bg-primary text-on-primary hover:bg-primary-container transition-all font-label-lg text-label-lg font-semibold shadow-sm active:scale-95" type="button" data-demo="Add Inventory Item">
<span class="material-symbols-outlined text-[18px]">add</span>
<span>Add Inventory Item</span>
</button>
</div>
</div>
</div>
<!-- INSTITUTIONAL DISCLOSURE BANNER -->
<div class="p-space-md rounded-xl bg-surface-container-low mb-space-lg shadow-sm">
<div class="flex items-start gap-space-md">
<div class="w-8 h-8 rounded-lg bg-surface-container-highest flex items-center justify-center text-primary flex-shrink-0 mt-0.5">
<span class="material-symbols-outlined text-[20px]">verified_user</span>
</div>
<div class="flex flex-col gap-0.5 flex-1 min-w-0">
<span class="font-label-lg text-label-lg font-semibold text-on-surface">Inventory Integrity & Physical Inspection Governance</span>
<p class="font-body-sm text-body-sm text-on-surface-variant">
          Furniture items and asset conditions are recorded staged manifestations. A recorded condition of 'Good' or 'Needs Attention' reflects administrative records and does not constitute a certified physical inspection until a formal room-by-room condition inspection is completed. Al-Yasmin Compound II inventory remains unassessed pending initial physical check.
        </p>
</div>
<span class="material-symbols-outlined text-outline text-[18px] cursor-pointer hover:text-on-surface" role="button" tabindex="0" data-demo="info">info</span>
</div>
</div>
<!-- KPI SUMMARY METRICS -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-space-md mb-space-xs">
<!-- Card 1 -->
<div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface-variant font-medium">Total Inventory Items</span>
<div class="w-8 h-8 rounded-lg bg-surface-container-low flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[18px]">inventory_2</span>
</div>
</div>
<div class="mt-4 flex flex-col">
<span class="font-headline-xl text-headline-xl text-on-surface tabular-nums">186</span>
<span class="font-body-sm text-body-sm text-on-surface-variant mt-1">Across portfolio properties</span>
</div>
</div>
<!-- Card 2 -->
<div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface-variant font-medium">Recorded as Good</span>
<div class="w-8 h-8 rounded-lg bg-surface-container-low flex items-center justify-center text-secondary">
<span class="material-symbols-outlined text-[18px]">check_circle</span>
</div>
</div>
<div class="mt-4 flex flex-col">
<div class="flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl text-on-surface tabular-nums">142</span>
<span class="font-label-sm text-label-sm text-secondary font-semibold">76.3%</span>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant mt-1">Operational condition</span>
</div>
</div>
<!-- Card 3 -->
<div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface-variant font-medium">Needs Attention</span>
<div class="w-8 h-8 rounded-lg bg-surface-container-low flex items-center justify-center text-tertiary">
<span class="material-symbols-outlined text-[18px]">warning</span>
</div>
</div>
<div class="mt-4 flex flex-col">
<div class="flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl text-primary tabular-nums">12</span>
<span class="font-label-sm text-label-sm text-tertiary font-semibold">6.5%</span>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant mt-1">Requires maintenance / refurbishment</span>
</div>
</div>
<!-- Card 4 -->
<div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface-variant font-medium">Not Assessed</span>
<div class="w-8 h-8 rounded-lg bg-surface-container-low flex items-center justify-center text-outline">
<span class="material-symbols-outlined text-[18px]">pending</span>
</div>
</div>
<div class="mt-4 flex flex-col">
<div class="flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl text-on-surface tabular-nums">32</span>
<span class="font-label-sm text-label-sm text-outline font-semibold">17.2%</span>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant mt-1">Pending initial assessment</span>
</div>
</div>
<!-- Card 5 -->
<div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface-variant font-medium">Units with Inventory</span>
<div class="w-8 h-8 rounded-lg bg-surface-container-low flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[18px]">meeting_room</span>
</div>
</div>
<div class="mt-4 flex flex-col">
<div class="flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl text-on-surface tabular-nums">14</span>
<span class="font-label-sm text-label-sm text-on-surface-variant font-medium">/ 30 units</span>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant mt-1">Portfolio unit coverage (46.7%)</span>
</div>
</div>
</div>
<div class="mb-space-lg px-space-xs">
<p class="font-body-sm text-body-sm text-outline italic">
      *The first 3 condition categories (142 Good + 12 Needs Attention + 32 Not Assessed = 186 total items); units with inventory records (14) represent portfolio unit coverage. Al-Yasmin Compound II inventory setup is pending formal staging assessment.
    </p>
</div>
<!-- VIEW TABS -->
<div class="flex items-center gap-space-xs overflow-x-auto pb-2 mb-space-md scrollbar-none">
<button class="px-4 py-2 rounded-full bg-primary text-on-primary font-label-md text-label-md font-semibold whitespace-nowrap shadow-sm" type="button" data-demo="All Items (186)">
      All Items (186)
    </button>
<button class="px-4 py-2 rounded-full bg-surface-container-lowest text-on-surface hover:bg-surface-container-high transition-colors font-label-md text-label-md font-medium whitespace-nowrap shadow-sm" type="button" data-demo="By Property">
      By Property
    </button>
<button class="px-4 py-2 rounded-full bg-surface-container-lowest text-on-surface hover:bg-surface-container-high transition-colors font-label-md text-label-md font-medium whitespace-nowrap shadow-sm" type="button" data-demo="By Unit">
      By Unit
    </button>
<button class="px-4 py-2 rounded-full bg-surface-container-lowest text-on-surface hover:bg-surface-container-high transition-colors font-label-md text-label-md font-medium whitespace-nowrap shadow-sm" type="button" data-demo="By Room">
      By Room
    </button>
<button class="px-4 py-2 rounded-full bg-surface-container-lowest text-on-surface hover:bg-surface-container-high transition-colors font-label-md text-label-md font-medium whitespace-nowrap shadow-sm" type="button" data-demo="Needs Attention (12)">
      Needs Attention (12)
    </button>
<button class="px-4 py-2 rounded-full bg-surface-container-lowest text-on-surface hover:bg-surface-container-high transition-colors font-label-md text-label-md font-medium whitespace-nowrap shadow-sm" type="button" data-demo="Not Assessed (32)">
      Not Assessed (32)
    </button>
</div>
<!-- MULTI-DIMENSIONAL FILTERS TOOLBAR -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm mb-space-lg flex flex-col gap-space-md">
<div class="flex flex-col lg:flex-row gap-space-md">
<!-- Search Input -->
<div class="flex-1 relative flex items-center">
<span class="material-symbols-outlined absolute left-3 text-outline text-[20px] pointer-events-none">search</span>
<input class="w-full h-10 pl-10 pr-4 rounded-lg bg-surface-container-low text-on-surface placeholder:text-outline font-body-md text-body-md outline-none focus:bg-surface-container-lowest transition-colors shadow-none" placeholder="Search item, asset reference, property, unit, or room..." type="text">
</div>
<!-- Action Buttons -->
<div class="flex items-center gap-space-sm flex-shrink-0">
<button class="inline-flex items-center gap-1.5 px-3.5 h-10 rounded-lg bg-surface-container-low text-on-surface hover:bg-surface-container-high font-label-md text-label-md font-medium transition-colors" type="button" data-demo="Advanced Filters">
<span class="material-symbols-outlined text-[16px] text-outline">tune</span>
<span>Advanced Filters</span>
</button>
<button class="inline-flex items-center gap-1.5 px-3.5 h-10 rounded-lg bg-surface-container-low text-on-surface-variant hover:text-primary font-label-md text-label-md font-medium transition-colors" type="button" data-demo="Clear Filters">
<span class="material-symbols-outlined text-[16px]">restart_alt</span>
<span>Clear Filters</span>
</button>
</div>
</div>
<!-- Dropdowns Strip -->
<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-8 gap-space-xs pt-space-xs">
<!-- Property -->
<div class="flex flex-col">
<label class="font-label-sm text-label-sm text-outline mb-1">Property</label>
<select class="h-9 px-2.5 rounded-lg bg-surface-container-low text-on-surface font-body-sm text-body-sm outline-none cursor-pointer">
<option>All Properties</option>
<option>Marina View</option>
<option>Palm Grove</option>
<option>Al-Yasmin II</option>
</select>
</div>
<!-- Country -->
<div class="flex flex-col">
<label class="font-label-sm text-label-sm text-outline mb-1">Region</label>
<select class="h-9 px-2.5 rounded-lg bg-surface-container-low text-on-surface font-body-sm text-body-sm outline-none cursor-pointer">
<option>All GCC</option>
<option>Saudi Arabia</option>
<option>UAE</option>
</select>
</div>
<!-- Unit -->
<div class="flex flex-col">
<label class="font-label-sm text-label-sm text-outline mb-1">Unit</label>
<select class="h-9 px-2.5 rounded-lg bg-surface-container-low text-on-surface font-body-sm text-body-sm outline-none cursor-pointer">
<option>All Units</option>
<option>MV-101</option>
<option>MV-104</option>
<option>PG-01</option>
<option>PG-02</option>
<option>PG-03</option>
</select>
</div>
<!-- Room -->
<div class="flex flex-col">
<label class="font-label-sm text-label-sm text-outline mb-1">Room</label>
<select class="h-9 px-2.5 rounded-lg bg-surface-container-low text-on-surface font-body-sm text-body-sm outline-none cursor-pointer">
<option>All Rooms</option>
<option>Living Room</option>
<option>Kitchen</option>
<option>Dining Area</option>
<option>Main Bedroom</option>
<option>Laundry</option>
</select>
</div>
<!-- Category -->
<div class="flex flex-col">
<label class="font-label-sm text-label-sm text-outline mb-1">Category</label>
<select class="h-9 px-2.5 rounded-lg bg-surface-container-low text-on-surface font-body-sm text-body-sm outline-none cursor-pointer">
<option>All Categories</option>
<option>Living Room</option>
<option>Dining</option>
<option>Bedroom</option>
<option>Appliances</option>
<option>Outdoor</option>
</select>
</div>
<!-- Furnishing Type -->
<div class="flex flex-col">
<label class="font-label-sm text-label-sm text-outline mb-1">Type</label>
<select class="h-9 px-2.5 rounded-lg bg-surface-container-low text-on-surface font-body-sm text-body-sm outline-none cursor-pointer">
<option>All Furnishing</option>
<option>Fixed Fixture</option>
<option>Movable Furniture</option>
<option>White Goods</option>
</select>
</div>
<!-- Condition -->
<div class="flex flex-col">
<label class="font-label-sm text-label-sm text-outline mb-1">Condition</label>
<select class="h-9 px-2.5 rounded-lg bg-surface-container-low text-on-surface font-body-sm text-body-sm outline-none cursor-pointer">
<option>All Conditions</option>
<option>Good</option>
<option>Needs Attention</option>
<option>Not Assessed</option>
</select>
</div>
<!-- Inspection -->
<div class="flex flex-col">
<label class="font-label-sm text-label-sm text-outline mb-1">Inspection</label>
<select class="h-9 px-2.5 rounded-lg bg-surface-container-low text-on-surface font-body-sm text-body-sm outline-none cursor-pointer">
<option>All Status</option>
<option>Not Recorded</option>
<option>Certified</option>
<option>Audit Pending</option>
</select>
</div>
</div>
<!-- Active Count Meta -->
<div class="flex items-center justify-between pt-space-xs text-on-surface-variant font-label-sm text-label-sm">
<div class="flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-secondary"></span>
<span>Showing <strong class="text-on-surface">6</strong> of 186 Inventory Items</span>
<span class="text-outline">•</span>
<span>Room-level physical custody ledger active</span>
</div>
<span class="hidden md:inline text-outline">Sorted by Last Modified (Descending)</span>
</div>
</div>
<!-- MAIN INVENTORY ASSETS TABLE -->
<div class="rounded-xl bg-surface-container-lowest shadow-sm mb-space-lg overflow-hidden flex flex-col">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low font-label-md text-label-md text-on-surface-variant">
<th class="p-4 w-12 text-center">
<input class="rounded accent-primary cursor-pointer w-4 h-4" type="checkbox">
</th>
<th class="py-4 px-3 font-semibold uppercase tracking-wider">Asset Ref</th>
<th class="py-4 px-3 font-semibold uppercase tracking-wider">Item Name</th>
<th class="py-4 px-3 font-semibold uppercase tracking-wider">Category</th>
<th class="py-4 px-3 font-semibold uppercase tracking-wider">Property / Unit</th>
<th class="py-4 px-3 font-semibold uppercase tracking-wider">Room</th>
<th class="py-4 px-3 font-semibold uppercase tracking-wider text-center">Qty</th>
<th class="py-4 px-3 font-semibold uppercase tracking-wider">Recorded Condition</th>
<th class="py-4 px-3 font-semibold uppercase tracking-wider">Inspection Status</th>
<th class="p-4 text-right font-semibold uppercase tracking-wider">Actions</th>
</tr>
</thead>
<tbody class="divide-y-0 font-body-md text-body-md">
<!-- Row 1 -->
<tr class="hover:bg-surface-container-low transition-colors">
<td class="p-4 text-center">
<input class="rounded accent-primary cursor-pointer w-4 h-4" type="checkbox">
</td>
<td class="py-4 px-3 font-mono font-medium text-primary text-body-sm">AST-2026-001</td>
<td class="py-4 px-3 font-medium text-on-surface">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-lg bg-surface-container-high flex items-center justify-center text-primary flex-shrink-0">
<span class="material-symbols-outlined text-[18px]">chair</span>
</div>
<span>Three-Seater Sofa</span>
</div>
</td>
<td class="py-4 px-3 text-on-surface-variant text-body-sm">Living Room Furniture</td>
<td class="py-4 px-3">
<div class="flex flex-col">
<span class="text-on-surface font-medium text-body-sm">Marina View Residences</span>
<span class="text-outline text-label-sm">Unit MV-101</span>
</div>
</td>
<td class="py-4 px-3 text-on-surface-variant text-body-sm">Living Room</td>
<td class="py-4 px-3 text-center tabular-nums font-semibold">1</td>
<td class="py-4 px-3">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-[#EBF6F0] text-[#2E7D32] font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-[#2E7D32]"></span>
                Good
              </span>
</td>
<td class="py-4 px-3">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container-highest text-on-surface-variant font-label-sm text-label-sm">
                Inspection Not Recorded
              </span>
</td>
<td class="p-4 text-right">
<button class="w-8 h-8 rounded-lg inline-flex items-center justify-center text-on-surface-variant hover:bg-surface-container-high transition-colors" type="button" data-demo="more_vert" aria-label="more vert">
<span class="material-symbols-outlined text-[18px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-surface-container-low transition-colors">
<td class="p-4 text-center">
<input class="rounded accent-primary cursor-pointer w-4 h-4" type="checkbox">
</td>
<td class="py-4 px-3 font-mono font-medium text-primary text-body-sm">AST-2026-002</td>
<td class="py-4 px-3 font-medium text-on-surface">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-lg bg-surface-container-high flex items-center justify-center text-primary flex-shrink-0">
<span class="material-symbols-outlined text-[18px]">table_restaurant</span>
</div>
<span>Solid Wood Dining Table + 6 Chairs</span>
</div>
</td>
<td class="py-4 px-3 text-on-surface-variant text-body-sm">Dining Furniture</td>
<td class="py-4 px-3">
<div class="flex flex-col">
<span class="text-on-surface font-medium text-body-sm">Marina View Residences</span>
<span class="text-outline text-label-sm">Unit MV-101</span>
</div>
</td>
<td class="py-4 px-3 text-on-surface-variant text-body-sm">Dining Area</td>
<td class="py-4 px-3 text-center tabular-nums font-semibold">1</td>
<td class="py-4 px-3">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-[#EBF6F0] text-[#2E7D32] font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-[#2E7D32]"></span>
                Good
              </span>
</td>
<td class="py-4 px-3">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container-highest text-on-surface-variant font-label-sm text-label-sm">
                Inspection Not Recorded
              </span>
</td>
<td class="p-4 text-right">
<button class="w-8 h-8 rounded-lg inline-flex items-center justify-center text-on-surface-variant hover:bg-surface-container-high transition-colors" type="button" data-demo="more_vert" aria-label="more vert">
<span class="material-symbols-outlined text-[18px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-surface-container-low transition-colors">
<td class="p-4 text-center">
<input class="rounded accent-primary cursor-pointer w-4 h-4" type="checkbox">
</td>
<td class="py-4 px-3 font-mono font-medium text-primary text-body-sm">AST-2026-003</td>
<td class="py-4 px-3 font-medium text-on-surface">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-lg bg-surface-container-high flex items-center justify-center text-primary flex-shrink-0">
<span class="material-symbols-outlined text-[18px]">bed</span>
</div>
<span>Double Bed & Orthopedic Mattress</span>
</div>
</td>
<td class="py-4 px-3 text-on-surface-variant text-body-sm">Bedroom Furniture</td>
<td class="py-4 px-3">
<div class="flex flex-col">
<span class="text-on-surface font-medium text-body-sm">Palm Grove Chalets</span>
<span class="text-outline text-label-sm">Unit PG-02</span>
</div>
</td>
<td class="py-4 px-3 text-on-surface-variant text-body-sm">Main Bedroom</td>
<td class="py-4 px-3 text-center tabular-nums font-semibold">1</td>
<td class="py-4 px-3">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-[#EBF6F0] text-[#2E7D32] font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-[#2E7D32]"></span>
                Good
              </span>
</td>
<td class="py-4 px-3">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container-highest text-on-surface-variant font-label-sm text-label-sm">
                Inspection Not Recorded
              </span>
</td>
<td class="p-4 text-right">
<button class="w-8 h-8 rounded-lg inline-flex items-center justify-center text-on-surface-variant hover:bg-surface-container-high transition-colors" type="button" data-demo="more_vert" aria-label="more vert">
<span class="material-symbols-outlined text-[18px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 4 (Selected Row) -->
<tr class="bg-primary-fixed/25 hover:bg-primary-fixed/35 transition-colors">
<td class="p-4 text-center">
<input checked="" class="rounded accent-primary cursor-pointer w-4 h-4" type="checkbox">
</td>
<td class="py-4 px-3 font-mono font-bold text-primary text-body-sm flex-items-center gap-1">
<span>AST-2026-004</span>
<span class="inline-block w-1.5 h-1.5 rounded-full bg-primary ml-1"></span>
</td>
<td class="py-4 px-3 font-semibold text-on-surface">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-lg bg-primary-container flex items-center justify-center text-on-primary flex-shrink-0 shadow-sm">
<span class="material-symbols-outlined text-[18px]">kitchen</span>
</div>
<span>Refrigerator (Inverter 520L)</span>
</div>
</td>
<td class="py-4 px-3 text-on-surface-variant text-body-sm">Kitchen Appliance</td>
<td class="py-4 px-3">
<div class="flex flex-col">
<span class="text-on-surface font-semibold text-body-sm">Palm Grove Chalets</span>
<span class="text-primary font-medium text-label-sm">Unit PG-03</span>
</div>
</td>
<td class="py-4 px-3 text-on-surface-variant text-body-sm font-medium">Kitchen</td>
<td class="py-4 px-3 text-center tabular-nums font-bold text-primary">1</td>
<td class="py-4 px-3">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-[#FFFAEB] text-[#D35400] font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-[#D35400]"></span>
                Needs Attention
              </span>
</td>
<td class="py-4 px-3">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container-highest text-on-surface-variant font-label-sm text-label-sm">
                Inspection Not Recorded
              </span>
</td>
<td class="p-4 text-right">
<button class="w-8 h-8 rounded-lg inline-flex items-center justify-center text-primary hover:bg-surface-container-high transition-colors" type="button" data-demo="more_vert" aria-label="more vert">
<span class="material-symbols-outlined text-[18px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 5 -->
<tr class="hover:bg-surface-container-low transition-colors">
<td class="p-4 text-center">
<input class="rounded accent-primary cursor-pointer w-4 h-4" type="checkbox">
</td>
<td class="py-4 px-3 font-mono font-medium text-primary text-body-sm">AST-2026-005</td>
<td class="py-4 px-3 font-medium text-on-surface">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-lg bg-surface-container-high flex items-center justify-center text-primary flex-shrink-0">
<span class="material-symbols-outlined text-[18px]">local_laundry_service</span>
</div>
<span>Front-Load Washing Machine</span>
</div>
</td>
<td class="py-4 px-3 text-on-surface-variant text-body-sm">Laundry Appliance</td>
<td class="py-4 px-3">
<div class="flex flex-col">
<span class="text-on-surface font-medium text-body-sm">Marina View Residences</span>
<span class="text-outline text-label-sm">Unit MV-104</span>
</div>
</td>
<td class="py-4 px-3 text-on-surface-variant text-body-sm">Laundry Area</td>
<td class="py-4 px-3 text-center tabular-nums font-semibold">1</td>
<td class="py-4 px-3">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-surface-container-highest text-on-surface-variant font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-outline"></span>
                Not Assessed
              </span>
</td>
<td class="py-4 px-3">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container-highest text-on-surface-variant font-label-sm text-label-sm">
                Not Inspected
              </span>
</td>
<td class="p-4 text-right">
<button class="w-8 h-8 rounded-lg inline-flex items-center justify-center text-on-surface-variant hover:bg-surface-container-high transition-colors" type="button" data-demo="more_vert" aria-label="more vert">
<span class="material-symbols-outlined text-[18px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 6 -->
<tr class="hover:bg-surface-container-low transition-colors">
<td class="p-4 text-center">
<input class="rounded accent-primary cursor-pointer w-4 h-4" type="checkbox">
</td>
<td class="py-4 px-3 font-mono font-medium text-primary text-body-sm">AST-2026-006</td>
<td class="py-4 px-3 font-medium text-on-surface">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-lg bg-surface-container-high flex items-center justify-center text-primary flex-shrink-0">
<span class="material-symbols-outlined text-[18px]">deck</span>
</div>
<span>Outdoor Seating Set</span>
</div>
</td>
<td class="py-4 px-3 text-on-surface-variant text-body-sm">Outdoor Furniture</td>
<td class="py-4 px-3">
<div class="flex flex-col">
<span class="text-on-surface font-medium text-body-sm">Palm Grove Chalets</span>
<span class="text-outline text-label-sm">Unit PG-01</span>
</div>
</td>
<td class="py-4 px-3 text-on-surface-variant text-body-sm">Patio / Balcony</td>
<td class="py-4 px-3 text-center tabular-nums font-semibold">1</td>
<td class="py-4 px-3">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-[#EBF6F0] text-[#2E7D32] font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-[#2E7D32]"></span>
                Good
              </span>
</td>
<td class="py-4 px-3">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container-highest text-on-surface-variant font-label-sm text-label-sm">
                Inspection Not Recorded
              </span>
</td>
<td class="p-4 text-right">
<button class="w-8 h-8 rounded-lg inline-flex items-center justify-center text-on-surface-variant hover:bg-surface-container-high transition-colors" type="button" data-demo="more_vert" aria-label="more vert">
<span class="material-symbols-outlined text-[18px]">more_vert</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Bottom Pagination -->
<div class="p-space-md bg-surface-container-low flex flex-col sm:flex-row items-center justify-between gap-space-md">
<div class="flex items-center gap-space-sm text-on-surface-variant font-body-sm text-body-sm">
<span>Showing <strong class="text-on-surface">1–6</strong> of 186 inventory items</span>
<span class="text-outline">|</span>
<div class="flex items-center gap-1.5">
<span class="text-outline">Rows per page:</span>
<select class="bg-surface-container-lowest text-on-surface rounded px-2 py-0.5 font-label-sm text-label-sm outline-none">
<option>10</option>
<option>25</option>
<option>50</option>
</select>
</div>
</div>
<div class="flex items-center gap-1 font-label-md text-label-md">
<button class="w-8 h-8 rounded-lg flex items-center justify-center text-outline hover:text-on-surface hover:bg-surface-container-high transition-colors" type="button" data-demo="chevron_left" aria-label="chevron left">
<span class="material-symbols-outlined text-[18px]">chevron_left</span>
</button>
<button class="w-8 h-8 rounded-lg flex items-center justify-center bg-primary text-on-primary font-semibold shadow-sm" type="button" data-demo="1">1</button>
<button class="w-8 h-8 rounded-lg flex items-center justify-center text-on-surface hover:bg-surface-container-high transition-colors" type="button" data-demo="2">2</button>
<button class="w-8 h-8 rounded-lg flex items-center justify-center text-on-surface hover:bg-surface-container-high transition-colors" type="button" data-demo="3">3</button>
<span class="px-1 text-outline">...</span>
<button class="w-8 h-8 rounded-lg flex items-center justify-center text-on-surface hover:bg-surface-container-high transition-colors" type="button" data-demo="31">31</button>
<button class="w-8 h-8 rounded-lg flex items-center justify-center text-outline hover:text-on-surface hover:bg-surface-container-high transition-colors" type="button" data-demo="chevron_right" aria-label="chevron right">
<span class="material-symbols-outlined text-[18px]">chevron_right</span>
</button>
</div>
</div>
</div>
<!-- INVENTORY COVERAGE BY PROPERTY & ROOM CLASSIFICATION -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg mb-space-lg">
<!-- Property Coverage Column (7 cols) -->
<div class="lg:col-span-7 flex flex-col gap-space-md">
<div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm flex flex-col gap-space-md">
<div class="flex items-center justify-between">
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-on-surface">Property Inventory Coverage</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Setup completion & verification staging by asset</span>
</div>
<button class="font-label-md text-label-md text-primary font-semibold hover:underline" type="button" data-demo="View Property Inventory">View Property Inventory</button>
</div>
<div class="flex flex-col gap-space-md">
<!-- Property 1 -->
<div class="p-space-md rounded-lg bg-surface-container-low flex flex-col gap-space-xs">
<div class="flex items-center justify-between">
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-primary text-[18px]">domain</span>
<span class="font-label-lg text-label-lg font-semibold text-on-surface">Marina View Residences</span>
</div>
<span class="font-label-sm text-label-sm font-semibold text-[#2E7D32] bg-[#EBF6F0] px-2 py-0.5 rounded-full">100% Configured</span>
</div>
<div class="flex items-center justify-between text-body-sm text-on-surface-variant">
<span>10 Units Configured • 94 Staged Items</span>
<span class="font-mono text-outline">Verified Physical Ledger</span>
</div>
<!-- Progress Bar -->
<div class="w-full bg-surface-container-highest h-2 rounded-full overflow-hidden mt-1">
<div class="bg-primary h-full rounded-full" style="width: 100%;"></div>
</div>
</div>
<!-- Property 2 -->
<div class="p-space-md rounded-lg bg-surface-container-low flex flex-col gap-space-xs">
<div class="flex items-center justify-between">
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-primary text-[18px]">holiday_village</span>
<span class="font-label-lg text-label-lg font-semibold text-on-surface">Palm Grove Chalets</span>
</div>
<span class="font-label-sm text-label-sm font-semibold text-tertiary bg-surface-container-highest px-2 py-0.5 rounded-full">88% Coverage</span>
</div>
<div class="flex items-center justify-between text-body-sm text-on-surface-variant">
<span>4 Units Configured • 92 Staged Items</span>
<span class="font-mono text-outline">2 Pending Items</span>
</div>
<!-- Progress Bar -->
<div class="w-full bg-surface-container-highest h-2 rounded-full overflow-hidden mt-1">
<div class="bg-primary h-full rounded-full" style="width: 88%;"></div>
</div>
</div>
<!-- Property 3 -->
<div class="p-space-md rounded-lg bg-surface-container-low flex flex-col gap-space-sm">
<div class="flex items-center justify-between">
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-outline text-[18px]">home_work</span>
<span class="font-label-lg text-label-lg font-semibold text-on-surface">Al-Yasmin Compound II</span>
</div>
<span class="font-label-sm text-label-sm font-semibold text-outline bg-surface-container-highest px-2 py-0.5 rounded-full">Saved — Unpublished</span>
</div>
<!-- Unit Items Drilldown -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-space-xs pt-1">
<div class="p-2.5 rounded bg-surface-container-lowest shadow-sm flex flex-col">
<span class="font-label-sm text-label-sm font-semibold text-on-surface">Unit A-101 (2BR Apt)</span>
<span class="font-body-sm text-body-sm text-outline">Staged Furnishings • Physical Audit Pending</span>
</div>
<div class="p-2.5 rounded bg-surface-container-lowest shadow-sm flex flex-col">
<span class="font-label-sm text-label-sm font-semibold text-on-surface">Unit A-102 (3BR Apt)</span>
<span class="font-body-sm text-body-sm text-outline">Inventory Setup Not Confirmed</span>
</div>
<div class="p-2.5 rounded bg-surface-container-lowest shadow-sm flex flex-col">
<span class="font-label-sm text-label-sm font-semibold text-on-surface">Unit B-201 (1BR Studio)</span>
<span class="font-body-sm text-body-sm text-outline">Inventory Setup Not Confirmed</span>
</div>
<div class="p-2.5 rounded bg-surface-container-lowest shadow-sm flex flex-col">
<span class="font-label-sm text-label-sm font-semibold text-on-surface">Unit V-01 (4BR Villa)</span>
<span class="font-body-sm text-body-sm text-secondary font-medium">Unfurnished (Zero items required)</span>
</div>
</div>
<div class="flex justify-end pt-1">
<button class="inline-flex items-center gap-1 font-label-sm text-label-sm text-primary font-semibold hover:underline" type="button" data-demo="Configure Unit Inventory">
<span class="material-symbols-outlined text-[16px]">tune</span>
                Configure Unit Inventory
              </button>
</div>
</div>
</div>
</div>
</div>
<!-- Room-Level Categorization & Inventory Categories (5 cols) -->
<div class="lg:col-span-5 flex flex-col gap-space-md">
<!-- Room Chips -->
<div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm flex flex-col gap-space-md">
<div class="flex items-center justify-between">
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-on-surface">Room Classification</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">10 physical operational room categories</span>
</div>
<span class="material-symbols-outlined text-outline text-[20px]">layers</span>
</div>
<div class="flex flex-wrap gap-2">
<div class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-surface-container-low text-on-surface hover:bg-surface-container-high transition-colors cursor-pointer" role="button" tabindex="0" data-demo="Living Room">
<span class="material-symbols-outlined text-primary text-[18px]">weekend</span>
<span class="font-label-md text-label-md font-medium">Living Room</span>
</div>
<div class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-surface-container-low text-on-surface hover:bg-surface-container-high transition-colors cursor-pointer" role="button" tabindex="0" data-demo="Bedroom">
<span class="material-symbols-outlined text-primary text-[18px]">bed</span>
<span class="font-label-md text-label-md font-medium">Bedroom</span>
</div>
<div class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-surface-container-low text-on-surface hover:bg-surface-container-high transition-colors cursor-pointer" role="button" tabindex="0" data-demo="Kitchen">
<span class="material-symbols-outlined text-primary text-[18px]">kitchen</span>
<span class="font-label-md text-label-md font-medium">Kitchen</span>
</div>
<div class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-surface-container-low text-on-surface hover:bg-surface-container-high transition-colors cursor-pointer" role="button" tabindex="0" data-demo="Dining Area">
<span class="material-symbols-outlined text-primary text-[18px]">dining</span>
<span class="font-label-md text-label-md font-medium">Dining Area</span>
</div>
<div class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-surface-container-low text-on-surface hover:bg-surface-container-high transition-colors cursor-pointer" role="button" tabindex="0" data-demo="Bathroom">
<span class="material-symbols-outlined text-primary text-[18px]">bathtub</span>
<span class="font-label-md text-label-md font-medium">Bathroom</span>
</div>
<div class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-surface-container-low text-on-surface hover:bg-surface-container-high transition-colors cursor-pointer" role="button" tabindex="0" data-demo="Laundry">
<span class="material-symbols-outlined text-primary text-[18px]">local_laundry_service</span>
<span class="font-label-md text-label-md font-medium">Laundry</span>
</div>
<div class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-surface-container-low text-on-surface hover:bg-surface-container-high transition-colors cursor-pointer" role="button" tabindex="0" data-demo="Balcony">
<span class="material-symbols-outlined text-primary text-[18px]">balcony</span>
<span class="font-label-md text-label-md font-medium">Balcony</span>
</div>
<div class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-surface-container-low text-on-surface hover:bg-surface-container-high transition-colors cursor-pointer" role="button" tabindex="0" data-demo="Outdoor Area">
<span class="material-symbols-outlined text-primary text-[18px]">deck</span>
<span class="font-label-md text-label-md font-medium">Outdoor Area</span>
</div>
<div class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-surface-container-low text-on-surface hover:bg-surface-container-high transition-colors cursor-pointer" role="button" tabindex="0" data-demo="Storage">
<span class="material-symbols-outlined text-primary text-[18px]">inventory</span>
<span class="font-label-md text-label-md font-medium">Storage</span>
</div>
<div class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-surface-container-low text-on-surface hover:bg-surface-container-high transition-colors cursor-pointer" role="button" tabindex="0" data-demo="Other">
<span class="material-symbols-outlined text-primary text-[18px]">more_horiz</span>
<span class="font-label-md text-label-md font-medium">Other</span>
</div>
</div>
</div>
<!-- Categories Grid -->
<div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm flex flex-col gap-space-md">
<span class="font-headline-sm text-headline-sm text-on-surface">Asset Typology Spectrum</span>
<div class="grid grid-cols-2 sm:grid-cols-3 gap-space-xs">
<div class="p-3 rounded-lg bg-surface-container-low flex flex-col items-center text-center gap-1 hover:bg-surface-container-high transition-colors cursor-pointer" role="button" tabindex="0" data-demo="Furniture 98 items">
<span class="material-symbols-outlined text-primary text-[20px]">chair</span>
<span class="font-label-sm text-label-sm font-semibold text-on-surface">Furniture</span>
<span class="font-body-sm text-body-sm text-outline">98 items</span>
</div>
<div class="p-3 rounded-lg bg-surface-container-low flex flex-col items-center text-center gap-1 hover:bg-surface-container-high transition-colors cursor-pointer" role="button" tabindex="0" data-demo="Appliances 42 items">
<span class="material-symbols-outlined text-primary text-[20px]">microwave</span>
<span class="font-label-sm text-label-sm font-semibold text-on-surface">Appliances</span>
<span class="font-body-sm text-body-sm text-outline">42 items</span>
</div>
<div class="p-3 rounded-lg bg-surface-container-low flex flex-col items-center text-center gap-1 hover:bg-surface-container-high transition-colors cursor-pointer" role="button" tabindex="0" data-demo="Electronics 24 items">
<span class="material-symbols-outlined text-primary text-[20px]">tv</span>
<span class="font-label-sm text-label-sm font-semibold text-on-surface">Electronics</span>
<span class="font-body-sm text-body-sm text-outline">24 items</span>
</div>
<div class="p-3 rounded-lg bg-surface-container-low flex flex-col items-center text-center gap-1 hover:bg-surface-container-high transition-colors cursor-pointer" role="button" tabindex="0" data-demo="Fixtures 12 items">
<span class="material-symbols-outlined text-primary text-[20px]">light</span>
<span class="font-label-sm text-label-sm font-semibold text-on-surface">Fixtures</span>
<span class="font-body-sm text-body-sm text-outline">12 items</span>
</div>
<div class="p-3 rounded-lg bg-surface-container-low flex flex-col items-center text-center gap-1 hover:bg-surface-container-high transition-colors cursor-pointer" role="button" tabindex="0" data-demo="Kitchenware 6 items">
<span class="material-symbols-outlined text-primary text-[20px]">flatware</span>
<span class="font-label-sm text-label-sm font-semibold text-on-surface">Kitchenware</span>
<span class="font-body-sm text-body-sm text-outline">6 items</span>
</div>
<div class="p-3 rounded-lg bg-surface-container-low flex flex-col items-center text-center gap-1 hover:bg-surface-container-high transition-colors cursor-pointer" role="button" tabindex="0" data-demo="Outdoor Items 4 items">
<span class="material-symbols-outlined text-primary text-[20px]">deck</span>
<span class="font-label-sm text-label-sm font-semibold text-on-surface">Outdoor Items</span>
<span class="font-body-sm text-body-sm text-outline">4 items</span>
</div>
</div>
</div>
</div>
</div>
<!-- SELECTED ASSET PREVIEW & CONDITION INSPECTIONS INTEGRATION -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg mb-space-xl">
<!-- Selected Asset Dossier (5 cols) -->
<div class="lg:col-span-5 flex flex-col">
<div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between h-full">
<div>
<div class="flex items-center justify-between pb-space-md">
<div class="flex items-center gap-space-sm">
<span class="px-2 py-0.5 rounded bg-primary-fixed text-primary font-mono font-bold text-label-sm">AST-2026-004</span>
<span class="font-label-sm text-label-sm text-outline uppercase font-semibold">Active Selection Dossier</span>
</div>
<span class="material-symbols-outlined text-primary text-[20px]">open_in_new</span>
</div>
<div class="flex items-start gap-space-md mb-space-md">
<div class="w-16 h-16 rounded-xl bg-surface-container-low flex items-center justify-center text-primary flex-shrink-0">
<span class="material-symbols-outlined text-[36px]">kitchen</span>
</div>
<div class="flex flex-col min-w-0">
<h2 class="font-headline-sm text-headline-sm text-on-surface font-semibold truncate">Refrigerator (Inverter 520L)</h2>
<span class="font-body-sm text-body-sm text-on-surface-variant">Palm Grove Chalets • Unit PG-03 (Kitchen)</span>
<div class="flex items-center gap-2 mt-2">
<span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-[#FFFAEB] text-[#D35400] font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-[#D35400]"></span>
                  Needs Attention
                </span>
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-surface-container-highest text-on-surface-variant font-label-sm text-label-sm">
                  Inspection Not Recorded
                </span>
</div>
</div>
</div>
<!-- Specs Table -->
<div class="rounded-lg bg-surface-container-low p-space-md flex flex-col gap-space-sm mb-space-md text-body-sm">
<div class="flex justify-between">
<span class="text-on-surface-variant">Serial Number:</span>
<span class="font-mono text-on-surface">Not Provided</span>
</div>
<div class="flex justify-between">
<span class="text-on-surface-variant">Purchase Date:</span>
<span class="text-on-surface">Not Recorded</span>
</div>
<div class="flex justify-between">
<span class="text-on-surface-variant">Warranty Status:</span>
<span class="text-on-surface">Not Recorded</span>
</div>
<div class="flex justify-between">
<span class="text-on-surface-variant">Assigned Physical Room:</span>
<span class="text-on-surface font-semibold">Kitchen (Zone A)</span>
</div>
</div>
<!-- Clarification Notice -->
<div class="p-space-sm rounded-lg bg-surface-container-low flex items-start gap-2 mb-space-md">
<span class="material-symbols-outlined text-primary text-[18px] mt-0.5">info</span>
<p class="font-body-sm text-body-sm text-on-surface-variant">
<strong>Linked Maintenance: Not Linked.</strong> This refrigerator needs attention but is not linked to the separate PG-03 plumbing water leak work order.
            </p>
</div>
</div>
<div class="grid grid-cols-2 gap-space-xs pt-space-xs">
<button class="w-full h-9 rounded-lg bg-surface-container-high text-on-surface hover:bg-surface-container-highest transition-colors font-label-md text-label-md font-semibold" type="button" data-demo="View Item">
            View Item
          </button>
<button class="w-full h-9 rounded-lg bg-surface-container-high text-on-surface hover:bg-surface-container-highest transition-colors font-label-md text-label-md font-semibold" type="button" data-demo="Edit Item">
            Edit Item
          </button>
<button class="w-full h-9 rounded-lg bg-surface-container-high text-on-surface hover:bg-surface-container-highest transition-colors font-label-md text-label-md font-semibold" type="button" data-demo="Add Condition Note">
            Add Condition Note
          </button>
<button class="w-full h-9 rounded-lg bg-primary-fixed text-primary hover:bg-primary-fixed-dim transition-colors font-label-md text-label-md font-semibold" type="button" data-demo="Link Maintenance">
            Link Maintenance
          </button>
</div>
</div>
</div>
<!-- Condition Inspections Architecture (7 cols) -->
<div class="lg:col-span-7 flex flex-col">
<div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between h-full">
<div>
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-space-md">
<div class="flex flex-col">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[22px]">policy</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Furniture & Property Condition Inspections</h3>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant">Institutional certified audit stages and physical verification lifecycle</span>
</div>
<span class="font-label-sm text-label-sm font-semibold px-2.5 py-1 rounded bg-surface-container-high text-primary self-start sm:self-auto">
              ISO-55001 Asset Aligned
            </span>
</div>
<!-- Operational Stages Sequence -->
<div class="flex items-center justify-between overflow-x-auto py-2 mb-space-md scrollbar-none">
<div class="flex flex-col items-center text-center min-w-[80px]">
<div class="w-8 h-8 rounded-full bg-primary text-on-primary flex items-center justify-center font-bold font-label-sm text-label-sm shadow-sm">1</div>
<span class="font-label-sm text-label-sm text-on-surface font-medium mt-1">Initial Condition</span>
</div>
<div class="h-0.5 flex-1 bg-surface-container-high mx-1"></div>
<div class="flex flex-col items-center text-center min-w-[80px]">
<div class="w-8 h-8 rounded-full bg-surface-container-high text-on-surface flex items-center justify-center font-bold font-label-sm text-label-sm">2</div>
<span class="font-label-sm text-label-sm text-on-surface font-medium mt-1">Check-In</span>
</div>
<div class="h-0.5 flex-1 bg-surface-container-high mx-1"></div>
<div class="flex flex-col items-center text-center min-w-[80px]">
<div class="w-8 h-8 rounded-full bg-surface-container-high text-on-surface flex items-center justify-center font-bold font-label-sm text-label-sm">3</div>
<span class="font-label-sm text-label-sm text-on-surface font-medium mt-1">During Stay</span>
</div>
<div class="h-0.5 flex-1 bg-surface-container-high mx-1"></div>
<div class="flex flex-col items-center text-center min-w-[80px]">
<div class="w-8 h-8 rounded-full bg-surface-container-high text-on-surface flex items-center justify-center font-bold font-label-sm text-label-sm">4</div>
<span class="font-label-sm text-label-sm text-on-surface font-medium mt-1">Check-Out</span>
</div>
<div class="h-0.5 flex-1 bg-surface-container-high mx-1"></div>
<div class="flex flex-col items-center text-center min-w-[80px]">
<div class="w-8 h-8 rounded-full bg-surface-container-high text-on-surface flex items-center justify-center font-bold font-label-sm text-label-sm">5</div>
<span class="font-label-sm text-label-sm text-on-surface font-medium mt-1">Post-Maint</span>
</div>
</div>
<!-- Inspection Capabilities Highlights -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-sm mb-space-md">
<div class="p-3 rounded-lg bg-surface-container-low flex items-start gap-2.5">
<span class="material-symbols-outlined text-primary text-[20px] mt-0.5">room_preferences</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Room-by-room Assessment</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Step-by-step physical walkthrough validation per space.</span>
</div>
</div>
<div class="p-3 rounded-lg bg-surface-container-low flex items-start gap-2.5">
<span class="material-symbols-outlined text-primary text-[20px] mt-0.5">report_problem</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Damage Severity Tagging</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Minor Scratches, Operational Defect, or Broken classifications.</span>
</div>
</div>
<div class="p-3 rounded-lg bg-surface-container-low flex items-start gap-2.5">
<span class="material-symbols-outlined text-primary text-[20px] mt-0.5">add_a_photo</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Digital Photographic Evidence</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Floor plan marker association and timestamped camera uploads.</span>
</div>
</div>
<div class="p-3 rounded-lg bg-surface-container-low flex items-start gap-2.5">
<span class="material-symbols-outlined text-primary text-[20px] mt-0.5">compare_arrows</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Check-in vs Check-out Delta</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Automated side-by-side photographic comparative review.</span>
</div>
</div>
</div>
<!-- Damage & Tracking Status Strip -->
<div class="p-space-md rounded-lg bg-surface-container-low flex flex-col sm:flex-row items-center justify-between gap-space-sm mb-space-md">
<div class="flex items-center gap-space-lg">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-outline">Open Damage Assessments</span>
<span class="font-label-md text-label-md font-semibold text-on-surface">Not Calculated (Pending)</span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-outline">Confirmed Damage Cases</span>
<span class="font-label-md text-label-md font-semibold text-secondary">None Recorded</span>
</div>
</div>
<div class="flex items-center gap-2 w-full sm:w-auto">
<button class="flex-1 sm:flex-none px-4 h-9 rounded-lg bg-primary text-on-primary hover:bg-primary-container transition-all font-label-md text-label-md font-semibold shadow-sm" type="button" data-demo="Start Condition Inspection">
                Start Condition Inspection
              </button>
<button class="flex-1 sm:flex-none px-3 h-9 rounded-lg bg-surface-container-lowest text-on-surface hover:bg-surface-container-high transition-colors font-label-md text-label-md font-medium" type="button" data-demo="View History">
                View History
              </button>
</div>
</div>
</div>
<!-- Governance Policy Bottom Note -->
<p class="font-body-sm text-body-sm text-outline italic">
<strong>Governance Notice:</strong> Damage assessments do not automatically charge tenants or assign liability. Any financial deposit deduction requires separate authorized lease review and tenant notice.
        </p>
</div>
</div>
</div>
</div>
@endsection
