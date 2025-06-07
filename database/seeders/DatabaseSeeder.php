<?php

namespace Database\Seeders;


use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            StudentTableSeeder::class,
            QuestionSeeder::class,
            AnswerSeeder::class,
            MbtiResultSeeder::class,
            MajorsTableSeeder::class,
            ProfileMatchingResultSeeder::class,
            FeedbackSeeder::class,
            CriteriasTableSeeder::class,
            SchoolsTableSeeder::class
        ]);
    }
}
