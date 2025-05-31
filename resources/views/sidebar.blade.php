<style>
    @media (max-width: 767.98px) {
        main {
            padding-top: 56px;
        }

        .sidebar {
            min-height: auto;
        }
    }

    /* Ensure layout works on mobile */
    @media (max-width: 767.98px) {
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 1000;
            padding-top: 56px;
            width: 240px;
        }
    }

    .nav-link.active{
        color: green
    }


</style>
<!-- Admin Sidebar Partial -->
<div class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" id="sidebarMenu">
    <div class="position-sticky pt-3">
        <div class="d-flex align-items-center justify-content-center mb-3">
            <span class="fs-4 fw-bold text-primary">MBTI SMK</span>
            <button type="button" class="btn-close d-md-none ms-auto" data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation"></button>
        </div>

        <div class="user-profile text-center mb-4 pb-3 border-bottom">
            <img src="{{ asset('img/default-avatar.png') }}" alt="Admin" class="rounded-circle mb-2" width="80">
            <h6>{{session()->get('name')}}</h6>
            <span class="badge bg-primary">Administrator</span>
        </div>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{(request()->is('admin/dashboard/index')?'active':'')}}"
                    href="/admin/dashboard/index">
                    <i class="bi bi-speedometer2 me-2"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{(request()->is('admin/criteria/index')?'active':'')}}"
                    href="/admin/criteria/index">
                    <i class="bi bi-list me-2"></i>
                    Kriteria
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{(request()->is('admin/student/index')?'active':'')}}"
                    href="/admin/student/index">
                    <i class="bi bi-person me-2"></i>
                    Siswa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{(request()->is('admin/school/index')?'active':'')}}"
                    href="/admin/school/index">
                    <i class="bi bi-building me-2"></i>
                    Sekolah
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{(request()->is('admin/major/index')?'active':'')}}"
                    href="/admin/major/index">
                    <i class="bi bi-person-lines-fill me-2"></i>
                    Jurusan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{(request()->is('admin/question/index')?'active':'')}}"
                    href="/admin/question/index">
                    <i class="bi bi-question-circle me-2"></i>
                    Soal MBTI
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/profile-matching/index') ? 'active' : '' }}"
                    href="/admin/profile-matching/index">
                    <i class="bi bi-sliders me-2"></i>
                    Profil Matching
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/test-result/index') ? 'active' : '' }}"
                    href="/admin/test-result/index">
                    <i class="bi bi-clipboard-data me-2"></i>
                    Hasil Tes & Perhitungan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/statistics*') ? 'active' : '' }}"
                    href="#">
                    <i class="bi bi-bar-chart me-2"></i>
                    Statistik
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Pengaturan</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <form method="POST" action="/logout" id="logout-form">
                    @csrf
                    @method('DELETE')
                    <a class="nav-link text-danger" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right me-2"></i>
                        Logout
                    </a>
                </form>
            </li>
        </ul>
    </div>
</div>

<!-- Mobile toggle button -->
<nav class="navbar navbar-light bg-light d-md-none fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
            aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <span class="navbar-brand mb-0 h1">MBTI SMK</span>
    </div>
</nav>
