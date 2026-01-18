<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy - JK Auto Sales Company</title>
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
            line-height: 1.6;
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
        
        .privacy-header {
            background: linear-gradient(rgba(26, 58, 95, 0.9), rgba(26, 58, 95, 0.9)), url('https://images.unsplash.com/photo-1486496572940-2bb2341fdbdf?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0 60px;
            text-align: center;
        }
        
        .privacy-content {
            padding: 60px 0;
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
        
        .info-card {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 30px;
            margin-bottom: 30px;
            border-left: 4px solid var(--secondary-color);
        }
        
        .footer {
            background-color: var(--primary-color);
            color: white;
            padding: 50px 0 20px;
        }
        
        .footer-logo img {
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
        
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: var(--secondary-color);
            color: var(--primary-color);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            transition: all 0.3s;
        }
        
        .back-to-top:hover {
            transform: translateY(-3px);
            color: var(--primary-color);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <div class="logo-container">
                   <img src="{{ asset('img/logo.png') }}" alt="JK Auto Sales Logo">
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
                        <a class="nav-link" href="/#vehicles">Vehicles</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Privacy Header -->
    <section class="privacy-header">
        <div class="container">
            <h1 class="display-4 fw-bold mb-4">Privacy Policy</h1>
            <p class="lead">Last updated: <strong id="current-date"></strong></p>
        </div>
    </section>

    <!-- Privacy Content -->
    <section class="privacy-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    
                    <div class="info-card">
                        <h3><i class="fas fa-info-circle text-primary me-2"></i>Important Information</h3>
                        <p class="mb-0">At JK Auto Sales Company, we are committed to protecting your privacy and ensuring the security of your personal data.</p>
                    </div>

                    <h2 class="section-title">1. Information We Collect</h2>
                    <p>We collect the following information to provide you with our services:</p>
                    
                    <h5>Personal Data:</h5>
                    <ul>
                        <li>Full name and contact information</li>
                        <li>Email address and phone number</li>
                        <li>Identification information (ID, driver's license)</li>
                        <li>Credit and financial history (for financing)</li>
                    </ul>
                    
                    <h5>Transaction Data:</h5>
                    <ul>
                        <li>Vehicle interest information</li>
                        <li>Purchase and inquiry history</li>
                        <li>Financing and payment preferences</li>
                    </ul>

                    <h2 class="section-title">2. QuickBooks Integration</h2>
                    <p>Our platform uses QuickBooks to process payments and manage financial transactions:</p>
                    <ul>
                        <li><strong>Payment Processing:</strong> We use QuickBooks to process vehicle purchase transactions</li>
                        <li><strong>Shared Data:</strong> We share necessary transaction information with QuickBooks to process payments</li>
                        <li><strong>Security:</strong> All financial data is handled through QuickBooks secure protocols</li>
                        <li><strong>Compliance:</strong> We operate under Intuit QuickBooks terms of service and privacy policies</li>
                    </ul>

                    <h2 class="section-title">3. Use of Information</h2>
                    <p>We use your information to:</p>
                    <ul>
                        <li>Process vehicle purchases/sales</li>
                        <li>Manage financing and credit approval</li>
                        <li>Provide customer service and post-sale support</li>
                        <li>Improve our services and user experience</li>
                        <li>Comply with legal and regulatory obligations</li>
                    </ul>

                    <h2 class="section-title">4. Data Protection</h2>
                    <p>We implement security measures including:</p>
                    <ul>
                        <li>Encryption of sensitive data</li>
                        <li>Restricted access to personal information</li>
                        <li>Secure protocols for financial transactions</li>
                        <li>Regular security audits</li>
                    </ul>

                    <h2 class="section-title">5. Your Rights</h2>
                    <p>You have the right to:</p>
                    <ul>
                        <li>Access your personal information</li>
                        <li>Rectify inaccurate data</li>
                        <li>Request deletion of your data</li>
                        <li>Object to the processing of your data</li>
                        <li>Data portability</li>
                    </ul>

                    <h2 class="section-title">6. Contact</h2>
                    <p>To exercise your rights or for privacy inquiries:</p>
                    <div class="card bg-light">
                        <div class="card-body">
                            <p class="mb-1"><strong>JK Auto Sales Company</strong></p>
                            <p class="mb-1"><i class="fas fa-envelope me-2"></i> jkautosalescompany@gmail.com</p>
                            <p class="mb-1"><i class="fas fa-phone me-2"></i> (123) 456-7890</p>
                            <p class="mb-0"><i class="fas fa-map-marker-alt me-2"></i> 1234 Main Avenue, City</p>
                        </div>
                    </div>

                    <div class="alert alert-info mt-4">
                        <h5><i class="fas fa-exclamation-circle me-2"></i>Updates</h5>
                        <p class="mb-0">This policy may be updated periodically. We will notify you about significant changes.</p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-logo text-center">
                <img src="{{ asset('img/logo.png') }}" alt="JK Auto Sales Logo">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2025 JK Auto Sales Company. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="/privacy-policy.html" class="me-3">Privacy Policy</a>
                    <a href="/terms.html">Terms and Conditions</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top -->
    <a href="#" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Automatic current date
        document.getElementById('current-date').textContent = new Date().toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });

        // Back to top
        const backToTop = document.querySelector('.back-to-top');
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTop.style.display = 'flex';
            } else {
                backToTop.style.display = 'none';
            }
        });

        backToTop.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
</body>
</html>