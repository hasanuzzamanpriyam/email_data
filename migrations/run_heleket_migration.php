<?php
$host = 'localhost';
$dbname = 'bookyourdata_ebd';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "ALTER TABLE order_info 
        ADD COLUMN heleket_uuid VARCHAR(36) NULL COMMENT 'Heleket invoice UUID',
        ADD COLUMN heleket_status VARCHAR(20) NULL COMMENT 'Heleket payment status',
        ADD COLUMN heleket_address VARCHAR(255) NULL COMMENT 'Heleket payment wallet address',
        ADD COLUMN heleket_txid VARCHAR(255) NULL COMMENT 'Heleket transaction hash'";

    $pdo->exec($sql);
    echo "Migration completed successfully!\n";
    echo "Added columns to order_info table:\n";
    echo "- heleket_uuid\n";
    echo "- heleket_status\n";
    echo "- heleket_address\n";
    echo "- heleket_txid\n";

} catch (PDOException $e) {
    echo "Migration failed: " . $e->getMessage() . "\n";
    exit(1);
}
?>
