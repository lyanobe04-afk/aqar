{{-- Imported from client_demo/screens/properties/code.html; static demonstration data. --}}
@extends('layouts.manager')
@section('content')
<div class="flex flex-col w-full">
<!-- Interactive Script for Tab/Filter/Sidebar sync -->

<!-- Top Hero Header Context & Micro-Breadcrumb -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-space-md pb-space-lg">
<div class="flex flex-col">
<div class="flex items-center gap-2 mb-1">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-primary font-bold">Portfolio Hub</span>
<span class="text-outline-variant font-label-sm">•</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">KSA Master Asset Registry</span>
</div>
<h2 class="font-headline-xl text-headline-xl text-on-surface font-bold tracking-tight">Properties Management</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-0.5">
        Portfolio overview, unit breakdowns, asset assignments, and physical property records.
      </p>
</div>
<!-- Quick Demonstration State Pill -->
<div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-surface-container text-on-surface-variant text-label-sm font-label-sm shadow-sm self-start md:self-auto">
<span class="w-2 h-2 rounded-full bg-secondary"></span>
<span>Demonstration Data — Enterprise Property Management System Phase 1</span>
</div>
</div>
<!-- 1. Quick Stats Metric Bar (4 institutional cards) -->
<section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-space-md mb-space-xl">
<!-- Stat 1 -->
<div class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
<div class="absolute -right-4 -bottom-4 w-20 h-20 bg-primary/5 rounded-full blur-xl group-hover:scale-150 transition-transform"></div>
<div class="flex items-start justify-between">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">Total Properties</span>
<div class="flex items-baseline gap-2 mt-1">
<span class="font-headline-xl text-headline-xl text-on-surface font-bold">24</span>
<span class="font-label-md text-label-md text-primary font-semibold">Master Estates</span>
</div>
</div>
<div class="w-10 h-10 rounded-lg bg-surface-container-high flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined text-[22px]">apartment</span>
</div>
</div>
<div class="flex items-center gap-1.5 mt-3 pt-3 bg-surface-container-low/50 -mx-space-lg -mb-space-lg px-space-lg py-2">
<span class="material-symbols-outlined text-secondary text-[16px]">location_city</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Across 5 Primary Saudi Cities</span>
</div>
</div>
<!-- Stat 2 -->
<div class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
<div class="absolute -right-4 -bottom-4 w-20 h-20 bg-secondary/5 rounded-full blur-xl group-hover:scale-150 transition-transform"></div>
<div class="flex items-start justify-between">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">Contained Units</span>
<div class="flex items-baseline gap-2 mt-1">
<span class="font-headline-xl text-headline-xl text-on-surface font-bold">80</span>
<span class="font-label-md text-label-md text-on-surface-variant font-semibold">Sub-Units</span>
</div>
</div>
<div class="w-10 h-10 rounded-lg bg-surface-container-high flex items-center justify-center text-secondary shrink-0">
<span class="material-symbols-outlined text-[22px]">domain_verification</span>
</div>
</div>
<div class="flex items-center justify-between mt-3 pt-3 bg-surface-container-low/50 -mx-space-lg -mb-space-lg px-space-lg py-2">
<div class="flex items-center gap-1.5">
<span class="w-2 h-2 rounded-full bg-secondary"></span>
<span class="font-body-sm text-body-sm text-on-surface font-medium">68 Leased</span>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant">12 Vacant Available</span>
</div>
</div>
<!-- Stat 3 -->
<div class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
<div class="absolute -right-4 -bottom-4 w-20 h-20 bg-tertiary-container/10 rounded-full blur-xl group-hover:scale-150 transition-transform"></div>
<div class="flex items-start justify-between">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">Total Portfolio Value</span>
<div class="flex items-baseline gap-1 mt-1">
<span class="font-headline-xl text-headline-xl text-on-surface font-bold">142.5M</span>
<span class="font-label-md text-label-md text-on-surface-variant font-semibold">SAR</span>
</div>
</div>
<div class="w-10 h-10 rounded-lg bg-tertiary-fixed/30 flex items-center justify-center text-tertiary shrink-0">
<span class="material-symbols-outlined text-[22px]">account_balance</span>
</div>
</div>
<div class="flex items-center gap-1.5 mt-3 pt-3 bg-surface-container-low/50 -mx-space-lg -mb-space-lg px-space-lg py-2">
<span class="material-symbols-outlined text-primary text-[16px]">trending_up</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">+6.4% Asset Appraisal Q3</span>
</div>
</div>
<!-- Stat 4 -->
<div class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
<div class="absolute -right-4 -bottom-4 w-20 h-20 bg-primary/5 rounded-full blur-xl group-hover:scale-150 transition-transform"></div>
<div class="flex items-start justify-between">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">Asset Ownership</span>
<div class="flex items-baseline gap-2 mt-1">
<span class="font-headline-xl text-headline-xl text-on-surface font-bold">14</span>
<span class="font-label-md text-label-md text-on-surface-variant font-semibold">Assigned Owners</span>
</div>
</div>
<div class="w-10 h-10 rounded-lg bg-surface-container-high flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined text-[22px]">real_estate_agent</span>
</div>
</div>
<div class="flex items-center gap-1.5 mt-3 pt-3 bg-surface-container-low/50 -mx-space-lg -mb-space-lg px-space-lg py-2">
<span class="material-symbols-outlined text-secondary text-[16px]">verified_user</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">100% Notarized Power of Attorney</span>
</div>
</div>
</section>
<!-- 2. Action & Filter Toolbar -->
<section class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm mb-space-lg flex flex-col xl:flex-row gap-space-md items-stretch xl:items-center justify-between">
<!-- Search and Filters Group -->
<div class="flex flex-wrap items-center gap-space-sm flex-1">
<!-- Search Input -->
<div class="relative min-w-[280px] flex-1 max-w-md">
<span class="material-symbols-outlined absolute left-3 top-2.5 text-on-surface-variant text-[20px] pointer-events-none">search</span>
<input class="w-full h-10 pl-10 pr-4 bg-surface-container-low rounded-lg text-on-surface font-body-md text-body-md placeholder-on-surface-variant outline-none focus:bg-surface-container-lowest transition-all" placeholder="Search by property name, code, city, or owner..." type="text">
</div>
<!-- Filter Dropdowns -->
<div class="relative">
<select class="appearance-none h-10 pl-3 pr-8 bg-surface-container-low rounded-lg text-on-surface font-label-md text-label-md hover:bg-surface-container transition-colors cursor-pointer outline-none">
<option>All Property Types (7)</option>
<option>Residential Buildings</option>
<option>Villas & Compounds</option>
<option>Chalet & Vacation Rentals</option>
<option>Agricultural & Date Farms</option>
<option>Commercial Towers & Offices</option>
<option>Rest Houses & Event Spaces</option>
</select>
<span class="material-symbols-outlined absolute right-2.5 top-2.5 text-[18px] text-on-surface-variant pointer-events-none">expand_more</span>
</div>
<div class="relative">
<select class="appearance-none h-10 pl-3 pr-8 bg-surface-container-low rounded-lg text-on-surface font-label-md text-label-md hover:bg-surface-container transition-colors cursor-pointer outline-none">
<option>Saudi Arabia (All Cities)</option>
<option>Riyadh (14)</option>
<option>Jeddah (4)</option>
<option>Al-Khobar (2)</option>
<option>Al-Kharj (2)</option>
<option>Diriyah (2)</option>
</select>
<span class="material-symbols-outlined absolute right-2.5 top-2.5 text-[18px] text-on-surface-variant pointer-events-none">location_on</span>
</div>
<div class="relative">
<select class="appearance-none h-10 pl-3 pr-8 bg-surface-container-low rounded-lg text-on-surface font-label-md text-label-md hover:bg-surface-container transition-colors cursor-pointer outline-none">
<option>All Statuses</option>
<option>Active / Operational</option>
<option>High Occupancy (&gt;80%)</option>
<option>Vacancy Available</option>
<option>Under Maintenance</option>
</select>
<span class="material-symbols-outlined absolute right-2.5 top-2.5 text-[18px] text-on-surface-variant pointer-events-none">tune</span>
</div>
<div class="relative">
<select class="appearance-none h-10 pl-3 pr-8 bg-surface-container-low rounded-lg text-on-surface font-label-md text-label-md hover:bg-surface-container transition-colors cursor-pointer outline-none">
<option>All Owners (14)</option>
<option>Sheikh Abdulaziz Al-Muqrin</option>
<option>Nouf Fahad Al-Hathloul</option>
<option>Fahad Bin Nasser Al-Sudairi</option>
<option>Muneera Abdullah Al-Saleh</option>
<option>Dr. Khalid Ibrahim Al-Dosari</option>
</select>
<span class="material-symbols-outlined absolute right-2.5 top-2.5 text-[18px] text-on-surface-variant pointer-events-none">person</span>
</div>
</div>
<!-- Right Controls: View Switcher & Add Property CTA -->
<div class="flex items-center gap-space-sm shrink-0 pt-2 xl:pt-0">
<div class="bg-surface-container-low p-1 rounded-lg flex items-center">
<button class="p-1.5 rounded-md bg-surface-container-lowest text-on-surface shadow-sm hover:text-primary transition-all flex items-center justify-center" id="viewGridBtn" title="Grid Card View" type="button" aria-label="Grid Card View" data-view-mode="grid" aria-pressed="true">
<span class="material-symbols-outlined text-[20px]">grid_view</span>
</button>
<button class="p-1.5 rounded-md text-on-surface-variant hover:text-on-surface transition-all flex items-center justify-center" id="viewListBtn" title="List Table View" type="button" aria-label="List Table View" data-view-mode="list" aria-pressed="false">
<span class="material-symbols-outlined text-[20px]">view_list</span>
</button>
</div>
<a class="flex items-center gap-2 px-space-md py-2.5 rounded-lg bg-primary-container text-on-primary hover:bg-primary transition-colors shadow-sm font-label-lg text-label-lg font-semibold shrink-0" href="{{ route('manager.add-property-1') }}">
<span class="material-symbols-outlined text-[20px]">add</span>
<span>Add New Property</span>
</a>
</div>
</section>
<!-- 3. Main Content: Property Cards Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-space-lg mb-space-xl" id="propertyGridContainer">
<!-- CARD 1: Al-Yasmin Residential Compound -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm hover:shadow-md transition-all flex flex-col overflow-hidden group">
<!-- Media Header with Rich Architectural Photo -->
<div class="relative h-48 w-full bg-surface-container overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Modern upscale residential apartment compound in Al-Yasmin Riyadh at golden hour, featuring sleek limestone facades, floor-to-ceiling glass balconies, warm ambient desert lighting, and manicured date palm landscaping." src="{{ asset('assets/aqar/images/dbb2a71ef1c083e218bb.jpg') }}" alt="Modern upscale residential apartment compound in Al-Yasmin Riyadh at golden hour, featuring sleek limestone facades, floor-to-ceiling glass balconies, warm ambient desert lighting, and manicured date palm landscaping.">
<div class="absolute inset-0 bg-gradient-to-t from-inverse-surface/80 via-inverse-surface/20 to-transparent"></div>
<!-- Badges on Image -->
<div class="absolute top-3 left-3 flex items-center gap-1.5">
<span class="px-2.5 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-md font-label-sm text-label-sm font-semibold text-on-surface">
            Residential Building
          </span>
