<?php
/**
 * Smart Biller - Calculation API
 * Provides authoritative bill calculation results.
 */
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 0); // Prevent PHP errors from breaking JSON output
require_once '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    $mainPrev = floatval($input['mainPrev'] ?? 0);
    $mainCurr = floatval($input['mainCurr'] ?? 0);
    $subPrev = floatval($input['subPrev'] ?? 0);
    $subCurr = floatval($input['subCurr'] ?? 0);
    $demandCharge = floatval($input['demandCharge'] ?? 0);
    $vatPercent = floatval($input['vatPercent'] ?? 0);
    $mode = $input['mode'] ?? 'single';

    // 1. Calculate Consumption
    $totalUnits = max(0, $mainCurr - $mainPrev);
    $subUnits = ($mode === 'dual') ? max(0, $subCurr - $subPrev) : 0;

    // 2. Authoritative Slab Calculation
    $energyCost = BillingEngine::calculateEnergyCost($totalUnits);

    // 3. Apply VAT to (Energy Cost + Demand Charge)
    $vatAmount = ($energyCost + $demandCharge) * ($vatPercent / 100);
    $totalBill = ceil($energyCost + $demandCharge + $vatAmount);

    // 4. Split logic
    $splitData = BillingEngine::splitBill($totalUnits, $subUnits, $energyCost, $demandCharge, $vatAmount);

    $responseData = [
        'totalUnits' => $totalUnits,
        'subUnits' => $subUnits,
        'energyCost' => $energyCost,
        'demandChargeTotal' => round($demandCharge, 2),
        'vatAmountTotal' => round($vatAmount, 2),
        'totalBill' => $totalBill,
        'avgRate' => $splitData['avg_rate'],
        'owner' => $splitData['owner'],
        'tenant' => $splitData['tenant']
    ];

    // ----------------------------------

    $response = [
        'status' => 'success',
        'data' => $responseData
    ];

    echo json_encode($response);
    exit;
}

echo json_encode(['status' => 'error', 'message' => 'Invalid Request']);
