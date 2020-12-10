<?php

namespace App\View\Components\Themes\Theme2;

use App\Post;
use App\Category;
use App\AboutWidget;
use Illuminate\View\Component;

class HomeInternalRightSideList extends Component
{
    public $blog_posts;
    public $popular_posts;
    public $featured_posts;
    public $blog_categories;
    public $about_widget;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Post $posts, Category $category, AboutWidget $about_widget)
    {
        $this->blog_posts =  $posts->activeArticle()->latest()->take(5)->get();
        $this->popular_posts =  $posts->activeArticle()->popularPost()->take(5)->latest()->get();
        $this->featured_posts =  $posts->activeArticle()->featuredPost()->take(5)->latest()->get();
        $this->blog_categories = $category->latest()->take(5)->get();
        $this->about_widget = $about_widget->isActive()->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.themes.theme2.home-internal-right-side-list');
    }
}
