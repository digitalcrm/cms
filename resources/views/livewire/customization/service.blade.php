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
    @if($not_found)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><span class="text-danger">{{ $not_found }}</span> Insert Some default Row first
                </h5>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-header text-primary font-weight-bold">
                Services
            </div>
            <div class="card-body">
                <form wire:submit.prevent="firstRowSave">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first_row">Heading</label>
                                <input wire:model="first_row_heading" type="text" class="form-control" id="first_row"
                                    aria-describedby="emailHelp">
                                @error('first_row_heading')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Paragraph</label>
                                <textarea wire:model="first_row_paragraph" class="form-control"
                                    id="exampleFormControlTextarea1" rows="3"></textarea>
                                @error('first_row_paragraph')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary float-right">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
                <!-- Block #1 -->
                <form wire:submit.prevent="secondRowSave">
                    <div class="row">
                        <div class="col-md-12"><span class="badge badge-info">Block #1</span></div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Icon</label>
                                <input wire:model="second_row_favicon" type="text" class="form-control" id="" aria-describedby="emailHelp">
                                @error('second_row_favicon')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input wire:model="second_row_heading" type="text" class="form-control" id="" aria-describedby="emailHelp">
                                @error('second_row_heading')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Paragraph</label>
                                <textarea wire:model="second_row_paragraph" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                @error('second_row_paragraph')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary float-right">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
                <!-- Block #2 -->
                <form wire:submit.prevent="thirdRowSave">
                    <div class="row">
                        <div class="col-md-12"><span class="badge badge-info">Block #2</span></div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Icon</label>
                                <input wire:model="third_row_favicon" type="text" class="form-control" id="" aria-describedby="emailHelp">
                                @error('third_row_favicon')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input wire:model="third_row_heading" type="text" class="form-control" id="" aria-describedby="emailHelp">
                                @error('third_row_heading')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Paragraph</label>
                                <textarea wire:model="third_row_paragraph" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                @error('third_row_paragraph')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary float-right">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
                <!-- Block #3 -->
                <form wire:submit.prevent="fourthRowSave">
                    <div class="row">
                        <div class="col-md-12"><span class="badge badge-info">Block #3</span></div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Icon</label>
                                <input wire:model="fourth_row_favicon" type="text" class="form-control" id="" aria-describedby="emailHelp">
                                @error('fourth_row_favicon')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input wire:model="fourth_row_heading" type="text" class="form-control" id="" aria-describedby="emailHelp">
                                @error('fourth_row_heading')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Paragraph</label>
                                <textarea wire:model="fourth_row_paragraph" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                @error('fourth_row_paragraph')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary float-right">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
