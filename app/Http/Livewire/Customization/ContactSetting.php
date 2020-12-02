<?php

namespace App\Http\Livewire\Customization;

use App\SettingContact;
use Livewire\Component;

class ContactSetting extends Component
{
    public $removeFlashMessage;
    public $not_found_first_row;
    
    public $title;
    public $paragraph;
    public $address;
    public $isActive;

    public function store()
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'paragraph' => 'required',
            'address' => 'required',
        ]);

        SettingContact::create($validatedData);

        session()->flash('contact', 'Row created successfully');

        $this->not_found_first_row = false;
    }

    /** For update the row  */
    public function updateWidget()
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'paragraph' => 'required',
            'address' => 'required',
        ]);

        $table_row = SettingContact::first();
        
        $table_row->update($validatedData);

        session()->flash('contact','Data Updated successfully');
    }

    public function mount()
    {
        try {
            $first_row = SettingContact::first();
            $this->title = $first_row->title;
            $this->paragraph = $first_row->paragraph;
            $this->address = $first_row->address;            
        } catch (\Throwable $th) {
            $this->not_found_first_row = $th->getMessage();
        }
    }

    public function render()
    {
        return view('livewire.customization.contact-setting');
    }
}
