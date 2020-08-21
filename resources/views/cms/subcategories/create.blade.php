@extends('layouts.master')

@section('content')


<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Sub Category</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <section class="content">
    <div class="container-fluid">

        <div class="card" style="width: 35%;">
            <div class="card-header">Create Sub Category
            </div>

            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="{{route('subcategory.store')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Parent Category</label>
                                <select class="select2bs4" name="category_id" data-placeholder="Select a Category" style="width: 100%;">
                                  <option value="0">Select Category</option>
                                    @foreach ($parentCategory as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <small class="form-text text-red">{{ $message }}</small>
                                @enderror
                              </div>

                            <div class="form-group">
                                <label for="name">Sub Category</label>
                                <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name">
                                @error('name')
                                    <small class="form-text text-red">{{ $message }}</small>
                                @enderror
                            </div>

                            <a name="" id="" class="btn btn-info" href="{{url()->previous()}}" role="button">Cancel</a>
                            <button type="submit" class="btn btn-primary float-right">Create</button>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
