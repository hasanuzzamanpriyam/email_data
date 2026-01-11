<?php
    include_once '../assets/php/session.php';
    
    $siteUrl = 'http://localhost/emailbigdata.com/';

    $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
                        "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . 
                        $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset=utf-8>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name=viewport content="width=device-width, initial-scale=1">
        <link rel="canonical" href="<?= $link; ?>" />
        <title>Buy email lists with 95% Delivery Rate Guaranteed. Email List for
            Sale with 100% Opt-In.</title>
        <meta name="description" content="Download an accurate targeted email
              list for the best marketing campaigns and get B2B sales leads with
              95% email deliverability! We have human-verified mailing lists for
              sale for any industry or position. Buy now and contact better leads
              today!">
         <!--FACEBOOK-->
    <meta property="og:image" content="<?= $siteUrl; ?>bundles/bydhome/img/add-share.jpg">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1024">
    <meta property="og:image:height" content="1024">
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= $siteUrl; ?>"/>
    <meta property="og:title" content="Buy email lists with 95% Delivery Rate Guaranteed. Email List for Sale with 100% Opt-In." />
    <meta property="og:description" content="Download an accurate targeted email
              list for the best marketing campaigns and get B2B sales leads with
              95% email deliverability! We have human-verified mailing lists for
              sale for any industry or position. Buy now and contact better leads
              today!" />
        <link rel="icon" type="image/x-icon" href="<?= $siteUrl; ?>web-logo.ico" />
        <link rel=stylesheet href="<?= $siteUrl; ?>bundles/bydhome/css/main.min3860.css">
         <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-Y70XNYB5YT"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'G-Y70XNYB5YT');
        </script>
        
        <style>
            .slidecontainer {
                width: 100%;
            }

            .slider {
                -webkit-appearance: none;
                width: 100%;
                height: 15px;
                margin-top: 15px;
                border-radius: 5px;
                background: #d3d3d3;
                outline: none;
                opacity: 0.7;
                -webkit-transition: .2s;
                transition: opacity .2s;
            }

            .slider:hover {
                opacity: 1;
            }

            .slider::-webkit-slider-thumb {
                -webkit-appearance: none;
                appearance: none;
                width: 25px;
                height: 25px;
                border-radius: 50%;
                background: #04AA6D;
                cursor: pointer;
            }

            .slider::-moz-range-thumb {
                width: 25px;
                height: 25px;
                border-radius: 50%;
                background: #04AA6D;
                cursor: pointer;
            }
            .chat-demo{
                position: fixed; /* Fixed/sticky position */
                bottom: 0px; /* Place the button at the bottom of the page */
                right: 0px; /* Place the button 30px from the right */
                z-index: 99; /* Make sure it does not overlap */
                border: none; /* Remove borders */
                outline: none; /* Remove outline */
                /* background-color: #04B600;  Set a background color */
                cursor: pointer; /* Add a mouse pointer on hover */
                border-radius: 50%; /* Rounded corners */
                width: 90px;
                height: 90px;
            }
            .chat-btn{
                width: 65px;
                height: 65px;
                border-radius: 50%;
                background-color: rgb(36, 214, 75); 
                position: absolute;
                top: 10px;
                left: 10px;
            }
            .chat-btn > img {
                position: absolute;
                top: 10px;
                left: 10px;
                width: 45px;
                /*border-radius: 50%; */
                animation-name: chat;
                animation-duration: 0.5s;
            }
            .chat-btn > .closeBtn{
                position: absolute;
                top: 22px;
                left: 22px;
                width: 20px;
                animation-name: chatClose;
                animation-duration: 0.5s;
            }
            @keyframes chatClose {
                0%   {transform: rotate(360deg);}
            }
            @keyframes chat {
                100%   {transform: rotate(360deg);}
            }
            #chat-option{
                width: 60px;
                height: auto;
                margin-left: 15px;
                /* background-color: greenyellow;*/
                position: absolute;
                bottom: 80px;
                display: none;
            }
            #chat-option > a > img {
                width: 60px;
                margin-bottom: 5px;
                -webkit-filter: drop-shadow(5px 5px 5px #666666);
                filter: drop-shadow(5px 5px 5px #666666);
                border-radius: 50%;
            }
            #chat-option > a > img:hover{
                width: 63px;
                transition: .5s;
            }
            .chat-live span{
                position: absolute;
                bottom: 10px;
                left: 8px;
                display: block;
                min-width: 65px;
                height: 65px;
                border: 2px solid rgb(36, 214, 75);
                border-radius: 50%;
                animation: animate 1s infinite;
                opacity: 1;
                filter: blur(4px);
                animation-delay: calc(var(--i) * 1s);
            }
            @keyframes animate{
                100%{
                    -ms-transform: scale(2); 
                    -webkit-transform: scale(2); 
                    transform: scale(1.5); 
                    opacity: 0;
                    filter: blur(1px);
                }

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

    </head>
    <body><?php
        if (isset($_SESSION['user'])) {
            echo '<header class="header header--fixed">
            <div class="header__inner">
                <button id="mobileMenuOpenBtn" class="mobile-menu-toggle-btn"
                        type="button"></button>
                <a href="'.$siteUrl.'" class="logo-link">
                    <img class="logo" width="170" height="95"
                         src="'.$siteUrl.'bundles/bydhome/img/bookyourdata-logo.svg"
                         alt="Email Big Data Logo" />
                </a>
                <nav id="main-nav" class="main-nav">
                    <ul class="main-nav__list nav nav--primary">
                        <li class="nav__item nav__item--build-a-list shahab">
                            <a class="nav__item__link js-submenu-trigger"
                               href="'.$siteUrl.'custom-order/business-contacts">Custom Order</a>
                            <ul class="main-nav__sub nav nav--secondary">
                                <li class="nav__item">
                                    <a class="nav__item__link js-build-link"
                                       href="'.$siteUrl.'custom-order/business-contacts">Business Contacts</a>
                                    <a class="nav__item__link js-build-link"
                                       href="'.$siteUrl.'custom-order/healthcare-professionals">Healthcare
                                        Professionals</a>
                                    <a class="nav__item__link js-build-link"
                                       href="'.$siteUrl.'custom-order/real-estate-agents">Real Estate
                                        Agents</a>
                                    <a class="nav__item__link js-build-link"
                                       href="'.$siteUrl.'custom-order/office-365">Office 365</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav__item nav__item--build-a-list shahab2">
                            <a class="nav__item__link js-submenu-trigger"
                               href="#">Custom Order</a>
                            <ul class="main-nav__sub nav nav--secondary">
                                <li class="nav__item">
                                    <a class="nav__item__link js-build-link"
                                       href="'.$siteUrl.'custom-order/business-contacts">Business Contacts</a>
                                    <a class="nav__item__link js-build-link"
                                       href="'.$siteUrl.'custom-order/healthcare-professionals">Healthcare
                                        Professionals</a>
                                    <a class="nav__item__link js-build-link"
                                       href="'.$siteUrl.'custom-order/real-estate-agents">Real Estate
                                        Agents</a>
                                    <a class="nav__item__link js-build-link"
                                       href="'.$siteUrl.'custom-order/office-365">Office 365</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav__item shahab">
                            <a class="nav__item__link js-submenu-trigger"
                               href="'.$siteUrl.'ready-made">Ready Made List</a>
                            <ul class="main-nav__sub nav nav--secondary">
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/job-levels">Job
                                        Levels</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/job-titles">Job
                                        Titles</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/job-functions">Job
                                        Functions</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/real-estate">Real
                                        Estate</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/office-365">Office 365</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/zoominfo">Zoominfo</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/industries">Industries</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/healthcare-professionals">Healthcare
                                        Professionals</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/international">International</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav__item shahab2">
                            <a class="nav__item__link js-submenu-trigger"
                               href="#">Ready Made List</a>
                            <ul class="main-nav__sub nav nav--secondary">
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/job-levels">Job
                                        Levels</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/job-titles">Job
                                        Titles</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/job-functions">Job
                                        Functions</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/real-estate">Real
                                        Estate</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/office-365">Office 365</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/zoominfo">Zoominfo</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/industries">Industries</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/healthcare-professionals">Healthcare
                                        Professionals</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/international">International</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav__item">
                            <a class="nav__item__link" href="'.$siteUrl.'pricing">Pricing</a>
                        </li>
                        <li class="nav__item nav__item--about">
                            <a class="nav__item__link" href="'.$siteUrl.'about">About</a>
                        </li>
                        <li class="nav__item nav__item--popular">
                            <a class="nav__item__link js-submenu-trigger"
                               href="#">Popular List</a>
                            <ul class="main-nav__sub nav nav--secondary">
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'email-list-database/ceo">CEO</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'email-list-database/hr">HR</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'email-list-database/office-365">Office 365</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'email-list-database/attorney">Attorney</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'email-list-database/colleges-universities">Colleges
                                        Universities</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'email-list-database/pharmaceutical">Pharmaceutical</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'email-list-database/admission">Admission</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div class="header__build-btn dropdown dropdown--build-list
                     dropdown--arrow">
                    <a class="button button--primary dropdown__btn" href=""
                       data-toggle="dropdown">Custom Order</a>
                    <div class="dropdown__container">
                        <div class="menu menu--secondary text-uppercase">
                           <a class="menu__item gap-bottom-small"
                               href="'.$siteUrl.'custom-order/business-contacts">Business Contacts</a>
                            <a class="menu__item gap-bottom-small"
                               href="'.$siteUrl.'custom-order/healthcare-professionals">Healthcare
                                Professionals</a>
                            <a class="menu__item gap-bottom-small"
                               href="'.$siteUrl.'custom-order/real-estate-agents">Real
                               Estate Agents</a>
                            <a class="menu__item" href="'.$siteUrl.'custom-order/office-365">Office 365</a>
                        </div>
                    </div>
                </div>
                <div class="header__iconic-box iconic-box">
                    <i class="iconic-box__icon icon icon-user"></i>
                    <div class="iconic-box__content">
                        <a href="'.$siteUrl.'user/order" class="iconic-box__content__title
                           iconic-box__content__title--link">'.$cname.'</a><br>
                    </div>
                </div>
            </div>
                        </header>';
        } else {
            echo '<header class="header header--fixed">
            <div class="header__inner">
                <button id="mobileMenuOpenBtn" class="mobile-menu-toggle-btn"
                        type="button"></button>
                <a href="'.$siteUrl.'" class="logo-link">
                    <img class="logo" width="170" height="95"
                         src="'.$siteUrl.'bundles/bydhome/img/bookyourdata-logo.svg"
                         alt="Email Big Data Logo" />
                </a>
                <nav id="main-nav" class="main-nav">
                    <ul class="main-nav__list nav nav--primary">
                        <li class="nav__item nav__item--build-a-list shahab">
                            <a class="nav__item__link js-submenu-trigger"
                               href="'.$siteUrl.'custom-order/business-contacts">Custom Order</a>
                            <ul class="main-nav__sub nav nav--secondary">
                                <li class="nav__item">
                                    <a class="nav__item__link js-build-link"
                                       href="'.$siteUrl.'custom-order/business-contacts">Business Contacts</a>
                                    <a class="nav__item__link js-build-link"
                                       href="'.$siteUrl.'custom-order/healthcare-professionals">Healthcare
                                        Professionals</a>
                                    <a class="nav__item__link js-build-link"
                                       href="'.$siteUrl.'custom-order/real-estate-agents">Real Estate
                                        Agents</a>
                                    <a class="nav__item__link js-build-link"
                                       href="'.$siteUrl.'custom-order/office-365">Office 365</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav__item nav__item--build-a-list shahab2">
                            <a class="nav__item__link js-submenu-trigger"
                               href="#">Custom Order</a>
                            <ul class="main-nav__sub nav nav--secondary">
                                <li class="nav__item">
                                    <a class="nav__item__link js-build-link"
                                       href="'.$siteUrl.'custom-order/business-contacts">Business Contacts</a>
                                    <a class="nav__item__link js-build-link"
                                       href="'.$siteUrl.'custom-order/healthcare-professionals">Healthcare
                                        Professionals</a>
                                    <a class="nav__item__link js-build-link"
                                       href="'.$siteUrl.'custom-order/real-estate-agents">Real Estate
                                        Agents</a>
                                    <a class="nav__item__link js-build-link"
                                       href="'.$siteUrl.'custom-order/office-365">Office 365</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav__item shahab">
                            <a class="nav__item__link js-submenu-trigger"
                               href="'.$siteUrl.'ready-made">Ready Made List</a>
                            <ul class="main-nav__sub nav nav--secondary">
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/job-levels">Job
                                        Levels</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/job-titles">Job
                                        Titles</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/job-functions">Job
                                        Functions</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/real-estate">Real
                                        Estate</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/office-365">Office 365</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/zoominfo">Zoominfo</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/industries">Industries</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/healthcare-professionals">Healthcare
                                        Professionals</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/international">International</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav__item shahab2">
                            <a class="nav__item__link js-submenu-trigger"
                               href="#">Ready Made List</a>
                            <ul class="main-nav__sub nav nav--secondary">
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/job-levels">Job
                                        Levels</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/job-titles">Job
                                        Titles</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/job-functions">Job
                                        Functions</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/real-estate">Real
                                        Estate</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/office-365">Office 365</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/zoominfo">Zoominfo</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/industries">Industries</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/healthcare-professionals">Healthcare
                                        Professionals</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'ready-made/international">International</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav__item">
                            <a class="nav__item__link" href="'.$siteUrl.'pricing">Pricing</a>
                        </li>
                        <li class="nav__item nav__item--about">
                            <a class="nav__item__link" href="'.$siteUrl.'about">About</a>
                        </li>
                        <li class="nav__item nav__item--popular">
                            <a class="nav__item__link js-submenu-trigger"
                               href="#">Popular List</a>
                            <ul class="main-nav__sub nav nav--secondary">
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'email-list-database/ceo">CEO</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'email-list-database/hr">HR</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'email-list-database/office-365">Office 365</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'email-list-database/attorney">Attorney</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'email-list-database/colleges-universities">Colleges
                                        Universities</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'email-list-database/pharmaceutical">Pharmaceutical</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="'.$siteUrl.'email-list-database/admission">Admission</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div class="header__build-btn dropdown dropdown--build-list
                     dropdown--arrow">
                    <a class="button button--primary dropdown__btn" href=""
                       data-toggle="dropdown">Custom Order</a>
                    <div class="dropdown__container">
                        <div class="menu menu--secondary text-uppercase">
                            <a class="menu__item gap-bottom-small"
                               href="'.$siteUrl.'custom-order/business-contacts">Business Contacts</a>
                            <a class="menu__item gap-bottom-small"
                               href="'.$siteUrl.'custom-order/healthcare-professionals">Healthcare
                                Professionals</a>
                            <a class="menu__item gap-bottom-small"
                               href="'.$siteUrl.'custom-order/real-estate-agents">Real
                               Estate Agents</a>
                            <a class="menu__item" href="'.$siteUrl.'custom-order/office-365">Office 365</a>
                                    
                        </div>
                    </div>
                </div>
                <div class="header__iconic-box iconic-box">
                    <i class="iconic-box__icon icon icon-user"></i>
                    <div class="iconic-box__content">
                        <a href="'.$siteUrl.'login" class="iconic-box__content__title
                           iconic-box__content__title--link">User Login</a><br>
                        <a href="'.$siteUrl.'signup"
                           class="iconic-box__content__subtitle
                           link-secondary">Not a member? Sign up!</a>
                    </div>
                </div>
            </div>
                        </header>';
        }
