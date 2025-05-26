<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CriteriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert data ke dalam tabel 'criterias'
        DB::table('criterias')->insert([
            ['name' => 'Akreditas (C1)', 'code' => 'C1', 'profile' => 5, 'value' => 0.45, 'created_at' => now(),
                'updated_at' => now(),],
            ['name' => 'Fasilitas (C2)', 'code' => 'C2', 'profile' => 5, 'value' => 0.45, 'created_at' => now(),
                'updated_at' => now(),],
            ['name' => 'Atribut (C3)', 'code' => 'C3', 'profile' => 5, 'value' => 0.45, 'created_at' => now(),
                'updated_at' => now(),],
            ['name' => 'Jarak (C4)', 'code' => 'C4', 'profile' => 5, 'value' => 0.45, 'created_at' => now(),
                'updated_at' => now(),],
            ['name' => 'Jumlah Kelas (C5)', 'code' => 'C5', 'profile' => 4, 'value' => 0.25, 'created_at' => now(),
                'updated_at' => now(),],
            ['name' => 'Jumlah Guru (C6)', 'code' => 'C6', 'profile' => 4, 'value' => 0.25, 'created_at' => now(),
                'updated_at' => now(),],
            ['name' => 'Jumlah Siswa (C7)', 'code' => 'C7', 'profile' => 4, 'value' => 0.25, 'created_at' => now(),
                'updated_at' => now(),],
            ['name' => 'PKL/Magang (C8)', 'code' => 'C8', 'profile' => 4, 'value' => 0.25, 'created_at' => now(),
                'updated_at' => now(),],
            ['name' => 'Kerjasama Industri (C9)', 'code' => 'C9', 'profile' => 3, 'value' => 0.15, 'created_at' => now(),
                'updated_at' => now(),],
            ['name' => 'Beasiswa (C10)', 'code' => 'C10', 'profile' => 3, 'value' => 0.15, 'created_at' => now(),
                'updated_at' => now(),],
            ['name' => 'Jaringan Alumni (C11)', 'code' => 'C11', 'profile' => 3, 'value' => 0.15, 'created_at' => now(),
                'updated_at' => now(),],
            ['name' => 'Uji Kompetensi Keahlian (C12)', 'code' => 'C12', 'profile' => 3, 'value' => 0.15, 'created_at' => now(),
                'updated_at' => now(),],
            ['name' => 'Pengembangan Soft Skills (C13)', 'code' => 'C13', 'profile' => 3, 'value' => 0.15, 'created_at' => now(),
                'updated_at' => now(),],
            ['name' => 'Bimbingan Karir (C14)', 'code' => 'C14', 'profile' => 3, 'value' => 0.15, 'created_at' => now(),
                'updated_at' => now(),],
            ['name' => 'Sertifikasi Profesi (C15)', 'code' => 'C15', 'profile' => 3, 'value' => 0.15, 'created_at' => now(),
                'updated_at' => now(),],
        ]);
    }
}
