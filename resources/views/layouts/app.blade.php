<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'CMS')</title>

    <!-- Styles -->
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/daterangepicker.css') }}">
    @section('styles')
    
    @show

</head>
<body>

    <x-homeheaderpage />

    @section('header_middle')
    {{-- Crousel part added if we call this section --}}
    @show

    @yield('content')

   <x-homefooterpage />

    @section('scripts')
       <!-- Scripts -->
       <script src="{{ asset('js/home.js') }}"></script>
    @show
</body>
</html>
