@extends('admin.layouts.master')

@section('title', 'Edit Announcement')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Announcement</h2>
    <a href="{{ route('admin.announcements.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.announcements.update', $announcement) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $announcement->title) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea name="content" class="form-control" rows="5" required>{{ old('content', $announcement->content) }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Type</label>
                    <select name="type" class="form-select">
                        <option value="general" {{ $announcement->type == 'general' ? 'selected' : '' }}>General</option>
                        <option value="urgent" {{ $announcement->type == 'urgent' ? 'selected' : '' }}>Urgent</option>
                        <option value="info" {{ $announcement->type == 'info' ? 'selected' : '' }}>Info</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Publish Date</label>
                    <input type="date" name="publish_date" class="form-control" value="{{ old('publish_date', $announcement->publish_date) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Expire Date</label>
                    <input type="date" name="expire_date" class="form-control" value="{{ old('expire_date', $announcement->expire_date) }}">
                </div>
            </div>
            <div class="mb-3">
                <div class="form-check">
                    <input type="checkbox" name="is_published" class="form-check-input" value="1" {{ old('is_published', $announcement->is_published) ? 'checked' : '' }}>
                    <label class="form-check-label">Published</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
