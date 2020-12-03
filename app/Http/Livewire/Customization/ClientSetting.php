<?php

namespace App\Http\Livewire\Customization;

use App\ThemeClient;
use Livewire\Component;
use Livewire\WithFileUploads;

class ClientSetting extends Component
{
    use WithFileUploads;

    public $client_logo_all_data;
    public $table_not_found = false;
    public $iteration;

    public $wants_to_update;
    public $removeFlashMessage;

    public $previous_image;

    public $rowId;

    public $logo;
    public $isActive;

    public function store()
    {
        $validatedData = $this->validate([
            'logo' => 'required|image|max:512|mimes:png,jpg,jpeg',
        ]);

        if ($this->logo) {
            $validatedData['logo'] = $this->logo->storePublicly('client-logo','public');
        }
        ThemeClient::create($validatedData);

        session()->flash('message', 'Client Logo uploaded successfully');
        $this->iteration++;

        $this->reset('logo');
    }

    public function edit($id)
    {
        $this->wants_to_update = true;

        $row_value = ThemeClient::find($id);

        $this->rowId = $row_value->id;
        $this->previous_image = $row_value->logo;
    }

    public function updateLogo($id)
    {
        $validatedData = $this->validate([
            'logo' => 'required|image|max:512|mimes:png,jpg,jpeg',
        ]);

        $row_data = ThemeClient::find($id);

        if ($this->logo) {
            $validatedData['logo'] = $this->logo->storePublicly('client-logo','public');
        }

        $row_data->update($validatedData);

        session()->flash('message', 'Client Logo updated successfully');

        $this->iteration++;

        $this->reset();
    }

    public function status($id)
    {
        $data = ThemeClient::find($id);

        ($data->isActive === 1) ? $this->isActive = false : $this->isActive = true;

        $data->update([
            'isActive' => $this->isActive,
        ]);

        session()->flash('message', 'Row '.$data->id.' Status Updated successfully');
    }

    public function render()
    {
        try {
            $this->client_logo_all_data = ThemeClient::get();
        } catch (\Throwable $th) {
            $this->table_not_found = true;
            session()->flash('message', 'Something Went Wrong '.$th->getMessage());
        }
        return view('livewire.customization.client-setting');
    }
}
