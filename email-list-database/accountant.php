<?php include_once '../assets/php/header.php'; 
$_SESSION['myPrice'] = 115939;
?>
<div class="jumbotron jumbotron--list-detail jumbotron--regular-bg">
    <div class="container jumbotron--list-detail__container table-layout-fixed">
        <div class="jumbotron--list-detail__col-half jumbotron--list-detail__col-left">
            <img class="img-responsive" src="<?= $siteUrl; ?>bundles/bydhome/img/thumbs/contact-list2.jpg" alt="Bookyorudata">
            <div class="box-contact-count">
                <div class="vertical-center">
                    <span>Direct</span>
                    <span class="box-contact-count__title">
                        115,939
                    </span>
                    <span>Email Contacts</span>
                </div>
            </div>
        </div>
        <div class="jumbotron--list-detail__col-half jumbotron--list-detail__col-right">
            
            <div class="gap-bottom-small">
                <h1 class="jumbotron__title" style="margin-top: 15px;">ACCOUNTANT EMAIL LIST</h1>
                <strong class="jumbotron--list-detail__subtitle"></strong>
            </div>
            <div class="gap-bottom">
                <span class="jumbotron--list-detail__price"  style="color: orange">
                 <?= $_SESSION['myPrice'];?>
                </span>
                <h4 class="jumbotron__title">Custom Order E-mail: <span id="demo" class="jumbotron--list-detail__price" style="color: orange"><?php $totalemail = 115939; echo number_format($totalemail); ?></span></h4>
                <h4 class="jumbotron__title">Total Price: <span id="demo1" class="jumbotron--list-detail__price" style="color: orange"><?= $_SESSION['myPrice'];?></span></h4>
                <div class="slidecontainer">
                    <input type="range" min="1000" max="<?php
                        $totalemail = 115939;
                        echo $totalemail;
                        ?>" value="<?php
                        $totalemail = 115939;
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
                    <input type="hidden" name="selectItem" value="account" >
                    <input type="hidden" name="totalemail" value="115939" >
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
                    <h2 class="primary-title h3">Accountant Email List Details</h2>
                    <p>Are you selling a financing product, software, or service to accountants in multiple firms, businesses, and industries? Or perhaps you're hoping to network with like-minded professionals across companies and strata. In either case, to do so you need an accurate listing of accountants. Email lists from Bookyourdata.com include everything from phone numbers to titles to addresses, so whether your plan includes email marketing, calling, or mailing, you'll be sure to have the right contact information for the right highly qualified decision-makers with this targeted accountants directory. <br> <br>We help you connect with the right people, not just send ineffective mass emails to many different kinds of professionals across too many fields. That's why our pre-made lists like this ready-to-download accountant email database are specific; they're tailored to your marketing efforts and business needs. This premium, human-verified accountant directory is perfect for generating useful and actionable sales leads. Choose this pre-built accountant mailing list if you want to directly contact bookkeepers and accountants, or try our custom list-builder tool to create a customized B2B solution just for your unique needs.</p><p> Accountants are a very niche market, but they're one we're passionate about. That's why we created this accountant directory—so you can get your hands on the best database of accountants, CPAs, bookkeepers, and other people in the accounting industry. Our list of accountants is updated every month, so you're getting accurate information on a constant basis. And because it's pre-made, all you have to do is download it and start using it when you want. You can also customize it however you'd like! We know how important it is for marketers to be able to reach their target audiences, so we've taken care of the targeting for you with this accountant email list.</p><p>Download a detailed, accurate database of accountants, CPAs, bookkeepers, and many others in this accountant email list from Bookyourdata.com. With this accountant sales leads directory, you can market to the most qualified professionals in the industry. Communicate directly with chief accounting officers, VPs of accounting, presidents of accounting firms, and more. This pre-made accountant sales lead list allows you to market your product to a specific niche comprised of qualified, relevant professionals. This accountant mailing list includes all the contact information you need to reach out to your target audience: first name, last name, title/position, company, phone number, physical address (with the city, state, and zip code), and email address.<br> <br>To email leads that are important to you and start networking with the right people, buy this invaluable and affordable email list of those in the accounting field today! </p>
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
      <h2 class="primary-title">FAQ Regarding to Accountant Email List</h2>
      <div class="row">
         <div class="col-md-6">
            <h3>How to find accountants' email addresses?</h3>
            <p></p>
            <p>Save yourself time and effort by downloading a premade list at bookyourdata.com. We have accurate, targeted lists of qualified accountants, CPAs, bookkeepers, and more that you can download in seconds.</p>
            <p></p>
         </div>
         <div class="col-md-6">
            <h3>Is it easy to find accountants' business mailing lists?</h3>
            <p></p>
            <p>Yes! Bookyourdata.com makes it easy to download an accountant email list—and it's a high-quality list that's specific to your needs. You can download the data you need in seconds. We have a tool called List Builder that let you create your own targeted list easily and quickly. You apply filters of professionals you're looking for, and then the website builds a custom list for you, which you can instantly download in CSV format.</p>
            <p></p>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6">
            <h3>How accurate is your accountants email database?</h3>
            <p></p>
            <p>Our database is verified every week and updated every month. We promise a 95% accuracy rate—and if you ever find a file that doesn't live up to that promise, send us the proof and we'll provide free data credits until our 95% accuracy guarantee is fulfilled. </p>
            <p></p>
         </div>
         <div class="col-md-6">
            <h3>Can I download a free sample for the accountant email list?</h3>
            <p></p>
            <p>Yes, We want you to be as confident in the accuracy and quality of our products as we are, which is why we offer free samples for every single one of our email lists. You can download a free sample for the accountant email list. Just sign up and you'll be given access to 20 free samples!</p>
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
                  Sadie Lindgren - Efficiency Learning Systems
               </h6>
               <p><em>"</em><em>I was looking for a targeted list of accountants who have control over their company's finances, and bookyourdata provided exactly what I needed. From the moment I signed up, I was impressed with the quality customer service that they provided. The data itself was accurate and clean, which is sometimes hard to find in this industry. It made it easy to build my email campaigns and start targeting relevant leads from day one. In fact, our open rate on those emails was higher than ever before!"</em></p>
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

