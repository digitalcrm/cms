<div>
    <div class="card-box text-center">
        <img src="{{ $profileinfo->profile_photo_url }}" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">

        <h4 class="text-muted">{{ $profileinfo->full_name }}</h4>

        {{-- <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow</button>
        <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Message</button> --}}

        <div class="text-left mt-3">

            @if($profileinfo->description)

            <h4 class="font-13 text-uppercase">{{ __('About Me :') }}</h4>

            <p class="text-muted font-13 mb-3">
                {{ $profileinfo->description ?? '' }}
            </p>
            @endif

            <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ml-2">{{ $profileinfo->full_name }}</span></p>

            <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ml-2">{{ $profileinfo->mobile_number ?? '' }}</span></p>

            <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 ">{{ $profileinfo->email }}</span></p>

            {{-- <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ml-2">USA</span></p> --}}
        </div>

        <ul class="social-list list-inline mt-3 mb-0">
            <li class="list-inline-item">
                <a href="javascript: void(0);" class="social-list-item border-purple text-purple"><i class="fab fa-facebook"></i></a>
            </li>
            <li class="list-inline-item">
                <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="fab fa-google"></i></a>
            </li>
            <li class="list-inline-item">
                <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="fab fa-twitter"></i></a>
            </li>
            <li class="list-inline-item">
                <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="fab fa-github"></i></a>
            </li>
        </ul>
    </div> <!-- end card-box -->
</div>
