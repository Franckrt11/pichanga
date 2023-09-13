<?php

namespace Database\Seeders;

use App\Models\CompanyActivityLog;
use Illuminate\Database\Seeder;

class CompanyActivityLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanyActivityLog::insert([
            [
                'message' => 'Has registrado una nueva cuenta.',
                'company_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'message' => 'Has registrado una nueva cuenta.',
                'company_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
