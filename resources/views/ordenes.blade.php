<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Purchase Orders - JK Auto Sales Company</title>
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
            background-color: #f8f9fa;
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
        
        /* Specific styles for orders view */
        .orders-header {
            background: linear-gradient(135deg, var(--primary-color), #2c5282);
            color: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        
        .orders-table-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            overflow: hidden;
            margin-bottom: 30px;
        }
        
        .table-header {
            background-color: var(--primary-color);
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .table-responsive {
            max-height: 600px;
            overflow-y: auto;
        }
        
        .table thead th {
            background-color: #f8f9fa;
            position: sticky;
            top: 0;
            z-index: 10;
            border-bottom: 2px solid #dee2e6;
            font-size: 0.85rem;
            padding: 12px 8px;
            white-space: nowrap;
        }
        
        .table tbody td {
            padding: 10px 8px;
            font-size: 0.85rem;
            vertical-align: middle;
        }
        
        .table tbody tr:hover {
            background-color: rgba(26, 58, 95, 0.05);
        }
        
        .badge-pendiente {
            background-color: #f39c12;
            color: white;
            font-size: 0.75rem;
        }
        
        .badge-completado {
            background-color: #28a745;
            color: white;
            font-size: 0.75rem;
        }
        
        .badge-cancelado {
            background-color: #e74c3c;
            color: white;
            font-size: 0.75rem;
        }
        
        .action-btn {
            padding: 4px 8px;
            border-radius: 4px;
            margin: 0 2px;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
            font-size: 0.75rem;
            white-space: nowrap;
        }
        
        .confirm-btn {
            background-color: #28a745;
            color: white;
        }
        
        .reject-btn {
            background-color: #e74c3c;
            color: white;
        }
        
        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        
        .search-container {
            background-color: white;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }
        
        .stats-container {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }
        
        .stat-card {
            background: white;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            flex: 1;
            margin: 0 10px;
            transition: transform 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-value {
            font-size: 24px;
            font-weight: bold;
            color: var(--secondary-color);
        }
        
        .stat-label {
            font-size: 14px;
            color: #7f8c8d;
        }
        
        .filters-container {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        
        .filter-item {
            flex: 1;
            min-width: 200px;
        }

        /* Styles for specific columns */
        .email-column {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        
        .client-info {
            min-width: 120px;
        }
        
        .vehicle-info {
            min-width: 150px;
        }
        
        .status-column {
            width: 100px;
        }
        
        .actions-column {
            width: 140px;
            min-width: 140px;
        }
        
        .date-column {
            width: 120px;
            font-size: 0.8rem;
        }

        /* New styles for payment information */
        .payment-info {
            font-size: 0.75rem;
            margin-top: 2px;
        }
        
        .payment-inicial {
            color: #28a745;
            font-weight: bold;
        }
        
        .payment-cuota {
            color: #007bff;
            font-weight: bold;
        }
        
        .payment-completed {
            color: #6c757d;
            font-style: italic;
        }

        @media (max-width: 1200px) {
            .table thead th,
            .table tbody td {
                font-size: 0.8rem;
                padding: 8px 6px;
            }
            
            .email-column {
                max-width: 150px;
            }
        }
        
        @media (max-width: 992px) {
            .table-responsive {
                font-size: 0.8rem;
            }
            
            .email-column {
                max-width: 120px;
            }
            
            .actions-column {
                width: 120px;
                min-width: 120px;
            }
        }
        
        @media (max-width: 768px) {
            .filters-container {
                flex-direction: column;
            }
            
            .filter-item {
                min-width: 100%;
            }
            
            .stats-container {
                flex-direction: column;
            }
            
            .stat-card {
                margin: 5px 0;
            }
            
            .navbar-collapse {
                margin-top: 10px;
            }
            
            .action-buttons {
                display: flex;
                flex-direction: column;
                gap: 5px;
            }
            
            .action-btn {
                margin: 2px 0;
                font-size: 0.7rem;
                padding: 3px 6px;
            }
            
            .table thead th,
            .table tbody td {
                padding: 6px 4px;
                font-size: 0.75rem;
            }
            
            .email-column {
                max-width: 100px;
            }
            
            .client-info {
                min-width: 100px;
            }
        }
        
        @media (max-width: 576px) {
            .orders-header {
                padding: 20px 15px;
            }
            
            .dashboard-stat {
                padding: 0 10px;
            }
            
            .stat-value {
                font-size: 1.2rem;
            }
            
            .table-responsive {
                font-size: 0.7rem;
            }
            
            .email-column {
                display: none;
            }
        }
        
        /* Tooltip for long email */
        .email-tooltip {
            position: relative;
            cursor: help;
        }
        
        .email-tooltip:hover::after {
            content: attr(data-email);
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            background: #333;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.8rem;
            white-space: nowrap;
            z-index: 1000;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <div class="logo-container">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" >
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Vehicles</a>
                    </li>
                    @if(Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ordenes.index') }}">Sell</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('ordenes.index') }}">My Purchases</a>
                    </li>
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
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>My Profile</a></li>
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

    <!-- Main Content -->
    <div class="container mt-4">
        <!-- Orders Header -->
        <div class="orders-header">
            <h1 class="dashboard-welcome">Purchase Orders Management</h1>
            <p class="mb-0">Manage and track all your vehicle purchase orders</p>

            <div class="dashboard-stats">
                <div class="dashboard-stat">
                    <div class="stat-value">{{ $ordenes->count() }}</div>
                    <div class="stat-label">Total Orders</div>
                </div>
                <div class="dashboard-stat">
                    <div class="stat-value">{{ $ordenes->where('estado', 'pendiente')->count() }}</div>
                    <div class="stat-label">Pending Orders</div>
                </div>
                <div class="dashboard-stat">
                    <div class="stat-value">{{ $ordenes->where('estado', 'completado')->count() }}</div>
                    <div class="stat-label">Completed Orders</div>
                </div>
            </div>
        </div>
        
        <!-- Filters and Search -->
        <div class="search-container">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search by ID, client, vehicle or notes...">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="filters-container">
                        <div class="filter-item">
                            <select class="form-select">
                                <option selected>Filter by status</option>
                                <option value="pendiente">Pending</option>
                                <option value="completado">Completed</option>
                                <option value="cancelado">Canceled</option>
                            </select>
                        </div>
                        <div class="filter-item">
                            <input type="date" class="form-control" placeholder="Date from">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Orders table -->
        <div class="orders-table-container">
            <div class="table-header">
                <h3 class="mb-0"><i class="fas fa-list-alt me-2"></i>Purchase Orders</h3>
                <span class="badge bg-light text-dark">{{ $ordenes->count() }} records</span>
            </div>
            
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th class="client-info">Client</th>
                            <th class="email-column">Email</th>
                            <th class="vehicle-info">Vehicle</th>
                            <th class="date-column">Order Date</th>
                            <th class="status-column">Status</th>
                            <th>Notes</th>
                            <th class="date-column">Created</th>
                            <th class="date-column">Updated</th>
                            <th class="actions-column">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($ordenes->count() > 0)
                        @foreach($ordenes as $orden)
                        @php
                            // Calcular información de pago
                            $montoAFacturar = 0;
                            $descripcionPago = '';
                            $clasePago = '';
                            
                            if ($orden->vehiculo->Cuotas_cont == 0) {
                                $montoAFacturar = $orden->vehiculo->Inicial;
                                $descripcionPago = 'Pago Inicial';
                                $clasePago = 'payment-inicial';
                            } else {
                                $montoRestante = $orden->vehiculo->precio - $orden->vehiculo->Inicial;
                                $montoAFacturar = $montoRestante / $orden->vehiculo->Cuotas_max;
                                $descripcionPago = "Cuota {$orden->vehiculo->Cuotas_cont}/{$orden->vehiculo->Cuotas_max}";
                                $clasePago = 'payment-cuota';
                            }
                            
                            // Verificar si ya está completamente pagado
                            $estaCompletamentePagado = $orden->vehiculo->Cuotas_cont >= $orden->vehiculo->Cuotas_max;
                        @endphp
                        <tr>
                            <td><strong>#{{ $orden->id }}</strong></td>
                            <td class="client-info">
                                <div class="fw-medium">{{ $orden->cliente->name }}</div>
                            </td>
                            <td class="email-column email-tooltip" data-email="{{ $orden->cliente->email }}">
                                {{ $orden->cliente->email }}
                            </td>
                            <td class="vehicle-info">
                                <div class="fw-medium">{{ $orden->vehiculo->marca }} {{ $orden->vehiculo->modelo }}</div>
                                <small class="text-muted">Year: {{ $orden->vehiculo->anio }}</small>
                                <br>
                                @if($estaCompletamentePagado)
                                    <small class="payment-completed">
                                        <i class="fas fa-check-circle me-1"></i>Completamente pagado
                                    </small>
                                @else
                                    <small class="{{ $clasePago }}">
                                        <strong>{{ $descripcionPago }}: ${{ number_format($montoAFacturar, 2) }}</strong>
                                    </small>
                                @endif
                            </td>
                            <td class="date-column">{{ \Carbon\Carbon::parse($orden->fecha_orden)->format('d/m/Y') }}</td>
                            <td class="status-column">
                                @if($orden->estado == 'pendiente')
                                    <span class="badge badge-pendiente">{{ $orden->estado }}</span>
                                @elseif($orden->estado == 'completado')
                                    <span class="badge badge-completado">{{ $orden->estado }}</span>
                                @else
                                    <span class="badge badge-cancelado">{{ $orden->estado }}</span>
                                @endif
                            </td>
                            <td>
                                <span class="d-inline-block text-truncate" style="max-width: 200px;" title="{{ $orden->notas }}">
                                    {{ $orden->notas }}
                                </span>
                            </td>
                            <td class="date-column">{{ $orden->created_at->format('d/m/Y H:i') }}</td>
                            <td class="date-column">{{ $orden->updated_at->format('d/m/Y H:i') }}</td>
                            <td class="actions-column">
                                <div class="action-buttons">
                                    @if($orden->estado == 'pendiente' && !$estaCompletamentePagado)
                                    <button class="action-btn confirm-btn" title="Confirm" data-order-id="{{ $orden->id }}">
                                        <i class="fas fa-check me-1"></i>Confirm
                                    </button>
                                    <button class="action-btn reject-btn" title="Reject" data-order-id="{{ $orden->id }}">
                                        <i class="fas fa-times me-1"></i>Reject
                                    </button>
                                    @elseif($estaCompletamentePagado)
                                    <span class="text-success small">
                                        <i class="fas fa-check-circle me-1"></i>Fully Paid
                                    </span>
                                    @else
                                    <span class="text-muted small">Action completed</span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="10" class="text-center py-4">
                                <i class="fas fa-shopping-cart fa-2x text-muted mb-3"></i>
                                <p class="text-muted">No purchase orders registered</p>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Additional information -->
        <div class="alert alert-info">
            <h5><i class="fas fa-info-circle me-2"></i>System Information</h5>
            <p class="mb-0">This view shows all purchase orders registered in the system. You can use filters to refine results or actions to manage each order individually.</p>
        </div>
    </div>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Functionality for action buttons
        document.querySelectorAll('.confirm-btn').forEach(button => {
            button.addEventListener('click', function() {
                const orderId = this.getAttribute('data-order-id');
                if(confirm(`Confirm order #${orderId}? A customer will be created in QuickBooks.`)) {
                    confirmarOrden(orderId, this);
                }
            });
        });

        // Function to confirm order
        function confirmarOrden(orderId, button) {
            const originalText = button.innerHTML;
            button.disabled = true;
            button.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Processing...';

            fetch(`/ordenes/${orderId}/confirmar`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP Error: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    // Update interface
                    const row = button.closest('tr');
                    const badge = row.querySelector('.badge-pendiente');
                    const actions = row.querySelector('.action-buttons');
                    
                    badge.className = 'badge badge-completado';
                    badge.textContent = 'completado';
                    
                    // Mostrar información de la cuota procesada
                    let infoCuota = '';
                    if (data.tipo_cuota === 'inicial') {
                        infoCuota = `<i class="fas fa-money-bill-wave me-1"></i>Pago Inicial`;
                    } else {
                        infoCuota = `<i class="fas fa-calendar-alt me-1"></i>Cuota ${data.cuota_actual}/${data.cuotas_totales}`;
                    }
                    
                    actions.innerHTML = `<span class="text-success small">
                        ${infoCuota}<br>
                        <small>Factura #${data.invoice_number}</small>
                    </span>`;
                    
                    // Show success alert
                    alert('✅ ' + data.message);
                    
                    // Recargar la página después de 2 segundos para actualizar los datos
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                    
                } else {
                    alert('❌ ' + data.message);
                    button.disabled = false;
                    button.innerHTML = originalText;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('❌ Connection error: ' + error.message);
                button.disabled = false;
                button.innerHTML = originalText;
            });
        }
    </script>
</body>
</html>