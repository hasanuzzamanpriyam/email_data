<?php
require_once dirname(dirname(dirname(__DIR__))) . '/assets/php/config.php';
require_once __DIR__ . '/PHPMailer/PHPMailerAutoload.php';

class Auth extends Database
{

    public function inert_email($title, $category, $total_email, $short_description, $description, $price)
    {
        $sql = "INSERT INTO email_short_info (title, category, total_email, short_description, description, price) VALUES(:title, :category, :total_email, :short_description, :description, :price)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'title' => $title,
            'category' => $category,
            'total_email' => $total_email,
            'short_description' => $short_description,
            'description' => $description,
            'price' => $price
        ]);
        return true;
    }

    public function get_emails()
    {
        $sql = "SELECT * FROM email_short_info ORDER BY category ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_topup()
    {
        $sql = "SELECT * FROM topup";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    public function get_page()
    {
        $sql = "SELECT DISTINCT page FROM seo ORDER BY page ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_feedback($id)
    {
        $sql = "DELETE FROM feedback WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return true;
    }

    public function inert_seo($page, $seoTitle, $seoUrl, $seoKey, $seoDes)
    {
        try {
            $sql = "INSERT INTO seo (page, title, url, key_word, description) 
                    VALUES(:page, :title, :url, :key_word, :description)
                    ON DUPLICATE KEY UPDATE 
                        title = VALUES(title),
                        url = VALUES(url),
                        key_word = VALUES(key_word),
                        description = VALUES(description)";

            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute([
                'page' => $page,
                'title' => $seoTitle,
                'url' => $seoUrl,
                'key_word' => $seoKey,
                'description' => $seoDes
            ]);

            $rowCount = $stmt->rowCount();

            if ($rowCount == 1) {
                return 'inserted';
            } else if ($rowCount == 2) {
                return 'updated';
            } else if ($rowCount == 0) {
                return 'no-changes';
            }

            return 'error';
        } catch (PDOException $e) {
            return 'database-error: ' . $e->getMessage();
        }
    }

    public function inert_coupon($postName, $couponTitle, $trackingID, $limitation, $couponType, $amount)
    {
        $sql = "INSERT INTO `coupon`(`post_title`, `coupon_title`, `tacking_id`, `limitation`, `coupon_type`, `amount`) VALUES ('$postName','$couponTitle','$trackingID','$limitation','$couponType','$amount')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return true;
    }

    public function get_coupon()
    {
        $sql = "SELECT DISTINCT * FROM coupon ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_seo_page()
    {
        $sql = "SELECT DISTINCT * FROM seo ORDER BY page ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_all_user()
    {
        $sql = "SELECT DISTINCT * FROM clients_info WHERE band != 'Band' OR band IS NULL ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_all_band_user()
    {
        $sql = "SELECT DISTINCT * FROM clients_info WHERE band = 'Band' ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_blogs()
    {
        $sql = "SELECT * FROM blogs ORDER by created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    public function edit_blog($id)
    {
        $sql = "SELECT * FROM blogs WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
    public function delete_blog($id)
    {
        $sql = "DELETE FROM blogs WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return true;
    }

    public function get_orders()
    {
        $sql = "SELECT * FROM order_info WHERE status = 'Processing' ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function get_failed_orders()
    {
        $sql = "SELECT * FROM order_info WHERE status = 'Payment Failed' ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_cancel_orders()
    {
        $sql = "SELECT * FROM order_info WHERE status = 'Cancel' ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_refund_orders()
    {
        $sql = "SELECT * FROM order_info WHERE status = 'Refund' ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_sales()
    {
        $sql = "SELECT * FROM order_info WHERE status = 'Completed' ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_subscription()
    {
        $sql = "SELECT * FROM email_collection ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_feedback()
    {
        $sql = "SELECT * FROM feedback ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function reply_feedback($id, $message)
    {
        $sql = "SELECT email FROM feedback WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $to = $user['email'];

        try {
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = '69.197.191.106';
            $mail->SMTPAuth = true;
            $mail->Username = 'support@emailbigdata.com';
            $mail->Password = 'Nazmul@@2025$$';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Bypass SSL verification for localhost/laragon
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $mail->setFrom('support@emailbigdata.com', 'EmailBigData Support');
            $mail->addAddress($to);
            $mail->isHTML(true);
            $mail->Subject = 'Reply to your feedback - EmailBigData';
            $mail->Body = "
                <h3>Reply to your feedback</h3>
                <p>Dear User,</p>
                <p>Admin has checked your feedback and here is the reply:</p>
                <p>" . nl2br(htmlspecialchars($message)) . "</p>
                <br>
                <p>Regards,</p>
                <p>EmailBigData Team</p>
            ";

            if ($mail->send()) {
                return true;
            } else {
                return 'Error: ' . $mail->ErrorInfo;
            }
        } catch (Exception $e) {
            return 'Exception: ' . $e->getMessage();
        }
    }

    public function edit_order($id)
    {
        $sql = "SELECT * FROM order_info WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete_order($id)
    {
        $sql = "DELETE FROM order_info WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return true;
    }

    public function update_order($deliveryId, $status, $deliveryData)
    {
        $sql = "UPDATE order_info SET status= :status, delivery_file= :delivery_file WHERE id= :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'status' => $status,
            'delivery_file' => $deliveryData,
            'id' => $deliveryId
        ]);
        return true;
    }

    // ✅✅✅ THE FIXED METHOD ✅✅✅
    public function insert_order(
        $user_id,
        $price,
        $payment_id,
        $name,
        $email,
        $category,
        $type,
        $title,
        $total_email,
        $delivery_file,
        $days,
        $payment_method
    ) {
        // Fix: ensure delivery_file is never NULL
        if ($delivery_file === null) {
            $delivery_file = '';
        }

        $sql = "INSERT INTO order_info 
            (user_id, price, payment_id, name, email, category, type, title, total_email, delivery_file, days, payment_method) 
            VALUES 
            (:user_id, :price, :payment_id, :name, :email, :category, :type, :title, :total_email, :delivery_file, :days, :payment_method)";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'user_id' => $user_id,
            'price' => $price,
            'payment_id' => $payment_id,
            'name' => $name,
            'email' => $email,
            'category' => $category,
            'type' => $type,
            'title' => $title,
            'total_email' => $total_email,
            'delivery_file' => $delivery_file,
            'days' => $days,
            'payment_method' => $payment_method
        ]);

        return true;
    }

    public function edit_email($id)
    {
        $sql = "SELECT * FROM email_short_info WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function delete_email($id)
    {
        $sql = "DELETE FROM email_short_info WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return true;
    }

    public function edit_seo($id)
    {
        $sql = "SELECT * FROM seo WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function delete_seo($id)
    {
        try {
            $sql = "DELETE FROM seo WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute(['id' => $id]);

            if ($result && $stmt->rowCount() > 0) {
                return 'success';
            } else if ($stmt->rowCount() == 0) {
                return 'not-found';
            }

            return 'error';
        } catch (PDOException $e) {
            return 'database-error: ' . $e->getMessage();
        }
    }

    public function update_seo($id, $seoTitle, $seoUrl, $seoKey, $seoDes)
    {
        try {
            $sql = "UPDATE seo 
                     SET title = :title, 
                         url = :url, 
                         key_word = :key_word, 
                         description = :description 
                     WHERE id = :id";

            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute([
                'title' => $seoTitle,
                'url' => $seoUrl,
                'key_word' => $seoKey,
                'description' => $seoDes,
                'id' => $id
            ]);

            if ($result && $stmt->rowCount() > 0) {
                return 'success';
            } else if ($stmt->rowCount() == 0) {
                return 'no-changes';
            }

            return 'error';
        } catch (PDOException $e) {
            return 'database-error: ' . $e->getMessage();
        }
    }
}
