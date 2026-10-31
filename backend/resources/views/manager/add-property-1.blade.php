{{-- Imported from client_demo/screens/add-property-step-1/code.html; static demonstration data. --}}
@extends('layouts.manager')
@section('content')
<div class="flex flex-col w-full">
<!-- Top Navigation & Header Context Bar -->
<div class="flex flex-col gap-space-xs mb-space-lg">
<!-- Breadcrumb -->
<nav class="flex items-center gap-space-xs font-label-md text-label-md text-on-surface-variant">
<a class="hover:text-primary transition-colors flex items-center gap-1" href="{{ route('manager.properties') }}">
<span class="material-symbols-outlined text-[16px]">apartment</span>
<span>Properties</span>
</a>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="text-on-surface font-medium">Add New Property</span>
</nav>
<!-- Header Actions & Title Bar -->
<div class="flex flex-col md:flex-row md:items-center justify-between gap-space-md">
<div class="flex flex-col">
<div class="flex items-center gap-space-sm">
<h2 class="font-headline-lg text-headline-lg text-on-surface font-bold tracking-tight">Add New Property</h2>
<span class="bg-primary-fixed text-on-primary-fixed font-label-sm text-label-sm px-2.5 py-0.5 rounded-full uppercase tracking-wider font-semibold">New Asset Intake</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant">
          Register a property, assign institutional ownership and operators, and configure individual rentable units.
        </p>
</div>
<!-- Action Buttons -->
<div class="flex items-center gap-space-sm self-start md:self-auto shrink-0">
<button class="px-space-md py-2 rounded-lg bg-surface-container-lowest text-on-surface font-label-md text-label-md shadow-sm hover:bg-surface-container transition-all flex items-center gap-1.5 group" type="button" data-demo="Save Draft">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant group-hover:text-on-surface transition-colors">save</span>
<span>Save Draft</span>
</button>
<a class="px-space-md py-2 rounded-lg bg-surface-container-low text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-error transition-all flex items-center gap-1" href="{{ route('manager.properties') }}">
<span class="material-symbols-outlined text-[18px]">close</span>
<span>Cancel</span>
</a>
</div>
</div>
</div>
<!-- Multi-Step Progress Tracker Bar -->
@include('components.manager.property-steps')
<!-- Main Content Layout (Form Grid + Context Sidebar) -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg items-start">
<!-- Left Section: Master Form Card (8 Columns) -->
<div class="lg:col-span-8 flex flex-col gap-space-lg">
<!-- Primary Form Container -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-lg">
<!-- Section Header with Visual Identity Badge -->
<div class="flex items-center justify-between pb-space-sm bg-surface-container-lowest">
<div class="flex items-center gap-space-sm">
<div class="w-9 h-9 rounded-lg bg-primary-container/10 text-primary flex items-center justify-center">
<span class="material-symbols-outlined text-[20px]">info</span>
</div>
<div class="flex flex-col">
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">Step 1: Basic Information</h3>
<span class="font-body-sm text-body-sm text-on-surface-variant">Fundamental asset classification, naming convention, and operational mode.</span>
</div>
</div>
<span class="font-label-sm text-label-sm text-primary font-semibold uppercase tracking-wider bg-surface-container-low px-2.5 py-1 rounded">Required Fields Marked *</span>
</div>
<form class="flex flex-col gap-space-lg" data-demo-form="">
<!-- Row 1: Property Title & System Reference Code -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-space-md">
<!-- Property Name (7 cols) -->
<div class="md:col-span-7 flex flex-col gap-1.5">
<label class="font-label-lg text-label-lg text-on-surface font-medium flex items-center justify-between" for="property-title">
<span>Property Name <span class="text-error font-bold">*</span></span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Primary Display Title</span>
</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-2.5 text-on-surface-variant text-[20px] pointer-events-none">domain</span>
<input class="w-full h-11 pl-10 pr-4 bg-surface-container-low rounded-lg text-on-surface font-body-md text-body-md outline-none focus:bg-surface-container-lowest transition-all shadow-inner" id="property-title" placeholder="e.g. Burj Al-Murabba Serviced Suites" type="text" value="Al-Yasmin Residential Compound II">
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
                Enter a distinct commercial or residential estate title as reflected on title deeds.
              </p>
