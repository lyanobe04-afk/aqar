{{-- Imported from client_demo/screens/property_manager_dashboard/code.html; static demonstration data. --}}
@extends('layouts.manager')
@section('content')
<div class="flex flex-col w-full gap-y-space-xl">
<!-- TOP ACTION TOOLBAR & CONTEXT BAR -->
<section class="flex flex-col xl:flex-row xl:items-center justify-between gap-space-md p-space-lg bg-surface-container-lowest rounded-xl shadow-sm">
<div class="flex flex-col gap-space-xs">
<div class="flex items-center gap-space-xs">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm font-semibold">
<span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
          المرحلة الأولى
        </span>
<span class="font-label-md text-label-md text-on-surface-variant">التحقق والموافقة اليدوية</span>
</div>
<h2 class="font-headline-lg text-headline-lg text-on-surface font-bold tracking-tight">لوحة العمليات العقارية والتحصيل</h2>
<p class="font-body-md text-body-md text-on-surface-variant">إشراف مركزي متكامل على الأصول، تدفق الإيجارات، وتأكيد الحجوزات المباشرة</p>
</div>
<!-- Quick Actions Button Cluster -->
<div class="flex flex-wrap items-center gap-space-xs">
<a class="inline-flex items-center gap-2 px-4 py-2.5 bg-primary-container text-on-primary rounded-lg font-label-lg text-label-lg font-semibold hover:bg-primary transition-all duration-150 active:scale-95 shadow-sm" href="{{ route('manager.add-property-1') }}">
<span class="material-symbols-outlined text-[20px]">add_circle</span>
<span>إضافة عقار</span>
</a>
<a class="inline-flex items-center gap-2 px-3.5 py-2.5 bg-surface-container-low text-on-surface rounded-lg font-label-lg text-label-lg font-medium hover:bg-surface-container hover:text-primary transition-colors" href="{{ route('manager.tenants') }}">
<span class="material-symbols-outlined text-[20px] text-on-surface-variant">person_add</span>
<span>إضافة مستأجر</span>
</a>
<a class="inline-flex items-center gap-2 px-3.5 py-2.5 bg-surface-container-low text-on-surface rounded-lg font-label-lg text-label-lg font-medium hover:bg-surface-container hover:text-primary transition-colors" href="{{ route('manager.contracts') }}">
<span class="material-symbols-outlined text-[20px] text-on-surface-variant">description</span>
<span>إنشاء عقد</span>
</a>
<a class="inline-flex items-center gap-2 px-3.5 py-2.5 bg-surface-container-low text-on-surface rounded-lg font-label-lg text-label-lg font-medium hover:bg-surface-container hover:text-primary transition-colors" href="{{ route('manager.payments') }}">
<span class="material-symbols-outlined text-[20px] text-on-surface-variant">receipt_long</span>
<span>تسجيل دفعة</span>
</a>
<a class="inline-flex items-center gap-2 px-3.5 py-2.5 bg-primary/10 text-primary rounded-lg font-label-lg text-label-lg font-semibold hover:bg-primary/15 transition-colors" href="{{ route('manager.bookings') }}">
<span class="material-symbols-outlined text-[20px]">notifications_active</span>
<span>مراجعة الحجوزات</span>
<span class="px-1.5 py-0.5 rounded-full bg-primary text-on-primary font-label-sm text-label-sm font-bold">7</span>
</a>
</div>
</section>
<!-- 6 CORE DASHBOARD KPI CARDS -->
<section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-space-md">
<!-- Card 1: Total Properties -->
<div class="flex flex-col justify-between p-space-md bg-surface-container-lowest rounded-xl shadow-sm hover:shadow-md transition-shadow">
<div class="flex items-center justify-between mb-space-sm">
<span class="font-label-md text-label-md text-on-surface-variant font-medium">إجمالي العقارات</span>
<div class="w-9 h-9 rounded-lg bg-surface-container-high flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[22px]">apartment</span>
</div>
</div>
<div>
<div class="flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl font-bold text-on-surface tracking-tight">24</span>
<span class="font-label-md text-label-md text-on-surface-variant">عقار مدرج</span>
</div>
<div class="mt-space-xs flex items-center justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant truncate">فلل، عمائر، شاليهات، مزارع</span>
<span class="text-primary font-semibold shrink-0">+2 هذا الشهر</span>
</div>
</div>
</div>
<!-- Card 2: Leased Units -->
<div class="flex flex-col justify-between p-space-md bg-surface-container-lowest rounded-xl shadow-sm hover:shadow-md transition-shadow">
<div class="flex items-center justify-between mb-space-sm">
<span class="font-label-md text-label-md text-on-surface-variant font-medium">الوحدات المؤجرة</span>
<div class="w-9 h-9 rounded-lg bg-surface-container-high flex items-center justify-center text-primary-container">
<span class="material-symbols-outlined text-[22px]" style="font-variation-settings: 'FILL' 1;">key</span>
</div>
</div>
<div>
<div class="flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl font-bold text-on-surface tracking-tight">68</span>
<span class="font-label-md text-label-md text-on-surface-variant">من أصل 80 وحدة</span>
</div>
<div class="mt-space-xs flex items-center justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant">نسبة الإشغال: <strong class="text-on-surface">85%</strong></span>
<span class="text-primary font-semibold shrink-0">↑ 5% شهرياً</span>
</div>
</div>
</div>
<!-- Card 3: Vacant Units -->
<div class="flex flex-col justify-between p-space-md bg-surface-container-lowest rounded-xl shadow-sm hover:shadow-md transition-shadow">
<div class="flex items-center justify-between mb-space-sm">
<span class="font-label-md text-label-md text-on-surface-variant font-medium">الوحدات الشاغرة</span>
<div class="w-9 h-9 rounded-lg bg-surface-container-high flex items-center justify-center text-tertiary">
<span class="material-symbols-outlined text-[22px]">meeting_room</span>
</div>
</div>
<div>
<div class="flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl font-bold text-on-surface tracking-tight">12</span>
<span class="font-label-md text-label-md text-on-surface-variant">وحدة خالية</span>
</div>
<div class="mt-space-xs flex items-center justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant">جاهزة للتأجير الفوري</span>
<span class="px-1.5 py-0.5 rounded bg-tertiary-fixed text-on-tertiary-fixed font-semibold">15% الشغور</span>
</div>
</div>
</div>
<!-- Card 4: Pending Bookings -->
<div class="flex flex-col justify-between p-space-md bg-surface-container-lowest rounded-xl shadow-sm hover:shadow-md transition-shadow">
<div class="flex items-center justify-between mb-space-sm">
<span class="font-label-md text-label-md text-on-surface-variant font-medium">حجوزات بانتظار الموافقة</span>
<div class="w-9 h-9 rounded-lg bg-primary-fixed flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[22px]">pending_actions</span>
</div>
</div>
<div>
<div class="flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl font-bold text-primary tracking-tight">7</span>
<span class="font-label-md text-label-md text-on-surface-variant">طلبات معلقة</span>
</div>
<div class="mt-space-xs flex items-center justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant">تتطلب اعتماد يدوي</span>
<span class="px-1.5 py-0.5 rounded bg-primary-fixed-dim text-on-primary-fixed-variant font-bold">عاجل</span>
</div>
</div>
</div>
<!-- Card 5: Overdue Payments -->
<div class="flex flex-col justify-between p-space-md bg-surface-container-lowest rounded-xl shadow-sm hover:shadow-md transition-shadow">
<div class="flex items-center justify-between mb-space-sm">
<span class="font-label-md text-label-md text-on-surface-variant font-medium">المدفوعات المتأخرة</span>
<div class="w-9 h-9 rounded-lg bg-error-container flex items-center justify-center text-error">
<span class="material-symbols-outlined text-[22px]">error_outline</span>
</div>
</div>
<div>
<div class="flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl font-bold text-error tracking-tight">5</span>
<span class="font-label-md text-label-md text-on-surface-variant">عقود متعثرة</span>
</div>
<div class="mt-space-xs flex items-center justify-between font-label-sm text-label-sm">
<span class="text-error font-semibold">34,500 ر.س</span>
<span class="text-on-surface-variant">إجمالي المتأخرات</span>
</div>
</div>
</div>
<!-- Card 6: Open Maintenance -->
<div class="flex flex-col justify-between p-space-md bg-surface-container-lowest rounded-xl shadow-sm hover:shadow-md transition-shadow">
<div class="flex items-center justify-between mb-space-sm">
<span class="font-label-md text-label-md text-on-surface-variant font-medium">بلاغات الصيانة</span>
<div class="w-9 h-9 rounded-lg bg-surface-container-high flex items-center justify-center text-secondary">
<span class="material-symbols-outlined text-[22px]">build</span>
</div>
</div>
<div>
<div class="flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl font-bold text-on-surface tracking-tight">9</span>
<span class="font-label-md text-label-md text-on-surface-variant">طلبات جارية</span>
</div>
<div class="mt-space-xs flex items-center justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant">3 طارئة قيد التنفيذ</span>
<span class="px-1.5 py-0.5 rounded bg-surface-container-high text-on-surface-variant font-semibold">ميداني</span>
</div>
</div>
</div>
</section>
<!-- REVENUE & OCCUPANCY ANALYTICS (2-Column Grid) -->
<section class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg">
<!-- Column 1: Collections & Revenue (8 Cols) -->
<div class="lg:col-span-8 p-space-lg bg-surface-container-lowest rounded-xl shadow-sm flex flex-col justify-between">
<div>
<div class="flex flex-wrap items-center justify-between gap-space-sm mb-space-md">
<div class="flex flex-col">
<h3 class="font-headline-md text-headline-md font-bold text-on-surface">الإيرادات والتحصيل الفعلي</h3>
<span class="font-label-md text-label-md text-on-surface-variant">مقارنة الاستحقاقات الشهرية بالمقبوضات الفعلية المسجلة</span>
</div>
<div class="flex items-center gap-space-xs">
<div class="inline-flex rounded-lg bg-surface-container-low p-1">
<button class="px-3 py-1 rounded bg-surface-container-lowest text-on-surface font-label-md text-label-md font-semibold shadow-sm" type="button" data-demo="شهري">شهري</button>
<button class="px-3 py-1 rounded text-on-surface-variant font-label-md text-label-md hover:text-on-surface" type="button" data-demo="ربع سنوي">ربع سنوي</button>
</div>
<button class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-surface-container text-on-surface font-label-md text-label-md" type="button" data-demo="السنة المالية 2024">
<span>السنة المالية 2024</span>
<span class="material-symbols-outlined text-[16px]">expand_more</span>
</button>
</div>
</div>
<!-- Metric summary ribbon -->
<div class="grid grid-cols-1 sm:grid-cols-3 gap-space-md p-space-md bg-surface-container-low rounded-xl mb-space-lg">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant">الإيجارات المتوقعة (المستحقة)</span>
<span class="font-headline-md text-headline-md font-bold text-on-surface mt-1">420,000 <span class="text-body-sm font-normal">ر.س</span></span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant">المبالغ المحصلة فعلياً</span>
<span class="font-headline-md text-headline-md font-bold text-primary mt-1">365,500 <span class="text-body-sm font-normal">ر.س</span></span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant">معدل كفاءة التحصيل</span>
<div class="flex items-center gap-2 mt-1">
<span class="font-headline-md text-headline-md font-bold text-on-surface">87.0%</span>
<span class="font-label-sm text-label-sm px-1.5 py-0.5 rounded bg-surface-container-highest text-primary font-semibold">+3.2% مقارنة بالماضي</span>
</div>
</div>
</div>
<!-- Visual Bar Chart (Custom SVG & Semantic Accessible Grid) -->
<div class="relative w-full pt-space-sm pb-space-xs">
<!-- Legend -->
<div class="flex items-center justify-end gap-space-md mb-space-md font-label-sm text-label-sm">
<div class="flex items-center gap-2">
<span class="w-3 h-3 rounded bg-secondary"></span>
<span class="text-on-surface">المحصل الفعلي (ر.س)</span>
</div>
<div class="flex items-center gap-2">
<span class="w-3 h-3 rounded bg-outline-variant"></span>
<span class="text-on-surface-variant">المتوقع التعاقدي (ر.س)</span>
</div>
</div>
<!-- SVG Chart Area -->
<svg class="w-full h-56 overflow-visible" fill="none" preserveAspectRatio="none" viewBox="0 0 680 180">
<!-- Grid lines -->
<line stroke="#e1e8ef" stroke-dasharray="3 3" x1="0" x2="680" y1="20" y2="20"></line>
<text fill="#788797" font-size="10" text-anchor="start" x="675" y="23">80k</text>
<line stroke="#e1e8ef" stroke-dasharray="3 3" x1="0" x2="680" y1="70" y2="70"></line>
<text fill="#788797" font-size="10" text-anchor="start" x="675" y="73">50k</text>
<line stroke="#e1e8ef" stroke-dasharray="3 3" x1="0" x2="680" y1="120" y2="120"></line>
<text fill="#788797" font-size="10" text-anchor="start" x="675" y="123">20k</text>
<line stroke="#d9dfe6" x1="0" x2="680" y1="160" y2="160"></line>
<!-- May -->
<g transform="translate(40, 0)">
<rect fill="#d8e0e8" height="115" rx="3" width="22" x="0" y="45"></rect>
<rect fill="#2E7D32" height="102" rx="3" width="22" x="26" y="58"></rect>
</g>
<!-- June -->
<g transform="translate(145, 0)">
<rect fill="#d8e0e8" height="122" rx="3" width="22" x="0" y="38"></rect>
<rect fill="#2E7D32" height="110" rx="3" width="22" x="26" y="50"></rect>
</g>
<!-- July -->
<g transform="translate(250, 0)">
<rect fill="#d8e0e8" height="130" rx="3" width="22" x="0" y="30"></rect>
<rect fill="#2E7D32" height="125" rx="3" width="22" x="26" y="35"></rect>
</g>
<!-- August -->
<g transform="translate(355, 0)">
<rect fill="#d8e0e8" height="110" rx="3" width="22" x="0" y="50"></rect>
<rect fill="#2E7D32" height="95" rx="3" width="22" x="26" y="65"></rect>
</g>
<!-- September -->
<g transform="translate(460, 0)">
<rect fill="#d8e0e8" height="135" rx="3" width="22" x="0" y="25"></rect>
<rect fill="#2E7D32" height="130" rx="3" width="22" x="26" y="30"></rect>
</g>
<!-- October (Current) -->
<g transform="translate(565, 0)">
<rect fill="#d8e0e8" height="140" rx="3" width="22" x="0" y="20"></rect>
<rect fill="#1F4E78" height="120" rx="3" width="22" x="26" y="40"></rect>
</g>
</svg>
<!-- X-Axis Labels -->
<div class="flex justify-between items-center text-center px-6 mt-3 font-label-md text-label-md text-on-surface-variant">
<span class="w-20">مايو</span>
<span class="w-20">يونيو</span>
<span class="w-20">يوليو</span>
<span class="w-20">أغسطس</span>
<span class="w-20">سبتمبر</span>
<span class="w-20 font-bold text-primary">أكتوبر الحالي</span>
</div>
</div>
</div>
<div class="mt-space-md pt-space-sm flex items-center justify-between text-on-surface-variant font-label-sm text-label-sm bg-surface-container-low px-space-md py-2.5 rounded-lg">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-primary">info</span>
<span>يتم ترحيل المطابقات المالية بعد إرفاق الإيصالات البنكية ومطابقتها يدوياً بواسطة مسؤول الحسابات.</span>
</div>
<a class="text-primary font-semibold hover:underline" href="{{ route('manager.reports') }}">تقرير التدفق النقدي</a>
</div>
</div>
<!-- Column 2: Occupancy Distribution (4 Cols) -->
<div class="lg:col-span-4 p-space-lg bg-surface-container-lowest rounded-xl shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-space-md">
<div class="flex flex-col">
<h3 class="font-headline-md text-headline-md font-bold text-on-surface">إشغال الوحدات</h3>
<span class="font-label-md text-label-md text-on-surface-variant">توزيع حالة الـ 80 وحدة المسجلة</span>
</div>
<button class="p-1 rounded text-on-surface-variant hover:bg-surface-container-high" type="button" data-demo="filter_list" aria-label="filter list">
<span class="material-symbols-outlined text-[20px]">filter_list</span>
</button>
</div>
<!-- Donut Visual -->
<div class="relative flex items-center justify-center my-space-md">
<svg class="w-44 h-44 -rotate-90 transform" viewBox="0 0 100 100">
<!-- Background circle -->
<circle cx="50" cy="50" fill="transparent" r="38" stroke="#eaf0f5" stroke-width="12"></circle>
<!-- Occupied 85% (stroke-dasharray="202.8 238.7") -->
<circle cx="50" cy="50" fill="transparent" r="38" stroke="#1F4E78" stroke-dasharray="202.8 238.7" stroke-dashoffset="0" stroke-linecap="round" stroke-width="12"></circle>
<!-- Vacant 15% (35.8) -->
<circle cx="50" cy="50" fill="transparent" r="38" stroke="#d8e0e8" stroke-dasharray="35.8 238.7" stroke-dashoffset="-202.8" stroke-width="12"></circle>
</svg>
<div class="absolute inset-0 flex flex-col items-center justify-center text-center pointer-events-none">
<span class="font-headline-xl text-headline-xl font-bold text-on-surface">85%</span>
<span class="font-label-sm text-label-sm text-on-surface-variant font-medium">معدل الإشغال</span>
</div>
</div>
<!-- Breakdown Legend List -->
<div class="flex flex-col gap-space-xs mt-space-sm">
<div class="flex items-center justify-between p-2.5 rounded-lg bg-surface-container-low">
<div class="flex items-center gap-2">
<span class="w-3 h-3 rounded-full bg-primary"></span>
<span class="font-label-md text-label-md font-medium text-on-surface">وحدات مؤجرة ونشطة</span>
</div>
<div class="flex items-center gap-2">
<span class="font-label-md text-label-md font-bold text-on-surface">68</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">(85%)</span>
</div>
</div>
<div class="flex items-center justify-between p-2.5 rounded-lg bg-surface-container-low">
<div class="flex items-center gap-2">
<span class="w-3 h-3 rounded-full bg-outline-variant"></span>
<span class="font-label-md text-label-md font-medium text-on-surface">وحدات شاغرة معروضة</span>
</div>
<div class="flex items-center gap-2">
<span class="font-label-md text-label-md font-bold text-on-surface">12</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">(15%)</span>
</div>
</div>
<div class="flex items-center justify-between p-2.5 rounded-lg bg-surface-container-low">
<div class="flex items-center gap-2">
<span class="w-3 h-3 rounded-full bg-tertiary"></span>
<span class="font-label-md text-label-md font-medium text-on-surface">حجوزات قيد المعالجة</span>
</div>
<div class="flex items-center gap-2">
<span class="font-label-md text-label-md font-bold text-on-surface">4</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">(5%)</span>
</div>
</div>
</div>
</div>
<div class="mt-space-md pt-space-xs flex items-center justify-between font-label-sm text-label-sm text-on-surface-variant">
<span>متوسط مدة الإيجار: <strong class="text-on-surface">11.4 شهر</strong></span>
<span>مؤشر التجديد: <strong class="text-primary font-bold">92%</strong></span>
</div>
</div>
</section>
<!-- PENDING BOOKINGS QUEUE SECTION (High Priority Table) -->
<section class="flex flex-col bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden">
<!-- Header banner -->
<div class="p-space-lg bg-surface-container-lowest flex flex-col md:flex-row md:items-center justify-between gap-space-md">
<div class="flex flex-col gap-1">
<div class="flex items-center gap-space-xs">
<h3 class="font-headline-md text-headline-md font-bold text-on-surface">طلبات الحجوزات بانتظار الموافقة والاعتماد</h3>
<span class="px-2.5 py-0.5 rounded-full bg-primary/10 text-primary font-label-sm text-label-sm font-bold">7 طلبات جديدة</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant">تتطلب العقود والحجوزات مراجعة مدير الأصول للتحقق من السجل الائتماني والدفعة المقدمة</p>
</div>
<div class="flex items-center gap-space-xs">
<div class="relative">
<span class="material-symbols-outlined absolute right-3 top-2.5 text-on-surface-variant text-[18px]">filter_alt</span>
<select class="h-10 pr-9 pl-4 bg-surface-container-low rounded-lg text-on-surface font-label-md text-label-md outline-none">
<option>كافة أنواع الحجوزات</option>
<option>عقود سنوية</option>
<option>إيجار يومي / شاليهات</option>
</select>
</div>
</div>
</div>
<!-- Alert Sub-ribbon -->
<div class="mx-space-lg mb-space-md p-space-sm bg-primary-fixed/40 rounded-lg flex items-center justify-between text-on-primary-fixed">
<div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined text-[20px] text-primary">gavel</span>
<span class="font-label-md text-label-md"><strong>تنبيه النظام:</strong> يتم حجز التواريخ للعميل مؤقتاً لمدة 48 ساعة فقط حتى إتمام الإيداع والقبول الإداري.</span>
</div>
<span class="font-label-sm text-label-sm font-semibold text-primary">المرحلة التشغيلية اليدوية</span>
</div>
<!-- Table Responsive Wrapper -->
<div class="overflow-x-auto w-full">
<table class="w-full text-right">
<thead>
<tr class="bg-surface-container-low text-on-surface-variant font-label-md text-label-md">
<th class="py-3 px-space-lg font-semibold">العقار ونوع الوحدة</th>
<th class="py-3 px-space-md font-semibold">بيانات المستأجر والاتصال</th>
<th class="py-3 px-space-md font-semibold">فترة الحجز</th>
<th class="py-3 px-space-md font-semibold">المدة</th>
<th class="py-3 px-space-md font-semibold">القيمة المقدرة</th>
<th class="py-3 px-space-md font-semibold">حالة التدقيق</th>
<th class="py-3 px-space-lg font-semibold text-left">الإجراءات</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container font-body-md text-body-md">
<!-- Row 1 -->
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-4 px-space-lg">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined text-[20px]">villa</span>
</div>
<div class="flex flex-col">
<span class="font-label-lg text-label-lg font-bold text-on-surface">شاليه النخيل الفاخر</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">شاليه عطلات - الرياض (العمارية)</span>
</div>
</div>
</td>
<td class="py-4 px-space-md">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">م. عبد الرحمن العتيبي</span>
<span class="font-label-sm text-label-sm text-on-surface-variant dir-ltr text-right">050 491 2812</span>
</div>
</td>
<td class="py-4 px-space-md">
<span class="font-label-md text-label-md text-on-surface">28 أكتوبر - 01 نوفمبر 2024</span>
</td>
<td class="py-4 px-space-md">
<span class="px-2 py-0.5 rounded bg-surface-container font-label-sm text-label-sm font-medium">4 ليالٍ</span>
</td>
<td class="py-4 px-space-md font-semibold text-primary">
              6,400 <span class="text-body-sm font-normal text-on-surface-variant">ر.س</span>
