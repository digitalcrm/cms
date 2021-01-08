<div>
    <div>
        @if(session()->has('social'))
            <div class="alert alert-success">
                {{ session('social') }}
                <button type="button" class="close" wire:click="$set('removeFlashMessage', null)">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    <div class="card">
        <div class="card-header text-primary font-weight-bold">Social Media</div>
        <div class="card-body">

        @if($updateMode)
            <form wire:submit.prevent="update({{ $rowId }})">
        @else
            <form wire:submit.prevent="store">
        @endif
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Logo">Social Logo</label>
                            <input wire:model="social_logo" type="text" class="form-control" id="logo"
                                aria-describedby="emailHelp">
                            @error('social_logo')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="url">Social URL</label>
                            <input wire:model="social_link" type="text" class="form-control" id="url"
                                aria-describedby="emailHelp">
                            @error('social_link')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 text-right">
                        <button wire:click="resetBox" class="btn btn-primary">Reset</button>
                        <button type="submit" class="btn btn-primary">{{ ($updateMode) ? 'Update' : 'Save' }}</button>
                    </div>
                </div>
            </form>

            <div class="row mt-2">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Logo</th>
                            <th>URL</th>
                            <th>Status</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($this->raw_data as $data)
                        <tr>
                            <td>{!! $data->socialLogo() !!}</td>
                            <td>{{ $data->social_link }}</td>
                            <td>
                                <a wire:click="status({{$data->id}})" class="btn btn-link">
                                    {!! ($data->isActive === 1) ? '<i class="fas fa-toggle-on fa-2x"></i>' : '<i class="fas fa-toggle-off fa-2x"></i>' !!}
                                </a>
                            </td>
                            <td>                                
                                <button wire:click="edit({{$data->id}})" class="btn btn-primary">Edit</button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" align="center">No data found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
