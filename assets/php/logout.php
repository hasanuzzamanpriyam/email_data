<?php
    session_start();
    if($_SESSION['adminUser'] === 'Admin'){
        unset($_SESSION['user']);
        unset($_SESSION['adminUser']);
        header('location: https://mailerstation.com/admin/user');
    }else{
        unset($_SESSION['user']);
        header('location: https://mailerstation.com/');
    }
?>