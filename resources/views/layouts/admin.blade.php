<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRK Numerology - @yield('title', 'Admin Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #6a0dad; /* Purple - associated with spirituality and mysticism */
            --secondary-color: #4b0082; /* Indigo - associated with intuition */
            --accent-color: #9370db; /* Medium purple - for accents */
            --light-color: #e6e6fa; /* Lavender - light background */
            --dark-color: #2e1a47;
        }

        body {
            background-color: var(--light-color);
            background-image: url('/images/numerology/numerology_backgorund.jpg');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            background-blend-mode: overlay;
        }

        .sidebar {
            min-height: 100vh;
            background-color: var(--dark-color);
            background-image: url('/images/numerology/numerology_backgorund.jpg');
            background-size: cover;
            background-position: center;
            background-blend-mode: multiply;
            color: #fff;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 0;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        }
        .sidebar-sticky {
            position: sticky;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: 1rem;
            overflow-x: hidden;
            overflow-y: auto;
        }
        .sidebar .nav-link {
            color: rgba(255, 255, 255, .85);
            padding: 0.75rem 1rem;
            border-left: 3px solid transparent;
            transition: all 0.3s ease;
            margin-bottom: 5px;
        }
        .sidebar .nav-link:hover {
            color: #fff;
            background-color: rgba(147, 112, 219, 0.3);
            border-left: 3px solid var(--accent-color);
        }
        .sidebar .nav-link.active {
            color: #fff;
            background-color: rgba(147, 112, 219, 0.4);
            border-left: 3px solid var(--accent-color);
        }
        .sidebar .nav-link i {
            margin-right: 0.5rem;
            color: var(--accent-color);
        }
        .navbar-brand {
            padding: 1rem;
            background-color: var(--secondary-color);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            text-align: center;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .main-content {
            margin-left: 250px;
            padding: 2rem;
            position: relative;
            z-index: 1;
        }
        @media (min-width: 992px) {
            .main-content {
                margin-left: 16.666667%;
            }
        }
        .dashboard-card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.9);
            overflow: hidden;
            position: relative;
        }
        .dashboard-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        }
        .card-header {
            background-color: rgba(255, 255, 255, 0.8);
            border-bottom: 1px solid rgba(147, 112, 219, 0.2);
            padding: 1rem 1.5rem;
        }
        .card-header h5 {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 0;
        }
        .card-icon {
            font-size: 2.5rem;
            margin-bottom: 0.75rem;
            color: var(--primary-color);
            background: rgba(147, 112, 219, 0.1);
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .table-responsive {
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.8);
        }
        .table th {
            color: var(--primary-color);
            font-weight: 600;
            border-bottom-color: rgba(147, 112, 219, 0.3);
        }
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        .badge.bg-success {
            background-color: #4CAF50 !important;
        }
        .badge.bg-warning {
            background-color: #FF9800 !important;
        }
        .badge.bg-info {
            background-color: var(--accent-color) !important;
        }
        .badge.bg-danger {
            background-color: #F44336 !important;
        }
        @media (max-width: 768px) {
            .sidebar {
                position: static;
                height: auto;
                width: 100%;
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar col-md-3 col-lg-2 d-md-block">
        <div class="navbar-brand d-flex align-items-center justify-content-center">
            <div class="text-center">
                <i class="bi bi-stars mb-2" style="font-size: 1.5rem; display: block;"></i>
                <span style="font-size: 1.2rem; letter-spacing: 1px;">SRK</span>
                <span style="display: block; font-size: 0.9rem; opacity: 0.9;">NUMEROLOGY</span>
            </div>
        </div>
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-speedometer2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.packages.*') ? 'active' : '' }}" href="{{ route('admin.packages.index') }}">
                        <i class="bi bi-box"></i>
                        Packages
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.attributes.*') ? 'active' : '' }}" href="{{ route('admin.attributes.index') }}">
                        <i class="bi bi-hash"></i>
                        Attributes
                    </a>
                </li>
                                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.remedies.*') ? 'active' : '' }}" href="{{ route('admin.remedies.index') }}">
                                <i class="bi bi-heart"></i>
                                Remedies
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.first-letter-attributes.*') ? 'active' : '' }}" href="{{ route('admin.first-letter-attributes.index') }}">
                                <i class="bi bi-type"></i>
                                First Letter Attributes
                            </a>
                        </li>
                           <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.yoga-prediction.*') ? 'active' : '' }}" href="{{ route('admin.yoga-prediction.index') }}">
                                <i class="bi bi-type"></i>
                                Yoga Prediction
                            </a>
                        </li>
                            <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.md-yoga-prediction.*') ? 'active' : '' }}" href="{{ route('admin.md-yoga-prediction.index') }}">
                                <i class="bi bi-type"></i>
                                Md Yoga Prediction
                            </a>
                        </li>
                          <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.ad-yoga-prediction.*') ? 'active' : '' }}" href="{{ route('admin.ad-yoga-prediction.index') }}">
                                <i class="bi bi-type"></i>
                                Ad Yoga Prediction
                            </a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.pd-yoga-prediction.*') ? 'active' : '' }}" href="{{ route('admin.pd-yoga-prediction.index') }}">
                                <i class="bi bi-type"></i>
                                PD Yoga Prediction
                            </a>
                        </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                        <i class="bi bi-people"></i>
                        Users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}" href="{{ route('admin.orders.index') }}">
                        <i class="bi bi-cart"></i>
                        Orders
                    </a>
                </li>
                <li class="nav-item mt-4">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="bi bi-house"></i>
                        View Website
                    </a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link border-0 bg-transparent">
                            <i class="bi bi-box-arrow-right"></i>
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">@yield('page-title', 'Admin Panel')</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <span class="text-muted">Welcome, {{ Auth::user()->name }}</span>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
