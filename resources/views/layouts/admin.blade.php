<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kantin Wakaf Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .sidebar {
            min-height: 100vh;
            background-color: #212529;
            color: white;
        }
        .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 10px 20px;
        }
        .nav-link:hover, .nav-link.active {
            color: #fff;
            background-color: #198754;
        }
        .nav-link i {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 250px;">
            <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-4">Kantin Admin</span>
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
