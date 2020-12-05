<div class="container-fluid bg-dark3 text-center mt-5 client-custom">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="mb-4">{{ $heading_with_type_client->main_title ?? '' }}</h2>
                <p class="mb-5">{{ $heading_with_type_client->sub_title ?? '' }}</p>
            </div>
            @foreach($client_data as $logo)
            <div class="col-md-2">
                <img src="{{ $logo->imageUrl() }}" class="img-fluid thumbnail card"
                    alt="client-logo-{{ $logo->id }}">
            </div>
            @endforeach
        </div>
    </div>
</div>
