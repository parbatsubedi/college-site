@extends('admin.layouts.master')

@section('title', 'Application Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Application Details</h2>
    <a href="{{ route('admin.applications.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Personal Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label text-muted">First Name</label>
                        <p class="mb-0">{{ $application->first_name }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label text-muted">Last Name</label>
                        <p class="mb-0">{{ $application->last_name }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label text-muted">Email</label>
                        <p class="mb-0">{{ $application->email }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label text-muted">Phone</label>
                        <p class="mb-0">{{ $application->phone }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label text-muted">Date of Birth</label>
                        <p class="mb-0">{{ $application->date_of_birth->format('M d, Y') }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label text-muted">Course</label>
                        <p class="mb-0">{{ $application->course ? $application->course->name : 'N/A' }}</p>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted">Address</label>
                    <p class="mb-0">{{ $application->address }}, {{ $application->city }}, {{ $application->state }} {{ $application->zip_code }}, {{ $application->country }}</p>
                </div>
                @if($application->message)
                <div class="mb-3">
                    <label class="form-label text-muted">Message</label>
                    <p class="mb-0">{{ $application->message }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Update Status</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.applications.updateStatus', $application) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ $application->status == 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Notes</label>
                        <textarea name="notes" class="form-control" rows="3">{{ $application->notes }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
