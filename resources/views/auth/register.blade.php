@extends('layouts.app')

@section('title', 'Register - Sistem Rekomendasi Jurusan SMK')

@section('content')
    @include('partials.navbar')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">{{ __('Register') }}</h4>
                    </div>

                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <img src="{{ asset('img/test.png') }}" alt="MBTI SMK Logo" class="img-fluid"
                                style="max-height: 80px;">
                            <h5 class="mt-3">Sistem Rekomendasi Jurusan SMK</h5>
                            <p class="text-muted">Daftar untuk mendapatkan rekomendasi jurusan yang sesuai dengan
                                kepribadian Anda</p>
                        </div>

                        <form method="POST" action="/register">
                            @csrf

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus
                                            placeholder="Nama lengkap">
                                    </div>

                                    @error('name')
                                        <span class="invalid-feedback d-block mt-1" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email"
                                            placeholder="email@example.com">
                                    </div>

                                    @error('email')
                                        <span class="invalid-feedback d-block mt-1" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password" placeholder="Minimal 8 karakter">
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>

                                    @error('password')
                                        <span class="invalid-feedback d-block mt-1" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder="Ulangi password">
                                        <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <h6 class="mb-2">Informasi Tambahan (Opsional)</h6>

                                            <div class="mb-3">
                                                <label for="school" class="form-label">Sekolah</label>
                                                <input type="text" class="form-control" id="school" name="school_name"
                                                    placeholder="Nama sekolah Anda">
                                            </div>

                                            <div class="mb-0">
                                                <label for="grade" class="form-label">Kelas</label>
                                                <select class="form-select" id="grade" name="class_name">
                                                    <option value="" selected>Pilih kelas</option>
                                                    <option value="9">Kelas 9 SMP</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="terms" id="terms"
                                            required>
                                        <label class="form-check-label" for="terms">
                                            Saya menyetujui <a href="#">syarat dan ketentuan</a> serta <a
                                                href="#">kebijakan privasi</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">


                                <div class="col-md-6 offset-md-4">
                                   <div class="d-flex justify-content-between">
                                     <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-user-plus me-2"></i>{{ __('Register') }}
                                    </button>
                                    <a href="/login/index" class="btn btn-outline-primary">
                                <i class="fas fa-sign-in-alt me-2"></i>Login
                            </a>
                                   </div>
                                </div>

                            </div>
                        </form>

                        <hr class="my-4">

                        {{-- <div class="text-center">
                            <p class="mb-2">Sudah memiliki akun?</p>
                            <a href="/login/index" class="btn btn-outline-primary">
                                <i class="fas fa-sign-in-alt me-2"></i>Login
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle password visibility
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');

            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Toggle icon
                const iconClass = type === 'password' ? 'fa-eye' : 'fa-eye-slash';
                this.querySelector('i').classList.remove('fa-eye', 'fa-eye-slash');
                this.querySelector('i').classList.add(iconClass);
            });

            // Toggle confirm password visibility
            const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
            const confirmPasswordInput = document.getElementById('password-confirm');

            toggleConfirmPassword.addEventListener('click', function() {
                const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                confirmPasswordInput.setAttribute('type', type);

                // Toggle icon
                const iconClass = type === 'password' ? 'fa-eye' : 'fa-eye-slash';
                this.querySelector('i').classList.remove('fa-eye', 'fa-eye-slash');
                this.querySelector('i').classList.add(iconClass);
            });
        });
    </script>
@endsection
