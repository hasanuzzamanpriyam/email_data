<?php
require_once 'data/session.php';
$sitesettings = $cuser->get_website_settings();
$site_url = $sitesettings['siteurl'];
$admin_email = $sitesettings['adminemail'];
$page = basename($_SERVER['PHP_SELF'], '.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css?v=2">

    <title><?= ucfirst(basename($_SERVER['PHP_SELF'], '.php')); ?> | Email Big Data</title>
    <link rel="icon" type="image/x-icon" href="../web-logo.ico" />
</head>

<body>
    <input type="checkbox" id="sidebar-toggle">
    <div class="sidebar">
        <div class="sidebar-header">
            <h3 class="band" style="margin: 0;">
                <img src="../bundles/bydhome/img/bookyourdata-logo.png" alt="Logo" style="max-height: 45px; max-width: 100%; object-fit: contain;">
            </h3>
            <label for="sidebar-toggle" class="ti-menu-alt"></label>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li class="<?= ($page == 'dashboard') ? 'active' : '' ?>">
                    <a href="dashboard">
                        <i class="fas fa-tachometer-alt margin-right: 1rem;"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="<?= ($page == 'seo') ? 'active' : '' ?>">
                    <a href="seo">
                        <i class="fab fa-yoast"></i>
                        <span>SEO</span>
                    </a>
                </li>
                <li class="<?= ($page == 'post') ? 'active' : '' ?>">
                    <a href="post">
                        <i class="fas fa-mail-bulk"></i>
                        <span>Products</span>
                    </a>
                </li>
                <li class="<?= ($page == 'blogs') ? 'active' : '' ?>">
                    <a href="blogs">
                        <i class="fas fa-mail-bulk"></i>
                        <span>Blogs</span>
                    </a>
                </li>
                <li class="<?= ($page == 'coupon') ? 'active' : '' ?>">
                    <a href="coupon">
                        <i class="fas fa-baby"></i>
                        <span>Coupons</span>
                    </a>
                </li>
                <li class="<?= ($page == 'topup') ? 'active' : '' ?>">
                    <a href="topup">
                        <i class="fas fa-baby"></i>
                        <span>Topup</span>
                    </a>
                </li>
                <li class="<?= ($page == 'user') ? 'active' : '' ?>">
                    <a href="user">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li class="<?= ($page == 'band-user') ? 'active' : '' ?>">
                    <a href="band-user">
                        <i class="fas fa-user-slash"></i>
                        <span>Ban Users</span>
                    </a>
                </li>
                <li class="<?= ($page == 'order') ? 'active' : '' ?>">
                    <a href="order">
                        <i class="fas fa-cart-plus"></i>
                        <span>Order</span>
                    </a>
                </li>
                <li class="<?= ($page == 'sales') ? 'active' : '' ?>">
                    <a href="sales">
                        <i class="fas fa-cart-plus"></i>
                        <span>Sales</span>
                    </a>
                </li>
                <li class="<?= ($page == 'feedback') ? 'active' : '' ?>">
                    <a href="feedback">
                        <i class="far fa-comment-dots"></i>
                        <span>Feedback</span>
                    </a>
                </li>
                <li class="<?= ($page == 'subscription') ? 'active' : '' ?>">
                    <a href="subscription">
                        <i class="fas fa-address-book"></i>
                        <span>Subscription</span>
                    </a>
                </li>
                <li class="<?= ($page == 'setthing') ? 'active' : '' ?>">
                    <a href="setthing">
                        <i class="fas fa-cog"></i>
                        <span>Setting</span>
                    </a>
                </li>
                <li class="<?= ($page == 'website-settings') ? 'active' : '' ?>">
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
                <div class="dropdown" style="display:inline-block; margin-right: 15px; width: auto!important; height: auto!important; border-radius: 0!important;">
                    <a href="#" class="text-dark" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="position: relative; text-decoration: none;">
                        <span class="ti-bell" style="font-size: 1.2rem;"></span>
                        <span class="badge rounded-pill bg-danger badge-counter" style="position: absolute; top: -5px; right: -5px; font-size: 0.6rem; display:none;"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow animated--grow-in" aria-labelledby="notificationDropdown" style="width: 320px; max-height: 400px; overflow-y: auto; right: 0; left: auto;">
                        <li class="dropdown-header bg-primary text-white font-weight-bold" style="padding: 0.75rem 1rem;">Alerts Center</li>
                        <div id="notificationList">
                            <li><a class="dropdown-item text-center small text-gray-500" href="#">Loading...</a></li>
                        </div>
                    </ul>
                </div>
                <span class="ti-comment"></span>
                <div>
                    <?php if (isset($cphoto) && $cphoto != ''): ?>
                        <img src="<?= $cphoto ?>" alt="" style="width:40px; height:40px; border-radius:50%; object-fit:cover;">
                    <?php else: ?>
                        <span class="ti-user" style="font-size: 20px; line-height: 40px; display: block; text-align: center;"></span>
                    <?php endif; ?>
                </div>
                <span style="font-weight: 600;"><?= $cname ?? 'Admin' ?></span>
            </div>
        </header>