<?php
require_once __DIR__ . '/admin/assets/php/auth.php';

echo "Initializing Auth...\n";
$user = new Auth();

// 1. Get the newly inserted test product
echo "Fetching the test product...\n";
$sql = "SELECT id, category FROM email_short_info WHERE title = 'Test Product 1' ORDER BY id DESC LIMIT 1";
$stmt = $user->conn->prepare($sql);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    die("Error: Test Product 1 not found.\n");
}

$id = $product['id'];
$category = $product['category'];

echo "Testing with Product ID: $id, Category: $category\n";

// 2. Call get_related_products
echo "Calling get_related_products...\n";
try {
    $related = $user->get_related_products($category, 3, $id);

    echo "Result Count: " . count($related) . "\n";

    if (count($related) > 0) {
        echo "Related Products Found:\n";
        foreach ($related as $r) {
            echo "- ID: {$r['id']}, Category: {$r['category']}, Title: {$r['title']}\n";
            if ($r['id'] == $id) {
                echo " [FAIL] Returned related product has same ID as excludeId!\n";
            }
            if ($r['category'] != $category) {
                echo " [FAIL] Returned product has different category!\n";
            }
        }
    } else {
        echo "No related products found for this category (might be only 1 product in category).\n";
    }
} catch (Exception $e) {
    echo "Exception: " . $e->getMessage() . "\n";
}

echo "Done.\n";
