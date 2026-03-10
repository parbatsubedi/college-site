<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // College Logo
            'logo_desktop' => 'logo.png',
            'logo_mobile' => 'logo-mobile.png',

            // College Info
            'college_name' => 'Fusion College of Technology',
            'tagline' => 'Empowering Future Leaders',

            // RTO & CRICOS
            'rto_number' => 'RTO 12345',
            'cricos_code' => '03456J',

            // Contact Info
            'phone' => '+61 2 1234 5678',
            'mobile' => '+61 400 123 456',
            'email' => 'info@fusioncollege.edu.au',
            'address' => '123 Education Street, Sydney, NSW 2000, Australia',

            // Social Links
            'facebook' => 'https://facebook.com/fusioncollege',
            'instagram' => 'https://instagram.com/fusioncollege',
            'linkedin' => 'https://linkedin.com/company/fusioncollege',
            'twitter' => 'https://twitter.com/fusioncollege',

            // Office Hours
            'office_hours' => 'Mon - Fri: 8:00 AM - 5:00 PM',

            // Theme Settings
            'default_theme' => 'system',
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
    }
}
