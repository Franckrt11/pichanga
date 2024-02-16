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
                'start' => '05:00:00',
                'end' => '10:00:00',
                'position' => 1,
                'active' => TRUE,
                'field_day_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'start' => '13:00:00',
                'end' => '16:00:00',
                'position' => 2,
                'active' => TRUE,
                'field_day_id' => 1,
                'created_at' => now(),
                'updated_at' => now()

            ],
        ]);
    }
}
