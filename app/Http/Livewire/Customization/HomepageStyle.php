<?php

namespace App\Http\Livewire\Customization;

use App\LandingpageStyle;
use Livewire\Component;

class HomepageStyle extends Component
{
    public $notFoundData;
    public $removeFlashMessage;

    // public $updateForm;

    public $body_background_color;
    public $nav_head_color;
    public $firstfootercolor;
    public $secondfootercolor;
    public $a_tag_color;
    public $a_tag_hover_color;
    public $primary_color;
    public $secondary_color;
    public $h2_tag_color;
    public $stats_back_color;
    public $team_back_color;
    public $client_back_color;
    // public $background_image;
    // public $backgroundstatus;

    public function updated()
    {
        $this->validate([
            'body_background_color' => 'required|string',
            'nav_head_color' => 'required|string',
            'firstfootercolor' => 'required|string',
            'secondfootercolor' => 'required|string',
            'a_tag_color' => 'required|string',
            'a_tag_hover_color' => 'required|string',
            'primary_color' => 'required|string',
            'secondary_color' => 'required|string',
            'h2_tag_color' => 'required|string',
            'stats_back_color' => 'required|string',
            'team_back_color' => 'required|string',
            'client_back_color' => 'required|string',
        ]);
    }

    public function store()
    {
        $validatedData = $this->validate([
            'body_background_color' => 'required|string',
            'nav_head_color' => 'required|string',
            'firstfootercolor' => 'required|string',
            'secondfootercolor' => 'required|string',
            'a_tag_color' => 'required|string',
            'a_tag_hover_color' => 'required|string',
            'primary_color' => 'required|string',
            'secondary_color' => 'required|string',
            'h2_tag_color' => 'required|string',
            'stats_back_color' => 'required|string',
            'team_back_color' => 'required|string',
            'client_back_color' => 'required|string',
        ]);
        LandingpageStyle::create($validatedData);

        session()->flash('message', 'First Row Data Created Successfully');

        // $this->updateForm = true;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'body_background_color' => 'required|string',
            'nav_head_color' => 'required|string',
            'firstfootercolor' => 'required|string',
            'secondfootercolor' => 'required|string',
            'a_tag_color' => 'required|string',
            'a_tag_hover_color' => 'required|string',
            'primary_color' => 'required|string',
            'secondary_color' => 'required|string',
            'h2_tag_color' => 'required|string',
            'stats_back_color' => 'required|string',
            'team_back_color' => 'required|string',
            'client_back_color' => 'required|string',
        ]);
        // dd($this->stats_back_color, $this->client_back_color, $this->team_back_color);
        $firstRow = LandingpageStyle::first();
        $firstRow->update($validatedData);

        session()->flash('message', 'Homepage Colors Updated Successfully');
    }

    public function mount()
    {
        try {
            $firstRowData = LandingpageStyle::first();
            $this->body_background_color = $firstRowData->body_background_color;
            $this->nav_head_color = $firstRowData->nav_head_color;
            $this->firstfootercolor = $firstRowData->firstfootercolor;
            $this->secondfootercolor = $firstRowData->secondfootercolor;
            $this->a_tag_color = $firstRowData->a_tag_color;
            $this->a_tag_hover_color = $firstRowData->a_tag_hover_color;
            $this->primary_color = $firstRowData->primary_color;
            $this->secondary_color = $firstRowData->secondary_color;
            $this->h2_tag_color = $firstRowData->h2_tag_color;
            $this->stats_back_color = $firstRowData->stats_back_color;
            $this->team_back_color = $firstRowData->team_back_color;
            $this->client_back_color = $firstRowData->client_back_color;
        } catch (\Throwable $th) {
            $this->notFoundData = $th->getMessage();
        }
    }
    // public function mount($styleRowFoundOrNot = null)
    // {
    //     try {

    //         $styleRowFoundOrNot = LandingpageStyle::first();
    //     } catch (\Throwable $th) {

    //         $this->notFoundFirstRow = $th->getMessage();
    //     }
    // }

    public function render()
    {
        return view('livewire.customization.homepage-style');
    }
}
