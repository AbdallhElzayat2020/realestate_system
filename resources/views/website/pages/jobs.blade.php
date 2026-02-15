@extends('website.layouts.master')
@section('title', 'Jobs')

@section('content')
    <section class="inner-page-header">
        <div class="container">
            <h1 class="inner-page-title">{{ __('jobs.title') }}</h1>
            <div class="inner-page-title-line"></div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('header.home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('jobs.title') }}</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="inner-page-content jobs-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="jobs-intro text-center mb-5">
                        <h2 class="jobs-main-title mb-3">{{ __('jobs.intro_title') }}</h2>
                        <p class="jobs-subtitle">{{ __('jobs.intro_subtitle') }}</p>
                    </div>

                    <div class="jobs-form-card p-4 p-lg-5 rounded-4 shadow-lg">
                        <h3 class="form-title mb-4">
                            <i class="fas fa-briefcase me-2"></i>
                            {{ __('jobs.form_title') }}
                        </h3>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @error('error')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @enderror
                        <form id="jobApplicationForm" method="POST" action="{{ route('jobs.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- Personal Information -->
                            <div class="form-section mb-4">
                                <h4 class="section-title mb-3">
                                    <i class="fas fa-user me-2"></i>
                                    {{ __('jobs.form_personal_info') }}
                                </h4>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="fullName" class="form-label">{{ __('jobs.form_full_name') }}</label>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control form-control-lg" id="fullName"
                                            placeholder="{{ __('jobs.form_full_name_placeholder') }}" />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">{{ __('jobs.form_email') }}</label>
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control form-control-lg" id="email"
                                            placeholder="{{ __('jobs.form_email_placeholder') }}" />
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">{{ __('jobs.form_phone') }}</label>
                                        <input type="tel" name="phone" value="{{ old('phone') }}"
                                            class="form-control form-control-lg" id="phone"
                                            placeholder="{{ __('jobs.form_phone') }}" />
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="position" class="form-label">{{ __('jobs.form_position') }}</label>


                                        <input type="text" name="position" value="{{ old('position') }}"
                                            class="form-control form-control-lg" id="position"
                                            placeholder="{{ __('jobs.form_position') }}" />
                                        @error('position')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="coverLetter"
                                            class="form-label">{{ __('jobs.form_cover_letter') }}</label>
                                        <textarea name="message" value="{{ old('message') }}"
                                            class="form-control form-control-lg" id="coverLetter" rows="5"
                                            placeholder="{{ __('jobs.form_cover_letter_placeholder') }}">{{ old('message') }}</textarea>
                                        @error('message')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="cvFile" class="form-label">{{ __('jobs.form_cv_file') }}</label>
                                        <input type="file" name="resume" class="form-control form-control-lg" id="cvFile"
                                            accept=".pdf" />
                                        <small class="form-text text-muted">{{ __('jobs.form_cv_file_size') }}</small>
                                        @error('resume')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Terms and Conditions -->
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" id="terms" />
                                <label class="form-check-label" for="terms">
                                    {{ __('jobs.form_terms') }} <a href="#"
                                        class="text-primary">{{ __('jobs.form_terms_link') }}</a>
                                    {{ __('jobs.form_terms_text') }}
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg rounded-3 py-3">
                                    <i class="fas fa-paper-plane me-2"></i>
                                    {{ __('jobs.form_submit') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
