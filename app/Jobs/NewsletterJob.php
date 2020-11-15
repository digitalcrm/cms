<?php

namespace App\Jobs;

use App\Newsletter;
use App\Mail\SendNewsletter;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class NewsletterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $getAllActiveSubscribers;
    protected $send_mail_form_data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($send_mail_form_data)
    {
        // dd($send_mail_form_data->subject);
        $this->send_mail_form_data = $send_mail_form_data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $getAllActiveSubscribers = Newsletter::isSubscribed()->get(['name','email','token']);

        foreach ($getAllActiveSubscribers as $subscriber) {
            // dd($subscriber->email);
            Mail::to($subscriber->email)->send(new SendNewsletter($subscriber, $this->send_mail_form_data));
        }
    }
}
