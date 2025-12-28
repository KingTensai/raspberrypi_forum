<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a default admin user
        User::create([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => Hash::make('Admin123!'),
            'is_admin' => true,
        ]);

        // Create 3 regular users
        User::create([
            'name' => 'maarten_gortz',
            'email' => 'maarten@ehb.be',
            'password' => Hash::make('Password123!'),
            'is_admin' => false,
        ]);

        User::create([
            'name' => 'elien_peeters',
            'email' => 'elien@ehb.be',
            'password' => Hash::make('Password123!'),
            'is_admin' => false,
        ]);

        User::create([
            'name' => 'michael_gortz',
            'email' => 'michael@ehb.be',
            'password' => Hash::make('Password123!'),
            'is_admin' => false,
        ]);

        // Optionally, create additional random users using factory
        // User::factory(10)->create();
    }
}
