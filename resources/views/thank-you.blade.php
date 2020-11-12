<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/thankyou.css') }}">
</head>
<body>
    <div class="header-custom email-signup-thankyou">
        <div class="content">
            <div class="left-hole"></div>
            <div class="right-hole"></div>
            <div class="main-content">
                <h3 class="text-center">{{ env('APP_NAME') }}</h3>
                <p class="text-justify font-weight-bold h3">Subscription Confirmed</p>
                <p class="text-justify">Your subscription to our list has been confirmed.</p>
                <p class="text-justify">Thank you for subscribing!</p>

                <a href="{{ route('home') }}" class="btn btn-info">Continue to our Website</a>
            </div>

        </div>
    </div>

</body>
</html>


