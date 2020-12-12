<?php

namespace App\View\Components;

use App\Menu;
use App\SocialLink;
use App\AboutWidget;
use Illuminate\View\Component;

class HomeFooterPage extends Component
{
    public $about_widget;
    public $social_icon;
    public $menus;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(AboutWidget $about_widget, SocialLink $social_icon, Menu $menus)
    {
        $this->about_widget = $about_widget->isActive()->first();
        $this->social_icon = $social_icon->isActive()->get();
        $this->menus = $menus->has('page')->footerMenu()->isActive()->latest()->take(20)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.home-footer-page');
    }
}
