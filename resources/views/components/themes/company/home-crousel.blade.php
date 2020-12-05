<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    {{-- <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol> --}}
    <div class="carousel-inner">
        @forelse($sliders as $crousel)
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <img src="{{ $crousel->imageUrl() }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>{{ $crousel->heading }}</h5>
                <p>{{ $crousel->paragraph }}</p>
                <a href="{{ $crousel->url1 }}" type="button" class="btn btn-primary primary-custom btn-lg float-left px-4 mr-3">{{ $crousel->button_text1 }}</a>
                <a href="{{ $crousel->url2 }}" type="button" class="btn btn-outline-secondary secondary-custom btn-lg px-4 float-left">{{ $crousel->button_text2 }}</a>
            </div>
        </div>
        @empty
        <div class="carousel-item">
            <img src="{{ asset('img/slider1.png') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>No Crousel In Database</h5>
            </div>
        </div>
        @endforelse
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
