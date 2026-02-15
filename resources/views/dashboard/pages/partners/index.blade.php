@extends('dashboard.layouts.master')
@section('title', 'Partners / شركاء النجاح')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Partners</h5>
                    <a href="{{ route('dashboard.partners.create') }}" class="btn btn-primary">
                        <i class="ti ti-plus me-1"></i> Add Partner
                    </a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($partners->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Logo</th>
                                        <th>Name</th>
                                        <th>Link</th>
                                        <th>Order</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($partners as $partner)
                                        <tr>
                                            <td>
                                                @if ($partner->logo)
                                                    <img src="{{ asset($partner->logo) }}" alt="" width="56" height="56" class="rounded" style="object-fit: contain; background: #f5f5f5;">
                                                @else
                                                    <span class="text-muted">—</span>
                                                @endif
                                            </td>
                                            <td>{{ $partner->name }}</td>
                                            <td>
                                                @if ($partner->link)
                                                    <a href="{{ $partner->link }}" target="_blank" rel="noopener" class="text-truncate d-inline-block" style="max-width: 180px;">{{ $partner->link }}</a>
                                                @else
                                                    —
                                                @endif
                                            </td>
                                            <td>{{ $partner->order }}</td>
                                            <td>
                                                @if($partner->status === 'active')
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('dashboard.partners.edit', $partner) }}" class="btn btn-sm btn-warning"><i class="ti ti-edit"></i></a>
                                                    <form action="{{ route('dashboard.partners.destroy', $partner) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this partner?');">
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
                            {{ $partners->links() }}
                        </div>
                    @else
                        <p class="text-muted mb-0">No partners yet. <a href="{{ route('dashboard.partners.create') }}">Add the first partner</a>.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
