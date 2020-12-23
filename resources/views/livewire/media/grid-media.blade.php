<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        Media
                        <button class="btn btn-sm btn-primary" type="button" data-toggle="collapse"
                            data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Add New
                        </button>
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="collapse" id="collapseExample">
                        <livewire:media.gallary-upload />
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <div class="input-group">
                                    <input wire:model="searchInput" type="search" name="searchInput"
                                        placeholder="Search for..." class="form-control form-control-sm float-right"
                                        id="searchInput">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @forelse($gallaries as $media)
                                    <div class="col-sm-2">
                                        <figure>
                                            <a wire:click="click_modal({{ $media->id }})" href="#" data-toggle="modal" data-target="#mediamodal">
                                                <img src="{{ $media->imageUrl() }}" class="img-fluid mb-2" alt="" />
                                            </a>
                                            <figcaption>
                                                <small class="text-muted">
                                                    {{ $media->file_name }}
                                                </small>
                                            </figcaption>
                                        </figure>
                                    </div>
                                @empty
                                    <h3>No Media Found</h3>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="mediamodal" tabindex="-1" aria-labelledby="mediamodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediamodalLabel">Attachment Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row">
                    <div class="col-7">
                        {{-- <img src="{}" alt="" srcset=""> --}}
                    </div>
                    <div class="col-5">
                        <div>
                            <strong>File name: </strong> {{ $this->file_name }}                            
                        </div>
                        <div>
                            <strong>File type: </strong> {{ $this->mime_type }}
                                                       
                        </div>
                        <div>
                            <strong>Uploaded on: </strong> {{ $this->created_at }}
                                                     
                        </div>
                        <div>
                            <strong>File size: </strong> {{ $this->size }}
                        </div>
                        <div>
                            <strong>Dimension: </strong> {{ $this->dimension }}                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</div>
