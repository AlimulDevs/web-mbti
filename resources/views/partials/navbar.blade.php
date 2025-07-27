<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="/">
            <span class="bg-white text-primary rounded-circle p-2 d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                <i class="fas fa-graduation-cap"></i>
            </span>
            <span>MBTI SMK</span>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link active fw-medium px-3" href="#beranda">
                        <i class="fas fa-home me-1"></i> Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium px-3" href="#tentang">
                        <i class="fas fa-info-circle me-1"></i> Tentang
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium px-3" href="#metode">
                        <i class="fas fa-clipboard-list me-1"></i> Metode
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium px-3" href="#jurusan">
                        <i class="fas fa-book me-1"></i> Jurusan
                    </a>
                </li>
                @if (session('remember_token') != null)
                {{-- <li class="nav-item">
                    <a class="nav-link fw-medium px-3" href="/update-criteria/index">
                        <i class="fas fa-cog me-1"></i> Setting Profile
                    </a>
                </li> --}}
                @endif

              @if (session('remember_token') == null)
              <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                <a class="btn btn-outline-light rounded-pill px-4 py-2 d-flex align-items-center justify-content-center" href="/login/index">
                    <i class="fas fa-sign-in-alt me-2"></i> Masuk
                </a>
            </li>
            <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                <a class="btn btn-warning rounded-pill px-4 py-2 d-flex align-items-center justify-content-center" href="/register/index">
                    <i class="fas fa-user-plus me-2"></i> Daftar
                </a>
            </li>
            @else
            <li class="nav-item ps-lg-5 mt-2 mt-lg-0">
                <form method="POST" action="/logout">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger rounded-pill px-4 py-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                    </button>
                </form>
            </li>
              @endif
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar {
        background: linear-gradient(90deg, #1a56db, #3f83f8);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 0.75rem 1rem;
    }

    .navbar .nav-link {
        position: relative;
        transition: all 0.3s ease;
    }

    .navbar .nav-link:hover {
        color: #ffe066 !important;
    }

    .navbar .nav-link.active {
        color: #ffe066 !important;
        font-weight: 600;
    }

    .navbar .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 30px;
        height: 3px;
        background-color: #ffe066;
        border-radius: 10px;
    }

    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
        font-weight: 600;
    }

    .btn-warning:hover {
        background-color: #e0a800;
        border-color: #e0a800;
    }

    .btn-outline-light {
        font-weight: 600;
    }

    .btn-outline-light:hover {
        background-color: rgba(255, 255, 255, 0.15);
        color: white;
    }

    @media (max-width: 991.98px) {
        .navbar-collapse {
            background: linear-gradient(90deg, #1a56db, #3f83f8);
            border-radius: 10px;
            padding: 1rem;
            margin-top: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar .nav-link.active::after {
            left: 10px;
            transform: none;
            width: 5px;
            height: 20px;
            border-radius: 3px;
        }
    }
</style>
