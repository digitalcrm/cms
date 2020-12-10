<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    
    @include('themes.theme2.includes.theme2-styles')

</head>

<body>
    <x-themes.theme2.header />

    @yield('content')
    
    <x-themes.theme2.footer />

    @include('themes.theme2.includes.theme2-scripts')
</body>

</html>
