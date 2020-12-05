<?php

namespace App\View\Components\Themes\Company;

use App\ThemeClient;
use App\ThemeHeading;
use Illuminate\View\Component;

class HomeClient extends Component
{
    public $heading_with_type_client;
    public $client_data;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ThemeHeading $heading_with_type_client, ThemeClient $client_data)
    {
        $this->heading_with_type_client   =   $heading_with_type_client->where('type','client')->first();
        $this->client_data    =  $client_data->isActive()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.themes.company.home-client');
    }
}
