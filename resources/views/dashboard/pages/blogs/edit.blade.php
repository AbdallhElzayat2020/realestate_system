@extends('dashboard.layouts.master')
@section('title', 'Edit Blog')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card blog-form-card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Blog Post</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @include('dashboard.pages.blogs._form', ['blog' => $blog])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
