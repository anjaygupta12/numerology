<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRK Numerology - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
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
        }
        
        /* Footer Styles */
        .numerology-footer {
            background: linear-gradient(135deg, var(--dark-color), #1a1a40);
            color: #fff;
            padding: 0 0 2rem;
            position: relative;
            margin-top: 5rem;
            overflow: hidden;
        }
        
        .numerology-footer::before {
            content: '';
            position: absolute;
            top: -50px;
            left: 0;
            width: 100%;
            height: 50px;
            background: linear-gradient(to bottom right, transparent 49%, var(--dark-color) 50%);
        }
        
        /* Footer Pattern Styles */
        .footer-top-pattern, .footer-bottom-pattern {
            display: flex;
            justify-content: space-around;
            padding: 15px 0;
            background: rgba(110, 65, 226, 0.2);
            position: relative;
        }
        
        .footer-top-pattern {
            margin-bottom: 40px;
        }
        
        .footer-bottom-pattern {
            margin-top: 30px;
        }
        
        .pattern-symbol {
            font-size: 1.5rem;
            color: rgba(255, 255, 255, 0.3);
            animation: float 3s ease-in-out infinite;
        }
        
        .pattern-symbol:nth-child(2n) {
            animation-delay: 0.5s;
        }
        
        .pattern-symbol:nth-child(3n) {
            animation-delay: 1s;
        }
        
        @keyframes float {
            0% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0); }
        }
        
        /* Footer Logo Section */
        .footer-logo-section {
            padding: 20px 0 40px;
        }
        
        .footer-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        
        .footer-logo i {
            color: var(--accent-color);
        }
        
        .footer-logo h3 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            margin-bottom: 0;
            background: linear-gradient(to right, #fff, var(--accent-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        /* Footer Card Styles */
        .footer-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            padding: 20px;
            height: 100%;
            transition: transform 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .footer-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        
        .footer-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            position: relative;
            display: inline-block;
            color: #fff;
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
        
        .footer-title i {
            color: var(--accent-color);
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .footer-links li {
            margin-bottom: 12px;
            transition: all 0.3s ease;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            font-weight: 500;
        }
        
        .footer-links a i {
            margin-right: 8px;
            font-size: 14px;
            transition: var(--transition);
            color: var(--accent-color);
        }
        
        .footer-links a:hover {
            color: #fff;
            transform: translateX(5px);
        }
        
        .footer-links a:hover i {
            color: #fff;
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
            transition: all 0.3s ease;
        }
        
        .contact-info li:hover i {
            background: var(--accent-color);
            color: #fff;
            transform: scale(1.1);
        }
        
        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: #fff;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .social-icon:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
        }
        
        .social-icon:hover:before {
            opacity: 1;
        }
        
        .social-icon:hover {
            transform: translateY(-5px) rotate(360deg);
            box-shadow: 0 5px 15px rgba(255, 126, 95, 0.4);
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
            margin-top: 40px;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
            font-weight: 600;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: var(--border-radius);
            padding: 12px 25px;
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
            font-weight: 500;
            transition: var(--transition);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-3px);
        }
        
        .section-title {
            position: relative;
            margin-bottom: 50px;
            font-weight: 700;
        }
        
        .section-title:after {
            content: '';
            display: block;
            width: 70px;
            height: 4px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            margin: 15px auto 0;
            border-radius: 2px;
        }
        
        .package-card {
            border-radius: var(--border-radius);
            overflow: hidden;
            border: none;
            transition: var(--transition);
            height: 100%;
        }
        
        .package-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--box-shadow);
        }
        
        .card-header.bg-dark {
            background: var(--dark-color) !important;
        }
        
        .text-primary {
            color: var(--primary-color) !important;
        }
        
        .bg-primary {
            background-color: var(--primary-color) !important;
        }
        
        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 15px 0;
        }
        
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 1.5rem;
        }
        
        .nav-link {
            font-weight: 500;
            padding: 10px 15px !important;
            transition: var(--transition);
        }
        
        .nav-link:hover {
            color: var(--primary-color) !important;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: var(--dark-color);">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
                <i class="fas fa-infinity me-2"></i>SRK Numerology
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php if(auth()->guard()->guest()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('login')); ?>">
                                <i class="fas fa-sign-in-alt me-1"></i> Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-light ms-2" href="<?php echo e(route('register')); ?>">
                                <i class="fas fa-user-plus me-1"></i> Register
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle me-1"></i> <?php echo e(Auth::user()->name); ?>

                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <?php if(Auth::user()->role === 'admin'): ?>
                                    <li><a class="dropdown-item" href="<?php echo e(route('admin.dashboard')); ?>">
                                        <i class="fas fa-tachometer-alt me-1"></i> Admin Dashboard
                                    </a></li>
                                <?php else: ?>
                                    <li><a class="dropdown-item" href="<?php echo e(route('user.dashboard')); ?>">
                                        <i class="fas fa-tachometer-alt me-1"></i> My Dashboard
                                    </a></li>
                                <?php endif; ?>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="<?php echo e(route('logout')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-sign-out-alt me-1"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section py-5" style="background: url('/images/home/hero-bg.jpg') center/cover no-repeat; position: relative;">
        <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, rgba(110, 65, 226, 0.9), rgba(167, 119, 227, 0.8)); z-index: 1;"></div>
        <div class="container py-5 position-relative" style="z-index: 2;">
            <div class="row align-items-center py-5">
                <div class="col-lg-7 text-center text-lg-start text-white">
                    <h1 class="display-4 fw-bold mb-4" style="font-size: 3.5rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">Discover Your <span style="color: #ffd700;">Numerological</span> Path</h1>
                    <p class="lead mb-5">Unlock the secrets of numbers and their profound influence on your life journey, career path, and personal relationship.</p>
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center justify-content-lg-start">
                        <a href="#packages" class="btn btn-light btn-lg px-4 py-3 fw-bold">
                            <i class="fas fa-gem me-2"></i>Explore Packages
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block text-center mt-5 mt-lg-0">
                    <div class="card bg-white bg-opacity-10 p-4" style="border-radius: 20px; backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2); box-shadow: 0 20px 40px rgba(0,0,0,0.2);">
                        <div class="card-body">
                            <h3 class="text-white mb-4">Discover Your Number</h3>
                            <div class="text-start text-white">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="rounded-circle bg-white text-primary d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span>Personal Life Path Analysis</span>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="rounded-circle bg-white text-primary d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                        <i class="fas fa-heart"></i>
                                    </div>
                                    <span>Relationship Compatibility</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-white text-primary d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <span>Career & Financial Guidance</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Packages Section -->
    <section class="py-5" id="packages" style="background: url('/images/home/numerology-pattern.jpg') center/cover fixed; position: relative;">
        <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.95); z-index: 1;"></div>
        <div class="container position-relative" style="z-index: 2;">
            <h2 class="text-center section-title mb-5">Our Numeroology Packages</h2>
            <p class="text-center mb-5 lead">Choose the perfect numerology package to guide your journey and unlock your true potential</p>
            
            <?php if(session('error')): ?>
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle me-2"></i><?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>
            
            <?php if(auth()->guard()->check()): ?>
                <!-- Available Packages -->
                <?php if(count($purchasablePackages) > 0): ?>
                    <div class="d-flex align-items-center mb-4">
                        <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                            <i class="fas fa-gem text-white"></i>
                        </div>
                        <h4 class="mb-0">Available Packages</h4>
                    </div>
                    <div class="row g-4">
                        <?php $__currentLoopData = $purchasablePackages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 package-card border-0 shadow">
                                    <div class="card-header text-center" style="background: var(--dark-color); color: white; border-radius: 10px 10px 0 0;">
                                        <h5 class="my-2 fw-bold"><?php echo e($package->name); ?></h5>
                                    </div>
                                    <div class="card-body d-flex flex-column p-4">
                                        <div class="text-center mb-3">
                                            <span class="badge rounded-pill" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); padding: 8px 15px; font-size: 0.9rem;">
                                                <?php echo e(ucfirst($package->type)); ?> Numerology
                                            </span>
                                        </div>
                                        <p class="card-text flex-grow-1"><?php echo e($package->description); ?></p>
                                        <div class="text-center mt-4">
                                            <h3 class="card-title pricing-card-title mb-4" style="color: var(--primary-color); font-weight: 700;">₹<?php echo e(number_format($package->price, 2)); ?></h3>
                                            <a href="<?php echo e(route('user.orders.create', $package)); ?>" class="btn btn-primary w-100 py-3">
                                                <i class="fas fa-shopping-cart me-2"></i>Buy Now
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white border-0 p-4 pt-0">
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Detailed Analysis</li>
                                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Expert Consultation</li>
                                            <li><i class="fas fa-check-circle text-success me-2"></i>Personalized Report</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
                
                <!-- Pending Packages -->
                <?php if(count($pendingPackages) > 0): ?>
                    <div class="d-flex align-items-center mb-4 mt-5">
                        <div class="rounded-circle bg-warning d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                            <i class="fas fa-clock text-white"></i>
                        </div>
                        <h4 class="mb-0">Pending Orders</h4>
                    </div>
                    <div class="row g-4">
                        <?php $__currentLoopData = $pendingPackages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 package-card border-0 shadow">
                                    <div class="card-header text-center" style="background: #ffc107; color: #212529; border-radius: 10px 10px 0 0;">
                                        <h5 class="my-2 fw-bold"><?php echo e($package->name); ?></h5>
                                    </div>
                                    <div class="card-body d-flex flex-column p-4">
                                        <div class="text-center mb-3">
                                            <span class="badge rounded-pill" style="background: linear-gradient(135deg, #ffc107, #ffb400); padding: 8px 15px; font-size: 0.9rem; color: #212529;">
                                                <?php echo e(ucfirst($package->type)); ?> Numerology
                                            </span>
                                        </div>
                                        <p class="card-text flex-grow-1"><?php echo e($package->description); ?></p>
                                        <div class="text-center mt-4">
                                            <h3 class="card-title pricing-card-title mb-3" style="color: var(--primary-color); font-weight: 700;">₹<?php echo e(number_format($package->price, 2)); ?></h3>
                                            <div class="d-flex align-items-center justify-content-center mb-3">
                                                <i class="fas fa-spinner fa-spin me-2 text-warning"></i>
                                                <span class="fw-bold text-warning">Order Pending</span>
                                            </div>
                                            <p class="small text-muted mb-3">Your order for this package is being processed</p>
                                            <a href="<?php echo e(route('user.orders.index')); ?>" class="btn btn-outline-warning w-100 py-3">
                                                <i class="fas fa-eye me-2"></i>View Orders
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
                
                <!-- Purchased Packages -->
                <?php if(count($purchasedPackages) > 0): ?>
                    <div class="d-flex align-items-center mb-4 mt-5">
                        <div class="rounded-circle bg-success d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                            <i class="fas fa-check text-white"></i>
                        </div>
                        <h4 class="mb-0">Your Purchased Packages</h4>
                    </div>
                    <div class="row g-4">
                        <?php $__currentLoopData = $purchasedPackages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 package-card border-0 shadow">
                                    <div class="card-header text-center" style="background: #198754; color: white; border-radius: 10px 10px 0 0;">
                                        <h5 class="my-2 fw-bold"><?php echo e($package->name); ?></h5>
                                    </div>
                                    <div class="card-body d-flex flex-column p-4">
                                        <div class="text-center mb-3">
                                            <span class="badge rounded-pill" style="background: linear-gradient(135deg, #198754, #20c997); padding: 8px 15px; font-size: 0.9rem;">
                                                <?php echo e(ucfirst($package->type)); ?> Numerology
                                            </span>
                                        </div>
                                        <p class="card-text flex-grow-1"><?php echo e($package->description); ?></p>
                                        <div class="text-center mt-4">
                                            <h3 class="card-title pricing-card-title mb-3" style="color: var(--primary-color); font-weight: 700;">₹<?php echo e(number_format($package->price, 2)); ?></h3>
                                            <div class="d-flex align-items-center justify-content-center mb-3">
                                                <i class="fas fa-check-circle me-2 text-success"></i>
                                                <span class="fw-bold text-success">Purchased</span>
                                            </div>
                                            <p class="small text-muted">You've already purchased this package</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <!-- For non-logged in users, show all packages -->
                <div class="row g-4">
                    <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 package-card border-0 shadow">
                                <div class="card-header text-center" style="background: var(--dark-color); color: white; border-radius: 10px 10px 0 0;">
                                    <h5 class="my-2 fw-bold"><?php echo e($package->name); ?></h5>
                                </div>
                                <div class="card-body d-flex flex-column p-4">
                                    <div class="text-center mb-3">
                                        <span class="badge rounded-pill" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); padding: 8px 15px; font-size: 0.9rem;">
                                            <?php echo e(ucfirst($package->type)); ?> Numerology
                                        </span>
                                    </div>
                                    <p class="card-text flex-grow-1"><?php echo e($package->description); ?></p>
                                    <div class="text-center mt-4">
                                        <h3 class="card-title pricing-card-title mb-4" style="color: var(--primary-color); font-weight: 700;">₹<?php echo e(number_format($package->price, 2)); ?></h3>
                                        <a href="<?php echo e(route('login')); ?>" class="btn btn-primary w-100 py-3">
                                            <i class="fas fa-sign-in-alt me-2"></i>Login to Purchase
                                        </a>
                                    </div>
                                </div>
                                <div class="card-footer bg-white border-0 p-4 pt-0">
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Detailed Analysis</li>
                                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Expert Consultation</li>
                                        <li><i class="fas fa-check-circle text-success me-2"></i>Personalized Report</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5" style="background-color: var(--light-color);">
        <div class="container py-4">
            <h2 class="text-center section-title mb-5">Why Choose Our Numerology Services?</h2>
            <div class="row g-4 justify-content-center">
                <div class="col-md-4 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm rounded-4 position-relative feature-card" style="overflow: hidden; transition: var(--transition);">
                        <div class="position-absolute" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); width: 100%; height: 5px; top: 0;"></div>
                        <div class="card-body text-center p-4 p-xl-5">
                            <div class="mb-4 rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background: linear-gradient(135deg, rgba(110, 65, 226, 0.1), rgba(167, 119, 227, 0.1));">
                                <i class="fas fa-star fa-2x" style="color: var(--primary-color);"></i>
                            </div>
                            <h4 class="mb-3 fw-bold">Expert Analysis</h4>
                            <p class="mb-0">Our numerologists have decades of experience providing accurate and insightful readings tailored to your unique life path.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm rounded-4 position-relative feature-card" style="overflow: hidden; transition: var(--transition);">
                        <div class="position-absolute" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); width: 100%; height: 5px; top: 0;"></div>
                        <div class="card-body text-center p-4 p-xl-5">
                            <div class="mb-4 rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background: linear-gradient(135deg, rgba(110, 65, 226, 0.1), rgba(167, 119, 227, 0.1));">
                                <i class="fas fa-chart-line fa-2x" style="color: var(--primary-color);"></i>
                            </div>
                            <h4 class="mb-3 fw-bold">Personalized Guidance</h4>
                            <p class="mb-0">Receive tailored insights based on your unique numerological profile to guide your personal and professional decisions.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm rounded-4 position-relative feature-card" style="overflow: hidden; transition: var(--transition);">
                        <div class="position-absolute" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); width: 100%; height: 5px; top: 0;"></div>
                        <div class="card-body text-center p-4 p-xl-5">
                            <div class="mb-4 rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background: linear-gradient(135deg, rgba(110, 65, 226, 0.1), rgba(167, 119, 227, 0.1));">
                                <i class="fas fa-shield-alt fa-2x" style="color: var(--primary-color);"></i>
                            </div>
                            <h4 class="mb-3 fw-bold">Secure & Confidential</h4>
                            <p class="mb-0">Your personal information and readings are kept completely confidential with our secure data protection protocols.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm rounded-4 position-relative feature-card" style="overflow: hidden; transition: var(--transition);">
                        <div class="position-absolute" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); width: 100%; height: 5px; top: 0;"></div>
                        <div class="card-body text-center p-4 p-xl-5">
                            <div class="mb-4 rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background: linear-gradient(135deg, rgba(110, 65, 226, 0.1), rgba(167, 119, 227, 0.1));">
                                <i class="fas fa-clock fa-2x" style="color: var(--primary-color);"></i>
                            </div>
                            <h4 class="mb-3 fw-bold">Timely Delivery</h4>
                            <p class="mb-0">Get your comprehensive numerology reports delivered promptly, allowing you to apply insights without delay.</p>
                        </div>
                    </div>
                </div>
            </div>
            

        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-5" style="background: url('/images/home/testimonial-bg.jpg') center/cover fixed; position: relative;">
        <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(44, 44, 84, 0.9); z-index: 1;"></div>
        <div class="container py-5 position-relative" style="z-index: 2;">
            <h2 class="text-center section-title mb-5 text-white">What Our Clients Say</h2>
            
            <div class="row g-4 justify-content-center">
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow testimonial-card" style="border-radius: 15px; overflow: hidden; transition: var(--transition);">
                        <div class="card-body p-4 p-lg-5">
                            <div class="testimonial-quote position-relative mb-4" style="z-index: 1;">
                                <i class="fas fa-quote-left fa-3x" style="color: rgba(110, 65, 226, 0.1); position: absolute; top: -15px; left: -10px; z-index: -1;"></i>
                                <p class="card-text position-relative" style="z-index: 2;">"The comprehensive life path analysis completely transformed my perspective. I finally understand why certain patterns kept repeating in my career and relationships. The personalized guidance has been invaluable for my personal growth journey."</p>
                            </div>
                            <div class="d-flex justify-content-center mb-3">
                                <span class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                            </div>
                        </div>
                        <div class="card-footer border-0 bg-white p-4">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle overflow-hidden me-3" style="width: 50px; height: 50px; background-color: var(--primary-color);">
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                        <span class="text-white fw-bold">VK</span>
                                    </div>
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold">Vikram Kapoor</h6>
                                    <p class="mb-0 small text-muted">Premium Life Path Package</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow testimonial-card" style="border-radius: 15px; overflow: hidden; transition: var(--transition);">
                        <div class="card-body p-4 p-lg-5">
                            <div class="testimonial-quote position-relative mb-4" style="z-index: 1;">
                                <i class="fas fa-quote-left fa-3x" style="color: rgba(110, 65, 226, 0.1); position: absolute; top: -15px; left: -10px; z-index: -1;"></i>
                                <p class="card-text position-relative" style="z-index: 2;">"After struggling with my business decisions for years, the business numerology consultation provided clarity and direction. Within months of implementing the suggested changes to my business name and launch dates, I saw remarkable growth. The ROI has been incredible!"</p>
                            </div>
                            <div class="d-flex justify-content-center mb-3">
                                <span class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                            </div>
                        </div>
                        <div class="card-footer border-0 bg-white p-4">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle overflow-hidden me-3" style="width: 50px; height: 50px; background-color: var(--secondary-color);">
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                        <span class="text-white fw-bold">SM</span>
                                    </div>
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold">Sanjay Mehta</h6>
                                    <p class="mb-0 small text-muted">Business Numerology Consultation</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow testimonial-card" style="border-radius: 15px; overflow: hidden; transition: var(--transition);">
                        <div class="card-body p-4 p-lg-5">
                            <div class="testimonial-quote position-relative mb-4" style="z-index: 1;">
                                <i class="fas fa-quote-left fa-3x" style="color: rgba(110, 65, 226, 0.1); position: absolute; top: -15px; left: -10px; z-index: -1;"></i>
                                <p class="card-text position-relative" style="z-index: 2;">"The relationship compatibility analysis was eye-opening for both me and my partner. We now understand each other's core numbers and how they influence our communication styles. This has helped us resolve conflicts more effectively and deepen our connection. Worth every penny!"</p>
                            </div>
                            <div class="d-flex justify-content-center mb-3">
                                <span class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                            </div>
                        </div>
                        <div class="card-footer border-0 bg-white p-4">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle overflow-hidden me-3" style="width: 50px; height: 50px; background-color: var(--accent-color);">
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                        <span class="text-white fw-bold">NT</span>
                                    </div>
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold">Neha Tiwari</h6>
                                    <p class="mb-0 small text-muted">Relationship Compatibility Analysis</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

        </div>
    </section>

    <!-- Footer -->
    <footer class="numerology-footer">
        <div class="footer-top-pattern">
            <div class="pattern-symbol"><i class="fas fa-infinity"></i></div>
            <div class="pattern-symbol"><i class="fas fa-square-root-alt"></i></div>
            <div class="pattern-symbol"><i class="fas fa-dharmachakra"></i></div>
            <div class="pattern-symbol"><i class="fas fa-infinity"></i></div>
            <div class="pattern-symbol"><i class="fas fa-square-root-alt"></i></div>
        </div>
        <div class="container">
            <div class="footer-logo-section text-center mb-4">
                <div class="footer-logo">
                    <i class="fas fa-infinity fa-2x me-2"></i>
                    <h3>SRK Numerology</h3>
                </div>
                <p class="text-white-50 mx-auto" style="max-width: 700px;">Unlock the secrets of your destiny through the ancient science of numbers. Our expert numerologists provide personalized insights to guide your spiritual journey.</p>
            </div>
            
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-card">
                        <h5 class="footer-title"><i class="fas fa-star me-2"></i>About Us</h5>
                        <p class="text-white-50 mb-4">SRK Numerology has been providing authentic numerological insights since 2010. We combine ancient wisdom with modern understanding to help you navigate life's journey.</p>
                        <div class="social-links">
                            <a href="#" aria-label="Facebook" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" aria-label="Twitter" class="social-icon"><i class="fab fa-twitter"></i></a>
                            <a href="#" aria-label="Instagram" class="social-icon"><i class="fab fa-instagram"></i></a>
                            <a href="#" aria-label="LinkedIn" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                

                <div class="col-lg-3 col-md-6">
                    <div class="footer-card">
                        <h5 class="footer-title"><i class="fas fa-magic me-2"></i>Our Services</h5>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fas fa-signature me-1"></i> Name Numerology</a></li>
                            <li><a href="#"><i class="fas fa-calendar-alt me-1"></i> Birth Date Analysis</a></li>
                            <li><a href="#"><i class="fas fa-heart me-1"></i> Compatibility Reading</a></li>
                            <li><a href="#"><i class="fas fa-briefcase me-1"></i> Business Numerology</a></li>
                            <li><a href="#"><i class="fas fa-user-tie me-1"></i> Personal Consultations</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="footer-card">
                        <h5 class="footer-title"><i class="fas fa-envelope me-2"></i>Contact Us</h5>
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
            </div>
            
            <div class="footer-bottom">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="mb-md-0 text-white-50">&copy; <?php echo e(date('Y')); ?> SRK Numerology. All Rights Reserved.</p>
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
        <div class="footer-bottom-pattern">
            <div class="pattern-symbol"><i class="fas fa-dharmachakra"></i></div>
            <div class="pattern-symbol"><i class="fas fa-square-root-alt"></i></div>
            <div class="pattern-symbol"><i class="fas fa-infinity"></i></div>
            <div class="pattern-symbol"><i class="fas fa-dharmachakra"></i></div>
            <div class="pattern-symbol"><i class="fas fa-square-root-alt"></i></div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH /var/www/vhosts/srknumerology.com/numro.srknumerology.com/resources/views/home.blade.php ENDPATH**/ ?>