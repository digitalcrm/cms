<?php

namespace App\Http\Controllers\Bookings;

use App\BookingEvent;
use App\BookingService;
use App\BookingCustomer;
use App\Rules\googleCaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Mail\BookingConfirmed;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookingHomePageController extends Controller
{
    public function service_has_list_of_events(BookingService $bookservice)
    {
        // $sti = 'Lorem ipsum dolor sit amet consectetur adipisicing elit.';
        // dd(strlen($sti));
        try {
            $events = $bookservice->bookingevents()
                                    ->active()
                                    ->endEvent()
                                    ->get();
        } catch (ModelNotFoundException $exception) {

            return view('errors._model_not_found_exception');
        }

        return view('bookings.services.service_having_events', compact('events','bookservice'));
    }

    public function create(BookingService $bookservice , BookingEvent $bookevent)
    {
        // dd($bookevent->booking_service->name);
        return view('bookings.booking_form', compact('bookservice', 'bookevent'));

    }

    public function store(Request $request)
    {
        // dd($request->eventId);
        $validatedData = $request->validate([
            'customer_name' => ['required', 'string', 'max:100'],
            'start_from' => ['required'],
            'to_end' => ['required'],
            'time' => ['required'],
            'email' => ['required', 'string', 'max:255'],
            'mobile_number' => ['required','numeric'],
            'g-recaptcha-response' => ['required', new googleCaptcha()],
        ]);

        $startDateTime = request('start_from').' '.request('time');
        $endDateTime = request('to_end').' '.request('time');
        // dd($startDateTime);

        $validatedData['booking_event_id'] = $request->eventId;

        $validatedData['user_id'] = $request->userId;

        $validatedData['start_from'] = $startDateTime;

        $validatedData['to_end'] = $endDateTime;

        // dd($validatedData);
        $customerData = BookingCustomer::create($validatedData);

        $eventDetail = BookingEvent::findOrFail($request->eventId);

        Mail::to($customerData->email)->send(new BookingConfirmed($customerData, $eventDetail));


        return redirect()->back()->withMessage('event booked successfully! please check your email');


    }
}


