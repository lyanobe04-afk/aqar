{{-- Imported from client_demo/screens/unit_details/code.html; static demonstration data. --}}
@extends('layouts.manager')
@section('content')
<div class="flex flex-col w-full pb-16">
<!-- PAGE HEADER & BREADCRUMB -->
<div class="flex flex-col gap-4 mb-6">
<!-- Breadcrumb -->
<div class="flex items-center gap-2 font-label-md text-label-md text-on-surface-variant">
<a class="hover:text-primary transition-colors flex items-center gap-1" href="{{ route('manager.units') }}">
<span class="material-symbols-outlined text-[16px]">grid_view</span>
<span>Units</span>
</a>
<span class="text-outline-variant">/</span>
<a class="hover:text-primary transition-colors" href="{{ route('manager.property-details') }}">Al-Yasmin Compound II</a>
<span class="text-outline-variant">/</span>
<span class="text-on-surface font-semibold">A-101</span>
</div>
<!-- Title & Top Actions -->
<div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
<div class="flex flex-col gap-1.5">
<div class="flex items-center flex-wrap gap-3">
<h1 class="font-headline-xl text-headline-xl text-on-surface tracking-tight">Unit A-101</h1>
<!-- Governance Badges -->
<div class="flex items-center flex-wrap gap-2">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-[#EBF6F0] text-[#2E7D32] font-label-sm text-label-sm">
<span class="w-1.5 h-1.5 rounded-full bg-[#2E7D32]"></span>
              Configured
            </span>
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-[#F0F4F8] text-[#364E68] font-label-sm text-label-sm">
<span class="w-1.5 h-1.5 rounded-full bg-[#364E68]"></span>
              Vacant
            </span>
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-[#EBF6F0] text-[#2E7D32] font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[14px]">check_circle</span>
              Maintenance Clear
            </span>
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-[#FFFAEB] text-[#D35400] font-label-sm text-label-sm">
<span class="w-1.5 h-1.5 rounded-full bg-[#D35400]"></span>
              Not Published
            </span>
</div>
</div>
<p class="font-body-md text-body-md text-on-surface-variant flex items-center gap-2">
<span>2-Bedroom Apartment</span>
<span class="text-outline-variant">•</span>
<span>Block A</span>
<span class="text-outline-variant">•</span>
<span>Level 1</span>
<span class="text-outline-variant">•</span>
<span class="text-primary font-medium">Al-Yasmin Compound II</span>
<span class="text-outline-variant">•</span>
<span class="font-mono text-body-sm text-outline">PRP-RYD-2026-0089</span>
</p>
</div>
<!-- Action Button Group -->
<div class="flex items-center gap-3">
<a class="px-4 py-2 rounded-lg bg-surface-container-lowest text-on-surface hover:bg-surface-container font-label-lg text-label-lg shadow-sm flex items-center gap-2 transition-all" href="{{ route('manager.units') }}">
<span class="material-symbols-outlined text-[18px]">arrow_back</span>
<span>Back to Units</span>
</a>
<button class="px-4 py-2 rounded-lg bg-surface-container-lowest text-on-surface hover:bg-surface-container font-label-lg text-label-lg shadow-sm flex items-center gap-2 transition-all" type="button" data-demo="Edit Unit">
<span class="material-symbols-outlined text-[18px]">edit</span>
<span>Edit Unit</span>
</button>
<div class="relative group">
<button class="px-3 py-2 rounded-lg bg-surface-container-lowest text-on-surface hover:bg-surface-container font-label-lg text-label-lg shadow-sm flex items-center gap-1.5 transition-all" type="button" data-demo="More Actions">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
<span>More Actions</span>
<span class="material-symbols-outlined text-[16px]">expand_more</span>
</button>
<div class="hidden group-hover:flex flex-col absolute right-0 top-full mt-1.5 w-52 bg-surface-container-lowest rounded-xl shadow-xl p-1.5 z-30">
<a class="flex items-center gap-2.5 px-3 py-2 text-on-surface font-label-md text-label-md rounded-lg hover:bg-surface-container transition-colors" href="#demo-notice" data-demo="Duplicate Unit Blueprint">
<span class="material-symbols-outlined text-[18px] text-outline">content_copy</span>
<span>Duplicate Unit Blueprint</span>
</a>
<a class="flex items-center gap-2.5 px-3 py-2 text-on-surface font-label-md text-label-md rounded-lg hover:bg-surface-container transition-colors" href="#demo-notice" data-demo="Export Spec Sheet">
<span class="material-symbols-outlined text-[18px] text-outline">picture_as_pdf</span>
<span>Export Spec Sheet</span>
</a>
<div class="h-px bg-surface-container my-1"></div>
<a class="flex items-center gap-2.5 px-3 py-2 text-error font-label-md text-label-md rounded-lg hover:bg-error-container/40 transition-colors" href="#demo-notice" data-demo="Disable Unit Record">
<span class="material-symbols-outlined text-[18px]">block</span>
<span>Disable Unit Record</span>
</a>
</div>
</div>
</div>
</div>
<!-- Publishing Governance Advisory Banner -->
<div class="w-full bg-[#FFF9F2] rounded-xl p-3.5 flex items-start gap-3 shadow-sm">
<span class="material-symbols-outlined text-[#D35400] text-[20px] mt-0.5">info</span>
<div class="flex-1 flex flex-col sm:flex-row sm:items-center justify-between gap-2">
<p class="font-body-sm text-body-sm text-[#7A3E00]">
<span class="font-semibold text-[#5F3000]">Unit Listing Restricted:</span> This unit cannot accept bookings or public reservations because parent property <strong>Al-Yasmin Compound II</strong> is currently in draft (Unpublished) status.
        </p>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-[#934D00] px-2 py-0.5 bg-[#FFEACC] rounded whitespace-nowrap self-start sm:self-auto font-semibold">Institutional Governance</span>
</div>
</div>
</div>
<!-- SECTION 2: UNIT GALLERY & VISUAL ASSETS -->
<div class="w-full bg-surface-container-lowest rounded-xl p-3 shadow-sm mb-6 flex flex-col gap-2.5">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-3 h-[420px]">
<!-- Main Hero living Room -->
<div class="lg:col-span-8 relative rounded-lg overflow-hidden group h-full">
<img alt="Living Room Unit A-101" class="w-full h-full object-cover group-hover:scale-[1.01] transition-transform duration-500" src="{{ asset('assets/aqar/images/f51d0c2ac2f3ec473efd.jpg') }}">
<div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/10 pointer-events-none"></div>
<div class="absolute bottom-3 left-3 flex items-center gap-2">
<span class="px-3 py-1 rounded-full bg-black/60 backdrop-blur-md text-surface font-label-sm text-label-sm flex items-center gap-1.5 shadow-sm">
<span class="material-symbols-outlined text-[15px] text-primary-fixed">living</span>
<span>Living & Lounge Area (Master Suite Wing)</span>
</span>
<span class="px-2 py-1 rounded bg-black/40 backdrop-blur-md text-surface/90 font-mono text-[11px]">Primary Asset</span>
</div>
<div class="absolute top-3 right-3 flex items-center gap-2">
<button class="px-3 py-1.5 rounded-lg bg-surface-container-lowest/90 backdrop-blur-md text-on-surface hover:bg-surface-container-lowest font-label-sm text-label-sm shadow-md flex items-center gap-1.5 transition-all" type="button" data-demo="View All Photos (8)">
<span class="material-symbols-outlined text-[16px] text-primary">photo_camera</span>
<span>View All Photos (8)</span>
</button>
</div>
</div>
<!-- 3-Image Vertical Stack -->
<div class="lg:col-span-4 grid grid-rows-3 gap-2.5 h-full">
<!-- Master Bedroom -->
<div class="relative rounded-lg overflow-hidden group">
<img alt="Master Bedroom" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ asset('assets/aqar/images/9faa270940802bc335f0.jpg') }}">
<div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent pointer-events-none"></div>
<div class="absolute bottom-2 left-2 flex items-center gap-1.5">
<span class="px-2 py-0.5 rounded bg-black/60 backdrop-blur-sm text-surface font-label-sm text-[11px]">Master Bedroom</span>
</div>
</div>
<!-- Kitchen -->
<div class="relative rounded-lg overflow-hidden group">
<img alt="Kitchen" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ asset('assets/aqar/images/aca83e1d5a9a935158ab.jpg') }}">
<div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent pointer-events-none"></div>
<div class="absolute bottom-2 left-2 flex items-center gap-1.5">
<span class="px-2 py-0.5 rounded bg-black/60 backdrop-blur-sm text-surface font-label-sm text-[11px]">Open Kitchen</span>
</div>
</div>
<!-- Balcony Terrace with interactive Blueprint trigger -->
<div class="relative rounded-lg overflow-hidden group">
<img alt="Balcony Terrace" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ asset('assets/aqar/images/a9b46f798c373a676d76.jpg') }}">
<div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent pointer-events-none"></div>
<div class="absolute bottom-2 left-2 flex items-center gap-1.5">
<span class="px-2 py-0.5 rounded bg-black/60 backdrop-blur-sm text-surface font-label-sm text-[11px]">Private Balcony Terrace</span>
</div>
<div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 bg-primary/30 backdrop-blur-[2px] transition-all">
<button class="px-3 py-1.5 rounded-lg bg-surface-container-lowest text-primary font-label-sm text-label-sm shadow-lg flex items-center gap-1.5" type="button" data-demo="Floor Plan Schematic">
<span class="material-symbols-outlined text-[16px]">floor</span>
<span>Floor Plan Schematic</span>
</button>
</div>
</div>
</div>
</div>
<!-- Legal Photographic Disclaimer -->
<div class="flex items-center justify-between px-2 pt-1 font-body-sm text-body-sm text-outline">
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-outline">lock</span>
<span>Photos are illustrative and private until property is published and appropriate listing permissions are granted.</span>
</div>
<span class="font-mono text-[11px] text-on-surface-variant">Arch-ID: PH-A101-RYD</span>
</div>
</div>
<!-- SECTION 3: UNIT SUMMARY KPI CARDS (ROW OF 5) -->
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3.5 mb-6">
<!-- Bedrooms -->
<div class="bg-surface-container-lowest rounded-xl p-4 shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between mb-2">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">Bedrooms</span>
<div class="w-7 h-7 rounded-lg bg-surface-container flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[18px]">bed</span>
</div>
</div>
<div class="flex items-baseline gap-1.5">
<span class="font-headline-lg text-headline-lg font-bold text-on-surface">2</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">En-suite Master + Guest</span>
</div>
</div>
<!-- Bathrooms -->
<div class="bg-surface-container-lowest rounded-xl p-4 shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between mb-2">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">Bathrooms</span>
<div class="w-7 h-7 rounded-lg bg-surface-container flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[18px]">bathtub</span>
</div>
</div>
<div class="flex items-baseline gap-1.5">
<span class="font-headline-lg text-headline-lg font-bold text-on-surface">2</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Full Bathrooms</span>
</div>
</div>
<!-- Area -->
<div class="bg-surface-container-lowest rounded-xl p-4 shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between mb-2">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">Usable Area</span>
<div class="w-7 h-7 rounded-lg bg-surface-container flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[18px]">square_foot</span>
</div>
</div>
<div class="flex items-baseline gap-1.5">
<span class="font-headline-lg text-headline-lg font-bold text-on-surface">115</span>
<span class="font-label-md text-label-md text-on-surface-variant">m² Net</span>
</div>
</div>
<!-- Furnishing -->
<div class="bg-surface-container-lowest rounded-xl p-4 shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between mb-2">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">Furnishing</span>
<div class="w-7 h-7 rounded-lg bg-surface-container flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[18px]">chair</span>
</div>
</div>
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm font-semibold text-on-surface leading-tight">Fully Furnished</span>
<span class="font-label-sm text-[11px] text-outline">Turnkey Standard</span>
</div>
</div>
<!-- Monthly Rent -->
<div class="col-span-2 sm:col-span-1 bg-surface-container-lowest rounded-xl p-4 shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between mb-2">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">Target Rent</span>
<div class="w-7 h-7 rounded-lg bg-primary-container/10 flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[18px]">payments</span>
</div>
</div>
<div class="flex flex-col">
<div class="flex items-baseline gap-1">
<span class="font-headline-lg text-headline-lg font-bold text-primary font-mono">SAR 7,500</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">/mo</span>
</div>
<span class="font-label-sm text-[11px] text-on-surface-variant">Illustrative pricing model</span>
</div>
</div>
</div>
<!-- SECTION 4: HORIZONTAL TAB NAVIGATION -->
<div class="w-full bg-surface-container-lowest rounded-xl shadow-sm px-4 pt-1 mb-6">
<div class="flex items-center gap-1 overflow-x-auto" id="unitTabNav">
<button class="px-4 py-3 font-label-lg text-label-lg font-semibold text-primary border-b-2 border-primary flex items-center gap-2 transition-colors whitespace-nowrap" data-demo="Overview" type="button">
<span class="material-symbols-outlined text-[18px]">overview</span>
<span>Overview</span>
</button>
<button class="px-4 py-3 font-label-lg text-label-lg font-medium text-on-surface-variant hover:text-on-surface hover:bg-surface-container-low rounded-t-lg flex items-center gap-2 transition-colors whitespace-nowrap" data-demo="Pricing & Availability" type="button">
<span class="material-symbols-outlined text-[18px]">price_change</span>
<span>Pricing & Availability</span>
</button>
<a class="px-4 py-3 font-label-lg text-label-lg font-medium text-on-surface-variant hover:text-on-surface hover:bg-surface-container-low rounded-t-lg flex items-center gap-2 transition-colors whitespace-nowrap" href="{{ route('manager.bookings') }}">
<span class="material-symbols-outlined text-[18px]">group</span>
<span>Bookings & Tenancy</span>
</a>
<a class="px-4 py-3 font-label-lg text-label-lg font-medium text-on-surface-variant hover:text-on-surface hover:bg-surface-container-low rounded-t-lg flex items-center gap-2 transition-colors whitespace-nowrap" href="{{ route('manager.maintenance') }}">
<span class="material-symbols-outlined text-[18px]">build</span>
<span>Maintenance</span>
</a>
<a class="px-4 py-3 font-label-lg text-label-lg font-medium text-on-surface-variant hover:text-on-surface hover:bg-surface-container-low rounded-t-lg flex items-center gap-2 transition-colors whitespace-nowrap" href="{{ route('manager.furniture') }}">
<span class="material-symbols-outlined text-[18px]">inventory_2</span>
<span>Furniture Inventory</span>
</a>
<button class="px-4 py-3 font-label-lg text-label-lg font-medium text-on-surface-variant hover:text-on-surface hover:bg-surface-container-low rounded-t-lg flex items-center gap-2 transition-colors whitespace-nowrap" data-demo="Condition Inspections" type="button">
<span class="material-symbols-outlined text-[18px]">fact_check</span>
<span>Condition Inspections</span>
</button>
<a class="px-4 py-3 font-label-lg text-label-lg font-medium text-on-surface-variant hover:text-on-surface hover:bg-surface-container-low rounded-t-lg flex items-center gap-2 transition-colors whitespace-nowrap" href="{{ route('manager.documents') }}">
<span class="material-symbols-outlined text-[18px]">folder</span>
<span>Photos & Documents</span>
</a>
</div>
</div>
<!-- SECTION 5: TWO-COLUMN WORKSPACE -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
<!-- LEFT MAIN COLUMN (approx 68% -> col-span-8) -->
<div class="lg:col-span-8 flex flex-col gap-6">
<!-- SUBSECTION A: Unit Overview & Specifications -->
<div class="bg-surface-container-lowest rounded-xl p-6 shadow-sm flex flex-col gap-5">
<div class="flex items-center justify-between pb-3 border-b-0">
<div class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[20px]">tune</span>
</div>
<div>
<h2 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Unit Specifications & Structural Data</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Permanent registry parameters and cadastral association</p>
</div>
</div>
<button class="px-3 py-1.5 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-sm text-label-sm flex items-center gap-1.5 transition-colors" type="button" data-demo="Edit Specs">
<span class="material-symbols-outlined text-[16px]">edit</span>
<span>Edit Specs</span>
</button>
</div>
<!-- 3-Column Spec Matrix -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 p-4 rounded-xl bg-surface-container-low">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Unit Identifier</span>
<span class="font-label-lg text-label-lg font-semibold text-on-surface font-mono">A-101</span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Parent Property</span>
<span class="font-label-lg text-label-lg font-semibold text-primary">Al-Yasmin Compound II</span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Registry Code</span>
<span class="font-label-lg text-label-lg font-mono text-on-surface">PRP-RYD-2026-0089</span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Jurisdiction</span>
<span class="font-label-lg text-label-lg text-on-surface">Riyadh, Saudi Arabia</span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Block / Sector</span>
<span class="font-label-lg text-label-lg text-on-surface">Block A (North)</span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Floor Level</span>
<span class="font-label-lg text-label-lg text-on-surface">Level 1 (Elevator Access)</span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Architectural Typology</span>
<span class="font-label-lg text-label-lg text-on-surface">Residential Apartment</span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Bedrooms & Baths</span>
<span class="font-label-lg text-label-lg text-on-surface">2 Bed • 2 Full Baths</span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Total Gross Area</span>
<span class="font-label-lg text-label-lg text-on-surface">115 m² (1,237 sq ft)</span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Furnishing Package</span>
<span class="font-label-lg text-label-lg text-on-surface">Executive Modern</span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Setup Status</span>
<span class="font-label-lg text-label-lg text-[#2E7D32] font-semibold">Configured</span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Occupancy State</span>
<span class="font-label-lg text-label-lg text-[#364E68] font-semibold">Vacant (Unassigned)</span>
</div>
</div>
<!-- Amenities Pills -->
<div class="flex flex-col gap-2 pt-2">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider font-semibold">Configured Unit Amenities</span>
<div class="flex flex-wrap gap-2">
<span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container font-label-md text-label-md text-on-surface">
<span class="material-symbols-outlined text-[17px] text-primary">mode_fan</span>
              Central Air Conditioning
            </span>
