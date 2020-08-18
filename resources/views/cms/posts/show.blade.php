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

        <div class="row">

            {{-- tags show --}}
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <nav class="w-100">

                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">
                                    Title
                                </a>
                                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">
                                    Description
                                </a>
                                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">
                                    Other details
                                </a>
                            </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                                {{$post->title}}
                            </div>
                            <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                                {{$post->body}}
                            </div>
                            <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
                                {{$post->created_at->diffForHumans()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Other Section tag category --}}
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <nav class="w-100">

                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link active" id="tags-tab" data-toggle="tab" href="#tags" role="tab" aria-controls="tags" aria-selected="true">
                                    Tags
                                </a>
                                <a class="nav-item nav-link" id="categories-tab" data-toggle="tab" href="#categories" role="tab" aria-controls="categories" aria-selected="false">
                                    Category
                                </a>
                                <a class="nav-item nav-link" id="author-tab" data-toggle="tab" href="#author" role="tab" aria-controls="author" aria-selected="false">
                                    Author
                                </a>
                            </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                            <div class="tab-pane fade show active table-responsive-sm" id="tags" role="tabpanel" aria-labelledby="tags-tab">
                                <table class="table table-borderless">
                                    <thead class="">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($post->tags as $tag)
                                        <tr>
                                            <td>{{$loop->index + 1}}</td>
                                            <td>
                                                {{$tag->name}}
                                            </td>
                                        </tr>
                                        @empty
                                        <div class="tab-pane fade" id="author" role="tabpanel" aria-labelledby="author-tab">
                                            No tags are available!
                                        </div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="categories" role="tabpanel" aria-labelledby="categories-tab">
                                {{$post->category->name}}
                            </div>
                            <div class="tab-pane fade" id="author" role="tabpanel" aria-labelledby="author-tab">
                                {{$post->user->name}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
  <!-- /.content -->

@endsection
