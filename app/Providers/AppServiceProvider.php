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
            'logo_desktop' => Setting::get('logo_desktop', 'logo.png'),
            'logo_mobile' => Setting::get('logo_mobile', 'logo-mobile.png'),
            'college_name' => Setting::get('college_name', 'Fusion College'),
            'tagline' => Setting::get('tagline', ''),
            'rto_number' => Setting::get('rto_number', ''),
            'cricos_code' => Setting::get('cricos_code', ''),
            'phone' => Setting::get('phone', ''),
            'mobile' => Setting::get('mobile', ''),
            'email' => Setting::get('email', ''),
            'address' => Setting::get('address', ''),
            'facebook' => Setting::get('facebook', ''),
            'instagram' => Setting::get('instagram', ''),
            'linkedin' => Setting::get('linkedin', ''),
            'twitter' => Setting::get('twitter', ''),
            'office_hours' => Setting::get('office_hours', ''),
            'default_theme' => Setting::get('default_theme', 'system'),
        ];

        View::share('settings', (object) $settings);
    }
}
