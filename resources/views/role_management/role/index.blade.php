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
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        {{-- @can('category-create') --}}
                        <a type="button" class="btn btn-success float-right" href="{{route('role.create')}}">Create New</a>
                        {{-- @endcan --}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>role_has_Permission</th>
                                    <th>Created_at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($allRole as $role)
                                    <tr>
                                        <td>
                                            {{ $role->name ?? '' }}<br>

                                            {{-- @can('category-edit') --}}
                                            <small><a href="{{route('role.edit',$role->id)}}">Edit</a></small>
                                            {{-- @endcan --}}

                                            {{-- @can('category-view') --}}
                                            <small><a href="{{route('role.show',$role->id)}}">View</a></small>
                                            {{-- @endcan --}}

                                            {{-- @can('category-delete') --}}
                                            {{-- <small>
                                                <a href="" type="submit" role="button"
                                                onclick="event.preventDefault();
                                                if(confirm('Are you sure!')){
                                                    $('#form-delete-{{$role->id}}').submit();
                                                }
                                                ">
                                                Delete
                                            </a>
                                        </small>
                                        <form style="display:none" id="form-delete-{{$role->id}}" action="{{route('role.destroy',$role->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                        </form> --}}

                                        {{-- @endcan --}}

                                    </td>
                                    <td>
                                        @forelse($role->getPermissionNames() as $rolepermission)
                                            <label class="badge badge-success">{{$rolepermission}}</label>
                                        @empty
                                        @if($role->name == 'superadmin')
                                            <label class="badge badge-info">
                                                {{__('SuperAdmin has all permission')}}
                                            </label>
                                            @else
                                                <label class="badge badge-warning">
                                                    {{__('No Permissions are assign')}}
                                                </label>
                                            @endif
                                        @endforelse
                                    </td>

                                    <td>{{ $role->created_at->diffForHumans() ?? '' }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="7">
                                        {{("No Role Available")}}
                                    </td>
                                </tr>

                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
{{-- <script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script> --}}
@endsection
