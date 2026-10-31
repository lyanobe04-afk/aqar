{{-- Imported from client_demo/screens/add_new_property_step_6/code.html; static demonstration data. --}}
@extends('layouts.manager')
@section('content')
<div class="flex flex-col w-full">
<!-- Top Wizard Progress Tracker Bar -->
@include('components.manager.property-steps')
<!-- Page Header & Notification Tip -->
<div class="flex flex-col gap-space-sm mb-space-lg"><div class="flex flex-col md:flex-row md:items-end justify-between gap-space-md">
<div>
<div class="flex flex-wrap items-center gap-space-xs mb-1">
<span class="font-label-sm text-label-sm uppercase tracking-wider font-semibold px-2 py-0.5 rounded bg-surface-container-high text-on-surface-variant">REF: PRP-RYD-2026-0089</span>
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-label-sm font-label-sm font-semibold bg-[#F0F4F8] text-[#364E68]">
<span class="w-1.5 h-1.5 rounded-full bg-[#364E68]"></span>
            Draft Mode
          </span>
<span class="font-label-sm text-label-sm text-on-surface-variant">• Property: <strong class="text-on-surface font-semibold">Al-Yasmin Compound II</strong></span>
<span class="font-label-sm text-label-sm text-on-surface-variant">• Riyadh, KSA</span>
</div>
<h2 class="font-headline-lg text-headline-lg text-on-surface font-bold tracking-tight">Review & Save Property</h2>
<p class="font-body-md text-body-md text-on-surface-variant">Carefully review your property details, ownership, management structure, and units before saving your property.</p>
</div>
<div class="flex items-center gap-space-sm shrink-0">
<span class="px-3 py-1.5 rounded-lg bg-surface-container text-on-surface-variant font-label-sm text-label-sm flex items-center gap-1">
<span class="material-symbols-outlined text-[16px]">description</span> Illustrative Summary Preview
</span>
</div>
</div>
<div class="flex items-center gap-space-sm px-space-md py-2.5 rounded-xl bg-surface-container-low shadow-sm">
<span class="material-symbols-outlined text-primary text-[20px] shrink-0">info</span>
<p class="font-body-sm text-body-sm text-on-surface-variant">
<strong class="text-on-surface font-medium">Note:</strong> You can edit and update property specifications, pricing schedules, units, and document attachments at any time after saving.
</p>
</div></div>
<!-- 12-Column Responsive Workspace Grid -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg items-start pb-space-xl">
<!-- Left 8 Columns: Detail Sections -->
<div class="lg:col-span-8 flex flex-col gap-space-lg">
<!-- SECTION 1: Basic Property Information -->
<section class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md">
<div class="flex items-center justify-between pb-space-sm border-b border-surface-container">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[20px]">apartment</span>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">1. Basic Property Information & Location</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Identity, asset categorization, and spatial specifications</p>
</div>
</div>
<a class="flex items-center gap-1 font-label-md text-label-md font-semibold text-primary hover:text-primary-container transition-colors" href="{{ route('manager.add-property-1') }}">
<span class="">Edit Step 1 & 2</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-x-space-lg gap-y-space-md">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">Property Name</span>
<span class="font-body-md text-body-md font-semibold text-on-surface">Al-Yasmin Compound II</span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">Property Category</span>
<div class="flex items-center gap-2">
<span class="font-body-md text-body-md font-semibold text-on-surface">Residential Compound</span>
<span class="px-2 py-0.5 rounded text-label-sm font-label-sm bg-surface-container-high text-on-surface-variant">Multi-Unit</span>
</div>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">System Reference</span>
<span class="font-body-md text-body-md font-mono text-on-surface font-medium">PRP-RYD-2026-0089</span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">Year Built / Handover</span>
<span class="font-body-md text-body-md font-medium text-on-surface">2024 (Class A Prime)</span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">Country & Jurisdiction</span>
<span class="font-body-md text-body-md text-on-surface">Kingdom of Saudi Arabia (Riyadh Municipality)</span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">District & Parcel Address</span>
<span class="font-body-md text-body-md text-on-surface">Al-Yasmin District, King Abdulaziz Road, Zone B, Plot 449</span>
</div>
<div class="md:col-span-2 flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant mb-1">Asset Narrative Description</span>
<p class="font-body-md text-body-md text-on-surface-variant bg-surface-container-low p-space-sm rounded-lg">
              Luxury gated residential community featuring 12 premium units, landscaped central courtyards, resident clubhouse, swimming pool, and dedicated underground parking. Optimized for institutional executive leasing and diplomatic residency.
            </p>
</div>
<div class="md:col-span-2 flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant mb-1.5">Key Characteristics & Amenities</span>
<div class="flex flex-wrap gap-2">
<span class="px-2.5 py-1 rounded-md bg-surface-container text-on-surface font-label-md text-label-md flex items-center gap-1">
<span class="material-symbols-outlined text-[16px] text-primary">security</span> Gated Security 24/7
              </span>
<span class="px-2.5 py-1 rounded-md bg-surface-container text-on-surface font-label-md text-label-md flex items-center gap-1">
<span class="material-symbols-outlined text-[16px] text-primary">ac_unit</span> Central Chilled Water HVAC
              </span>
<span class="px-2.5 py-1 rounded-md bg-surface-container text-on-surface font-label-md text-label-md flex items-center gap-1">
<span class="material-symbols-outlined text-[16px] text-primary">key</span> Smart Access Ready
              </span>
<span class="px-2.5 py-1 rounded-md bg-surface-container text-on-surface font-label-md text-label-md flex items-center gap-1">
<span class="material-symbols-outlined text-[16px] text-primary">pool</span> Clubhouse & Pool
              </span>
<span class="px-2.5 py-1 rounded-md bg-surface-container text-on-surface font-label-md text-label-md flex items-center gap-1">
<span class="material-symbols-outlined text-[16px] text-primary">pin_drop</span> 12 Planned Parcels
              </span>
</div>
</div>
</div>
</section>
<!-- SECTION 2: Ownership & Management Structure -->
<section class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md"><div class="flex items-center justify-between pb-space-sm border-b border-surface-container">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[20px]">badge</span>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">2. Ownership & Management</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Property owner details and property manager assignment</p>
</div>
</div>
<a class="flex items-center gap-1 font-label-md text-label-md font-semibold text-primary hover:text-primary-container transition-colors" href="{{ route('manager.add-property-3') }}">
<span class="">Edit Step 3</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
<div class="p-space-md rounded-xl bg-surface-container-low flex flex-col gap-space-xs">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">Property Owner</span>
<div class="flex items-center gap-space-sm pt-1">
<div class="w-10 h-10 rounded-lg bg-surface-container-high flex items-center justify-center text-on-surface-variant font-bold text-headline-sm shrink-0">
                M
              </div>
<div class="flex flex-col min-w-0">
<span class="font-label-lg text-label-lg font-bold text-on-surface truncate">Muqrin Real Estate Holdings Ltd.</span>
<span class="font-body-sm text-body-sm text-on-surface-variant truncate">Representative: Fahad Al-Muqrin</span>
</div>
</div>
<div class="mt-2 pt-2 border-t border-surface-container flex flex-col gap-1 text-label-md">
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Ownership Share</span>
<span class="font-bold text-on-surface">100.0% (Illustrative Example)</span>
</div>
<span class="text-[11px] text-on-surface-variant">Supports single or multiple owners with customizable ownership shares</span>
</div>
</div>
<div class="p-space-md rounded-xl bg-surface-container-low flex flex-col gap-space-xs">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">Assigned Property Manager</span>
<div class="flex items-center gap-space-sm pt-1">
<div class="w-10 h-10 rounded-lg bg-primary text-on-primary flex items-center justify-center font-bold text-headline-sm shrink-0">
                S
              </div>
<div class="flex flex-col min-w-0">
<span class="font-label-lg text-label-lg font-bold text-on-surface truncate">Eng. Sultan Al-Shammari</span>
<span class="font-body-sm text-body-sm text-on-surface-variant truncate">Role: Property Manager</span>
</div>
</div>
<div class="mt-2 pt-2 border-t border-surface-container flex flex-col gap-1 text-label-md">
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Management Model</span>
<span class="font-bold text-primary">Managed by Property Manager</span>
</div>
<span class="text-[11px] text-on-surface-variant">Assigned for operational property supervision</span>
</div>
</div>
</div>
<div class="p-space-md rounded-xl bg-surface-container-high/40 flex flex-col gap-space-sm">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-tertiary">history_edu</span>
<span class="font-label-lg text-label-lg font-bold text-on-surface">Management Agreement & Fee Terms</span>
</div>
<span class="px-2 py-0.5 rounded font-label-sm text-label-sm font-medium bg-surface-container text-on-surface-variant">
              Attached Document
            </span>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-space-sm text-body-sm pt-1">
<div>
<span class="text-on-surface-variant block font-label-sm text-label-sm">MANAGEMENT FEE</span>
<span class="font-semibold text-on-surface font-body-md text-body-md">8.5% of Collected Rent <span class="text-[11px] font-normal text-on-surface-variant block">(Illustrative Example)</span></span>
</div>
<div>
<span class="text-on-surface-variant block font-label-sm text-label-sm">CONTRACT TERM</span>
<span class="font-semibold text-on-surface">Mar 1, 2026 – Feb 28, 2029 (3 Yrs)</span>
</div>
<div>
<span class="text-on-surface-variant block font-label-sm text-label-sm">AGREEMENT REF</span>
<span class="font-mono text-on-surface">AGR-2026-YAS-003</span>
</div>
</div>
<div class="flex items-center gap-space-sm mt-1 p-2 rounded-lg bg-surface-container-lowest shadow-sm">
<span class="material-symbols-outlined text-[20px] text-primary">picture_as_pdf</span>
<span class="font-label-md text-label-md text-on-surface font-medium truncate flex-1">Yasmin-Compound-Management-Agreement-2026.pdf</span>
<span class="font-body-sm text-[11px] text-on-surface-variant">4.2 MB • PDF Document</span>
</div>
</div>
<div class="flex flex-col gap-space-xs">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">Manager Permissions</span>
<div class="flex flex-wrap gap-2">
<span class="px-2.5 py-1 rounded-full bg-surface-container text-on-surface font-label-sm text-label-sm">Unit & Availability Mgmt</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container text-on-surface font-label-sm text-label-sm">Review & Approve Booking Requests</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container text-on-surface font-label-sm text-label-sm">Offline Payment Verification</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container text-on-surface font-label-sm text-label-sm">Maintenance Dispatch</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container text-on-surface font-label-sm text-label-sm">Tenant Communications</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container text-on-surface font-label-sm text-label-sm">Portfolio Reporting</span>
</div>
</div></section>
<!-- SECTION 3: Units & Rental Details -->
<section class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md">
<div class="flex items-center justify-between pb-space-sm border-b border-surface-container"><div class="flex flex-col gap-0.5">
<p class="font-body-sm text-body-sm">
  <strong class="text-on-surface">4 of 12 units configured</strong> (8 units pending configuration).
</p>
<p class="font-body-sm text-[11px] text-on-surface-variant">
  Incomplete units are pending setup and are not available for booking. Units can be added or edited at any time after saving.
</p>
</div>
<span class="font-label-sm text-label-sm font-medium text-primary cursor-pointer hover:underline" role="button" tabindex="0" data-demo="Download Matrix (.CSV)">Download Matrix (.CSV)</span></div>
<!-- Inventory KPI Ribbon -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-space-sm">
<div class="p-space-sm rounded-xl bg-surface-container-low flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase font-semibold">Total Inventory</span>
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">12 Units</span>
<span class="font-body-sm text-[11px] text-[#2E7D32] font-medium">4 Configured • 8 Pending</span>
</div>
<div class="p-space-sm rounded-xl bg-surface-container-low flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase font-semibold">Rate Spectrum</span>
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">5.4k – 180k</span>
<span class="font-body-sm text-[11px] text-on-surface-variant">SAR / Mo or Yearly</span>
</div>
<div class="p-space-sm rounded-xl bg-surface-container-low flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase font-semibold">Furnishing State</span>
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">3 Furnished</span>
<span class="font-body-sm text-[11px] text-on-surface-variant">1 Unfurnished Villa</span>
</div>
<div class="p-space-sm rounded-xl bg-surface-container-low flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase font-semibold">Booking Policy</span>
<span class="font-headline-sm text-headline-sm font-bold text-primary truncate">Approval Req.</span>
<span class="font-body-sm text-[11px] text-on-surface-variant">Request to Book Active</span>
</div>
</div>
<!-- Compact Demonstration Inventory Table -->
<div class="overflow-x-auto rounded-lg shadow-sm">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container font-label-sm text-label-sm text-on-surface uppercase tracking-wider">
<th class="py-2.5 px-3 font-semibold">Unit ID</th>
<th class="py-2.5 px-3 font-semibold">Type & Block</th>
<th class="py-2.5 px-3 font-semibold">Specs</th>
<th class="py-2.5 px-3 font-semibold">Furnishing</th>
<th class="py-2.5 px-3 font-semibold text-right">Rental Rate</th>
<th class="py-2.5 px-3 font-semibold text-center">Status</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container bg-surface-container-lowest font-body-sm text-body-sm">
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-3 px-3 font-mono font-bold text-primary">A-101</td>
<td class="py-3 px-3 font-medium text-on-surface">2BHK Apartment (Block A)</td>
<td class="py-3 px-3 text-on-surface-variant">2 Bed • 2 Bath • 115 m²</td>
<td class="py-3 px-3 text-on-surface-variant">Fully Furnished</td>
<td class="py-3 px-3 font-mono font-semibold text-on-surface text-right">
                  7,500 <span class="text-[10px] text-on-surface-variant">SAR/mo</span>
</td>
<td class="py-3 px-3 text-center">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-label-sm font-label-sm font-medium bg-[#EBF6F0] text-[#2E7D32]">
<span class="w-1.5 h-1.5 rounded-full bg-[#2E7D32]"></span> Available
                  </span>
</td>
</tr>
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-3 px-3 font-mono font-bold text-primary">A-102</td>
<td class="py-3 px-3 font-medium text-on-surface">3BHK Apartment (Block A)</td>
<td class="py-3 px-3 text-on-surface-variant">3 Bed • 3 Bath • 145 m²</td>
<td class="py-3 px-3 text-on-surface-variant">Partially Furnished</td>
<td class="py-3 px-3 font-mono font-semibold text-on-surface text-right">
                  9,200 <span class="text-[10px] text-on-surface-variant">SAR/mo</span>
</td>
<td class="py-3 px-3 text-center">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-label-sm font-label-sm font-medium bg-[#EBF6F0] text-[#2E7D32]">
<span class="w-1.5 h-1.5 rounded-full bg-[#2E7D32]"></span> Available
                  </span>
</td>
</tr>
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-3 px-3 font-mono font-bold text-primary">B-201</td>
<td class="py-3 px-3 font-medium text-on-surface">1BHK Studio (Block B)</td>
<td class="py-3 px-3 text-on-surface-variant">1 Bed • 1.5 Bath • 78 m²</td>
<td class="py-3 px-3 text-on-surface-variant">Fully Furnished</td>
<td class="py-3 px-3 font-mono font-semibold text-on-surface text-right">
                  5,400 <span class="text-[10px] text-on-surface-variant">SAR/mo</span>
</td>
<td class="py-3 px-3 text-center">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-label-sm font-label-sm font-medium bg-[#FFFAEB] text-[#D35400]">
<span class="w-1.5 h-1.5 rounded-full bg-[#D35400]"></span> Reserved
                  </span>
</td>
</tr>
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-3 px-3 font-mono font-bold text-primary">V-01</td>
<td class="py-3 px-3 font-medium text-on-surface">4BHK Villa (Zone C)</td>
<td class="py-3 px-3 text-on-surface-variant">4 Bed • 5 Bath • 380 m²</td>
<td class="py-3 px-3 text-on-surface-variant">Unfurnished</td>
<td class="py-3 px-3 font-mono font-semibold text-on-surface text-right">
                  180,000 <span class="text-[10px] text-on-surface-variant">SAR/yr</span>
</td>
<td class="py-3 px-3 text-center">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-label-sm font-label-sm font-medium bg-surface-container-high text-on-surface-variant">
<span class="w-1.5 h-1.5 rounded-full bg-outline"></span> Maintenance
                  </span>
</td>
</tr>
</tbody>
</table>
</div>
<div class="flex items-center justify-between text-body-sm text-on-surface-variant pt-1"><div class="flex flex-col gap-0.5">
<p class="font-body-sm text-body-sm">
  <strong class="text-on-surface">4 of 12 units configured</strong> (8 units pending configuration).
</p>
<p class="font-body-sm text-[11px] text-on-surface-variant">
  Incomplete units are pending setup and are not available for booking. Units can be added or edited at any time after saving.
</p>
</div>
<span class="font-label-sm text-label-sm font-medium text-primary cursor-pointer hover:underline" role="button" tabindex="0" data-demo="Download Matrix (.CSV)">Download Matrix (.CSV)</span></div>
</section>
<!-- SECTION 4: Photos & Documents Summary -->
<section class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md"><div class="flex items-center justify-between pb-space-sm border-b border-surface-container">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[20px]">perm_media</span>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">4. Photos & Documents</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Property photos, blueprints, and uploaded documents</p>
</div>
</div>
<a class="flex items-center gap-1 font-label-md text-label-md font-semibold text-primary hover:text-primary-container transition-colors" href="{{ route('manager.add-property-5') }}">
<span class="">Edit Step 5</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-12 gap-space-md items-center">
<div class="md:col-span-4 relative rounded-xl overflow-hidden shadow-sm aspect-[4/3] bg-surface-container">
<img class="w-full h-full object-cover" data-alt="High-end architectural photograph of Al-Yasmin residential compound entrance in Riyadh" src="{{ asset('assets/aqar/images/7bbc06333c8cab809aaa.jpg') }}" alt="High-end architectural photograph of Al-Yasmin residential compound entrance in Riyadh">
<div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent flex flex-col justify-end p-2.5">
<span class="self-start px-2 py-0.5 rounded text-[10px] font-bold tracking-wider uppercase bg-[#E6B45C] text-[#271900]">
  Main Cover
</span>
<span class="text-white font-label-sm text-label-sm font-medium mt-1 truncate">Front Entrance & Royal Palms</span>
</div>
</div>
<div class="md:col-span-8 flex flex-col gap-space-sm">
<div class="grid grid-cols-2 gap-space-sm">
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col">
<span class="font-label-sm text-label-sm uppercase text-on-surface-variant">Staged Photos</span>
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">14 Photos</span>
<span class="font-body-sm text-[11px] text-on-surface-variant">6 Compound • 8 Unit Specific</span>
</div>
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col">
<span class="font-label-sm text-label-sm uppercase text-on-surface-variant">Floor Plans</span>
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">2 Schematics</span>
<span class="font-body-sm text-[11px] text-on-surface-variant">Master Site + 2BHK Layout</span>
</div>
</div>
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col gap-1.5">
<span class="font-label-sm text-label-sm uppercase font-semibold text-on-surface-variant">Uploaded Documents (4 Files)</span>
<div class="flex flex-wrap gap-1.5">
<span class="px-2 py-1 rounded bg-surface-container-lowest text-on-surface font-body-sm text-body-sm flex items-center gap-1 shadow-xs">
<span class="material-symbols-outlined text-[14px] text-primary">description</span> Title Deed (Attached)
</span>
<span class="px-2 py-1 rounded bg-surface-container-lowest text-on-surface font-body-sm text-body-sm flex items-center gap-1 shadow-xs">
<span class="material-symbols-outlined text-[14px] text-primary">description</span> Hazard & Civil Insurance (Attached)
</span>
<span class="px-2 py-1 rounded bg-surface-container-lowest text-on-surface font-body-sm text-body-sm flex items-center gap-1 shadow-xs">
<span class="material-symbols-outlined text-[14px] text-primary">description</span> Building Completion Cert (Attached)
</span>
<span class="px-2 py-1 rounded bg-surface-container-lowest text-on-surface font-body-sm text-body-sm flex items-center gap-1 shadow-xs">
<span class="material-symbols-outlined text-[14px] text-primary">description</span> REGA Operating Mandate (Attached)
</span>
</div>
</div>
</div>
</div>
<div class="p-space-sm rounded-xl bg-surface-container-high/30 flex flex-col gap-space-xs text-body-sm">
<span class="font-label-sm text-label-sm uppercase font-semibold text-on-surface-variant">Privacy & Visibility</span>
<p class="font-body-sm text-[12px] text-on-surface-variant leading-relaxed">
Private ownership documents, agreements, and IDs remain restricted to authorized property managers and owners. Property photos and public details remain unpublished and will not be displayed publicly merely by saving.
</p>
</div></section>
<!-- SECTION 5: Final Review Checklist -->
<section class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md"><div class="flex items-center justify-between pb-space-sm border-b border-surface-container">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[20px]">checklist</span>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">5. Final Review Checklist</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Review summary before saving the property</p>
</div>
</div>
<div class="flex items-center gap-2">
<span class="px-2.5 py-1 rounded-full text-label-sm font-label-sm font-semibold bg-[#EBF6F0] text-[#2E7D32]">
  6 Complete
</span>
<span class="px-2.5 py-1 rounded-full text-label-sm font-label-sm font-semibold bg-[#FFFAEB] text-[#D35400]">
  1 Needs Attention
</span>
<span class="px-2.5 py-1 rounded-full text-label-sm font-label-sm font-semibold bg-surface-container text-on-surface-variant">
  1 Optional
</span>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-sm">
<div class="flex items-center gap-space-sm p-space-sm rounded-lg bg-surface-container-low">
<div class="w-5 h-5 rounded-full bg-[#2E7D32] text-on-primary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[14px]">check</span>
</div>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md font-semibold text-on-surface truncate">Basic Information</span>
<span class="font-body-sm text-[11px] text-on-surface-variant truncate">Name, category, description, and specs entered</span>
</div>
</div>
<div class="flex items-center gap-space-sm p-space-sm rounded-lg bg-surface-container-low">
<div class="w-5 h-5 rounded-full bg-[#2E7D32] text-on-primary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[14px]">check</span>
</div>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md font-semibold text-on-surface truncate">Property Location</span>
<span class="font-body-sm text-[11px] text-on-surface-variant truncate">District, city, country, and address confirmed</span>
</div>
</div>
<div class="flex items-center gap-space-sm p-space-sm rounded-lg bg-surface-container-low">
<div class="w-5 h-5 rounded-full bg-[#2E7D32] text-on-primary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[14px]">check</span>
</div>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md font-semibold text-on-surface truncate">Ownership & Manager</span>
<span class="font-body-sm text-[11px] text-on-surface-variant truncate">Owner (Muqrin Real Estate) & Manager assigned</span>
</div>
</div>
<div class="flex items-center gap-space-sm p-space-sm rounded-lg bg-[#FFFAEB] border border-[#D35400]/20">
<div class="w-5 h-5 rounded-full bg-[#D35400] text-white flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[14px]">priority_high</span>
</div>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md font-semibold text-[#D35400] truncate">Units Configuration (Needs Attention)</span>
<span class="font-body-sm text-[11px] text-on-surface-variant truncate">4 of 12 units configured (8 units pending setup)</span>
</div>
</div>
<div class="flex items-center gap-space-sm p-space-sm rounded-lg bg-surface-container-low">
<div class="w-5 h-5 rounded-full bg-[#2E7D32] text-on-primary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[14px]">check</span>
</div>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md font-semibold text-on-surface truncate">Rental Details</span>
<span class="font-body-sm text-[11px] text-on-surface-variant truncate">Pricing, terms, and Request to Book policy set</span>
</div>
</div>
<div class="flex items-center gap-space-sm p-space-sm rounded-lg bg-surface-container-low">
<div class="w-5 h-5 rounded-full bg-[#2E7D32] text-on-primary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[14px]">check</span>
</div>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md font-semibold text-on-surface truncate">Property Photos</span>
<span class="font-body-sm text-[11px] text-on-surface-variant truncate">14 staged photos with cover image selected</span>
</div>
</div>
<div class="flex items-center gap-space-sm p-space-sm rounded-lg bg-surface-container-low">
<div class="w-5 h-5 rounded-full bg-[#2E7D32] text-on-primary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[14px]">check</span>
</div>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md font-semibold text-on-surface truncate">Uploaded Documents</span>
<span class="font-body-sm text-[11px] text-on-surface-variant truncate">4 property and agreement documents attached</span>
</div>
</div>
<div class="flex items-center gap-space-sm p-space-sm rounded-lg bg-surface-container-high/40">
<div class="w-5 h-5 rounded-full bg-outline/40 text-on-surface-variant flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[14px]">remove</span>
</div>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md font-medium text-on-surface-variant truncate">Inspection Damage Log (Optional)</span>
<span class="font-body-sm text-[11px] text-on-surface-variant truncate">Optional post-save configuration</span>
</div>
</div>
</div>
<p class="font-body-sm text-[12px] text-on-surface-variant pt-1">
<strong class="text-on-surface">Note:</strong> Property can be saved as Draft or added to Portfolio with pending units.
</p></section>
<!-- SECTION 6: Educational Guidance: Property Status After Saving -->
<section class="p-space-lg rounded-xl bg-surface-container-low shadow-sm flex flex-col gap-space-sm"><div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined text-[24px] text-primary">help_outline</span>
<h4 class="font-headline-sm text-headline-sm text-on-surface font-bold">What happens when you click Save Property?</h4>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-md pt-space-xs">
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-xs flex flex-col gap-1.5">
<div class="flex items-center gap-2 text-on-surface font-label-lg text-label-lg font-bold">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">save</span>
  Save as Draft
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
  Save your current progress and continue editing later. Your property and unit configurations remain strictly private.
</p>
</div>
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-xs flex flex-col gap-1.5 ring-1 ring-primary/20">
<div class="flex items-center gap-2 text-primary font-label-lg text-label-lg font-bold">
<span class="material-symbols-outlined text-[18px] text-primary">done_all</span>
  Save Property
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
  Add this property to your property portfolio. Public visibility and booking availability are managed separately.
</p>
</div>
</div>
<div class="p-space-sm rounded-lg bg-surface-container-high/40 mt-1">
<p class="font-body-sm text-[12px] text-on-surface-variant leading-relaxed">
<strong class="text-on-surface">Important Clarification:</strong> Saving does not automatically publish a public listing, enable bookings, activate payments, create leases, notify tenants, or trigger maintenance workflows.
</p>
</div></section>
<!-- SECTION 7: Illustrative Modal Preview / Success State Concept -->
<section class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md"><div class="flex items-center justify-between pb-space-sm border-b border-surface-container">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[20px]">celebration</span>
</div>
<div>
<h4 class="font-headline-sm text-headline-sm text-on-surface font-bold">Review complete — UI preview</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Explore the sample property screens below. Saving will be available in the backend phase.</p>
</div>
</div>
<span class="px-2 py-0.5 rounded text-label-sm font-label-sm font-semibold bg-surface-container-high text-on-surface-variant">
  Illustrative Prototype Preview
</span>
</div>
<div class="p-space-lg rounded-xl bg-surface-container-low flex flex-col items-center text-center max-w-lg mx-auto w-full shadow-inner">
<div class="w-14 h-14 rounded-full bg-[#EBF6F0] text-[#2E7D32] flex items-center justify-center mb-space-sm shadow-sm">
<span class="material-symbols-outlined text-[32px]">check_circle</span>
</div>
<h4 class="font-headline-md text-headline-md font-bold text-on-surface">No property has been saved</h4>
<p class="font-body-md text-body-md text-on-surface-variant mt-1 max-w-sm">Al-Yasmin Compound II and its reference are static sample data.</p>
<div class="flex items-center gap-space-sm mt-space-md">
<a class="px-space-md py-2 rounded-lg bg-primary-container text-on-primary font-label-md text-label-md font-semibold shadow-sm" href="{{ route('manager.property-details') }}">
  View Property Dashboard
</a>
<a class="px-space-md py-2 rounded-lg bg-surface-container-lowest text-on-surface font-label-md text-label-md font-medium shadow-sm" href="{{ route('manager.properties') }}">
  Back to Properties
</a>
</div>
</div></section>
</div>
<!-- Right 4 Columns: Sticky Property Summary & Final Commit Actions -->
<div class="lg:col-span-4 flex flex-col gap-space-lg sticky top-24"><div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col items-center text-center">
<div class="flex items-center justify-between w-full mb-space-sm">
<span class="font-label-sm text-label-sm uppercase font-semibold text-on-surface-variant tracking-wider">Property Review</span>
<span class="font-label-sm text-label-sm font-bold text-[#2E7D32]">Ready to Save</span>
</div>
<div class="relative w-36 h-36 flex items-center justify-center my-space-xs">
<svg class="w-full h-full transform -rotate-90" viewBox="0 0 100 100">
<circle class="text-surface-container" cx="50" cy="50" fill="transparent" r="42" stroke="currentColor" stroke-width="8"></circle>
<circle class="text-primary transition-all duration-1000 ease-out" cx="50" cy="50" fill="transparent" r="42" stroke="currentColor" stroke-dasharray="264" stroke-dashoffset="45" stroke-linecap="round" stroke-width="8"></circle>
</svg>
<div class="absolute flex flex-col items-center justify-center">
<span class="font-headline-lg text-headline-lg font-bold text-on-surface leading-none">83%</span>
<span class="font-label-sm text-[11px] text-on-surface-variant mt-0.5">5 of 6 Complete</span>
</div>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-space-xs">
  Review summary: 5 of 6 wizard steps completed. 4 of 12 units configured.
</p>
</div>
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-sm">
<div class="flex items-center justify-between border-b border-surface-container pb-space-sm">
<h4 class="font-headline-sm text-headline-sm font-bold text-on-surface">Property Snapshot</h4>
<span class="font-mono text-label-sm text-primary font-bold">PRP-RYD-2026-0089</span>
</div>
<div class="flex flex-col gap-space-xs text-body-sm divide-y divide-surface-container">
<div class="flex justify-between items-center py-1.5">
<span class="text-on-surface-variant">Asset Name:</span>
<span class="font-semibold text-on-surface text-right">Al-Yasmin Compound II</span>
</div>
<div class="flex justify-between items-center py-1.5">
<span class="text-on-surface-variant">Class & Tier:</span>
<span class="font-medium text-on-surface text-right">Class A Prime Residential</span>
</div>
<div class="flex justify-between items-center py-1.5">
<span class="text-on-surface-variant">Location:</span>
<span class="font-medium text-on-surface text-right">Al-Yasmin, Riyadh, KSA</span>
</div>
<div class="flex justify-between items-center py-1.5">
<span class="text-on-surface-variant">Owner Entity:</span>
<span class="font-medium text-on-surface text-right">Muqrin RE Holdings (100%)</span>
</div>
<div class="flex justify-between items-center py-1.5">
<span class="text-on-surface-variant">Manager / Fee:</span>
<span class="font-medium text-on-surface text-right">Eng. Sultan (8.5% fee)</span>
</div>
<div class="flex justify-between items-center py-1.5">
<span class="text-on-surface-variant">Inventory:</span>
<span class="font-semibold text-on-surface text-right">4 of 12 Units Configured</span>
</div>
<div class="flex justify-between items-center py-1.5">
<span class="text-on-surface-variant">Rental Rates:</span>
<span class="font-mono text-on-surface text-right">5.4k – 180k SAR</span>
</div>
<div class="flex justify-between items-center py-1.5">
<span class="text-on-surface-variant">Staged Media:</span>
<span class="font-medium text-on-surface text-right">14 Photos + 2 Plans</span>
</div>
<div class="flex justify-between items-center py-1.5">
<span class="text-on-surface-variant">Documents:</span>
<span class="font-medium text-[#2E7D32] text-right">4 Documents Attached</span>
</div>
<div class="flex justify-between items-center py-1.5">
<span class="text-on-surface-variant">Status:</span>
<span class="font-semibold text-primary text-right">Draft (Unpublished)</span>
</div>
</div>
</div>
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col gap-space-sm">
<button class="w-full py-3 px-space-md rounded-lg bg-primary-container text-on-primary font-label-lg text-label-lg font-bold shadow-md hover:bg-primary transition-all duration-200 flex items-center justify-center gap-2 group" type="button" data-demo="Save Property">
<span class="material-symbols-outlined text-[20px] group-hover:scale-110 transition-transform">check_circle</span>
<span class="">Save Property</span>
</button>
<div class="grid grid-cols-2 gap-space-xs">
<button class="py-2.5 px-3 rounded-lg bg-surface-container-low text-on-surface font-label-md text-label-md font-medium hover:bg-surface-container transition-colors flex items-center justify-center gap-1" type="button" data-demo="Save Draft">
<span class="material-symbols-outlined text-[16px]">save</span>
<span class="">Save Draft</span>
</button>
<a class="py-2.5 px-3 rounded-lg bg-surface-container-low text-on-surface font-label-md text-label-md font-medium hover:bg-surface-container transition-colors flex items-center justify-center gap-1" href="{{ route('manager.add-property-5') }}">
<span class="material-symbols-outlined text-[16px]">arrow_back</span>
<span class="">Back (Step 5)</span>
</a>
</div>
<p class="font-body-sm text-[11px] text-center text-on-surface-variant pt-1">
  Save your property to add it to your property portfolio. You can resume editing anytime.
</p>
</div></div>
</div>
</div>
@endsection
