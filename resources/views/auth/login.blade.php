<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - JK Auto Sales Company</title>
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

        .logo-container img{
            height: 90px;
            margin-bottom: 2px;
        }
        
    .login-logo-container img{
        height: 130px;
        margin-bottom: 5px;
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
        
        /* Login Container Styles */
        .login-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            overflow: hidden;
            max-width: 450px;
            width: 100%;
            margin: auto;
        }
        
        .login-header {
            background-color: var(--primary-color);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .login-logo-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .login-logo-top {
            font-weight: bold;
            font-size: 2.2rem;
            line-height: 1;
            color: white;
        }
        
        .login-logo-middle {
            font-weight: bold;
            font-size: 1.5rem;
            line-height: 1;
            color: var(--secondary-color);
            margin: 5px 0;
        }
        
        .login-logo-bottom {
            font-weight: bold;
            font-size: 1.1rem;
            line-height: 1;
            color: white;
        }
        
        .login-body {
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
        
        .btn-login {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-login:hover {
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
        
        .forgot-password {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .forgot-password:hover {
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
                <div class="col-md-6 col-lg-5">
                    <div class="login-container">
                        <div class="login-header">
                            <div class="login-logo-container">
                                <img src="{{ asset('img/logo.png') }}" alt="Logo">  
                            </div>
                            <h1 class="h4 mb-0">Login</h1>
                            <p class="mb-0">Access your JK Auto Sales account</p>
                        </div>
                        
                        <div class="login-body">
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Email Address -->
                                <div class="mb-3">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="your@email.com" />
                                    <x-input-error :messages="$errors->get('email')" class="input-error" />
                                </div>

                                <!-- Password -->
                                <div class="mb-3">
                                    <x-input-label for="password" :value="__('Password')" />
                                    <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="Your password" />
                                    <x-input-error :messages="$errors->get('password')" class="input-error" />
                                </div>

                                <!-- Remember Me -->
                                <div class="mb-3 form-check">
                                    <label for="remember_me" class="form-check-label">
                                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                        <span class="ms-2">{{ __('Remember me') }}</span>
                                    </label>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    @if (Route::has('password.request'))
                                        <a class="forgot-password" href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
                                    
                                    <x-primary-button class="btn-login ms-3">
                                        {{ __('Log in') }}
                                    </x-primary-button>
                                </div>
                            </form>
                            
                            <div class="divider">
                                <span class="divider-text">Don't have an account?</span>
                            </div>
                            
                            <div class="text-center">
                                <a href="{{ route('register') }}" class="btn btn-outline-primary w-100">
                                    Create New Account
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
</body>
</html>