</div>
<!-- Property Reference Code (5 cols) -->
<div class="md:col-span-5 flex flex-col gap-1.5">
<label class="font-label-lg text-label-lg text-on-surface font-medium flex items-center justify-between" for="property-code">
<span>Property Ref Code <span class="text-error font-bold">*</span></span>
<span class="font-label-sm text-label-sm bg-tertiary-container/20 text-on-tertiary-container px-1.5 py-0.5 rounded font-semibold">Auto-Generated</span>
</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-2.5 text-on-surface-variant text-[20px] pointer-events-none">tag</span>
<input class="w-full h-11 pl-10 pr-24 bg-surface-container font-mono text-on-surface font-body-md text-body-md rounded-lg outline-none cursor-default" id="property-code" readonly="" type="text" value="PRP-RYD-2024-0089">
<button class="absolute right-2 top-2 px-2 py-1 bg-surface-container-lowest rounded text-primary hover:bg-primary hover:text-on-primary font-label-sm text-label-sm font-semibold transition-colors shadow-sm" type="button" data-demo="Regenerate">
                  Regenerate
                </button>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
                Standard Riyadh Sequence: Regional asset ID token.
              </p>
</div>
</div>
<!-- Row 2: Property Type Dropdown with Visual Indicator Preview -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-space-md items-start">
<div class="md:col-span-6 flex flex-col gap-1.5">
<label class="font-label-lg text-label-lg text-on-surface font-medium" for="property-type">
                Property Type <span class="text-error font-bold">*</span>
</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-2.5 text-primary text-[20px] pointer-events-none">apartment</span>
<select class="w-full h-11 pl-10 pr-10 bg-surface-container-low rounded-lg text-on-surface font-body-md text-body-md outline-none cursor-pointer focus:bg-surface-container-lowest transition-all appearance-none" id="property-type">
<option value="apartment">Apartment</option>
<option value="villa">Villa</option>
<option selected="" value="residential-building">Residential Building / Compound</option>
<option value="floor">Full Floor Entity</option>
<option value="farm">Agricultural Farm Estate</option>
<option value="chalet">Private Chalet</option>
<option value="rest-house">Rest House (Istiraha)</option>
<option value="shop">Commercial Retail Shop</option>
<option value="commercial-building">Commercial Business Tower</option>
<option value="other">Other Unique Asset</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-3 text-on-surface-variant text-[20px] pointer-events-none">expand_more</span>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant">Classifies sub-unit tenancy regulations & civil defense parameters.</span>
</div>
<!-- Property Operational Status -->
<div class="md:col-span-6 flex flex-col gap-1.5">
<label class="font-label-lg text-label-lg text-on-surface font-medium">
                Operational Status <span class="text-error font-bold">*</span>
