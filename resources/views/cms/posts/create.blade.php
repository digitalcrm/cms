@extends('layouts.master')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add New</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-header row">
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-10">
                        <button type="submit" name="postType" value="publish"
                            class="btn btn-sm btn-primary float-right mx-1">
                            Published
                        </button>
                        <button type="submit" name="postType" value="draft"
                            class="btn btn-sm btn-outline-secondary float-right mx-1">
                            Draft
                        </button>
                        <button type="button" name="postType" value="preview"
                            class="btn btn-sm btn-outline-secondary float-right mx-1">
                            Preview
                        </button>
                    </div>
                </div>

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
                                <Button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                    data-target="#addmediamodal">Add Media</Button>
                                <textarea id="mytextarea" class="form-control @error('body') is-invalid @enderror"
                                    name="body" rows="5">{{ old('body') }}</textarea>
                                @error('body')
                                    <small class="form-text text-red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">

                            @livewire('dependentsubcategorydropdown')

                                <div class="form-group">
                                    <label>Tags (Comma-separated)</label>
                                    {{-- <select class="select2bs4" name="tags[]" multiple="multiple"
                                        data-placeholder="Select a Tag" style="width: 100%;">
                                        <option value="0">Select tags</option>
@foreach($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                            </select> --}}
                            <input type="text" name="tags" class="form-control"
                                value="{{ old('tags') }}" />
                            @error('tags')
                                <small class="form-text text-red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" name="commentActive" class="form-check-input" id="commentActive"
                                checked>
                            <label class="form-check-label" for="commentActive">Allow comments</label>
                        </div>
                        <div class="form-group">
                            <label for="featuredimage">Featured Image</label>
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
        {{-- <div class="card-footer custome-card-footer">
                    <a name="" id="" class="btn btn-light" href="{{ route('posts.index') }}"
        role="button">Cancel</a>
        <div class="btn-group float-right">
            <div class="input-group" id="">
                <select class="form-control" id="inputGroupSelect04" name="postType">
                    <option value="publish">Published</option>
                    <option value="draft">Draft</option>
                </select>
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <button type="submit" class="input-group-text btn btn-outline-secondary" style="color:teal;">
                        <i class="fa fa-paper-plane blue" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
    </div> --}}
    <!--card-footer end -->
    </form>
    </div>
    <!--card end -->
    </div>
    <livewire:add-media />
</section>

@section('scripts')
@parent
<script src="{{ asset('js/tinymce.js') }}"></script>
<script>
    function copyClipboardUrl() {

        /* Get the text field */
        const copyText = document.getElementById("copyLink").select();

        /* Copy the text inside the text field */
        const copied = document.execCommand("copy");

        successMessage(copied);
    }

    function successMessage(variable) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        if (variable) {
            Toast.fire({
                icon: 'success',
                title: 'URL copied'
            })
        }
    }

</script>

@endsection
@endsection
