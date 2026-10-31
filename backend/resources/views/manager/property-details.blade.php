{{-- Imported from client_demo/screens/property_details/code.html; static demonstration data. --}}
@extends('layouts.manager')
@section('content')
<div class="flex flex-col w-full pb-16">
<!-- Top Navigation Bar & Action Zone -->
<div class="w-full flex flex-col md:flex-row md:items-center justify-between gap-4 py-4 mb-6">
<div class="flex flex-col gap-1.5">
<!-- Breadcrumb Navigation -->
<nav aria-label="Breadcrumb" class="flex items-center gap-2 text-on-surface-variant font-label-md text-label-md">
<a class="hover:text-primary transition-colors flex items-center gap-1" href="{{ route('manager.properties') }}">
<span class="material-symbols-outlined text-[16px]">domain</span>
<span>Properties</span>
</a>
<span class="material-symbols-outlined text-[14px] text-outline-variant">chevron_right</span>
<span class="text-on-surface font-semibold">Al-Yasmin Compound II</span>
</nav>
<!-- Main Heading & Meta -->
<div class="flex flex-wrap items-center gap-3">
<h1 class="font-headline-xl text-headline-xl tracking-tight text-on-surface">Al-Yasmin Compound II</h1>
<!-- Status Badge -->
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-tertiary-fixed text-tertiary font-label-sm text-label-sm tracking-wide shadow-sm">
<span class="w-2 h-2 rounded-full bg-tertiary animate-pulse"></span>
          Saved — Not Published
        </span>
<span class="font-label-sm text-label-sm bg-surface-container-high text-on-surface-variant px-2.5 py-1 rounded tracking-wider font-mono">
          REF: PRP-RYD-2026-0089
        </span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant flex items-center gap-1.5">
<span class="material-symbols-outlined text-[18px] text-primary">location_on</span>
        Residential Compound • Al-Yasmin District, Riyadh, Kingdom of Saudi Arabia
      </p>
</div>
<!-- Header Actions -->
<div class="flex items-center gap-2.5 self-start md:self-auto">
<a class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-surface-container-lowest hover:bg-surface-container text-on-surface transition-all font-label-md text-label-md shadow-sm active:scale-95" href="{{ route('manager.add-property-1') }}">
<span class="material-symbols-outlined text-[18px] text-secondary">edit</span>
<span>Edit Property</span>
</a>
<a class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-surface-container-lowest hover:bg-surface-container text-on-surface transition-all font-label-md text-label-md shadow-sm active:scale-95" href="{{ route('manager.units') }}">
<span class="material-symbols-outlined text-[18px] text-secondary">meeting_room</span>
<span>Manage Units</span>
</a>
<div class="relative inline-block">
<button class="w-10 h-10 rounded-lg bg-surface-container-lowest hover:bg-surface-container text-on-surface flex items-center justify-center transition-all shadow-sm" type="button" data-demo="more_vert" aria-label="more vert">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</div>
</div>
</div>
<!-- Hero Overview Section (Gallery + Architectural Narrative) -->
<section class="w-full grid grid-cols-1 lg:grid-cols-12 gap-6 mb-8">
<!-- Left Visual Gallery (7 cols) -->
<div class="lg:col-span-7 flex flex-col gap-3">
<!-- Main Cover Photo -->
<div class="relative w-full h-80 md:h-96 rounded-xl overflow-hidden shadow-sm group">
<img alt="Front Entrance and Royal Palms" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="Photorealistic architectural exterior view of a high-end gated residential compound in Riyadh under warm sunset lighting. Symmetrical sandstone facade, grand arched portal entrance, towering royal date palms, pristine manicured hedges, illuminated ambient pathway lights, deep burgundy architectural accents, luxury institutional atmosphere." src="{{ asset('assets/aqar/images/b43c8defda805dcaa8bc.jpg') }}">
<div class="absolute inset-0 bg-gradient-to-t from-inverse-surface/80 via-transparent to-transparent flex items-end p-5">
<div class="flex items-center justify-between w-full">
<div class="flex items-center gap-2 text-inverse-on-surface">
<span class="material-symbols-outlined text-[20px]">photo_camera</span>
<span class="font-label-lg text-label-lg font-semibold">Front Entrance & Royal Palms</span>
</div>
<span class="font-label-sm text-label-sm bg-inverse-surface/60 backdrop-blur-md text-inverse-on-surface px-2.5 py-1 rounded-full">
              Cover Image
            </span>
