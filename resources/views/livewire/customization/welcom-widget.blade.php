<div>
    <div>
        @if(session()->has('welcome'))
            <div class="alert alert-success">
                {{ session('welcome') }}
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
                <form wire:submit.prevent="updateWidget({{ $rowId }})">
                @else
                    <form wire:submit.prevent="store">
            @endif
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="heading">Main Text</label>
                        <input wire:model="heading" type="text" class="form-control" id="heading"
                            aria-describedby="emailHelp">
                        @error('heading')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="sub_heading">Sub Text</label>
                        <textarea wire:model="sub_heading" class="form-control" id="exampleFormControlTextarea1"
                        rows="6"></textarea>
                        @error('sub_heading')
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
                        @forelse($this->widget_table_all_data as $data)
                            <tr>
                                <td>{{ $data->heading }}</td>
                                <td>{{ $data->sub_heading }}</td>
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
