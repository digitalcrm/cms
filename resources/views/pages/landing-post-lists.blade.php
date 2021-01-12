@extends('layouts.app')

@section('title', config('app.name') . ': All Articles' )

@section('content')
<div class="container">
    <livewire:landing-page.list-posts />
</div>

@endsection
