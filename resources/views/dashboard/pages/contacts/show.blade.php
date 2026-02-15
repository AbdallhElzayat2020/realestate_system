@extends('dashboard.layouts.master')
@section('title', 'Contact Details')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Contact Message Details</h5>
                    <a href="{{ route('dashboard.contacts.index') }}" class="btn btn-label-secondary">
                        <i class="ti ti-arrow-left me-1"></i>
                        Back to List
                    </a>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Name</h6>
                            <p class="mb-4">{{ $contact->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Email</h6>
                            <p class="mb-4">
                                <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Phone</h6>
                            <p class="mb-4">
                                <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Subject</h6>
                            <p class="mb-4">{{ $contact->subject ?? 'No Subject' }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Date</h6>
                            <p class="mb-4">{{ $contact->created_at->format('Y-m-d H:i:s') }}</p>
                        </div>
                        <div class="col-12">
                            <h6 class="text-muted mb-2">Message</h6>
                            <p class="mb-4" style="white-space: pre-wrap;">{{ $contact->message }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex gap-2">
                        <form action="{{ route('dashboard.contacts.destroy', $contact->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Are you sure you want to delete this message?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="ti ti-trash me-1"></i>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
