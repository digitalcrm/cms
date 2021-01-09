@extends('themes.theme2.layouts.main')

@section('title', meta_title($post->title))
@section('url', meta_url() )
@section('description', meta_description($post->body) )

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="block-title-internal mt-5 mb-4">{{ $post->title }}</h3>
        </div>

        <div class="col-md-12">
            <div class="blog-info-footer mb-3">
                <span>{{ $post->created_at->toFormattedDateString() }}</span>
                <span><a href="#">{{ $post->user->name }}</a></span>
                <span><a
                        href="{{ route('latest.latestpost',['category' => $post->category->name]) }}">{{ $post->category->name }}</a></span>
            </div>
        </div>
        <div class="col-md-9">
            <div class="latest-post mb-4">
                @if($post->featured_image)
                <img src="{{ optional($post->featured_image)->getFullUrl() ?? $post->default_fake_image($post->slug,'720','540') }}"
                    class="img-fluid" alt="{{ $post->slug }}">
                @endif
                <div class="card-body">
                    <p class="blog-desc">{!! $post->body !!}</p>
                </div>

                <div class="card-footer">
                    <div class="blog-info-with-border">
                        <div class="float-left">
                            @if(Auth::check())
                                @if($post->favorited())
                                    <span><a
                                            href="{{ route('unsaved.post',['posts'=>$post->id]) }}"><i
                                                class="fas fa-save"></i> Unsaved</a>
                                    </span>
                                @else
                                    <span><a
                                            href="{{ route('save.post',['posts'=>$post->id]) }}"><i
                                                class="fas fa-save"></i> Save</a>
                                    </span>
                                @endif
                            @endif
                        </div>

                        <div class="float-right">
                            <span>
                                <a href="{{ route('article.print_article', $post->slug) }}"
                                    target="__blank"><i class="fa fa-print" aria-hidden="true"></i>
                                    {{ __('Print') }}</a>
                            </span>
                            <span><i class="fa fa-eye" aria-hidden="true"></i> ({{ $post->postcount }}) </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="block-title-sub-internal mb-4">Related Posts</h3>
                    @forelse($related_posts as $related)
                    <ul class="list-unstyled">
                        <li class="media">
                            @if($related->featured_image)
                            <a href="{{ route('post.viewitem', $related->slug) }}">
                                <img src="{{ optional($post->featured_image)->getFullUrl() ?? $post->default_fake_image($related->slug) }}"
                                    class="mr-3 related-img"
                                    alt="{{ $related->slug }}"
                                >
                            </a>
                            @endif
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
                        {!! ($loop->last) ? '' : '<hr>' !!}
                    </ul>
                    @empty
        
                    @endforelse
                </div>
            </div>
        </div>
        <!-- col-md-9 End -->
        <div class="col-md-3">
            <x-themes.theme2.home-internal-right-side-list />
        </div>
    </div>
</div>

@endsection
