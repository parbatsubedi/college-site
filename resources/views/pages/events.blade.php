@extends('layouts.master')

@section('title', 'Events - Fusion College of Technology')

@section('content')
<!-- Page Banner -->
<div class="page-banner">
    <div class="container">
        <div class="page-banner-content">
            <h1>Events</h1>
            <p>Stay updated with upcoming events, workshops, and activities at Fusion College</p>
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <span>Events</span>
            </div>
        </div>
    </div>
</div>

<!-- Events Section -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">Upcoming Events</span>
            <h2 class="section-title">Join Our Events</h2>
            <p class="section-subtitle">Discover workshops, open days, and networking opportunities</p>
        </div>

        <div class="events-grid">
            @forelse($events as $event)
            <div class="event-card fade-in">
                <div class="event-image">
                    @if($event->image)
                    <div style="width: 100%; height: 100%; background-image: url('{{ asset('storage/events/' . $event->image) }}'); background-size: cover; background-position: center;">
                    @else
                    <div style="width: 100%; height: 100%; background: linear-gradient(135deg, {{ $event->category == 'workshop' ? '#172566 0%, #1e3170 100%' : ($event->category == 'graduation' ? '#CF5E1C 0%, #FD6406 100%' : ($event->category == 'networking' ? '#077E86 0%, #172566 100%' : '#077E86 0%, #2A7970 100%')) }}; display: flex; align-items: center; justify-content: center;">
                        @switch($event->category)
                            @case('workshop')
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                            </svg>
                                @break
                            @case('graduation')
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5">
                                <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                                <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                            </svg>
                                @break
                            @case('networking')
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5">
                                <circle cx="12" cy="12" r="10"/>
                                <polygon points="10,8 16,12 10,16 10,8"/>
                            </svg>
                                @break
                            @case('info-session')
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5">
                                <circle cx="12" cy="12" r="10"/>
                                <path d="M12 16v-4M12 8h.01"/>
                            </svg>
                                @break
                            @default
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                <line x1="16" y1="2" x2="16" y2="6"/>
                                <line x1="8" y1="2" x2="8" y2="6"/>
                                <line x1="3" y1="10" x2="21" y2="10"/>
                            </svg>
                        @endswitch
                    </div>
                    @endif
                    <div class="event-date">
                        <span class="event-day">{{ $event->start_date->format('d') }}</span>
                        <span class="event-month">{{ $event->start_date->format('M') }}</span>
                    </div>
                </div>
                <div class="event-content">
                    <span class="event-category">{{ ucfirst(str_replace('-', ' ', $event->category ?? 'event')) }}</span>
                    <h3 class="event-title">{{ $event->title }}</h3>
                    <p style="font-size: 14px; color: var(--text-muted); margin-bottom: 15px;">{{ $event->description }}</p>
                    <div class="event-location">
                        <span>📍</span>
                        <span>{{ $event->location ?? 'TBA' }}</span>
                    </div>
                </div>
            </div>
            @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px;">
                <p style="font-size: 18px; color: var(--text-muted);">No upcoming events at the moment. Please check back later.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Past Events -->
<section class="section section-alt">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">Past Events</span>
            <h2 class="section-title">Recent Highlights</h2>
        </div>
        
        @php
        $pastEvents = \App\Models\Event::where('is_published', false)
            ->orWhere('start_date', '<', now())
            ->orderBy('start_date', 'desc')
            ->limit(4)
            ->get();
        @endphp

        @if($pastEvents->count() > 0)
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px;">
            @foreach($pastEvents as $pastEvent)
            <div class="gallery-item" style="aspect-ratio: auto; height: 200px; background: linear-gradient(135deg, #077E86 0%, #2A7970 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-size: 14px; text-align: center; padding: 20px;">
                <div>
                    <strong>{{ $pastEvent->title }}</strong>
                    <p style="font-size: 12px; opacity: 0.8; margin-top: 5px;">{{ $pastEvent->start_date->format('F Y') }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div style="text-align: center; padding: 40px;">
            <p style="color: var(--text-muted);">No past events to display.</p>
        </div>
        @endif
    </div>
</section>

<!-- CTA -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2 class="cta-title">Stay Connected</h2>
            <p class="cta-subtitle">Subscribe to our newsletter to get updates about upcoming events.</p>
            <div class="hero-buttons">
                <a href="{{ route('contact') }}" class="btn btn-primary">Contact Us</a>
                <a href="{{ route('courses') }}" class="btn btn-outline">View Courses</a>
            </div>
        </div>
    </div>
</section>
@endsection