</div>
</div>
</div>
<!-- Thumbnail Strip -->
<div class="grid grid-cols-3 gap-3">
<div class="relative h-24 rounded-lg overflow-hidden shadow-sm group">
<img alt="Olympic Pool & Clubhouse" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" data-alt="Crystal clear Olympic-size outdoor swimming pool with turquoise water flanked by modern wooden pergolas, comfortable cream lounge chairs, and an elegant stone residential clubhouse in an upscale Riyadh compound." src="{{ asset('assets/aqar/images/7e7ef0a657facf3d76e3.jpg') }}">
<div class="absolute inset-0 bg-inverse-surface/30 group-hover:bg-transparent transition-colors"></div>
<span class="absolute bottom-1.5 left-2 font-label-sm text-label-sm text-on-primary drop-shadow truncate pr-2">Pool & Clubhouse</span>
</div>
<div class="relative h-24 rounded-lg overflow-hidden shadow-sm group">
<img alt="Landscaped Gardens" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" data-alt="Lush pedestrian garden walkway lined with tranquil limestone water fountains, desert flora, bougainvillea, and architectural shade structures inside an exclusive gated community in Saudi Arabia." src="{{ asset('assets/aqar/images/b440841f6b5c2ccce5a2.jpg') }}">
<div class="absolute inset-0 bg-inverse-surface/30 group-hover:bg-transparent transition-colors"></div>
<span class="absolute bottom-1.5 left-2 font-label-sm text-label-sm text-on-primary drop-shadow truncate pr-2">Pedestrian Courtyard</span>
</div>
<div class="relative h-24 rounded-lg overflow-hidden shadow-sm group cursor-pointer" role="button" tabindex="0" data-demo="+11 Photos View Gallery">
<img alt="Resident Fitness Suite" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" data-alt="State-of-the-art residential wellness center and fitness suite with floor-to-ceiling glass windows overlooking greenery, premium matte black equipment, and warm architectural wood cladding." src="{{ asset('assets/aqar/images/595996c73a6198170f1e.jpg') }}">
<div class="absolute inset-0 bg-primary/80 backdrop-blur-xs flex flex-col items-center justify-center text-on-primary p-2 text-center hover:bg-primary-container transition-colors">
<span class="material-symbols-outlined text-[22px]">photo_library</span>
<span class="font-label-md text-label-md font-semibold mt-0.5">+11 Photos</span>
<span class="font-label-sm text-label-sm text-primary-fixed opacity-90">View Gallery</span>
</div>
</div>
</div>
</div>
<!-- Right Property Profile Card (5 cols) -->
<div class="lg:col-span-5 bg-surface-container-lowest p-6 rounded-xl shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between pb-4">
<div class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-secondary"></span>
<span class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant font-medium">Asset Dossier</span>
</div>
<span class="font-label-sm text-label-sm text-secondary bg-surface-container-low px-2.5 py-1 rounded font-mono">
            CADASTRE #449-ZN-B
          </span>
</div>
<h2 class="font-headline-md text-headline-md text-on-surface font-semibold mb-2">Institutional Executive Living</h2>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed mb-6">
          Luxury gated residential community featuring 12 premium units, landscaped central courtyards, resident clubhouse, swimming pool, and dedicated underground parking. Optimized for institutional executive leasing and diplomatic residency.
        </p>
<!-- Spec Key-Values -->
<div class="grid grid-cols-2 gap-y-3.5 gap-x-4 mb-6 pt-4 bg-surface-container-low p-4 rounded-lg">
<div>
<span class="block font-label-sm text-label-sm text-on-surface-variant uppercase">Asset Category</span>
<span class="font-body-md text-body-md font-semibold text-on-surface">Residential Compound</span>
</div>
<div>
<span class="block font-label-sm text-label-sm text-on-surface-variant uppercase">Year Built / Spec</span>
<span class="font-body-md text-body-md font-semibold text-on-surface">2024 (Class A Prime)</span>
</div>
<div>
<span class="block font-label-sm text-label-sm text-on-surface-variant uppercase">Zoning Code</span>
<span class="font-body-md text-body-md font-semibold text-on-surface">Zone B, Plot 449</span>
</div>
<div>
<span class="block font-label-sm text-label-sm text-on-surface-variant uppercase">Access Axis</span>
<span class="font-body-md text-body-md font-semibold text-on-surface">King Abdulaziz Road</span>
</div>
</div>
<!-- Key Amenities Chips -->
<div>
<span class="block font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant mb-2.5 font-medium">Community Infrastructure</span>
<div class="flex flex-wrap gap-2">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-surface-container font-label-sm text-label-sm text-on-surface">
<span class="material-symbols-outlined text-[15px] text-primary">security</span> Gated Security 24/7
            </span>
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-surface-container font-label-sm text-label-sm text-on-surface">
<span class="material-symbols-outlined text-[15px] text-primary">ac_unit</span> Central Chilled Water HVAC
            </span>
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-surface-container font-label-sm text-label-sm text-on-surface">
<span class="material-symbols-outlined text-[15px] text-primary">sensors</span> Smart Access Ready
            </span>
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-surface-container font-label-sm text-label-sm text-on-surface">
<span class="material-symbols-outlined text-[15px] text-primary">pool</span> Clubhouse & Olympic Pool
            </span>
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-surface-container font-label-sm text-label-sm text-on-surface">
<span class="material-symbols-outlined text-[15px] text-primary">park</span> Landscaped Gardens
            </span>
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-surface-container font-label-sm text-label-sm text-on-surface">
<span class="material-symbols-outlined text-[15px] text-primary">garage</span> Underground Parking
            </span>
</div>
</div>
</div>
<div class="mt-6 pt-4 flex items-center justify-between text-on-surface-variant font-label-sm text-label-sm">
<span class="flex items-center gap-1">
<span class="material-symbols-outlined text-[16px] text-outline">verified</span> Registered with Riyadh Municipality
        </span>
