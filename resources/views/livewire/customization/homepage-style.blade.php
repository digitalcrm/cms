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
    @if($notFoundData)
        <form wire:submit.prevent="store">
    @else
        <form wire:submit.prevent="update">
    @endif
        <div class="card">
            <div class="card-header text-primary font-weight-bold">Color Settings</div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="body_background_color">Background color</label>
                        <input wire:model.defer="body_background_color" class="jscolor float-right">
                        @error('body_background_color')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="nav_head_color">Header Background</label>
                        <input wire:model.defer="nav_head_color" class="jscolor float-right">
                        @error('nav_head_color')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="firstfootercolor">Footer Background</label>
                        <input wire:model.defer="firstfootercolor" class="jscolor float-right">
                        @error('firstfootercolor')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="secondfootercolor">Sub Footer Background</label>
                        <input wire:model.defer="secondfootercolor" class="jscolor float-right">
                        @error('secondfootercolor')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="a_tag_color">Link Color</label>
                        <input wire:model.defer="a_tag_color" class="jscolor float-right">
                        @error('a_tag_color')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="a_tag_hover_color">Link Hover</label>
                        <input wire:model.defer="a_tag_hover_color" class="jscolor float-right">
                        @error('a_tag_hover_color')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="primary_color">Primary Button Color</label>
                        <input wire:model.defer="primary_color" class="jscolor float-right">
                        @error('primary_color')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="secondary_color">Secondary Button Color</label>
                        <input wire:model.defer="secondary_color" class="jscolor float-right">
                        @error('secondary_color')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="h2_tag_color">Heading Color</label>
                        <input wire:model.defer="h2_tag_color" class="jscolor float-right">
                        @error('h2_tag_color')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">{{ ($notFoundData) ? 'Store' : 'Save' }}</button>
            </div>
        </div>
    </form>
</div>
