<?php

namespace App\View\Components\Themes\Theme2;

use App\Menu;
use App\SocialLink;
use Illuminate\View\Component;

class Footer extends Component
{
    public $social_icon;
    public $menus;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(SocialLink $social_icon, Menu $menus)
    {
        $this->social_icon = $social_icon->isActive()->get();
        $this->menus = $menus->has('page')->footerMenu()->isActive()->latest()->take(10)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.themes.theme2.footer');
    }
}
