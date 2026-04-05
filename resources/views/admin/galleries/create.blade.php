@extends('admin.layouts.master')

@section('title', 'Create Gallery Image')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Create Gallery Image</h2>
    <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.galleries.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            </div>
            <div class="mb-3">
                <x-image-upload name="image" label="Gallery Image" path="galleries" />
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <input type="text" name="category" class="form-control" value="{{ old('category') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control ckeditor" rows="3">{{ old('description') }}</textarea>
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
