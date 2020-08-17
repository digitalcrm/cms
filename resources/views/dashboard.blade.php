@extends('layouts.master')

@section('content')

        @include('includes.pop-up-messages.message')

        @role('superadmin')
        @include('includes.dashboard._superadmin')
        @elserole('admin')
        @include('includes.dashboard._admin')
        @else
        @include('includes.dashboard._others')
        @endrole
@endsection
