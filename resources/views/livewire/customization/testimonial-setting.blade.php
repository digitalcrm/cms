<div>
    <div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
                <button type="button" class="close" wire:click="$set('removeFlashMessage', null)">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    <div class="card">
        @if(!$table_not_found)
            <div class="card-header text-primary font-weight-bold">Teams</div>
            <div class="card-body">
                @if($wants_to_update)
                    <form wire:submit.prevent="testimonial_update({{ $rowId }})">
                    @else
                        <form wire:submit.prevent="store">
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input wire:model="name" type="text" class="form-control" id="name"
                                        aria-describedby="emailHelp">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="quote">Quote</label>
                                    <textarea wire:model="quote" class="form-control" id="exampleFormControlTextarea1"
                                                rows="6"></textarea>
                                    @error('quote')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="profile_url">Logo</label>
                                    <input wire:model="profile_url" type="file" class="form-control-file"
                                        id="profile_url{{ $iteration }}">
                                    <small id="emailHelp" class="form-text text-muted">JPEG, PNG
                                        only</small>
                                    @error('profile_url')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            @if($previous_image)
                                <div class="col-6">
                                    <img src="{{ asset('storage/'.$this->previous_image) }}"
                                        width="75%" height="75%">
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="text-right">
                            <button wire:click="resetAll" type="submit" class="btn btn-outline-secondary">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                {{ ($wants_to_update) ? 'Update' : 'Save' }}
                            </button>
                        </div>
                    </div>
                </div>
                </form>
                <div class="row mt-2">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Quote</th>
                                <th>Status</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($this->testimonial_all_data as $data)
                                <tr>
                                    <td>
                                        <img src="{{ $data->imageUrl() }}"
                                            alt="testimonial-{{ $data->id }}" width="35px" height="35px">
                                    </td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->quote }}</td>
                                    <td>
                                        <a wire:click="status({{ $data->id }})" class="btn btn-link">
                                            {!! ($data->isActive === 1) ? '<i class="fas fa-toggle-on fa-2x"></i>' : '<i
                                                class="fas fa-toggle-off fa-2x"></i>' !!}
                                        </a>
                                    </td>
                                    <td>
                                        <button wire:click="edit({{ $data->id }})"
                                            class="btn btn-primary">Edit</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" align="center">No data found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>

</div>
