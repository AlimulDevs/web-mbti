<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileMatchingResultSeeder extends Seeder
{
    public function run()
    {
        DB::table('profile_matching_results')->insert([
            [
                'user_id' => 2,
                'major_id' => 1, // RPL
                'score' => 85.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'user_id' => 3,
                'major_id' => 2, // RPL
                'score' => 60.4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data sesuai kebutuhan
        ]);
    }
}
