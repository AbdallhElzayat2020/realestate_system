<footer class="site-footer mt-4">
    <div class="footer-main">
        <div class="container">
            <div class="row g-4 g-lg-5 py-5">
                {{-- العمود الأول: اللوجو + وصف الشركة + تواصل --}}
                <div class="col-lg-4 col-md-6">
                    <div class="footer-brand mb-4">
                        <a href="{{ route('home') }}" class="footer-logo-link d-inline-block">
                            <img src="{{ asset('assets/website/images/footer_logo.png') }}" alt="{{ __('footer.logo_alt') }}" class="footer-logo" />
                        </a>
                    </div>
                    <p class="footer-about text-muted small mb-4">
                        {{ __('home.about_description_1') }}
                    </p>
                    <div class="footer-contact-list">
                        <p class="footer-contact-item mb-2">
                            <i class="fas fa-map-marker-alt footer-contact-icon"></i>
                            <span>{{ __('footer.address') }}</span>
                        </p>
                        <p class="footer-contact-item mb-2">
                            <i class="fas fa-phone footer-contact-icon"></i>
                            <a href="tel:{{ config('site.phone_tel') }}" class="footer-contact-link">{{ config('site.phone') }}</a>
                        </p>
                        <p class="footer-contact-item mb-2">
                            <i class="fas fa-envelope footer-contact-icon"></i>
                            <a href="mailto:{{ config('site.email') }}" class="footer-contact-link">{{ config('site.email') }}</a>
                        </p>
                    </div>
                    <div class="footer-social mt-4">
                        @if (!empty($socialLinksEnabled))
                            @if (!empty($socialLinks['linkedin']))
                                <a href="{{ $socialLinks['linkedin'] }}" target="_blank" rel="noopener noreferrer" class="footer-social-link"
                                    aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                            @endif
                            @if (!empty($socialLinks['instagram']))
                                <a href="{{ $socialLinks['instagram'] }}" target="_blank" rel="noopener noreferrer" class="footer-social-link"
                                    aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                            @endif
                            @if (!empty($socialLinks['x']))
                                <a href="{{ $socialLinks['x'] }}" target="_blank" rel="noopener noreferrer" class="footer-social-link"
                                    aria-label="X"><i class="fa-brands fa-x-twitter"></i></a>
                            @endif
                            @if (!empty($socialLinks['facebook']))
                                <a href="{{ $socialLinks['facebook'] }}" target="_blank" rel="noopener noreferrer" class="footer-social-link"
                                    aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                            @endif
                        @endif
                    </div>
                </div>

                {{-- روابط سريعة --}}
                <div class="col-lg-2 col-md-6">
                    <h5 class="footer-heading">{{ __('footer.quick_links') }}</h5>
                    <ul class="footer-links-list list-unstyled mb-0">
                        <li><a href="{{ route('home') }}">{{ __('footer.home') }}</a></li>
                        <li><a href="{{ route('about') }}">{{ __('footer.about') }}</a></li>
                        <li><a href="{{ route('about') }}#vision-mission">{{ __('footer.vision_mission') }}</a></li>
                        <li><a href="{{ route('services') }}">{{ __('footer.services') }}</a></li>
                        <li><a href="{{ route('projects') }}">{{ __('footer.projects') }}</a></li>
                    </ul>
                </div>

                {{-- آخر الخدمات --}}
                <div class="col-lg-3 col-md-6">
                    <h5 class="footer-heading">{{ __('footer.latest_services') }}</h5>
                    @if(isset($footerServices) && $footerServices->count() > 0)
                        <ul class="footer-links-list list-unstyled mb-0">
                            @foreach($footerServices as $s)
                                <li>
                                    <a href="{{ route('services.show', $s->slug) }}">{{ $s->getTranslation('name', app()->getLocale()) }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('services') }}" class="footer-more-link mt-2 d-inline-block">{{ __('footer.all_services') }} <i class="fas fa-arrow-left ms-1"></i></a>
                    @else
                        <p class="text-muted small mb-0">{{ __('blogs.coming_soon') }}</p>
                    @endif
                </div>

                {{-- آخر الأخبار / المدونة --}}
                <div class="col-lg-3 col-md-6">
                    <h5 class="footer-heading">{{ __('footer.latest_news') }}</h5>
                    @if(isset($footerBlogs) && $footerBlogs->count() > 0)
                        <ul class="footer-links-list list-unstyled mb-0">
                            @foreach($footerBlogs as $b)
                                <li>
                                    <a href="{{ route('blogs.show', $b->slug) }}">{{ \Illuminate\Support\Str::limit($b->getTranslation('title', app()->getLocale()), 40) }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('blogs') }}" class="footer-more-link mt-2 d-inline-block">{{ __('footer.all_blogs') }} <i class="fas fa-arrow-left ms-1"></i></a>
                    @else
                        <p class="text-muted small mb-0">{{ __('blogs.coming_soon') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p class="footer-bottom-copyright mb-2">{{ str_replace(':year', date('Y'), __('footer.copyright')) }}</p>
            <p class="footer-bottom-tagline mb-1">{{ __('footer.tagline') }}</p>
            <a class="footer-bottom-link" href="">
                <p class="text-muted small mb-0">
                    تم التطوير والبرمجة بواسطة عبدالله
                    <a href="https://wa.me/201212484233" target="_blank" rel="noopener noreferrer" class="footer-contact-link ms-1">
                    </a>
                </p>
            </a>
        </div>
    </div>
</footer>