<span class="px-2 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-md font-label-sm text-label-sm font-bold text-primary">
            PRP-RYD-0104
          </span>
</div>
<div class="absolute top-3 right-3">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-surface-container-lowest/95 backdrop-blur-md font-label-sm text-label-sm font-bold text-[#2E7D32]">
<span class="w-1.5 h-1.5 rounded-full bg-[#2E7D32]"></span>
            92% Occupied
          </span>
</div>
<!-- Property Title Overlay at Bottom of Image -->
<div class="absolute bottom-3 left-3 right-3 text-on-primary">
<h3 class="font-headline-sm text-headline-sm font-bold truncate text-white"><a href="{{ route('manager.property-details') }}">Al-Yasmin Residential Compound (Bldg A & B)</a></h3>
<p class="font-body-sm text-body-sm text-surface-container-high flex items-center gap-1 mt-0.5">
<span class="material-symbols-outlined text-[16px]">location_on</span>
            Al-Yasmin District, Riyadh, KSA
          </p>
</div>
</div>
<!-- Card Body Content -->
<div class="p-space-lg flex-1 flex flex-col justify-between">
<div>
<!-- Owner & Assigned Manager Meta -->
<div class="bg-surface-container-low p-2.5 rounded-lg flex items-center justify-between gap-2 mb-space-md">
<div class="flex items-center gap-2 min-w-0">
<div class="w-8 h-8 rounded-full bg-primary-container text-on-primary flex items-center justify-center font-bold text-label-sm shrink-0">
                AM
              </div>
<div class="flex flex-col min-w-0">
<span class="font-label-sm text-label-sm text-on-surface-variant">Asset Owner</span>
<span class="font-label-md text-label-md text-on-surface font-semibold truncate">Sheikh Abdulaziz Al-Muqrin</span>
</div>
</div>
<div class="text-right shrink-0">
<span class="font-label-sm text-label-sm text-on-surface-variant block">Manager</span>
<span class="font-label-md text-label-md text-secondary font-medium">Eng. Sultan Al-S.</span>
</div>
</div>
<!-- Key Quantitative Metrics Chips -->
<div class="grid grid-cols-2 gap-2 mb-space-md">
<div class="bg-surface-container-high/60 p-2 rounded-lg">
<span class="font-label-sm text-label-sm text-on-surface-variant block">Contained Units</span>
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">16 Units</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block mt-0.5">14 Leased • 2 Vacant</span>
</div>
<div class="bg-surface-container-high/60 p-2 rounded-lg">
<span class="font-label-sm text-label-sm text-on-surface-variant block">Built Area</span>
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">3,400 m²</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block mt-0.5">2 Commercial Basements</span>
</div>
</div>
<!-- Unit Breakdown Preview -->
<div class="space-y-1.5 mb-space-md">
<div class="flex items-center justify-between text-label-sm font-label-sm text-on-surface-variant">
<span>Unit Mix Allocation</span>
<span class="text-on-surface font-semibold">16 Sub-Units</span>
</div>
<div class="w-full h-2 rounded-full bg-surface-container flex overflow-hidden">
<div class="h-full bg-primary" style="width: 50%" title="8x 3-Bedroom Units"></div>
<div class="h-full bg-secondary" style="width: 37.5%" title="6x 2-Bedroom Units"></div>
<div class="h-full bg-tertiary-fixed-dim" style="width: 12.5%" title="2x Penthouse"></div>
</div>
<div class="flex items-center justify-between text-body-sm font-body-sm text-on-surface-variant text-[11px] pt-1">
<span>2x Penthouse</span>
<span>8x 3-Bed</span>
<span>6x 2-Bed</span>
</div>
</div>
</div>
<!-- Action Ribbon -->
<div class="pt-3 border-t border-surface-container flex items-center justify-between gap-1.5">
<a class="flex-1 py-2 px-2.5 rounded-lg bg-surface-container-low hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md font-semibold text-on-surface flex items-center justify-center gap-1" href="{{ route('manager.units') }}">
<span class="material-symbols-outlined text-[16px]">meeting_room</span>
<span>Manage Units</span>
</a>
<a class="p-2 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface transition-colors" title="View Property Details" href="{{ route('manager.property-details') }}" aria-label="View Property Details">
<span class="material-symbols-outlined text-[18px]">visibility</span>
</a>
<a class="p-2 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface transition-colors" title="Furniture & Chattel Inventory" href="{{ route('manager.furniture') }}" aria-label="Furniture & Chattel Inventory">
<span class="material-symbols-outlined text-[18px]">chair</span>
</a>
<button class="p-2 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface transition-colors" title="Edit Record" data-demo="Edit Record" type="button" aria-label="Edit Record">
<span class="material-symbols-outlined text-[18px]">edit</span>
</button>
</div>
</div>
</div>
<!-- CARD 2: Al-Nakheel Private Chalet -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm hover:shadow-md transition-all flex flex-col overflow-hidden group">
<!-- Media Header -->
<div class="relative h-48 w-full bg-surface-container overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Luxury private desert chalet in Al-Ammariyah Riyadh with private azure swimming pool, outdoor stone Majlis lounge, architectural pergola, warm illuminated water features, and tranquil evening sky." src="{{ asset('assets/aqar/images/81a35314118e109fff15.jpg') }}" alt="Luxury private desert chalet in Al-Ammariyah Riyadh with private azure swimming pool, outdoor stone Majlis lounge, architectural pergola, warm illuminated water features, and tranquil evening sky.">
<div class="absolute inset-0 bg-gradient-to-t from-inverse-surface/80 via-inverse-surface/20 to-transparent"></div>
<div class="absolute top-3 left-3 flex items-center gap-1.5">
<span class="px-2.5 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-md font-label-sm text-label-sm font-semibold text-on-surface">
            Chalet / Vacation Rental
          </span>
<span class="px-2 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-md font-label-sm text-label-sm font-bold text-primary">
            PRP-RYD-0082
          </span>
</div>
<div class="absolute top-3 right-3">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-surface-container-lowest/95 backdrop-blur-md font-label-sm text-label-sm font-bold text-[#2E7D32]">
<span class="w-1.5 h-1.5 rounded-full bg-[#2E7D32]"></span>
            Available / Active
          </span>
</div>
<div class="absolute bottom-3 left-3 right-3 text-on-primary">
<h3 class="font-headline-sm text-headline-sm font-bold truncate text-white"><a href="{{ route('manager.property-details') }}">Al-Nakheel Private Chalet</a></h3>
<p class="font-body-sm text-body-sm text-surface-container-high flex items-center gap-1 mt-0.5">
<span class="material-symbols-outlined text-[16px]">location_on</span>
            Al-Ammariyah, Riyadh Province, KSA
          </p>
</div>
</div>
<!-- Card Body Content -->
<div class="p-space-lg flex-1 flex flex-col justify-between">
<div>
<!-- Owner & Assigned Manager Meta -->
<div class="bg-surface-container-low p-2.5 rounded-lg flex items-center justify-between gap-2 mb-space-md">
<div class="flex items-center gap-2 min-w-0">
<div class="w-8 h-8 rounded-full bg-secondary-container text-on-secondary-container flex items-center justify-center font-bold text-label-sm shrink-0">
                NH
              </div>
<div class="flex flex-col min-w-0">
<span class="font-label-sm text-label-sm text-on-surface-variant">Asset Owner</span>
<span class="font-label-md text-label-md text-on-surface font-semibold truncate">Nouf Fahad Al-Hathloul</span>
</div>
</div>
<div class="text-right shrink-0">
<span class="font-label-sm text-label-sm text-on-surface-variant block">Manager</span>
<span class="font-label-md text-label-md text-secondary font-medium">Eng. Sultan Al-S.</span>
</div>
</div>
<!-- Key Quantitative Metrics Chips -->
<div class="grid grid-cols-2 gap-2 mb-space-md">
<div class="bg-surface-container-high/60 p-2 rounded-lg">
<span class="font-label-sm text-label-sm text-on-surface-variant block">Asset Type</span>
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">Single Asset</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block mt-0.5">1 Contained Master Unit</span>
</div>
<div class="bg-surface-container-high/60 p-2 rounded-lg">
<span class="font-label-sm text-label-sm text-on-surface-variant block">Key Features</span>
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">Private Pool</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block mt-0.5">& Traditional Majlis</span>
</div>
</div>
<!-- Operational Schedule Highlight -->
<div class="p-2.5 rounded-lg bg-surface-container-low/70 mb-space-md flex items-center justify-between">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[18px]">calendar_today</span>
<span class="font-label-sm text-label-sm text-on-surface font-medium">Lease Model: Daily / Weekly Flexible</span>
</div>
<span class="font-label-sm text-label-sm text-primary font-bold">SAR 3,200/day</span>
</div>
</div>
<!-- Action Ribbon -->
<div class="pt-3 border-t border-surface-container flex items-center justify-between gap-1.5">
<a class="flex-1 py-2 px-2.5 rounded-lg bg-surface-container-low hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md font-semibold text-on-surface flex items-center justify-center gap-1" href="{{ route('manager.units') }}">
<span class="material-symbols-outlined text-[16px]">meeting_room</span>
<span>Manage Unit</span>
</a>
<a class="p-2 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface transition-colors" title="View Property Details" href="{{ route('manager.property-details') }}" aria-label="View Property Details">
<span class="material-symbols-outlined text-[18px]">visibility</span>
</a>
<a class="p-2 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface transition-colors" title="Furniture & Chattel Inventory" href="{{ route('manager.furniture') }}" aria-label="Furniture & Chattel Inventory">
<span class="material-symbols-outlined text-[18px]">chair</span>
</a>
<button class="p-2 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface transition-colors" title="Edit Record" data-demo="Edit Record" type="button" aria-label="Edit Record">
<span class="material-symbols-outlined text-[18px]">edit</span>
</button>
</div>
</div>
</div>
<!-- CARD 3: Al-Reef Date Farm & Retreat -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm hover:shadow-md transition-all flex flex-col overflow-hidden group">
<!-- Media Header -->
<div class="relative h-48 w-full bg-surface-container overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Scenic organic date palm farm and country estate in Al-Kharj oasis, Saudi Arabia with modern hospitality pavilion, lush green date groves, traditional stone irrigation channels, and sunset lighting." src="{{ asset('assets/aqar/images/16f2386755ee37651245.jpg') }}" alt="Scenic organic date palm farm and country estate in Al-Kharj oasis, Saudi Arabia with modern hospitality pavilion, lush green date groves, traditional stone irrigation channels, and sunset lighting.">
<div class="absolute inset-0 bg-gradient-to-t from-inverse-surface/80 via-inverse-surface/20 to-transparent"></div>
<div class="absolute top-3 left-3 flex items-center gap-1.5">
<span class="px-2.5 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-md font-label-sm text-label-sm font-semibold text-on-surface">
            Agricultural / Leisure
          </span>
<span class="px-2 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-md font-label-sm text-label-sm font-bold text-primary">
            PRP-KHJ-0019
          </span>
</div>
<div class="absolute top-3 right-3">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-surface-container-lowest/95 backdrop-blur-md font-label-sm text-label-sm font-bold text-[#364E68]">
<span class="w-1.5 h-1.5 rounded-full bg-[#364E68]"></span>
            Leased (Seasonal)
          </span>
</div>
<div class="absolute bottom-3 left-3 right-3 text-on-primary">
<h3 class="font-headline-sm text-headline-sm font-bold truncate text-white"><a href="{{ route('manager.property-details') }}">Al-Reef Date Farm & Retreat</a></h3>
<p class="font-body-sm text-body-sm text-surface-container-high flex items-center gap-1 mt-0.5">
<span class="material-symbols-outlined text-[16px]">location_on</span>
            Al-Kharj Oasis, Riyadh Province, KSA
          </p>
</div>
</div>
<!-- Card Body Content -->
<div class="p-space-lg flex-1 flex flex-col justify-between">
<div>
<!-- Owner & Assigned Manager Meta -->
<div class="bg-surface-container-low p-2.5 rounded-lg flex items-center justify-between gap-2 mb-space-md">
<div class="flex items-center gap-2 min-w-0">
<div class="w-8 h-8 rounded-full bg-tertiary-container text-on-tertiary-container flex items-center justify-center font-bold text-label-sm shrink-0">
                FS
              </div>
<div class="flex flex-col min-w-0">
<span class="font-label-sm text-label-sm text-on-surface-variant">Asset Owner</span>
<span class="font-label-md text-label-md text-on-surface font-semibold truncate">Fahad Nasser Al-Sudairi</span>
</div>
</div>
<div class="text-right shrink-0">
<span class="font-label-sm text-label-sm text-on-surface-variant block">Field Manager</span>
<span class="font-label-md text-label-md text-secondary font-medium">Tariq Al-Harbi</span>
</div>
</div>
<!-- Key Quantitative Metrics Chips -->
<div class="grid grid-cols-2 gap-2 mb-space-md">
<div class="bg-surface-container-high/60 p-2 rounded-lg">
<span class="font-label-sm text-label-sm text-on-surface-variant block">Contained Sub-Units</span>
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">3 Units</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block mt-0.5">Lodge, Pavilion, Villa</span>
</div>
<div class="bg-surface-container-high/60 p-2 rounded-lg">
<span class="font-label-sm text-label-sm text-on-surface-variant block">Land Parcel</span>
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">12,000 m²</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block mt-0.5">320 Mature Date Palms</span>
</div>
</div>
<!-- Sub-Units Tags -->
<div class="flex flex-wrap gap-1.5 mb-space-md">
<span class="px-2 py-1 rounded bg-surface-container text-on-surface-variant font-label-sm text-label-sm">Main Executive Lodge</span>
<span class="px-2 py-1 rounded bg-surface-container text-on-surface-variant font-label-sm text-label-sm">Guest Pavillion</span>
<span class="px-2 py-1 rounded bg-surface-container text-on-surface-variant font-label-sm text-label-sm">Staff Villa</span>
</div>
</div>
<!-- Action Ribbon -->
<div class="pt-3 border-t border-surface-container flex items-center justify-between gap-1.5">
<a class="flex-1 py-2 px-2.5 rounded-lg bg-surface-container-low hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md font-semibold text-on-surface flex items-center justify-center gap-1" href="{{ route('manager.units') }}">
<span class="material-symbols-outlined text-[16px]">meeting_room</span>
<span>Manage 3 Units</span>
</a>
<a class="p-2 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface transition-colors" title="View Property Details" href="{{ route('manager.property-details') }}" aria-label="View Property Details">
<span class="material-symbols-outlined text-[18px]">visibility</span>
</a>
<a class="p-2 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface transition-colors" title="Furniture & Chattel Inventory" href="{{ route('manager.furniture') }}" aria-label="Furniture & Chattel Inventory">
<span class="material-symbols-outlined text-[18px]">chair</span>
</a>
<button class="p-2 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface transition-colors" title="Edit Record" data-demo="Edit Record" type="button" aria-label="Edit Record">
<span class="material-symbols-outlined text-[18px]">edit</span>
</button>
</div>
</div>
</div>
<!-- CARD 4: Burj Al-Ulya Commercial & Serviced Tower -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm hover:shadow-md transition-all flex flex-col overflow-hidden group">
<!-- Media Header -->
<div class="relative h-48 w-full bg-surface-container overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Modern commercial corporate glass and steel skyscraper in Al-Olaya financial center Riyadh with dynamic evening twilight lighting, high-end retail promenade on ground level, and luxury corporate exterior design." src="{{ asset('assets/aqar/images/f53bc455d2944f5f5212.jpg') }}" alt="Modern commercial corporate glass and steel skyscraper in Al-Olaya financial center Riyadh with dynamic evening twilight lighting, high-end retail promenade on ground level, and luxury corporate exterior design.">
<div class="absolute inset-0 bg-gradient-to-t from-inverse-surface/80 via-inverse-surface/20 to-transparent"></div>
<div class="absolute top-3 left-3 flex items-center gap-1.5">
<span class="px-2.5 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-md font-label-sm text-label-sm font-semibold text-on-surface">
            Commercial & Mixed-Use
          </span>
<span class="px-2 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-md font-label-sm text-label-sm font-bold text-primary">
            PRP-RYD-0312
          </span>
</div>
<div class="absolute top-3 right-3">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-surface-container-lowest/95 backdrop-blur-md font-label-sm text-label-sm font-bold text-[#2E7D32]">
<span class="w-1.5 h-1.5 rounded-full bg-[#2E7D32]"></span>
            85% Occupied
          </span>
</div>
<div class="absolute bottom-3 left-3 right-3 text-on-primary">
<h3 class="font-headline-sm text-headline-sm font-bold truncate text-white"><a href="{{ route('manager.property-details') }}">Burj Al-Ulya Serviced Tower</a></h3>
<p class="font-body-sm text-body-sm text-surface-container-high flex items-center gap-1 mt-0.5">
<span class="material-symbols-outlined text-[16px]">location_on</span>
            Al-Olaya Business District, Riyadh, KSA
          </p>
</div>
</div>
<!-- Card Body Content -->
<div class="p-space-lg flex-1 flex flex-col justify-between">
<div>
<!-- Owner & Assigned Manager Meta -->
<div class="bg-surface-container-low p-2.5 rounded-lg flex items-center justify-between gap-2 mb-space-md">
<div class="flex items-center gap-2 min-w-0">
<div class="w-8 h-8 rounded-full bg-primary-container text-on-primary flex items-center justify-center font-bold text-label-sm shrink-0">
                AM
              </div>
<div class="flex flex-col min-w-0">
<span class="font-label-sm text-label-sm text-on-surface-variant">Asset Owner (Multi-Hold)</span>
<span class="font-label-md text-label-md text-on-surface font-semibold truncate">Sheikh Abdulaziz Al-Muqrin</span>
</div>
</div>
<div class="text-right shrink-0">
<span class="font-label-sm text-label-sm text-on-surface-variant block">Manager</span>
<span class="font-label-md text-label-md text-secondary font-medium">Eng. Sultan Al-S.</span>
</div>
</div>
<!-- Key Quantitative Metrics Chips -->
<div class="grid grid-cols-2 gap-2 mb-space-md">
<div class="bg-surface-container-high/60 p-2 rounded-lg">
<span class="font-label-sm text-label-sm text-on-surface-variant block">Contained Units</span>
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">28 Units</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block mt-0.5">24 Offices • 4 Retail</span>
</div>
<div class="bg-surface-container-high/60 p-2 rounded-lg">
<span class="font-label-sm text-label-sm text-on-surface-variant block">Annual Yield</span>
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">9.2% ROI</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block mt-0.5">85% Leased Portfolio</span>
</div>
</div>
<!-- Unit Breakdown Preview -->
<div class="space-y-1.5 mb-space-md">
<div class="flex items-center justify-between text-label-sm font-label-sm text-on-surface-variant">
<span>Commercial Tenancy Breakdown</span>
<span class="text-on-surface font-semibold">24 / 28 Leased</span>
</div>
<div class="w-full h-2 rounded-full bg-surface-container flex overflow-hidden">
<div class="h-full bg-primary" style="width: 85%" title="24 Leased Units"></div>
<div class="h-full bg-surface-dim" style="width: 15%" title="4 Available Units"></div>
</div>
<div class="flex items-center justify-between text-body-sm font-body-sm text-on-surface-variant text-[11px] pt-1">
<span>Ground Retail (4/4 Occupied)</span>
<span>Offices (20/24 Occupied)</span>
</div>
</div>
</div>
<!-- Action Ribbon -->
<div class="pt-3 border-t border-surface-container flex items-center justify-between gap-1.5">
<a class="flex-1 py-2 px-2.5 rounded-lg bg-surface-container-low hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md font-semibold text-on-surface flex items-center justify-center gap-1" href="{{ route('manager.units') }}">
<span class="material-symbols-outlined text-[16px]">meeting_room</span>
<span>Manage 28 Units</span>
</a>
<a class="p-2 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface transition-colors" title="View Property Details" href="{{ route('manager.property-details') }}" aria-label="View Property Details">
<span class="material-symbols-outlined text-[18px]">visibility</span>
</a>
<a class="p-2 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface transition-colors" title="Furniture & Chattel Inventory" href="{{ route('manager.furniture') }}" aria-label="Furniture & Chattel Inventory">
<span class="material-symbols-outlined text-[18px]">chair</span>
</a>
<button class="p-2 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface transition-colors" title="Edit Record" data-demo="Edit Record" type="button" aria-label="Edit Record">
<span class="material-symbols-outlined text-[18px]">edit</span>
</button>
</div>
</div>
</div>
<!-- CARD 5: Al-Hamra Luxury Family Villa -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm hover:shadow-md transition-all flex flex-col overflow-hidden group">
<!-- Media Header -->
<div class="relative h-48 w-full bg-surface-container overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Luxury Mediterranean contemporary coastal villa in Al-Hamra Jeddah with white stucco walls, expansive wooden sun screens, lush bougainvillea, private inner courtyard, and bright morning coastal light." src="{{ asset('assets/aqar/images/79c2ffe6ec71bf02c76b.jpg') }}" alt="Luxury Mediterranean contemporary coastal villa in Al-Hamra Jeddah with white stucco walls, expansive wooden sun screens, lush bougainvillea, private inner courtyard, and bright morning coastal light.">
<div class="absolute inset-0 bg-gradient-to-t from-inverse-surface/80 via-inverse-surface/20 to-transparent"></div>
<div class="absolute top-3 left-3 flex items-center gap-1.5">
<span class="px-2.5 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-md font-label-sm text-label-sm font-semibold text-on-surface">
            Standalone Villa
          </span>
<span class="px-2 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-md font-label-sm text-label-sm font-bold text-primary">
            PRP-JED-0055
          </span>
</div>
<div class="absolute top-3 right-3">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-surface-container-lowest/95 backdrop-blur-md font-label-sm text-label-sm font-bold text-[#D35400]">
<span class="w-1.5 h-1.5 rounded-full bg-[#D35400]"></span>
            Vacant (Ready to Lease)
          </span>
</div>
<div class="absolute bottom-3 left-3 right-3 text-on-primary">
<h3 class="font-headline-sm text-headline-sm font-bold truncate text-white"><a href="{{ route('manager.property-details') }}">Al-Hamra Luxury Family Villa</a></h3>
<p class="font-body-sm text-body-sm text-surface-container-high flex items-center gap-1 mt-0.5">
<span class="material-symbols-outlined text-[16px]">location_on</span>
            Al-Hamra District, Jeddah, KSA
          </p>
</div>
</div>
<!-- Card Body Content -->
<div class="p-space-lg flex-1 flex flex-col justify-between">
<div>
<!-- Owner & Assigned Manager Meta -->
<div class="bg-surface-container-low p-2.5 rounded-lg flex items-center justify-between gap-2 mb-space-md">
<div class="flex items-center gap-2 min-w-0">
<div class="w-8 h-8 rounded-full bg-secondary text-on-secondary flex items-center justify-center font-bold text-label-sm shrink-0">
                MS
              </div>
<div class="flex flex-col min-w-0">
<span class="font-label-sm text-label-sm text-on-surface-variant">Asset Owner</span>
<span class="font-label-md text-label-md text-on-surface font-semibold truncate">Muneera Abdullah Al-Saleh</span>
</div>
</div>
<div class="text-right shrink-0">
<span class="font-label-sm text-label-sm text-on-surface-variant block">Western Reg PM</span>
<span class="font-label-md text-label-md text-secondary font-medium">Rami Al-Ghamdi</span>
</div>
</div>
<!-- Key Quantitative Metrics Chips -->
<div class="grid grid-cols-2 gap-2 mb-space-md">
<div class="bg-surface-container-high/60 p-2 rounded-lg">
<span class="font-label-sm text-label-sm text-on-surface-variant block">Configuration</span>
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">6 Bedrooms</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block mt-0.5">+ Driver & Maid Suite</span>
</div>
<div class="bg-surface-container-high/60 p-2 rounded-lg">
<span class="font-label-sm text-label-sm text-on-surface-variant block">Plot / BUA</span>
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">850 m²</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block mt-0.5">Dual Street Access</span>
</div>
</div>
<!-- Status Highlight Card -->
<div class="p-2.5 rounded-lg bg-surface-container-low/70 mb-space-md flex items-center justify-between">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[#D35400] text-[18px]">verified</span>
<span class="font-label-sm text-label-sm text-on-surface font-medium">Deep Sanitized & Inspection Approved</span>
</div>
<span class="font-label-sm text-label-sm text-[#D35400] font-bold">Ready</span>
</div>
</div>
<!-- Action Ribbon -->
<div class="pt-3 border-t border-surface-container flex items-center justify-between gap-1.5">
<a class="flex-1 py-2 px-2.5 rounded-lg bg-surface-container-low hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md font-semibold text-on-surface flex items-center justify-center gap-1" href="{{ route('manager.unit-details') }}">
<span class="material-symbols-outlined text-[16px]">meeting_room</span>
<span>Manage Villa</span>
</a>
<a class="p-2 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface transition-colors" title="View Property Details" href="{{ route('manager.property-details') }}" aria-label="View Property Details">
<span class="material-symbols-outlined text-[18px]">visibility</span>
</a>
<a class="p-2 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface transition-colors" title="Furniture & Chattel Inventory" href="{{ route('manager.furniture') }}" aria-label="Furniture & Chattel Inventory">
<span class="material-symbols-outlined text-[18px]">chair</span>
</a>
<button class="p-2 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface transition-colors" title="Edit Record" data-demo="Edit Record" type="button" aria-label="Edit Record">
<span class="material-symbols-outlined text-[18px]">edit</span>
</button>
</div>
</div>
</div>
<!-- CARD 6: Diriyah Heritage Rest House -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm hover:shadow-md transition-all flex flex-col overflow-hidden group">
<!-- Media Header -->
<div class="relative h-48 w-full bg-surface-container overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Traditional Najdi architecture rest house in historic Diriyah Riyadh with authentic sun-dried adobe mud brick walls, triangular decorative pinnacles, wooden carved doors, and warm lantern lighting." src="{{ asset('assets/aqar/images/5b2274142101e7feafab.jpg') }}" alt="Traditional Najdi architecture rest house in historic Diriyah Riyadh with authentic sun-dried adobe mud brick walls, triangular decorative pinnacles, wooden carved doors, and warm lantern lighting.">
<div class="absolute inset-0 bg-gradient-to-t from-inverse-surface/80 via-inverse-surface/20 to-transparent"></div>
<div class="absolute top-3 left-3 flex items-center gap-1.5">
<span class="px-2.5 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-md font-label-sm text-label-sm font-semibold text-on-surface">
            Rest House / Event Space
          </span>
<span class="px-2 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-md font-label-sm text-label-sm font-bold text-primary">
            PRP-DIR-0007
          </span>
</div>
<div class="absolute top-3 right-3">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-surface-container-lowest/95 backdrop-blur-md font-label-sm text-label-sm font-bold text-[#D35400]">
<span class="w-1.5 h-1.5 rounded-full bg-[#D35400]"></span>
            Periodic Maintenance
          </span>
</div>
<div class="absolute bottom-3 left-3 right-3 text-on-primary">
<h3 class="font-headline-sm text-headline-sm font-bold truncate text-white"><a href="{{ route('manager.property-details') }}">Diriyah Heritage Rest House</a></h3>
<p class="font-body-sm text-body-sm text-surface-container-high flex items-center gap-1 mt-0.5">
<span class="material-symbols-outlined text-[16px]">location_on</span>
            Historic Diriyah, Riyadh Province, KSA
          </p>
</div>
</div>
<!-- Card Body Content -->
<div class="p-space-lg flex-1 flex flex-col justify-between">
<div>
<!-- Owner & Assigned Manager Meta -->
<div class="bg-surface-container-low p-2.5 rounded-lg flex items-center justify-between gap-2 mb-space-md">
<div class="flex items-center gap-2 min-w-0">
<div class="w-8 h-8 rounded-full bg-tertiary text-on-tertiary flex items-center justify-center font-bold text-label-sm shrink-0">
                KD
              </div>
<div class="flex flex-col min-w-0">
<span class="font-label-sm text-label-sm text-on-surface-variant">Asset Owner</span>
<span class="font-label-md text-label-md text-on-surface font-semibold truncate">Dr. Khalid Ibrahim Al-Dosari</span>
</div>
</div>
<div class="text-right shrink-0">
<span class="font-label-sm text-label-sm text-on-surface-variant block">Manager</span>
<span class="font-label-md text-label-md text-secondary font-medium">Eng. Sultan Al-S.</span>
</div>
</div>
<!-- Key Quantitative Metrics Chips -->
<div class="grid grid-cols-2 gap-2 mb-space-md">
<div class="bg-surface-container-high/60 p-2 rounded-lg">
<span class="font-label-sm text-label-sm text-on-surface-variant block">Facility Layout</span>
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">2 Event Halls</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block mt-0.5">1 VIP Guest Suite</span>
</div>
<div class="bg-surface-container-high/60 p-2 rounded-lg">
<span class="font-label-sm text-label-sm text-on-surface-variant block">Compliance</span>
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">Event Permit</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block mt-0.5">DGDA Heritage Code</span>
</div>
</div>
<!-- Maintenance Status Notice -->
<div class="p-2.5 rounded-lg bg-surface-container-low/70 mb-space-md flex items-center justify-between">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-secondary text-[18px]">construction</span>
<span class="font-label-sm text-label-sm text-on-surface font-medium">HVAC & Adobe Restoration (Exp: Nov 2)</span>
</div>
<span class="font-label-sm text-label-sm text-secondary font-bold">In Progress</span>
</div>
</div>
<!-- Action Ribbon -->
<div class="pt-3 border-t border-surface-container flex items-center justify-between gap-1.5">
<a class="flex-1 py-2 px-2.5 rounded-lg bg-surface-container-low hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md font-semibold text-on-surface flex items-center justify-center gap-1" href="{{ route('manager.units') }}">
<span class="material-symbols-outlined text-[16px]">meeting_room</span>
<span>Manage 3 Units</span>
</a>
<a class="p-2 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface transition-colors" title="View Property Details" href="{{ route('manager.property-details') }}" aria-label="View Property Details">
<span class="material-symbols-outlined text-[18px]">visibility</span>
</a>
<a class="p-2 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface transition-colors" title="Furniture & Chattel Inventory" href="{{ route('manager.furniture') }}" aria-label="Furniture & Chattel Inventory">
<span class="material-symbols-outlined text-[18px]">chair</span>
</a>
<button class="p-2 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface transition-colors" title="Edit Record" data-demo="Edit Record" type="button" aria-label="Edit Record">
<span class="material-symbols-outlined text-[18px]">edit</span>
</button>
</div>
</div>
</div>
</div>
<!-- Hidden by default: List Table View Alternative -->
<div class="hidden bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden mb-space-xl" id="propertyListContainer">
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead class="bg-surface-container-low">
<tr>
<th class="p-space-md font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Property & Code</th>
<th class="p-space-md font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Type & Location</th>
<th class="p-space-md font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Owner & Manager</th>
<th class="p-space-md font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Units Breakdown</th>
<th class="p-space-md font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Occupancy / Status</th>
<th class="p-space-md font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container font-body-md text-body-md">
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="p-space-md"><a href="{{ route('manager.property-details') }}">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-primary-container text-on-primary flex items-center justify-center font-bold">
<span class="material-symbols-outlined text-[20px]">apartment</span>
</div>
<div>
<span class="font-headline-sm text-headline-sm text-on-surface font-bold block">Al-Yasmin Compound (A & B)</span>
<span class="font-label-sm text-label-sm text-primary font-bold">PRP-RYD-0104</span>
</div>
</div>
</a></td>
<td class="p-space-md">
<span class="font-label-md text-label-md text-on-surface font-semibold block">Residential Building</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Al-Yasmin, Riyadh</span>
</td>
<td class="p-space-md">
<span class="font-label-md text-label-md text-on-surface font-semibold block">Sheikh Abdulaziz Al-Muqrin</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">PM: Eng. Sultan Al-Shammari</span>
</td>
<td class="p-space-md">
<span class="font-label-md text-label-md text-on-surface font-bold">16 Contained Units</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block">14 Leased • 2 Vacant</span>
</td>
<td class="p-space-md">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-[#EBF6F0] text-[#2E7D32] font-label-sm text-label-sm font-bold">
<span class="w-1.5 h-1.5 rounded-full bg-[#2E7D32]"></span>
                92% Occupied
              </span>
</td>
<td class="p-space-md text-right">
<a class="px-3 py-1.5 rounded-lg bg-surface-container-high hover:bg-primary hover:text-on-primary font-label-md text-label-md font-semibold transition-colors" href="{{ route('manager.units') }}">
                Manage Units
              </a>
</td>
</tr>
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="p-space-md"><a href="{{ route('manager.property-details') }}">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-secondary text-on-secondary flex items-center justify-center font-bold">
<span class="material-symbols-outlined text-[20px]">villa</span>
</div>
<div>
<span class="font-headline-sm text-headline-sm text-on-surface font-bold block">Al-Nakheel Private Chalet</span>
<span class="font-label-sm text-label-sm text-primary font-bold">PRP-RYD-0082</span>
</div>
</div>
</a></td>
<td class="p-space-md">
<span class="font-label-md text-label-md text-on-surface font-semibold block">Chalet / Vacation</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Al-Ammariyah, Riyadh</span>
</td>
<td class="p-space-md">
<span class="font-label-md text-label-md text-on-surface font-semibold block">Nouf Fahad Al-Hathloul</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">PM: Eng. Sultan Al-Shammari</span>
</td>
<td class="p-space-md">
<span class="font-label-md text-label-md text-on-surface font-bold">1 Single Asset Unit</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block">Flexible Daily/Weekly</span>
</td>
<td class="p-space-md">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-[#EBF6F0] text-[#2E7D32] font-label-sm text-label-sm font-bold">
<span class="w-1.5 h-1.5 rounded-full bg-[#2E7D32]"></span>
                Available / Active
              </span>
</td>
<td class="p-space-md text-right">
<a class="px-3 py-1.5 rounded-lg bg-surface-container-high hover:bg-primary hover:text-on-primary font-label-md text-label-md font-semibold transition-colors" href="{{ route('manager.units') }}">
                Manage Unit
              </a>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- 4. Quick Contained Unit Directory & Allocation Table (Architectural Distinction Drawer) -->
<section class="bg-surface-container-lowest rounded-xl shadow-sm p-space-lg mb-space-xl">
<div class="flex flex-col md:flex-row items-start md:items-center justify-between pb-space-md border-b border-surface-container gap-space-sm">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-lg bg-surface-container-high flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined text-[22px]">account_tree</span>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">Quick Contained Unit Directory & Allocation</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Live breakdown mapping child rental units to parent property assets.</p>
</div>
</div>
<div class="flex items-center gap-2">
<span class="font-label-sm text-label-sm text-on-surface-variant">Showing sample of 80 total portfolio units</span>
<a class="text-primary hover:underline font-label-md text-label-md font-semibold flex items-center gap-1" href="{{ route('manager.units') }}">
<span>View All in Units Console</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
</div>
<!-- Directory Table -->
<div class="overflow-x-auto mt-space-md">
<table class="w-full text-left">
<thead>
<tr class="bg-surface-container-low text-on-surface-variant font-label-sm text-label-sm uppercase tracking-wider">
<th class="py-2.5 px-3 rounded-l-lg">Unit ID & Tag</th>
<th class="py-2.5 px-3">Unit Type</th>
<th class="py-2.5 px-3">Parent Property (Asset)</th>
<th class="py-2.5 px-3">Current Status</th>
<th class="py-2.5 px-3">Lease Amount</th>
<th class="py-2.5 px-3">Assigned Tenant / Guest</th>
<th class="py-2.5 px-3 rounded-r-lg text-right">Direct Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container font-body-md text-body-md">
<!-- Row 1 -->
<tr class="hover:bg-surface-container-low/40 transition-colors">
<td class="py-3 px-3"><a href="{{ route('manager.unit-details') }}">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[18px]">meeting_room</span>
<div>
<span class="font-label-md text-label-md text-on-surface font-bold">UNT-YAS-101</span>
<span class="font-label-sm text-label-sm text-on-surface-variant block">Ground Floor East</span>
</div>
</div>
</a></td>
<td class="py-3 px-3">
<span class="font-label-md text-label-md text-on-surface font-medium">3-Bedroom Apartment</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block">185 m²</span>
</td>
<td class="py-3 px-3">
<div class="flex items-center gap-1.5">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
<span class="font-label-md text-label-md text-on-surface font-semibold">Al-Yasmin Compound (Bldg A)</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant block">PRP-RYD-0104</span>
</td>
<td class="py-3 px-3">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-[#EBF6F0] text-[#2E7D32] font-label-sm text-label-sm font-bold">
<span class="w-1.5 h-1.5 rounded-full bg-[#2E7D32]"></span>
                Leased
              </span>
</td>
<td class="py-3 px-3">
<span class="font-label-md text-label-md text-on-surface font-bold">95,000 SAR</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block">Annual (Quarterly)</span>
</td>
<td class="py-3 px-3">
<span class="font-label-md text-label-md text-on-surface">Bandar Fahad Al-Otaibi</span>
<span class="font-label-sm text-label-sm text-[#2E7D32] block">Ejar #CTR-2024-991</span>
</td>
<td class="py-3 px-3 text-right">
<div class="flex items-center justify-end gap-1">
<a class="px-2.5 py-1 rounded bg-surface-container-high hover:bg-primary hover:text-on-primary font-label-sm text-label-sm font-semibold transition-colors" href="{{ route('manager.unit-details') }}">
                  Manage
                </a>
<a class="p-1 rounded text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-colors" title="Inspect Furniture Inventory" href="{{ route('manager.furniture') }}" aria-label="Inspect Furniture Inventory">
<span class="material-symbols-outlined text-[18px]">chair</span>
</a>
</div>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-surface-container-low/40 transition-colors">
<td class="py-3 px-3"><a href="{{ route('manager.unit-details') }}">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[18px]">meeting_room</span>
<div>
<span class="font-label-md text-label-md text-on-surface font-bold">UNT-YAS-PH2</span>
<span class="font-label-sm text-label-sm text-on-surface-variant block">Penthouse Floor 4</span>
</div>
</div>
</a></td>
<td class="py-3 px-3">
<span class="font-label-md text-label-md text-on-surface font-medium">Executive Penthouse</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block">310 m² + Roof Terrace</span>
</td>
<td class="py-3 px-3">
<div class="flex items-center gap-1.5">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
<span class="font-label-md text-label-md text-on-surface font-semibold">Al-Yasmin Compound (Bldg B)</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant block">PRP-RYD-0104</span>
</td>
<td class="py-3 px-3">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-[#F0F4F8] text-[#364E68] font-label-sm text-label-sm font-bold">
<span class="w-1.5 h-1.5 rounded-full bg-[#364E68]"></span>
                Vacant
              </span>
</td>
<td class="py-3 px-3">
<span class="font-label-md text-label-md text-on-surface font-bold">140,000 SAR</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block">Asking Rental</span>
</td>
<td class="py-3 px-3">
<span class="font-body-sm text-body-sm text-on-surface-variant italic">Unassigned (Ready for Move-in)</span>
</td>
<td class="py-3 px-3 text-right">
<div class="flex items-center justify-end gap-1">
<button class="px-2.5 py-1 rounded bg-surface-container-high hover:bg-primary hover:text-on-primary font-label-sm text-label-sm font-semibold transition-colors" data-demo="Assign Tenant" type="button">
                  Assign Tenant
                </button>
<a class="p-1 rounded text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-colors" title="Inspect Furniture Inventory" href="{{ route('manager.furniture') }}" aria-label="Inspect Furniture Inventory">
<span class="material-symbols-outlined text-[18px]">chair</span>
</a>
</div>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-surface-container-low/40 transition-colors">
<td class="py-3 px-3"><a href="{{ route('manager.unit-details') }}">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-secondary text-[18px]">business</span>
<div>
<span class="font-label-md text-label-md text-on-surface font-bold">UNT-OLY-OF04</span>
<span class="font-label-sm text-label-sm text-on-surface-variant block">Floor 7, Suite A</span>
</div>
</div>
</a></td>
<td class="py-3 px-3">
<span class="font-label-md text-label-md text-on-surface font-medium">Fitted Commercial Office</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block">420 m²</span>
</td>
<td class="py-3 px-3">
<div class="flex items-center gap-1.5">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
<span class="font-label-md text-label-md text-on-surface font-semibold">Burj Al-Ulya Serviced Tower</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant block">PRP-RYD-0312</span>
</td>
<td class="py-3 px-3">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-[#EBF6F0] text-[#2E7D32] font-label-sm text-label-sm font-bold">
<span class="w-1.5 h-1.5 rounded-full bg-[#2E7D32]"></span>
                Leased
              </span>
</td>
<td class="py-3 px-3">
<span class="font-label-md text-label-md text-on-surface font-bold">380,000 SAR</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block">Annual Corporate</span>
</td>
<td class="py-3 px-3">
<span class="font-label-md text-label-md text-on-surface">Tadawul Tech Solutions KSA</span>
<span class="font-label-sm text-label-sm text-[#2E7D32] block">Commercial Lease</span>
</td>
<td class="py-3 px-3 text-right">
<div class="flex items-center justify-end gap-1">
<a class="px-2.5 py-1 rounded bg-surface-container-high hover:bg-primary hover:text-on-primary font-label-sm text-label-sm font-semibold transition-colors" href="{{ route('manager.unit-details') }}">
                  Manage
                </a>
<a class="p-1 rounded text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-colors" title="Inspect Furniture Inventory" href="{{ route('manager.furniture') }}" aria-label="Inspect Furniture Inventory">
<span class="material-symbols-outlined text-[18px]">chair</span>
</a>
</div>
</td>
</tr>
<!-- Row 4 -->
<tr class="hover:bg-surface-container-low/40 transition-colors">
<td class="py-3 px-3"><a href="{{ route('manager.unit-details') }}">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-tertiary text-[18px]">holiday_village</span>
<div>
<span class="font-label-md text-label-md text-on-surface font-bold">UNT-REEF-LODGE</span>
<span class="font-label-sm text-label-sm text-on-surface-variant block">Oasis Frontage</span>
</div>
</div>
</a></td>
<td class="py-3 px-3">
<span class="font-label-md text-label-md text-on-surface font-medium">Main Executive Farm Lodge</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block">540 m²</span>
</td>
<td class="py-3 px-3">
<div class="flex items-center gap-1.5">
<span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span>
<span class="font-label-md text-label-md text-on-surface font-semibold">Al-Reef Date Farm & Retreat</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant block">PRP-KHJ-0019</span>
</td>
<td class="py-3 px-3">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-[#FFFAEB] text-[#D35400] font-label-sm text-label-sm font-bold">
<span class="w-1.5 h-1.5 rounded-full bg-[#D35400]"></span>
                Seasonal Lease
              </span>
</td>
<td class="py-3 px-3">
<span class="font-label-md text-label-md text-on-surface font-bold">45,000 SAR</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block">Monthly Winter Term</span>
</td>
<td class="py-3 px-3">
<span class="font-label-md text-label-md text-on-surface">Majid Al-Hokair Group</span>
<span class="font-label-sm text-label-sm text-on-surface-variant block">Seasonal Private Booking</span>
</td>
<td class="py-3 px-3 text-right">
<div class="flex items-center justify-end gap-1">
<a class="px-2.5 py-1 rounded bg-surface-container-high hover:bg-primary hover:text-on-primary font-label-sm text-label-sm font-semibold transition-colors" href="{{ route('manager.unit-details') }}">
                  Manage
                </a>
<a class="p-1 rounded text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-colors" title="Inspect Furniture Inventory" href="{{ route('manager.furniture') }}" aria-label="Inspect Furniture Inventory">
<span class="material-symbols-outlined text-[18px]">chair</span>
</a>
</div>
</td>
</tr>
</tbody>
</table>
</div>
</section>
<!-- 5. Footer Pagination and Record Range Bar -->
<footer class="flex flex-col sm:flex-row items-center justify-between gap-space-md pt-2 pb-space-lg">
<div class="font-body-sm text-body-sm text-on-surface-variant">
      Showing <span class="font-semibold text-on-surface">6</span> of <span class="font-semibold text-on-surface">24</span> active real estate properties (Page 1 of 4)
    </div>
<!-- Pagination Controls -->
<div class="flex items-center gap-1.5">
<button class="w-9 h-9 rounded-lg bg-surface-container-lowest text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-colors flex items-center justify-center disabled:opacity-40" disabled="" data-demo="chevron_left" type="button" aria-label="chevron left">
<span class="material-symbols-outlined text-[18px]">chevron_left</span>
</button>
<button class="w-9 h-9 rounded-lg bg-primary-container text-on-primary font-label-md text-label-md font-bold flex items-center justify-center shadow-sm" data-demo="1" type="button">
        1
      </button>
<button class="w-9 h-9 rounded-lg bg-surface-container-lowest text-on-surface hover:bg-surface-container font-label-md text-label-md font-medium transition-colors flex items-center justify-center" data-demo="2" type="button">
        2
      </button>
<button class="w-9 h-9 rounded-lg bg-surface-container-lowest text-on-surface hover:bg-surface-container font-label-md text-label-md font-medium transition-colors flex items-center justify-center" data-demo="3" type="button">
        3
      </button>
<button class="w-9 h-9 rounded-lg bg-surface-container-lowest text-on-surface hover:bg-surface-container font-label-md text-label-md font-medium transition-colors flex items-center justify-center" data-demo="4" type="button">
        4
      </button>
<button class="w-9 h-9 rounded-lg bg-surface-container-lowest text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-colors flex items-center justify-center" data-demo="chevron_right" type="button" aria-label="chevron right">
<span class="material-symbols-outlined text-[18px]">chevron_right</span>
</button>
</div>
</footer>
</div>
@endsection
