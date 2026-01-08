<?php
    require_once 'config.php';

    class Auth extends Database{
        public function currentUser($email){
            $sql ="SELECT * FROM clients_info WHERE email = :email AND deleted != 0";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }
        public function get_orders($uid){
            $sql = "SELECT * FROM order_info WHERE uid = $uid";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        public function get_topup($uid) {
            $sql = "SELECT * FROM topup WHERE uid = :uid";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['uid' => $uid]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        public function delete_topup($id){
            $sql = "DELETE FROM topup WHERE id= :id AND status = 'Completed' ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=> $id]);

            return true;
        }
        public function topup($topupUserID, $topupCode, $topupFullName, $topupEmail, $topupAmount,$payMethod) {
        $sql = "INSERT INTO topup (uid,top_code,full_name,email,amount,payment_way) VALUES(:uid, :top_code, :full_name, :email, :amount,:payment_way)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['uid' => $topupUserID, 'top_code' => $topupCode, 'full_name' => $topupFullName, 'email' => $topupEmail, 'amount' => $topupAmount, 'payment_way' => $payMethod]);
        return true;
        }
        public function update_topup_status($topTrackingCode, $status) {
        $sql = "UPDATE topup SET status= :status WHERE top_code = :top_code";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['status' => $status, 'top_code' => $topTrackingCode]);
        return true;
        }
         public function get_retopup($reTopCode) {
        $sql = "SELECT * FROM topup WHERE top_code = :top_code";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['top_code' => $reTopCode]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
    }
?>