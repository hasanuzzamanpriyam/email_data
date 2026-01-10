<?php include_once '../assets/php/header.php'; 
$_SESSION['myPrice'] = 233488;
?>
<div class="jumbotron jumbotron--list-detail jumbotron--regular-bg">
    <div class="container jumbotron--list-detail__container table-layout-fixed">
        <div class="jumbotron--list-detail__col-half jumbotron--list-detail__col-left">
            <img class="img-responsive" src="<?= $siteUrl; ?>bundles/bydhome/img/thumbs/contact-list2.jpg" alt="Bookyorudata">
            <div class="box-contact-count">
                <div class="vertical-center">
                    <span>Direct</span>
                    <span class="box-contact-count__title">
                        233,488
                    </span>
                    <span>Email Contacts</span>
                </div>
            </div>
        </div>
        <div class="jumbotron--list-detail__col-half jumbotron--list-detail__col-right">
            
            <div class="gap-bottom-small">
                <h1 class="jumbotron__title" style="margin-top: 15px;">BIOTECHNOLOGY EMAIL LIST</h1>
                <strong class="jumbotron--list-detail__subtitle"></strong>
            </div>
            <div class="gap-bottom">
                <span class="jumbotron--list-detail__price"  style="color: orange">
                 <?= $_SESSION['myPrice'];?>
                </span>
                <h4 class="jumbotron__title">Custom Order E-mail: <span id="demo" class="jumbotron--list-detail__price" style="color: orange"><?php $totalemail = 233488; echo number_format($totalemail); ?></span></h4>
                <h4 class="jumbotron__title">Total Price: <span id="demo1" class="jumbotron--list-detail__price" style="color: orange"><?= $_SESSION['myPrice'];?></span></h4>
                <div class="slidecontainer">
                    <input type="range" min="1000" max="<?php
                        $totalemail = 233488;
                        echo $totalemail;
                        ?>" value="<?php
                        $totalemail = 233488;
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
                    <input type="hidden" name="selectItem" value="CTO" >
                    <input type="hidden" name="totalemail" value="24411" >
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
                     src="<?= $siteUrl; ?>bundles/bydhome/img/email-list-database/cio-cto-email-list-sample.jpg"
                    alt="Sample of CEO Email List.">
                       <a href="/tool-download-sample/6sDqBdeStFseeHEb" class="button button--primary full-width gap-bottom-tld js-sampledata-download">Download A Sample List</a>
                    </div>
                    <div class="col-md-7">
                    	<h2 class="primary-title h3">Biotechnology Email List Details</h2>
                   		 <p>Scientists, researchers, and other biotechnology professionals can be found easily with the help of our extensive, ready-made data product, full of the key contact information you need to start talking to the right people. Buy our ready-to-use email list to get in touch with the innovative and resourceful people working within biotechnology fields. You can email leads, market your unique product, show off a useful service, or simply network with a large, spread-out group with this consolidated directory of business contacts. <br> <br>Those working within "biotech" deal with modifying living organisms to fit human needs and are often related to biomedical engineers. They test and create new products while dealing with cells on the tissue or even molecular level. They are often the key inventors behind new pharmaceuticals and resilient crops. For certain fields, they're a very important group to engage with during B2B marketing campaigns.</p><p>With the world of biotechnology rapidly growing and changing, it's essential to stay on top of the latest trends and developments. Bioengineers are needed in every sector, from agriculture and food to pharmaceutical products. Knowing who to contact and how to reach them can make all the difference for your business—which is why it's so important to have a database that you can trust. The Bookyourdata database is carefully maintained to be up-to-date and thorough, making it a valuable resource for any business. You'll find thousands of contacts ready to take your call, read your email, or just hear your pitch.<br></p><p>Bookyourdata.com is an email database for the biotechnology industry, containing contacts of biotechnology professionals, biomedical sales leads, biotech marketing leads and biotech companies worldwide. We offer a variety of marketing tools to help you grow your business, including a comprehensive email database and marketing reports. Our database is updated monthly with new contacts and trends to ensure that our clients access the most recently available information. As a leader in the industry, we can also offer you exclusive listings not found anywhere else and personal assistance in locating the right contacts for your business needs.<br></p><p>Bookyourdata offers a ready-to-download contact directory full of the direct information you need to reach biotechnology industry decision-makers and other professionals working in the field. Check our database for the email addresses of biotech executives for your marketing campaign or trying to get scientists and lab technicians for your research. This list is the easiest way to access your target audience.<br></p><p>To contact this highly influential group, one simply needs our biotechnology mailing list. You can download it today, integrate it into your CRM, and start contacting the right people within minutes. Either use this pre-built email database or feel free to create your own list of sales leads with our build-a-list tool. <br> <br>Get in touch with the influential people behind the food and pharmaceutical industries with this consolidated list of biotechnicians from Bookyourdata.com. Find the experts now! <br></p>
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
      <h2 class="primary-title">FAQ Regarding to Biotechnology Email List</h2>
      <div class="row">
         <div class="col-md-6">
            <h3>Do your biotechnology sales leads have phones?</h3>
            <p></p>
            <p>Yes, our biotechnology sales leads have phones. We provide phone numbers and other contact information for free. You can find a list of relevant businesses with direct b2b contacts from Bookyourdata.</p>
            <p></p>
         </div>
         <div class="col-md-6">
            <h3>Is your biotechnology email list for the USA only?</h3>
            <p></p>
            <p>Not at all! In fact, our company has contacts in over 170 countries. This list includes professionals from the USA to Bulgaria to the Philippines. Instead of doing all that tedious research yourself, find what you need right now, and start building your contact list today.</p>
            <p></p>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6">
            <h3>Can I get Canadian biotechnology email leads?</h3>
            <p></p>
            <p>With our built-in list-builder tool, it's simple to create a custom business list. Just enter the words that describe your ideal customer, pick the industry they work in, and hit "create list"! You'll get a human-verified, accurate contact list of people across Canada in seconds!</p>
            <p></p>
         </div>
         <div class="col-md-6">
            <h3>Where to find a biotechnology business list with direct b2b contacts?</h3>
            <p></p>
            <p>You can find a biotechnology business list with direct b2b contacts at bookyourdata.com. Bookyourdata lets you create a custom business list in seconds with our built-in list-builder tool. It's the fastest and easiest way to get the contact information. After finding your list, you can download it as a .csv file or create an email campaign in minutes.</p>
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
                  Aditya Welch - Info Media
               </h6>
               <p><em>"I had no idea how hard it would be to find suitable Biotechnology email leads. So many people are always telling me that this is a very niche industry. And that I should do my research before I try reaching anyone. But how am I supposed to do that if I don't know who to talk to? This is why I found this Biotechnology email database so valuable! I was able to look up all the contact information for potential customers and clients quickly, effectively, and with minimal effort. And now that we've established relationships with these people, we're set for life."</em></p>
            </div>
         </div>
         <div class="col-md-6">
            <div class="testimonial text-left">
               <h6 class="secondary-title">
                  Eric Heath - Outside the Box
               </h6>
               <p><em>"We were so impressed with the biotechnology email database of bookyourdata! They made it so simple to find the leads we needed. We just had to plug in our search criteria, and they did the rest. We had some particular needs for our campaign, and they delivered. Our emails reached their recipients more than 90% of the time, which is high. Plus, we got a ton of opt-ins from our targeted list. We couldn't have asked for anything better. They're so reliable and easy to use - I'd recommend them to anyone looking for a great list."</em></p>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6">
            <div class="testimonial text-left">
               <h6 class="secondary-title">
                  Jack McMoonie - Lab24
               </h6>
               <p><em>"I was at my desk, scouring the internet for a list of Biotechnology companies. I had to pitch a product to a client, but the only way was to get in touch with the industry's expert. I knew I had to find them fast and get back to work. I finally found this database online, and I clicked on it right away! The site looked legit, and it was easy enough to figure out what I needed to do next. All I had to do was enter my email address and pay for it, and I'd be able to download the contacts in seconds! And that's just what happened! All I have to do is look through the list and send out those emails!"</em></p>
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