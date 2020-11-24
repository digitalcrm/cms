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
                        {{-- @if(count($allPosts)>0) --}}
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

                        <a href="{{ route('posts.index',['trashPost' => 'deleted']) }}"
                            class="btn btn-sm btn-outline-secondary mr-1 trashclass {{ request('trashPost') == 'deleted' ? 'active' : '' }}">
                            Trash
                        </a>

                        {{-- @endif --}}
                        @can('create-post')
                        <a href="{{route('posts.create')}}" class="btn btn-success btn-sm mx-1 float-right">Add New</a>
                        @endcan

                        <div class="btn-group dropdown keep-open float-right">
                            <button
                                type="button"
                                class="btn btn-sm btn-outline-secondary dropdown-toggle"
                                id="login" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="caret"><i class="fa fa-filter" aria-hidden="true"></i></span>
                            <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <form action="#" id="popForm" method="get" class="p-2">
                                    <div id="filtertable">
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="posttable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th style="display: none">Date</th>
                                    <th>Subcategory</th>
                                    <th>Tags</th>
                                    <th>Date</th>
                                    <th>Views</th>
                                    <th>Show</th>
                                    <th>Active/Inactive</th>
                                    <th>Featured</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($allPosts as $post)
                                    <tr>
                                    <td>
                                        {{-- @if($post->featured_image)
                                            <img src="{{ $post->featured_image->getUrl('post-thumb') }}" alt="">
                                            @endif --}}
                                        <img src="{{ optional($post->featured_image)->getUrl('post-thumb') ?? $post->default_fake_image($post->slug, 35, 35) }}" alt="">

                                        <a href="{{ route('post.viewitem', $post->slug) }}" target="_blank">
                                            {{ $post->title ?? '' }}
                                        </a>

                                    </td>
                                    <td>{{ $post->user->name ?? '' }}</td>
                                    <td>{{ $post->category->name ?? '' }}</td>

                                    <td style="display: none">{{ $post->created_at->toDateString() ?? '' }}</td>

                                    <td>{{ $post->subcategory->name ?? 'none' }}</td>
                                    <td>
                                        {{ $post->posts_having_tags ?? '' }}
                                    </td>
                                    <td>{{ $post->created_at->toFormattedDateString() ?? '' }}</td>
                                    <td>
                                        {{ $post->postcount }}
                                    </td>
                                    <td>
                                        @can('view-post')
                                        {{-- <small> --}}
                                            <a
                                            class="dropdown-item"
                                            href="{{route('posts.show',$post->slug)}}">
                                                <i class="far fa-eye"></i>
                                            </a>
                                        {{-- </small> --}}
                                        @endcan
                                    </td>
                                    <td>
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
                                    <form
                                    style="display: none"
                                    method="post"
                                    id="post-status-{{$post->id}}"
                                    action="{{route('posts.status',$post->slug)}}"
                                    >
                                    @csrf
                                    @method('put')
                                    </form>
                                    </td>

                                    <td>
                                        <a
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="{{($post->featured === 1) ? 'click for disable the featured post' : 'click for active the featured post'}}"
                                        class="dropdown-item"
                                        href=""
                                        type="submit"
                                        onclick="event.preventDefault();
                                        if(confirm('Are you sure!')){
                                            $('#post-featured{{$post->id}}').submit();
                                        }">
                                        {!!
                                            ($post->featured == 1) ?
                                                '<i class="fas fa-toggle-on" style="color: green"></i>' :
                                                '<i class="fas fa-toggle-off" style="color: red"></i>'
                                        !!}
                                    </a>
                                    <form
                                    style="display: none"
                                    method="post"
                                    id="post-featured{{$post->id}}"
                                    action="{{route('posts.featured',$post->slug)}}"
                                    >
                                    @csrf
                                    @method('put')
                                    </form>
                                    </td>

                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">

                                            </button>
                                            <div class="dropdown-menu dropdown-menu-sm-left dropdown-menu-lg-right">
                                                {{-- edit permission start --}}
                                                @can('edit-post')
                                                    <a
                                                    class="dropdown-item"
                                                    href="{{route('posts.edit',$post->slug)}}">
                                                    <i class="far fa-edit"></i> Edit
                                                    </a>
                                                @endcan
                                                {{-- edit permission end --}}
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
                                                    <i class="fas fa-trash"></i> Delete
                                                </a>
                                            {{-- </small> --}}
                                            <form
                                                style="display:none"
                                                id="form-delete-{{$post->id}}"
                                                action="{{route('posts.destroy',$post->slug)}}" method="POST">
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
                                    <td class="text-center" colspan="15">
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
    @section('scripts')
    @parent

    <script>
        function getAll(){
            const request_all_element = document.querySelector('.allclass');
            const request_active_element = document.querySelector('.activeclass');
            const request_inactive_element = document.querySelector('.inactiveclass');
            const request_draft_element = document.querySelector('.draftclass');
            const request_trash_element = document.querySelector('.trashclass');

            if(request_active_element.classList.contains('active')){

                request_all_element.classList.remove('active');

            } else if(request_inactive_element.classList.contains('active')) {

                request_all_element.classList.remove('active');

            } else if(request_draft_element.classList.contains('active')) {

                request_all_element.classList.remove('active');

            } else if(request_trash_element.classList.contains('active')) {

                request_all_element.classList.remove('active');

            } else {

                request_all_element.classList.add('active');

            }
        }
        // getAll();
        window.addEventListener('load', getAll);
    </script>
    <script>
        $(document).ready(function() {
            $('#posttable').DataTable( {
                "ordering": false,
                initComplete: function () {
                    this.api().columns([2,3]).every( function (d) {//THis is used for specific column
                        var column = this;
                        var theadname = $('#posttable th').eq([d]).text();
                        var select = $('<select class="form-control my-1"><option value="">'+theadname+': All</option></select>')
                        .appendTo( '#filtertable' )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                            );

                            column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                        } );
                        column.data().unique().sort().each( function ( d, j ) {
                            var val = $('<div/>').html(d).text();
                            select.append( '<option value="'+val+'">'+val+'</option>' )
                        } );

                    } );
                }
            } );
        } );
    </script>
    @endsection
@endsection
