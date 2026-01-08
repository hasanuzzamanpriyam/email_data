<?php
    class Databases{

        private $dsn = "mysql:host=localhost; dbname=bookyourdata_ebd";
        private $dbuser = "bookyourdata_ebd";
        private $dbpass = "bookyourdata_ebd";

        public $conn;

        public function __construct(){
            try {
                $this->conn = new PDO($this->dsn, $this->dbuser, $this->dbpass);

               // echo 'Connection successfully software Database';
            } catch (PDOException $th) {
                echo 'Error : '.$th->getMessage();
            }

            return $this->conn;
        }

        //Check Input
        public function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            return $data;
        }

        //Show Message Error or Success 
        public function showMessage($type, $message){
            return '<div class="alert alert-'.$type.' alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong class="text-center">'.$message.'</strong>
            </div>';
        }
    }
?>