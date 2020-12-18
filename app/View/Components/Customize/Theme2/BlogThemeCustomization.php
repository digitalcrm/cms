<?php

namespace App\View\Components\Customize\Theme2;

use Illuminate\View\Component;

class BlogThemeCustomization extends Component
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
        return view('components.customize.theme2.blog-theme-customization');
    }
}
