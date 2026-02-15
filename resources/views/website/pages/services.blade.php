@extends('website.layouts.master')
@section('title', __('header.services'))
@section('content')
    <section class="inner-page-header">
        <div class="container">
            <h1 class="inner-page-title">{{ __('header.services') }}</h1>
            <div class="inner-page-title-line"></div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('header.home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('header.services') }}</li>
                </ol>
            </nav>
        </div>
    </section>

    @php
        $serviceIcons = ['fa-building', 'fa-globe-americas', 'fa-chart-line', 'fa-key', 'fa-lightbulb', 'fa-dollar-sign', 'fa-cogs', 'fa-handshake'];
    @endphp

    <section class="inner-page-content services-overview-section" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <div class="container">
            <header class="section-header">
                <h2 class="section-header__title">{{ __('home.services_title') }}</h2>
                <div class="section-header__line"></div>
            </header>

            <div class="row g-4">
                @forelse ($services as $index => $service)
                    @php $icon = $serviceIcons[$index % count($serviceIcons)]; @endphp
                    <div class="col-md-6 col-lg-4">
                        <a href="{{ route('services.show', $service->slug) }}"
                            class="service-card-modern-link text-decoration-none d-block h-100">
                            <div class="service-card-modern h-100">
                                <div class="service-card-modern-media">
                                    @if ($service->thumbnail)
                                        <img src="{{ asset($service->thumbnail) }}" alt="{{ $service->getTranslation('name', app()->getLocale()) }}" class="service-card-modern-img" loading="lazy">
                                    @else
                                        <div class="service-card-modern-icon">
                                            <i class="fas {{ $icon }}"></i>
                                        </div>
                                    @endif
                                </div>
                                <h3 class="service-card-modern-title">{{ $service->getTranslation('name', app()->getLocale()) }}</h3>
                                @php $desc = $service->getTranslation('description', app()->getLocale()); @endphp
                                @if ($desc)
                                    <p class="service-card-modern-desc text-muted small mb-0 mt-2">{{ \Illuminate\Support\Str::limit(html_entity_decode(strip_tags($desc), ENT_QUOTES | ENT_HTML5, 'UTF-8'), 80) }}</p>
                                @endif
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="services-overview-empty text-center py-5">
                            <i class="fas fa-concierge-bell fa-3x text-muted mb-3 opacity-50"></i>
                            <p class="text-muted mb-0">{{ __('products.empty_state') }}</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
