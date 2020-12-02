<?php

namespace App\Http\Livewire\Customization;

use App\SocialLink;
use Livewire\Component;

class SocialMediaLink extends Component
{
    public $social_logo;
    public $social_link;
    public $isActive;

    public $raw_data; // get the table collection
    public $rowId; //THis will be used in form case for form id

    public $updateMode = false; // This is used for if updateMode on then edit case occur

    public $removeFlashMessage; // close the session message

    /** This method is used for status changed only */

    public function status($id)
    {
        $data = SocialLink::find($id);

        ($data->isActive === 1) ? $this->isActive = false : $this->isActive = true;
        
        $data->update([
            'isActive' => $this->isActive,
        ]);

        session()->flash('social', 'Row '.$data->id.' Status Updated successfully');
    }

    /** THis method is used for only create purpose */
    public function store()
    {
        $validatedData = $this->validate([
            'social_logo' => 'required',
            'social_link' => 'required',
        ]);

        SocialLink::create($validatedData);

        session()->flash('social','social logo created successfully');

        $this->reset();
    }

    /** This method is used for editing the input box */
    public function edit($id)
    {
        $this->updateMode = true;   

        $table_row = SocialLink::find($id);

        $this->rowId = $table_row->id;
        $this->social_logo = $table_row->social_logo;
        $this->social_link = $table_row->social_link;
    }

    /** For update the row  */
    public function update($id)
    {
        $validatedData = $this->validate([
            'social_logo' => 'required',
            'social_link' => 'required',
        ]);

        $table_row = SocialLink::find($id);
        
        $table_row->update($validatedData);

        session()->flash('social','social logo Updated successfully');

        $this->reset();
    }

    /**This is used for cancel button this will reset the input box */
    public function resetBox()
    {
        $this->reset();
    }

    public function render()
    {
        // $this->raw_data = SocialLink::isActive()->get();
        $this->raw_data = SocialLink::get();

        return view('livewire.customization.social-media-link');
    }
}
