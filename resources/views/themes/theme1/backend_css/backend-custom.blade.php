@php
$color = App\LandingpageStyle::first();
@endphp

<style type="text/css">

	body {
		background-color: {{$color->body_background_color}};
        @if($color->backgroundstatus == 1)
        background-image: url({{'storage/'.$color->background_image}});
        @endif

	}

	a {
		color: {{$color->a_tag_color}}!important;
	}

	a:hover {
		color: {{$color->a_tag_hover_color}}!important;
	}

	h2 {
		color: {{$color->h2_tag_color}}!important;
	}

	.bg-light {
		background-color: {{$color->nav_head_color}}!important;
	}

	.bg-dark {
		background-color: {{$color->firstfootercolor}}!important;
	}

	.bg-sub-dark {
		background-color: {{$color->secondfootercolor}}!important;
	}


	.primary-custom {
		background-color: {{$color->primary_color}}!important;

	}

	.secondary-custom {
		background-color: {{$color->secondary_color}}!important;

	}
    .stats-custom {
        background-color: {{$color->stats_back_color}}!important;
    }
    .team-custom {
        background-color: {{$color->team_back_color}}!important;
    }
    .client-custom {
        background-color: {{$color->client_back_color}}!important;
    }

</style>
