<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $siswa1 = Student::create([
            'id' => 1,
            'school_name' => 'SMKN 1 LHOKSEUMAWE',
            'user_id' => 2,
            'class_name' => '9'
        ]);

        $siswa2 = Student::create([
            'id' => 2,
            'school_name' => 'SMKN 1 LHOKSEUMAWE',
            'user_id' => 3,
            'class_name' => '9'
        ]);
    }
}
