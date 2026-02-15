<!DOCTYPE html>
@php
    $currentLocale = LaravelLocalization::getCurrentLocale();
    $isRTL = $currentLocale === 'ar';
    $htmlLang = $currentLocale;
    $htmlDir = $isRTL ? 'rtl' : 'ltr';
@endphp
<html lang="{{ $htmlLang }}" dir="{{ $htmlDir }}">

@include('website.layouts.head')

<body>
    {{-- شريط تقدم التمرير – يملأ مع السكرول --}}
    <div class="scroll-progress-wrap" id="scrollProgressWrap" aria-hidden="true">
        <div class="scroll-progress-bar" id="scrollProgressBar"></div>
    </div>

    <!-- Navbar -->
    @include('website.layouts.header')

    <main class="site-main" id="mainContent">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('website.layouts.footer')

    <!-- Floating contact buttons -->
    @include('website.components.social_links')


    @include('website.layouts.scripts')
</body>

</html>
