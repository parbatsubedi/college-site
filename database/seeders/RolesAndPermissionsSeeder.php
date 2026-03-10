<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);

        $userRole = Role::create([
            'name' => 'User',
            'slug' => 'user',
        ]);

        $manageUsers = Permission::create([
            'name' => 'Manage Users',
            'slug' => 'manage_users',
        ]);

        $manageContent = Permission::create([
            'name' => 'Manage Content',
            'slug' => 'manage_content',
        ]);

        $viewDashboard = Permission::create([
            'name' => 'View Dashboard',
            'slug' => 'view_dashboard',
        ]);

        $adminRole->permissions()->attach([$manageUsers->id, $manageContent->id, $viewDashboard->id]);
        $userRole->permissions()->attach([$viewDashboard->id]);

        $admin = User::updateOrCreate(
            ['email' => 'admin@college.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
            ]
        );

        $admin->assignRole($adminRole);
    }
}
