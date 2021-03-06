<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @include('layouts.partials.meta-tags')
    
    @include('themes.theme2.includes.theme2-styles')

</head>

<body>
    <x-themes.theme2.header />

    @yield('content')
    
    @include('includes.common.cookie-modal')
    <x-themes.theme2.footer />

    @include('themes.theme2.includes.theme2-scripts')
</body>

</html>
