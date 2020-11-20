<div>
    <footer class="footer bg-dark footer-main pt-5 mt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 footer-about-col">
                    <p class="f-title">ABOUT US</p>
                    <p>Aynsoft has been the #1 selling theme for more than 6 years, making it the most trusted and complete WordPress theme on the market. We are dedicated to providing you with the best experience possible.
                    </p>
                </div>
                <div class="col-md-3 footer-recent-news">
                    <p class="f-title">Latest Posts</p>
                    @forelse ($blog_posts as $post)
                    <p><a href="{{ route('post.viewitem',$post->slug) }}">{{ $post->title }}</a></p>
                    @empty
                    <p><a href="#">{{ __('No posts available yet') }}</a></p>
                    @endforelse
                </div>

                <div class="col-md-3 footer-links">
                    <p class="f-title">RESOURCES</p>
                    <p><a href="{{ route('lists_of_category') }}">Articles by Category</a></p>
                </div>

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
                    <p class="copyright">2020 <a href="#">aynsoft.com</a> All rights reserved.</p>
                </div>
                <div class="col-md-6 text-right">
                    <div class="social-media-widget">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
