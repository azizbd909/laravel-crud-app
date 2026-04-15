<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'name' => 'Diode Laser + Regular Hydra (Combo)',
            'description' => 'demo description',
            'mrp_price' => '9000 Tk',
            'selling_price' => '6000 Tk',
            'offer_price' => '5400 Tk',
        ]);

        Service::create([
            'name' => 'Chemical Peel Facial',
            'description' => 'another description',
            'mrp_price' => '8000 Tk',
            'selling_price' => '5000 Tk',
            'offer_price' => '4400 Tk',
        ]);
    }
}
