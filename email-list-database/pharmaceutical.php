<?php include_once '../assets/php/header.php'; $_SESSION['myPrice'] = 22848; ?>
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
                       412,889
                    </span>
                    <span>Email Contacts</span>
                </div>
            </div>
        </div>
        <div class="jumbotron--list-detail__col-half
             jumbotron--list-detail__col-right">
            <div class="gap-bottom-small">
                <h1 class="jumbotron__title" style="margin-top: 15px;">Pharmaceutical EMAIL LIST</h1>
                <strong class="jumbotron--list-detail__subtitle"></strong>
            </div>
            <div class="gap-bottom">
                <span class="jumbotron--list-detail__price"  style="color: orange">
                 <?php echo '$ '.number_format($_SESSION['myPrice']); ?>
                </span>
                <h4 class="jumbotron__title">Custom Order E-mail: <span id="demo" class="jumbotron--list-detail__price" style="color: orange"><?php $totalemail = 380797; echo number_format($totalemail); ?></span></h4>
                <h4 class="jumbotron__title">Total Price: <span id="demo1" class="jumbotron--list-detail__price" style="color: orange"><?php echo '$ '.number_format($_SESSION['myPrice']); ?></span></h4>
                <div class="slidecontainer">
                    <input type="range" min="1000" max="<?php
                        $totalemail = 380797;
                        echo $totalemail;
                        ?>" value="<?php
                        $totalemail = 380797;
                        echo $totalemail;
                        ?>" class="slider" id="myRange" step="100">
                    
                </div>
            </div>
            <p class="text-loblolly">The huge, ever-growing
                pharmaceutical industry is full of big names,
                influential managers, and key administrators. Find
                pharmaceutical business contacts with the help of this
                pre-made, ready-to-download data product from
                mailerstation.com! Contact the right people with our
                pharmaceutical email database now.</p>
            <div class="gap-bottom-medium hidden-tlnd">
                <form action="<?= $siteUrl; ?>checkout/step1" method="POST">
                    <input type="hidden" name="ordercode" value="<?php echo ('PO' . rand(10, 99) . 'P' . rand(10, 99) . 'L' . rand(0, 9) . 'R'); ?>" >
                    <input type="hidden" name="emailType" value="Popular" >
                    <input type="hidden" name="emailCategory" value="Industries">
                    <input type="hidden" name="selectItem" value="Pharmacetical" >
                    <input type="hidden" name="totalemail" value="380797" >
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
                <h2 class="primary-title h3">Pharmaceutical </h2>
                <p style="text-align: justify;">Do you need sales-generating business-to-business
                    (B2B) leads? Don't worry, because we have the
                    prescription: an accurate and reliable
                    pharmaceutical contact directory. Look up the key
                    executives, managers, staff, administrators, and
                    associates in the industry easily when you download
                    this pharmaceutical email list, which contains
                    everything from titles to phone numbers to emails to
                    postal addresses. We have all of the sales leads you
                    need to really start the conversation. <br> <br>An
                    unsuccessful business marketing campaign can be a
                    bitter pill to swallow. Get the right information so
                    that you can find and talk to those who may be most
                    interested in your product: those in the
                    pharmaceutical industry. Whether you plan to network
                    with this high-end group or email leads who would be
                    interested in a new drug, service, or health-care
                    product, you can do so more efficiently by having a
                    consolidated, consistent contact database. <br> <br>Download
                    this pharmaceutical mailing list today and you can
                    integrate it into your CRM and get started within
                    minutes. Start contacting the right people with this
                    already-built product, or feel free to find another
                    prescription for your marketing needs with our
                    innovative list-builder tool. Our human-verified
                    email and contact directories can help jump-start
                    your campaign. Buy it and start making valuable
                    contacts within the "pharma" industry now!<br></p>
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
      <h2 class="primary-title">FAQ Regarding to Pharmaceutical Email List</h2>
      <div class="row">
         <div class="col-md-6">
            <h3>Where to buy verified pharmaceutical contacts list?</h3>
            <p></p>
            <p>
               Right here at Bookyourdata.io. We have a huge, ever-growing pharmaceutical industry email list full of big names, influential managers, and key administrators. So get ready to connect with the decision-makers in this massive field; we've got the contacts you need for your <a href="#">marketing campaigns</a>. You'll find that our pre-made data products are ready to download immediately; there's no waiting around for us to put together your data order for you.
            </p>
            <p></p>
         </div>
         <div class="col-md-6">
            <h3>Can you send sample file for Pharmaceutical database before placing the order?</h3>
            <p></p>
            <p>We absolutely can! If you want to see a sample of the data we have in our pharmaceutical email list, just let us know. We'd be thrilled to send you some sample data so that you can get a sense of what's included and how it might work for your business or organization. You can download the free trial data right from our website.</p>
            <p></p>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6">
            <h3>Is your pharmaceutical email data for only USA?</h3>
            <p></p>
            <p>So, the short answer is: no, our pharmaceutical email list is not just for the USA. We can provide contacts from 170 countries. If your business or organization has a global reach and you want to get your message out there to as many people as possible, then this list is for you.</p>
            <p></p>
         </div>
         <div class="col-md-6">
            <h3>How long does it take to get my pharma mailing list after I order online?</h3>
            <p></p>
            <p>
               You can instantly download your database after the order is confirmed online. After you <a href="#">purchase a database</a>, you won't have to wait around for it to arrive in the mail or be delivered to you by a courier—you'll get instant access to your data! The files are available for immediate download after you purchase them.
            </p>
            <p></p>
         </div>
      </div>
   </div>
