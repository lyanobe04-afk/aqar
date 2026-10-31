{{-- Imported from client_demo/screens/add-property-step-2/code.html; static demonstration data. --}}
@extends('layouts.manager')
@section('content')
<div class="flex flex-col w-full pb-space-xl">
<!-- Top Utility & Breadcrumb Bar -->
<div class="flex flex-col md:flex-row md:items-center justify-between gap-space-md mb-space-lg">
<div class="flex flex-col gap-1">
<div class="flex items-center gap-space-xs text-on-surface-variant font-label-md text-label-md">
<a class="hover:text-primary transition-colors" href="{{ route('manager.properties') }}">Properties</a>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<a class="hover:text-primary transition-colors" href="{{ route('manager.add-property-1') }}">Add New Property</a>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="text-primary font-semibold">Step 2: Location</span>
</div>
<div class="flex items-center gap-space-sm mt-0.5">
<h2 class="font-headline-lg text-headline-lg text-on-surface font-bold tracking-tight">Add New Property</h2>
<span class="px-2.5 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-semibold uppercase tracking-wider">Draft #DFT-9042</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant max-w-2xl">
        Specify global geographic coordinates, regional jurisdiction, and precise localized address metadata.
      </p>
</div>
<!-- Top Action Buttons -->
<div class="flex items-center gap-space-sm self-start md:self-center shrink-0">
<a class="px-4 py-2 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-lg text-label-lg font-medium transition-all duration-150 flex items-center gap-2" href="{{ route('manager.properties') }}">
<span class="material-symbols-outlined text-[18px]">close</span>
<span>Cancel</span>
</a>
<button class="px-4 py-2 rounded-lg bg-surface-container-lowest text-on-surface hover:text-primary hover:bg-surface-container-low font-label-lg text-label-lg font-medium transition-all duration-150 shadow-sm flex items-center gap-2" type="button" data-demo="Save Draft">
<span class="material-symbols-outlined text-[18px]">bookmark_border</span>
<span>Save Draft</span>
</button>
</div>
</div>
<!-- Horizontal 6-Step Stepper -->
@include('components.manager.property-steps')
<!-- Main Content Layout (70% Form & Map / 30% Summary & Guidelines) -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-start">
<!-- Left Column: Form & Map (70% ~ 8 of 12 cols on desktop) -->
<div class="lg:col-span-8 flex flex-col gap-space-lg">
<!-- Card 1: Section Header & Adaptive Address Form -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm p-space-lg flex flex-col gap-space-md">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm pb-space-sm bg-surface-container-low/40 -mx-space-lg -mt-space-lg p-space-lg rounded-t-xl">
<div class="flex flex-col">
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[22px]">pin_drop</span>
              Step 2: Property Geographic Location & Address
            </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
              Fields dynamically adjust based on the selected country's postal conventions and municipal taxonomy.
            </p>
</div>
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm font-semibold shrink-0">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
            Universal Address Standard
          </span>
</div>
<!-- Address Form Controls -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-md pt-2">
<!-- Country Selector (Full Width) -->
<div class="md:col-span-2 flex flex-col gap-1.5">
<div class="flex items-center justify-between">
<label class="font-label-md text-label-md text-on-surface font-semibold flex items-center gap-1">
                Country / Sovereign Territory
                <span class="text-error font-bold">*</span>
</label>
<span class="font-label-sm text-label-sm text-on-surface-variant">ISO 3166-1 Compliant</span>
</div>
<div class="relative">
<div class="absolute left-3.5 top-1/2 -translate-y-1/2 flex items-center pointer-events-none text-[20px]">
                🇸🇦
              </div>
