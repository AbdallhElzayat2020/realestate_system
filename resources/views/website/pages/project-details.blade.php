@extends('website.layouts.master')
@section('title', $project->getTranslation('name', app()->getLocale()))
@section('content')
    @php
        $mapTrimmed = $project->map ? trim($project->map) : '';
        $isMapUrl = $mapTrimmed && preg_match('/^https?:\/\//i', $mapTrimmed);
    @endphp
    <header class="project-detail-hero">
        <div class="project-detail-hero-bg"></div>
        <div class="container position-relative">
            <nav aria-label="breadcrumb" class="project-detail-breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('header.home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('projects') }}">{{ __('header.projects') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $project->getTranslation('name', app()->getLocale()) }}</li>
                </ol>
            </nav>
            <div class="project-detail-hero-inner">
                <h1 class="project-detail-hero-title">{{ $project->getTranslation('name', app()->getLocale()) }}</h1>
                <div class="project-detail-hero-line"></div>
                <div class="project-detail-hero-meta">
                    @if($project->project_state)
                        <span class="project-detail-state-badge">{{ __('projects.state_' . $project->project_state) }}</span>
                    @endif
                    @if($project->service)
                        <a href="{{ route('services.show', $project->service) }}" class="project-detail-category-badge">{{ $project->service->getTranslation('name', app()->getLocale()) }}</a>
                    @endif
                    @if($project->brochure)
                        <a href="{{ asset($project->brochure) }}" target="_blank" rel="noopener noreferrer" class="project-detail-map-cta project-detail-hero-map-cta" download>
                            <span class="project-detail-map-cta-icon"><i class="fas fa-file-pdf"></i></span>
                            <span class="project-detail-map-cta-text">{{ __('projects.download_brochure') }}</span>
                            <i class="fas fa-download project-detail-map-cta-arrow"></i>
                        </a>
                    @endif
                    @if($isMapUrl)
                        <a href="{{ $mapTrimmed }}" target="_blank" rel="noopener noreferrer" class="project-detail-map-cta project-detail-hero-map-cta">
                            <span class="project-detail-map-cta-icon"><i class="fas fa-map-marker-alt"></i></span>
                            <span class="project-detail-map-cta-text">{{ __('projects.view_on_map') }}</span>
                            <i class="fas fa-external-link-alt project-detail-map-cta-arrow"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </header>

    {{-- المحتوى: الوصف ثم المعرض ثم الخريطة --}}
    <section class="project-detail-content-section py-5">
        <div class="container">
            @php $description = $project->getTranslation('description', app()->getLocale()); @endphp
            @if ($description)
                <div class="project-detail-body">
                    <div class="project-detail-description">{!! $description !!}</div>
                </div>
            @endif

            @if($project->brochure)
                <div class="mt-4">
                    <a href="{{ asset($project->brochure) }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary" download>
                        <i class="fas fa-file-pdf me-2"></i>{{ __('projects.download_brochure') }}
                    </a>
                </div>
            @endif

            {{-- معرض الصور – بالضغط تفتح في بوب أب مع تنقل --}}
            @if($project->images && count($project->images) > 0)
                <div class="project-detail-gallery mt-5 pt-2">
                    <h3 class="project-detail-section-title mb-3">{{ __('projects.gallery') }}</h3>
                    <div class="row g-3" id="projectGallery">
                        @foreach($project->images as $index => $img)
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="project-detail-gallery-item media-gallery-item rounded-3 overflow-hidden"
                                    data-bs-toggle="modal"
                                    data-bs-target="#projectImageModal"
                                    data-image="{{ asset($img) }}"
                                    data-title="{{ $project->getTranslation('name', app()->getLocale()) }} ({{ $index + 1 }})"
                                    data-index="{{ $index }}"
                                    role="button"
                                    tabindex="0">
                                    <div class="project-gallery-image-wrap">
                                        <img src="{{ asset($img) }}" alt="" loading="lazy">
                                        <span class="project-gallery-overlay"><i class="fas fa-search-plus"></i></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- الخريطة: iframe فقط (الرابط يظهر في الهيدر) --}}
            @if($project->map && !$isMapUrl)
                <div class="project-detail-map-block mt-5 pt-5">
                    <h3 class="project-detail-section-title">{{ __('projects.map') }}</h3>
                    <div class="project-detail-map-wrap rounded-3 overflow-hidden shadow-sm">
                        {!! $project->map !!}
                    </div>
                </div>
            @endif
        </div>
    </section>

    {{-- بوب أب معرض الصور – تنقل بالسهمين --}}
    <div class="modal fade" id="projectImageModal" tabindex="-1" aria-labelledby="projectImageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content project-gallery-modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="projectImageModalLabel">{{ __('projects.gallery_modal_title') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0 position-relative">
                    <button type="button" class="modal-nav-btn modal-nav-prev" id="projectPrevImage" aria-label="{{ __('projects.prev_image') }}">
                        <i class="fas fa-chevron-{{ app()->getLocale() === 'ar' ? 'right' : 'left' }}"></i>
                    </button>
                    <img id="projectModalImage" src="" alt="" class="img-fluid">
                    <button type="button" class="modal-nav-btn modal-nav-next" id="projectNextImage" aria-label="{{ __('projects.next_image') }}">
                        <i class="fas fa-chevron-{{ app()->getLocale() === 'ar' ? 'left' : 'right' }}"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

@push('scripts')
<script>
(function() {
    var modal = document.getElementById('projectImageModal');
    if (!modal) return;
    var gallery = [];
    var currentIndex = 0;
    var items = document.querySelectorAll('#projectGallery .media-gallery-item');
    items.forEach(function(el, i) {
        gallery.push({
            src: el.getAttribute('data-image'),
            title: el.getAttribute('data-title'),
            index: i
        });
    });

    modal.addEventListener('show.bs.modal', function(e) {
        var btn = e.relatedTarget;
        if (btn) {
            currentIndex = parseInt(btn.getAttribute('data-index'), 10) || 0;
        }
        var img = document.getElementById('projectModalImage');
        if (img && gallery[currentIndex]) {
            img.src = gallery[currentIndex].src;
        }
        updateProjectModalNav();
    });

    function updateProjectModalNav() {
        var img = document.getElementById('projectModalImage');
        if (!img || !gallery.length) return;
        img.src = gallery[currentIndex].src;
        document.getElementById('projectImageModalLabel').textContent = gallery[currentIndex].title;
    }

    function projectNav(delta) {
        if (!gallery.length) return;
        currentIndex += delta;
        if (currentIndex < 0) currentIndex = gallery.length - 1;
        if (currentIndex >= gallery.length) currentIndex = 0;
        updateProjectModalNav();
    }

    var prevBtn = document.getElementById('projectPrevImage');
    var nextBtn = document.getElementById('projectNextImage');
    if (prevBtn) prevBtn.addEventListener('click', function(e) { e.stopPropagation(); projectNav(-1); });
    if (nextBtn) nextBtn.addEventListener('click', function(e) { e.stopPropagation(); projectNav(1); });

    modal.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowLeft') { e.preventDefault(); projectNav(-1); }
        if (e.key === 'ArrowRight') { e.preventDefault(); projectNav(1); }
    });
})();
</script>
@endpush
@endsection
