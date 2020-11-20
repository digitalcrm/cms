@extends('layouts.app')

@section('title', env('APP_NAME') . ': All Tag' )

@section('content')

<div class="container">
    <livewire:landing-page.list-tag />
</div>

@endsection
