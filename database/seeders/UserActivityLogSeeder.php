<?php

namespace Database\Seeders;

use App\Models\UserActivityLog;
use Illuminate\Database\Seeder;

class UserActivityLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserActivityLog::insert([
            [
                'message' => 'Has creado una nueva cuenta.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'message' => 'Has creado una nueva cuenta.',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
