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

        <p>Rekomendasi  dari kami yaitu <b>{{ $get_school_and_major_recom["school_name"] }}</b> jurusan @foreach ($get_school_and_major_recom["majors"] as $index =>$major)
            <b>{{ $major["name"] }}</b>,
        @endforeach</p>
        </div>
        <div class="card-footer bg-light">
            <div class="small text-muted">
                <i class="fas fa-info-circle me-1"></i> Tes MBTI ini akan membantu menentukan tipe kepribadian Anda untuk merekomendasikan jurusan SMK yang sesuai.
            </div>
        </div>
    </div>
</div>

<script>

</script>
@endsection
