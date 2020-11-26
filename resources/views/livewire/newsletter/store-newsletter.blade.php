<div>
    <p class="f-title">NEWSLETTER</p>
    <p class="">Signup for our weekly newletter to get latest news</p>
    @if (session()->has('message'))
        <p>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {!! session('message') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </p>
    @endif
    <form wire:submit.prevent="saveSubscribedUser">
        <input type="text"
                name="name"
                class="form-control form-control-sm mt-1 @error('name') is-invalid @enderror "
                placeholder="Enter your name"
                wire:model.debounce.500ms="name">
        @error('name') <small class="error">{{ $message }}</small> @enderror

        <input type="email"
                name="email"
                class="form-control form-control-sm mt-1 @error('email') is-invalid @enderror"
                placeholder="Enter your email"
                wire:model.debounce.500ms="email">
        @error('email') <small class="error">{{ $message }}</small> @enderror

        <button type="submit" class="btn btn-primary float-right mt-1"
                wire:loading.attr="disabled">
                <span wire:loading class="spinner-border text-dark spinner-border-sm" role="status" aria-hidden="true"></span>
                Subscribe
        </button>
    </form>
</div>
