@extends('layouts.app')

@section('title', 'Sistem Rekomendasi Jurusan SMK')

@section('content')
    @include('partials.navbar')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <!-- Hero Section -->
    <section class="hero-section d-flex align-items-center" id="beranda">
        <div class="container text-center py-5">
            <h1 class="display-5 fw-bold mb-3">Sistem Rekomendasi Jurusan Pada SMK</h1>
            <h2 class="h3 mb-4">Menggunakan Teori Myers-Briggs Type Indicator (MBTI) dan Metode Profile Matching</h2>
            <p class="lead mb-5">Temukan jurusan SMK yang paling sesuai dengan kepribadian dan potensi dirimu
                <br>berdasarkan pendekatan ilmiah yang teruji!</p>
            <div class="d-flex justify-content-center gap-3">
                @if ($is_test == false)
                <a href="{{ route('test-mbti.index') }}" class="btn btn-primary btn-lg px-4 py-2">
                    <i class="fas fa-clipboard-list me-2"></i>Mulai Tes MBTI
                </a>
                @else
                <a href="{{ route('test-result.index') }}" class="btn btn-primary btn-lg px-4 py-2">
                    <i class="fas fa-clipboard-list me-2"></i>Lihat Hasil Test MBTI
                </a>
                @endif

                <a href="#metode" class="btn btn-outline-light btn-lg px-4 py-2">
                    <i class="fas fa-info-circle me-2"></i>Pelajari Metode
                </a>
            </div>
        </div>
    </section>

    <!-- Tentang Section -->
    <section class="py-5" id="tentang">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="/img/rekom.png" alt="MBTI dan Profile Matching" class="img-fluid rounded">
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-4">Tentang Sistem Rekomendasi</h2>
                    <p class="lead mb-4">Sistem rekomendasi jurusan SMK kami mengkombinasikan kekuatan teori kepribadian
                        MBTI (Myers-Briggs Type Indicator) dengan metode Profile Matching untuk memberikan rekomendasi
                        jurusan yang paling sesuai dengan karakteristik unik setiap siswa.</p>
                    <div class="mb-4">
                        <h5><i class="fas fa-check-circle text-success me-2"></i>Berbasis Kepribadian</h5>
                        <p>Menggunakan teori MBTI yang telah terbukti secara ilmiah untuk mengidentifikasi tipe
                            kepribadianmu.</p>
                    </div>
                    <div class="mb-4">
                        <h5><i class="fas fa-check-circle text-success me-2"></i>Pencocokan Profil</h5>
                        <p>Metode Profile Matching untuk mencocokkan profil kepribadianmu dengan profil ideal setiap jurusan
                            SMK.</p>
                    </div>
                    <div>
                        <h5><i class="fas fa-check-circle text-success me-2"></i>Rekomendasi Tepat</h5>
                        <p>Hasil analisis yang komprehensif memberikan rekomendasi jurusan yang paling sesuai dengan
                            potensimu.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MBTI Section -->
    <section class="py-5 bg-light" id="metode">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Myers-Briggs Type Indicator (MBTI)</h2>
                <p class="text-muted">Mengenal 4 dimensi kepribadian yang digunakan dalam sistem rekomendasi</p>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card mbti-card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h3 class="card-title fw-bold text-primary mb-3">Introvert (I) vs Extrovert (E)</h3>
                            <p class="card-text">Dimensi ini menjelaskan bagaimana seseorang mendapatkan energi. Introvert
                                mendapatkan energi dari waktu sendiri, sedangkan Extrovert mendapatkan energi dari interaksi
                                sosial.</p>
                            <div class="d-flex justify-content-between mt-3">
                                <div class="text-center">
                                    <i class="fas fa-user text-primary fa-2x mb-2"></i>
                                    <p class="mb-0"><strong>Introvert (I)</strong></p>
                                    <small class="text-muted">Reflektif, Mandiri</small>
                                </div>
                                <div class="text-center">
                                    <i class="fas fa-users text-primary fa-2x mb-2"></i>
                                    <p class="mb-0"><strong>Extrovert (E)</strong></p>
                                    <small class="text-muted">Interaktif, Sosial</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card mbti-card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h3 class="card-title fw-bold text-primary mb-3">Sensing (S) vs Intuition (N)</h3>
                            <p class="card-text">Dimensi ini menjelaskan bagaimana seseorang memproses informasi. Sensing
                                fokus pada fakta dan detail, sedangkan Intuition fokus pada pola dan kemungkinan.</p>
                            <div class="d-flex justify-content-between mt-3">
                                <div class="text-center">
                                    <i class="fas fa-clipboard-check text-primary fa-2x mb-2"></i>
                                    <p class="mb-0"><strong>Sensing (S)</strong></p>
                                    <small class="text-muted">Praktis, Detail</small>
                                </div>
                                <div class="text-center">
                                    <i class="fas fa-lightbulb text-primary fa-2x mb-2"></i>
                                    <p class="mb-0"><strong>Intuition (N)</strong></p>
                                    <small class="text-muted">Imajinatif, Konseptual</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card mbti-card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h3 class="card-title fw-bold text-primary mb-3">Thinking (T) vs Feeling (F)</h3>
                            <p class="card-text">Dimensi ini menjelaskan bagaimana seseorang membuat keputusan. Thinking
                                menggunakan logika dan analisis, sedangkan Feeling menggunakan nilai dan harmoni.</p>
                            <div class="d-flex justify-content-between mt-3">
                                <div class="text-center">
                                    <i class="fas fa-brain text-primary fa-2x mb-2"></i>
                                    <p class="mb-0"><strong>Thinking (T)</strong></p>
                                    <small class="text-muted">Logis, Objektif</small>
                                </div>
                                <div class="text-center">
                                    <i class="fas fa-heart text-primary fa-2x mb-2"></i>
                                    <p class="mb-0"><strong>Feeling (F)</strong></p>
                                    <small class="text-muted">Empatis, Harmonis</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card mbti-card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h3 class="card-title fw-bold text-primary mb-3">Judging (J) vs Perceiving (P)</h3>
                            <p class="card-text">Dimensi ini menjelaskan bagaimana seseorang menjalani kehidupan. Judging
                                lebih terstruktur dan terencana, sedangkan Perceiving lebih fleksibel dan spontan.</p>
                            <div class="d-flex justify-content-between mt-3">
                                <div class="text-center">
                                    <i class="fas fa-tasks text-primary fa-2x mb-2"></i>
                                    <p class="mb-0"><strong>Judging (J)</strong></p>
                                    <small class="text-muted">Terstruktur, Terencana</small>
                                </div>
                                <div class="text-center">
                                    <i class="fas fa-random text-primary fa-2x mb-2"></i>
                                    <p class="mb-0"><strong>Perceiving (P)</strong></p>
                                    <small class="text-muted">Fleksibel, Adaptif</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Profile Matching Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Metode Profile Matching</h2>
                <p class="text-muted">Bagaimana kami mencocokkan profil kepribadianmu dengan jurusan yang tepat</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow method-card">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <div class="text-center">
                                        <i class="fas fa-puzzle-piece method-icon"></i>
                                        <h4 class="fw-bold">Apa itu Profile Matching?</h4>
                                        <p>Profile Matching adalah metode pengambilan keputusan yang membandingkan profil
                                            individu dengan profil ideal untuk suatu posisi atau jurusan. Metode ini
                                            menghitung gap (selisih) antara profil kepribadian siswa dengan profil ideal
                                            jurusan SMK.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-center">
                                        <i class="fas fa-calculator method-icon"></i>
                                        <h4 class="fw-bold">Penerapan dalam Sistem</h4>
                                        <p>Sistem kami menerapkan metode Profile Matching dengan langkah-langkah:</p>
                                        <ol class="text-start">
                                            <li>Mengidentifikasi tipe MBTI melalui tes kepribadian</li>
                                            <li>Menghitung gap dengan profil ideal setiap jurusan</li>
                                            <li>Melakukan pembobotan terhadap gap</li>
                                            <li>Menghitung nilai akhir dan memberikan rekomendasi</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cara Kerja Section -->
    <section class="py-5" id="cara-kerja">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Cara Kerja Sistem Rekomendasi</h2>
                <p class="text-muted">Langkah-langkah untuk mendapatkan rekomendasi jurusan SMK yang sesuai</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-3 text-center">
                    <div class="bg-primary rounded-circle text-white d-flex align-items-center justify-content-center mx-auto mb-3"
                        style="width: 60px; height: 60px;">
                        <h3 class="m-0">1</h3>
                    </div>
                    <h4 class="fw-bold">Pendaftaran</h4>
                    <p>Daftar akun untuk mengakses sistem rekomendasi</p>
                </div>
                <div class="col-md-3 text-center">
                    <div class="bg-primary rounded-circle text-white d-flex align-items-center justify-content-center mx-auto mb-3"
                        style="width: 60px; height: 60px;">
                        <h3 class="m-0">2</h3>
                    </div>
                    <h4 class="fw-bold">Tes MBTI</h4>
                    <p>Jawab pertanyaan untuk menentukan tipe kepribadianmu</p>
                </div>
                <div class="col-md-3 text-center">
                    <div class="bg-primary rounded-circle text-white d-flex align-items-center justify-content-center mx-auto mb-3"
                        style="width: 60px; height: 60px;">
                        <h3 class="m-0">3</h3>
                    </div>
                    <h4 class="fw-bold">Profile Matching</h4>
                    <p>Sistem mencocokkan profil MBTI-mu dengan jurusan</p>
                </div>
                <div class="col-md-3 text-center">
                    <div class="bg-primary rounded-circle text-white d-flex align-items-center justify-content-center mx-auto mb-3"
                        style="width: 60px; height: 60px;">
                        <h3 class="m-0">4</h3>
                    </div>
                    <h4 class="fw-bold">Hasil Rekomendasi</h4>
                    <p>Terima rekomendasi jurusan yang paling sesuai</p>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="#mulai-tes" class="btn btn-primary btn-lg" id="mulai-tes">
                    <i class="fas fa-play-circle me-2"></i>Mulai Tes MBTI
                </a>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Pertanyaan Umum</h2>
                <p class="text-muted">Jawaban untuk pertanyaan yang sering diajukan</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item border mb-3 shadow-sm">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Apa itu Myers-Briggs Type Indicator (MBTI)?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Myers-Briggs Type Indicator (MBTI) adalah instrumen psikometri yang dirancang untuk
                                        mengukur preferensi psikologis seseorang dalam bagaimana mereka memandang dunia dan
                                        membuat keputusan. MBTI dibagi menjadi 16 tipe kepribadian yang berbeda berdasarkan
                                        empat dimensi utama: Introvert/Extrovert, Sensing/Intuition, Thinking/Feeling, dan
                                        Judging/Perceiving.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border mb-3 shadow-sm">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Bagaimana metode Profile Matching bekerja?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Metode Profile Matching bekerja dengan membandingkan profil individu dengan profil
                                        ideal untuk posisi atau jurusan tertentu. Langkah-langkahnya meliputi:</p>
                                    <ol>
                                        <li>Penentuan variabel dan sub-variabel yang dibutuhkan</li>
                                        <li>Penentuan nilai target untuk setiap sub-variabel</li>
                                        <li>Penghitungan gap antara profil individu dengan profil ideal</li>
                                        <li>Pembobotan gap berdasarkan tabel bobot nilai</li>
                                        <li>Pengelompokan core factor dan secondary factor</li>
                                        <li>Penghitungan nilai total dan perankingan</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border mb-3 shadow-sm">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Apakah hasil rekomendasi jurusan bersifat mengikat?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Tidak, hasil rekomendasi jurusan yang diberikan oleh sistem ini bersifat sebagai
                                        panduan dan tidak mengikat. Keputusan akhir tetap ada di tangan siswa, orang tua,
                                        dan pihak sekolah dengan mempertimbangkan berbagai faktor lainnya seperti minat
                                        khusus, bakat, nilai akademik, dan peluang karir di masa depan.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border mb-3 shadow-sm">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Berapa lama waktu yang dibutuhkan untuk tes MBTI?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Tes MBTI dalam sistem kami membutuhkan waktu sekitar 15-20 menit untuk
                                        menyelesaikannya. Terdiri dari serangkaian pertanyaan yang dirancang untuk
                                        mengidentifikasi preferensi kepribadian Anda. Sangat penting untuk menjawab dengan
                                        jujur dan tidak terburu-buru untuk mendapatkan hasil yang akurat.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border mb-3 shadow-sm">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Apakah saya dapat mengakses hasil rekomendasi kapan saja?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Ya, setelah mengikuti tes dan mendapatkan rekomendasi, hasil akan disimpan dalam akun
                                        Anda. Anda dapat mengakses kembali hasil tersebut kapan saja melalui dashboard
                                        pengguna. Anda juga dapat mengunduh hasil dalam format PDF untuk referensi di masa
                                        mendatang.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')


        <!-- SweetAlert2 for success messages -->
        @if(session('success'))
        <script>
            Swal.fire({
                title: 'Sukses!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
    @endpush
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    @include('partials.footer')
    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
@endsection
