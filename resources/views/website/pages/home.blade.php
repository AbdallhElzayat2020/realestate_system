@extends('website.layouts.master')
@section('title', 'home')
@section('content')
   {{-- Banner --}}
    <section class="hero-section">
        <div class="hero-bg-image" style="background-image: url('{{ asset('assets/website/images/haus_bg.jpeg') }}');"></div>
        <div class="hero-bg-shine"></div>
        <div class="overlay-dark"></div>
        <div class="hero-content text-white">
            <div class="container">
                <h5 class="hero-text hero-subtitle mb-3">{{ __('home.hero_welcome') }}</h5>
                <h1 class="display-4 fw-bold mb-4 hero-text hero-title">{{ __('home.hero_company_name') }}</h1>
                <p class="lead mb-2 hero-text hero-desc">{{ __('home.hero_tagline') }}</p>
                <p class="mb-4 hero-text hero-desc opacity-90">{{ __('home.hero_description') }}</p>
                <div class="d-flex flex-wrap gap-2">
                    <a href="#about" class="btn btn-primary btn-lg rounded-4 hero-cta">
                        {{ __('home.hero_more_about') }}
                    </a>
                    <a href="{{ route('projects') }}" class="btn btn-outline-primary btn-lg rounded-4">
                        {{ __('home.hero_projects_cta') }}
                    </a>
                    <a href="{{ route('contact-us') }}" class="btn btn-outline-primary btn-lg rounded-4">
                        {{ __('home.hero_consult_cta') }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- About --}}
    <section id="about" class="home-section about-section py-5">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-md-6 order-md-1 order-2" data-aos="fade-up" data-aos-duration="600">
                    <h2 class="section-title mb-4">{{ __('home.about_title') }}</h2>
                    <p class="text-intro mt-2">{{ __('home.about_description_1') }}</p>
                    <p class="text-intro mt-2">{{ __('home.about_description_2') }}</p>
                    <p class="text-intro mt-2">{{ __('home.about_description_3') }}</p>
                    <a href="{{ route('about') }}" class="btn btn-primary btn-about-cta mt-3 px-4 py-3 rounded-3">{{ __('home.about_discover_products') }}</a>
                </div>
                <div class="col-md-6 order-md-2 order-1 mb-4 mb-md-0" data-aos="fade-up" data-aos-duration="600" data-aos-delay="150">
                    <div class="about-section-image-wrap rounded-3 overflow-hidden shadow-sm">
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&q=80" class="img-fluid" alt="{{ __('home.about_title') }}" loading="lazy" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(isset($services) && $services->count() > 0)
    @php
        $serviceIcons = ['fa-building', 'fa-globe-americas', 'fa-chart-line', 'fa-key', 'fa-lightbulb', 'fa-dollar-sign', 'fa-cogs', 'fa-handshake'];
    @endphp
    <section id="services" class="py-5 light_background home-services-section">
        <div class="container">
            <header class="section-header" data-aos="fade-up" data-aos-duration="500">
                <h2 class="section-header__title">{{ __('home.services_title') }}</h2>
                <div class="section-header__line"></div>
            </header>
            <div class="row g-4">
                @foreach($services as $index => $service)
                    @php $icon = $serviceIcons[$index % count($serviceIcons)]; @endphp
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="500" data-aos-delay="{{ min($index * 80, 240) }}">
                        <a href="{{ route('services.show', $service->slug) }}" class="service-card-modern-link text-decoration-none d-block h-100">
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
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('services') }}" class="btn btn-primary">{{ __('home.services_view_all') }}</a>
            </div>
        </div>
    </section>
    @endif

    {{-- Stats --}}
    @php
        $statNumbers = [__('home.stat_1_number'), __('home.stat_2_number'), __('home.stat_3_number'), __('home.stat_4_number')];
        $statParsed = array_map(function ($s) {
            if (preg_match('/^(\d+)(.*)$/', $s, $m)) {
                return ['count' => (int) $m[1], 'suffix' => $m[2]];
            }
            return ['count' => 0, 'suffix' => $s];
        }, $statNumbers);
    @endphp
    <section id="stats" class="stats-section">
        <div class="container">
            <header class="section-header section-header--light" data-aos="fade-up" data-aos-duration="500">
                <h2 class="section-header__title">{{ __('home.stats_title') }}</h2>
                <div class="section-header__line"></div>
            </header>
            <div class="row g-4 justify-content-center stats-row">
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">
                    <div class="stat-card">
                        <div class="stat-number stats-counter" data-count="{{ $statParsed[0]['count'] }}" data-suffix="{{ $statParsed[0]['suffix'] }}" data-duration="2000">0{{ $statParsed[0]['suffix'] }}</div>
                        <p class="stat-label">{{ __('home.stat_1_label') }}</p>
                    </div>
                </div>
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-duration="500" data-aos-delay="150">
                    <div class="stat-card">
                        <div class="stat-number stats-counter" data-count="{{ $statParsed[1]['count'] }}" data-suffix="{{ $statParsed[1]['suffix'] }}" data-duration="2000">0{{ $statParsed[1]['suffix'] }}</div>
                        <p class="stat-label">{{ __('home.stat_2_label') }}</p>
                    </div>
                </div>
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200">
                    <div class="stat-card">
                        <div class="stat-number stats-counter" data-count="{{ $statParsed[2]['count'] }}" data-suffix="{{ $statParsed[2]['suffix'] }}" data-duration="2000">0{{ $statParsed[2]['suffix'] }}</div>
                        <p class="stat-label">{{ __('home.stat_3_label') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(isset($projects) && $projects->count() > 0)
    <!-- 5. مشاريعنا -->
    <section id="projects" class="home-projects-section py-5">
        <div class="container">
            <header class="section-header" data-aos="fade-up" data-aos-duration="500">
                <h2 class="section-header__title">{{ __('home.projects_title') }}</h2>
                <div class="section-header__line"></div>
            </header>
            <div class="row g-4">
                @foreach($projects as $index => $project)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="500" data-aos-delay="{{ min($index * 80, 240) }}">
                        <a href="{{ route('projects.show', $project->slug) }}" class="project-card-link text-decoration-none d-block h-100">
                            <div class="project-card card border-0 overflow-hidden h-100">
                                <div class="project-card-image">
                                    @if ($project->thumbnail)
                                        <img src="{{ asset($project->thumbnail) }}" alt="{{ $project->getTranslation('name', app()->getLocale()) }}" loading="lazy">
                                    @else
                                        <div class="project-card-placeholder">
                                            <i class="fas fa-project-diagram"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="project-card-body card-body">
                                    <h3 class="project-card-title">{{ $project->getTranslation('name', app()->getLocale()) }}</h3>
                                    @if ($project->service)
                                        <span class="project-card-badge">{{ $project->service->getTranslation('name', app()->getLocale()) }}</span>
                                    @endif
                                    @php $desc = $project->getTranslation('description', app()->getLocale()); @endphp
                                    @if ($desc)
                                        <p class="project-card-desc">{{ \Illuminate\Support\Str::limit(html_entity_decode(strip_tags($desc), ENT_QUOTES | ENT_HTML5, 'UTF-8'), 100) }}</p>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('projects') }}" class="btn btn-primary btn-projects-cta rounded-3 px-4 py-3">{{ __('home.projects_view_all') }}</a>
            </div>
        </div>
    </section>
    @endif

    @php
        $activePartners = isset($partners) ? $partners->where('status', 'active') : collect();
    @endphp
    @if($activePartners->count() > 0)
    <!-- 6. شركاء النجاح -->
    <section id="partners" class="py-5 light_background">
        <div class="container">
            <header class="section-header" data-aos="fade-up" data-aos-duration="500">
                <h2 class="section-header__title">{{ __('home.partners_title') }}</h2>
                <p class="section-header__subtitle">{{ __('home.partners_subtitle') }}</p>
                <div class="section-header__line"></div>
            </header>
            <div class="row justify-content-center">
                    <div class="col-12" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">
                        <div class="d-flex flex-wrap justify-content-center align-items-center gap-4 py-4">
                            @foreach($activePartners as $partner)
                                <div class="partners-card rounded-3 p-4 bg-white shadow-sm border-0 text-center">
                                    @if($partner->link)
                                        <a href="{{ $partner->link }}" target="_blank" rel="noopener" class="partners-card-link text-decoration-none d-block">
                                            @if($partner->logo)
                                                <img src="{{ asset($partner->logo) }}" alt="{{ $partner->name }}" class="partners-card-logo" loading="lazy">
                                            @else
                                                <span class="partners-card-placeholder"><i class="fas fa-building"></i></span>
                                            @endif
                                        </a>
                                    @else
                                        <div class="partners-card-inner">
                                            @if($partner->logo)
                                                <img src="{{ asset($partner->logo) }}" alt="{{ $partner->name }}" class="partners-card-logo" loading="lazy">
                                            @else
                                                <span class="partners-card-placeholder"><i class="fas fa-building"></i></span>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
        </div>
    </section>
    @endif

    <!-- 7. لماذا تختارنا -->
    <section id="why-us" class="why-choose-section py-5">
        <div class="container">
            <header class="section-header" data-aos="fade-up" data-aos-duration="500">
                <h2 class="section-header__title">{{ __('home.why_choose_us_title') }}</h2>
                <p class="section-header__subtitle">{{ __('home.why_choose_us_subtitle') }}</p>
                <div class="section-header__line"></div>
            </header>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="500" data-aos-delay="80">
                    <article class="why-choose-card h-100">
                        <div class="why-choose-card__icon">
                            <i class="fas fa-award"></i>
                        </div>
                        <h3 class="why-choose-card__title">{{ __('home.why_1_title') }}</h3>
                        <p class="why-choose-card__desc">{{ __('home.why_1_desc') }}</p>
                    </article>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="500" data-aos-delay="160">
                    <article class="why-choose-card h-100">
                        <div class="why-choose-card__icon">
                            <i class="fas fa-landmark"></i>
                        </div>
                        <h3 class="why-choose-card__title">{{ __('home.why_2_title') }}</h3>
                        <p class="why-choose-card__desc">{{ __('home.why_2_desc') }}</p>
                    </article>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="500" data-aos-delay="240">
                    <article class="why-choose-card why-choose-card--last h-100">
                        <div class="why-choose-card__icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h3 class="why-choose-card__title">{{ __('home.why_3_title') }}</h3>
                        <p class="why-choose-card__desc">{{ __('home.why_3_desc') }}</p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    @if(isset($homeBlogs) && $homeBlogs->count() > 0)
    <!-- المدونات – آخر قسم في الصفحة الرئيسية -->
    <section id="home-blogs" class="home-section home-blogs-section py-5">
        <div class="container">
            <header class="section-header" data-aos="fade-up" data-aos-duration="500">
                <h2 class="section-header__title">{{ __('home.blogs_section_title') }}</h2>
                <div class="section-header__line"></div>
            </header>
            <div class="row g-4">
                    @foreach ($homeBlogs as $index => $blog)
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="500" data-aos-delay="{{ min($index * 80, 240) }}">
                            <a href="{{ route('blogs.show', $blog->slug) }}" class="product-card-link text-decoration-none d-block h-100">
                                <div class="card shadow-sm border-0 overflow-hidden product-card h-100">
                                    <div class="product-card-image">
                                        @if ($blog->image)
                                            <img src="{{ asset($blog->image) }}" alt="{{ $blog->getTranslation('title', app()->getLocale()) }}">
                                        @else
                                            <div class="d-flex align-items-center justify-content-center h-100 bg-light">
                                                <i class="fas fa-newspaper fa-3x text-muted"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <h3 class="product-title mb-2">{{ $blog->getTranslation('title', app()->getLocale()) }}</h3>
                                        @php $content = $blog->getTranslation('content', app()->getLocale()); @endphp
                                        @if ($content)
                                            <p class="text-muted mb-0 product-desc-preview">{{ \Illuminate\Support\Str::limit(html_entity_decode(strip_tags($content), ENT_QUOTES | ENT_HTML5, 'UTF-8'), 90) }}</p>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="text-center my-4">
                    <a href="{{ route('blogs') }}" class="btn btn-primary">{{ __('home.blogs_view_all') }}</a>
                </div>
        </div>
    </section>
    @endif

    @if(isset($testimonials) && $testimonials->count() > 0)
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var el = document.querySelector('.testimonials-swiper');
            if (!el) return;
            new Swiper('.testimonials-swiper', {
                loop: true,
                autoplay: { delay: 5000, disableOnInteraction: false },
                pagination: { el: '.testimonials-pagination', clickable: true },
                navigation: {
                    nextEl: '.testimonials-next',
                    prevEl: '.testimonials-prev',
                },
                slidesPerView: 1,
                spaceBetween: 24,
                breakpoints: {
                    768: { slidesPerView: 1 },
                    992: { slidesPerView: 2 },
                },
                grabCursor: true,
                effect: 'slide',
            });
        });
    </script>
    @endpush
    @endif
@endsection
