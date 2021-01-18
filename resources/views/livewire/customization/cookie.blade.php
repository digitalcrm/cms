<div>
    <div>
        @if(session()->has('cookieMessage'))
            <div class="alert alert-success">
                {{ session('cookieMessage') }}
                <button type="button" class="close" wire:click="$set('removeFlashMessage', null)">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    <form wire:submit.prevent="cookieStore">
        <div class="card">
            <div class="card-header text-primary font-weight-bold">
                <div class="row">
                    <div class="col-md-3">
                        Cookie Popup
                    </div>
                    <div class="col-md-9">
                        <a wire:click.prevent="$emit('toggleStatus')" class="btn btn-link float-right">
                            {!! ($isActive === true) ? '<i class="fas fa-toggle-on fa-2x"></i>' : '<i class="fas fa-toggle-off fa-2x"></i>' !!}
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="message_text">Message</label>
                    <textarea wire:model="message_text" cols="5" rows="5" class="form-control" id="message_text"></textarea>
                    @error('message_text')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="button_text">Button Text</label>
                    <input wire:model="button_text" type="text" class="form-control"
                        id="button_text" aria-describedby="button_text">
                    @error('button_text')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">
                    <span wire:loading wire:target="cookieStore" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Save
                </button>
            </div>
        </div>
    </form>
</div>
