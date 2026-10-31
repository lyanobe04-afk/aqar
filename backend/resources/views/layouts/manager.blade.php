<!DOCTYPE html>
<html lang="{{ $rtl ? 'ar' : 'en' }}" dir="{{ $rtl ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aqar Property Platform — static frontend presentation">
    <title>{{ $title }} | Aqar Property Portal</title>
    <link rel="icon" href="{{ asset('assets/aqar/favicon.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('assets/aqar/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/aqar/manager.css') }}">
    <script src="{{ asset('assets/aqar/manager.js') }}" defer></script>
</head>
<body class="bg-background text-on-surface antialiased" data-screen="{{ $screen }}">
    <a class="skip-link" href="#main-content">Skip to content</a>
    @include('components.manager.sidebar')
    <div class="manager-workspace">
        @include('components.manager.header')
        <main id="main-content" class="manager-content" tabindex="-1">
            <div class="demo-banner"><span class="material-symbols-outlined" aria-hidden="true">info</span> UI demonstration · Static sample data · Changes are not saved</div>
            @yield('content')
            @if($step)
                <nav class="wizard-footer" aria-label="Property step navigation">
                    <a href="{{ route($step > 1 ? 'manager.add-property-'.($step - 1) : 'manager.properties') }}" class="demo-secondary">{{ $step > 1 ? 'Previous step' : 'Cancel' }}</a>
                    <span>Step {{ $step }} of 6 · Preview only</span>
                    @if($step < 6)
                        <a href="{{ route('manager.add-property-'.($step + 1)) }}" class="demo-primary">Next step →</a>
                    @else
                        <a href="{{ route('manager.properties') }}" class="demo-primary">Return to Properties</a>
                    @endif
                </nav>
            @endif
        </main>
    </div>
    <dialog id="demo-notice" aria-labelledby="demo-notice-title">
        <form method="dialog">
            <span class="material-symbols-outlined notice-icon" aria-hidden="true">info</span>
            <h2 id="demo-notice-title">Frontend demonstration</h2>
            <p id="demo-notice-message"></p>
            <p>This feature requires the future backend phase. No data has been saved, sent, uploaded, or changed.</p>
            <button class="demo-primary" autofocus>Close</button>
        </form>
    </dialog>
</body>
</html>
