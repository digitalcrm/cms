<footer class="footer bg-dark2 py-3 mt-4 custom-bg-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="copyright">{{ date('Y') }} <a href="{{ env('APP_URL') }}">{{ env('APP_NAME') }}</a> ALL RIGHTS RESERVED. <a href="{{ route('sitemap') }}">Sitemap</a></p>
                <p class="footer-nav">
                    @forelse($menus as $menu)
                        <span><a href="{{ route('menu.page', ['menuslug'=>$menu->slug, 'pageslug'=>$menu->page->slug]) }}">{{ $menu->name }}</a></span>
                        @empty
                        <span><a href="#">No Links Found</a></span>
                    @endforelse
                </p>
            </div>
        </div>
    </div>
</footer>
<footer class="footer bg-dark py-3 custom-bg-subfooter">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="social-media-widget">
                    @forelse($social_icon as $social)
                        <a href="{{ $social->social_link }}">{!! $social->social_logo !!}</a>
                    @empty
                        <a>No Icon</a>
                    @endforelse
                    {{-- <a href="{{ route('rss_feed') }}"><i class="fas fa-rss-square"></i></a> --}}
                </div>
            </div>
        </div>
    </div>
</footer>
