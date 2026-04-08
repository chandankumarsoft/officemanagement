<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>
    @yield('styles')
</head>
<body>

    @yield('header')

    @yield('navigation')

    @yield('content')

    @yield('footer')

    @yield('scripts')

</body>
</html>
