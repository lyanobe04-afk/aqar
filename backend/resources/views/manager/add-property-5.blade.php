{{-- Imported from client_demo/screens/add_new_property_step_5/code.html; static demonstration data. --}}
@extends('layouts.manager')
@section('content')
<div class="flex flex-col w-full gap-y-space-lg pb-28">
<!-- TOP BREADCRUMB & CONTEXT BAR -->
<div class="flex flex-wrap items-center justify-between gap-y-space-sm">
<div class="flex flex-col">
<div class="flex items-center gap-space-xs text-on-surface-variant font-label-md text-label-md">
<span class="hover:text-primary transition-colors cursor-pointer" role="button" tabindex="0" data-demo="Properties">Properties</span>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="hover:text-primary transition-colors cursor-pointer" role="button" tabindex="0" data-demo="Add New Property">Add New Property</span>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="text-primary font-semibold">Step 5: Photos & Documents</span>
</div>
<div class="flex items-center gap-space-sm mt-1">
<span class="font-headline-md text-headline-md text-on-surface font-bold tracking-tight">Step 5: Photos & Documents</span>
<span class="px-2.5 py-0.5 rounded-full bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm font-semibold tracking-wider uppercase">PRP-RYD-2026-0089</span>
</div>
</div>
<!-- Quick Meta Chips -->
<div class="flex items-center gap-space-sm">
<span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container text-on-surface font-label-md text-label-md">
<span class="w-2 h-2 rounded-full bg-emerald-600"></span>
        Al-Yasmin Compound II • Riyadh
      </span>
<span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container-low text-on-surface-variant font-label-md text-label-md">
<span class="material-symbols-outlined text-[16px]">cloud_done</span>
        Autosaved at 14:38
      </span>
</div>
</div>
<!-- 6-STEP WIZARD TRACKER -->
@include('components.manager.property-steps')
<!-- WORKSPACE SPLIT (MAIN CONTENT + SUMMARY DRAWER) -->
<div class="grid grid-cols-1 xl:grid-cols-12 gap-space-lg items-start">
<!-- LEFT 8.5 COLUMNS: STEP 5 SECTIONS -->
<div class="xl:col-span-8 flex flex-col gap-space-lg min-w-0">
<!-- SECTION 1: MAIN PROPERTY PHOTOS (GALLERY & MEDIA HUB) -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm p-space-lg flex flex-col gap-space-md">
<div class="flex flex-wrap items-center justify-between gap-space-sm">
<div class="flex items-center gap-space-sm">
<div class="w-9 h-9 rounded-lg bg-primary/10 text-primary flex items-center justify-center">
<span class="material-symbols-outlined text-[22px]">photo_library</span>
</div>
<div class="flex flex-col">
<h2 class="font-headline-sm text-headline-sm font-bold text-on-surface">1. Property Media Gallery (Compound Level)</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">General compound imagery, architectural exteriors, shared facilities, and marketing assets.</p>
</div>
</div>
<div class="flex items-center gap-space-xs">
<span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-800 font-label-sm text-label-sm font-medium flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">verified</span> 5 Compound Photos Ready
            </span>
</div>
</div>
<!-- Premium Dropzone -->
<div class="group relative rounded-xl bg-surface-container-low/70 hover:bg-surface-container-high/50 transition-all p-space-lg flex flex-col items-center justify-center text-center cursor-pointer">
<div class="w-14 h-14 rounded-full bg-primary/10 text-primary flex items-center justify-center mb-space-sm group-hover:scale-105 transition-transform">
<span class="material-symbols-outlined text-[28px]">cloud_upload</span>
</div>
<p class="font-label-lg text-label-lg font-bold text-on-surface">Drag & drop high-resolution property media here</p>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5 max-w-md">Supports JPG, PNG, WebP up to 15MB each. Recommended min 1920×1080px for high-DPI tenant showcases.</p>
<div class="flex items-center gap-space-sm mt-space-md">
<button class="px-4 py-2 rounded-lg bg-primary-container text-on-primary font-label-md text-label-md font-semibold hover:bg-primary transition-colors shadow-sm flex items-center gap-1.5" type="button" data-demo="Select Files">
<span class="material-symbols-outlined text-[18px]">add_photo_alternate</span>
              Select Files
            </button>
<button class="px-4 py-2 rounded-lg bg-surface-container-lowest text-on-surface font-label-md text-label-md font-medium hover:bg-surface-container transition-colors shadow-sm flex items-center gap-1.5" type="button" data-demo="Batch Upload Folder">
<span class="material-symbols-outlined text-[18px]">drive_folder_upload</span>
              Batch Upload Folder
            </button>
</div>
<!-- Optimization Indicator -->
<div class="mt-space-md inline-flex items-center gap-2 px-3 py-1 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[14px] text-emerald-700">task_alt</span>
<span>All media auto-compressed to WebP • EXIF metadata stripped for safety</span>
</div>
</div>
<!-- Media Grid Header / Controls -->
<div class="flex items-center justify-between pt-space-xs">
<div class="flex items-center gap-space-xs text-on-surface-variant font-label-md text-label-md">
<span class="material-symbols-outlined text-[18px]">swap_vert</span>
<span>Drag cards to reorder tenant portal presentation sequence</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant font-semibold">5 of 25 Max Media Uploaded</span>
</div>
<!-- Thumbnail Grid (5 Demonstration photos + Add Tile) -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-space-md">
<!-- Photo 1: Main Cover Photo -->
<div class="relative bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden flex flex-col group hover:shadow-md transition-shadow">
<div class="relative h-44 w-full bg-surface-container overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" data-alt="Expansive grand entrance of Al-Yasmin Compound in Riyadh featuring modern sandstone architectural pillars, royal palm trees along a stamped stone driveway under bright Saudi sunlight, elegant bronze security gates." src="{{ asset('assets/aqar/images/f397f23eac1d79849fa0.jpg') }}" alt="Expansive grand entrance of Al-Yasmin Compound in Riyadh featuring modern sandstone architectural pillars, royal palm trees along a stamped stone driveway under bright Saudi sunlight, elegant bronze security gates.">
<div class="absolute top-2 left-2 flex items-center gap-1 px-2.5 py-1 rounded-full bg-tertiary-container text-tertiary-fixed font-label-sm text-label-sm font-bold shadow-md">
<span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">star</span>
                Main Cover Photo
              </div>
