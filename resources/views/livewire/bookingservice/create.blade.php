{{-- <form wire:submit.prevent="store">
    <div class="form-group row">
        <label for="service_name" class="col-sm-2 col-form-label">Service Name</label>
        <div class="col-sm-4">
            <input type="text"
            class="form-control @error('service_name') is-invalid @enderror "
            id="service_name"
            wire:model.debounce.500ms="service_name"
            name="service_name"
            >
            @error('service_name') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="col-sm-2">
            <button wire:click.prevent="store()" class="btn btn-success">Save</button>
            <button type="submit" class="btn btn-success" wire:loading.attr="disabled" wire:loading.class.remove="btn-success"  wire:loading.class="btn-warning">Save</button>
        </div>
    </div>
</form> --}}

<!-- Button trigger modal -->
<button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">
    Add New
</button>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="store">
            <div class="modal-body">
                    <div class="form-group row">
                        <label for="service_name" class="col-sm-3 col-form-label">Service Name</label>
                        <div class="col-sm-9">
                            <input type="text"
                            class="form-control @error('service_name') is-invalid @enderror "
                            id="service_name"
                            wire:model="service_name"
                            name="service_name"
                            >
                            @error('service_name') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-sm-2">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
