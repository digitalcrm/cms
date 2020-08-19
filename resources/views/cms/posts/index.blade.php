@extends('layouts.master')

@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Posts</h1>
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
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Created_at</th>
                                    {{-- <th>Edit</th>
                                        <th>Delete</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($allPosts as $post)
                                    <tr>
                                        <td>
                                            {{ $post->title ?? '' }}<br>

                                            @can('edit-post')
                                            <small><a href="{{route('posts.edit',$post->id)}}">Edit</a></small>
                                            @endcan

                                            @can('view-post')
                                            <small><a href="{{route('posts.show',$post->id)}}">View</a></small>
                                            @endcan

                                            @can('delete-post')
                                            <small>
                                                <a href="" type="submit" role="button"
                                                onclick="event.preventDefault();
                                                if(confirm('Are you sure!')){
                                                    $('#form-delete-{{$post->id}}').submit();
                                                }
                                                ">
                                                Delete
                                            </a>
                                        </small>
                                        <form style="display:none" id="form-delete-{{$post->id}}" action="{{route('posts.destroy',$post->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                        </form>

                                        @endcan

                                    </td>
                                    <td>{{ $post->user->name ?? '' }}</td>
                                    <td>{{ $post->created_at ?? '' }}</td>
                                    {{-- <td>
                                        <a href="{{route('posts.edit', $post->id)}}">Edit</a>
                                    </td>
                                    <td>
                                        <a href="{{route('posts.delete', $post->id)}}">Delete</a>
                                    </td> --}}
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="7">
                                        {{("No Posts Available")}}
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
@endsection
