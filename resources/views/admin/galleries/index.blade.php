@extends('admin.layouts.master')

@section('title', 'Gallery')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Gallery</h2>
    <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary"><i class="fas fa-plus me-2"></i>Add Image</a>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            @forelse($galleries as $gallery)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="{{ $gallery->image }}" class="card-img-top" alt="{{ $gallery->title }}" style="height: 150px; object-fit: cover;">
                    <div class="card-body">
                        <h6 class="card-title">{{ $gallery->title }}</h6>
                        <p class="card-text small text-muted">{{ $gallery->category }}</p>
                        <span class="badge bg-{{ $gallery->is_published ? 'success' : 'secondary' }}">{{ $gallery->is_published ? 'Published' : 'Draft' }}</span>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-muted">No gallery images</div>
            @endforelse
        </div>
        {{ $galleries->links() }}
    </div>
</div>
@endsection