</div>

<div class="section small pad-top-0">
   <div class="container">
      <h3 class="primary-title">Testimonials</h3>
      <div class="row">
         <div class="col-md-6">
            <div class="testimonial text-left">
               <h6 class="secondary-title">
                  Lavina Hoeger - Self employed
               </h6>
               <p><em>"I'm a freelancer who specializes in helping pharmaceutical companies get their products out there. I've been doing it for years, and I have a pretty good handle on the industry—but I'm always looking to make connections with new clients, no matter how big or small they are! When I came across Bookyourdata.com's Pharmaceutical Email List, I was really impressed with what I saw: the list had detailed info about all kinds of companies in the pharmaceutical industry, from small startups to big-name enterprises. It even had information about individual managers and administrators who could help me get my foot in the door! I knew that this was going to be a great resource for me as I continued to grow my business. The Pharmaceutical Email List has already made me more money than it cost to buy, so now it's just a great bonus that lets me contact even more people."</em></p>
            </div>
         </div>
         <div class="col-md-6">
            <div class="testimonial text-left">
               <h6 class="secondary-title">
                  Katelynn Conroy - Fortune Marketing
               </h6>
               <p><em>"I've been working in pharmaceutical sales for almost a year, but I'd only ever worked with a few of the major companies. When I decided to broaden my horizons and start my own business, I was overwhelmed by the number of competitors and legends in the field. I knew if I wanted to make it, I had to have access to the email addresses of some of the best companies around—and that's when I found Bookyourdata.com. The Pharmaceutical Email List from Bookyourdata.com has everything you need to get started in this industry: it has great big pharmaceutical names but it also the small pharmaceuticals. They are more hidden gems. It's like having an insider's guide on how to be successful in pharmaceuticals! I'm so grateful that I found this data provider, because now I know that every time I send out an email, it's going to get into the hands of exactly who needs it."</em></p>
            </div>
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
        if(totalEmail <= 5000){
            output.innerHTML = totalEmail.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
            price = totalEmail * 0.0375 ;
            totalPrice = (Math.ceil(price)).format();
            
        }else if(totalEmail <= 10000){
            output.innerHTML = totalEmail.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
            price = totalEmail * 0.03375 ;
            totalPrice = (Math.ceil(price)).format();
        }else if(totalEmail <= 25000){
            output.innerHTML = totalEmail.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
            price = totalEmail * 0.033 ;
            totalPrice = (Math.ceil(price)).format();
        }else if(totalEmail <= 50000){
            output.innerHTML = totalEmail.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
            price = totalEmail * 0.03 ;
            totalPrice = (Math.ceil(price)).format();
        }else if(totalEmail <= 75000){
            output.innerHTML = totalEmail.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
            price = totalEmail * 0.027375 ;
            totalPrice = (Math.ceil(price)).format();
        }else if(totalEmail <= 100000){
            output.innerHTML = totalEmail.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
            price = totalEmail * 0.02625 ;
            totalPrice = (Math.ceil(price)).format();
        }else if(totalEmail <= 500000){
            output.innerHTML = totalEmail.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
            price = totalEmail * 0.0225 ;
            totalPrice = (Math.ceil(price)).format();
        }else{
            output.innerHTML = totalEmail.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
            price = totalEmail * 0.01875 ;
            output1.innerHTML = Math.ceil(price);
            totalPrice = (Math.ceil(price)).format();
        }
        output1.innerHTML = "$ "+totalPrice;
        output3.innerHTML = '<input type="hidden" name="price" value="'+price+'">\n\
                                 <input type="hidden" name="totalemail" value="'+totalEmail+'">';
        document.getElementById('dataType').value = 'ChangePrice';
    }
</script>

