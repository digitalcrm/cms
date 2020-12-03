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
            <div class="card-header text-primary font-weight-bold">Clients</div>
            <div class="card-body">
                @if($wants_to_update)
                <form wire:submit.prevent="updateLogo({{ $rowId }})">
                @else
                <form wire:submit.prevent="store">
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input wire:model="logo" type="file" class="form-control-file" id="logo{{ $iteration }}">
                                    <small id="emailHelp" class="form-text text-muted">JPEG, PNG
                                        only</small>
                                    @error('logo')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            @if($previous_image)
                            <div class="col">
                                <img src="{{ asset('storage/'.$this->previous_image) }}" width="75%" height="75%">
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12">
                        @if($logo)
                        <div class="text-right">
                            <button type="submit" wire:target="store updateLogo{{ $rowId}}"
                                class="btn btn-primary">{{ ($wants_to_update) ? 'Update' : 'Upload' }}</button>
                        </div>
                        @endif
                    </div>
                </div>
                </form>
                <div class="row mt-2">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Logo</th>
                                <th>Status</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($this->client_logo_all_data as $data)
                                <tr>
                                    <td>
                                        <img src="{{ $data->imageUrl() }}" alt="client-logo{{ $data->id }}" width="35%" height="35%">
                                    </td>
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
                                    <td colspan="5" align="center">No data found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>

</div>
