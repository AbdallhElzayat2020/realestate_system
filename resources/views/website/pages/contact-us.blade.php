@extends('website.layouts.master')
@section('title', 'contact Us')
@section('content')
    <section class="inner-page-header">
        <div class="container">
            <h1 class="inner-page-title">{{ __('contact-us.title') }}</h1>
            <p class="inner-page-subtitle mb-0">{{ __('contact-us.subtitle') }}</p>
            <div class="inner-page-title-line"></div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('header.home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('contact-us.title') }}</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section py-5">
        <div class="container">
            <header class="contact-section-header text-center mb-5">
                <h2 class="contact-section-title mb-2">{{ __('contact-us.title') }}</h2>
                <p class="about-page-subtitle mb-3">{{ __('contact-us.subtitle') }}</p>
                <div class="contact-section-title-line"></div>
            </header>

            <div class="row g-4 align-items-stretch mb-4">
                <!-- Contact Information -->
                <div class="col-lg-4">
                    <div class="contact-info-card contact-block-card p-4 p-lg-5 rounded-4 h-100">
                        <h3 class="contact-info-title mb-4">
                            <i class="fas fa-info-circle me-2"></i>
                            {{ __('contact-us.contact_info_title') }}
                        </h3>

                        <div class="contact-item mb-4">
                            <div class="contact-icon-wrapper">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-details">
                                <h5 class="contact-label">{{ __('contact-us.contact_info_email') }}</h5>
                                <a href="mailto:{{ __('footer.email') }}" class="contact-value">
                                    {{ __('footer.email') }}
                                </a>
                            </div>
                        </div>

                        <div class="contact-item mb-4">
                            <div class="contact-icon-wrapper">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-details">
                                <h5 class="contact-label">{{ __('contact-us.contact_info_phone') }}</h5>
                                <a href="tel:{{ config('site.phone_tel') }}" class="contact-value">{{ config('site.phone') }}</a>
                            </div>
                        </div>

                        <div class="contact-item mb-4">
                            <div class="contact-icon-wrapper">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-details">
                                <h5 class="contact-label">{{ __('contact-us.contact_info_address') }}</h5>
                                <p class="contact-value mb-0">
                                    {{ __('footer.address') }}
                                </p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon-wrapper">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="contact-details">
                                <h5 class="contact-label">{{ __('contact-us.contact_info_working_hours') }}</h5>
                                <p class="contact-value mb-0">
                                    {!! __('contact-us.contact_info_working_hours_value') !!}
                                </p>
                            </div>
                        </div>

                        <div class="social-media-section mt-4 pt-4 border-top">
                            <h5 class="mb-3">{{ __('contact-us.contact_info_follow_us') }}</h5>
                            <div class="social-icons-contact d-flex gap-3">
                                <a href="#" class="social-icon-contact" title="LinkedIn">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="social-icon-contact" title="Instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="social-icon-contact" title="X">
                                    <i class="fab fa-x-twitter"></i>
                                </a>
                                <a href="#" class="social-icon-contact" title="Facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-lg-8">
                    <div class="contact-form-card contact-block-card p-4 p-lg-5 rounded-4 h-100">
                        <h3 class="form-title mb-2">
                            <i class="fas fa-paper-plane me-2"></i>
                            {{ __('contact-us.form_section_title') }}
                        </h3>
                        <p class="text-muted mb-4">{{ __('contact-us.form_intro') }}</p>

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form class="contact-form" action="{{ route('contact-us.store') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="contactName" class="form-label">{{ __('contact-us.form_name') }}</label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control form-control-lg @error('name') is-invalid @enderror"
                                        id="contactName" placeholder="{{ __('contact-us.form_name_placeholder') }}" />
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="contactEmail" class="form-label">{{ __('contact-us.form_email') }}</label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        id="contactEmail" placeholder="{{ __('contact-us.form_email_placeholder') }}" />
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="contactPhone" class="form-label">{{ __('contact-us.form_phone') }}</label>
                                    <input type="tel" name="phone" value="{{ old('phone') }}"
                                        class="form-control form-control-lg @error('phone') is-invalid @enderror"
                                        id="contactPhone" placeholder="{{ __('contact-us.form_phone_placeholder') }}" />
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="contactSubject"
                                        class="form-label">{{ __('contact-us.form_subject') }}</label>
                                    <input type="text" name="subject" value="{{ old('subject') }}"
                                        class="form-control form-control-lg @error('subject') is-invalid @enderror"
                                        id="contactSubject" placeholder="{{ __('contact-us.form_subject_placeholder') }}" />
                                    @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="contactMessage"
                                        class="form-label">{{ __('contact-us.form_message') }}</label>
                                    <textarea name="message"
                                        class="form-control form-control-lg @error('message') is-invalid @enderror"
                                        id="contactMessage" rows="6"
                                        placeholder="{{ __('contact-us.form_message_placeholder') }}">{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg rounded-3 px-5 py-3 w-100">
                                        <i class="fas fa-paper-plane me-2"></i>
                                        {{ __('contact-us.form_send') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="contact-map-block">
                <h3 class="contact-map-title mb-3">
                    <i class="fas fa-map-marker-alt me-2"></i>
                    {{ __('contact-us.map_heading') }}
                </h3>
                <div class="map-container rounded-4 overflow-hidden shadow-sm">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d557.5569846978605!2d46.698021!3d24.6923407!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f036dbadbb1cf%3A0xb9346d69ed59cb6!2zUkhPQTM0MTMsIDM0MTMgSWJuIFpvdWJhaWRhaCwgNzM1OdiMINit2Yog2KfZhNi52YTZitin2IwgUml5YWRoIDEyMjIxLCBTYXVkaSBBcmFiaWE!5e1!3m2!1sen!2seg!4v1771095203922!5m2!1sen!2seg"
                        width="100%" height="420" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection
