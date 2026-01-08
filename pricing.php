<?php include_once 'assets/php/header.php'; ?>

<div class="jumbotron jumbotron--regular jumbotron--regular-bg">
    <div class="container jumbotron__container">
        <div class="jumbotron__inner">
            <div class="row">
                <div class="col-md-5">
                    <h1 class="jumbotron__title">Best Price Guarantee</h1>
                    <div class="breadbrumb">
                        <a href="<?= $siteUrl; ?>" class="breadbrumb__item">Home</a>
                        <span class="breadbrumb__item">Pricing</span>
                    </div>
                </div>
                <div class="col-md-7">
                    <p>Buy a contact list that's both accurate and the best priced! We provide Best-Price-Guarantee
                        with a clear pricing structure and rates among the best in the industry. Our human-verified
                        lists are available for low prices with no hidden or subscription fees or required
                        contracts.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<main class="pad-bottom">
    <div class="container regular-page-content regular-page-content--pull-top">
        <div class="tab tab--primary tab--btn-md-3 tab--responsive-sm">
            <div class="tab__nav js-tabs">
                <a class="is-active" href="#content1" data-toggle="tab" role="tab">Business Contacts</a>
                <a href="#content2" data-toggle="tab" role="tab">Healthcare Professionals</a>
                <a href="#content3" data-toggle="tab" role="tab">Real Estate Agents</a>
                <button id="tab-toggle-btn" class="tab__toggle-btn" type="button"></button>
            </div>
        </div>
        <a class="button button--primary full-width" href="#" onclick="myFunction()" id="addCouponCode" style="width: 250px; margin-top: 25px;">Calculate Your Target</a>
        <div id="couponAlert" style="color: red; font-weight: bold;"></div>
        <div class="row" id="displayNow" style="display:none; margin-top: 20px;">
            <div class="col-sm-4 gap-bottom">
                <select class="form__control" id="emailType">
                    <option selected disabled>-Select Options-</option>
                    <option value="readyMade">Ready Made</option>
                    <option value="customOrder">Custom Order</option>
                    <option value="office365">Office 365</option>
                </select>
            </div>
            <div class="col-sm-4 gap-bottom">
                <input type="text" class="form__control" placeholder="Enter Total Leads" name="totalemail" id="totalemail" required 
                       onkeyup="totalEmail(value.this)">
            </div>
            <div class="col-sm-4 gap-bottom">
                <input type="text" class="form__control" placeholder="E-mail Price" name="price" id="totalprice" onkeyup="totalPrice(value.this)" required>
            </div>
        </div>
        <div id="content1" class="tab__content fade active in pad-top-small">
            <div class="box box--info gap-bottom">
                <div class="row" style="text-align: center;">
                    <div class="col-lg-12 gap-bottom-small-tlnd">
                        <h2 class="secondary-title clear-gap-vertical font-medium">Select Your Budget for Business Contacts</h2>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table--tertiary table--fixed table--highlight gap-bottom-large">
                    <thead>
                        <tr>
                            <th># Of Records</th>
                            <th>Ready-Made(Per E-mail)</th>
                            <th>Custom-Order(Per E-mail)</th>
                            <th>Office-365(Per E-mail)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-semibold">
                                1 K - 5 K
                            </td>
                            <td>
                                $ 0.10
                            </td>
                            <td>
                                $ 0.15
                            </td>
                            <td>
                                $ 0.25
                            </td>
                        </tr>
                        <tr>
                            <td class="text-semibold">
                                6 K - 10 K
                            </td>
                            <td>
                                $ 0.09
                            </td>
                            <td>
                                $ 0.14
                            </td>
                            <td>
                                $ 0.24
                            </td>
                        </tr>
                        <tr>
                            <td class="text-semibold">
                                11 K - 25 K
                            </td>
                            <td>
                                $ 0.088
                            </td>
                            <td>
                                $ 0.13
                            </td>
                            <td>
                                $ 0.23
                            </td>
                        </tr>
                        <tr>
                            <td class="text-semibold">
                                26 K - 50 K
                            </td>
                            <td>
                                $ 0.08
                            </td>
                            <td>
                                $ 0.12
                            </td>
                            <td>
                                $ 0.22
                            </td>
                        </tr>
                        <tr>
                            <td class="text-semibold">
                                51 K - 75 K
                            </td>
                            <td>
                                $ 0.073
                            </td>
                            <td>
                                $ 0.11
                            </td>
                            <td>
                                $ 0.21
                            </td>
                        </tr>
                        <tr>
                            <td class="text-semibold">
                                76 K - 100 K
                            </td>
                            <td>
                                $ 0.07
                            </td>
                            <td>
                                $ 0.10
                            </td>
                            <td>
                                $ 0.20
                            </td>
                        </tr>
                        <tr>
                            <td class="text-semibold">
                                110 K - 500 K
                            </td>
                            <td>
                                $ 0.06
                            </td>
                            <td>
                                ---
                            </td>
                            <td>
                                ---
                            </td>
                        </tr>
                        <tr>
                            <td class="text-semibold">
                                510 K - Over 1 M
                            </td>
                            <td>
                                $ 0.05
                            </td>
                            <td>
                                ---
                            </td>
                            <td>
                                ---
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h5>Best Price Guarantee</h5>
            <p>If you find any lower price with same 95% deliverability guarantee for same premium full direct
                email contact list, we beat it directly!</p>
            <p>Our transparent, affordable pricing provides small businesses and start-ups with the tools they need
                to succeed at a price entrepreneurs can afford. The pricing is simple; there are no extra fees for
                using our contacts, and we don't charge more depending on the size of your company. Our email lists
                also often have a great ROI; the targeted leads provided could lead to thousands in sales to an
                enterprising company!</p>
        </div>
        <div id="content2" class="tab__content fade pad-top-small">
            <div class="box box--info gap-bottom">
                <div class="row" style="text-align: center;">
                    <div class="col-lg-12 gap-bottom-small-tlnd">
                        <h2 class="secondary-title clear-gap-vertical font-medium">Select Your Budget for Healthcare Professionals</h2>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table--tertiary table--fixed table--highlight gap-bottom-large">
                    <thead>
                        <tr>
                            <th># Of Records</th>
                            <th>Ready-Made(Per E-mail)</th>
                            <th>Custom-Order(Per E-mail)</th>
                            <th>Office-365(Per E-mail)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-semibold">
                                1 K - 5 K
                            </td>
                            <td>
                                $ 0.10
                            </td>
                            <td>
                                $ 0.15
                            </td>
                            <td>
                                $ 0.25
                            </td>
                        </tr>
                        <tr>
                            <td class="text-semibold">
                                6 K - 10 K
                            </td>
                            <td>
                                $ 0.09
                            </td>
                            <td>
                                $ 0.14
                            </td>
                            <td>
                                $ 0.24
                            </td>
                        </tr>
                        <tr>
                            <td class="text-semibold">
                                11 K - 25 K
                            </td>
                            <td>
                                $ 0.088
                            </td>
                            <td>
                                $ 0.13
                            </td>
                            <td>
                                $ 0.23
                            </td>
                        </tr>
                        <tr>
                            <td class="text-semibold">
                                26 K - 50 K
                            </td>
                            <td>
                                $ 0.08
                            </td>
                            <td>
                                $ 0.12
                            </td>
                            <td>
                                $ 0.22
                            </td>
                        </tr>
                        <tr>
                            <td class="text-semibold">
                                51 K - 75 K
                            </td>
                            <td>
                                $ 0.073
                            </td>
                            <td>
                                $ 0.11
                            </td>
                            <td>
                                $ 0.21
                            </td>
                        </tr>
                        <tr>
                            <td class="text-semibold">
                                76 K - 100 K
                            </td>
                            <td>
                                $ 0.07
                            </td>
                            <td>
                                $ 0.10
                            </td>
                            <td>
                                $ 0.20
                            </td>
                        </tr>
                        <tr>
                            <td class="text-semibold">
                                110 K - 500 K
                            </td>
                            <td>
                                $ 0.06
                            </td>
                            <td>
                                ---
                            </td>
                            <td>
                                ---
                            </td>
                        </tr>
                        <tr>
                            <td class="text-semibold">
                                510 K - Over 1 M
                            </td>
                            <td>
                                $ 0.05
                            </td>
                            <td>
                                ---
                            </td>
                            <td>
                                ---
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h5>Best Price Guarantee</h5>
            <p>If you find any lower price with same 95% deliverability guarantee for same premium full direct
                email contact list, we beat it directly!</p>
            <p>Our transparent, affordable pricing provides small businesses and start-ups with the tools they need
                to succeed at a price entrepreneurs can afford. The pricing is simple; there are no extra fees for
                using our contacts, and we don't charge more depending on the size of your company. Our email lists
                also often have a great ROI; the targeted leads provided could lead to thousands in sales to an
                enterprising company!</p>
        </div>
        <div id="content3" class="tab__content fade pad-top-small">
            <div class="box box--info gap-bottom">
                <div class="row" style="text-align: center;">
                    <div class="col-lg-12 gap-bottom-small-tlnd">
                        <h2 class="secondary-title clear-gap-vertical font-medium">Select Your Budget for Real Estate Agents</h2>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table--tertiary table--fixed table--highlight gap-bottom-large">
                    <thead>
                        <tr>
                            <th># Of Records</th>
                            <th>Ready-Made(Per E-mail)</th>
                            <th>Custom-Order(Per E-mail)</th>
                            <th>Office-365(Per E-mail)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-semibold">
                                1 K - 5 K
                            </td>
                            <td>
                                $ 0.10
                            </td>
                            <td>
                                $ 0.15
                            </td>
                            <td>
                                $ 0.25
                            </td>
                        </tr>
                        <tr>
                            <td class="text-semibold">
                                6 K - 10 K
                            </td>
                            <td>
                                $ 0.09
                            </td>
                            <td>
                                $ 0.14
                            </td>
                            <td>
                                $ 0.24
                            </td>
                        </tr>
                        <tr>
                            <td class="text-semibold">
                                11 K - 25 K
                            </td>
                            <td>
                                $ 0.088
                            </td>
                            <td>
                                $ 0.13
                            </td>
                            <td>
                                $ 0.23
                            </td>
                        </tr>
                        <tr>
                            <td class="text-semibold">
                                26 K - 50 K
                            </td>
                            <td>
                                $ 0.08
                            </td>
                            <td>
                                $ 0.12
                            </td>
                            <td>
                                $ 0.22
                            </td>
                        </tr>
                        <tr>
                            <td class="text-semibold">
                                51 K - 75 K
                            </td>
                            <td>
                                $ 0.073
                            </td>
                            <td>
                                $ 0.11
                            </td>
                            <td>
                                $ 0.21
                            </td>
                        </tr>
                        <tr>
                            <td class="text-semibold">
                                76 K - 100 K
                            </td>
                            <td>
                                $ 0.07
                            </td>
                            <td>
                                $ 0.10
                            </td>
                            <td>
                                $ 0.20
                            </td>
                        </tr>
                        <tr>
                            <td class="text-semibold">
                                110 K - 500 K
                            </td>
                            <td>
                                $ 0.06
                            </td>
                            <td>
                                ---
                            </td>
                            <td>
                                ---
                            </td>
                        </tr>
                        <tr>
                            <td class="text-semibold">
                                510 K - Over 1 M
                            </td>
                            <td>
                                $ 0.05
                            </td>
                            <td>
                                ---
                            </td>
                            <td>
                                ---
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h5>Best Price Guarantee</h5>
            <p>If you find any lower price with same 95% deliverability guarantee for same premium full direct
                email contact list, we beat it directly!</p>
            <p>Our transparent, affordable pricing provides small businesses and start-ups with the tools they need
                to succeed at a price entrepreneurs can afford. The pricing is simple; there are no extra fees for
                using our contacts, and we don't charge more depending on the size of your company. Our email lists
                also often have a great ROI; the targeted leads provided could lead to thousands in sales to an
                enterprising company!</p>
        </div>
    </div>
