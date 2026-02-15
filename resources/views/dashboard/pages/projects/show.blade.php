@extends('dashboard.layouts.master')
@section('title', $project->getTranslation('name', 'en'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Project: {{ $project->getTranslation('name', 'en') }}</h5>
                    <div class="d-flex gap-2">
                        <a href="{{ route('dashboard.projects.edit', $project) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('dashboard.projects.index') }}" class="btn btn-label-secondary btn-sm">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <p><strong>Status:</strong> {{ $project->status }}</p>
                    @if($project->project_state)
                        <p><strong>State:</strong> {{ \App\Models\Project::PROJECT_STATES[$project->project_state] ?? $project->project_state }}</p>
                    @endif
                    @if($project->service)
                        <p><strong>Service:</strong> {{ $project->service->getTranslation('name', 'en') }}</p>
                    @endif
                    <p><strong>Slug:</strong> <code>{{ $project->slug }}</code></p>
                    @php $mainImg = $project->thumbnail ?? $project->banner ?? $project->main_image; @endphp
                    @if($mainImg)
                        <p><strong>صورة المشروع الأساسية / Main image:</strong><br><img src="{{ asset($mainImg) }}" alt="" class="img-fluid rounded mt-1" style="max-height: 200px; object-fit: cover;"></p>
                    @endif
                    @if($project->images && count($project->images) > 0)
                        <p><strong>Gallery ({{ count($project->images) }}):</strong></p>
                        <div class="d-flex flex-wrap gap-2 mt-1">
                            @foreach($project->images as $img)
                                <img src="{{ asset($img) }}" alt="" class="rounded border" style="width:100px;height:75px;object-fit:cover;">
                            @endforeach
                        </div>
                    @endif
                    @if($project->getTranslation('description', 'en'))
                        <div class="mt-3"><strong>Description (EN):</strong><div class="border rounded p-3 mt-1">{!! $project->getTranslation('description', 'en') !!}</div></div>
                    @endif
                    @if($project->map)
                        <div class="mt-3"><strong>Map:</strong><div class="border rounded p-2 mt-1">{!! $project->map !!}</div></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
