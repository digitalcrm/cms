<?php

namespace App\View\Components\Themes\Theme2;

use App\Post;
use Illuminate\View\Component;

class HomepageFeaturedPost extends Component
{
    public $featured_posts;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Post $featured_posts)
    {
        $this->featured_posts = $featured_posts->featuredPost()->take(3)->latest()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.themes.theme2.homepage-featured-post');
    }
}
