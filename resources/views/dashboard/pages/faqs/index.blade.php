@extends('dashboard.layouts.master')
@section('title', 'FAQs')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Frequently Asked Questions</h5>
                    <a href="{{ route('dashboard.faqs.create') }}" class="btn btn-primary">
                        <i class="ti ti-plus me-1"></i>
                        Add FAQ
                    </a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($faqs->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Question (EN)</th>
                                        <th>Question (AR)</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($faqs as $faq)
                                        <tr>
                                            <td>{{ $faq->question['en'] ?? '' }}</td>
                                            <td>{{ $faq->question['ar'] ?? '' }}</td>
                                            <td>
                                                @if($faq->status === \App\Models\Faq::STATUS_ACTIVE)
                                                    <span class="badge bg-label-success">Active</span>
                                                @else
                                                    <span class="badge bg-label-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>{{ $faq->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <div class="d-flex gap-2 flex-wrap">
                                                    <a href="{{ route('dashboard.faqs.show', $faq) }}" class="btn btn-sm btn-info">
                                                        <i class="ti ti-eye me-1"></i> Show
                                                    </a>
                                                    <a href="{{ route('dashboard.faqs.edit', $faq) }}"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="ti ti-edit me-1"></i>
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('dashboard.faqs.destroy', $faq) }}" method="POST"
                                                        onsubmit="return confirm('Delete this FAQ?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="ti ti-trash me-1"></i>
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-center mt-4">
                            {{ $faqs->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <p class="text-muted">No FAQs found</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
