@extends('dashboard.layouts.master')
@section('title', 'Add FAQ')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Add FAQ</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.faqs.store') }}" method="POST">
                        @include('dashboard.pages.faqs._form', [
                            'faq' => new \App\Models\Faq(),
                            'statuses' => $statuses,
                        ])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


