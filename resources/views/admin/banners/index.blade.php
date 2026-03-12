@extends('admin.layouts.master')

@section('title', 'Banner Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Banner Management</h2>
    <a href="{{ route('admin.banners.create') }}" class="btn btn-primary"><i class="fas fa-plus me-2"></i>Add New Banner</a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($banners as $banner)
                <tr>
                    <td>{{ $banner->order }}</td>
                    <td>{{ $banner->title }}</td>
                    <td>{{ $banner->subtitle }}</td>
                    <td>
                        @if($banner->image_url || $banner->image_path)
                            <img src="{{ $banner->getBackgroundImage() }}" alt="{{ $banner->title }}" 
                                 data-full-src="{{ $banner->getBackgroundImage() }}" 
                                 style="width: 60px; height: 40px; object-fit: cover; cursor: pointer; border-radius: 4px;"/>
                        @else
                            <span class="text-muted">No image</span>
                        @endif
                    </td>
                    <td>
                        @if($banner->is_active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                    <td class="table-actions">
                        <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this banner?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted">No banners found. Create your first banner!</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
