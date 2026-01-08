<?php
    require_once 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.css"/>
    <link rel="icon" type="image/x-icon" href="./../favicon.ico" />
    <title><?= ucfirst(basename($_SERVER['PHP_SELF'],'.php'));?> | User's of Mailerstation</title>

    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700;800;900&display=swap');

        *{
            font-family: 'Maven Pro', sans-serif;
        }
        .payment-demo,
            .product-price {
                border: none;
                width: 100%;
                margin-bottom: 3px;
                box-sizing: border-box;
                box-shadow: 0px 0px 5px rgb(228, 225, 225);
                background-color: white;
                border-radius: 4px;
                border: 1px solid #F0F0F0;
            }

            .box {
                display: none;
            }

            .product-price {
                padding: 10px;
            }

            .payment-demo:hover {
                background-color: rgb(253, 236, 236);
                cursor: pointer;
                transition: 0.3 all ease;
            }

            .mybtn {
                padding: 10px 15px;
                width: 100%;
                cursor: pointer;
                margin-left: 15px;
            }

            .mybtn img {
                margin-right: 15px;
                cursor: pointer;
                height: 23px;
            }

            .product-title {
                font-weight: 650;
            }

            .card-text {
                /*  margin-right: 15px; */
            }

            input[type="text"],
            input[type="number"],
            textarea {
                outline: none;
                box-shadow: none !important;
                border: 1px solid #ccc !important;
                width: 100%;
            }

            input[type='radio']:checked {
                background: green;
            }

            .card-text{
                float: right;
            }
            

    </style>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>
            $(document).ready(function () {
                $('input[type="radio"]').click(function () {
                    var inputValue = $(this).attr("value");
                    var targetBox = $("." + inputValue);
                    $(".box").not(targetBox).hide();
                    $(targetBox).show();
                });
            });
        </script>
        
        
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-Y70XNYB5YT"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'G-Y70XNYB5YT');
        </script>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a href="https://mailerstation.com/" class="logo-link">
                    <img class="logo" width="170" height="95"
                         src="../bundles/bydhome/img/mailerstation-logo.png"
                         alt="Mailerstaiton Email List Logo" />
                </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link  <?= (basename($_SERVER['PHP_SELF']) == "home.php")?"active":""; ?>" href="https://mailerstation.com/"><i class="fas fa-home"></i>&nbsp;Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  <?= (basename($_SERVER['PHP_SELF']) == "order.php")?"active":""; ?>" href="order"><i class="fas fa-shopping-cart"></i>&nbsp;Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "topup.php")?"active":""; ?>" href="topup"  title="TopUp"><i class="fas fa-donate"></i>&nbsp;<span id="checkNotification" class="text-warning font-weight-bold">$ <?= $topup; ?></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "chating.php")?"active":""; ?>" href="chating"><i class="fas fa-comment-dots"></i>&nbsp;Chating</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "notification.php")?"active":""; ?>" href="notification"><i class="fas fa-bell"></i>&nbsp;Notification&nbsp; <span id="checkNotification"></span></a>
        </li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
            <i class="fas fa-user-cog"></i>&nbsp;Hi!&nbsp;<?= $cname; ?>
            </a>
            <div class="dropdown-menu">
                <a href="profile" class="dropdown-item"><i class="fas fa-user-circle"></i>&nbsp;Profile</a>
                <a href="https://mailerstation.com/assets/php/logout" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
            </div>
        </li>
      </ul>
    </div>
</nav>