<?php

namespace App\Http\Controllers\Ajax;

use App\BookingEvent;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{

    public function userStatus(Request $request)
    {
        $user = User::find($request->userId);

        $user->isActive = $request->userStatus;

        $user->save();

        return response()->json(['success'=>'user status changed succesfully']);
    }

    public function eventStatus(Request $request)
    {
        $bookingEvent = BookingEvent::find($request->eventId);

        $bookingEvent->isActive = $request->eventStatus;

        $bookingEvent->save();

        return response()->json(['success'=>'Event Status changed succesfully']);
    }


}
