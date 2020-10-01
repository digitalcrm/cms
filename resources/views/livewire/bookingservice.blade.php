<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="card">
        <div class="card-header">

            {{-- @if($updateMode) --}}
            @include('livewire.bookingservice.update')
            {{-- @else --}}
            @include('livewire.bookingservice.create')
            {{-- @endif --}}

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Created_at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $service)
                    <tr>
                        <td>{{ $service->service_name ?? '' }}</td>
                        <td>{{ $service->created_at->diffForHumans() ?? ''}}</td>
                        <td>
                            <button data-target="#updateModal" wire:click="edit({{ $service->id }})" class="btn btn-primary btn-sm" data-toggle="modal" >Edit</button>
                            <button wire:click="delete({{ $service->id }})" class="btn btn-danger btn-sm">Delete</button>
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
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</div>