<button class="absolute top-2 right-2 w-7 h-7 rounded-full bg-inverse-surface/60 backdrop-blur-md text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity" type="button" data-demo="drag_indicator" aria-label="drag indicator">
<span class="material-symbols-outlined text-[16px]">drag_indicator</span>
</button>
</div>
<div class="p-3 flex flex-col gap-1.5">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm font-bold text-on-surface truncate">Front Entrance & Royal Palm Gate</span>
<span class="font-label-sm text-[11px] text-on-surface-variant">4.2 MB</span>
</div>
<p class="font-body-sm text-[12px] text-on-surface-variant line-clamp-1">Front entrance gate & lush palm driveway</p>
<div class="flex items-center justify-between pt-1">
<span class="font-label-sm text-[10px] text-emerald-700 bg-emerald-50 px-1.5 py-0.5 rounded font-semibold">Cover Active</span>
<div class="flex items-center gap-1">
<button class="p-1 text-on-surface-variant hover:text-primary transition-colors" title="Edit Caption" type="button" data-demo="Edit Caption" aria-label="Edit Caption">
<span class="material-symbols-outlined text-[16px]">edit_note</span>
</button>
<button class="p-1 text-on-surface-variant hover:text-error transition-colors" title="Remove Photo" type="button" data-demo="Remove Photo" aria-label="Remove Photo">
<span class="material-symbols-outlined text-[16px]">delete</span>
</button>
</div>
</div>
</div>
</div>
<!-- Photo 2: Swimming Pool -->
<div class="relative bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden flex flex-col group hover:shadow-md transition-shadow">
<div class="relative h-44 w-full bg-surface-container overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" data-alt="Pristine semi-Olympic outdoor swimming pool within a luxury residential compound courtyard, surrounded by contemporary sun loungers, shaded pergolas, pristine turquoise water, and sleek glass-walled resident clubhouse." src="{{ asset('assets/aqar/images/ae2b24730f1be2e1bbb0.jpg') }}" alt="Pristine semi-Olympic outdoor swimming pool within a luxury residential compound courtyard, surrounded by contemporary sun loungers, shaded pergolas, pristine turquoise water, and sleek glass-walled resident clubhouse.">
<button class="absolute top-2 right-2 w-7 h-7 rounded-full bg-inverse-surface/60 backdrop-blur-md text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity" type="button" data-demo="drag_indicator" aria-label="drag indicator">
<span class="material-symbols-outlined text-[16px]">drag_indicator</span>
</button>
</div>
<div class="p-3 flex flex-col gap-1.5">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm font-bold text-on-surface truncate">Olympic Pool & Social Lounge</span>
<span class="font-label-sm text-[11px] text-on-surface-variant">3.8 MB</span>
</div>
<p class="font-body-sm text-[12px] text-on-surface-variant line-clamp-1">Olympic pool & resident social lounge</p>
<div class="flex items-center justify-between pt-1">
<button class="font-label-sm text-[11px] text-primary hover:underline font-medium" type="button" data-demo="Set as Cover">Set as Cover</button>
<div class="flex items-center gap-1">
<button class="p-1 text-on-surface-variant hover:text-primary transition-colors" title="Edit Caption" type="button" data-demo="Edit Caption" aria-label="Edit Caption">
<span class="material-symbols-outlined text-[16px]">edit_note</span>
</button>
<button class="p-1 text-on-surface-variant hover:text-error transition-colors" title="Remove Photo" type="button" data-demo="Remove Photo" aria-label="Remove Photo">
<span class="material-symbols-outlined text-[16px]">delete</span>
</button>
</div>
</div>
</div>
</div>
<!-- Photo 3: Courtyard Garden -->
<div class="relative bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden flex flex-col group hover:shadow-md transition-shadow">
<div class="relative h-44 w-full bg-surface-container overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" data-alt="Lush landscaped pedestrian courtyard inside an exclusive Riyadh residential compound, featuring winding granite pathways, sculpted native olive trees, desert flowers, ambient low-level architectural LED lights." src="{{ asset('assets/aqar/images/5623a0cb2eb29735f0a5.jpg') }}" alt="Lush landscaped pedestrian courtyard inside an exclusive Riyadh residential compound, featuring winding granite pathways, sculpted native olive trees, desert flowers, ambient low-level architectural LED lights.">
<button class="absolute top-2 right-2 w-7 h-7 rounded-full bg-inverse-surface/60 backdrop-blur-md text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity" type="button" data-demo="drag_indicator" aria-label="drag indicator">
<span class="material-symbols-outlined text-[16px]">drag_indicator</span>
</button>
</div>
<div class="p-3 flex flex-col gap-1.5">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm font-bold text-on-surface truncate">Landscaped Pedestrian Garden</span>
<span class="font-label-sm text-[11px] text-on-surface-variant">2.9 MB</span>
</div>
<p class="font-body-sm text-[12px] text-on-surface-variant line-clamp-1">Central landscaped pedestrian garden</p>
<div class="flex items-center justify-between pt-1">
<button class="font-label-sm text-[11px] text-primary hover:underline font-medium" type="button" data-demo="Set as Cover">Set as Cover</button>
<div class="flex items-center gap-1">
<button class="p-1 text-on-surface-variant hover:text-primary transition-colors" title="Edit Caption" type="button" data-demo="Edit Caption" aria-label="Edit Caption">
<span class="material-symbols-outlined text-[16px]">edit_note</span>
</button>
<button class="p-1 text-on-surface-variant hover:text-error transition-colors" title="Remove Photo" type="button" data-demo="Remove Photo" aria-label="Remove Photo">
<span class="material-symbols-outlined text-[16px]">delete</span>
</button>
</div>
</div>
</div>
</div>
<!-- Photo 4: Gym & Wellness -->
<div class="relative bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden flex flex-col group hover:shadow-md transition-shadow">
<div class="relative h-44 w-full bg-surface-container overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" data-alt="High-end private residential gym and wellness facility with floor-to-ceiling glass windows, state of the art treadmills and free weights, light oak wood slatted walls, and sleek minimalist lighting." src="{{ asset('assets/aqar/images/68accb7ece536052bb98.jpg') }}" alt="High-end private residential gym and wellness facility with floor-to-ceiling glass windows, state of the art treadmills and free weights, light oak wood slatted walls, and sleek minimalist lighting.">
<button class="absolute top-2 right-2 w-7 h-7 rounded-full bg-inverse-surface/60 backdrop-blur-md text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity" type="button" data-demo="drag_indicator" aria-label="drag indicator">
<span class="material-symbols-outlined text-[16px]">drag_indicator</span>
</button>
</div>
<div class="p-3 flex flex-col gap-1.5">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm font-bold text-on-surface truncate">Resident Fitness Suite</span>
<span class="font-label-sm text-[11px] text-on-surface-variant">3.1 MB</span>
</div>
<p class="font-body-sm text-[12px] text-on-surface-variant line-clamp-1">Fully equipped resident fitness suite</p>
<div class="flex items-center justify-between pt-1">
<button class="font-label-sm text-[11px] text-primary hover:underline font-medium" type="button" data-demo="Set as Cover">Set as Cover</button>
<div class="flex items-center gap-1">
<button class="p-1 text-on-surface-variant hover:text-primary transition-colors" title="Edit Caption" type="button" data-demo="Edit Caption" aria-label="Edit Caption">
<span class="material-symbols-outlined text-[16px]">edit_note</span>
</button>
<button class="p-1 text-on-surface-variant hover:text-error transition-colors" title="Remove Photo" type="button" data-demo="Remove Photo" aria-label="Remove Photo">
<span class="material-symbols-outlined text-[16px]">delete</span>
</button>
</div>
</div>
</div>
</div>
<!-- Photo 5: Children's Play Park -->
<div class="relative bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden flex flex-col group hover:shadow-md transition-shadow">
<div class="relative h-44 w-full bg-surface-container overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" data-alt="Safe outdoor shaded children playground with premium wooden climbing frames, safety rubberized flooring, tensile shade sails, surrounded by manicured green hedges within a gated compound." src="{{ asset('assets/aqar/images/102b40294d891327680b.jpg') }}" alt="Safe outdoor shaded children playground with premium wooden climbing frames, safety rubberized flooring, tensile shade sails, surrounded by manicured green hedges within a gated compound.">
<button class="absolute top-2 right-2 w-7 h-7 rounded-full bg-inverse-surface/60 backdrop-blur-md text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity" type="button" data-demo="drag_indicator" aria-label="drag indicator">
<span class="material-symbols-outlined text-[16px]">drag_indicator</span>
</button>
</div>
<div class="p-3 flex flex-col gap-1.5">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm font-bold text-on-surface truncate">Family Outdoor Park</span>
<span class="font-label-sm text-[11px] text-on-surface-variant">2.4 MB</span>
</div>
<p class="font-body-sm text-[12px] text-on-surface-variant line-clamp-1">Family outdoor recreation park</p>
<div class="flex items-center justify-between pt-1">
<button class="font-label-sm text-[11px] text-primary hover:underline font-medium" type="button" data-demo="Set as Cover">Set as Cover</button>
<div class="flex items-center gap-1">
<button class="p-1 text-on-surface-variant hover:text-primary transition-colors" title="Edit Caption" type="button" data-demo="Edit Caption" aria-label="Edit Caption">
<span class="material-symbols-outlined text-[16px]">edit_note</span>
</button>
<button class="p-1 text-on-surface-variant hover:text-error transition-colors" title="Remove Photo" type="button" data-demo="Remove Photo" aria-label="Remove Photo">
<span class="material-symbols-outlined text-[16px]">delete</span>
</button>
</div>
</div>
</div>
</div>
<!-- Add More Tile -->
<div class="h-64 rounded-xl bg-surface-container-low hover:bg-surface-container transition-colors p-4 flex flex-col items-center justify-center text-center cursor-pointer group" role="button" tabindex="0" data-demo="Add More Compound Photos Aerial drone, facilities, security">
<div class="w-12 h-12 rounded-full bg-surface-container-high group-hover:bg-primary/10 text-on-surface-variant group-hover:text-primary flex items-center justify-center mb-2 transition-colors">
<span class="material-symbols-outlined text-[24px]">add</span>
</div>
<span class="font-label-md text-label-md font-bold text-on-surface">Add More Compound Photos</span>
<span class="font-body-sm text-[12px] text-on-surface-variant mt-1">Aerial drone, facilities, security</span>
</div>
</div>
</div>
<!-- SECTION 2: UNIT-SPECIFIC PHOTOS (ORGANIZED BY UNIT) -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm p-space-lg flex flex-col gap-space-md">
<div class="flex flex-wrap items-center justify-between gap-space-sm">
<div class="flex items-center gap-space-sm">
<div class="w-9 h-9 rounded-lg bg-primary/10 text-primary flex items-center justify-center">
<span class="material-symbols-outlined text-[22px]">meeting_room</span>
</div>
<div class="flex flex-col">
<h2 class="font-headline-sm text-headline-sm font-bold text-on-surface">2. Unit-Specific Media Showcase</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Interior rooms, layout specifications, and dedicated balconies mapped per rentable unit.</p>
</div>
</div>
<!-- Unit Selector Switcher -->
<div class="flex items-center gap-space-xs">
<label class="font-label-sm text-label-sm text-on-surface-variant font-semibold">Active Unit:</label>
<div class="relative">
<select class="appearance-none pl-3 pr-8 py-1.5 bg-surface-container-low hover:bg-surface-container text-on-surface font-label-md text-label-md font-semibold rounded-lg cursor-pointer transition-colors outline-none">
<option selected="">Unit A-101 (2BHK Ground Palm) • 8 Photos</option>
<option>Unit A-102 (3BHK Ground) • 0 Photos</option>
<option>Unit B-201 (1BHK Studio) • 4 Photos</option>
<option>Villa V-01 (4BHK Luxury Villa) • 6 Photos</option>
</select>
<span class="material-symbols-outlined absolute right-2 top-2 text-[18px] text-on-surface-variant pointer-events-none">arrow_drop_down</span>
</div>
</div>
</div>
<!-- Clarification Banner -->
<div class="p-space-sm bg-surface-container-low rounded-lg flex items-start gap-space-sm">
<span class="material-symbols-outlined text-primary text-[20px] mt-0.5">info</span>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Unit-specific photos will automatically link to <strong>Unit A-101's listing profile</strong> and contract inventories. These images are kept separate from general compound marketing media.
          </p>
