@extends('dashboard.layouts.master')
@section('title', 'Product: ' . $product->getTranslation('name', 'en'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Product Details</h5>
                    <div class="d-flex gap-2">
                        <a href="{{ route('dashboard.products.edit', $product) }}" class="btn btn-warning">
                            <i class="ti ti-edit me-1"></i> Edit
                        </a>
                        <a href="{{ route('dashboard.products.index') }}" class="btn btn-label-secondary">
                            <i class="ti ti-arrow-left me-1"></i> Back to List
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Name (English)</h6>
                            <p class="mb-4">{{ $product->getTranslation('name', 'en') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Name (Arabic)</h6>
                            <p class="mb-4" dir="rtl">{{ $product->getTranslation('name', 'ar') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Slug</h6>
                            <p class="mb-4"><code>{{ $product->slug }}</code></p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Status</h6>
                            <p class="mb-4">
                                @if($product->status === 'active')
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Created</h6>
                            <p class="mb-4">{{ $product->created_at->format('Y-m-d H:i') }}</p>
                        </div>
                        @if($product->image)
                            <div class="col-12">
                                <h6 class="text-muted mb-2">Image</h6>
                                <img src="{{ asset($product->image) }}" alt="" class="img-fluid rounded border" style="max-height: 280px; object-fit: cover;">
                            </div>
                        @endif
                        <div class="col-12">
                            <h6 class="text-muted mb-2">Description (English)</h6>
                            <div class="mb-4 border rounded p-3 bg-light">{!! $product->getTranslation('description', 'en') ?: '—' !!}</div>
                        </div>
                        <div class="col-12">
                            <h6 class="text-muted mb-2">Description (Arabic)</h6>
                            <div class="mb-4 border rounded p-3 bg-light" dir="rtl">{!! $product->getTranslation('description', 'ar') ?: '—' !!}</div>
                        </div>
                    </div>

                    <hr>

                    <form action="{{ route('dashboard.products.destroy', $product) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Are you sure you want to delete this product?');">
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
