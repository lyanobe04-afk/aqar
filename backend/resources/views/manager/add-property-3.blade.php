{{-- Imported from client_demo/screens/add_new_property_step_3/code.html; static demonstration data. --}}
@extends('layouts.manager')
@section('content')
<div class="flex flex-col w-full">
<!-- Breadcrumb Navigation -->
<div class="flex items-center gap-space-xs text-on-surface-variant font-body-sm text-body-sm mb-space-md">
<a class="hover:text-primary transition-colors" href="{{ route('manager.properties') }}">Properties</a>
<span class="material-symbols-outlined text-[16px] text-outline-variant">chevron_right</span>
<a class="hover:text-primary transition-colors" href="{{ route('manager.add-property-1') }}">Add New Property</a>
<span class="material-symbols-outlined text-[16px] text-outline-variant">chevron_right</span>
<span class="text-on-surface font-label-md text-label-md font-semibold">Step 3: Ownership & Management</span>
</div>
<!-- Stepper Header Container -->
@include('components.manager.property-steps')
<!-- Main Grid: 8 Columns Form Content + 4 Columns Context Sidebar -->
<div class="grid grid-cols-12 gap-space-lg items-start">
<!-- LEFT COLUMN: Form Sections (8 Cols) -->
<div class="col-span-12 xl:col-span-8 flex flex-col gap-space-lg">
<!-- Card Title & Introductory Section -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm">
<div class="flex flex-col gap-space-xs">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm font-semibold uppercase tracking-wider text-primary">Governance & Accountability Configuration</span>
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm font-medium">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Required Phase
            </span>
</div>
<h2 class="font-headline-lg text-headline-lg text-on-surface font-bold tracking-tight">Step 3: Property Ownership & Management Assignment</h2>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed max-w-3xl">Associate verified asset owners, configure appointed property operators, and establish contractual operational boundaries, agreements, and fee terms.</p>
</div>
</div>
<!-- Section 1: Property Ownership -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-lg">
<div class="flex items-center justify-between pb-space-sm border-b border-surface-container">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-lg bg-surface-container-high flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[20px]">real_estate_agent</span>
</div>
<div><h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">1. Property Owners</h3><p class="font-body-sm text-body-sm text-on-surface-variant">Assign verified property titleholders or syndicate equity partners with optional ownership percentages.</p></div>
</div>
<div class="flex items-center gap-space-sm">
<button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface font-label-md text-label-md font-medium transition-colors" type="button" data-demo="Add Multiple Owners">
<span class="material-symbols-outlined text-[16px]">group_add</span>
              Add Multiple Owners
            </button>
<button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-primary-container text-on-primary hover:bg-primary font-label-md text-label-md font-medium shadow-sm transition-all" type="button" data-demo="New Owner">
<span class="material-symbols-outlined text-[16px]">person_add</span>
              New Owner
            </button>
