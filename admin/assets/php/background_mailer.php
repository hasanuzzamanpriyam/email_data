<?php
// Set execution limit to avoid timeouts if processing many emails
set_time_limit(300); // 5 minutes

// Include Auth to access DB and Email method
require_once __DIR__ . '/auth.php';
$auth = new Auth();

try {
    // 1. Fetch pending jobs (Limit 5 to prevent overload, script can be re-triggered)
    $sql = "SELECT * FROM mail_queue WHERE status = 'pending' LIMIT 5";
    $stmt = $auth->conn->prepare($sql);
    $stmt->execute();
    $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($jobs) > 0) {
        foreach ($jobs as $job) {
            $id = $job['id'];

            // 2. Mark as inprogress to prevent race conditions
            $update = $auth->conn->prepare("UPDATE mail_queue SET status = 'inprogress' WHERE id = :id");
            $update->execute(['id' => $id]);

            // 3. Send Email
            // Note: deliveryFiles/ path is relative to this script directory (admin/assets/php/)
            $result = $auth->send_delivery_email($job['to_email'], $job['name'], $job['title'], $job['file_path']);

            // 4. Update Status based on result
            if ($result === true) {
                // Success
                $finish = $auth->conn->prepare("UPDATE mail_queue SET status = 'sent', updated_at = NOW() WHERE id = :id");
                $finish->execute(['id' => $id]);
            } else {
                // Failure
                $finish = $auth->conn->prepare("UPDATE mail_queue SET status = 'failed', error_msg = :msg, updated_at = NOW() WHERE id = :id");
                $finish->execute(['id' => $id, 'msg' => (string)$result]);
            }
        }
    }
} catch (Exception $e) {
    // Log fatal errors
    file_put_contents(__DIR__ . '/email_queue_error.log', date('Y-m-d H:i:s') . ' - ' . $e->getMessage() . PHP_EOL, FILE_APPEND);
}