<select class="w-full h-11 pl-11 pr-10 bg-surface-container-low rounded-lg text-on-surface font-body-md text-body-md hover:bg-surface-container focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary outline-none transition-all cursor-pointer" id="country-select">
<option selected="" value="SA">Saudi Arabia (KSA) 🇸🇦 — Saudi Post National Address System</option>
<option value="AE">United Arab Emirates (UAE) 🇦🇪 — Makani / Onwani System</option>
<option value="BH">Kingdom of Bahrain 🇧🇭 — Block & Road Convention</option>
<option value="QA">State of Qatar 🇶🇦 — Blue Plate Numbering</option>
<option value="KW">State of Kuwait 🇰🇼 — PACI Civil ID Numbering</option>
<option value="OM">Sultanate of Oman 🇴🇲 — Muscat Way System</option>
<option value="GB">United Kingdom (UK) 🇬🇧 — Royal Mail Postcode Standard</option>
<option value="US">United States of America 🇺🇸 — USPS Universal Zip+4</option>
<option value="FR">France 🇫🇷 — Système d'Adresses Municipales</option>
<option value="EG">Arab Republic of Egypt 🇪🇬 — National Postal District</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none text-[20px]">expand_more</span>
</div>
<p class="font-body-sm text-[12px] text-on-surface-variant">
              Determines municipal field naming conventions, postal verification protocols, and tax jurisdiction.
            </p>
</div>
<!-- Region / State / Province -->
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold flex items-center gap-1">
              State / Province / Region
              <span class="text-error font-bold">*</span>
</label>
<input class="w-full h-10 px-3.5 bg-surface-container-low rounded-lg text-on-surface font-body-md text-body-md focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary outline-none transition-all placeholder-on-surface-variant" type="text" value="Riyadh Province (منطقة الرياض)">
<span class="font-label-sm text-[11px] text-on-surface-variant">Administrative Region 01</span>
</div>
<!-- City -->
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold flex items-center gap-1">
              City / Municipality
              <span class="text-error font-bold">*</span>
</label>
<div class="relative">
<input class="w-full h-10 pl-3.5 pr-9 bg-surface-container-low rounded-lg text-on-surface font-body-md text-body-md focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary outline-none transition-all" type="text" value="Riyadh">
<span class="material-symbols-outlined absolute right-2.5 top-1/2 -translate-y-1/2 text-on-surface-variant text-[18px]">location_city</span>
</div>
<span class="font-label-sm text-[11px] text-on-surface-variant">Metro code: RYD-C</span>
</div>
<!-- District / Neighborhood -->
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold flex items-center gap-1">
              District / Neighborhood
              <span class="text-error font-bold">*</span>
</label>
<input class="w-full h-10 px-3.5 bg-surface-container-low rounded-lg text-on-surface font-body-md text-body-md focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary outline-none transition-all" type="text" value="Al-Yasmin District (حي الياسمين)">
<span class="font-label-sm text-[11px] text-on-surface-variant">Zone 14 • North Riyadh Expansion</span>
</div>
<!-- Street Address -->
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold flex items-center gap-1">
              Street Address & Arterial
              <span class="text-error font-bold">*</span>
