<?php

namespace App\Http\Livewire\Customization;

use App\ThemeTestimonial;
use Livewire\Component;
use Livewire\WithFileUploads;

class TestimonialSetting extends Component
{
    use WithFileUploads;

    public $testimonial_all_data;
    public $table_not_found = false;
    public $iteration;

    public $wants_to_update;
    public $removeFlashMessage;

    public $previous_image;

    public $rowId;

    public $name;
    public $quote;
    public $profile_url;
    public $isActive;

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required|max:30',
            'quote' => 'required|string',
            'profile_url' => 'required|image|max:512',
        ]);

        if ($this->profile_url) {
            $validatedData['profile_url'] = $this->profile_url->storePublicly('testimonial-profile','public');
        }

        ThemeTestimonial::create($validatedData);

        session()->flash('message', 'Testimonial Data created successfully');

        $this->iteration++;

        $this->reset();

    }

    public function edit($id)
    {
        $this->wants_to_update = true;

        $row_data = ThemeTestimonial::findOrFail($id);

        $this->rowId = $row_data->id;
        $this->name =  $row_data->name;
        $this->quote =  $row_data->quote;
        $this->previous_image = $row_data->profile_url;

    }

    public function testimonial_update($id)
    {
        $validatedData = $this->validate([
            'name' => 'required|max:30',
            'quote' => 'required|string',
            'profile_url' => 'nullable|image|max:512|',
        ]);

        $testimonial_row = ThemeTestimonial::findOrFail($id);

        if ($this->profile_url) {
            $validatedData['profile_url'] = $this->profile_url->storePublicly('testimonial-profile','public');
        } else {
            unset($validatedData['profile_url']);
        }

        $testimonial_row->update($validatedData);

        session()->flash('message', 'Updated successfully');

        $this->iteration++;

        $this->reset();
    }

    public function resetAll()
    {
        $this->reset();
    }

    public function status($id)
    {
        $data = ThemeTestimonial::find($id);

        ($data->isActive === 1) ? $this->isActive = false : $this->isActive = true;

        $data->update([
            'isActive' => $this->isActive,
        ]);

        session()->flash('message', 'Row '.$data->id.' Status Updated successfully');
    }

    public function render()
    {
        try {
            $this->testimonial_all_data = ThemeTestimonial::get();
        } catch (\Throwable $th) {
            $this->table_not_found = true;
            session()->flash('message', 'Something Went Wrong '.$th->getMessage());
        }
        return view('livewire.customization.testimonial-setting');
    }
}
