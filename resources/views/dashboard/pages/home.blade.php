@extends('dashboard.layouts.master')
@section('title', 'Dashboard')

@section('content')
    <div class="row mb-4">
        <div class="col-12">
            <h4 class="fw-bold mb-1">Overview</h4>
            <p class="text-muted small mb-0">Content and inbox statistics at a glance.</p>
        </div>
    </div>

    <!-- Content statistics -->
    <div class="row mb-4">
        <div class="col-12 mb-3">
            <h5 class="text-body fw-semibold mb-0">Content</h5>
        </div>
        <div class="col-xl-3 col-md-6 col-12 mb-4">
            <a href="{{ route('dashboard.services.index') }}" class="card border-0 shadow-sm h-100 text-decoration-none stats-card stats-card--primary">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar flex-shrink-0 bg-label-primary rounded-3 p-3 me-3">
                        <i class="ti ti-briefcase ti-lg text-primary"></i>
                    </div>
                    <div class="flex-grow-1">
                        <span class="d-block fw-semibold text-body">Services</span>
                        <h4 class="mb-0 mt-1">{{ $stats['services'] }}</h4>
                    </div>
                    <i class="ti ti-chevron-right text-muted ti-sm"></i>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-6 col-12 mb-4">
            <a href="{{ route('dashboard.projects.index') }}" class="card border-0 shadow-sm h-100 text-decoration-none stats-card stats-card--info">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar flex-shrink-0 bg-label-info rounded-3 p-3 me-3">
                        <i class="ti ti-building ti-lg text-info"></i>
                    </div>
                    <div class="flex-grow-1">
                        <span class="d-block fw-semibold text-body">Projects</span>
                        <h4 class="mb-0 mt-1">{{ $stats['projects'] }}</h4>
                    </div>
                    <i class="ti ti-chevron-right text-muted ti-sm"></i>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-6 col-12 mb-4">
            <a href="{{ route('dashboard.blogs.index') }}" class="card border-0 shadow-sm h-100 text-decoration-none stats-card stats-card--success">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar flex-shrink-0 bg-label-success rounded-3 p-3 me-3">
                        <i class="ti ti-article ti-lg text-success"></i>
                    </div>
                    <div class="flex-grow-1">
                        <span class="d-block fw-semibold text-body">Blogs</span>
                        <h4 class="mb-0 mt-1">{{ $stats['blogs'] }}</h4>
                    </div>
                    <i class="ti ti-chevron-right text-muted ti-sm"></i>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-6 col-12 mb-4">
            <a href="{{ route('dashboard.partners.index') }}" class="card border-0 shadow-sm h-100 text-decoration-none stats-card stats-card--warning">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar flex-shrink-0 bg-label-warning rounded-3 p-3 me-3">
                        <i class="ti ti-users ti-lg text-warning"></i>
                    </div>
                    <div class="flex-grow-1">
                        <span class="d-block fw-semibold text-body">Partners</span>
                        <h4 class="mb-0 mt-1">{{ $stats['partners'] }}</h4>
                    </div>
                    <i class="ti ti-chevron-right text-muted ti-sm"></i>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-6 col-12 mb-4">
            <a href="{{ route('dashboard.testimonials.index') }}" class="card border-0 shadow-sm h-100 text-decoration-none stats-card stats-card--secondary">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar flex-shrink-0 bg-label-secondary rounded-3 p-3 me-3">
                        <i class="ti ti-message-circle ti-lg text-secondary"></i>
                    </div>
                    <div class="flex-grow-1">
                        <span class="d-block fw-semibold text-body">Testimonials</span>
                        <h4 class="mb-0 mt-1">{{ $stats['testimonials'] }}</h4>
                    </div>
                    <i class="ti ti-chevron-right text-muted ti-sm"></i>
                </div>
            </a>
        </div>
    </div>

    <!-- Inbox / Messages -->
    <div class="row mb-4">
        <div class="col-12 mb-3">
            <h5 class="text-body fw-semibold mb-0">Inbox</h5>
        </div>
        <div class="col-xl-4 col-md-6 col-12 mb-4">
            <a href="{{ route('dashboard.contacts.index') }}" class="card border-0 shadow-sm h-100 text-decoration-none stats-card stats-card--primary">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar flex-shrink-0 bg-label-primary rounded-3 p-3 me-3">
                        <i class="ti ti-mail ti-lg text-primary"></i>
                    </div>
                    <div class="flex-grow-1">
                        <span class="d-block fw-semibold text-body">Contact Messages</span>
                        <h4 class="mb-0 mt-1">{{ $stats['contacts'] }}</h4>
                    </div>
                    <i class="ti ti-chevron-right text-muted ti-sm"></i>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-md-6 col-12 mb-4">
            <a href="{{ route('dashboard.quotes.index') }}" class="card border-0 shadow-sm h-100 text-decoration-none stats-card stats-card--warning">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar flex-shrink-0 bg-label-warning rounded-3 p-3 me-3">
                        <i class="ti ti-file-invoice ti-lg text-warning"></i>
                    </div>
                    <div class="flex-grow-1">
                        <span class="d-block fw-semibold text-body">Quote Requests</span>
                        <h4 class="mb-0 mt-1">{{ $stats['quotes'] }}</h4>
                    </div>
                    <i class="ti ti-chevron-right text-muted ti-sm"></i>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-md-6 col-12 mb-4">
            <a href="{{ route('dashboard.job-applications.index') }}" class="card border-0 shadow-sm h-100 text-decoration-none stats-card stats-card--success">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar flex-shrink-0 bg-label-success rounded-3 p-3 me-3">
                        <i class="ti ti-briefcase ti-lg text-success"></i>
                    </div>
                    <div class="flex-grow-1">
                        <span class="d-block fw-semibold text-body">Job Applications</span>
                        <h4 class="mb-0 mt-1">{{ $stats['job_applications'] }}</h4>
                    </div>
                    <i class="ti ti-chevron-right text-muted ti-sm"></i>
                </div>
            </a>
        </div>
    </div>

    <!-- Chart: Contact messages (last 7 days) -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-transparent border-0 pb-0">
                    <h5 class="card-title mb-0">Contact messages (last 7 days)</h5>
                </div>
                <div class="card-body">
                    <canvas id="activityChart" height="280"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('activityChart');
            if (ctx) {
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: @json($chart_data['labels']),
                        datasets: [{
                            label: 'Messages',
                            data: @json($chart_data['data']),
                            borderColor: 'rgb(105, 108, 255)',
                            backgroundColor: 'rgba(105, 108, 255, 0.1)',
                            fill: true,
                            tension: 0.3
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: { stepSize: 1 }
                            }
                        }
                    }
                });
            }
        });
    </script>
@endpush
