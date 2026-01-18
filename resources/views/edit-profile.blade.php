<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit Profile - JK Auto Sales Company</title>
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
            --success-color: #28a745;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding-top: 0;
        }
        
        /* Navbar Styles */
        .navbar {
            background-color: var(--primary-color);
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
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
            height: 50px;
            margin-bottom: 2px;
        }
        
        .nav-link {
            color: white !important;
            font-weight: 500;
            transition: all 0.3s;
            padding: 0.5rem 1rem !important;
            border-radius: 6px;
            margin: 0 2px;
        }
        
        .nav-link:hover {
            color: var(--secondary-color) !important;
            background-color: rgba(255,255,255,0.1);
        }
        
        .user-menu {
            color: white;
            display: flex;
            align-items: center;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--secondary-color), #f1c40f);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: var(--primary-color);
            margin-right: 10px;
            border: 2px solid rgba(255,255,255,0.2);
        }
        
        /* Profile Container */
        .profile-container {
            min-height: calc(100vh - 80px);
            padding: 2rem 0;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }
        
        .profile-card {
            display: flex;
            flex-direction: column;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
            overflow: hidden;
            max-width: 90%;
            width: 100%;
            margin: 2rem auto;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 70px rgba(0,0,0,0.15);
        }
        
        .profile-header {
            background: linear-gradient(135deg, var(--primary-color), #2c5282);
            color: white;
            padding: 2.5rem 2rem;
            text-align: center;
            position: relative;
        }
        
        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--secondary-color), #f1c40f);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--primary-color);
            margin: 0 auto 1rem;
            border: 4px solid white;
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }
        
        .profile-header h1 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .profile-header p {
            opacity: 0.9;
            margin-bottom: 0;
            font-size: 1rem;
        }
        
        /* Form Styles */
        .profile-form {
            padding: 2.5rem 2rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }
        
        .form-label i {
            margin-right: 0.5rem;
            color: var(--secondary-color);
        }
        
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            transition: all 0.3s;
            background-color: #f8f9fa;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(26, 58, 95, 0.15);
            background-color: white;
        }
        
        .form-control.is-valid {
            border-color: var(--success-color);
        }
        
        .form-control.is-invalid {
            border-color: var(--accent-color);
        }
        
        .input-group-text {
            background-color: var(--primary-color);
            border: 2px solid var(--primary-color);
            color: white;
            border-radius: 10px 0 0 10px;
        }
        
        /* Button Styles */
        .btn-update {
            background: linear-gradient(135deg, var(--primary-color), #2c5282);
            border: none;
            color: white;
            padding: 0.875rem 2rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s;
            width: 100%;
            margin-top: 1rem;
        }
        
        .btn-update:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(26, 58, 95, 0.3);
            background: linear-gradient(135deg, #0f2a46, #1a3a5f);
        }
        
        .btn-back {
            background: transparent;
            border: 2px solid #e9ecef;
            color: #6c757d;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s;
            width: 100%;
            margin-top: 0.5rem;
        }
        
        .btn-back:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
            background-color: rgba(26, 58, 95, 0.05);
        }
        
        /* Success Message */
        .alert-success {
            background: linear-gradient(135deg, var(--success-color), #20c997);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
        }
        
        /* Footer Styles */
        .footer {
            background-color: var(--primary-color);
            color: white;
            padding: 2rem 0 1rem;
            margin-top: auto;
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
        
        .footer-logo {
            text-align: center;
            margin-bottom: 1rem;
        }

        .footer-logo img {
            height: 60px;
            margin-bottom: 5px;
        }
        
        /* Responsive Styles */
        @media (max-width: 768px) {
            .profile-card {
                margin: 1rem;
            }
            
            .profile-header {
                padding: 2rem 1.5rem;
            }
            
            .profile-form {
                padding: 2rem 1.5rem;
            }
            
            .profile-avatar {
                width: 80px;
                height: 80px;
                font-size: 2rem;
            }
        }
        
        @media (max-width: 576px) {
            .profile-header {
                padding: 1.5rem 1rem;
            }
            
            .profile-form {
                padding: 1.5rem 1rem;
            }
            
            .profile-header h1 {
                font-size: 1.5rem;
            }
        }
        
        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .profile-card {
            animation: fadeIn 0.6s ease-out;
        }
    </style>
</head>
<body>
    <!-- Navbar Personalizado -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
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
                        <a class="nav-link" href="{{ route('dashboard') }}">
                        Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                        Vehicles
                        </a>
                    </li>
                    @if(Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ordenes.index') }}">
                        Sell
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ordenes.index') }}">
                        My Purchases
                        </a>
                    </li>
                </ul>
                <div class="user-menu">
                    <div class="user-avatar">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div class="dropdown">
                        <a class="text-white text-decoration-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item active" href="{{ route('profile.edit') }}">
                                <i class="fas fa-user-edit me-2"></i>Edit Profile
                            </a></li>
                            <li><a class="dropdown-item" href="#">
                                <i class="fas fa-cog me-2"></i>Settings
                            </a></li>
                            @if(Auth::user()->role == 'admin')
                            <li><a class="dropdown-item" href="{{ route('vehiculos.index') }}">
                                <i class="fas fa-car me-2"></i>Add Vehicle
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('ordenes.index') }}">
                                <i class="fas fa-shopping-cart me-2"></i>Orders
                            </a></li>
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Profile Edit Content -->
    <div class="profile-container">
        <div class="container">
            <div class="profile-card">
                <div class="profile-header">
                    <div class="profile-avatar">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <h1>Edit Profile</h1>
                    <p>Update your personal information</p>
                </div>

                <div class="profile-form">
                    @if(session('status') === 'profile-updated')
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            <strong>Success!</strong> Your profile has been updated.
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')

                        <!-- Name Field -->
                        <div class="form-group">
                            <label class="form-label" for="name">
                                <i class="fas fa-user"></i>Full Name
                            </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name', Auth::user()->name) }}" 
                                   required autofocus autocomplete="name">
                            @error('name')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div class="form-group">
                            <label class="form-label" for="email">
                                <i class="fas fa-envelope"></i>Email Address
                            </label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email', Auth::user()->email) }}" 
                                   required autocomplete="email">
                            @error('email')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div class="form-group">
                            <label class="form-label" for="password">
                                <i class="fas fa-lock"></i>New Password
                            </label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                   id="password" name="password" autocomplete="new-password"
                                   placeholder="Leave blank to keep current password">
                            @error('password')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                            <small class="form-text text-muted mt-1">
                                <i class="fas fa-info-circle me-1"></i>Minimum 8 characters
                            </small>
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="form-group">
                            <label class="form-label" for="password_confirmation">
                                <i class="fas fa-lock"></i>Confirm Password
                            </label>
                            <input type="password" class="form-control" 
                                   id="password_confirmation" name="password_confirmation" 
                                   autocomplete="new-password"
                                   placeholder="Confirm your new password">
                        </div>

                        <button type="submit" class="btn btn-update">
                            <i class="fas fa-save me-2"></i>Update Profile
                        </button>

                        <a href="{{ route('dashboard') }}" class="btn btn-back">
                            <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Personalizado -->
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
                        <li class="mb-2"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="mb-2"><a href="{{ route('dashboard') }}">Vehicles</a></li>
                        @if(Auth::user()->role == 'admin')
                        <li class="mb-2"><a href="{{ route('vehiculos.create') }}">Sell</a></li>
                        <li class="mb-2"><a href="{{ route('ordenes.mis-ordenes') }}">My Purchases</a></li>
                        @endif
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
                    <a href="{{ route('politicas') }}" class="me-3">Privacy Policy</a>
                    <a href="{{ route('terminos') }}">Terms and Conditions</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Incluir Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Animación para los campos del formulario
        document.addEventListener('DOMContentLoaded', function() {
            const formControls = document.querySelectorAll('.form-control');
            
            formControls.forEach(control => {
                control.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });
                
                control.addEventListener('blur', function() {
                    if (this.value === '') {
                        this.parentElement.classList.remove('focused');
                    }
                });
            });
            
            // Validación en tiempo real
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('password_confirmation');
            
            function validatePassword() {
                if (password.value !== confirmPassword.value) {
                    confirmPassword.setCustomValidity("Passwords don't match");
                } else {
                    confirmPassword.setCustomValidity('');
                }
            }
            
            password.addEventListener('change', validatePassword);
            confirmPassword.addEventListener('keyup', validatePassword);
        });
    </script>
</body>
</html>