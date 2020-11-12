<?php

namespace App\Http\Controllers\Newsletter;

use App\Http\Controllers\Controller;
use App\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
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
}
