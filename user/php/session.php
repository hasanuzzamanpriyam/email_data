<?php

session_start();
require_once 'auth.php';
$cuser = new Auth();
if (isset($_SESSION['user'])) {
    $cemail = $_SESSION['user'];
    $data = $cuser->currentUser($cemail);
    $cid = $data['id'];
    $firstname = $data['first_name'];
    $cname = $data['last_name'];
    $cpass = $data['password'];
    $reg_on = $data['created_at'];
    $cgender = $data['gender'];
    $cdob  = $data['dob'];
    $cphone = $data['phone'];
    $cphoto = $data['photo'];
    $topup = $data['topup'];
    $verified = $data['verified'];
    if ($verified == 0) {
        $verified = 'Not Verified!';
    } else {
        $verified = 'Verified!';
    }
    $cfull = $firstname.' '.$cname;
}else if (isset($_SESSION['adminUser'])){
    
    $cemail = $_SESSION['adminUser'];
    $data = $cuser->currentUser($cemail);
    $cid = $data['id'];
    $cname = $data['last_name'];
    $cpass = $data['password'];
    $reg_on = $data['created_at'];
    $cgender = $data['gender'];
    $cdob  = $data['dob'];
    $cphone = $data['phone'];
    $cphoto = $data['photo'];
    $topup = $data['topup'];
    $verified = $data['verified'];
    if ($verified == 0) {
        $verified = 'Not Verified!';
    } else {
        $verified = 'Verified!';
    }
    $cfull = $firstname.' '.$cname;
}
?>