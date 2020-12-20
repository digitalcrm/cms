<div>
    @switch($theme)
        @case(1)
            <livewire:customization.customizeview />
            @break
        @case(2)
            <x-customize.theme2.blog-theme-customization />
            @break
        @default

        {{-- Error Exception show if theme is not activated --}}
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $theme }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong></strong>
        </div>
    @endswitch
</div>
