<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan Admin
        $admin = User::create([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('tes123'),
            'role' => 'admin',
        ]);

        // Menambahkan Siswa
        $siswa1 = User::create([
            'id' => 2,
            'name' => 'Siswa 1',
            'email' => 'siswa1@gmail.com',
            'password' => bcrypt('tes123'),
            'role' => 'siswa',
        ]);

        $siswa2 = User::create([
            'id' => 3,
            'name' => 'Siswa 2',
            'email' => 'siswa2@gmail.com',
            'password' => bcrypt('tes123'),
            'role' => 'siswa',
        ]);
    }
}
