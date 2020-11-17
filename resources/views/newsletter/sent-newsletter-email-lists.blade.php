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
                        {{-- This file is located under newsletter/includes folder in resources/views --}}
                        @include('newsletter.includes.filter-tabs')

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Created_at</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @forelse($sent_email_lists as $subscriber)
                                    <tr>
                                        <td>{{ $subscriber->subject }}</td>
                                        <td>{{ $subscriber->message }}</td>
                                        <td>{{ $subscriber->created_at->toDateString() }}</td>
                                    </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="7">
                                        {{("No Emails are sent")}}
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
