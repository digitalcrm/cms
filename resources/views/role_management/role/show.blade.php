@extends('layouts.master')

@section('content')


<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Role</h1>
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
                                    Role Name
                                </a>
                                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">
                                    Created_at
                                </a>
                                {{-- <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">
                                    Other details
                                </a> --}}
                            </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                                {{$role->name}}
                            </div>
                            <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                                {{$role->created_at->diffForHumans()}}
                            </div>
                            {{-- <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
                                {{$post->created_at->diffForHumans()}}
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
  <!-- /.content -->

@endsection
