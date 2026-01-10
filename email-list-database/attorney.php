<?php include_once '../assets/php/header.php'; $_SESSION['myPrice'] = 3808;?>
<div class="jumbotron jumbotron--list-detail jumbotron--regular-bg">
    <div class="container jumbotron--list-detail__container
         table-layout-fixed">
        <div class="jumbotron--list-detail__col-half
             jumbotron--list-detail__col-left">
            <img class="img-responsive"
                 src="<?= $siteUrl; ?>bundles/bydhome/img/thumbs/contact-list2.jpg"
                 alt="mailerstation">
            <div class="box-contact-count">
                <div class="vertical-center">
                    <span>Direct</span>
                    <span class="box-contact-count__title">
                        52,160
                    </span>
                    <span>Email Contacts</span>
                </div>
            </div>
        </div>
        <div class="jumbotron--list-detail__col-half
             jumbotron--list-detail__col-right">
            
            <div class="gap-bottom-small">
                <h1 class="jumbotron__title" style="margin-top: 15px;">Attorney EMAIL LIST</h1>
                <strong class="jumbotron--list-detail__subtitle"></strong>
            </div>
            <div class="gap-bottom">
                <span class="jumbotron--list-detail__price"  style="color: orange">
                 <?= $_SESSION['myPrice'];?>
                </span>
                <h4 class="jumbotron__title">Custom Order E-mail: <span id="demo" class="jumbotron--list-detail__price" style="color: orange"><?php $totalemail = 52160; echo number_format($totalemail); ?></span></h4>
                <h4 class="jumbotron__title">Total Price: <span id="demo1" class="jumbotron--list-detail__price" style="color: orange"><?= $_SESSION['myPrice'];?></span></h4>
                <div class="slidecontainer">
                    <input type="range" min="1000" max="<?php
                        $totalemail = 52160;
                        echo $totalemail;
                        ?>" value="<?php
                        $totalemail = 52160;
                        echo $totalemail;
                        ?>" class="slider" id="myRange" step="100">
                    
                </div>
            </div>
            <p class="text-loblolly">Download our accurate,
                human-verified list of lawyers&#039; emails, phone
                numbers, and more using mailerstation.com. This pre-made
                attorney email database is full of direct contact
                information, so you can market specifically to legal
                advisers across firms.</p>
            <div class="gap-bottom-medium hidden-tlnd">
                <form action="<?= $siteUrl; ?>checkout/step1" method="POST">
                    <input type="hidden" name="ordercode" value="<?php echo ('PO' . rand(10, 99) . 'P' . rand(10, 99) . 'L' . rand(0, 9) . 'R'); ?>" >
                    <input type="hidden" name="emailType" value="Popular" >
                    <input type="hidden" name="emailCategory" value="Job Function">
                    <input type="hidden" name="selectItem" value="Attorney" >
                    <input type="hidden" name="totalemail" value="52160" >
                    <input type="hidden" name="price" value="<?= $_SESSION['myPrice']; ?>" >
                    <input type="hidden" name="deliveryDays" value="Within 1 Day" >
                    
                    <input type="hidden" name="dataType" id="dataType" >
                    
                    <span id="customPrice" style="color: black;"></span>
                    <input type="submit" name="buyNow"class="button button--primary gap-right-plnu full-width-pld gap-bottom-small-pld" value="Buy Now">
                </form>
            </div>
            <ul class="list row">
                <li class="col-lg-4 col-md-5 col-sm-6
                    gap-bottom-small-tpd">
                    <span class="icon icon-checkbox font-xlarge
                          align-middle"></span>
                    <span class="font-small align-middle
                          gap-left-small">Best Price Guarantee</span>
                </li>
                <li class="col-lg-8 col-md-7 col-sm-6
                    gap-bottom-small-tpd">
                    <span class="icon icon-checkbox font-xlarge
                          align-middle"></span>
                    <span class="font-small align-middle
                          gap-left-small">Last Update 02/12/2021</span>
                </li>
            </ul>
        </div>
    </div>
