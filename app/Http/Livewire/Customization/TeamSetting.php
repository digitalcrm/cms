<?php

namespace App\Http\Livewire\Customization;

use App\ThemeTeam;
use Livewire\Component;
use Livewire\WithFileUploads;

class TeamSetting extends Component
{
    use WithFileUploads;
    public $team_all_data;
    public $table_not_found = false;
    public $iteration;

    public $wants_to_update;
    public $removeFlashMessage;

    public $previous_image;

    public $rowId;

    public $name;
    public $job_title;
    public $facebook_url;
    public $linkedin_url;
    public $insta_url;
    public $twitter_url;
    public $logo;
    public $isActive;

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'job_title' => 'required',
            'facebook_url' => 'required',
            'linkedin_url' => 'required',
            'insta_url' => 'required',
            'twitter_url' => 'required',
            'logo' => 'required|image|max:512|mimes:png,jpg,jpeg',
        ]);

        if ($this->logo) {
            $validatedData['logo'] = $this->logo->storePublicly('client-logo','public');
        }
        ThemeTeam::create($validatedData);

        session()->flash('message', 'Created successfully');
        $this->iteration++;

        $this->reset();
    }

    public function edit($id)
    {
        $this->wants_to_update = true;

        $row_value = ThemeTeam::find($id);

        $this->rowId = $row_value->id;
        $this->name = $row_value->name;
        $this->job_title = $row_value->job_title;
        $this->facebook_url = $row_value->facebook_url;
        $this->linkedin_url = $row_value->linkedin_url;
        $this->insta_url = $row_value->insta_url;
        $this->twitter_url = $row_value->twitter_url;

        $this->previous_image = $row_value->logo;
    }

    public function logo_update($id)
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'job_title' => 'required',
            'facebook_url' => 'required',
            'linkedin_url' => 'required',
            'insta_url' => 'required',
            'twitter_url' => 'required',
            'logo' => 'image|max:512|nullable',
        ]);

        $row_data = ThemeTeam::find($id);

        if ($this->logo) {
            $validatedData['logo'] = $this->logo->storePublicly('client-logo','public');
        } else {
            unset($validatedData['logo']);
        }

        $row_data->update($validatedData);

        session()->flash('message', 'Updated successfully');

        $this->iteration++;

        $this->reset();
    }
    public function status($id)
    {
        $data = ThemeTeam::find($id);

        ($data->isActive === 1) ? $this->isActive = false : $this->isActive = true;

        $data->update([
            'isActive' => $this->isActive,
        ]);

        session()->flash('message', 'Row '.$data->id.' Status Updated successfully');
    }

    public function resetAll()
    {
        $this->wants_to_update = false;
        $this->reset();
    }

    public function render()
    {
        try {
            $this->team_all_data = ThemeTeam::get();
        } catch (\Throwable $th) {
            $this->table_not_found = true;
            session()->flash('message', 'Something Went Wrong '.$th->getMessage());
        }
        return view('livewire.customization.team-setting');
    }
}
