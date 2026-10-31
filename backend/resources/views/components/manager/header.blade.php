<header class="manager-header">
    <button id="sidebar-toggle" class="mobile-menu" aria-label="Toggle navigation" aria-controls="manager-sidebar" aria-expanded="false"><span class="material-symbols-outlined" aria-hidden="true">menu</span></button>
    <label class="global-search"><span class="material-symbols-outlined" aria-hidden="true">search</span><input id="screen-search" type="search" placeholder="Find a screen…" aria-label="Find a screen" autocomplete="off" list="screen-options"><datalist id="screen-options">@foreach($screens as $definition)<option value="{{ $definition['title'] }}">@endforeach</datalist></label>
    <div class="header-tools">
        <a href="{{ route($rtl ? 'manager.dashboard' : 'manager.dashboard-ar') }}" class="language-link"><span class="material-symbols-outlined" aria-hidden="true">language</span> {{ $rtl ? 'English' : 'العربية' }}</a>
        <span class="currency">SAR</span>
        <button class="notification-button" aria-label="Demo notifications" data-demo="Notifications"><span class="material-symbols-outlined" aria-hidden="true">notifications</span><span class="notification-count">3</span></button>
        <div class="manager-user"><span><strong>Eng. Sultan Al-Shammari</strong><small>Property Manager · Demo</small></span><span class="user-avatar material-symbols-outlined" aria-hidden="true">person</span></div>
    </div>
</header>
<script type="application/json" id="screen-navigation">@json(collect($screens)->map(fn ($definition, $key) => ['title' => $definition['title'], 'url' => route('manager.'.$key)])->values())</script>
