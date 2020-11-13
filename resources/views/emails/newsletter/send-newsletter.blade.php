@component('mail::message')
# {{$mailingData->subject}}

{!!  $mailingData->message !!}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}

---

You received this email because you subscribed at [{{ env('APP_NAME') }}]({{ env('APP_URL') }}). [Unsubscribe]({{ route('newsletters.unsubscribe', ['token' => $tokens]) }})

@endcomponent
