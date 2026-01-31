<?php
// Define the site root
define('SITE_ROOT', __DIR__);

// Include necessary files
// Adjust paths as necessary based on where they are relative to this script
require_once SITE_ROOT . '/assets/php/config.php';
// Database class is in config.php, so no need to require Database.php separately
require_once SITE_ROOT . '/assets/php/auth.php';

$user = new Auth();

// Check if Test Item 1 already exists
$existingItem = $user->specific_email_list('Test Item 1');

$ids = []; // Initialize $ids here

if ($existingItem) {
    echo "Test Item 1 already exists via specific_email_list().\n";
    $ids[] = $existingItem['id'];
    $currentInfo = $existingItem;
} else {
    // Only insert if not exists
    $testGroup = "Test Group " . rand(1000, 9999);
    echo "Creating 5 test products in group: '$testGroup'...\n";

    for ($i = 1; $i <= 5; $i++) {
        $title = $testGroup;
        $category = "Test Item $i";
        $total_email = 1000 * $i;
        $short_desc = "Short description for Test Item $i";
        $desc = "Long description for Test Item $i";
        $price = 100 + $i;

        try {
            if ($user->inert_email($title, $category, $total_email, $short_desc, $desc, $price)) {
                echo "Inserted: $category\n";
                $product = $user->specific_international($title, $category);
                if ($product) $ids[] = $product['id'];
            }
        } catch (Exception $e) {
            echo "Skipping $category: " . $e->getMessage() . "\n";
        }
    }
}

if (!empty($ids) || isset($currentInfo)) {
    echo "\nVerifying Related Products Logic...\n";

    if (!isset($currentInfo)) {
        $currentId = $ids[0];
        $currentInfo = $user->specific_email_list_id($currentId);
    } else {
        $currentId = $currentInfo['id'];
    }

    echo "Current Product: " . $currentInfo['category'] . " (ID: $currentId, Group: " . $currentInfo['title'] . ")\n";

    // Fetch related
    // NOTE: This uses the logic we verified: searching by TITLE (Group)
    $related = $user->get_related_products($currentInfo['title'], 3, $currentId);

    echo "Found " . count($related) . " related products:\n";
    foreach ($related as $rel) {
        echo "- " . $rel['category'] . " (ID: " . $rel['id'] . ", Group: " . $rel['title'] . ")\n";
        if ($rel['id'] == $currentId) {
            echo "  ERROR: Current ID returned in related list!\n";
        }
    }

    echo "\nYou can view the product in browser at: product-template.php?id=$currentId\n";
} else {
    echo "No products found or created.\n";
}