</label>
<div class="grid grid-cols-3 gap-2">
<label class="flex items-center justify-center gap-1.5 h-11 px-2 rounded-lg bg-surface-container-low text-on-surface cursor-pointer has-[:checked]:bg-primary has-[:checked]:text-on-primary transition-all shadow-sm">
<input checked="" class="hidden" name="property-status" type="radio" value="active">
<span class="w-2 h-2 rounded-full bg-emerald-500 shrink-0"></span>
<span class="font-label-md text-label-md font-semibold">Active</span>
</label>
<label class="flex items-center justify-center gap-1.5 h-11 px-2 rounded-lg bg-surface-container-low text-on-surface-variant cursor-pointer has-[:checked]:bg-primary has-[:checked]:text-on-primary transition-all">
<input class="hidden" name="property-status" type="radio" value="inactive">
<span class="w-2 h-2 rounded-full bg-gray-400 shrink-0"></span>
<span class="font-label-md text-label-md font-medium">Inactive</span>
</label>
<label class="flex items-center justify-center gap-1.5 h-11 px-2 rounded-lg bg-surface-container-low text-on-surface-variant cursor-pointer has-[:checked]:bg-primary has-[:checked]:text-on-primary transition-all">
<input class="hidden" name="property-status" type="radio" value="maintenance">
<span class="w-2 h-2 rounded-full bg-amber-500 shrink-0"></span>
<span class="font-label-md text-label-md font-medium">Maintenance</span>
</label>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant">Active properties receive lease inquiries and tenant dispatch.</span>
</div>
</div>
<!-- Unit Architecture Configuration: Single vs Multiple Units (Interactive Card Selector) -->
<div class="flex flex-col gap-space-xs pt-space-xs">
<div class="flex items-center justify-between">
<label class="font-label-lg text-label-lg text-on-surface font-bold flex items-center gap-1.5">
<span>Asset Architecture Configuration</span>
<span class="text-error font-bold">*</span>
</label>
<span class="font-label-sm text-label-sm text-primary font-medium">Critical for Step 4 Configuration</span>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
<!-- Option A: Single Unit Property -->
<label class="cursor-pointer group">
<input class="peer hidden" name="unit_architecture" type="radio" value="single">
<div class="h-full p-space-md rounded-xl bg-surface-container-low peer-checked:bg-primary-fixed/20 transition-all flex flex-col justify-between gap-space-sm relative">
<div class="flex items-start justify-between">
<div class="w-10 h-10 rounded-lg bg-surface-container-lowest text-on-surface flex items-center justify-center group-hover:scale-105 transition-transform shadow-sm">
<span class="material-symbols-outlined text-[22px]">home</span>
</div>
<div class="w-5 h-5 rounded-full bg-surface-container flex items-center justify-center peer-checked:bg-primary peer-checked:text-on-primary">
<span class="material-symbols-outlined text-[14px] opacity-0 peer-checked:opacity-100">check</span>
</div>
</div>
<div class="flex flex-col gap-1">
<span class="font-headline-sm text-headline-sm text-on-surface font-semibold group-hover:text-primary transition-colors">
                      Single Unit Property
                    </span>
<p class="font-body-sm text-body-sm text-on-surface-variant">
                      For standalone private villas, single chalets, private family farms, or independent commercial retail shops leased as a unified entity.
                    </p>
</div>
<div class="pt-2">
<span class="font-label-sm text-label-sm bg-surface-container px-2 py-0.5 rounded text-on-surface-variant font-medium inline-block">
                      Direct Lease Contract
                    </span>
</div>
</div>
</label>
<!-- Option B: Multiple Units Property (Selected) -->
<label class="cursor-pointer group">
<input checked="" class="peer hidden" name="unit_architecture" type="radio" value="multiple">
<div class="h-full p-space-md rounded-xl bg-primary/5 shadow-sm transition-all flex flex-col justify-between gap-space-sm relative">
<div class="flex items-start justify-between">
<div class="w-10 h-10 rounded-lg bg-primary text-on-primary flex items-center justify-center group-hover:scale-105 transition-transform shadow-sm">
<span class="material-symbols-outlined text-[22px]">domain</span>
</div>
<div class="w-5 h-5 rounded-full bg-primary text-on-primary flex items-center justify-center shadow-sm">
<span class="material-symbols-outlined text-[14px] font-bold">check</span>
</div>
</div>
<div class="flex flex-col gap-1">
<div class="flex items-center gap-2">
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">
                        Multiple Units Property
                      </span>
<span class="font-label-sm text-label-sm bg-primary text-on-primary px-1.5 py-0.5 rounded font-semibold">Active Selection</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
                      For apartment buildings, residential compounds, multi-tenant corporate towers, or partitioned residential complexes.
                    </p>
</div>
<div class="pt-2">
<span class="font-label-sm text-label-sm bg-primary-fixed text-on-primary-fixed-variant px-2 py-0.5 rounded font-semibold inline-block">
                      Enables Unit Matrix & Stacking in Step 4
                    </span>
