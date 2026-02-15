@extends('dashboard.layouts.master')
@section('title', 'Add Service')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card services-form-card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Add Service</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.services.store') }}" method="POST" enctype="multipart/form-data">
                        @include('dashboard.pages.services._form', ['service' => new \App\Models\Service()])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
