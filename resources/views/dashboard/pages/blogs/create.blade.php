@extends('dashboard.layouts.master')
@section('title', 'Add Blog')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card blog-form-card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Add Blog Post</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.blogs.store') }}" method="POST" enctype="multipart/form-data">
                        @include('dashboard.pages.blogs._form', ['blog' => new \App\Models\Blog()])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
