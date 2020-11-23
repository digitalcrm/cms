@component('mail::message')
# Article Post Share

The body of your message. click below button


@component('mail::button', ['url' => $getArticleURL])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
