<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MajorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $majors = [
            // SMKN 1 LHOKSEUMAWE
            ['id'=>1,'name' => 'Teknik Komputer dan Jaringan', 'personality_type' => 'INTJ', 'school_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>2,'name' => 'Desain Komunikasi Visual', 'personality_type' => 'ISFP', 'school_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>3,'name' => 'Manajemen Perkantoran dan Layanan', 'personality_type' => 'ENTJ', 'school_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>4,'name' => 'Akuntansi Lembaga', 'personality_type' => 'ENTJ', 'school_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>5,'name' => 'Pengembangan Perangkat Lunak', 'personality_type' => 'INFP', 'school_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>6,'name' => 'Teknik Elektronika', 'personality_type' => 'ENTP', 'school_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>7,'name' => 'Bisnis Digital', 'personality_type' => 'ENFJ', 'school_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            // SMKN 2 LHOKSEUMAWE
            ['id'=>8,'name' => 'Kuliner', 'personality_type' => 'ESFP', 'school_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>9,'name' => 'Tata Busana', 'personality_type' => 'ENFP', 'school_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>10,'name' => 'Kecantikan & SPA', 'personality_type' => 'INFJ', 'school_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>11,'name' => 'Perhotelan', 'personality_type' => 'ENFP', 'school_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>12,'name' => 'Usaha Layanan Pariwisata', 'personality_type' => 'ENFP', 'school_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>13,'name' => 'Broadcasting & Perfilman', 'personality_type' => 'ENFP', 'school_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            // SMKN 3 LHOKSEUMAWE
            ['id'=>14,'name' => 'Desain Komunikasi Visual', 'personality_type' => 'ISFP', 'school_id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>15,'name' => 'Akuntansi & Keuangan Lembaga', 'personality_type' => 'ENTJ', 'school_id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>16,'name' => 'Manajemen Perkantoran dan Layanan Bisnis', 'personality_type' => 'ENTJ', 'school_id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>17,'name' => 'Pemasaran', 'personality_type' => 'ENFP', 'school_id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            // SMKN 4 LHOKSEUMAWE
            ['id'=>18,'name' => 'Kriya Tekstil', 'personality_type' => 'ISFJ', 'school_id' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>19,'name' => 'Kriya Kayu', 'personality_type' => 'ISTP', 'school_id' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>20,'name' => 'Teknik Kendaraan Ringan', 'personality_type' => 'ESTP', 'school_id' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>21,'name' => 'Teknik Sepeda Motor', 'personality_type' => 'ESFP', 'school_id' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>22,'name' => 'Desain Komunikasi Visual', 'personality_type' => 'ISFP', 'school_id' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            // SMKN 5 LHOKSEUMAWE
            ['id'=>23,'name' => 'Akuntasi', 'personality_type' => 'ISTJ', 'school_id' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>24,'name' => 'Teknik Instalasi Tenaga Listrik', 'personality_type' => 'INTJ', 'school_id' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>25,'name' => 'Teknik Audio Video', 'personality_type' => 'ENTP', 'school_id' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>26,'name' => 'Desain Pemodelan & Informasi Bangunan', 'personality_type' => 'ISFP', 'school_id' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            // SMKN 6 LHOKSEUMAWE
            ['id'=>27,'name' => 'Nautika Kapal Penangkap Ikan', 'personality_type' => 'ESTP', 'school_id' => 6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>28,'name' => 'Agribisnis Perikanan Air Tawar', 'personality_type' => 'ISFJ', 'school_id' => 6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            // SMKN 7 LHOKSEUMAWE
            ['id'=>29,'name' => 'Teknik Bisnis Sepeda Motor', 'personality_type' => 'ESFP', 'school_id' => 7, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>30,'name' => 'Teknik Pemesinan', 'personality_type' => 'ISTP', 'school_id' => 7, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>31,'name' => 'Teknik Pengelasan', 'personality_type' => 'INTJ', 'school_id' => 7, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>32,'name' => 'Teknik Kendaraan Ringan', 'personality_type' => 'ESTP', 'school_id' => 7, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>33,'name' => 'Kimia Industri', 'personality_type' => 'ENTP', 'school_id' => 7, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            // SMKN 8 LHOKSEUMAWE
            ['id'=>34,'name' => 'Farmasi', 'personality_type' => 'ISFP', 'school_id' => 8, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>35,'name' => 'Teknik Laboratorium Medik', 'personality_type' => 'INFJ', 'school_id' => 8, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            // SMKS KARYA BERINGIN
            ['id'=>36,'name' => 'Teknik dan Bisnis Sepeda Motor', 'personality_type' => 'ESTP', 'school_id' => 9, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            // SMKS ULUMUDDIN
            ['id'=>37,'name' => 'Desain Pemodelan & Informasi Bangunan', 'personality_type' => 'ISFP', 'school_id' => 10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>38,'name' => 'Multimedia', 'personality_type' => 'ENFP', 'school_id' => 10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>39,'name' => 'Teknik Komputer dan Jaringan', 'personality_type' => 'INTJ', 'school_id' => 10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=>40,'name' => 'Kriya Kreatif Kayu dan Rotan', 'personality_type' => 'ISTP', 'school_id' => 10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        // Insert the major data into the 'majors' table
        DB::table('majors')->insert($majors);
    }
}

