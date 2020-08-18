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
                        <a type="button" class="btn btn-success float-right" href="{{route('category.create')}}">Create New</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Created_at</th>
                                    {{-- <th>Edit</th>
                                        <th>Delete</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($allCategory as $cat)
                                    <tr>
                                        <td>
                                            {{ $cat->name ?? '' }}<br>

                                            @can('category-edit')
                                            <small><a href="{{route('category.edit',$cat->id)}}">Edit</a></small>
                                            @endcan

                                            @can('category-view')
                                            <small><a href="{{route('category.show',$cat->id)}}">View</a></small>
                                            @endcan

                                            @can('categroy-delete')
                                            <small>
                                                <a href="" type="submit" role="button"
                                                onclick="event.preventDefault();
                                                if(confirm('Are you sure!')){
                                                    $('#form-delete-{{$cat->id}}').submit();
                                                }
                                                ">
                                                Delete
                                            </a>
                                        </small>
                                        <form style="display:none" id="form-delete-{{$cat->id}}" action="{{route('category.destroy',$cat->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                        </form>

                                        @endcan

                                    </td>
                                    <td>{{ $cat->created_at->diffForHumans() ?? '' }}</td>
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
