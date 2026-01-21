<?php
require_once 'assets/php/config.php';
$db = new Database();
try {
    echo "Connection successful!\n";
    $stmt = $db->conn->query("DESCRIBE clients_info");
    $fields = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "Table 'clients_info' structure:\n";
    print_r($fields);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
