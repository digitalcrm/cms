@extends('layouts.master')

@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Posts</h1>
                {{-- <button type="button" class="btn btn-success swalDefaultSuccess">
                    Launch Success Toast
                  </button> --}}
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
                        @if(count($allPosts)>0)
                        <a
                            href="{{ route('posts.index') }}"
                            class="btn btn-sm btn-outline-secondary mr-1 allclass">
                            All
                        </a>
                        <a
                            href="{{ route('posts.index',['filterByactive'=> 'active']) }}"
                            class="btn btn-sm btn-outline-secondary mr-1 activeclass {{ request('filterByactive') == 'active' ? 'active' : '' }}">
                            Active
                        </a>
                        <a
                            href="{{ route('posts.index',['filterByinactive'=> 'inactive']) }}"
                            class="btn btn-sm btn-outline-secondary mr-1 inactiveclass {{ request('filterByinactive') == 'inactive' ? 'active' : '' }}">
                            Inactive
                        </a>

                        <a href="{{ route('posts.index',['draftPost' => 'true']) }}"
                            class="btn btn-sm btn-outline-secondary mr-1 draftclass {{ request('draftPost') == 'true' ? 'active' : '' }}">
                            Draft
                        </a>

                        @endif

                        @can('create-post')
                        <a href="{{route('posts.create')}}" class="btn btn-success float-right">Add New</a>
                        @endcan

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>Created_at</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($allPosts as $post)
                                    <tr>
                                        <td>
                                            @if($post->featured_image)
                                                <img src="{{ $post->featured_image->getUrl('post-thumb') }}" alt="">
                                            @endif

                                            {{ $post->title ?? '' }}<br>

                                            {{-- @can('edit-post')
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

                                        @endcan --}}

                                    </td>
                                    <td>{{ $post->user->name ?? '' }}</td>
                                    <td>{{ $post->category->name ?? '' }}</td>
                                    <td>{{ $post->subcategory->name ?? '' }}</td>
                                    <td>{{ $post->created_at ?? '' }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">

                                            </button>
                                            <div class="dropdown-menu dropdown-menu-sm-left dropdown-menu-lg-right">
                                                {{-- edit permission start --}}
                                                @can('edit-post')
                                                {{-- <small> --}}
                                                    <a
                                                    class="dropdown-item"
                                                    href="{{route('posts.edit',$post->id)}}">
                                                    <i class="far fa-edit"></i>
                                                    </a>
                                                {{-- </small> --}}

                                                {{-- <small> --}}
                                                    <a
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="{{($post->isactive === 1) ? 'click for inactive the post' : 'click for active the post'}}"
                                                    class="dropdown-item"
                                                    href=""
                                                    type="submit"
                                                    onclick="event.preventDefault();
                                                    if(confirm('Are you sure!')){
                                                        $('#post-status-{{$post->id}}').submit();
                                                    }">
                                                        {!!
                                                            ($post->isactive == 1) ?
                                                                '<i class="fas fa-toggle-on" style="color: green"></i>' :
                                                                '<i class="fas fa-toggle-off" style="color: red"></i>'
                                                        !!}
                                                    </a>
                                                {{-- </small> --}}
                                                <form
                                                style="display: none"
                                                method="post"
                                                id="post-status-{{$post->id}}"
                                                action="{{route('posts.status',$post->id)}}"
                                                >
                                                @csrf
                                                @method('put')
                                                </form>


                                                @endcan
                                                {{-- edit permission end --}}


                                                @can('view-post')
                                                {{-- <small> --}}
                                                    <a
                                                    class="dropdown-item"
                                                    href="{{route('posts.show',$post->id)}}">
                                                        <i class="far fa-eye"></i>
                                                    </a>
                                                {{-- </small> --}}
                                                @endcan

                                                @can('delete-post')
                                                {{-- <small> --}}
                                                    <a
                                                    class="dropdown-item"
                                                    href="" type="submit" role="button"
                                                    onclick="event.preventDefault();
                                                    if(confirm('Are you sure!')){
                                                        $('#form-delete-{{$post->id}}').submit();
                                                    }
                                                    ">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            {{-- </small> --}}
                                            <form
                                                style="display:none"
                                                id="form-delete-{{$post->id}}"
                                                action="{{route('posts.destroy',$post->id)}}" method="POST">
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

<script>
    function getAll(){
        const request_all_element = document.querySelector('.allclass');
        const request_active_element = document.querySelector('.activeclass');
        const request_inactive_element = document.querySelector('.inactiveclass');
        const request_draft_element = document.querySelector('.draftclass');

        if(request_active_element.classList.contains('active')){

            request_all_element.classList.remove('active');

        } else if(request_inactive_element.classList.contains('active')) {

            request_all_element.classList.remove('active');

        } else if(request_draft_element.classList.contains('active')) {

            request_all_element.classList.remove('active');

        } else {

            request_all_element.classList.add('active');

        }
    }
    // getAll();
    window.addEventListener('load', getAll);
</script>
@endsection
