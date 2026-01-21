<?php
include_once __DIR__ . '/session.php';
include_once __DIR__ . '/auth.php';
include_once __DIR__ . '/Settings.php';

// Load website settings
$settingsObj = new Settings();
$websiteSettings = $settingsObj->getSettings();
$siteUrl = rtrim($websiteSettings['siteurl'] ?? 'http://localhost/emailbigdata.com/', '/') . '/';
$siteName = $websiteSettings['site_name'] ?? 'Email Big Data';
$logoPath = $websiteSettings['logo_path'] ?? 'bundles/bydhome/img/bookyourdata-logo.svg';
$faviconPath = $websiteSettings['favicon_path'] ?? 'web-logo.ico';

$seo = new Auth();
if (isset($_GET['cat']) && isset($_GET['id'])) {
    $id = $_GET['id'];

    $allCategoryList = $seo->specific_email_list_id($id);

    $_SESSION['title'] = $allCategoryList['title'];
    $_SESSION['category'] = $allCategoryList['category'];
    $_SESSION['total_email'] = $allCategoryList['total_email'];
    $_SESSION['short_description'] = $allCategoryList['short_description'];
    $_SESSION['description'] = $allCategoryList['description'];
    $_SESSION['price'] = $allCategoryList['price'];
    $_SESSION['seo_title'] = $allCategoryList['seo_title'];
    $_SESSION['seo_url'] = $allCategoryList['seo_url'];
    $_SESSION['seo_keyword'] = $allCategoryList['seo_keyword'];
    $_SESSION['seo_desc'] = $allCategoryList['seo_desc'];
} else if (isset($_GET['cat'])) {
    $seoUrl = $_GET['cat'];
    //  $seoSpecificPage = $seo->seo_post_url($seoPage);
    //  $findPage = $seoSpecificPage['page'];

    $allCategoryList = $seo->seo_specific_email_list($seoUrl);

    $_SESSION['title'] = $allCategoryList['title'];
    $_SESSION['category'] = $allCategoryList['category'];
    $_SESSION['total_email'] = $allCategoryList['total_email'];
    $_SESSION['short_description'] = $allCategoryList['short_description'];
    $_SESSION['description'] = $allCategoryList['description'];
    $_SESSION['price'] = $allCategoryList['price'];
    $_SESSION['seo_title'] = $allCategoryList['seo_title'];
    $_SESSION['seo_url'] = $allCategoryList['seo_url'];
    $_SESSION['seo_keyword'] = $allCategoryList['seo_keyword'];
    $_SESSION['seo_desc'] = $allCategoryList['seo_desc'];
} else {
    $page = basename($_SERVER['PHP_SELF'], '.php');

    if ($page === 'index') {
        $seoPage = 'Home';
    } else if ($page === 'business-contacts') {
        $seoPage = 'Business Contacts';
    } else if ($page === 'healthcare-professionals') {
        $seoPage = 'Healthcare Professionals';
    } else if ($page === 'real-estate-agents') {
        $seoPage = 'Real Estate Agents';
    } else if ($page === 'office-365') {
        $seoPage = 'Office 365';
    } else if ($page === 'job-levels') {
        $seoPage = 'Job Level';
    } else if ($page === 'job-title') {
        $seoPage = 'Job Titles';
    } else if ($page === 'job-function') {
        $seoPage = 'Job Function';
    } else if ($page === 'real-estate') {
        $seoPage = 'Real Estate';
    } else if ($page === 'zoominfo') {
        $seoPage = 'Zoominfo';
    } else if ($page === 'industries') {
        $seoPage = 'Industries';
    } else if ($page === 'international') {
        $seoPage = 'International';
    } else if ($page === 'pricing') {
        $seoPage = 'Pricing';
    } else if ($page === 'about') {
        $seoPage = 'About';
    } else if ($page === 'ceo') {
        $seoPage = 'CEO';
    } else if ($page === 'hr') {
        $seoPage = 'HR';
    } else if ($page === 'attorney') {
        $seoPage = 'Attorney';
    } else if ($page === 'colleges-universities') {
        $seoPage = 'Colleges Universities';
    } else if ($page === 'pharmaceutical') {
        $seoPage = 'Pharmaceutical';
    } else if ($page === 'login') {
        $seoPage = 'Login';
    } else if ($page === 'signup') {
        $seoPage = 'Signup';
    } else if ($page === 'events') {
        $seoPage = 'Events';
    } else if ($page === 'event-info') {
        $seoPage = 'Event Info';
    } else if ($page === 'resources') {
        $seoPage = 'Resources';
    } else if ($page === 'info') {
        $seoPage = 'Info';
    } else if ($page === 'data') {
        $seoPage = 'Blog';
    } else if ($page === 'case-study') {
        $seoPage = 'Case Study';
    } else if ($page === 'faq') {
        $seoPage = 'FAQ';
    } else if ($page === 'contact') {
        $seoPage = 'Contact';
    } else if ($page === 'our-guarantees') {
        $seoPage = 'Our Guarantees';
    } else if ($page === 'community-relations') {
        $seoPage = 'Community Relations';
    } else if ($page === 'careers') {
        $seoPage = 'Careers';
    } else if ($page === 'leadership') {
        $seoPage = 'Leadership';
    } else if ($page === 'how-to-build-list') {
        $seoPage = 'How To Build List';
    } else if ($page === 'terms-of-use') {
        $seoPage = 'Terms of Use';
    } else if ($page === 'privacy-policy') {
        $seoPage = 'Privacy Policy';
    } else if ($page === 'legal-notice') {
        $seoPage = 'Legal Notice';
    } else {
        $seoPage = 'main';
    }

    $test = $seo->seo_details($seoPage);
    $_SESSION['seo_title'] = isset($test['title']) ? $test['title'] : '';

    $_SESSION['seo_keyword'] = isset($test['key_word']) ? $test['key_word'] : '';
    $_SESSION['seo_desc'] = isset($test['description']) ? $test['description'] : '';
}
/*
if(isset($_GET['id'])){
    $id = $_GET['id'];
   // $seoSpecificPage = $seo->seo_url($seoPage);
   // $findPage = $seoSpecificPage['page'];
    
    $allJobTitle = $seo->specific_email_list_id($id);
    
    $totalemail = $allJobTitle['total_email'];
    $category = $allJobTitle['category'];
    $_SESSION['myPrice'] = $allJobTitle['price'];
    $short_description = $allJobTitle['short_description'];
    $title = $allJobTitle['title'];
    $emailCategory = $allJobTitle['category'];
    $description = $allJobTitle['description'];
}*/

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
    <title><?= $_SESSION['seo_title']; ?></title>
    <meta name="description" content="<?= $_SESSION['seo_desc']; ?>">
    <meta name="keywords" content="<?= $_SESSION['seo_keyword']; ?>">
    <!--FACEBOOK-->
    <meta property="og:image" content="<?= $siteUrl; ?>bundles/bydhome/img/add-share.jpg">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1024">
    <meta property="og:image:height" content="1024">
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= $link; ?>" />
    <meta property="og:title" content="<?= $_SESSION['seo_title']; ?>" />
    <meta property="og:description" content="<?= $_SESSION['seo_desc']; ?>" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@mailerstation" />
    <meta name="twitter:creator" content="@techitcenter" />
    <meta property="og:url" content="<?= $link; ?>" />
    <meta property="og:title" content="<?= $_SESSION['seo_title']; ?>" />
    <meta property="og:description" content="<?= $_SESSION['seo_desc']; ?>" />
    <meta property="og:image" content="<?= $siteUrl; ?>bundles/bydhome/img/add-share.jpg" />
    <meta name="heleket" content="79c34649" />


    <link rel="icon" type="image/x-icon" href="<?= $siteUrl . $faviconPath; ?>" />
    <link rel=stylesheet href="<?= $siteUrl; ?>bundles/bydhome/css/main.min3860.css">
    <!-- <link rel="stylesheet" href="<?= $siteUrl; ?>bundles/bydhome/css/style.css" -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-NVV3G3W0BE"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-NVV3G3W0BE');
    </script>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "website",
            "name": "<?= $siteName; ?>",
            "author": {
                "@type": "Person",
                "name": "Email Big Data"
            },
            "datePublished": "2021-03-10",
            "description": "Buy email lists from mailer station at a cheaper rate",
            "prepTime": "PT20M"
        }
    </script>


    <?php $name = basename($_SERVER['PHP_SELF'], ".php");

    if ($name === 'index') {
        echo ' <style>
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
    background:none;
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
</style>';
    } else {
        echo ' <style>
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
    background:none;
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
    display:none;
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
</style>';
    }

    ?>
