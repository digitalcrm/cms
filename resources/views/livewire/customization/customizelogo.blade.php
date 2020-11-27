<div>
    <!-- Admin Logo -->
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
                <button type="button" class="close" wire:click="$set('removeFlashMessage', null)">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    {{-- This session message will check if there is any Exception or value is missing then no result will fetched --}}
    @if(session()->has('modelExceptionError'))
        <div class="card">
            <div class="card-body">
                <h5 class="font-weight-bold text-danger font-weight-bold card-title">{{ session('modelExceptionError') }}</h5>
            </div>
        </div>
    @else
    <div class="card">
        <div class="card-header text-primary font-weight-bold text-primary font-weight-bold">
            Admin Logo
        </div>
        <form wire:submit.prevent="adminLogoDataSave" enctype="multipart/form-data" id="form-upload">
            <div class="card-body">

                <div class="form-group">
                    <label for="logotext">Logo Text</label>
                    <input
                        type="text"
                        name="admin_alt_text"
                        wire:model.defer="admin_alt_text"
                        class="form-control"
                        id="logotext" aria-describedby="logotext"
                    >
                    @error('admin_alt_text')<span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="uploadadminlogo">Select Logo</label>
                            <input
                                type="file"
                                name="uploadadminlogo"
                                wire:model="uploadadminlogo"
                                class="form-control-file"
                                id="upload{{ $iteration }}">
                            <small id="logo_path" class="form-text text-muted">JPEG, PNG only</small>
                            @error('uploadadminlogo') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="col">
                    {{-- Preview Image show and upload image --}}
                        <div class="form-group float-right">
                        @if ($uploadadminlogo)
                                <img src="{{ $uploadadminlogo->temporaryUrl() }}" width="35%" height="35%">
                        @else
                                <img class="rounded img-fluid img-thumbnail" src="{{ $this->admin_logo_path }}" width="35%" height="35%">
                        @endif
                        </div>
                    </div>


                </div>
            </div>

            <div class="card-footer border-top white-bg text-right">
                {{-- Button Save Conditions --}}
                <label wire:loading wire:target="adminLogoDataSave">File uploading...</label>
                @if (!$save && $uploadadminlogo)
                <button wire:loading.attr="disabled" wire:target="adminLogoDataSave"
                        type="submit" class="btn btn-primary" @error('uploadadminlogo') disabled @enderror>
                    Save
                </button>
                @endif
            </div>
        </form>
    </div>
    <!-- End -->

    <!-- Front Logo -->
    <form wire:submit.prevent="homePageLogoDataSave">
        <div class="card">
            <div class="card-header text-primary font-weight-bold">
                Front Logo
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="homepage_logo_text">Logo Text</label>
                    <input wire:model.defer="homepage_alt_text" type="text" class="form-control" id="homepage_logo_text"
                        aria-describedby="homepage_logo_text" name="alt_text">
                    @error('homepage_alt_text')<span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="homepage_logo_path">Select Logo</label>
                            <input type="file" wire:model="uploadhomepagelogo" class="form-control-file" id="upload2{{ $iteration2 }}" name="logo_path">
                            <small id="homepage_logo_path" class="form-text text-muted">JPEG, PNG only</small>
                            @error('uploadhomepagelogo') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    {{-- Preview Image show and upload image --}}
                    <div class="col">
                        <div class="form-group float-right">
                            @if ($uploadhomepagelogo)
                                <img src="{{ $uploadhomepagelogo->temporaryUrl() }}" width="35%" height="35%">
                            @else
                                <img class="rounded img-fluid img-thumbnail" src="{{ $this->homepage_logo_path }}" width="35%" height="35%">
                            @endif
                        </div>
                    </div>

                </div>
            </div>

            {{-- Button Conditions --}}
            <div class="card-footer border-top white-bg text-right">
                <label wire:loading wire:target="homePageLogoDataSave">saved...</label>
                @if (!$save2 && $uploadhomepagelogo)
                <button wire:loading.attr="disabled" wire:target="homePageLogoDataSave"
                        type="submit" class="btn btn-primary" @error('uploadhomepagelogo') disabled @enderror>
                    Save
                </button>
                @endif
            </div>
        </div>
    </form>
    <!-- End -->

    <!-- Fav Icon -->
    <form wire:submit.prevent="favicon">
        <div class="card">
            <div class="card-header text-primary font-weight-bold">
                Favicon
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="favicon">Select Logo</label>
                            <input wire:model="uploadfavicon"
                                type="file" class="form-control-file" id="upload3{{ $iteration3 }}"
                                name="logo_path">
                            <small id="favicon" class="form-text text-muted">JPEG, PNG only</small>
                            @error('uploadfavicon') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    {{-- Preview Image show and upload image --}}
                    <div class="col">
                        <div class="form-group float-right">
                        @if ($uploadfavicon)
                            <img src="{{ $uploadfavicon->temporaryUrl() }}" width="35%" height="35%">
                        @else
                            <img class="rounded img-fluid img-thumbnail" src="{{ $this->favicon_path }}" width="35%" height="35%">
                        @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Button Condtions --}}
            <div class="card-footer border-top white-bg text-right">
                <label wire:loading wire:target="favicon">saved...</label>
                @if (!$save3 && $uploadfavicon)
                <button wire:loading.attr="disabled" wire:target="favicon"
                        type="submit" class="btn btn-primary" @error('uploadfavicon') disabled @enderror>
                    Save
                </button>
                @endif
            </div>
        </div>
    </form>
    <!-- End -->
    @endif

</div>
