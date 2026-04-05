@extends('layouts.master')

@section('title', 'Home - Fusion College of Technology')

@section('content')
<!-- Hero Section -->
<section class="hero">
    <div class="hero-slider">
        <div class="hero-slide hero-slide-1 active">
            <div class="hero-slide-bg" style="background-image: url('https://images.unsplash.com/photo-1523050854058-8df90110c476?auto=format&fit=crop&w=1920&q=80'); background-size: cover; background-position: center;"></div>
            <div class="hero-slide-overlay"></div>
        </div>
        <div class="hero-slide hero-slide-2">
            <div class="hero-slide-bg" style="background-image: url('https://images.unsplash.com/photo-1541339907198-e08756dedf3f?auto=format&fit=crop&w=1920&q=80'); background-size: cover; background-position: center;"></div>
            <div class="hero-slide-overlay"></div>
        </div>
        <div class="hero-slide hero-slide-3">
            <div class="hero-slide-bg" style="background-image: url('https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=1920&q=80'); background-size: cover; background-position: center;"></div>
            <div class="hero-slide-overlay"></div>
        </div>
    </div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <span class="hero-badge" id="heroBadge">Welcome to {{ $settings->college_name }}</span>
        <h1 class="hero-title" id="heroTitle">Empowering Future Professionals Through Quality Education</h1>
        <p class="hero-subtitle" id="heroSubtitle">Launch your career with nationally recognized qualifications and industry-experienced trainers.</p>
        <div class="hero-buttons" id="heroButtons">
            <a href="{{ route('courses') }}" class="btn btn-primary">Explore Courses</a>
            <a href="{{ route('contact') }}" class="btn btn-outline">Enquire Now</a>
        </div>
    </div>
    <div class="hero-graphics">
        <svg class="building-silhouette" width="1920" height="200" viewBox="0 0 1920 200" preserveAspectRatio="none">
            <path d="M0,200 L0,150 L100,150 L100,120 L150,120 L150,150 L200,150 L200,100 L250,100 L250,150 L350,150 L350,80 L400,80 L400,150 L500,150 L500,60 L550,60 L550,150 L650,150 L650,90 L700,90 L700,150 L800,150 L800,110 L850,110 L850,150 L950,150 L950,70 L1000,70 L1000,150 L1100,150 L1100,100 L1150,100 L1150,150 L1250,150 L1250,85 L1300,85 L1300,150 L1400,150 L1400,120 L1450,120 L1450,150 L1550,150 L1550,95 L1600,95 L1600,150 L1700,150 L1700,110 L1750,110 L1750,150 L1850,150 L1850,130 L1900,130 L1900,150 L1920,150 L1920,200 Z" fill="currentColor" opacity="0.1"/>
        </svg>
    </div>
    <div class="hero-indicators">
        <span class="hero-indicator active" data-slide="0"></span>
        <span class="hero-indicator" data-slide="1"></span>
        <span class="hero-indicator" data-slide="2"></span>
    </div>
</section>