<span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container font-label-md text-label-md text-on-surface">
<span class="material-symbols-outlined text-[17px] text-primary">directions_car</span>
              Assigned Covered Parking (Bay A-14)
            </span>
<span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container font-label-md text-label-md text-on-surface">
<span class="material-symbols-outlined text-[17px] text-primary">balcony</span>
              Private Balcony
            </span>
<span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container font-label-md text-label-md text-on-surface">
<span class="material-symbols-outlined text-[17px] text-primary">inventory</span>
              Built-in Wardrobes
            </span>
<span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container font-label-md text-label-md text-on-surface">
<span class="material-symbols-outlined text-[17px] text-primary">soup_kitchen</span>
              Fully Equipped Kitchen
            </span>
<span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container font-label-md text-label-md text-on-surface">
<span class="material-symbols-outlined text-[17px] text-primary">wifi</span>
              High-Speed Internet-Ready (Fiber)
            </span>
</div>
</div>
</div>
<!-- SUBSECTION B: Pricing & Rental Terms -->
<div class="bg-surface-container-lowest rounded-xl p-6 shadow-sm flex flex-col gap-5">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[20px]">payments</span>
</div>
<div>
<h2 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Pricing Structure & Lease Terms</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Manual offline settlement terms and leasing parameters</p>
</div>
</div>
<button class="px-3 py-1.5 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-sm text-label-sm flex items-center gap-1.5 transition-colors" type="button" data-demo="Edit Pricing">
<span class="material-symbols-outlined text-[16px]">edit</span>
<span>Edit Pricing</span>
</button>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
<div class="p-4 rounded-xl bg-surface-container-low flex flex-col justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Base Monthly Rent</span>
<div class="my-2">
<span class="font-headline-lg text-headline-lg font-bold text-on-surface font-mono">SAR 7,500</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">/ month</span>
</div>
<span class="font-label-sm text-label-sm text-outline">Rental Cycle: Monthly recurrence</span>
</div>
<div class="p-4 rounded-xl bg-surface-container-low flex flex-col justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Security Deposit</span>
<div class="my-2">
<span class="font-headline-md text-headline-md font-semibold text-outline-variant">Not configured</span>
</div>
<span class="font-label-sm text-label-sm text-outline">Default property rate will apply</span>
</div>
<div class="p-4 rounded-xl bg-surface-container-low flex flex-col justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Additional Fees / Utilities</span>
<div class="my-2">
<span class="font-headline-md text-headline-md font-semibold text-outline-variant">Not configured</span>
</div>
<span class="font-label-sm text-label-sm text-outline">Excludes municipal tax and chilled water</span>
</div>
</div>
<!-- Strict Offline Policy Notice -->
<div class="p-4 rounded-xl bg-surface-container-high/60 flex flex-col gap-2">
<div class="flex items-center gap-2 text-primary font-label-md text-label-md font-semibold">
<span class="material-symbols-outlined text-[18px]">account_balance</span>
<span>Authorized Payment & Reservation Policy</span>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-body-sm text-body-sm text-on-surface-variant">
<div class="flex items-start gap-2">
<span class="material-symbols-outlined text-[16px] text-primary mt-0.5">check</span>
<span><strong>Settlement Method:</strong> Offline bank transfer or certified cash voucher with manual finance verification.</span>
</div>
<div class="flex items-start gap-2">
<span class="material-symbols-outlined text-[16px] text-primary mt-0.5">check</span>
<span><strong>Booking Policy:</strong> Request to Book only. Mandatory Operations Manager manual approval required prior to contract.</span>
</div>
</div>
<div class="pt-2 text-outline font-label-sm text-label-sm flex items-center gap-1.5">
<span class="material-symbols-outlined text-[14px]">shield</span>
<span>Direct gateway transactions, Stripe card charges, automated recurring draws, and instant bookings are disabled for this compound.</span>
</div>
</div>
</div>
<!-- SUBSECTION C: Availability & Publishing Governance -->
<div class="bg-surface-container-lowest rounded-xl p-6 shadow-sm flex flex-col gap-4">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[20px]">published_with_changes</span>
</div>
<div>
<h2 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Availability & Publishing Governance</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Parent compound listing dependencies and workflow readiness</p>
</div>
</div>
<span class="px-2.5 py-1 rounded-full bg-error-container text-on-error-container font-label-sm text-label-sm font-semibold flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">lock</span>
            Booking Blocked
          </span>