</div>
</div>
</label>
</div>
<!-- Informational Banner for Multiple Units -->
<div class="p-space-sm bg-surface-container-low rounded-lg flex items-start gap-space-sm mt-1">
<span class="material-symbols-outlined text-primary text-[20px] shrink-0 mt-0.5">info</span>
<p class="font-body-sm text-body-sm text-on-surface">
<strong>Unit Directory Alert:</strong> Selecting <strong>Multiple Units Property</strong> activates the sub-unit generation matrix in Step 4. You will be able to specify floor counts, unit categorizations (studios, executive duplexes, 3-bedroom penthouses), individual metering, and bespoke rental pricing schedules.
              </p>
</div>
</div>
<!-- Row 3: Furnishing Status (Segmented Card Group) -->
<div class="flex flex-col gap-1.5">
<label class="font-label-lg text-label-lg text-on-surface font-medium">
              Furnishing Specification <span class="text-error font-bold">*</span>
</label>
<div class="grid grid-cols-1 md:grid-cols-3 gap-space-sm">
<label class="p-space-sm rounded-lg bg-surface-container-low cursor-pointer flex items-center gap-space-sm has-[:checked]:bg-primary has-[:checked]:text-on-primary transition-all">
<input class="hidden" name="furnishing" type="radio" value="furnished">
<div class="w-8 h-8 rounded-lg bg-surface-container-lowest text-on-surface flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[18px]">bed</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold">Fully Furnished</span>
<span class="font-body-sm text-body-sm opacity-80">Turnkey inventory included</span>
</div>
</label>
<label class="p-space-sm rounded-lg bg-surface-container-low cursor-pointer flex items-center gap-space-sm has-[:checked]:bg-primary has-[:checked]:text-on-primary transition-all">
<input class="hidden" name="furnishing" type="radio" value="unfurnished">
<div class="w-8 h-8 rounded-lg bg-surface-container-lowest text-on-surface flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[18px]">check_box_outline_blank</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold">Unfurnished</span>
<span class="font-body-sm text-body-sm opacity-80">Bare shell or core state</span>
</div>
</label>
<label class="p-space-sm rounded-lg bg-primary text-on-primary cursor-pointer flex items-center gap-space-sm shadow-sm transition-all">
<input checked="" class="hidden" name="furnishing" type="radio" value="partially">
<div class="w-8 h-8 rounded-lg bg-surface-container-lowest text-primary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[18px]">chair</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold">Partially Furnished</span>
<span class="font-body-sm text-body-sm text-on-primary-container">Kitchen appliances & fixtures</span>
</div>
</label>
</div>
</div>
<!-- Row 4: Property Description Textarea -->
<div class="flex flex-col gap-1.5">
<div class="flex items-center justify-between">
<label class="font-label-lg text-label-lg text-on-surface font-medium" for="property-desc">
                Property Description <span class="text-error font-bold">*</span>
</label>
<span class="font-label-sm text-label-sm text-on-surface-variant font-mono">142 / 500 characters</span>
</div>
<textarea class="w-full p-space-md bg-surface-container-low rounded-lg text-on-surface font-body-md text-body-md outline-none focus:bg-surface-container-lowest transition-all" id="property-desc" placeholder="Provide a comprehensive operational summary of the building, shared amenities, construction standards, and access roads..." rows="4">A premium multi-family residential compound comprising executive penthouses, family apartments, and shared leisure amenities with dedicated underground parking.</textarea>
<div class="flex items-center justify-between text-on-surface-variant font-body-sm text-body-sm">
<span>This description will appear on official leasing memorandums and digital tenant portals.</span>
<button class="text-primary font-medium hover:underline flex items-center gap-1" type="button" data-demo="Auto-translate to Arabic">
<span class="material-symbols-outlined text-[16px]">translate</span>
<span>Auto-translate to Arabic</span>
</button>
</div>
</div>
<!-- Architectural Attributes Grid (Extra depth & realistic asset data) -->
<div class="bg-surface-container-low rounded-xl p-space-md flex flex-col gap-space-sm">
<span class="font-label-md text-label-md text-on-surface font-bold uppercase tracking-wider">
              Asset Engineering Baseline
            </span>
