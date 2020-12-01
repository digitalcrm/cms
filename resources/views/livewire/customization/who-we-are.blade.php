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
    @if(!$save)
        <form wire:submit.prevent="store">
    @else
        <form wire:submit.prevent="update">
    @endif
        <div class="card">
            <div class="card-header text-primary font-weight-bold">Who We Are</div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="image">Select Image</label>
                            <input wire:model="image" type="file" name="image" class="form-control-file" id="upload{{ $iteration }}">
                            <small id="image" class="form-text text-muted">JPEG, PNG only</small>
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group float-right">
                            @if ($image)
                                <img src="{{ $image->temporaryUrl() }}" width="35%" height="35%">
                            @else
                                <img class="rounded img-fluid img-thumbnail" src="{{ $this->image_full_path_url }}" width="35%" height="35%">
                            @endif
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="title">Main Title</label>
                    <input wire:model="title" type="text" class="form-control" id="title"
                        aria-describedby="title">
                    @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="sub_title">Sub Title</label>
                    <input wire:model="sub_title" type="text" class="form-control" id="sub_title"
                        aria-describedby="sub_title">
                    @error('sub_title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Paragraph</label>
                    <textarea wire:model="description" class="form-control" id="description"
                        rows="3"></textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="button_text1">Button Text 1</label>
                            <input wire:model="button_text1" type="text" class="form-control" id="button_text1"
                                aria-describedby="button_text1">
                            @error('button_text1')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="button_text2">Button Text 2</label>
                            <input wire:model="button_text2" type="text" class="form-control" id="button_text2"
                                aria-describedby="button_text2">
                            @error('button_text2')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="url1">Button URl 1</label>
                            <input wire:model="url1" type="text" class="form-control" id="url1"
                                aria-describedby="url1">
                            @error('url1')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="url2">Button URl 2</label>
                            <input wire:model="url2" type="text" class="form-control" id="url2"
                                aria-describedby="url2">
                            @error('url2')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">{{ (!$save) ? 'Store' : 'Save' }}</button>
            </div>
        </div>
    </form>
</div>
