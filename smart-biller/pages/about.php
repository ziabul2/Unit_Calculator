<?php
/**
 * Smart Biller - About Us
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Smart Biller</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-dark text-light">
    <!-- Navbar placeholder or include -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark-soft border-bottom border-secondary border-opacity-25 py-3 mb-5 sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold gradient-text fs-3" href="../../index.php">
                <i class="bi bi-lightning-charge-fill me-2"></i>Smart Biller
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navContent">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link text-light px-3" href="../../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light px-3 active" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light px-3" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card glass-card p-4">
                    <h1 class="gradient-text mb-4">About Smart Biller</h1>
                    <p class="lead text-secondary">Smart Biller is a cutting-edge electricity billing solution designed for the modern landlord and tenant relationship.</p>
                    <hr class="border-secondary opacity-25 my-4">
                    <div class="row g-4 mt-2">
                        <div class="col-md-6">
                            <h5 class="text-cyan"><i class="bi bi-shield-check me-2"></i> Accuracy</h5>
                            <p class="small text-secondary">Uses authoritative PHP-based slab calculations verified against official gazettes.</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-emerald"><i class="bi bi-lightning-charge me-2"></i> Efficiency</h5>
                            <p class="small text-secondary">Fast, offline-first performance with local data persistence.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
