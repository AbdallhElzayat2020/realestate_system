@extends('dashboard.layouts.master')
@section('title', 'Edit FAQ')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit FAQ</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.faqs.update', $faq) }}" method="POST">
                        @method('PUT')
                        @include('dashboard.pages.faqs._form', [
                            'faq' => $faq,
                            'statuses' => $statuses,
                        ])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


