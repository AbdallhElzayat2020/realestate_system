@extends('website.layouts.master')

@section('title', $product->getTranslation('name', app()->getLocale()))
@section('content')
    <!-- Product Detail Header -->
    <section class="product-detail-hero">
        <div class="container">
            <nav aria-label="breadcrumb" class="product-breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('header.home') ?? 'Home' }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products') }}">{{ __('products.title') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $product->getTranslation('name', app()->getLocale()) }}
                    </li>
                </ol>
            </nav>
            <h1 class="product-detail-title">{{ $product->getTranslation('name', app()->getLocale()) }}</h1>
        </div>
    </section>

    <!-- Product Detail Content -->
    <section class="product-detail-section">
        <div class="container">
            <div class="product-detail-wrapper">
                <div class="product-detail-image-wrap" data-aos="fade-up" data-aos-duration="600">
                    @if ($product->image)
                        <img src="{{ asset($product->image) }}"
                            alt="{{ $product->getTranslation('name', app()->getLocale()) }}">
                    @else
                        <img src="{{ asset('assets/website/images/product_2.png') }}" alt="product">
                    @endif
                </div>
                <div class="product-detail-content" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100">
                    <div class="product-detail-accent"></div>
                    <h2 class="product-detail-name">{{ $product->getTranslation('name', app()->getLocale()) }}</h2>
                    @php
                        $description = $product->getTranslation('description', app()->getLocale());
                    @endphp
                    @if ($description)
                        <div class="product-detail-description">{!! $description !!}</div>
                    @endif

                    <div class="product-detail-actions">
                        <a href="{{ route('quote') }}" class="btn btn-primary btn-lg px-4">
                            <i class="fas fa-file-alt me-2"></i>
                            {{ __('quote.title') ?? 'Request Quote' }}
                        </a>
                        <a href="{{ route('products') }}" class="btn btn-outline-secondary btn-lg px-4">
                            <i class="fas fa-arrow-left me-2"></i>
                            {{ __('home.products_view_all') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
