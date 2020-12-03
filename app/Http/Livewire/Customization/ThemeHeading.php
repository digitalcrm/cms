<?php

namespace App\Http\Livewire\Customization;

use App\ThemeHeading as AppThemeHeading;
use Livewire\Component;

class ThemeHeading extends Component
{
    public $headings_table_all_data;
    public $table_not_found = false;

    public $wants_to_update;
    public $removeFlashMessage;

    public $rowId;

    public $type;
    public $main_title;
    public $sub_title;

    // public function updated()
    // {
    //     $validatedData = $this->validate([
    //         'type' => 'required|in:client,team,testimonial',
    //         'main_title' => 'required',
    //         'sub_title' => 'required',
    //     ]);
    // }
    public function store()
    {
        $validatedData = $this->validate([
            'type' => 'required|in:client,team,testimonial',
            'main_title' => 'required',
            'sub_title' => 'required',
        ]);

        AppThemeHeading::create($validatedData);

        session()->flash('message', 'Row created successfully');

        $this->reset();
    }

    public function edit($id)
    {
        $this->wants_to_update = true;

        $row_data = AppThemeHeading::findOrFail($id);

        $this->rowId = $row_data->id;
        $this->type = $row_data->type;
        $this->main_title = $row_data->main_title;
        $this->sub_title = $row_data->sub_title;
    }

    public function updateHeading($id)
    {
        $validatedData = $this->validate([
            'type' => 'required',
            'main_title' => 'required',
            'sub_title' => 'required',
        ]);

        $table_row = AppThemeHeading::find($id);

        $table_row->update($validatedData);

        session()->flash('message','Data Updated successfully');

        $this->reset();
    }

    // public function status($id)
    // {
    //     $data = AppThemeHeading::find($id);

    //     ($data->isActive === 1) ? $this->isActive = false : $this->isActive = true;

    //     $data->update([
    //         'isActive' => $this->isActive,
    //     ]);

    //     session()->flash('message', 'Row '.$data->id.' Status Updated successfully');
    // }

    public function render()
    {
        try {
            $this->headings_table_all_data = AppThemeHeading::get();
        } catch (\Throwable $th) {
            $this->table_not_found = true;
            session()->flash('message', 'Something Went Wrong '.$th->getMessage());
        }
        return view('livewire.customization.theme-heading');
    }
}
