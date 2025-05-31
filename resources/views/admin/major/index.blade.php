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
                    <h1 class="h2">Jurusan</h1>

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

                {{-- Tabel Jurusan --}}
                <div class="table-responsive">
                    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
                        Tambah Jurusan
                    </button>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Nama Sekolah</th>
                                <th>Nama Jurusan</th>
                                <th>Tipe Kepribadian</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($majors as $key => $major)
                                <tr class="text-center">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $major->school->school_name }}</td>
                                    <td>{{ $major->name }}</td>
                                    <td>{{ $major->personality_type }}</td>

                                    <td>
                                        <!-- Tombol Edit -->
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $major->id }}" data-major-name="{{ $major->name }}" data-personality-type="{{ $major->personality_type }}" data-school-id="{{ $major->school_id }}">
                                            Edit
                                        </button>

                                        <!-- Tombol Hapus -->
                                        <form action="/admin/major/delete/{{ $major->id }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                        </form>
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
                                <h5 class="modal-title" id="editModalLabel">Edit Jurusan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/admin/major/update" method="POST">
                                    @csrf
                                    <input type="hidden" id="major_id" name="id">

                                    <div class="mb-3">
                                        <label for="school_id" class="form-label">Nama Sekolah</label>
                                        <select class="form-control" id="school_id" name="school_id" required>
                                            <option value="">-- Pilih Sekolah --</option>
                                            @foreach($schools as $school)
                                                <option value="{{ $school->id }}">{{ $school->school_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Jurusan</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="personality_type" class="form-label">Tipe Kepribadian</label>

                                        <select name="personality_type" id="personality_type" class="form-control" required>
                                            <option value="{{ $major->personality_type }}">-- {{ $major->personality_type }} --</option>
                                            <option value="INTJ">INTJ - The Architect</option>
                                            <option value="INFP">INFP - The Mediator</option>
                                            <option value="INFJ">INFJ - The Advocate</option>
                                            <option value="ISFP">ISFP - The Adventurer</option>
                                            <option value="ISFJ">ISFJ - The Defender</option>
                                            <option value="ISTP">ISTP - The Virtuoso</option>
                                            <option value="ISTJ">ISTJ - The Logistician</option>
                                            <option value="ENFP">ENFP - The Campaigner</option>
                                            <option value="ENFJ">ENFJ - The Protagonist</option>
                                            <option value="ENTP">ENTP - The Debater</option>
                                            <option value="ENTJ">ENTJ - The Commander</option>
                                            <option value="ESFP">ESFP - The Entertainer</option>
                                            <option value="ESFJ">ESFJ - The Consul</option>
                                            <option value="ESTP">ESTP - The Entrepreneur</option>
                                            <option value="ESTJ">ESTJ - The Executive</option>
                                        </select>
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
                    <h5 class="modal-title" id="addModalLabel">Tambah Jurusan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/admin/major/create" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="school_id" class="form-label">Nama Sekolah</label>
                            <select class="form-control" id="school_id" name="school_id" required>
                                <option value="">-- Pilih Sekolah --</option>
                                @foreach($schools as $school)
                                    <option value="{{ $school->id }}">{{ $school->school_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Jurusan</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="personality_type" class="form-label">Tipe Kepribadian</label>
                        <select name="personality_type" id="personality_type" class="form-control" required>
                            <option value="">-- Pilih Tipe Kepribadian --</option>
                            <option value="INTJ">INTJ - The Architect</option>
                            <option value="INFP">INFP - The Mediator</option>
                            <option value="INFJ">INFJ - The Advocate</option>
                            <option value="ISFP">ISFP - The Adventurer</option>
                            <option value="ISFJ">ISFJ - The Defender</option>
                            <option value="ISTP">ISTP - The Virtuoso</option>
                            <option value="ISTJ">ISTJ - The Logistician</option>
                            <option value="ENFP">ENFP - The Campaigner</option>
                            <option value="ENFJ">ENFJ - The Protagonist</option>
                            <option value="ENTP">ENTP - The Debater</option>
                            <option value="ENTJ">ENTJ - The Commander</option>
                            <option value="ESFP">ESFP - The Entertainer</option>
                            <option value="ESFJ">ESFJ - The Consul</option>
                            <option value="ESTP">ESTP - The Entrepreneur</option>
                            <option value="ESTJ">ESTJ - The Executive</option>
                        </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan Jurusan</button>
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
            var name = button.getAttribute('data-major-name')
            var personality_type = button.getAttribute('data-personality-type')
            var school_id = button.getAttribute('data-school-id')

            var modalId = editModal.querySelector('#major_id')
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
