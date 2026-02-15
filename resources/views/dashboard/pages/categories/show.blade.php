@extends('dashboard.layouts.master')
@section('title', 'Category: ' . $category->getTranslation('name', 'en'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Category Details</h5>
                    <div class="d-flex gap-2">
                        <a href="{{ route('dashboard.categories.edit', $category) }}" class="btn btn-warning">
                            <i class="ti ti-edit me-1"></i> Edit
                        </a>
                        <a href="{{ route('dashboard.categories.index') }}" class="btn btn-label-secondary">
                            <i class="ti ti-arrow-left me-1"></i> Back to List
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Name (English)</h6>
                            <p class="mb-4">{{ $category->getTranslation('name', 'en') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Name (Arabic)</h6>
                            <p class="mb-4" dir="rtl">{{ $category->getTranslation('name', 'ar') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Slug</h6>
                            <p class="mb-4"><code>{{ $category->slug }}</code></p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Status</h6>
                            <p class="mb-4">
                                @if($category->status === 'active')
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Created</h6>
                            <p class="mb-4">{{ $category->created_at->format('Y-m-d H:i') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Updated</h6>
                            <p class="mb-4">{{ $category->updated_at->format('Y-m-d H:i') }}</p>
                        </div>
                    </div>

                    <hr>

                    <form action="{{ route('dashboard.categories.destroy', $category) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Are you sure you want to delete this category?');">
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
