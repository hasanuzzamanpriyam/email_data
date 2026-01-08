<?php include_once '../assets/php/header.php'; 
$_SESSION['myPrice'] = 114837;
$siteUrl = 'https://emailbigdata.com/';
?>
<div class="jumbotron jumbotron--list-detail jumbotron--regular-bg">
    <div class="container jumbotron--list-detail__container table-layout-fixed">
        <div class="jumbotron--list-detail__col-half jumbotron--list-detail__col-left">
            <img class="img-responsive" src="<?= $siteUrl; ?>bundles/bydhome/img/thumbs/contact-list2.jpg" alt="Bookyorudata">
            <div class="box-contact-count">
                <div class="vertical-center">
                    <span>Direct</span>
                    <span class="box-contact-count__title">
                        114,837
                    </span>
                    <span>Email Contacts</span>
                </div>
            </div>
        </div>
        <div class="jumbotron--list-detail__col-half jumbotron--list-detail__col-right">
            
            <div class="gap-bottom-small">
                <h1 class="jumbotron__title" style="margin-top: 15px;">HOTELS AND MOTELS EMAIL LIST</h1>
                <strong class="jumbotron--list-detail__subtitle"></strong>
            </div>
            <div class="gap-bottom">
                <span class="jumbotron--list-detail__price"  style="color: orange">
                 <?= $_SESSION['myPrice'];?>
                </span>
                <h4 class="jumbotron__title">Custom Order E-mail: <span id="demo" class="jumbotron--list-detail__price" style="color: orange"><?php $totalemail = 114837; echo number_format($totalemail); ?></span></h4>
                <h4 class="jumbotron__title">Total Price: <span id="demo1" class="jumbotron--list-detail__price" style="color: orange"><?= $_SESSION['myPrice'];?></span></h4>
                <div class="slidecontainer">
                    <input type="range" min="1000" max="<?php
                        $totalemail = 114837;
                        echo $totalemail;
                        ?>" value="<?php
                        $totalemail = 114837;
                        echo $totalemail;
                        ?>" class="slider" id="myRange" step="100">
                    
                </div>
            </div>
            <p class="text-loblolly">Yes, you can get the direct contact information of chief executive officers! Pull a huge, human-verified contact list of CEO emails and start leveraging that data as part of your marketing outreach. With this pre-built CEO database, you can jump to the top with direct and accurate email addresses that will energize your next B2B marketing campaign.</p>
            <div class="gap-bottom-medium hidden-tlnd">
                <form action="<?= $siteUrl; ?>checkout/step1" method="POST">
                    <input type="hidden" name="ordercode" value="<?php echo ('PO' . rand(10, 99) . 'P' . rand(10, 99) . 'L' . rand(0, 9) . 'R'); ?>" >
                    <input type="hidden" name="emailType" value="Popular" >
                    <input type="hidden" name="emailCategory" value="Job Title" >
                    <input type="hidden" name="selectItem" value="hotels-and-motels" >
                    <input type="hidden" name="totalemail" value="114837" >
                    <input type="hidden" name="price" value="<?= $_SESSION['myPrice']; ?>" >
                    <input type="hidden" name="deliveryDays" value="Within 1 Day" >
                    
                    <input type="hidden" name="dataType" id="dataType" >
                    
                    
                    <span id="customPrice" style="color: black;"></span>
                    <input type="submit" name="buyNow" class="button button--primary gap-right-plnu full-width-pld gap-bottom-small-pld" value="Buy Now">
                </form>
            </div>
            <ul class="list row">
                <li class="col-lg-4 col-md-5 col-sm-6 gap-bottom-small-tpd">
                    <span class="icon icon-checkbox font-xlarge align-middle"></span>
                    <span class="font-small align-middle gap-left-small">Best Price Guarantee</span>
                </li>
                <li class="col-lg-8 col-md-7 col-sm-6 gap-bottom-small-tpd">
                    <span class="icon icon-checkbox font-xlarge align-middle"></span>
                    <span class="font-small align-middle gap-left-small">Last Update 02/12/2021</span>
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
                    <span class="iconic-block__text">95% Deliverability <br class="hidden-tpd">Guarantee</span>
                </div>
            </div>
            <div class="col-sm-3 gap-bottom-small-tpd">
                <div class="iconic-block">
                    <span class="icon icon-checkbox iconic-block__icon"></span>
                    <span class="iconic-block__text">Best Price <br class="hidden-tpd">Guarantee</span>
                </div>
            </div>
            <div class="col-sm-3 gap-bottom-small-tpd">
                <div class="iconic-block">
                    <span class="icon icon-csv iconic-block__icon"></span>
                    <span class="iconic-block__text">Instant <br class="hidden-tpd">Download (.csv)</span>
                </div>
            </div>
            <div class="col-sm-3 gap-bottom-small-tpd">
                <div class="iconic-block">
                    <span class="icon icon-identification iconic-block__icon"></span>
                    <span class="iconic-block__text">Verified <br class="hidden-tpd">Weekly</span>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="hr-line">
