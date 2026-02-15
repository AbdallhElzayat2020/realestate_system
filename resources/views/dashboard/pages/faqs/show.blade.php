@extends('dashboard.layouts.master')
@section('title', 'FAQ Details')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">FAQ Details</h5>
                    <div class="d-flex gap-2">
                        <a href="{{ route('dashboard.faqs.edit', $faq) }}" class="btn btn-warning">
                            <i class="ti ti-edit me-1"></i> Edit
                        </a>
                        <a href="{{ route('dashboard.faqs.index') }}" class="btn btn-label-secondary">
                            <i class="ti ti-arrow-left me-1"></i> Back to List
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Question (English)</h6>
                            <p class="mb-4">{{ $faq->question['en'] ?? '—' }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Question (Arabic)</h6>
                            <p class="mb-4" dir="rtl">{{ $faq->question['ar'] ?? '—' }}</p>
                        </div>
                        <div class="col-12">
                            <h6 class="text-muted mb-2">Answer (English)</h6>
                            <div class="mb-4 border rounded p-3 bg-light">{!! $faq->answer['en'] ?? '—' !!}</div>
                        </div>
                        <div class="col-12">
                            <h6 class="text-muted mb-2">Answer (Arabic)</h6>
                            <div class="mb-4 border rounded p-3 bg-light" dir="rtl">{!! $faq->answer['ar'] ?? '—' !!}</div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Status</h6>
                            <p class="mb-4">
                                @if($faq->status === \App\Models\Faq::STATUS_ACTIVE)
                                    <span class="badge bg-label-success">Active</span>
                                @else
                                    <span class="badge bg-label-secondary">Inactive</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Created</h6>
                            <p class="mb-4">{{ $faq->created_at->format('Y-m-d H:i') }}</p>
                        </div>
                    </div>

                    <hr>

                    <form action="{{ route('dashboard.faqs.destroy', $faq) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Are you sure you want to delete this FAQ?');">
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
@endsection
