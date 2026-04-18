<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRK Numerology</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #6e41e2;
            --secondary-color: #a777e3;
            --accent-color: #ff7e5f;
            --dark-color: #2c2c54;
            --light-color: #f8f9fa;
            --text-color: #333;
            --text-light: #6c757d;
            --border-radius: 10px;
            --box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-color);
            line-height: 1.7;
            background-color: var(--light-color);
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
            font-weight: 600;
        }
        
        /* Header Styles */
        .navbar {
            padding: 15px 0;
            background-color: #fff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 1.8rem;
            color: var(--primary-color) !important;
            transition: var(--transition);
        }
        
        .navbar-brand:hover {
            color: var(--secondary-color) !important;
        }
        
        .nav-link {
            font-weight: 500;
            color: var(--text-color);
            margin: 0 5px;
            padding: 8px 15px;
            border-radius: var(--border-radius);
            transition: var(--transition);
        }
        
        .nav-link:hover, .nav-link.active {
            color: var(--primary-color);
            background-color: rgba(110, 65, 226, 0.05);
        }
        
        .nav-link i {
            margin-right: 5px;
        }
        
        .dropdown-menu {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
        }
        
        .dropdown-item {
            padding: 10px 20px;
            transition: var(--transition);
        }
        
        .dropdown-item:hover {
            background-color: rgba(110, 65, 226, 0.05);
            color: var(--primary-color);
        }
        
        .dropdown-divider {
            margin: 0.5rem 0;
            border-color: rgba(0, 0, 0, 0.05);
        }
        
        /* Button Styles */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: var(--border-radius);
            padding: 10px 20px;
            font-weight: 500;
            transition: var(--transition);
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(110, 65, 226, 0.3);
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
        }
        
        .btn-outline-primary {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
            border-radius: var(--border-radius);
            padding: 10px 20px;
            font-weight: 500;
            transition: var(--transition);
        }
        
        .btn-outline-primary:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(110, 65, 226, 0.2);
        }
        
        /* Card Styles */
        .card {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            margin-bottom: 20px;
            overflow: hidden;
            transition: var(--transition);
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            background-color: #fff;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            font-weight: 600;
            padding: 15px 20px;
        }
        
        /* Footer Styles */
        footer {
            background: linear-gradient(135deg, var(--dark-color), #1a1a40);
            color: #fff;
            padding: 4rem 0 2rem;
            position: relative;
            margin-top: 5rem;
        }
        
        footer::before {
            content: '';
            position: absolute;
            top: -50px;
            left: 0;
            width: 100%;
            height: 50px;
            background: linear-gradient(to bottom right, transparent 49%, var(--dark-color) 50%);
        }
        
        .footer-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            position: relative;
            display: inline-block;
        }
        
        .footer-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -8px;
            width: 40px;
            height: 3px;
            background: var(--accent-color);
            border-radius: 10px;
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .footer-links li {
            margin-bottom: 10px;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
        }
        
        .footer-links a i {
            margin-right: 8px;
            font-size: 14px;
            transition: var(--transition);
        }
        
        .footer-links a:hover {
            color: #fff;
            transform: translateX(5px);
        }
        
        .footer-links a:hover i {
            color: var(--accent-color);
        }
        
        .contact-info li {
            margin-bottom: 15px;
            display: flex;
            align-items: flex-start;
        }
        
        .contact-info i {
            margin-right: 10px;
            background: rgba(255, 255, 255, 0.1);
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: var(--accent-color);
        }
        
        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-links a {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: #fff;
            transition: var(--transition);
        }
        
        .social-links a:hover {
            background: var(--accent-color);
            transform: translateY(-5px);
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-infinity me-2"></i>SRK Numerology
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item ms-2">
                            <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="btn btn-primary" href="{{ route('register') }}">
                                <i class="fas fa-user-plus"></i> Register
                            </a>
                        </li>
                    @else
                        <li class="nav-item dropdown ms-2">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="rounded-circle overflow-hidden me-2 d-inline-flex align-items-center justify-content-center" style="width: 30px; height: 30px; background-color: var(--primary-color);">
                                    <span class="text-white fw-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                </div>
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('user.dashboard') }}">
                                        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('user.orders.index') }}">
                                        <i class="fas fa-shopping-bag me-2"></i> My Orders
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user-circle me-2"></i> My Profile
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                    <h5 class="footer-title">SRK Numerology</h5>
                    <p class="text-white-50 mb-4">Discover the hidden meanings in your life through the power of numbers. Our expert numerologists provide personalized insights to guide your journey.</p>
                    <div class="social-links">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6">
                    <h5 class="footer-title">Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}"><i class="fas fa-chevron-right"></i> Home</a></li>
                        <li><a href="{{ route('about') }}"><i class="fas fa-chevron-right"></i> About Us</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Services</a></li>
                        <li><a href="{{ route('contact') }}"><i class="fas fa-chevron-right"></i> Contact</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> FAQs</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <h5 class="footer-title">Our Services</h5>
                    <ul class="footer-links">
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Name Numerology</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Birth Date Analysis</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Compatibility Reading</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Business Numerology</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Personal Consultations</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <h5 class="footer-title">Contact Us</h5>
                    <ul class="list-unstyled contact-info">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <p class="mb-0">123 Numerology Street</p>
                                <p class="mb-0">Mumbai, Maharashtra 400001</p>
                            </div>
                        </li>
                        <li>
                            <i class="fas fa-phone-alt"></i>
                            <div>
                                <p class="mb-0">+91 9876543210</p>
                                <p class="mb-0">+91 9876543211</p>
                            </div>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <div>
                                <p class="mb-0">info@srknumerology.com</p>
                                <p class="mb-0">support@srknumerology.com</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="mb-md-0 text-white-50">&copy; {{ date('Y') }} SRK Numerology. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-inline mb-0 text-md-end">
                            <li class="list-inline-item"><a href="#" class="text-white-50 text-decoration-none">Privacy Policy</a></li>
                            <li class="list-inline-item ms-3"><a href="#" class="text-white-50 text-decoration-none">Terms of Service</a></li>
                            <li class="list-inline-item ms-3"><a href="#" class="text-white-50 text-decoration-none">Sitemap</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>