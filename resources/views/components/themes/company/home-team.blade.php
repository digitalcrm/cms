<div class="container-fluid bg-dark3 our-team mt-5 team-custom">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="mb-4">{{ $heading_with_type_team->main_title ?? '' }}</h2>
                <p class="mb-5">{{ $heading_with_type_team->sub_title ?? '' }}</p>
            </div>
            @foreach($team_data as $team)
                <div class="col-md-3">
                    <img src="{{ $team->imageUrl() }}" class="img-fluid" alt="...">
                    <div class="card-body">
                        <h6>{{ $team->name }}</h6>
                        <p>{{ $team->job_title }}</p>
                        {!! $team->socialFacebook() !!}
                        {!! $team->socialLinkedIn() !!}
                        {!! $team->socialInsta() !!}
                        {!! $team->socialTwitter() !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