</div>
<!-- Room Category Filter Tabs / Chips -->
<div class="flex flex-wrap items-center gap-2 pt-1">
<button class="px-3 py-1.5 rounded-full bg-primary-container text-on-primary font-label-md text-label-md font-semibold shadow-sm" type="button" data-demo="All Rooms (8)">All Rooms (8)</button>
<button class="px-3 py-1.5 rounded-full bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md transition-colors" type="button" data-demo="Living Room (2)">Living Room (2)</button>
<button class="px-3 py-1.5 rounded-full bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md transition-colors" type="button" data-demo="Master Bedroom (2)">Master Bedroom (2)</button>
<button class="px-3 py-1.5 rounded-full bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md transition-colors" type="button" data-demo="Kitchen (2)">Kitchen (2)</button>
<button class="px-3 py-1.5 rounded-full bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md transition-colors" type="button" data-demo="Bathrooms (1)">Bathrooms (1)</button>
<button class="px-3 py-1.5 rounded-full bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md transition-colors" type="button" data-demo="Balcony & Views (1)">Balcony & Views (1)</button>
<button class="ml-auto px-3 py-1.5 rounded-lg bg-surface-container-low hover:bg-surface-container text-primary font-label-md text-label-md font-semibold transition-colors flex items-center gap-1" type="button" data-demo="Add Photos for Unit A-101">
<span class="material-symbols-outlined text-[16px]">add</span> Add Photos for Unit A-101
          </button>
