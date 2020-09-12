@extends('layouts.master')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Posts</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">Create Post
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input id="title" class="form-control @error('title') is-invalid @enderror" type="text"
                                        name="title">
                                    @error('title')
                                    <small class="form-text text-red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="mytextarea">Description</label>
                                    <textarea id="mytextarea" class="form-control @error('body') is-invalid @enderror"
                                        name="body" rows="5"></textarea>
                                    @error('body')
                                    <small class="form-text text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                {{-- <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select class="form-control @error('category_id') is-invalid @enderror"
                                        name="category_id" id="category">
                                        <option value="0">Select Category</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <small class="form-text text-red">{{ $message }}</small>
                                    @enderror
                                </div> --}}

                                @livewire('dependentsubcategorydropdown')

                                <div class="form-group">
                                    <label>Tags</label>
                                    <select class="select2bs4" name="tags[]" multiple="multiple"
                                        data-placeholder="Select a Tag" style="width: 100%;">
                                        <option value="0">Select tags</option>
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('tags')
                                    <small class="form-text text-red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="featuredimage">FeaturedImage</label>
                                    <input id="featuredimage"
                                        class="form-control-file @error('featuredimage') is-invalid @enderror" type="file"
                                        name="featuredimage" aria-describedby="fileHelp">
                                    <small id="fileHelp" class="form-text text-muted">
                                        Please upload a valid image file. Size of image should not be more than 2MB.
                                    </small>
                                    @error('featuredimage')
                                    <small class="form-text text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div> <!-- row end-->
                </div>
                <!--card body end-->
                <div class="card-footer custome-card-footer">
                    <a name="" id="" class="btn btn-light" href="{{ route('posts.index') }}" role="button">Cancel</a>
                    <div class="btn-group float-right">
                        <div class="input-group" id="">
                            <select class="form-control" id="inputGroupSelect04" name="postType">
                                <option value="publish">Published</option>
                                <option value="draft">Draft</option>
                            </select>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <button type="submit" class="input-group-text btn btn-outline-secondary"
                                    style="color:teal;">
                                    <i class="fa fa-paper-plane blue" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div> <!--card-footer end -->
                </form>
            </div> <!--card end -->
        </div>
    </section>

@section('scripts')
    @parent
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });

    </script>
    <script>
        (function removeClassStyleProperty() {
            const cardFooter = document.querySelector(".card-footer");
            // cardFooter.style.removeProperty('background-color');
            cardFooter.classList.add('custome-card-footer');
        })();

    </script>

@endsection
@endsection
