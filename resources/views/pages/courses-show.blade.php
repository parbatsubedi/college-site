@extends('layouts.master')

@section('title', $course->name . ' - Fusion College of Technology')

@section('content')
<!-- Page Banner -->
<div class="page-banner">
    <div class="container">
        <div class="page-banner-content">
            <h1 id="courseTitle">{{ $course->name }}</h1>
            <p id="courseCode">{{ $course->category ? strtoupper($course->category) : 'Nationally Recognized' }} | {{ $course->cricos_code ? 'CRICOS: ' . $course->cricos_code : 'Nationally Recognized Qualification' }}</p>
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="{{ route('courses') }}">Courses</a>
                <span>/</span>
                <span>{{ $course->name }}</span>
            </div>
        </div>
    </div>
</div>

<!-- Course Detail Section -->
<section class="section">
    <div class="container">
        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 50px;">
            <!-- Main Content -->
            <div>
                <div class="fade-in">
                    <h2 style="font-size: 28px; font-weight: 700; margin-bottom: 20px; color: var(--text-dark);">Course Overview</h2>
                    <p style="font-size: 16px; color: var(--text-muted); line-height: 1.8; margin-bottom: 30px;">
                        {{ $course->description }}
                    </p>
                    @if($course->curriculum)
                    <p style="font-size: 16px; color: var(--text-muted); line-height: 1.8; margin-bottom: 30px;">
                        {{ $course->curriculum }}
                    </p>
                    @endif
                </div>

                @if($course->core_units || $course->elective_units)
                <div class="fade-in" style="margin-top: 40px;">
                    <h3 style="font-size: 22px; font-weight: 700; margin-bottom: 20px; color: var(--text-dark);">Course Structure</h3>
                    <div style="background: var(--card-bg); border: 1px solid var(--border-color); border-radius: 12px; overflow: hidden;">
                        @if($course->core_units && count($course->core_units) > 0)
                        <div style="padding: 20px; border-bottom: 1px solid var(--border-color);">
                            <h4 style="font-size: 16px; font-weight: 600; color: var(--primary); margin-bottom: 10px;">Core Units</h4>
                            <ul style="list-style: none; padding: 0;">
                                @foreach($course->core_units as $unit)
                                <li style="padding: 10px 0; color: var(--text-muted); border-bottom: 1px solid var(--border-color);">• {{ $unit }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if($course->elective_units && count($course->elective_units) > 0)
                        <div style="padding: 20px;">
                            <h4 style="font-size: 16px; font-weight: 600; color: var(--primary); margin-bottom: 10px;">Elective Units</h4>
                            <ul style="list-style: none; padding: 0;">
                                @foreach($course->elective_units as $unit)
                                <li style="padding: 10px 0; color: var(--text-muted); border-bottom: 1px solid var(--border-color);">• {{ $unit }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
                @endif

                @if($course->career_outcomes && count($course->career_outcomes) > 0)
                <div class="fade-in" style="margin-top: 40px;">
                    <h3 style="font-size: 22px; font-weight: 700; margin-bottom: 20px; color: var(--text-dark);">Career Outcomes</h3>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                        <div style="background: var(--bg-section); padding: 20px; border-radius: 10px; border: 1px solid var(--border-color);">
                            <h4 style="font-size: 16px; font-weight: 600; color: var(--text-dark); margin-bottom: 10px;">Job Roles</h4>
                            <ul style="list-style: none; padding: 0; color: var(--text-muted); font-size: 14px;">
                                @foreach($course->career_outcomes as $outcome)
                                <li style="margin-bottom: 8px;">• {{ $outcome }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endif

                @if($course->entry_requirements)
                <div class="fade-in" style="margin-top: 40px;">
                    <h3 style="font-size: 22px; font-weight: 700; margin-bottom: 20px; color: var(--text-dark);">Entry Requirements</h3>
                    <div style="background: var(--card-bg); padding: 25px; border-radius: 12px; border: 1px solid var(--border-color);">
                        <ul style="list-style: none; padding: 0;">
                            @php
                            $requirements = explode("\n", $course->entry_requirements);
                            @endphp
                            @foreach($requirements as $req)
                            @if(trim($req))
                            <li style="padding: 12px 0; color: var(--text-muted); border-bottom: 1px solid var(--border-color); display: flex; align-items: center; gap: 10px;">
                                <span style="color: var(--primary);">✓</span> {{ trim($req, '• ') }}
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                @if($course->how_to_apply)
                <div class="fade-in" style="margin-top: 40px;">
                    <h3 style="font-size: 22px; font-weight: 700; margin-bottom: 20px; color: var(--text-dark);">How to Apply</h3>
                    <div style="background: var(--card-bg); padding: 25px; border-radius: 12px; border: 1px solid var(--border-color);">
                        <ul style="list-style: none; padding: 0;">
                            @php
                            $steps = explode("\n", $course->how_to_apply);
                            @endphp
                            @foreach($steps as $step)
                            @if(trim($step))
                            <li style="padding: 12px 0; color: var(--text-muted); border-bottom: 1px solid var(--border-color); display: flex; align-items: center; gap: 10px;">
                                <span style="color: var(--primary);">→</span> {{ trim($step, '• ') }}
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                @if($course->international_requirements)
                <div class="fade-in" style="margin-top: 40px;">
                    <h3 style="font-size: 22px; font-weight: 700; margin-bottom: 20px; color: var(--text-dark);">International Students</h3>
                    <div style="background: var(--card-bg); padding: 25px; border-radius: 12px; border: 1px solid var(--border-color);">
                        <ul style="list-style: none; padding: 0;">
                            @php
                            $intlReqs = explode("\n", $course->international_requirements);
                            @endphp
                            @foreach($intlReqs as $req)
                            @if(trim($req))
                            <li style="padding: 12px 0; color: var(--text-muted); border-bottom: 1px solid var(--border-color); display: flex; align-items: center; gap: 10px;">
                                <span style="color: var(--primary);">✓</span> {{ trim($req, '• ') }}
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                @if($course->fees_payment_info)
                <div class="fade-in" style="margin-top: 40px;">
                    <h3 style="font-size: 22px; font-weight: 700; margin-bottom: 20px; color: var(--text-dark);">Fees & Payment Plans</h3>
                    <div style="background: var(--card-bg); padding: 25px; border-radius: 12px; border: 1px solid var(--border-color); white-space: pre-line;">{{ $course->fees_payment_info }}</div>
                </div>
                @endif

                @if($course->policies_forms)
                <div class="fade-in" style="margin-top: 40px;">
                    <h3 style="font-size: 22px; font-weight: 700; margin-bottom: 20px; color: var(--text-dark);">Policies & Forms</h3>
                    <div style="background: var(--card-bg); padding: 25px; border-radius: 12px; border: 1px solid var(--border-color);">
                        <ul style="list-style: none; padding: 0;">
                            @php
                            $policies = explode("\n", $course->policies_forms);
                            @endphp
                            @foreach($policies as $policy)
                            @if(trim($policy))
                            <li style="padding: 10px 0; color: var(--text-muted); border-bottom: 1px solid var(--border-color);">
                                <span style="color: var(--primary);">📄</span> {{ trim($policy, '• ') }}
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div>
                <div style="background: var(--card-bg); border-radius: 16px; padding: 30px; box-shadow: 0 10px 40px var(--shadow); border: 1px solid var(--border-color); position: sticky; top: 100px;" class="fade-in">
                    <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 25px; color: var(--text-dark);">Quick Facts</h3>
                    
                    <div style="margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid var(--border-color);">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span style="color: var(--text-muted); font-size: 14px;">Duration</span>
                            <span style="color: var(--text-dark); font-weight: 600; font-size: 14px;">{{ $course->duration }} Weeks</span>
                        </div>
                        @if($course->study_mode)
                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span style="color: var(--text-muted); font-size: 14px;">Study Mode</span>
                            <span style="color: var(--text-dark); font-weight: 600; font-size: 14px;">{{ $course->study_mode }}</span>
                        </div>
                        @endif
                        @if($course->intake_months)
                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span style="color: var(--text-muted); font-size: 14px;">Intake</span>
                            <span style="color: var(--text-dark); font-weight: 600; font-size: 14px;">{{ $course->intake_months }}</span>
                        </div>
                        @endif
                        @if($course->location)
                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span style="color: var(--text-muted); font-size: 14px;">Location</span>
                            <span style="color: var(--text-dark); font-weight: 600; font-size: 14px;">{{ $course->location }}</span>
                        </div>
                        @endif
                        @if($course->cricos_code)
                        <div style="display: flex; justify-content: space-between;">
                            <span style="color: var(--text-muted); font-size: 14px;">CRICOS</span>
                            <span style="color: var(--text-dark); font-weight: 600; font-size: 14px;">{{ $course->cricos_code }}</span>
                        </div>
                        @endif
                    </div>

                    @if($course->fee > 0)
                    <div style="margin-bottom: 25px;">
                        <span style="color: var(--text-muted); font-size: 14px; display: block; margin-bottom: 8px;">Tuition Fee</span>
                        <span style="font-size: 32px; font-weight: 700; color: var(--primary);">${{ number_format($course->fee, 0) }}</span>
                        <span style="color: var(--text-muted); font-size: 14px;">per year</span>
                    </div>
                    @endif

                    <a href="{{ route('admissions') }}" class="btn btn-primary" style="width: 100%; text-align: center; margin-bottom: 15px;">Apply Now</a>
                    <a href="{{ route('contact') }}" class="btn btn-outline" style="width: 100%; text-align: center; border: 2px solid var(--primary); color: var(--primary);">Enquire Now</a>

                    <div style="margin-top: 25px; padding-top: 20px; border-top: 1px solid var(--border-color);">
                        <h4 style="font-size: 14px; font-weight: 600; margin-bottom: 15px; color: var(--text-dark);">Need Help?</h4>
                        <p style="font-size: 13px; color: var(--text-muted); margin-bottom: 15px;">Speak to our course advisors</p>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <span>📞</span>
                            <span style="color: var(--text-dark); font-weight: 600;">1300 123 456</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Courses -->
<section class="section section-alt">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Related Courses</h2>
        </div>
        <div class="courses-grid">
            @php
            $relatedCourses = \App\Models\Course::where('id', '!=', $course->id)
                ->where('category', $course->category)
                ->where('is_published', true)
                ->limit(3)
                ->get();
            @endphp
            
            @forelse($relatedCourses as $related)
            <div class="course-card fade-in">
                <div class="course-image">
                    <div class="course-image-bg" style="background: linear-gradient(135deg, #077E86 0%, #2A7970 100%); display: flex; align-items: center; justify-content: center;">
                        <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        </svg>
                    </div>
                    <span class="course-category">{{ ucfirst($related->category) }}</span>
                </div>
                <div class="course-content">
                    <h3 class="course-title">{{ $related->name }}</h3>
                    <div class="course-meta">
                        <span class="course-duration">📅 {{ $related->duration }} Weeks</span>
                        <a href="{{ route('courses.show', $related->id) }}" class="btn btn-primary btn-small">View Details</a>
                    </div>
                </div>
            </div>
            @empty
            <div style="grid-column: 1 / -1; text-align: center;">
                <p style="color: var(--text-muted);">No related courses available.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