</div>
<!-- Unit Photo Samples Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-space-md">
<!-- Unit Photo 1 -->
<div class="rounded-xl bg-surface-container-low overflow-hidden flex flex-col group">
<div class="relative h-40 w-full overflow-hidden bg-surface-container">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" data-alt="Sunlit contemporary open plan living room of a luxury apartment with sand-beige travertine floors, minimalist Italian sofa, floor to ceiling glass sliding doors opening to private patio garden." src="{{ asset('assets/aqar/images/08685a8915fc611f0c27.jpg') }}" alt="Sunlit contemporary open plan living room of a luxury apartment with sand-beige travertine floors, minimalist Italian sofa, floor to ceiling glass sliding doors opening to private patio garden.">
<span class="absolute bottom-2 left-2 px-2 py-0.5 rounded bg-inverse-surface/75 backdrop-blur-md text-white font-label-sm text-[11px] font-medium">Living Room</span>
</div>
<div class="p-3 flex flex-col gap-1">
<span class="font-label-sm text-label-sm font-semibold text-on-surface">Living Room & Garden Access</span>
<p class="font-body-sm text-[11px] text-on-surface-variant truncate">Facing East garden with morning sunlight</p>
</div>
</div>
<!-- Unit Photo 2 -->
<div class="rounded-xl bg-surface-container-low overflow-hidden flex flex-col group">
<div class="relative h-40 w-full overflow-hidden bg-surface-container">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" data-alt="Elegant master bedroom suite with King sized upholstered bed, warm recessed wall lighting, bespoke dark walnut closets, sheer linen drapes and high pile wool carpet." src="{{ asset('assets/aqar/images/17dc0cd4ae932a6d3a80.jpg') }}" alt="Elegant master bedroom suite with King sized upholstered bed, warm recessed wall lighting, bespoke dark walnut closets, sheer linen drapes and high pile wool carpet.">
<span class="absolute bottom-2 left-2 px-2 py-0.5 rounded bg-inverse-surface/75 backdrop-blur-md text-white font-label-sm text-[11px] font-medium">Master Bedroom</span>
</div>
<div class="p-3 flex flex-col gap-1">
<span class="font-label-sm text-label-sm font-semibold text-on-surface">Master Bedroom Suite</span>
<p class="font-body-sm text-[11px] text-on-surface-variant truncate">En-suite bathroom access and walk-in wardrobe</p>
</div>
</div>
<!-- Unit Photo 3 -->
<div class="rounded-xl bg-surface-container-low overflow-hidden flex flex-col group">
<div class="relative h-40 w-full overflow-hidden bg-surface-container">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" data-alt="Modern chef kitchen with quartz waterfall island, high-end integrated German appliances, matte charcoal cabinetry, and warm LED under-cabinet task lighting." src="{{ asset('assets/aqar/images/29c344da772624300219.jpg') }}" alt="Modern chef kitchen with quartz waterfall island, high-end integrated German appliances, matte charcoal cabinetry, and warm LED under-cabinet task lighting.">
<span class="absolute bottom-2 left-2 px-2 py-0.5 rounded bg-inverse-surface/75 backdrop-blur-md text-white font-label-sm text-[11px] font-medium">Kitchen</span>
</div>
<div class="p-3 flex flex-col gap-1">
<span class="font-label-sm text-label-sm font-semibold text-on-surface">Fully Fitted Kitchen</span>
<p class="font-body-sm text-[11px] text-on-surface-variant truncate">Includes built-in induction stove & dishwasher</p>
</div>
</div>
</div>
</div>
<!-- SECTION 3: COMPLIANCE & LEGAL DOCUMENTS -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm p-space-lg flex flex-col gap-space-md">
<div class="flex flex-wrap items-center justify-between gap-space-sm">
<div class="flex items-center gap-space-sm">
<div class="w-9 h-9 rounded-lg bg-primary/10 text-primary flex items-center justify-center">
<span class="material-symbols-outlined text-[22px]">policy</span>
</div>
<div class="flex flex-col">
<h2 class="font-headline-sm text-headline-sm font-bold text-on-surface">3. Property Compliance, Deeds & Certifications</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Mandatory legal and institutional compliance documentation required for tenancy registration.</p>
</div>
</div>
<button class="px-3.5 py-2 rounded-lg bg-primary-container text-on-primary font-label-md text-label-md font-semibold hover:bg-primary transition-colors shadow-sm flex items-center gap-1.5" type="button" data-demo="Upload Document">
<span class="material-symbols-outlined text-[18px]">upload_file</span>
            Upload Document
          </button>
