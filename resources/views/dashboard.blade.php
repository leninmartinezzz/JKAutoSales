<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - JK Auto Sales Company</title>
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
        
        .user-menu {
            color: white;
            display: flex;
            align-items: center;
        }

        .image-preview-container {
            border: 2px dashed #ddd;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
            background-color: #f9f9f9;
            min-height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        
        .image-preview {
            max-width: 100%;
            max-height: 300px;
            margin-bottom: 15px;
        }
        
        .upload-icon {
            font-size: 3rem;
            color: #ccc;
            margin-bottom: 15px;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--secondary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: var(--primary-color);
            margin-right: 10px;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: #0f2a46;
            border-color: #0f2a46;
        }
        
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        
        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #212529;
        }
        
        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #d39e00;
            color: #212529;
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

        
        .footer-logo img{
            height: 200px;
            margin-bottom: 5px;
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
        
        .user-dashboard {
            background: linear-gradient(135deg, var(--primary-color), #2c5282);
            color: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        
        .dashboard-welcome {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
        
        .dashboard-stats {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }
        
        .dashboard-stat {
            text-align: center;
        }
        
        .stat-value {
            font-size: 2rem;
            font-weight: bold;
            color: var(--secondary-color);
        }
        
        .stat-label {
            font-size: 0.9rem;
            opacity: 0.9;
        }
        
        .recent-activity {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        
        .activity-item {
            display: flex;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }
        
        .activity-item:last-child {
            border-bottom: none;
        }
        
        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }
        
        .vehicle-actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
        
        .vehicle-actions .btn {
            flex: 1;
        }

        .no-vehicles {
            text-align: center;
            padding: 60px 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            margin: 30px 0;
        }

        .no-vehicles i {
            font-size: 4rem;
            color: #6c757d;
            margin-bottom: 20px;
        }

        .vehicle-details .specs-list {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
        }

        .vehicle-details .price-badge {
            background: linear-gradient(135deg, #28a745, #20c997);
            min-width: 120px;
        }

        .vehicle-details .features-list {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin-top: 15px;
        }

        .vehicle-details .alert {
            border-radius: 8px;
        }

        .modal-content {
            border: none;
            z-index: 9999;  
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .modal-header {
            border-radius: 15px 15px 0 0;
        }
        
        /* Estilos para el modal de edición */
        .edit-modal .form-label {
            font-weight: 600;
            color: var(--primary-color);
        }
        
        .edit-modal .form-control {
            border-radius: 8px;
            padding: 10px 15px;
        }
        
        .edit-modal .form-select {
            border-radius: 8px;
            padding: 10px 15px;
        }
        
        .edit-modal .btn-save {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
            padding: 10px 20px;
            font-weight: 600;
        }
        
        .edit-modal .btn-save:hover {
            background-color: #0f2a46;
            border-color: #0f2a46;
        }
        
        .edit-modal .btn-cancel {
            background-color: #6c757d;
            border-color: #6c757d;
            color: white;
            padding: 10px 20px;
            font-weight: 600;
        }
        
        .edit-modal .btn-cancel:hover {
            background-color: #5a6268;
            border-color: #5a6268;
        }
        
        .edit-modal .form-section {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .edit-modal .form-section-title {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 15px;
            border-bottom: 2px solid var(--secondary-color);
            padding-bottom: 8px;
        }
        
        .edit-modal .image-preview {
            max-width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin-top: 10px;
            border: 2px dashed #dee2e6;
        }

        .current-image-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .current-image-label {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 10px;
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
                        <a class="nav-link active" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Vehicles</a>
                    </li>
                    @if(Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ordenes.index') }}">Sell</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ordenes.index') }}">My Purchases</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
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
                            <li><a class="dropdown-item" href="{{ route('profile.editting') }}"><i class="fas fa-user me-2"></i>My Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                            @if(Auth::user()->role == 'admin')
                            <li><a class="dropdown-item" href="{{ route('vehiculos.index') }}"><i class="fas fa-car me-2"></i>Add Vehicle</a></li>
                            <li><a class="dropdown-item" href="{{ route('ordenes.index') }}"><i class="fas fa-shopping-cart me-2"></i>Orders</a></li>
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

    <!-- Dashboard Welcome Section -->
    <div class="container mt-4">
        <div class="user-dashboard">
            <h1 class="dashboard-welcome">Welcome back, {{ Auth::user()->name }}!</h1>
            <p class="mb-0">We're delighted to have you back at JK Auto Sales Company</p>
            
            <div class="dashboard-stats">
                <div class="dashboard-stat">
                    <div class="stat-value">{{ $vehiculos->count() }}</div>
                    <div class="stat-label">Vehicles in Inventory</div>
                </div>
                <div class="dashboard-stat">
                    <div class="stat-value">{{ $vehiculos->where('estado', 'Nuevo')->count() }}</div>
                    <div class="stat-label">New Vehicles</div>
                </div>
                <div class="dashboard-stat">
                    <div class="stat-value">{{ $vehiculos->where('estado', 'Usado')->count() }}</div>
                    <div class="stat-label">Used Vehicles</div>
                </div>
            </div>
        </div>
        
        <!-- Recent Activity -->
        <div class="recent-activity">
            <h3 class="section-title">Recent Activity</h3>
            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-user-check"></i>
                </div>
                <div>
                    <strong>Session started</strong>
                    <p class="mb-0 text-muted">You have successfully logged in</p>
                    <small class="text-muted">A few moments ago</small>
                </div>
            </div>
            @if($vehiculos->count() > 0)
            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-car"></i>
                </div>
                <div>
                    <strong>Vehicle added</strong>
                    <p class="mb-0 text-muted">{{ $vehiculos->first()->marca }} {{ $vehiculos->first()->modelo }} was added to inventory</p>
                    <small class="text-muted">{{ $vehiculos->first()->created_at->diffForHumans() }}</small>
                </div>
            </div>
            @endif
            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-star"></i>
                </div>
                <div>
                    <strong>Inventory updated</strong>
                    <p class="mb-0 text-muted">Available vehicles have been updated</p>
                    <small class="text-muted">Today</small>
                </div>
            </div>
        </div>
    </div>

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
                        @foreach($vehiculos->pluck('marca')->unique() as $marca)
                            <option value="{{ $marca }}">{{ $marca }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <select class="form-select">
                        <option selected>Model</option>
                        @foreach($vehiculos->pluck('tipo')->unique() as $tipo)
                            <option value="{{ $tipo }}">{{ $tipo }}</option>
                        @endforeach
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

    <!-- Featured Vehicles -->
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
                            <button type="button" class="btn btn-primary" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#vehicleDetailsModal"
                                    onclick="loadVehicleDetails({{ $vehiculo->id }})">
                                <i class="fas fa-info-circle me-1"></i>Details
                            </button>
                            <a href="#" class="btn btn-success" 
                               data-bs-toggle="modal" 
                               data-bs-target="#purchaseModal" 
                               data-vehicle="{{ $vehiculo->marca }} {{ $vehiculo->modelo }}"
                               data-vehicle-id="{{ $vehiculo->id }}">
                                <i class="fas fa-shopping-cart me-1"></i>Purchase
                            </a>
                            <!-- Botón de Editar -->
                            @if(Auth::user()->role == 'admin')
                            <button type="button" class="btn btn-warning" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editVehicleModal"
                                    onclick="loadVehicleData({{ $vehiculo->id }})">
                                <i class="fas fa-edit me-1"></i>Edit
                            </button>
                            @endif
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
            <a href="{{ route('vehiculos.index') }}" class="btn btn-primary mt-3">
                @if(Auth::user()->role == 'admin')
                <i class="fas fa-plus me-2"></i>Add First Vehicle
                @endif
            </a>
        </div>
        @endif
        
        @if($vehiculos->count() > 0)
        <div class="text-center mt-4">
            <a href="#" class="btn btn-outline-primary">View All Vehicles</a>
        </div>
        @endif
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
                        <li class="mb-2"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="mb-2"><a href="{{ route('dashboard') }}">Vehicles</a></li>
                         @if(Auth::user()->role == 'admin')
                        <li class="mb-2"><a href="{{ route('vehiculos.create') }}">Sell</a></li>
                        <li class="mb-2"><a href="{{ route('ordenes.mis-ordenes') }}">My Purchases</a></li>
                        @endif
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
                    <a href="{{ route('politicas') }}" class="me-3">Privacy Policy</a>
                    <a href="{{ route('terminos') }}">Terms and Conditions</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Purchase Modal -->
    <div class="modal fade" id="purchaseModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Purchase Process</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p id="modalVehicleInfo">Are you sure you want to purchase this vehicle?</p>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        An advisor will contact you to complete the purchase process.
                    </div>
                    <div id="successMessage" class="alert alert-success d-none">
                        <i class="fas fa-check-circle me-2"></i>
                        <span id="successText"></span>
                    </div>
                    <div id="errorMessage" class="alert alert-danger d-none">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <span id="errorText"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" id="confirmPurchase">
                        <i class="fas fa-shopping-cart me-1"></i>Confirm Purchase
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Vehicle Details Modal -->
    <div class="modal fade" id="vehicleDetailsModal" tabindex="-1" aria-labelledby="vehicleDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="vehicleDetailsModalLabel">
                        <i class="fas fa-car me-2"></i>Vehicle Details
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="vehicleDetailsContent">
                        <!-- Dynamically loaded content -->
                        <div class="text-center py-4">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <p class="mt-2">Loading vehicle details...</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i>Close
                    </button>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="comprarDesdeModal">
                        <i class="fas fa-shopping-cart me-1"></i>Purchase Vehicle
                    </button>
                </div>
            </div>
        </div>
    </div>

<!-- Edit Vehicle Modal -->
<div class="modal fade edit-modal" id="editVehicleModal" tabindex="-1" aria-labelledby="editVehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="editVehicleModalLabel">
                    <i class="fas fa-edit me-2"></i>Edit Vehicle
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editVehicleForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_vehicle_id" name="id">
                    
                    <div class="form-section">
                        <h6 class="form-section-title">Basic Information</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="edit_marca" class="form-label">Brand</label>
                                <select class="form-select" id="edit_marca" name="marca" required>
                                    <option value="" selected disabled>Select a brand</option>
                                    <option value="Toyota">Toyota</option>
                                    <option value="Honda">Honda</option>
                                    <option value="Ford">Ford</option>
                                    <option value="Chevrolet">Chevrolet</option>
                                    <option value="Nissan">Nissan</option>
                                    <option value="BMW">BMW</option>
                                    <option value="Mercedes-Benz">Mercedes-Benz</option>
                                    <option value="Audi">Audi</option>
                                    <option value="Volkswagen">Volkswagen</option>
                                    <option value="Hyundai">Hyundai</option>
                                    <option value="Kia">Kia</option>
                                    <option value="Mazda">Mazda</option>
                                    <option value="Subaru">Subaru</option>
                                    <option value="Lexus">Lexus</option>
                                    <option value="Acura">Acura</option>
                                    <option value="Infiniti">Infiniti</option>
                                    <option value="Volvo">Volvo</option>
                                    <option value="Jeep">Jeep</option>
                                    <option value="Ram">Ram</option>
                                    <option value="GMC">GMC</option>
                                    <option value="Cadillac">Cadillac</option>
                                    <option value="Buick">Buick</option>
                                    <option value="Chrysler">Chrysler</option>
                                    <option value="Dodge">Dodge</option>
                                    <option value="Lincoln">Lincoln</option>
                                    <option value="Mitsubishi">Mitsubishi</option>
                                    <option value="Porsche">Porsche</option>
                                    <option value="Jaguar">Jaguar</option>
                                    <option value="Land Rover">Land Rover</option>
                                    <option value="Mini">Mini</option>
                                    <option value="Fiat">Fiat</option>
                                    <option value="Alfa Romeo">Alfa Romeo</option>
                                    <option value="Maserati">Maserati</option>
                                    <option value="Bentley">Bentley</option>
                                    <option value="Rolls-Royce">Rolls-Royce</option>
                                    <option value="Ferrari">Ferrari</option>
                                    <option value="Lamborghini">Lamborghini</option>
                                    <option value="Aston Martin">Aston Martin</option>
                                    <option value="McLaren">McLaren</option>
                                    <option value="Bugatti">Bugatti</option>
                                    <option value="Lotus">Lotus</option>
                                    <option value="Genesis">Genesis</option>
                                    <option value="Rivian">Rivian</option>
                                    <option value="Lucid">Lucid</option>
                                    <option value="Tesla">Tesla</option>
                                    <option value="Polestar">Polestar</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edit_modelo" class="form-label">Model</label>
                                <input type="text" class="form-control" id="edit_modelo" name="modelo" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="edit_anio" class="form-label">Year</label>
                                <select class="form-select" id="edit_anio" name="anio" required>
                                    <option value="" selected disabled>Select the year</option>
                                    @for($year = date('Y'); $year >= 1990; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edit_precio" class="form-label">Price ($)</label>
                                <input type="number" class="form-control" id="edit_precio" name="precio" min="0" step="0.01" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="edit_tipo" class="form-label">Vehicle Type</label>
                                <select class="form-select" id="edit_tipo" name="tipo" required>
                                    <option value="" selected disabled>Select vehicle type</option>
                                    <option value="Sedán">Sedan</option>
                                    <option value="SUV">SUV</option>
                                    <option value="Pickup">Pickup</option>
                                    <option value="Hatchback">Hatchback</option>
                                    <option value="Coupe">Coupe</option>
                                    <option value="Convertible">Convertible</option>
                                    <option value="Minivan">Minivan</option>
                                    <option value="Van">Van</option>
                                    <option value="Deportivo">Sports</option>
                                    <option value="Lujo">Luxury</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edit_descripcion" class="form-label">Description</label>
                                <textarea class="form-control" id="edit_descripcion" name="descripcion" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h6 class="form-section-title">Financing Information</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="edit_inicial" class="form-label">Initial Payment ($)</label>
                                <input type="number" class="form-control" id="edit_inicial" name="Inicial" min="0" step="1" required>
                                <div class="form-text">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Must be ≤ 60% of the vehicle price
                                </div>
                                <div id="inicial-error" class="text-danger small d-none">
                                    <i class="fas fa-exclamation-triangle me-1"></i>
                                    Initial payment cannot exceed 60% of the vehicle price
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edit_cuotas" class="form-label">Installments</label>
                                <input type="number" class="form-control" id="edit_cuotas" name="Cuotas_max" min="1" max="84" step="1" required>
                                <div class="form-text">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Number of monthly payments (1-84 months)
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="financing-preview alert alert-info">
                                    <h6 class="mb-2"><i class="fas fa-calculator me-2"></i>Financing Preview</h6>
                                    <div class="row small">
                                        <div class="col-md-4">
                                            <strong>Vehicle Price:</strong> 
                                            <span id="preview-precio">$0</span>
                                        </div>
                                        <div class="col-md-4">
                                            <strong>Initial Payment:</strong> 
                                            <span id="preview-inicial">$0</span>
                                            <span id="preview-porcentaje" class="badge bg-success ms-1">0%</span>
                                        </div>
                                        <div class="col-md-4">
                                            <strong>Monthly Payment:</strong> 
                                            <span id="preview-mensual">$0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <h6 class="form-section-title">Technical Specifications</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="edit_kilometraje" class="form-label">Mileage (Mi)</label>
                                <input type="number" class="form-control" id="edit_kilometraje" name="kilometraje" min="0" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edit_combustible" class="form-label">Fuel Type</label>
                                <select class="form-select" id="edit_combustible" name="combustible" required>
                                    <option value="Gasoline">Gasoline</option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="Electric">Electric</option>
                                    <option value="Hybrid">Hybrid</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="edit_transmision" class="form-label">Transmission</label>
                                <select class="form-select" id="edit_transmision" name="transmision" required>
                                    <option value="Manual">Manual</option>
                                    <option value="Automatic">Automatic</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edit_color" class="form-label">Color</label>
                                <input type="text" class="form-control" id="edit_color" name="color" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <h6 class="form-section-title">Vehicle Status</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="edit_estado" class="form-label">Condition</label>
                                <select class="form-select" id="edit_estado" name="estado" required>
                                    <option value="New">New</option>
                                    <option value="Used">Used</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edit_disponible" class="form-label">Availability</label>
                                <select class="form-select" id="edit_disponible" name="disponible" required>
                                    <option value="1">Available</option>
                                    <option value="0">Not Available</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <h6 class="form-section-title">Vehicle Image</h6>
                        
                        <!-- Current Image -->
                        <div class="current-image-container mb-4">
                            <div class="current-image-label mb-2">
                                <i class="fas fa-image me-2"></i>Current Image
                            </div>
                            <img id="currentImagePreview" class="image-preview" src="" alt="Current vehicle image" style="max-height: 200px; width: auto;">
                            <div class="mt-2 text-muted small">
                                <i class="fas fa-info-circle me-1"></i>This is the current vehicle image
                            </div>
                        </div>
                        
                        <!-- New Image Upload -->
                        <div class="image-preview-container">
                            <i class="fas fa-cloud-upload-alt upload-icon"></i>
                            <p class="mb-2">Drag and drop new vehicle image here or click to select</p>
                            <img id="newImagePreview" class="image-preview d-none" src="" alt="New image preview">
                            <input type="file" class="form-control d-none" id="edit_imagen" name="imagen" accept="image/*">
                            <button type="button" class="btn btn-outline-primary mt-2" onclick="document.getElementById('edit_imagen').click()">
                                <i class="fas fa-folder-open me-2"></i>Select New Image
                            </button>
                        </div>
                        <div class="mt-2">
                            <small class="text-muted">
                                <i class="fas fa-exclamation-circle me-1"></i>
                                Allowed formats: JPG, PNG, GIF. Maximum size: 5MB.
                            </small>
                        </div>
                    </div>
                    
                    <div id="editSuccessMessage" class="alert alert-success d-none">
                        <i class="fas fa-check-circle me-2"></i>
                        <span id="editSuccessText"></span>
                    </div>
                    <div id="editErrorMessage" class="alert alert-danger d-none">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <span id="editErrorText"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Cancel
                </button>
                <button type="button" class="btn btn-save" id="saveVehicleChanges">
                    <i class="fas fa-save me-1"></i>Save Changes
                </button>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Global variables
        let currentVehicleId = null;
        let currentVehicleName = null;

        // Function to load vehicle details
        function loadVehicleDetails(vehicleId) {
            // Show loading spinner
            document.getElementById('vehicleDetailsContent').innerHTML = `
                <div class="text-center py-4">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-2">Loading vehicle details...</p>
                </div>
            `;

            // Make AJAX request
            fetch(`/vehiculos/${vehicleId}/details`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error loading details');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        displayVehicleDetails(data.vehiculo);
                        // Configure purchase button
                        document.getElementById('comprarDesdeModal').onclick = function() {
                            const purchaseModal = new bootstrap.Modal(document.getElementById('purchaseModal'));
                            purchaseModal.show();
                            document.querySelector('#purchaseModal [name="vehicle_id"]').value = vehicleId;
                        };
                    } else {
                        showError('Error loading vehicle details');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showError('Error loading vehicle details');
                });
        }

        // Function to display vehicle details (without image)
        function displayVehicleDetails(vehiculo) {
            const content = `
                <div class="vehicle-details">
                    <!-- Header with price -->
                    <div class="d-flex justify-content-between align-items-start mb-4">
                        <div>
                            <h4 class="text-primary mb-1">${vehiculo.marca} ${vehiculo.modelo}</h4>
                            <h5 class="text-muted">${vehiculo.anio}</h5>
                        </div>
                        <div class="price-badge bg-success text-white p-3 text-center rounded">
                            <h4 class="mb-0">$${vehiculo.precio.toLocaleString()}</h4>
                            <small>Final Price</small>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <p class="lead">${vehiculo.descripcion}</p>
                    </div>
                    
                    <!-- Main specifications -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="border-bottom pb-2 mb-3">Technical Specifications</h6>
                            <div class="specs-list">
                                <div class="d-flex justify-content-between py-2 border-bottom">
                                    <strong><i class="fas fa-tachometer-alt text-primary me-2"></i>Mileage:</strong>
                                    <span class="text-muted">${vehiculo.kilometraje.toLocaleString()} Mi</span>
                                </div>
                                <div class="d-flex justify-content-between py-2 border-bottom">
                                    <strong><i class="fas fa-gas-pump text-primary me-2"></i>Fuel:</strong>
                                    <span class="text-muted">${vehiculo.combustible}</span>
                                </div>
                                <div class="d-flex justify-content-between py-2 border-bottom">
                                    <strong><i class="fas fa-cogs text-primary me-2"></i>Transmission:</strong>
                                    <span class="text-muted">${vehiculo.transmision}</span>
                                </div>
                                <div class="d-flex justify-content-between py-2 border-bottom">
                                    <strong><i class="fas fa-palette text-primary me-2"></i>Color:</strong>
                                    <span class="text-muted">${vehiculo.color}</span>
                                </div>
                                <div class="d-flex justify-content-between py-2 border-bottom">
                                    <strong><i class="fas fa-tag text-primary me-2"></i>Condition:</strong>
                                    <span class="badge bg-success">${vehiculo.estado}</span>
                                </div>
                                <div class="d-flex justify-content-between py-2">
                                    <strong><i class="fas fa-calendar text-primary me-2"></i>Year:</strong>
                                    <span class="text-muted">${vehiculo.anio}</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Status information -->
                        <div class="col-md-6">
                            <h6 class="border-bottom pb-2 mb-3">Vehicle Status</h6>
                            <div class="status-info">
                                <div class="alert alert-success">
                                    <i class="fas fa-check-circle me-2"></i>
                                    <strong>Available</strong> - Ready for immediate delivery
                                </div>
                                <div class="features-list">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        <span>Complete mechanical inspection</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        <span>Proper documentation</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        <span>Warranty included</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-check text-success me-2"></i>
                                        <span>Maintenance history</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Additional information -->
                    <div class="alert alert-info">
                        <h6><i class="fas fa-info-circle me-2"></i>Additional Information</h6>
                        <p class="mb-0">This vehicle has passed our certification process and is ready to be delivered. Contact us to schedule a test drive.</p>
                    </div>
                </div>
            `;
            
            document.getElementById('vehicleDetailsContent').innerHTML = content;
        }

        // Function to show errors
        function showError(message) {
            document.getElementById('vehicleDetailsContent').innerHTML = `
                <div class="alert alert-danger text-center">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    ${message}
                </div>
            `;
        }

        // Function to load vehicle data for editing
        function loadVehicleData(vehicleId) {
            // Reset modal state
            resetEditModal();
            
            // Show loading state
            document.getElementById('edit_marca').value = 'Loading...';
            document.getElementById('edit_modelo').value = 'Loading...';
            
            // Make AJAX request to get vehicle data
            fetch(`/vehiculos/${vehicleId}/edit`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error loading vehicle data');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        populateEditForm(data.vehiculo);
                    } else {
                        showEditError('Error loading vehicle data');
                    // Reset form values
                        document.getElementById('edit_marca').value = '';
                        document.getElementById('edit_modelo').value = '';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showEditError('Error loading vehicle data');
                    // Reset form values
                    document.getElementById('edit_marca').value = '';
                    document.getElementById('edit_modelo').value = '';
                });
        }

            // Validación en tiempo real para el pago inicial
            document.addEventListener('DOMContentLoaded', function() {
                const precioInput = document.getElementById('edit_precio');
                const inicialInput = document.getElementById('edit_inicial');
                const cuotasInput = document.getElementById('edit_cuotas');
                
                if (precioInput && inicialInput && cuotasInput) {
                    // Función para calcular y validar
                    function validarFinanciamiento() {
                        const precio = parseFloat(precioInput.value) || 0;
                        const inicial = parseFloat(inicialInput.value) || 0;
                        const cuotas = parseInt(cuotasInput.value) || 0;
                        
                        // Validar que el pago inicial no exceda el 60%
                        const porcentajeMaximo = 0.6; // 60%
                        const maxInicial = precio * porcentajeMaximo;
                        const errorElement = document.getElementById('inicial-error');
                        
                        if (inicial > maxInicial) {
                            errorElement.classList.remove('d-none');
                            inicialInput.classList.add('is-invalid');
                            return false;
                        } else {
                            errorElement.classList.add('d-none');
                            inicialInput.classList.remove('is-invalid');
                        }
                        
                        // Actualizar preview de financiamiento
                        actualizarPreviewFinanciamiento(precio, inicial, cuotas);
                        
                        return true;
                    }
                    
                    // Función para actualizar el preview
                    function actualizarPreviewFinanciamiento(precio, inicial, cuotas) {
                        const porcentaje = precio > 0 ? (inicial / precio * 100).toFixed(1) : 0;
                        const montoFinanciar = precio - inicial;
                        const mensual = cuotas > 0 ? montoFinanciar / cuotas : 0;
                        
                        document.getElementById('preview-precio').textContent = `$${precio.toLocaleString()}`;
                        document.getElementById('preview-inicial').textContent = `$${inicial.toLocaleString()}`;
                        document.getElementById('preview-porcentaje').textContent = `${porcentaje}%`;
                        document.getElementById('preview-mensual').textContent = `$${mensual.toLocaleString()}`;
                        
                        // Cambiar color del badge según el porcentaje
                        const badge = document.getElementById('preview-porcentaje');
                        if (porcentaje > 60) {
                            badge.className = 'badge bg-danger ms-1';
                        } else if (porcentaje >= 40) {
                            badge.className = 'badge bg-warning ms-1';
                        } else {
                            badge.className = 'badge bg-success ms-1';
                        }
                    }
                    
                    // Event listeners
                    precioInput.addEventListener('input', validarFinanciamiento);
                    inicialInput.addEventListener('input', validarFinanciamiento);
                    cuotasInput.addEventListener('input', validarFinanciamiento);
                    
                    // Validación inicial
                    validarFinanciamiento();
                }
            });

        // Actualizar la función populateEditForm para incluir los nuevos campos
        function populateEditForm(vehiculo) {
            document.getElementById('edit_vehicle_id').value = vehiculo.id;
            document.getElementById('edit_marca').value = vehiculo.marca;
            document.getElementById('edit_modelo').value = vehiculo.modelo;
            document.getElementById('edit_anio').value = vehiculo.anio;
            document.getElementById('edit_precio').value = vehiculo.precio;
            document.getElementById('edit_descripcion').value = vehiculo.descripcion;
            document.getElementById('edit_kilometraje').value = vehiculo.kilometraje;
            document.getElementById('edit_combustible').value = vehiculo.combustible;
            document.getElementById('edit_transmision').value = vehiculo.transmision;
            document.getElementById('edit_color').value = vehiculo.color;
            document.getElementById('edit_estado').value = vehiculo.estado;
            document.getElementById('edit_disponible').value = vehiculo.disponible;
            document.getElementById('edit_tipo').value = vehiculo.tipo;
            
            // NUEVOS CAMPOS
            document.getElementById('edit_inicial').value = vehiculo.Inicial || 0;
            document.getElementById('edit_cuotas').value = vehiculo.Cuotas_max || 1;
            
            // Update current image preview
            if (vehiculo.imagen) {
                document.getElementById('currentImagePreview').src = vehiculo.imagen;
                document.getElementById('currentImagePreview').style.display = 'block';
            } else {
                document.getElementById('currentImagePreview').style.display = 'none';
            }
            
            // Update modal title
            document.getElementById('editVehicleModalLabel').innerHTML = `<i class="fas fa-edit me-2"></i>Edit ${vehiculo.marca} ${vehiculo.modelo}`;
            
            // Trigger validación de financiamiento
            setTimeout(() => {
                const event = new Event('input');
                document.getElementById('edit_precio').dispatchEvent(event);
            }, 100);
        }
        // Function to reset the edit modal
        function resetEditModal() {
            document.getElementById('editVehicleForm').reset();
            document.getElementById('editSuccessMessage').classList.add('d-none');
            document.getElementById('editErrorMessage').classList.add('d-none');
            document.getElementById('currentImagePreview').style.display = 'none';
            document.getElementById('newImagePreview').classList.add('d-none');
        }

        // Function to show edit success message
        function showEditSuccess(message) {
            document.getElementById('editSuccessText').textContent = message;
            document.getElementById('editSuccessMessage').classList.remove('d-none');
            document.getElementById('editErrorMessage').classList.add('d-none');
        }

        // Function to show edit error message
        function showEditError(message) {
            document.getElementById('editErrorText').textContent = message;
            document.getElementById('editErrorMessage').classList.remove('d-none');
            document.getElementById('editSuccessMessage').classList.add('d-none');
        }

        // Script for smooth navigation
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth navigation
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

            // Script for purchase button
            document.querySelectorAll('.btn-success[data-bs-toggle="modal"]').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    currentVehicleId = this.getAttribute('data-vehicle-id');
                    currentVehicleName = this.getAttribute('data-vehicle');
                    const modal = new bootstrap.Modal(document.getElementById('purchaseModal'));
                    
                    // Reset modal messages and state
                    resetModalState();
                    
                    // Update modal with vehicle information
                    document.querySelector('#purchaseModal .modal-title').textContent = `Purchase: ${currentVehicleName}`;
                    document.getElementById('modalVehicleInfo').textContent = `Are you sure you want to purchase ${currentVehicleName}?`;
                    
                    modal.show();
                });
            });

            // Script to confirm purchase
            document.getElementById('confirmPurchase').addEventListener('click', function() {
                confirmPurchase();
            });

            // Script to save vehicle changes
            document.getElementById('saveVehicleChanges').addEventListener('click', function() {
                saveVehicleChanges();
            });

            // Update new image preview when image is selected
            document.getElementById('edit_imagen').addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const preview = document.getElementById('newImagePreview');
                        preview.src = e.target.result;
                        preview.classList.remove('d-none');
                    }
                    reader.readAsDataURL(file);
                }
            });

            // Update statistics in real time
            animateStatistics();

            // Close modal and reset when hidden
            document.getElementById('purchaseModal').addEventListener('hidden.bs.modal', function() {
                resetModalState();
            });

            // Reset edit modal when hidden
            document.getElementById('editVehicleModal').addEventListener('hidden.bs.modal', function() {
                resetEditModal();
            });
        });

        // Function to save vehicle changes
        function saveVehicleChanges() {
            const button = document.getElementById('saveVehicleChanges');
            button.disabled = true;
            button.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Saving...';

            // Get form data
            const formData = new FormData(document.getElementById('editVehicleForm'));
            const vehicleId = document.getElementById('edit_vehicle_id').value;

            // Send AJAX request to update vehicle
            fetch(`/vehiculos/${vehicleId}`, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            })
            .then(response => {
                // Check if response is valid JSON
                const contentType = response.headers.get('content-type');
                if (!contentType || !contentType.includes('application/json')) {
                    return response.text().then(text => {
                        throw new Error('Server response is not valid JSON');
                    });
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    showEditSuccess(data.message);
                    // Reset button state
                    button.disabled = false;
                    button.innerHTML = '<i class="fas fa-save me-1"></i>Save Changes';
                    
                    // Close modal after 2 seconds and reload page
                    setTimeout(() => {
                        const modal = bootstrap.Modal.getInstance(document.getElementById('editVehicleModal'));
                        modal.hide();
                        location.reload();
                    }, 2000);
                } else {
                    throw new Error(data.message || 'Unknown error updating vehicle');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showEditError(error.message || 'Error updating vehicle. Please try again.');
                // Reset button state
                button.disabled = false;
                button.innerHTML = '<i class="fas fa-save me-1"></i>Save Changes';
            });
        }

        // Function to confirm purchase
        function confirmPurchase() {
            const button = document.getElementById('confirmPurchase');
            button.disabled = true;
            button.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Processing...';

            // Create FormData to send request
            const formData = new FormData();
            formData.append('vehiculo_id', currentVehicleId);
            formData.append('_token', '{{ csrf_token() }}');

            // Send AJAX request
            fetch('{{ route("ordenes.store") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                // Check if response is valid JSON
                const contentType = response.headers.get('content-type');
                if (!contentType || !contentType.includes('application/json')) {
                    return response.text().then(text => {
                        throw new Error('Server response is not valid JSON');
                    });
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    showSuccessMessage(data.message);
                } else {
                    throw new Error(data.message || 'Unknown error processing purchase');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showErrorMessage(error.message || 'Error processing purchase. Please try again.');
                resetPurchaseButton();
            });
        }

        function showSuccessMessage(message) {
            document.getElementById('successText').textContent = message;
            document.getElementById('successMessage').classList.remove('d-none');
            document.getElementById('errorMessage').classList.add('d-none');
            
            // Hide elements and show only success
            document.querySelector('.modal-footer').classList.add('d-none');
            document.getElementById('modalVehicleInfo').classList.add('d-none');
            document.querySelector('.alert-info').classList.add('d-none');
            
            setTimeout(() => {
                const modalElement = document.getElementById('purchaseModal');
                const modalInstance = bootstrap.Modal.getInstance(modalElement);
                if (modalInstance) {
                    modalInstance.hide();
                }

                // 🔄 Remove backdrop(s)
                document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());

                // 🔓 Restore body scroll and styles
                document.body.classList.remove('modal-open');
                document.body.style.overflow = 'auto';
                document.body.style.position = '';
                document.body.style.top = '';
                document.body.style.left = '';
                document.body.style.right = '';
                document.body.style.height = '';
                document.body.style.paddingRight = '';

                // 🧠 Ensure focus returns to a visible element
                const triggerButton = document.getElementById('openModalButton');
                if (triggerButton) {
                    triggerButton.focus();
                } else {
                    document.body.focus();
                }

                // 🔁 Reload page
                location.reload();
            }, 3000);
        }

        // Function to show error message
        function showErrorMessage(message) {
            document.getElementById('errorText').textContent = message;
            document.getElementById('errorMessage').classList.remove('d-none');
            document.getElementById('successMessage').classList.add('d-none');
        }

        // Function to reset purchase button
        function resetPurchaseButton() {
            const button = document.getElementById('confirmPurchase');
            button.disabled = false;
            button.innerHTML = '<i class="fas fa-shopping-cart me-1"></i>Confirm Purchase';
        }

        // Function to reset modal state
        function resetModalState() {
            // Show all elements again
            document.querySelector('.modal-footer').classList.remove('d-none');
            document.getElementById('modalVehicleInfo').classList.remove('d-none');
            document.querySelector('.alert-info').classList.remove('d-none');
            
            // Hide messages
            document.getElementById('successMessage').classList.add('d-none');
            document.getElementById('errorMessage').classList.add('d-none');
            
            // Reset button
            resetPurchaseButton();
        }

        // Function to animate statistics
        function animateStatistics() {
            const statNumbers = document.querySelectorAll('.stat-number');
            statNumbers.forEach(stat => {
                const originalText = stat.textContent;
                let target;
                
                // Convert text to number
                if (originalText.includes('+')) {
                    target = parseInt(originalText.replace('+', '')) || 0;
                } else if (originalText.includes('%')) {
                    target = parseInt(originalText.replace('%', '')) || 0;
                } else {
                    target = parseInt(originalText.replace(/,/g, '')) || 0;
                }
                
                let current = 0;
                const increment = target / 50; // Smoother
                const duration = 1500; // 1.5 seconds
                const steps = 50;
                const stepTime = duration / steps;

                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                        // Restore original text with symbols
                        if (originalText.includes('+')) {
                            stat.textContent = target.toLocaleString() + '+';
                        } else if (originalText.includes('%')) {
                            stat.textContent = target + '%';
                        } else {
                            stat.textContent = target.toLocaleString();
                        }
                    } else {
                        // Show whole number during animation
                        if (originalText.includes('%')) {
                            stat.textContent = Math.floor(current) + '%';
                        } else {
                            stat.textContent = Math.floor(current).toLocaleString();
                        }
                    }
                }, stepTime);
            });
        }

        // Handle image errors
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.vehicle-img').forEach(img => {
                img.addEventListener('error', function() {
                    this.src = 'https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80';
                });
            });
        });

        // Improve search experience
        document.querySelectorAll('.form-select').forEach(select => {
            select.addEventListener('change', function() {
                // You can add real-time filtering functionality here
                console.log('Filter changed:', this.value);
            });
        });

        // Improved hover effects for cards
        document.querySelectorAll('.vehicle-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px)';
                this.style.boxShadow = '0 15px 30px rgba(0,0,0,0.15)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(-5px)';
                this.style.boxShadow = '0 10px 25px rgba(0,0,0,0.15)';
            });
        });
    </script>
</body>
</html>