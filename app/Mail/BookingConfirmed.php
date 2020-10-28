<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    public $eventDetail;
    public $customerData;
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customerData, $eventDetail)
    {
        $this->customerData = $customerData;
        $this->eventDetail = $eventDetail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $userMail = $this->eventDetail->user->email;
        // dd($userMail);
        return $this->from($userMail)
                    ->markdown('emails.bookings.confirmed');
    }
}
