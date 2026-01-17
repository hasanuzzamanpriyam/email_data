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
                    <p>Buy a contact list that's accurate and affordable. 🔥 <strong>50% OFF Limited Time!</strong></p>
                </div>
            </div>
        </div>
    </div>
</div>

<main class="pad-bottom">
    <div class="container regular-page-content regular-page-content--pull-top">

        <a class="button button--primary full-width"
           style="width:250px;margin-top:25px;"
           onclick="toggleCalculator()">
            Calculate Your Target
        </a>

        <div class="row" id="displayNow" style="display:none;margin-top:20px;">
            <div class="col-sm-4">
                <select class="form__control" id="emailType">
                    <option disabled selected>- Select Type -</option>
                    <option value="readyMade">Ready Made</option>
                    <option value="customOrder">Custom Order</option>
                    <option value="office365">Office 365</option>
                </select>
            </div>

            <div class="col-sm-4">
                <input type="number" class="form__control"
                       id="totalemail"
                       placeholder="Enter Total Leads"
                       onkeyup="calculatePrice()">
            </div>

            <div class="col-sm-4">
                <input type="number" class="form__control"
                       id="totalprice"
                       placeholder="Total Price"
                       readonly>
            </div>
        </div>

        <!-- ================= BUSINESS CONTACTS ================= -->
        <div class="table-responsive pad-top-small">
            <table class="table table--tertiary table--fixed table--highlight">
                <thead>
                <tr>
                    <th># Of Records</th>
                    <th>Ready-Made (Pre E-MAIL)</th>
                    <th>Custom-Order (Pre E-MAIL)</th>
                    <th>Office-365 (Pre E-MAIL)</th>
                </tr>
                </thead>
                <tbody>
                <tr><td>1K – 5K</td><td>$0.05</td><td>$0.075</td><td>$0.125</td></tr>
                <tr><td>6K – 10K</td><td>$0.045</td><td>$0.07</td><td>$0.12</td></tr>
                <tr><td>11K – 25K</td><td>$0.044</td><td>$0.065</td><td>$0.115</td></tr>
                <tr><td>26K – 50K</td><td>$0.04</td><td>$0.06</td><td>$0.11</td></tr>
                <tr><td>51K – 75K</td><td>$0.0365</td><td>$0.055</td><td>$0.105</td></tr>
                <tr><td>76K – 100K</td><td>$0.035</td><td>$0.05</td><td>$0.10</td></tr>
                <tr><td>110K – 500K</td><td>$0.03</td><td>—</td><td>—</td></tr>
                <tr><td>510K – 1M+</td><td>$0.025</td><td>—</td><td>—</td></tr>
                </tbody>
            </table>
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
const DISCOUNT = 0.5;

function toggleCalculator() {
    const box = document.getElementById("displayNow");
    box.style.display = box.style.display === "none" ? "block" : "none";
}

function calculatePrice() {
    let type = document.getElementById("emailType").value;
    let total = parseInt(document.getElementById("totalemail").value);
    let price = 0;

    if (!type || isNaN(total)) return;

    if (type === 'readyMade') {
        if (total <= 5000) price = total * 0.05;
        else if (total <= 10000) price = total * 0.045;
        else if (total <= 25000) price = total * 0.044;
        else if (total <= 50000) price = total * 0.04;
        else if (total <= 75000) price = total * 0.0365;
        else if (total <= 100000) price = total * 0.035;
        else if (total <= 500000) price = total * 0.03;
        else if (total <= 1000000) price = total * 0.025;
        else return alert("Limit exceeded");
    }

    if (type === 'customOrder') {
        price = total * 0.075;
    }

    if (type === 'office365') {
        price = total * 0.125;
    }

    document.getElementById("totalprice").value = Math.ceil(price);
}
</script>