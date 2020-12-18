@extends($current_theme)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="mt-5 mb-4">{{ __('Sitemap') }}</h3>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6">
                    <h3>Posts</h3>
                    @foreach($categories_having_post as $category)
                    <div class="media">
                        <div class="media-body">
                            <h5 class="mt-1"><a
                                    href="{{ route('latest.latestpost',['category' => $category->name]) }}">{{ $category->name }} [{{ $category->posts->count() }}]</a>
                            </h5>
                            @foreach($category->posts as $post)
                                <div class="media">
                                    <div class="media-body">
                                        <a class=""
                                            href="{{ route('post.viewitem', $post->slug) }}"><i class="fas fa-angle-right p-2"></i>{{ $post->title }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {!! $loop->last ? '' : '<hr>' !!}
                @endforeach
                </div>
                <div class="col-md-6">
                    <h3>Pages</h3>
                    @foreach($pages as $page)
                    <div class="media">
                        <div class="media-body">
                            <div class="media">
                                <div class="media-body">
                                    <a class=""
                                        href="{{ route('pages.show', $page->slug) }}"><i class="fas fa-angle-right p-2"></i> {{ $page->title }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
        <!-- col-md-9 End -->
        <div class="col-md-3">
        </div>
    </div>
</div>

@endsection
