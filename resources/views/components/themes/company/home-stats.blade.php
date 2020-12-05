<div class="container-fluid bg-dark-two statistics text-center stats-custom">
    <div class="container">
        <div class="row text-white">
            @foreach($stats as $stat)
                <div class="col-md-3">
                    <h4>{{ $stat->main_text }}</h4>
                    <p>{{ $stat->sub_text }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