</td>
<td class="py-4 px-space-md">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span>
                بانتظار مراجعة المدير
              </span>
</td>
<td class="py-4 px-space-lg text-left">
<div class="flex items-center justify-end gap-space-xs">
<a class="px-3 py-1.5 rounded-lg bg-primary text-on-primary font-label-md text-label-md font-semibold hover:bg-primary-container transition-colors shadow-sm" href="{{ route('manager.bookings') }}">
                  مراجعة وقبول
                </a>
<a class="px-3 py-1.5 rounded-lg bg-surface-container text-on-surface font-label-md text-label-md font-medium hover:bg-surface-container-high transition-colors" href="{{ route('manager.bookings') }}">
                  التفاصيل
                </a>
</div>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-4 px-space-lg">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined text-[20px]">nature_people</span>
</div>
<div class="flex flex-col">
<span class="font-label-lg text-label-lg font-bold text-on-surface">مزرعة الريف الهادئ</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">مزرعة استجمام - الخرج</span>
</div>
</div>
</td>
<td class="py-4 px-space-md">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">فهد بن ناصر السديري</span>
<span class="font-label-sm text-label-sm text-on-surface-variant dir-ltr text-right">055 330 0340</span>
</div>
</td>
<td class="py-4 px-space-md">
<span class="font-label-md text-label-md text-on-surface">05 نوفمبر - 08 نوفمبر 2024</span>
</td>
<td class="py-4 px-space-md">
<span class="px-2 py-0.5 rounded bg-surface-container font-label-sm text-label-sm font-medium">3 ليالٍ</span>
</td>
<td class="py-4 px-space-md font-semibold text-primary">
              9,800 <span class="text-body-sm font-normal text-on-surface-variant">ر.س</span>
