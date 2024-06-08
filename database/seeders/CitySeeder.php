<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::insert([
            [
                'name' => 'Lima',
                'country_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
