@extends('admin.layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Admin Dashboard</h2>
    <span class="text-muted">Welcome back, {{ auth()->user()->name }}</span>
</div>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card stat-card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-0">Total Pages</h6>
                        <h2 class="mb-0">{{ $stats['total_pages'] }}</h2>
                    </div>
                    <i class="fas fa-file fa-2x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-0">Total Courses</h6>
                        <h2 class="mb-0">{{ $stats['total_courses'] }}</h2>
                    </div>
                    <i class="fas fa-book fa-2x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card bg-info text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-0">Total Events</h6>
                        <h2 class="mb-0">{{ $stats['total_events'] }}</h2>
                    </div>
                    <i class="fas fa-calendar fa-2x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card bg-warning text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-0">Applications</h6>
                        <h2 class="mb-0">{{ $stats['total_applications'] }}</h2>
                    </div>
                    <i class="fas fa-users fa-2x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fas fa-chart-line me-2"></i>Traffic Analytics</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <span>Today</span>
                    <strong>{{ $pageViewsToday }}</strong>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span>This Week</span>
                    <strong>{{ $pageViewsThisWeek }}</strong>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span>This Month</span>
                    <strong>{{ $pageViewsThisMonth }}</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0"><i class="fas fa-user-graduate me-2"></i>Application Status</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <span>Pending</span>
                    <span class="badge bg-warning">{{ $stats['pending_applications'] }}</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span>Approved</span>
                    <span class="badge bg-success">{{ $stats['approved_applications'] }}</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span>Rejected</span>
                    <span class="badge bg-danger">{{ $stats['rejected_applications'] }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0"><i class="fas fa-tasks me-2"></i>Content Overview</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <span>Announcements</span>
                    <strong>{{ $stats['total_announcements'] }}</strong>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span>Gallery Images</span>
                    <strong>{{ $stats['total_galleries'] }}</strong>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Top Pages</h5>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Page</th>
                            <th>Views</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pageViewsByPage as $view)
                        <tr>
                            <td>{{ $view->page }}</td>
                            <td><span class="badge bg-primary">{{ $view->count }}</span></td>
                        </tr>
                        @empty
                        <tr><td colspan="2" class="text-muted">No data yet</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Recent Applications</h5>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentApplications as $app)
                        <tr>
                            <td>{{ $app->first_name }} {{ $app->last_name }}</td>
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
                        </tr>
                        @empty
                        <tr><td colspan="3" class="text-muted">No applications yet</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
