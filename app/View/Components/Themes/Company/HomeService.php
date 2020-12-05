<?php

namespace App\View\Components\Themes\Company;

use App\ThemeService;
use Illuminate\View\Component;

class HomeService extends Component
{
    public $first_row_services;
    public $all_services_except_first;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ThemeService $services)
    {
        $this->first_row_services = $services->first();
        $this->all_services_except_first = $services->where('favicon','!=',Null)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.themes.company.home-service');
    }
}
