<<div class="container">
    <div class="row featured-post-heading">
        <div class="col-md-12 text-center">
            <h2 class="mb-4">{{ $first_row_services->heading }}</h2>
            <p class="mb-5">{{ $first_row_services->paragraph }}</p>
        </div>
    </div>
    <div class="row text-center">
        @foreach($all_services_except_first as $loop_services)
        <div class="col-md-4">
            <div class="featured-post">
                {!! $loop_services->favicon !!}
                <h5 class="c-title">{{ $loop_services->heading }}</h5>
                <p class="blog-desc">{{ $loop_services->paragraph }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
