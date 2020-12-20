<?php

namespace App\Http\Livewire\Customization\Theme2;

use App\LandingpageStyle;
use Livewire\Component;

class BlogTheme extends Component
{
    public $notFoundData;
    public $removeFlashMessage;

    public $body_background_color;
    public $nav_head_color;
    public $firstfootercolor;
    public $secondfootercolor;

    public function colorUpdate()
    {
        $validatedData = $this->validate([
            'body_background_color' => 'required|string',
            'nav_head_color' => 'required|string',
            'firstfootercolor' => 'required|string',
            'secondfootercolor' => 'required|string',
        ]);

        $landingpageTableSecondRow = LandingpageStyle::updateOrCreate(
            ['id' =>2 ], // unique field 
            $validatedData // values
        );

        session()->flash('message', 'Data Updated Successfully');
    }

    public function mount()
    {
        try {
            $data = LandingpageStyle::find(2);
            $this->body_background_color = $data->body_background_color;
            $this->nav_head_color = $data->nav_head_color;
            $this->firstfootercolor = $data->firstfootercolor;
            $this->secondfootercolor = $data->secondfootercolor;
        } catch (\Throwable $th) {
            $this->notFoundData = $th->getMessage();
        }
    }

    public function render()
    {
        return view('livewire.customization.theme2.blog-theme');
    }
}
