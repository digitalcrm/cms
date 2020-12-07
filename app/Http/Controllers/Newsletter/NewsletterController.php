<?php

namespace App\Http\Controllers\Newsletter;

use App\Newsletter;
use App\NewsletterEmail;
use App\Jobs\NewsletterJob;
use App\Mail\SendNewsletter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class NewsletterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['confirm_subscription', 'subscription_delete']);
        $this->middleware(['role:superadmin|admin'])->except(['confirm_subscription', 'subscription_delete']);
    }

    public function subscriber_list()
    {
        $query = Newsletter::query();

        $lists_of_subscribers = $query->getSubscribers(request('subscribed'))->latest()->get();

        return view('newsletter.subscribers', compact('lists_of_subscribers'));
    }

    public function create()
    {
        return view('newsletter.send-newsletter');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'subject' => ['required','string'],
            'message' => ['required','string'],
        ]);

        $send_mail_form_data = NewsletterEmail::create($validatedData);

        dispatch(new NewsletterJob($send_mail_form_data))->delay(now()->addSeconds(5));

        return redirect('newsletters')->withMessage('Mail sent Successfully');
    }

    public function confirm_subscription(Request $request)
    {
        $subscriber = Newsletter::where('token', $request['token'])->firstOrFail();

        // dd('subscribe');
        // if (!empty($request->email) && !empty($request->token)) {
        if (!empty($request->token)) {
            $subscriber->update([
                'isSubscribed' => true,
            ]);

        }
        return view('thank-you');
    }

    public function subscription_delete(Request $request)
    {
        $subscriber = Newsletter::where('token', $request['token'])->firstOrFail();

        // dd('subscribe');
        // if (!empty($request->email) && !empty($request->token)) {
        if (!empty($request->token)) {
            $subscriber->update([
                'isSubscribed' => false,
            ]);

        }
        return view('unsubscribe-thank-you');
    }

    public function sent_email_list()
    {
        $sent_email_lists = NewsletterEmail::all();

        return view('newsletter.sent-newsletter-email-lists', compact('sent_email_lists'));

    }
}
