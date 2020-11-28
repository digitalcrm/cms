<div class="mb-3 mt-5">Related Article</div>
<div class="form-group">
    <div class="row">
        <div class="col">
            @forelse($related_posts as $related)
            <ul class="list-unstyled">
                <li class="media">
                    <a href="{{ route('post.viewitem', $related->slug) }}">
                        <img src="{{ optional($post->featured_image)->getFullUrl() ?? $post->default_fake_image($related->slug) }}"
                            class="mr-3 related-img"
                            alt="{{ $related->slug }}"
                        >
                    </a>
                    <div class="media-body">
                            <h5 class="mt-0 mb-1">
                                <a href="{{ route('post.viewitem', $related->slug) }}">
                                    {{ $related->title }}
                                </a>
                            </h5><small>{{ $related->category->name }}</small>
                            <p>
                                {!! $post->summary_of_body !!}
                            </p>
                        </div>
                </li>
                <hr>
            </ul>
            @empty

            @endforelse
        </div>
    </div>
</div>
