@extends('layouts.app')

@section('title', 'Tes MBTI - Sistem Rekomendasi Jurusan SMK')

@section('content')
@include('partials.navbar')

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Hasil Tes MBTI & Rekomendasi Jurusan</h4>
        </div>
        <div class="card-body">
            <div class="alert alert-info">
                Anda memiliki tipe kepribadian <strong>{{ $student->dimension_type }}</strong>. Berikut ini adalah rekomendasi jurusan yang cocok untuk Anda:
            </div>

            <!-- Tombol Print -->
            <button class="btn btn-primary mb-3" onclick="printPage()">
                <i class="fas fa-print"></i> Print
            </button>

            <!-- Konten yang akan dicetak -->
            <div id="printable-content">
                <table class="table table-striped table-bordered" style="max-width: 80%">
                    <thead>
                        <tr class="text-center">
                            <th>Jurusan</th>
                            <th>Sekolah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($majors as $major)
                            <tr class="text-center">
                                <td>{{ $major->name }}</td>
                                <td>{{ $major->school->school_name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Tabel Kriteria Siswa --}}
                <div class="table-responsive">
                    <h1 class="h2">Kriteria Siswa</h1>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Kriteria</th>
                                <th>Kode</th>
                                <th>Profile</th>
                                <th>Nilai Bobot</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($criteria_users as $key => $criteria_user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $criteria_user->criteria->name }}</td>
                                    <td>{{ $criteria_user->criteria->code }}</td>
                                    <td>{{ $criteria_user->profile }}</td>
                                    <td>{{ $criteria_user->value }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Tabel Perhitungan --}}
                <div class="table-responsive">
                    <h1 class="h2">Perhitungan</h1>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Nama Sekolah</th>
                                @foreach ($criteria_users as $criteria_user)
                                    <th>{{ $criteria_user->criteria->name }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schools as $key => $school)
                                <tr class="text-center">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $school->school_name }}</td>
                                    @foreach ($school->school_criteria_users as $school_criteria_user)
                                        <td>{{ $school_criteria_user->value }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Tabel GAP --}}
                <div class="table-responsive">
                    <h1 class="h2">Menghitung Nilai GAP antara profile</h1>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Nama Sekolah</th>
                                @foreach ($criteria_users as $criteria_user)
                                    <th>{{ $criteria_user->criteria->name }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schools as $key => $school)
                                <tr class="text-center">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $school->school_name }}</td>
                                    @foreach ($school->school_criteria_users as $school_criteria_user)
                                        <td>{{ $school_criteria_user['gap'] }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Tabel Mapping --}}
                <div class="table-responsive">
                    <h1 class="h2">Menghitung Nilai Mapping</h1>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Nama Sekolah</th>
                                @foreach ($criteria_users as $criteria_user)
                                    <th>{{ $criteria_user->criteria->name }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schools as $key => $school)
                                <tr class="text-center">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $school->school_name }}</td>
                                    @foreach ($school->school_criteria_users as $school_criteria_user)
                                        <td>{{ $school_criteria_user['gap_mapping'] }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Hasil Perhitungan --}}
                <div class="table-responsive">
                    <h1 class="h2">Hasil Perhitungan</h1>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>Profil Alternatif</th>
                                <th>Nilai Akhir</th>
                                <th>Perangkingan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($school_recom as $key => $recom)
                                <tr class="text-center">
                                    <td>{{ $recom->school->school_name }}</td>
                                    <td>{{ $recom->value }}</td>
                                    <td>{{ $key + 1 }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card mt-4 mb-3" style="max-width: 400px">
                    <p style="max-width: 400px">Berdasarkan perhitungan tersebut, <b>{{ $student->user->name }}</b> cocok
                        di sekolah <b>{{ $get_school_and_major_recom['school_name'] }}</b> dengan jurusan
                        @foreach ($get_school_and_major_recom['majors'] as $index => $major)
                            <b>{{ $major['name'] }}</b>
                            @if ($index < count($get_school_and_major_recom['majors']) - 1)
                                ,
                            @endif
                        @endforeach
                    </p>
                </div>
            </div>
        </div>

        <div class="card-footer bg-light">
            <div class="small text-muted">
                <i class="fas fa-info-circle me-1"></i> Tes MBTI ini akan membantu menentukan tipe kepribadian Anda untuk merekomendasikan jurusan SMK yang sesuai.
            </div>
        </div>
    </div>
</div>

<script>
    function printPage() {
        // Ambil elemen dengan id 'printable-content'
        var content = document.getElementById('printable-content').innerHTML;

        // Buka jendela baru untuk mencetak
        var printWindow = window.open('', '', 'height=600,width=800');

        // Set konten untuk jendela print
        printWindow.document.write('<html><head><title>Print</title></head><body>');
        printWindow.document.write(content);
        printWindow.document.write('</body></html>');

        // Tunggu hingga konten siap, lalu cetak
        printWindow.document.close();
        printWindow.print();
    }
</script>

@endsection
