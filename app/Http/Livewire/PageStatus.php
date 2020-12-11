<?php

namespace App\Http\Livewire;

use App\Page;
use Livewire\Component;

class PageStatus extends Component
{
    public $pages;

    public $statusMessage;

    public $removeFlashMessage;

    public function toggle($id)
    {
        $data = Page::find($id);

        ($data->isActive === 1) ? $this->isActive = false : $this->isActive = true;
        
        $data->update([
            'isActive' => $this->isActive,
        ]);

        session()->flash('message', 'Row '.$data->id.' Status Updated successfully');
        
        return redirect()->route('pages.index');

    }

    public function render()
    {
        $this->pages = Page::latest()->get();

        return view('livewire.page-status');
    }
}
