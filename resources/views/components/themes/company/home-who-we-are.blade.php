<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ $who_we_are_first_row->imageUrl() }}" class="img-fluid rounded" alt="...">
        </div>
        <div class="col-md-6">
            <h2 class="mb-4">{{ $who_we_are_first_row->title }}</h2>
            <h3 class="mb-4">{{ $who_we_are_first_row->sub_title }}</h3>
            <p>{{ $who_we_are_first_row->description }}</p>
            <a href="{{ $who_we_are_first_row->url1 }}" class="btn btn-primary primary-custom btn-lg float-left px-4 mt-4 mr-3">
                {{ $who_we_are_first_row->button_text1 }}</a>
            <a href="{{ $who_we_are_first_row->url2 }}" class="btn btn-outline-secondary secondary-custom btn-lg px-4 float-left mt-4">
                {{ $who_we_are_first_row->button_text2 }}</a>
        </div>
    </div>
</div>
