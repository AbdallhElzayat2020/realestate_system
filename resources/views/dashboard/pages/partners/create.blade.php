@extends('dashboard.layouts.master')
@section('title', 'Add Partner')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Add Partner</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.partners.store') }}" method="POST" enctype="multipart/form-data">
                        @include('dashboard.pages.partners._form', ['partner' => new \App\Models\Partner()])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
