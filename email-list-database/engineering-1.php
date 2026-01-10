<?php include_once '../assets/php/header.php'; 
$_SESSION['myPrice'] = 500405;
?>
<div class="jumbotron jumbotron--list-detail jumbotron--regular-bg">
    <div class="container jumbotron--list-detail__container table-layout-fixed">
        <div class="jumbotron--list-detail__col-half jumbotron--list-detail__col-left">
            <img class="img-responsive" src="<?= $siteUrl; ?>bundles/bydhome/img/thumbs/contact-list2.jpg" alt="Bookyorudata">
            <div class="box-contact-count">
                <div class="vertical-center">
                    <span>Direct</span>
                    <span class="box-contact-count__title">
                        500,405
                    </span>
                    <span>Email Contacts</span>
                </div>
            </div>
        </div>
        <div class="jumbotron--list-detail__col-half jumbotron--list-detail__col-right">
            
            <div class="gap-bottom-small">
                <h1 class="jumbotron__title" style="margin-top: 15px;">ENGINEERING DEPARTMENT EMAIL LIST</h1>
                <strong class="jumbotron--list-detail__subtitle"></strong>
            </div>
            <div class="gap-bottom">
                <span class="jumbotron--list-detail__price"  style="color: orange">
                 <?= $_SESSION['myPrice'];?>
                </span>
                <h4 class="jumbotron__title">Custom Order E-mail: <span id="demo" class="jumbotron--list-detail__price" style="color: orange"><?php $totalemail = 500405; echo number_format($totalemail); ?></span></h4>
                <h4 class="jumbotron__title">Total Price: <span id="demo1" class="jumbotron--list-detail__price" style="color: orange"><?= $_SESSION['myPrice'];?></span></h4>
                <div class="slidecontainer">
                    <input type="range" min="1000" max="<?php
                        $totalemail = 500405;
                        echo $totalemail;
                        ?>" value="<?php
                        $totalemail = 500405;
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
                    <input type="hidden" name="selectItem" value="engineering" >
                    <input type="hidden" name="totalemail" value="500405" >
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
                      <h2 class="primary-title h3">Engineering Department Email List Details</h2>
                      <p>Masters of technology, science, and design, engineers are a uniquely knowledgeable group to market to. Bookyourdata.com's unique, ready-made data product allows you to find the key contact information of those working in engineering fields, even though they might be located in many different companies across industries. Rarely does one have the opportunity to reach out to such a diverse and scattered audience with such focused and accurate contact data. Download this information if you want to find those working in engineering departments across industries and email leads that are actually relevant to your business.</p><p>Network with a technology-focused, brilliant, and highly educated group. You can use this engineer email list to tell engineers about your specific engineering-related product, newsletter, or group via email marketing. On the other hand, because this list includes not only emails but phone and fax numbers, addresses, names, titles, and more, you can also connect over the phone or through the mail. Connect with knowledgeable engineers directly and tell them about your company.</p><p>Our product allows you to build targeted email lists in seconds. The directory has everything you need for your next extensive outreach campaign: whether you're searching for Canadian engineering contacts or want to narrow down your search to focus on Industrial engineers or Lead engineers, or whether you want a principal engineer, a mechanical engineer, or an electrical engineer, our directory will help you find what you need.<o:p></o:p><br></p><p>With our easy-to-use interface, you can search by name and location to narrow down your search results. Use keyword and position to find the ideal person to contact within any engineering department. Once you've found what you're looking for, download your specific list using our streamlined interface. Then do what matters most: growing your business with the right marketing message to your targeted email list.<o:p></o:p><br></p><p>This pre-built engineer mailing list is ready to download now. If you want to build your own directory of sales leads and build your own data solution, feel free to use our list-builder tool. Buy this B2B marketing list if you want to connect with knowledgeable engineers working in the field within minutes of downloading! <br></p>
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
      <h2 class="primary-title">FAQ Regarding to Engineering Department Email List</h2>
      <div class="row">
         <div class="col-md-6">
            <h3>Who is the best provider for an engineer email list?</h3>
            <p></p>
            <p>If you're looking for an engineer email list, nobody does it better than Bookyourdata. Our email lists are accurate, verified, and up-to-date, so you don't have to worry about wasting your time on outdated information. You won't have to worry that the person you're sending your marketing emails to is no longer at that company or that career. You can filter our data by several criteria and get just the contact information you need for your campaign.</p>
            <p></p>
         </div>
         <div class="col-md-6">
            <h3>Is it easy to find an engineer business mailing list?</h3>
            <p></p>
            <p>Yes, it is! A great place to start is Bookyourdata. We have a massive list of engineers' emails, numbers, and contact information that you can download right now. This extensive data product has all the necessary information to build a targeted email list in seconds.</p>
            <p></p>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6">
            <h3>May I customize your engineer business database?</h3>
            <p></p>
            <p>Sure! Simply click on the "CUSTOMIZE THIS LIST" button, and you'll be directed to another page. On the left side of that page is a menu where you can select multiple filters to narrow down your search. Once you've done that, go ahead and place your order online, and you'll be able to download it instantly.</p>
            <p></p>
         </div>
         <div class="col-md-6">
            <h3>Can I download only a few thousand of your engineer database contacts?</h3>
            <p></p>
            <p>Of course! You can order any amount you need by using our list-builder online. Just build the list until it contains the exact number of contacts you want, and place your order. The list will be yours in seconds!</p>
            <p></p>
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