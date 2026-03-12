@extends('admin.layouts.master')

@section('title', 'Edit Banner')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Banner</h2>
    <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i>Back</a>
</div>

<form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Title *</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $banner->title) }}" required>
                    @error('title')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Subtitle</label>
                    <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle', $banner->subtitle) }}">
                    @error('subtitle')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-12 mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description', $banner->description) }}</textarea>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Current Image</label>
                    @if($banner->image_url || $banner->image_path)
                        <div class="mb-2">
                            <img src="{{ $banner->getBackgroundImage() }}" alt="Current Image" style="max-height: 150px; border-radius: 4px;">
                        </div>
                    @else
                        <p class="text-muted">No image uploaded</p>
                    @endif
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Upload New Image</label>
                    <input type="file" name="image_file" class="form-control" accept="image/*">
                    <small class="text-muted">Supported: jpeg, png, jpg, gif, svg (Max: 2MB)</small>
                    @error('image_file')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Or Image URL (External)</label>
                    <input type="url" name="image_url" class="form-control" value="{{ old('image_url', $banner->image_url) }}" placeholder="https://example.com/image.jpg">
                    <small class="text-muted">Use this if you want to link to an external image</small>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Button Text</label>
                    <input type="text" name="button_text" class="form-control" value="{{ old('button_text', $banner->button_text) }}" placeholder="Learn More">
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Button Link</label>
                    <input type="text" name="button_link" class="form-control" value="{{ old('button_link', $banner->button_link) }}" placeholder="#about">
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Display Order</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $banner->order) }}" min="0">
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <select name="is_active" class="form-select">
                        <option value="1" {{ old('is_active', $banner->is_active) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('is_active', $banner->is_active) == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    
    <div class="d-flex justify-content-end gap-2">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Update Banner</button>
    </div>
</form>
@endsection
