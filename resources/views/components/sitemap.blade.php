@extends($current_theme)

@section('title', 'Sitemap')

@section('content')
<div class="container" id="app">
    <div class="row">
        <div class="col-md-6 mt-5">
            <h3>Posts</h3>
            @foreach($categories_having_post as $category)
                <div class="media">
                    <div class="media-body">
                        <h5 class="mt-1">{{ $category->name }}</h5>
                        @foreach($category->posts as $post)
                            <div class="media mt-3">
                                <div class="media-body">
                                    <a class="mt-0 ml-3" href="{{ route('post.viewitem', $post->slug) }}">{{ $post->title }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-6 mt-5">
            <h3>Pages</h3>
            @foreach($pages as $page)
                <div class="media">
                    <div class="media-body">
                        <div class="media mt-3">
                            <div class="media-body">
                                <a class="mt-0" href="{{ route('pages.show', $page->slug) }}">{{ $page->title }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
