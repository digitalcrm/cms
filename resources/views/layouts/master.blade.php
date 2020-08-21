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

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ mix('js/popper.js') }}"></script>

        @include('includes.pop-up-messages.message')
    </body>

</html>
