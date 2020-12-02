<div>
    <div>
        @if (session()->has('tab'))
            <div class="alert alert-success">
                {{ session('tab') }}
                <button type="button" class="close" wire:click="$set('removeFlashMessage', null)">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    <div class="accordion" id="accordionExample">
    @forelse($table_data as $rowValue)
        <div class="card">
            <div class="card-header text-primary font-weight-bold" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $rowValue->id }}"
                        aria-expanded="true" aria-controls="collapse{{ $rowValue->id }}">
                        Slide #{{ $loop->index + 1 }}
                    </button>
                </h2>
            </div>

            <div id="collapse{{ $rowValue->id }}" class="collapse {{$loop->first ? '' : '' }}" aria-labelledby="headingOne" data-parent="#accordionExample">
                {{-- <form wire:submit.prevent="updateSlider({{ $rowValue->id }})"> --}}
                <form action="{{ route('slider.update',$rowValue->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    {{-- Do not delete this commented card. In future I will fix this code for livewire --}}
                    {{-- <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="image">Select Image</label>
                                    <input wire:model="image" type="file" class="form-control-file" id="image-{{ $iteration }}-{{ $rowValue->id }}">
                                    <small class="form-text text-muted">JPEG, PNG
                                        only</small>
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
                            <label for="heading">Heading</label>
                            <input wire:model="heading" type="text" class="form-control" id="heading">
                            @error('heading')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="paragraph">Paragraph</label>
                            <textarea wire:model="paragraph" class="form-control" id="paragraph" rows="3"></textarea>
                            @error('paragraph')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="button_text1">Button Text
                                        1</label>
                                    <input wire:model="button_text1" type="text" class="form-control" id="button_text1">
                                    @error('button_text1')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="button_text2">Button Text
                                        2</label>
                                    <input wire:model="button_text2" type="text" class="form-control" id="button_text2">
                                    @error('button_text2')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="url1">Button Url1</label>
                                    <input wire:model="url1" type="text" class="form-control" id="url1" >
                                    @error('url1')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="url2">Button Url2</label>
                                    <input wire:model="url2" type="text" class="form-control" id="url2" >
                                    @error('url2')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="image">Select Image</label>
                                    <input type="file" name="image" class="form-control-file" id="image{{ $rowValue->id }}">
                                    <small class="form-text text-muted">JPEG, PNG
                                        only</small>
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group float-right">
                                    @if ($rowValue->image)
                                        <img class="rounded img-fluid img-thumbnail" src="{{ $rowValue->imageUrl() }}" width="35%" height="35%">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="heading">Heading</label>
                            <input type="text" name="heading" class="form-control" id="heading" value="{{ $rowValue->heading }}" required>
                            @error('heading')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="paragraph">Paragraph</label>
                            <textarea class="form-control" name="paragraph" id="paragraph" rows="3" required>{{ $rowValue->paragraph }}</textarea>
                            @error('paragraph')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="button_text1">Button Text
                                        1</label>
                                    <input type="text" name="button_text1" class="form-control" id="button_text1" value="{{ $rowValue->button_text1 }}" required>
                                    @error('button_text1')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="button_text2">Button Text
                                        2</label>
                                    <input type="text" name="button_text2" class="form-control" id="button_text2" value="{{ $rowValue->button_text2 }}" required>
                                    @error('button_text2')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="url1">Button Url1</label>
                                    <input type="text" name="url1" class="form-control" id="url1" value="{{ $rowValue->url1 }}" required>
                                    @error('url1')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="url2">Button Url2</label>
                                    <input type="text" name="url2" class="form-control" id="url2" value="{{ $rowValue->url2 }}" required>
                                    @error('url2')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-top white-bg text-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
                <!-- End -->
            </div>
        </div>
    @empty
    <div class="card">
        <div class="card-body">
            <p class="card-text">No Data Found</p>
        </div>
    </div>
    @endforelse
    </div>

</div>
