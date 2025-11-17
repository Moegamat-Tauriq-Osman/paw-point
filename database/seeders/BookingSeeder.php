<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\User;
use App\Models\Service;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    public function run()
    {
        $user = User::where('role', 'user')->first();

        $serviceBoarding = Service::where('name', 'Cat Boarding')->first();
        $serviceGrooming = Service::where('name', 'Grooming Session')->first();

        Booking::create([
            'user_id' => $user->id,
            'service_id' => $serviceBoarding->id,
            'date' => Carbon::now()->addDays(5)->toDateString(),
            'time' => '09:00:00',
            'status' => 'pending',
            'name' => 'User',
            'email' => 'user@pawpoint.com',
            'phone' => '0712345678',
            'notes' => 'Please make sure she gets a window view!',
        ]);

        Booking::create([
            'user_id' => $user->id,
            'service_id' => $serviceGrooming->id,
            'date' => Carbon::now()->addDays(10)->toDateString(),
            'time' => '13:00:00',
            'status' => 'pending',
            'name' => 'User',
            'email' => 'user@pawpoint.com',
            'phone' => '0823456789',
            'notes' => 'He hates water — be gentle.',
        ]);
    }
}
