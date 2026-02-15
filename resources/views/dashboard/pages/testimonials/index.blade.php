@extends('dashboard.layouts.master')
@section('title', 'Testimonials / آراء العملاء')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Testimonials / آراء العملاء</h5>
                    <a href="{{ route('dashboard.testimonials.create') }}" class="btn btn-primary">
                        <i class="ti ti-plus me-1"></i> Add Testimonial
                    </a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($testimonials->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Content</th>
                                        <th>Order</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($testimonials as $t)
                                        <tr>
                                            <td>
                                                @if ($t->image)
                                                    <img src="{{ asset($t->image) }}" alt="" width="48" height="48" class="rounded-circle" style="object-fit: cover;">
                                                @else
                                                    <span class="text-muted">—</span>
                                                @endif
                                            </td>
                                            <td>{{ $t->getTranslation('name', 'en') }}</td>
                                            <td>{{ $t->getTranslation('role', 'en') ?: '—' }}</td>
                                            <td class="text-truncate" style="max-width: 200px;">{{ \Illuminate\Support\Str::limit(strip_tags($t->getTranslation('content', 'en')), 50) }}</td>
                                            <td>{{ $t->order }}</td>
                                            <td>
                                                @if($t->status === 'active')
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('dashboard.testimonials.edit', $t) }}" class="btn btn-sm btn-warning"><i class="ti ti-edit"></i></a>
                                                    <form action="{{ route('dashboard.testimonials.destroy', $t) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this testimonial?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"><i class="ti ti-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            {{ $testimonials->links() }}
                        </div>
                    @else
                        <p class="text-muted mb-0">No testimonials yet. <a href="{{ route('dashboard.testimonials.create') }}">Add the first one</a>.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
