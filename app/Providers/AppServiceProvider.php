<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        // Share settings with all views
        $settings = [
            'logo_desktop' => 'logo.png',
            'logo_mobile' => 'logo-mobile.png',
            'college_name' => 'Fusion College',
            'tagline' => '',
            'rto_number' => '',
            'cricos_code' => '',
            'phone' => '',
            'mobile' => '',
            'email' => '',
            'address' => '',
            'facebook' => '',
            'instagram' => '',
            'linkedin' => '',
            'twitter' => '',
            'office_hours' => '',
            'default_theme' => 'system',
        ];

        // Only query DB if the table exists
        if (Schema::hasTable('settings')) {
            $dbSettings = [
                'logo_desktop' => Setting::get('logo_desktop', $settings['logo_desktop']),
                'logo_mobile' => Setting::get('logo_mobile', $settings['logo_mobile']),
                'college_name' => Setting::get('college_name', $settings['college_name']),
                'tagline' => Setting::get('tagline', $settings['tagline']),
                'rto_number' => Setting::get('rto_number', $settings['rto_number']),
                'cricos_code' => Setting::get('cricos_code', $settings['cricos_code']),
                'phone' => Setting::get('phone', $settings['phone']),
                'mobile' => Setting::get('mobile', $settings['mobile']),
                'email' => Setting::get('email', $settings['email']),
                'address' => Setting::get('address', $settings['address']),
                'facebook' => Setting::get('facebook', $settings['facebook']),
                'instagram' => Setting::get('instagram', $settings['instagram']),
                'linkedin' => Setting::get('linkedin', $settings['linkedin']),
                'twitter' => Setting::get('twitter', $settings['twitter']),
                'office_hours' => Setting::get('office_hours', $settings['office_hours']),
                'default_theme' => Setting::get('default_theme', $settings['default_theme']),
            ];

            // Merge DB settings with defaults
            $settings = array_merge($settings, $dbSettings);
        }

        // Share settings with all views
        View::share('settings', (object) $settings);
    }
}
