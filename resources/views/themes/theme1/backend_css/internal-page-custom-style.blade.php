@php
$color = App\LandingpageStyle::first();
@endphp

<style type="text/css">

	.bg-light {
		background-color: {{$color->nav_head_color}}!important;
	}

	.bg-dark {
		background-color: {{$color->firstfootercolor}}!important;
	}

	.bg-sub-dark {
		background-color: {{$color->secondfootercolor}}!important;
	}

</style>
