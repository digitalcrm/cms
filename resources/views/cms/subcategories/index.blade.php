@extends('layouts.master')

@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Sub_Category</h1>
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
                                    <th>Created_at</th>
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
                                                <a href="" type="submit" role="button"
                                                onclick="event.preventDefault();
                                                if(confirm('Are you sure!')){
                                                    $('#form-delete-{{$subcat->id}}').submit();
                                                }
                                                ">
                                                Delete
                                            </a>
                                        </small>
                                        <form style="display:none" id="form-delete-{{$subcat->id}}" action="{{route('subcategory.destroy',$subcat->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                        </form>

                                        @endcan

                                    </td>
                                    <td>{{ $subcat->category->name }}</td>
                                    <td>{{ $subcat->created_at->diffForHumans() ?? '' }}</td>
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
