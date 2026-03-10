<!-- Header -->
<header class="main-header">
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="nav-container">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div style="display: flex; gap: 25px;">
                    <span>📞 <span id="contactPhone">1300 123 456</span></span>
                    <span>✉️ <span id="contactEmail">info@pacificinstitute.edu.au</span></span>
                    <span>📍 Sydney, Australia</span>
                </div>
                <div style="display: flex; gap: 15px; align-items: center;">
                    <span>RTO: 45123</span>
                    <span>CRICOS: 03456J</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <div class="nav-container nav-pill-wrapper">
        <nav class="main-nav">
            <a href="{{ route('home') }}" class="logo">
                <div class="logo-icon">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none">
                        <path d="M15 2L3 9v12l12 7 12-7V9L15 2z" fill="white" fill-opacity="0.3" />
                        <path d="M15 5L6 10v10l9 5 9-5V10l-9-5z" fill="white" />
                        <circle cx="15" cy="15" r="4" fill="#077E86" />
                    </svg>
                </div>
                <div>
                    <div class="logo-text" id="collegeName">Fusion College</div>
                    <div class="logo-tagline">of Technology</div>
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
                                    <li><a href="{{ route('courses') }}">Diploma of Information Technology</a></li>
                                    <li><a href="{{ route('courses') }}">Advanced Diploma of IT</a></li>
                                    <li><a href="{{ route('courses') }}">Certificate IV in Programming</a></li>
                                    <li><a href="{{ route('courses') }}">Diploma of Cybersecurity</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu-column">
                                <h4>Business & Management</h4>
                                <ul>
                                    <li><a href="{{ route('courses') }}">Diploma of Business</a></li>
                                    <li><a href="{{ route('courses') }}">Advanced Diploma of Leadership</a></li>
                                    <li><a href="{{ route('courses') }}">Certificate IV in Accounting</a></li>
                                    <li><a href="{{ route('courses') }}">Diploma of Project Management</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu-column">
                                <h4>Other Programs</h4>
                                <ul>
                                    <li><a href="{{ route('courses') }}">Early Childhood Education</a></li>
                                    <li><a href="{{ route('courses') }}">English Programs (ELICOS)</a></li>
                                    <li><a href="{{ route('courses') }}">Humanities & Social Sciences</a></li>
                                    <li><a href="{{ route('courses') }}">View All Courses</a></li>
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
                <div class="theme-toggle" id="themeToggle">
                    <span class="theme-icon">☀️</span>
                    <div class="toggle-switch"></div>
                    <span class="theme-icon">🌙</span>
                </div>
                <a href="#" class="btn btn-primary btn-small" style="display: none;">Student Portal</a>
                <div class="mobile-menu-btn" id="mobileMenuBtn">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </nav>
    </div>
</header>
