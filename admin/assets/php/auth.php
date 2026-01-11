<?php
require_once dirname(dirname(dirname(__DIR__))) . '/assets/php/config.php';

class Auth extends Database {

    public function inert_email($title, $category, $total_email, $short_description, $description, $price) {
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

    public function get_emails() {
        $sql = "SELECT * FROM email_short_info ORDER BY category ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
        public function get_topup() {
            $sql = "SELECT * FROM topup";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
    public function get_page() {
        $sql = "SELECT DISTINCT category FROM email_short_info ORDER BY category ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function inert_seo($page, $seoTitle, $seoKey, $seoDes) {
        $sql = "INSERT INTO seo (page, title, key_word, description) VALUES(:page, :title, :key_word, :description)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'page' => $page,
            'title' => $seoTitle,
            'key_word' => $seoKey,
            'description' => $seoDes
        ]);
        return true;
    }

    public function inert_coupon($postName, $couponTitle, $trackingID, $limitation, $couponType, $amount) {
        $sql = "INSERT INTO `coupon`(`post_title`, `coupon_title`, `tacking_id`, `limitation`, `coupon_type`, `amount`) VALUES ('$postName','$couponTitle','$trackingID','$limitation','$couponType','$amount')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return true;
    }

    public function get_coupon() {
        $sql = "SELECT DISTINCT * FROM coupon ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_seo_page() {
        $sql = "SELECT DISTINCT * FROM seo ORDER BY page ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_all_user() {
        $sql = "SELECT DISTINCT * FROM clients_info WHERE band != 'Band' OR band IS NULL ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_all_band_user() {
        $sql = "SELECT DISTINCT * FROM clients_info WHERE band = 'Band' ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
   public function get_blogs(){
            $sql = "SELECT * FROM blogs ORDER by created_at DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        public function edit_blog($id){
            $sql = "SELECT * FROM blogs WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=> $id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        }
        public function delete_blog($id){
            $sql = "DELETE FROM blogs WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            return true;
        }

    public function get_orders() {
        $sql = "SELECT * FROM order_info WHERE status = 'Processing' ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function get_failed_orders() {
        $sql = "SELECT * FROM order_info WHERE status = 'Payment Failed' ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_cancel_orders() {
        $sql = "SELECT * FROM order_info WHERE status = 'Cancel' ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_refund_orders() {
        $sql = "SELECT * FROM order_info WHERE status = 'Refund' ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_sales() {
        $sql = "SELECT * FROM order_info WHERE status = 'Completed' ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_subscription() {
        $sql = "SELECT * FROM email_collection ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_feedback() {
        $sql = "SELECT * FROM feedback ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function edit_order($id) {
        $sql = "SELECT * FROM order_info WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete_order($id) {
        $sql = "DELETE FROM order_info WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return true;
    }

    public function update_order($deliveryId, $status, $deliveryData) {
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
    

}
?>