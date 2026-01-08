<?php
include_once 'header.php';
require_once '../assets/php/auth.php';
$user = new Auth();

if (isset($_POST['buyNow'])) {
    $_SESSION['ordercode'] = $_POST['ordercode'];
    $_SESSION['emailType'] = $_POST['emailType'];
    $_SESSION['emailCategory'] = $_POST['emailCategory'];
    $_SESSION['selectItem'] = $_POST['selectItem'];
    $_SESSION['totalemail'] = $_POST['totalemail'];
    $_SESSION['deliveryDays'] = $_POST['deliveryDays'];
    
    if (isset($_POST['price'])) {
        
        if (!empty($_POST['price'])) {
            $_SESSION['price'] = round($_POST['price']);
        } else {
            $_SESSION['price'];
        }
    }
}


if (isset($_GET['reorder'])) {
    $orderCode = $_GET['reorder'];
    $reorderDetails = $user->order_info($orderCode);
    $_SESSION['ordercode'] = $orderCode;
    $_SESSION['emailType'] = $reorderDetails['email_type'];
    $_SESSION['emailCategory'] = $reorderDetails['email_category'];
    $_SESSION['selectItem'] = $reorderDetails['email_item'];
    $_SESSION['totalemail'] = $reorderDetails['total_email'];
    $_SESSION['deliveryDays'] = $reorderDetails['days'];
    $_SESSION['price'] = $reorderDetails['total_price'];
    $_SESSION['re-order'] = 'reorder';
}

if(isset($_POST['orderBtn'])){
    $_SESSION['ordercode'] = $_POST['ordercode'];
    $_SESSION['emailType'] = $_POST['emailType'];
    $_SESSION['emailCategory'] = $_POST['emailCategory'];
    $_SESSION['selectItem'] = $_POST['selectItem'];
    $_SESSION['totalemail'] = $_POST['totalemail'];
    $_SESSION['deliveryDays'] = $_POST['deliveryDays'];
    $_SESSION['price'] = round($_POST['price']);
}
?>

<div class="page-title">
    <div class="container page-title__container table-layout-fixed">
        <div class="row">
            <div class="col-sm-4" style="padding: 5px;">
                <a href="#" class="checkout-steps-link is-active">
                    <span class="checkout-steps-link__count">1</span>
                    <span class="checkout-steps-link__text">Know Your Data</span>
                </a>
            </div>
            <div class="col-sm-4"style="padding: 5px;">
                <a href="#" class="checkout-steps-link  is-disabled">
                    <span class="checkout-steps-link__count">2</span>
                    <span class="checkout-steps-link__text">Login &amp; Sign up</span>
                </a>
            </div>
            <div class="col-sm-4"style="padding: 5px;">
                <a href="#" class="checkout-steps-link is-disabled ">
                    <span class="checkout-steps-link__count">3</span>
                    <span class="checkout-steps-link__text">Payment Method</span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="col-md-8">
            <div class="statistics">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="clear-gap-bottom">Order Number #<?php  echo $_SESSION['ordercode']; ?></h2>
                        <span class="font-xsmall gap-bottom-small text-muted inline-block">
                            Last Update: 12/01/2021
                        </span>
                    </div>
                    <div class="col-md-4 text-right">
                    </div>
                </div>
                <hr class="hr-line">
                <section class="statistics-item statistics-count">
                    <div class="row">
                        <div class="col-md-6">
                            <span class="statistics-count__number"><?php  echo number_format($_SESSION['totalemail']); ?></span>
                            <span class="text-uppercase font-xsmall">Total Email Contacts</span>
                        </div>
                    </div>
                </section>
                <hr class="hr-line">
            </div>
        </div>
        <div class="col-md-4 cart-layout">
            <div id="cart">
                <ul class="list list--tertiary shadow-primary gap-bottom-small">
                    <li class="list__item">
                        <h6 class="secondary-title font-xsmall">Your Cart</h6>
                    </li>
                    <li class="list__item list--tertiary__item--no-pad">
                        <table class="table table--fixed table--quaternary cart-table">
                            <tbody>
                                <tr>
                                    <td width="140" align="left">
                                        <span class="shopping-card-item__title font-xsmall"><?php  echo $_SESSION['ordercode']; ?></span>
                                        <span class="font-xsmall block text-primary"><span class="text-semibold"><?php echo number_format($_SESSION['totalemail']); ?></span> Contacts</span>
                                        <span class="font-xxsmall block">
                                            <?php echo $_SESSION['emailCategory'].'<br>',$_SESSION['selectItem']; ?>
                                        </span>
                                    </td>
                                    <td align="right">
                                        <span class="shopping-card-item__price inline-block" id="priceDemo">
