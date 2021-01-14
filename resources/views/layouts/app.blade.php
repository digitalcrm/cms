<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts.partials.meta-tags')

    @include('layouts.partials.favicons')

    <!-- Styles -->
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cookie-content.css') }}">
    
    @include('themes.theme1.backend_css.internal-page-custom-style')

    @livewireStyles

    @stack('styles')
</head>
<body>

    <x-home-header-page />

    @section('header_middle')
    {{-- Crousel part added if we call this section --}}
    @show

    @yield('content')
    
    @include('includes.common.cookie-modal')
    
   <x-home-footer-page />

   @livewireScripts
   <script src="{{ asset('js/home.js') }}"></script>
   <script src="{{ mix('js/popper.js') }}"></script>
    
   @stack('scripts')

</body>
</html>
