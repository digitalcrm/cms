<?php

namespace App\Http\Livewire\Newsletter;

use App\Mail\ConfirmedNewsletter;
use App\Newsletter;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class StoreNewsletter extends Component
{
    public $name;

    public $email;

    public $successMessage;

    protected $rules = [
        'name' => ['required', 'string', 'max:50', 'unique:newsletters'],
        // 'email' => ['required', 'string', 'email', 'max:255', 'unique:newsletters'],
        'email' => ['required', 'string', 'email', 'max:255'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveSubscribedUser()
    {
        // $validatedData = $this->validate([
        //     'name' => 'required|max:25',
        //     'email' => 'required|',
        // ]);

        $validatedData = $this->validate();

        $validatedData['token'] = Str::random(60);
        $validatedData['isSubscribed'] = false;

        $userIsExists = Newsletter::where('email', $this->email)->first();
        if ( !$userIsExists )
        {
            $userData = Newsletter::create($validatedData);

            $this->successMessage = '<strong>We have sent an email with a confirmation link to your email address.</strong>!
                                    In order to complete the subscription, please click the confirmation link.
                                    💡 Make sure you check your spam/junk folder to find confirmation email from.'.env('APP_NAME');

            Mail::to($this->email)->send(new ConfirmedNewsletter($userData));
        } else {
            $this->successMessage = '<strong>You already Subscribe our Newsletter</strong>! Thanks for showing your interest';
        }
        sleep(1);

        $this->reset(['name', 'email']);
    }

    public function render()
    {
        return view('livewire.newsletter.store-newsletter');
    }
}
