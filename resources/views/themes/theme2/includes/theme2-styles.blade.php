@php
    $theme2_colors = App\LandingpageStyle::where('id',2)->first();
@endphp

<title>@yield('title', 'Blog Theme')</title>
<link href="{{ asset('css/bootstrap4.css') }}" rel="stylesheet">
<link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
<link href="{{ asset('css/theme2-custom.css') }}" rel="stylesheet">
<link href="{{ asset('css/theme2-crousel.css') }}" rel="stylesheet">
<style type="text/css">

	body {
		background-color: {{$theme2_colors->body_background_color}};
        

	}

	.custom-bg-header {
		background-color: {{$theme2_colors->nav_head_color}}!important;
	}

	.custom-bg-footer {
		background-color: {{$theme2_colors->firstfootercolor}}!important;
	}

	.custom-bg-subfooter {
		background-color: {{$theme2_colors->secondfootercolor}}!important;
	}

</style>

@stack('styles')
