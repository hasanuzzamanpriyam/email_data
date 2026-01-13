<?php
require_once 'assets/php/PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->SMTPDebug = 2; // Enable verbose debug output
$mail->Debugoutput = 'html';
$mail->isSMTP();
$mail->Host = '69.197.191.106';
$mail->SMTPAuth = true;
$mail->Username = 'support@emailbigdata.com';
$mail->Password = 'Nazmul@@2025$$';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Bypass SSL verification for localhost
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$mail->setFrom('support@emailbigdata.com', 'TestScript');
$mail->addAddress('support@emailbigdata.com');
$mail->Subject = 'SMTP Debug Test';
$mail->Body = 'This is a debug test email.';

echo "Starting email send...<br>";
if (!$mail->send()) {
    echo 'Message could not be sent.<br>';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
