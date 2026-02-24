@extends('website.layouts.coming-soon-master')

@section('title', __('coming-soon.title'))

@push('styles')
    <style>
        /* ========== Coming Soon – Real Estate Theme ========== */
        .coming-soon-body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            min-height: 100vh;
        }

        .coming-soon-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            background: linear-gradient(135deg, #0b0f1a 0%, #1a2332 40%, #0f1623 100%);
            color: #fff;
            text-align: center;
            padding: 2rem 1rem;
        }

        .coming-soon-page::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(ellipse 80% 50% at 50% 20%, rgba(246, 175, 71, 0.08) 0%, transparent 50%),
                radial-gradient(ellipse 60% 40% at 80% 80%, rgba(104, 66, 80, 0.12) 0%, transparent 45%);
            pointer-events: none;
        }

        .coming-soon-page .container {
            position: relative;
            z-index: 1;
        }

        .coming-soon-logo {
            margin-bottom: 2rem;
        }

        .coming-soon-logo img {
            height: 56px;
            width: auto;
        }

        .coming-soon-icon-wrap {
            width: 100px;
            height: 100px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(145deg, var(--brand-primary), var(--brand-accent));
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 12px 40px rgba(246, 175, 71, 0.25);
            animation: comingSoonIconPulse 3s ease-in-out infinite;
        }

        .coming-soon-icon-wrap i {
            font-size: 2.5rem;
            color: #fff;
        }

        @keyframes comingSoonIconPulse {

            0%,
            100% {
                transform: scale(1);
                box-shadow: 0 12px 40px rgba(246, 175, 71, 0.25);
            }

            50% {
                transform: scale(1.05);
                box-shadow: 0 16px 48px rgba(246, 175, 71, 0.35);
            }
        }

        .coming-soon-page h1 {
            font-size: clamp(1.75rem, 5vw, 2.5rem);
            font-weight: 700;
            margin-bottom: 0.75rem;
            color: #fff;
        }

        .coming-soon-page .company-name {
            font-size: clamp(1.1rem, 3vw, 1.35rem);
            color: var(--brand-primary);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .coming-soon-page .tagline {
            font-size: 0.95rem;
            opacity: 0.9;
            margin-bottom: 2rem;
            max-width: 420px;
            margin-left: auto;
            margin-right: auto;
        }

        .coming-soon-page .subheading {
            font-size: 1rem;
            opacity: 0.85;
            max-width: 520px;
            margin: 0 auto 2.5rem;
            line-height: 1.7;
        }

        .coming-soon-notify {
            max-width: 400px;
            margin: 0 auto 2rem;
        }

        .coming-soon-notify .form-control {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
            padding: 0.85rem 1.25rem;
            border-radius: 12px;
        }

        .coming-soon-notify .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .coming-soon-notify .form-control:focus {
            background: rgba(255, 255, 255, 0.12);
            border-color: var(--brand-primary);
            box-shadow: 0 0 0 3px rgba(246, 175, 71, 0.2);
            color: #fff;
        }

        .coming-soon-notify .btn-primary {
            background: linear-gradient(135deg, var(--brand-primary), var(--brand-accent));
            border: none;
            padding: 0.85rem 1.75rem;
            border-radius: 12px;
            font-weight: 600;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .coming-soon-notify .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(246, 175, 71, 0.4);
        }

        .coming-soon-decor {
            position: absolute;
            opacity: 0.15;
            pointer-events: none;
        }

        .coming-soon-decor i {
            font-size: 4rem;
            color: var(--brand-primary);
        }

        .coming-soon-decor--building {
            top: 15%;
            left: 10%;
        }

        .coming-soon-decor--key {
            bottom: 20%;
            right: 12%;
        }

        .coming-soon-decor--home {
            top: 25%;
            right: 8%;
        }

        .coming-soon-decor--chart {
            bottom: 25%;
            left: 10%;
        }

        @media (max-width: 768px) {
            .coming-soon-decor {
                display: none;
            }
        }

        .coming-soon-lang {
            position: absolute;
            top: 1.5rem;
            inset-inline-end: 1.5rem;
            z-index: 2;
        }

        .coming-soon-lang a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-size: 0.9rem;
            padding: 0.35rem 0.75rem;
            border-radius: 8px;
            transition: color 0.2s, background 0.2s;
        }

        .coming-soon-lang a:hover {
            color: var(--brand-primary);
            background: rgba(255, 255, 255, 0.08);
        }
    </style>
@endpush

@section('content')
    <div class="coming-soon-page">
        <div class="coming-soon-decor coming-soon-decor--building"><i class="fas fa-building"></i></div>
        <div class="coming-soon-decor coming-soon-decor--key"><i class="fas fa-key"></i></div>
        <div class="coming-soon-decor coming-soon-decor--home"><i class="fas fa-house-chimney"></i></div>
        <div class="coming-soon-decor coming-soon-decor--chart"><i class="fas fa-chart-line"></i></div>

        <div class="coming-soon-lang">
            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <a
                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
            @endforeach
        </div>

        <div class="container">
            <a href="{{ route('home') }}" class="coming-soon-logo d-inline-block">
                <img src="{{ asset('assets/website/images/logo.png') }}" alt="{{ __('coming-soon.company') }}">
            </a>
            <div class="coming-soon-icon-wrap">
                <i class="fas fa-building"></i>
            </div>
            <h1>{{ __('coming-soon.heading') }}</h1>
            <p class="company-name">{{ __('coming-soon.company') }}</p>
            <p class="tagline">{{ __('coming-soon.tagline') }}</p>
            <p class="subheading">{{ __('coming-soon.subheading') }}</p>
        </div>
    </div>

    @push('scripts')
        <script>
            document.getElementById('comingSoonForm')?.addEventListener('submit', function(e) {
                e.preventDefault();
                var thanks = document.getElementById('comingSoonThanks');
                if (thanks) {
                    thanks.classList.remove('d-none');
                }
                this.classList.add('d-none');
            });
        </script>
    @endpush
@endsection
