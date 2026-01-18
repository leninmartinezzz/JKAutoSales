<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - JK Auto Sales Company</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">
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
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url({{ asset('img/Fondo.jpeg') }});
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        /* Navbar Styles */
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
        
        /* Register Container Styles */
        .register-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            overflow: hidden;
            max-width: 500px;
            width: 100%;
            margin: auto;
        }

        .logo-container img{
            height: 90px;
            margin-bottom: 2px;
        }

    .register-logo-container img{
        height: 130px;
        margin-bottom: 5px;
    }
        
        .register-header {
            background-color: var(--primary-color);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .register-logo-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .register-logo-top {
            font-weight: bold;
            font-size: 2.2rem;
            line-height: 1;
            color: white;
        }
        
        .register-logo-middle {
            font-weight: bold;
            font-size: 1.5rem;
            line-height: 1;
            color: var(--secondary-color);
            margin: 5px 0;
        }
        
        .register-logo-bottom {
            font-weight: bold;
            font-size: 1.1rem;
            line-height: 1;
            color: white;
        }
        
        .register-body {
            padding: 30px;
        }
        
        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #ddd;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(26, 58, 95, 0.25);
        }
        
        .btn-register {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-register:hover {
            background-color: #0f2a46;
            border-color: #0f2a46;
        }
        
        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 8px;
        }
        
        .login-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .login-link:hover {
            color: var(--secondary-color);
        }
        
        .alert {
            border-radius: 8px;
            padding: 12px 15px;
        }
        
        .input-error {
            color: var(--accent-color);
            font-size: 0.875rem;
            margin-top: 5px;
        }
        
        .back-to-home {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            transition: color 0.3s;
        }
        
        .back-to-home:hover {
            color: var(--secondary-color);
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }
        
        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #ddd;
        }
        
        .divider-text {
            padding: 0 10px;
            color: #6c757d;
            font-size: 0.875rem;
        }
        
        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            padding: 2rem 0;
        }
        
        .password-strength {
            margin-top: 5px;
            font-size: 0.875rem;
        }
        
        .strength-weak { color: var(--accent-color); }
        .strength-medium { color: #ffa500; }
        .strength-strong { color: #28a745; }
    </style>
</head>
<body>
       <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">
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
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Vehicles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Buy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <button class="btn btn-outline-light me-2" onclick="window.location.href='{{ route('login') }}'">
                        <i class="fas fa-sign-in-alt me-1"></i> Login
                    </button>
                    <button class="btn btn-warning" onclick="window.location.href='{{ route('register') }}'">
                        <i class="fas fa-user-plus me-1"></i> Register
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="register-container">
                        <div class="register-header">
                            <div class="register-logo-container">
                                <img src="{{ asset('img/logo.png') }}" alt="Logo">  
                            </div>
                            <h1 class="h4 mb-0">Create Account</h1>
                            <p class="mb-0">Join JK Auto Sales Company</p>
                        </div>
                        
                        <div class="register-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <!-- Name -->
                                <div class="mb-3">
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Your full name" />
                                    <x-input-error :messages="$errors->get('name')" class="input-error" />
                                </div>

                                <!-- Email Address -->
                                <div class="mb-3">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="your@email.com" />
                                    <x-input-error :messages="$errors->get('email')" class="input-error" />
                                </div>

                                <!-- Password -->
                                <div class="mb-3">
                                    <x-input-label for="password" :value="__('Password')" />
                                    <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" placeholder="Create a strong password" />
                                    <x-input-error :messages="$errors->get('password')" class="input-error" />
                                    <div class="password-strength" id="passwordStrength"></div>
                                </div>

                                <!-- Confirm Password -->
                                <div class="mb-4">
                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                    <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password" />
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="input-error" />
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <a class="login-link" href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a>
                                    
                                    <x-primary-button class="btn-register ms-4">
                                        {{ __('Register') }}
                                    </x-primary-button>
                                </div>
                            </form>
                            
                            <div class="divider">
                                <span class="divider-text">Already have an account?</span>
                            </div>
                            
                            <div class="text-center">
                                <a href="{{ route('login') }}" class="btn btn-outline-primary w-100">
                                    Login
                                </a>
                            </div>
                            
                            <div class="text-center mt-3">
                                <a href="/" class="back-to-home">
                                    <i class="fas fa-arrow-left me-2"></i> Back to Home
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Script to show password strength
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthElement = document.getElementById('passwordStrength');
            let strength = '';
            let strengthClass = '';
            
            if (password.length === 0) {
                strength = '';
            } else if (password.length < 6) {
                strength = 'Weak password';
                strengthClass = 'strength-weak';
            } else if (password.length < 10) {
                strength = 'Medium password';
                strengthClass = 'strength-medium';
            } else {
                strength = 'Strong password';
                strengthClass = 'strength-strong';
            }
            
            strengthElement.textContent = strength;
            strengthElement.className = 'password-strength ' + strengthClass;
        });

        // Password confirmation validation
        document.getElementById('password_confirmation').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmPassword = this.value;
            
            if (confirmPassword && password !== confirmPassword) {
                this.style.borderColor = 'var(--accent-color)';
            } else {
                this.style.borderColor = '';
            }
        });

        // Smooth navigation for internal links
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