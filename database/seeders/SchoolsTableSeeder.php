<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schools = [
            [ "id" => 1,'school_name' => 'SMKN 1 LHOKSEUMAWE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            [ 'id' => 2,'school_name' => 'SMKN 2 LHOKSEUMAWE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 3,'school_name' => 'SMKN 3 LHOKSEUMAWE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 4,'school_name' => 'SMKN 4 LHOKSEUMAWE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 5,'school_name' => 'SMKN 5 LHOKSEUMAWE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 6,'school_name' => 'SMKN 6 LHOKSEUMAWE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 7,'school_name' => 'SMKN 7 LHOKSEUMAWE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 8,'school_name' => 'SMKN 8 LHOKSEUMAWE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 9,'school_name' => 'SMKS KARYA BERINGIN', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 10,'school_name' => 'SMKS ULUMUDDIN', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        // Insert the school data into the 'schools' table
        DB::table('schools')->insert($schools);
    }
}
