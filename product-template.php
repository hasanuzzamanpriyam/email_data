<?php
// Includes
include_once __DIR__ . '/assets/php/header.php';

// Get the product ID from URL or slug
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$slug = isset($_GET['slug']) ? $_GET['slug'] : '';

// Fetch the product details
if (!isset($user)) {
    $user = new Auth();
}

if ($id > 0) {
    $product = $user->specific_email_list_id($id);
} elseif ($slug) {
    $product = $user->seo_specific_email_list($slug);
} else {
    $product = null;
}

if (!$product) {
    echo "<h2 style='text-align:center;color:red;'>Product not found.</h2>";
    include_once 'assets/php/footer.php';
    exit;
}

// Set session price for use in form
$_SESSION['myPrice'] = $product['price'];

// Fetch related products
$relatedProducts = [];
if ($product) {
    // Use 'title' (group) to find related products, not 'category' (specific item name)
    $relatedProducts = $user->get_related_products($product['title'], 3, $id);
}
?>

<div class="jumbotron jumbotron--list-detail jumbotron--regular-bg">
    <h1 style="background:red; color:white; padding:20px; text-align:center; z-index:9999; position:relative;">DEBUG MARKER: PRODUCT TEMPLATE LOADED</h1>
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

            <div class="product-description-wrapper gap-bottom">
                <div class="product-description-content" id="descContent" style="max-height: 100px; overflow: hidden; position: relative;">
                    <p class="text-loblolly">
                        <?php echo !empty($product['description']) ? $product['description'] : ''; ?>
                    </p>
                    <div id="descOverlay" style="position: absolute; bottom: 0; left: 0; width: 100%; height: 40px; background: linear-gradient(transparent, #fff);"></div>
                </div>
                <button id="toggleDescBtn" class="button button--secondary button--small gap-top-small" style="display: none;">Show More</button>
            </div>

            <div class="gap-bottom-medium hidden-tlnd">
                <?php if (!empty($product['file_type'])): ?>
                    <a href="<?= $siteUrl; ?>admin/assets/uploads/samples/<?= $product['file_type']; ?>" class="button button--secondary gap-right-plnu full-width-pld gap-bottom-small" download style="display:block; text-align:center; margin-bottom: 10px;">
                        <i class="icon icon-download"></i> Download Sample
                    </a>
                <?php endif; ?>
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
<div class="container gap-bottom-medium">
    <?php if (!empty($relatedProducts)): ?>
        <hr class="hr-line">
        <h3 class="jumbotron__title gap-bottom">Related Products</h3>
        <div class="row">
            <?php foreach ($relatedProducts as $relProduct): ?>
                <div class="col-md-4 gap-bottom">
                    <div class="premade-lists__item" style="border: 1px solid #e1e1e1; padding: 20px; border-radius: 4px;">
                        <h4 class="premade-lists__item__title h4">
                            <a href="<?= $siteUrl; ?>ready-made/<?= strtolower(str_replace(' ', '-', $relProduct['category'])); ?>/<?= $relProduct['seo_url'] ? $relProduct['seo_url'] : $relProduct['id']; ?>" style="text-decoration:none; color:inherit;">
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
                            <a href="<?= $siteUrl; ?>ready-made/<?= strtolower(str_replace(' ', '-', $relProduct['category'])); ?>/<?= $relProduct['seo_url'] ? $relProduct['seo_url'] : $relProduct['id']; ?>" class="button button--primary button--small gap-left-small">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
<hr class="hr-line">

<?php include_once __DIR__ . '/assets/php/footer.php'; ?>

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

    if (slider) {
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
                else price = totalEmail * 0.075; // Default for >100k
            } else if (productCategory === 'Custom Order') {
                if (totalEmail <= 5000) price = totalEmail * 0.05625;
                else if (totalEmail <= 10000) price = totalEmail * 0.0525;
                else if (totalEmail <= 25000) price = totalEmail * 0.04875;
                else if (totalEmail <= 50000) price = totalEmail * 0.045;
                else if (totalEmail <= 75000) price = totalEmail * 0.04125;
                else if (totalEmail <= 100000) price = totalEmail * 0.0375;
                else price = totalEmail * 0.0375; // Default
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

            // Update form hidden fields
            hiddenPrice.value = Math.ceil(price);
            hiddenTotalEmail.value = totalEmail;
            dataType.value = 'ChangePrice';

            // Update visible text
            outputEmail.innerHTML = totalEmail.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            outputPrice.innerHTML = "$ " + Math.ceil(price).format();
        };
    }
</script>
<script>
    // Description Toggle Logic
    document.addEventListener("DOMContentLoaded", function() {
        var content = document.getElementById("descContent");
        var btn = document.getElementById("toggleDescBtn");
        var overlay = document.getElementById("descOverlay");

        if (content.scrollHeight > 100) {
            btn.style.display = "inline-block";
            overlay.style.display = "block";
        } else {
            content.style.maxHeight = "none";
            overlay.style.display = "none";
        }

        btn.addEventListener("click", function(e) {
            e.preventDefault();
            if (content.style.maxHeight !== "none") {
                content.style.maxHeight = "none";
                overlay.style.display = "none";
                btn.textContent = "Show Less";
            } else {
                content.style.maxHeight = "100px";
                overlay.style.display = "block";
                btn.textContent = "Show More";
            }
        });
    });
</script>