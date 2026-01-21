<?php
require_once 'assets/php/config.php';
$db = new Database();
try {
    $stmt = $db->conn->query('SELECT * FROM website_settings LIMIT 1');
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    print_r($result);
} catch (Exception $e) {
    echo $e->getMessage();
}
