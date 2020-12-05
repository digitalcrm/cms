<div class="container text-center mt-5">
    <div class="row testimonial">
        <div class="col-md-12 text-center">
            <h2 class="mb-4">{{ $heading_with_type_testimonial->main_title ?? '' }}</h2>
            <p class="mb-5">{{ $heading_with_type_testimonial->sub_title ?? '' }}</p>
        </div>
        @foreach($testimonial_data as $testimonial_row)
            <div class="col-md-4">
                <figure class="snip1192">
                    <blockquote>{{ $testimonial_row->quote }}</blockquote>
                    <div class="author">
                        <img src="{{ $testimonial_row->imageUrl() }}" alt="testi-{{ $testimonial_row->id }}" />
                        <h5>{{ $testimonial_row->name }}</h5>
                    </div>
                </figure>
            </div>
        @endforeach
    </div>
</div>
