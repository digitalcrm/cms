<?php

namespace App\Http\Controllers\Bookings;

use App\BookingService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('bookings.services.homepagebooking', [
            'services' => BookingService::all(),
        ]);
    }
}
