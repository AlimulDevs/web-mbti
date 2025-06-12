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
                    <h1 class="h2">Profile Matching</h1>
                    <!-- Dropdown for user profile -->
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle me-1"></i> {{ session()->get('name') }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi bi-person me-1"></i> Profil
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
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

                {{-- Tabel Sekolah --}}
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Nama Sekolah</th>
                                @foreach ($criterias as $criteria)
                                    <th>{{ $criteria->name }}</th>
                                @endforeach
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schools as $key => $school)
                                <tr class="text-center">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $school->school_name }}</td>
                                    @foreach ($school->school_criterias as $school_criteria)
                                        <td>{{ $school_criteria->value }}</td>
                                    @endforeach
                                    <td>
                                        <!-- Tombol Edit -->
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editModal" data-id="{{ $school->id }}"
                                            data-school-name="{{ $school->school_name }}"
                                            data-criteria-values="{{ json_encode($school->school_criterias->pluck('value')) }}"
                                            data-criteria-names="{{ json_encode($criterias->pluck('name')) }}">
                                            Edit
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Modal Edit --}}
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Sekolah</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/admin/school-criteria/update" method="POST">
                                    @csrf
                                    <input type="hidden" id="school_id" name="id">

                                    <div class="mb-3">
                                        <label for="school_name" class="form-label">Nama Sekolah</label>
                                        <input type="text" class="form-control" id="school_name" name="school_name" required>
                                    </div>

                                    <div id="criteria_values_container">
                                        <!-- Input field untuk setiap kriteria akan muncul di sini -->
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Menghitung Nilai GAP antara profile</h1>
                    <!-- Dropdown for user profile -->

                </div>

                {{-- Tabel Sekolah --}}
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Nama Sekolah</th>
                                @foreach ($criterias as $criteria)
                                    <th>{{ $criteria->name }}</th>
                                @endforeach

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schools as $key => $school)
                                <tr class="text-center">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $school->school_name }}</td>
                                    @foreach ($school->school_criterias as $school_criteria)
                                        <td>{{ abs($school_criteria["gap"]) }}</td>
                                    @endforeach

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </main>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Menghitung Nilai Mapping </h1>
                    <!-- Dropdown for user profile -->

                </div>

                {{-- Tabel Sekolah --}}
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Nama Sekolah</th>
                                @foreach ($criterias as $criteria)
                                    <th>{{ $criteria->name }}</th>
                                @endforeach

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schools as $key => $school)
                                <tr class="text-center">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $school->school_name }}</td>
                                    @foreach ($school->school_criterias as $school_criteria)
                                        <td>{{ $school_criteria["gap_mapping"] }}</td>
                                    @endforeach

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </main>
        </div>
    </div>

    @push('scripts')
        <script>
            var editModal = document.getElementById('editModal');
            editModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var id = button.getAttribute('data-id');
                var school_name = button.getAttribute('data-school-name');
                var criteriaValues = JSON.parse(button.getAttribute('data-criteria-values')); // Nilai kriteria
                var criteriaNames = JSON.parse(button.getAttribute('data-criteria-names')); // Nama kriteria

                var modalId = editModal.querySelector('#school_id');
                var modalSchoolName = editModal.querySelector('#school_name');
                var criteriaContainer = editModal.querySelector('#criteria_values_container');

                modalId.value = id;
                modalSchoolName.value = school_name;

                // Hapus konten sebelumnya di container
                criteriaContainer.innerHTML = '';

                // Membuat input untuk setiap kriteria dengan label nama kriteria yang sesuai
                criteriaValues.forEach(function(value, index) {
                    var criteriaField = document.createElement('div');
                    criteriaField.classList.add('mb-3');
                    criteriaField.innerHTML = `
                        <label for="criteria_value_${index}" class="form-label">${criteriaNames[index]}</label>
                        <input type="text" class="form-control" id="criteria_value_${index}" name="criteria_values[]"
                            value="${value}" required>
                    `;
                    criteriaContainer.appendChild(criteriaField);
                });
            });
        </script>

        <!-- SweetAlert2 for success messages -->
        @if (session('success'))
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
@endsection
