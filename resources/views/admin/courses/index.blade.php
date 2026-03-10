@extends('admin.layouts.master')

@section('title', 'Courses')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Courses</h2>
    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary"><i class="fas fa-plus me-2"></i>Add Course</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Duration</th>
                    <th>Fee</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->category }}</td>
                    <td>{{ $course->duration }} hrs</td>
                    <td>${{ number_format($course->fee, 2) }}</td>
                    <td>
                        @if($course->is_published)
                        <span class="badge bg-success">Published</span>
                        @else
                        <span class="badge bg-secondary">Draft</span>
                        @endif
                    </td>
                    <td class="table-actions">
                        <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center text-muted">No courses</td></tr>
                @endforelse
            </tbody>
        </table>
        {{ $courses->links() }}
    </div>
</div>
@endsection
