<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name') . ' | Panel')</title>
    {{-- Bootstrap 5 CSS (CDN) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    {{-- Bootstrap Icons (CDN) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- Custom backend styles (local) --}}
    <link rel="stylesheet" href="{{ asset('css/backend.css') }}">
    @yield('styles')
</head>
<body>

    {{-- Sidebar partial --}}
    @include('layouts.partials.sidebar')

    {{-- Main Content --}}
    <div class="main-content">

        {{-- Topbar partial --}}
        @include('layouts.partials.topbar')

        {{-- Flash alerts partial --}}
        @include('layouts.partials.alerts')

        {{-- Page Content --}}
        <div class="page-content">
            @yield('content')
        </div>

        {{-- Footer --}}
        <footer class="footer">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </footer>

    </div>

    {{-- Delete confirmation modal (available on all backend pages) --}}
    @include('layouts.partials.delete-modal')

    {{-- Bootstrap 5 JS Bundle (CDN) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- Custom backend JS (local) --}}
    <script src="{{ asset('js/backend.js') }}"></script>

    @yield('scripts')

</body>
</html>
