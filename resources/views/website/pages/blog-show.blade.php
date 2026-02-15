@extends('website.layouts.master')
@section('title', $blog->getTranslation('title', app()->getLocale()))
@section('content')
    <section class="blog-detail-header py-4">
        <div class="container">
            <nav aria-label="breadcrumb" class="blog-detail-breadcrumb mb-3">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('header.home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('blogs') }}">{{ __('header.blogs') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ \Illuminate\Support\Str::limit($blog->getTranslation('title', app()->getLocale()), 50) }}</li>
                </ol>
            </nav>
            <h1 class="blog-detail-title">{{ $blog->getTranslation('title', app()->getLocale()) }}</h1>
            <div class="blog-detail-meta text-muted">
                <span class="blog-detail-date">
                    <i class="fas fa-calendar-alt me-1"></i>
                    {{ __('blogs.published_on') }} {{ $blog->created_at->locale(app()->getLocale())->translatedFormat('d F Y') }}
                </span>
            </div>
        </div>
    </section>

    <section class="blog-detail-body py-5">
        <div class="container">
            <div class="row justify-content-center">
                <article class="col-lg-8">
                    @if ($blog->image)
                        <div class="blog-detail-featured-img rounded-3 overflow-hidden mb-4 shadow-sm">
                            <img src="{{ asset($blog->image) }}" alt="{{ $blog->getTranslation('title', app()->getLocale()) }}" class="img-fluid w-100" loading="eager" />
                        </div>
                    @endif
                    @php $content = $blog->getTranslation('content', app()->getLocale()); @endphp
                    @if ($content)
                        <div class="blog-article-body">{!! $content !!}</div>
                    @else
                        <p class="text-muted">{{ __('blogs.coming_soon') }}</p>
                    @endif
                    <div class="blog-detail-actions my-5 pt-4 border-top">
                        <a href="{{ route('blogs') }}" class="btn btn-primary rounded-3 px-4 py-2">
                            <i class="fas fa-arrow-{{ app()->getLocale() === 'ar' ? 'left' : 'right' }} me-2"></i>{{ __('blogs.back_to_blogs') }}
                        </a>
                    </div>
                </article>
            </div>

            @if(isset($relatedBlogs) && $relatedBlogs->count() > 0)
                <div class="blog-related mt-5 pt-5 border-top">
                    <h2 class="blog-related-title mb-4">{{ __('blogs.related_posts') }}</h2>
                    <div class="row g-4">
                        @foreach ($relatedBlogs as $related)
                            <div class="col-md-4">
                                <a href="{{ route('blogs.show', $related->slug) }}" class="blog-related-card text-decoration-none d-block h-100">
                                    <div class="card border-0 shadow-sm h-100 overflow-hidden rounded-3">
                                        @if($related->image)
                                            <img src="{{ asset($related->image) }}" class="card-img-top blog-related-img" alt="{{ $related->getTranslation('title', app()->getLocale()) }}" loading="lazy" />
                                        @else
                                            <div class="blog-related-placeholder card-img-top bg-light d-flex align-items-center justify-content-center">
                                                <i class="fas fa-newspaper fa-2x text-muted"></i>
                                            </div>
                                        @endif
                                        <div class="card-body">
                                            <h3 class="blog-related-card-title">{{ $related->getTranslation('title', app()->getLocale()) }}</h3>
                                            @php $relContent = $related->getTranslation('content', app()->getLocale()); @endphp
                                            @if ($relContent)
                                                <p class="text-muted small mb-0">{{ \Illuminate\Support\Str::limit(html_entity_decode(strip_tags($relContent), ENT_QUOTES | ENT_HTML5, 'UTF-8'), 90) }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
