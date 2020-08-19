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

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">Edit Post
            </div>

            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <form method="post" action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input id="title" class="form-control @error('title') is-invalid @enderror"
                                        type="text"
                                        name="title"
                                        value="{{$post->title}}">
                                @error('title')
                                    <small class="form-text text-red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category">
                                    <option value="0">Select Category</option>
                                    @foreach ($categories as $cat)
                                    <option value="{{$cat->id}}" {{optional($post->category)->id == $cat->id ? 'selected' : ''}}>
                                        {{$cat->name}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <small class="form-text text-red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Tags</label>
                                <select class="select2bs4" name="tags[]" multiple="multiple" data-placeholder="Select a Tag"
                                        style="width: 100%;">
                                  <option value="0">Select tags</option>
                                    @foreach ($tags as $tag)
                                        <option value="{{$tag->id}}" {{ $post->tags->contains($tag->id) ? 'selected' : ''}}>
                                            {{$tag->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('tags')
                                <small class="form-text text-red">{{ $message }}</small>
                                @enderror
                              </div>

                            {{-- <div class="form-group">
                                <label for="path">PostImage</label>
                                <input id="path" class="form-control-file @error('path') is-invalid @enderror" type="file" name="path" aria-describedby="fileHelp">
                                <small id="fileHelp" class="form-text text-muted">
                                    Please upload a valid image file. Size of image should not be more than 2MB.
                                </small>
                                @error('path')
                                <small class="form-text text-red">{{ $message }}</small>
                                @enderror
                            </div> --}}

                            <div class="form-group">
                                <label for="body">Description</label>
                                <textarea id="body" class="form-control" name="body" rows="5">{{trim($post->body)}}</textarea>
                            </div>

                            <a name="" id="" class="btn btn-light" href="{{route('posts.index')}}" role="button">Cancel</a>
                            <button type="submit" class="btn btn-primary float-right">Update</button>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
  <!-- /.content -->

@endsection
