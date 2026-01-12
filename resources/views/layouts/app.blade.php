<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kantin Wakaf - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #198754; /* Green */
            --secondary-color: #ffc107; /* Yellow */
            --dark-bg: #212529;
            --light-bg: #f8faf9ff;
        }
        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--light-bg);
            color: #333;
        }
        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color) !important;
        }
        .nav-link {
            font-weight: 500;
            color: #555 !important;
            transition: color 0.3s;
        }
        .nav-link:hover, .nav-link.active {
            color: var(--primary-color) !important;
        }
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .btn-primary:hover {
            background-color: #157347;
            border-color: #146c43;
        }
        .footer {
            background-color: var(--dark-bg);
            color: white;
            padding: 2rem 0;
            margin-top: auto;
        }
        /* Custom Animations */
        .fade-in { animation: fadeIn 0.8s ease-in; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .cursor-pointer { cursor: pointer; }
        .hover-scale { transition: transform 0.2s; }
        .hover-scale:hover { transform: scale(1.05); }
        
        .hover-fluid { transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1); }
        .hover-fluid:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        /* Apply to all buttons and nav items for fluid feel */
        .btn, .nav-link { transition: all 0.2s; }
        .btn:hover { transform: translateY(-1px); }
    </style>
    @stack('styles')
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">KANTIN WAKAF</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('menu.*') ? 'active' : '' }}" href="{{ route('menu.index') }}">Food Menu</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('gallery.*') ? 'active' : '' }}" href="{{ route('gallery.index') }}">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
                    
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