</label>
<input class="w-full h-10 px-3.5 bg-surface-container-low rounded-lg text-on-surface font-body-md text-body-md focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary outline-none transition-all" type="text" value="Abu Bakr As-Siddiq Road, Sector 4">
<span class="font-label-sm text-[11px] text-on-surface-variant">Primary Frontage Entrance</span>
</div>
<!-- Building Number -->
<div class="flex flex-col gap-1.5">
<div class="flex items-center justify-between">
<label class="font-label-md text-label-md text-on-surface font-semibold">Building Number</label>
<span class="font-label-sm text-label-sm text-on-surface-variant">Optional</span>
</div>
<div class="relative">
<input class="w-full h-10 pl-3.5 pr-8 bg-surface-container-low rounded-lg text-on-surface font-body-md text-body-md focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary outline-none transition-all font-mono" type="text" value="Bldg 7420">
<span class="material-symbols-outlined absolute right-2.5 top-1/2 -translate-y-1/2 text-on-surface-variant text-[18px]">domain</span>
</div>
<span class="font-label-sm text-[11px] text-on-surface-variant">National 4-Digit Parcel Tag</span>
</div>
<!-- Postal / ZIP Code -->
<div class="flex flex-col gap-1.5">
<div class="flex items-center justify-between">
<label class="font-label-md text-label-md text-on-surface font-semibold">Postal / ZIP Code</label>
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface-variant font-label-sm text-[11px] font-medium">5-digit KSA Postal Code</span>
</div>
<div class="relative">
<input class="w-full h-10 pl-3.5 pr-8 bg-surface-container-low rounded-lg text-on-surface font-body-md text-body-md focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary outline-none transition-all font-mono" type="text" value="13325">
<span class="material-symbols-outlined absolute right-2.5 top-1/2 -translate-y-1/2 text-[#2E7D32] text-[18px]">verified</span>
</div>
<span class="font-label-sm text-[11px] text-[#2E7D32] font-medium">Validated with SPL Address Registry</span>
</div>
<!-- Additional Address Details (Full Width) -->
<div class="md:col-span-2 flex flex-col gap-1.5">
<div class="flex items-center justify-between">
<label class="font-label-md text-label-md text-on-surface font-semibold">Additional Address Details & Wayfinding Landmarks</label>
<span class="font-label-sm text-label-sm text-on-surface-variant">Optional</span>
</div>
<textarea class="w-full p-3 bg-surface-container-low rounded-lg text-on-surface font-body-md text-body-md focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary outline-none transition-all resize-none" placeholder="e.g. Opposite Al-Yasmin Square, Gate 2 East Entrance, next to Sultan Garden Plaza" rows="2">Opposite Al-Yasmin Square, Gate 2 East Entrance. Directly accessible from the northern service road.</textarea>
<span class="font-body-sm text-[12px] text-on-surface-variant">Supplies crucial directions for dispatch units, emergency services, and courier routing.</span>
</div>
</div>
</div>
<!-- Card 2: Interactive Geolocation & Map Studio -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm p-space-lg flex flex-col gap-space-md">
<!-- Header & Map Modes -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm pb-space-xs">
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[22px]">travel_explore</span>
              Interactive Geographic Positioning & Map Pin
            </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">
              Drag the marker or search by landmark to pinpoint high-accuracy spatial coordinates.
            </p>
