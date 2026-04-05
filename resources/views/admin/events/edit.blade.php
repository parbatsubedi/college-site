@extends('admin.layouts.master')

@section('title', 'Edit Event')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Event</h2>
    <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.events.update', $event) }}" method="POST">
            @csrf
            @method('PUT')
            
            <!-- Basic Information -->
            <h5 class="mb-3">Event Information</h5>
            <div class="mb-3">
                <label class="form-label">Title *</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $event->title) }}" required>
                <small class="text-muted">Event name (e.g., "Campus Open Day")</small>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Description *</label>
                <textarea name="description" class="form-control ckeditor" rows="4" required>{{ old('description', $event->description) }}</textarea>
                <small class="text-muted">What to expect at the event - shows in event card</small>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category" class="form-select">
                    <option value="">Select Category</option>
                    <option value="open-day" {{ old('category', $event->category) == 'open-day' ? 'selected' : '' }}>Open Day</option>
                    <option value="workshop" {{ old('category', $event->category) == 'workshop' ? 'selected' : '' }}>Workshop</option>
                    <option value="graduation" {{ old('category', $event->category) == 'graduation' ? 'selected' : '' }}>Graduation</option>
                    <option value="info-session" {{ old('category', $event->category) == 'info-session' ? 'selected' : '' }}>Information Session</option>
                    <option value="networking" {{ old('category', $event->category) == 'networking' ? 'selected' : '' }}>Networking</option>
                </select>
                <small class="text-muted">Event type - shows as badge on event card</small>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Start Date & Time *</label>
                    <input type="datetime-local" name="start_date" class="form-control" value="{{ old('start_date', $event->start_date->format('Y-m-d\TH:i')) }}" required>
                    <small class="text-muted">When event starts</small>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">End Date & Time *</label>
                    <input type="datetime-local" name="end_date" class="form-control" value="{{ old('end_date', $event->end_date->format('Y-m-d\TH:i')) }}" required>
                    <small class="text-muted">When event ends</small>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Location</label>
                    <input type="text" name="location" class="form-control" value="{{ old('location', $event->location) }}" placeholder="Sydney Campus">
                    <small class="text-muted">Where event is held (e.g., "Sydney Campus" or "Online")</small>
                </div>
                <div class="col-md-6 mb-3">
                    <x-image-upload name="image" :currentImage="$event->image" label="Event Image" path="events" />
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="mb-3">
                <div class="form-check">
                    <input type="checkbox" name="is_published" class="form-check-input" value="1" {{ old('is_published', $event->is_published) ? 'checked' : '' }}>
                    <label class="form-check-label">Published</label>
                    <small class="text-muted d-block">If unchecked, won't show on frontend</small>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Update Event</button>
        </form>
    </div>
</div>
@endsection
