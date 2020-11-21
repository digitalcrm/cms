<div>
    <div class="row featured-post-heading">
        <div class="col-md-12 mt-5 mb-3">
           <h2 class="mb-4">
            @if(request('category'))
                {{ __('Category: ' . request('category')) }}
                @elseif(request('tags'))
                {{ __('Tag: ' . request('tags')) }}
                @elseif(request('blogs') == 'most_visited')
                {{ __('Popular: Articles') }}
                @elseif(request('blogs') == 'featured')
                {{ __('Featured: Articles') }}
                @else
                {{ __('Latest: Articles') }}
            @endif
            </h2>
        </div>
     </div>
     <div class="row">
        <div class="col-md-9 pl-0 pr-5">
            @forelse($list_of_posts as $post)
            <div class="col-md-12 border-bottom pb-3 mb-3">
                <div class="media">
                    <img src="{{ optional($post->featured_image)->getFullUrl() ?? $post->default_image }}" width="175" class="mr-3 img-fluid rounded" alt="{{ $post->slug }}">
                    <div class="media-body">
                        <h5 class="mt-0"><a href="{{ route('post.viewitem', $post->slug) }}">{{ $post->title }}</a></h5>
                        <div class="blog-info mb-3"><span>{{ $post->created_at->toFormattedDateString() }}</span> <span>{{ $post->category->name }}</span></div>
                            <p>{!! $post->summary_of_body !!}</p>
                        </div>
                </div>
            </div>

            @empty
             <h3>No Posts Available</h3>
            @endforelse
            {{ $list_of_posts->links() }}
        </div>

        <livewire:landing-page.right-sidebar />

     </div>
</div>
