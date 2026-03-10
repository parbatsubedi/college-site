@extends('admin.layouts.master')

@section('title', 'Edit Course')

@section('content')
@php
// Convert JSON arrays to text for display
$coreUnitsText = is_array($course->core_units) ? implode("\n", $course->core_units) : '';
$electiveUnitsText = is_array($course->elective_units) ? implode("\n", $course->elective_units) : '';
$careerOutcomesText = is_array($course->career_outcomes) ? implode("\n", $course->career_outcomes) : '';
@endphp

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Course</h2>
    <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.courses.update', $course) }}" method="POST">
            @csrf
            @method('PUT')
            
            <!-- Basic Information -->
            <h5 class="mb-3">Basic Information</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Name *</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $course->name) }}" required>
                    <small class="text-muted">Full course name (e.g., "Diploma of Information Technology")</small>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Slug *</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug', $course->slug) }}" required>
                    <small class="text-muted">URL-friendly (e.g., "diploma-of-information-technology")</small>
                </div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Description *</label>
                <textarea name="description" class="form-control" rows="4" required>{{ old('description', $course->description) }}</textarea>
                <small class="text-muted">Brief summary (2-3 sentences) - shows on course cards</small>
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Category *</label>
                    <select name="category" class="form-select" required>
                        <option value="">Select Category</option>
                        <option value="it" {{ old('category', $course->category) == 'it' ? 'selected' : '' }}>Information Technology</option>
                        <option value="business" {{ old('category', $course->category) == 'business' ? 'selected' : '' }}>Business</option>
                        <option value="leadership" {{ old('category', $course->category) == 'leadership' ? 'selected' : '' }}>Leadership</option>
                        <option value="health" {{ old('category', $course->category) == 'health' ? 'selected' : '' }}>Health & Community</option>
                        <option value="english" {{ old('category', $course->category) == 'english' ? 'selected' : '' }}>English (ELICOS)</option>
                        <option value="community" {{ old('category', $course->category) == 'community' ? 'selected' : '' }}>Community Services</option>
                    </select>
                    <small class="text-muted">Used for category filter links</small>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Duration (weeks) *</label>
                    <input type="number" name="duration" class="form-control" value="{{ old('duration', $course->duration) }}" required>
                    <small class="text-muted">e.g., 52 = 52 weeks = 1 year</small>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Fee ($) *</label>
                    <input type="number" name="fee" class="form-control" value="{{ old('fee', $course->fee) }}" step="0.01" required>
                    <small class="text-muted">Tuition fee in dollars</small>
                </div>
            </div>
            
            <hr class="my-4">
            
            <!-- Course Details -->
            <h5 class="mb-3">Course Details</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Study Mode</label>
                    <input type="text" name="study_mode" class="form-control" value="{{ old('study_mode', $course->study_mode) }}" placeholder="On Campus / Online">
                    <small class="text-muted">How the course is delivered</small>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Intake Months</label>
                    <input type="text" name="intake_months" class="form-control" value="{{ old('intake_months', $course->intake_months) }}" placeholder="January, May, September">
                    <small class="text-muted">Months when new classes start</small>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Location</label>
                    <input type="text" name="location" class="form-control" value="{{ old('location', $course->location) }}" placeholder="Sydney, Melbourne">
                    <small class="text-muted">Campus locations</small>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">CRICOS Code</label>
                    <input type="text" name="cricos_code" class="form-control" value="{{ old('cricos_code', $course->cricos_code) }}" placeholder="03456J">
                    <small class="text-muted">For international students (e.g., "03456J")</small>
                </div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Curriculum</label>
                <textarea name="curriculum" class="form-control" rows="3">{{ old('curriculum', $course->curriculum) }}</textarea>
                <small class="text-muted">General curriculum description - shows in Course Overview</small>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Instructor</label>
                <input type="text" name="instructor" class="form-control" value="{{ old('instructor', $course->instructor) }}" placeholder="Course coordinator name">
            </div>
            
            <hr class="my-4">
            
            <!-- JSON Fields -->
            <h5 class="mb-3">Course Structure & Outcomes</h5>
            
            <div class="mb-3">
                <label class="form-label">Core Units (one per line)</label>
                <textarea name="core_units_text" class="form-control" rows="4" placeholder="Manage complex ICT projects&#10;Implement and manage ICT security">{{ old('core_units_text', $coreUnitsText) }}</textarea>
                <small class="text-muted">Enter one unit per line - will be saved as JSON</small>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Elective Units (one per line)</label>
                <textarea name="elective_units_text" class="form-control" rows="4" placeholder="Cyber security governance&#10;Software development">{{ old('elective_units_text', $electiveUnitsText) }}</textarea>
                <small class="text-muted">Enter one unit per line - will be saved as JSON</small>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Career Outcomes (one per line)</label>
                <textarea name="career_outcomes_text" class="form-control" rows="4" placeholder="IT Support Specialist&#10;Network Administrator&#10;Systems Analyst">{{ old('career_outcomes_text', $careerOutcomesText) }}</textarea>
                <small class="text-muted">Enter one job role per line - shows in Career Outcomes</small>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Entry Requirements</label>
                <textarea name="entry_requirements" class="form-control" rows="4" placeholder="• Completion of Year 12&#10;• IELTS 5.5 or equivalent&#10;• Minimum 18 years of age">{{ old('entry_requirements', $course->entry_requirements) }}</textarea>
                <small class="text-muted">Shows in Entry Requirements section</small>
            </div>
            
            <hr class="my-4">
            
            <!-- Admission Information -->
            <h5 class="mb-3">Admission Information</h5>
            <p class="text-muted mb-3">Configure specific admission details for this course. These will be shown on the admissions page when students select this course.</p>
            
            <div class="mb-3">
                <label class="form-label">How to Apply</label>
                <textarea name="how_to_apply" class="form-control" rows="4" placeholder="• Choose your desired course&#10;• Complete the online application form&#10;• Submit required documents&#10;• Wait for assessment and offer letter">{{ old('how_to_apply', $course->how_to_apply) }}</textarea>
                <small class="text-muted">Step-by-step application process for this course</small>
            </div>
            
            <div class="mb-3">
                <label class="form-label">International Student Requirements</label>
                <textarea name="international_requirements" class="form-control" rows="4" placeholder="• Valid passport&#10;• IELTS 5.5 (no band below 5.0)&#10;• Overseas Student Health Cover&#10;• Proof of sufficient funds">{{ old('international_requirements', $course->international_requirements) }}</textarea>
                <small class="text-muted">Specific requirements for international students</small>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Fees & Payment Plans</label>
                <textarea name="fees_payment_info" class="form-control" rows="4" placeholder="Tuition Fee: $15,000&#10;Payment Plan: Available in 4 installments&#10;• First installment: $3,750 (enrollment)&#10;• Second installment: $3,750 (week 13)&#10;• Third installment: $3,750 (week 26)&#10;• Fourth installment: $3,750 (week 39)">{{ old('fees_payment_info', $course->fees_payment_info) }}</textarea>
                <small class="text-muted">Fee structure and payment plan options</small>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Policies & Forms</label>
                <textarea name="policies_forms" class="form-control" rows="4" placeholder="• Student Handbook&#10;• Refund Policy&#10;• Complaint & Appeal Form&#10;• Credit Transfer Application">{{ old('policies_forms', $course->policies_forms) }}</textarea>
                <small class="text-muted">Available policies and forms for students</small>
            </div>
            
            <hr class="my-4">
            
            <!-- Image & Status -->
            <h5 class="mb-3">Image & Status</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Image URL</label>
                    <input type="text" name="image" class="form-control" value="{{ old('image', $course->image) }}" placeholder="course-image.jpg">
                    <small class="text-muted">Image filename (stored in public/images/courses/)</small>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">&nbsp;</label>
                    <div class="form-check mt-2">
                        <input type="checkbox" name="is_published" class="form-check-input" value="1" {{ old('is_published', $course->is_published) ? 'checked' : '' }}>
                        <label class="form-check-label">Published</label>
                        <small class="text-muted d-block">If unchecked, won't show on frontend</small>
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Update Course</button>
        </form>
    </div>
</div>
@endsection