</div>
<!-- View switcher controls -->
<div class="inline-flex p-1 bg-surface-container-low rounded-lg items-center self-start sm:self-auto shadow-inner">
<button class="px-3 py-1 rounded bg-surface-container-lowest text-primary font-label-md text-label-md font-semibold shadow-sm transition-all" type="button" data-demo="Vector Carto">Vector Carto</button>
<button class="px-3 py-1 rounded text-on-surface-variant hover:text-on-surface font-label-md text-label-md font-medium transition-all" type="button" data-demo="Satellite View">Satellite View</button>
<button class="px-3 py-1 rounded text-on-surface-variant hover:text-on-surface font-label-md text-label-md font-medium transition-all" type="button" data-demo="Terrain">Terrain</button>
</div>
</div>
<!-- Search location bar above map -->
<div class="flex flex-col sm:flex-row items-center gap-space-xs">
<div class="relative flex-1 w-full">
<span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]">search</span>
<input class="w-full h-11 pl-10 pr-4 bg-surface-container-low rounded-lg text-on-surface font-body-md text-body-md focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary outline-none transition-all placeholder-on-surface-variant" id="map-search" placeholder="Search landmark, street, or GPS coordinates (e.g. 24.8256, 46.6391)" type="text" value="Al-Yasmin Compound, Abu Bakr As-Siddiq Rd, Riyadh">
<button class="absolute right-2.5 top-1/2 -translate-y-1/2 text-on-surface-variant hover:text-primary transition-colors" type="button" data-demo="mic" aria-label="mic">
<span class="material-symbols-outlined text-[18px]">mic</span>
</button>
</div>
<button class="w-full sm:w-auto h-11 px-5 rounded-lg bg-surface-container-high hover:bg-surface-container hover:text-primary text-on-surface font-label-lg text-label-lg font-medium transition-colors flex items-center justify-center gap-2 shrink-0" type="button" data-demo="Locate on Map">
<span class="material-symbols-outlined text-[18px]">my_location</span>
<span>Locate on Map</span>
</button>
</div>
<!-- Realistic Styled Vector Map Canvas Mockup -->
<div class="relative w-full h-[380px] rounded-xl overflow-hidden bg-[#ECE8E4] select-none shadow-inner">
<!-- Background SVG Vector Map Pattern -->
<svg class="absolute inset-0 w-full h-full" preserveAspectRatio="xMidYMid slice" viewBox="0 0 800 450" xmlns="http://www.w3.org/2000/svg">
<!-- Background base surface -->
<rect fill="#F4EFEA" height="450" width="800"></rect>
<!-- Green Park / Garden Zones -->
<path d="M 50,20 C 120,40 180,80 160,160 C 140,240 60,200 30,140 Z" fill="#E2EADB"></path>
<path d="M 580,260 C 640,240 730,270 760,340 C 780,410 700,430 630,410 C 560,390 540,300 580,260 Z" fill="#E2EADB"></path>
<!-- Neighborhood Building Footprints -->
<rect fill="#E8DFD8" height="50" rx="3" width="70" x="220" y="40"></rect>
<rect fill="#E8DFD8" height="40" rx="3" width="95" x="310" y="45"></rect>
<rect fill="#E8DFD8" height="60" rx="3" width="80" x="230" y="110"></rect>
<rect fill="#E8DFD8" height="65" rx="3" width="75" x="330" y="105"></rect>
<rect fill="#E8DFD8" height="55" rx="3" width="110" x="460" y="50"></rect>
<rect fill="#E8DFD8" height="50" rx="3" width="90" x="600" y="55"></rect>
<rect fill="#E8DFD8" height="65" rx="3" width="100" x="470" y="130"></rect>
<rect fill="#E8DFD8" height="70" rx="3" width="120" x="590" y="125"></rect>
<rect fill="#E8DFD8" height="65" rx="3" width="90" x="80" y="270"></rect>
<rect fill="#E8DFD8" height="55" rx="3" width="120" x="190" y="280"></rect>
<rect fill="#E8DFD8" height="70" rx="3" width="80" x="90" y="355"></rect>
<rect fill="#E8DFD8" height="60" rx="3" width="115" x="190" y="360"></rect>
<!-- Target Compound Footprint (Highlighted Asset) -->
<rect fill="#FCECEE" height="110" rx="6" stroke="#1F4E78" stroke-dasharray="4,4" stroke-width="2" width="150" x="365" y="225"></rect>
<text fill="#1F4E78" font-family="Inter, sans-serif" font-size="11" font-weight="600" x="380" y="270">AL-YASMIN COMPOUND II</text>
<text fill="#2E7D32" font-family="Inter, sans-serif" font-size="9" x="380" y="285">Parcel 7420 / G+4 Block</text>
<!-- Major Secondary Roads -->
<path d="M 0,190 L 800,205" stroke="#FFFFFF" stroke-linecap="round" stroke-width="22"></path>
<path d="M 0,190 L 800,205" stroke="#DDD4CB" stroke-width="2"></path>
<path d="M 430,0 L 415,450" stroke="#FFFFFF" stroke-linecap="round" stroke-width="26"></path>
<path d="M 430,0 L 415,450" stroke="#DDD4CB" stroke-width="2"></path>
<!-- Minor Streets -->
<path d="M 0,95 L 800,100" stroke="#FFFFFF" stroke-width="12"></path>
<path d="M 0,350 L 800,345" stroke="#FFFFFF" stroke-width="12"></path>
<path d="M 210,0 L 195,450" stroke="#FFFFFF" stroke-width="14"></path>
<path d="M 580,0 L 565,450" stroke="#FFFFFF" stroke-width="14"></path>
<!-- Road Labels -->
<text fill="#788797" font-family="Inter, sans-serif" font-size="10" font-weight="600" letter-spacing="1.5" transform="rotate(88 445,55)" x="445" y="55">ABU BAKR AS-SIDDIQ ROAD</text>
<text fill="#788797" font-family="Inter, sans-serif" font-size="10" font-weight="600" letter-spacing="1" x="235" y="198">SECTOR 4 ACCESS BLVD</text>
<text fill="#788797" font-family="Inter, sans-serif" font-size="9" font-weight="500" x="590" y="325">Al-Yasmin Park Zone</text>
</svg>
<!-- Floating Map Controls (Top Right) -->
<div class="absolute top-4 right-4 flex flex-col bg-surface-container-lowest/95 backdrop-blur-md rounded-lg shadow-md divide-y divide-surface-container overflow-hidden z-20">
<button class="w-9 h-9 flex items-center justify-center text-on-surface hover:text-primary hover:bg-surface-container transition-colors" title="Zoom in" type="button" data-demo="Zoom in" aria-label="Zoom in">
<span class="material-symbols-outlined text-[20px]">add</span>
</button>
<button class="w-9 h-9 flex items-center justify-center text-on-surface hover:text-primary hover:bg-surface-container transition-colors" title="Zoom out" type="button" data-demo="Zoom out" aria-label="Zoom out">
<span class="material-symbols-outlined text-[20px]">remove</span>
</button>
<button class="w-9 h-9 flex items-center justify-center text-on-surface hover:text-primary hover:bg-surface-container transition-colors" title="Reset Pin to Asset Center" type="button" data-demo="Reset Pin to Asset Center" aria-label="Reset Pin to Asset Center">
<span class="material-symbols-outlined text-[19px]">restart_alt</span>
</button>
<button class="w-9 h-9 flex items-center justify-center text-on-surface hover:text-primary hover:bg-surface-container transition-colors" title="Fullscreen" type="button" data-demo="Fullscreen" aria-label="Fullscreen">
<span class="material-symbols-outlined text-[18px]">fullscreen</span>
</button>
</div>
<!-- Compass & Scale Badge (Top Left) -->
<div class="absolute top-4 left-4 z-20 flex items-center gap-2">
<div class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container-lowest/90 backdrop-blur-md shadow-sm font-label-sm text-label-sm font-medium text-on-surface">
<span class="material-symbols-outlined text-primary text-[16px] animate-spin-slow">explore</span>
<span>24.8256° N, 46.6391° E</span>
</div>
<div class="px-2 py-1.5 rounded-lg bg-surface-container-lowest/90 backdrop-blur-md shadow-sm font-mono text-[11px] text-on-surface-variant font-medium">
              100m ━
            </div>
