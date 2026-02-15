@extends('dashboard.layouts.master')
@section('title', 'Add Testimonial')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Add Testimonial / إضافة رأي عميل</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                        @include('dashboard.pages.testimonials._form', ['testimonial' => new \App\Models\Testimonial()])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
