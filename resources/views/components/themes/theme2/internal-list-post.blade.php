<div class="row">
    <div class="col-md-12">
        <h3 class="block-title-internal mt-5 mb-4">
            @if(request('category'))
                {{ __('Category: ' . request('category')) }}
                @elseif(request('tags'))
                {{ __('Tag: ' . request('tags')) }}
                @elseif(request('blogs') == 'most_visited')
                {{ __('Popular: Articles') }}
                @elseif(request('blogs') == 'featured')
                {{ __('Featured: Articles') }}
                @elseif(request('searchItem'))
                {{ __('Search: ' . request('searchItem')) }}
                @elseif(request('author'))
                <div class="alert alert-info small mt-4 mb-3" role="alert">
                    {{ __('Author: ' . request('author')) }}
                </div>
                @else
                {{ __('Latest: Articles') }}
            @endif
        </h3>
    </div>
    <div class="col-md-9">
        <div class="row">
            @forelse($lists_of_posts as $post)
            <div class="col-md-12">
                <ul class="list-unstyled">
                    <li class="media my-4">
                        @if($post->featured_image)
                        <a href="#">
                                <img src="{{ optional($post->featured_image)->getFullUrl() }}" class="mr-3 related-img-category" alt="{{ $post->slug }}">
                            </a>
                        @endif
                        <div class="media-body">
                            <h5 class="mt-0 mb-1"><a href="{{ route('post.viewitem', $post->slug) }}">{{ $post->title }}</a>
                            </h5>
                            <p>{!! $post->summary_of_body !!}</p>
                            <div class="blog-info-footer mb-3">
                                <span>{{ $post->created_at->toFormattedDateString() }}</span>
                                <span><a href="#">{{ $post->user->name }}</a></span>
                                <span><a href="#">{{ $post->category->name }}</a></span>
                            </div>
                        </div>
                    </li>
                    {!! ($loop->last ? '' : '<hr>') !!}
                </ul>
            </div>                
            @empty
                <h5>No Post Found!</h5>
            @endforelse
        </div>
        {{ $lists_of_posts->links() }}
    </div>
    <div class="col-md-3">
        <x-themes.theme2.home-internal-right-side-list />
    </div>
</div>