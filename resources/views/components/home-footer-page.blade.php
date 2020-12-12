<div>
    <footer class="footer bg-dark footer-main pt-5 mt-5 pb-5">
        <div class="container">
            <div class="row">

                @if($about_widget)
                    <div class="col-md-3 footer-about-col">
                        <p class="f-title">{{ $about_widget->heading }}</p>
                        <p>{{ $about_widget->sub_heading }}</p>
                    </div>
                @endif

                <div class="col-md-3 footer-recent-news">
                    @forelse($menus as $menu)
                    @if($loop->iteration <=5)
                        <p><a
                                href="{{ route('menu.page', ['menuslug'=>$menu->slug, 'pageslug'=>$menu->page->slug]) }}">{{ $menu->name }}</a>
                        </p>
                    @endif
                    @empty
                        <p><a href="#">{{ __('No pages available yet') }}</a></p>
                    @endforelse
                </div>

                <div class="col-md-3 footer-recent-news">
                    @if(count($menus) > 5)
                    @forelse($menus as $menu)
                    @if($loop->iteration >=6)
                        <p><a
                                href="{{ route('menu.page', ['menuslug'=>$menu->slug, 'pageslug'=>$menu->page->slug]) }}">{{ $menu->name }}</a>
                        </p>
                    @endif
                    @empty
                        <p><a href="#">{{ __('No pages available yet') }}</a></p>
                    @endforelse
                    @endif
                </div>

                {{-- <div class="col-md-3 footer-links">
                    <p class="f-title">RESOURCES</p>
                    <p><a href="{{ route('lists_of_category') }}">Articles by Category</a></p>
                    <p><a href="{{ route('lists_of_tag') }}">Articles by Tag</a></p>
                </div> --}}

                <div class="col-md-3 footer-about-col">
                    <livewire:newsletter.store-newsletter />
                </div>

            </div>
        </div>
    </footer>
    <footer class="footer-sub bg-sub-dark pt-3 small">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-left">
                    <p class="copyright">{{ date('Y') }} <a href="{{ env('APP_URL') }}">{{ env('APP_NAME') }}</a> All rights reserved.</p>
                </div>
                <div class="col-md-6 text-right">
                    <div class="social-media-widget">
                        @forelse($social_icon as $social)
                            <a href="{{ $social->social_link }}">{!! $social->social_logo !!}</a>
                        @empty
                            <a>No Icon</a>
                        @endforelse
                        <a href="{{ route('rss_feed') }}"><i class="fas fa-rss-square"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
