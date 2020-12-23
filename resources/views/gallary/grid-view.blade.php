<div class="row">
    @forelse($gallaries as $media)
        <div class="col-sm-2">
            <figure>
                <a wire:click="click_modal({{ $media->id }})" href="#" data-toggle="modal"
                    data-target="#mediamodal">
                    <img src="{{ $media->imageUrl() }}" class="img-fluid mb-2" alt="" />
                </a>
            </figure>
        </div>
    @empty
        <h3>No Media Found</h3>
    @endforelse
</div>