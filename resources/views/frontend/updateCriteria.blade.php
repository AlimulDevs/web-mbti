@extends('layouts.app')

@section('title', 'Tes MBTI - Sistem Rekomendasi Jurusan SMK')

@section('content')
@include('partials.navbar')

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Setting Profile Kriteria</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Nama Kriteria</th>
                        <th>Kode</th>
                        <th>Profile</th>
                        <th>Nilai Bobot</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($criteria_users as $key => $criteria_user)
                        <tr class="text-center">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $criteria_user->criteria->name }}</td>
                            <td>{{ $criteria_user->code }}</td>
                            <td>{{ $criteria_user->profile }}</td>
                            <td>{{ $criteria_user->value }}</td>
                            <td>
                                <!-- Tombol Edit -->
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $criteria_user->id }}" data-name="{{ $criteria_user->criteria->name }}" data-code="{{ $criteria_user->code }}" data-profile="{{ $criteria_user->profile }}" data-value="{{ $criteria_user->value }}">
                                    <i class="fas fa-edit text-white"></i>
                                </button>

                                <!-- Tombol Hapus -->

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="/criteria-update" class="btn btn-primary float-end"><i class="fas fa-save me-2"></i>Save</a>
        </div>

    </div>


    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Kriteria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/criteria-user/update" method="POST">
                        @csrf
                        <input type="hidden" id="id" name="id">

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Kriteria</label>
                            <input type="text" class="form-control" id="name" name="name" disabled >
                        </div>

                        <div class="mb-3">
                            <label for="code" class="form-label">Kode Kriteria</label>
                            <input type="text" class="form-control" id="code" name="code" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="profile" class="form-label">Profile</label>
                            <input type="number" class="form-control" id="profile" name="profile" required>
                        </div>

                        <div class="mb-3">
                            <label for="value" class="form-label">Nilai Bobot</label>
                            <input type="text" class="form-control" id="value" name="value" required>
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
</div>
<script>
    // Mengisi data modal ketika tombol edit ditekan
    var editModal = document.getElementById('editModal')
    editModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        var id = button.getAttribute('data-id')
        var name = button.getAttribute('data-name')
        var code = button.getAttribute('data-code')
        var profile = button.getAttribute('data-profile')
        var value = button.getAttribute('data-value')

        var modalId = editModal.querySelector('#id')
        var modalName = editModal.querySelector('#name')
        var modalCode = editModal.querySelector('#code')
        var modalProfile = editModal.querySelector('#profile')
        var modalValue = editModal.querySelector('#value')

        modalId.value = id
        modalName.value = name
        modalCode.value = code
        modalProfile.value = profile
        modalValue.value = value
    })
</script>
@endsection
