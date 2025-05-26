@extends('layouts.app')
@section('title', 'Admin Dashboard - Sistem Rekomendasi Siswa SMK')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            @include('sidebar')

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Siswa</h1>

                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle me-1"></i> {{session()->get('name')}}
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

                {{-- Tabel Siswa --}}
                <div class="table-responsive">
                    {{-- <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
                        Tambah Siswa
                    </button> --}}
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Tipe Kepribadian</th>
                                {{-- <th>Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $key => $student)
                                <tr class="text-center">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $student->user->name }}</td>
                                    <td>{{ $student->user->email }}</td>
                                    <td>{{ $student->dimension_type??'-' }}</td>

                                    {{-- <td>
                                        <!-- Tombol Edit -->
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $student->id }}" data-student-name="{{ $student->name }}" data-personality-type="{{ $student->personality_type }}" data-school-id="{{ $student->school_id }}">
                                            Edit
                                        </button>

                                        <!-- Tombol Hapus -->
                                        <form action="/admin/student/delete/{{ $student->id }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                        </form>
                                    </td> --}}
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
                                <h5 class="modal-title" id="editModalLabel">Edit Siswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/admin/student/update" method="POST">
                                    @csrf
                                    <input type="hidden" id="student_id" name="id">



                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Siswa</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="personality_type" class="form-label">Tipe Kepribadian</label>
                                        <input type="text" class="form-control" id="personality_type" name="personality_type" required>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>


    {{-- Modal Tambah --}}
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/admin/student/create" method="POST">
                        @csrf


                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Siswa</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="personality_type" class="form-label">Tipe Kepribadian</label>
                            <input type="text" class="form-control" id="personality_type" name="personality_type" required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan Siswa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Mengisi data modal ketika tombol edit ditekan
        var editModal = document.getElementById('editModal')
        editModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget
            var id = button.getAttribute('data-id')
            var name = button.getAttribute('data-student-name')
            var personality_type = button.getAttribute('data-personality-type')
            var school_id = button.getAttribute('data-school-id')

            var modalId = editModal.querySelector('#student_id')
            var modalName = editModal.querySelector('#name')
            var modalPersonalityType = editModal.querySelector('#personality_type')
            var modalSchoolId = editModal.querySelector('#school_id')

            modalId.value = id
            modalName.value = name
            modalPersonalityType.value = personality_type
            modalSchoolId.value = school_id
        })
    </script>

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

@endsection
