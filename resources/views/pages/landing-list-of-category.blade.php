@extends('layouts.app')

@section('title', env('APP_NAME') . ': All Categories' )

@section('content')

<div class="container">
    <livewire:landing-page.list-category />
</div>

@endsection