<div class="pad-top-small">
    <div class="container">
        <div class="row gap-bottom-large">
                    <div class="col-md-5">
                        <p><strong>DATA STRUCTURE OF FULL CONTACT DATA</strong></p>
                       <img class="shadow-primary gap-bottom img-responsive"
                     src="<?= $siteUrl; ?>bundles/bydhome/img/email-list-database/ceo-email-list-sample.jpg"
                    alt="Sample of CEO Email List.">
                        <a href="" class="button button--primary full-width gap-bottom-tld js-sampledata-download">Download A Sample List</a>
                    </div>
                    <div class="col-md-7">
                    	<h2 class="primary-title h3">Hotels and Motels Email List Details</h2>
                    	<p>We know that you're looking for a way to break through the noise and reach decision-makers in the hospitality industry. That's why we've done all the work for you and created our email list of hotels and motels. Bookyourdata hotel email list gives you access to emails, addresses, phone numbers, and more so that you can get directly in touch with professionals in the industry. Our hotel mailing list will help you reach decision-makers at hotels like: Bed and Breakfast, Lodging, motels, hospitality, boutique hotels, Chain hotels, resorts, Inns, All-suites. From hotel general managers to directors of sales, our comprehensive database has it all. And we make your job even easier by allowing you to target exactly the people you want with our easy-to-use filters. With our email list of hotels and motels at your fingertips, you can take your business to new heights.<br></p><p>To reach an exciting and influential business audience, check in with some of the key people at hotels, motels, and hotel chains with this premium hotel contact list. Perhaps your company's product or service can assist hospitality professionals in booking stays, organizing information, maintaining facilities, providing food, or taking care of their guests. Let them know about your company through email, mail, or phone calls with the accurate contact information in this ready-made hotel email list.<br><br>This data pulls the contact information of key decision-makers across inns, hotels, and motels into one resource. By cutting out hours of research and integrating into your CRM seamlessly, this resource can make your B2B marketing efforts timelier and more effective. You'll have everything you need to market your relevant product, service, or network with this spread-out group: emails, phone numbers, fax numbers, addresses, names, titles, and more. <br>Be of service to these influential people in the service industry and take the first step toward boosting sales when you download our verified hospitality database, which can serve both as a comprehensive directory of sales leads and a hotel mailing list. With this hotel contact list, you can email leads, send mail, or start calling the right people within this industry. Either buy this affordable, pre-built hotel email database or customize your own list with our innovative list-builder tool. Reach out to the masters of rest and relaxation and market to hotels and motels with the help of Bookyourdata.com's targeted hotel email list!</p>
                    </div>
                </div>
                <a href="<?= $siteUrl; ?>our-guarantees" class="lead lead--secondary lead--link">
                    <h5 class="lead__text">We Guarantee Over 95% Email Deliverability With Complete Vcard Information</h5>
                </a>
        <div class="row pad-vertical">
            <div class="col-md-3 col-sm-6 gap-bottom-tld">
                <i class="icon icon-checkbox text-primary icon-medium"></i>
                <h4>95% Deliverability Guarantee</h4>
                <p class="clear-gap-bottom">Our data is verified by automated processes and human eyes. We're so
                    confident about our contact lists that we provide a 95% accuracy guarantee. If more than 5%
                    of your emails bounce, you'll get credits to make up the difference.</p>
            </div>
            <div class="col-md-3 col-sm-6 gap-bottom-tld">
                <i class="icon icon-download text-primary icon-medium"></i>
                <h4>Instant Download</h4>
                <p class="clear-gap-bottom">Get an email list in minutes and download it instantly as a
                    .csv file! Both file types can be integrated into your CRM application quickly
                    and easily. So you can get started with making new connections right away.</p>
            </div>
            <div class="col-md-3 col-sm-6 gap-bottom-tld">
                <i class="icon icon-identification text-primary icon-medium"></i>
                <h4>Email, Phone, Company Information, & More</h4>
                <p class="clear-gap-bottom">We provide direct, detailed, specific information to help you make
                    more valuable connections with your future business contacts: emails, names, phone numbers,
                    postal addresses, business titles, company/industry information, department information,
                    fax numbers, revenue, and even employee information.</p>
            </div>
            <div class="col-md-3 col-sm-6">
                <i class="icon icon-copyright text-primary icon-medium"></i>
                <h4>Unlimited Usage Rights</h4>
                <p class="clear-gap-bottom">Once you order the list, you own it! Our pricing is transparent; we
                    don't charge extra fees for using the contacts we give you. There are no hidden fees or
                    contracts. We charge the same low price regardless of if you're a small start-up or a large
                    enterprise!</p>
            </div>
        </div>
        <div class="lead lead--secondary">
            <h5 class="lead__text gap-bottom-small-tlnd">Best Price Guarantee</h5>
            <p class="text-white clear-gap-bottom">For sure there's no another supplier that can provide better pricing with the same 95% email deliverability guarantee. Even if you find, we beat it directly! </p>
        </div>
    </div>
