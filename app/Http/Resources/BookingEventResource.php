<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingEventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * This resource is used for BookingEventController calendar
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'title' => $this->event_name,
            'start' => $this->event_start,
            'end' => $this->event_end,
            'url' => route('event.create',['bookservice' =>$this->bookingService->name, 'bookevent'=>$this->id]),
            'customer' => $this->bookingcustomers->count(),
            'description' => $this->event_description,
        ];
    }
}