</head>

<body>

    <?php
    if (isset($_SESSION['user'])) {
        echo '<header class="header header--fixed">
            <div class="header__inner">
                <button id="mobileMenuOpenBtn" class="mobile-menu-toggle-btn"
                        type="button"></button>
                <a href="' . $siteUrl . '" class="logo-link">
                    <img class="logo" width="170" height="100"
                         src="' . $siteUrl . 'bundles/bydhome/img/bookyourdata-logo.svg"
                         alt="' . $siteName . ' Logo" />
                </a>
                <nav id="main-nav" class="main-nav">
                    <ul class="main-nav__list nav nav--primary">
                        <li class="nav__item nav__item--build-a-list shahab">
                            <a class="nav__item__link js-submenu-trigger"
                               href="' . $siteUrl . 'custom-order/business-contacts">BUILD A LIST</a>
                            <ul class="main-nav__sub nav nav--secondary">
                                <li class="nav__item">
                                    <a class="nav__item__link js-build-link"
                                       href="' . $siteUrl . 'custom-order/business-contacts">Business Contacts</a>
                                    <a class="nav__item__link js-build-link"
                                       href="' . $siteUrl . 'custom-order/healthcare-professionals">Healthcare
                                        Professionals</a>
                                    <a class="nav__item__link js-build-link"
                                       href="' . $siteUrl . 'custom-order/real-estate-agents">Real Estate
                                        Agents</a>
                                    <a class="nav__item__link js-build-link"
                                       href="' . $siteUrl . 'custom-order/office-365">Office 365</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav__item nav__item--build-a-list shahab2">
                            <a class="nav__item__link js-submenu-trigger"
                               href="#">BUILD A LIST</a>
                            <ul class="main-nav__sub nav nav--secondary">
                                <li class="nav__item">
                                    <a class="nav__item__link js-build-link"
                                       href="' . $siteUrl . 'custom-order/business-contacts">Business Contacts</a>
                                    <a class="nav__item__link js-build-link"
                                       href="' . $siteUrl . 'custom-order/healthcare-professionals">Healthcare
                                        Professionals</a>
                                    <a class="nav__item__link js-build-link"
                                       href="' . $siteUrl . 'custom-order/real-estate-agents">Real Estate
                                        Agents</a>
                                    <a class="nav__item__link js-build-link"
                                       href="' . $siteUrl . 'custom-order/office-365">Office 365</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav__item shahab">
                            <a class="nav__item__link js-submenu-trigger"
                               href="' . $siteUrl . 'ready-made">Email List</a>
                            <ul class="main-nav__sub nav nav--secondary">
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/job-levels">Job
                                        Levels</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/job-titles">Job
                                        Titles</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/job-functions">Job
                                        Functions</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/real-estate">Real
                                        Estate</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/office-365">Office 365</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/zoominfo">Zoominfo</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/industries">Industries</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/healthcare-professionals">Healthcare
                                        Professionals</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/international">International</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav__item shahab2">
                            <a class="nav__item__link js-submenu-trigger"
                               href="#">Email List</a>
                            <ul class="main-nav__sub nav nav--secondary">
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/job-levels">Job
                                        Levels</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/job-titles">Job
                                        Titles</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/job-functions">Job
                                        Functions</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/real-estate">Real
                                        Estate</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/office-365">Office 365</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/zoominfo">Zoominfo</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/industries">Industries</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/healthcare-professionals">Healthcare
                                        Professionals</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/international">International</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav__item nav__item--popular">
                            <a class="nav__item__link js-submenu-trigger"
                               href="#">Email Database</a>
                            <ul class="main-nav__sub nav nav--secondary">
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'email-list-database/ceo">CEO</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'email-list-database/hr">HR</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'email-list-database/office-365">Office 365</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'email-list-database/attorney">Attorney</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'email-list-database/colleges-universities">Colleges
                                        Universities</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'email-list-database/pharmaceutical">Pharmaceutical</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'email-list-database/admission">Admission</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav__item">
                            <a class="nav__item__link" href="' . $siteUrl . 'pricing">Pricing</a>
                        </li>
                        <li class="nav__item nav__item--about">
                            <a class="nav__item__link" href="' . $siteUrl . 'about">About</a>
                        </li>
                        
                    </ul>
                </nav>
                <div class="header__build-btn dropdown dropdown--build-list
                     dropdown--arrow">
                    <a class="button button--primary dropdown__btn" href=""
                       data-toggle="dropdown">Email List Builder</a>
                    <div class="dropdown__container">
                        <div class="menu menu--secondary text-uppercase">
                           <a class="menu__item gap-bottom-small"
                               href="' . $siteUrl . 'custom-order/business-contacts">Business Contacts</a>
                            <a class="menu__item gap-bottom-small"
                               href="' . $siteUrl . 'custom-order/healthcare-professionals">Healthcare
                                Professionals</a>
                            <a class="menu__item gap-bottom-small"
                               href="' . $siteUrl . 'custom-order/real-estate-agents">Real
                               Estate Agents</a>
                            <a class="menu__item" href="' . $siteUrl . 'custom-order/office-365">Office 365</a>
                        </div>
                    </div>
                </div>
                <div class="header__iconic-box iconic-box">
                    <i class="iconic-box__icon icon icon-user"></i>
                    <div class="iconic-box__content">
                        <a href="' . $siteUrl . 'user/order" class="iconic-box__content__title
                           iconic-box__content__title--link">' . $cname . '</a><br>
                    </div>
                </div>
            </div>
                        </header>';
    } else {
        echo '<header class="header header--fixed">
            <div class="header__inner">
                <button id="mobileMenuOpenBtn" class="mobile-menu-toggle-btn"
                        type="button"></button>
                <a href="' . $siteUrl . '" class="logo-link">
                    <img class="logo" width="170" height="100"
                         src="' . $siteUrl . 'bundles/bydhome/img/bookyourdata-logo.svg"
                         alt="' . $siteName . ' Logo" />
                </a>
                <nav id="main-nav" class="main-nav">
                    <ul class="main-nav__list nav nav--primary">
                        <li class="nav__item nav__item--build-a-list shahab">
                            <a class="nav__item__link js-submenu-trigger"
                               href="' . $siteUrl . 'custom-order/business-contacts">Email List Builder</a>
                            <ul class="main-nav__sub nav nav--secondary">
                                <li class="nav__item">
                                    <a class="nav__item__link js-build-link"
                                       href="' . $siteUrl . 'custom-order/business-contacts">Business Contacts</a>
                                    <a class="nav__item__link js-build-link"
                                       href="' . $siteUrl . 'custom-order/healthcare-professionals">Healthcare
                                        Professionals</a>
                                    <a class="nav__item__link js-build-link"
                                       href="' . $siteUrl . 'custom-order/real-estate-agents">Real Estate
                                        Agents</a>
                                    <a class="nav__item__link js-build-link"
                                       href="' . $siteUrl . 'custom-order/office-365">Office 365</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav__item nav__item--build-a-list shahab2">
                            <a class="nav__item__link js-submenu-trigger"
                               href="#">Email List Builder</a>
                            <ul class="main-nav__sub nav nav--secondary">
                                <li class="nav__item">
                                    <a class="nav__item__link js-build-link"
                                       href="' . $siteUrl . 'custom-order/business-contacts">Business Contacts</a>
                                    <a class="nav__item__link js-build-link"
                                       href="' . $siteUrl . 'custom-order/healthcare-professionals">Healthcare
                                        Professionals</a>
                                    <a class="nav__item__link js-build-link"
                                       href="' . $siteUrl . 'custom-order/real-estate-agents">Real Estate
                                        Agents</a>
                                    <a class="nav__item__link js-build-link"
                                       href="' . $siteUrl . 'custom-order/office-365">Office 365</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav__item shahab">
                            <a class="nav__item__link js-submenu-trigger"
                               href="' . $siteUrl . 'ready-made">Email List</a>
                            <ul class="main-nav__sub nav nav--secondary">
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/job-levels">Job
                                        Levels</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/job-titles">Job
                                        Titles</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/job-functions">Job
                                        Functions</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/real-estate">Real
                                        Estate</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/office-365">Office 365</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/zoominfo">Zoominfo</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/industries">Industries</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/healthcare-professionals">Healthcare
                                        Professionals</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/international">International</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav__item shahab2">
                            <a class="nav__item__link js-submenu-trigger"
                               href="#">Ready Made List</a>
                            <ul class="main-nav__sub nav nav--secondary">
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/job-levels">Job
                                        Levels</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/job-titles">Job
                                        Titles</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/job-functions">Job
                                        Functions</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/real-estate">Real
                                        Estate</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/office-365">Office 365</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/zoominfo">Zoominfo</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/industries">Industries</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/healthcare-professionals">Healthcare
                                        Professionals</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'ready-made/international">International</a>
                                </li>
                            </ul>
                        </li>
                         <li class="nav__item nav__item--popular">
                            <a class="nav__item__link js-submenu-trigger"
                               href="#">Email Database</a>
                            <ul class="main-nav__sub nav nav--secondary">
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'email-list-database/ceo">CEO</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'email-list-database/hr">HR</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'email-list-database/office-365">Office 365</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'email-list-database/attorney">Attorney</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'email-list-database/colleges-universities">Colleges
                                        Universities</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'email-list-database/pharmaceutical">Pharmaceutical</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__link"
                                       href="' . $siteUrl . 'email-list-database/admission">Admission</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav__item">
                            <a class="nav__item__link" href="' . $siteUrl . 'pricing">Pricing</a>
                        </li>
                        <li class="nav__item nav__item--about">
                            <a class="nav__item__link" href="' . $siteUrl . 'about">About</a>
                        </li>
                       
                    </ul>
                </nav>
                <div class="header__build-btn dropdown dropdown--build-list
                     dropdown--arrow">
                    <a class="button button--primary dropdown__btn" href=""
                       data-toggle="dropdown">Email List Builder</a>
                    <div class="dropdown__container">
                        <div class="menu menu--secondary text-uppercase">
                            <a class="menu__item gap-bottom-small"
                               href="' . $siteUrl . 'custom-order/business-contacts">Business Contacts</a>
                            <a class="menu__item gap-bottom-small"
                               href="' . $siteUrl . 'custom-order/healthcare-professionals">Healthcare
                                Professionals</a>
                            <a class="menu__item gap-bottom-small"
                               href="' . $siteUrl . 'custom-order/real-estate-agents">Real
                               Estate Agents</a>
                            <a class="menu__item" href="' . $siteUrl . 'custom-order/office-365">Office 365</a>
                                    
                        </div>
                    </div>
                </div>
                <div class="header__iconic-box iconic-box">
                    <i class="iconic-box__icon icon icon-user"></i>
                    <div class="iconic-box__content">
                        <a href="' . $siteUrl . 'login?redirect=' . urlencode($link) . '" class="iconic-box__content__title
                           iconic-box__content__title--link">User Login</a><br>
                        <a href="' . $siteUrl . 'signup"
                           class="iconic-box__content__subtitle
                           link-secondary">Not a member? Sign up!</a>
                    </div>
                </div>
                <div class="header__iconic-box header__iconic-box--phone
                    iconic-box">
                    <i class="iconic-box__icon icon icon-mobile-phone"></i>
                    <div class="iconic-box__content">
                        <strong class="iconic-box__content__title"
                            style="line-height: 18px;">+44 7441442048</strong><br>
                        <span class="iconic-box__content__subtitle">Emergency</span>
                    </div>
                </div>
            </div>
                        </header>';
    }