</div>
<!-- Matrix Card -->
<div class="p-4 rounded-xl bg-surface-container-low flex flex-col gap-3">
<div class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">
            Status Eligibility Matrix
          </div>
<div class="grid grid-cols-2 md:grid-cols-5 gap-3">
<div class="p-2.5 rounded-lg bg-surface-container-lowest flex flex-col gap-1">
<span class="font-label-sm text-[11px] text-outline">Unit Setup</span>
<span class="font-label-md text-label-md font-semibold text-[#2E7D32] flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">check</span> Configured
              </span>
</div>
<div class="p-2.5 rounded-lg bg-surface-container-lowest flex flex-col gap-1">
<span class="font-label-sm text-[11px] text-outline">Occupancy</span>
<span class="font-label-md text-label-md font-semibold text-[#364E68] flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">check</span> Vacant
              </span>
</div>
<div class="p-2.5 rounded-lg bg-surface-container-lowest flex flex-col gap-1">
<span class="font-label-sm text-[11px] text-outline">Maintenance</span>
<span class="font-label-md text-label-md font-semibold text-[#2E7D32] flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">check</span> Clear
              </span>
</div>
<div class="p-2.5 rounded-lg bg-surface-container-lowest flex flex-col gap-1">
<span class="font-label-sm text-[11px] text-outline">Property State</span>
<span class="font-label-md text-label-md font-semibold text-error flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">close</span> Unpublished
              </span>
