<?php

namespace App\View\Components;

use App\Menu;
use Illuminate\View\Component;

class HomeHeaderPage extends Component
{
    public $menus;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Menu $menus)
    {
        $this->menus = $menus->has('page')->headerMenu()->isActive()->latest()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.home-header-page');
    }
}
