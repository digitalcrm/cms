@extends('layouts.master')

@section('title', 'view comment')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Comment Replies</h1>
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
                        <strong>Author:</strong> {{ $comment->user->name }}<br>
                        <strong>Comments:</strong> {{ $comment->body }}
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Replied By</th>
                                    <th>Reply</th>
                                    <th>Is response to</th>
                                    <th>Replied On</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($comment->replies as $reply)
                                    <tr>
                                        <td>
                                            <img src="{{ $reply->user->profile_photo_url }}" alt="{{ $reply->user->name }}"
                                            class="img-size-50 img-circle mr-3">
                                            {{ $reply->user->name }}
                                            <p><strong>{{ $reply->user->email }}</strong>,
                                                {{ $reply->ip ?? '' }}
                                            </p>
                                        </td>
                                        <td>
                                            {{ $reply->comment_description() }}
                                        </td>
                                        <td>
                                            <a href="{{ route('post.viewitem', $reply->commentable->slug) }}"
                                                target="_blank">
                                                {{ $reply->commentable->title}}
                                            </a>
                                        </td>
                                        <td>
                                            {{ $reply->created_at->toFormattedDateString() }}
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="10" align="center">No Comments Available</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