</td>
<td class="py-4 px-space-md">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-outline"></span>
                بانتظار التحقق من الهوية
              </span>
</td>
<td class="py-4 px-space-lg text-left">
<div class="flex items-center justify-end gap-space-xs">
<a class="px-3 py-1.5 rounded-lg bg-primary text-on-primary font-label-md text-label-md font-semibold hover:bg-primary-container transition-colors shadow-sm" href="{{ route('manager.bookings') }}">
                  مراجعة وقبول
                </a>
<a class="px-3 py-1.5 rounded-lg bg-surface-container text-on-surface font-label-md text-label-md font-medium hover:bg-surface-container-high transition-colors" href="{{ route('manager.bookings') }}">
                  التفاصيل
                </a>
</div>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-4 px-space-lg">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined text-[20px]">home_work</span>
</div>
<div class="flex flex-col">
<span class="font-label-lg text-label-lg font-bold text-on-surface">فيلا الياسمين 14</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">فيلا سكنية فاخرة - الرياض (حطين)</span>
</div>
</div>
</td>
<td class="py-4 px-space-md">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">د. خالد إبراهيم الدوسري</span>
<span class="font-label-sm text-label-sm text-on-surface-variant dir-ltr text-right">054 991 1088</span>
</div>
</td>
<td class="py-4 px-space-md">
<span class="font-label-md text-label-md text-on-surface">01 ديسمبر 2024 - 30 نوفمبر 2025</span>
</td>
<td class="py-4 px-space-md">
<span class="px-2 py-0.5 rounded bg-surface-container font-label-sm text-label-sm font-medium">سنة كاملة</span>
</td>
<td class="py-4 px-space-md font-semibold text-primary">
              145,000 <span class="text-body-sm font-normal text-on-surface-variant">ر.س</span>
