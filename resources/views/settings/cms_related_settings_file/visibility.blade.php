@extends('layouts.master')

@section('title', 'CMS Settings - visibility')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Visibility Active/Inactive</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Visibility Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($get_all_visibility_data as $data)
                            <tr>
                                <td>{{ $data->visibility_name }}</td>

                                <td>
                                    <a
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{($data->action === 1) ? 'click for disable' : 'click for active'}}"
                                    class="dropdown-item"
                                    href="#"
                                    type="submit"
                                    onclick="event.preventDefault();
                                    if(confirm('Are you sure!')){
                                        $('#visibility-action{{$data->id}}').submit();
                                    }">
                                    {!!
                                        ($data->action == 1) ?
                                            '<i class="fas fa-toggle-on" style="color: green"></i>' :
                                            '<i class="fas fa-toggle-off" style="color: red"></i>'
                                    !!}
                                </a>
                                <form
                                style="display: none"
                                method="post"
                                id="visibility-action{{$data->id}}"
                                action="{{ route('cms-visibility.update', $data->id) }}"
                                >
                                @csrf
                                @method('put')
                                </form>
                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="2">No data found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->

@endsection
