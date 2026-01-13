<?php
    require_once 'config.php';

    class Auth extends Database{
        public function inert_email($title, $category, $total_email, $short_description, $description, $price) {
            $sql = "INSERT INTO email_short_info (title, category,  total_email, short_description, description,price) VALUES(:title, :category,  :total_email, :short_description, :description, :price)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['title' => $title, 'category' => $category, 'total_email' => $total_email, 'short_description' => $short_description, 'description' => $description, 'price' => $price]);
            return true;
        }
        public function get_emails(){
            $sql = "SELECT * FROM email_short_info";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        public function get_page(){
            $sql = "SELECT DISTINCT page FROM seo ORDER BY page ASC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        public function inert_seo($page, $seoTitle, $seoUrl, $seoKey, $seoDes) {
            try {
                $sql = "INSERT INTO seo (page, title, url, key_word, description) 
                        VALUES(:page, :title, :url, :key_word, :description)
                        ON DUPLICATE KEY UPDATE 
                            title = VALUES(title),
                            url = VALUES(url),
                            key_word = VALUES(key_word),
                            description = VALUES(description)";
                
                $stmt = $this->conn->prepare($sql);
                $result = $stmt->execute(['page' => $page, 'title' => $seoTitle, 'url' => $seoUrl, 'key_word' => $seoKey, 'description' => $seoDes]);

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
        public function inert_coupon($postName, $couponTitle, $trackingID, $limitation, $couponType, $amount) {
            $sql = "INSERT INTO `coupon`(`post_title`, `coupon_title`, `tacking_id`, `limitation`, `coupon_type`, `amount`) VALUES ('$postName','$couponTitle','$trackingID','$limitation','$couponType','$amount')";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return true;
        }
        public function get_coupon(){
            $sql = "SELECT DISTINCT * FROM coupon ORDER BY post_title ASC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        public function get_seo_page(){
            $sql = "SELECT DISTINCT * FROM seo ORDER BY page ASC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        public function get_all_user(){
            $sql = "SELECT DISTINCT * FROM clients_info WHERE band != 'Band' OR band IS NULL ORDER BY first_name ASC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        public function get_all_band_user(){
            $sql = "SELECT DISTINCT * FROM clients_info WHERE band = 'Band' ORDER BY first_name ASC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        
        public function get_orders(){
            $sql = "SELECT * FROM order_info WHERE status != 'Completed' ORDER BY username";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        public function get_sales(){
            $sql = "SELECT * FROM order_info WHERE status = 'Completed' ORDER BY username";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        public function get_subscription(){
            $sql = "SELECT * FROM email_collection ORDER BY email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        public function get_feedback(){
            $sql = "SELECT * FROM feedback ORDER BY first_name";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        public function total_user_number(){
            $sql = "SELECT * FROM clients_info";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        public function total_email_number(){
            $sql = "SELECT * FROM email_short_info";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        public function total_order_number(){
            $sql = "SELECT * FROM order_info WHERE status != 'Completed' ORDER BY username";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        public function total_sales_number(){
            $sql = "SELECT * FROM order_info WHERE status = 'Completed' ORDER BY username";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        public function total_feedback_number(){
            $sql = "SELECT * FROM feedback";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        public function total_subscription_number(){
            $sql = "SELECT * FROM email_collection";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        public function edit_order($id){
            $sql = "SELECT * FROM order_info WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=> $id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        }
        public function delete_order($id){
            $sql = "DELETE FROM order_info WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            return true;
        }
        public function update_sale($saleId, $days, $deliveryData){
            $sql ="UPDATE order_info SET days= :days, delivery_file= :delivery_file WHERE id= :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['days'=>$days, 'delivery_file'=>$deliveryData, 'id'=>$saleId]);

            return true;
        }
        public function edit_seo($id){
            $sql = "SELECT * FROM seo WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=> $id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        }
        public function get_top_user($id){
            $sql = "SELECT * FROM clients_info WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=> $id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        }
        public function delete_seo($id){
            try {
                $sql = "DELETE FROM seo WHERE id = :id";
                $stmt = $this->conn->prepare($sql);
                $result = $stmt->execute(['id'=>$id]);
                
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
        public function edit_coupon($id){
            $sql = "SELECT * FROM coupon WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=> $id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        }
        public function delete_coupon($id){
            $sql = "DELETE FROM coupon WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            return true;
        }
        public function update_order($deliveryId, $status, $deliveryData){
            $sql ="UPDATE order_info SET status= :status, delivery_file= :delivery_file WHERE id= :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['status'=>$status, 'delivery_file'=>$deliveryData, 'id'=>$deliveryId]);

            return true;
        }
        public function update_coupon($id, $couponTitle, $track, $limit, $type, $amount){
            $sql ="UPDATE coupon SET coupon_title= :coupon_title, tacking_id= :tacking_id, limitation= :limitation, coupon_type= :coupon_type, amount= :amount WHERE id= :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['coupon_title'=>$couponTitle, 'tacking_id'=>$track, 'limitation'=>$limit, 'coupon_type'=>$type, 'amount'=>$amount, 'id'=>$id]);

            return true;
        }
        public function update_seo($id, $seoTitle, $seoUrl, $seoKey, $seoDes){
            try {
                $sql = "UPDATE seo 
                         SET title = :title, 
                             url = :url, 
                             key_word = :key_word, 
                             description = :description 
                         WHERE id = :id";
                
                $stmt = $this->conn->prepare($sql);
                $result = $stmt->execute(['title' => $seoTitle, 'url' => $seoUrl, 'key_word' => $seoKey, 'description' => $seoDes,'id' => $id]);
                
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
        public function edit_email($id){
            $sql = "SELECT * FROM email_short_info WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=> $id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        }
        public function delete_email($id){
            $sql = "DELETE FROM email_short_info WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            return true;
        }
        public function bandUser($id){
            $sql = "UPDATE clients_info SET band= :band WHERE id= :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['band' => 'Band','id' => $id]);
            return true;
        }
        public function returnUser($id){
            $sql = "UPDATE clients_info SET band= :band WHERE id= :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['band' => '','id' => $id]);
            return true;
        }
        public function get_top_amount($topUid){
            $sql = "SELECT * FROM clients_info WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=> $topUid]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        }
        public function get_topup() {
            $sql = "SELECT * FROM topup";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        public function editTop($id){
            $sql = "SELECT * FROM topup WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=> $id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        }
        public function delete_top($id){
            $sql = "DELETE FROM topup WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            return true;
        }
        public function update_top($id, $status){
            $sql = "UPDATE topup SET status= :status WHERE id= :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['status' => $status,'id' => $id]);
            return true;
        }
        public function topup($topUid,$total){
            $sql = "UPDATE clients_info SET topup= :topup WHERE id= :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['topup' => $total,'id' => $topUid]);
            return true;
        }
        public function deleteUser($id){
            $sql = "DELETE FROM clients_info WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            return true;
        }
        public function update_coupon_avai($copId, $copLim, $copCost){
            $sql ="UPDATE coupon SET limitation= :limitation, coupon_amount= :coupon_amount WHERE id= :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['limitation'=>$copLim, 'coupon_amount'=>$copCost, 'id'=>$copId]);

            return true;
        }
        
    }
?>