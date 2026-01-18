<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JK Auto Sales Company - Vehicle Buying and Selling</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="{{ secure_asset('img/logo.png') }}" type="image/png">

    <style>
        :root {
            --primary-color: #1a3a5f;
            --secondary-color: #d4af37;
            --accent-color: #e63946;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }
        
        .navbar {
            background-color: var(--primary-color);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            color: var(--secondary-color) !important;
            display: flex;
            align-items: center;
        }
        
        .logo-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-right: 10px;
        }

        .logo-container img {
            height: 90px;
            margin-bottom: 2px;
        }
        
        .logo-top {
            font-weight: bold;
            font-size: 1.8rem;
            line-height: 1;
            color: white;
        }
        
        .logo-middle {
            font-weight: bold;
            font-size: 1.2rem;
            line-height: 1;
            color: var(--secondary-color);
            margin: 2px 0;
        }
        
        .logo-bottom {
            font-weight: bold;
            font-size: 0.9rem;
            line-height: 1;
            color: white;
        }
        
        .nav-link {
            color: white !important;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .nav-link:hover {
            color: var(--secondary-color) !important;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: #0f2a46;
            border-color: #0f2a46;
        }
        
        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url({{ asset('img/Fondo.jpeg') }});
            background-size: cover;
            background-position: center;
            color: white;
            padding: 120px 0;
            text-align: center;
        }
        
        .section-title {
            position: relative;
            margin-bottom: 2rem;
            font-weight: 700;
            color: var(--primary-color);
        }
        
        .section-title:after {
            content: '';
            display: block;
            width: 60px;
            height: 3px;
            background-color: var(--secondary-color);
            margin-top: 10px;
        }
        
        .vehicle-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 30px;
        }
        
        .vehicle-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        
        .vehicle-img {
            height: 200px;
            object-fit: cover;
        }
        
        .price-tag {
            background-color: var(--accent-color);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: 600;
            position: absolute;
            top: 15px;
            right: 15px;
        }
        
        .feature-icon {
            color: var(--secondary-color);
            margin-right: 8px;
        }
        
        .footer {
            background-color: var(--primary-color);
            color: white;
            padding: 50px 0 20px;
        }

        .footer-logo img{
            height: 200px;
            margin-bottom: 5px;
        }
        
        .footer a {
            color: #ddd;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer a:hover {
            color: var(--secondary-color);
        }
        
        .social-icons a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background-color: rgba(255,255,255,0.1);
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            margin-right: 10px;
            transition: all 0.3s;
        }
        
        .social-icons a:hover {
            background-color: var(--secondary-color);
            transform: translateY(-3px);
        }
        
        .search-section {
            background-color: #f8f9fa;
            padding: 40px 0;
            border-radius: 10px;
            margin-top: -50px;
            position: relative;
            z-index: 10;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .stats-section {
            background-color: var(--primary-color);
            color: white;
            padding: 60px 0;
        }
        
        .stat-item {
            text-align: center;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 10px;
        }
        
        .modal-content {
            border-radius: 10px;
            border: none;
        }
        
        .modal-header {
            background-color: var(--primary-color);
            color: white;
            border-radius: 10px 10px 0 0;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(26, 58, 95, 0.25);
        }
        
        .footer-logo {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .footer-logo-top {
            font-weight: bold;
            font-size: 2.2rem;
            line-height: 1;
            color: white;
        }
        
        .footer-logo-middle {
            font-weight: bold;
            font-size: 1.5rem;
            line-height: 1;
            color: var(--secondary-color);
            margin: 5px 0;
        }
        
        .footer-logo-bottom {
            font-weight: bold;
            font-size: 1.1rem;
            line-height: 1;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <div class="logo-container">
                   <img src="{{ asset('img/logo.png') }}" alt="Logo">
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#vehicles">Vehicles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Buy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <button class="btn btn-outline-light me-2" data-bs-toggle="modal" data-bs-target="#loginModal" onclick="window.location.href='{{ route('login') }}'">
                        <i class="fas fa-sign-in-alt me-1"></i> Login
                    </button>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#registerModal" onclick="window.location.href='{{ route('register') }}'">
                        <i class="fas fa-user-plus me-1"></i> Register
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="display-4 fw-bold mb-4">Find Your Perfect Vehicle</h1>
            <p class="lead mb-4">JK Auto Sales Company offers you the best selection of new and used vehicles with quality guarantee.</p>
            <a href="#vehicles" class="btn btn-warning btn-lg px-4">
                <i class="fas fa-search me-2"></i>Explore Vehicles
            </a>
        </div>
    </section>

    <!-- Search Section -->
    <section class="search-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <select class="form-select">
                        <option selected>Brand</option>
                        <option>Toyota</option>
                        <option>Honda</option>
                        <option>Ford</option>
                        <option>Chevrolet</option>
                        <option>Nissan</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <select class="form-select">
                        <option selected>Model</option>
                        <option>Sedan</option>
                        <option>SUV</option>
                        <option>Pickup</option>
                        <option>Hatchback</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <select class="form-select">
                        <option selected>Maximum Price</option>
                        <option>$10,000</option>
                        <option>$20,000</option>
                        <option>$30,000</option>
                        <option>$50,000</option>
                        <option>$100,000+</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <button class="btn btn-primary w-100">
                        <i class="fas fa-search me-2"></i>Search
                    </button>
                </div>
            </div>
        </div>
    </section>

<section id="vehicles" class="py-5">
    <div class="container">
        <h2 class="section-title text-center">Featured Vehicles</h2>

        @if($vehiculos->count() > 0)
        <div class="row">
            @foreach($vehiculos as $vehiculo)
            @if($vehiculo->disponible == 1)
            <div class="col-md-4 mb-4">
                <div class="card vehicle-card">
                    <div class="position-relative">
                        @if($vehiculo->imagen)
                        <img src="{{ $vehiculo->imagen }}" class="card-img-top vehicle-img" 
                        alt="{{ $vehiculo->marca }} {{ $vehiculo->modelo }}"
                        onerror="this.src='https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80'">
                        @else
                            <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" class="card-img-top vehicle-img" alt="{{ $vehiculo->marca }} {{ $vehiculo->modelo }}">
                        @endif
                        <div class="price-tag">${{ number_format($vehiculo->precio, 0) }}</div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $vehiculo->anio }} {{ $vehiculo->marca }} {{ $vehiculo->modelo }}</h5>
                        <p class="card-text">{{ $vehiculo->descripcion }}</p>
                        <div class="d-flex justify-content-between mb-3">
                            <small><i class="fas fa-tachometer-alt feature-icon"></i> {{ number_format($vehiculo->kilometraje, 0) }} Mi</small>
                            <small><i class="fas fa-gas-pump feature-icon"></i> {{ $vehiculo->combustible }}</small>
                            <small><i class="fas fa-cogs feature-icon"></i> {{ $vehiculo->transmision }}</small>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <small class="text-muted"><i class="fas fa-palette feature-icon"></i> {{ $vehiculo->color }}</small>
                            <small class="text-muted"><i class="fas fa-tag feature-icon"></i> {{ $vehiculo->estado }}</small>
                        </div>
                        <div class="vehicle-actions">
                            <!-- Modified Details Button -->
                            <a href="{{ route('login') }}" class="btn btn-primary me-2">
                                <i class="fas fa-info-circle me-1"></i>Details
                            </a>
                            <a href="{{ route('login') }}" class="btn btn-success">
                                <i class="fas fa-shopping-cart me-1"></i>Purchase
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        @else
        <div class="no-vehicles">
            <i class="fas fa-car"></i>
            <h3>No vehicles available</h3>
            <p class="text-muted">We currently don't have any vehicles in our inventory.</p>
        </div>
        @endif
        @if($vehiculos->count() > 0)
        <div class="text-center mt-4">
            <a href="#" class="btn btn-outline-primary">View All Vehicles</a>
        </div>
        @endif
    </div>
</section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 mb-4">
                    <div class="stat-item">
                        <div class="stat-number">1,250+</div>
                        <p>Vehicles Sold</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="stat-item">
                        <div class="stat-number">98%</div>
                        <p>Satisfied Customers</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="stat-item">
                        <div class="stat-number">15</div>
                        <p>Years of Experience</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="stat-item">
                        <div class="stat-number">50+</div>
                        <p>Available Brands</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center">How It Works</h2>
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="p-4">
                        <div class="rounded-circle bg-primary d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-search text-white fa-2x"></i>
                        </div>
                        <h4>1. Find</h4>
                        <p>Search through our wide selection of new and used vehicles.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="p-4">
                        <div class="rounded-circle bg-primary d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-car text-white fa-2x"></i>
                        </div>
                        <h4>2. Test Drive</h4>
                        <p>Schedule a test drive to experience the vehicle.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="p-4">
                        <div class="rounded-circle bg-primary d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-file-contract text-white fa-2x"></i>
                        </div>
                        <h4>3. Purchase</h4>
                        <p>Complete the purchase process with our team of experts.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-logo">
                <img src="{{ asset('img/logo.png') }}" alt="Logo">
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h4 class="mb-4">JK Auto Sales Company</h4>
                    <p>Your reliable destination for buying and selling quality vehicles. Over 15 years offering the best service.</p>
                    <div class="social-icons mt-4">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <h5 class="mb-4">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#">Home</a></li>
                        <li class="mb-2"><a href="#vehicles">Vehicles</a></li>
                        <li class="mb-2"><a href="{{ route('terminos') }}">Terms and Conditions</a></li>
                        <li class="mb-2"><a href="{{ route('politicas') }}">Policies and Privacy</a></li>
                        <li class="mb-2"><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5 class="mb-4">Contact</h5>
                    <p><i class="fas fa-map-marker-alt me-2"></i> 21688 E Poers Cir S, Centenera, Colorado</p>
                    <p><i class="fas fa-phone me-2"></i> (970) 815-5086</p>
                    <p><i class="fas fa-envelope me-2"></i> jkautosalescompany@gmail.com</p>
                </div>
                <div class="col-md-3 mb-4">
                    <h5 class="mb-4">Business Hours</h5>
                    <p>Monday - Friday: 9:00 AM - 7:00 PM</p>
                    <p>Saturday: 9:00 AM - 5:00 PM</p>
                    <p>Sunday: 11:00 AM - 4:00 PM</p>
                </div>
            </div>
            <hr class="mt-4">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2025 JK Auto Sales Company. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="me-3">Privacy Policy</a>
                    <a href="#">Terms and Conditions</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Login Modal 
    <div class="modal fade" id="loginModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="loginEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="loginEmail" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="loginPassword" placeholder="Enter your password">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                    <div class="text-center mt-3">
                        <a href="#">Forgot your password?</a>
                    </div>
                    <hr class="my-4">
                    <div class="text-center">
                        <p>Don't have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal">Register here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    -->

    <!-- Register Modal 
    <div class="modal fade" id="registerModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Account</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Your first name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" placeholder="Your last name">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="registerEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="registerEmail" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="registerPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="registerPassword" placeholder="Create a password">
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" placeholder="Repeat your password">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="acceptTerms">
                            <label class="form-check-label" for="acceptTerms">I accept the <a href="#">terms and conditions</a></label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>
                    <hr class="my-4">
                    <div class="text-center">
                        <p>Already have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">Login here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Script for smooth navigation handling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>