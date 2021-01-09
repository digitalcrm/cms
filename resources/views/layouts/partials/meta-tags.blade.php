<!-- Primary Meta Tags -->
<title>@yield('title', config('app.name'))</title>

<meta name="title" content="@yield('title', config('app.name'))">
<meta name="description" content="@yield('description', config('app.name'))">

<!-- Google / Search Engine Tags -->
<meta itemprop="name" content="@yield('title', config('app.name'))">
<meta itemprop="description" content="@yield('description', config('app.name'))">
{{-- <meta itemprop="image" content=""> --}}

<!-- Open Graph / Facebook -->
{{-- <meta property="og:type" content="website"> --}}
<meta property="og:url" content="@yield('url', url()->full())">
<meta property="og:title" content="@yield('title', config('app.name'))">
<meta property="og:description" content="@yield('description', config('app.name'))">
{{-- <meta property="og:image" content=""> --}}

<!-- Twitter -->
{{-- <meta property="twitter:card" content="summary_large_image"> --}}
<meta property="twitter:url" content="@yield('url', url()->full())">
<meta property="twitter:title" content="@yield('title', config('app.name'))">
<meta property="twitter:description" content="@yield('description', config('app.name'))">
{{-- <meta property="twitter:image" content=""> --}}

