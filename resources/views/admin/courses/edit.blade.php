@extends('admin.layouts.master')

@section('title', 'Edit Course')
@section('header-title', 'Edit Course')

@section('styles')
<style>
    .ck-editor__editable { min-height: 200px; }
    .form-section { margin-bottom: 30px; }
    .section-divider { border-top: 1px solid var(--border-color); margin: 30px 0; }
    .form-group { margin-bottom: 20px; }
    .form-label { font-weight: 600; margin-bottom: 8px; }
    .help-text { font-size: 0.85rem; color: #6c757d; margin-top: 4px; }
</style>
@endsection

@section('content')
@php
$coreUnitsText = is_array($course->core_units) ? implode("\n", $course->core_units) : ($course->core_units ?? '');
$electiveUnitsText = is_array($course->elective_units) ? implode("\n", $course->elective_units) : ($course->elective_units ?? '');
$careerOutcomesText = is_array($course->career_outcomes) ? implode("\n", $course->career_outcomes) : ($course->career_outcomes ?? '');
@endphp

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Course</h2>
    <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">Back</a>
</div>

<form action="{{ route('admin.courses.update', $course) }}" method="POST" enctype="multipart/form-data" id="courseForm">
    @csrf
    @method('PUT')
    
    <div class="card">
        <div class="card-body">
            <!-- Basic Information -->
            <div class="form-section">
                <h5 class="mb-3"><i class="fas fa-info-circle me-2"></i>Basic Information</h5>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label class="form-label">Name *</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $course->name) }}" required>
                        <small class="help-text">Full course name (e.g., "Diploma of Information Technology")</small>
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="form-label">Slug *</label>
                        <input type="text" name="slug" class="form-control" value="{{ old('slug', $course->slug) }}" required>
                        <small class="help-text">URL-friendly (e.g., "diploma-of-information-technology")</small>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Description *</label>
                    <textarea name="description" class="form-control ckeditor" id="editor-description">{{ old('description', $course->description) }}</textarea>
                    <small class="help-text">Brief summary - shows on course cards</small>
                </div>
                
                <div class="row">
                    <div class="col-md-4 form-group">
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
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Duration (weeks) *</label>
                        <input type="number" name="duration" class="form-control" value="{{ old('duration', $course->duration) }}" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Fee ($) *</label>
                        <input type="number" name="fee" class="form-control" value="{{ old('fee', $course->fee) }}" step="0.01" required>
                    </div>
                </div>
            </div>
            
            <div class="section-divider"></div>
            
            <!-- Course Details -->
            <div class="form-section">
                <h5 class="mb-3"><i class="fas fa-book me-2"></i>Course Details</h5>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label class="form-label">Study Mode</label>
                        <input type="text" name="study_mode" class="form-control" value="{{ old('study_mode', $course->study_mode) }}" placeholder="On Campus / Online">
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="form-label">Intake Months</label>
                        <input type="text" name="intake_months" class="form-control" value="{{ old('intake_months', $course->intake_months) }}" placeholder="January, May, September">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label class="form-label">Location</label>
                        <input type="text" name="location" class="form-control" value="{{ old('location', $course->location) }}" placeholder="Sydney, Melbourne">
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="form-label">CRICOS Code</label>
                        <input type="text" name="cricos_code" class="form-control" value="{{ old('cricos_code', $course->cricos_code) }}" placeholder="03456J">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Curriculum</label>
                    <textarea name="curriculum" class="form-control ckeditor" id="editor-curriculum">{{ old('curriculum', $course->curriculum) }}</textarea>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Instructor</label>
                    <input type="text" name="instructor" class="form-control" value="{{ old('instructor', $course->instructor) }}" placeholder="Course coordinator name">
                </div>
            </div>
            
            <div class="section-divider"></div>
            
            <!-- Course Structure & Outcomes -->
            <div class="form-section">
                <h5 class="mb-3"><i class="fas fa-sitemap me-2"></i>Course Structure & Outcomes</h5>
                
                <div class="form-group">
                    <label class="form-label">Core Units (one per line)</label>
                    <textarea name="core_units_text" class="form-control" rows="4">{{ old('core_units_text', $coreUnitsText) }}</textarea>
                    <small class="help-text">Enter one unit per line - will be saved as JSON</small>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Elective Units (one per line)</label>
                    <textarea name="elective_units_text" class="form-control" rows="4">{{ old('elective_units_text', $electiveUnitsText) }}</textarea>
                    <small class="help-text">Enter one unit per line - will be saved as JSON</small>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Career Outcomes (one per line)</label>
                    <textarea name="career_outcomes_text" class="form-control" rows="4">{{ old('career_outcomes_text', $careerOutcomesText) }}</textarea>
                    <small class="help-text">Enter one job role per line</small>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Entry Requirements</label>
                    <textarea name="entry_requirements" class="form-control ckeditor" id="editor-entry_requirements">{{ old('entry_requirements', $course->entry_requirements) }}</textarea>
                </div>
            </div>
            
            <div class="section-divider"></div>
            
            <!-- Admission Information -->
            <div class="form-section">
                <h5 class="mb-3"><i class="fas fa-clipboard-list me-2"></i>Admission Information</h5>
                <p class="text-muted mb-3">Configure specific admission details for this course.</p>
                
                <div class="form-group">
                    <label class="form-label">How to Apply</label>
                    <textarea name="how_to_apply" class="form-control ckeditor" id="editor-how_to_apply">{{ old('how_to_apply', $course->how_to_apply) }}</textarea>
                </div>
                
                <div class="form-group">
                    <label class="form-label">International Student Requirements</label>
                    <textarea name="international_requirements" class="form-control ckeditor" id="editor-international_requirements">{{ old('international_requirements', $course->international_requirements) }}</textarea>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Fees & Payment Plans</label>
                    <textarea name="fees_payment_info" class="form-control ckeditor" id="editor-fees_payment_info">{{ old('fees_payment_info', $course->fees_payment_info) }}</textarea>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Policies & Forms</label>
                    <textarea name="policies_forms" class="form-control ckeditor" id="editor-policies_forms">{{ old('policies_forms', $course->policies_forms) }}</textarea>
                </div>
            </div>
            
            <div class="section-divider"></div>
            
            <!-- Image & Status -->
            <div class="form-section">
                <h5 class="mb-3"><i class="fas fa-image me-2"></i>Image & Status</h5>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label class="form-label">Course Image</label>
                        <x-image-upload name="image" :currentImage="$course->image" label="Course Image" path="courses" />
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="form-label">&nbsp;</label>
                        <div class="form-check mt-2">
                            <input type="checkbox" name="is_published" class="form-check-input" value="1" {{ old('is_published', $course->is_published) ? 'checked' : '' }}>
                            <label class="form-check-label">Published</label>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary btn-lg">Update Course</button>
            </div>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.querySelector('input[name="name"]');
    const slugInput = document.querySelector('input[name="slug"]');
    
    if (nameInput && slugInput) {
        nameInput.addEventListener('input', function() {
            const slug = this.value
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim();
            if (slugInput.value === '' || slugInput.dataset.original === '{{ $course->slug }}') {
                slugInput.value = slug;
            }
        });
    }
});
</script>
@endsection