</div>
<div class="p-2.5 rounded-lg bg-surface-container-lowest flex flex-col gap-1">
<span class="font-label-sm text-[11px] text-outline">Booking Readiness</span>
<span class="font-label-md text-label-md font-semibold text-error flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">block</span> Inactive
              </span>
</div>
</div>
<div class="mt-2 p-3 rounded-lg bg-surface-container flex items-start gap-2.5">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant mt-0.5">policy</span>
<p class="font-body-sm text-body-sm text-on-surface-variant">
<strong>Governance Precedence:</strong> Unit configuration does not automatically enable bookings. Units remain unbookable until the overarching estate dossier for <em>Al-Yasmin Compound II</em> satisfies municipal registration requirements and receives administrative publishing clearance.
            </p>
</div>
</div>
</div>
<!-- SUBSECTION D: Tenant & Booking Summary -->
<div class="bg-surface-container-lowest rounded-xl p-6 shadow-sm flex flex-col gap-4">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[20px]">person_pin</span>
</div>
<div>
<h2 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Tenant & Tenancy Activity</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Current occupancy status and historical reservations</p>
</div>
</div>
<div class="flex items-center gap-2">
<a class="px-3 py-1.5 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-sm text-label-sm transition-colors" href="{{ route('manager.bookings') }}">
              Booking History
            </a>
