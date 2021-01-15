@extends('layouts.app')

@section('title', meta_title($post->title))
@section('url', meta_url() )
@section('description', meta_description($post->body) )

@push('styles')
<link href="{{ asset('css/star/star-rating.css') }}" rel="stylesheet">
<link href="{{ asset('css/star/star-theme.css') }}" rel="stylesheet">
@endpush

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

                @if(($post->get_first_row_of_visibility('tool_comments') === 1) && ($post->commentActive === 1))
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

@push('scripts')
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5fbb79b6dfa2be74"></script>

{{-- <script src="{{ asset('js/star/star-rating.js') }}"></script> --}}
{{-- <script src="{{ asset('js/star/star-theme.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/js/star-rating.min.js" integrity="sha512-4kpSNboTxdWYwnZCaqnuwO3gGFaZTAhBT6ygWNdpeNrpGnw/rjweaxQ2C9OgwERR5RBWlIQ+Yh9lLce5+jNpVA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/themes/krajee-fas/theme.min.js" integrity="sha512-kEgX1va6Lb3BkbuOb9jrEqXCw7UmKVi054QvuxHIFtXzB5YJMua0M5yAy/QLxh0pV1/5cemoVcF9Ib7nubK7Cg==" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('.kv-ltr-theme-fas-star').rating({
            hoverOnClear: false,
            theme: 'krajee-fas',
            containerClass: 'is-star'
        });
        $("#rate").rating();
    });
</script>
@endpush

@endsection
