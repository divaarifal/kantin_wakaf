<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kantin Wakaf - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- Custom CSS v1.4.0 -->
    <link href="{{ asset('css/custom_v2.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg fixed-top glass-nav navbar-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
                <div class="bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 40px; height: 40px;">
                    <i class="bi bi-cup-hot-fill fs-5"></i>
                </div>
                <span class="text-white tracking-wide">KANTIN WAKAF</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link text-white-50 {{ request()->routeIs('home') ? 'text-white active' : '' }}" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white-50 {{ request()->routeIs('menu.*') ? 'text-white active' : '' }}" href="{{ route('menu.index') }}">Food Menu</a></li>
                    <li class="nav-item"><a class="nav-link text-white-50 {{ request()->routeIs('gallery.*') ? 'text-white active' : '' }}" href="{{ route('gallery.index') }}">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link text-white-50 {{ request()->routeIs('about') ? 'text-white active' : '' }}" href="{{ route('about') }}">About Us</a></li>
                    <li class="nav-item"><a class="nav-link text-white-50 {{ request()->routeIs('contact') ? 'text-white active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
                    
                    @guest
                        <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                            <a href="{{ route('login') }}" class="btn btn-primary rounded-pill px-4 text-white">Login</a>
                        </li>
                    @else
                        <li class="nav-item dropdown ms-lg-2 mt-2 mt-lg-0">
                            <a class="nav-link dropdown-toggle btn btn-outline-success px-3 ps-2 py-1 rounded-pill d-flex align-items-center hover-fluid" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @if(Auth::user()->avatar)
                                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="rounded-circle object-fit-cover me-2" style="width: 30px; height: 30px; border: 1px solid #ddd;">
                                @else
                                    <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 30px; height: 30px; font-size: 0.8rem;">
                                        {{ substr(Auth::user()->username, 0, 1) }}
                                    </div>
                                @endif
                                <span class="fw-bold pe-2">{{ Auth::user()->username }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4 mt-2">
                                <li class="px-3 py-2 border-bottom bg-light rounded-top-4">
                                    <div class="small fw-bold text-uppercase text-muted mb-1">My Stats</div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>Meals:</span>
                                        <span class="badge bg-success rounded-pill">{{ Auth::user()->transactions()->count() }}</span>
                                    </div>
                                    @if(Auth::user()->transactions()->count() > 0 && Auth::user()->transactions()->count() % 10 == 0)
                                        <div class="mt-2 small text-warning fw-bold"><i class="bi bi-ticket-perforated-fill"></i> Voucher Available!</div>
                                    @endif
                                </li>
                                <li><a class="dropdown-item py-2 mt-2" href="{{ route('profile.edit') }}"><i class="bi bi-person-gear me-2 text-primary"></i> Account Settings</a></li>
                                @if(Auth::user()->role === 'admin')
                                    <li><a class="dropdown-item py-2" href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2 me-2 text-danger"></i> Admin Panel</a></li>
                                @endif
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item py-2 text-danger" type="submit"><i class="bi bi-box-arrow-right me-2"></i> Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="flex-grow-1">
        @yield('content')
    </main>

    <footer class="footer text-center">
        <div class="container">
            <p>&copy; {{ date('Y') }} Kantin Wakaf. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
