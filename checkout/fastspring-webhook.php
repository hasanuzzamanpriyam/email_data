<?php
require_once '../assets/php/auth.php';
$user = new Auth();

$payload = file_get_contents('php://input');
$data = json_decode($payload, true);

$expectedUser = "ELAIFS4RTNSDSEJFOAYHXQ";
$expectedPass = "ItiqheXhSfKaqe2me1VXOw";

if (!isset($_SERVER['PHP_AUTH_USER']) || 
    $_SERVER['PHP_AUTH_USER'] !== $expectedUser || 
    $_SERVER['PHP_AUTH_PW'] !== $expectedPass) {
    http_response_code(401);
    exit("Unauthorized");
}

if (!empty($data['events'])) {
    foreach ($data['events'] as $event) {
        if ($event['type'] === 'order.completed') {
            $orderReference = $event['data']['id'];
            $status = "Paid";
            $user->update_order_status($orderReference, $status);
            file_put_contents("fastspring_log.txt", date('Y-m-d H:i:s')." - Order $orderReference Paid\n", FILE_APPEND);
        }
    }
}

http_response_code(200);
echo "OK";