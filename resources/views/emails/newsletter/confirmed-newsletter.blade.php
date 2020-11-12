@component('mail::message')
# Please Confirm Subscription

You have subscribed for Digital_CMS product. To confirm your subscription please click the button below.

@component('mail::button', ['url' => $subscriptionURL])
Yes, Subscribe Me to the list
@endcomponent

If you recieve this email by mistake, simply delete it. You won't be subscribed if you don't click the button above.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
