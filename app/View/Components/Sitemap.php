<?php

namespace App\View\Components;

use App\Page;
use App\Theme;
use App\Category;
use Illuminate\View\Component;

class Sitemap extends Component
{
    public $current_theme;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Theme $themes)
    {
        $themeId = $themes->isActive()->first();
        
        switch ($themeId->id) {
            case 1:
                $this->current_theme = 'layouts.app';
                return $this->current_theme;
                break;
            case 2:
                $this->current_theme = 'themes.theme2.layouts.main';
                return $this->current_theme;
                break;
            default:
                return 'layouts.app';
                break;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $categories_having_post = Category::whereHas('posts', function($query){
            $query->activeArticle();
        })->get();

        $pages = Page::isActive()->get();
        
        return view('components.sitemap',compact('categories_having_post','pages'));
    }
}
