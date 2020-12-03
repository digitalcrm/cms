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
            <div class="card-header text-primary font-weight-bold">Theme Headings</div>
            <div class="card-body">
                @if($wants_to_update)
                    <form wire:submit.prevent="updateHeading({{ $rowId }})">
                    @else
                    <form wire:submit.prevent="store">
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select wire:model="type" class="form-control" id="type">
                                <option>Select</option>
                                @foreach(App\ThemeHeading::DropDown as $option)
                                    <option value="{{ $option }}">{{ $option }}</option>
                                @endforeach
                            </select>
                            @error('type')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="main_title">Main Text</label>
                            <input wire:model="main_title" type="text" class="form-control" id="maint_title"
                                aria-describedby="emailHelp">
                            @error('main_title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="sub_title">Sub Text</label>
                            <textarea wire:model="sub_title" class="form-control" id="exampleFormControlTextarea1"
                                rows="6"></textarea>
                            @error('sub_title')
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
                                <th>Type</th>
                                <th>Main Text</th>
                                <th>Sub Text</th>
                                {{-- <th>Status</th> --}}
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($this->headings_table_all_data as $data)
                                <tr>
                                    <td>{{ $data->type ?? '' }}</td>
                                    <td>{{ $data->main_title ?? '' }}</td>
                                    <td>{{ $data->sub_title ?? '' }}</td>
                                    {{-- <td>
                                        <a wire:click="status({{ $data->id }})" class="btn btn-link">
                                            {!! ($data->isActive === 1) ? '<i class="fas fa-toggle-on fa-2x"></i>' : '<i
                                                class="fas fa-toggle-off fa-2x"></i>' !!}
                                        </a>
                                    </td> --}}
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