</div>
<!-- Document Table / Structured List -->
<div class="overflow-x-auto rounded-xl bg-surface-container-low">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container text-on-surface-variant font-label-sm text-label-sm uppercase tracking-wider">
<th class="py-3 px-4">Document Title & File</th>
<th class="py-3 px-4">Category</th>
<th class="py-3 px-4">Upload Date</th>
<th class="py-3 px-4">Status</th>
<th class="py-3 px-4 text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y-0 font-body-sm text-body-sm">
<!-- Doc 1 -->
<tr class="hover:bg-surface-container/50 transition-colors">
<td class="py-3 px-4">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded bg-red-100 text-red-700 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[20px]">picture_as_pdf</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-on-surface">Title-Deed-Yasmin-Compound-2026.pdf</span>
<span class="font-label-sm text-[11px] text-on-surface-variant">PDF • 3.8 MB • Real Estate General Authority (REGA)</span>
</div>
</div>
</td>
<td class="py-3 px-4 font-label-md text-label-md text-on-surface">
<span class="px-2 py-0.5 rounded bg-surface-container-highest text-on-surface font-semibold">Ownership Deed</span>
</td>
<td class="py-3 px-4 text-on-surface-variant">Mar 18, 2026</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-label-sm text-label-sm font-semibold">
<span class="material-symbols-outlined text-[12px]">check_circle</span> Verified
                  </span>
</td>
<td class="py-3 px-4 text-right">
<div class="inline-flex items-center gap-1">
<button class="p-1.5 text-on-surface-variant hover:text-primary transition-colors" title="View Document" type="button" data-demo="View Document" aria-label="View Document">
<span class="material-symbols-outlined text-[18px]">visibility</span>
</button>
<button class="p-1.5 text-on-surface-variant hover:text-primary transition-colors" title="Replace File" type="button" data-demo="Replace File" aria-label="Replace File">
<span class="material-symbols-outlined text-[18px]">published_with_changes</span>
</button>
<button class="p-1.5 text-on-surface-variant hover:text-error transition-colors" title="Remove" type="button" data-demo="Remove" aria-label="Remove">
<span class="material-symbols-outlined text-[18px]">delete</span>
</button>
</div>
</td>
</tr>
<!-- Doc 2 -->
<tr class="hover:bg-surface-container/50 transition-colors">
<td class="py-3 px-4">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded bg-red-100 text-red-700 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[20px]">picture_as_pdf</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-on-surface">Property-Insurance-Policy-Comprehensive-2026-2027.pdf</span>
<span class="font-label-sm text-[11px] text-on-surface-variant">PDF • 2.1 MB • Tawuniya Insurance Co.</span>
</div>
</div>
</td>
<td class="py-3 px-4 font-label-md text-label-md text-on-surface">
<span class="px-2 py-0.5 rounded bg-surface-container-highest text-on-surface font-semibold">Insurance Policy</span>
</td>
<td class="py-3 px-4 text-on-surface-variant">Mar 18, 2026</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-label-sm text-label-sm font-semibold">
<span class="material-symbols-outlined text-[12px]">check_circle</span> Active (Exp: 2027)
                  </span>
</td>
<td class="py-3 px-4 text-right">
<div class="inline-flex items-center gap-1">
<button class="p-1.5 text-on-surface-variant hover:text-primary transition-colors" title="View Document" type="button" data-demo="View Document" aria-label="View Document">
<span class="material-symbols-outlined text-[18px]">visibility</span>
</button>
<button class="p-1.5 text-on-surface-variant hover:text-primary transition-colors" title="Replace File" type="button" data-demo="Replace File" aria-label="Replace File">
<span class="material-symbols-outlined text-[18px]">published_with_changes</span>
</button>
<button class="p-1.5 text-on-surface-variant hover:text-error transition-colors" title="Remove" type="button" data-demo="Remove" aria-label="Remove">
<span class="material-symbols-outlined text-[18px]">delete</span>
</button>
</div>
</td>
</tr>
<!-- Doc 3 -->
<tr class="hover:bg-surface-container/50 transition-colors">
<td class="py-3 px-4">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded bg-red-100 text-red-700 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[20px]">picture_as_pdf</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-on-surface">Municipal-Building-Clearance-Cert-2026.pdf</span>
<span class="font-label-sm text-[11px] text-on-surface-variant">PDF • 1.4 MB • Balady / Riyadh Municipality</span>
</div>
</div>
</td>
<td class="py-3 px-4 font-label-md text-label-md text-on-surface">
<span class="px-2 py-0.5 rounded bg-surface-container-highest text-on-surface font-semibold">Zoning & Clearance</span>
</td>
<td class="py-3 px-4 text-on-surface-variant">Mar 18, 2026</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-label-sm text-label-sm font-semibold">
<span class="material-symbols-outlined text-[12px]">check_circle</span> Approved
                  </span>
</td>
<td class="py-3 px-4 text-right">
<div class="inline-flex items-center gap-1">
<button class="p-1.5 text-on-surface-variant hover:text-primary transition-colors" title="View Document" type="button" data-demo="View Document" aria-label="View Document">
<span class="material-symbols-outlined text-[18px]">visibility</span>
</button>
<button class="p-1.5 text-on-surface-variant hover:text-primary transition-colors" title="Replace File" type="button" data-demo="Replace File" aria-label="Replace File">
<span class="material-symbols-outlined text-[18px]">published_with_changes</span>
</button>
<button class="p-1.5 text-on-surface-variant hover:text-error transition-colors" title="Remove" type="button" data-demo="Remove" aria-label="Remove">
<span class="material-symbols-outlined text-[18px]">delete</span>
</button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
<p class="font-body-sm text-[11px] text-on-surface-variant italic">
          * Document uploads conform to GCC institutional real estate standards and Saudi Real Estate General Authority (REGA) compliance frameworks.
        </p>
