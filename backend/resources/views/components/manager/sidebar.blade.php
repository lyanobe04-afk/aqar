@php
    $navigation = ['dashboard','properties','units','owners','tenants','bookings','contracts','payments','receivables','maintenance','furniture','documents','reports','settings'];
    $active = match (true) {
        $step !== null, $screen === 'property-details' => 'properties',
        $screen === 'unit-details' => 'units',
        $screen === 'reports-operations' => 'reports',
        $screen === 'dashboard-ar' => 'dashboard',
        default => $screen,
    };
@endphp
<aside class="manager-sidebar" id="manager-sidebar" aria-label="Main navigation">
    <a href="{{ route('manager.dashboard') }}" class="manager-brand">
        <span class="brand-icon material-symbols-outlined" aria-hidden="true">apartment</span>
        <span><strong>Aqar</strong><small>PROPERTY PORTAL</small></span>
        <span class="enterprise-label">Enterprise</span>
    </a>
    <div class="sidebar-caption">Portfolio Workspace</div>
    <nav>
        @foreach($navigation as $key)
            <a href="{{ route('manager.'.$key) }}" class="sidebar-link {{ $active === $key ? 'is-active' : '' }}" @if($active === $key) aria-current="page" @endif>
                <span class="material-symbols-outlined" aria-hidden="true">{{ $screens[$key]['icon'] }}</span>
                <span>{{ $screens[$key]['title'] }}</span>
            </a>
        @endforeach
    </nav>
    <div class="sidebar-bottom">
        <a href="{{ route('manager.reports-operations') }}">Operational reports <span aria-hidden="true">↗</span></a>
        <a href="{{ route('manager.dashboard-ar') }}" lang="ar">لوحة المدير بالعربية <span aria-hidden="true">↗</span></a>
        <div><span class="demo-dot"></span> Frontend demo <small>Phase 1</small></div>
    </div>
</aside>
