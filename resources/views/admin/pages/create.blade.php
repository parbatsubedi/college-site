@extends('admin.layouts.master')

@section('title', 'Create Page')

@section('content')
<?php $page = new \App\Models\Page; ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Create Page</h2>
    <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.pages.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea name="content" class="form-control ckeditor" rows="10" required>{{ old('content') }}</textarea>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Meta Description</label>
                    <input type="text" name="meta_description" class="form-control" value="{{ old('meta_description') }}">
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-check">
                    <input type="checkbox" name="is_published" class="form-check-input" id="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_published">Published</label>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection
