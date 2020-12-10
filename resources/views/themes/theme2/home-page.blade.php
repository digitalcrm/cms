@extends('themes.theme2.layouts.main')

@section('content')

@push('header-middle')
    @include('themes.theme2.partials.homepage-header-middle')
@endpush

<div class="container">
    <x-themes.theme2.homepage-featured-post />
</div>

<div class="container">
    <x-themes.theme2.homepage-latest-post />
</div>
@endsection
