@extends('dashboard.layouts.master')
@section('title', 'Quotes')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Quote Requests</h5>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($quotes->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Product Type</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($quotes as $quote)
                                        <tr>
                                            <td>{{ $quote->name }}</td>
                                            <td>
                                                <a href="mailto:{{ $quote->email }}">{{ $quote->email }}</a>
                                            </td>
                                            <td>
                                                <a href="tel:{{ $quote->phone }}">{{ $quote->phone }}</a>
                                            </td>
                                            <td>
                                                <span class="badge bg-label-primary">{{ ucfirst($quote->subject) }}</span>
                                            </td>
                                            <td>
                                                @if($quote->message)
                                                    <span class="text-truncate d-inline-block" style="max-width: 200px;"
                                                        title="{{ $quote->message }}">
                                                        {{ Str::limit($quote->message, 50) }}
                                                    </span>
                                                @else
                                                    <span class="text-muted">No message</span>
                                                @endif
                                            </td>
                                            <td>{{ $quote->created_at->format('Y-m-d H:i') }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('dashboard.quotes.show', $quote->id) }}"
                                                        class="btn btn-sm btn-info">
                                                        <i class="ti ti-eye me-1"></i>
                                                        View
                                                    </a>
                                                    <form action="{{ route('dashboard.quotes.destroy', $quote->id) }}" method="POST"
                                                        class="d-inline"
                                                        onsubmit="return confirm('Are you sure you want to delete this quote?');">
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
                            {{ $quotes->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <p class="text-muted">No quote requests found</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