<?php $price = $_SESSION['price'];
echo '$' . number_format($price); ?>
                                        </span>
                                    </td>
                                </tr>
                                <tr class="cart-total">
                                    <td>
                                        <span class="shopping-card-item__title shopping-card-item__title--total">Total</span>
                                    </td>
                                    <td>
                                        <span class="shopping-card-item__price shopping-card-item__price--total" id="priceDemo2">
<?php $price = $_SESSION['price'];
echo '$' . number_format($price); ?>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                </ul>
                <form action="step2" method="POST">
                    <input type="hidden" name="cupId" id="cupId">
                    <input type="hidden" name="ordercode" value="<?= $_SESSION['ordercode']; ?>" >
                    <input type="hidden" name="emailType" value="<?= $_SESSION['emailType']; ?>" >
                    <input type="hidden" name="emailCategory" value="<?= $_SESSION['emailCategory']; ?>" >
                    <input type="hidden" name="selectItem" value="<?= $_SESSION['selectItem']; ?>" >
                    <input type="hidden" name="totalemail" value="<?= $_SESSION['totalemail']; ?>" >
                    <input type="hidden" name="price" id="presentPrice" value="<?= $_SESSION['price']; ?>" >
                    <input type="hidden" name="deliveryDays" value="<?= $_SESSION['deliveryDays']; ?>" >

                    <input type="submit" class="button button--primary full-width" value="Continue To Checkout">
                </form>
                <a class="discount-code-link" href="#" onclick="myFunction()" id="addCouponCode">Enter a discount code</a>
                <div id="couponAlert" style="color: red; font-weight: bold;"></div>
                <div class="row" id="displayNow" style="display:none; margin-top: 20px;">
                    <form action="#" method="post" class="ajaxRequest" data-loading-text="" data-success-callback="applyCoupon" id="coupon-form">
                        <div class="col-xs-8">
                            <input type="text" class="form__control" placeholder="Discount Code" name="coupon">
                        </div>
                        <div class="col-xs-4">
                            <input type="hidden" name="price" value="<?= $_SESSION['price']; ?>" >
                            <input type="submit" class="button button--primary full-width" id="couponBtn" value="Apply">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-dedupe" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-padded-content">
                <h4 class="secondary-title">Continue to Dedupe?</h4>
                <form action="" method="post" class="form no-loading">
                    <p>Dedupe status of your account is <strong>active</strong>. Do you want to process dedupe now to find out new contacts for your last search by comparing with all of your previous contacts?</p>
                    <div class="gap-bottom">
                        <button type="button" class="button button--quinary text-uppercase" data-dismiss="modal">No</button>
                        <button type="submit" class="button button--septenary text-uppercase gap-left">Yes</button>
                    </div>
                    <div>
                        <small>Select "No" if you prefer to skip dedupe</small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<hr class="hr-line">
<?php include_once 'footer.php'; ?>
<script>
    $(document).ready(function () {
        $("#couponBtn").click(function (e) {
            if ($("#coupon-form")[0].checkValidity()) {
                e.preventDefault();
                $("#couponBtn").val('Please wait...');
                $.ajax({
                    url: '../assets/php/action',
                    type: 'post',
                    data: $("#coupon-form").serialize() + '&action=coupon_lost',
                    success: function (response) {
                        $("#couponBtn").val('Apply');
                        data = JSON.parse(response);
                        $old = data.old;
                        $present = data.price;
                        $copId = data.copId;

                        if ($old === $present) {
                            $("#couponAlert").html("The coupon code has already expired!")
                        } else {
                            $("#priceDemo").html('$ ' + Math.round($present));
                            $("#priceDemo2").html('$ ' + Math.round($present));
                            $("#presentPrice").val(Math.round($present));
                            $("#cupId").val($copId);
                        }
                    }
                });
            }
        });

    });
</script> 

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
