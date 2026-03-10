@extends('layouts.master')

@section('title', 'Admissions - Fusion College of Technology')

@section('content')
<!-- Page Banner -->
<div class="page-banner">
    <div class="container">
        <div class="page-banner-content">
            <h1>Admissions</h1>
            <p>Start your journey to a brighter future with Fusion College</p>
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <span>Admissions</span>
            </div>
        </div>
    </div>
</div>

<!-- Course Selection -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">Choose Your Course</span>
            <h2 class="section-title">Select a Course to View Admission Details</h2>
            <p class="section-subtitle">Each course has specific admission requirements, fees, and policies.</p>
        </div>

        <div class="fade-in" style="max-width: 600px; margin: 0 auto 50px;">
            <div class="form-group">
                <label style="font-size: 16px; font-weight: 600; color: var(--text-dark); margin-bottom: 12px; display: block;">Select a Course</label>
                <form method="GET" action="{{ route('admissions') }}">
                    <select name="course_id" id="course_id" style="width: 100%; padding: 16px 20px; border: 2px solid var(--border-color); border-radius: 12px; font-size: 16px; background: var(--bg-light); color: var(--text-dark); cursor: pointer; transition: all 0.3s ease;" onchange="this.form.submit()">
                        <option value="">-- Choose a Course --</option>
                        @forelse($courses as $course)
                        <option value="{{ $course->id }}" {{ $selectedCourse && $selectedCourse->id == $course->id ? 'selected' : '' }}>
                            {{ $course->name }} (${{ number_format($course->fee, 0) }})
                        </option>
                        @empty
                        <option value="">No courses available</option>
                        @endforelse
                    </select>
                </form>
            </div>
        </div>

        @if($selectedCourse)
        <div class="fade-in">
            <!-- Course Info Banner -->
            <div style="background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); border-radius: 20px; padding: 40px; margin-bottom: 60px; color: white; text-align: center;">
                <h2 style="font-size: 32px; font-weight: 700; margin-bottom: 10px;">{{ $selectedCourse->name }}</h2>
                <div style="display: flex; justify-content: center; gap: 40px; flex-wrap: wrap; margin-top: 20px;">
                    <div>
                        <span style="font-size: 28px; font-weight: 700;">${{ number_format($selectedCourse->fee, 0) }}</span>
                        <p style="font-size: 14px; opacity: 0.9;">Tuition Fee</p>
                    </div>
                    <div>
                        <span style="font-size: 28px; font-weight: 700;">{{ $selectedCourse->duration }}</span>
                        <p style="font-size: 14px; opacity: 0.9;">Weeks</p>
                    </div>
                    @if($selectedCourse->location)
                    <div>
                        <span style="font-size: 28px; font-weight: 700;">{{ $selectedCourse->location }}</span>
                        <p style="font-size: 14px; opacity: 0.9;">Location</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- How to Apply -->
            <div class="section-header">
                <span class="section-badge">How to Apply</span>
                <h2 class="section-title">Application Process</h2>
            </div>
            @if($selectedCourse->how_to_apply)
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px; margin-bottom: 60px;">
                @php $steps = explode("\n", $selectedCourse->how_to_apply); @endphp
                @foreach($steps as $index => $step)
                @if(trim($step))
                <div style="background: var(--card-bg); padding: 30px; border-radius: 16px; border: 1px solid var(--border-color); text-align: left; transition: all 0.3s ease;" class="stat-card">
                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 20px; margin-bottom: 20px;">{{ $index + 1 }}</div>
                    <p style="color: var(--text-muted); margin: 0; font-size: 15px; line-height: 1.6;">{{ trim($step, '• ') }}</p>
                </div>
                @endif
                @endforeach
            </div>
            @else
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px; margin-bottom: 60px;">
                @foreach(['Choose your desired course', 'Complete the online application form', 'Submit required documents', 'Wait for assessment and offer letter'] as $index => $step)
                <div style="background: var(--card-bg); padding: 30px; border-radius: 16px; border: 1px solid var(--border-color); text-align: left;" class="stat-card">
                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 20px; margin-bottom: 20px;">{{ $index + 1 }}</div>
                    <p style="color: var(--text-muted); margin: 0; font-size: 15px; line-height: 1.6;">{{ $step }}</p>
                </div>
                @endforeach
            </div>
            @endif

            <!-- Entry Requirements -->
            <div class="section-alt" style="padding: 80px 0;">
                <div class="section-header">
                    <span class="section-badge">Requirements</span>
                    <h2 class="section-title">Entry Requirements</h2>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; max-width: 1000px; margin: 0 auto;">
                    <div style="background: var(--card-bg); padding: 35px; border-radius: 20px; border: 1px solid var(--border-color);">
                        <h3 style="font-size: 22px; font-weight: 700; margin-bottom: 25px; color: var(--text-dark); display: flex; align-items: center; gap: 12px;">
                            <span style="width: 50px; height: 50px; background: linear-gradient(135deg, #077E86 0%, #2A7970 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-size: 24px;">🇦🇺</span>
                            Domestic Students
                        </h3>
                        @if($selectedCourse->entry_requirements)
                        <ul style="list-style: none; padding: 0;">
                            @php $requirements = explode("\n", $selectedCourse->entry_requirements); @endphp
                            @foreach($requirements as $req)
                            @if(trim($req))
                            <li style="padding: 15px 0; color: var(--text-muted); border-bottom: 1px solid var(--border-color); display: flex; align-items: flex-start; gap: 12px; font-size: 15px;">
                                <span style="color: var(--primary); font-size: 18px; font-weight: 700;">✓</span>
                                <span>{{ trim($req, '• ') }}</span>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                        @else
                        <ul style="list-style: none; padding: 0;">
                            <li style="padding: 15px 0; color: var(--text-muted); border-bottom: 1px solid var(--border-color); display: flex; align-items: flex-start; gap: 12px; font-size: 15px;">
                                <span style="color: var(--primary); font-size: 18px; font-weight: 700;">✓</span>
                                Completion of Year 12 or equivalent
                            </li>
                            <li style="padding: 15px 0; color: var(--text-muted); border-bottom: 1px solid var(--border-color); display: flex; align-items: flex-start; gap: 12px; font-size: 15px;">
                                <span style="color: var(--primary); font-size: 18px; font-weight: 700;">✓</span>
                                English Language Proficiency
                            </li>
                            <li style="padding: 15px 0; color: var(--text-muted); display: flex; align-items: flex-start; gap: 12px; font-size: 15px;">
                                <span style="color: var(--primary); font-size: 18px; font-weight: 700;">✓</span>
                                Minimum 18 years of age
                            </li>
                        </ul>
                        @endif
                    </div>

                    <div style="background: var(--card-bg); padding: 35px; border-radius: 20px; border: 1px solid var(--border-color);">
                        <h3 style="font-size: 22px; font-weight: 700; margin-bottom: 25px; color: var(--text-dark); display: flex; align-items: center; gap: 12px;">
                            <span style="width: 50px; height: 50px; background: linear-gradient(135deg, #172566 0%, #1e3170 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-size: 24px;">🌍</span>
                            International Students
                        </h3>
                        @if($selectedCourse->international_requirements)
                        <ul style="list-style: none; padding: 0;">
                            @php $intlReqs = explode("\n", $selectedCourse->international_requirements); @endphp
                            @foreach($intlReqs as $req)
                            @if(trim($req))
                            <li style="padding: 15px 0; color: var(--text-muted); border-bottom: 1px solid var(--border-color); display: flex; align-items: flex-start; gap: 12px; font-size: 15px;">
                                <span style="color: var(--primary); font-size: 18px; font-weight: 700;">✓</span>
                                <span>{{ trim($req, '• ') }}</span>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                        @else
                        <ul style="list-style: none; padding: 0;">
                            <li style="padding: 15px 0; color: var(--text-muted); border-bottom: 1px solid var(--border-color); display: flex; align-items: flex-start; gap: 12px; font-size: 15px;">
                                <span style="color: var(--primary); font-size: 18px; font-weight: 700;">✓</span>
                                Valid Passport
                            </li>
                            <li style="padding: 15px 0; color: var(--text-muted); border-bottom: 1px solid var(--border-color); display: flex; align-items: flex-start; gap: 12px; font-size: 15px;">
                                <span style="color: var(--primary); font-size: 18px; font-weight: 700;">✓</span>
                                IELTS 5.5 (no band below 5.0) or equivalent
                            </li>
                            <li style="padding: 15px 0; color: var(--text-muted); display: flex; align-items: flex-start; gap: 12px; font-size: 15px;">
                                <span style="color: var(--primary); font-size: 18px; font-weight: 700;">✓</span>
                                Overseas Student Health Cover
                            </li>
                        </ul>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Fees & Payment -->
            <div class="section-header" style="margin-top: 60px;">
                <span class="section-badge">Fees</span>
                <h2 class="section-title">Fees & Payment Plans</h2>
            </div>
            <div style="background: var(--card-bg); padding: 40px; border-radius: 20px; border: 1px solid var(--border-color); max-width: 800px; margin: 0 auto 60px; text-align: center;">
                @if($selectedCourse->fees_payment_info)
                <div style="text-align: left; white-space: pre-line; color: var(--text-muted); line-height: 1.8; font-size: 16px;">{{ $selectedCourse->fees_payment_info }}</div>
                @else
                <div style="display: flex; align-items: center; justify-content: center; gap: 30px; flex-wrap: wrap;">
                    <div>
                        <span style="font-size: 48px; font-weight: 700; color: var(--primary);">${{ number_format($selectedCourse->fee, 0) }}</span>
                        <p style="color: var(--text-muted); font-size: 16px;">Total Tuition Fee</p>
                    </div>
                    <div style="text-align: left; padding-left: 30px; border-left: 2px solid var(--border-color);">
                        <p style="color: var(--text-muted); margin-bottom: 10px;">Payment Options:</p>
                        <ul style="list-style: none; padding: 0; color: var(--text-muted);">
                            <li style="margin-bottom: 8px;">✓ Full payment upfront</li>
                            <li style="margin-bottom: 8px;">✓ Semester-based payments</li>
                            <li>✓ Monthly payment plans available</li>
                        </ul>
                    </div>
                </div>
                @endif
            </div>

            <!-- Policies & Forms -->
            @if($selectedCourse->policies_forms)
            <div class="section-alt" style="padding: 80px 0;">
                <div class="section-header">
                    <span class="section-badge">Resources</span>
                    <h2 class="section-title">Policies & Forms</h2>
                </div>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 25px; max-width: 1000px; margin: 0 auto;">
                    @php $policies = explode("\n", $selectedCourse->policies_forms); @endphp
                    @foreach($policies as $policy)
                    @if(trim($policy))
                    <div style="background: var(--card-bg); padding: 30px; border-radius: 16px; border: 1px solid var(--border-color); text-align: center; transition: all 0.3s ease;" class="stat-card">
                        <span style="font-size: 40px;">📄</span>
                        <p style="color: var(--text-dark); font-weight: 600; margin: 15px 0 0; font-size: 15px;">{{ trim($policy, '• ') }}</p>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            @endif

            <!-- CTA -->
            <div class="cta-section">
                <div class="container">
                    <div class="cta-content">
                        <h2 class="cta-title">Ready to Apply?</h2>
                        <p class="cta-subtitle">Start your application for {{ $selectedCourse->name }} today.</p>
                        <div class="hero-buttons">
                            <a href="{{ route('contact') }}?course={{ $selectedCourse->id }}" class="btn btn-primary">Apply Now</a>
                            <a href="{{ route('courses.show', $selectedCourse->slug) }}" class="btn btn-outline">View Course Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <!-- Default content when no course selected -->
        <div class="fade-in">
            <!-- How to Apply Section -->
            <div>
                <div class="section-header">
                    <span class="section-badge">How to Apply</span>
                    <h2 class="section-title">Simple Steps to Join Us</h2>
                    <p class="section-subtitle">Our application process is straightforward and designed to help you get started quickly.</p>
                </div>

                <div class="stats-grid">
                    <div class="stat-card fade-in" style="text-align: left; padding: 35px;">
                        <div style="width: 60px; height: 60px; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); border-radius: 14px; display: flex; align-items: center; justify-content: center; color: white; font-size: 24px; font-weight: 700; margin-bottom: 20px;">1</div>
                        <h4 style="font-size: 20px; font-weight: 700; color: var(--text-dark); margin-bottom: 12px;">Choose Your Course</h4>
                        <p style="font-size: 15px; color: var(--text-muted); line-height: 1.7;">Browse our courses and select the one that matches your career goals and interests.</p>
                    </div>

                    <div class="stat-card fade-in" style="text-align: left; padding: 35px;">
                        <div style="width: 60px; height: 60px; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); border-radius: 14px; display: flex; align-items: center; justify-content: center; color: white; font-size: 24px; font-weight: 700; margin-bottom: 20px;">2</div>
                        <h4 style="font-size: 20px; font-weight: 700; color: var(--text-dark); margin-bottom: 12px;">Submit Application</h4>
                        <p style="font-size: 15px; color: var(--text-muted); line-height: 1.7;">Complete our online application form and submit the required documents.</p>
                    </div>

                    <div class="stat-card fade-in" style="text-align: left; padding: 35px;">
                        <div style="width: 60px; height: 60px; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); border-radius: 14px; display: flex; align-items: center; justify-content: center; color: white; font-size: 24px; font-weight: 700; margin-bottom: 20px;">3</div>
                        <h4 style="font-size: 20px; font-weight: 700; color: var(--text-dark); margin-bottom: 12px;">Assessment</h4>
                        <p style="font-size: 15px; color: var(--text-muted); line-height: 1.7;">Our admissions team will review your application and conduct any required assessments.</p>
                    </div>

                    <div class="stat-card fade-in" style="text-align: left; padding: 35px;">
                        <div style="width: 60px; height: 60px; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); border-radius: 14px; display: flex; align-items: center; justify-content: center; color: white; font-size: 24px; font-weight: 700; margin-bottom: 20px;">4</div>
                        <h4 style="font-size: 20px; font-weight: 700; color: var(--text-dark); margin-bottom: 12px;">Enroll & Begin</h4>
                        <p style="font-size: 15px; color: var(--text-muted); line-height: 1.7;">Accept your offer, complete enrollment, and start your learning journey.</p>
                    </div>
                </div>

                <div style="text-align: center; margin-top: 60px;">
                    <a href="{{ route('courses') }}" class="btn btn-primary" style="padding: 18px 45px; font-size: 16px;">Browse All Courses</a>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="cta-section" style="margin-top: 80px;">
                <div class="container">
                    <div class="cta-content">
                        <h2 class="cta-title">Still Have Questions?</h2>
                        <p class="cta-subtitle">Our admissions team is here to help you every step of the way.</p>
                        <div class="hero-buttons">
                            <a href="{{ route('contact') }}" class="btn btn-primary">Contact Admissions</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection
