<?php

namespace App\Http\Livewire\Customization;

use App\ThemeStatistic;
use Livewire\Component;

class SettingStats extends Component
{
    public $stats_table_all_data;

    public $wants_to_update = false;
    
    public $removeFlashMessage;
    public $rowId;
    
    public $main_text;
    public $sub_text;
    public $isActive;

    public function store()
    {
        $validatedData = $this->validate([
            'main_text' => 'required',
            'sub_text' => 'required',
        ]);

        ThemeStatistic::create($validatedData);

        session()->flash('stats', 'Row created successfully');

        $this->reset();
    }

    public function status($id)
    {
        $data = ThemeStatistic::find($id);

        ($data->isActive === 1) ? $this->isActive = false : $this->isActive = true;
        
        $data->update([
            'isActive' => $this->isActive,
        ]);

        session()->flash('stats', 'Row '.$data->id.' Status Updated successfully');
    }

    public function edit($id)
    {
        $this->wants_to_update = true;  

        $row_data = ThemeStatistic::findOrFail($id);

        $this->rowId = $row_data->id;
        $this->main_text = $row_data->main_text;
        $this->sub_text = $row_data->sub_text;
    }

    /** For update the row  */
    public function updateStats($id)
    {
        $validatedData = $this->validate([
            'main_text' => 'required',
            'sub_text' => 'required',
        ]);

        $table_row = ThemeStatistic::find($id);
        
        $table_row->update($validatedData);

        session()->flash('stats','Data Updated successfully');

        $this->reset();
    }
    
    public function render()
    {
        $this->stats_table_all_data = ThemeStatistic::get();
        return view('livewire.customization.setting-stats');
    }
}
