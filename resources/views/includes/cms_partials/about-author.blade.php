<div class="mb-3">About the Author: {{ $post->user->name }}</div>
<div class="media small">
    <a
        href="{{ route('latest.latestpost',['author' => $post->user->name]) }}">
        <img src="{{ $post->user->profile_photo_url }}" width="50" class="img-fluid mr-3"
            alt="{{ $post->user->full_name }}">
    </a>
    <div class="media-body">
        {{ $post->user->description ?? 'Hi 👋! This is ' .$post->user->name }}
    </div>
</div>