</div>
</div>
<!-- Search / Select Owner Dropdown Input -->
<div class="flex flex-col gap-space-xs">
<label class="font-label-md text-label-md font-semibold text-on-surface flex items-center justify-between">
<span class="">Primary Property Owner <span class="text-error">*</span></span>
<span class="font-body-sm text-body-sm text-on-surface-variant font-normal">Search from property owner records</span>
</label>
<div class="relative flex items-center">
<span class="material-symbols-outlined absolute left-3.5 text-on-surface-variant text-[20px] pointer-events-none">search</span>
<input class="w-full h-11 pl-11 pr-10 bg-surface-container-low text-on-surface font-body-md text-body-md rounded-lg cursor-pointer focus:bg-surface-container-lowest transition-all outline-none" readonly="" type="text" value="Sheikh Abdulaziz Al-Muqrin — Muqrin Real Estate Holdings (ID: OWN-SA-8821)">
<span class="material-symbols-outlined absolute right-3 text-on-surface-variant text-[20px] pointer-events-none">arrow_drop_down</span>
</div>
</div>
<!-- Selected Owner Profile Card Display -->
<div class="bg-surface-container-low rounded-xl p-space-md flex flex-col gap-space-md">
<div class="flex items-start justify-between">
<div class="flex items-start gap-space-md">
<div class="w-12 h-12 rounded-xl bg-surface-container-lowest flex items-center justify-center text-primary shadow-sm shrink-0">
<span class="material-symbols-outlined text-[28px]">corporate_fare</span>
</div>
<div class="flex flex-col">
<div class="flex items-center gap-space-xs">
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">Muqrin Real Estate Holdings Ltd.</span>
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-[#EBF6F0] text-[#2E7D32] font-label-sm text-label-sm font-semibold"><span class="w-1.5 h-1.5 rounded-full bg-[#2E7D32]"></span> Sample Profile</span>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant">Authorized Signatory: Sheikh Abdulaziz Al-Muqrin (President & Founder)</span>
</div>
</div>
<span class="px-2.5 py-1 rounded-md bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-bold uppercase tracking-wider">Company / Commercial Entity</span>
</div>
<!-- Metadata Grid -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-space-md pt-space-xs">
<div class="flex flex-col bg-surface-container-lowest p-space-sm rounded-lg">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Official Email</span>
<span class="font-body-md text-body-md text-on-surface font-medium truncate mt-0.5">a.muqrin@muqrin-holdings.sa</span>
</div>
<div class="flex flex-col bg-surface-container-lowest p-space-sm rounded-lg">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Contact Phone</span>
<span class="font-body-md text-body-md text-on-surface font-medium mt-0.5 dir-ltr text-left">+966 50 123 4567</span>
</div>
<div class="flex flex-col bg-surface-container-lowest p-space-sm rounded-lg"><span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Jurisdiction</span><div class="flex items-center gap-1.5 mt-0.5"><span class="text-[15px]">🇸🇦</span><span class="font-body-md text-body-md text-on-surface font-medium">Saudi Arabia (Riyadh)</span></div></div>
<div class="flex flex-col bg-surface-container-lowest p-space-sm rounded-lg">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">CR / Tax ID</span>
<span class="font-body-md text-body-md text-on-surface font-medium font-mono mt-0.5">1010-4492-99</span>
</div>
</div>
<!-- Equity Allocation Breakdown -->
<div class="pt-space-xs flex flex-col md:flex-row items-center justify-between gap-space-md bg-surface-container-lowest p-space-md rounded-lg"><div class="flex flex-col gap-1 w-full md:w-2/3"><div class="flex items-center justify-between"><span class="font-label-md text-label-md font-semibold text-on-surface">Equity Share Allocation (Optional)</span><span class="font-label-lg text-label-lg font-bold text-primary">100.0% (Sole Titleholder)</span></div><div class="w-full h-2.5 bg-surface-container rounded-full overflow-hidden"><div class="h-full bg-primary-container rounded-full w-full"></div></div><span class="font-body-sm text-body-sm text-on-surface-variant mt-1">Ownership percentage is optional for joint ownership or sole titleholder. Additional syndicate partners can be added as needed.</span></div><div class="flex items-center gap-space-sm shrink-0"><button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-sm text-label-sm font-medium transition-colors" type="button" data-demo="Adjust Allocation"><span class="material-symbols-outlined text-[16px]">tune</span> Adjust Allocation</button></div></div>
</div>
</div>
<!-- Section 2: Property Management & Operational Delegation -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-lg">
<div class="flex items-center justify-between pb-space-sm border-b border-surface-container">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-lg bg-surface-container-high flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[20px]">manage_accounts</span>
</div>
<div><h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">2. Property Manager</h3><p class="font-body-sm text-body-sm text-on-surface-variant">Assign the operational property manager responsible for property administration.</p></div>
</div>
<span class="px-2.5 py-1 rounded-md bg-[#EBF6F0] text-[#2E7D32] font-label-sm text-label-sm font-semibold flex items-center gap-1">
<span class="w-1.5 h-1.5 rounded-full bg-[#2E7D32]"></span> Active (Operational)
          </span>
</div>
<!-- Management Mode Selector Pills -->
<div class="flex flex-col gap-space-xs"><div class="flex items-center justify-between p-space-sm px-space-md rounded-xl bg-primary/5 border border-primary-container/20"><div class="flex items-center gap-space-sm"><span class="material-symbols-outlined text-primary text-[20px]">verified</span><div class="flex flex-col"><span class="font-label-md text-label-md font-bold text-primary">Management Model: Managed by Property Manager (Phase 1)</span><p class="font-body-sm text-body-sm text-on-surface-variant">Direct operational administration assigned to licensed property managers. Self-management and third-party firm models will be enabled in future updates.</p></div></div><span class="px-2.5 py-0.5 rounded-full bg-primary-container text-on-primary font-label-sm text-label-sm font-semibold shrink-0">Active</span></div></div>
<!-- Manager Selector Input -->
<div class="flex flex-col gap-space-xs">
<label class="font-label-md text-label-md font-semibold text-on-surface flex items-center justify-between">
<span class="">Appointed Property Manager</span>
<button class="text-primary hover:underline font-label-sm text-label-sm font-semibold flex items-center gap-1" type="button" data-demo="Add New Manager / Agency">
<span class="material-symbols-outlined text-[14px]">add_circle</span> Add New Manager / Agency
            </button>
</label>
<div class="relative flex items-center">
<span class="material-symbols-outlined absolute left-3.5 text-on-surface-variant text-[20px] pointer-events-none">person_search</span>
<input class="w-full h-11 pl-11 pr-10 bg-surface-container-low text-on-surface font-body-md text-body-md rounded-lg cursor-pointer focus:bg-surface-container-lowest transition-all outline-none" readonly="" type="text" value="Eng. Sultan Al-Shammari — Operations Lead (Internal Majlis Ops)">
<span class="material-symbols-outlined absolute right-3 text-on-surface-variant text-[20px] pointer-events-none">arrow_drop_down</span>
</div>
</div>
<!-- Display Manager Card -->
<div class="bg-surface-container-low rounded-xl p-space-md flex flex-col gap-space-sm">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm">
<div class="flex items-center gap-space-md">
<div class="w-12 h-12 rounded-full bg-primary text-on-primary flex items-center justify-center font-bold text-headline-sm shadow-sm shrink-0">
                SA
              </div>
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">Eng. Sultan Al-Shammari</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Majlis Operational Property Services LLC · Ops License #OP-2023-019</span>
</div>
</div>
<div class="flex items-center gap-space-xs">
<span class="px-2.5 py-1 rounded-md bg-surface-container text-on-surface-variant font-label-sm text-label-sm font-semibold">
                Badge #EMP-9821
              </span>
<button class="p-1.5 hover:bg-surface-container-highest rounded-lg text-on-surface-variant transition-colors" type="button" data-demo="edit" aria-label="edit">
<span class="material-symbols-outlined text-[18px]">edit</span>
</button>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-space-sm pt-space-xs text-body-sm">
<div class="flex items-center gap-2 bg-surface-container-lowest p-space-sm rounded-lg">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">mail</span>
<span class="text-on-surface truncate">sultan.shammari@majlis-portal.com</span>
</div>
<div class="flex items-center gap-2 bg-surface-container-lowest p-space-sm rounded-lg">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">phone</span>
<span class="text-on-surface dir-ltr">+966 54 987 6543</span>
</div>
<div class="flex items-center gap-2 bg-surface-container-lowest p-space-sm rounded-lg">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">date_range</span>
<span class="text-on-surface">Term: Mar 01, 2026 – Feb 28, 2027</span>
</div>
</div>
</div>
</div>
<!-- Section 3: Owner–Manager Agreement & Commercial Terms -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-lg">
<div class="flex items-center justify-between pb-space-sm border-b border-surface-container">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-lg bg-surface-container-high flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[20px]">handshake</span>
</div>
<div><h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">3. Management Agreement</h3><p class="font-body-sm text-body-sm text-on-surface-variant">Set commercial terms, management fee structure, and billing cadence.</p></div>
</div>

</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-space-md"><div class="flex flex-col gap-space-xs">
  <label class="font-label-md text-label-md font-medium text-on-surface">Agreement Reference Code</label>
  <input type="text" value="AGR-2026-YAS-003" class="h-11 px-3.5 rounded-lg border border-outline-variant bg-surface-container-lowest text-on-surface font-body-md text-body-md focus:border-primary focus:outline-none" readonly="">
</div>
<div class="flex flex-col gap-space-xs">
  <label class="font-label-md text-label-md font-medium text-on-surface">Effective Start Date</label>
  <div class="relative flex items-center">
    <input type="text" value="2026-03-01" class="w-full h-11 px-3.5 pr-10 rounded-lg border border-outline-variant bg-surface-container-lowest text-on-surface font-body-md text-body-md focus:border-primary focus:outline-none" readonly="">
    <span class="material-symbols-outlined absolute right-3 text-on-surface-variant text-lg">calendar_today</span>
  </div>
</div>
<div class="flex flex-col gap-space-xs">
  <label class="font-label-md text-label-md font-medium text-on-surface">Agreement End Date <span class="text-on-surface-variant font-normal">(Optional)</span></label>
  <div class="relative flex items-center">
    <input type="text" value="2027-02-28" placeholder="YYYY-MM-DD" class="w-full h-11 px-3.5 pr-10 rounded-lg border border-outline-variant bg-surface-container-lowest text-on-surface font-body-md text-body-md focus:border-primary focus:outline-none">
    <span class="material-symbols-outlined absolute right-3 text-on-surface-variant text-lg">event</span>
  </div>
</div></div>
<!-- Management Fee Structure -->
<div class="flex flex-col gap-space-sm bg-surface-container-low p-space-md rounded-xl"><div class="flex items-center justify-between"><label class="font-label-md text-label-md font-semibold text-on-surface">Management Fee Structure</label><span class="font-body-sm text-body-sm text-on-surface-variant">Select fee model and payment frequency</span></div><div class="grid grid-cols-1 md:grid-cols-2 gap-space-sm"><label class="flex items-start gap-space-sm p-space-md rounded-xl bg-surface-container-lowest border-2 border-primary cursor-pointer shadow-sm"><input checked="" class="text-primary focus:ring-primary h-4 w-4 mt-1" name="fee_structure_type" type="radio"><div class="flex flex-col flex-1"><div class="flex items-center justify-between"><span class="font-label-md text-label-md font-bold text-on-surface">Percentage Fee</span><span class="px-2 py-0.5 rounded bg-primary/10 text-primary font-label-sm text-label-sm font-bold">Active Model</span></div><p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Calculated as a contracted commission share of collected gross rental revenue.</p><div class="mt-space-sm flex items-center gap-2"><div class="relative flex-1"><input class="w-full h-10 px-3 pr-8 bg-surface-container-low text-on-surface font-body-md text-body-md font-bold rounded-lg border border-outline-variant/30 focus:border-primary outline-none" type="number" value="8.5" step="0.1" min="0" max="100"><span class="absolute right-3 top-2.5 font-bold text-on-surface-variant text-[14px]">%</span></div><span class="font-body-sm text-body-sm text-on-surface-variant whitespace-nowrap">of collected rent</span></div></div></label><label class="flex items-start gap-space-sm p-space-md rounded-xl bg-surface-container-lowest border border-outline-variant/30 hover:border-primary/50 cursor-pointer transition-colors"><input class="text-primary focus:ring-primary h-4 w-4 mt-1" name="fee_structure_type" type="radio"><div class="flex flex-col flex-1"><span class="font-label-md text-label-md font-bold text-on-surface">Fixed Fee</span><p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Preset recurrent management fee regardless of monthly tenancy fluctuations.</p><div class="mt-space-sm grid grid-cols-3 gap-2"><input class="col-span-2 h-10 px-3 bg-surface-container-low text-on-surface font-body-md text-body-md font-medium rounded-lg border border-outline-variant/30 outline-none" placeholder="Amount (e.g. 12,000)" type="text" value="12,000"><select class="h-10 px-2 bg-surface-container-low text-on-surface font-label-md text-label-md font-medium rounded-lg border border-outline-variant/30 outline-none cursor-pointer"><option selected="" value="SAR">SAR</option><option value="USD">USD</option><option value="EUR">EUR</option><option value="AED">AED</option></select></div></div></label></div><div class="grid grid-cols-1 md:grid-cols-2 gap-space-md pt-space-xs"><div class="flex flex-col gap-space-xs"><label class="font-label-md text-label-md font-semibold text-on-surface">Payment Frequency</label><select class="h-10 px-3 bg-surface-container-lowest text-on-surface font-body-md text-body-md rounded-lg border border-outline-variant/30 outline-none cursor-pointer"><option value="monthly">Monthly Cadence</option><option selected="" value="quarterly">Quarterly Cadence</option><option value="annually">Annually Cadence</option></select></div><div class="flex flex-col gap-space-xs"><label class="font-label-md text-label-md font-semibold text-on-surface">Billing Grace Period</label><input class="h-10 px-3 bg-surface-container-lowest text-on-surface font-body-md text-body-md rounded-lg border border-outline-variant/30 outline-none" type="text" value="15 days following collection cutoff"></div></div></div>
<!-- Agreement Notes -->
<div class="flex flex-col gap-space-xs">
<label class="font-label-md text-label-md font-semibold text-on-surface">Special Contractual Stipulations</label>
<textarea class="w-full p-space-sm bg-surface-container-low text-on-surface font-body-md text-body-md rounded-lg outline-none resize-none" rows="2">Standard commercial property management agreement covering leasing, tenant vetting, rent collection, scheduled preventive HVAC maintenance, and direct municipal facility coordination.</textarea>
</div>
<!-- Upload Agreement Document -->
<div class="flex flex-col gap-space-xs">
<div class="flex items-center justify-between">
<label class="font-label-md text-label-md font-semibold text-on-surface">Executed Management Agreement</label>
<span class="font-body-sm text-body-sm text-on-surface-variant">Optional in initial setup</span>
</div>
<!-- Upload Box / Uploaded State Preview -->
<div class="flex items-center justify-between p-space-md rounded-xl bg-surface-container-low">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-lg bg-primary-container text-on-primary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[22px]">picture_as_pdf</span>
</div>
<div class="flex flex-col"><span class="font-label-md text-label-md font-bold text-on-surface">Yasmin-Compound-Management-Agreement-2026.pdf</span><span class="font-body-sm text-body-sm text-on-surface-variant">2.4 MB · Uploaded by Eng. Sultan · Mar 18, 2026</span></div>
</div>
<div class="flex items-center gap-space-sm">
<button class="p-2 hover:bg-surface-container text-on-surface-variant rounded-lg transition-colors" title="Download Document" type="button" data-demo="Download Document" aria-label="Download Document">
<span class="material-symbols-outlined text-[18px]">download</span>
</button>
<button class="p-2 hover:bg-error-container text-error rounded-lg transition-colors" title="Remove Document" type="button" data-demo="Remove Document" aria-label="Remove Document">
<span class="material-symbols-outlined text-[18px]">delete</span>
</button>
</div>
</div>
</div>
</div>
<!-- Section 4: Operational Permissions & Responsibilities Matrix -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-lg">
<div class="flex items-center justify-between pb-space-sm border-b border-surface-container">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-lg bg-surface-container-high flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[20px]">shield</span>
</div>
<div><h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">4. Manager Permissions</h3><p class="font-body-sm text-body-sm text-on-surface-variant">Configure operational permissions and authorities granted to the manager.</p></div>
</div>
<button class="text-primary hover:underline font-label-md text-label-md font-semibold" type="button" data-demo="Select All Institutional Defaults">
            Select All Institutional Defaults
          </button>
</div>
<!-- Explanatory Banner -->
<div class="flex items-center gap-space-sm p-space-sm px-space-md rounded-lg bg-secondary-fixed/50 text-on-secondary-fixed-variant"><span class="material-symbols-outlined text-[20px] text-secondary">verified_user</span><span class="font-body-sm text-body-sm leading-relaxed">Permissions govern digital workspace actions. Legal and formal notice actions require deedholder approval.</span></div>
<!-- Permissions List Grid -->
<div class="flex flex-col divide-y divide-surface-container">
<!-- Permission 1 -->
<div class="py-space-sm flex items-center justify-between">
<div class="flex items-start gap-space-sm max-w-xl">
<span class="material-symbols-outlined text-primary text-[20px] mt-0.5">edit_note</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Manage Property Details</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Edit compound title, architectural baseline description, amenities, and promotional gallery assets.</span>
</div>
</div>
<label class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox">
<div class="w-11 h-6 bg-surface-container-highest peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-container"></div>
</label>
</div>
<!-- Permission 2 -->
<div class="py-space-sm flex items-center justify-between">
<div class="flex items-start gap-space-sm max-w-xl">
<span class="material-symbols-outlined text-primary text-[20px] mt-0.5">meeting_room</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Manage Units & Availability</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Configure individual villas/apartments, floor plans, lease-readiness tags, and pricing variations.</span>
</div>
</div>
<label class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox">
<div class="w-11 h-6 bg-surface-container-highest peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-container"></div>
</label>
</div>
<!-- Permission 3 -->
<div class="py-space-sm flex items-center justify-between"><div class="flex items-start gap-space-sm max-w-xl"><span class="material-symbols-outlined text-primary text-[20px] mt-0.5">event_available</span><div class="flex flex-col"><span class="font-label-md text-label-md font-semibold text-on-surface">Review & Approve Booking Requests</span><span class="font-body-sm text-body-sm text-on-surface-variant">Review incoming tenant booking and reservation requests, verify applicant information, and approve reservation holds.</span></div></div><label class="relative inline-flex items-center cursor-pointer"><input checked="" class="sr-only peer" type="checkbox"><div class="w-11 h-6 bg-surface-container-highest peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-container"></div></label></div>
<!-- Permission 4 -->
<div class="py-space-sm flex items-center justify-between">
<div class="flex items-start gap-space-sm max-w-xl">
<span class="material-symbols-outlined text-primary text-[20px] mt-0.5">account_balance_wallet</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Record & Verify Offline Payments</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Log bank wire confirmations, upload security deposit receipts, and reconcile accounts.</span>
</div>
</div>
<label class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox">
<div class="w-11 h-6 bg-surface-container-highest peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-container"></div>
</label>
</div>
<!-- Permission 5 -->
<div class="py-space-sm flex items-center justify-between">
<div class="flex items-start gap-space-sm max-w-xl">
<span class="material-symbols-outlined text-primary text-[20px] mt-0.5">construction</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Coordinate Maintenance & Field Tickets</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Dispatch approved service contractors and coordinate repair work within administrator-configured operating limits.</span>
</div>
</div>
<label class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox">
<div class="w-11 h-6 bg-surface-container-highest peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-container"></div>
</label>
</div>
<!-- Permission 6 -->
<div class="py-space-sm flex items-center justify-between">
<div class="flex items-start gap-space-sm max-w-xl">
<span class="material-symbols-outlined text-primary text-[20px] mt-0.5">forum</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">Manage Tenant Communications</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Issue regulatory notices, lease renewal invitations, compound access updates, and incident reports.</span>
</div>
</div>
<label class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox">
<div class="w-11 h-6 bg-surface-container-highest peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-container"></div>
</label>
</div>
<!-- Permission 7 -->
<div class="py-space-sm flex items-center justify-between">
<div class="flex items-start gap-space-sm max-w-xl">
<span class="material-symbols-outlined text-primary text-[20px] mt-0.5">monitoring</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">View Financial & Portfolio Reports</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Review unit income statements, historical rent rolls, occupancy yield ratios, and collection aging stats.</span>
</div>
</div>
<label class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox">
<div class="w-11 h-6 bg-surface-container-highest peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-container"></div>
</label>
</div>
<!-- Permission 8: Disabled / Restricted -->
<div class="py-space-sm flex items-center justify-between bg-surface-container-low/50 px-space-sm rounded-lg"><div class="flex items-start gap-space-sm max-w-xl"><span class="material-symbols-outlined text-outline text-[20px] mt-0.5">gavel</span><div class="flex flex-col"><div class="flex items-center gap-space-xs"><span class="font-label-md text-label-md font-semibold text-on-surface">Dispute Filings & Formal Notices</span><span class="px-2 py-0.2 rounded bg-error-container text-on-error-container font-label-sm text-label-sm font-bold">Requires Authorization</span></div><span class="font-body-sm text-body-sm text-on-surface-variant">Submit statutory eviction notices or formal arbitration claims with mandatory deedholder authorization.</span></div></div><label class="relative inline-flex items-center cursor-not-allowed opacity-60"><input class="sr-only peer" disabled="" type="checkbox"><div class="w-11 h-6 bg-surface-container-highest rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all"></div></label></div>
</div>
</div>
</div>
<!-- RIGHT COLUMN: Summary Sidebar & Governance (4 Cols) -->
<div class="col-span-12 xl:col-span-4 flex flex-col gap-space-lg sticky top-24">
<!-- Intake Record Card -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md">
<!-- Header with Progress Donut -->
<div class="flex items-center justify-between pb-space-sm border-b border-surface-container"><div class="flex flex-col"><span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">Intake Progress</span><span class="font-headline-sm text-headline-sm text-on-surface font-bold">2 of 6 Steps Completed</span><span class="font-body-sm text-body-sm text-primary font-medium mt-0.5">Step 3: Ownership & Mgmt In Progress</span></div><div class="relative w-12 h-12 flex items-center justify-center shrink-0"><svg class="w-12 h-12 transform -rotate-90" viewBox="0 0 36 36"><path class="text-surface-container" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="3.5"></path><path class="text-primary-container" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-dasharray="33.3, 100" stroke-linecap="round" stroke-width="3.5"></path></svg><span class="absolute font-label-sm text-label-sm font-bold text-on-surface">2/6</span></div></div>
<!-- Property Identity Banner -->
<div class="flex items-center gap-space-sm">
<div class="w-12 h-12 rounded-lg bg-surface-container flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined text-[26px]">apartment</span>
</div>
<div class="flex flex-col min-w-0">
<h4 class="font-headline-sm text-headline-sm text-on-surface font-bold truncate">Al-Yasmin Compound II</h4>
<div class="flex items-center gap-1.5 font-label-sm text-label-sm text-on-surface-variant">
<span class="font-mono text-primary font-medium">PRP-RYD-2026-0089</span>
<span class="">·</span>
<span class="">#DFT-9042</span>
</div>
</div>
</div>
<!-- Preserved Data Snapshot -->
<div class="flex flex-col gap-space-md pt-space-xs">
<!-- Step 1 Preserved Data -->
<div class="bg-surface-container-low p-space-sm rounded-lg flex flex-col gap-space-xs">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm font-bold uppercase tracking-wider text-on-surface flex items-center gap-1">
<span class="material-symbols-outlined text-[14px] text-primary">info</span> Step 1: Basic Specifications
              </span>
<a class="font-label-sm text-label-sm text-primary hover:underline font-semibold" href="#demo-notice" data-demo="Edit">Edit</a>
</div>
<div class="grid grid-cols-2 gap-2 text-body-sm pt-1">
<div>
<span class="text-on-surface-variant text-[11px] block">Property Type</span>
<span class="font-medium text-on-surface">Residential Compound</span>
</div>
<div>
<span class="text-on-surface-variant text-[11px] block">Architecture</span>
<span class="font-medium text-on-surface">Multi-Unit Matrix</span>
</div>
<div>
<span class="text-on-surface-variant text-[11px] block">Furnishing State</span>
<span class="font-medium text-on-surface">Partially Furnished</span>
</div>
<div>
<span class="text-on-surface-variant text-[11px] block">Lifecycle</span>
<span class="inline-flex items-center gap-1 text-[#2E7D32] font-medium">
<span class="w-1.5 h-1.5 rounded-full bg-[#2E7D32]"></span> Active
                </span>
</div>
</div>
</div>
<!-- Step 2 Preserved Data -->
<div class="bg-surface-container-low p-space-sm rounded-lg flex flex-col gap-space-xs">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm font-bold uppercase tracking-wider text-on-surface flex items-center gap-1">
<span class="material-symbols-outlined text-[14px] text-primary">pin_drop</span> Step 2: Location & Parcel
              </span>
<a class="font-label-sm text-label-sm text-primary hover:underline font-semibold" href="#demo-notice" data-demo="Edit">Edit</a>
</div>
<div class="grid grid-cols-2 gap-2 text-body-sm pt-1">
<div class="col-span-2">
<span class="text-on-surface-variant text-[11px] block">Country & Metropolitan City</span>
<span class="font-medium text-on-surface">Saudi Arabia (KSA) — Riyadh</span>
</div>
<div>
<span class="text-on-surface-variant text-[11px] block">District</span>
<span class="font-medium text-on-surface">Al-Yasmin (حي الياسمين)</span>
</div>
<div>
<span class="text-on-surface-variant text-[11px] block">GPS Coordinates</span>
<span class="font-mono text-on-surface font-medium text-[12px]">24.8256° N, 46.6391° E</span>
</div>
</div>
</div>
<!-- Step 3 In-Flight Summary -->
<div class="pt-3 border-t border-outline-variant flex flex-col gap-2">
  <div class="flex items-center justify-between">
    <span class="font-label-sm text-xs font-bold uppercase tracking-wider text-primary">Step 3: Ownership & Mgmt</span>
    <span class="px-2 py-0.5 rounded text-[11px] font-semibold bg-primary/10 text-primary">In Progress</span>
  </div>
  <div class="grid grid-cols-2 gap-x-2 gap-y-1.5 text-xs text-on-surface-variant">
    <div>
      <span class="block text-[10px] uppercase tracking-wider text-outline">Status</span>
      <span class="font-medium text-on-surface">In Progress</span>
    </div>
    <div>
      <span class="block text-[10px] uppercase tracking-wider text-outline">Fee Type</span>
      <span class="font-medium text-on-surface">Percentage (8.5%)</span>
    </div>
    <div class="col-span-2">
      <span class="block text-[10px] uppercase tracking-wider text-outline">Selected Owner</span>
      <span class="font-medium text-on-surface truncate block">Muqrin Real Estate Holdings</span>
    </div>
    <div class="col-span-2">
      <span class="block text-[10px] uppercase tracking-wider text-outline">Assigned Manager</span>
      <span class="font-medium text-on-surface truncate block">Eng. Sultan Al-Shammari</span>
    </div>
  </div>
</div>
</div>
</div>
<!-- Governance Best Practices Card -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md">
<div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined text-[22px] text-secondary">balance</span>
<h4 class="font-headline-sm text-headline-sm text-on-surface font-bold">Ownership & Property Guidelines</h4>
</div>
<div class="flex flex-col gap-space-sm text-body-sm">
<div class="flex items-start gap-space-xs">
<span class="material-symbols-outlined text-[18px] text-primary shrink-0 mt-0.5">check_circle</span>
<p class="text-on-surface-variant">
<strong class="text-on-surface font-semibold">Multi-Property Owners:</strong> One owner entity can hold multiple commercial or residential deeds across the Majlis network without re-entering compliance credentials.
            </p>
</div>
<div class="flex items-start gap-space-xs">
<span class="material-symbols-outlined text-[18px] text-primary shrink-0 mt-0.5">check_circle</span>
<p class="text-on-surface-variant">
<strong class="text-on-surface font-semibold">Independent Managers:</strong> Delegated operators manage distinct portfolios in complete architectural isolation, eliminating cross-owner ledger exposure.
            </p>
</div>
<div class="flex items-start gap-space-xs"><span class="material-symbols-outlined text-[18px] text-primary shrink-0 mt-0.5">check_circle</span><p class="text-on-surface-variant"><strong class="text-on-surface font-semibold">Digital Delegation:</strong> Operational permissions can be adjusted at any time during tenancy cycles with full audit trail logging.</p></div>
</div>
<div class="pt-space-xs border-t border-surface-container">
<a class="inline-flex items-center justify-between w-full p-space-sm bg-surface-container-low hover:bg-surface-container rounded-lg transition-colors group" href="#demo-notice" data-demo="Governance & Delegation Guide"><div class="flex items-center gap-space-xs"><span class="material-symbols-outlined text-[18px] text-on-surface-variant group-hover:text-primary transition-colors">help_outline</span><span class="font-label-md text-label-md font-semibold text-on-surface">Governance & Delegation Guide</span></div><span class="material-symbols-outlined text-[16px] text-on-surface-variant group-hover:translate-x-0.5 transition-transform">arrow_forward</span></a>
</div>
</div>
</div>
</div>
<!-- Bottom Floating Sticky Action Bar -->
<div class="sticky bottom-6 mt-space-xl bg-surface-container-lowest rounded-xl p-space-md shadow-xl flex flex-col sm:flex-row items-center justify-between gap-space-md border border-surface-container/60 z-30">
<div class="flex items-center gap-space-sm w-full sm:w-auto">
<a class="inline-flex items-center justify-center gap-space-xs px-space-md py-2.5 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface font-label-lg text-label-lg font-semibold transition-all shadow-sm" href="{{ route('manager.add-property-2') }}">
<span class="material-symbols-outlined text-[18px]">arrow_back</span>
        Back to Property Location
      </a>
<button class="inline-flex items-center justify-center gap-space-xs px-space-md py-2.5 rounded-lg bg-transparent hover:bg-surface-container text-on-surface-variant hover:text-on-surface font-label-lg text-label-lg font-medium transition-colors" type="button" data-demo="Save Draft">
<span class="material-symbols-outlined text-[18px]">save</span>
        Save Draft
      </button>
</div>
<div class="flex items-center gap-space-md w-full sm:w-auto justify-end">
<span class="hidden md:inline font-body-sm text-body-sm text-on-surface-variant">Next: Units & Tariff Configuration</span>
<a class="inline-flex items-center justify-center gap-space-xs px-space-lg py-2.5 rounded-lg bg-primary-container hover:bg-primary text-on-primary font-label-lg text-label-lg font-bold shadow-md hover:shadow-lg transition-all active:scale-[0.98]" href="{{ route('manager.add-property-4') }}">
        Continue to Units & Rental (Step 4)
        <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</a>
</div>
</div>
</div>
@endsection
