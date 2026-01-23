<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kantin Wakaf Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-green: #064E3B;
            --accent-green: #10B981;
            --dark-sidebar: #1F2937; /* Gray-900 */
            --light-bg: #F3F4F6;     /* Gray-100 */
        }
        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--light-bg);
        }
        .sidebar {
            min-height: 100vh;
            background-color: var(--dark-sidebar);
            color: white;
            box-shadow: 4px 0 15px rgba(0,0,0,0.1);
        }
        .nav-link {
            color: rgba(255,255,255,0.7);
            padding: 12px 20px;
            margin-bottom: 5px;
            border-radius: 10px;
            transition: all 0.3s;
        }
        .nav-link:hover, .nav-link.active {
            color: #fff;
            background: linear-gradient(90deg, var(--accent-green), var(--primary-green));
            box-shadow: 0 4px 6px rgba(16, 185, 129, 0.2);
            transform: translateX(5px);
        }
        .nav-link i {
            margin-right: 12px;
            font-size: 1.1rem;
        }
        .btn-logout {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            color: white;
            transition: all 0.3s;
        }
        .btn-logout:hover {
            background: #ef4444;
            border-color: #ef4444;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar d-flex flex-column flex-shrink-0 p-4 text-white" style="width: 280px;">
            <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center mb-4 me-md-auto text-white text-decoration-none">
                <div class="bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center me-3 shadow" style="width: 40px; height: 40px;">
                    <i class="bi bi-shield-lock-fill fs-5"></i>
                </div>
                <span class="fs-4 fw-bold tracking-tight">Kantin Admin</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.menus.index') }}" class="nav-link {{ request()->routeIs('admin.menus.*') ? 'active' : '' }}">
                        <i class="bi bi-cup-hot"></i> Menu
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.galleries.index') }}" class="nav-link {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                        <i class="bi bi-images"></i> Gallery
                    </a>
                </li>
                
                <li class="nav-header text-uppercase text-white-50 fs-7 mt-3 mb-1 ms-3">Pages</li>
                <li>
                    <a href="{{ route('admin.pages.edit', 'home') }}" class="nav-link {{ request()->is('admin/pages/home') ? 'active' : '' }}">
                        <i class="bi bi-house"></i> Home Content
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.pages.edit', 'about') }}" class="nav-link {{ request()->is('admin/pages/about') ? 'active' : '' }}">
                        <i class="bi bi-info-circle"></i> About Content
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.pages.edit', 'contact') }}" class="nav-link {{ request()->is('admin/pages/contact') ? 'active' : '' }}">
                        <i class="bi bi-telephone"></i> Contact Content
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1 p-4 bg-light" style="max-height: 100vh; overflow-y: auto;">
            @yield('content')
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
