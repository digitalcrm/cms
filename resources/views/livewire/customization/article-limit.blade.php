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
    @if($notFoundFirstRow)
        <form wire:submit.prevent="store">
    @else
        <form wire:submit.prevent="update">
    @endif
        <div class="card">
            <div class="card-header text-primary font-weight-bold">General Settings</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="postlimit">Number of Posts Display on Homepage</label>
                    <input wire:model="posts_limit" type="number" placeholder="10" class="form-control"
                        id="postlimit" aria-describedby="postlimit">
                    @error('posts_limit')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="categorylimit">Number of Categories Display on Internal
                        Page</label>
                    <input wire:model="category_limit" type="number" placeholder="20" class="form-control"
                        id="categorylimit" aria-describedby="categorylimit">
                    @error('category_limit')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">{{ ($notFoundFirstRow) ? 'Store' : 'Save' }}</button>
            </div>
        </div>
    </form>
</div>
