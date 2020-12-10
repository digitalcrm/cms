@extends('layouts.master')
@section('title', 'Add Page')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Page</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <form method="post" action="{{ route('pages.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input id="title" class="form-control @error('title') is-invalid @enderror" type="text"
                                    name="title" value="{{ old('title') }}">
                                @error('title')
                                    <small class="form-text text-red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="mytextarea">Description</label>
                                <textarea id="mytextarea" class="form-control @error('body') is-invalid @enderror"
                                    name="body" rows="5">{{ old('body') }}</textarea>
                                @error('body')
                                    <small class="form-text text-red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="image">Featured Image</label>
                                <input id="image" class="form-control-file @error('image') is-invalid @enderror"
                                    type="file" name="image" aria-describedby="fileHelp">
                                <small id="fileHelp" class="form-text text-muted">
                                    Please upload a valid image file. Size of image should not be more than 2MB.
                                </small>
                                @error('image')
                                    <small class="form-text text-red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!--card body end-->
                <div class="card-footer">
                    <a name="" id="" class="btn btn-outline-secondary" href="{{ url()->previous() }}"
                        role="button">Cancel</a>
                    <button type="submit" class="btn btn-primary float-right">
                        Create
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>

    @section('scripts')
    @parent
    <script src="{{ asset('js/tinymce.js') }}"></script>

    @endsection
@endsection
