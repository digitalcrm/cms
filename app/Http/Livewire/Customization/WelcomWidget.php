<?php

namespace App\Http\Livewire\Customization;

use App\AboutWidget;
use Livewire\Component;

class WelcomWidget extends Component
{
    public $widget_table_all_data;

    public $wants_to_update = false;
    
    public $removeFlashMessage;
    public $rowId;
    
    public $heading;
    public $sub_heading;
    public $isActive;

    public function store()
    {
        $validatedData = $this->validate([
            'heading' => 'required',
            'sub_heading' => 'required',
        ]);

        AboutWidget::create($validatedData);

        session()->flash('welcome', 'Row created successfully');

        $this->reset();
    }

    public function status($id)
    {
        $data = AboutWidget::find($id);

        ($data->isActive === 1) ? $this->isActive = false : $this->isActive = true;
        
        $data->update([
            'isActive' => $this->isActive,
        ]);

        session()->flash('welcome', 'Row '.$data->id.' Status Updated successfully');
    }

    public function edit($id)
    {
        $this->wants_to_update = true;  

        $row_data = AboutWidget::findOrFail($id);

        $this->rowId = $row_data->id;
        $this->heading = $row_data->heading;
        $this->sub_heading = $row_data->sub_heading;
    }

    /** For update the row  */
    public function updateWidget($id)
    {
        $validatedData = $this->validate([
            'heading' => 'required',
            'sub_heading' => 'required',
        ]);

        $table_row = AboutWidget::find($id);
        
        $table_row->update($validatedData);

        session()->flash('welcome','Data Updated successfully');

        $this->reset();
    }
    public function render()
    {
        $this->widget_table_all_data = AboutWidget::get();
        
        return view('livewire.customization.welcom-widget');
    }
}
