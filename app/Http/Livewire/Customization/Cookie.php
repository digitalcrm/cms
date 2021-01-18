<?php

namespace App\Http\Livewire\Customization;

use App\Cookie as AppCookie;
use Livewire\Component;

class Cookie extends Component
{
    public $firstRowData;
    
    public $removeFlashMessage;
    public $exceptionMessage;

    public $message_text;
    public $button_text;
    public bool $isActive;

    protected $listeners = [
        'toggleStatus' => 'status',
    ];

    public function cookieStore()
    {
        $this->validate([
            'message_text' => 'required|string|min:10|max:255',
            'button_text' => 'required|string|min:2|max:25',
        ]);

        AppCookie::updateOrCreate(
            [
                'id' => 1,
            ],
            [
                'message_text' => $this->message_text,
                'button_text' => $this->button_text,
            ]
        );

        session()->flash('cookieMessage','cookie data stored successfully');
    }

    public function status()
    {
        $data = AppCookie::findOrFail(1);

        ($data->isActive === 1) ? $this->isActive = false : $this->isActive = true;
        
        $data->update([
            'isActive' => $this->isActive,
        ]);

        session()->flash('cookieMessage', 'Row '.$data->id.' Status Updated successfully');
    }

    public function mount(AppCookie $appCookie)
    {
        try {
            $firstRowData = $appCookie->first();
            $this->message_text = $firstRowData->message_text;
            $this->button_text = $firstRowData->button_text;
            $this->isActive = $firstRowData->isActive;
        } catch (\Throwable $th) {
            $this->exceptionMessage = 'Table is empty '.$th;            
        }
    }

    public function render()
    {
        return view('livewire.customization.cookie');
    }
}
