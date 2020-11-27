<a href="{{ route('dashboard') }}" class="brand-link">
    <img src="{{ $admin_logo->adminPageLogoURL() }}"
        alt="{{ $admin_logo->altText() }}"
        class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">{{ $admin_logo->altText() }}</span>
</a>
