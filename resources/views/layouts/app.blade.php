<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'CMS')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/daterangepicker.css') }}">
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
       <script src="{{ asset('js/app.js') }}"></script>
       <script src="{{ mix('js/popper.js') }}"></script>
    @show
</body>
</html>