<span class="font-mono text-outline">v2.1 Staging</span>
</div>
</div>
</section>
<!-- Summary KPI Cards Row -->
<section class="w-full mb-8">
<div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-4">
<!-- Card 1 -->
<div class="bg-surface-container-lowest p-4 rounded-xl shadow-sm flex flex-col justify-between transition-all hover:shadow-md">
<div class="flex items-center justify-between text-on-surface-variant mb-2">
<span class="font-label-sm text-label-sm uppercase tracking-wider font-medium">Total Planned Units</span>
<div class="w-7 h-7 rounded-md bg-surface-container flex items-center justify-center">
<span class="material-symbols-outlined text-[18px] text-primary">apartment</span>
</div>
</div>
<div>
<span class="font-headline-xl text-headline-xl text-on-surface font-bold leading-none">12</span>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-2">Across Block A, B & Zone C</p>
</div>
</div>
<!-- Card 2 -->
<div class="bg-surface-container-lowest p-4 rounded-xl shadow-sm flex flex-col justify-between transition-all hover:shadow-md">
<div class="flex items-center justify-between text-on-surface-variant mb-2">
<span class="font-label-sm text-label-sm uppercase tracking-wider font-medium">Configured Units</span>
<div class="w-7 h-7 rounded-md bg-surface-container flex items-center justify-center">
<span class="material-symbols-outlined text-[18px] text-secondary">check_circle</span>
</div>
</div>
<div>
<div class="flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl text-primary font-bold leading-none">4</span>
<span class="font-label-sm text-label-sm text-secondary font-medium">33% complete</span>
</div>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-2">Ready for physical staging</p>
</div>
</div>
<!-- Card 3 -->
<div class="bg-surface-container-lowest p-4 rounded-xl shadow-sm flex flex-col justify-between transition-all hover:shadow-md">
<div class="flex items-center justify-between text-on-surface-variant mb-2">
<span class="font-label-sm text-label-sm uppercase tracking-wider font-medium">Pending Setup</span>
<div class="w-7 h-7 rounded-md bg-tertiary-fixed flex items-center justify-center">
<span class="material-symbols-outlined text-[18px] text-tertiary">pending</span>
</div>
</div>
<div>
<span class="font-headline-xl text-headline-xl text-tertiary font-bold leading-none">8</span>
<p class="font-label-sm text-label-sm text-tertiary mt-2">Incomplete • Not bookable</p>
</div>
</div>
<!-- Card 4 -->
<div class="bg-surface-container-lowest p-4 rounded-xl shadow-sm flex flex-col justify-between transition-all hover:shadow-md">
<div class="flex items-center justify-between text-on-surface-variant mb-2">
<span class="font-label-sm text-label-sm uppercase tracking-wider font-medium">Occupied Units</span>
<div class="w-7 h-7 rounded-md bg-surface-container flex items-center justify-center">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">person_off</span>
</div>
</div>
<div>
<span class="font-headline-xl text-headline-xl text-on-surface font-bold leading-none">0</span>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-2">Property newly onboarded</p>
</div>
</div>
<!-- Card 5 -->
<div class="bg-surface-container-lowest p-4 rounded-xl shadow-sm flex flex-col justify-between transition-all hover:shadow-md col-span-2 md:col-span-1">
<div class="flex items-center justify-between text-on-surface-variant mb-2">
<span class="font-label-sm text-label-sm uppercase tracking-wider font-medium">Booking Requests</span>
<div class="w-7 h-7 rounded-md bg-surface-container flex items-center justify-center">
<span class="material-symbols-outlined text-[18px] text-outline">visibility_off</span>
</div>
</div>
<div>
<span class="font-headline-xl text-headline-xl text-on-surface font-bold leading-none">0</span>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-2">Listing unpublished</p>
</div>
</div>
</div>
<div class="mt-2.5 flex items-center gap-1.5 px-1 text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[15px] text-secondary">info</span>
<span>Illustrative figures. Incomplete units are pending setup and not available for booking.</span>
</div>
</section>
<!-- Horizontal Navigation Tab Bar -->
<section class="w-full mb-6">
<div class="flex items-center overflow-x-auto bg-surface-container-lowest p-1.5 rounded-xl shadow-sm gap-1 scrollbar-none">
<button class="flex items-center gap-2 px-4 py-2.5 rounded-lg bg-surface-container text-primary font-label-lg text-label-lg font-semibold whitespace-nowrap shadow-xs" type="button" data-demo="Overview">
<span class="material-symbols-outlined text-[18px]">overview</span>
<span>Overview</span>
</button>
<a class="flex items-center gap-2 px-4 py-2.5 rounded-lg text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high transition-colors font-label-lg text-label-lg whitespace-nowrap" href="{{ route('manager.units') }}">
<span class="material-symbols-outlined text-[18px]">meeting_room</span>
<span>Units</span>
<span class="px-2 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm">4/12</span>
</a>
<button class="flex items-center gap-2 px-4 py-2.5 rounded-lg text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high transition-colors font-label-lg text-label-lg whitespace-nowrap" type="button" data-demo="Ownership & Management">
<span class="material-symbols-outlined text-[18px]">corporate_fare</span>
<span>Ownership & Management</span>
</button>
<a class="flex items-center gap-2 px-4 py-2.5 rounded-lg text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high transition-colors font-label-lg text-label-lg whitespace-nowrap" href="{{ route('manager.bookings') }}">
<span class="material-symbols-outlined text-[18px]">group</span>
<span>Tenants & Bookings</span>
</a>
<a class="flex items-center gap-2 px-4 py-2.5 rounded-lg text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high transition-colors font-label-lg text-label-lg whitespace-nowrap" href="{{ route('manager.contracts') }}">
<span class="material-symbols-outlined text-[18px]">request_quote</span>
<span>Contracts & Payments</span>
</a>
<a class="flex items-center gap-2 px-4 py-2.5 rounded-lg text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high transition-colors font-label-lg text-label-lg whitespace-nowrap" href="{{ route('manager.maintenance') }}">
<span class="material-symbols-outlined text-[18px]">build</span>
<span>Maintenance</span>
</a>
<a class="flex items-center gap-2 px-4 py-2.5 rounded-lg text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high transition-colors font-label-lg text-label-lg whitespace-nowrap" href="{{ route('manager.documents') }}">
<span class="material-symbols-outlined text-[18px]">folder_special</span>
<span>Photos & Documents</span>
<span class="px-2 py-0.5 rounded-full bg-surface-container text-on-surface font-label-sm text-label-sm">18</span>
</a>
<a class="flex items-center gap-2 px-4 py-2.5 rounded-lg text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high transition-colors font-label-lg text-label-lg whitespace-nowrap" href="{{ route('manager.furniture') }}">
<span class="material-symbols-outlined text-[18px]">chair</span>
<span>Furniture Inventory</span>
</a>
</div>
</section>
<!-- Main Content Grid (8 cols Left / 4 cols Right) -->
<div class="w-full grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
<!-- LEFT COLUMN: Deep Operational Sections (8 cols) -->
<div class="lg:col-span-8 flex flex-col gap-8">
<!-- 1. Units Inventory Preview Section -->
<section class="bg-surface-container-lowest rounded-xl p-6 shadow-sm">
<div class="flex flex-col sm:flex-row sm:items-center justify-between pb-5 gap-3">
<div>
<div class="flex items-center gap-2">
<h3 class="font-headline-md text-headline-md text-on-surface font-semibold">Units Inventory Preview</h3>
<span class="px-2.5 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-semibold">4 of 12 Ready</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
              4 configured units ready for rental syndication, 8 units pending detailed configuration.
            </p>
