@extends('layouts.master')

@section('title', 'Page')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Posts</h1>
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
                    <div class="card-header">
                        <a href="{{ route('pages.create') }}"
                            class="btn btn-primary btn-sm mx-1 float-right">Add New</a>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Active/Inactive</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <livewire:page-status />
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
