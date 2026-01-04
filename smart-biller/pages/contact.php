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
                    <p class="text-secondary small mb-4">
                        <i class="bi bi-info-circle me-1"></i>Method: <strong>Email (Primary)</strong>
                    </p>

                    <form id="contactForm">
                        <div class="mb-3">
                            <label class="form-label text-secondary small text-uppercase">Name</label>
                            <input type="text" id="contactName" name="name" class="form-control bg-transparent text-light border-secondary" placeholder="Your Name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-secondary small text-uppercase">Email</label>
                            <input type="email" id="contactEmail" name="email" class="form-control bg-transparent text-light border-secondary" placeholder="your@email.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-secondary small text-uppercase">Message</label>
                            <textarea id="contactMessage" name="message" class="form-control bg-transparent text-light border-secondary" rows="4" placeholder="How can we help?" required></textarea>
                        </div>
                        <button type="submit" id="submitBtn" class="btn btn-primary-gradient w-100 py-3 mt-3 fw-bold">
                            <span id="btnText">SEND MESSAGE</span>
                            <span id="btnSpinner" class="spinner-border spinner-border-sm d-none" role="status"></span>
                        </button>
                    </form>

                    <div id="formStatus" class="mt-4 d-none">
                        <div class="alert bg-dark-soft border-secondary border-opacity-25 text-center mb-0">
                            <i id="statusIcon" class="bi me-2"></i>
                            <span id="statusMessage"></span>
                        </div>
                    </div>
                </div>

                <div class="mt-5 p-4 rounded-4 bg-dark-soft border border-secondary border-opacity-10">
                    <h6 class="text-white mb-3"><i class="bi bi-gear-wide-connected text-cyan me-2"></i> How It Works</h6>
                    <ul class="list-unstyled text-secondary small mb-0">
                        <li class="mb-2"><i class="bi bi-1-circle text-cyan me-2"></i> Fill in your details and message above.</li>
                        <li class="mb-2"><i class="bi bi-2-circle text-cyan me-2"></i> Data is submitted to our secure PHP handler.</li>
                        <li class="mb-2"><i class="bi bi-3-circle text-cyan me-2"></i> Your message is formatted and sent directly to the Admin.</li>
                        <li class="mb-2"><i class="bi bi-4-circle text-cyan me-2"></i> <strong>Privacy First:</strong> No data is stored on our servers.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('contactForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const form = e.target;
            const btn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const btnSpinner = document.getElementById('btnSpinner');
            const statusDiv = document.getElementById('formStatus');
            const statusMsg = document.getElementById('statusMessage');
            const statusIcon = document.getElementById('statusIcon');

            // Reset UI
            statusDiv.classList.add('d-none');
            btn.disabled = true;
            btnText.classList.add('d-none');
            btnSpinner.classList.remove('d-none');

            const formData = {
                name: document.getElementById('contactName').value,
                email: document.getElementById('contactEmail').value,
                message: document.getElementById('contactMessage').value
            };

            try {
                const response = await fetch('../api/send_contact.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(formData)
                });

                const result = await response.json();

                statusDiv.classList.remove('d-none');
                if (result.status === 'success') {
                    statusMsg.textContent = result.message || 'Message sent successfully!';
                    statusMsg.className = 'text-emerald fw-bold';
                    statusIcon.className = 'bi bi-check-circle-fill text-emerald me-2';
                    form.reset();
                } else {
                    statusMsg.textContent = result.message || 'Failed to send message.';
                    statusMsg.className = 'text-danger fw-bold';
                    statusIcon.className = 'bi bi-exclamation-triangle-fill text-danger me-2';
                }
            } catch (error) {
                statusDiv.classList.remove('d-none');
                statusMsg.textContent = 'A network error occurred. Please try again later.';
                statusMsg.className = 'text-danger fw-bold';
                statusIcon.className = 'bi bi-wifi-off text-danger me-2';
            } finally {
                btn.disabled = false;
                btnText.classList.remove('d-none');
                btnSpinner.classList.add('d-none');
            }
        });
    </script>
</body>
</html>