</div>
<!-- Draggable Pin & Floating Tooltip Card (Center Placement) -->
<div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-30 flex flex-col items-center pointer-events-none">
<!-- Floating Location Info Pill (Above Pin) -->
<div class="mb-2 px-3.5 py-2 bg-inverse-surface/95 text-inverse-on-surface rounded-xl shadow-xl flex items-center gap-2.5 max-w-xs animate-bounce-subtle pointer-events-auto">
<div class="w-2 h-2 rounded-full bg-[#34D399] shrink-0 animate-ping"></div>
<div class="flex flex-col text-left">
<span class="font-label-md text-label-md font-bold text-white truncate">Al-Yasmin Compound II</span>
<span class="font-body-sm text-[11px] text-[#D1D5DB] tracking-wide font-mono">24.8256° N, 46.6391° E (±3m)</span>
</div>
<span class="material-symbols-outlined text-[16px] text-white/70 ml-1">open_with</span>
</div>
<!-- Custom Branded Burgundy Pin Marker -->
<div class="relative cursor-grab active:cursor-grabbing pointer-events-auto group">
<!-- Ripple Pulse Ring -->
<div class="absolute -inset-2 rounded-full bg-primary/20 animate-ping pointer-events-none"></div>
<div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-on-primary shadow-xl border-2 border-white ring-2 ring-primary/30 transform group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">domain</span>
</div>
<!-- Pin Pointer Stem -->
<div class="w-0 h-0 border-l-[6px] border-l-transparent border-r-[6px] border-r-transparent border-t-[8px] border-t-primary mx-auto"></div>
<!-- Shadow Dot on Ground -->
<div class="w-3.5 h-1.5 bg-black/30 rounded-full mx-auto blur-[1.5px] mt-0.5"></div>
</div>
</div>
<!-- Bottom Action Bar Inside Map -->
<div class="absolute bottom-3 inset-x-3 z-20 flex flex-col sm:flex-row items-center justify-between gap-2 p-2 rounded-xl bg-surface-container-lowest/95 backdrop-blur-md shadow-md">
<div class="flex items-center gap-2 pl-2">
<span class="w-2.5 h-2.5 rounded-full bg-[#2E7D32]"></span>
<span class="font-label-sm text-label-sm text-on-surface font-semibold">Asset Geofence Centered</span>
<span class="text-on-surface-variant font-body-sm text-[11px]">| Drag pin to adjust boundary</span>
</div>
<div class="flex items-center gap-2 self-stretch sm:self-auto">
<button class="flex-1 sm:flex-none px-3 py-1.5 rounded-lg bg-surface-container text-on-surface-variant hover:text-on-surface font-label-md text-label-md font-medium transition-colors" type="button" data-demo="Clear Coordinates">
                Clear Coordinates
              </button>
