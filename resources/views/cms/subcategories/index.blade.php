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

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        @can('subcategory-create')
                        <a type="button" class="btn btn-success float-right" href="{{route('subcategory.create')}}">Create New</a>
                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SubCategroy</th>
                                    <th>Parent Category</th>
                                    <th>Date</th>
                                    <th>View</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($allSubcategory as $subcat)
                                    <tr>
                                        <td>
                                            {{ $subcat->name ?? '' }}<br>

                                            @can('subcategory-edit')
                                            <small><a href="{{route('subcategory.edit',$subcat->id)}}">Edit</a></small>
                                            @endcan

                                            @can('subcategory-view')
                                            <small><a href="{{route('subcategory.show',$subcat->id)}}">View</a></small>
                                            @endcan

                                            @can('subcategory-delete')
                                            <small>

                                        </small>


                                        @endcan

                                    </td>
                                    <td>{{ $subcat->category->name }}</td>
                                    <td>{{ $subcat->created_at->diffForHumans() ?? '' }}</td>
                                    <td>
                                        @can('subcategory-view')
                                            <a href="{{route('subcategory.show',$subcat->id)}}"><i class="far fa-eye"></i></a>
                                        @endcan
                                    </td>

                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">

                                            </button>
                                            <div class="dropdown-menu dropdown-menu-sm-left dropdown-menu-lg-right">

                                                @can('subcategory-edit')
                                                    <a class="dropdown-item" href="{{route('subcategory.edit',$subcat->id)}}"><i class="far fa-edit"></i> Edit</a>
                                                @endcan

                                                @can('subcategory-delete')
                                                    <a class="dropdown-item" href="" type="submit" role="button"
                                                    onclick="event.preventDefault();
                                                    if(confirm('Are you sure!')){
                                                        $('#form-delete-{{$subcat->id}}').submit();
                                                    }
                                                    ">
                                                    <i class="fas fa-trash"></i> Delete
                                                    </a>
                                                    <form style="display:none" id="form-delete-{{$subcat->id}}" action="{{route('subcategory.destroy',$subcat->id)}}" method="POST">
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
                                        {{("No Sub Category Available")}}
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
