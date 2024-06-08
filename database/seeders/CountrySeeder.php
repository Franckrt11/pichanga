<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::insert([
            [
                'name' => 'Perú',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
