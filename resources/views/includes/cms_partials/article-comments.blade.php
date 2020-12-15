<div class="mb-3 mt-5">Comments {{ count($post->approvedComments) }}</div>
<div class="row mb-2">
    @foreach($post->approvedComments as $comment)
        <div class="col-12">
            <div class="media {{ $loop->first ? '' : 'my-2' }}">
                <img src="{{ $comment->user->profile_photo_url }}" class="img-fluid mr-3" alt="user-image"
                    width="64" height="64">
                <div class="media-body">
                    <span class="mt-0 text-muted">Posted On: {{ $comment->created_at->diffForHumans() }}</span>
                    <p>{{ $comment->body }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
<form method="post" action="{{ route('thread.comment', $post->slug) }}">
    @csrf
    <div class="form-group">
        <textarea class="form-control @error('body') is-invalid @enderror" placeholder="Comment..." id="body" name="body" rows="6"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary px-3">Post Comment</button>@guest<small class="m-3 text-danger">Login first</small>@endguest
    </div>
</form>
