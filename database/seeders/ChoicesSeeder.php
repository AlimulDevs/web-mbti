<?php

namespace Database\Seeders;

use App\Models\Choice;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChoicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Mengambil soal dari tabel questions
        $question1 = Question::find(1);
        $question2 = Question::find(2);
        $question3 = Question::find(3);
        $question4 = Question::find(4);

        // Menambahkan Pilihan Jawaban
        Choice::create([
            'question_id' => $question1->id,
            'choice_text' => 'Sangat Tidak Setuju',
            'choice_value' => 'Sangat Tidak Setuju',
        ]);

        Choice::create([
            'question_id' => $question1->id,
            'choice_text' => 'Sangat Setuju',
            'choice_value' => 'Sangat Setuju',
        ]);

        Choice::create([
            'question_id' => $question2->id,
            'choice_text' => 'Sangat Tidak Setuju',
            'choice_value' => 'Sangat Tidak Setuju',
        ]);

        Choice::create([
            'question_id' => $question2->id,
            'choice_text' => 'Sangat Setuju',
            'choice_value' => 'Sangat Setuju',
        ]);

        Choice::create([
            'question_id' => $question3->id,
            'choice_text' => 'Sangat Tidak Setuju',
            'choice_value' => 'Sangat Tidak Setuju',
        ]);

        Choice::create([
            'question_id' => $question3->id,
            'choice_text' => 'Sangat Setuju',
            'choice_value' => 'Sangat Setuju',
        ]);

        Choice::create([
            'question_id' => $question4->id,
            'choice_text' => 'Sangat Tidak Setuju',
            'choice_value' => 'Sangat Tidak Setuju',
        ]);

        Choice::create([
            'question_id' => $question4->id,
            'choice_text' => 'Sangat Setuju',
            'choice_value' => 'Sangat Setuju',
        ]);
    }
}
