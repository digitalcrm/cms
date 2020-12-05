@extends('layouts.app')

@section('title', 'CMS')

@section('styles')
@parent
@include('themes.theme1.backend_css.backend-custom')
@endsection

@section('header_middle')
@parent
{{-- <div> Crousel Section Start --}}
<x-themes.company.home-crousel />
{{-- <div> Crousel Section Start --}}

@endsection

@section('content')
{{-- <div> service Section Start --}}
<x-themes.company.home-service />
{{-- <div> service Section Start --}}

{{-- <div> Intro Section Start --}}
<x-themes.company.home-higlighter />
{{-- </div> Intro Section End --}}

{{-- <div> who-we-are Section Start --}}
<x-themes.company.home-who-we-are />
{{-- </div> who-we-are Section End --}}

{{-- <div> who-we-are Section Start --}}
<x-themes.company.home-client />
{{-- </div> who-we-are Section End --}}



<div class="container">
    <div class="row featured-post-heading">
        <div class="col-md-12 text-center mt-5">
            <h2 class="mb-4">Latest News</h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum a lorem velit. Etiam nec
                nulla a erat hendrerit varius sit amet et enim. Cras id tincidunt erat. Suspendisse facilisis
                condimentum urna.</p>
        </div>
    </div>

    <x-homepage.blog-component :blogs="$blogs" />

</div>

{{-- <div> team Section Start --}}
<x-themes.company.home-team />
{{-- </div> team Section End --}}

{{-- <div> testimonial Section Start --}}
<x-themes.company.home-testimonial />
{{-- </div> testimonial Section End --}}

{{-- <div> stats Section Start --}}
<x-themes.company.home-stats />
{{-- </div> stats Section End --}}

{{-- <div> contact-us Section Start --}}
<x-themes.company.home-contact />
{{-- </div> contact-us Section End --}}

@endsection
