<aside id="text-1" class="widget widget_text mb-4">
    <form>
        <input type="search" name="searchItem" class="form-control" placeholder="Search and hit enter..." value=""
            name="s" title="Search for:">
    </form>
</aside>
@if($about_widget)
    <aside id="text-2" class="widget widget_text mb-4">
        <h3 class="widget-title">{{ $about_widget->heading }}</h3>
        <div class="textwidget">
            <img alt="avatar" src="http://marstheme.com/theme/saturn/wp-content/uploads/2014/12/about-1.png"
                class="float-right">
            <p>{{ $about_widget->sub_heading }}</p>
        </div>
    </aside>
@endif
<aside id="text-3" class="widget widget_text mb-4">
    <h3 class="widget-title">Categories</h3>
    <div class="textwidget">
        @forelse($blog_categories as $cat)
            <p>
                <a
                    href="{{ route('latest.latestpost',['category' => $cat->name]) }}">
                    {{ $cat->name }}
                    [{{ $cat->category_has_total_posts() }}]
                </a>
            </p>
        @empty
            <p><a href="#">Lifestyle (12)</a></p>
        @endforelse
    </div>
</aside>
