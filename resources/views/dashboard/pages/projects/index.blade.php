@extends('dashboard.layouts.master')
@section('title', 'Projects')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Projects / المشاريع</h5>
                    <a href="{{ route('dashboard.projects.create') }}" class="btn btn-primary">
                        <i class="ti ti-plus me-1"></i>
                        Add Project
                    </a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($projects->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Service</th>
                                        <th>State</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $project)
                                        <tr>
                                            <td>
                                                @if ($project->thumbnail ?? $project->banner)
                                                    <img src="{{ asset($project->thumbnail ?? $project->banner) }}" alt="" width="56" height="56" class="rounded" style="object-fit: cover;">
                                                @else
                                                    <span class="text-muted">—</span>
                                                @endif
                                            </td>
                                            <td>{{ $project->getTranslation('name', 'en') }}</td>
                                            <td>{{ $project->service ? $project->service->getTranslation('name', 'en') : '—' }}</td>
                                            <td>
                                                @if($project->project_state)
                                                    <span class="badge bg-info">{{ \App\Models\Project::PROJECT_STATES[$project->project_state] ?? $project->project_state }}</span>
                                                @else
                                                    —
                                                @endif
                                            </td>
                                            <td>
                                                @if($project->status === 'active')
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>{{ $project->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <div class="d-flex gap-2 flex-wrap">
                                                    <a href="{{ route('dashboard.projects.show', $project) }}" class="btn btn-sm btn-info"><i class="ti ti-eye me-1"></i> Show</a>
                                                    <a href="{{ route('dashboard.projects.edit', $project) }}" class="btn btn-sm btn-warning"><i class="ti ti-edit me-1"></i> Edit</a>
                                                    <form action="{{ route('dashboard.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Delete this project?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"><i class="ti ti-trash me-1"></i> Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            {{ $projects->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <p class="text-muted">No projects found</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
