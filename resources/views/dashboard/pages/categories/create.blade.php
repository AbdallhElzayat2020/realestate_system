@extends('dashboard.layouts.master')
@section('title', 'Add Category')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Add Category</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.categories.store') }}" method="POST">
                        @include('dashboard.pages.categories._form', ['category' => new \App\Models\Category()])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
