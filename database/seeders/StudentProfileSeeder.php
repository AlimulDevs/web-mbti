<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentProfileSeeder extends Seeder
{
    public function run()
    {
        DB::table('student_profiles')->insert([
            [
                'user_id' => 1,
                'indicator' => 'Logika',
                'value' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'indicator' => 'Kreativitas',
                'value' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'indicator' => 'Komunikasi',
                'value' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'indicator' => 'Problem Solving',
                'value' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'indicator' => 'Detail Oriented',
                'value' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'indicator' => 'Disiplin',
                'value' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambah data profil siswa lainnya sesuai kebutuhan
        ]);
    }
}
