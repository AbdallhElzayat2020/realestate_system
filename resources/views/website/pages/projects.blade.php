@extends('website.layouts.master')
@section('title', __('header.projects'))
@section('content')
    <section class="inner-page-header">
        <div class="container">
            <h1 class="inner-page-title">{{ __('header.projects') }}</h1>
            <div class="inner-page-title-line"></div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('header.home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('header.projects') }}</li>
                </ol>
            </nav>
        </div>
    </section>

    <section id="projects" class="inner-page-content">
        <div class="container">
            <div class="row g-4">
                @forelse ($projects as $project)
                    <div class="col-md-6 col-lg-4">
                        <a href="{{ route('projects.show', $project->slug) }}"
                            class="product-card-link text-decoration-none d-block h-100">
                            <div class="card shadow-sm border-0 overflow-hidden product-card h-100">
                                <div class="product-card-image">
                                    @if ($project->thumbnail)
                                        <img src="{{ asset($project->thumbnail) }}"
                                            alt="{{ $project->getTranslation('name', app()->getLocale()) }}">
                                    @else
                                        <div class="d-flex align-items-center justify-content-center h-100 bg-light">
                                            <i class="fas fa-project-diagram fa-3x text-muted"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <h3 class="product-title mb-2">
                                        {{ $project->getTranslation('name', app()->getLocale()) }}
                                    </h3>
                                    @if ($project->category)
                                        <span class="badge bg-secondary mb-1">{{ $project->category->getTranslation('name', app()->getLocale()) }}</span>
                                    @endif
                                    <p class="text-muted small mb-0">{{ $project->slug }}</p>
                                    @php
                                        $description = $project->getTranslation('description', app()->getLocale());
                                    @endphp
                                    @if ($description)
                                        <p class="text-muted mb-0 product-desc-preview">
                                            {{ \Illuminate\Support\Str::limit(html_entity_decode(strip_tags($description), ENT_QUOTES | ENT_HTML5, 'UTF-8'), 120) }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <p class="text-muted">{{ __('products.empty_state') ?? 'No projects yet.' }}</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
