<?php

namespace App\View\Components\Themes\Company;

use App\ThemeSlider;
use Illuminate\View\Component;

class HomeCrousel extends Component
{
    public $sliders;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ThemeSlider $sliders)
    {
        $this->sliders = $sliders->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.themes.company.home-crousel');
    }
}