</div>
<div class="section">
   <div class="container">
      <h2 class="primary-title">FAQ Regarding to Hotels and Motels Email List</h2>
      <div class="row">
         <div class="col-md-6">
            <h3>What is hotel database?</h3>
            <p></p>
            <p>It's a database of professionals who work in hospitality industry. Have you been looking for a way to reach out to hotels, motels, inns, resorts, and other places in the hospitality industry? This email list can help you connect with sales leads! Build your own targeted list with our data that you can segment by geographic location, company size, industry type (casino hotel, luxury hotel, mid-scale hotel), and more.</p>
            <p></p>
         </div>
         <div class="col-md-6">
            <h3>Can I get a list of smaller, independently owned Hotels?</h3>
            <p></p>
            <p>Yes! We can omit Franchises and Chains, and all the 'big hotels', so you have a targeted, accurate list of the smaller, independently owned Hotels. You can also exclude those that are closed or out of business.</p>
            <p></p>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6">
            <h3>Can we reach to hotels' general managers by your Hotels Email?</h3>
            <p></p>
            <p>Yes, if you're looking for the hotel general manager's email address, you've come to the right place. Our Hospitality Industry Email List is filled with the email addresses of hotel managers and executives who will be able to help you with your marketing campaign.</p>
            <p></p>
         </div>
         <div class="col-md-6">
            <h3>Is this pricing one-time or monthly. Are there any other fees for purchasing your hotel mailing list?</h3>
            <p></p>
            <p>Nope! We don't believe in tying you into a long-term contract that you might not need. There are no subscription fees, hidden fees, or other charges. Just purchase the amount of data that you need right now, and contact us again next time you want to buy more. It's really that simple!</p>
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
                  Vida Moore - Renner Group
               </h6>
               <p><em>"I've been selling hotel and motel software for two years now, and I used to think that my biggest problem was the fact that there are just so many potential clients out there. How could I possibly find them all? But then a friend told me about BookYourData.com and suddenly, I didn't have to find them—they were all right there in one place! I could build my own hotel email list of prospects in seconds. And best of all, they were already verified, so the contacts I got actually worked. Now, instead of having to spend tons of time on research, I can focus on getting those sales!"</em><br></p>
            </div>
         </div>
         <div class="col-md-6">
            <div class="testimonial text-left">
               <h6 class="secondary-title">
                  Simone Yost - Sign Advisors
               </h6>
               <p><em>"I had no idea we needed an email list until we found Bookyourdata.com. I mean, we knew we wanted to reach out to the hospitality industry with our new product, but how were we supposed to find people to contact? We tried other email list providers, but they were all so "meh." The lists just weren't current enough and didn't have the right contacts. Sure, they had a few names here and there that seemed like they'd be a good fit for us, but it was mostly a waste of time and money. And then we found Bookyourdata.com. It was like someone had read our minds! I mean, it was as if Bookyourdata literally took all of our criteria for the perfect email list and created one just for us. It was so easy to use, too. We didn't have to spend weeks building a list from scratch and hoping that the people on it were going to be the right ones. We didn't have to worry about updating it every single day or even worry about running out of contacts—Bookyourdata did all of that hard work for us! Now we can focus on building relationships with the right people instead of trying to figure out who they are in the first place."</em></p>
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