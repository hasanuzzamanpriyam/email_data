<?php
require_once 'assets/php/config.php';
$db = new Database();
try {
    $db->conn->exec("ALTER TABLE clients_info MODIFY token VARCHAR(255)");
    $db->conn->exec("ALTER TABLE clients_info MODIFY token_expire DATETIME");
    echo "Schema updated successfully!\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