</td>
<td class="py-4 px-space-md">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                طلب تعاقد سنوي جديد
              </span>
</td>
<td class="py-4 px-space-lg text-left">
<div class="flex items-center justify-end gap-space-xs">
<a class="px-3 py-1.5 rounded-lg bg-primary text-on-primary font-label-md text-label-md font-semibold hover:bg-primary-container transition-colors shadow-sm" href="{{ route('manager.bookings') }}">
                  مراجعة وقبول
                </a>
<a class="px-3 py-1.5 rounded-lg bg-surface-container text-on-surface font-label-md text-label-md font-medium hover:bg-surface-container-high transition-colors" href="{{ route('manager.bookings') }}">
                  التفاصيل
                </a>
</div>
</td>
</tr>
<!-- Row 4 -->
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-4 px-space-lg">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined text-[20px]">apartment</span>
</div>
<div class="flex flex-col">
<span class="font-label-lg text-label-lg font-bold text-on-surface">شقة برج العليا B-204</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">شقة مؤثثة بالكامل - العليا</span>
</div>
</div>
</td>
<td class="py-4 px-space-md">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-semibold text-on-surface">سارة أحمد المنصور</span>
<span class="font-label-sm text-label-sm text-on-surface-variant dir-ltr text-right">056 127 7731</span>
</div>
</td>
<td class="py-4 px-space-md">
<span class="font-label-md text-label-md text-on-surface">15 نوفمبر 2024 - 15 مايو 2025</span>
</td>
<td class="py-4 px-space-md">
<span class="px-2 py-0.5 rounded bg-surface-container font-label-sm text-label-sm font-medium">6 أشهر</span>
</td>
<td class="py-4 px-space-md font-semibold text-primary">
              38,000 <span class="text-body-sm font-normal text-on-surface-variant">ر.س</span>
