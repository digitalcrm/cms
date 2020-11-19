@extends('layouts.master')

@section('content')


<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Import</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Import Subscribers
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form method="post" action="{{route('store_subscribers.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="import_file">Upload</label>
                                        <input id="import_file" class="form-control-file @error('import_file') is-invalid @enderror" type="file" name="import_file">
                                        {{-- @error('import_file')
                                            <small class="form-text text-red">{{ $message }}</small>
                                        @enderror --}}
                                        <small>The import file must be a file of type: csv, xls.</small>
                                    </div>

                                    <a name="back" id="" class="btn btn-info" href="{{url()->previous()}}" role="button">Cancel</a>
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @if(session()->has('failures'))
            <div class="col-md-7">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            {{ __('All values are saved but these duplicate values are already exists') }}
                        </tr>
                        <tr>
                            <th>Row</th>
                            <th>Attribute</th>
                            <th>Error</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (session()->get('failures') as $validation)
                        <tr>
                            <td>
                                {{ $validation->row() }}
                            </td>
                            <td>
                                {{ $validation->attribute() }}
                            </td>
                            <td>
                                <ul>
                                    @foreach($validation->errors() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                {{ $validation->values()[$validation->attribute()] }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>

    </div>
</section>
@endsection
