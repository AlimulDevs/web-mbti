<?php

namespace Database\Seeders;

use App\Models\Major;
use App\Models\MajorCharacteristic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MajorCharacteristicSeeder extends Seeder
{
    public function run()
    {
        // Mengambil jurusan
        $rpl = Major::find(1);  // Jurusan RPL
        $tkj = Major::find(2);  // Jurusan TKJ

        // Menambahkan Karakteristik untuk Jurusan RPL
        MajorCharacteristic::create([
            'major_id' => $rpl->id,
            'indicator' => 'Logika',
            'weight' => 5,
        ]);

        MajorCharacteristic::create([
            'major_id' => $rpl->id,
            'indicator' => 'Kreativitas',
            'weight' => 4,
        ]);

        // Menambahkan Karakteristik untuk Jurusan TKJ
        MajorCharacteristic::create([
            'major_id' => $tkj->id,
            'indicator' => 'Keterampilan Teknis',
            'weight' => 5,
        ]);

        MajorCharacteristic::create([
            'major_id' => $tkj->id,
            'indicator' => 'Analisis Masalah',
            'weight' => 4,
        ]);
    }
}
