<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Activity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update">
                    <input type="hidden" wire:model="service_id">
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label">Service Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control required" id="title" wire:model="title" name="title">
                            @error('title') <span class="text-danger">{{ $message }}</span>@enderror
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
