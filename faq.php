<?php include_once 'assets/php/header.php'; ?>
<div class="jumbotron jumbotron--regular jumbotron--regular-bg">
    <div class="container jumbotron__container">
        <div class="jumbotron__inner">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="jumbotron__title">How Can We Help You</h1>
                    <div class="breadbrumb gap-bottom-small">
                        <a href="<?= $siteUrl; ?>" class="breadbrumb__item">Home</a>
                        <span class="breadbrumb__item">FAQ</span>
                    </div>
                    <form class="form form-single-line form-single-line--search" action="<?= $siteUrl; ?>faq" method="GET">
                        <input class="form-single-line__input form__control" type="text" name="q" placeholder="Please enter a keyword" value="">
                        <button class="form-single-line__submit" type="submit"><i class="icon icon-arrow-forward"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h5 class="secondary-title gap-bottom">Frequently Asked
                    Questions</h5>
                <div class="accordion js-accordion">
                    <div class="accordion__item">
                        <div class="accordion__item__title">Which payment methods do you accept?</div>
                        <div class="accordion__item__content">
                            <div class="accordion__item__content__inner ">
                                <p>We accept MasterCard, Visa, American Express, Bank Wire, Bitcoin. Our aim is to simplify the ordering process and present your email list as soon as possible.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion__item">
                        <div class="accordion__item__title">When were your data lists last updated?</div>
                        <div class="accordion__item__content">
                            <div class="accordion__item__content__inner ">
                                <p>Our data is verified weekly. We have developed a complex algorithm for this purpose. With this algorithm, we check the accuracy levels of our data against millions of sources and apply necessary updates.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion__item">
                        <div class="accordion__item__title">How long does it take to get my email list after I order online?</div>
                        <div class="accordion__item__content">
                            <div class="accordion__item__content__inner ">
                                <p>You can instantly download your database after your order is confirmed.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion__item">
                        <div class="accordion__item__title">Some companies will only let me access contacts through a Web-based application: Do you share the actual data files, or do you just help us market without letting us see the data like others do?</div>
                        <div class="accordion__item__content">
                            <div class="accordion__item__content__inner ">
                                <p>We sell you the actual data files.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion__item">
                        <div class="accordion__item__title">You have some ready-made databases on your Web site, but I couldn’t find the specific data I’m looking for. How can I perform a search?</div>
                        <div class="accordion__item__content">
                            <div class="accordion__item__content__inner ">
                                <p>You can use our custom online tool to search using any criteria you wish, place an order, and directly download your database to start marketing!</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion__item">
                        <div class="accordion__item__title">I want to contact other firms to market my company’s products; can I use your email lists?</div>
                        <div class="accordion__item__content">
                            <div class="accordion__item__content__inner ">
                                <p>Yes, we sell B2B email lists for your needs.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion__item">
                        <div class="accordion__item__title">I want to place an order, but I have doubts about the accuracy of the data. Why should I trust you?</div>
                        <div class="accordion__item__content">
                            <div class="accordion__item__content__inner ">
                                <p>All of the records we sell have a 95% accuracy guarantee. If you encounter a lower accuracy rate, you can contact our customer relations staff and we will provide you new data for free to make up the difference. We call it our Bounce-Back Guarantee.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion__item">
                        <div class="accordion__item__title">Can I feed your files into CRM software easily?</div>
                        <div class="accordion__item__content">
                            <div class="accordion__item__content__inner ">
                                <p>Yes: Our .csv files are supported by all CRM platforms.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion__item">
                        <div class="accordion__item__title">Why is your data so cheap?</div>
                        <div class="accordion__item__content">
                            <div class="accordion__item__content__inner ">
                                <p>We do not adjust our pricing for each customer, and we have a transparent pricing policy. We aim to reach as many customers as possible, including startups and small businesses.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion__item">
                        <div class="accordion__item__title">What should I keep in mind when ordering an email list?</div>
                        <div class="accordion__item__content">
                            <div class="accordion__item__content__inner ">
                                <p>The most important criterion is to choose your target audience accurately. For this purpose, we developed our online list-builder tool. If you choose the right audience to market your product, your success rate will be higher, you will be happier, and you will want to purchase new email lists from us.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion__item">
                        <div class="accordion__item__title">Do customers download files as Excel files?</div>
                        <div class="accordion__item__content">
                            <div class="accordion__item__content__inner ">
                                <p>We offer Excel files, .cvs files or .txt files.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion__item">
                        <div class="accordion__item__title">Are you GDPR compliant?</div>
                        <div class="accordion__item__content">
                            <div class="accordion__item__content__inner ">
                                <p>Our entire data pool is GDPR Ready.</p>
                                <p>Please see <a href="https://www.emailbigdata.com/">https://www.emailbigdata.com/</a> for the reference.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 pad-top-tld">
                <h5 class="secondary-title gap-bottom">Contact Us</h5>
                <p>Our international team works hard to create the best data-pulling tools in the industry. Our goal is to
                    help you find the best business contacts out there. Have questions? Feel free to contact us today!</p>
                <i class="icon icon-email contact-mail-icon"></i> <a class="font-large transition-color" href="mailto:support@emailbigdata.com" target="_blank">support@emailbigdata.com</a>
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