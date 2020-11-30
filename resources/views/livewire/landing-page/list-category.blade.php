<div>
    <div class="container">
        <!-- Categories Section -->
        <div class="row text-center mt-2">
            <div class="col-lg-12 mb-3 mt-5">
                <h1>
                    Articles by Categories
                </h1>
                <p class="text-muted for-mobile">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>

            @forelse($article_by_category as $cat)
            <div class="col-md-4 mb-4">
                <a href="{{ route('latest.latestpost',['category' => $cat->name]) }}">{{ $cat->category_name_with_total_posts() }}</a>
            </div>
            @empty

            <div class="col-md-12">
                <h1>No Category Avaiable</h1>
            </div>

            @endforelse

            @if(count($article_by_category) == $this->catLimit)
            <div class="col-lg-12">
                <a wire:click="load" class="btn btn-outline-secondary">All Categories</a>
            </div>
            @endif

        </div>
    </div>
</div>
