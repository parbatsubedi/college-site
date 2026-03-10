<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Run our content seeders first
        $this->call([
            RolesAndPermissionsSeeder::class,
            SettingsSeeder::class,
            CourseSeeder::class,
            EventSeeder::class,
        ]);

    }
}
