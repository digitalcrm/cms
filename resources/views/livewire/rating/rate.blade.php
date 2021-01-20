<div>
    <span>
        Average Rating: {{ $post->averageRating() }}/5 (votes: {{ $post->ratesCount() }} )
    </span>
    @if($post->ratingFor(auth()->user()))
        <div>
            @foreach(range(1,5) as $i)
                @if($loop->iteration <= $post->ratingFor(auth()->user()))
                    <i class="fas fa-star fa-2x text-warning"></i>
                @else
                    <i class="far fa-star fa-2x text-warning"></i>
                @endif
            @endforeach
            <p>You Rated: {{ $post->ratingFor(auth()->user()) }}/5</p>
        </div>
    @else
        <div>
            <a wire:click.prevent="rate(1)" href="#">
                <i class="far fa-star fa-2x text-warning"></i>
            </a>
            <a wire:click.prevent="rate(2)" href="#">
                <i class="far fa-star fa-2x text-warning"></i>
            </a>
            <a wire:click.prevent="rate(3)" href="#">
                <i class="far fa-star fa-2x text-warning"></i>
            </a>
            <a wire:click.prevent="rate(4)" href="#">
                <i class="far fa-star fa-2x text-warning"></i>
            </a>
            <a wire:click.prevent="rate(5)" href="#">
                <i class="far fa-star fa-2x text-warning"></i>
            </a>
        </div>
    @endif
</div>