<div class="grid grid-cols-2 md:grid-cols-4 gap-space-md">
<div class="flex flex-col gap-1">
<span class="font-label-sm text-label-sm text-on-surface-variant">Construction Year</span>
<input class="w-full h-10 px-3 bg-surface-container-lowest rounded-lg font-body-md text-body-md text-on-surface outline-none" type="number" value="2023">
</div>
<div class="flex flex-col gap-1">
<span class="font-label-sm text-label-sm text-on-surface-variant">Total Floors (G+)</span>
<input class="w-full h-10 px-3 bg-surface-container-lowest rounded-lg font-body-md text-body-md text-on-surface outline-none" type="number" value="6">
</div>
<div class="flex flex-col gap-1">
<span class="font-label-sm text-label-sm text-on-surface-variant">Plot Area (m²)</span>
<input class="w-full h-10 px-3 bg-surface-container-lowest rounded-lg font-body-md text-body-md text-on-surface outline-none font-mono" type="text" value="3,450 m²">
</div>
<div class="flex flex-col gap-1">
<span class="font-label-sm text-label-sm text-on-surface-variant">Gross Leasable Area</span>
<input class="w-full h-10 px-3 bg-surface-container-lowest rounded-lg font-body-md text-body-md text-on-surface outline-none font-mono" type="text" value="8,120 m²">
</div>
</div>
</div>
</form>
<!-- Form Step Navigation Footer -->
<div class="flex flex-col sm:flex-row items-center justify-between gap-space-md pt-space-md bg-surface-container-lowest">
<button class="w-full sm:w-auto px-space-lg py-2.5 rounded-lg bg-surface-container-low text-on-surface font-label-lg text-label-lg hover:bg-surface-container transition-all flex items-center justify-center gap-2" type="button" data-demo="Save as Draft">
<span class="material-symbols-outlined text-[18px]">save</span>
<span>Save as Draft</span>
</button>
<div class="flex items-center gap-space-sm w-full sm:w-auto justify-end">
<span class="font-label-sm text-label-sm text-on-surface-variant hidden md:inline-block">Next: Address & Map Location Pin</span>
<a class="w-full sm:w-auto px-space-lg py-2.5 rounded-lg bg-primary text-on-primary font-label-lg text-label-lg font-semibold hover:bg-primary-container shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-2 group" href="{{ route('manager.add-property-2') }}">
<span>Continue to Location (Step 2)</span>
<span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
</a>
</div>
</div>
</div>
<!-- Collapsible Multi-Step Roadmap Overview -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm">
<details class="group cursor-pointer" role="button" tabindex="0" data-demo="View Remaining Intake Sequence (Steps 2 – 6 Roadmap) STEP 02 Location & GIS National address, district code & map pin. STEP 03 Ownership Owner link, commission split & bank accounts. STEP 04 Unit Directory Bulk unit import, room counts & tariff tiers. STEP 05 Documentation Title deed, municipal permits & photo gallery. STEP 06 Verification Compliance check and final ledger activation.">
<summary class="flex items-center justify-between font-label-lg text-label-lg text-on-surface font-bold list-none select-none">
<div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined text-primary text-[20px]">account_tree</span>
<span>View Remaining Intake Sequence (Steps 2 – 6 Roadmap)</span>
</div>
<span class="material-symbols-outlined text-[20px] text-on-surface-variant group-open:rotate-180 transition-transform">expand_more</span>
</summary>
<div class="grid grid-cols-1 md:grid-cols-5 gap-space-sm pt-space-md mt-space-sm bg-surface-container-lowest">
<div class="p-space-sm bg-surface-container-low rounded-lg flex flex-col gap-1">
<div class="flex items-center justify-between font-label-sm text-label-sm text-on-surface-variant">
<span>STEP 02</span>
<span class="material-symbols-outlined text-[16px]">location_on</span>
</div>
<span class="font-label-md text-label-md text-on-surface font-semibold">Location & GIS</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">National address, district code & map pin.</span>
</div>
<div class="p-space-sm bg-surface-container-low rounded-lg flex flex-col gap-1">
<div class="flex items-center justify-between font-label-sm text-label-sm text-on-surface-variant">
<span>STEP 03</span>
<span class="material-symbols-outlined text-[16px]">group</span>
</div>
<span class="font-label-md text-label-md text-on-surface font-semibold">Ownership</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Owner link, commission split & bank accounts.</span>
</div>
<div class="p-space-sm bg-surface-container-low rounded-lg flex flex-col gap-1">
<div class="flex items-center justify-between font-label-sm text-label-sm text-on-surface-variant">
<span>STEP 04</span>
<span class="material-symbols-outlined text-[16px]">door_front</span>
</div>
<span class="font-label-md text-label-md text-on-surface font-semibold">Unit Directory</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Bulk unit import, room counts & tariff tiers.</span>
</div>
<div class="p-space-sm bg-surface-container-low rounded-lg flex flex-col gap-1">
<div class="flex items-center justify-between font-label-sm text-label-sm text-on-surface-variant">
<span>STEP 05</span>
<span class="material-symbols-outlined text-[16px]">upload_file</span>
</div>
<span class="font-label-md text-label-md text-on-surface font-semibold">Documentation</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Title deed, municipal permits & photo gallery.</span>
</div>
<div class="p-space-sm bg-surface-container-low rounded-lg flex flex-col gap-1">
<div class="flex items-center justify-between font-label-sm text-label-sm text-on-surface-variant">
<span>STEP 06</span>
<span class="material-symbols-outlined text-[16px]">fact_check</span>
</div>
<span class="font-label-md text-label-md text-on-surface font-semibold">Verification</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Compliance check and final ledger activation.</span>
</div>
</div>
</details>
</div>
</div>
<!-- Right Section: Wizard Context Rail & Helper Cards (4 Columns) -->
<div class="lg:col-span-4 flex flex-col gap-space-md">
<!-- Progress Completion Card with SVG Visual Ring -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col gap-space-sm">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-bold">
            Intake Completeness
          </span>
