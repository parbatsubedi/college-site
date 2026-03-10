<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * FIELD GUIDE - Understanding each field:
     * ======================================
     *
     * title         : Event name
     *                : Example: "Campus Open Day"
     *
     * description   : Event description (what to expect)
     *                : Shows in event card
     *
     * category      : Event type for filtering
     *                : Options: "open-day", "workshop", "graduation", "info-session", "networking"
     *                : Shows as badge on event card
     *
     * start_date    : When event starts (datetime)
     *                : Format: "2024-03-15 09:00:00"
     *                : Shows as date badge on event card
     *
     * end_date      : When event ends (datetime)
     *                : Format: "2024-03-15 17:00:00"
     *
     * location     : Where event is held
     *                : Example: "Sydney Campus" or "Online"
     *                : Shows location on event card
     *
     * image         : Image filename (optional)
     *                : If null, gradient background is shown
     *
     * is_published  : Whether to show on frontend
     *                : true = shows on website
     *                : false = hidden
     */
    public function run(): void
    {
        $events = [
            [
                'title' => 'Campus Open Day',
                'description' => 'Visit our campus, meet our trainers, and explore our state-of-the-art facilities. Get a firsthand look at our modern classrooms, computer labs, and student spaces.',
                'category' => 'open-day',
                'start_date' => now()->addMonths(1)->setDay(15)->setHour(9)->setMinute(0),
                'end_date' => now()->addMonths(1)->setDay(15)->setHour(16)->setMinute(0),
                'location' => 'Sydney Campus',
                'is_published' => true,
            ],
            [
                'title' => 'IT Career Workshop',
                'description' => 'Learn about career opportunities in IT and cybersecurity from industry experts. Network with professionals and discover pathways to your dream career.',
                'category' => 'workshop',
                'start_date' => now()->addMonths(1)->setDay(22)->setHour(14)->setMinute(0),
                'end_date' => now()->addMonths(1)->setDay(22)->setHour(17)->setMinute(0),
                'location' => 'Online',
                'is_published' => true,
            ],
            [
                'title' => 'Graduation Ceremony 2024',
                'description' => 'Celebrate the achievements of our graduating students. Join us for an unforgettable ceremony honoring their hard work and dedication.',
                'category' => 'graduation',
                'start_date' => now()->addMonths(2)->setDay(5)->setHour(18)->setMinute(0),
                'end_date' => now()->addMonths(2)->setDay(5)->setHour(21)->setMinute(0),
                'location' => 'Sydney Convention Center',
                'is_published' => true,
            ],
            [
                'title' => 'Course Information Night',
                'description' => 'Get detailed information about our courses and admission requirements. Speak directly with course coordinators and admissions team.',
                'category' => 'info-session',
                'start_date' => now()->addMonths(1)->setDay(18)->setHour(18)->setMinute(0),
                'end_date' => now()->addMonths(1)->setDay(18)->setHour(20)->setMinute(0),
                'location' => 'Melbourne Campus',
                'is_published' => true,
            ],
            [
                'title' => 'Resume Writing Workshop',
                'description' => 'Learn how to create a professional resume that stands out. Get tips from career experts and have your resume reviewed.',
                'category' => 'workshop',
                'start_date' => now()->addMonths(2)->setDay(25)->setHour(14)->setMinute(0),
                'end_date' => now()->addMonths(2)->setDay(25)->setHour(16)->setMinute(0),
                'location' => 'Online',
                'is_published' => true,
            ],
            [
                'title' => 'Industry Networking Event',
                'description' => 'Connect with employers and industry professionals. Make valuable connections that could launch your career.',
                'category' => 'networking',
                'start_date' => now()->addMonths(2)->setDay(10)->setHour(18)->setMinute(0),
                'end_date' => now()->addMonths(2)->setDay(10)->setHour(21)->setMinute(0),
                'location' => 'Sydney CBD',
                'is_published' => true,
            ],
            [
                'title' => 'Student Orientation',
                'description' => 'Welcome to Fusion College! Meet your fellow students, familiarize yourself with campus, and start your journey on the right foot.',
                'category' => 'open-day',
                'start_date' => now()->subMonths(2)->setDay(15)->setHour(10)->setMinute(0),
                'end_date' => now()->subMonths(2)->setDay(15)->setHour(15)->setMinute(0),
                'location' => 'Sydney Campus',
                'is_published' => false,
            ],
            [
                'title' => 'Tech Summit 2024',
                'description' => 'Annual technology conference featuring industry leaders, hands-on workshops, and the latest in tech innovations.',
                'category' => 'workshop',
                'start_date' => now()->subMonths(4)->setDay(20)->setHour(9)->setMinute(0),
                'end_date' => now()->subMonths(4)->setDay(21)->setHour(17)->setMinute(0),
                'location' => 'Melbourne Convention Center',
                'is_published' => false,
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
