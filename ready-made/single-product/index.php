<?php
// Includes
include_once '../../assets/php/header.php';
require_once '../../assets/php/auth.php';
require_once '../../assets/php/session.php';

$user = new Auth();


// Get the product ID from URL or slug
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$slug = isset($_GET['slug']) ? $_GET['slug'] : '';

// Fetch the product details
if ($id > 0) {
    $product = $user->specific_email_list_id($id);
} elseif ($slug) {
    $product = $user->seo_specific_email_list($slug);
} else {
    $product = null;
}

if (!$product) {
    echo "<h2 style='text-align:center;color:red;'>Product not found.</h2>";
    include_once '../../assets/php/footer.php';
    exit;
}

// Set session price for use in form
$_SESSION['myPrice'] = $product['price'];

// Fetch related products
$relatedProducts = [];
if ($product) {
    $excludeId = isset($product['id']) ? $product['id'] : $id;
    // Use 'title' (group) to find related products, not 'category' (specific item name)
    $relatedProducts = $user->get_related_products($product['title'], 3, $excludeId);
}
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

                    <div class="row">
                        <?php if (!empty($product['file_type'])): ?>
                            <!-- Two buttons side by side when sample exists -->
                            <div class="col-xs-6" style="padding-right: 5px;">
                                <a href="<?= $siteUrl; ?>admin/assets/uploads/samples/<?= $product['file_type']; ?>" class="button button--secondary full-width gap-bottom-small-pld" download style="display:block; text-align:center;">
                                    <i class="icon icon-download"></i> Download Sample
                                </a>
                            </div>
                            <div class="col-xs-6" style="padding-left: 5px;">
                                <input type="submit" name="buyNow" class="button button--primary full-width gap-bottom-small-pld" value="Buy Now">
                            </div>
                        <?php else: ?>
                            <!-- Full width Buy Now button when no sample -->
                            <div class="col-xs-12">
                                <input type="submit" name="buyNow" class="button button--primary full-width gap-bottom-small-pld" value="Buy Now">
                            </div>
                        <?php endif; ?>
                    </div>
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
<div class="container gap-bottom-medium">
    <?php if (!empty($relatedProducts)): ?>
        <h3 class="jumbotron__title gap-bottom">Related Products</h3>
        <div class="row">
            <?php foreach ($relatedProducts as $relProduct): ?>
                <div class="col-md-4 gap-bottom">
                    <div class="premade-lists__item" style="border: 1px solid #e1e1e1; padding: 20px; border-radius: 4px;">
                        <h4 class="premade-lists__item__title h4">
                            <a href="<?= $siteUrl; ?>ready-made/single-product?id=<?= $relProduct['id']; ?>" style="text-decoration:none; color:inherit;">
                                <?= htmlspecialchars($relProduct['category']); ?>
                            </a>
                        </h4>
                        <div class="gap-bottom-small">
                            <span class="premade-lists__item__contact-title h6">
                                <?= number_format($relProduct['total_email']); ?>
                            </span>
                            <small>Contacts</small>
                        </div>
                        <p class="text-muted" style="font-size: 14px; height: 40px; overflow: hidden;">
                            <?= !empty($relProduct['short_description']) ? htmlspecialchars($relProduct['short_description']) : ''; ?>
                        </p>
                        <hr>
                        <div class="text-right">
                            <span class="h5" style="color: orange;">$<?= number_format($relProduct['price']); ?></span>
                            <a href="<?= $siteUrl; ?>ready-made/single-product?id=<?= $relProduct['id']; ?>" class="button button--primary button--small gap-left-small">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
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

    // Pass the category from PHP to JS
    var productCategory = "<?= $product['category']; ?>";

    slider.oninput = function() {
        var totalEmail = parseInt(this.value);
        var price = 0;

        if (productCategory === 'Office 365') {
            if (totalEmail <= 5000) price = totalEmail * 0.09375;
            else if (totalEmail <= 10000) price = totalEmail * 0.09;
            else if (totalEmail <= 25000) price = totalEmail * 0.08625;
            else if (totalEmail <= 50000) price = totalEmail * 0.0825;
            else if (totalEmail <= 75000) price = totalEmail * 0.07875;
            else if (totalEmail <= 100000) price = totalEmail * 0.075;
            else price = totalEmail * 0.075;
        } else if (productCategory === 'Custom Order') {
            if (totalEmail <= 5000) price = totalEmail * 0.05625;
            else if (totalEmail <= 10000) price = totalEmail * 0.0525;
            else if (totalEmail <= 25000) price = totalEmail * 0.04875;
            else if (totalEmail <= 50000) price = totalEmail * 0.045;
            else if (totalEmail <= 75000) price = totalEmail * 0.04125;
            else if (totalEmail <= 100000) price = totalEmail * 0.0375;
            else price = totalEmail * 0.0375;
        } else {
            // Ready Made (Default)
            if (totalEmail <= 5000) price = totalEmail * 0.0375;
            else if (totalEmail <= 10000) price = totalEmail * 0.03375;
            else if (totalEmail <= 25000) price = totalEmail * 0.033;
            else if (totalEmail <= 50000) price = totalEmail * 0.03;
            else if (totalEmail <= 75000) price = totalEmail * 0.027375;
            else if (totalEmail <= 100000) price = totalEmail * 0.02625;
            else if (totalEmail <= 500000) price = totalEmail * 0.0225;
            else price = totalEmail * 0.01875;
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