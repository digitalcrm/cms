<div>
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
    @if($exception_message)
    
    <div class="alert alert-danger">
        {{ $this->exception_message }}
        <button type="button" class="close" wire:click="$set('removeFlashMessage', null)">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    @else

    <form wire:submit.prevent="upload">
        <div class="card">
            <div class="card-header text-primary font-weight-bold">
                Background Image
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="background_image">Select Image</label>
                            <input wire:model="background_image" 
                                type="file" 
                                class="form-control-file" id="upload{{ $iteration }}">
                            <small id="emailHelp" class="form-text text-muted">JPEG, PNG only</small>
                            <h3 wire:loading wire:target="background_image" >File uploading...</h3>
                            @error('background_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group float-right">
                            @if ($background_image)
                                <img src="{{ $background_image->temporaryUrl() }}" width="35%" height="35%">
                            @else
                                <img class="rounded img-fluid img-thumbnail" src="{{ $this->background_image_full_url }}" width="35%" height="35%">
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer border-top white-bg text-right">
                @if (!$save && $background_image)
                <button wire:loading.attr="disabled" wire:target="upload"
                        type="submit" class="btn btn-primary" @error('background_image') disabled @enderror>
                    Save
                </button>
                @endif
            </div>
        </div>
    </form>

    @endif
</div>
