@extends('layouts.master')

@section('title', 'Comments')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">All Comments</h1>
            </div>
        </div>
    </div>
</div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                
                            </div>
                            <div class="col-4">
                                
                            </div>
                        </div>
                    </div> --}}
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Comments</th>
                                    <th>Author</th>
                                    {{-- <th>Status</th> --}}
                                    <th>Posted On</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($all_comments as $comment)
                                <tr>
                                    <td>{{ $comment->body }}</td>
                                    <td>{{ $comment->user->name }}</td>
                                    {{-- <td>{{ $comment->isActive }}</td> --}}
                                    <td>{{ $comment->created_at->toFormattedDateString() }}</td>
                                </tr>
                                @empty
                                    <td colspan="10" align="center">No Comments Available</td>                                    
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