</td>
<td class="py-4 px-space-md">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span>
                بانتظار موافقة المالك
              </span>
</td>
<td class="py-4 px-space-lg text-left">
<div class="flex items-center justify-end gap-space-xs">
<a class="px-3 py-1.5 rounded-lg bg-primary text-on-primary font-label-md text-label-md font-semibold hover:bg-primary-container transition-colors shadow-sm" href="{{ route('manager.bookings') }}">
                  مراجعة وقبول
                </a>
<a class="px-3 py-1.5 rounded-lg bg-surface-container text-on-surface font-label-md text-label-md font-medium hover:bg-surface-container-high transition-colors" href="{{ route('manager.bookings') }}">
                  التفاصيل
                </a>
</div>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Table Pagination / Footer -->
<div class="p-space-md bg-surface-container-lowest flex items-center justify-between text-on-surface-variant font-label-md text-label-md">
<span>عرض 4 من إجمالي 7 طلبات معلقة</span>
<div class="flex items-center gap-space-xs">
<button class="p-1 rounded hover:bg-surface-container text-on-surface" type="button" data-demo="chevron_right" aria-label="chevron right"><span class="material-symbols-outlined text-[20px]">chevron_right</span></button>
<span class="px-3 py-1 rounded bg-surface-container text-on-surface font-semibold">1</span>
<button class="p-1 rounded hover:bg-surface-container text-on-surface" type="button" data-demo="chevron_left" aria-label="chevron left"><span class="material-symbols-outlined text-[20px]">chevron_left</span></button>
</div>
</div>
</section>
<!-- BOTTOM SECTION: RECENT PAYMENTS & MAINTENANCE PIPELINE (2-Column Grid) -->
<section class="grid grid-cols-1 lg:grid-cols-2 gap-space-lg">
<!-- Bottom Left: Recent Payments Log -->
<div class="p-space-lg bg-surface-container-lowest rounded-xl shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-space-md">
<div class="flex flex-col">
<h3 class="font-headline-md text-headline-md font-bold text-on-surface">سجل التحصيلات والمدفوعات الأخيرة</h3>
<span class="font-label-md text-label-md text-on-surface-variant">المدفوعات المسجلة يدوياً عبر إيصالات التحويل البنكي</span>
</div>
<a class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container text-on-surface font-label-md text-label-md font-medium hover:bg-surface-container-high transition-colors" href="{{ route('manager.payments') }}">
<span class="material-symbols-outlined text-[18px]">add</span>
<span>تسجيل دفعة جديدة</span>
</a>
</div>
<!-- Payments List -->
<div class="flex flex-col gap-space-sm">
<!-- Item 1 -->
<div class="flex items-center justify-between p-space-sm rounded-lg bg-surface-container-low hover:bg-surface-container transition-colors">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-lg bg-surface-container-lowest flex items-center justify-center text-primary shrink-0 shadow-sm">
<span class="material-symbols-outlined text-[22px]">account_balance</span>
</div>
<div class="flex flex-col">
<span class="font-label-lg text-label-lg font-bold text-on-surface">فيصل بن ماجد القحطاني</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">شقة حي النرجس 12 • استحقاق: 20 أكتوبر 2024</span>
</div>
</div>
<div class="flex flex-col items-end gap-1">
<span class="font-label-lg text-label-lg font-bold text-on-surface">14,000 ر.س</span>
<span class="inline-flex items-center px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface font-label-sm text-label-sm font-semibold">
                مدفوع (تحويل)
              </span>
