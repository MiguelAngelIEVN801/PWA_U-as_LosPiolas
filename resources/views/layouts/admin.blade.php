<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- PWA Manifest -->
    <link rel="manifest" href="{{ mix('build/manifest.json') }}">

    <!-- App Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        /* Sidebar Styling */
        .sidebar {
            height: 100vh;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .sidebar h4 {
            font-weight: bold;
            color: #007bff;
        }
        .sidebar .nav-link {
            font-weight: 500;
            color: #495057;
            transition: all 0.3s ease;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            color: #fff;
            background-color: #007bff;
        }

        /* Main Content */
        main {
            background-color: #f8f9fa;
            min-height: 100vh;
            padding: 20px;
            border-left: 1px solid #e9ecef;
        }
    </style>
</head>
<body>
    @if (Auth::check())
        <!-- Mostrar contenido del dashboard si está autenticado -->
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                    <div class="position-sticky pt-3">
                        <h4 class="text-center mt-4">Panel de Administración</h4>
                        <ul class="nav flex-column mt-4">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                                    <i class="bi bi-house-door me-2"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.products.index') ? 'active' : '' }}" href="{{ route('admin.products.index') }}">
                                    <i class="bi bi-box-seam me-2"></i> Productos
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.users.index') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                                    <i class="bi bi-people me-2"></i> Usuarios
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.contacts.index') ? 'active' : '' }}" href="{{ route('admin.contacts.index') }}">
                                    <i class="bi bi-envelope me-2"></i> Contactos
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.citas.index') ? 'active' : '' }}" href="{{ route('admin.citas.index') }}">
                                    <i class="bi bi-calendar-event me-2"></i> Citas
                                </a>
                            </li>
                        </ul>
                        <div class="text-center mt-4">
                            <a class="btn btn-danger btn-sm" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </nav>

                <!-- Main Content -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Dashboard</h1>
                    </div>
                    @yield('content')
                </main>
            </div>
        </div>
    @else
        <!-- Mostrar únicamente el login si no está autenticado -->
        <div class="container d-flex justify-content-center align-items-center vh-100">
            @yield('content') <!-- Aquí se mostrará el formulario de inicio de sesión -->
        </div>
    @endif

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- PWA: Add Service Worker registration script -->
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/service-worker.js')
                    .then(function(registration) {
                        console.log('Service Worker registered with scope: ', registration.scope);
                    })
                    .catch(function(error) {
                        console.log('Service Worker registration failed: ', error);
                    });
            });
        }
    </script>
</body>
</html>
