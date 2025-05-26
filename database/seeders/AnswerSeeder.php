<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswerSeeder extends Seeder
{
    public function run()
    {
        DB::table('answers')->insert([
            [
                'user_id' => 1,
                'question_id' => 1,
                'value' => 4, // Contoh: Setuju
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'question_id' => 2,
                'value' => 2, // Contoh: Tidak Setuju
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'question_id' => 1,
                'value' => 5, // Sangat Setuju
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'question_id' => 3,
                'value' => 3, // Netral
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambah data jawaban lain sesuai kebutuhan
        ]);
    }
}
