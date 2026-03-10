<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - College Site</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --sidebar-width: 260px;
            --header-height: 60px;
            --primary-color: #4f46e5;
        }
        [data-theme="dark"] {
            --bg-color: #1a1a2e;
            --bg-secondary: #16213e;
            --text-color: #e4e4e7;
            --text-muted: #a1a1aa;
            --border-color: #3f3f46;
            --card-bg: #1e1e2d;
            --sidebar-bg: #1e1e2d;
            --sidebar-hover: #27273a;
        }
        [data-theme="light"] {
            --bg-color: #f8fafc;
            --bg-secondary: #ffffff;
            --text-color: #1e293b;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --card-bg: #ffffff;
            --sidebar-bg: #1e293b;
            --sidebar-hover: #334155;
        }
        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            transition: background-color 0.3s, color 0.3s;
        }
        .sidebar {
            min-height: 100vh;
            background: var(--sidebar-bg);
            width: var(--sidebar-width);
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            transition: all 0.3s;
        }
        .sidebar.collapsed {
            margin-left: calc(-1 * var(--sidebar-width));
        }
        .sidebar a {
            color: #e4e4e7;
            text-decoration: none;
            padding: 12px 20px;
            display: block;
            border-radius: 0;
            transition: background 0.2s;
        }
        .sidebar a:hover, .sidebar a.active {
            background: var(--sidebar-hover);
        }
        .sidebar a i { margin-right: 10px; width: 20px; }
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: margin-left 0.3s;
        }
        .main-content.expanded {
            margin-left: 0;
        }
        .header {
            height: var(--header-height);
            background: var(--bg-secondary);
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
        }
        .toggle-btn {
            background: none;
            border: none;
            color: var(--text-color);
            font-size: 1.25rem;
            cursor: pointer;
            padding: 8px;
            border-radius: 6px;
            transition: background 0.2s;
        }
        .toggle-btn:hover {
            background: var(--border-color);
        }
        .header-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .theme-toggle {
            background: none;
            border: none;
            color: var(--text-color);
            font-size: 1.1rem;
            cursor: pointer;
            padding: 8px;
            border-radius: 6px;
            transition: all 0.2s;
        }
        .theme-toggle:hover {
            background: var(--border-color);
        }
        .profile-dropdown {
            position: relative;
        }
        .profile-dropdown-menu {
            position: absolute;
            right: 0;
            top: 100%;
            background: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            min-width: 200px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            display: none;
            z-index: 1000;
        }
        .profile-dropdown-menu.show {
            display: block;
        }
        .profile-dropdown-menu a {
            color: var(--text-color);
            padding: 10px 15px;
            display: block;
            text-decoration: none;
            transition: background 0.2s;
        }
        .profile-dropdown-menu a:hover {
            background: var(--border-color);
        }
        .profile-dropdown-menu a:first-child {
            border-radius: 8px 8px 0 0;
        }
        .profile-dropdown-menu a:last-child {
            border-radius: 0 0 8px 8px;
            color: #ef4444;
        }
        .card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .card-header {
            background: transparent;
            border-bottom: 1px solid var(--border-color);
            font-weight: 600;
        }
        .table {
            color: var(--text-color);
        }
        .table thead th {
            border-bottom: 1px solid var(--border-color);
            font-weight: 600;
            color: var(--text-muted);
        }
        .table tbody td {
            border-bottom: 1px solid var(--border-color);
        }
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .stat-card { transition: transform 0.2s; }
        .stat-card:hover { transform: translateY(-5px); }
        .table-actions .btn { padding: 0.25rem 0.5rem; font-size: 0.875rem; }
        .form-control, .form-select {
            background: var(--bg-secondary);
            border-color: var(--border-color);
            color: var(--text-color);
        }
        .form-control:focus, .form-select:focus {
            background: var(--bg-secondary);
            color: var(--text-color);
            border-color: var(--primary-color);
        }
        .form-label {
            color: var(--text-color);
        }
        .text-muted {
            color: var(--text-muted) !important;
        }
        .footer {
            background: var(--bg-secondary);
            border-top: 1px solid var(--border-color);
            padding: 15px 20px;
            text-align: center;
            color: var(--text-muted);
            font-size: 0.875rem;
        }
.page-content {
            padding: 20px;
            padding-bottom: 60px;
            min-height: calc(100vh - var(--header-height));
            box-sizing: border-box;
        }
        .dropdown-toggle::after {
            display: none;
        }
        .footer {
            background: var(--bg-secondary);
            border-top: 1px solid var(--border-color);
            padding: 15px 20px;
            text-align: center;
            color: var(--text-muted);
            font-size: 0.875rem;
            position: fixed;
            bottom: 0;
            left: var(--sidebar-width);
            right: 0;
            transition: left 0.3s;
            z-index: 99;
        }
        .main-content.expanded .footer {
            left: 0;
        }
        .dropdown-toggle::after {
            display: none;
        }
    </style>
    @yield('styles')
