@extends('admin.layouts.master')

@section('title', 'Applications')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Applications</h2>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($applications as $app)
                <tr>
                    <td>{{ $app->id }}</td>
                    <td>{{ $app->first_name }} {{ $app->last_name }}</td>
                    <td>{{ $app->email }}</td>
                    <td>{{ $app->course ? $app->course->name : '-' }}</td>
                    <td>
                        @if($app->status == 'pending')
                        <span class="badge bg-warning">Pending</span>
                        @elseif($app->status == 'approved')
                        <span class="badge bg-success">Approved</span>
                        @else
                        <span class="badge bg-danger">Rejected</span>
                        @endif
                    </td>
                    <td>{{ $app->created_at->format('M d, Y') }}</td>
                    <td class="table-actions">
                        <a href="{{ route('admin.applications.show', $app) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                        <form action="{{ route('admin.applications.destroy', $app) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center text-muted">No applications</td></tr>
                @endforelse
            </tbody>
        </table>
        {{ $applications->links() }}
    </div>
</div>
@endsection
