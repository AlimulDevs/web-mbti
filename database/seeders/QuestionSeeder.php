<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    public function run()
    {
      // 5 pertanyaan untuk dimensi EI (Extraversion vs Introversion)
      Question::create([
        'question_text' => 'Apakah Anda lebih suka berada di tengah keramaian daripada di tempat yang sepi?',
        'dimension' => 'EI',
        'response_type' => 'E'  // Extraversion
    ]);
    Question::create([
        'question_text' => 'Apakah Anda merasa lebih berenergi setelah berinteraksi dengan banyak orang?',
        'dimension' => 'EI',
        'response_type' => 'E'  // Extraversion
    ]);
    Question::create([
        'question_text' => 'Apakah Anda cenderung merasa lebih nyaman dalam lingkungan sosial yang ramai?',
        'dimension' => 'EI',
        'response_type' => 'E'  // Extraversion
    ]);
    Question::create([
        'question_text' => 'Apakah Anda merasa lebih tenang ketika Anda punya waktu untuk diri sendiri?',
        'dimension' => 'EI',
        'response_type' => 'I'  // Introversion
    ]);
    Question::create([
        'question_text' => 'Apakah Anda lebih suka melakukan kegiatan sosial daripada menghabiskan waktu sendiri?',
        'dimension' => 'EI',
        'response_type' => 'E'  // Extraversion
    ]);

    // 5 pertanyaan untuk dimensi SN (Sensing vs Intuition)
    Question::create([
        'question_text' => 'Apakah Anda lebih tertarik pada detail dan fakta konkret daripada ide-ide abstrak?',
        'dimension' => 'SN',
        'response_type' => 'S'  // Sensing
    ]);
    Question::create([
        'question_text' => 'Apakah Anda lebih suka bekerja dengan informasi yang sudah ada daripada mengeksplorasi kemungkinan baru?',
        'dimension' => 'SN',
        'response_type' => 'S'  // Sensing
    ]);
    Question::create([
        'question_text' => 'Apakah Anda lebih cenderung mengandalkan pengalaman masa lalu daripada mencoba hal baru?',
        'dimension' => 'SN',
        'response_type' => 'S'  // Sensing
    ]);
    Question::create([
        'question_text' => 'Apakah Anda suka menganalisis hal-hal dalam gambaran besar dan konsep-konsep baru?',
        'dimension' => 'SN',
        'response_type' => 'N'  // Intuition
    ]);
    Question::create([
        'question_text' => 'Apakah Anda lebih suka bekerja dengan teori dan ide daripada fakta-fakta nyata?',
        'dimension' => 'SN',
        'response_type' => 'N'  // Intuition
    ]);

    // 5 pertanyaan untuk dimensi TF (Thinking vs Feeling)
    Question::create([
        'question_text' => 'Apakah Anda lebih suka membuat keputusan berdasarkan logika dan analisis objektif?',
        'dimension' => 'TF',
        'response_type' => 'T'  // Thinking
    ]);
    Question::create([
        'question_text' => 'Apakah Anda lebih cenderung berpikir dengan kepala dingin saat menghadapi masalah?',
        'dimension' => 'TF',
        'response_type' => 'T'  // Thinking
    ]);
    Question::create([
        'question_text' => 'Apakah Anda lebih suka mengambil keputusan dengan pertimbangan yang lebih rasional daripada perasaan pribadi?',
        'dimension' => 'TF',
        'response_type' => 'T'  // Thinking
    ]);
    Question::create([
        'question_text' => 'Apakah Anda cenderung mengutamakan fakta dan data dalam membuat keputusan?',
        'dimension' => 'TF',
        'response_type' => 'T'  // Thinking
    ]);
    Question::create([
        'question_text' => 'Apakah Anda lebih suka berbicara tentang fakta daripada tentang bagaimana perasaan seseorang?',
        'dimension' => 'TF',
        'response_type' => 'T'  // Thinking
    ]);

    // 5 pertanyaan untuk dimensi JP (Judging vs Perceiving)
    Question::create([
        'question_text' => 'Apakah Anda lebih suka merencanakan segala sesuatunya dengan matang daripada bersikap fleksibel?',
        'dimension' => 'JP',
        'response_type' => 'J'  // Judging
    ]);
    Question::create([
        'question_text' => 'Apakah Anda lebih suka memiliki struktur dan rutinitas yang jelas dalam kehidupan Anda?',
        'dimension' => 'JP',
        'response_type' => 'J'  // Judging
    ]);
    Question::create([
        'question_text' => 'Apakah Anda lebih suka menyelesaikan tugas-tugas dengan segera daripada menunda-nunda?',
        'dimension' => 'JP',
        'response_type' => 'J'  // Judging
    ]);
    Question::create([
        'question_text' => 'Apakah Anda lebih suka mengikuti rencana daripada beradaptasi dengan situasi yang berubah?',
        'dimension' => 'JP',
        'response_type' => 'J'  // Judging
    ]);
    Question::create([
        'question_text' => 'Apakah Anda merasa nyaman dengan perencanaan yang terstruktur dan jadwal yang tetap?',
        'dimension' => 'JP',
        'response_type' => 'J'  // Judging
    ]);
    }
}
