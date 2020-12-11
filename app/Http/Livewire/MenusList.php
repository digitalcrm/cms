<?php

namespace App\Http\Livewire;

use App\Menu;
use Livewire\Component;

class MenusList extends Component
{
    public $menus;
    
    public $statusMessage;

    public $removeFlashMessage;

    public function toggle($id)
    {
        $data = Menu::find($id);

        ($data->isActive === 1) ? $this->isActive = false : $this->isActive = true;
        
        $data->update([
            'isActive' => $this->isActive,
        ]);

        session()->flash('message', 'Row '.$data->id.' Status Updated successfully');
        
        return redirect()->route('menus.index');

    }

    public function render()
    {
        $this->menus = Menu::with('page')->latest()->get();
        return view('livewire.menus-list');
    }
}