<span class="font-label-sm text-label-sm bg-primary-fixed text-on-primary-fixed-variant px-2 py-0.5 rounded-full font-bold">
            Draft Active
          </span>
</div>
<div class="flex items-center gap-space-md my-1">
<!-- Circular Progress Meter SVG -->
<div class="relative w-16 h-16 shrink-0 flex items-center justify-center">
<svg class="w-16 h-16 transform -rotate-90" viewBox="0 0 36 36">
<!-- Background Ring -->
<path class="text-surface-container" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="3.5"></path>
<!-- Animated / Filled Ring (Step 1 is 85% of its own stage, ~16% total process) -->
<path class="text-primary" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-dasharray="16, 100" stroke-linecap="round" stroke-width="3.5"></path>
</svg>
<div class="absolute flex flex-col items-center justify-center">
<span class="font-headline-sm text-headline-sm font-bold text-on-surface leading-none">16%</span>
</div>
</div>
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-on-surface font-bold leading-tight">Step 1 of 6</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Step 1 is 85% completed. 5 mandatory steps remaining before registry activation.</span>
</div>
</div>
<div class="w-full bg-surface-container rounded-full h-2 overflow-hidden">
<div class="bg-primary h-2 rounded-full w-[85%] transition-all duration-500"></div>
</div>
<div class="flex items-center justify-between text-on-surface-variant font-label-sm text-label-sm">
<span>Active Step: Basic Information</span>
<span class="font-semibold text-primary">Almost done</span>
</div>
</div>
<!-- Auto-Save Status Capsule -->
<div class="bg-surface-container-lowest rounded-xl p-space-sm shadow-sm flex items-center justify-between">
<div class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
<span class="font-label-md text-label-md text-on-surface font-medium">Draft auto-saved 2 mins ago</span>
</div>
<span class="font-label-sm text-label-sm font-mono text-on-surface-variant bg-surface-container-low px-2 py-0.5 rounded">
          #DFT-9042
        </span>
