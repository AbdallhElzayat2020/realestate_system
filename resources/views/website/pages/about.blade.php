@extends('website.layouts.master')
@section('title', __('about.title'))
@section('content')

    {{-- ١. هيدر الصفحة --}}
    <section class="about-hero">
        <div class="about-hero-overlay"></div>
        <div class="container position-relative">
            <h1 class="about-hero-title">{{ __('about.title') }}</h1>
            <p class="about-hero-tagline">{{ __('about.header_tagline') }}</p>
        </div>
    </section>

    {{-- ٢. من نحن – التعريف --}}
    <section class="about-intro py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="about-intro-card">
                        <p class="about-intro-lead">{{ __('about.story_description_1') }}</p>
                        <p class="about-intro-text">{{ __('about.story_description_2') }}</p>
                        <p class="about-intro-text mb-0">{{ __('about.story_description_3') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ٣. الرؤية والرسالة والأهداف --}}
    <section id="vision-mission" class="about-vision-mission py-5">
        <div class="container">
            <h2 class="about-block-title text-center mb-5">{{ __('about.vision_mission_title') }}</h2>

            <div class="row g-4 mb-5">
                <div class="col-lg-6">
                    <div class="about-vm-card about-vm-card--vision">
                        <div class="about-vm-icon"><i class="fas fa-eye"></i></div>
                        <h3 class="about-vm-heading">{{ __('about.vision_title') }}</h3>
                        <p class="about-vm-text mb-0">{{ __('about.vision_description') }}</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-vm-card about-vm-card--mission">
                        <div class="about-vm-icon"><i class="fas fa-bullseye"></i></div>
                        <h3 class="about-vm-heading">{{ __('about.mission_title') }}</h3>
                        <p class="about-vm-text mb-0">{{ __('about.mission_description') }}</p>
                    </div>
                </div>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-12">
                    <div class="about-vm-card about-vm-card--vision">
                        <div class="about-vm-icon"><i class="fas fa-drafting-compass"></i></div>
                        <h3 class="about-vm-heading">{{ __('about.founders_vision_title') }}</h3>
                        <p class="about-vm-text mb-2">{{ __('about.founders_vision_paragraph_1') }}</p>
                        <p class="about-vm-text mb-2">{{ __('about.founders_vision_paragraph_2') }}</p>
                        <p class="about-vm-text mb-2">{{ __('about.founders_vision_paragraph_3') }}</p>
                        <p class="about-vm-text mb-0">{{ __('about.founders_vision_paragraph_4') }}</p>
                    </div>
                </div>
            </div>

            <div class="about-objectives-wrap" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                <h3 class="about-objectives-title">
                    <i class="fas fa-list-check about-objectives-title-icon"></i>
                    <span>{{ __('about.objectives_title') }}</span>
                </h3>
                <ul class="about-objectives-list">
                    <li><i class="fas fa-check about-objectives-icon"></i><span>{{ __('about.objective_1') }}</span></li>
                    <li><i class="fas fa-check about-objectives-icon"></i><span>{{ __('about.objective_2') }}</span></li>
                    <li><i class="fas fa-check about-objectives-icon"></i><span>{{ __('about.objective_3') }}</span></li>
                    <li><i class="fas fa-check about-objectives-icon"></i><span>{{ __('about.objective_4') }}</span></li>
                    <li><i class="fas fa-check about-objectives-icon"></i><span>{{ __('about.objective_5') }}</span></li>
                    <li><i class="fas fa-check about-objectives-icon"></i><span>{{ __('about.objective_6') }}</span></li>
                    <li><i class="fas fa-check about-objectives-icon"></i><span>{{ __('about.objective_7') }}</span></li>
                </ul>
            </div>
        </div>
    </section>

    {{-- ٤. قيمنا --}}
    <section class="about-values py-5">
        <div class="container">
            <h2 class="about-block-title text-center mb-5">{{ __('about.values_title') }}</h2>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 col-xl">
                    <div class="about-value-card">
                        <div class="about-value-icon"><i class="fas fa-certificate"></i></div>
                        <h4 class="about-value-title">{{ __('about.value_1_title') }}</h4>
                        <p class="about-value-desc mb-0">{{ __('about.value_1_desc') }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl">
                    <div class="about-value-card">
                        <div class="about-value-icon"><i class="fas fa-user-tie"></i></div>
                        <h4 class="about-value-title">{{ __('about.value_2_title') }}</h4>
                        <p class="about-value-desc mb-0">{{ __('about.value_2_desc') }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl">
                    <div class="about-value-card">
                        <div class="about-value-icon"><i class="fas fa-shield-alt"></i></div>
                        <h4 class="about-value-title">{{ __('about.value_3_title') }}</h4>
                        <p class="about-value-desc mb-0">{{ __('about.value_3_desc') }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl">
                    <div class="about-value-card">
                        <div class="about-value-icon"><i class="fas fa-leaf"></i></div>
                        <h4 class="about-value-title">{{ __('about.value_4_title') }}</h4>
                        <p class="about-value-desc mb-0">{{ __('about.value_4_desc') }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl">
                    <div class="about-value-card">
                        <div class="about-value-icon"><i class="fas fa-handshake"></i></div>
                        <h4 class="about-value-title">{{ __('about.value_5_title') }}</h4>
                        <p class="about-value-desc mb-0">{{ __('about.value_5_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(isset($services) && $services->count() > 0)
    {{-- ٥. خدماتنا (ديناميكية من لوحة التحكم) --}}
    <section class="about-services py-5">
        <div class="container">
            <h2 class="about-block-title text-center mb-5">{{ __('about.our_services_title') }}</h2>
            @php $serviceIcons = ['fa-building', 'fa-drafting-compass', 'fa-tasks', 'fa-hard-hat', 'fa-cogs', 'fa-handshake']; @endphp
            <div class="row g-4">
                @foreach($services as $index => $service)
                    @php $icon = $serviceIcons[$index % count($serviceIcons)]; @endphp
                    <div class="col-md-6 col-lg-3">
                        <a href="{{ route('services.show', $service->slug) }}" class="service-card-modern-link text-decoration-none d-block h-100">
                            <div class="service-card-modern h-100">
                                <div class="service-card-modern-media">
                                    @if($service->thumbnail)
                                        <img src="{{ asset($service->thumbnail) }}" alt="{{ $service->getTranslation('name', app()->getLocale()) }}" class="service-card-modern-img" loading="lazy" />
                                    @else
                                        <div class="service-card-modern-icon">
                                            <i class="fas {{ $icon }}"></i>
                                        </div>
                                    @endif
                                </div>
                                <h3 class="service-card-modern-title">{{ $service->getTranslation('name', app()->getLocale()) }}</h3>
                                @php $desc = $service->getTranslation('description', app()->getLocale()); @endphp
                                @if($desc)
                                    <p class="service-card-modern-desc text-muted small mb-0 mt-2">{{ \Illuminate\Support\Str::limit(html_entity_decode(strip_tags($desc), ENT_QUOTES | ENT_HTML5, 'UTF-8'), 120) }}</p>
                                @endif
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('services') }}" class="btn btn-primary btn-lg rounded-3 px-4 py-3 my-3">{{ __('home.services_view_all') }}</a>
            </div>
        </div>
    </section>
    @endif

@endsection
