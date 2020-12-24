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
                    <div class="tab-content" id="pills-tabContent">
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
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                            <input type="file" name="mediaupload" id="mediaupload">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