</div>
<hr class="hr-line">
<div class="pad-vertical-small">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 gap-bottom-small-tpd">
                <div class="iconic-block">
                    <span class="icon icon-checkbox iconic-block__icon"></span>
                    <span class="iconic-block__text">95% Deliverability
                        <br class="hidden-tpd">Guarantee</span>
                </div>
            </div>
            <div class="col-sm-3 gap-bottom-small-tpd">
                <div class="iconic-block">
                    <span class="icon icon-checkbox iconic-block__icon"></span>
                    <span class="iconic-block__text">Best Price <br
                            class="hidden-tpd">Guarantee</span>
                </div>
            </div>
            <div class="col-sm-3 gap-bottom-small-tpd">
                <div class="iconic-block">
                    <span class="icon icon-csv iconic-block__icon"></span>
                    <span class="iconic-block__text">Instant <br
                            class="hidden-tpd">Download (.csv)</span>
                </div>
            </div>
            <div class="col-sm-3 gap-bottom-small-tpd">
                <div class="iconic-block">
                    <span class="icon icon-identification
                          iconic-block__icon"></span>
                    <span class="iconic-block__text">Verified <br
                            class="hidden-tpd">Weekly</span>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="hr-line">
<div class="pad-top-small">
    <div class="container">
        <div class="row gap-bottom-large">
            <div class="col-md-10 col-md-offset-1">
                <h2 class="primary-title h3">Attorney </h2>
                <p style="text-align: justify;">Network with highly qualified attorneys from multiple
                    industries, businesses, and law firms. If you want
                    to get a hold of attorneys, you don't have to sift
                    through the contact information of less-qualified
                    paralegals, legal aides, and office assistants. You
                    can pull lawyers' email addresses and contact
                    information so that you can get in touch with them
                    directly. This affordable attorney mailing list is
                    one of our many pre-built data products and can be
                    integrated into your CRM within minutes. <br> <br>Make
                    your case for your product, service, or business
                    using our lawyer email list. Whether you plan to
                    invite them to a networking event, coordinate groups
                    of lawyers, email leads who are more likely to be
                    interested in your product, or send other vital
                    communication, our premium lawyers list can help.
                    Using this list of attorneys, you can call, email,
                    or send mail directly to lawyers. You can buy this
                    ready-to-download list of unique, valuable sales
                    leads, or you can customize attorney email lists to
                    fit your specific audience. <br> <br>Why choose
                    mailerstation.com for your B2B marketing contact list
                    needs? The evidence in favor of our attorney email
                    database is overwhelming: We offer affordable,
                    human-verified attorney mailing lists guaranteed to
                    be at least 90% accurate. Who else can provide such
                    a large-scale, business-focused, targeted list of
                    attorney email addresses at such an amazing price?
                    We rest our case.</p>
            </div>
        </div>
        <a href="<?= $siteUrl; ?>our-guarantees" class="lead lead--secondary
           lead--link">
            <h5 class="lead__text">We Guarantee Over 95% Email
                Deliverability With Complete Vcard Information</h5>
        </a>
        <div class="row pad-vertical">
            <div class="col-md-3 col-sm-6 gap-bottom-tld">
                <i class="icon icon-checkbox text-primary icon-medium"></i>
                <h4>95% Deliverability Guarantee</h4>
                <p class="clear-gap-bottom">Our data is verified by
                    automated processes and human eyes. We're so
                    confident about our contact lists that we provide a
                    95% accuracy guarantee. If more than 5%
                    of your emails bounce, you'll get credits to make up
                    the difference.</p>
            </div>
            <div class="col-md-3 col-sm-6 gap-bottom-tld">
                <i class="icon icon-download text-primary icon-medium"></i>
                <h4>Instant Download</h4>
                <p class="clear-gap-bottom">Get an email list in minutes
                    and download it instantly as a
                    .csv file! Both file types can be integrated into
                    your CRM application quickly
                    and easily. So you can get started with making new
                    connections right away.</p>
            </div>
            <div class="col-md-3 col-sm-6 gap-bottom-tld">
                <i class="icon icon-identification text-primary
                   icon-medium"></i>
                <h4>Email, Phone, Company Information, & More</h4>
                <p class="clear-gap-bottom">We provide direct, detailed,
                    specific information to help you make
                    more valuable connections with your future business
                    contacts: emails, names, phone numbers,
                    postal addresses, business titles, company/industry
                    information, department information,
                    fax numbers, revenue, and even employee information.</p>
            </div>
            <div class="col-md-3 col-sm-6">
                <i class="icon icon-copyright text-primary icon-medium"></i>
                <h4>Unlimited Usage Rights</h4>
                <p class="clear-gap-bottom">Once you order the list, you
                    own it! Our pricing is transparent; we
                    don't charge extra fees for using the contacts we
                    give you. There are no hidden fees or
                    contracts. We charge the same low price regardless
                    of if you're a small start-up or a large
                    enterprise!</p>
            </div>
        </div>
        <div class="lead lead--secondary">
            <h5 class="lead__text gap-bottom-small-tlnd">Best Price
                Guarantee</h5>
            <p class="text-white clear-gap-bottom">For sure there's no
                another supplier that can provide better pricing with
                the same 95% email deliverability guarantee. Even if you
                find, we beat it directly! </p>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <h3 class="primary-title">Q&amp;A</h3>
        <div class="row">
            <div class="col-md-6">
                <h4>When were your data lists last updated?</h4>
                <p><p>Our data is verified weekly. We have developed a
                    complex algorithm for this purpose. With this
                    algorithm, we check the accuracy levels of our
                    data against millions of sources and apply
                    necessary updates.</p></p>
            </div>
            <div class="col-md-6">
                <h4>How long does it take to get my email list after I
                    order online?</h4>
                <p><p>You can instantly download your database after
                    your order is confirmed.</p></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h4>I want to place an order, but I have doubts about
                    the accuracy of the data. Why should I trust you?</h4>
                <p><p>All of the records we sell have a 95% accuracy
                    guarantee. If you encounter a lower accuracy
                    rate, you can contact our customer relations
                    staff and we will provide you new data for free
                    to make up the difference. We call it our
                    Bounce-Back Guarantee.</p></p>
            </div>
            <div class="col-md-6">
                <h4>Do customers download files as Excel files?</h4>
                <p><p>We offer Excel files, .cvs files or .txt files.</p></p>
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
               href="<?= $siteUrl; ?>custom-order/business-contacts">
                Custom Order <i class="icon icon-arrow-forward
                                button--quaternary__icon"></i>
            </a>
        </div>
    </div>
