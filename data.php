<?php
include_once 'assets/php/header.php';
require_once 'assets/php/auth.php';
$user = new Auth();

if (isset($_GET['title'])) {
    $title = $_GET['title'];
    $blogs = $user->show_blog($title);

    $category = $blogs['category'];
    $title = $blogs['title'];
    $description = $blogs['description'];
}
?>
<div class="jumbotron jumbotron--regular jumbotron--regular-bg">
    <div class="container jumbotron__container">
        <div class="jumbotron__inner">
            <div class="row">
                <div class="col-md-5">
                    <h2 class="jumbotron__title"><?= $category; ?></h2>
                    <div class="breadbrumb">
                        <a href="<?= $siteUrl; ?>" class="breadbrumb__item">Home</a>
                        <a href="<?= $siteUrl; ?>blog" class="breadbrumb__item">Blogs</a>
                        <span class="breadbrumb__item"><?= $title; ?></span>
                    </div>
                </div>
                <div class="col-md-7">
                    <p class="clear-gap-bottom">Learn about the latest tricks in marketing from data experts on
                        our blog. Uncover the secrets of finding the best business leads, gain insider knowledge,
                        and become a marketing master!</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pad-vertical-small">
    <div class="container section">
        <div class="row">
            <div class="col-md-3 pad-top-tld">
                <ul class="list list--tertiary shadow-primary gap-bottom">
                    <li class="list__item">
                        <h6 class="secondary-title font-xsmall">Categories</h6>
                    </li>
                    <li class="list__item list--tertiary__item--no-pad">
                        <div class="sidebar-nav sidebar-nav--without-icon">
                            <a class="sidebar-nav__item" href="<?= $siteUrl; ?>blog">Data</a>
                            <a class="sidebar-nav__item" href="<?= $siteUrl; ?>blog">Marketing</a>
                            <a class="sidebar-nav__item" href="<?= $siteUrl; ?>blog">Lifestyle</a>
                            <a class="sidebar-nav__item" href="<?= $siteUrl; ?>blog">Sales Prospecting</a>
                            <a class="sidebar-nav__item" href="<?= $siteUrl; ?>blog">Email Marketing</a>
                        </div>
                    </li>
                </ul>
                <ul class="list list--tertiary shadow-primary gap-bottom">
                    <li class="list__item">
                        <h6 class="secondary-title font-xsmall">Recent Posts</h6>
                    </li>
                    <li class="list__item list--tertiary__item--no-pad">
                        <div class="sidebar-nav">
                            <a class="sidebar-nav__item" href="#">New feature launches on EmailBigData - web technologies</a>
                            <a class="sidebar-nav__item" href="#">Cold Emailing - The most effective marketing channel</a>
                            <a class="sidebar-nav__item" href="#">3 Essentials to targeting and prospecting b2b leads effectively</a>
                            <a class="sidebar-nav__item" href="<?= $siteUrl; ?>blog">Need leads? 5 factors to consider when you buy leads online</a>
                            <a class="sidebar-nav__item" href="<?= $siteUrl; ?>blog">4 sales prospecting tools to engage leads online</a>
                            <a class="sidebar-nav__item" href="<?= $siteUrl; ?>blog">5 ways to increase your return on ceo email addresses</a>
                        </div>
                    </li>
                </ul>
                <ul class="list list--tertiary shadow-primary gap-bottom">
                    <li class="list__item">
                        <h6 class="secondary-title font-xsmall">Newsletter</h6>
                        <p class="clear-gap-bottom">Subscribe to our email newsletter for useful articles and valuable resources.</p>
                    </li>
                    <li class="list__item">
                        <form class="form form-single-line ajaxRequest" data-input="newsletter_input" action="<?= $siteUrl; ?>/newsletter/save" method="POST">
                            <input class="form-single-line__input form__control" id="newsletter_input" type="email" name="email" placeholder="name@email.com">
                            <button class="form-single-line__submit" type="submit"><i class="icon icon-arrow-forward"></i></button>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <h1 class="primary-title h3 text-center"><?= $title; ?> </h1>
                <hr>
                <div style="text-align: justify;"><?= $description; ?></div>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <hr>
        <h3 class="primary-title">Q&amp;A</h3>
        <div class="row">
            <div class="col-md-6">
                <h4>When were your data lists last updated?</h4>
                <p>Our data is verified weekly. We have developed a complex algorithm for this purpose. With this algorithm, we check the accuracy levels of our data against millions of sources and apply necessary updates.</p>
            </div>
            <div class="col-md-6">
                <h4>How long does it take to get my email list after I order online?</h4>
                <p>You can instantly download your database after your order is confirmed.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h4>I want to place an order, but I have doubts about the accuracy of the data. Why should I trust you?</h4>
                <p>All of the records we sell have a 95% accuracy guarantee. If you encounter a lower accuracy rate, you can contact our customer relations staff and we will provide you new data for free to make up the difference. We call it our Bounce-Back Guarantee.</p>
            </div>
            <div class="col-md-6">
                <h4>Do customers download files as Excel files?</h4>
                <p>We offer Excel files, .cvs files or .txt files.</p>
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