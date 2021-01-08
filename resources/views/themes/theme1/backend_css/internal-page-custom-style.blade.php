@php
try {
	$color = App\LandingpageStyle::firstOrFail();
} catch (\Throwable $th) {
	$color = false;
}
@endphp
@if(empty($color))
	<style type="text/css">

		.bg-light {
			background-color: {{$color->nav_head_color ?? ''}}!important;
		}

		.bg-dark {
			background-color: {{$color->firstfootercolor ?? ''}}!important;
		}

		.bg-sub-dark {
			background-color: {{$color->secondfootercolor ?? ''}}!important;
		}

	</style>
@endif
