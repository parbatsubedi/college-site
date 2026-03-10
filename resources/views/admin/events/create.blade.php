@extends('admin.layouts.master')

@section('title', 'Create Event')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Create Event</h2>
    <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.events.store') }}" method="POST">
            @csrf
            
            <!-- Basic Information -->
            <h5 class="mb-3">Event Information</h5>
            <div class="mb-3">
                <label class="form-label">Title *</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                <small class="text-muted">Event name (e.g., "Campus Open Day")</small>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Description *</label>
                <textarea name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                <small class="text-muted">What to expect at the event - shows in event card</small>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category" class="form-select">
                    <option value="">Select Category</option>
                    <option value="open-day" {{ old('category') == 'open-day' ? 'selected' : '' }}>Open Day</option>
                    <option value="workshop" {{ old('category') == 'workshop' ? 'selected' : '' }}>Workshop</option>
                    <option value="graduation" {{ old('category') == 'graduation' ? 'selected' : '' }}>Graduation</option>
                    <option value="info-session" {{ old('category') == 'info-session' ? 'selected' : '' }}>Information Session</option>
                    <option value="networking" {{ old('category') == 'networking' ? 'selected' : '' }}>Networking</option>
                </select>
                <small class="text-muted">Event type - shows as badge on event card</small>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Start Date & Time *</label>
                    <input type="datetime-local" name="start_date" class="form-control" value="{{ old('start_date') }}" required>
                    <small class="text-muted">When event starts</small>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">End Date & Time *</label>
                    <input type="datetime-local" name="end_date" class="form-control" value="{{ old('end_date') }}" required>
                    <small class="text-muted">When event ends</small>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Location</label>
                    <input type="text" name="location" class="form-control" value="{{ old('location') }}" placeholder="Sydney Campus">
                    <small class="text-muted">Where event is held (e.g., "Sydney Campus" or "Online")</small>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Image URL</label>
                    <input type="text" name="image" class="form-control" value="{{ old('image') }}" placeholder="event-image.jpg">
                    <small class="text-muted">Image filename (stored in public/images/events/)</small>
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="mb-3">
                <div class="form-check">
                    <input type="checkbox" name="is_published" class="form-check-input" value="1" {{ old('is_published') ? 'checked' : '' }}>
                    <label class="form-check-label">Published</label>
                    <small class="text-muted d-block">If unchecked, won't show on frontend</small>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Create Event</button>
        </form>
    </div>
</div>
@endsection
