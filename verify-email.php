<?php
require_once 'assets/php/session.php';
require_once 'assets/php/auth.php';
$user = new Auth();
if (isset($_GET['email']) && isset($_GET['token'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];

    if ($user->verify_email_client($email, $token)) {
        // Verification successful
        // Maybe set a session message?
        $_SESSION['verification_status'] = 'success';
    } else {
        // Verification failed
        $_SESSION['verification_status'] = 'failed';
    }

    $siteUrl = 'http://localhost/emailbigdata.com/';
    header('location: ' . $siteUrl);
}
