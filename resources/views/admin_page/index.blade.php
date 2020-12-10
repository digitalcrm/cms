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

                        {{-- <div class="btn-group dropdown keep-open float-right">
                            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" id="login"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret"><i class="fa fa-filter" aria-hidden="true"></i></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <form action="#" id="popForm" method="get" class="p-2">
                                    <div id="filtertable">
                                    </div>
                                </form>
                            </div>
                        </div> --}}

                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Active/Inactive</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pages as $page)
                                    <tr>
                                        <td>
                                        <img src="{{ $page->imageUrl() }}" alt="{{ $page->slug }}" width="75em" height="75em">
                                        <a href="{{ route('pages.show', $page->slug) }}" target="_blank">
                                            {{ $page->title ?? '' }}
                                        </a>
                                        </td>

                                        <td>
                                            Active/Inactive
                                        </td>

                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-secondary dropdown-toggle"
                                                    data-toggle="dropdown" data-display="static" aria-haspopup="true"
                                                    aria-expanded="false">

                                                </button>
                                                <div class="dropdown-menu dropdown-menu-sm-left dropdown-menu-lg-right">
                                                    <a class="dropdown-item"
                                                        href="{{ route('pages.edit',$page->slug) }}">
                                                        <i class="far fa-edit"></i> Edit
                                                    </a>
                                                    <a class="dropdown-item" href="" type="submit" role="button"
                                                        onclick="event.preventDefault();
                                                    if(confirm('Are you sure!')){
                                                        $('#page-delete-{{ $page->id }}').submit();
                                                    }
                                                    ">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </a>
                                                    <form style="display:none" id="page-delete-{{ $page->id }}"
                                                        action="{{ route('pages.destroy',$page->slug) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="15">
                                            {{ ("No Data Available") }}
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

@endsection