</div>
<!-- SECTION 4: MANAGEMENT AGREEMENT DOCUMENTS (PRE-SYNCED FROM STEP 3) -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm p-space-lg flex flex-col gap-space-md">
<div class="flex items-center justify-between">
<div class="flex items-center gap-space-sm">
<div class="w-9 h-9 rounded-lg bg-primary/10 text-primary flex items-center justify-center">
<span class="material-symbols-outlined text-[22px]">history_edu</span>
</div>
<div class="flex flex-col">
<h2 class="font-headline-sm text-headline-sm font-bold text-on-surface">4. Management Agreement & Operating Mandate</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Pre-synced from Step 3: Ownership & Management. No duplicate entry required.</p>
</div>
</div>
<span class="px-2.5 py-1 rounded bg-secondary-container/40 text-on-secondary-container font-label-sm text-label-sm font-bold">
            Step 3 Linked
          </span>
</div>
<!-- Linked Agreement Card -->
<div class="p-space-md bg-surface-container-low rounded-xl flex flex-wrap items-center justify-between gap-space-md">
<div class="flex items-center gap-space-md">
<div class="w-12 h-12 rounded-lg bg-surface-container-highest text-primary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[26px]">contract</span>
</div>
<div class="flex flex-col">
<span class="font-label-lg text-label-lg font-bold text-on-surface">Yasmin-Compound-Management-Agreement-2026.pdf</span>
<p class="font-body-sm text-body-sm text-on-surface-variant">
                Contracting Parties: <strong class="text-on-surface">Muqrin Real Estate Holdings</strong> (Owner) & <strong class="text-on-surface">Eng. Sultan Al-Shammari</strong> (Manager, 8.5% Fee)
              </p>
<span class="font-label-sm text-[11px] text-on-surface-variant">PDF • 4.2 MB • Digitally Signed via Nafath • Term: 3 Years (2026–2029)</span>
</div>
</div>
<div class="flex items-center gap-space-xs">
<a class="px-3 py-1.5 rounded-lg bg-surface-container-lowest hover:bg-surface-container text-on-surface font-label-md text-label-md font-semibold transition-colors shadow-sm flex items-center gap-1" href="{{ route('manager.contracts') }}">
<span class="material-symbols-outlined text-[16px]">visibility</span> View Contract
            </a>
<button class="px-3 py-1.5 rounded-lg bg-primary-container text-on-primary font-label-md text-label-md font-semibold hover:bg-primary transition-colors shadow-sm flex items-center gap-1" type="button" data-demo="+ Add Addendum / SLA">
<span class="material-symbols-outlined text-[16px]">attachment</span> + Add Addendum / SLA
            </button>
</div>
</div>
</div>
<!-- SECTION 5: ARCHITECTURAL FLOOR PLANS & PROPERTY LAYOUTS -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm p-space-lg flex flex-col gap-space-md">
<div class="flex flex-wrap items-center justify-between gap-space-sm">
<div class="flex items-center gap-space-sm">
<div class="w-9 h-9 rounded-lg bg-primary/10 text-primary flex items-center justify-center">
<span class="material-symbols-outlined text-[22px]">architecture</span>
</div>
<div class="flex flex-col">
<h2 class="font-headline-sm text-headline-sm font-bold text-on-surface">5. Floor Plans & Spatial Schematics</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Compound site layouts and individual unit structural blue-prints.</p>
</div>
</div>
<button class="px-3.5 py-2 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md font-semibold transition-colors flex items-center gap-1.5" type="button" data-demo="Upload Layout (PDF/DWG)">
<span class="material-symbols-outlined text-[18px]">add_circle</span> Upload Layout (PDF/DWG)
          </button>
</div>
<!-- 2 Layout Cards (Master Site Plan + Unit A-101 Floorplan) -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
<!-- Master Compound Plan -->
<div class="p-space-md rounded-xl bg-surface-container-low flex flex-col gap-space-sm">
<div class="flex items-center justify-between">
<span class="px-2 py-0.5 rounded bg-surface-container-highest text-on-surface font-label-sm text-label-sm font-bold">Compound Site Plan</span>
<span class="font-label-sm text-[11px] text-emerald-700 font-semibold">Assigned: Entire Site</span>
</div>
<div class="h-32 rounded-lg bg-surface-container flex items-center justify-center relative overflow-hidden">
<div class="absolute inset-0 opacity-15 flex items-center justify-center">
<svg height="100%" width="100%" xmlns="http://www.w3.org/2000/svg">
<defs>
<pattern height="20" id="grid" patternUnits="userSpaceOnUse" width="20">
<path d="M 20 0 L 0 0 0 20" fill="none" stroke="currentColor" stroke-width="1"></path>
</pattern>
</defs>
<rect class="text-on-surface" fill="url(#grid)" height="100%" width="100%"></rect>
</svg>
</div>
<div class="flex flex-col items-center gap-1 z-10">
<span class="material-symbols-outlined text-[32px] text-primary">map</span>
<span class="font-label-sm text-label-sm font-bold text-on-surface">Master-Site-Plan-AlYasmin.pdf</span>
<span class="font-label-sm text-[10px] text-on-surface-variant">Plot 492 • 8,400 sq.m Total Footprint</span>
</div>
</div>
<div class="flex items-center justify-between pt-1">
<span class="font-label-sm text-label-sm text-on-surface-variant">DWG Vector • 6.4 MB</span>
<button class="text-primary hover:underline font-label-sm text-label-sm font-semibold" type="button" data-demo="Reassign Block">Reassign Block</button>
</div>
</div>
<!-- Unit-Specific Floor Plan -->
<div class="p-space-md rounded-xl bg-surface-container-low flex flex-col gap-space-sm">
<div class="flex items-center justify-between">
<span class="px-2 py-0.5 rounded bg-surface-container-highest text-on-surface font-label-sm text-label-sm font-bold">Unit Blueprint</span>
<span class="font-label-sm text-[11px] text-primary font-semibold">Assigned: Unit A-101 (2BHK)</span>
</div>
<div class="h-32 rounded-lg bg-surface-container flex items-center justify-center relative overflow-hidden">
<div class="absolute inset-0 opacity-15 flex items-center justify-center">
<svg height="100%" width="100%" xmlns="http://www.w3.org/2000/svg">
<defs>
<pattern height="16" id="grid2" patternUnits="userSpaceOnUse" width="16">
<path d="M 16 0 L 0 0 0 16" fill="none" stroke="currentColor" stroke-width="1"></path>
</pattern>
</defs>
<rect class="text-on-surface" fill="url(#grid2)" height="100%" width="100%"></rect>
</svg>
</div>
<div class="flex flex-col items-center gap-1 z-10">
<span class="material-symbols-outlined text-[32px] text-primary">floor</span>
<span class="font-label-sm text-label-sm font-bold text-on-surface">Unit-A101-Floorplan-2BHK.png</span>
<span class="font-label-sm text-[10px] text-on-surface-variant">142 sq.m • Living, 2 Bed, 3 Bath, Patio</span>
</div>
</div>
<div class="flex items-center justify-between pt-1">
<span class="font-label-sm text-label-sm text-on-surface-variant">High-Res PNG • 2.2 MB</span>
<button class="text-primary hover:underline font-label-sm text-label-sm font-semibold" type="button" data-demo="Assign to other 2BHKs">Assign to other 2BHKs</button>
</div>
</div>
</div>
<!-- Inspection Module Advisory Notice -->
<div class="p-space-md rounded-lg bg-primary-container/10 flex items-start gap-space-sm">
<span class="material-symbols-outlined text-primary text-[22px] mt-0.5">pin_drop</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-on-surface">Inspection Module Integration</span>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
              Interactive property-condition floor plan pins, key handover audits, and wear-and-tear damage annotations will be configured in the <strong>Property Inspection Module</strong> post-activation.
            </p>