<a class="px-3 py-1.5 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-sm text-label-sm transition-colors" href="{{ route('manager.contracts') }}">
              Tenancy History
            </a>
</div>
</div>
<!-- Empty State Dashboard Box -->
<div class="rounded-xl bg-surface-container-low p-6 flex flex-col items-center justify-center text-center">
<div class="w-12 h-12 rounded-full bg-surface-container flex items-center justify-center text-outline mb-3">
<span class="material-symbols-outlined text-[28px]">person_off</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-medium mb-1">No Active Tenant or Lease</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant max-w-md mb-4">
            No tenant or booking activity has been recorded for Unit A-101. The unit is currently vacant and has no pending reservation requests.
          </p>
<div class="grid grid-cols-2 sm:grid-cols-4 gap-4 w-full max-w-xl text-left bg-surface-container-lowest p-3.5 rounded-xl shadow-xs">
<div>
<span class="font-label-sm text-[11px] text-outline">Current Tenant</span>
<p class="font-label-md text-label-md font-medium text-on-surface">None</p>
</div>
<div>
<span class="font-label-sm text-[11px] text-outline">Active Contract</span>
<p class="font-label-md text-label-md font-medium text-on-surface">None</p>
</div>
<div>
<span class="font-label-sm text-[11px] text-outline">Pending Requests</span>
<p class="font-label-md text-label-md font-medium text-on-surface">0 Requests</p>
</div>
<div>
<span class="font-label-sm text-[11px] text-outline">Move-In Schedule</span>
<p class="font-label-md text-label-md font-medium text-on-surface">None Scheduled</p>
</div>
</div>
</div>
</div>
<!-- SUBSECTION E: Furniture Inventory Preview -->
<div class="bg-surface-container-lowest rounded-xl p-6 shadow-sm flex flex-col gap-4">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[20px]">chair</span>
</div>
<div>
<h2 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Furniture Inventory Manifest</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Assigned physical inventory and asset custody logs</p>
</div>
</div>
<div class="flex items-center gap-2">
<button class="px-3 py-1.5 rounded-lg bg-primary-container text-on-primary hover:bg-primary font-label-sm text-label-sm flex items-center gap-1.5 transition-colors" type="button" data-demo="Add Inventory Item">
<span class="material-symbols-outlined text-[16px]">add</span>
<span>Add Inventory Item</span>
</button>
<a class="px-3 py-1.5 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-sm text-label-sm transition-colors" href="{{ route('manager.furniture') }}">
              Full Inventory (18)
            </a>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead>