</div>
</div>
<!-- Item 2 -->
<div class="flex items-center justify-between p-space-sm rounded-lg bg-surface-container-low hover:bg-surface-container transition-colors">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-lg bg-surface-container-lowest flex items-center justify-center text-error shrink-0 shadow-sm">
<span class="material-symbols-outlined text-[22px]">assignment_late</span>
</div>
<div class="flex flex-col">
<span class="font-label-lg text-label-lg font-bold text-on-surface">شركة الرواد للمقاولات</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">مكتب تجاري 402 • استحقاق: 15 أكتوبر 2024</span>
</div>
</div>
<div class="flex flex-col items-end gap-1">
<span class="font-label-lg text-label-lg font-bold text-error">32,500 ر.س</span>
<span class="inline-flex items-center px-2 py-0.5 rounded-full bg-error-container text-on-error-container font-label-sm text-label-sm font-bold">
                متأخر 9 أيام
              </span>
</div>
</div>
<!-- Item 3 -->
<div class="flex items-center justify-between p-space-sm rounded-lg bg-surface-container-low hover:bg-surface-container transition-colors">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-lg bg-surface-container-lowest flex items-center justify-center text-tertiary shrink-0 shadow-sm">
<span class="material-symbols-outlined text-[22px]">hourglass_top</span>
</div>
<div class="flex flex-col">
<span class="font-label-lg text-label-lg font-bold text-on-surface">منيرة عبد الله الصالح</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">شقة الحمراء 05 • استحقاق: 24 أكتوبر 2024</span>
</div>
</div>
<div class="flex flex-col items-end gap-1">
<span class="font-label-lg text-label-lg font-bold text-on-surface">9,000 ر.س</span>
<span class="inline-flex items-center px-2 py-0.5 rounded-full bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm font-semibold">
                بانتظار الدفع
              </span>
