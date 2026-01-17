<?php
require_once 'admin/assets/php/auth.php';
$auth = new Auth();
try {
    $stmt = $auth->conn->query("SELECT * FROM mail_queue ORDER BY created_at DESC LIMIT 10");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($results, JSON_PRETTY_PRINT);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
