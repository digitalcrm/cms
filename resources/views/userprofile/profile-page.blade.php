@extends('layouts.master')

@section('style')
    @parent
    <style>
        .required {
            border-left: 2px solid #c3030a;
        }

    </style>
@endsection

@section('content')

    <div class="container">

        <h1 class="h3 mb-3">Profile Information</h1>

        <div class="row">

            <div class="col-md-5 col-xl-4">

                <x-userprofile.profile-info :profileinfo="$profileinfo" />

            </div> <!-- end col-md-5 col-xl-4 -->

            <div class="col-md-7 col-xl-8">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="account" role="tabpanel">

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Public info</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('auth_profile.update', auth()->user()->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="inputUsername">Username</label>
                                                <input type="text" class="form-control @error('name') required @enderror"
                                                    id="inputUsername" name="name" value="{{ $profileinfo->name }}"
                                                    placeholder="Username">
                                                @error('name')
                                                <small class="alert text-danger">
                                                    {{ $message }}
                                                </small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail4">Email</label>
                                                <input type="email" class="form-control @error('email') required @enderror"
                                                    id="inputEmail4" name="email" value="{{ $profileinfo->email }}"
                                                    placeholder="Email" readonly>
                                                @error('email')
                                                <small class="alert text-danger">
                                                    {{ $message }}
                                                </small>
                                                @enderror
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputFirstName">First name</label>
                                                    <input type="text"
                                                        class="form-control required @error('firstname') required @enderror"
                                                        id="inputFirstName" name="firstname"
                                                        value="{{ old('firstname', optional($profileinfo)->firstname) }}"
                                                        placeholder="First name">
                                                    @error('firstname')
                                                    <small class="alert text-danger">
                                                        {{ $message }}
                                                    </small>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputLastName">Last name</label>
                                                    <input type="text"
                                                        class="form-control required @error('lastname') required @enderror"
                                                        id="inputLastName" name="lastname"
                                                        value="{{ old('lastname', optional($profileinfo)->lastname) }}"
                                                        placeholder="Last name">
                                                    @error('lastname')
                                                    <small class="alert text-danger">
                                                        {{ $message }}
                                                    </small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputAddress">Address</label>
                                                    <input type="text" class="form-control" id="inputAddress" name="address"
                                                        value="{{ old('address', optional($profileinfo)->address) }}"
                                                        placeholder="1234 Main St">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputMobile">Mobile</label>
                                                    <input type="tel" class="form-control" id="inputMobile"
                                                        name="mobile_number"
                                                        value="{{ old('mobile_number', optional($profileinfo)->mobile_number) }}"
                                                        placeholder="1234">
                                                    @error('mobile_number')
                                                    <small class="alert text-danger">
                                                        {{ $message }}
                                                    </small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputUsername">About you</label>
                                                <textarea rows="2" class="form-control" id="inputBio" name="description"
                                                    placeholder="Tell something about yourself">{{ old('description', optional($profileinfo)->description) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="text-center">
                                                <img alt="{{ $profileinfo->name }}"
                                                    src="{{ $profileinfo->profile_photo_url }}"
                                                    class="rounded-circle img-responsive mt-2" width="128" height="128">
                                                <div class="mt-2">
                                                    {{-- <span class="btn btn-primary">
                                                        <svg class="svg-inline--fa fa-upload fa-w-16" aria-hidden="true"
                                                            data-prefix="fas" data-icon="upload" role="img"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                            data-fa-i2svg="">
                                                            <path fill="currentColor"
                                                                d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z">
                                                            </path>
                                                        </svg>
                                                    </span> --}}
                                                    <input type="file" name="profile_photo_path" id="profile_photo_path">
                                                </div>
                                                <small>
                                                    For best results, use an image at least 128px by 128px in .jpg .png .bmp format
                                                </small>
                                            </div>
                                            @error('profile_photo_path')
                                            <small class="alert text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>

                            </div>
                        </div>

                        {{-- <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Private info</h5>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputFirstName">First name</label>
                                            <input type="text" class="form-control" id="inputFirstName"
                                                placeholder="First name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputLastName">Last name</label>
                                            <input type="text" class="form-control" id="inputLastName"
                                                placeholder="Last name">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Email</label>
                                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress">Address</label>
                                            <input type="text" class="form-control" id="inputAddress"
                                                placeholder="1234 Main St">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputMobile">Mobile</label>
                                            <input type="number" class="form-control" id="inputMobile" placeholder="1234">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">City</label>
                                            <input type="text" class="form-control" id="inputCity">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputState">State</label>
                                            <select id="inputState" class="form-control">
                                                <option selected="">Choose...</option>
                                                <option>...</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputZip">Zip</label>
                                            <input type="text" class="form-control" id="inputZip">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>

                            </div>
                        </div> --}}

                    </div>
                </div>
            </div> <!-- end col-md-7 col-xl-8 -->

        </div> <!-- end row -->

    </div> <!-- end container -->

@endsection
