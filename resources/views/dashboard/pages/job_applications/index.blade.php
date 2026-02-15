@extends('dashboard.layouts.master')
@section('title', 'Job Applications')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Job Applications</h5>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($applications->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Position</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($applications as $application)
                                        <tr>
                                            <td>{{ $application->name }}</td>
                                            <td>
                                                <a href="mailto:{{ $application->email }}">{{ $application->email }}</a>
                                            </td>
                                            <td>
                                                <a href="tel:{{ $application->phone }}">{{ $application->phone }}</a>
                                            </td>
                                            <td>
                                                <span class="badge bg-label-primary">{{ ucfirst($application->position) }}</span>
                                            </td>
                                            <td>
                                                @if($application->message)
                                                    <span class="text-truncate d-inline-block" style="max-width: 200px;"
                                                        title="{{ $application->message }}">
                                                        {{ Str::limit($application->message, 50) }}
                                                    </span>
                                                @else
                                                    <span class="text-muted">No message</span>
                                                @endif
                                            </td>
                                            <td>{{ $application->created_at->format('Y-m-d H:i') }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('dashboard.job-applications.show', $application->id) }}"
                                                        class="btn btn-sm btn-info">
                                                        <i class="ti ti-eye me-1"></i>
                                                        View
                                                    </a>
                                                    <form
                                                        action="{{ route('dashboard.job-applications.destroy', $application->id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Are you sure you want to delete this application?');">
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

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center mt-4">
                            {{ $applications->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <p class="text-muted">No applications found</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
