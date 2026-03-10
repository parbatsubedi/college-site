@extends('admin.layouts.master')

@section('title', 'View Message')
@section('header-title', 'View Message')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Message Details</h5>
                <span class="badge {{ $contactMessage->is_read ? 'bg-success' : 'bg-warning' }}">
                    {{ $contactMessage->is_read ? 'Read' : 'Unread' }}
                </span>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="text-muted">Name</label>
                        <p class="mb-0 fw-bold">{{ $contactMessage->name }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted">Email</label>
                        <p class="mb-0">
                            <a href="mailto:{{ $contactMessage->email }}">{{ $contactMessage->email }}</a>
                        </p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="text-muted">Phone</label>
                        <p class="mb-0">{{ $contactMessage->phone ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted">Subject</label>
                        <p class="mb-0">{{ $contactMessage->subject ?? 'N/A' }}</p>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="text-muted">Message</label>
                    <div class="p-3 bg-light rounded">
                        {{ $contactMessage->message }}
                    </div>
                </div>
                <div class="mb-3">
                    <label class="text-muted">Received</label>
                    <p class="mb-0">{{ $contactMessage->created_at->format('F d, Y \a\t h:i A') }}</p>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back
                </a>
                <form action="{{ route('admin.contact-messages.destroy', $contactMessage) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this message?')">
                        <i class="fas fa-trash me-2"></i>Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
