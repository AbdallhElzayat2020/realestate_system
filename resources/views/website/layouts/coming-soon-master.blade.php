<!DOCTYPE html>
@php
    $currentLocale = LaravelLocalization::getCurrentLocale();
    $isRTL = $currentLocale === 'ar';
    $htmlLang = $currentLocale;
    $htmlDir = $isRTL ? 'rtl' : 'ltr';
@endphp
<html lang="{{ $htmlLang }}" dir="{{ $htmlDir }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', __('coming-soon.title'))</title>
    <link rel="icon" href="{{ asset('assets/website/images/favicon.png') }}" type="image/x-icon">
    @php
        $bootstrapCSS = $isRTL
            ? 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css'
            : 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css';
    @endphp
    <link href="{{ $bootstrapCSS }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/website/css/style.css') }}" />
    @stack('styles')
</head>
<body class="coming-soon-body">
    @yield('content')
    @stack('scripts')
</body>
</html>
