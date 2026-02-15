@extends('dashboard.layouts.master')
@section('title', 'Edit Category')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Category</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.categories.update', $category) }}" method="POST">
                        @method('PUT')
                        @include('dashboard.pages.categories._form', ['category' => $category])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
