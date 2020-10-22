<?php

namespace App\Http\Controllers\Bookings;

use App\BookingEvent;
use App\BookingService;
use App\BookingCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Rules\googleCaptcha;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookingHomePageController extends Controller
{
    public function service_has_list_of_events(BookingService $bookservice)
    {
        // $sti = 'Lorem ipsum dolor sit amet consectetur adipisicing elit.';
        // dd(strlen($sti));
        try {
            $events = $bookservice->bookingevents()->get();
        } catch (ModelNotFoundException $exception) {

            return view('errors._model_not_found_exception');
        }

        return view('bookings.services.service_having_events', compact('events'));
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
            'booking_date' => ['required'],
            'customer_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'max:255'],
            'mobile_number' => ['required','numeric'],
            'g-recaptcha-response' => ['required', new googleCaptcha()],
        ]);
            // dd($validatedData);
        $bookDate = request('booking_date');
        $bookDate1 = Carbon::parse($bookDate)->format('Y-m-d H:i:s');

        // dd($request->all());


        $customerData = BookingCustomer::create($validatedData);

        $customerData->bookingevents()->attach(request('eventId'),[
            'booking_date' => $bookDate1,
            'description' => $request->description,
        ]);

        return redirect()->back()->withMessage('event booked successfully');


    }
}


