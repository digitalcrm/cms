<?php

namespace App\View\Components\Themes\Theme2;

use App\Post;
use Illuminate\View\Component;

class HomepageLatestPost extends Component
{
    public $all_latest_posts;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Post $all_latest_posts)
    {
        $this->all_latest_posts = $all_latest_posts->activeArticle()->search(request('searchItem'))->latest()->paginate(10);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.themes.theme2.homepage-latest-post');
    }
}
