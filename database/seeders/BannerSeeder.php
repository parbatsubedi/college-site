<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banners = [
            [
                'title' => 'Welcome to Fusion College of Technology',
                'subtitle' => 'Empowering Future Professionals Through Quality Education',
                'description' => 'Launch your career with nationally recognized qualifications and industry-experienced trainers.',
                'image_url' => 'https://images.unsplash.com/photo-1562774053-701939374585?w=1920&q=80',
                'button_text' => 'Apply Now',
                'button_link' => '#admissions',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'World-Class Education Facilities',
                'subtitle' => 'State-of-the-Art Campuses',
                'description' => 'Learn in modern environments equipped with the latest technology and resources.',
                'image_url' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=1920&q=80',
                'button_text' => 'Explore Courses',
                'button_link' => '#courses',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Hands-On Learning Experience',
                'subtitle' => 'Learn by Doing',
                'description' => 'Gain practical skills through real-world projects and industry partnerships.',
                'image_url' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=1920&q=80',
                'button_text' => 'View Campus',
                'button_link' => '#about',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Career-Focused Programs',
                'subtitle' => 'Your Future Starts Here',
                'description' => 'Our industry-recognized qualifications prepare you for success in your chosen field.',
                'image_url' => 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?w=1920&q=80',
                'button_text' => 'Learn More',
                'button_link' => '#about',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Join Our Global Community',
                'subtitle' => 'Diverse and Inclusive',
                'description' => 'Connect with students from around the world and build lifelong relationships.',
                'image_url' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=1920&q=80',
                'button_text' => 'Contact Us',
                'button_link' => '#contact',
                'order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($banners as $banner) {
            Banner::create($banner);
        }
    }
}