</div>
<!-- Quick Guidelines for Registration -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col gap-space-sm">
<div class="flex items-center gap-space-xs text-primary pb-1">
<span class="material-symbols-outlined text-[20px]">lightbulb</span>
<h4 class="font-headline-sm text-headline-sm text-on-surface font-bold">Registration Guidelines</h4>
</div>
<div class="flex flex-col gap-space-sm">
<!-- Guideline 1 -->
<div class="flex items-start gap-space-xs">
<div class="w-5 h-5 rounded-full bg-primary/10 text-primary flex items-center justify-center shrink-0 mt-0.5 font-label-sm text-label-sm font-bold">
              1
            </div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-semibold">Ownership Affiliation</span>
<p class="font-body-sm text-body-sm text-on-surface-variant">
                Property managers can associate assets with existing verified institutional owners or onboard new deed-holders in Step 3.
              </p>
</div>
</div>
<!-- Guideline 2 -->
<div class="flex items-start gap-space-xs">
<div class="w-5 h-5 rounded-full bg-primary/10 text-primary flex items-center justify-center shrink-0 mt-0.5 font-label-sm text-label-sm font-bold">
              2
            </div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-semibold">Multi-Currency & Regions</span>
<p class="font-body-sm text-body-sm text-on-surface-variant">
                Majlis supports SAR, AED, USD, and EUR tariff structures. Exchange rate anchors are applied automatically based on tenant origin.
              </p>
</div>
</div>
<!-- Guideline 3 -->
<div class="flex items-start gap-space-xs">
<div class="w-5 h-5 rounded-full bg-primary/10 text-primary flex items-center justify-center shrink-0 mt-0.5 font-label-sm text-label-sm font-bold">
              3
            </div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-semibold">Ejar & Wafi Compliance</span>
<p class="font-body-sm text-body-sm text-on-surface-variant">
                Reference numbers generated adhere to Saudi Ministry of Housing and Ejar unified digital contract protocols.
              </p>
</div>
</div>
</div>
</div>
<!-- Architectural Asset Photo Preview Container -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col gap-space-sm">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface font-bold">Primary Asset Rendering</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Optional Preview</span>
</div>
<div class="relative w-full h-44 rounded-lg overflow-hidden group shadow-inner">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Modern luxury Middle Eastern residential building architecture in Riyadh, clean beige limestone facade, expansive glass balconies, subtle desert dusk lighting, high-end institutional architectural photography, quiet luxury aesthetic" src="{{ asset('assets/aqar/images/a0e429c91a81783da015.jpg') }}" alt="Modern luxury Middle Eastern residential building architecture in Riyadh, clean beige limestone facade, expansive glass balconies, subtle desert dusk lighting, high-end institutional architectural photography, quiet luxury aesthetic">
<div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-transparent to-transparent flex items-end p-space-sm">
<div class="flex items-center justify-between w-full text-on-primary">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold">Al-Yasmin Compound II</span>
<span class="font-body-sm text-body-sm opacity-90">Architectural Plan Uploaded</span>
</div>
<span class="material-symbols-outlined text-[20px]">photo_camera</span>
</div>
</div>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
          Comprehensive multi-angle photos and title deeds will be officially archived in Step 5.
        </p>
</div>
<!-- Direct Assistance Callout -->
<div class="bg-primary/5 rounded-xl p-space-md flex items-center justify-between">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-full bg-primary text-on-primary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[20px]">support_agent</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-bold">Need assistance?</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Contact Portfolio Advisory Desk</span>
</div>
</div>
<button class="px-2.5 py-1.5 rounded-lg bg-surface-container-lowest text-primary font-label-md text-label-md font-semibold hover:bg-primary hover:text-on-primary transition-colors shadow-sm" type="button" data-demo="Chat">
          Chat
        </button>
</div>
</div>
</div>
</div>
@endsection
