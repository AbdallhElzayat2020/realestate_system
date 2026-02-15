@extends('dashboard.layouts.master')
@section('title', 'Application Details')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Application Details</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Name:</strong> {{ $application->name }}
                    </div>
                    <div class="mb-3">
                        <strong>Email:</strong> <a href="mailto:{{ $application->email }}">{{ $application->email }}</a>
                    </div>
                    <div class="mb-3">
                        <strong>Phone:</strong> <a href="tel:{{ $application->phone }}">{{ $application->phone }}</a>
                    </div>
                    <div class="mb-3">
                        <strong>Position:</strong> <span
                            class="badge bg-label-primary">{{ ucfirst($application->position) }}</span>
                    </div>
                    <div class="mb-3">
                        <strong>Message:</strong>
                        <p class="mb-0">{{ $application->message ?: '—' }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Resume:</strong>
                        @if($application->resume)
                            <a href="{{ asset('storage/' . $application->resume) }}" target="_blank"
                                class="btn btn-sm btn-secondary">
                                <i class="ti ti-download me-1"></i> Download Resume
                            </a>
                        @else
                            <span class="text-muted">No resume uploaded</span>
                        @endif
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('dashboard.job-applications.index') }}" class="btn btn-light">
                            Back
                        </a>
                        <form action="{{ route('dashboard.job-applications.destroy', $application->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this application?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="ti ti-trash me-1"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
