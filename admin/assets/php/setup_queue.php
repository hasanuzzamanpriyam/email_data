<?php
require_once 'auth.php';
$auth = new Auth();
try {
    // Mail Queue
    $sql = "CREATE TABLE IF NOT EXISTS mail_queue (
        id INT AUTO_INCREMENT PRIMARY KEY,
        to_email VARCHAR(255),
        name VARCHAR(255),
        title VARCHAR(255),
        file_path VARCHAR(255),
        status ENUM('pending', 'inprogress', 'sent', 'failed') DEFAULT 'pending',
        attempts INT DEFAULT 0,
        error_msg TEXT,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    $auth->conn->exec($sql);
    echo "Mail Queue Table Checked/Created<br>";

    // Notification Table (for system alerts)
    $sql2 = "CREATE TABLE IF NOT EXISTS notification (
             id INT AUTO_INCREMENT PRIMARY KEY,
             uid INT NOT NULL,
             type VARCHAR(50),
             message TEXT,
             created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )";
    $auth->conn->exec($sql2);
    echo "Notification Table Checked/Created<br>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
