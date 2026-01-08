<?php
// Includes
include_once '../../assets/php/header.php';
require_once '../../assets/php/auth.php';
require_once '../../assets/php/session.php';

$user = new Auth();


// Get the product ID from URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch the product details
$product = $user->specific_email_list_id($id);

if (!$product) {
    echo "<h2 style='text-align:center;color:red;'>Product not found.</h2>";
    include_once '../../assets/php/footer.php';
    exit;
}

// Set session price for use in form
$_SESSION['myPrice'] = $product['price'];

?>
<div class="jumbotron jumbotron--list-detail jumbotron--regular-bg">
    <div class="container jumbotron--list-detail__container table-layout-fixed">
        <div class="jumbotron--list-detail__col-half jumbotron--list-detail__col-left">
            <img class="img-responsive" src="<?= $siteUrl; ?>bundles/bydhome/img/thumbs/contact-list2.jpg" alt="Email List">
            <div class="box-contact-count">
                <div class="vertical-center">
                    <span>Direct</span>
                    <span class="box-contact-count__title">
                        <?= number_format($product['total_email']); ?>
                    </span>
                    <span>Email Contacts</span>
                </div>
            </div>
        </div>
        <div class="jumbotron--list-detail__col-half jumbotron--list-detail__col-right">
            
            <div class="gap-bottom-small">
                <h1 class="jumbotron__title" style="margin-top: 15px;">
                    <?= htmlspecialchars($product['category']); ?> EMAIL LIST
                </h1>
            </div>
            <div class="gap-bottom">
                <h4 class="jumbotron__title">
                    Custom Order E-mail: 
                    <span id="demo" class="jumbotron--list-detail__price" style="color: orange">
                        <?= number_format($product['total_email']); ?>
                    </span>
                </h4>
                <h4 class="jumbotron__title">
                    Total Price: 
                    <span id="demo1" class="jumbotron--list-detail__price" style="color: orange">
                        $<?= number_format($product['price']); ?>
                    </span>
                </h4>
                <div class="slidecontainer">
                    <input type="range" min="1000" max="<?= $product['total_email']; ?>" value="<?= $product['total_email']; ?>" class="slider" id="myRange" step="100">
                </div>
            </div>

           <p class="text-loblolly">
    <?php
    $words = explode(' ', strip_tags($product['description']));
    $preview = implode(' ', array_slice($words, 0, 60));
    echo $preview . (count($words) > 60 ? '...' : '');
    ?>
</p>


            <div class="gap-bottom-medium hidden-tlnd">
                <form action="<?= $siteUrl; ?>checkout/step1" method="POST">
                    <input type="hidden" name="ordercode" value="<?php echo ('PO' . rand(10, 99) . 'P' . rand(10, 99) . 'L' . rand(0, 9) . 'R'); ?>">
                    <input type="hidden" name="emailType" value="Popular">
                    <input type="hidden" name="emailCategory" value="<?= htmlspecialchars($product['title']); ?>">
                    <input type="hidden" name="selectItem" value="<?= htmlspecialchars($product['category']); ?>">
                    <input type="hidden" id="hiddenTotalEmail" name="totalemail" value="<?= $product['total_email']; ?>">
                    <input type="hidden" id="hiddenPrice" name="price" value="<?= $product['price']; ?>">
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
                    <span class="font-small align-middle gap-left-small">Last Update <?= date('m/d/Y'); ?></span>
                </li>
            </ul>
        </div>
    </div>
</div>
<hr class="hr-line">

<?php include_once '../../assets/php/footer.php'; ?>

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

        if(totalEmail < 6000){
            price = totalEmail * 0.10;
        } else if(totalEmail < 11000){
            price = totalEmail * 0.09;
        } else if(totalEmail < 26000){
            price = totalEmail * 0.088;
        } else if(totalEmail < 51000){
            price = totalEmail * 0.08;
        } else if(totalEmail < 76000){
            price = totalEmail * 0.073;
        } else if(totalEmail < 110000){
            price = totalEmail * 0.07;
        } else if(totalEmail < 510000){
            price = totalEmail * 0.06;
        } else {
            price = totalEmail * 0.05;
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