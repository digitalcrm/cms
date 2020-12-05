<?php

namespace App\View\Components\Themes\Company;

use App\ThemeStatistic;
use Illuminate\View\Component;

class HomeStats extends Component
{
    public $stats;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ThemeStatistic $stats)
    {
        $this->stats = $stats->isActive()->latest()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.themes.company.home-stats');
    }
}
