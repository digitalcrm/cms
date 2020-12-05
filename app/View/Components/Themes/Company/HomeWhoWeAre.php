<?php

namespace App\View\Components\Themes\Company;

use App\ThemeBio;
use Illuminate\View\Component;

class HomeWhoWeAre extends Component
{
    public $who_we_are_first_row;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ThemeBio $who_we_are_first_row)
    {
        $this->who_we_are_first_row = $who_we_are_first_row->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.themes.company.home-who-we-are');
    }
}
