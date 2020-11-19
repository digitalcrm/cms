@extends('layouts.app')

@section('title', env('APP_NAME') . ': All Articles' )

@section('content')
<div class="container">
    <livewire:landing-page.list-posts />
</div>

@endsection
