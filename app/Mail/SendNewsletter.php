<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendNewsletter extends Mailable
{
    use Queueable, SerializesModels;

    public $send_mail_form_data;
    public $subscriber;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subscriber, $send_mail_form_data)
    {
        $this->subscriber = $subscriber;
        $this->send_mail_form_data = $send_mail_form_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->send_mail_form_data->subject;

        return $this->subject($subject)
                    ->markdown('emails.newsletter.send-newsletter')
                    ->with([
                        'mailingData'   => $this->send_mail_form_data,
                        'tokens'        => $this->subscriber->token,
                    ]);
    }
}