</div>
<?php include_once '../assets/php/footer.php'; ?>
<script>
    // Create our number formatter.
        var formatter = new Intl.NumberFormat('en-US', {
          style: 'currency',
          currency: 'USD',
        });
        
        Number.prototype.format = function(n, x) {
            var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
            return this.toFixed(Math.max(0, ~~n)).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
        };
        
    var slider = document.getElementById("myRange");
    var output = document.getElementById("demo");
    var output1 = document.getElementById("demo1");
    var output3 = document.getElementById("customPrice");
    
    slider.oninput = function () {
        
        var totalEmail = this.value;
        let totalPrice = 0;
        let price = 0;
        if(totalEmail < 6000){
            output.innerHTML = totalEmail.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
            price = totalEmail * 0.10 ;
            totalPrice = (Math.ceil(price)).format();
            
        }else if(totalEmail < 11000){
            output.innerHTML = totalEmail.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
            price = totalEmail * 0.09 ;
            totalPrice = (Math.ceil(price)).format();
        }else if(totalEmail < 26000){
            output.innerHTML = totalEmail.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
            price = totalEmail * 0.088 ;
            totalPrice = (Math.ceil(price)).format();
        }else if(totalEmail < 51000){
            output.innerHTML = totalEmail.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
            price = totalEmail * 0.08 ;
            totalPrice = (Math.ceil(price)).format();
        }else if(totalEmail < 76000){
            output.innerHTML = totalEmail.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
            price = totalEmail * 0.073 ;
            totalPrice = (Math.ceil(price)).format();
        }else if(totalEmail < 110000){
            output.innerHTML = totalEmail.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
            price = totalEmail * 0.07 ;
            totalPrice = (Math.ceil(price)).format();
        }else if(totalEmail < 510000){
            output.innerHTML = totalEmail.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
            price = totalEmail * 0.06 ;
            totalPrice = (Math.ceil(price)).format();
        }else if(totalEmail < 1000001){
            output.innerHTML = totalEmail.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
            price = totalEmail * 0.05 ;
            totalPrice = (Math.ceil(price)).format();
        }else{
            output.innerHTML = totalEmail.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
            price = totalEmail * 0.05 ;
            output1.innerHTML = Math.ceil(price);
            totalPrice = (Math.ceil(price)).format();
        }
        output1.innerHTML = "$ "+totalPrice;
        output3.innerHTML = '<input type="hidden" name="price" value="'+price+'">\n\
                                 <input type="hidden" name="totalemail" value="'+totalEmail+'">';
        document.getElementById('dataType').value = 'ChangePrice';
    }
</script>