</div>
<div class="flex items-center gap-3">
<button class="px-3.5 py-2 rounded-lg bg-surface-container hover:bg-surface-container-high text-primary font-label-md text-label-md font-semibold transition-colors flex items-center gap-1.5 active:scale-95" type="button" data-demo="Configure Pending">
<span class="material-symbols-outlined text-[18px]">tune</span>
<span>Configure Pending</span>
</button>
<a class="text-secondary hover:text-primary font-label-md text-label-md font-semibold inline-flex items-center gap-1" href="#demo-notice" data-demo="View All 12">
<span>View All 12</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
</div>
<!-- Units Table -->
<div class="overflow-x-auto -mx-6 px-6">
<table class="w-full text-left font-body-sm text-body-sm">
<thead class="bg-surface-container-low text-on-surface-variant font-label-sm text-label-sm uppercase tracking-wider">
<tr>
<th class="py-3 px-4 rounded-l-lg">Unit ID</th>
<th class="py-3 px-4">Type & Block</th>
<th class="py-3 px-4">Specs</th>
<th class="py-3 px-4">Furnishing</th>
<th class="py-3 px-4">Rental Rate</th>
<th class="py-3 px-4">Setup Status</th>
<th class="py-3 px-4">Occupancy</th>
<th class="py-3 px-4 text-right rounded-r-lg">Action</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container">
<!-- Row 1 -->
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-3.5 px-4 font-mono font-bold text-on-surface">A-101</td>
<td class="py-3.5 px-4">
<span class="font-medium text-on-surface block">2BHK Apartment</span>
<span class="text-on-surface-variant font-label-sm text-label-sm">Block A • Level 1</span>
</td>
<td class="py-3.5 px-4 text-on-surface-variant">2 Bed • 2 Bath • 115 m²</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 text-on-surface">
<span class="material-symbols-outlined text-[16px] text-secondary">check</span> Fully Furnished
                  </span>
</td>
<td class="py-3.5 px-4 font-semibold text-on-surface">7,500 <span class="font-normal text-on-surface-variant text-[11px]">SAR/mo</span></td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-surface-container text-secondary font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span> Configured
                  </span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm">
                    Vacant
                  </span>
</td>
<td class="py-3.5 px-4 text-right">
<button class="text-primary hover:text-primary-container font-label-md text-label-md font-semibold px-2 py-1 rounded hover:bg-surface-container" type="button" data-demo="Edit">Edit</button>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-3.5 px-4 font-mono font-bold text-on-surface">A-102</td>
<td class="py-3.5 px-4">
<span class="font-medium text-on-surface block">3BHK Apartment</span>
<span class="text-on-surface-variant font-label-sm text-label-sm">Block A • Level 1</span>
</td>
<td class="py-3.5 px-4 text-on-surface-variant">3 Bed • 3 Bath • 145 m²</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 text-on-surface">
<span class="material-symbols-outlined text-[16px] text-secondary">check</span> Partial Furnished
                  </span>
</td>
<td class="py-3.5 px-4 font-semibold text-on-surface">9,200 <span class="font-normal text-on-surface-variant text-[11px]">SAR/mo</span></td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-surface-container text-secondary font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span> Configured
                  </span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm">
                    Vacant
                  </span>
</td>
<td class="py-3.5 px-4 text-right">
<button class="text-primary hover:text-primary-container font-label-md text-label-md font-semibold px-2 py-1 rounded hover:bg-surface-container" type="button" data-demo="Edit">Edit</button>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-3.5 px-4 font-mono font-bold text-on-surface">B-201</td>
<td class="py-3.5 px-4">
<span class="font-medium text-on-surface block">1BHK Studio</span>
<span class="text-on-surface-variant font-label-sm text-label-sm">Block B • Level 2</span>
</td>
<td class="py-3.5 px-4 text-on-surface-variant">1 Bed • 1.5 Bath • 78 m²</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 text-on-surface">
<span class="material-symbols-outlined text-[16px] text-secondary">check</span> Fully Furnished
                  </span>
</td>
<td class="py-3.5 px-4 font-semibold text-on-surface">5,400 <span class="font-normal text-on-surface-variant text-[11px]">SAR/mo</span></td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-surface-container text-secondary font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span> Configured
                  </span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm">
                    Vacant
                  </span>
