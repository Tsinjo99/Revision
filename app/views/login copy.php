<?php

$base_url = '/public';       
$title = 'Login';
$activePage = 'login';
$unreadMessages = 3;        

?>
<head>
            <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="images/favicon-CvUZKS4z.svg">
    <link rel="icon" type="image/png" href="images/favicon-B_cwPWBd.png">
    
    <!-- Preconnect to external domains -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
     <link rel="stylesheet" href="css/main-QD_VOj1Y.css">

    <!-- Title -->
    <title>Dashboard - Modern Bootstrap Admin</title>
    
    <!-- Theme Color -->
    <meta name="theme-color" content="#6366f1">
    
    <!-- PWA Manifest -->
    <link rel="manifest" href="js/manifest-DTaoG9pG.json">
    <script type="module" crossorigin src="js/vendor-bootstrap-C9iorZI5.js"></script>
    <script type="module" crossorigin src="js/vendor-charts-DGwYAWel.js"></script>
    <script type="module" crossorigin src="js/vendor-ui-CflGdlft.js"></script>
    <script type="module" crossorigin src="js/main-DwHigVru.js"></script>
    <link rel="stylesheet" crossorigin href="js/main-QD_VOj1Y.css">

           <!-- Message -->
     <script type="module" crossorigin src="js/messages-ByGNYy7N.js"></script>
     <script src="js/messages.js"></script>
</head>

<main class="admin-main">
    <div class="container-fluid p-4">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0">Connexion</h1>
                <p class="text-muted mb-0">Modern form components with validation, file upload, and wizards</p>
            </div>
        </div>
        <div class="row g-4 mb-5">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-envelope me-2 text-primary"></i>
                            login Form with Real-time Validation
                        </h5>
                    </div>
                    <div class="card-body">
                        <form  method="POST" action="/">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group floating-label">
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            name="firstName" 
                                            placeholder=""
                                        >
                                        <label class="form-label">First Name</label>
                                        <div class="invalid-feedback" x-show="errors.firstName" x-text="errors.firstName"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group floating-label">
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            name="lastName" 
                                            placeholder=" "
                                        >
                                        <label class="form-label">Last Name</label>
                                        <div class="invalid-feedback" x-show="errors.lastName" x-text="errors.lastName"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group floating-label">
                                        <input 
                                            type="email" 
                                            class="form-control" 
                                            name="email" 
                                            required
                                        >
                                        <label class="form-label">Email Address</label>
                                        <div class="invalid-feedback"  x-show="errors.email" x-text="errors.email"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group floating-label">
                                        <input 
                                            type="password" 
                                            class="form-control" 
                                            name="password" 
                                            required
                                        >
                                        <label class="form-label">Mot de passe</label>
                                        <div class="invalid-feedback" x-show="errors.password" x-text="errors.password"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" x-model="form.agreeTerms" required>
                                        <label class="form-check-label">
                                            I agree to the <a href="#" class="text-primary">Terms of Service</a> and <a href="#" class="text-primary">Privacy Policy</a>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        Connecter
                                    </button>
                                </div>
                         </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h6 class="card-title">Contact Information</h6>
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-geo-alt text-primary me-3"></i>
                            <div>
                                <strong>Address</strong><br>
                                <small class="text-muted">123 Business St, Suite 100<br>City, State 12345</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-telephone text-primary me-3"></i>
                            <div>
                                <strong>Phone</strong><br>
                                <small class="text-muted">+1 (555) 123-4567</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-envelope text-primary me-3"></i>
                            <div>
                                <strong>Email</strong><br>
                                <small class="text-muted">support@company.com</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

    </div>
</main>

<?php
 include 'footer.php';
 ?>


