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

        <div class="card">
            <div class="card-header">Edit Role
            </div>

            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <form method="post" action="{{route('role.update',$role->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" class="form-control @error('name') is-invalid @enderror"
                                        type="text"
                                        name="name"
                                        value="{{$role->name}}">
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
