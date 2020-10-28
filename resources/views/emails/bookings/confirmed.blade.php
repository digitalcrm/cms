@component('mail::message')
# Confirmed
### Event Name: {{ $eventDetail->event_name }}
### Event Description: {{ $eventDetail->event_description }}

You have been invited to the following event.

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
###Consultant Name
{{ $eventDetail->user->name }}
{{ config('app.name') }}
@endcomponent
