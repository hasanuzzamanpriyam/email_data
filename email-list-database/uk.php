<?php include_once '../assets/php/header.php'; 
$_SESSION['myPrice'] = 120000;
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
                        12,21241+
                    </span>
                    <span>Email Contacts</span>
                </div>
            </div>
        </div>
        <div class="jumbotron--list-detail__col-half jumbotron--list-detail__col-right">
            
            <div class="gap-bottom-small">
                <h1 class="jumbotron__title" style="margin-top: 15px;">UK EMAIL LIST</h1>
                <strong class="jumbotron--list-detail__subtitle"></strong>
            </div>
            <div class="gap-bottom">
                <span class="jumbotron--list-detail__price"  style="color: orange">
                 <?= $_SESSION['myPrice'];?>
                </span>
                <h4 class="jumbotron__title">Custom Order E-mail: <span id="demo" class="jumbotron--list-detail__price" style="color: orange"><?php $totalemail = 120000; echo number_format($totalemail); ?></span></h4>
                <h4 class="jumbotron__title">Total Price: <span id="demo1" class="jumbotron--list-detail__price" style="color: orange"><?= $_SESSION['myPrice'];?></span></h4>
                <div class="slidecontainer">
                    <input type="range" min="1000" max="<?php
                        $totalemail = 120000;
                        echo $totalemail;
                        ?>" value="<?php
                        $totalemail = 120000;
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
                    <input type="hidden" name="selectItem" value="UK" >
                    <input type="hidden" name="totalemail" value="120000" >
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
                     src="<?= $siteUrl; ?>bundles/bydhome/img/email-list-database/uk-email-list-sample.jpg"
                    alt="UK EMAIL LIST DETAILS">
                    </div>
                   <div class="col-md-7">
                    <h2 class="primary-title h3">UK Email List Details</h2>
                    <p>This list of valuable UK contacts is full of verified information you need to make a connection. Don't spend days sifting through expensive international databases for European business opportunities; with Bookyourdata.io, you can get affordable email lists UK marketing efforts need, download them in minutes, and integrate them right into your CRM. <br> <br>Selling your products and services across the miles (or kilometers) is now easier than ever. With this premium, ready-to-download UK mailing list, you can have all of the information you need — phone numbers, postal addresses, job titles, real names, and more — to motivate these new customers to buy. UK email lists rarely have this level of quality, and our human-checked listings are available at rates much lower than normal costs. And because we also offer our customers the ability to customize their own targeted marketing lists, there are numerous options for those hoping to buy email lists. UK B2B email contacts with specific titles and industries in mind can also be found, so try our customization tool if you're interested in targeting your sales leads further. With our accurate mailing lists with <a href="#">professional email marketing</a>, UK success is right around the corner!</p><p> Our UK <a href="#">email database</a> is ideal for B2B marketing campaigns because it offers more insight than regular <a href="#">mass mailings</a> or online generic lists. For example, you can segment our U.K. <a href="#">business database</a> into executives, managers, directors, and other decision-makers in different niches that fit your product or service. You can also filter by specific locations or industry sectors to target people most likely to be interested in your offer.<o:p></o:p><br> <br>Download this pre-made list to start emailing, calling, or mailing a variety of professionals in a new market. The United Kingdom is an important market, home to Scotland, Northern Ireland, and England. <a href="#">Email database</a> downloads can be completed in moments, so get started connecting with this new group fast. <a href="#">Email leads</a>, conduct business-to-business marketing more effectively, and reach across the seas to new customers in the UK today! <br></p>
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
      <h2 class="primary-title">FAQ Regarding to UK Email List</h2>
      <div class="row">
         <div class="col-md-6">
            <h3>Is it legal to buy a UK email list?</h3>
            <p></p>
            <p>In short, the answer is yes! It's legal to buy our Uk email contacts for your cold email as long as you follow Can-Spam Act. You can use our online tool to build a targeted business decision-makers list in England and other parts of the UK just in seconds. And when you're ready, you can instantly download that list and start using it for your marketing campaign.</p>
            <p></p>
         </div>
         <div class="col-md-6">
            <h3>Where to find a UK business list for sale?</h3>
            <p></p>
            <p>You can easily find a Uk email database with BookYourData. Just select the filters you're looking for in the left menu, and then click on "Order Now" to instantly download your contacts as an Excel spreadsheet. You can also click on "Customize this list" to go directly to our list builder to make your own custom list that exactly fits your needs.</p>
            <p></p>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6">
            <h3>How up-to-date is your UK email database?</h3>
            <p></p>
            <p>We're committed to providing our customers with the best possible data. We offer a 95% accuracy guarantee on our UK email lists. If you find any invalid contacts within our database, we'll add free credits for all of them to cover any loss. Suppose you cannot unearth any invalid contacts. In that case, you can breathe easy knowing that your message will reach a highly-qualified audience.</p>
            <p></p>
         </div>
         <div class="col-md-6">
            <h3>How can I integrate the UK business database into my CRM?</h3>
            <p></p>
            <p>If you're looking to purchase a UK email list and integrate that information into your CRM, try using our .csv filetype. This is the worldwide standard for importing data into any CRM. It's easy: just import the CSV file into your CRM, and you'll be able to use your new UK email database immediately!</p>
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
                  Renee Gutmann - McGlynn Inc
               </h6>
               <p><em>"I've used a lot of different email list providers, and Bookyourdata is by far the best. I've never had such a high rate of engagement and conversions from my email marketing campaigns! This has been key in helping me grow my business, and it's easy to use—no more messing around with Excel and Access databases. The only thing that would make this better would be if it was free!"</em></p>
            </div>
         </div>
         <div class="col-md-6">
            <div class="testimonial text-left">
               <h6 class="secondary-title">
                  Augusta Simonis - Goddu Printing
               </h6>
               <p><em>"As someone who lives outside of the UK, I have to say that finding an accurate email database for our marketing campaigns here can be challenging. That's why I was so grateful to find Bookyourdata.com.They have UK email lists that are already verified and ready to use. I could save my team a lot of time and hassle by simply buying pre-verified data from them, rather than having to search for it on my own."</em><br></p>
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