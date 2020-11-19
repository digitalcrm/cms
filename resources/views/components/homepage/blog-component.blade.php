<div>
    <div class="row">
        @forelse($blogs as $post)
        <div class="col-md-4">
            <div class="latest-post border mb-4">
                <a href="{{ route('post.viewitem', $post->slug) }}">
                    <img src="{{ optional($post->featured_image)->getFullUrl() ?? $post->default_image }}" class="img-fluid" alt="{{ $post->slug }}">
                </a>
                <div class="card-body">
                    <h5 class="c-title"><a href="{{ route('post.viewitem', $post->slug) }}">{{ $post->title ?? '' }}</a></h5>
                    <div class="blog-info mb-3">
                        <span>{{ $post->created_at->toFormattedDateString() }}</span>
                        <span>{{ $post->category->name ?? '' }}</span></div>
                    <p>{!! $post->summary_of_body ?? '' !!}</p>
                </div>
                <div class="card-footer small bg-light">
                    <a class="float-left read-more-arrow" href="#">Read More <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                    <a class="float-right" href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 0</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-12 bg-dark-two statistics text-center text-white">
            <h4>No blogs Available</h4>
        </div>
        @endforelse
    </div>
</div>
