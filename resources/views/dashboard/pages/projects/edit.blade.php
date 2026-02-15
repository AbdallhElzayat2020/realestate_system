@extends('dashboard.layouts.master')
@section('title', 'Edit Project')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card services-form-card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Project</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @include('dashboard.pages.projects._form', ['project' => $project])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
