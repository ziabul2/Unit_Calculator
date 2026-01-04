<?php
/**
 * Smart Biller - Contact Us
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Smart Biller</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-dark text-light">
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
                        <a class="nav-link text-light px-3" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light px-3 active" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card glass-card p-4">
                    <h1 class="gradient-text mb-4">Contact Us</h1>
                    <form>
                        <div class="mb-3">
                            <label class="form-label text-secondary small text-uppercase">Name</label>
                            <input type="text" class="form-control bg-transparent text-light border-secondary">
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-secondary small text-uppercase">Email</label>
                            <input type="email" class="form-control bg-transparent text-light border-secondary">
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-secondary small text-uppercase">Message</label>
                            <textarea class="form-control bg-transparent text-light border-secondary" rows="4"></textarea>
                        </div>
                        <button type="button" class="btn btn-primary-gradient w-100 py-3 mt-3 fw-bold">SEND MESSAGE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
