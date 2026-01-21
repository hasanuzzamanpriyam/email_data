<?php
require_once 'assets/php/config.php';
$db = new Database();
try {
    $stmt = $db->conn->query('SHOW TABLES');
    $result = $stmt->fetchAll(PDO::FETCH_COLUMN);
    print_r($result);
} catch (Exception $e) {
    echo $e->getMessage();
}
