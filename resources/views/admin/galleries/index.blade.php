@extends('admin.layouts.master')

@section('title', 'Gallery')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Gallery</h2>
    <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary"><i class="fas fa-plus me-2"></i>Add Image</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($galleries as $gallery)
                <tr>
                    <td>
                        <img src="{{ $gallery->image }}" alt="{{ $gallery->title }}" 
                             data-full-src="{{ $gallery->image }}" 
                             style="width: 60px; height: 40px; object-fit: cover; cursor: pointer; border-radius: 4px;"/>
                    </td>
                    <td>{{ $gallery->title }}</td>
                    <td>{{ $gallery->category }}</td>
                    <td>
                        @if($gallery->is_published)
                            <span class="badge bg-success">Published</span>
                        @else
                            <span class="badge bg-secondary">Draft</span>
                        @endif
                    </td>
                    <td class="table-actions">
                        <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center text-muted">No gallery images</td></tr>
                @endforelse
            </tbody>
        </table>
        {{ $galleries->links() }}
    </div>
</div>
@endsection