</main>
<hr class="hr-line">

<div class="lead hidden-dd">
    <div class="container lead__container">
        <div class="lead__col lead__col--left">
            <h5 class="lead__text gap-bottom-tld">Ready To Boost Your Sales Like Your Competitors? Try Our Tool For Free.</h5>
        </div>
        <div class="lead__col lead__col--right">
            <a class="button button--quaternary full-width" href="<?= $siteUrl; ?>custom-order/business-contacts">
                Build a List <i class="icon icon-arrow-forward button--quaternary__icon"></i>
            </a>
        </div>
    </div>
</div>
<?php include_once 'assets/php/footer.php'; ?>

<script>
    function myFunction() {
        var x = document.getElementById("displayNow");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
<script>
    function totalEmail() {
        let emailType = document.getElementById("emailType").value;
        let totalEmail = document.getElementById("totalemail").value;
        let price = 0;
        if(emailType == 'readyMade'){
            if (1000 <= totalEmail && totalEmail <= 5000) {
                price = (totalEmail * 0.10);
            } else if (5001 <= totalEmail && totalEmail <= 10000) {
                if(totalEmail < 6000){
                    let email = totalEmail - 5000;
                    price = 500 + (email * 0.04);
                }else{
                    price = (totalEmail * 0.09);
                }
            } else if (10001 <= totalEmail && totalEmail <= 25000) {
                if(totalEmail < 11000){
                    let email = totalEmail - 10000;
                    price = 900 + (email * 0.068);
                }else{
                    price = (totalEmail * 0.088);
                }
            } else if (25001 <= totalEmail && totalEmail <= 50000) {
                if(totalEmail < 26000){
                    let email = totalEmail - 25000;
                    price = 2200 + (email * 0.08);
                }else{
                    price = (totalEmail * 0.08);
                }
            } else if (50001 <= totalEmail && totalEmail <= 75000) {
                if(totalEmail < 51000){
                    let email = totalEmail - 50000;
                    price = 2200 + (email * 0.08);
                }else{
                    price = (totalEmail * 0.073);
                }
            } else if (75001 <= totalEmail && totalEmail <= 100000) {
                price = (totalEmail * 0.07);
            } else if (100001 <= totalEmail && totalEmail <= 500000) {
                price = (totalEmail * 0.07);
            } else if (500001 <= totalEmail && totalEmail <= 1000000) {
                price = (totalEmail * 0.07);
            } else {
                alert("Please, We can't received your custom order due to limit cross!<br>Please, Try Agiain, According Our Pricing Plane...");
            }
            document.getElementById("totalprice").value = Math.ceil(price);
            document.getElementById("deliveryDays").value = days;
        }else if(emailType == 'customOrder'){
            
        }else if(emailType == 'office365'){
            
        } 
    }

    function totalPrice() {
        let totalPrice = document.getElementById("totalprice").value;
        let email = 0;
        let days = '';
        if(150 <= totalPrice && totalPrice <= 750){
            email = totalPrice / 0.15;
            days = 'Within 2 Days';
        } else if(840 <= totalPrice && totalPrice <= 1400){
            email = totalPrice / 0.14;
            days = 'Within 3 Days';
        } else if(1430 <= totalPrice && totalPrice <= 3250){
            email = totalPrice / 0.13;
            days = 'Within 7 Days';
        } else if(3120 <= totalPrice && totalPrice <= 6000){
            email = totalPrice / 0.12;
            days = 'Within 10 Days';
        } else if(5610 <= totalPrice && totalPrice <= 8250){
            email = totalPrice / 0.11;
            days = 'Within 15 Days';
        } else if(7600 <= totalPrice && totalPrice <= 10000){
            email = totalPrice / 0.10;
            days = 'Within 25 Days';
        }else{
            alert("Please, We can't received your custom order due to limit cross!<br>Please, Try Agiain, According Our Pricing Plane...");
        }
        document.getElementById("totalemail").value = Math.ceil(email);
        document.getElementById("deliveryDays").value = days;
    }
</script>
