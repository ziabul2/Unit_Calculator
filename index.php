<?php
/**
 * Smart Biller - Main Interface
 * Entry point for the Unit Calculator Application.
 */
require_once 'smart-biller/includes/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Biller | Premium Unit Calculator</title>
    
    <!-- Google Fonts: Inter & Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- Custom Styles -->
    <link rel="stylesheet" href="smart-biller/assets/css/style.css">
</head>
<body class="bg-dark text-light">

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark-soft border-bottom border-secondary border-opacity-25 py-3 mb-5 sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold gradient-text fs-3" href="index.php">
                <i class="bi bi-lightning-charge-fill me-2"></i>Smart Biller
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navContent">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link text-light px-3 active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light px-3" href="smart-biller/pages/about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light px-3" href="smart-biller/pages/contact.php">Contact</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <button class="btn btn-outline-cyan rounded-pill px-4" id="viewHistoryBtn">
                            <i class="bi bi-clock-history me-1"></i> History
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid py-4">
        <!-- Header Section (Removed and replaced by Nav) -->
        
        <div class="row g-4 justify-content-center">
            <!-- Left Column: Inputs -->
            <div class="col-lg-5">
                <div class="card glass-card border-0 shadow-lg h-100">
                    <div class="card-body p-4">
                        <h4 class="card-title mb-4 d-flex align-items-center">
                            <i class="bi bi-calculator-fill me-2 text-cyan"></i> 
                            Billing Inputs
                        </h4>
                        
                        <form id="billingForm">
                            <!-- Mode Selection (unchanged) -->
                            <div class="mb-4">
                                <label class="form-label text-secondary small text-uppercase fw-bold">Billing Mode</label>
                                <div class="btn-group w-100" role="group">
                                    <input type="radio" class="btn-check" name="mode" id="modeSingle" value="single" checked>
                                    <label class="btn btn-outline-cyan py-3" for="modeSingle">
                                        <i class="bi bi-person-fill"></i> Single Meter
                                    </label>
                                    
                                    <input type="radio" class="btn-check" name="mode" id="modeDual" value="dual">
                                    <label class="btn btn-outline-emerald py-3" for="modeDual">
                                        <i class="bi bi-people-fill"></i> Dual (Main + Sub)
                                    </label>
                                </div>
                            </div>

                            <!-- Meter Readings -->
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small text-secondary fw-bold">Previous Reading</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent border-secondary text-secondary">
                                            <i class="bi bi-dash-circle"></i>
                                        </span>
                                        <input type="number" step="0.01" class="form-control bg-transparent text-light border-secondary" id="mainPrev" placeholder="0.00" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small text-secondary fw-bold">Current Reading</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent border-secondary text-secondary">
                                            <i class="bi bi-plus-circle"></i>
                                        </span>
                                        <input type="number" step="0.01" class="form-control bg-transparent text-light border-secondary" id="mainCurr" placeholder="0.00" required>
                                    </div>
                                </div>
                            </div>

                            <div id="subMeterSection" class="mt-4 collapse">
                                <hr class="border-secondary opacity-25">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label small text-secondary fw-bold">Sub-Meter Previous</label>
                                        <input type="number" step="0.01" class="form-control bg-transparent text-light border-secondary" id="subPrev" placeholder="0.00">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small text-secondary fw-bold">Sub-Meter Current</label>
                                        <input type="number" step="0.01" class="form-control bg-transparent text-light border-secondary" id="subCurr" placeholder="0.00">
                                    </div>
                                </div>
                            </div>

                            <hr class="border-secondary opacity-25 mt-4">

                            <!-- Fixed Charges -->
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small text-secondary fw-bold">Demand Charge (Tk)</label>
                                    <input type="number" step="0.01" class="form-control bg-transparent text-light border-secondary" id="demandCharge" value="42.00">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small text-secondary fw-bold">VAT (%)</label>
                                    <input type="number" step="0.01" class="form-control bg-transparent text-light border-secondary" id="vatPercent" value="5">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary-gradient w-100 mt-5 py-3 fw-bold text-uppercase">
                                <i class="bi bi-lightning-charge-fill me-2"></i> Calculate Bill
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Column: Results -->
            <div class="col-lg-7">
                <div class="card glass-card border-0 shadow-lg h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title m-0 d-flex align-items-center">
                                <i class="bi bi-receipt-cutoff me-2 text-emerald"></i> 
                                Bill Breakdown
                            </h4>
                            <div id="actionButtons" class="d-none">
                                <button class="btn btn-sm btn-outline-light me-2" id="saveBillBtn">
                                    <i class="bi bi-save me-1"></i> Save
                                </button>
                                <button class="btn btn-sm btn-outline-cyan" id="exportPdfBtn">
                                    <i class="bi bi-file-earmark-pdf me-1"></i> PDF
                                </button>
                            </div>
                        </div>

                        <div id="resultsPlaceholder" class="text-center py-5">
                            <i class="bi bi-activity display-1 text-secondary opacity-25"></i>
                            <p class="mt-3 text-secondary">Enter readings and click calculate to see results</p>
                        </div>

                        <div id="resultsArea" class="d-none">
                            <!-- Summary Cards -->
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <div class="p-3 rounded-3 bg-dark-soft border border-secondary border-opacity-25">
                                        <div class="small text-secondary fw-bold text-uppercase">Total Consumption</div>
                                        <div class="h2 m-0 fw-bold" id="resTotalUnits">0.00 <span class="fs-6 fw-normal text-secondary">Units</span></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 rounded-3 bg-dark-soft border border-secondary border-opacity-25">
                                        <div class="small text-secondary fw-bold text-uppercase">Total Bill Amount</div>
                                        <div class="h2 m-0 fw-bold text-emerald" id="resTotalBill">৳0.00</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Detailed Split Table -->
                            <div class="table-responsive">
                                <table class="table table-dark table-hover align-middle border-secondary border-opacity-25">
                                    <thead class="bg-dark-soft">
                                        <tr>
                                            <th>Description</th>
                                            <th class="text-end" id="ownerLabel">Owner</th>
                                            <th class="text-end tenant-col d-none">Tenant</th>
                                            <th class="text-end fw-bold">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="billEntries">
                                        <!-- Dynamically populated -->
                                    </tbody>
                                </table>
                            </div>

                            <div class="p-3 rounded-3 bg-emerald bg-opacity-10 border border-emerald border-opacity-25 mt-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-emerald fw-bold">Effective Average Rate</span>
                                    <span class="h5 m-0 fw-bold text-emerald" id="resAvgRate">৳0.00 / Unit</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- History Button (Relocated to Nav) -->
    </div>

    <!-- Modals -->
    <div class="modal fade" id="historyModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content glass-card border-secondary border-opacity-25 text-light">
                <div class="modal-header border-secondary border-opacity-25">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-clock-history me-2 text-cyan"></i> Billing History
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="table-responsive">
                        <table class="table table-dark table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Units</th>
                                    <th>Amount</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="historyTableBody">
                                <!-- Populated from LocalStorage -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>
    <script src="smart-biller/assets/js/calculator.js"></script>
    <script src="smart-biller/assets/js/export-pdf.js"></script>
</body>
</html>