</td>
<td class="py-3.5 px-4 text-right">
<button class="text-primary hover:text-primary-container font-label-md text-label-md font-semibold px-2 py-1 rounded hover:bg-surface-container" type="button" data-demo="Edit">Edit</button>
</td>
</tr>
<!-- Row 4 -->
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-3.5 px-4 font-mono font-bold text-on-surface">V-01</td>
<td class="py-3.5 px-4">
<span class="font-medium text-on-surface block">4BHK Villa</span>
<span class="text-on-surface-variant font-label-sm text-label-sm">Zone C • Standalone</span>
</td>
<td class="py-3.5 px-4 text-on-surface-variant">4 Bed • 5 Bath • 380 m²</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 text-on-surface-variant">
<span class="material-symbols-outlined text-[16px] text-outline">horizontal_rule</span> Unfurnished
                  </span>
</td>
<td class="py-3.5 px-4 font-semibold text-on-surface">180,000 <span class="font-normal text-on-surface-variant text-[11px]">SAR/yr</span></td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-surface-container text-secondary font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span> Configured
                  </span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm">
                    Vacant
                  </span>
</td>
<td class="py-3.5 px-4 text-right">
<button class="text-primary hover:text-primary-container font-label-md text-label-md font-semibold px-2 py-1 rounded hover:bg-surface-container" type="button" data-demo="Edit">Edit</button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Table Callout -->
<div class="mt-4 p-3.5 rounded-lg bg-surface-container-low flex items-center justify-between text-on-surface-variant font-body-sm text-body-sm">
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-[18px] text-tertiary">warning</span>
<span><strong class="font-semibold text-on-surface">8 Units Pending Configuration</strong> (B-202 through B-208, V-02). Units pending configuration cannot be leased or booked.</span>
</div>
<button class="text-secondary hover:text-primary font-label-md text-label-md font-medium whitespace-nowrap pl-4" type="button" data-demo="Batch Setup →">
            Batch Setup →
          </button>
</div>
</section>
<!-- 2. Ownership & Management Governance Section -->
<section class="bg-surface-container-lowest rounded-xl p-6 shadow-sm">
<div class="flex items-center justify-between pb-5">
<div>
<h3 class="font-headline-md text-headline-md text-on-surface font-semibold">Ownership & Management Governance</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Corporate mandates, equity allotment, and authorized operational delegations</p>
</div>
<div class="flex items-center gap-3">
<a class="text-secondary hover:text-primary font-label-md text-label-md font-semibold inline-flex items-center gap-1" href="#demo-notice" data-demo="View Agreement">
<span>View Agreement</span>
<span class="material-symbols-outlined text-[16px]">open_in_new</span>
</a>
<button class="px-3 py-1.5 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md font-medium transition-colors" type="button" data-demo="Manage Permissions">
              Manage Permissions
            </button>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
<!-- Owner Box -->
<div class="p-4 rounded-xl bg-surface-container-low flex flex-col justify-between">
<div>
<div class="flex items-center justify-between text-on-surface-variant mb-2">
<span class="font-label-sm text-label-sm uppercase tracking-wider font-medium">Freehold Titleholder</span>
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface font-label-sm text-label-sm font-semibold">100.0% Equity</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Muqrin Real Estate Holdings Ltd.</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">CR Number: 1010489201 • Riyadh Commercial Register</p>
</div>
<div class="mt-4 pt-3 flex items-center justify-between text-on-surface-variant font-label-sm text-label-sm">
<span>Multi-owner equity structures supported</span>
<span class="text-secondary font-medium">Verified Deed</span>
</div>
</div>
<!-- Manager Box -->
<div class="p-4 rounded-xl bg-surface-container-low flex flex-col justify-between">
<div>
<div class="flex items-center justify-between text-on-surface-variant mb-2">
<span class="font-label-sm text-label-sm uppercase tracking-wider font-medium">Assigned Property Manager</span>
<span class="px-2 py-0.5 rounded bg-primary-fixed text-on-primary-fixed font-label-sm text-label-sm font-semibold">8.5% Fee</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Eng. Sultan Al-Shammari</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Management Model: Full Operational Execution • Internal Operator</p>
</div>
<div class="mt-4 pt-3 flex items-center justify-between text-on-surface-variant font-label-sm text-label-sm">
<span>Mandate: Gross Collected Rent Basis</span>
<span class="text-secondary font-medium">Active Mandate</span>
</div>
</div>
</div>
<!-- Agreement Metadata Bar -->
<div class="p-4 rounded-lg bg-surface-container flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-5">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-primary-container text-on-primary flex items-center justify-center">
<span class="material-symbols-outlined text-[22px]">picture_as_pdf</span>
</div>
<div>
<span class="font-body-md text-body-md font-semibold text-on-surface block">Yasmin-Compound-Management-Agreement-2026.pdf</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Code: AGR-2026-YAS-003 • Term: Mar 1, 2026 – Feb 28, 2029 (3 Years) • 4.2 MB</span>
</div>
</div>
<button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container-lowest hover:bg-surface-container-high text-on-surface font-label-md text-label-md font-medium shadow-xs self-start sm:self-auto" type="button" data-demo="Download">
<span class="material-symbols-outlined text-[16px]">download</span>
<span>Download</span>
</button>
</div>
<!-- Delegated Permissions Chips -->
<div>
<span class="block font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant mb-2 font-medium">Delegated Manager Permissions</span>
<div class="flex flex-wrap gap-2">
<span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface">
<span class="material-symbols-outlined text-[16px] text-secondary">verified_user</span> Tenant Screening & Leasing
            </span>
