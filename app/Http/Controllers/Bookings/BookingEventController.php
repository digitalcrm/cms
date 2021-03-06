<?php

namespace App\Http\Controllers\Bookings;

use App\BookingActivity;
use App\BookingEvent;
use App\BookingService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookingEventRequest;
use App\Http\Resources\BookingEventResource;

class BookingEventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = BookingEvent::query();

        if(auth()->user()->hasRole('superadmin')) {

            switch (request('events')) {
            case 'upcoming':
                $bookevents = $query->upcoming()->get();

                break;

            case 'completed':
                $bookevents = $query->completed()->get();

                    break;

            default:
                $bookevents = $query->latest()->get();
                break;
        }

        } else {

            switch (request('events')) {
                case 'upcoming':
                    $bookevents = auth()->user()->bookingEvents()->upcoming()->get();

                    break;

                case 'completed':
                    $bookevents = auth()->user()->bookingEvents()->completed()->get();

                        break;

                default:
                    $bookevents = auth()->user()->bookingEvents()->latest()->get();
                    break;
            }
        }


        return view('bookings.events.index', compact('bookevents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = BookingService::all();
        $activities = BookingActivity::pluck('title','id');
        $timeDuration = config('time_duration.hours');
        // dd($timeDuration);
        return view('bookings.events.create', compact('services', 'timeDuration','activities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingEventRequest $request)
    {
        $bookingEventRequestData = $request->validated();

        // dd($bookingEventRequestData);
        auth()->user()->bookingevents()->create($bookingEventRequestData);

        return redirect(route('bookevents.index',['events'=>'upcoming']))->withMessage('events created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BookingEvent $bookevent)
    {
        return view('bookings.events.show', compact('bookevent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BookingEvent $bookevent)
    {
        try {
            $services = BookingService::all();
            $activities = BookingActivity::pluck('title','id');
            $timeDuration = config('time_duration.hours');

        } catch (\Throwable $e) {

            report($e);

            return false;
        }

        return view('bookings.events.edit', compact('services', 'timeDuration', 'bookevent','activities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookingEventRequest $request, BookingEvent $bookevent)
    {
        $bookingEventRequestData = $request->validated();
        $bookevent->load('bookingService');

        $bookevent->update($bookingEventRequestData);

        return redirect(route('bookevents.index',['events'=>'upcoming']))->withMessage('booking event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingEvent $bookevent)
    {
        $bookevent->delete();

        return redirect()->back()->withMessage($bookevent->event_name . ' deleted successfully');
    }

    public function allBookingEvent()
    {
        return view('bookings.calendar');
    }

    public function calendarlist()
    {
        $event = auth()->user()->bookingEvents()->active()->get();

        return BookingEventResource::collection($event);

    }

}
