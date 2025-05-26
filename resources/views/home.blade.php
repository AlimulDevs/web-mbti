@extends('layouts.app')
@section('title', 'Admin Dashboard - Sistem Rekomendasi Jurusan SMK')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            @include('sidebar')

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard Admin</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle me-1"></i>{{session()->get('name')}}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi bi-person me-1"></i> Profil
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="/logout">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="bi bi-box-arrow-right me-1"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-4">
                        <div class="card text-white bg-primary shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="card-title">Total Siswa</h6>
                                        <h2 class="mb-0">245</h2>
                                    </div>
                                    <div class="icon-shape rounded-circle bg-white text-primary">
                                        <i class="bi bi-people-fill"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a href="#" class="text-white">Lihat Detail <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="card text-white bg-success shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="card-title">Total Tes</h6>
                                        <h2 class="mb-0">132</h2>
                                    </div>
                                    <div class="icon-shape rounded-circle bg-white text-success">
                                        <i class="bi bi-file-earmark-text"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a href="#" class="text-white">Lihat Detail <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="card text-white bg-info shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="card-title">Total Jurusan</h6>
                                        <h2 class="mb-0">9</h2>
                                    </div>
                                    <div class="icon-shape rounded-circle bg-white text-info">
                                        <i class="bi bi-building"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a href="#" class="text-white">Lihat Detail <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="card text-white bg-warning shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="card-title">Tipe MBTI</h6>
                                        <h2 class="mb-0">16</h2>
                                    </div>
                                    <div class="icon-shape rounded-circle bg-white text-warning">
                                        <i class="bi bi-bar-chart"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a href="#" class="text-white">Lihat Detail <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-white">
                                <h5 class="mb-0">Distribusi Tipe MBTI</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="mbtiChart" height="250"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-white">
                                <h5 class="mb-0">Rekomendasi Jurusan Teratas</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Jurusan</th>
                                                <th>Frekuensi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Teknik Komputer dan Jaringan</td>
                                                <td>34</td>
                                            </tr>
                                            <tr>
                                                <td>Rekayasa Perangkat Lunak</td>
                                                <td>29</td>
                                            </tr>
                                            <tr>
                                                <td>Multimedia</td>
                                                <td>25</td>
                                            </tr>
                                            <tr>
                                                <td>Akuntansi</td>
                                                <td>22</td>
                                            </tr>
                                            <tr>
                                                <td>Administrasi Perkantoran</td>
                                                <td>18</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Aktivitas Terbaru</h5>
                                <a href="#" class="btn btn-sm btn-primary">Lihat Semua</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Siswa</th>
                                                <th>Tipe MBTI</th>
                                                <th>Jurusan yang Direkomendasikan</th>
                                                <th>Tanggal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Budi Santoso</td>
                                                <td><span class="badge bg-info">INTJ</span></td>
                                                <td>Rekayasa Perangkat Lunak</td>
                                                <td>17 Mei 2025</td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Siti Nuraini</td>
                                                <td><span class="badge bg-info">ENFP</span></td>
                                                <td>Desain Komunikasi Visual</td>
                                                <td>17 Mei 2025</td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Ahmad Rizki</td>
                                                <td><span class="badge bg-info">ESTJ</span></td>
                                                <td>Akuntansi</td>
                                                <td>16 Mei 2025</td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Dian Permata</td>
                                                <td><span class="badge bg-info">ISFJ</span></td>
                                                <td>Keperawatan</td>
                                                <td>16 Mei 2025</td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Rendi Pratama</td>
                                                <td><span class="badge bg-info">ISTP</span></td>
                                                <td>Teknik Mesin</td>
                                                <td>15 Mei 2025</td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    @push('scripts')
    <script>
        // Chart untuk distribusi MBTI
        const ctx = document.getElementById('mbtiChart').getContext('2d');
        const mbtiChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['INTJ', 'INTP', 'ENTJ', 'ENTP', 'INFJ', 'INFP', 'ENFJ', 'ENFP', 'ISTJ', 'ISFJ', 'ESTJ', 'ESFJ', 'ISTP', 'ISFP', 'ESTP', 'ESFP'],
                datasets: [{
                    label: 'Jumlah Siswa',
                    data: [15, 18, 12, 14, 8, 10, 7, 9, 11, 6, 13, 5, 9, 7, 6, 4],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(153, 102, 255, 0.6)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    @endpush
@endsection
