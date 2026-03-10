@extends('admin.layouts.master')

@section('title', 'General Settings')
@section('header-title', 'General Settings')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-cog me-2"></i>College Information</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">College Name</label>
                    <input type="text" name="college_name" class="form-control" value="{{ $settings->get('college_name')?->value ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tagline</label>
                    <input type="text" name="tagline" class="form-control" value="{{ $settings->get('tagline')?->value ?? '' }}">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Logo (Desktop)</label>
                    <input type="text" name="logo_desktop" class="form-control" value="{{ $settings->get('logo_desktop')?->value ?? '' }}" placeholder="logo.png">
                    <small class="text-muted">Image filename in public/images/</small>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Logo (Mobile)</label>
                    <input type="text" name="logo_mobile" class="form-control" value="{{ $settings->get('logo_mobile')?->value ?? '' }}" placeholder="logo-mobile.png">
                    <small class="text-muted">Image filename in public/images/</small>
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="card-header border-0 px-0">
                <h5 class="mb-0"><i class="fas fa-building me-2"></i>RTO & CRICOS Information</h5>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">RTO Number</label>
                    <input type="text" name="rto_number" class="form-control" value="{{ $settings->get('rto_number')?->value ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">CRICOS Code</label>
                    <input type="text" name="cricos_code" class="form-control" value="{{ $settings->get('cricos_code')?->value ?? '' }}">
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="card-header border-0 px-0">
                <h5 class="mb-0"><i class="fas fa-phone me-2"></i>Contact Information</h5>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ $settings->get('phone')?->value ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Mobile</label>
                    <input type="text" name="mobile" class="form-control" value="{{ $settings->get('mobile')?->value ?? '' }}">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $settings->get('email')?->value ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Office Hours</label>
                    <input type="text" name="office_hours" class="form-control" value="{{ $settings->get('office_hours')?->value ?? '' }}">
                </div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control" value="{{ $settings->get('address')?->value ?? '' }}">
            </div>
            
            <hr class="my-4">
            
            <div class="card-header border-0 px-0">
                <h5 class="mb-0"><i class="fas fa-share-alt me-2"></i>Social Media Links</h5>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Facebook</label>
                    <input type="text" name="facebook" class="form-control" value="{{ $settings->get('facebook')?->value ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Instagram</label>
                    <input type="text" name="instagram" class="form-control" value="{{ $settings->get('instagram')?->value ?? '' }}">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">LinkedIn</label>
                    <input type="text" name="linkedin" class="form-control" value="{{ $settings->get('linkedin')?->value ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Twitter</label>
                    <input type="text" name="twitter" class="form-control" value="{{ $settings->get('twitter')?->value ?? '' }}">
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="card-header border-0 px-0">
                <h5 class="mb-0"><i class="fas fa-palette me-2"></i>Theme Settings</h5>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Default Theme</label>
                    <select name="default_theme" class="form-select">
                        <option value="system" {{ ($settings->get('default_theme')?->value ?? 'system') == 'system' ? 'selected' : '' }}>System Default</option>
                        <option value="light" {{ ($settings->get('default_theme')?->value ?? '') == 'light' ? 'selected' : '' }}>Light</option>
                        <option value="dark" {{ ($settings->get('default_theme')?->value ?? '') == 'dark' ? 'selected' : '' }}>Dark</option>
                    </select>
                </div>
            </div>
            
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Save Settings</button>
            </div>
        </form>
    </div>
</div>
@endsection
