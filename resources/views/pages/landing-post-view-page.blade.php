@extends('layouts.app')

@section('title', $post->title .' : '. $post->category->name )

@section('content')
<div class="container">
    <div class="row featured-post-heading">
       <div class="col-md-12 mt-5 mb-3">
          <h2 class="mb-4">{{ $post->title }}</h2>
       </div>
    </div>
    <div class="row">
       <div class="col-md-9 pl-0 pr-5">
          <div class="col-md-12">
             <img src="{{ optional($post->featured_image)->getFullUrl() ?? $post->default_image }}" class="img-fluid rounded mb-3" alt="{{ $post->slug }}">
             <p>
                {!! $post->body !!}
             </p>

            {{-- Tag div --}}
            @if($post->count_post_having_total_tags() > 0)
            <hr>
             <div>
                <p>
                    <span class="font-weight-bold">Tags:</span> @foreach($post->tags as $tag)
                    <a href="{{ route('latest.latestpost',['tags' => $tag->tag_name]) }}">{{ $tag->name }}{{ ($loop->last) ? '' : ', ' }}</a>
                    @endforeach
                </p>
             </div>
            @endif

            {{-- Toolbar --}}
            <ul class="list-group list-group-horizontal small mb-3">
                <li class="list-group-item">{{ $post->created_at->toFormattedDateString() }}</li>
                <li class="list-group-item"><a href="{{ route('latest.latestpost',['category' => $post->category->name]) }}">{{ $post->category->name }}</a></li>
                <li class="list-group-item"><a href="{{ route('latest.latestpost',['author' => $post->user->name]) }}">
                    By: {{ $post->user->name }}
                </a>
                </li>
                <li class="list-group-item">{{ $post->postcount }} Views</li>
                <li class="list-group-item"><a type="button" data-toggle="modal" data-target="#sendposttofriend"> {{  __('Send to Friend')}}</a></li>
                <li class="list-group-item"><a href="{{ route('article.print_article', $post->slug) }}" target="__blank"> {{  __('Print')}}</a></li>
            </ul>

            @include('pages.share-post-with-email-sent')

            <div class="comments-section mt-5">
                <div class="mb-3">About the Author: {{ $post->user->name }}</div>
                <div class="media small">
                    <a href="{{ route('latest.latestpost',['author' => $post->user->name]) }}">
                        <img src="{{ $post->user->profile_photo_url }}" width="50" class="img-fluid mr-3" alt="{{ $post->user->full_name }}">
                    </a>
                    <div class="media-body">
                        {{ $post->user->description ?? 'Hi 👋! This is ' .$post->user->name }}
                    </div>
                </div>

                {{-- <div class="mb-3 mt-5">Leave A Comment</div>
                <form>
                   <div class="form-group">
                      <textarea class="form-control" placeholder="Comment..." id="exampleFormControlTextarea1" rows="6"></textarea>
                   </div>
                   <div class="form-group">
                      <div class="row">
                         <div class="col">
                            <input type="text" class="form-control" placeholder="Name (required)">
                         </div>
                         <div class="col">
                            <input type="text" class="form-control" placeholder="Email (required)">
                         </div>
                         <div class="col">
                            <input type="text" class="form-control" placeholder="Website">
                         </div>
                      </div>
                   </div>
                   <div class="form-group">
                      <button type="submit" class="btn btn-primary px-3">POST COMMENT</button>
                   </div>
                </form> --}}

                    <div class="mb-3 mt-5">Related Article</div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                @forelse($related_posts as $related)
                                <ul class="list-unstyled">
                                    <li class="media">
                                        <img src="{{ optional($post->featured_image)->getFullUrl() ?? $post->default_fake_image($related->slug) }}" class="mr-3 related-img" alt="{{ $related->slug }}">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1"><a href="#">{{ $related->title }}</a></h5><small>{{ $related->category->name }}</small>
                                                <p>
                                                    {!! $post->summary_of_body !!}
                                                </p>
                                            </div>
                                    </li>
                                    <hr>
                                </ul>
                                @empty

                                @endforelse
                            </div>
                        </div>
                    </div>
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
