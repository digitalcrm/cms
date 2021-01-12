<div>
    @ray($post->liked())
    @ray($post->totalLikes())
    @if(Auth::check())
        @if($post->liked())
            <li class="list-group-item">{{ $post->totalLikes() }} <a
                    href="#" wire:click.prevent="dislikeStore">Dislike</a>
            </li>
        @else
            <li class="list-group-item">
               {{ $post->totalLikes() }} <a href="#" wire:click.prevent="likeStore">Like</a>
            </li>
        @endif
    @endif
</div>
