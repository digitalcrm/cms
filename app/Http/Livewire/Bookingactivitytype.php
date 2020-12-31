<?php

namespace App\Http\Livewire;

use App\BookingActivity;
use Livewire\Component;

class Bookingactivitytype extends Component
{
    public $successMessage;
    public $activityId;
    public $wantsToUpdate = false;
    public $title;
    public $perPage = 5;
    public $search= '';

    public $checked = [];

    public function deleteAll()
    {
        BookingActivity::whereKey($this->checked)->delete();
        $this->checked = [];
        $this->successMessage = 'Items Deleted Successfully.';
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'title' => 'required|string|unique:booking_activities|max:25',
        ]);
    }

    public function store()
    {
        $validatedData = $this->validate([
            'title' => 'required|string|unique:booking_activities|max:25',
        ]);

        BookingActivity::create($validatedData);

        sleep(1);

        $this->successMessage = 'Activity Created Successfully.';

        $this->resetInputFields();

        $this->emit('showModal'); // Close model to using to jquery
    }

    public function edit($id)
    {
        $this->wantsToUpdate = true;

        $activity = BookingActivity::findOrFail($id);

        $this->activityId = $id;

        $this->title = $activity->title;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|string|unique:booking_activities|max:25',
        ]);

        if ($this->activityId) {

            $activity = BookingActivity::findOrFail($this->activityId);

            $activity->update([
                'title' => $this->title,
            ]);

            $this->wantsToUpdate = false;

            $this->successMessage = 'Activity Updated Successfully.';

            $this->resetInputFields();

            $this->emit('updateModal');
        }
    }

    public function cancel()
    {
        $this->wantsToUpdate = false;
        $this->resetInputFields();
    }

    public function delete($id)
    {
        if($id) {
            BookingActivity::where('id', $id)->delete();

            $this->successMessage = 'Activity Deleted Successfully.';
        }
    }

    public function resetInputFields()
    {
        $this->title = '';
    }

    public function render()
    {
        return view('livewire.bookingactivitytype',[
            'activities' => BookingActivity::search($this->search)->latest()->paginate($this->perPage),
        ]);
    }
}
