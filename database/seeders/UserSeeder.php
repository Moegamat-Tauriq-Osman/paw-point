<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin ',
            'email' => 'admin@pawpoint.com',
            'role' => 'Admin',
            'password' => Hash::make('admin'),
        ]);

        User::factory()->create([
            'name' => 'Staff ',
            'email' => 'staff@pawpoint.com',
            'role' => 'Staff',
            'password' => Hash::make('staff'),
        ]);

        User::factory()->create([
            'name' => 'User ',
            'email' => 'user@pawpoint.com',
            'role' => 'User',
            'password' => Hash::make('user'),
        ]);

        User::factory()->count(10)->create();
    }
}
