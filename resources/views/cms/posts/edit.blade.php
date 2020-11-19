@extends('layouts.master')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">CMS</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <form method="post" action="{{ route('posts.update', $post->slug) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                <div class="card-header row">
                    <div class="col-md-2">
                        Edit Post
                    </div>
                    <div class="col-md-10">
                        <button type="submit" name="postType" value="publish" class="btn btn-sm btn-outline-primary float-right mx-1">
                            Published
                        </button>
                        <button type="submit" name="postType" value="draft" class="btn btn-sm btn-outline-secondary float-right mx-1">
                            Draft
                        </button>
                        <button type="button" name="postType" value="preview" class="btn btn-sm btn-outline-secondary float-right mx-1">
                            Preview
                        </button>
                    </div>
                </div>

                <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input id="title" class="form-control @error('title') is-invalid @enderror" type="text"
                                        name="title" value="{{ old('title',$post->title) }}">
                                    @error('title')
                                    <small class="form-text text-red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="mytextarea">Description</label>
                                    <textarea id="mytextarea" class="form-control" name="body"
                                        rows="5">{{ old('body',trim($post->body)) }}</textarea>
                                </div>

                            </div>
                            <div class="col-md-4">
                                {{-- <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select class="form-control @error('category_id') is-invalid @enderror"
                                        name="category_id" id="category">
                                        <option value="0">Select Category</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}"
                                                {{ optional($post->category)->id == $cat->id ? 'selected' : '' }}>
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <small class="form-text text-red">{{ $message }}</small>
                                    @enderror
                                </div> --}}

                                @livewire('dependentsubcategorydropdown', [
                                'category'=>old('category_id',$post->category_id),
                                'subcategory'=>old('subcategory_id',$post->subcategory_id)
                                ])

                                <div class="form-group">
                                    <label>Tags (comma-separted)</label>
                                    {{-- <select class="select2bs4" name="tags[]" multiple="multiple"
                                        data-placeholder="Select a Tag" style="width: 100%;">
                                        <option value="0">Select tags</option>
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}"
                                                {{ $post->tags->contains($tag->id) ? 'selected' : '' }}>
                                                {{ $tag->name }}
                                            </option>
                                        @endforeach
                                    </select> --}}
                                    <input type="text" name="tags" class="form-control"
                                            value="{{ old('tags',$post->posts_having_tags) ?? '' }}"
                                    />
                                    {{-- <input type="text"
                                        name="tags" class="form-control"
                                        value="{{ $post->tags->keyBy('name')->keys()->implode(',') }}"
                                    />                                     --}}
                                    @error('tags')
                                    <small class="form-text text-red">{{ $message }}</small>
                                    @enderror
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
                        </div>
                </div> <!-- card-body end-->

                {{-- <div class="card-footer custome-footer">
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
                </div> --}}
                <!--card-footer end-->
                </form>

            </div>
            <!--card end -->
        </div>
    </section>
    <!-- /.content -->
@section('scripts')
    @parent
    <script src="{{ asset('js/tinymce.js') }}"></script>

@endsection

@endsection
