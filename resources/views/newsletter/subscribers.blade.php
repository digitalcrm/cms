@extends('layouts.master')

@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Newsletters</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        {{-- @if(count($lists_of_subscribers)>0) --}}
                        @include('newsletter.includes.filter-tabs')
                        {{-- @endif --}}

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Subscriber Name</th>
                                    <th>Email</th>
                                    <th>Created_at</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @forelse($lists_of_subscribers as $subscriber)
                                    <tr>
                                        <td>{{ $subscriber->name }}</td>
                                        <td>{{ $subscriber->email }}</td>
                                        <td>{{ $subscriber->created_at->toDateString() }}</td>
                                    </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="7">
                                        {{("No Subscribers are Available")}}
                                    </td>
                                </tr>

                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