<tr class="bg-surface-container-low text-on-surface-variant font-label-sm text-label-sm uppercase tracking-wider">
<th class="py-2.5 px-3 rounded-l-lg">Item Name</th>
<th class="py-2.5 px-3">Location / Room</th>
<th class="py-2.5 px-3 text-center">Qty</th>
<th class="py-2.5 px-3">Condition Status</th>
<th class="py-2.5 px-3">Last Inspected</th>
<th class="py-2.5 px-3 text-right rounded-r-lg">Actions</th>
</tr>
</thead>
<tbody class="font-body-md text-body-md divide-y-0 text-on-surface">
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-3 px-3 font-medium flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-outline">weekend</span>
<span>Modular 3-Seater Sofa</span>
</td>
<td class="py-3 px-3 text-on-surface-variant font-body-sm">Living Room</td>
<td class="py-3 px-3 text-center font-mono text-body-sm">1</td>
<td class="py-3 px-3">
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface-variant font-label-sm text-[11px]">Not Assessed</span>
</td>
<td class="py-3 px-3 text-outline font-body-sm">Not Inspected</td>
<td class="py-3 px-3 text-right">
<a class="font-label-sm text-label-sm text-primary hover:underline font-semibold" href="#demo-notice" data-demo="View / Edit">View / Edit</a>
</td>
</tr>
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-3 px-3 font-medium flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-outline">table_restaurant</span>
<span>Solid Oak Dining Table + 6 Chairs</span>
</td>
<td class="py-3 px-3 text-on-surface-variant font-body-sm">Dining Area</td>
<td class="py-3 px-3 text-center font-mono text-body-sm">1</td>
<td class="py-3 px-3">
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface-variant font-label-sm text-[11px]">Not Assessed</span>
</td>
<td class="py-3 px-3 text-outline font-body-sm">Not Inspected</td>
<td class="py-3 px-3 text-right">
<a class="font-label-sm text-label-sm text-primary hover:underline font-semibold" href="#demo-notice" data-demo="View / Edit">View / Edit</a>
</td>
</tr>
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-3 px-3 font-medium flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-outline">bed</span>
<span>King Size Bed Frame & Mattress</span>
</td>
<td class="py-3 px-3 text-on-surface-variant font-body-sm">Master Bedroom</td>
<td class="py-3 px-3 text-center font-mono text-body-sm">2</td>
<td class="py-3 px-3">
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface-variant font-label-sm text-[11px]">Not Assessed</span>
</td>
<td class="py-3 px-3 text-outline font-body-sm">Not Inspected</td>
<td class="py-3 px-3 text-right">
<a class="font-label-sm text-label-sm text-primary hover:underline font-semibold" href="#demo-notice" data-demo="View / Edit">View / Edit</a>
</td>
</tr>
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-3 px-3 font-medium flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-outline">kitchen</span>
<span>Inverter Refrigerator (520L)</span>
</td>
<td class="py-3 px-3 text-on-surface-variant font-body-sm">Kitchen</td>
<td class="py-3 px-3 text-center font-mono text-body-sm">1</td>
<td class="py-3 px-3">
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface-variant font-label-sm text-[11px]">Not Assessed</span>
</td>
<td class="py-3 px-3 text-outline font-body-sm">Not Inspected</td>
<td class="py-3 px-3 text-right">
<a class="font-label-sm text-label-sm text-primary hover:underline font-semibold" href="#demo-notice" data-demo="View / Edit">View / Edit</a>
</td>
</tr>
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-3 px-3 font-medium flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-outline">local_laundry_service</span>
<span>Front-Load Washer & Dryer Comb</span>
</td>
<td class="py-3 px-3 text-on-surface-variant font-body-sm">Laundry Nook</td>
<td class="py-3 px-3 text-center font-mono text-body-sm">1</td>
<td class="py-3 px-3">
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface-variant font-label-sm text-[11px]">Not Assessed</span>
</td>
<td class="py-3 px-3 text-outline font-body-sm">Not Inspected</td>
<td class="py-3 px-3 text-right">
<a class="font-label-sm text-label-sm text-primary hover:underline font-semibold" href="#demo-notice" data-demo="View / Edit">View / Edit</a>
</td>
</tr>
</tbody>
</table>
</div>
<p class="font-body-sm text-body-sm text-outline pt-2">
          Notice: Manifest entries represent architectural staging records; physical condition is not verified until an on-site manager inspection is conducted.
        </p>
