@extends('dashboard.layouts.master')
@section('title', 'Contacts')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Contact Messages</h5>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($contacts->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td>{{ $contact->name }}</td>
                                            <td>
                                                <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                            </td>
                                            <td>
                                                <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                                            </td>
                                            <td>{{ $contact->subject ?? 'No Subject' }}</td>
                                            <td>
                                                <span class="text-truncate d-inline-block" style="max-width: 200px;"
                                                    title="{{ $contact->message }}">
                                                    {{ Str::limit($contact->message, 50) }}
                                                </span>
                                            </td>
                                            <td>{{ $contact->created_at->format('Y-m-d H:i') }}</td>
                                            <td>
                                                <div class="d-flex gap-1">
                                                    <a href="{{ route('dashboard.contacts.show', $contact) }}"
                                                        class="btn btn-sm btn-label-primary">
                                                        <i class="ti ti-eye me-1"></i>
                                                        View
                                                    </a>
                                                    <form action="{{ route('dashboard.contacts.destroy', $contact->id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Are you sure you want to delete this message?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="ti ti-trash me-1"></i>
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center mt-4">
                            {{ $contacts->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <p class="text-muted">No contact messages found</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
