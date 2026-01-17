<?php
require_once 'admin/assets/php/auth.php';
$auth = new Auth();

echo "--- DESCRIBE order_info ---\n";
$stmt = $auth->conn->query("DESCRIBE order_info");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($results);

echo "\n--- TESTING SMTP CONNECTIVITY ---\n";
// Trying to send a test email with SMTP debug
// Create a dummy file if not exists
$testFile = 'test_delivery_file.txt';
if (!file_exists(__DIR__ . '/admin/assets/php/' . $testFile)) {
    file_put_contents(__DIR__ . '/admin/assets/php/' . $testFile, 'This is a test file content.');
}

echo "Attempting to send delivery email...\n";
$result = $auth->send_delivery_email('h.priyam1999@gmail.com', 'Test User', 'Test Order 123', $testFile);

if ($result === true) {
    echo "\nDelivery Email Sent Successfully!\n";
} else {
    echo "\nDelivery Email Failed!\n";
    echo "Error: " . $result . "\n";
}
