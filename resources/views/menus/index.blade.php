@extends('layouts.master')

@section('title', 'Menus')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Menus</h1>
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
                        <div class="row">
                            <div class="col-8">
                                <a href="{{ route('menus.index') }}"
                                    class="btn btn-sm btn-outline-secondary mr-1 {{ request('type') == '' ? 'active' : '' }}">
                                    Header
                                </a>
                                <a href="{{ route('menus.index',['type'=>'footer']) }}"
                                    class="btn btn-sm btn-outline-secondary mr-1 {{ request('type') == 'footer' ? 'active' : '' }}">
                                    Footer
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="{{ route('menus.create') }}"
                                    class="btn btn-primary btn-sm mx-1 float-right">
                                    Add New
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Page Name</th>
                                    <th>Placed In</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <livewire:menus-list />
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
