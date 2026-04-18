<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRK Numerology - About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            color: white;
            padding: 80px 0;
        }
        .team-member img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">SRK Numerology</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @if(Auth::user()->role === 'admin')
                                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                                @else
                                    <li><a class="dropdown-item" href="{{ route('user.dashboard') }}">My Dashboard</a></li>
                                @endif
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 fw-bold mb-4">About SRK Numerology</h1>
            <p class="lead">Discover the story behind our passion for numerology</p>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="https://via.placeholder.com/600x400" alt="About SRK Numerology" class="img-fluid rounded shadow">
                </div>
                <div class="col-md-6">
                    <h2 class="mb-4">Our Story</h2>
                    <p>SRK Numerology was founded in 2015 with a simple mission: to help people understand the profound impact that numbers have on their lives. Our founder, Suresh Kumar, has been studying numerology for over 20 years and has helped thousands of clients find clarity and direction through numerological analysis.</p>
                    <p>What started as a small consultation service has grown into a comprehensive platform offering various numerology packages tailored to different aspects of life. We believe that numerology is not just about predicting the future, but about understanding yourself better and making informed decisions.</p>
                    <p>Today, we are proud to serve clients from all walks of life, helping them navigate their personal and professional journeys with the wisdom of numbers.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Philosophy Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Our Philosophy</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-lightbulb text-primary" viewBox="0 0 16 16">
                                    <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a1.964 1.964 0 0 0-.453-.618A5.984 5.984 0 0 1 2 6zm6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1z"/>
                                </svg>
                            </div>
                            <h4>Empowerment</h4>
                            <p>We believe in empowering individuals with knowledge about their numerological profile, enabling them to make better life choices.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-compass text-primary" viewBox="0 0 16 16">
                                    <path d="M8 16.016a7.5 7.5 0 0 0 1.962-14.74A1 1 0 0 0 9 0H7a1 1 0 0 0-.962 1.276A7.5 7.5 0 0 0 8 16.016zm6.5-7.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                    <path d="m6.94 7.44 4.95-2.83-2.83 4.95-4.949 2.83 2.828-4.95z"/>
                                </svg>
                            </div>
                            <h4>Guidance</h4>
                            <p>Our numerology services provide guidance, not definitive answers. We help you navigate life's complexities with numerological insights.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-people text-primary" viewBox="0 0 16 16">
                                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
                                </svg>
                            </div>
                            <h4>Community</h4>
                            <p>We foster a community of individuals interested in numerology, creating a space for learning and sharing experiences.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Services Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Our Numerology Services</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="card-title text-center mb-4">Name Numerology</h4>
                            <p class="card-text">Our name numerology analysis reveals the influence your name has on your personality, career, and relationships. By analyzing the numerical values of the letters in your name, we provide insights into your inherent traits and potential.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="card-title text-center mb-4">Mobile Numerology</h4>
                            <p class="card-text">Your mobile number carries vibrations that can influence your daily life. Our mobile numerology service examines the numerical patterns in your phone number to determine its impact on your communication, opportunities, and overall energy.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="card-title text-center mb-4">Birth Numerology</h4>
                            <p class="card-text">Birth numerology analyzes your birth date to reveal your life path number, which influences your purpose, challenges, and opportunities. This comprehensive analysis provides a roadmap for understanding your life's journey.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Team Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Meet Our Team</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0">
                        <div class="card-body text-center">
                            <div class="team-member mb-3">
                                <img src="https://via.placeholder.com/150" alt="Suresh Kumar" class="mb-3">
                                <h4>Suresh Kumar</h4>
                                <p class="text-muted">Founder & Chief Numerologist</p>
                            </div>
                            <p>With over 20 years of experience in numerology, Suresh has helped thousands of clients discover the power of numbers in their lives.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0">
                        <div class="card-body text-center">
                            <div class="team-member mb-3">
                                <img src="https://via.placeholder.com/150" alt="Priya Sharma" class="mb-3">
                                <h4>Priya Sharma</h4>
                                <p class="text-muted">Senior Numerologist</p>
                            </div>
                            <p>Specializing in birth and name numerology, Priya brings a compassionate approach to her readings and consultations.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0">
                        <div class="card-body text-center">
                            <div class="team-member mb-3">
                                <img src="https://via.placeholder.com/150" alt="Rajesh Patel" class="mb-3">
                                <h4>Rajesh Patel</h4>
                                <p class="text-muted">Mobile Numerology Specialist</p>
                            </div>
                            <p>Rajesh has pioneered our mobile numerology services and continues to research the impact of digital numbers on our modern lives.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5>SRK Numerology</h5>
                    <p class="text-muted">Unlocking the power of numbers to guide your life's journey.</p>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}" class="text-decoration-none text-muted">Home</a></li>
                        <li><a href="{{ route('about') }}" class="text-decoration-none text-muted">About</a></li>
                        <li><a href="{{ route('contact') }}" class="text-decoration-none text-muted">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contact Us</h5>
                    <address class="text-muted">
                        <p>Email: info@srknumerology.com</p>
                        <p>Phone: +91 9876543210</p>
                    </address>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p class="mb-0 text-muted">© {{ date('Y') }} SRK Numerology. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