</head>
<body>
    <div class="sidebar" id="sidebar">
        <div class="p-3 text-center border-bottom border-secondary">
            <h5 class="text-white mb-0">Admin Panel</h5>
        </div>
        <nav class="nav flex-column">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i> Dashboard
            </a>
            <a href="{{ route('admin.pages.index') }}" class="{{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
                <i class="fas fa-file"></i> Pages
            </a>
            <a href="{{ route('admin.announcements.index') }}" class="{{ request()->routeIs('admin.announcements.*') ? 'active' : '' }}">
                <i class="fas fa-bullhorn"></i> Announcements
            </a>
            <a href="{{ route('admin.events.index') }}" class="{{ request()->routeIs('admin.events.*') ? 'active' : '' }}">
                <i class="fas fa-calendar"></i> Events
            </a>
            <a href="{{ route('admin.courses.index') }}" class="{{ request()->routeIs('admin.courses.*') ? 'active' : '' }}">
                <i class="fas fa-book"></i> Courses
            </a>
            <a href="{{ route('admin.galleries.index') }}" class="{{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                <i class="fas fa-images"></i> Gallery
            </a>
            <a href="{{ route('admin.applications.index') }}" class="{{ request()->routeIs('admin.applications.*') ? 'active' : '' }}">
                <i class="fas fa-users"></i> Applications
                @php $pending = \App\Models\Application::where('status', 'pending')->count(); @endphp
                @if($pending > 0)
                <span class="badge bg-danger float-end">{{ $pending }}</span>
                @endif
            </a>
            <a href="{{ route('admin.contact-messages.index') }}" class="{{ request()->routeIs('admin.contact-messages.*') ? 'active' : '' }}">
                <i class="fas fa-envelope"></i> Messages
            </a>
            <a href="{{ route('home') }}" target="_blank">
                <i class="fas fa-external-link-alt"></i> View Site
            </a>
        </nav>
    </div>

    <div class="main-content" id="mainContent">
        <header class="header">
            <div class="d-flex align-items-center gap-3">
                <button class="toggle-btn" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <h5 class="mb-0" style="color: var(--text-color);">@yield('header-title', 'Dashboard')</h5>
            </div>
            <div class="header-actions">
                <button class="theme-toggle" id="themeToggle" title="Toggle Theme">
                    <i class="fas fa-moon"></i>
                </button>
                <div class="profile-dropdown">
                    <button class="toggle-btn d-flex align-items-center gap-2" id="profileDropdown">
                        <i class="fas fa-user-circle fa-lg"></i>
                        <span>{{ auth()->user()->name }}</span>
                        <i class="fas fa-chevron-down" style="font-size: 0.75rem;"></i>
                    </button>
                    <div class="profile-dropdown-menu" id="profileMenu">
                        <a href="{{ route('admin.profile.edit') }}">
                            <i class="fas fa-user-edit me-2"></i> Edit Profile
                        </a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <div class="page-content">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @yield('content')
        </div>

        <footer class="footer">
            <p class="mb-0">&copy; {{ date('Y') }} College Site Admin Panel. All rights reserved.</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const themeToggle = document.getElementById('themeToggle');
            const profileDropdown = document.getElementById('profileDropdown');
            const profileMenu = document.getElementById('profileMenu');

            const savedTheme = localStorage.getItem('admin-theme') || 'light';
            document.documentElement.setAttribute('data-theme', savedTheme);
            updateThemeIcon(savedTheme);

            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('expanded');
                localStorage.setItem('sidebar-collapsed', sidebar.classList.contains('collapsed'));
            });

            const isCollapsed = localStorage.getItem('sidebar-collapsed') === 'true';
            if (isCollapsed) {
                sidebar.classList.add('collapsed');
                mainContent.classList.add('expanded');
            }

            themeToggle.addEventListener('click', function() {
                const currentTheme = document.documentElement.getAttribute('data-theme');
                const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                document.documentElement.setAttribute('data-theme', newTheme);
                localStorage.setItem('admin-theme', newTheme);
                updateThemeIcon(newTheme);
            });

            function updateThemeIcon(theme) {
                const icon = themeToggle.querySelector('i');
                if (theme === 'dark') {
                    icon.classList.remove('fa-moon');
                    icon.classList.add('fa-sun');
                } else {
                    icon.classList.remove('fa-sun');
                    icon.classList.add('fa-moon');
                }
            }

            profileDropdown.addEventListener('click', function(e) {
                e.stopPropagation();
                profileMenu.classList.toggle('show');
            });

            document.addEventListener('click', function() {
                profileMenu.classList.remove('show');
            });
        });
    </script>
    @yield('scripts')
</body>
</html>