<!-- Stats Section -->
<section class="section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-card fade-in">
                <div class="stat-icon">🎓</div>
                <div class="stat-number" data-target="5000">0</div>
                <div class="stat-label">Students Enrolled</div>
            </div>
            <div class="stat-card fade-in">
                <div class="stat-icon">🏆</div>
                <div class="stat-number" data-target="95">0</div>
                <div class="stat-label">% Employment Rate</div>
            </div>
            <div class="stat-card fade-in">
                <div class="stat-icon">👨‍🏫</div>
                <div class="stat-number" data-target="150">0</div>
                <div class="stat-label">Industry Trainers</div>
            </div>
            <div class="stat-card fade-in">
                <div class="stat-icon">🌍</div>
                <div class="stat-number" data-target="50">0</div>
                <div class="stat-label">Countries Represented</div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="section section-alt" id="about">
    <div class="container">
        <div class="about-grid">
            <div class="about-content fade-in">
                <h3>About {{ $settings->college_name }}</h3>
                <p>We are a leading educational institution dedicated to providing high-quality training and education to students from around the world. Our modern facilities, experienced trainers, and industry-focused curriculum ensure graduates are ready for the workforce.</p>
                <p>At {{ $settings->college_name }}, we believe in practical learning that prepares you for real-world challenges. Our courses are designed in consultation with industry partners to ensure relevance and employment outcomes.</p>
                <div class="about-features">
                    <div class="about-feature">
                        <div class="about-feature-icon">✓</div>
                        <span>Nationally Recognized Qualifications</span>
                    </div>
                    <div class="about-feature">
                        <div class="about-feature-icon">✓</div>
                        <span>Industry-Experienced Trainers</span>
                    </div>
                    <div class="about-feature">
                        <div class="about-feature-icon">✓</div>
                        <span>Modern Campus Facilities</span>
                    </div>
                    <div class="about-feature">
                        <div class="about-feature-icon">✓</div>
                        <span>Career Support Services</span>
                    </div>
                </div>
                <a href="{{ route('contact') }}" class="btn btn-primary" style="margin-top: 30px;">Learn More</a>
            </div>
            <div class="about-image fade-in">
                <div class="about-image-main">
                    <svg class="campus-scene" viewBox="0 0 400 450" preserveAspectRatio="xMidYMid meet">
                        <rect x="50" y="200" width="300" height="250" fill="rgba(255,255,255,0.1)" rx="10"/>
                        <rect x="80" y="150" width="80" height="300" fill="rgba(255,255,255,0.15)" rx="5"/>
                        <rect x="180" y="100" width="140" height="350" fill="rgba(255,255,255,0.12)" rx="5"/>
                        <rect x="100" y="180" width="40" height="40" fill="rgba(255,255,255,0.2)" rx="3"/>
                        <rect x="220" y="160" width="30" height="30" fill="rgba(255,255,255,0.2)" rx="3"/>
                        <rect x="260" y="200" width="40" height="40" fill="rgba(255,255,255,0.15)" rx="3"/>
                        <circle cx="200" cy="80" r="30" fill="rgba(255,255,255,0.1)"/>
                        <path d="M170 80 L200 30 L230 80 Z" fill="rgba(255,255,255,0.08)"/>
                    </svg>
                </div>
                <div class="about-badge">
                    <span class="about-badge-number">{{ $settings->rto_number ? 'RTO' : '' }}</span>
                    <span class="about-badge-text">{{ $settings->rto_number ?? 'Registered' }}</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Courses Section -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">Our Courses</span>
            <h2 class="section-title">Popular Programs</h2>
            <p class="section-subtitle">Explore our range of nationally recognized qualifications designed to help you achieve your career goals.</p>
        </div>
        <div class="courses-grid">
            @php
            $featuredCourses = \App\Models\Course::where('is_published', true)->take(3)->get();
            @endphp
            @forelse($featuredCourses as $course)
            <div class="course-card fade-in">
                <div class="course-image">
                    @if($course->image)
                    <div class="course-image-bg" style="background-image: url('{{ asset('storage/courses/' . $course->image) }}'); background-size: cover; background-position: center;"></div>
                    @else
                    <div class="course-image-bg" style="background: linear-gradient(135deg, #077E86 0%, #2A7970 100%); display: flex; align-items: center; justify-content: center;">
                        <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        </svg>
                    </div>
                    @endif
                    <span class="course-category">{{ ucfirst($course->category) }}</span>
                </div>
                <div class="course-content">
                    <h3 class="course-title">{{ $course->name }}</h3>
                    <p class="course-description">{{ Str::limit(strip_tags($course->description), 100) }}</p>
                    <div class="course-meta">
                        <span class="course-duration">📅 {{ $course->duration }} Weeks</span>
                        <a href="{{ route('courses.show', $course->slug) }}" class="btn btn-primary btn-small">View Details</a>
                    </div>
                </div>
            </div>
            @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 40px;">
                <p style="color: var(--text-muted);">No courses available at the moment.</p>
            </div>
            @endforelse
        </div>
        <div style="text-align: center; margin-top: 50px;">
            <a href="{{ route('courses') }}" class="btn btn-primary">View All Courses</a>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="section section-alt">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">Why Choose Us</span>
            <h2 class="section-title">The {{ $settings->college_name }} Advantage</h2>
            <p class="section-subtitle">We are committed to providing the best possible education and support for our students.</p>
        </div>
        <div class="stats-grid">
            <div class="stat-card fade-in">
                <div style="width: 70px; height: 70px; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); border-radius: 16px; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px; font-size: 32px;">🎯</div>
                <h4 style="font-size: 20px; font-weight: 700; margin-bottom: 15px; color: var(--text-dark);">Industry-Relevant Training</h4>
                <p style="color: var(--text-muted); line-height: 1.7;">Our courses are designed with industry input to ensure you learn the skills employers are looking for.</p>
            </div>
            <div class="stat-card fade-in">
                <div style="width: 70px; height: 70px; background: linear-gradient(135deg, var(--secondary) 0%, var(--accent) 100%); border-radius: 16px; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px; font-size: 32px;">🤝</div>
                <h4 style="font-size: 20px; font-weight: 700; margin-bottom: 15px; color: var(--text-dark);">Personal Support</h4>
                <p style="color: var(--text-muted); line-height: 1.7;">Our dedicated student support team is here to help you throughout your studies.</p>
            </div>
            <div class="stat-card fade-in">
                <div style="width: 70px; height: 70px; background: linear-gradient(135deg, var(--midnight) 0%, #1e3170 100%); border-radius: 16px; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px; font-size: 32px;">💼</div>
                <h4 style="font-size: 20px; font-weight: 700; margin-bottom: 15px; color: var(--text-dark);">Career Opportunities</h4>
                <p style="color: var(--text-muted); line-height: 1.7;">We provide career guidance and connections to help you kickstart your career.</p>
            </div>
            <div class="stat-card fade-in">
                <div style="width: 70px; height: 70px; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); border-radius: 16px; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px; font-size: 32px;">🌏</div>
                <h4 style="font-size: 20px; font-weight: 700; margin-bottom: 15px; color: var(--text-dark);">Diverse Community</h4>
                <p style="color: var(--text-muted); line-height: 1.7;">Study alongside students from over 50 countries in a welcoming environment.</p>
            </div>
        </div>
    </div>
