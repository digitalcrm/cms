<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title',config('app.name', 'CRM-Role-Management'))</title>

    @section('style')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- custome css --}}
    <link href="{{ asset('css/userprofile_custome.css') }}" rel="stylesheet">

    <!--bootstrap toggle lib added-->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <style>
        .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
        .toggle.ios .toggle-handle { border-radius: 20px; }
    </style>
    @show

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
            <script src="https://cdn.tiny.cloud/1/arqcdm5zkxhobz2iqxmr2x97ulkuqohqy3yei2jbbh5z6zdp/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

            {{-- Blade message validation --}}
            @include('includes.pop-up-messages.message')


            <script src="{{ asset('assets/moment.min.js') }}"></script>
            <script src="{{ asset('assets/daterangepicker.min.js') }}"></script>
            <!-- Scripts -->
            <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>
            @livewireScripts

            <!-- for create part modal used in booking services-->
            <script type="text/javascript">
                window.livewire.on('showModal', () => {
                    $('#exampleModal').modal('hide');
                });
            </script>
            <!-- for update part modal used in booking services-->
            <script type="text/javascript">
                window.livewire.on('updateModal', () => {
                    $('#updateModal').modal('hide');
                });
            </script>
        @show

    </body>

</html>