</div>
</div>
</div>
<!-- SECTION 6: DOCUMENT VISIBILITY & PRIVACY GOVERNANCE -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm p-space-lg flex flex-col gap-space-md">
<div class="flex items-center gap-space-sm">
<div class="w-9 h-9 rounded-lg bg-primary/10 text-primary flex items-center justify-center">
<span class="material-symbols-outlined text-[22px]">admin_panel_settings</span>
</div>
<div class="flex flex-col">
<h2 class="font-headline-sm text-headline-sm font-bold text-on-surface">6. Asset Visibility & Privacy Governance</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Control role-based access for prospective tenants, verified residents, and property administrators.</p>
</div>
</div>
<!-- Privacy Permission Table -->
<div class="flex flex-col gap-space-xs rounded-xl bg-surface-container-low p-space-sm">
<div class="flex items-center justify-between p-3 rounded-lg bg-surface-container-lowest">
<div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined text-emerald-700 text-[20px]">public</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Public Marketing Gallery & Showrooms</span>
<span class="font-label-sm text-[11px] text-on-surface-variant">Compound amenities, exterior photography, furnished unit showcases</span>
</div>
</div>
<span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-800 font-label-sm text-label-sm font-semibold flex items-center gap-1">
<span class="material-symbols-outlined text-[13px]">lock_open</span> Public • Tenant Portal
            </span>
</div>
<div class="flex items-center justify-between p-3 rounded-lg bg-surface-container-lowest">
<div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined text-blue-700 text-[20px]">layers</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Architectural Floor Plans & Schematics</span>
<span class="font-label-sm text-[11px] text-on-surface-variant">Unit layouts, master compound masterplan, dimensional guides</span>
</div>
</div>
<span class="px-2.5 py-1 rounded-full bg-blue-50 text-blue-800 font-label-sm text-label-sm font-semibold flex items-center gap-1">
<span class="material-symbols-outlined text-[13px]">group</span> Prospective Tenants & Inquirers
            </span>
</div>
<div class="flex items-center justify-between p-3 rounded-lg bg-surface-container-lowest">
<div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined text-amber-700 text-[20px]">verified_user</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Title Deeds & Municipal Clearance Records</span>
<span class="font-label-sm text-[11px] text-on-surface-variant">REGA ownership certificates, insurance policy deeds, zoning permits</span>
</div>
</div>
<span class="px-2.5 py-1 rounded-full bg-amber-50 text-amber-800 font-label-sm text-label-sm font-semibold flex items-center gap-1">
<span class="material-symbols-outlined text-[13px]">lock</span> Internal (Owner & Manager Only)
            </span>
</div>
<div class="flex items-center justify-between p-3 rounded-lg bg-surface-container-lowest">
<div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined text-primary text-[20px]">shield_person</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Management Agreements & Fee Mandates</span>
<span class="font-label-sm text-[11px] text-on-surface-variant">Operating agreements, revenue share terms, compensation schedules</span>
</div>
</div>
<span class="px-2.5 py-1 rounded-full bg-rose-50 text-primary font-label-sm text-label-sm font-bold flex items-center gap-1">
<span class="material-symbols-outlined text-[13px]">key</span> Restricted Executive View
            </span>
