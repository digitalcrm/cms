<?php

namespace App\View\Components;

use App\AboutWidget;
use App\SocialLink;
use Illuminate\View\Component;

class homefooterpage extends Component
{
    public $about_widget;
    public $social_icon;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(AboutWidget $about_widget, SocialLink $social_icon)
    {
        $this->about_widget = $about_widget->isActive()->first();
        $this->social_icon = $social_icon->isActive()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.homefooterpage');
    }
}
