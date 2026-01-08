<?php
$user = new Auth();
?>
<div class="jumbotron jumbotron--regular jumbotron--regular-bg">
    <div class="container jumbotron__container">
        <div class="jumbotron__inner">
            <div class="row">
                <div class="col-md-6 gap-bottom-tld">
                    <h1 class="jumbotron__title">Email Lists By States</h1>
                    <div class="breadbrumb">
                        <a href="<?= $siteUrl; ?>" class="breadbrumb__item">Home</a>
                        <a href="<?= $siteUrl; ?>ready-made" class="breadbrumb__item">Ready Made Lists</a>
                        <span class="breadbrumb__item">States</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <p>Looking for direct email contacts of executives, professionals by States? Then you should try our comprehensive email lists by States. We&#039;re the only one that can fill your marketing needs with 95% guaranteed email leads that will boost your ROI!</p>
                </div>
            </div>
        </div>
    </div>
</div>
<main class="pad-bottom-medium">
    <div class="container regular-page-content regular-page-content--pull-top">
        <div class="box box--ready-made">
            <div class="row">
                <div class="col-md-6 col-lg-7 gap-bottom-small-tpnd">
                    <h2 class="secondary-title clear-gap-vertical font-medium">
                        Business Contacts
                    </h2>
                    <span>You can select a ready-made list from below or create your own list.</span>
                </div>
                <div class="col-md-6 col-lg-5">
                    <a class="button button--septenary button--small text-uppercase gap-bottom-small-tld full-width" href="<?= $siteUrl; ?>custom-order/business-contacts">
                        Build your own business contacts list
                    </a>
                </div>
            </div>
        </div>
        <div class="premade-lists gap-bottom-small" id="totalStates">
            <h2>Please Wait....</h2>
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
                            <i class="iconic-content__icon icon icon-coins"></i>
                        </div>
                        <div class="iconic-content__content">
                            <h3 class="iconic-content__title">Affordable Pricing</h3>
                            <p>Quality email lists enable businesses to make B2B connections for an amazingly low price.</p>
                        </div>
                    </li>
                    <li class="iconic-content gap-bottom">
                        <div class="iconic-content__icon-area">
                            <i class="iconic-content__icon icon icon-search"></i>
                        </div>
                        <div class="iconic-content__content">
                            <h3 class="iconic-content__title">Search, Order, Download!</h3>
                            <p>Within minutes, you can download a database of contacts and start connecting with your audience.</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="list">
                    <li class="iconic-content gap-bottom">
                        <div class="iconic-content__icon-area">
                            <i class="iconic-content__icon icon icon-identification"></i>
                        </div>
                        <div class="iconic-content__content">
                            <h3 class="iconic-content__title">Unmatched Accuracy</h3>
                            <p>Both automated and manual processes ensure the accuracy of our human-verified lists.</p>
                        </div>
                    </li>
                    <li class="iconic-content gap-bottom">
                        <div class="iconic-content__icon-area">
                            <i class="iconic-content__icon icon icon-crm-ready"></i>
                        </div>
                        <div class="iconic-content__content">
                            <h3 class="iconic-content__title">CRM-Ready Files</h3>
                            <p>Download your list as a .csv file, integrate it into your CRM, and start networking.</p>
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
            <h5 class="lead__text gap-bottom-tld">Ready To Boost Your Sales Like Your Competitors? Try Our Tool For Free.</h5>
        </div>
        <div class="lead__col lead__col--right">
            <a class="button button--quaternary full-width" href="<?= $siteUrl; ?>custom-order/business-contacts">
                Custom Order <i class="icon icon-arrow-forward button--quaternary__icon"></i>
            </a>
        </div>
    </div>
</div>
<?php include_once '../assets/php/footer.php'; ?>

<script>
    displayTotalStates();
    function displayTotalStates() {
        $.ajax({
            url: '../assets/php/action',
            type: 'post',
            data: {
                action: 'display-total-states'
            },
            success: function (response) {
                $("#totalStates").html(response);
            }
        });
    }
</script>