<button class="flex-1 sm:flex-none px-3.5 py-1.5 rounded-lg bg-primary hover:bg-[#1F4E78] text-on-primary font-label-md text-label-md font-semibold transition-all flex items-center justify-center gap-1.5 shadow-sm active:scale-95" type="button" data-demo="Use Selected Location">
<span class="material-symbols-outlined text-[16px]">check_circle</span>
<span>Use Selected Location</span>
</button>
</div>
</div>
</div>
<!-- Lat / Long Synced Numeric Inputs -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md pt-space-xs">
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold flex items-center justify-between">
<span>Latitude (Decimal Degrees)</span>
<span class="font-label-sm text-label-sm text-on-surface-variant font-mono">N 24° 49' 32.2"</span>
</label>
<div class="relative">
<input class="w-full h-10 pl-3.5 pr-8 bg-surface-container-low rounded-lg text-on-surface font-mono text-body-md focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary outline-none transition-all" id="geo-lat" type="text" value="24.825619">
<span class="material-symbols-outlined absolute right-2.5 top-1/2 -translate-y-1/2 text-on-surface-variant text-[18px]">north</span>
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold flex items-center justify-between">
<span>Longitude (Decimal Degrees)</span>
<span class="font-label-sm text-label-sm text-on-surface-variant font-mono">E 46° 38' 20.7"</span>
</label>
<div class="relative">
<input class="w-full h-10 pl-3.5 pr-8 bg-surface-container-low rounded-lg text-on-surface font-mono text-body-md focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary outline-none transition-all" id="geo-lng" type="text" value="46.639104">
<span class="material-symbols-outlined absolute right-2.5 top-1/2 -translate-y-1/2 text-on-surface-variant text-[18px]">east</span>
</div>
</div>
<p class="sm:col-span-2 font-body-sm text-[12px] text-on-surface-variant flex items-center gap-1.5">
<span class="material-symbols-outlined text-primary text-[16px]">info</span>
            Coordinates are automatically updated when dragging the pin or can be entered manually for survey-grade surveyor blueprints.
          </p>
