<?php

class Database {
    

    private $dsn = "mysql:host=premium103.web-hosting.com; dbname=mailrqyk_mailerstation";
    private $dbuser = "mailrqyk_mailerstation";
    private $dbpass = "mailrqyk_mailerstation";
    public $conn;

    public function __construct() {
        try {
            $this->conn = new PDO($this->dsn, $this->dbuser, $this->dbpass);
        } catch (PDOException $th) {
            echo 'Error : ' . $th->getMessage();
        }return $this->conn;
    }

    public function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function showMessage($type, $message) {
        return '<div class="alert alert-' . $type . ' alert-dismissible bg-light"><button type="button" class="close" data-dismiss="alert">&times;</button><strong class="text-center text-danger">' . $message . '</strong></div>';
    }

} 
?>