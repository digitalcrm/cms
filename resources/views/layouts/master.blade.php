<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{ config('app.name', 'CRM-Role-Management') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--bootstrap toggle lib added-->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <style>
        .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
        .toggle.ios .toggle-handle { border-radius: 20px; }
    </style>

    @livewireStyles
    </head>
    <body class="hold-transition sidebar-mini">

        <div class="wrapper">

            @include('includes.common.nav')

            @include('includes.common.sidebar')

            <div class="content-wrapper">

                @yield('content')
            </div>

            <!-- Control Sidebar -->
                @include('includes.common.control-sidebar')
            <!-- /.control-sidebar -->

            @include('includes.common.footer')

        </div>


        @section('scripts')
            <!-- Scripts -->
            <script src="{{ asset('js/app.js') }}"></script>
            <script src="{{ mix('js/popper.js') }}"></script>
            <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
            {{-- TinyMce Editor --}}
            <script src="https://cdn.tiny.cloud/1/vv9tkawq7if6sdym2688hjvqnn3nfxsd10otch4qb7fasq1y/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

            {{-- Blade message validation --}}
            @include('includes.pop-up-messages.message')
        @show

        @livewireScripts
    </body>

</html>
