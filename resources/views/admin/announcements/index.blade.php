@extends('admin.layouts.master')

@section('title', 'Announcements')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Announcements</h2>
    <a href="{{ route('admin.announcements.create') }}" class="btn btn-primary"><i class="fas fa-plus me-2"></i>Add Announcement</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($announcements as $announcement)
                <tr>
                    <td>{{ $announcement->id }}</td>
                    <td>{{ $announcement->title }}</td>
                    <td><span class="badge bg-{{ $announcement->type == 'urgent' ? 'danger' : ($announcement->type == 'info' ? 'info' : 'secondary') }}">{{ ucfirst($announcement->type) }}</span></td>
                    <td>
                        @if($announcement->is_published)
                        <span class="badge bg-success">Published</span>
                        @else
                        <span class="badge bg-secondary">Draft</span>
                        @endif
                    </td>
                    <td>{{ $announcement->created_at->format('M d, Y') }}</td>
                    <td class="table-actions">
                        <a href="{{ route('admin.announcements.edit', $announcement) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.announcements.destroy', $announcement) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted">No announcements</td></tr>
                @endforelse
            </tbody>
        </table>
        {{ $announcements->links() }}
    </div>
</div>
@endsection
