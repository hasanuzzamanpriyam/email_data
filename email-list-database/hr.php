<?php include_once '../assets/php/header.php'; $_SESSION['myPrice'] = 8521;?>
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
                        142,015
                    </span>
                    <span>Email Contacts</span>
                </div>
            </div>
        </div>
        <div class="jumbotron--list-detail__col-half
             jumbotron--list-detail__col-right">
            
            <div class="gap-bottom-small">
                <h1 class="jumbotron__title" style="margin-top: 15px;">HR EMAIL LIST</h1>
                <strong class="jumbotron--list-detail__subtitle"></strong>
            </div>
            <div class="gap-bottom">
                <span class="jumbotron--list-detail__price"  style="color: orange">
                 <?= $_SESSION['myPrice'];?>
                </span>
                <h4 class="jumbotron__title">Custom Order E-mail: <span id="demo" class="jumbotron--list-detail__price" style="color: orange"><?php $totalemail = 142015; echo number_format($totalemail); ?></span></h4>
                <h4 class="jumbotron__title">Total Price: <span id="demo1" class="jumbotron--list-detail__price" style="color: orange"><?= $_SESSION['myPrice'];?></span></h4>
                <div class="slidecontainer">
                    <input type="range" min="1000" max="<?php
                        $totalemail = 142015;
                        echo $totalemail;
                        ?>" value="<?php
                        $totalemail = 142015;
                        echo $totalemail;
                        ?>" class="slider" id="myRange" step="100">
                    
                </div>
            </div>
            <p class="text-loblolly">Network with professionals using
                our ready-made human resources list, a huge directory of
                potential sales leads, including phone numbers, emails,
                job titles, and more! Find and market to those working
                in HR departments at many different companies and
                institutions now using our directory.</p>
            <div class="gap-bottom-medium hidden-tlnd">
                <form action="<?= $siteUrl; ?>checkout/step1" method="POST">
                    <input type="hidden" name="ordercode" value="<?php echo ('PO' . rand(10, 99) . 'P' . rand(10, 99) . 'L' . rand(0, 9) . 'R'); ?>" >
                    <input type="hidden" name="emailType" value="Popular" >
                    <input type="hidden" name="emailCategory" value="Job Function">
                    <input type="hidden" name="selectItem" value="HR" >
                    <input type="hidden" name="totalemail" value="142015" >
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
                <h2 class="primary-title h3">HR </h2>
                <p style="text-align: justify;">Human resources is a multifaceted, nuanced, and
                    ever-changing field with many different needs. Often
                    dealing with the organization of confidential
                    employee information, providing benefits and pay,
                    managing onboarding and terminations, or taking care
                    of many other important business functions, highly
                    qualified HR managers and professionals must use
                    many types of organizational software, services, or
                    tools.</p><p><br><br>If you have a solution that can
                    help companies with human resource management (HRM),
                    let them know about it with this ready-to-download
                    HR email list. This targeted HR contacts database is
                    pre-built and ready for you to integrate into your
                    CRM moments after purchasing. It contains the key
                    contact information of professionals working within
                    human resources at multiple organizations across
                    many industries. Find better leads and start making
                    connections. Remember that we don't provide generic
                    email addresses ,
                    so you'll be able to build stronger
                    business-to-business (B2B) relationships by being
                    able to email leads with direct contact information.
                    This verified human resources email list also
                    includes address information, so you can use it as
                    your HR mailing list as well.</p><p><br><br>Start
                    marketing to HR managers, staff, or even senior
                    executives now. To narrow your sales leads even
                    further, feel free to customize and build your own
                    targeted human resources list with our list-builder
                    tool. Buy this premium ready-to-download database if
                    you want to communicate with HR decision-makers!</p><p><br><br>
                    <!--<strong>
                        Resources:
                        <a
                            href="http://www.bls.gov/ooh/management/human-resources-managers.htm#tab-2">The
                            Role of HR</a>, <a
                            href="https://www.shrm.org/hr-today/news/hr-magazine/0316/pages/the-big-issues-facing-hr.aspx">Issues
                            in HR</a>, <a
                            href="http://www.humanresources.org/website/c/">NHRA</a>,
                        <a href="https://www.shrm.org/">SHRM</a> -
                        Edited by <a
                            href="../leadership/gary-taylor">Gary
                            Taylor</a>. Also edited by Gary Taylor <a
                            href="../index">Computer Safety</a>, <a
                            href="the-evolution-of-email">Email's
                            Evolution</a></strong><strong></strong>-->
                    </p>
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
      <h2 class="primary-title">FAQ Regarding to HR Email List</h2>
      <div class="row">
         <div class="col-md-6">
            <h3>How do I get HR's email address lists?</h3>
            <p></p>
            <p>You can go to Bookyourdata, where you'll find a tool to build a targeted email list in seconds. This application lets you network with professionals using our ready-made human resources list, a massive directory of potential sales leads, including phone numbers, emails, job titles, etc.</p>
            <p></p>
         </div>
         <div class="col-md-6">
            <h3>How can I get a huge HR mailing list for sale?</h3>
            <p></p>
            <p>First, go to bookyourdata.com and type “HR” into the search bar. Then select the location you want your list to be from, like the US or Canada. You can also set other parameters like job title, industry, company size, or even specific companies you want to include in your database. Now click "Get this List." Bookyourdata will generate a list of HR professionals that meets your criteria and is ready to download within minutes!</p>
            <p></p>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6">
            <h3>How updated is your HR professionals list?</h3>
            <p></p>
            <p>We update our human resources email list monthly to make sure you have the most up-to-date information at your fingertips. We also verify the data in our HR directory weekly to ensure that everything is correct and accurate. We put a lot of effort into making sure our products are the best they can be, and we don't want anything to get in the way of your ability to connect with your potential customers.</p>
            <p></p>
         </div>
         <div class="col-md-6">
            <h3>Do you have recruiters, talent acquisition, and benefits managers included within your HR email database?</h3>
            <p></p>
            <p>Our directory includes recruiters, talent acquisition managers, benefits managers, HR directors, and H.R. assistants—the list goes on! If you're looking to connect with someone who works in H.R. departments, explore the Bookyourdata HR database. We have the information you need to make it happen at a company or institution of any size.</p>
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
                  Leonardo Cormier - Halvorson LLC
               </h6>
               <p><em>"Anywhere I go, I look for the human touch. That's why I love Bookyourdata.com! I know that when I'm working with their awesome HR email list, the people I'm reaching out to are real, with real jobs and real needs. Their phone numbers and emails aren't hidden behind a paywall. And they don't get mad when you use their information—they're actually excited to hear from you! I'm so glad that Bookyourdata.com exists because it makes my job a lot easier. With their help, we've been able to connect some of the best talents in our industry—folks who understand what we're looking for and can work seamlessly with our team. And that's all thanks to Bookyourdata.com!"</em></p>
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