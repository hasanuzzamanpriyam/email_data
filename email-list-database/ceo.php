<?php include_once '../assets/php/header.php'; 
// Initial price for 48,700 contacts (48700 * 0.03 rounded up)
$_SESSION['myPrice'] = 1463; ?>

<div class="jumbotron jumbotron--list-detail jumbotron--regular-bg">
    <div class="container jumbotron--list-detail__container table-layout-fixed">
        <div class="jumbotron--list-detail__col-half jumbotron--list-detail__col-left">
            <img class="img-responsive" src="<?= $siteUrl; ?>bundles/bydhome/img/thumbs/contact-list2.jpg" alt="CEO Email List">
            <div class="box-contact-count">
                <div class="vertical-center">
                    <span>Direct</span>
                    <span class="box-contact-count__title">
                        48,700
                    </span>
                    <span>CEO Email Contacts</span>
                </div>
            </div>
        </div>
        <div class="jumbotron--list-detail__col-half jumbotron--list-detail__col-right">

            <div class="gap-bottom-small">
                <h1 class="jumbotron__title" style="margin-top: 15px;">CEO EMAIL LIST</h1>
                <strong class="jumbotron--list-detail__subtitle">Direct Decision-Maker Database</strong>
            </div>
            <div class="gap-bottom">
                <h4 class="jumbotron__title">Custom Order E-mail: <span id="demo" class="jumbotron--list-detail__price" style="color: orange"><?php $totalemail = 48700; echo number_format($totalemail); ?></span></h4>
                <h4 class="jumbotron__title">Total Price: <span id="demo1" class="jumbotron--list-detail__price" style="color: orange">$ <?= number_format($_SESSION['myPrice']); ?></span></h4>
                <div class="slidecontainer">
                    <input type="range" min="1000" max="48700" value="48700" class="slider" id="myRange" step="100">
                </div>
            </div>
            <p class="text-loblolly">
                Reach the highest level of corporate leadership with our verified CEO email list. 
                This comprehensive directory provides direct contact details, including phone numbers 
                and verified email addresses, for Chief Executive Officers across all major industries. 
                Skip the gatekeepers and connect with the primary decision-makers today.
            </p>
            <div class="gap-bottom-medium hidden-tlnd">
                <form action="<?= $siteUrl; ?>checkout/step1" method="POST">
                    <input type="hidden" name="ordercode" value="<?php echo ('PO' . rand(10, 99) . 'P' . rand(10, 99) . 'L' . rand(0, 9) . 'R'); ?>">
                    <input type="hidden" name="emailType" value="Popular">
                    <input type="hidden" name="emailCategory" value="Job Title">
                    <input type="hidden" name="selectItem" value="CEO">
                    <input type="hidden" name="totalemail" id="inputTotalEmail" value="48700">
                    <input type="hidden" name="price" id="inputPrice" value="<?= $_SESSION['myPrice']; ?>">
                    <input type="hidden" name="deliveryDays" value="Within 1 Day">
                    <input type="hidden" name="dataType" id="dataType">
                    
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
                    <span class="font-small align-middle gap-left-small">Last Update <?= date('m/d/Y'); ?></span>
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
                    <span class="iconic-block__text">Direct Executive <br class="hidden-tpd">Contacts</span>
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
            <div class="col-md-10 col-md-offset-1">
                <h2 class="primary-title h3">CEO</h2>
                <p style="text-align: justify;">
                    Chief Executive Officers are the ultimate visionaries and decision-makers within any organization. 
                    They oversee the broad strategy, manage high-level resources, and hold the final authority on 
                    major corporate expenditures. Reaching a CEO means your message is being seen by the person with 
                     the power to say "Yes" to enterprise-level solutions.
                </p>
                <p><br>Our CEO email list is a premium, pre-built database that bypasses generic administrative 
                    inboxes. By providing direct contact information, we enable you to foster meaningful B2B 
                    relationships with top-tier leadership. This list includes not only emails but also 
                    company names, industries, and revenue data to help you personalize your approach.</p>
                
                <p><br>Whether you are selling luxury corporate services, high-end consulting, or innovative 
                    SaaS platforms, this CEO database gives you the competitive edge. You can use our 
                    list-builder tool to further refine your search by location or company size, ensuring 
                    your marketing campaign hits the exact niche you need.</p>
            </div>
        </div>
        
        <a href="<?= $siteUrl; ?>our-guarantees" class="lead lead--secondary lead--link">
            <h5 class="lead__text">We Guarantee Over 95% Email Deliverability With Direct CEO Data</h5>
        </a>

        <div class="row pad-vertical">
            <div class="col-md-3 col-sm-6 gap-bottom-tld">
                <i class="icon icon-checkbox text-primary icon-medium"></i>
                <h4>Accuracy Guarantee</h4>
                <p class="clear-gap-bottom">We utilize a combination of automated AI verification and human 
                    quality control to ensure our CEO contacts are active and accurate.</p>
            </div>
            <div class="col-md-3 col-sm-6 gap-bottom-tld">
                <i class="icon icon-download text-primary icon-medium"></i>
                <h4>Instant Access</h4>
                <p class="clear-gap-bottom">Download your database immediately after purchase in .csv format, 
                    ready to be imported into any major CRM like Salesforce or HubSpot.</p>
            </div>
            <div class="col-md-3 col-sm-6 gap-bottom-tld">
                <i class="icon icon-identification text-primary icon-medium"></i>
                <h4>Full Data Profiles</h4>
                <p class="clear-gap-bottom">Includes names, direct emails, phone numbers, postal addresses, 
                    company revenue, and employee counts for comprehensive targeting.</p>
            </div>
            <div class="col-md-3 col-sm-6">
                <i class="icon icon-copyright text-primary icon-medium"></i>
                <h4>Unlimited Usage</h4>
                <p class="clear-gap-bottom">Once you buy the list, it's yours. Use it for multiple campaigns 
                    without recurring fees or restrictive contracts.</p>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <h2 class="primary-title">FAQ Regarding CEO Email Lists</h2>
        <div class="row">
            <div class="col-md-6">
                <h3>How do I get a list of CEO email addresses?</h3>
                <p>Simply use the slider above to select the quantity of CEO contacts you need and click "Buy Now." You will receive an instant download link for the verified database.</p>
            </div>
            <div class="col-md-6">
                <h3>Are these generic "info@" emails?</h3>
                <p>No. We provide direct, individual business email addresses for the CEOs themselves, allowing you to bypass gatekeepers entirely.</p>
            </div>
        </div>
    </div>
