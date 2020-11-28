<div wire:poll.keep-alive>

    @if(App\SettingCmsVisibility::get_first_row_of_visibility('tool_search_box') === 1)
    <div class="mb-4">
        <h6 class="mb-4">Search</h6>
        <form>
            <div class="input-group">
                <input name="searchItem" type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-append">
                    <button class="btn btn-secondary" type="submit">Go!</button>
                </span>
            </div>
        </form>
    </div>
    @endif

    @if(App\SettingCmsVisibility::get_first_row_of_visibility('tool_featured_posts') === 1)
        <div class="mb-4">
            <h6 class="mb-4"><a
                    href="{{ route('latest.latestpost',['blogs'=> 'featured']) }}">Featured
                    Posts</a></h6>
            @forelse($featured_posts as $featured)
                <p class="border-bottom pb-2 mb-2"><a
                        href="{{ route('post.viewitem', $featured->slug) }}">
                        <i class="fas fa-chevron-right"></i> {{ $featured->title }}</a></p>
            @empty
                <p class="border-bottom pb-2 mb-2"><a href="#"><i class="fas fa-chevron-right"></i>
                        {{ __('No Posts Available') }}</a></p>
            @endforelse
        </div>
    @endif

    @if(App\SettingCmsVisibility::get_first_row_of_visibility('tool_popular_posts') === 1)
        <div class="mb-4">
            <h6 class="mb-4"><a
                    href="{{ route('latest.latestpost', ['blogs' => 'most_visited']) }}">Popular
                    Posts</a></h6>
            @forelse($popular_posts as $popular_post)
                <p class="border-bottom pb-2 mb-2"><a
                        href="{{ route('post.viewitem', $popular_post->slug) }}">
                        <i class="fas fa-chevron-right"></i> {{ $popular_post->title }}</a></p>
            @empty
                <p class="border-bottom pb-2 mb-2"><a href="#"><i class="fas fa-chevron-right"></i>
                        {{ __('No Posts Available') }}</a></p>
            @endforelse
        </div>
    @endif

    @if(App\SettingCmsVisibility::get_first_row_of_visibility('tool_latest_posts') === 1)
        <div class="mb-4">
            <h6 class="mb-4"><a href="{{ route('latest.latestpost') }}">Latest Posts</a></h6>
            @forelse($blog_posts as $post)
                <p class="border-bottom pb-2 mb-2"><a
                        href="{{ route('post.viewitem', $post->slug) }}">
                        <i class="fas fa-chevron-right"></i> {{ $post->title }}</a></p>
            @empty
                <p class="border-bottom pb-2 mb-2"><a href="#"><i class="fas fa-chevron-right"></i>
                        {{ __('No Posts Available') }}</a></p>
            @endforelse
        </div>
    @endif

    @if(App\SettingCmsVisibility::get_first_row_of_visibility('tool_category_lists') === 1)
        <div class="mb-4">
            <h6 class="mb-4"><a href="{{ route('lists_of_category') }}">Categories</a></h6>
            @forelse($blog_categories as $cat)
                <p class="border-bottom pb-2 mb-2"><a
                        href="{{ route('latest.latestpost',['category' => $cat->name]) }}">
                        <i class="fas fa-chevron-right"></i> {{ $cat->name }}
                        [{{ $cat->category_has_total_posts() }}]</a></p>
            @empty
                <p><a href="#">{{ __('No Categories Available') }}</a></p>
            @endforelse
        </div>
    @endif

    @if(App\SettingCmsVisibility::get_first_row_of_visibility('tool_tag_clouds') === 1)
    <div class="mb-4">
        <h6 class="mb-2"><a href="{{ route('lists_of_tag') }}">Tags</a></h6>
        @forelse($blog_tags as $tag)
            <a class="badge badge-info"
                href="{{ route('latest.latestpost',['tags' => $tag->name]) }}">
                {{ $tag->name }}
            </a>
        @empty
            <p><a href="#">{{ __('No Tags Available') }}</a></p>
        @endforelse
    </div>
    @endif
</div>
