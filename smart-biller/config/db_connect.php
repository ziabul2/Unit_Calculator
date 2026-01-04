<?php
/**
 * Smart Biller - Database Connection
 * Using PDO for secure MySQL interaction.
 * Note: LocalStorage is the primary persistence, this is for future extension.
 */

$host = 'localhost';
$db   = 'unit_calculator';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ATTR_ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::ATTR_FETCH_MODE_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     // $pdo = new PDO($dsn, $user, $pass, $options);
     // Note: Connection is commented out to prevent errors if DB doesn't exist yet.
     // LocalStorage will be used for Phase 1.
} catch (\PDOException $e) {
     // throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
