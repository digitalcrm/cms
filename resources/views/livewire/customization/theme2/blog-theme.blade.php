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
    <div class="card">
        <div class="card-header text-primary font-weight-bold">Color Settings</div>
        <form wire:submit.prevent="colorUpdate">
            <div class="card-body">
                <div class="form-group">
                    <label for="body_background_color">Background color</label>
                    <input wire:model="body_background_color" class="jscolor float-right">
                    @error('body_background_color')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <hr>
                <div class="form-group">
                    <label for="nav_head_color">Header Background</label>
                    <input wire:model="nav_head_color" class="jscolor float-right">
                    @error('nav_head_color')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <hr>
                <div class="form-group">
                    <label for="firstfootercolor">Footer Background</label>
                    <input wire:model="firstfootercolor" class="jscolor float-right">
                    @error('firstfootercolor')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="secondfootercolor">Sub Footer Background</label>
                    <input wire:model="secondfootercolor" class="jscolor float-right">
                    @error('secondfootercolor')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <hr>
            </div>
            <div class="card-footer text-right">
                <button type="submit"
                    class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
