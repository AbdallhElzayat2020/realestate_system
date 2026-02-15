@extends('dashboard.layouts.master')
@section('title', 'Add Project')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card services-form-card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Add Project</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.projects.store') }}" method="POST" enctype="multipart/form-data">
                        @include('dashboard.pages.projects._form', ['project' => new \App\Models\Project()])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
