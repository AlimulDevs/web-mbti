@extends('layouts.app')
@section('title', 'Admin Dashboard - Sistem Rekomendasi Jurusan SMK')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            @include('sidebar')

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Soal</h1>

                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle me-1"></i> {{session()->get('name')}}
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

                {{-- Tabel Soal --}}
                <div class="table-responsive">
                    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
                        Tambah Soal
                    </button>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Soal</th>
                                <th>Dimensi</th>
                                <th>Tipe Respon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questions as $key => $question)
                                <tr class="text-center">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $question->question_text }}</td>

                                    <!-- Menampilkan Dimensi -->
                                    <td>
                                        @if ($question->dimension == 'EI')
                                            Extraversion (E) vs Introversion (I)
                                        @elseif($question->dimension == 'SN')
                                            Sensing (S) vs Intuition (N)
                                        @elseif($question->dimension == 'TF')
                                            Thinking (T) vs Feeling (F)
                                        @elseif($question->dimension == 'JP')
                                            Judging (J) vs Perceiving (P)
                                        @endif
                                    </td>

                                    <!-- Menampilkan Response Type -->
                                    <td>
                                        @if ($question->response_type == 'E')
                                            Extraversion (E)
                                        @elseif($question->response_type == 'I')
                                            Introversion (I)
                                        @elseif($question->response_type == 'S')
                                            Sensing (S)
                                        @elseif($question->response_type == 'N')
                                            Intuition (N)
                                        @elseif($question->response_type == 'T')
                                            Thinking (T)
                                        @elseif($question->response_type == 'F')
                                            Feeling (F)
                                        @elseif($question->response_type == 'J')
                                            Judging (J)
                                        @elseif($question->response_type == 'P')
                                            Perceiving (P)
                                        @endif
                                    </td>

                                    <td>
                                        <!-- Tombol Edit -->
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editModal" data-id="{{ $question->id }}"
                                            data-question-name="{{ $question->question_text }}"
                                            data-dimension="{{ $question->dimension }}"
                                            data-response-type="{{ $question->response_type }}">
                                            Edit
                                        </button>


                                        <!-- Tombol Hapus -->
                                        <form action="/admin/question/delete/{{ $question->id }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <!-- Modal Edit -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Soal</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/admin/question/update" method="POST">
                                    @csrf
                                    <input type="hidden" id="question_id" name="id">

                                    <div class="mb-3">
                                        <label for="question_text" class="form-label">Soal</label>
                                        <input type="text" class="form-control" id="question_text" name="question_text"
                                            required>
                                    </div>

                                    <!-- Dropdown untuk memilih Dimensi (diupdate dinamis) -->
                                    <div class="mb-3">
                                        <label for="dimension" class="form-label">Dimensi</label>
                                        <select class="form-select" id="dimension" name="dimension" required>
                                            <option value="EI">Extraversion (E) vs Introversion (I)</option>
                                            <option value="SN">Sensing (S) vs Intuition (N)</option>
                                            <option value="TF">Thinking (T) vs Feeling (F)</option>
                                            <option value="JP">Judging (J) vs Perceiving (P)</option>
                                        </select>
                                    </div>

                                    <!-- Dropdown untuk memilih Response Type (diupdate dinamis) -->
                                    <div class="mb-3">
                                        <label for="response_type" class="form-label">Tipe Respon</label>
                                        <select class="form-select" id="response_type" name="response_type" required>
                                            <option value="E">Extraversion (E)</option>
                                            <option value="I">Introversion (I)</option>
                                            <option value="S">Sensing (S)</option>
                                            <option value="N">Intuition (N)</option>
                                            <option value="T">Thinking (T)</option>
                                            <option value="F">Feeling (F)</option>
                                            <option value="J">Judging (J)</option>
                                            <option value="P">Perceiving (P)</option>
                                        </select>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
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
                    <h5 class="modal-title" id="addModalLabel">Tambah Soal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/admin/question/create" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="question_text" class="form-label">Soal</label>
                            <input type="text" class="form-control" id="question_text" name="question_text" required>
                        </div>
                        <!-- Dropdown untuk memilih Dimensi (Diisi berdasarkan data yang ada) -->
                        <div class="mb-3">
                            <label for="dimension" class="form-label">Dimensi</label>
                            <select class="form-select" id="dimension" name="dimension" required>
                                <option value="EI">Extraversion (E) vs Introversion (I)</option>
                                <option value="SN">Sensing (S) vs Intuition (N)</option>
                                <option value="TF">Thinking (T) vs Feeling (F)</option>
                                <option value="JP">Judging (J) vs Perceiving (P)</option>
                            </select>
                        </div>

                        <!-- Dropdown untuk memilih Response Type (Diisi berdasarkan data yang ada) -->
                        <div class="mb-3">
                            <label for="response_type" class="form-label">Tipe Respon</label>
                            <select class="form-select" id="response_type" name="response_type" required>
                                <option value="E">Extraversion (E)</option>
                                <option value="I">Introversion (I)</option>
                                <option value="S">Sensing (S)</option>
                                <option value="N">Intuition (N)</option>
                                <option value="T">Thinking (T)</option>
                                <option value="F">Feeling (F)</option>
                                <option value="J">Judging (J)</option>
                                <option value="P">Perceiving (P)</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan Soal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script>
            // Mengisi data modal ketika tombol edit ditekan
            var editModal = document.getElementById('editModal');
            editModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget; // Tombol yang diklik
                var id = button.getAttribute('data-id');
                var question_text = button.getAttribute('data-question-name');
                var dimension = button.getAttribute('data-dimension');
                var response_type = button.getAttribute('data-response-type');

                // Mengisi data pada modal
                var modalId = editModal.querySelector('#question_id');
                var modalquestionName = editModal.querySelector('#question_text');
                var modalDimension = editModal.querySelector('#dimension');
                var modalResponseType = editModal.querySelector('#response_type');

                // Mengisi nilai data pada form
                modalId.value = id;
                modalquestionName.value = question_text;
                modalDimension.value = dimension;
                modalResponseType.value = response_type;
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