<span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface">
<span class="material-symbols-outlined text-[16px] text-secondary">handyman</span> Maintenance Dispatch (&lt; 10,000 SAR)
            </span>
<span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface">
<span class="material-symbols-outlined text-[16px] text-secondary">receipt_long</span> Offline Payment Verifications
            </span>
<span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface">
<span class="material-symbols-outlined text-[16px] text-secondary">fact_check</span> Inspection Audits & Sign-off
            </span>
</div>
</div>
</section>
<!-- 3. Bookings & Rental Operations (Phase 1) Section -->
<section class="bg-surface-container-lowest rounded-xl p-6 shadow-sm">
<div class="pb-4">
<div class="flex items-center justify-between">
<h3 class="font-headline-md text-headline-md text-on-surface font-semibold">Bookings & Rental Operations</h3>
<span class="px-2.5 py-1 rounded bg-surface-container font-label-sm text-label-sm text-on-surface-variant font-mono">
              PHASE 1: REQUEST-TO-BOOK
            </span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Leasing workflow status, incoming residency inquiries, and onboarding queue</p>
</div>
<!-- Policy Banner -->
<div class="mb-5 p-3.5 rounded-lg bg-surface-container-low flex items-center gap-3 text-on-surface">
<div class="w-8 h-8 rounded-full bg-secondary-container text-on-secondary-container flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[18px]">lock</span>
</div>
<p class="font-body-sm text-body-sm leading-snug">
<strong>Restricted Booking Protocol:</strong> All bookings require manual Property Manager verification and executive approval. Instant booking is disabled for this property.
          </p>
