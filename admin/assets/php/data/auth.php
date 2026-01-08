<?php
    require_once 'config.php';

    class Auth extends Databases{

        //Login exiting user
        public function login($email){
            $sql ="SELECT * FROM admin WHERE email = :email AND power = 'admin'";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }
        //Current user in session
        public function currentUser($email){
            $sql ="SELECT * FROM admin WHERE email = :email AND power = 'admin'";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }
        //forgot password
        public function forgot_password($token, $email){
            $sql = "UPDATE admin SET token = :token, token_expire = DATE_ADD(NOW(), INTERVAL 10 MINUTE) WHERE email = :email";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['token'=>$token, 'email' => $email]);

            return true;
        }
        //Reset password user authentication
        public function reset_pass_auth($email, $token){
            $sql ="SELECT id FROM admin WHERE email = :email AND token = :token AND token !='' AND token_expire > NOW() AND allowed != 0 ";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email, 'token' => $token]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }
        //Update new password
        public function update_new_pass($pass,$email){
            $sql ="UPDATE admin SET token='', password= :pass WHERE email = :email AND allowed != 0";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email, 'pass' => $pass]);

            return true;
        }
        
        //Fetch all Note of an User
        public function get_notes($uid){
            $sql = "SELECT * FROM notes WHERE uid = :uid";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['uid'=> $uid]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        //Edit Note of an User
        public function edit_note($id){
            $sql = "SELECT * FROM notes WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=> $id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        }
        //Update edit Note of an user
        public function update_note($id, $title,$note){
            $sql ="UPDATE notes SET title = :title, note = :note, updated_at = NOW() WHERE id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['title' => $title, 'note'=>$note,'id' => $id]);

            return true;
        }
        //Delete a note of an user
        public function delete_note($id){
            $sql = "DELETE FROM notes WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            return true;
        }
        //Update profile of an user
        public function update_profile($name,$gender,$dob,$phone,$photo,$id){
            $sql ="UPDATE clients SET name= :name, gender= :gender, phone= :phone, dob= :dob, photo= :photo WHERE id= :id AND allowed != 0";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['name'=>$name, 'gender'=>$gender, 'dob'=>$dob, 'phone'=>$phone, 'photo'=> $photo, 'id'=> $id]);

            return true;
        }
        //Change Password Profile of an user
        public function change_password($pass, $id){
            $sql = "UPDATE clients SET password= :pass WHERE id = :id AND allowed != 0";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['pass'=>$pass, 'id'=>$id]);

            return true;
        }
        //Verify e-mail of an user
        public function verify_email($email){
            $sql = "UPDATE clients SET verified = 1 WHERE email = :email AND allowed !=0";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email'=>$email]);

            return true;
        }
        //Send Feedback from user to admin
        public function send_feedback($sub, $feed, $uid){
            $sql = "INSERT INTO feedback(uid, subject, feedback) VALUES(:uid, :sub,  :feed)";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['uid'=>$uid, 'sub'=>$sub, 'feed'=>$feed]);

            return true;
        }
        //Insert of an user Notification
        public function user_notification($uid, $type, $message){
            $sql = "INSERT INTO notification(uid, type, message) VALUES(:uid, :type,  :message)";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['uid'=>$uid, 'type'=>$type, 'message'=>$message]);

            return true;
        }
        //Fetch of an user Notification
        public function fetchNotification($uid){
            $sql = "SELECT * FROM notification WHERE uid= :uid AND type = 'user' ";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['uid'=> $uid]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        //Remove Notification of an user
        public function removeNotification($id){
            $sql = "DELETE FROM notification WHERE id= :id AND type = 'user' ";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=> $id]);

            return true;
        }
        
            public function get_website_settings() {
    $stmt = $this->conn->prepare("SELECT siteurl, adminemail FROM website_settings WHERE id = 1");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

        
    }
?>