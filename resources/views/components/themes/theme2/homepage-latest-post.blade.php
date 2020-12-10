<div class="row">
    <div class="col-md-12">
        <a href="{{ route('latest.latestpost') }}">
            <h3 class="block-title mt-5 mb-4">Latest Posts</h3>
        </a>
    </div>
    <div class="col-md-9">
        @forelse($all_latest_posts as $post)
            <div class="latest-post mb-4">
                @if($post->featured_image)
                <a href="{{ route('post.viewitem', $post->slug) }}">
                    <img
                        src="{{ optional($post->featured_image)->getFullUrl() }}" class="img-fluid"
                        alt="{{ $post->slug }}">
                </a>
                @endif
                <div class="card-body">
                    <div class="blog-info mb-3"><span>{{ $post->created_at->toFormattedDateString() }}</span>
                        <span>{{ $post->user->name }}</span> <span>{{ $post->category->name }}</span></div>
                    <h5 class="blog-title"><a
                            href="{{ route('post.viewitem', $post->slug) }}">{{ $post->title }}</a>
                    </h5>
                    <p class="blog-desc">{!! $post->summary_of_body !!}</p>
                </div>
            </div>

        @empty
            <div class="latest-post mb-4">
                <div class="card-body">
                    <h5 class="blog-title"><a href="#">Hello World!</a></h5>
                </div>
            </div>
        @endforelse
        {{-- Pagination --}}
        <nav aria-label="...">
            <ul class="pagination pagination-sm  justify-content-center">
                {{ $all_latest_posts->links() }}
            </ul>
        </nav>
    </div>
    <div class="col-md-3">
        <x-themes.theme2.home-internal-right-side-list />
    </div>
</div>
