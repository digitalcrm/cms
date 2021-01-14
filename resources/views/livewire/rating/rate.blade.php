<div>
    <span>
        Total Ratings: {{ $post->totalRatingCount() }}
        {{-- @ray($post->averageRating()) --}}
    </span>
    <form wire:submit.prevent="rateSubmit" method="post">
        <div wire:ignore>
            <input 
                id="rate-1" 
                name="rate-1" 
                class="kv-ltr-theme-fas-star rating-loading"
                value="0"
                data-min="0" data-max="5" 
                data-step="1">
        </div>
        <select wire:model="rate" name="rate">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <button type="submit" class="btn btn-sm btn-primary ml-2">Submit</button>
        @error('rate')
            <span class="d-block text-danger">{{ $message }}</span>
        @enderror
    </form>
</div>
