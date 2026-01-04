<?php
/**
 * Smart Biller - About the Author (Md Ziabul Islam)
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Author | Smart Biller</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .profile-img-container {
            width: 180px;
            height: 180px;
            margin: 0 auto;
            border: 4px solid var(--emerald);
            padding: 5px;
            border-radius: 50%;
            overflow: hidden;
            background: rgba(16, 185, 129, 0.1);
        }
        .profile-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }
        .section-title {
            border-left: 4px solid var(--cyan);
            padding-left: 15px;
            margin-bottom: 25px;
        }
        .expertise-badge {
            background: rgba(6, 182, 212, 0.1);
            border: 1px solid rgba(6, 182, 212, 0.2);
            color: var(--cyan);
            padding: 8px 15px;
            border-radius: 50px;
            display: inline-block;
            margin: 5px;
            font-size: 0.9rem;
            font-weight: 500;
        }
        .social-link {
            font-size: 1.5rem;
            color: #94a3b8;
            transition: all 0.3s ease;
            margin: 0 10px;
        }
        .social-link:hover {
            color: var(--cyan);
            transform: translateY(-3px);
        }
        .card-header-profile {
            background: linear-gradient(to bottom, rgba(30, 41, 59, 0.9), rgba(15, 23, 42, 1));
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
    </style>
</head>
<body class="bg-dark text-light">
    <!-- Navigation Bar -->
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

    <div class="container py-4 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card glass-card border-0 overflow-hidden">
                    <!-- Profile Header -->
                    <div class="card-header-profile p-5 text-center">
                        <div class="profile-img-container mb-4 shadow-lg">
                            <img src="../assets/images/zim_profile.jpg" alt="Md Ziabul Islam" class="profile-img">
                        </div>
                        <h1 class="display-5 fw-bold text-white mb-2">Md Ziabul Islam (ZiM)</h1>
                        <p class="h5 text-emerald mb-4">Software Engineer & Web Application Developer</p>
                        <div class="d-flex justify-content-center">
                            <a href="https://github.com/ziabul2" target="_blank" class="social-link"><i class="bi bi-github"></i></a>
                            <a href="https://www.facebook.com/ziabul123" target="_blank" class="social-link"><i class="bi bi-facebook"></i></a>
                        </div>
                    </div>

                    <div class="card-body p-lg-5 p-4">
                        <div class="row g-5">
                            <div class="col-md-7">
                                <h3 class="section-title text-white">💼 Professional Profile</h3>
                                <p class="text-secondary leading-relaxed">
                                    <strong>Md Ziabul Islam (ZiM)</strong> is a <strong>software engineer and web application developer</strong> focused on building <strong>accurate, efficient, and real-world usable software solutions</strong>. His work emphasizes <strong>logic-driven systems</strong>, <strong>clean architecture</strong>, and <strong>offline-first application design</strong>, ensuring long-term reliability and maintainability.
                                </p>
                                <p class="text-secondary">
                                    He specializes in developing lightweight applications that solve practical problems without unnecessary infrastructure or complexity. ⚙️
                                </p>

                                <h3 class="section-title text-white mt-5">📌 Development Philosophy</h3>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <div class="p-3 rounded-3 bg-dark-soft border border-secondary border-opacity-10 h-100">
                                            <div class="text-cyan mb-2"><i class="bi bi-rulers fs-4"></i></div>
                                            <h6 class="text-white">Accuracy</h6>
                                            <p class="small text-secondary mb-0">Precision and fairness in core calculations. 📐</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="p-3 rounded-3 bg-dark-soft border border-secondary border-opacity-10 h-100">
                                            <div class="text-emerald mb-2"><i class="bi bi-cpu fs-4"></i></div>
                                            <h6 class="text-white">Simplicity</h6>
                                            <p class="small text-secondary mb-0">Practical logic over overengineering. 🧠</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="p-3 rounded-3 bg-dark-soft border border-secondary border-opacity-10 h-100">
                                            <div class="text-cyan mb-2"><i class="bi bi-search fs-4"></i></div>
                                            <h6 class="text-white">Transparency</h6>
                                            <p class="small text-secondary mb-0">Clear, auditable system logic. 🔍</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="p-3 rounded-3 bg-dark-soft border border-secondary border-opacity-10 h-100">
                                            <div class="text-emerald mb-2"><i class="bi bi-shield-lock fs-4"></i></div>
                                            <h6 class="text-white">Dependability</h6>
                                            <p class="small text-secondary mb-0">Minimal reliance on external services. 🔐</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="p-4 rounded-4 bg-dark-soft border border-secondary border-opacity-10">
                                    <h4 class="text-white mb-4"><i class="bi bi-tools text-cyan me-2"></i> Technical Expertise</h4>
                                    <div class="d-flex flex-wrap">
                                        <span class="expertise-badge">PHP Applications</span>
                                        <span class="expertise-badge">JavaScript (ES6+)</span>
                                        <span class="expertise-badge">Bootstrap UI</span>
                                        <span class="expertise-badge">Calculation Engines</span>
                                        <span class="expertise-badge">LocalStorage APIs</span>
                                        <span class="expertise-badge">System Architecture</span>
                                    </div>

                                    <h4 class="text-white mt-5 mb-4"><i class="bi bi-briefcase text-emerald me-2"></i> Project Role</h4>
                                    <ul class="list-unstyled text-secondary small">
                                        <li class="mb-2"><i class="bi bi-check-circle-fill text-emerald me-2"></i> Overall Architect & Designer</li>
                                        <li class="mb-2"><i class="bi bi-check-circle-fill text-emerald me-2"></i> Core Billing Logic Specialist</li>
                                        <li class="mb-2"><i class="bi bi-check-circle-fill text-emerald me-2"></i> Feature Planner</li>
                                        <li class="mb-2"><i class="bi bi-check-circle-fill text-emerald me-2"></i> Quality Assurance</li>
                                    </ul>

                                    <div class="mt-5 pt-3 border-top border-secondary border-opacity-10 text-center">
                                        <p class="small text-secondary mb-3">Project Source Code</p>
                                        <a href="https://github.com/ziabul2/Unit_Calculator" target="_blank" class="btn btn-outline-cyan w-100 rounded-pill">
                                            <i class="bi bi-github me-2"></i> GitHub Repository
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="border-secondary opacity-25 my-5">

                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h3 class="section-title text-white">🚀 Vision & Goals</h3>
                                <p class="text-secondary">
                                    Md Ziabul Islam aims to create <strong>simple yet powerful software tools</strong> that address real-world problems effectively and work reliably without heavy infrastructure. His long-term goal is to deliver <strong>trustworthy, logic-first applications</strong> that provide genuine value. 💡
                                </p>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="p-4">
                                    <p class="text-secondary italic mb-0">"Feedback and suggestions are always welcome."</p>
                                    <p class="fw-bold text-white fs-5 mt-2">🤝 Let's Connect!</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-dark-soft p-4 text-center border-top border-secondary border-opacity-10">
                        <p class="text-secondary small mb-0">&copy; <?php echo date('Y'); ?> Smart Biller | Authored by <strong>Md Ziabul Islam (ZiM)</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
