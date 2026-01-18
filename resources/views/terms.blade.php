<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions - JK Auto Sales Company</title>
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
        
        .terms-header {
            background: linear-gradient(rgba(26, 58, 95, 0.9), rgba(26, 58, 95, 0.9)), url('https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0 60px;
            text-align: center;
        }
        
        .terms-content {
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
        
        .terms-nav {
            position: sticky;
            top: 100px;
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .terms-nav ul {
            list-style: none;
            padding: 0;
        }
        
        .terms-nav li {
            margin-bottom: 10px;
        }
        
        .terms-nav a {
            color: var(--primary-color);
            text-decoration: none;
            transition: all 0.3s;
            display: block;
            padding: 8px 15px;
            border-radius: 5px;
        }
        
        .terms-nav a:hover {
            background: var(--primary-color);
            color: white;
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

    <!-- Terms Header -->
    <section class="terms-header">
        <div class="container">
            <h1 class="display-4 fw-bold mb-4">Terms and Conditions</h1>
            <p class="lead">End User License Agreement - Last updated: <strong id="current-date"></strong></p>
        </div>
    </section>

    <!-- Terms Content -->
    <section class="terms-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="terms-nav">
                        <h5>Content</h5>
                        <ul>
                            <li><a href="#acceptance">1. Acceptance</a></li>
                            <li><a href="#services">2. Services</a></li>
                            <li><a href="#quickbooks">3. QuickBooks</a></li>
                            <li><a href="#purchase">4. Purchase Process</a></li>
                            <li><a href="#warranties">5. Warranties</a></li>
                            <li><a href="#limitation">6. Limitation</a></li>
                            <li><a href="#property">7. Property</a></li>
                            <li><a href="#termination">8. Termination</a></li>
                            <li><a href="#law">9. Applicable Law</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-9">
                    
                    <div class="info-card">
                        <h3><i class="fas fa-gavel text-primary me-2"></i>Legal Agreement</h3>
                        <p class="mb-0">By using our services, you agree to comply with these terms and conditions. Read carefully before making any transaction.</p>
                    </div>

                    <h2 id="acceptance" class="section-title">1. Acceptance of Terms</h2>
                    <p>By accessing and using JK Auto Sales Company services, you agree to be bound by these Terms and Conditions and our Privacy Policy. If you do not agree with any of these terms, you may not use our services.</p>

                    <h2 id="services" class="section-title">2. Services Description</h2>
                    <p>JK Auto Sales Company provides the following services:</p>
                    <ul>
                        <li>Sale of new and used vehicles</li>
                        <li>Automotive financing</li>
                        <li>Evaluation and purchase of used vehicles</li>
                        <li>Post-sale services and warranties</li>
                        <li>Payment processing through QuickBooks</li>
                    </ul>

                    <h2 id="quickbooks" class="section-title">3. QuickBooks Integration</h2>
                    <p>Our platform uses QuickBooks for payment processing:</p>
                    <ul>
                        <li><strong>Payment Processing:</strong> All financial transactions are processed through QuickBooks</li>
                        <li><strong>Security:</strong> Payment data is protected by Intuit security protocols</li>
                        <li><strong>Additional Terms:</strong> Use of payment services is subject to Intuit QuickBooks Terms of Service</li>
                        <li><strong>Liability:</strong> JK Auto Sales Company is not responsible for QuickBooks service interruptions</li>
                    </ul>

                    <h2 id="purchase" class="section-title">4. Purchase Process</h2>
                    <h5>4.1 Offer and Acceptance</h5>
                    <p>Listing a vehicle on our site constitutes an invitation to offer, not a sales offer. The sale is considered completed when:</p>
                    <ul>
                        <li>The offer is accepted in writing</li>
                        <li>Full or initial payment is received</li>
                        <li>The sales contract is signed</li>
                    </ul>

                    <h5>4.2 Prices and Taxes</h5>
                    <p>All prices are in US dollars (USD) and include applicable VAT. Prices are subject to change without prior notice.</p>

                    <h5>4.3 Payment Methods</h5>
                    <p>We accept the following payment methods:</p>
                    <ul>
                        <li>Bank transfer</li>
                        <li>Credit/debit cards (processed via QuickBooks)</li>
                        <li>Direct financing</li>
                        <li>Cash (up to legal limits)</li>
                    </ul>

                    <h2 id="warranties" class="section-title">5. Warranties and Returns</h2>
                    <h5>5.1 New Vehicles</h5>
                    <p>New vehicles include factory warranty according to manufacturer terms.</p>

                    <h5>5.2 Used Vehicles</h5>
                    <p>Used vehicles may include limited warranty based on vehicle evaluation. Specific conditions are detailed in the sales contract.</p>

                    <h5>5.3 Return Policy</h5>
                    <p>We do not accept returns once the sale is completed, except for undeclared defects that constitute breach of contract.</p>

                    <h2 id="limitation" class="section-title">6. Limitation of Liability</h2>
                    <p>JK Auto Sales Company shall not be liable for:</p>
                    <ul>
                        <li>Indirect, incidental, or consequential damages</li>
                        <li>Loss of profits or income</li>
                        <li>Service interruptions due to causes beyond our control</li>
                        <li>Errors in information provided by third parties</li>
                        <li>Technical problems with QuickBooks payment services</li>
                    </ul>

                    <h2 id="property" class="section-title">7. Intellectual Property</h2>
                    <p>All website content, including logos, designs, texts and images are property of JK Auto Sales Company and are protected by intellectual property laws.</p>

                    <h2 id="termination" class="section-title">8. Termination</h2>
                    <p>We reserve the right to terminate or suspend access to our services to any user who violates these terms and conditions.</p>

                    <h2 id="law" class="section-title">9. Applicable Law and Jurisdiction</h2>
                    <p>These terms are governed by the laws of [Your Country/State]. Any dispute shall be resolved in the courts of [City, Country].</p>

                    <div class="alert alert-warning mt-4">
                        <h5><i class="fas fa-exclamation-triangle me-2"></i>Disclaimer</h5>
                        <p class="mb-0">These terms may be updated periodically. Continued use of our services after changes constitutes acceptance of the new terms.</p>
                    </div>

                    <div class="card bg-light mt-4">
                        <div class="card-body">
                            <h5><i class="fas fa-question-circle me-2"></i>Questions?</h5>
                            <p class="mb-0">For inquiries about these terms, contact: <strong>jkautosalescompany@gmail.com</strong> or call <strong>(123) 456-7890</strong></p>
                        </div>
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

        // Smooth navigation for anchors
        document.querySelectorAll('.terms-nav a').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>