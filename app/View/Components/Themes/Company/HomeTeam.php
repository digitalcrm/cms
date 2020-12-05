<?php

namespace App\View\Components\Themes\Company;

use App\ThemeHeading;
use App\ThemeTeam;
use Illuminate\View\Component;

class HomeTeam extends Component
{
    public $heading_with_type_team;
    public $team_data;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ThemeHeading $heading_with_type_team, ThemeTeam $team_data)
    {
        $this->heading_with_type_team   =   $heading_with_type_team->where('type','team')->first();
        $this->team_data    =  $team_data->isActive()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.themes.company.home-team');
    }
}
