<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MbtiResultSeeder extends Seeder
{
    public function run()
    {
        DB::table('mbti_results')->insert([
            [
                'user_id' => 2,
                'mbti_type' => 'ESTJ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'mbti_type' => 'INTJ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambah data hasil lain jika perlu
        ]);
    }
}
