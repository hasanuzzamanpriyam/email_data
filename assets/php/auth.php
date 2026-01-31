<?php

require_once 'config.php';

class Auth extends Database
{

    public function register($fname, $lname, $email, $company, $hpass, $token)
    {
        try {
            $sql = "INSERT INTO clients_info (first_name, last_name,  email, company, password, token) VALUES(:fname, :lname,  :email, :company, :pass, :token)";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute(['fname' => $fname, 'lname' => $lname, 'email' => $email, 'company' => $company, 'pass' => $hpass, 'token' => $token]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function user_exit($email)
    {
        $sql = "SELECT email FROM clients_info WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function login($email)
    {
        $sql = "SELECT email, password FROM clients_info WHERE email = :email AND deleted != 0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function currentUser($email)
    {
        $sql = "SELECT * FROM clients_info WHERE email = :email AND deleted != 0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public function userLogin($id)
    {
        $sql = "SELECT * FROM clients_info WHERE id = :id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function forgot_password($token, $email)
    {
        $sql = "UPDATE clients_info SET token = :token, token_expire = DATE_ADD(NOW(), INTERVAL 10 MINUTE) WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['token' => $token, 'email' => $email]);

        return true;
    }
    public function update_pass($upid, $uppass)
    {
        $sql = "UPDATE clients_info SET password= :pass WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['pass' => $uppass, 'id' => $upid]);
        return true;
    }
    public function reset_pass_auth($email, $token)
    {
        $sql = "SELECT id FROM clients_info WHERE email = :email AND token = :token AND token !='' AND token_expire > NOW() AND verified != 0 ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email, 'token' => $token]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function update_new_pass($pass, $email)
    {
        $sql = "UPDATE clients_info SET token='', password= :pass WHERE email = :email AND verified != 0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email, 'pass' => $pass]);
        return true;
    }

    public function inert_email($title, $category, $total_email, $short_description, $description, $price)
    {
        $sql = "INSERT INTO email_short_info (title, category,  total_email, short_description, description,price) VALUES(:title, :category,  :total_email, :short_description, :description, :price)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['title' => $title, 'category' => $category, 'total_email' => $total_email, 'short_description' => $short_description, 'description' => $description, 'price' => $price]);
        return true;
    }

    public function all_job_level()
    {
        $sql = "SELECT * FROM email_short_info WHERE title = 'Job Level'ORDER BY category ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function all_job_title()
    {
        $sql = "SELECT * FROM email_short_info WHERE title = 'Job Title'ORDER BY category ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function all_job_function()
    {
        $sql = "SELECT * FROM email_short_info WHERE title = 'Job Function'ORDER BY category ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function all_industries()
    {
        $sql = "SELECT * FROM email_short_info WHERE title = 'Industries'ORDER BY category ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function all_health()
    {
        $sql = "SELECT * FROM email_short_info WHERE title = 'Healthcare Professional'ORDER BY category ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function all_international()
    {
        $sql = "SELECT * FROM email_short_info WHERE title = 'International'ORDER BY category ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    public function all_real_state()
    {
        $sql = "SELECT * FROM email_short_info WHERE title = 'Real Estate'ORDER BY category ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    public function all_zoom_info()
    {
        $sql = "SELECT * FROM email_short_info WHERE title = 'Zoom Info'ORDER BY category ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    public function all_office_365()
    {
        $sql = "SELECT * FROM email_short_info WHERE title = 'Office 365'ORDER BY category ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function insert_order($uid, $copId, $order_code, $fullName, $email, $email_type, $category, $selectItem, $total_email, $total_price, $deliveryDays, $payMethod)
    {
        $sql = "INSERT INTO order_info (uid, cop_id, tracking_id, username, email,  email_type, email_category, email_item, total_email,total_price,days,payment_way) VALUES(:uid, :cop_id, :tracking_id, :username, :email,  :email_type, :email_category, :email_item, :total_email, :total_price, :days, :payment_way)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['uid' => $uid, 'cop_id' => $copId, 'tracking_id' => $order_code, 'username' => $fullName, 'email' => $email, 'email_type' => $email_type, 'email_category' => $category, 'email_item' => $selectItem, 'total_email' => $total_email, 'total_price' => $total_price, 'days' => $deliveryDays, 'payment_way' => $payMethod]);
        return true;
    }
    public function update_order_status($orderCode, $paymentStatus)
    {
        $sql = "UPDATE order_info SET status= :status WHERE tracking_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['status' => $paymentStatus, 'id' => $orderCode]);
        return true;
    }
    public function client_feedback($firstname, $lastname, $email, $message)
    {
        $sql = "INSERT INTO feedback (first_name, last_name,  email, message) VALUES(:fname, :lname,  :email, :message)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['fname' => $firstname, 'lname' => $lastname, 'email' => $email, 'message' => $message]);
        return true;
    }

    public function client_email($email)
    {
        $sql = "INSERT INTO email_collection (email) VALUES(:email)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        return true;
    }

    public function update_profile($upid, $upfile, $upfname, $uplname, $upgender, $update, $upphone)
    {
        $sql = "UPDATE clients_info SET first_name= :first_name, last_name= :last_name, gender= :gender, dob= :dob, phone= :phone, photo= :photo WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['first_name' => $upfname, 'last_name' => $uplname, 'gender' => $upgender, 'dob' => $update, 'phone' => $upphone, 'photo' => $upfile, 'id' => $upid]);
        return true;
    }
    public function topup($userID, $topup_code, $fullName, $email, $amount)
    {
        $sql = "INSERT INTO topup (uid,top_code,full_name,email,amount) VALUES(:uid, :top_code, :full_name, :email, :amount)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['uid' => $userID, 'top_code' => $topup_code, 'full_name' => $fullName, 'email' => $email, 'amount' => $amount]);
        return true;
    }
    public function coupon_avai($coupon)
    {
        $sql = "SELECT * FROM coupon WHERE tacking_id = '$coupon'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }
    public function verify_email_client($email, $token)
    {
        $sql = "UPDATE clients_info SET verified = 1, token = '' WHERE email = :email AND token = :token AND deleted !=0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email, 'token' => $token]);

        // Return row count to confirm if update happened
        return $stmt->rowCount() > 0;
    }
    public function get_blogs()
    {
        $sql = "SELECT * FROM blogs ORDER by created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    public function get_blogs_records($start_form, $recourd_per_page)
    {
        $sql = "SELECT *  FROM blogs ORDER BY created_at DESC LIMIT $start_form, $recourd_per_page";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function show_blog($title)
    {
        $sql = "SELECT * FROM blogs WHERE seo_url = :seo_url";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['seo_url' => $title]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
    public function order_info($orderCode)
    {
        $sql = "SELECT * FROM order_info WHERE tracking_id = :tracking_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['tracking_id' => $orderCode]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public function update_reorder_method($order_code, $payMethod)
    {
        $sql = "UPDATE order_info SET payment_way= :payment_way WHERE tracking_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['payment_way' => $payMethod, 'id' => $order_code]);
        return true;
    }
    public function update_topup_client_balance($uid, $remainedBalance)
    {
        $sql = "UPDATE clients_info SET topup= :topup WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['topup' => $remainedBalance, 'id' => $uid]);
        return true;
    }

    public function specific_international($title, $category)
    {
        $sql = "SELECT * FROM email_short_info WHERE title = :title AND category = :category";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['title' => $title, 'category' => $category]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function specific_email_list($findPage)
    {
        $sql = "SELECT * FROM email_short_info WHERE category = :category";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['category' => $findPage]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public function specific_email_list_id($id)
    {
        $sql = "SELECT * FROM email_short_info WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public function seo_details($seoPage)
    {
        $sql = "SELECT * FROM seo WHERE page = :seoPage";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['seoPage' => $seoPage]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public function seo_url($seoPage)
    {
        $sql = "SELECT * FROM seo WHERE url = :url";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['url' => $seoPage]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public function seo_specific_email_list($seoUrl)
    {
        $sql = "SELECT * FROM email_short_info WHERE seo_url = :seo_url";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['seo_url' => $seoUrl]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function getLastOrderForUser($userId)
    {
        $sql = "SELECT * FROM order_info WHERE uid = :uid ORDER BY id DESC LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['uid' => $userId]);
        $order = $stmt->fetch(PDO::FETCH_ASSOC);
        return $order;
    }

    public function getAllEmails()
    {
        $sql = "SELECT * FROM email_short_info ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function count_email_short_info($title = null)
    {
        if ($title) {
            $sql = "SELECT COUNT(*) FROM email_short_info WHERE title = :title";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        } else {
            $sql = "SELECT COUNT(*) FROM email_short_info";
            $stmt = $this->conn->prepare($sql);
        }
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function get_email_short_info_paginated($offset, $limit, $title = null)
    {
        if ($title) {
            $sql = "SELECT * FROM email_short_info WHERE title = :title ORDER BY category ASC LIMIT :offset, :limit";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        } else {
            $sql = "SELECT * FROM email_short_info ORDER BY category ASC LIMIT :offset, :limit";
            $stmt = $this->conn->prepare($sql);
        }
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get single blog by ID
    public function getBlogById($id)
    {
        try {
            $sql = "SELECT * FROM blogs WHERE id = :id LIMIT 1"; // ✅ Correct table name
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getBlogBySlug($slug)
    {
        $sql = "SELECT * FROM blogs WHERE seo_url = :slug LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['slug' => $slug]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function get_recent_blogs($limit = 5)
    {
        $sql = "SELECT title, seo_url FROM blogs ORDER BY created_at DESC LIMIT :limit";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Limit title to 20 words
        foreach ($results as &$post) {
            $words = explode(' ', $post['title']);
            if (count($words) > 10) {
                $post['title'] = implode(' ', array_slice($words, 0, 20)) . '...';
            }
        }

        return $results;
    }

    public function get_blog_categories()
    {
        $sql = "SELECT DISTINCT category FROM blogs ORDER BY category ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get blogs filtered by category with pagination
    public function get_blogs_by_category($category, $start_from, $record_per_page)
    {
        $sql = "SELECT * FROM blogs WHERE category = :category ORDER BY created_at DESC LIMIT :start_from, :record_per_page";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':category', $category, PDO::PARAM_STR);
        $stmt->bindValue(':start_from', (int)$start_from, PDO::PARAM_INT);
        $stmt->bindValue(':record_per_page', (int)$record_per_page, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Count blogs in a specific category
    public function count_blogs_by_category($category)
    {
        $sql = "SELECT COUNT(*) FROM blogs WHERE category = :category";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':category', $category, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function get_related_products($title, $limit = 3, $excludeId = 0)
    {
        $sql = "SELECT * FROM email_short_info WHERE title = :title AND id != :id ORDER BY RAND() LIMIT :limit";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':id', (int)$excludeId, PDO::PARAM_INT);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
