@extends('admin.layouts.master')

@section('title', 'Create Announcement')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Create Announcement</h2>
    <a href="{{ route('admin.announcements.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.announcements.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea name="content" class="form-control" rows="5" required>{{ old('content') }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Type</label>
                    <select name="type" class="form-select">
                        <option value="general">General</option>
                        <option value="urgent">Urgent</option>
                        <option value="info">Info</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Publish Date</label>
                    <input type="date" name="publish_date" class="form-control" value="{{ old('publish_date') }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Expire Date</label>
                    <input type="date" name="expire_date" class="form-control" value="{{ old('expire_date') }}">
                </div>
            </div>
            <div class="mb-3">
                <div class="form-check">
                    <input type="checkbox" name="is_published" class="form-check-input" value="1" {{ old('is_published') ? 'checked' : '' }}>
                    <label class="form-check-label">Published</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection
