@extends('dashboard.layouts.master')
@section('title', 'Edit Partner')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Partner / تعديل الشريك</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.partners.update', $partner) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @include('dashboard.pages.partners._form', ['partner' => $partner])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
