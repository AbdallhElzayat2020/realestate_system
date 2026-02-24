@php
    /** @var \App\Models\Contact $contact */
@endphp

<h2>New contact message from {{ $contact->name }}</h2>

<p><strong>Name:</strong> {{ $contact->name }}</p>
<p><strong>Email:</strong> {{ $contact->email }}</p>
<p><strong>Phone:</strong> {{ $contact->phone }}</p>

@if(!empty($contact->subject))
    <p><strong>Subject:</strong> {{ $contact->subject }}</p>
@endif

<p><strong>Message:</strong></p>
<p style="white-space: pre-line;">{{ $contact->message }}</p>

