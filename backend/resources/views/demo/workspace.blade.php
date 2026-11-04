<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aqar interactive demonstration — fictional records and simulated authentication">
    <title>{{ $title }} | Aqar</title>
    <link rel="icon" href="{{ asset('assets/aqar/favicon.svg') }}">
    <link rel="stylesheet" href="{{ asset('assets/aqar/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/aqar/manager.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/aqar/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/aqar/presentation.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/aqar/shared-header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/aqar/dashboard-layout.css') }}">
    @if ($screen === 'login')
    <link rel="stylesheet" href="{{ asset('assets/aqar/login.css') }}">
    @endif
    <script type="module" src="{{ asset('assets/aqar/demo-app.js') }}"></script>
</head>
<body class="bg-background text-on-surface" data-screen="{{ $screen }}">
<a class="skip-link" href="#main-content">Skip to content</a>
<aside id="demo-sidebar" class="manager-sidebar" aria-label="Main navigation"></aside>
<div id="demo-shell" class="manager-workspace">
    <header id="demo-header" class="manager-header"></header>
    <main id="main-content" class="manager-content" tabindex="-1">
        <div class="demo-banner" hidden></div>
        <div id="demo-root" aria-live="polite"><div class="loading-panel">Loading demonstration…</div></div>
        <noscript>This interactive demo requires JavaScript. <a href="{{ route('design.dashboard') }}">Open the read-only design preview</a>.</noscript>
    </main>
</div>
<div id="demo-toast" role="status" hidden></div>
<dialog id="demo-modal" aria-labelledby="modal-title"><div id="modal-content"></div></dialog>
@php
    $demoConfig = ['screen' => $screen, 'routes' => $routeMap, 'seed' => $seed, 'translations' => $translations];
@endphp
<script id="demo-config" type="application/json">@json($demoConfig)</script>
</body>
</html>
