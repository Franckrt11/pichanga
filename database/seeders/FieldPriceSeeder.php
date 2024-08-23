<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FieldPrice;

class FieldPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FieldPrice::insert([
            [
                'half' => 50,
                'whole' => 100,
                'active' => TRUE,
                'field_hour_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'half' => 40,
                'whole' => 80,
                'active' => TRUE,
                'field_day_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'half' => 50,
                'whole' => 80,
                'active' => TRUE,
                'field_day_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'half' => 80,
                'whole' => 90,
                'active' => TRUE,
                'field_day_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'half' => 30,
                'whole' => 60,
                'active' => TRUE,
                'field_day_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
