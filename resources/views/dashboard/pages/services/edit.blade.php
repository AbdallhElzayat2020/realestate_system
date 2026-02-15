@extends('dashboard.layouts.master')
@section('title', 'Edit Service')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card services-form-card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Service</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.services.update', $service) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @include('dashboard.pages.services._form', ['service' => $service])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
