@extends('layouts.master')

@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Saved Posts</h1>
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
                    {{-- <div class="card-header">
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

                    </div> --}}
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="saved_post_table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th style="display: none">Date</th>
                                    <th>Subcategory</th>
                                    <th>Tags</th>
                                    <th>Date</th>
                                    <th>Saved Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($savedPosts as $post)
                                    <tr>
                                    <td>
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
                                        {{ $post->posts_having_tags }}
                                    </td>
                                    <td>{{ $post->created_at->toFormattedDateString() ?? '' }}</td>
                                    <td>
                                        {{ $post->pivot->created_at->toFormattedDateString() }}
                                    </td>

                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="15">
                                        {{("No Posts Saved")}}
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
            $('#saved_post_table').DataTable( {
                "ordering": false,
                initComplete: function () {
                    this.api().columns([2,3]).every( function (d) {//THis is used for specific column
                        var column = this;
                        var theadname = $('#saved_post_table th').eq([d]).text();
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
