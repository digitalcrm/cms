<?php

namespace App\Http\Livewire\Customization;

use App\ThemeIntro;
use Livewire\Component;

class Intro extends Component
{
    public $description;
    public $background_color;
    public $font_color;

    public $removeFlashMessage;

    public $save = false; //This save is to be true when data is created
    public $not_found; //for exception if found

    public function updated()
    {
        $this->validate([
            'description' => 'required',
            'background_color' => 'required',
            'font_color' => 'required',
        ]);
    }

    public function store()
    {
        $validatedData = $this->validate([
            'description' => 'required',
            'background_color' => 'required',
            'font_color' => 'required',
        ]);

        ThemeIntro::create($validatedData);

        session()->flash('message', 'First Row Data Created Successfully');
        $this->save = true;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'description' => 'required',
            'background_color' => 'required',
            'font_color' => 'required',
        ]);

        $table_value = ThemeIntro::first();

        $table_value->update($validatedData);

        session()->flash('message', 'Data Updated Successfully');
    }

    public function mount()
    {
        try {
            $first_row_data = ThemeIntro::first();

            $this->description = $first_row_data->description;
            $this->background_color = $first_row_data->background_color;
            $this->font_color = $first_row_data->font_color;
            $this->save = true;

        } catch (\Throwable $th) {
            $this->not_found = $th->getMessage();
        }
    }

    public function render()
    {
        return view('livewire.customization.intro');
    }
}
