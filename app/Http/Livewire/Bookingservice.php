<?php

namespace App\Http\Livewire;

use App\BookingService as AppBookingService;
use Livewire\Component;

class Bookingservice extends Component
{
    // public $services;
    public $service_name;
    public $service_id;
    public $updateMode = false;
    public $successMessage;

    public function render()
    {
        // $this->services = AppBookingService::all();

        return view('livewire.bookingservice', [
            'services' => AppBookingService::latest()->get(),

        ]);
    }

    /*
        This function is used for real time validation show
    */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'service_name' => 'max:25',
        ]);
    }

    private function resetInputFields(){
        $this->service_name = '';
    }

    public function store()
    {
        $validatedData = $this->validate([
            'service_name' => 'required|max:25',
        ]);

        AppBookingService::create($validatedData);

        sleep(1);
        // session()->flash('message', 'Service Created Successfully.');

        // another way to define success message
        $this->successMessage = 'Service Created Successfully.';

        $this->resetInputFields();

        $this->emit('showModal'); // Close model to using to jquery
    }

    public function edit($id)
    {
        $this->updateMode = true;

        $service = AppBookingService::where('id', $id)->first();

        $this->service_id = $id;
        $this->service_name = $service->service_name;

    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $this->validate([
            'service_name' => 'required|max:25',
        ]);

        if ($this->service_id) {
            $service = AppBookingService::findOrFail($this->service_id);
            $service->update([
                'service_name' => $this->service_name,
            ]);

            $this->updateMode = false;

            // session()->flash('message', 'Service Updated Successfully.');
            $this->successMessage = 'Service Updated Successfully.';

            $this->resetInputFields();

            $this->emit('updateModal');
        }
    }

    public function delete($id)
    {
        if($id) {
            AppBookingService::where('id', $id)->delete();

            session()->flash('message', 'Service deleted successfully');
        }
    }
}
