<div>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
            <button type="button" class="close" wire:click="$set('removeFlashMessage', null)">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="save" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12" x-data="{ isUploading: false, progress: 0 }"
                        x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Multiple File</label>
                            <input wire:model="photos" type="file" class="form-control-file" id="file-{{ $iteration }}"
                                multiple>
                            @error('photos.*')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Progress Bar -->
                        <div x-show="isUploading">
                            <progress max="100" x-bind:value="progress"></progress>
                        </div>
                        <button wire:loading.attr="disabled" type="submit" class="btn btn-primary float-right"
                            {{ ($photos) ? '' : 'disabled' }}>Upload</button>
                    </div>
                    @if($photos)
                        @foreach($photos as $key => $photo)
                            <div class="col-md-4 mb-4">
                                <figure>
                                    <img src="{{ $photo->temporaryUrl() }}" style="width: 10rem;
                                    height: 6rem;
                                    border-radius: 5px;">
                                </figure>
                            </div>
                        @endforeach
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
