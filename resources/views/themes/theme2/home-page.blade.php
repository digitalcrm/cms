@extends('themes.theme2.layouts.main')

@section('content')

@push('header-middle')
    <x-themes.theme2.header-middle />
@endpush

<div class="container">
    <x-themes.theme2.homepage-featured-post />
</div>

<div class="container">
    <x-themes.theme2.homepage-latest-post />
</div>
@endsection