</div>
<!-- 4 Operational Metrics / Clean Empty States -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<!-- Tile 1 -->
<div class="p-4 rounded-xl bg-surface-container-low flex flex-col justify-between">
<div class="flex items-center justify-between mb-3">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-medium">Inquiries Awaiting Review</span>
<span class="material-symbols-outlined text-[20px] text-outline">mark_email_unread</span>
</div>
<div>
<span class="font-headline-lg text-headline-lg font-bold text-on-surface">0 Requests</span>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1.5">No pending inquiries. Property is currently unpublished.</p>
</div>
</div>
<!-- Tile 2 -->
<div class="p-4 rounded-xl bg-surface-container-low flex flex-col justify-between">
<div class="flex items-center justify-between mb-3">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-medium">Upcoming Move-Ins</span>
<span class="material-symbols-outlined text-[20px] text-outline">calendar_month</span>
</div>
<div>
<span class="font-headline-lg text-headline-lg font-bold text-on-surface">0 Scheduled</span>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1.5">No active leases commencing this calendar month.</p>
</div>
</div>
<!-- Tile 3 -->
<div class="p-4 rounded-xl bg-surface-container-low flex flex-col justify-between">
<div class="flex items-center justify-between mb-3">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-medium">Active Tenancies</span>
<span class="material-symbols-outlined text-[20px] text-outline">person</span>
</div>
<div>
<span class="font-headline-lg text-headline-lg font-bold text-on-surface">0 Tenants</span>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1.5">Zero occupied units across all 12 compound plots.</p>
</div>
</div>
<!-- Tile 4 -->
<div class="p-4 rounded-xl bg-surface-container-low flex flex-col justify-between">
<div class="flex items-center justify-between mb-3">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-medium">Offline Payment Queue</span>
<span class="material-symbols-outlined text-[20px] text-outline">payments</span>
</div>
<div>
<span class="font-headline-lg text-headline-lg font-bold text-on-surface">0 Invoices</span>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1.5">Manual bank transfers & checks will appear here for verification.</p>
</div>
</div>
</div>
</section>
<!-- 4. Maintenance & Property Inspections Section -->
<section class="bg-surface-container-lowest rounded-xl p-6 shadow-sm">
<div class="flex items-center justify-between pb-5">
<div>
<h3 class="font-headline-md text-headline-md text-on-surface font-semibold">Maintenance & Property Inspections</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Asset health checkpoints, MEP readiness, and scheduled turnover inspections</p>
</div>
<a class="text-secondary hover:text-primary font-label-md text-label-md font-semibold inline-flex items-center gap-1" href="#demo-notice" data-demo="View All">
<span>View All</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
<!-- Maintenance Status -->
<div class="p-4 rounded-xl bg-surface-container-low">
<div class="flex items-center justify-between mb-2">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-medium">Active Maintenance</span>
<span class="px-2 py-0.5 rounded-full bg-surface-container text-secondary font-label-sm text-label-sm font-semibold">All Clear</span>
</div>
<div class="flex items-baseline gap-2">
<span class="font-headline-lg text-headline-lg font-bold text-on-surface">0 Tickets</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2">All facilities operating normally. HVAC chilled loop pre-commissioned March 14.</p>
</div>
<!-- Scheduled Inspections -->
<div class="p-4 rounded-xl bg-surface-container-low">
<div class="flex items-center justify-between mb-2">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-medium">Scheduled Audit</span>
<span class="px-2 py-0.5 rounded-full bg-tertiary-fixed text-tertiary font-label-sm text-label-sm font-semibold">In 14 Days</span>
</div>
<div class="flex items-baseline gap-2">
<span class="font-headline-lg text-headline-lg font-bold text-tertiary">1 Upcoming</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2">Routine Pre-Handover Quality Check on April 2, 2026 by Eng. Sultan.</p>
</div>
<!-- Digital Condition Reports -->
<div class="p-4 rounded-xl bg-surface-container-low">
<div class="flex items-center justify-between mb-2">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-medium">Check-In Condition Logs</span>
<span class="material-symbols-outlined text-[18px] text-outline">fact_check</span>
</div>
<span class="font-headline-lg text-headline-lg font-bold text-on-surface">0 Active</span>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2">Supports digital photo logs, room damage notes, and key signatures upon move-in.</p>
</div>
<!-- Check-out Reports -->
<div class="p-4 rounded-xl bg-surface-container-low">
<div class="flex items-center justify-between mb-2">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-medium">Check-Out Protocols</span>
<span class="material-symbols-outlined text-[18px] text-outline">task_alt</span>
</div>
<span class="font-headline-lg text-headline-lg font-bold text-on-surface">0 Completed</span>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2">Historical security deposit settlement and damage assessment archives.</p>
</div>
</div>
</section>
<!-- 5. Media, Floor Plans & Documents Summary Section -->
<section class="bg-surface-container-lowest rounded-xl p-6 shadow-sm">
<div class="flex items-center justify-between pb-5">
<div>
<h3 class="font-headline-md text-headline-md text-on-surface font-semibold">Photos, Schematics & Compliance Documents</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Central repository for architectural blueprints, municipal permits, and visual assets</p>
</div>
<a class="text-secondary hover:text-primary font-label-md text-label-md font-semibold inline-flex items-center gap-1" href="#demo-notice" data-demo="View All Documents">
<span>View All Documents</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
<!-- Card 1 -->
<div class="p-4 rounded-xl bg-surface-container-low flex flex-col justify-between">
<div>
<div class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-primary mb-3">
<span class="material-symbols-outlined text-[20px]">photo_library</span>
</div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-medium block">Property Photos</span>
<span class="font-headline-sm text-headline-sm font-bold text-on-surface mt-1 block">14 Staged</span>
</div>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-3">6 compound exterior, 8 unit interior captures</p>
</div>
<!-- Card 2 -->
<div class="p-4 rounded-xl bg-surface-container-low flex flex-col justify-between">
<div>
<div class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-primary mb-3">
<span class="material-symbols-outlined text-[20px]">architecture</span>
</div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-medium block">Floor Plans</span>
<span class="font-headline-sm text-headline-sm font-bold text-on-surface mt-1 block">2 Attached</span>
</div>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-3">1 Site Plan DWG/PDF • 1 Unit Blueprint</p>
</div>
<!-- Card 3 -->
<div class="p-4 rounded-xl bg-surface-container-low flex flex-col justify-between">
<div>
<div class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-primary mb-3">
<span class="material-symbols-outlined text-[20px]">verified</span>
</div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-medium block">Legal Files</span>
<span class="font-headline-sm text-headline-sm font-bold text-on-surface mt-1 block">4 Verified</span>
</div>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-3">Title Deed, Hazard Insurance, Zoning clearance</p>
</div>
<!-- Card 4 -->
<div class="p-4 rounded-xl bg-surface-container-low flex flex-col justify-between">
<div>
<div class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-secondary mb-3">
<span class="material-symbols-outlined text-[20px]">lock</span>
</div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-medium block">Access Control</span>
<span class="font-headline-sm text-headline-sm font-bold text-on-surface mt-1 block">Private Only</span>
</div>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-3">Restricted to Manager and Owner accounts</p>
</div>
</div>
</section>
</div>
<!-- RIGHT COLUMN: Sticky Property Information & Setup Guide (4 cols) -->
<div class="lg:col-span-4 flex flex-col gap-6 sticky top-20">
<!-- Sticky Property Snapshot Card -->
<div class="bg-surface-container-lowest rounded-xl p-6 shadow-sm">
<div class="flex items-center justify-between pb-4">
<h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Property Governance Status</h3>
<span class="material-symbols-outlined text-[18px] text-outline">shield</span>
</div>
<!-- Unpublished Notice Card -->
<div class="p-4 rounded-xl bg-tertiary-fixed text-tertiary mb-5">
<div class="flex items-center gap-2 mb-1.5">
<span class="material-symbols-outlined text-[20px]">visibility_off</span>
<span class="font-label-lg text-label-lg font-bold">Draft • Unpublished</span>
</div>
<p class="font-body-sm text-body-sm opacity-90 leading-relaxed">
            This asset is invisible on public syndication feeds and external tenant search channels.
          </p>
</div>
<!-- Setup Progress Bar -->
<div class="mb-5 pb-5">
<div class="flex items-center justify-between font-label-md text-label-md mb-2">
<span class="text-on-surface font-semibold">Unit Setup Completion</span>
<span class="font-mono text-primary font-bold">4 / 12 (33%)</span>
</div>
<div class="w-full h-2 rounded-full bg-surface-container-high overflow-hidden">
<div class="h-full bg-primary rounded-full transition-all duration-500" style="width: 33.3%;"></div>
</div>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-2">
            Configure the 8 pending units to unlock single-click public syndication.
          </p>
