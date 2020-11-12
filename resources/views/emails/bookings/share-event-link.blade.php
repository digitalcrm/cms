@component('mail::message')
# Message

{{ $customerData->message }}

{{-- Route('public.subscriber.update', ['email' => $subscriber->email, 'token' => $subscriber->token]) --}}
@component('mail::button', ['url' => $eventURL])
Click Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
