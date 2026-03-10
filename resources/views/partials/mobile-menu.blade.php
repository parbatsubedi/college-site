<!-- Mobile Menu Overlay -->
<div class="mobile-menu-overlay" id="mobileOverlay"></div>

<!-- Mobile Menu -->
<div class="mobile-menu" id="mobileMenu">
    <div class="mobile-menu-header">
        <a href="{{ route('home') }}" class="logo">
            <div class="logo-icon">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none">
                    <path d="M15 2L3 9v12l12 7 12-7V9L15 2z" fill="white" fill-opacity="0.2" />
                    <path d="M15 5L6 10v10l9 5 9-5V10l-9-5z" fill="white" />
                    <circle cx="15" cy="15" r="4" fill="#077E86" />
                </svg>
            </div>
            <div>
                <div class="logo-text">Fusion College</div>
            </div>
        </a>
        <button class="mobile-menu-close" id="mobileClose">×</button>
    </div>
    <nav class="mobile-menu-nav">
        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
        <a href="{{ route('home') }}#about">About Us</a>
        <a href="{{ route('courses') }}" class="{{ request()->routeIs('courses*') ? 'active' : '' }}">Courses</a>
        <a href="{{ route('admissions') }}" class="{{ request()->routeIs('admissions') ? 'active' : '' }}">Admissions</a>
        <a href="{{ route('events') }}" class="{{ request()->routeIs('events') ? 'active' : '' }}">Events</a>
        <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
        <a href="#">Student Portal</a>
    </nav>
</div>
