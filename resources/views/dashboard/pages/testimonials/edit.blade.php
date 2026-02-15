@extends('dashboard.layouts.master')
@section('title', 'Edit Testimonial')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Testimonial / تعديل الرأي</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @include('dashboard.pages.testimonials._form', ['testimonial' => $testimonial])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
