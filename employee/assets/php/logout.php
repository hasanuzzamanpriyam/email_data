<?php
    session_start();
    unset($_SESSION['employee']);
    header('location: https://mailerstation.com/employee/');
?>