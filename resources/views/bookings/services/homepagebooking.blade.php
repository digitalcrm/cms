@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5 mb-3">
        @forelse ($services as $service)
        <div class="col-md-2">
            <div class="card shadow card-danger card-outline">
                <!--/.card-header-->
                <div class="card-body">
                    <a href="{{ route('service.events',($service->name)) }}" class="trash-link">
                        <span class=""><i class="fa fa-money-bill fa-2x"></i></span>
                        <div class="text-bold mt-2">
                            {{ $service->service_name }}
                        </div>
                    </a>
                </div>
                <!-- /.card -->
            </div>
        </div>
        @empty
        <h3>NO data available</h3>
        @endforelse
    </div>
</div>
@endsection


