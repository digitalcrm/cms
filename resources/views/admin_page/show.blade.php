@extends('layouts.app')

@section('title',  $page->slug )

@section('content')
<div class="container" id="app">
    <div class="row featured-post-heading">
        <div class="col-md-12 mt-5 mb-3">
            <h2 class="mb-4">{{ $page->title }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 pl-0 pr-5">
            <div class="col-md-12">
                @if($page->image)
                    <img src="{{ $page->imageUrl() }}" class="img-fluid rounded mb-3"
                        alt="{{ $page->slug }}">
                @endif
                <p>
                    {!! $page->body !!}
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