</div>
<!-- Detailed Key Attributes List -->
<div class="space-y-3 font-body-sm text-body-sm pb-6">
<div class="flex justify-between items-center py-1">
<span class="text-on-surface-variant">Reference Code</span>
<span class="font-mono font-semibold text-on-surface">PRP-RYD-2026-0089</span>
</div>
<div class="flex justify-between items-center py-1">
<span class="text-on-surface-variant">Location</span>
<span class="font-medium text-on-surface">Riyadh, KSA</span>
</div>
<div class="flex justify-between items-center py-1">
<span class="text-on-surface-variant">Property Type</span>
<span class="font-medium text-on-surface">Residential Compound</span>
</div>
<div class="flex justify-between items-center py-1">
<span class="text-on-surface-variant">Owner Entity</span>
<span class="font-medium text-on-surface text-right truncate max-w-[170px]" title="Muqrin Real Estate Holdings Ltd.">Muqrin Real Estate</span>
</div>
<div class="flex justify-between items-center py-1">
<span class="text-on-surface-variant">Manager Lead</span>
<span class="font-medium text-on-surface text-right">Eng. Sultan Al-Shammari</span>
</div>
<div class="flex justify-between items-center py-1">
<span class="text-on-surface-variant">Booking Policy</span>
<span class="font-medium text-primary">Request to Book Only</span>
</div>
<div class="flex justify-between items-center py-1">
<span class="text-on-surface-variant">External Visibility</span>
<span class="font-medium text-outline">Private • Not Indexed</span>
</div>
</div>
<!-- Sticky Action Suite -->
<div class="flex flex-col gap-2.5 pt-2">
<button class="w-full py-3 px-4 rounded-lg bg-primary hover:bg-primary-container text-on-primary font-label-lg text-label-lg font-semibold shadow-sm transition-all text-center flex items-center justify-center gap-2 active:scale-95" type="button" data-demo="Complete Unit Setup">
<span class="material-symbols-outlined text-[18px]">add_circle</span>
<span>Complete Unit Setup</span>
</button>
<button class="w-full py-3 px-4 rounded-lg bg-surface-container text-on-surface-variant/50 font-label-lg text-label-lg font-medium cursor-not-allowed text-center flex items-center justify-center gap-2" disabled="" type="button" data-demo="Publish Property Listing">
<span class="material-symbols-outlined text-[18px]">cloud_upload</span>
<span>Publish Property Listing</span>
</button>
<span class="text-center font-label-sm text-label-sm text-on-surface-variant px-2">
            Publishing is available once remaining 8 units are configured or marked inactive.
          </span>
</div>
</div>
<!-- Quick Activity & Audit Trail Card -->
<div class="bg-surface-container-lowest rounded-xl p-6 shadow-sm">
<div class="flex items-center justify-between pb-4">
<h4 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Audit & Change Log</h4>
<span class="font-label-sm text-label-sm text-secondary font-medium">Auto-logged</span>
</div>
<div class="relative pl-5 space-y-4">
<!-- Timeline line -->
<div class="absolute left-2 top-2 bottom-2 w-0.5 bg-surface-container-high"></div>
<!-- Event 1 -->
<div class="relative">
<div class="absolute -left-5 top-1 w-2.5 h-2.5 rounded-full bg-primary ring-4 ring-surface-container-lowest"></div>
<div class="flex flex-col">
<span class="font-body-sm text-body-sm font-semibold text-on-surface">4 initial units configured</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">A-101, A-102, B-201, V-01 specs created</span>
<span class="font-label-sm text-label-sm text-outline mt-0.5">March 18, 2026 • 14:40 AST</span>
</div>
</div>
<!-- Event 2 -->
<div class="relative">
<div class="absolute -left-5 top-1 w-2.5 h-2.5 rounded-full bg-secondary ring-4 ring-surface-container-lowest"></div>
<div class="flex flex-col">
<span class="font-body-sm text-body-sm font-semibold text-on-surface">Management Mandate Linked</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Agreement AGR-2026-YAS-003 registered</span>
<span class="font-label-sm text-label-sm text-outline mt-0.5">March 18, 2026 • 11:15 AST</span>
</div>
</div>
<!-- Event 3 -->
<div class="relative">
<div class="absolute -left-5 top-1 w-2.5 h-2.5 rounded-full bg-outline ring-4 ring-surface-container-lowest"></div>
<div class="flex flex-col">
<span class="font-body-sm text-body-sm font-semibold text-on-surface">Property record initialized</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Created and saved by Eng. Sultan Al-Shammari</span>
<span class="font-label-sm text-label-sm text-outline mt-0.5">March 18, 2026 • 09:30 AST</span>
</div>
</div>
</div>
<div class="mt-5 pt-4 text-center">
<a class="text-secondary hover:text-primary font-label-md text-label-md font-semibold inline-flex items-center gap-1" href="#demo-notice" data-demo="View Full Audit Trail">
<span>View Full Audit Trail</span>
<span class="material-symbols-outlined text-[16px]">history</span>
</a>
</div>
</div>
<!-- Compliance & Notice Badge -->
<div class="p-4 rounded-xl bg-surface-container flex items-start gap-3">
<span class="material-symbols-outlined text-secondary text-[20px] mt-0.5">shield_with_heart</span>
<div>
<span class="font-label-md text-label-md font-semibold text-on-surface block">Wafi / Ejar Regulatory Sync</span>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5 leading-relaxed">
            Data models compliant with Saudi Real Estate General Authority standards. Unified contracts require Ejar portal synchronization upon tenant reservation.
          </p>
</div>
</div>
</div>
</div>
<!-- Operational Footer Disclaimer -->
<footer class="w-full mt-12 pt-6 flex flex-col sm:flex-row items-center justify-between text-on-surface-variant font-label-sm text-label-sm gap-2">
<div class="flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-secondary"></span>
<span>Majlis Enterprise Property OS • Institutional Staging Pipeline</span>
</div>
<div class="text-outline">
      Demonstrational UI layout for developer handoff • KSA Real Estate Portal Architecture
    </div>
</footer>
</div>
@endsection
