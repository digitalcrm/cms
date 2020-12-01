<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
                <button type="button" class="close" wire:click="$set('removeFlashMessage', null)">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    @if(!$save)
        <form wire:submit.prevent="store">
    @else
        <form wire:submit.prevent="update">
    @endif
        <div class="card">
            <div class="card-header text-primary font-weight-bold">Intro</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="description">Text</label>
                    <textarea wire:model="description" class="form-control" id="exampleFormControlTextarea1"
                        rows="3"></textarea>
                    @error('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="background_color">Background Color</label>
                    <input wire:model="background_color" class="jscolor float-right">
                    @error('background_color')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <hr>
                <div class="form-group">
                    <label for="font_color">Font Color</label>
                    <input wire:model="font_color" class="jscolor float-right">
                    @error('font_color')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">{{ (!$save) ? 'Store' : 'Save' }}</button>
            </div>
        </div>
    </form>
</div>