</div>
<!-- SUBSECTION F: Unit Condition & Interactive Inspections -->
<div class="bg-surface-container-lowest rounded-xl p-6 shadow-sm flex flex-col gap-5">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[20px]">fact_check</span>
</div>
<div>
<h2 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Unit Condition & Room Inspections</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Floor plan pin annotator and check-in / check-out comparison</p>
</div>
</div>
<button class="px-4 py-2 rounded-lg bg-primary-container text-on-primary hover:bg-primary font-label-md text-label-md font-semibold flex items-center gap-2 shadow-sm transition-all" type="button" data-demo="Start Condition Inspection">
<span class="material-symbols-outlined text-[18px]">add_task</span>
<span>Start Condition Inspection</span>
</button>
</div>
<!-- Inspection Metric Badges -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-3">
<div class="p-3 rounded-xl bg-surface-container-low flex flex-col">
<span class="font-label-sm text-[11px] text-outline">Baseline Condition</span>
<span class="font-label-md text-label-md font-semibold text-on-surface">Not Started</span>
</div>
<div class="p-3 rounded-xl bg-surface-container-low flex flex-col">
<span class="font-label-sm text-[11px] text-outline">Check-In Inspection</span>
<span class="font-label-md text-label-md font-semibold text-outline">Not Applicable</span>
</div>
<div class="p-3 rounded-xl bg-surface-container-low flex flex-col">
<span class="font-label-sm text-[11px] text-outline">Check-Out Inspection</span>
<span class="font-label-md text-label-md font-semibold text-outline">Not Applicable</span>
</div>
<div class="p-3 rounded-xl bg-surface-container-low flex flex-col">
<span class="font-label-sm text-[11px] text-outline">Open Damage Claims</span>
<span class="font-label-md text-label-md font-semibold text-[#2E7D32]">0 Open Flags</span>
</div>
</div>
<!-- Interactive Blueprint / Floor Plan Schematic Preview -->
<div class="p-4 rounded-xl bg-surface-container-high/40 flex flex-col gap-3">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-primary">map</span>
<span class="font-label-md text-label-md font-semibold text-on-surface">Schematic Room Selector (Preview)</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant font-mono">Floor 1 • 115 m² Layout</span>
</div>
<!-- Room Selector Grid Preview mimicking apartment rooms -->
<div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5 pt-2" id="roomSelectorPreview">
<button class="p-3 rounded-lg bg-surface-container-lowest hover:bg-primary-container/10 hover:text-primary transition-all text-left flex flex-col gap-1 shadow-xs group" type="button" data-demo="Master Bedroom 24.5 m² • En-suite">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md font-semibold text-on-surface group-hover:text-primary">Master Bedroom</span>
<span class="w-2 h-2 rounded-full bg-outline-variant"></span>
</div>
<span class="font-body-sm text-[11px] text-outline">24.5 m² • En-suite</span>
</button>
<button class="p-3 rounded-lg bg-surface-container-lowest hover:bg-primary-container/10 hover:text-primary transition-all text-left flex flex-col gap-1 shadow-xs group" type="button" data-demo="Bedroom 2 18.2 m² • Guest Wing">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md font-semibold text-on-surface group-hover:text-primary">Bedroom 2</span>
<span class="w-2 h-2 rounded-full bg-outline-variant"></span>
</div>
<span class="font-body-sm text-[11px] text-outline">18.2 m² • Guest Wing</span>
</button>
<button class="p-3 rounded-lg bg-surface-container-lowest hover:bg-primary-container/10 hover:text-primary transition-all text-left flex flex-col gap-1 shadow-xs group" type="button" data-demo="Living & Dining 42.0 m² • Open Area">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md font-semibold text-on-surface group-hover:text-primary">Living & Dining</span>
<span class="w-2 h-2 rounded-full bg-outline-variant"></span>
</div>
<span class="font-body-sm text-[11px] text-outline">42.0 m² • Open Area</span>
</button>
<button class="p-3 rounded-lg bg-surface-container-lowest hover:bg-primary-container/10 hover:text-primary transition-all text-left flex flex-col gap-1 shadow-xs group" type="button" data-demo="Kitchenette 14.0 m² • Modern Fitted">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md font-semibold text-on-surface group-hover:text-primary">Kitchenette</span>
<span class="w-2 h-2 rounded-full bg-outline-variant"></span>
</div>
<span class="font-body-sm text-[11px] text-outline">14.0 m² • Modern Fitted</span>
</button>
<button class="p-3 rounded-lg bg-surface-container-lowest hover:bg-primary-container/10 hover:text-primary transition-all text-left flex flex-col gap-1 shadow-xs group" type="button" data-demo="Terrace Balcony 9.5 m² • Outdoor">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md font-semibold text-on-surface group-hover:text-primary">Terrace Balcony</span>
<span class="w-2 h-2 rounded-full bg-outline-variant"></span>
</div>
<span class="font-body-sm text-[11px] text-outline">9.5 m² • Outdoor</span>
</button>
<button class="p-3 rounded-lg bg-surface-container-lowest hover:bg-primary-container/10 hover:text-primary transition-all text-left flex flex-col gap-1 shadow-xs group" type="button" data-demo="Master Bathroom 4.5 m² • Walk-in Shower">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md font-semibold text-on-surface group-hover:text-primary">Master Bathroom</span>
<span class="w-2 h-2 rounded-full bg-outline-variant"></span>
</div>
<span class="font-body-sm text-[11px] text-outline">4.5 m² • Walk-in Shower</span>
</button>
<button class="p-3 rounded-lg bg-surface-container-lowest hover:bg-primary-container/10 hover:text-primary transition-all text-left flex flex-col gap-1 shadow-xs group" type="button" data-demo="Guest Bathroom 3.8 m² • Powder">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md font-semibold text-on-surface group-hover:text-primary">Guest Bathroom</span>
<span class="w-2 h-2 rounded-full bg-outline-variant"></span>
</div>
<span class="font-body-sm text-[11px] text-outline">3.8 m² • Powder</span>
</button>
<button class="p-3 rounded-lg bg-surface-container-lowest hover:bg-primary-container/10 hover:text-primary transition-all text-left flex flex-col gap-1 shadow-xs group" type="button" data-demo="Laundry Nook 2.0 m² • Utility">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md font-semibold text-on-surface group-hover:text-primary">Laundry Nook</span>
<span class="w-2 h-2 rounded-full bg-outline-variant"></span>
</div>
<span class="font-body-sm text-[11px] text-outline">2.0 m² • Utility</span>
</button>
</div>
<p class="font-body-sm text-body-sm text-outline mt-1">
            Institutional inspection suite empowers engineers to pin structural defects, capture photo stamps, annotate condition rating, and auto-generate legal bilingual hand-over affidavits.
          </p>
</div>
</div>
<!-- SUBSECTION G: Maintenance Summary -->
<div class="bg-surface-container-lowest rounded-xl p-6 shadow-sm flex flex-col gap-4">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[20px]">home_repair_service</span>
</div>
<div>
<h2 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Maintenance Health & Work Orders</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Preventive upkeep schedules and reactive tickets</p>
</div>
</div>
<div class="flex items-center gap-2">
<a class="px-3 py-1.5 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-sm text-label-sm transition-colors" href="{{ route('manager.maintenance') }}">
              Maintenance History
            </a>
