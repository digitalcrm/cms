<div>
    <div>
        @if($successMessage)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $successMessage }}
                <button type="button" class="close" wire:click="$set('successMessage', null)">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    <div class="card">
        <div class="card-header">
            @include('livewire.bookingactivity.create')

            @include('livewire.bookingactivity.update')
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row mb-1">
                <div class="col-md-3">
                    {{-- <label>Per Page</label> --}}
                    <select wire:model="perPage" class="custom-select custom-select-sm form-control form-control-sm">
                        <option>5</option>
                        <option>10</option>
                        <option>20</option>
                        <option>50</option>
                    </select>
                </div>
                <div class="col-md-3">
                    @if($checked)
                        <button type="button" 
                            class="btn btn-sm btn-outline-secondary" 
                            onclick="confirm('Are you sure want to delete all data') || event.stopImmediatePropagation()" wire:click="deleteAll()">
                            Delete({{ count($checked) }})
                        </button>
                    @endif
                </div>
                <div class="col-md-6">
                    <input wire:model.debounce.300ms="search" class="form-control form-control-sm" type="text"
                        placeholder="Search Activity...">
                </div>
            </div>
            <table id="" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>
                            {{-- <a href="#" @click.prevent="selectAll()">check_all</a> --}}
                        </th>
                        <th>Name</th>
                        <th>Created_at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($activities as $activity)
                        <tr>
                            <th>
                                <input type="checkbox" name="checked" value="{{ $activity->id }}"
                                    id="check_id{{ $activity->id }}" wire:model="checked">
                            </th>
                            <td>{{ $activity->title ?? '' }}</td>
                            <td>{{ $activity->created_at->diffForHumans() ?? '' }}</td>
                            <td>
                                <button data-target="#updateModal" wire:click="edit({{ $activity->id }})"
                                    class="btn btn-primary btn-sm" data-toggle="modal">Edit</button>
                                <button wire:click="delete({{ $activity->id }})"
                                    class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="7">
                                No data available in table
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="float-right mt-1 mb-0">
                {{ $activities->links() }}
            </div>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    {{-- <script>
        function checkAll() {
            return {
                selected: false,
                selectAll() {
                    // console.log('hello');
                    this.selected = !this.selected;
                    checkboxes = document.querySelectorAll('[name="checked"]');
                    // console.log(checkboxes);
                    [...checkboxes].map((el) => {
                        el.checked = this.selected;
                    });
                },

            }

        }
    </script> --}}
</div>
