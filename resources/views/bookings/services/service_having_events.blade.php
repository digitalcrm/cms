@extends('layouts.app')

@section('styles')
    @parent
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@endsection

@section('content')

<div class="container">
    <div class="row featured-post-heading">
        <div class="col-md-12 mt-5 mb-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a class="float-right"
                                href="{{ route('service.events',['bookservice'=>$bookservice->name]) }}"
                                data-toggle="tooltip" data-placement="left" title="Gallery View">
                                <i class="fas fa-th"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="float-right"
                                href="{{ route('service.events',['bookservice'=>$bookservice->name,'lists'=> 'true']) }}"
                                data-toggle="tooltip" data-placement="left" title="List view">
                                <i class="fas fa-list"></i>
                            </a>
                        </li>
                    </ol>
                </nav>


        </div>
     </div>
    <div class="row">
        @if(request('lists') == 'true')
            @include('bookings.includes.lists')
        @else
            @include('bookings.includes.grid')
        @endif
    </div>
</div>

@section('scripts')
    @parent
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="http://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "ordering": false,
                "info":     false,
                "stateSave": true
            });
        } );
    </script>
@endsection
@endsection


