<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name') . ' | Admin')</title>
    @yield('styles')
</head>
<body>

    @yield('sidebar')

    @yield('topbar')

    @yield('content')

    @yield('footer')

    @yield('scripts')

</body>
</html>
