@extends('layouts.app')

@section('title', $post->title .' : '. $post->category->name )

@section('content')
<div class="container" id="app">
    <div class="row featured-post-heading">
        <div class="col-md-12 mt-5 mb-3">
            <h2 class="mb-4">{{ $post->title }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9 pl-0 pr-5">
            <div class="col-md-12">
                <img src="{{ optional($post->featured_image)->getFullUrl() ?? $post->default_image }}"
                    class="img-fluid rounded mb-3" alt="{{ $post->slug }}">
                <p>
                    {!! $post->body !!}
                </p>

                {{-- Tag div --}}
                @if($post->count_post_having_total_tags() > 0)
                    <hr>
                    <div>
                        <p>
                            <span class="font-weight-bold">Tags:</span> @foreach($post->tags as $tag)
                            <a
                                href="{{ route('latest.latestpost',['tags' => $tag->tag_name]) }}">{{ $tag->name }}{{ ($loop->last) ? '' : ', ' }}</a>
                @endforeach
                </p>
            </div>
            @endif

            {{-- Toolbar path for this file is under includes/cms_partials/article... page --}}
            @include('includes.cms_partials.article-toolbar')

            <div class="comments-section mt-5">

                @if($post->get_first_row_of_visibility('tool_user') === 1)
                    @include('includes.cms_partials.about-author')
                @endif

                @if($post->get_first_row_of_visibility('tool_comments') === 1)
                    @include('includes.cms_partials.article-comments')
                @endif

                @if ($post->get_first_row_of_visibility('tool_related_posts') === 1)
                    @include('includes.cms_partials.related-article')
                @endif

             </div>

          </div>
       </div>
       <livewire:landing-page.right-sidebar />
    </div>
 </div>

@section('scripts')
@parent
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5fbb79b6dfa2be74"></script>

@endsection

@endsection
