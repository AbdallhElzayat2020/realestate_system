@extends('dashboard.layouts.master')
@section('title', 'Services')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Services</h5>
                    <a href="{{ route('dashboard.services.create') }}" class="btn btn-primary">
                        <i class="ti ti-plus me-1"></i>
                        Add Service
                    </a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($services->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Thumbnail</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>
                                                @if ($service->thumbnail)
                                                    <img src="{{ asset($service->thumbnail) }}" alt="" width="56" height="56" class="rounded" style="object-fit: cover;">
                                                @else
                                                    <span class="text-muted">—</span>
                                                @endif
                                            </td>
                                            <td>{{ $service->getTranslation('name', 'en') }}</td>
                                            <td><code>{{ $service->slug }}</code></td>
                                            <td>
                                                @if($service->status === 'active')
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>{{ $service->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <div class="d-flex gap-2 flex-wrap">
                                                    <a href="{{ route('dashboard.services.show', $service) }}" class="btn btn-sm btn-info">
                                                        <i class="ti ti-eye me-1"></i> Show
                                                    </a>
                                                    <a href="{{ route('dashboard.services.edit', $service) }}" class="btn btn-sm btn-warning">
                                                        <i class="ti ti-edit me-1"></i> Edit
                                                    </a>
                                                    <form action="{{ route('dashboard.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Delete this service?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="ti ti-trash me-1"></i> Delete
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
                            {{ $services->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <p class="text-muted">No services found</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
