@extends('layouts.master')

@section('title', 'Comments')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">All Comments</h1>
            </div>
        </div>
    </div>
</div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <a href="{{ route('comments.index') }}"
                                    class="btn btn-sm btn-outline-secondary mr-1 {{ request('action') == '' ? 'active' : '' }}">
                                    Comments
                                </a>
                                <a href="{{ route('comments.index',['action'=>'replies']) }}"
                                    class="btn btn-sm btn-outline-secondary mr-1 {{ request('action') == 'replies' ? 'active' : '' }}">
                                    Replies
                                </a>
                            </div>
                        </div>
                    </div>
                    <livewire:comments.commentable />
                </div>
            </div>
        </div>
    </div>
</section>
@section('scripts')
@parent
<script>
    window.livewire.on('replyModal', () => {
        $('#replyModal').modal('hide');
    })
</script>
@endsection
@endsection
