<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'event_name' => ['required', 'string', 'max:100'],
            'booking_service_id' => ['required', 'not_in:0'],
            'booking_activity_id' => ['required', 'not_in:0'],
            'duration' => ['required', 'not_in:0'],
            'price' => ['required', 'string'],
            'event_description' => ['max:255'],
            'event_start' => ['required', 'date'],
            'event_end' => ['required', 'date'],
        ];
    }
}
