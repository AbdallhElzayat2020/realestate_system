@extends('dashboard.layouts.master')
@section('title', 'Edit Product')
@section('contentWrapperClass', 'content-wrapper-overflow-visible')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card products-form-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Edit Product</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('dashboard.products.update', $product) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @include('dashboard.pages.products._form', ['product' => $product])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