</div>
</div>
<!-- Item 4 -->
<div class="flex items-center justify-between p-space-sm rounded-lg bg-surface-container-low hover:bg-surface-container transition-colors">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-lg bg-surface-container-lowest flex items-center justify-center text-secondary shrink-0 shadow-sm">
<span class="material-symbols-outlined text-[22px]">toll</span>
</div>
<div class="flex flex-col">
<span class="font-label-lg text-label-lg font-bold text-on-surface">طارق سليمان الحربي</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">استراحة الواحة • استحقاق: 22 أكتوبر 2024</span>
</div>
</div>
<div class="flex flex-col items-end gap-1">
<span class="font-label-lg text-label-lg font-bold text-on-surface">5,500 <span class="font-label-sm text-on-surface-variant">/ 11,000 ر.س</span></span>
<span class="inline-flex items-center px-2 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-semibold">
                مدفوع جزئياً
              </span>
</div>
</div>
</div>
</div>
<div class="mt-space-md pt-space-xs flex items-center justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant">إجمالي المقبوضات هذا الأسبوع: <strong class="text-on-surface">57,500 ر.س</strong></span>
<a class="text-primary font-bold hover:underline" href="{{ route('manager.payments') }}">عرض كافة السجلات المالية</a>
</div>
</div>
<!-- Bottom Right: Open Maintenance Pipeline -->
<div class="p-space-lg bg-surface-container-lowest rounded-xl shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-space-md">
<div class="flex flex-col">
<h3 class="font-headline-md text-headline-md font-bold text-on-surface">بلاغات الصيانة والمتابعة الميدانية</h3>
<span class="font-label-md text-label-md text-on-surface-variant">متابعة جاهزية الفنيين وقطع الغيار والتنفيذ</span>
</div>
<span class="px-2.5 py-1 rounded-full bg-surface-container-high text-on-surface font-label-sm text-label-sm font-bold">9 بلاغات جارية</span>
</div>
<!-- Maintenance Cards List -->
<div class="flex flex-col gap-space-sm">
<!-- Maintenance 1 -->
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col gap-space-xs">
<div class="flex items-center justify-between">
<div class="flex items-center gap-space-xs">
<span class="w-2.5 h-2.5 rounded-full bg-error"></span>
<span class="font-label-lg text-label-lg font-bold text-on-surface">عطل تكييف مركزي رئيسي</span>
</div>
<span class="px-2 py-0.5 rounded bg-error-container text-on-error-container font-label-sm text-label-sm font-bold">أولوية طارئة عاجلة</span>
</div>
<div class="flex items-center justify-between text-on-surface-variant font-label-sm text-label-sm">
<span>الموقع: فيلا حطين 08</span>
<span>تاريخ البلاغ: اليوم، 09:30 ص</span>
</div>
<div class="flex items-center justify-between pt-1">
<span class="font-label-sm text-label-sm text-primary font-semibold">الحالة: جاري تعميد الفني المختص</span>
<a class="px-3 py-1 rounded bg-surface-container-highest text-on-surface font-label-sm text-label-sm font-medium hover:bg-surface-container" href="{{ route('manager.maintenance') }}">معاينة ومتابعة</a>
</div>
</div>
<!-- Maintenance 2 -->
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col gap-space-xs">
<div class="flex items-center justify-between">
<div class="flex items-center gap-space-xs">
<span class="w-2.5 h-2.5 rounded-full bg-tertiary"></span>
<span class="font-label-lg text-label-lg font-bold text-on-surface">تسريب مياه بالحمام الرئيسي</span>
</div>
<span class="px-2 py-0.5 rounded bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm font-semibold">أولوية متوسطة</span>
</div>
<div class="flex items-center justify-between text-on-surface-variant font-label-sm text-label-sm">
<span>الموقع: شقة الملقا 3B</span>
<span>تاريخ البلاغ: أمس، 04:15 م</span>
</div>
<div class="flex items-center justify-between pt-1">
<span class="font-label-sm text-label-sm text-on-surface font-semibold">الحالة: قيد التنفيذ من السباك المعتمد</span>
<a class="px-3 py-1 rounded bg-surface-container-highest text-on-surface font-label-sm text-label-sm font-medium hover:bg-surface-container" href="{{ route('manager.maintenance') }}">معاينة ومتابعة</a>
</div>
</div>
<!-- Maintenance 3 -->
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col gap-space-xs">
<div class="flex items-center justify-between">
<div class="flex items-center gap-space-xs">
<span class="w-2.5 h-2.5 rounded-full bg-outline"></span>
<span class="font-label-lg text-label-lg font-bold text-on-surface">فحص اللوحة الكهربائية الدورية</span>
</div>
<span class="px-2 py-0.5 rounded bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm font-semibold">أولوية اعتيادية</span>
</div>
<div class="flex items-center justify-between text-on-surface-variant font-label-sm text-label-sm">
<span>الموقع: عمارة الياسمين (موزع عام)</span>
<span>تاريخ البلاغ: 22 أكتوبر 2024</span>
</div>
<div class="flex items-center justify-between pt-1">
<span class="font-label-sm text-label-sm text-on-surface-variant font-semibold">الحالة: مجدول للزيارة غداً صباحاً</span>
<a class="px-3 py-1 rounded bg-surface-container-highest text-on-surface font-label-sm text-label-sm font-medium hover:bg-surface-container" href="{{ route('manager.maintenance') }}">معاينة ومتابعة</a>
</div>
</div>
</div>
</div>
<div class="mt-space-md pt-space-xs flex items-center justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant">معدل الإنجاز لطلبات هذا الشهر: <strong class="text-on-surface">94%</strong></span>
<a class="text-primary font-bold hover:underline" href="{{ route('manager.maintenance') }}">فتح طلب صيانة جديد</a>
</div>
</div>
</section>
</div>

@endsection
