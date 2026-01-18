<?php include_once '../assets/php/header.php'; 
$_SESSION['myPrice'] = 3896;
?>
<div class="jumbotron jumbotron--list-detail jumbotron--regular-bg">
    <div class="container jumbotron--list-detail__container table-layout-fixed">
        <div class="jumbotron--list-detail__col-half jumbotron--list-detail__col-left">
            <img class="img-responsive" src="<?= $siteUrl; ?>bundles/bydhome/img/thumbs/contact-list2.jpg" alt="Bookyorudata">
            <div class="box-contact-count">
                <div class="vertical-center">
                    <span>Direct</span>
                    <span class="box-contact-count__title">
                        48,737
                    </span>
                    <span>Email Contacts</span>
                </div>
            </div>
        </div>
        <div class="jumbotron--list-detail__col-half jumbotron--list-detail__col-right">
            
            <div class="gap-bottom-small">
                <h1 class="jumbotron__title" style="margin-top: 15px;">CEO EMAIL LIST</h1>
            </div>
            <div class="gap-bottom">
                <h4 class="jumbotron__title">Custom Order E-mail: <span id="demo" class="jumbotron--list-detail__price" style="color: orange"><?php echo number_format(48737); ?></span></h4>
                <h4 class="jumbotron__title">Total Price: <span id="demo1" class="jumbotron--list-detail__price" style="color: orange"><?='$'.  $_SESSION['myPrice'];?></span></h4>
                <div class="slidecontainer">
                    <input type="range" min="1000" max="48737" value="48737" class="slider" id="myRange" step="100">
                </div>
            </div>
            <p class="text-loblolly">
                Yes, you can get the direct contact information of chief executive officers! Pull a huge, human-verified contact list of CEO emails and start leveraging that data as part of your marketing outreach. With this pre-built CEO database, you can jump to the top with direct and accurate email addresses that will energize your next B2B marketing campaign.
            </p>
            <div class="gap-bottom-medium hidden-tlnd">
                <form action="<?= $siteUrl; ?>checkout/step1" method="POST">
                    <input type="hidden" name="ordercode" value="<?php echo ('PO' . rand(10, 99) . 'P' . rand(10, 99) . 'L' . rand(0, 9) . 'R'); ?>">
                    <input type="hidden" name="emailType" value="Popular">
                    <input type="hidden" name="emailCategory" value="Job Title">
                    <input type="hidden" name="selectItem" value="CEO">
                    <input type="hidden" id="hiddenTotalEmail" name="totalemail" value="48737">
                    <input type="hidden" id="hiddenPrice" name="price" value="<?= $_SESSION['myPrice']; ?>">
                    <input type="hidden" name="deliveryDays" value="Within 1 Day">
                    <input type="hidden" name="dataType" id="dataType" value="">
                    
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

<!-- rest of your page content unchanged... -->

<?php include_once '../assets/php/footer.php'; ?>

<script>
    Number.prototype.format = function(n, x) {
        return this.toFixed(Math.max(0, ~~n)).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
    };

    var slider = document.getElementById("myRange");
    var outputEmail = document.getElementById("demo");
    var outputPrice = document.getElementById("demo1");
    var hiddenPrice = document.getElementById("hiddenPrice");
    var hiddenTotalEmail = document.getElementById("hiddenTotalEmail");
    var dataType = document.getElementById("dataType");

    slider.oninput = function () {
        var totalEmail = parseInt(this.value);
        var price = 0;

        if(totalEmail <= 5000){
            price = totalEmail * 0.025;
        } else if(totalEmail <= 10000){
            price = totalEmail * 0.0225;
        } else if(totalEmail <= 25000){
            price = totalEmail * 0.022;
        } else if(totalEmail <= 50000){
            price = totalEmail * 0.02;
        } else if(totalEmail <= 75000){
            price = totalEmail * 0.01825;
        } else if(totalEmail <= 100000){
            price = totalEmail * 0.0175;
        } else if(totalEmail <= 500000){
            price = totalEmail * 0.015;
        } else {
            price = totalEmail * 0.0125;
        }

        price = Math.ceil(price);

        // Update visible text
        outputEmail.innerHTML = totalEmail.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        outputPrice.innerHTML = "$ " + price.format();

        // Update form hidden fields
        hiddenPrice.value = price;
        hiddenTotalEmail.value = totalEmail;
        dataType.value = 'ChangePrice';
    };
</script>

