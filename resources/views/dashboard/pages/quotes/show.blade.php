@extends('dashboard.layouts.master')
@section('title', 'Quote Details')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Quote Request Details</h5>
                    <a href="{{ route('dashboard.quotes.index') }}" class="btn btn-label-secondary">
                        <i class="ti ti-arrow-left me-1"></i>
                        Back to List
                    </a>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Name</h6>
                            <p class="mb-4">{{ $quote->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Email</h6>
                            <p class="mb-4">
                                <a href="mailto:{{ $quote->email }}">{{ $quote->email }}</a>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Phone</h6>
                            <p class="mb-4">
                                <a href="tel:{{ $quote->phone }}">{{ $quote->phone }}</a>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Product Type</h6>
                            <p class="mb-4">
                                <span class="badge bg-label-primary">{{ ucfirst($quote->subject) }}</span>
                            </p>
                        </div>
                        @if($quote->message)
                            <div class="col-12">
                                <h6 class="text-muted mb-2">Additional Information</h6>
                                <p class="mb-4">{{ $quote->message }}</p>
                            </div>
                        @endif
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Submitted Date</h6>
                            <p class="mb-4">{{ $quote->created_at->format('Y-m-d H:i:s') }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex gap-2">
                        <form action="{{ route('dashboard.quotes.destroy', $quote->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Are you sure you want to delete this quote?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="ti ti-trash me-1"></i>
                                Delete Quote
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