</section>

<!-- Events Section -->
@php
$upcomingEvents = \App\Models\Event::where('is_published', true)
    ->where('start_date', '>=', now())
    ->orderBy('start_date')
    ->take(3)
    ->get();
@endphp
@if($upcomingEvents->count() > 0)
<section class="section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">Events</span>
            <h2 class="section-title">Upcoming Events</h2>
            <p class="section-subtitle">Stay updated with our latest events, workshops, and activities.</p>
        </div>
        <div class="events-grid">
            @foreach($upcomingEvents as $event)
            <div class="event-card fade-in">
                <div class="event-image">
                    <div class="event-date">
                        <span class="event-day">{{ \Carbon\Carbon::parse($event->start_date)->format('d') }}</span>
                        <span class="event-month">{{ \Carbon\Carbon::parse($event->start_date)->format('M') }}</span>
                    </div>
                </div>
                <div class="event-content">
                    <span class="event-category">{{ $event->location ?? 'Online' }}</span>
                    <h3 class="event-title">{{ $event->title }}</h3>
                    <div class="event-location">
                        <span>📅 {{ \Carbon\Carbon::parse($event->start_date)->format('F d, Y') }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div style="text-align: center; margin-top: 50px;">
            <a href="{{ route('events') }}" class="btn btn-primary">View All Events</a>
        </div>
    </div>
</section>
@endif

<!-- Testimonials -->
<section class="section section-alt">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">Testimonials</span>
            <h2 class="section-title">What Our Students Say</h2>
        </div>
        <div class="testimonials-slider">
            <div class="testimonial-card">
                <p class="testimonial-quote" id="testimonialQuote">"{{ $settings->college_name }} provided me with the skills and confidence I needed to launch my career. The hands-on training and supportive instructors made all the difference."</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar">
                        <svg viewBox="0 0 70 70" fill="none">
                            <circle cx="35" cy="25" r="12" fill="rgba(255,255,255,0.3)"/>
                            <path d="M10 65c0-15 10-25 25-25s25 10 25 25" fill="rgba(255,255,255,0.3)"/>
                        </svg>
                    </div>
                    <div class="testimonial-info">
                        <h4 id="testimonialName">Sarah Chen</h4>
                        <span id="testimonialRole">Diploma of IT Graduate</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-dots">
                <span class="testimonial-dot active" data-index="0"></span>
                <span class="testimonial-dot" data-index="1"></span>
                <span class="testimonial-dot" data-index="2"></span>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2 class="cta-title">Ready to Start Your Journey?</h2>
            <p class="cta-subtitle">Enroll now and take the first step towards your dream career. Our admissions team is here to help you.</p>
            <div class="hero-buttons">
                <a href="{{ route('admissions') }}" class="btn btn-primary">Apply Now</a>
                <a href="{{ route('contact') }}" class="btn btn-outline">Contact Us</a>
            </div>
        </div>
    </div>
</section>
@endsection
