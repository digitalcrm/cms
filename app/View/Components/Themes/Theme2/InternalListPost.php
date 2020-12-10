<?php

namespace App\View\Components\Themes\Theme2;

use App\Post;
use Illuminate\View\Component;

class InternalListPost extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $lists_of_posts = Post::categoryFilter(request('category'))
                                ->tagFilter(request('tags'))
                                ->popularFilter(request('blogs'))
                                ->featuredFilter(request('blogs'))
                                ->authorFilter(request('author'))
                                ->search(request('searchItem'))
                                ->orderBy('id', 'desc')->activeArticle()->paginate(15);
                                
        return view('components.themes.theme2.internal-list-post', compact('lists_of_posts'));
    }
}
