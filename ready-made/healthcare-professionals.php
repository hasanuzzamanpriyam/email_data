<?php
include_once '../assets/php/header.php';
require_once '../assets/php/auth.php';
require_once '../assets/php/session.php';
$user = new Auth();

?>
<div class="jumbotron jumbotron--regular jumbotron--regular-bg">
    <div class="container jumbotron__container">
        <div class="jumbotron__inner">
            <div class="row">
                <div class="col-md-6 gap-bottom-tld">
                    <h1 class="jumbotron__title">Email Lists By
                        Healthcare Professionals</h1>
                    <div class="breadbrumb">
                        <a href="<?= $siteUrl; ?>"
                            class="breadbrumb__item">Home</a>
                        <a href="<?= $siteUrl; ?>ready-made"
                            class="breadbrumb__item">Ready Made Lists</a>
                        <span class="breadbrumb__item">Healthcare
                            Professionals</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <p>Purchase a medical email list of doctors and
                        health professionals to find and connect with
                        them based on specialty. When you purchase a
                        verified medical doctor list by specialty, you
                        can email doctors and those who would be
                        interested in your service. Connect using a
                        pre-built, accurate healthcare email database,
                        including addresses and phone numbers. As an
                        all-in-one solution, our affordable healthcare
                        email lists serve as a healthcare email database
                        for better B2B email marketing and as your
                        doctor mailing list for sending letters or
                        samples. Buy a medical contact list and find
                        sales leads today!</p>
                </div>
            </div>
        </div>
    </div>
</div>
<main class="pad-bottom-medium">
    <div class="container regular-page-content
         regular-page-content--pull-top">
        <div class="box box--ready-made">
            <div class="row">
                <div class="col-md-6 col-lg-7 gap-bottom-small-tpnd">
                    <h2 class="secondary-title clear-gap-vertical
                        font-medium">
                        Healthcare Professionals
                    </h2>
                    <span>You can select a ready-made list from below or
                        create your own list.</span>
                </div>
                <div class="col-md-6 col-lg-5">
                    <a class="button button--septenary button--small
                       text-uppercase gap-bottom-small-tld full-width"
                        href="<?= $siteUrl; ?>custom-order/healthcare-professionals">
                        Build your own healthcare list
                    </a>
                </div>
            </div>
        </div>
        <div class="premade-lists gap-bottom-small">

            <?php
            function slugify($text, string $divider = '-')
            {
                $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
                $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
                $text = preg_replace('~[^-\w]+~', '', $text);
                $text = trim($text, $divider);
                $text = preg_replace('~-+~', $divider, $text);
                $text = strtolower($text);

                if (empty($text)) {
                    return 'n-a';
                }

                return $text;
            }

            $output = '';
            $allJobLevel = $user->all_health();
            if ($allJobLevel) {
                foreach ($allJobLevel as $row) {
                    $title = slugify($row['title']);
                    $seoUrl = $row['seo_url'];

                    $output .= '<div class="premade-lists__item"><div class="premade-lists__item__row">
                            <div class="premade-lists__item__col">
                                <h2 class="premade-lists__item__title h4">
                                    ' . $row['category'] . '
                                </h2>
                                <span class="text-primary"></span>
                            </div>
                            <div class="premade-lists__item__col
                                 gap-bottom-small-tpd">
                                <span class="premade-lists__item__contact-title h6">
                                    ' . number_format($row['total_email']) . '
                                </span>
                                <small>Contacts</small>
                            </div>
                            <div class="premade-lists__item__col">
                                ' . $row['short_description'] . '
                            </div>
                            <div class="premade-lists__item__col text-right">';
                    // Always link to single product page
                    if ($seoUrl != '') {
                        $output .= '<a href="' . $siteUrl . 'ready-made/single-product?slug=' . urlencode($seoUrl) . '" class="premade-lists__item__price" style="text-decoration:none;">$ ' . number_format($row['price']) . '</a></div>
                        </div></div>';
                    } else {
                        $output .= '<a href="' . $siteUrl . 'ready-made/single-product?id=' . $row['id'] . '" class="premade-lists__item__price" style="text-decoration:none;">$ ' . number_format($row['price']) . '</a></div>
                        </div></div>';
                    }
                }
                echo $output;
            } else {
                echo '<h3 class="text-center text-secondary">No Records Fount!</h3>';
            }
            ?>
        </div>
    </div>
</main>
<hr class="hr-line">
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul class="list">
                    <li class="iconic-content gap-bottom">
                        <div class="iconic-content__icon-area">
                            <i class="iconic-content__icon icon
                               icon-coins"></i>
                        </div>
                        <div class="iconic-content__content">
                            <h3 class="iconic-content__title">Affordable
                                Pricing</h3>
                            <p>Quality email lists enable businesses to
                                make B2B connections for an amazingly
                                low price.</p>
                        </div>
                    </li>
                    <li class="iconic-content gap-bottom">
                        <div class="iconic-content__icon-area">
                            <i class="iconic-content__icon icon
                               icon-search"></i>
                        </div>
                        <div class="iconic-content__content">
                            <h3 class="iconic-content__title">Search,
                                Order, Download!</h3>
                            <p>Within minutes, you can download a
                                database of contacts and start
                                connecting with your audience.</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="list">
                    <li class="iconic-content gap-bottom">
                        <div class="iconic-content__icon-area">
                            <i class="iconic-content__icon icon
                               icon-identification"></i>
                        </div>
                        <div class="iconic-content__content">
                            <h3 class="iconic-content__title">Unmatched
                                Accuracy</h3>
                            <p>Both automated and manual processes
                                ensure the accuracy of our
                                human-verified lists.</p>
                        </div>
                    </li>
                    <li class="iconic-content gap-bottom">
                        <div class="iconic-content__icon-area">
                            <i class="iconic-content__icon icon
                               icon-crm-ready"></i>
                        </div>
                        <div class="iconic-content__content">
                            <h3 class="iconic-content__title">CRM-Ready
                                Files</h3>
                            <p>Download your list as a .csv file,
                                integrate it into your CRM, and start
                                networking.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="lead hidden-dd">
    <div class="container lead__container">
        <div class="lead__col lead__col--left">
            <h5 class="lead__text gap-bottom-tld">Ready To Boost Your
                Sales Like Your Competitors? Try Our Tool For Free.</h5>
        </div>
        <div class="lead__col lead__col--right">
            <a class="button button--quaternary full-width"
                href="<?= $siteUrl; ?>custom-order/healthcare-professionals">
                Custom Order <i class="icon icon-arrow-forward
                                button--quaternary__icon"></i>
            </a>
        </div>
    </div>
</div>
<?php include_once '../assets/php/footer.php'; ?>

<script>
    displayTotalHealth();

    function displayTotalHealth() {
        $.ajax({
            url: '../assets/php/action',
            type: 'post',
            data: {
                action: 'display-total-health'
            },
            success: function(response) {
                $("#totalhealth").html(response);
            }
        });
    }
</script>