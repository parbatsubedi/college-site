@extends('admin.layouts.master')

@section('title', 'Events')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Events</h2>
    <a href="{{ route('admin.events.create') }}" class="btn btn-primary"><i class="fas fa-plus me-2"></i>Add Event</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($events as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->start_date->format('M d, Y') }}</td>
                    <td>{{ $event->location }}</td>
                    <td>
                        @if($event->is_published)
                        <span class="badge bg-success">Published</span>
                        @else
                        <span class="badge bg-secondary">Draft</span>
                        @endif
                    </td>
                    <td class="table-actions">
                        <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted">No events</td></tr>
                @endforelse
            </tbody>
        </table>
        {{ $events->links() }}
    </div>
</div>
@endsection
