<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRK Numerology - User Dashboard</title>
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
            --success-color:#4caf50;
            --border-radius: 10px;
            --box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-color);
            line-height: 1.7;
            /* background: url('/images/numerology/numerology_backgorund.jpg') center/cover fixed; */
            position: relative;
            min-height: 100vh;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            z-index: -1;
        }

        h1, h2, h3, h4, h5, h6 {
            /* font-family: 'Playfair Display', serif; */
            font-weight: 600;
        }

        /* Header Styles */
        .user-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            padding: 15px 0;
            border-bottom: 1px solid #aaa;
            position: relative;
            z-index: 100;
        }

        .user-header .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .logo-text {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 1.8rem;
            color: #fff;
            margin-left: 10px;
        }

        .user-info {
            display: flex;
            align-items: center;
            color: #fff;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            font-weight: bold;
            color: #fff;
        }

        .user-dropdown {
            position: relative;
            cursor: pointer;
        }

        .user-dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background: #fff;
            border-radius: var(--border-radius);
            border: 1px solid #aaa;
            min-width: 200px;
            padding: 10px 0;
            margin-top: 10px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: var(--transition);
            z-index: 1000;
        }

        .user-dropdown:hover .user-dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .user-dropdown-item {
            display: flex;
            align-items: center;
            padding: 8px 20px;
            color: var(--text-color);
            text-decoration: none;
            transition: var(--transition);
        }

        .user-dropdown-item:hover {
            background-color: rgba(110, 65, 226, 0.05);
            color: var(--primary-color);
        }

        .user-dropdown-item i {
            margin-right: 10px;
            color: var(--primary-color);
        }

        .user-dropdown-divider {
            height: 1px;
            background-color: rgba(0, 0, 0, 0.05);
            margin: 8px 0;
        }

        /* Horizontal Menu Styles */
        .horizontal-menu {
            background: #fff;
            border-radius: var(--border-radius);
            padding: 15px 20px;
            margin-bottom: 20px;
            border: 1px solid #aaa;
        }

        .horizontal-menu-items {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            padding-top: 15px;
            margin-top: 10px;
        }

        .horizontal-menu-item {
            display: flex;
            align-items: center;
            padding: 8px 15px;
            color: var(--text-color);
            text-decoration: none;
            border-radius: var(--border-radius);
            transition: var(--transition);
            background-color: rgba(110, 65, 226, 0.02);
        }

        .horizontal-menu-item:hover, .horizontal-menu-item.active {
            background-color: rgba(110, 65, 226, 0.1);
            color: var(--primary-color);
        }

        .horizontal-menu-item i {
            margin-right: 8px;
            color: var(--primary-color);
            width: 20px;
            text-align: center;
        }

        @media (max-width: 768px) {
            .horizontal-menu-items {
                flex-direction: column;
            }
        }

        /* Content Styles */
        .content-wrapper {
            background: #fff;
            border-radius: var(--border-radius);
            border: 1px solid #aaa;
            overflow: hidden;
        }

        .content-header {
            background: linear-gradient(to right, rgba(110, 65, 226, 0.05), rgba(167, 119, 227, 0.05));
            padding: 20px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .content-title {
            margin: 0;
            font-size: 1.5rem;
            color: var(--dark-color);
        }

        .content-body {
            padding: 20px;
        }

        /* Card Styles */
        .dashboard-card {
            background: #fff;
            border-radius: var(--border-radius);
            border: 1px solid #aaa;
            overflow: hidden;
            transition: var(--transition);
            height: 100%;
            position: relative;
        }

        .dashboard-card:hover {
            transform: none;
            /* No shadow on hover */
        }

        .dashboard-card-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: #fff;
            padding: 15px 20px;
            font-family: 'Playfair Display', serif;
            position: relative;
            overflow: hidden;
        }

        .dashboard-card-header::before {
            content: '';
            position: absolute;
            top: -10px;
            right: -10px;
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .dashboard-card-body {
            padding: 20px;
        }

        /* Table Styles */
        .table {
            width: 100%;
            margin-bottom: 0;
        }

        .table th {
            background-color: rgba(110, 65, 226, 0.05);
            color: var(--dark-color);
            font-weight: 600;
            border-bottom: none;
        }

        .table td {
            vertical-align: middle;
        }

        /* Button Styles */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: var(--border-radius);
            padding: 8px 16px;
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
            padding: 8px 16px;
            font-weight: 500;
            transition: var(--transition);
        }

        .btn-outline-primary:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(110, 65, 226, 0.2);
        }

        /* Footer Styles */
        .user-footer {
            text-align: center;
            padding: 20px 0;
            color: var(--text-light);
            font-size: 0.9rem;
            margin-top: 40px;
        }

        /* Numerology Elements */
        .numerology-symbol {
            position: absolute;
            opacity: 0.03;
            color: var(--primary-color);
            z-index: -1;
        }

        .symbol-1 {
            top: 10%;
            left: 5%;
            font-size: 120px;
            transform: rotate(-15deg);
        }

        .symbol-2 {
            bottom: 15%;
            right: 5%;
            font-size: 100px;
        }

        .symbol-3 {
            top: 40%;
            right: 15%;
            font-size: 80px;
            transform: rotate(15deg);
        }

        .symbol-4 {
            bottom: 30%;
            left: 15%;
            font-size: 90px;
            transform: rotate(30deg);
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .horizontal-menu {
                margin-bottom: 20px;
            }
        }
    </style>



