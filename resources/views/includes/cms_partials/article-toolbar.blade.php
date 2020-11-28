    <ul class="list-group list-group-horizontal small mb-3">

        @if($post->get_first_row_of_visibility('tool_posted_date') === 1)
            <li class="list-group-item">{{ $post->created_at->toFormattedDateString() }}</li>
        @endif

        @if($post->get_first_row_of_visibility('tool_category') === 1)
            <li class="list-group-item"><a
                    href="{{ route('latest.latestpost',['category' => $post->category->name]) }}">{{ $post->category->name }}</a>
            </li>
        @endif

        @if($post->get_first_row_of_visibility('tool_user') === 1)
            <li class="list-group-item">
                <a
                    href="{{ route('latest.latestpost',['author' => $post->user->name]) }}">
                    By: {{ $post->user->name }}
                </a>
            </li>
        @endif

        @if($post->get_first_row_of_visibility('tool_saved') === 1)
            @if(Auth::check())
                @if($post->favorited())
                    <li class="list-group-item"><a
                            href="{{ route('unsaved.post',['posts'=>$post->id]) }}">Unsaved</a>
                    </li>
                @else
                    <li class="list-group-item"><a
                            href="{{ route('save.post',['posts'=>$post->id]) }}">Save</a>
                    </li>
                @endif
            @endif
        @endif

        @if($post->get_first_row_of_visibility('tool_views') === 1)
            <li class="list-group-item">{{ $post->postcount }} Views</li>
        @endif

        @if($post->get_first_row_of_visibility('tool_share') === 1)
            <li class="list-group-item"><a type="button" data-toggle="modal" data-target="#sendposttofriend">
                    {{ __('Send to Friend') }}</a></li>
            @include('pages.share-post-with-email-sent')
        @endif

        @if($post->get_first_row_of_visibility('tool_print') === 1)
            <li class="list-group-item"><a
                    href="{{ route('article.print_article', $post->slug) }}" target="__blank">
                    {{ __('Print') }}</a></li>
        @endif

    </ul>


