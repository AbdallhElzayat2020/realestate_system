<nav id="mainNav" class="navbar navbar-expand-lg bg-body-tertiary fixed-top site-navbar">
    <div class="container px-lg-1">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
            <img src="{{asset('assets/website/images/log.png')}}" alt="{{ __('header.company_logo') }}" height="95"
                class="ms-2 site-logo" />
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="{{ __('header.toggle_menu') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                        aria-current="{{ request()->routeIs('home') ? 'page' : false }}"
                        href="{{ route('home') }}">{{ __('header.home') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                        href="{{ route('about') }}">{{ __('header.about') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('services*') ? 'active' : '' }}"
                        href="{{ route('services') }}">{{ __('header.services') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('projects*') ? 'active' : '' }}"
                        href="{{ route('projects') }}">{{ __('header.projects') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('blogs') ? 'active' : '' }}"
                        href="{{ route('blogs') }}">{{ __('header.blogs') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact-us') ? 'active' : '' }}"
                        href="{{ route('contact-us') }}">{{ __('header.contact_us') }}</a>
                </li>


                <li class="nav-item dropdown">
                    <div class="dropdown">
                        @php
                            $flagSrc = app()->getLocale() === 'ar' ? 'https://flagcdn.com/sa.svg' : 'https://flagcdn.com/gb.svg';
                        @endphp
                        <button id="langBtn"
                            class="btn btn-ghost dropdown-toggle d-flex align-items-center gap-2 nav-link"
                            data-bs-toggle="dropdown" type="button">
                            <img src="{{ $flagSrc }}" width="20" height="14" alt="flag" class="rounded border"
                                referrerpolicy="no-referrer" />
                            <span>{{ LaravelLocalization::getCurrentLocaleNative() }}</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                @php
                                    $itemFlagSrc = $localeCode === 'ar' ? 'https://flagcdn.com/sa.svg' : 'https://flagcdn.com/gb.svg';
                                @endphp
                                <li>
                                    <a class="dropdown-item lang-switch d-flex align-items-center gap-2" rel="alternate"
                                        hreflang="{{ $localeCode }}"
                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, request()->fullUrl(), [], true) }}">
                                        <img src="{{ $itemFlagSrc }}" width="20" height="14" alt="flag"
                                            class="rounded border" referrerpolicy="no-referrer" />
                                        <span>{{ $properties['native'] }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li class="nav-item mt-3 mt-lg-0">
                    @if (!empty($socialLinksEnabled))
                        <div class="social-links d-flex align-items-center gap-2">
                            @if (!empty($socialLinks['linkedin']))
                                <a class="icon-link" href="{{ $socialLinks['linkedin'] }}" target="_blank" rel="noopener noreferrer"
                                    aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                            @endif
                            @if (!empty($socialLinks['instagram']))
                                <a class="icon-link" href="{{ $socialLinks['instagram'] }}" target="_blank" rel="noopener noreferrer"
                                    aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                            @endif
                            @if (!empty($socialLinks['x']))
                                <a class="icon-link" href="{{ $socialLinks['x'] }}" target="_blank" rel="noopener noreferrer"
                                    aria-label="X"><i class="fab fa-x-twitter"></i></a>
                            @endif
                            @if (!empty($socialLinks['facebook']))
                                <a class="icon-link" href="{{ $socialLinks['facebook'] }}" target="_blank" rel="noopener noreferrer"
                                    aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                            @endif
                        </div>
                    @endif
                </li>
                {{-- <li class="nav-item mt-3 mt-lg-0">
                    <a class="btn btn-primary px-4" href="{{ route('quote') }}">{{ __('header.request_quote') }}</a>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>
