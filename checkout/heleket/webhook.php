<?php
require_once '../assets/php/auth.php';
require_once 'heleket_config.php';
require_once 'HeleketClient.php';

$user = new Auth();
$heleket = new HeleketClient(HELEKET_MERCHANT_ID, HELEKET_PAYMENT_API_KEY, HELEKET_API_URL);

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!$data) {
    http_response_code(400);
    exit('Invalid JSON');
}

$receivedSign = $data['sign'] ?? '';

if (!$heleket->verifyWebhookSignature($data, $receivedSign, HELEKET_PAYMENT_API_KEY)) {
    http_response_code(401);
    exit('Invalid signature');
}

$order_id = $data['order_id'] ?? '';
$status = $data['status'] ?? '';
$uuid = $data['uuid'] ?? '';

$validStatuses = ['paid', 'confirm_check', 'paid_over', 'fail', 'wrong_amount', 'cancel', 'system_fail', 'refund_process', 'refund_fail', 'refund_paid'];

if (!in_array($status, $validStatuses)) {
    http_response_code(400);
    exit('Invalid payment status');
}

$paymentStatusMap = [
    'paid' => 'Paid',
    'paid_over' => 'Paid',
    'confirm_check' => 'Processing',
    'fail' => 'Failed',
    'wrong_amount' => 'Failed',
    'cancel' => 'Cancelled',
    'system_fail' => 'Failed',
    'refund_process' => 'Refunding',
    'refund_fail' => 'Refund Failed',
    'refund_paid' => 'Refunded'
];

$finalStatus = $paymentStatusMap[$status] ?? 'Processing';

try {
    $order = $user->order_info($order_id);

    if (!$order) {
        http_response_code(404);
        exit('Order not found');
    }

    if (in_array($status, ['paid', 'paid_over'])) {
        $user->update_order_status($order_id, 'Paid');
        
        $sql = "UPDATE order_info SET 
            heleket_uuid = ?, 
            heleket_status = ?,
            heleket_address = ?,
            heleket_txid = ? 
            WHERE tracking_id = ?";
        
        $stmt = $user->conn->prepare($sql);
        $stmt->execute([
            $uuid,
            $finalStatus,
            $data['address'] ?? '',
            $data['txid'] ?? '',
            $order_id
        ]);
    } elseif (in_array($status, ['fail', 'wrong_amount', 'cancel', 'system_fail'])) {
        $user->update_order_status($order_id, 'Failed');
        
        $sql = "UPDATE order_info SET 
            heleket_uuid = ?, 
            heleket_status = ?,
            heleket_address = ?,
            heleket_txid = ? 
            WHERE tracking_id = ?";
        
        $stmt = $user->conn->prepare($sql);
        $stmt->execute([
            $uuid,
            $finalStatus,
            $data['address'] ?? '',
            $data['txid'] ?? '',
            $order_id
        ]);
    } else {
        $sql = "UPDATE order_info SET 
            heleket_uuid = ?, 
            heleket_status = ?,
            heleket_address = ?,
            heleket_txid = ? 
            WHERE tracking_id = ?";
        
        $stmt = $user->conn->prepare($sql);
        $stmt->execute([
            $uuid,
            $finalStatus,
            $data['address'] ?? '',
            $data['txid'] ?? '',
            $order_id
        ]);
    }

    $logMessage = date('Y-m-d H:i:s') . " - Heleket Webhook - Order: $order_id, Status: $status, UUID: $uuid\n";
    file_put_contents('heleket_webhook.log', $logMessage, FILE_APPEND);

    http_response_code(200);
    echo 'OK';

} catch (Exception $e) {
    http_response_code(500);
    $logMessage = date('Y-m-d H:i:s') . " - Heleket Webhook Error: " . $e->getMessage() . "\n";
    file_put_contents('heleket_webhook.log', $logMessage, FILE_APPEND);
    echo 'Error: ' . $e->getMessage();
}
?>
