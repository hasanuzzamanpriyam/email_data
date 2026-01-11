<?php
   session_start();
    require_once 'auth.php';
    $cuser = new Auth();

    if(!isset($_SESSION['admin'])){
        header('location: ../index.php');
        die;
    }

    $cemail = $_SESSION['admin'];

    $data = $cuser->currentUser($cemail);

    $cid = $data['id'];
    $cname = isset($data['name']);
    $cpass = $data['password'];
   // $cphone = $data['phone'];
    //$cgender = $data['gender'];
    //$cdob = $data['dob'];
    //$cphoto = $data['photo'];
    $created = $data['created_at'];

    $reg_on = date('d M Y',strtotime($created));
    
   // $verified = $data['verified'];

    //$fname = strtok($cname," ");

    // if($verified == 0){
    //     $verified = 'Not Verified!';
    // }else{
    //     $verified = 'Verified!';
    // }
?>