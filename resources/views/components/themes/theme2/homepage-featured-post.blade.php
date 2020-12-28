<div class="row">
    <div class="col-md-12 text-center mx-auto">
        <h3 class="block-title text-center my-4">Featured Posts</h3>
    </div>

</div>
<div class="row">
    <div class="col-md-12 text-right small" style="margin-top: -40px;">
        <a
            href="{{ route('latest.latestpost',['blogs'=> 'featured']) }}">All
            Featured Posts</a>
    </div>
</div>

<div class="row">
    @forelse($featured_posts as $fpost)
        <div class="col-md-4">
            <div class="featured-post">
                @if($fpost->featured_image)
                <a href="#"><img src="{{ optional($fpost->featured_image)->getFullUrl() }}" class="img-fluid"
                        alt="..."></a>
                @endif
                <h5 class="c-title"><a href="{{ route('post.viewitem', $fpost->slug) }}">{{ $fpost->title }}</a></h5>
                <p class="c-date">{{ $fpost->created_at->toFormattedDateString() }}</p>
            </div>
        </div>
    @empty
        <div class="col-md-12">
            <div class="featured-post">
                <h5 class="c-title"><a href="#">Featured post no available</a></h5>
            </div>
        </div>

    @endforelse
</div>