</head>
<body>
    <!-- Numerology Symbols Background -->
    <div class="numerology-symbol symbol-1"><i class="fas fa-infinity"></i></div>
    <div class="numerology-symbol symbol-2"><i class="fas fa-square-root-alt"></i></div>
    <div class="numerology-symbol symbol-3"><i class="fas fa-dharmachakra"></i></div>
    <div class="numerology-symbol symbol-4"><i class="fas fa-om"></i></div>

    <!-- Header -->
    <header class="user-header">
        <div class="container">
            <a href="<?php echo e(route('home')); ?>" class="logo">
                <i class="fas fa-infinity fa-2x text-white"></i>
                <span class="logo-text">SRK Numerology</span>
            </a>

            <div class="user-info">
                <div class="user-avatar">
                    <?php echo e(substr(Auth::user()->name, 0, 1)); ?>

                </div>
                <div class="user-dropdown">
                    <span><?php echo e(Auth::user()->name); ?> <i class="fas fa-chevron-down ms-2"></i></span>
                    <div class="user-dropdown-menu">
                        <a href="<?php echo e(route('user.dashboard')); ?>" class="user-dropdown-item">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                        <a href="<?php echo e(route('user.orders.index')); ?>" class="user-dropdown-item">
                            <i class="fas fa-shopping-bag"></i> My Orders
                        </a>
                        <div class="user-dropdown-divider"></div>
                        <a href="<?php echo e(route('logout')); ?>" class="user-dropdown-item text-danger"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Horizontal Menu -->
    <div class="container mt-3">
        <div class="horizontal-menu">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h5 class="mb-0">User Dashboard</h5>
                <p class="mb-0 small">Discover Your Numerology</p>
            </div>
            <div class="horizontal-menu-items">
                <a href="<?php echo e(route('user.dashboard')); ?>" class="horizontal-menu-item <?php echo e(request()->routeIs('user.dashboard') ? 'active' : ''); ?>">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <a href="<?php echo e(route('user.orders.index')); ?>" class="horizontal-menu-item <?php echo e(request()->routeIs('user.orders.*') ? 'active' : ''); ?>">
                    <i class="fas fa-shopping-bag"></i> My Orders
                </a>
                <a href="<?php echo e(route('user.numerology.name')); ?>" class="horizontal-menu-item <?php echo e(request()->routeIs('user.numerology.name') ? 'active' : ''); ?>">
                    <i class="fas fa-signature"></i> Name Numerology
                </a>
                <a href="<?php echo e(route('user.numerology.numapp')); ?>" class="horizontal-menu-item <?php echo e(request()->routeIs('user.numerology.numapp') ? 'active' : ''); ?>">
                    <i class="fas fa-mobile-alt"></i> Numerology Application
                </a>
                <a href="<?php echo e(route('user.numerology.mobile')); ?>" class="horizontal-menu-item <?php echo e(request()->routeIs('user.numerology.mobile') ? 'active' : ''); ?>">
                    <i class="fas fa-mobile-alt"></i> Mobile Numerology
                </a>
                <a href="<?php echo e(route('user.numerology.birth')); ?>" class="horizontal-menu-item <?php echo e(request()->routeIs('user.numerology.birth') ? 'active' : ''); ?>">
                    <i class="fas fa-calendar-alt"></i> Birth Numerology
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container py-4">
        <div class="row">
            <!-- Content -->
            <div class="col-12">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="user-footer">
        <div class="container">
            <p>&copy; <?php echo e(date('Y')); ?> SRK Numerology. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {

    function checkDevice() {

        const loader = document.getElementById('loader');
        const loginCard = document.querySelector('.login-card');

        let deviceId = localStorage.getItem('device_id');

        if (!deviceId) {
            deviceId = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                const r = Math.random() * 16 | 0;
                const v = c === 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(16);
            });
            localStorage.setItem('device_id', deviceId);
        }

        console.log('Checking device:', deviceId);

        fetch('/set-device-id?device_id=' + encodeURIComponent(deviceId)+'&logiedIn=1')

            .then(response => response.json())
            .then(data => {

                const deviceInput = document.getElementById('device_id');
                if (deviceInput) {
                    deviceInput.value = data.device_id || deviceId;
                }

                if (data.redirect) {
                    window.location.href = data.redirect;
                } else {
                    if (loginCard) loginCard.style.display = 'block';
                }
            })
            .catch(err => {
                console.error('Fetch error:', err);
            });
    }

    // Run immediately
    checkDevice();

    // Then every 10 seconds
    setInterval(checkDevice, 10000);

});
</script>

</body>
</html>
<?php /**PATH C:\laragon\www\numerology\resources\views/layouts/user.blade.php ENDPATH**/ ?>