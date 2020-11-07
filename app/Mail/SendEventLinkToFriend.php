<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEventLinkToFriend extends Mailable
{
    use Queueable, SerializesModels;

    public $customerData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customerData)
    {
        $this->customerData = $customerData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $senderMail = $this->customerData->sender_email;
        $eventURL = $this->customerData->url;

        return $this->from($senderMail)
                    ->markdown('emails.bookings.share-event-link')
                    ->with('eventURL', $eventURL);
    }
}
