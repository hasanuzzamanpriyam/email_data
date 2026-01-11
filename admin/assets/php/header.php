<?php
    require_once 'data/session.php';
    $sitesettings =$cuser->get_website_settings();
$site_url = $sitesettings['siteurl'];   
$admin_email= $sitesettings['adminemail'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css"/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" >
    <link rel="stylesheet" href="assets/css/style.css">

    <title><?= ucfirst(basename($_SERVER['PHP_SELF'],'.php'));?> | Email Big Data</title>
    <link rel="icon" type="image/x-icon" href="../web-logo.ico" />
</head>
<body>
<input type="checkbox" id="sidebar-toggle">
    <div class="sidebar">
        <div class="sidebar-header">
            <h3 class="band">
               <!-- <span class="ti-unlink"></span>-->
                <span>Email Big Data</span>
            </h3>
            <label for="sidebar-toggle" class="ti-menu-alt"></label>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="dashboard">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="seo">
                        <i class="fab fa-yoast"></i>
                        <span>SEO</span>
                    </a>
                </li>
                <li>
                    <a href="post">
                        <i class="fas fa-mail-bulk"></i>
                        <span>Products</span>
                    </a>
                </li>
                <li>
                    <a href="blogs">
                        <i class="fas fa-mail-bulk"></i>
                        <span>Blogs</span>
                    </a>
                </li>
                <li>
                    <a href="coupon">
                        <i class="fas fa-baby"></i>
                        <span>Coupons</span>
                    </a>
                </li>
                <li>
                    <a href="topup">
                        <i class="fas fa-baby"></i>
                        <span>Topup</span>
                    </a>
                </li>
                <li>
                    <a href="user">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="band-user">
                        <i class="fas fa-user-slash"></i>
                        <span>Ban Users</span>
                    </a>
                </li>
                <li>
                    <a href="order">
                        <i class="fas fa-cart-plus"></i>
                        <span>Order</span>
                    </a>
                </li>
                <li>
                    <a href="sales">
                        <i class="fas fa-cart-plus"></i>
                        <span>Sales</span>
                    </a>
                </li>
                <li>
                    <a href="feedback">
                        <i class="far fa-comment-dots"></i>
                        <span>Feedback</span>
                    </a>
                </li>
                <li>
                    <a href="subscription">
                        <i class="fas fa-address-book"></i>
                        <span>Subscription</span>
                    </a>
                </li>
                <li>
                    <a href="setthing">
                        <i class="fas fa-cog"></i>
                        <span>Setting</span>
                    </a>
                </li>
                 <li>
                    <a href="website-settings">
                        <i class="fas fa-cog"></i>
                        <span>Website Settings</span>
                    </a>
                </li>
                
                
                <li>
                    <a href="assets/php/logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Log Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <div class="search-wrapper">
                <span class="ti-search"></span>
                <input type="search" placeholder="Search">
            </div>
            <div class="social-icon">
                <span class="ti-bell"></span>
                <span class="ti-comment"></span>
                <div></div>
            </div>
        </header>