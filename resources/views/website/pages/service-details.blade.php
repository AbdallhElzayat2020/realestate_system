@extends('website.layouts.master')
@section('title', $service->getTranslation('name', app()->getLocale()))
@section('content')
    {{-- هيدر الصفحة: بناءً على النص والمحتوى – بدون اعتماد على البانر --}}
    <section class="service-detail-header py-4">
        <div class="container">
            <nav aria-label="breadcrumb" class="service-detail-breadcrumb mb-3">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('header.home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('services') }}">{{ __('header.services') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $service->getTranslation('name', app()->getLocale()) }}</li>
                </ol>
            </nav>
            <h1 class="service-detail-main-title mb-2">{{ $service->getTranslation('name', app()->getLocale()) }}</h1>
            <div class="service-detail-title-line"></div>
        </div>
    </section>

    {{-- المحتوى: صورة اختيارية (بانر أو ثُمبْنيل) + النص --}}
    <section class="service-detail-content-section py-5">
        <div class="container">
            @php
                $description = $service->getTranslation('description', app()->getLocale());
                $hasImage = $service->banner || $service->thumbnail;
            @endphp

            @if ($hasImage)
                <div class="service-detail-featured-image-wrap rounded-3 overflow-hidden shadow-sm mb-5">
                    <img src="{{ asset($service->banner ?? $service->thumbnail) }}"
                         alt="{{ $service->getTranslation('name', app()->getLocale()) }}"
                         class="service-detail-featured-img"
                         loading="lazy">
                </div>
            @endif

            @if ($description)
                <div class="service-detail-body">
                    <div class="service-detail-description">{!! $description !!}</div>
                </div>
            @endif
        </div>
    </section>

    {{-- Contact Form + Contact Info --}}
    <section class="service-detail-contact-section py-5">
        <div class="container">
            <h2 class="service-detail-contact-heading text-center mb-5">{{ __('contact-us.title') }}</h2>
            <div class="row g-4 align-items-stretch">
                <div class="col-lg-7">
                    <div class="service-detail-form-card p-4 p-lg-5 rounded-4 h-100">
                        <h3 class="service-detail-form-title mb-4">
                            <i class="fas fa-paper-plane me-2"></i>
                            {{ __('contact-us.form_title') }}
                        </h3>
                        <form class="contact-form" action="{{ route('contact-us.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="subject" value="{{ __('header.services') }}: {{ $service->getTranslation('name', app()->getLocale()) }}">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="contactName" class="form-label">{{ __('contact-us.form_name') }}</label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control form-control-lg @error('name') is-invalid @enderror"
                                        id="contactName" placeholder="{{ __('contact-us.form_name_placeholder') }}" />
                                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="contactEmail" class="form-label">{{ __('contact-us.form_email') }}</label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        id="contactEmail" placeholder="{{ __('contact-us.form_email_placeholder') }}" />
                                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="contactPhone" class="form-label">{{ __('contact-us.form_phone') }}</label>
                                    <input type="tel" name="phone" value="{{ old('phone') }}"
                                        class="form-control form-control-lg @error('phone') is-invalid @enderror"
                                        id="contactPhone" placeholder="{{ __('contact-us.form_phone_placeholder') }}" />
                                    @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-12">
                                    <label for="contactMessage" class="form-label">{{ __('contact-us.form_message') }}</label>
                                    <textarea name="message" class="form-control form-control-lg @error('message') is-invalid @enderror"
                                        id="contactMessage" rows="5" placeholder="{{ __('contact-us.form_message_placeholder') }}">{{ old('message') }}</textarea>
                                    @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg rounded-3 px-5 py-3">
                                        <i class="fas fa-paper-plane me-2"></i>
                                        {{ __('contact-us.form_send') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="service-detail-info-card p-4 p-lg-5 rounded-4 h-100">
                        <h3 class="service-detail-info-title mb-4">
                            <i class="fas fa-info-circle me-2"></i>
                            {{ __('contact-us.contact_info_title') }}
                        </h3>
                        <div class="service-detail-contact-item mb-4">
                            <div class="service-detail-contact-icon"><i class="fas fa-envelope"></i></div>
                            <div>
                                <h5 class="service-detail-contact-label">{{ __('contact-us.contact_info_email') }}</h5>
                                <a href="mailto:{{ __('footer.email') }}" class="service-detail-contact-value">{{ __('footer.email') }}</a>
                            </div>
                        </div>
                        <div class="service-detail-contact-item mb-4">
                            <div class="service-detail-contact-icon"><i class="fas fa-phone"></i></div>
                            <div>
                                <h5 class="service-detail-contact-label">{{ __('contact-us.contact_info_phone') }}</h5>
                                <a href="tel:{{ config('site.phone_tel') }}" class="service-detail-contact-value">{{ config('site.phone') }}</a>
                            </div>
                        </div>
                        <div class="service-detail-contact-item mb-4">
                            <div class="service-detail-contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                            <div>
                                <h5 class="service-detail-contact-label">{{ __('contact-us.contact_info_address') }}</h5>
                                <p class="service-detail-contact-value mb-0">{{ __('footer.address') }}</p>
                            </div>
                        </div>
                        <div class="service-detail-contact-item">
                            <div class="service-detail-contact-icon"><i class="fas fa-clock"></i></div>
                            <div>
                                <h5 class="service-detail-contact-label">{{ __('contact-us.contact_info_working_hours') }}</h5>
                                <p class="service-detail-contact-value mb-0">{!! __('contact-us.contact_info_working_hours_value') !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
