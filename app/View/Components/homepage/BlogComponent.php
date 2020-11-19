<?php

namespace App\View\Components\homepage;

use Illuminate\View\Component;

class BlogComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $blogs;
    public function __construct($blogs)
    {
        $this->blogs = $blogs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.homepage.blog-component');
    }
}
