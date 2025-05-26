@extends('layouts.app')

@section('title', 'Tes MBTI - Sistem Rekomendasi Jurusan SMK')

@section('content')
@include('partials.navbar')

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tes MBTI - Myers-Briggs Type Indicator</h4>
        </div>
        <div class="card-body">
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i>
                Jawablah pertanyaan-pertanyaan berikut sesuai dengan kepribadian Anda. Tidak ada jawaban benar atau salah dalam tes ini.
            </div>

            <form action="/question/save" method="GET">
                @csrf
                <div class="progress mb-4">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" id="progressBar" style="width: 0%"></div>
                </div>

                <div id="questionContainer">
                    @foreach($questions as $index => $question)
                    <div class="question-item mb-4 {{ $index > 0 ? 'd-none' : '' }}" data-question="{{ $index + 1 }}">
                        <h5 class="question-number">Pertanyaan {{ $index + 1 }}/{{ count($questions) }}</h5>
                        <div class="card">
                            <div class="card-body">
                                <p class="lead mb-4">{{ $question->question_text }}</p>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    @foreach([1, 2, 3, 4, 5] as $value)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="question_{{ $question->id }}" id="q{{ $question->id }}_{{ $value }}" value="{{ $value }}">
                                        <label class="form-check-label" for="q{{ $question->id }}_{{ $value }}">
                                            @if($value == 1) Sangat Tidak Setuju
                                            @elseif($value == 2) Tidak Setuju
                                            @elseif($value == 3) Netral
                                            @elseif($value == 4) Setuju
                                            @else Sangat Setuju
                                            @endif
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-3">
                            @if($index > 0)
                            <button type="button" class="btn btn-secondary prev-question" data-current="{{ $index + 1 }}" data-prev="{{ $index }}">
                                <i class="fas fa-arrow-left me-2"></i>Sebelumnya
                            </button>
                            @else
                            <div></div>
                            @endif

                            @if($index < count($questions) - 1)
                            <button type="button" class="btn btn-primary next-question" data-current="{{ $index + 1 }}" data-next="{{ $index + 2 }}">
                                Selanjutnya<i class="fas fa-arrow-right ms-2"></i>
                            </button>
                            @else
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-check me-2"></i>Selesai dan Lihat Hasil
                            </button>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </form>


        </div>
        <div class="card-footer bg-light">
            <div class="small text-muted">
                <i class="fas fa-info-circle me-1"></i> Tes MBTI ini akan membantu menentukan tipe kepribadian Anda untuk merekomendasikan jurusan SMK yang sesuai.
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Progress bar
        const totalQuestions = {{ count($questions) }};
        const progressBar = document.getElementById('progressBar');

        // Navigation buttons
        const nextButtons = document.querySelectorAll('.next-question');
        const prevButtons = document.querySelectorAll('.prev-question');

        // Initial progress
        updateProgress(1);

        // Next question event
        nextButtons.forEach(button => {
            button.addEventListener('click', function() {
                const currentQuestion = parseInt(this.getAttribute('data-current'));
                const nextQuestion = parseInt(this.getAttribute('data-next'));

                // Check if current question is answered
                const currentRadios = document.querySelectorAll(`input[name="question_${currentQuestion}"]`);
                let isAnswered = false;

                currentRadios.forEach(radio => {
                    if (radio.checked) {
                        isAnswered = true;
                    }
                });

                if (!isAnswered) {
                    alert('Silakan jawab pertanyaan saat ini terlebih dahulu');
                    return;
                }

                // Hide current, show next
                document.querySelector(`.question-item[data-question="${currentQuestion}"]`).classList.add('d-none');
                document.querySelector(`.question-item[data-question="${nextQuestion}"]`).classList.remove('d-none');

                // Update progress
                updateProgress(nextQuestion);
            });
        });

        // Previous question event
        prevButtons.forEach(button => {
            button.addEventListener('click', function() {
                const currentQuestion = parseInt(this.getAttribute('data-current'));
                const prevQuestion = parseInt(this.getAttribute('data-prev'));

                // Hide current, show previous
                document.querySelector(`.question-item[data-question="${currentQuestion}"]`).classList.add('d-none');
                document.querySelector(`.question-item[data-question="${prevQuestion}"]`).classList.remove('d-none');

                // Update progress
                updateProgress(prevQuestion);
            });
        });

        // Update progress bar
        function updateProgress(currentQuestion) {
            const percentage = Math.round((currentQuestion / totalQuestions) * 100);
            progressBar.style.width = percentage + '%';
            progressBar.setAttribute('aria-valuenow', percentage);
        }
    });
</script>
@endsection
