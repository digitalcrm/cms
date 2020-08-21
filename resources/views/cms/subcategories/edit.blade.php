@extends('layouts.master')

@section('content')


<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">SubCategory</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">Edit SubCategory
            </div>

            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <form method="post" action="{{route('subcategory.update',$subcategory->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label>Parent Category</label>
                                <select class="select2bs4" name="category_id" data-placeholder="Select a Category" style="width: 100%;">
                                    <option value="0">Select Category</option>
                                    @foreach ($parentCategory as $id => $name)
                                        <option value="{{ $id }}" {{ $id == old('category_id', $subcategory->category_id) ? 'selected' : ''}}>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <small class="form-text text-red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" class="form-control @error('name') is-invalid @enderror"
                                    type="text"
                                    name="name"
                                    value="{{$subcategory->name}}">
                                @error('name')
                                    <small class="form-text text-red">{{ $message }}</small>
                                @enderror
                            </div>

                            <a name="" id="" class="btn btn-light" href="{{url()->previous()}}" role="button">Cancel</a>
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
