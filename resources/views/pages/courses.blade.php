@extends('layouts.master')

@section('title', 'Our Courses - Fusion College of Technology')

@section('content')
@php
$categoryColors = [
    'it' => '#077E86 0%, #2A7970 100%',
    'business' => '#172566 0%, #1e3170 100%',
    'leadership' => '#CF5E1C 0%, #FD6406 100%',
    'community' => '#2A7970 0%, #077E86 100%',
];
$defaultColor = '#077E86 0%, #172566 100%';
@endphp

<!-- Page Banner -->
<div class="page-banner">
    <div class="container">
        <div class="page-banner-content">
            <h1>Our Courses</h1>
            <p>Explore our comprehensive range of vocational education and training programs</p>
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <span>Courses</span>
            </div>
        </div>
    </div>
</div>

<!-- Page Navigation -->
<div class="page-nav">
    <div class="container">
        <div class="page-nav-links">
            <a href="{{ route('courses') }}" class="page-nav-link {{ empty(request()->query('category')) ? 'active' : '' }}">All Courses</a>
            <a href="{{ route('courses') }}?category=it" class="page-nav-link {{ request()->query('category') == 'it' ? 'active' : '' }}">Information Technology</a>
            <a href="{{ route('courses') }}?category=business" class="page-nav-link {{ request()->query('category') == 'business' ? 'active' : '' }}">Business</a>
            <a href="{{ route('courses') }}?category=health" class="page-nav-link {{ request()->query('category') == 'health' ? 'active' : '' }}">Health & Community</a>
            <a href="{{ route('courses') }}?category=english" class="page-nav-link {{ request()->query('category') == 'english' ? 'active' : '' }}">English (ELICOS)</a>
        </div>
    </div>
</div>

<!-- Courses Section -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">Our Programs</span>
            <h2 class="section-title">Choose Your Path to Success</h2>
            <p class="section-subtitle">We offer a wide range of nationally recognized qualifications designed to help you achieve your career goals.</p>
        </div>

        <div class="courses-grid">
            @forelse($courses as $course)
            <div class="course-card fade-in">
                <div class="course-image">
                    @if($course->image)
                    <div class="course-image-bg" style="background-image: url('{{ asset('images/courses/' . $course->image) }}'); background-size: cover; background-position: center;">
                    </div>
                    @else
                    <div class="course-image-bg" style="background: linear-gradient(135deg, {{ isset($categoryColors[$course->category]) ? $categoryColors[$course->category] : $defaultColor }}); display: flex; align-items: center; justify-content: center;">
                        <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5">
                            @if($course->category == 'it')
                            <path d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2v-4M9 21H5a2 2 0 01-2-2v-4"/>
                            <path d="M3 9h18M3 15h18"/>
                            @elseif($course->category == 'business')
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                            @elseif($course->category == 'leadership')
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                            @else
                            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            @endif
                        </svg>
                    </div>
                    @endif
                    <span class="course-category">{{ ucfirst($course->category) }}</span>
                </div>
                <div class="course-content">
                    <h3 class="course-title">{{ $course->name }}</h3>
                    <p class="course-description">{{ $course->description }}</p>
                    <div class="course-meta">
                        <span class="course-duration">📅 {{ $course->duration }} Weeks</span>
                        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-primary btn-small">View Details</a>
                    </div>
                </div>
            </div>
            @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px;">
                <p style="font-size: 18px; color: var(--text-muted);">No courses available at the moment. Please check back later.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2 class="cta-title">Ready to Start Your Journey?</h2>
            <p class="cta-subtitle">Join thousands of students who have transformed their careers with Fusion College.</p>
            <div class="hero-buttons">
                <a href="{{ route('admissions') }}" class="btn btn-primary">Apply Now</a>
                <a href="{{ route('contact') }}" class="btn btn-outline">Contact Us</a>
            </div>
        </div>
    </div>
</section>
@endsection
