@extends('layouts.master')

@section('title','Theme: Customization')

@section('content')

    <x-customization-theme-switcher />

@section('scripts')
    @parent
        <script src="{{ asset('jscolor.min.js') }}"></script>
    @endsection

@endsection
