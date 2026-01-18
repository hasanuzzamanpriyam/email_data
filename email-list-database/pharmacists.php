<?php include_once '../assets/php/header.php'; 
$_SESSION['myPrice'] = 31864;
?>
<div class="jumbotron jumbotron--list-detail jumbotron--regular-bg">
    <div class="container jumbotron--list-detail__container table-layout-fixed">
        <div class="jumbotron--list-detail__col-half jumbotron--list-detail__col-left">
            <img class="img-responsive" src="<?= $siteUrl; ?>bundles/bydhome/img/thumbs/contact-list2.jpg" alt="Bookyorudata">
            <div class="box-contact-count">
                <div class="vertical-center">
                    <span>Direct</span>
                    <span class="box-contact-count__title">
                        31,864
                    </span>
                    <span>Email Contacts</span>
                </div>
            </div>
        </div>
        <div class="jumbotron--list-detail__col-half jumbotron--list-detail__col-right">
            
            <div class="gap-bottom-small">
                <h1 class="jumbotron__title" style="margin-top: 15px;">PHARMACISTS EMAIL LIST</h1>
                <strong class="jumbotron--list-detail__subtitle"></strong>
            </div>
            <div class="gap-bottom">
                <span class="jumbotron--list-detail__price"  style="color: orange">
                 <?= $_SESSION['myPrice'];?>
                </span>
                <h4 class="jumbotron__title">Custom Order E-mail: <span id="demo" class="jumbotron--list-detail__price" style="color: orange"><?php $totalemail = 31864; echo number_format($totalemail); ?></span></h4>
                <h4 class="jumbotron__title">Total Price: <span id="demo1" class="jumbotron--list-detail__price" style="color: orange"><?= $_SESSION['myPrice'];?></span></h4>
                <div class="slidecontainer">
                    <input type="range" min="1000" max="<?php
                        $totalemail = 31864;
                        echo $totalemail;
                        ?>" value="<?php
                        $totalemail = 31864;
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
                    <input type="hidden" name="selectItem" value="CEO" >
                    <input type="hidden" name="totalemail" value="pharmacists" >
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
                      <h2 class="primary-title h3">Pharmacists in the US Email List Details</h2>
                      <p>Conduct your B2B marketing campaign more efficiently by targeting a group of highly sought-after contacts. With this human-verified pharmacist database, you can conduct your pharmaceutical, medical, or software marketing campaign more efficiently. Pharmacists are health professionals who work hard to fill the prescriptions of patients with a variety of illnesses. They understand drug interactions, biochemistry, and how to help patients on a personal level. They often work both in hospitals and in retail settings. As health-care providers, they are very influential in the pharmaceutical world. <br> <br>This pharmacist mailing list consolidates this vast, diverse, and spread-out group of qualified medical professionals into one downloadable, easy-to-use directory. It contains all of the information you need to connect and is backed by our bounce-back guarantee. With this pharmacist email database, you can save money and time in your marketing efforts by getting in touch with your target demographic. You can then email leads that will hopefully lead to more sales!</p><p> Our database contains all the pharmacists you could ever want! These licensed professionals can work in hospitals, clinics, pharmacies, and other healthcare settings throughout Canada, and they're ready to hear from you. Our list includes pharmacists' names, postal addresses, email addresses, phone numbers, specialty (when applicable), hospital affiliation (when applicable), website (when applicable), and more! This list is verified and updated monthly—so only the most relevant and accurate information is available for your use.</p><p>We keep our email list of pharmacists up-to-date to ensure that you have access to current contact information for every pharmacist in each country. We are constantly updating our email database of pharmacists. Still, we also verify each entry in our list before it goes live on our database. This way, you know that when you buy the list of pharmacists from us, it will contain accurate information and be free of errors.</p><p>We've got thousands of pharmacists' email addresses at your fingertips, allowing you to connect with as many contacts as possible for your sales marketing efforts. This is an excellent opportunity for marketers looking for ways to reach out to pharmacists directly or for businesses looking to make connections with other companies that employ pharmacists. No matter what your business is trying to accomplish, our pre-made list of pharmacist contacts will give you the boost that you need to succeed!<br> <br>Buy our ready-to-download pharmacist email list or continue to customize a list that's unique to your business needs. This is one of our many pre-built databases, which means it's ready to download and integrate into your CRM right away. It's location-based; this list is specific to pharmacists working within the US. Thus, you'll know that this group is affected by common country-specific laws and policies. <br> <br>Download our database of pharmacists within the US today!<br></p>
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
      <h2 class="primary-title">FAQ Regarding to Pharmacists Email List</h2>
      <div class="row">
         <div class="col-md-6">
            <h3>Can I filter the pharmacists' email database records by company type?</h3>
            <p></p>
            <p>You sure can. You can filter the records by many different criteria through our online tool. In fact, you can easily filter down to a custom, targeted list of just the pharmacists in your exact target audience. No matter what it is, whether it's location, hospital system size, or something else entirely, you can target them in just seconds!</p>
            <p></p>
         </div>
         <div class="col-md-6">
            <h3>Is your pharmacists' email list for the USA only?</h3>
            <p></p>
            <p>Our direct email contacts are available from the US and from over 170 countries! We can help you find the perfect list of targets for your next marketing campaign no matter where you're looking. For example, we have a database of millions of contacts in Europe alone. So no matter what country or continent you're interested in targeting with your next campaign, we have a contact list that will work for you.</p>
            <p></p>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6">
            <h3>How accurate is your pharmacist b2b email list?</h3>
            <p></p>
            <p>We guarantee that our pharmacist email marketing lists are 95% accurate. This means that 95% of the database has been verified and regularly updated to reflect changes in the industry. If you find that more than 5% of any email list we provide you with bounces back, we will give you a full refund or a new database at no extra cost!</p>
            <p></p>
         </div>
         <div class="col-md-6">
            <h3>Is it legal to buy pharmacists bulk email list?</h3>
            <p></p>
            <p>As long as the CAN-SPAM Act is followed, purchasing and using email lists are legal. Our database of contact information is privacy-compliant. When you buy our list of pharmacists' email addresses, you're getting contacts who have opted-in to marketing materials, meaning they're expecting to hear from companies like yours! We sell only opt-in contacts, so you can be sure that when you send out marketing campaigns with our targeted leads lists, they'll be well received by the right people.</p>
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
                  Reyes Cole - Senior Management Group
               </h6>
               <p><em>"We were looking for a way to reach out to pharmacists in the US, but we had no idea where to start. It wasn't until we found Bookyourdata.com that our dreams came true! Now we have an email database of pharmacists right at our fingertips. All of their information is accurate and up-to-date, and they've been so helpful with any questions or concerns I had while building my list. I would recommend this pharmacist database to anyone who needs a targeted list of sales leads!"</em><br></p>
            </div>
         </div>
         <div class="col-md-6">
            <div class="testimonial text-left">
               <h6 class="secondary-title">
                  Kelly Anderson - Shred Connect, Inc
               </h6>
               <p><em>"I've spent a ton of money on leads in the past, but this was the first time I felt like I got something for what I paid for. I wasn't just buying a database—I was getting an experience that would help me make sales. It's so simple to use, and it's such a great product: targeted email lists that are accurate and relevant. They allowed me to personalize my list of leads with criteria specific to my business, so I actually got pharmacists' contact information—not random people who may or may not have anything to do with the pharmaceutical industry."</em></p>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6">
            <div class="testimonial text-left">
               <h6 class="secondary-title">
                  Emery Williams - Elamed
               </h6>
               <p><em>"As a sales and marketing professional, I know that having a target list of leads is the key to success. But my old list of pharmacists' emails was outdated and didn't include contact information for every state in the US. That's where Bookyourdata.com came in. They have an accurate, up-to-date list of pharmacist leads that provides for all 50 states—I can quickly build a targeted list, no matter my goals!"</em></p>
            </div>
         </div>
         <div class="col-md-6">
            <div class="testimonial text-left">
               <h6 class="secondary-title">
                  Gregory Garcia - Sounding Capital
               </h6>
               <p><em>"We were skeptical at first. We had used several online list-building tools and were always disappointed with the results. The data was outdated or incomplete. We usually spent hours trying to complete our lists ourselves using many different sources. But when we found BookYourData, everything changed! With a few clicks of the mouse, we had exactly what we needed: a list of Canadian pharmacists complete with email addresses. We couldn't believe how easy it was! Now we're building targeted email lists in seconds—and sending out the most targeted emails ever. Seriously, this is amazing! Don't waste any more time if you've been struggling to create targeted leads lists! Go straight to bookyourdata.com, and you'll never look back."</em></p>
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
        if(totalEmail <= 5000){
            output.innerHTML = totalEmail.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
            price = totalEmail * 0.05 ;
            totalPrice = (Math.ceil(price)).format();
            
        }else if(totalEmail <= 10000){
            output.innerHTML = totalEmail.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
            price = totalEmail * 0.045 ;
            totalPrice = (Math.ceil(price)).format();
        }else if(totalEmail <= 25000){
            output.innerHTML = totalEmail.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
            price = totalEmail * 0.044 ;
            totalPrice = (Math.ceil(price)).format();
        }else if(totalEmail <= 50000){
            output.innerHTML = totalEmail.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
            price = totalEmail * 0.04 ;
            totalPrice = (Math.ceil(price)).format();
        }else if(totalEmail <= 75000){
            output.innerHTML = totalEmail.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
            price = totalEmail * 0.0365 ;
            totalPrice = (Math.ceil(price)).format();
        }else if(totalEmail <= 100000){
            output.innerHTML = totalEmail.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
            price = totalEmail * 0.035 ;
            totalPrice = (Math.ceil(price)).format();
        }else if(totalEmail <= 500000){
            output.innerHTML = totalEmail.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
            price = totalEmail * 0.03 ;
            totalPrice = (Math.ceil(price)).format();
        }else{
            output.innerHTML = totalEmail.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
            price = totalEmail * 0.025 ;
            output1.innerHTML = Math.ceil(price);
            totalPrice = (Math.ceil(price)).format();
        }
        output1.innerHTML = "$ "+totalPrice;
        output3.innerHTML = '<input type="hidden" name="price" value="'+price+'">\n\
                                 <input type="hidden" name="totalemail" value="'+totalEmail+'">';
        document.getElementById('dataType').value = 'ChangePrice';
        
    }
</script>