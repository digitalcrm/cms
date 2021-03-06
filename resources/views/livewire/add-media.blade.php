<div>
    <div wire:ignore.self class="modal fade" id="addmediamodal" tabindex="-1" aria-labelledby="addmediamodalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                role="tab" aria-controls="pills-home" aria-selected="true">
                                Media
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">
                                Upload
                            </a>
                        </li>
                    </ul>
                    <button wire:click="resetall" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong></strong>
                        </div>
                    @endif

                    <script>
                        $(".alert").alert();

                    </script>
                    <div class="tab-content" id="pills-tabContent">

                        {{-- Media Tab --}}
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="row">
                                        @forelse($gallaries as $media)
                                            <div class="col-sm-2">
                                                <figure>
                                                    <a wire:click="clickImage({{ $media->id }})" href="#"
                                                        data-toggle="modal" data-target="#mediamodal">
                                                        <img src="{{ $media->imageUrl() }}" class="img-fluid mb-2"
                                                            alt="" />
                                                    </a>
                                                </figure>
                                            </div>
                                        @empty
                                            <div class="col-12">
                                                <p>No Media Found</p>
                                            </div>
                                        @endforelse
                                        <div class="col-12 text-center">
                                            <button wire:click="$emit('mediaLoad')"
                                                class="btn btn-sm btn-outline-primary" type="button">
                                                <span wire:loading class="spinner-border spinner-border-sm"
                                                    role="status" aria-hidden="true"></span>
                                                Load More
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 pl-5">
                                    @if($this->isClicked)
                                        <img src="{{ $this->image }}" alt="{{ $this->fileName }}"
                                            class="img-fluid float-left" style="
                                                    position: relative;
                                                    max-width: 120px;
                                                    max-height: 120px;
                                                    margin-top: 5px;
                                                    margin-right: 10px;
                                                    margin-bottom: 5px;">
                                        <div class="details" style="float: left; font-size: 12px; max-width: 100%;">
                                            <div><label>Name:</label> {{ $this->fileName }}</div>
                                            <div><label>Size:</label> {{ $this->size }}</div>
                                            <div><label>Uploaded On:</label> {{ $this->created_at }}</div>
                                            <div><label>MIME TYPE:</label> {{ $this->mime_type }}</div>
                                            <div><label>Dimension:</label> {{ $this->dimension }}</div>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <button type="button" onclick="copyClipboardUrl()"
                                                        class="input-group-text" data-dismiss="modal" role="button"><i
                                                            class="fas fa-copy"></i></button>
                                                </div>
                                                <input type="text" class="form-control" id="copyLink"
                                                    value="{{ $this->image }}" readonly>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- Upload Tab --}}
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab" x-data="{ isUploading: false, progress: 0 }"
                            x-on:livewire-upload-start="isUploading = true"
                            x-on:livewire-upload-finish="isUploading = false"
                            x-on:livewire-upload-error="isUploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress">
                            <form wire:submit.prevent="save" enctype="multipart/form-data">
                                <input wire:model="photos" type="file" name="mediaupload"
                                    id="mediaupload{{ $iteration }}" multiple>
                                @error('photos.*')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <!-- Progress Bar -->
                                <div x-show="isUploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                                <button wire:loading.attr="disabled" type="submit"
                                    class="btn btn-sm btn-outline-primary"
                                    {{ ($photos) ? '' : 'disabled' }}>Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
