<div>
    <div>
        @if(session()->has('stats'))
            <div class="alert alert-success">
                {{ session('stats') }}
                <button type="button" class="close" wire:click="$set('removeFlashMessage', null)">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    <div class="card">
        <div class="card-header text-primary font-weight-bold">Statistics</div>
        <div class="card-body">
            @if($wants_to_update)
                <form wire:submit.prevent="updateStats({{ $rowId }})">
                @else
                    <form wire:submit.prevent="store">
            @endif
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="main_text">Main Text</label>
                        <input wire:model="main_text" type="text" class="form-control" id="main_text"
                            aria-describedby="emailHelp">
                        @error('main_text')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="sub_text">Sub Text</label>
                        <input wire:model="sub_text" type="text" class="form-control" id="sub_text"
                            aria-describedby="emailHelp">
                        @error('sub_text')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="text-right">
                        <button type="submit"
                            class="btn btn-primary">{{ ($wants_to_update) ? 'Update' : 'Save' }}</button>
                    </div>
                </div>
            </div>
            </form>
            <div class="row mt-2">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Main Text</th>
                            <th>Sub Text</th>
                            <th>Status</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($this->stats_table_all_data as $data)
                            <tr>
                                <td>{{ $data->main_text }}</td>
                                <td>{{ $data->sub_text }}</td>
                                <td>
                                    <a wire:click="status({{ $data->id }})" class="btn btn-link">
                                        {!! ($data->isActive === 1) ? '<i class="fas fa-toggle-on fa-2x"></i>' : '<i
                                            class="fas fa-toggle-off fa-2x"></i>' !!}
                                    </a>
                                </td>
                                <td>
                                    <button wire:click="edit({{ $data->id }})" class="btn btn-primary">Edit</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" align="center">No data found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
