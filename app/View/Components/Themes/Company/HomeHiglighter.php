<?php

namespace App\View\Components\Themes\Company;

use App\ThemeIntro;
use Illuminate\View\Component;

class HomeHiglighter extends Component
{
    public $first_row_intro;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ThemeIntro $first_row_intro)
    {
        $this->first_row_intro = $first_row_intro->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.themes.company.home-higlighter');
    }
}
