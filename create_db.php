<?php
try {
    $pdo = new PDO('mysql:host=localhost;port=3306', 'root', '');
    $pdo->exec("CREATE DATABASE IF NOT EXISTS kantin_wakaf");
    echo "Database created successfully.\n";
} catch (Exception $e) {
    echo "Failed to create DB: " . $e->getMessage() . "\n";
}
