<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Registration - JK Auto Sales Company</title>
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
            background-color: #f5f5f5;
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
        
        .form-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            padding: 30px;
            margin-bottom: 30px;
        }
        
        .form-header {
            background-color: var(--primary-color);
            color: white;
            padding: 20px;
            border-radius: 10px 10px 0 0;
            margin: -30px -30px 30px -30px;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(26, 58, 95, 0.25);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--primary-color);
        }
        
        .required:after {
            content: " *";
            color: var(--accent-color);
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
        
        .footer-logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .footer-logo img{
            height: 200px;
            margin-bottom: 5px;
        }
        
        .form-section {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .form-section-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        
        .form-section-title i {
            margin-right: 10px;
            color: var(--secondary-color);
        }
        
        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
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
            display: none;
            margin-bottom: 15px;
        }
        
        .upload-icon {
            font-size: 3rem;
            color: #ccc;
            margin-bottom: 15px;
        }
        
        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .alert {
            border-radius: 10px;
            border: none;
        }
        
        /* Estilos para la sección de financiamiento */
        .financing-preview {
            background-color: #f8f9fa;
            border-left: 4px solid var(--primary-color);
        }
        
        .financing-preview h6 {
            color: var(--primary-color);
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
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ordenes.index') }}">My Purchases</a>
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
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="form-container">
                    <div class="form-header">
                        <h2 class="mb-0"><i class="fas fa-car me-2"></i>Vehicle Registration</h2>
                        <p class="mb-0 mt-2">Complete all fields to register a new vehicle in inventory</p>
                    </div>

                    <!-- Show success/error messages -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    
                    <form action="{{ route('vehiculos.store') }}" method="POST" enctype="multipart/form-data" id="vehicleForm">
                        @csrf
                        
                        <!-- Basic Vehicle Information -->
                        <div class="form-section">
                            <h3 class="form-section-title"><i class="fas fa-info-circle"></i>Basic Information</h3>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="marca" class="form-label required">Brand</label>
                                    <select class="form-select @error('marca') is-invalid @enderror" id="marca" name="marca" required>
                                        <option value="" selected disabled>Select a brand</option>
                                        <option value="Toyota" {{ old('marca') == 'Toyota' ? 'selected' : '' }}>Toyota</option>
                                        <option value="Honda" {{ old('marca') == 'Honda' ? 'selected' : '' }}>Honda</option>
                                        <option value="Ford" {{ old('marca') == 'Ford' ? 'selected' : '' }}>Ford</option>
                                        <option value="Chevrolet" {{ old('marca') == 'Chevrolet' ? 'selected' : '' }}>Chevrolet</option>
                                        <option value="Nissan" {{ old('marca') == 'Nissan' ? 'selected' : '' }}>Nissan</option>
                                        <option value="BMW" {{ old('marca') == 'BMW' ? 'selected' : '' }}>BMW</option>
                                        <option value="Mercedes-Benz" {{ old('marca') == 'Mercedes-Benz' ? 'selected' : '' }}>Mercedes-Benz</option>
                                        <option value="Audi" {{ old('marca') == 'Audi' ? 'selected' : '' }}>Audi</option>
                                        <option value="Volkswagen" {{ old('marca') == 'Volkswagen' ? 'selected' : '' }}>Volkswagen</option>
                                        <option value="Hyundai" {{ old('marca') == 'Hyundai' ? 'selected' : '' }}>Hyundai</option>
                                        <option value="Kia" {{ old('marca') == 'Kia' ? 'selected' : '' }}>Kia</option>
                                        <option value="Mazda" {{ old('marca') == 'Mazda' ? 'selected' : '' }}>Mazda</option>
                                        <option value="Subaru" {{ old('marca') == 'Subaru' ? 'selected' : '' }}>Subaru</option>
                                        <option value="Lexus" {{ old('marca') == 'Lexus' ? 'selected' : '' }}>Lexus</option>
                                        <option value="Acura" {{ old('marca') == 'Acura' ? 'selected' : '' }}>Acura</option>
                                        <option value="Infiniti" {{ old('marca') == 'Infiniti' ? 'selected' : '' }}>Infiniti</option>
                                        <option value="Volvo" {{ old('marca') == 'Volvo' ? 'selected' : '' }}>Volvo</option>
                                        <option value="Jeep" {{ old('marca') == 'Jeep' ? 'selected' : '' }}>Jeep</option>
                                        <option value="Ram" {{ old('marca') == 'Ram' ? 'selected' : '' }}>Ram</option>
                                        <option value="GMC" {{ old('marca') == 'GMC' ? 'selected' : '' }}>GMC</option>
                                        <option value="Cadillac" {{ old('marca') == 'Cadillac' ? 'selected' : '' }}>Cadillac</option>
                                        <option value="Buick" {{ old('marca') == 'Buick' ? 'selected' : '' }}>Buick</option>
                                        <option value="Chrysler" {{ old('marca') == 'Chrysler' ? 'selected' : '' }}>Chrysler</option>
                                        <option value="Dodge" {{ old('marca') == 'Dodge' ? 'selected' : '' }}>Dodge</option>
                                        <option value="Lincoln" {{ old('marca') == 'Lincoln' ? 'selected' : '' }}>Lincoln</option>
                                        <option value="Mitsubishi" {{ old('marca') == 'Mitsubishi' ? 'selected' : '' }}>Mitsubishi</option>
                                        <option value="Porsche" {{ old('marca') == 'Porsche' ? 'selected' : '' }}>Porsche</option>
                                        <option value="Jaguar" {{ old('marca') == 'Jaguar' ? 'selected' : '' }}>Jaguar</option>
                                        <option value="Land Rover" {{ old('marca') == 'Land Rover' ? 'selected' : '' }}>Land Rover</option>
                                        <option value="Mini" {{ old('marca') == 'Mini' ? 'selected' : '' }}>Mini</option>
                                        <option value="Fiat" {{ old('marca') == 'Fiat' ? 'selected' : '' }}>Fiat</option>
                                        <option value="Alfa Romeo" {{ old('marca') == 'Alfa Romeo' ? 'selected' : '' }}>Alfa Romeo</option>
                                        <option value="Maserati" {{ old('marca') == 'Maserati' ? 'selected' : '' }}>Maserati</option>
                                        <option value="Bentley" {{ old('marca') == 'Bentley' ? 'selected' : '' }}>Bentley</option>
                                        <option value="Rolls-Royce" {{ old('marca') == 'Rolls-Royce' ? 'selected' : '' }}>Rolls-Royce</option>
                                        <option value="Ferrari" {{ old('marca') == 'Ferrari' ? 'selected' : '' }}>Ferrari</option>
                                        <option value="Lamborghini" {{ old('marca') == 'Lamborghini' ? 'selected' : '' }}>Lamborghini</option>
                                        <option value="Aston Martin" {{ old('marca') == 'Aston Martin' ? 'selected' : '' }}>Aston Martin</option>
                                        <option value="McLaren" {{ old('marca') == 'McLaren' ? 'selected' : '' }}>McLaren</option>
                                        <option value="Bugatti" {{ old('marca') == 'Bugatti' ? 'selected' : '' }}>Bugatti</option>
                                        <option value="Lotus" {{ old('marca') == 'Lotus' ? 'selected' : '' }}>Lotus</option>
                                        <option value="Genesis" {{ old('marca') == 'Genesis' ? 'selected' : '' }}>Genesis</option>
                                        <option value="Rivian" {{ old('marca') == 'Rivian' ? 'selected' : '' }}>Rivian</option>
                                        <option value="Lucid" {{ old('marca') == 'Lucid' ? 'selected' : '' }}>Lucid</option>
                                        <option value="Tesla" {{ old('marca') == 'Tesla' ? 'selected' : '' }}>Tesla</option>
                                        <option value="Polestar" {{ old('marca') == 'Polestar' ? 'selected' : '' }}>Polestar</option>
                                    </select>
                                    @error('marca')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="modelo" class="form-label required">Model</label>
                                    <input type="text" class="form-control @error('modelo') is-invalid @enderror" id="modelo" name="modelo" placeholder="Ex: Camry, Civic, F-150" value="{{ old('modelo') }}" required>
                                    @error('modelo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="anio" class="form-label required">Year</label>
                                    <select class="form-select @error('anio') is-invalid @enderror" id="anio" name="anio" required>
                                        <option value="" selected disabled>Select the year</option>
                                        @for($year = date('Y'); $year >= 1990; $year--)
                                            <option value="{{ $year }}" {{ old('anio') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                        @endfor
                                    </select>
                                    @error('anio')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="color" class="form-label required">Color</label>
                                    <input type="text" class="form-control @error('color') is-invalid @enderror" id="color" name="color" placeholder="Ex: Red, Navy Blue, Metallic Gray" value="{{ old('color') }}" required>
                                    @error('color')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="descripcion" class="form-label required">Description</label>
                                    <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="3" placeholder="Describe the main features of the vehicle..." required>{{ old('descripcion') }}</textarea>
                                    @error('descripcion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <!-- Technical Information -->
                        <div class="form-section">
                            <h3 class="form-section-title"><i class="fas fa-cogs"></i>Technical Information</h3>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="transmision" class="form-label required">Transmission</label>
                                    <select class="form-select @error('transmision') is-invalid @enderror" id="transmision" name="transmision" required>
                                        <option value="" selected disabled>Select transmission type</option>
                                        <option value="Automatic" {{ old('transmision') == 'Automatic' ? 'selected' : '' }}>Automatic</option>
                                        <option value="Manual" {{ old('transmision') == 'Manual' ? 'selected' : '' }}>Manual</option>
                                        <option value="Semi-automatic" {{ old('transmision') == 'Semi-automatic' ? 'selected' : '' }}>Semi-automatic</option>
                                        <option value="CVT" {{ old('transmision') == 'CVT' ? 'selected' : '' }}>CVT</option>
                                    </select>
                                    @error('transmision')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="combustible" class="form-label required">Fuel Type</label>
                                    <select class="form-select @error('combustible') is-invalid @enderror" id="combustible" name="combustible" required>
                                        <option value="" selected disabled>Select fuel type</option>
                                        <option value="Gasoline" {{ old('combustible') == 'Gasoline' ? 'selected' : '' }}>Gasoline</option>
                                        <option value="Diesel" {{ old('combustible') == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                                        <option value="Hybrid" {{ old('combustible') == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                                        <option value="Electric" {{ old('combustible') == 'Electric' ? 'selected' : '' }}>Electric</option>
                                        <option value="Gas" {{ old('combustible') == 'Gas' ? 'selected' : '' }}>Gas</option>
                                        <option value="Ethanol" {{ old('combustible') == 'Ethanol' ? 'selected' : '' }}>Ethanol</option>
                                    </select>
                                    @error('combustible')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="kilometraje" class="form-label required">Mileage</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control @error('kilometraje') is-invalid @enderror" id="kilometraje" name="kilometraje" placeholder="Ex: 15000" value="{{ old('kilometraje') }}" required>
                                        <span class="input-group-text">Mi</span>
                                    </div>
                                    @error('kilometraje')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="precio" class="form-label required">Price</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" step="0.01" class="form-control @error('precio') is-invalid @enderror" id="precio" name="precio" placeholder="Ex: 25000" value="{{ old('precio') }}" required>
                                    </div>
                                    @error('precio')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Financing Information -->
                        <div class="form-section">
                            <h3 class="form-section-title"><i class="fas fa-calculator"></i>Financing Information</h3>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="inicial" class="form-label required">Initial Payment ($)</label>
                                    <input type="number" class="form-control @error('Inicial') is-invalid @enderror" id="inicial" name="Inicial" min="0" step="1" value="{{ old('Inicial') }}" required>
                                    <div class="form-text">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Must be ≤ 60% of the vehicle price
                                    </div>
                                    <div id="inicial-error" class="text-danger small d-none">
                                        <i class="fas fa-exclamation-triangle me-1"></i>
                                        Initial payment cannot exceed 60% of the vehicle price
                                    </div>
                                    @error('Inicial')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cuotas" class="form-label required">Installments</label>
                                    <input type="number" class="form-control @error('Cuotas_max') is-invalid @enderror" id="cuotas" name="Cuotas_max" min="1" max="84" step="1" value="{{ old('Cuotas_max', 1) }}" required>
                                    <div class="form-text">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Number of monthly payments (1-84 months)
                                    </div>
                                    @error('Cuotas_max')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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
                        
                       <!-- Vehicle Images -->
                        <div class="form-section">
                            <h3 class="form-section-title"><i class="fas fa-images"></i>Vehicle Images</h3>
                            <div class="image-preview-container" id="imagePreviewContainer">
                                <i class="fas fa-cloud-upload-alt upload-icon" id="uploadIcon"></i>
                                <p id="uploadText">Drag and drop vehicle images here or click to select</p>
                                <img id="imagePreview" class="image-preview" src="" alt="Image preview">
                                <input type="file" class="form-control @error('imagen') is-invalid @enderror d-none" id="imagen" name="imagen" accept="image/*">
                                <div class="image-actions mt-3" id="imageActions" style="display: none;">
                                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="removeImage()">
                                        <i class="fas fa-trash me-1"></i>Remove Image
                                    </button>
                                </div>
                                <button type="button" class="btn btn-outline-primary mt-2" id="selectImageBtn" onclick="document.getElementById('imagen').click()">
                                    <i class="fas fa-folder-open me-2"></i>Select Images
                                </button>
                            </div>
                            @error('imagen')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">You can upload up to 5 vehicle images. Allowed formats: JPG, PNG, GIF. Maximum size: 5MB per image.</small>
                        </div>
                        
                        <!-- Additional Information -->
                        <div class="form-section">
                            <h3 class="form-section-title"><i class="fas fa-plus-circle"></i>Additional Information</h3>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="estado" class="form-label required">Vehicle Condition</label>
                                    <select class="form-select @error('estado') is-invalid @enderror" id="estado" name="estado" required>
                                        <option value="" selected disabled>Select condition</option>
                                        <option value="New" {{ old('estado') == 'New' ? 'selected' : '' }}>New</option>
                                        <option value="Used" {{ old('estado') == 'Used' ? 'selected' : '' }}>Used</option>
                                        <option value="Semi-new" {{ old('estado') == 'Semi-new' ? 'selected' : '' }}>Semi-new</option>
                                        <option value="Certified" {{ old('estado') == 'Certified' ? 'selected' : '' }}>Certified</option>
                                    </select>
                                    @error('estado')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="tipo" class="form-label required">Vehicle Type</label>
                                    <select class="form-select @error('tipo') is-invalid @enderror" id="tipo" name="tipo" required>
                                        <option value="" selected disabled>Select type</option>
                                        <option value="Sedán" {{ old('tipo') == 'Sedán' ? 'selected' : '' }}>Sedan</option>
                                        <option value="SUV" {{ old('tipo') == 'SUV' ? 'selected' : '' }}>SUV</option>
                                        <option value="Pickup" {{ old('tipo') == 'Pickup' ? 'selected' : '' }}>Pickup</option>
                                        <option value="Hatchback" {{ old('tipo') == 'Hatchback' ? 'selected' : '' }}>Hatchback</option>
                                        <option value="Coupe" {{ old('tipo') == 'Coupe' ? 'selected' : '' }}>Coupe</option>
                                        <option value="Convertible" {{ old('tipo') == 'Convertible' ? 'selected' : '' }}>Convertible</option>
                                        <option value="Minivan" {{ old('tipo') == 'Minivan' ? 'selected' : '' }}>Minivan</option>
                                        <option value="Van" {{ old('tipo') == 'Van' ? 'selected' : '' }}>Van</option>
                                        <option value="Deportivo" {{ old('tipo') == 'Deportivo' ? 'selected' : '' }}>Sports</option>
                                        <option value="Lujo" {{ old('tipo') == 'Lujo' ? 'selected' : '' }}>Luxury</option>
                                    </select>
                                    @error('tipo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="descripcion_larga" class="form-label">Long Description</label>
                                    <textarea class="form-control @error('descripcion_larga') is-invalid @enderror" id="descripcion_larga" name="descripcion_larga" rows="3" placeholder="Describe special features, additional equipment, etc.">{{ old('descripcion_larga') }}</textarea>
                                    @error('descripcion_larga')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <!-- Terms and Conditions -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input @error('terminos') is-invalid @enderror" type="checkbox" id="terminos" name="terminos" required>
                                <label class="form-check-label" for="terminos">
                                    I accept the <a href="#" class="text-primary">terms and conditions</a> and confirm that the provided information is truthful.
                                </label>
                                @error('terminos')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="form-actions">
                            <a href="{{ route('vehiculos.index') }}" class="btn btn-outline-primary">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                            <button type="submit" class="btn btn-primary" id="submitButton">
                                <i class="fas fa-save me-2"></i>Register Vehicle
                            </button>
                        </div>
                    </form>
                </div>
            </div>
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
  // Validación en tiempo real para el pago inicial
document.addEventListener('DOMContentLoaded', function() {
    const precioInput = document.getElementById('precio');
    const inicialInput = document.getElementById('inicial');
    const cuotasInput = document.getElementById('cuotas');
    const submitButton = document.getElementById('submitButton');
    
    // Variables para gestión de imágenes
    let currentImageFile = null;
    
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
                submitButton.disabled = true;
                return false;
            } else {
                errorElement.classList.add('d-none');
                inicialInput.classList.remove('is-invalid');
                submitButton.disabled = false;
            }
            
            // Validar que las cuotas estén en el rango permitido
            if (cuotas < 1 || cuotas > 84) {
                cuotasInput.classList.add('is-invalid');
                submitButton.disabled = true;
                return false;
            } else {
                cuotasInput.classList.remove('is-invalid');
                submitButton.disabled = false;
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
        
        // Event listeners para financiamiento
        precioInput.addEventListener('input', validarFinanciamiento);
        inicialInput.addEventListener('input', validarFinanciamiento);
        cuotasInput.addEventListener('input', validarFinanciamiento);
        
        // Validación inicial
        validarFinanciamiento();
    }

    // Script for image preview and management
    document.getElementById('imagen').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            // Validar tamaño del archivo (5MB máximo)
            if (file.size > 5 * 1024 * 1024) {
                alert('The image size must be less than 5MB');
                this.value = '';
                return;
            }
            
            // Validar tipo de archivo
            const validTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (!validTypes.includes(file.type)) {
                alert('Only JPG, PNG and GIF images are allowed');
                this.value = '';
                return;
            }
            
            currentImageFile = file;
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('imagePreview');
                const container = document.getElementById('imagePreviewContainer');
                const uploadIcon = document.getElementById('uploadIcon');
                const uploadText = document.getElementById('uploadText');
                const imageActions = document.getElementById('imageActions');
                const selectImageBtn = document.getElementById('selectImageBtn');
                
                preview.src = e.target.result;
                preview.style.display = 'block';
                uploadIcon.style.display = 'none';
                uploadText.style.display = 'none';
                imageActions.style.display = 'block';
                selectImageBtn.style.display = 'none';
                container.style.borderColor = '#28a745';
                container.style.backgroundColor = '#f8fff9';
            }
            reader.readAsDataURL(file);
        }
    });

    // Function to remove selected image
    window.removeImage = function() {
        const preview = document.getElementById('imagePreview');
        const container = document.getElementById('imagePreviewContainer');
        const uploadIcon = document.getElementById('uploadIcon');
        const uploadText = document.getElementById('uploadText');
        const imageActions = document.getElementById('imageActions');
        const selectImageBtn = document.getElementById('selectImageBtn');
        const fileInput = document.getElementById('imagen');
        
        // Reset everything
        preview.style.display = 'none';
        preview.src = '';
        uploadIcon.style.display = 'block';
        uploadText.style.display = 'block';
        imageActions.style.display = 'none';
        selectImageBtn.style.display = 'block';
        container.style.borderColor = '#ddd';
        container.style.backgroundColor = '#f9f9f9';
        fileInput.value = '';
        currentImageFile = null;
    }

    // Drag and drop functionality
    document.getElementById('imagePreviewContainer').addEventListener('dragover', function(e) {
        e.preventDefault();
        this.style.borderColor = '#007bff';
        this.style.backgroundColor = '#f0f8ff';
    });

    document.getElementById('imagePreviewContainer').addEventListener('dragleave', function(e) {
        e.preventDefault();
        if (!currentImageFile) {
            this.style.borderColor = '#ddd';
            this.style.backgroundColor = '#f9f9f9';
        }
    });

    document.getElementById('imagePreviewContainer').addEventListener('drop', function(e) {
        e.preventDefault();
        this.style.borderColor = currentImageFile ? '#28a745' : '#ddd';
        this.style.backgroundColor = currentImageFile ? '#f8fff9' : '#f9f9f9';
        
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            document.getElementById('imagen').files = files;
            // Trigger change event
            const event = new Event('change');
            document.getElementById('imagen').dispatchEvent(event);
        }
    });
});

// Script to handle form submission
document.getElementById('vehicleForm').addEventListener('submit', function(e) {
    const requiredFields = document.querySelectorAll('#vehicleForm [required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        if (!field.value) {
            field.classList.add('is-invalid');
            isValid = false;
        } else {
            field.classList.remove('is-invalid');
        }
    });
    
    // Validación adicional para financiamiento
    const precio = parseFloat(document.getElementById('precio').value) || 0;
    const inicial = parseFloat(document.getElementById('inicial').value) || 0;
    const cuotas = parseInt(document.getElementById('cuotas').value) || 0;
    
    if (inicial > (precio * 0.6)) {
        document.getElementById('inicial-error').classList.remove('d-none');
        document.getElementById('inicial').classList.add('is-invalid');
        isValid = false;
    }
    
    if (cuotas < 1 || cuotas > 84) {
        document.getElementById('cuotas').classList.add('is-invalid');
        isValid = false;
    }
    
    if (!isValid) {
        e.preventDefault();
        alert('Please complete all required fields correctly');
    }
});

// Script for smooth navigation
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