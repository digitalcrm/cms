@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @role('superadmin')
                        @include('includes.dashboard._superadmin')
                    @elserole('admin')
                        @include('includes.dashboard._admin')
                    @else
                        @include('includes.dashboard._others')
                    @endrole

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
