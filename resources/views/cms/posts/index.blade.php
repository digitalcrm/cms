@extends('layouts.master')

@section('title', 'All Posts')

@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Posts</h1>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        {{-- @if(count($allPosts)>0) --}}
                        <a href="{{ route('posts.index') }}"
                            class="btn btn-sm btn-outline-secondary mr-1 allclass">
                            All
                        </a>
                        <a href="{{ route('posts.index',['filterByactive'=> 'active']) }}"
                            class="btn btn-sm btn-outline-secondary mr-1 activeclass {{ request('filterByactive') == 'active' ? 'active' : '' }}">
                            Active
                        </a>
                        <a href="{{ route('posts.index',['filterByinactive'=> 'inactive']) }}"
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
                            <a href="{{ route('posts.create') }}"
                                class="btn btn-primary btn-sm mx-1 float-right">Add New</a>
                        @endcan

                        {{-- <div class="btn-group dropdown keep-open float-right">
                            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" id="login"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret"><i class="fa fa-filter" aria-hidden="true"></i></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <form action="#" id="popForm" method="get" class="p-2">
                                    <div id="filtertable">
                                    </div>
                                </form>
                            </div>
                        </div> --}}

                    </div>
                    <!-- /.card-body -->
                    <livewire:dashboard.all-posts />
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@section('scripts')
@parent

<script>
    function getAll() {
        const request_all_element = document.querySelector('.allclass');
        const request_active_element = document.querySelector('.activeclass');
        const request_inactive_element = document.querySelector('.inactiveclass');
        const request_draft_element = document.querySelector('.draftclass');
        const request_trash_element = document.querySelector('.trashclass');

        if (request_active_element.classList.contains('active')) {

            request_all_element.classList.remove('active');

        } else if (request_inactive_element.classList.contains('active')) {

            request_all_element.classList.remove('active');

        } else if (request_draft_element.classList.contains('active')) {

            request_all_element.classList.remove('active');

        } else if (request_trash_element.classList.contains('active')) {

            request_all_element.classList.remove('active');

        } else {

            request_all_element.classList.add('active');

        }
    }
    // getAll();
    window.addEventListener('load', getAll);

</script>
{{-- <script>
    $(document).ready(function () {
        $('#posttable').DataTable({
            "ordering": false,
            "paging": false,
            "info": false,
            "searching": false,
            initComplete: function () {
                this.api().columns([2, 3, 7]).every(function (
                d) { //THis is used for specific column
                    var column = this;
                    var theadname = $('#posttable th').eq([d]).text();
                    var select = $('<select class="form-control my-1"><option value="">' +
                            theadname + ': All</option></select>')
                        .appendTo('#filtertable')
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });
                    column.data().unique().sort().each(function (d, j) {
                        var val = $('<div/>').html(d).text();
                        select.append('<option value="' + val + '">' + val +
                            '</option>')
                    });

                });
            }
        });
    });

</script> --}}
@endsection
@endsection
