<?php
/**
 * Smart Biller - Authoritative Logic Layer
 * Single source of truth for energy and cost split calculations.
 */

class BillingEngine {
    // Current Rates as per NESCO/Official Gazette 2024
    private static $slabs = [
        ['limit' => 75, 'rate' => 5.26],
        ['limit' => PHP_INT_MAX, 'rate' => 7.20]
    ];

    /**
     * Calculate Energy Cost based on slabs
     */
    public static function calculateEnergyCost($units) {
        if ($units <= 0) return 0;
        
        $totalCost = 0;
        $remainingUnits = $units;
        $previousLimit = 0;

        foreach (self::$slabs as $slab) {
            $slabRange = $slab['limit'] - $previousLimit;
            $unitsInThisSlab = min($remainingUnits, $slabRange);
            $totalCost += $unitsInThisSlab * $slab['rate'];
            
            $remainingUnits -= $unitsInThisSlab;
            $previousLimit = $slab['limit'];
            
            if ($remainingUnits <= 0) break;
        }

        return round($totalCost, 2);
    }

    /**
     * Fair Splitting Logic (Dual Meter Mode)
     * Ensures both parties share the benefit of lower slabs proportionally.
     */
    public static function splitBill($totalUnits, $subUnits, $energyCost, $fixedCharges) {
        if ($totalUnits <= 0) {
            return [
                'owner' => ['units' => 0, 'energy' => 0, 'fixed' => 0, 'total' => 0],
                'tenant' => ['units' => 0, 'energy' => 0, 'fixed' => 0, 'total' => 0],
                'avg_rate' => 0
            ];
        }

        $avgRate = $energyCost / $totalUnits;
        
        $tenantUnits = $subUnits;
        $ownerUnits = max(0, $totalUnits - $subUnits);

        $tenantEnergy = $tenantUnits * $avgRate;
        $ownerEnergy = $ownerUnits * $avgRate;

        // Fixed costs (Demand Charge + VAT) split 50/50
        $fixedSplit = $fixedCharges / 2;

        return [
            'owner' => [
                'units' => round($ownerUnits, 2),
                'energy' => round($ownerEnergy, 2),
                'fixed' => round($fixedSplit, 2),
                'total' => ceil($ownerEnergy + $fixedSplit)
            ],
            'tenant' => [
                'units' => round($tenantUnits, 2),
                'energy' => round($tenantEnergy, 2),
                'fixed' => round($fixedSplit, 2),
                'total' => ceil($tenantEnergy + $fixedSplit)
            ],
            'avg_rate' => round($avgRate, 2)
        ];
    }
}
