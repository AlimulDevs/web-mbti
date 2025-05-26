<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedbackSeeder extends Seeder
{
    public function run()
    {
        DB::table('feedbacks')->insert([
            [
                'user_id' => 1,
                'feedback' => 'Situs ini sangat membantu saya memahami tipe MBTI saya.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'feedback' => 'Saya suka fitur profile matching-nya, sangat akurat!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'feedback' => 'Tolong tambahkan lebih banyak pertanyaan agar hasil lebih detail.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan feedback lain sesuai kebutuhan
        ]);
    }
}
