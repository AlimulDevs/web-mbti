<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MBTI SPK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <div class="d-flex gap-3">
            <img src="{{ asset('img/logo.jpeg') }}" width="100" alt="">
            <div class="column">
                <h5>SISTEM REKOMENDASI JURUSAN PADA SMK MENGGUNAKAN TEORI MYERS-BRIGGS TYPE INDICATOR (MBTI)</h5>
                <hr>
            </div>
        </div>

        <p>
            Berdasarkan hasil tes mbti yang telah dilakukan, <b>{{ $student->user->name }}</b>
            memiliki tipe kepribadian <b>{{ $student->dimension_type }}</b>. dengan score/peringkat 1 dan rekomendasi
            jurusan {{ $get_school_and_major_recom['majors'][0]['name'] }} di sekolah {{ $get_school_and_major_recom['school_name'] }}. Berikut ini adalah tabel hasil rekomendasi :

        </p>

        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>Jurusan</th>
                    <th>Sekolah</th>
                    <th>Peringkat / Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($majors as $major)
                    <tr class="text-center">
                        <td>{{ $major->name }}</td>
                        <td>{{ $major->school->school_name }}</td>
                        <td>{{ $major['ranking'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end mt-5">
            <div class="title mt-5">
                Lhokseumawe,  <span id="current-date"></span>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
    <script>
        // Get current date, month, and year
        var today = new Date();
        var day = today.getDate(); // Get day of the month
        var month = today.getMonth() + 1; // Get current month (0-based index)
        var year = today.getFullYear(); // Get current year

        // Format the date to tgl/bln/tahun format
        var formattedDate = day + '/' + month + '/' + year;

        // Display the date in the span with id "current-date"
        document.getElementById('current-date').innerText = formattedDate;

        window.print();
    </script>
</body>

</html>
