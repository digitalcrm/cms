@if(!empty($favicon))
    <link rel="icon" type="image/png" sizes="16x16" href="{{ $favicon->faviconURL() }}">
@else
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-cms.ico">
@endif

<link rel="manifest" href="/manifest.json">

<meta name="theme-color" content="#ffffff">
