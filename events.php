<?php include_once 'assets/php/header.php'; ?>
<div class="jumbotron jumbotron--regular jumbotron--regular-bg">
    <div class="container jumbotron__container">
        <div class="jumbotron__inner">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="jumbotron__title">Upcoming Events</h1>
                    <div class="breadbrumb">
                        <a href="<?= $siteUrl; ?>" class="breadbrumb__item">Home</a>
                        <span class="breadbrumb__item">Events</span>
                    </div>
                </div>
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
<?php include_once 'assets/php/footer.php'; ?>