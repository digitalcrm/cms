@component('mail::message')
# Message

{{ $customerData->message }}

@component('mail::button', ['url' => $eventURL])
Click Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
