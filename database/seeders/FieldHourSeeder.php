<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FieldHour;

class FieldHourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FieldHour::insert([
            [
                'start' => 1,
                'end' => 6,
                'position' => 1,
                'active' => TRUE,
                'field_day_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'start' => 9,
                'end' => 12,
                'position' => 2,
                'active' => TRUE,
                'field_day_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'start' => 2,
                'end' => 12,
                'position' => 1,
                'active' => TRUE,
                'field_day_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'start' => 3,
                'end' => 124,
                'position' => 1,
                'active' => TRUE,
                'field_day_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'start' => 2,
                'end' => 17,
                'position' => 1,
                'active' => TRUE,
                'field_day_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
