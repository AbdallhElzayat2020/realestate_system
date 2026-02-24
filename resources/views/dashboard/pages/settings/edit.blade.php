@extends('dashboard.layouts.master')
@section('title', 'Settings')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Site Settings</h5>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('dashboard.settings.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label" for="coming_soon_enabled">Coming Soon Mode</label>
                            <div class="col-sm-9">
                                <div class="form-check form-switch mt-2">
                                    <input class="form-check-input" type="checkbox" id="coming_soon_enabled"
                                        name="coming_soon_enabled" value="1"
                                        {{ old('coming_soon_enabled', $coming_soon_enabled) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="coming_soon_enabled">
                                        When enabled, visitors will see the Coming Soon page instead of the website.
                                    </label>
                                </div>
                                <small class="text-muted d-block mt-1">
                                    Admin panel and <code>/preview</code> stay accessible.
                                </small>
                            </div>
                        </div>

                        <hr class="my-4">

                        <h6 class="mb-3">Social Media</h6>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label" for="social_links_enabled">Show social icons</label>
                            <div class="col-sm-9">
                                <div class="form-check form-switch mt-2">
                                    <input class="form-check-input" type="checkbox" id="social_links_enabled"
                                        name="social_links_enabled" value="1"
                                        {{ old('social_links_enabled', $social_links_enabled) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="social_links_enabled">
                                        Show social icons in the navbar and footer.
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label" for="social_linkedin_url">LinkedIn URL</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control @error('social_linkedin_url') is-invalid @enderror"
                                    id="social_linkedin_url" name="social_linkedin_url"
                                    value="{{ old('social_linkedin_url', $social_linkedin_url) }}"
                                    placeholder="https://www.linkedin.com/company/..." />
                                @error('social_linkedin_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label" for="social_instagram_url">Instagram URL</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control @error('social_instagram_url') is-invalid @enderror"
                                    id="social_instagram_url" name="social_instagram_url"
                                    value="{{ old('social_instagram_url', $social_instagram_url) }}"
                                    placeholder="https://www.instagram.com/..." />
                                @error('social_instagram_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label" for="social_x_url">X URL</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control @error('social_x_url') is-invalid @enderror"
                                    id="social_x_url" name="social_x_url" value="{{ old('social_x_url', $social_x_url) }}"
                                    placeholder="https://x.com/..." />
                                @error('social_x_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label" for="social_facebook_url">Facebook URL</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control @error('social_facebook_url') is-invalid @enderror"
                                    id="social_facebook_url" name="social_facebook_url"
                                    value="{{ old('social_facebook_url', $social_facebook_url) }}"
                                    placeholder="https://www.facebook.com/..." />
                                @error('social_facebook_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <hr class="my-4">

                        <h6 class="mb-3">Floating Contact Buttons</h6>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label" for="contact_buttons_enabled">Enable buttons</label>
                            <div class="col-sm-9">
                                <div class="form-check form-switch mt-2">
                                    <input class="form-check-input" type="checkbox" id="contact_buttons_enabled"
                                        name="contact_buttons_enabled" value="1"
                                        {{ old('contact_buttons_enabled', $contact_buttons_enabled) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="contact_buttons_enabled">
                                        Show WhatsApp / Call buttons on the website.
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label" for="whatsapp_url">WhatsApp URL</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('whatsapp_url') is-invalid @enderror"
                                    id="whatsapp_url" name="whatsapp_url" value="{{ old('whatsapp_url', $whatsapp_url) }}"
                                    placeholder="https://wa.me/9665..." />
                                @error('whatsapp_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted d-block mt-1">Example: <code>https://wa.me/966533893288</code></small>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label" for="phone_button_enabled">Call button</label>
                            <div class="col-sm-9">
                                <div class="form-check form-switch mt-2">
                                    <input class="form-check-input" type="checkbox" id="phone_button_enabled"
                                        name="phone_button_enabled" value="1"
                                        {{ old('phone_button_enabled', $phone_button_enabled) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="phone_button_enabled">
                                        Show call button (uses <code>site.phone_tel</code>).
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="ti ti-check me-1"></i>
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

