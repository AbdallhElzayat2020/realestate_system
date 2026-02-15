@extends('dashboard.layouts.master')
@section('title', 'Dashboard')

@section('content')
    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <i class="ti ti-users text-primary" style="font-size: 2rem;"></i>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Total Users</span>
                    <h3 class="card-title mb-2">{{ $stats['total_users'] }}</h3>
                    <small class="text-success fw-semibold">
                        <i class="ti ti-arrow-up"></i> Active
                    </small>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <i class="ti ti-mail text-info" style="font-size: 2rem;"></i>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Contact Messages</span>
                    <h3 class="card-title mb-2">{{ $stats['total_contacts'] }}</h3>
                    <small class="text-info fw-semibold">
                        <i class="ti ti-inbox"></i> Messages
                    </small>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <i class="ti ti-file-invoice text-warning" style="font-size: 2rem;"></i>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Quote Requests</span>
                    <h3 class="card-title mb-2">{{ $stats['total_quotes'] }}</h3>
                    <small class="text-warning fw-semibold">
                        <i class="ti ti-file"></i> Requests
                    </small>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <i class="ti ti-briefcase text-success" style="font-size: 2rem;"></i>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Job Applications</span>
                    <h3 class="card-title mb-2">{{ $stats['total_jobs'] }}</h3>
                    <small class="text-success fw-semibold">
                        <i class="ti ti-user-check"></i> Applications
                    </small>
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
                            label: 'Activity',
                            data: @json($chart_data['data']),
                            borderColor: 'rgb(75, 192, 192)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            tension: 0.1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        });
    </script>
@endpush
