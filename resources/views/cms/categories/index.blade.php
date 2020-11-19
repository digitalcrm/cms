@extends('layouts.master')

@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Category</h1>
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
                        {{-- @foreach ($roles as $role)
                            <a
                            href="{{ route('all-users',['roles'=> $role]) }}"
                            class="btn btn-sm btn-outline-secondary mr-1 {{ request('roles') == $role ? 'active' : '' }}">
                            {{ $role }}
                        </a>

                        @endforeach --}}
                        @can('category-create')
                        <a type="button" class="btn btn-success float-right" href="{{route('category.create')}}">Create New</a>
                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>View</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($allCategory as $cat)
                                    <tr>
                                    <td>
                                        {{ $cat->name ?? '' }}
                                    </td>
                                    <td>{{ $cat->created_at->diffForHumans() ?? '' }}</td>
                                    <td>
                                        @can('category-view')
                                            <a href="{{route('category.show',$cat->id)}}"><i class="far fa-eye"></i></a>
                                        @endcan
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">

                                            </button>
                                            <div class="dropdown-menu dropdown-menu-sm-left dropdown-menu-lg-right">
                                                @can('category-edit')
                                                    <a class="dropdown-item" href="{{route('category.edit',$cat->id)}}"><i class="far fa-edit"></i> Edit</a>
                                                @endcan

                                                @can('category-delete')
                                                    <a class="dropdown-item" href="" type="submit" role="button"
                                                        onclick="event.preventDefault();
                                                        if(confirm('Are you sure!')){
                                                            $('#form-delete-{{$cat->id}}').submit();
                                                        }
                                                        ">
                                                    <i class="fas fa-trash"></i> Delete
                                                    </a>
                                                    <form style="display:none" id="form-delete-{{$cat->id}}" action="{{route('category.destroy',$cat->id)}}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                @endcan
                                            </div>
                                          </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="7">
                                        {{("No Category Available")}}
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
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
@endsection
