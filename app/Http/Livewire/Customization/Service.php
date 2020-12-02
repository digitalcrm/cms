<?php

namespace App\Http\Livewire\Customization;

use App\ThemeService;
use Livewire\Component;

class Service extends Component
{
    public $removeFlashMessage;

    public $first_row_heading;
    public $first_row_paragraph;

    public $second_row_heading;
    public $second_row_paragraph;
    public $second_row_favicon;

    public $third_row_heading;
    public $third_row_paragraph;
    public $third_row_favicon;
    
    public $fourth_row_heading;
    public $fourth_row_paragraph;
    public $fourth_row_favicon;

    public $not_found;

    public function mount()
    {
        try {
            $first_row = ThemeService::find(1);
            $this->first_row_heading = $first_row->heading;
            $this->first_row_paragraph = $first_row->paragraph;

            $second_row = ThemeService::find(2);
            $this->second_row_heading = $second_row->heading;
            $this->second_row_paragraph = $second_row->paragraph;
            $this->second_row_favicon = $second_row->favicon;

            $third_row = ThemeService::find(3);
            $this->third_row_heading = $third_row->heading;
            $this->third_row_paragraph = $third_row->paragraph;
            $this->third_row_favicon = $third_row->favicon;

            $fourth_row = ThemeService::find(4);
            $this->fourth_row_heading = $fourth_row->heading;
            $this->fourth_row_paragraph = $fourth_row->paragraph;
            $this->fourth_row_favicon = $fourth_row->favicon;

        } catch (\Throwable $th) {
            $this->not_found = $th->getMessage();
        }
    }

    public function firstRowSave()
    {
        $this->validate([
            'first_row_heading' => 'required|string',
            'first_row_paragraph' => 'required|string',
        ]);
        $row1 = ThemeService::find(1);
        $row1->update([
            'heading' => $this->first_row_heading,
            'paragraph' => $this->first_row_paragraph,
        ]);
        session()->flash('message', 'Updated Successfully');
    }

    public function secondRowSave()
    {
        $this->validate([
            'second_row_heading' => 'required|string',
            'second_row_paragraph' => 'required|string',
            'second_row_favicon' => 'required|string',
        ]);
        $row1 = ThemeService::find(2);
        $row1->update([
            'heading' => $this->second_row_heading,
            'paragraph' => $this->second_row_paragraph,
            'favicon' => $this->second_row_favicon,
        ]);
        session()->flash('message', 'Updated Successfully');
    }

    public function thirdRowSave()
    {
        $this->validate([
            'third_row_heading' => 'required|string',
            'third_row_paragraph' => 'required|string',
            'third_row_favicon' => 'required|string',
        ]);
        $row1 = ThemeService::find(3);
        $row1->update([
            'heading' => $this->third_row_heading,
            'paragraph' => $this->third_row_paragraph,
            'favicon' => $this->third_row_favicon,
        ]);
        session()->flash('message', 'Updated Successfully');
    }

    public function fourthRowSave()
    {
        $this->validate([
            'fourth_row_heading' => 'required|string',
            'fourth_row_paragraph' => 'required|string',
            'fourth_row_favicon' => 'required|string',
        ]);
        $row1 = ThemeService::find(4);
        $row1->update([
            'heading' => $this->fourth_row_heading,
            'paragraph' => $this->fourth_row_paragraph,
            'favicon' => $this->fourth_row_favicon,
        ]);
        session()->flash('message', 'Updated Successfully');
    }

    public function render()
    {
        return view('livewire.customization.service');
    }
}