</div>
</div>
<!-- Bottom Step Navigation Actions -->
<div class="flex flex-col sm:flex-row items-center justify-between gap-space-md pt-space-xs">
<a class="w-full sm:w-auto px-5 py-2.5 rounded-lg bg-surface-container-lowest text-on-surface hover:bg-surface-container-low font-label-lg text-label-lg font-semibold transition-all shadow-sm flex items-center justify-center gap-2 group" href="{{ route('manager.add-property-1') }}">
<span class="material-symbols-outlined text-[20px] transition-transform group-hover:-translate-x-1">arrow_back</span>
<span>Back to Basic Information</span>
</a>
<div class="flex items-center gap-space-sm w-full sm:w-auto">
<button class="flex-1 sm:flex-none px-4 py-2.5 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-lg text-label-lg font-medium transition-all duration-150" type="button" data-demo="Save Draft">
            Save Draft
          </button>
<a class="flex-1 sm:flex-none px-6 py-2.5 rounded-lg bg-primary hover:bg-[#1F4E78] text-on-primary font-label-lg text-label-lg font-bold shadow-md hover:shadow-lg transition-all duration-150 flex items-center justify-center gap-2 group active:scale-95" href="{{ route('manager.add-property-3') }}">
<span>Continue to Ownership & Management (Step 3)</span>
<span class="material-symbols-outlined text-[20px] transition-transform group-hover:translate-x-1">arrow_forward</span>
</a>
</div>
</div>
</div>
<!-- Right Column: Intake Summary, Step Progress & Guidelines (30% ~ 4 of 12 cols) -->
<div class="lg:col-span-4 flex flex-col gap-space-md">
<!-- Property Intake Summary Card (Preserved from Step 1) -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm p-space-lg flex flex-col gap-space-md relative overflow-hidden">
<!-- Header with Progress Ring -->
<div class="flex items-start justify-between gap-2 pb-space-sm border-b border-surface-container-low">
<div class="flex flex-col">
<div class="flex items-center gap-2 mb-1">
<span class="font-label-sm text-label-sm text-primary font-bold uppercase tracking-wider">Intake Record</span>
<span class="px-2 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-[11px] font-semibold">Step 2 of 6</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface font-bold">Al-Yasmin Compound II</h4>
<span class="font-mono text-body-sm text-[12px] text-on-surface-variant">PRP-RYD-2024-0089</span>
</div>
<!-- Circular Progress Indicator (33% Complete) -->
<div class="relative w-12 h-12 shrink-0 flex items-center justify-center">
<svg class="w-full h-full -rotate-90" viewBox="0 0 36 36">
<path class="text-surface-container" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="3.5"></path>
<path class="text-primary" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-dasharray="33.3, 100" stroke-linecap="round" stroke-width="3.5"></path>
</svg>
<span class="absolute font-label-sm text-[11px] font-bold text-primary">33%</span>
</div>
</div>
<!-- Preserved Basic Info Data Points -->
<div class="flex flex-col gap-2.5">
<span class="font-label-sm text-label-sm text-on-surface-variant font-semibold uppercase tracking-wider">Preserved Metadata (Step 1)</span>
<div class="flex items-center justify-between p-2 rounded-lg bg-surface-container-low/60">
<span class="font-body-sm text-body-sm text-on-surface-variant">Property Type</span>
<span class="font-label-md text-label-md text-on-surface font-semibold text-right">Residential Compound</span>
</div>
<div class="flex items-center justify-between p-2 rounded-lg bg-surface-container-low/60">
<span class="font-body-sm text-body-sm text-on-surface-variant">Asset Architecture</span>
<span class="font-label-md text-label-md text-on-surface font-semibold text-right">Multi-Unit Matrix</span>
</div>
<div class="flex items-center justify-between p-2 rounded-lg bg-surface-container-low/60">
<span class="font-body-sm text-body-sm text-on-surface-variant">Furnishing State</span>
<span class="font-label-md text-label-md text-on-surface font-semibold text-right">Partially Furnished</span>
</div>
<div class="flex items-center justify-between p-2 rounded-lg bg-surface-container-low/60">
<span class="font-body-sm text-body-sm text-on-surface-variant">Lifecycle Status</span>
<span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded bg-[#EBF6F0] text-[#2E7D32] font-label-sm text-[11px] font-bold">
<span class="w-1.5 h-1.5 rounded-full bg-[#2E7D32]"></span>
              Active (Operational)
            </span>
</div>
</div>
<div class="pt-2 flex justify-end">
<a class="text-primary hover:text-[#1F4E78] font-label-md text-label-md font-semibold flex items-center gap-1" href="{{ route('manager.add-property-1') }}">
<span class="material-symbols-outlined text-[16px]">edit</span>
<span>Edit Basic Information</span>
</a>
</div>
</div>
<!-- Location Guidelines Card -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm p-space-lg flex flex-col gap-space-md">
<h4 class="font-headline-sm text-headline-sm text-on-surface font-bold flex items-center gap-2">
<span class="material-symbols-outlined text-secondary text-[20px]">public</span>
          Location Guidelines
        </h4>
<!-- Guideline Item 1 -->
<div class="flex gap-space-sm items-start">
<div class="w-7 h-7 rounded-lg bg-surface-container flex items-center justify-center text-primary shrink-0 mt-0.5">
<span class="material-symbols-outlined text-[18px]">language</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-semibold">Global Address Adaptability</span>
<p class="font-body-sm text-[13px] text-on-surface-variant mt-0.5">
              Postal codes, emirate/state structures, and street conventions automatically configure for GCC, UK, EU, US, and Asian jurisdictions.
            </p>
</div>
</div>
<!-- Guideline Item 2 -->
<div class="flex gap-space-sm items-start">
<div class="w-7 h-7 rounded-lg bg-surface-container flex items-center justify-center text-secondary shrink-0 mt-0.5">
<span class="material-symbols-outlined text-[18px]">near_me</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-semibold">Geofencing & Tenant Directions</span>
<p class="font-body-sm text-[13px] text-on-surface-variant mt-0.5">
              The calibrated pin creates direct one-tap navigation deep links in Apple Maps, Google Maps, and field maintenance dispatcher apps.
            </p>
</div>
</div>
<!-- Guideline Item 3 -->
<div class="flex gap-space-sm items-start">
<div class="w-7 h-7 rounded-lg bg-surface-container flex items-center justify-center text-[#2E7D32] shrink-0 mt-0.5">
<span class="material-symbols-outlined text-[18px]">verified_user</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-semibold">Cadastral Verification</span>
<p class="font-body-sm text-[13px] text-on-surface-variant mt-0.5">
              Official deed boundary matching is verified during Step 5 (Deeds & Documents Upload) using the GPS polygon recorded here.
            </p>
</div>
</div>
</div>
<!-- Need Assistance Card -->
<div class="bg-surface-container-low rounded-xl p-space-md flex items-center justify-between gap-space-sm shadow-sm">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-full bg-primary-container text-on-primary flex items-center justify-center shrink-0 shadow-sm">
<span class="material-symbols-outlined text-[20px]">support_agent</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-semibold">GIS Operations Desk</span>
<span class="font-body-sm text-[12px] text-on-surface-variant">Need help with boundary pins?</span>
</div>
</div>
<button class="px-3.5 py-1.5 rounded-lg bg-surface-container-lowest hover:bg-surface-container-high text-primary font-label-md text-label-md font-semibold transition-colors shadow-sm flex items-center gap-1 shrink-0" type="button" data-demo="Chat">
<span class="material-symbols-outlined text-[16px]">chat</span>
<span>Chat</span>
</button>
</div>
</div>
</div>
</div>

@endsection
