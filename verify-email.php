<?php
require_once 'assets/php/session.php';
require_once 'assets/php/auth.php';
$user = new Auth();
if(isset($_GET['email'])){
    $email = $_GET['email'];
    $user->verify_email_client($email);
    $siteUrl = 'http://localhost/emailbigdata.com/';
    header('location: ' . $siteUrl);
}

?>