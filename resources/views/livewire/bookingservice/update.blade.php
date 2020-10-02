{{-- <form wire:submit.prevent="update">
    <input type="hidden" wire:model="service_id">
    <div class="form-group row">
        <label for="service_name" class="col-sm-2 col-form-label">Service Name</label>
        <div class="col-sm-4">
            <input type="text" class="form-control required" id="service_name" wire:model="service_name" name="service_name">
            @error('service_name') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="col-sm-2">
            <button wire:click.prevent="update()" class="btn btn-success mr-1">Update</button>
            <button type="submit" class="btn btn-success mr-1" wire:loading.attr="disabled" wire:loading.class.remove="btn-success"  wire:loading.class="btn-warning">Update</button>
            <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
        </div>
    </div>
</form> --}}

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update">
                    <input type="hidden" wire:model="service_id">
                    <div class="form-group row">
                        <label for="service_name" class="col-sm-3 col-form-label">Service Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control required" id="service_name" wire:model="service_name" name="service_name">
                            @error('service_name') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button wire:click.prevent="cancel()" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" wire:loading.attr="disabled" wire:loading.class.remove="btn-success" wire:loading.class="btn-info">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
