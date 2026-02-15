@extends('website.layouts.master')
@section('title', __('header.blogs'))
@section('content')
    <section class="inner-page-header">
        <div class="container">
            <h1 class="inner-page-title">{{ __('header.blogs') }}</h1>
            <div class="inner-page-title-line"></div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('header.home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('header.blogs') }}</li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="inner-page-content">
        <div class="container">
            @if (isset($blogs) && $blogs->count() > 0)
                <div class="row g-4">
                    @foreach ($blogs as $blog)
                        <div class="col-md-6 col-lg-4">
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
                                            <p class="text-muted mb-0 product-desc-preview">{{ \Illuminate\Support\Str::limit(html_entity_decode(strip_tags($content), ENT_QUOTES | ENT_HTML5, 'UTF-8'), 100) }}</p>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center mt-4">
                    {{ $blogs->links() }}
                </div>
            @else
                <p class="lead text-center text-muted">{{ __('blogs.coming_soon') }}</p>
            @endif
        </div>
    </section>
@endsection