<button class="px-3 py-1.5 rounded-lg bg-primary-container text-on-primary hover:bg-primary font-label-sm text-label-sm flex items-center gap-1 transition-colors" type="button" data-demo="Create Request">
<span class="material-symbols-outlined text-[16px]">add</span>
<span>Create Request</span>
</button>
</div>
</div>
<div class="grid grid-cols-2 md:grid-cols-4 gap-4">
<div class="p-3.5 rounded-xl bg-surface-container-low flex flex-col justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Active Open Requests</span>
<div class="my-1">
<span class="font-headline-md text-headline-md font-bold text-on-surface font-mono">0</span>
</div>
<span class="font-label-sm text-label-sm text-[#2E7D32]">All systems operating</span>
</div>
<div class="p-3.5 rounded-xl bg-surface-container-low flex flex-col justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Scheduled Preventive</span>
<div class="my-1">
<span class="font-headline-md text-headline-md font-bold text-on-surface font-mono">0</span>
</div>
<span class="font-label-sm text-label-sm text-outline">None pending</span>
</div>
<div class="p-3.5 rounded-xl bg-surface-container-low flex flex-col justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Operational Restrictions</span>
<div class="my-1">
<span class="font-headline-md text-headline-md font-semibold text-on-surface">None</span>
</div>
<span class="font-label-sm text-label-sm text-[#2E7D32]">Unit marked habit-ready</span>
</div>
<div class="p-3.5 rounded-xl bg-surface-container-low flex flex-col justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Last HVAC Overhaul</span>
<div class="my-1">
<span class="font-headline-md text-headline-md font-semibold text-outline-variant">Not Recorded</span>
</div>
<span class="font-label-sm text-label-sm text-outline">Compound batch pending</span>
</div>
</div>
</div>
</div>
<!-- RIGHT STICKY OPERATIONAL PANEL (approx 32% -> col-span-4) -->
<div class="lg:col-span-4 flex flex-col gap-6 sticky top-20">
<!-- Unit Meta Dossier Card -->
<div class="bg-surface-container-lowest rounded-xl p-5 shadow-sm flex flex-col gap-4">
<div class="flex items-center justify-between pb-3 border-b-0">
<div class="flex items-center gap-2">
<div class="w-8 h-8 rounded-lg bg-primary-container/10 flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[18px]">badge</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Unit Quick Dossier</h3>
</div>
<span class="font-mono text-body-sm font-semibold text-primary">A-101</span>
</div>
<div class="space-y-3 font-body-sm text-body-sm">
<div class="flex items-center justify-between py-1.5 px-2 rounded-lg hover:bg-surface-container-low">
<span class="text-on-surface-variant font-label-md">Parent Estate</span>
<a class="text-primary font-semibold hover:underline flex items-center gap-1" href="{{ route('manager.property-details') }}">
<span>Al-Yasmin Compound II</span>
<span class="material-symbols-outlined text-[14px]">open_in_new</span>
</a>
</div>
<div class="flex items-center justify-between py-1.5 px-2 rounded-lg hover:bg-surface-container-low">
<span class="text-on-surface-variant font-label-md">Assigned Manager</span>
<span class="text-on-surface font-medium">Eng. Sultan Al-Shammari</span>
</div>
<div class="flex items-center justify-between py-1.5 px-2 rounded-lg hover:bg-surface-container-low">
<span class="text-on-surface-variant font-label-md">Setup Status</span>
<span class="px-2 py-0.5 rounded-full bg-[#EBF6F0] text-[#2E7D32] font-label-sm text-label-sm font-semibold">Configured</span>
</div>
<div class="flex items-center justify-between py-1.5 px-2 rounded-lg hover:bg-surface-container-low">
<span class="text-on-surface-variant font-label-md">Occupancy Status</span>
<span class="px-2 py-0.5 rounded-full bg-[#F0F4F8] text-[#364E68] font-label-sm text-label-sm font-semibold">Vacant</span>
</div>
<div class="flex items-center justify-between py-1.5 px-2 rounded-lg hover:bg-surface-container-low">
<span class="text-on-surface-variant font-label-md">Maintenance Health</span>
<span class="px-2 py-0.5 rounded-full bg-[#EBF6F0] text-[#2E7D32] font-label-sm text-label-sm font-semibold">Clear</span>
</div>
<div class="flex items-center justify-between py-1.5 px-2 rounded-lg hover:bg-surface-container-low">
<span class="text-on-surface-variant font-label-md">Booking Visibility</span>
<span class="px-2 py-0.5 rounded-full bg-[#FFFAEB] text-[#D35400] font-label-sm text-label-sm font-semibold">Not Published</span>
</div>
<div class="flex items-center justify-between py-1.5 px-2 rounded-lg hover:bg-surface-container-low">
<span class="text-on-surface-variant font-label-md">Monthly Rate</span>
<span class="text-on-surface font-mono font-bold">SAR 7,500</span>
</div>
<div class="flex items-center justify-between py-1.5 px-2 rounded-lg hover:bg-surface-container-low">
<span class="text-on-surface-variant font-label-md">Last Audit Update</span>
<span class="text-outline font-mono text-[12px]">Not available</span>
</div>
</div>
<div class="h-px bg-surface-container my-1"></div>
<!-- Quick Actions Stack -->
<div class="flex flex-col gap-2">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold px-1">
            Operations Console
          </span>
<button class="w-full px-3.5 py-2.5 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md font-medium flex items-center justify-between transition-colors" type="button" data-demo="Edit Unit Metadata">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-primary">edit_square</span>
<span>Edit Unit Metadata</span>
</div>
<span class="material-symbols-outlined text-[16px] text-outline">chevron_right</span>
</button>
<button class="w-full px-3.5 py-2.5 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md font-medium flex items-center justify-between transition-colors" type="button" data-demo="Manage Pricing & Terms">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-primary">price_change</span>
<span>Manage Pricing & Terms</span>
</div>
<span class="material-symbols-outlined text-[16px] text-outline">chevron_right</span>
</button>
<a class="w-full px-3.5 py-2.5 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md font-medium flex items-center justify-between transition-colors" href="{{ route('manager.furniture') }}">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-primary">inventory</span>
<span>View Full Inventory</span>
</div>
<span class="material-symbols-outlined text-[16px] text-outline">chevron_right</span>
</a>
<button class="w-full px-3.5 py-2.5 rounded-lg bg-primary-container text-on-primary hover:bg-primary font-label-md text-label-md font-medium flex items-center justify-between transition-colors shadow-sm" type="button" data-demo="Start Physical Inspection">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px]">verified</span>
<span>Start Physical Inspection</span>
</div>
<span class="material-symbols-outlined text-[16px]">launch</span>
</button>
<button class="w-full px-3.5 py-2.5 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md font-medium flex items-center justify-between transition-colors" type="button" data-demo="Download Spec Sheet (PDF Demo)">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-outline">download</span>
<span>Download Spec Sheet (PDF Demo)</span>
</div>
<span class="material-symbols-outlined text-[16px] text-outline">description</span>
</button>
</div>
</div>
<!-- Compliance Advisory Widget -->
<div class="p-4 rounded-xl bg-surface-container-low shadow-sm flex flex-col gap-2.5">
<div class="flex items-center gap-2 text-on-surface font-label-md text-label-md font-semibold">
<span class="material-symbols-outlined text-[18px] text-[#D35400]">warning</span>
<span>Regional Regulatory Notice</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          Under Saudi Real Estate General Authority (REGA) mandates, units within collective compounds cannot be offered for commercial lease until the Parent Compound Title Deed is formally ratified.
        </p>
<div class="pt-1 flex items-center justify-between text-outline font-label-sm text-[11px]">
<span>Ejar Compatibility Check</span>
<span class="font-semibold text-primary">Pending Parent Sync</span>
</div>
</div>
</div>
</div>
</div>

@endsection
