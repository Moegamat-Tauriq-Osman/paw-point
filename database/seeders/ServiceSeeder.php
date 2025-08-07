<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {

        Service::create([
            'name' => 'Cat Boarding',
            'price' => 150.00,
            'description' => 'Safe and cozy boarding for your feline friend.',
            'image' => 'service_images/cat_boarding.jpg',
            'duration' => 1440,
        ]);

        Service::create([
            'name' => 'Grooming Session',
            'price' => 75.00,
            'description' => 'Includes brushing, washing, and nail trimming.',
            'image' => 'service_images/grooming.jpg',
            'duration' => 60, 
        ]);
    }
}
