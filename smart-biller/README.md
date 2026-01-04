# Smart Biller - README

## Overview
Smart Biller is an electricity bill splitter for landlords and tenants. It uses the latest 2024 slab rates and a fair splitting algorithm.

## Folder Structure
- `/`: contains `index.php` (The entry point).
- `/smart-biller/`: contains all core application files.
  - `/includes/`: Authoritative PHP logic.
  - `/api/`: Stateless calculation endpoints.
  - `/assets/`: CSS and JS files for the premium UI.
  - `/config/`: Configuration files (DB connection etc).

## How to use
1. Host the project on a PHP-enabled server (XAMPP/WAMP).
2. Access `index.php` in your browser.
3. Select "Dual Meter" if you are splitting with a tenant.
4. Enter meter readings and click "Calculate".

## Tech Stack
- **PHP 8.x**: Authoritative Calculation.
- **Bootstrap 5**: Responsive Layout.
- **Pure JavaScript**: AJAX, LocalStorage & PDF.
- **jsPDF**: PDF Generation.
