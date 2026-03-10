<!-- Mobile Menu Overlay -->
<div class="mobile-menu-overlay" id="mobileOverlay"></div>

<!-- Mobile Menu -->
<div class="mobile-menu" id="mobileMenu">
    <div class="mobile-menu-header">
        <a href="{{ route('home') }}" class="logo">
            @if($settings->logo_mobile)
            <div class="logo-icon" style="background: transparent; padding: 0;">
                <img src="{{ asset('images/' . $settings->logo_mobile) }}" alt="{{ $settings->college_name }}" style="width: 30px; height: 30px; object-fit: contain;" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" style="display: none;">
                    <path d="M15 2L3 9v12l12 7 12-7V9L15 2z" fill="white" fill-opacity="0.2" />
                    <path d="M15 5L6 10v10l9 5 9-5V10l-9-5z" fill="white" />
                    <circle cx="15" cy="15" r="4" fill="#077E86" />
                </svg>
            </div>
            @else
            <div class="logo-icon">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none">
                    <path d="M15 2L3 9v12l12 7 12-7V9L15 2z" fill="white" fill-opacity="0.2" />
                    <path d="M15 5L6 10v10l9 5 9-5V10l-9-5z" fill="white" />
                    <circle cx="15" cy="15" r="4" fill="#077E86" />
                </svg>
            </div>
            @endif
            <div>
                <div class="logo-text">{{ $settings->college_name }}</div>
            </div>
        </a>
        <button class="mobile-menu-close" id="mobileClose">×</button>
    </div>
    
    @if($settings->phone || $settings->email)
    <div style="padding: 15px 20px; border-bottom: 1px solid var(--border-color);">
        @if($settings->phone)
        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px; color: var(--text-muted); font-size: 14px;">
            <span>📞</span>
            <span>{{ $settings->phone }}</span>
        </div>
        @endif
        @if($settings->email)
        <div style="display: flex; align-items: center; gap: 10px; color: var(--text-muted); font-size: 14px;">
            <span>✉️</span>
            <span>{{ $settings->email }}</span>
        </div>
        @endif
    </div>
    @endif
    
    <nav class="mobile-menu-nav">
        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
        <a href="{{ route('home') }}#about">About Us</a>
        <a href="{{ route('courses') }}" class="{{ request()->routeIs('courses*') ? 'active' : '' }}">Courses</a>
        <a href="{{ route('admissions') }}" class="{{ request()->routeIs('admissions') ? 'active' : '' }}">Admissions</a>
        <a href="{{ route('events') }}" class="{{ request()->routeIs('events') ? 'active' : '' }}">Events</a>
        <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
        <a href="{{ route('login') }}">Student Portal</a>
    </nav>
</div>
