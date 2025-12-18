<?php
echo "Testing DB Connection...\n";

try {
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306', 'root', '');
    echo "Connected to 127.0.0.1\n";
} catch (Exception $e) {
    echo "Failed 127.0.0.1: " . $e->getMessage() . "\n";
}

try {
    $pdo = new PDO('mysql:host=localhost;port=3306', 'root', '');
    echo "Connected to localhost\n";
} catch (Exception $e) {
    echo "Failed localhost: " . $e->getMessage() . "\n";
}
