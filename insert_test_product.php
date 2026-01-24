<?php
require_once __DIR__ . '/admin/assets/php/auth.php';

$user = new Auth();

$timestamp = time();
$category = "Test Category " . $timestamp;
$title1 = "Test Product 1";
$title2 = "Test Product 2";
$total_email = 5000;
$short_description = "Test list 1";
$description = "Description";
$price = 99;

echo "Attempting to insert Product 1 into '$category'...\n";
try {
    if ($user->inert_email($title1, $category, $total_email, $short_description, $description, $price)) {
        echo "Success: Product 1 inserted.\n";
    }
} catch (Exception $e) {
    echo "Error inserting Product 1: " . $e->getMessage() . "\n";
}

echo "Attempting to insert Product 2 into '$category' (Identical Category)...\n";
try {
    if ($user->inert_email($title2, $category, $total_email, $short_description, $description, $price)) {
        echo "Success: Product 2 inserted.\n";
    }
} catch (Exception $e) {
    echo "Error inserting Product 2: " . $e->getMessage() . "\n";
    echo "CONFIRMED: Category column has UNIQUE constraint.\n";
}