</div>

<?php include_once '../assets/php/footer.php'; ?>

<script>
    var slider = document.getElementById("myRange");
    var output = document.getElementById("demo");
    var output1 = document.getElementById("demo1");

    function calculatePrice(val) {
        var totalEmail = parseInt(val);
        let price = 0;

        // CEO Pricing Logic (Based on your earlier snippets)
        if(totalEmail <= 5000){
            price = totalEmail * 0.0375;
        } else if(totalEmail <= 10000){
            price = totalEmail * 0.03375;
        } else if(totalEmail <= 25000){
            price = totalEmail * 0.033;
        } else if(totalEmail <= 50000){
            price = totalEmail * 0.03;
        } else {
            price = totalEmail * 0.0225;
        }

        let roundedPrice = Math.ceil(price);
        
        // Update UI
        output.innerHTML = totalEmail.toLocaleString('en-US');
        output1.innerHTML = "$ " + roundedPrice.toLocaleString('en-US');

        // Update Hidden Form Inputs
        document.getElementById('inputPrice').value = roundedPrice;
        document.getElementById('inputTotalEmail').value = totalEmail;
        document.getElementById('dataType').value = 'ChangePrice';
    }

    slider.oninput = function() {
        calculatePrice(this.value);
    }

    // Initialize
    calculatePrice(slider.value);
</script>