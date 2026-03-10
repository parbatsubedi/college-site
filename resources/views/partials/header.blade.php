<!-- Header -->
<header class="main-header">
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="nav-container">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div style="display: flex; gap: 25px; flex-wrap: wrap;">
                    @if($settings->phone)
                    <span>📞 <span>{{ $settings->phone }}</span></span>
                    @endif
                    @if($settings->email)
                    <span>✉️ <span>{{ $settings->email }}</span></span>
                    @endif
                    @if($settings->address)
                    <span>📍 {{ $settings->address }}</span>
                    @endif
                </div>
                <div style="display: flex; gap: 15px; align-items: center;">
                    @if($settings->rto_number)
                    <span>RTO: {{ $settings->rto_number }}</span>
                    @endif
                    @if($settings->cricos_code)
                    <span>CRICOS: {{ $settings->cricos_code }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <div class="nav-container nav-pill-wrapper">
        <nav class="main-nav">
            <a href="{{ route('home') }}" class="logo">
                @if($settings->logo_desktop)
                <div class="logo-icon" style="background: transparent; padding: 0;">
                    <img src="{{ asset('images/' . $settings->logo_desktop) }}" alt="{{ $settings->college_name }}" style="width: 45px; height: 45px; object-fit: contain;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" style="display: none;">
                        <path d="M15 2L3 9v12l12 7 12-7V9L15 2z" fill="white" fill-opacity="0.3" />
                        <path d="M15 5L6 10v10l9 5 9-5V10l-9-5z" fill="white" />
                        <circle cx="15" cy="15" r="4" fill="#077E86" />
                    </svg>
                </div>
                @else
                <div class="logo-icon">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none">
                        <path d="M15 2L3 9v12l12 7 12-7V9L15 2z" fill="white" fill-opacity="0.3" />
                        <path d="M15 5L6 10v10l9 5 9-5V10l-9-5z" fill="white" />
                        <circle cx="15" cy="15" r="4" fill="#077E86" />
                    </svg>
                </div>
                @endif
                <div>
                    <div class="logo-text" id="collegeName">{{ $settings->college_name }}</div>
                    @if($settings->tagline)
                    <div class="logo-tagline">{{ $settings->tagline }}</div>
                    @endif
                </div>
            </a>

            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home') }}#about" class="nav-link has-dropdown">About Us</a>
                    <div class="dropdown-menu">
                        <a href="{{ route('home') }}#about">Our Story</a>
                        <a href="{{ route('home') }}#about">Mission & Vision</a>
                        <a href="{{ route('home') }}#about">Leadership</a>
                        <a href="{{ route('home') }}#about">Campus & Facilities</a>
                        <a href="{{ route('home') }}#about">Accreditations</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('courses') }}" class="nav-link {{ request()->routeIs('courses*') ? 'active' : '' }} has-dropdown">Courses</a>
                    <div class="mega-menu">
                        <div class="mega-menu-grid">
                            <div class="mega-menu-column">
                                <h4>Information Technology</h4>
                                <ul>
                                    <li><a href="{{ route('courses') }}">View All IT Courses</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu-column">
                                <h4>Business & Management</h4>
                                <ul>
                                    <li><a href="{{ route('courses') }}">View All Business Courses</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu-column">
                                <h4>All Courses</h4>
                                <ul>
                                    <li><a href="{{ route('courses') }}">Browse All Courses</a></li>
                                    <li><a href="{{ route('admissions') }}">How to Apply</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admissions') }}" class="nav-link {{ request()->routeIs('admissions') ? 'active' : '' }} has-dropdown">Admissions</a>
                    <div class="dropdown-menu">
                        <a href="{{ route('admissions') }}">How to Apply</a>
                        <a href="{{ route('admissions') }}">Entry Requirements</a>
                        <a href="{{ route('admissions') }}">International Students</a>
                        <a href="{{ route('admissions') }}">Fees & Payment Plans</a>
                        <a href="{{ route('admissions') }}">Policies & Forms</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('events') }}" class="nav-link {{ request()->routeIs('events') ? 'active' : '' }} has-dropdown">Events</a>
                    <div class="dropdown-menu">
                        <a href="{{ route('events') }}">Upcoming Events</a>
                        <a href="{{ route('events') }}">Workshops</a>
                        <a href="{{ route('events') }}">Graduation Ceremony</a>
                        <a href="{{ route('events') }}">Student Activities</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                </li>
            </ul>

            <div style="display: flex; align-items: center; gap: 15px;">
                <button class="theme-toggle" id="themeToggle" title="Toggle Theme" style="background: none; border: none; cursor: pointer; padding: 8px; display: flex; align-items: center; gap: 8px;">
                    <span class="theme-icon" id="sunIcon" style="font-size: 18px;">☀️</span>
                    <span class="theme-icon" id="moonIcon" style="font-size: 18px;">🌙</span>
                </button>
                {{-- <a href="{{ route('login') }}" class="btn btn-primary btn-small">Student Portal</a> --}}
                <div class="mobile-menu-btn" id="mobileMenuBtn">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </nav>
    </div>
</header>