</div>
</div>
<p class="font-body-sm text-[11px] text-on-surface-variant flex items-center gap-1.5">
<span class="material-symbols-outlined text-[15px] text-emerald-700">lock</span>
<span>Sensitive financial, legal, and ownership documents are private by default and strictly isolated from public tenant views.</span>
</p>
</div>
</div>
<!-- RIGHT 3.5 COLUMNS: INTAKE SUMMARY SIDEBAR (STICKY CONTEXT PANEL) -->
<div class="xl:col-span-4 flex flex-col gap-space-md xl:sticky xl:top-24">
<!-- Summary Card -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm p-space-lg flex flex-col gap-space-md">
<!-- Intake Progress Ring & Title -->
<div class="flex items-center justify-between">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider font-semibold">Workflow Intake Progress</span>
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">Step 5 of 6 Active</span>
</div>
<!-- Mini SVG Circular Gauge (67%) -->
<div class="relative w-12 h-12 flex items-center justify-center">
<svg class="w-full h-full transform -rotate-90" viewBox="0 0 36 36">
<path class="text-surface-container" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="3.5"></path>
<path class="text-primary-container" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-dasharray="67, 100" stroke-linecap="round" stroke-width="3.5"></path>
</svg>
<span class="absolute text-[11px] font-bold text-on-surface">67%</span>
</div>
</div>
<!-- Property Overview Digest -->
<div class="p-space-sm bg-surface-container-low rounded-xl flex flex-col gap-2">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant font-medium">Property Name</span>
<span class="font-label-md text-label-md font-bold text-on-surface">Al-Yasmin Compound II</span>
</div>
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant font-medium">Type & Tier</span>
<span class="font-label-sm text-label-sm font-semibold text-on-surface">Residential (Class A Prime)</span>
</div>
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant font-medium">Location</span>
<span class="font-label-sm text-label-sm font-semibold text-on-surface">Al-Yasmin, Riyadh, KSA</span>
</div>
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant font-medium">Ownership</span>
<span class="font-label-sm text-label-sm font-semibold text-on-surface">Muqrin RE Holdings (100%)</span>
</div>
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant font-medium">Property Manager</span>
<span class="font-label-sm text-label-sm font-semibold text-on-surface">Eng. Sultan Al-Shammari (8.5%)</span>
</div>
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant font-medium">Unit Inventory</span>
<span class="font-label-sm text-label-sm font-semibold text-on-surface">12 Units (4 Configured)</span>
</div>
</div>
<!-- Step 5 Snapshot (Media & Docs Intake Status) -->
<div class="flex flex-col gap-2 pt-1">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider font-semibold">Step 5 Media Audit</span>
<div class="flex items-center justify-between p-2 rounded-lg bg-surface-container/50">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-primary">imagesmode</span>
<span class="font-label-sm text-label-sm font-medium text-on-surface">Total Photos Staged</span>
</div>
<span class="font-label-sm text-label-sm font-bold text-on-surface">14 Photos</span>
</div>
<div class="flex items-center justify-between p-2 rounded-lg bg-surface-container/50">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-primary">star</span>
<span class="font-label-sm text-label-sm font-medium text-on-surface">Selected Cover</span>
</div>
<span class="font-label-sm text-label-sm font-semibold text-on-surface truncate max-w-[140px]">Front Entrance Gate</span>
</div>
<div class="flex items-center justify-between p-2 rounded-lg bg-surface-container/50">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-primary">description</span>
<span class="font-label-sm text-label-sm font-medium text-on-surface">Legal Documents</span>
</div>
<span class="font-label-sm text-label-sm font-bold text-on-surface">4 Attached</span>
</div>
<div class="flex items-center justify-between p-2 rounded-lg bg-surface-container/50">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-primary">floor</span>
<span class="font-label-sm text-label-sm font-medium text-on-surface">Floor Plans</span>
</div>
<span class="font-label-sm text-label-sm font-bold text-on-surface">2 Configured</span>
</div>
</div>
<!-- Quality Check / Audit Meter -->
<div class="p-space-sm rounded-xl bg-surface-container-low flex flex-col gap-2">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm font-bold text-on-surface">Listing Readiness Score</span>
<span class="font-label-sm text-label-sm font-bold text-emerald-700">92 / 100</span>
</div>
<div class="w-full bg-surface-container rounded-full h-2 overflow-hidden">
<div class="bg-emerald-600 h-2 rounded-full" style="width: 92%"></div>
</div>
<span class="font-label-sm text-[11px] text-on-surface-variant">High photo resolution & validated title deed ready for Step 6 final review.</span>
</div>
<!-- System Draft State -->
<div class="flex items-center justify-between text-on-surface-variant font-label-sm text-[11px] pt-1">
<span class="flex items-center gap-1">
<span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>
            Cloud Sync Active
          </span>
<span>Draft ID: DRAFT-8924</span>
</div>
</div>
<!-- Quick Tips Card -->
<div class="bg-surface-container-low rounded-xl p-space-md flex flex-col gap-2">
<div class="flex items-center gap-2 text-primary font-label-md text-label-md font-bold">
<span class="material-symbols-outlined text-[18px]">lightbulb</span>
          Professional Tip
        </div>
<p class="font-body-sm text-[12px] text-on-surface-variant">
          Properties with more than 10 verified photographs and assigned floor plans receive <strong>3.4x higher inquiry velocity</strong> on the Majlis Public Tenant Portal.
        </p>
</div>
</div>
</div>
<!-- FIXED BOTTOM NAVIGATION BAR -->
<div class="fixed bottom-0 left-72 right-0 bg-surface-container-lowest/95 backdrop-blur-md shadow-[0_-4px_16px_rgba(0,0,0,0.06)] py-space-sm px-space-xl z-30 flex items-center justify-between">
<!-- Left: Back Navigation to Step 4 -->
<a class="px-5 py-2.5 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-lg text-label-lg font-semibold transition-all flex items-center gap-2 shadow-sm" href="{{ route('manager.add-property-4') }}">
<span class="material-symbols-outlined text-[18px]">arrow_back</span>
      Back to Units & Rental Details (Step 4)
    </a>
<!-- Center: Save Draft Status -->
<div class="hidden md:flex items-center gap-space-xs text-on-surface-variant font-label-md text-label-md">
<button class="px-3 py-1.5 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface font-label-md text-label-md font-medium transition-colors flex items-center gap-1.5" type="button" data-demo="Save Draft">
<span class="material-symbols-outlined text-[16px]">save</span>
        Save Draft
      </button>
<span class="text-on-surface-variant/60">•</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Last saved 2 mins ago</span>
</div>
<!-- Right: Next Step Primary Action -->
<a class="px-6 py-2.5 rounded-lg bg-primary-container hover:bg-primary text-on-primary font-label-lg text-label-lg font-bold transition-all shadow-md flex items-center gap-2 active:scale-98" href="#demo-notice" data-demo="Continue to Review & Save (Step 6)">
      Continue to Review & Save (Step 6)
      <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</a>
</div>
</div>
@endsection
