<?php include_once 'header.php'; ?>

<div class="page-title">
    <div class="container page-title__container table-layout-fixed">
        <div class="row">
            <div class="col-sm-4" style="padding: 5px;">
                <a href="#" class="checkout-steps-link is-disabled">
                    <span class="checkout-steps-link__count">1</span>
                    <span class="checkout-steps-link__text">Know Your Data</span>
                </a>
            </div>
            <div class="col-sm-4" style="padding: 5px;">
                <a href="#" class="checkout-steps-link is-active">
                    <span class="checkout-steps-link__count">2</span>
                    <span class="checkout-steps-link__text">Login &amp; Sign up</span>
                </a>
            </div>
            <div class="col-sm-4" style="padding: 5px;">
                <a href="#" class="checkout-steps-link is-disabled">
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
            <h3 class="primary-title clear-gap-vertical">Returning Customers</h3>
            <p>Welcome back! Please provide your email and password information to sign in.</p>
            
            <div class="gap-bottom" style="color: red;"></div>
            <div class="row">
                
            <?php if (isset($_SESSION['user'])) { ?>
                <form action="step3" method="POST" id="continue-log-form-order">
                    <div class="col-sm-6">
                        <input type="hidden" name="email" value="<?= htmlspecialchars($_SESSION['user']); ?>">

                        <input type="hidden" name="cupId" value="<?= htmlspecialchars(isset($_POST['cupId']) ? $_POST['cupId'] : ''); ?>">

                        <input type="hidden" name="ordercode" value="<?= htmlspecialchars($_SESSION['ordercode'] ?? ''); ?>">
                        <input type="hidden" name="emailType" value="<?= htmlspecialchars($_SESSION['emailType'] ?? ''); ?>">
                        <input type="hidden" name="emailCategory" value="<?= htmlspecialchars($_SESSION['emailCategory'] ?? ''); ?>">
                        <input type="hidden" name="selectItem" value="<?= htmlspecialchars($_SESSION['selectItem'] ?? ''); ?>">
                        <input type="hidden" name="totalemail" value="<?= htmlspecialchars($_SESSION['totalemail'] ?? 0); ?>">
                        <input type="hidden" name="price" value="<?= htmlspecialchars($_SESSION['price'] ?? 0); ?>">
                        <input type="hidden" name="deliveryDays" value="<?= htmlspecialchars($_SESSION['deliveryDays'] ?? ''); ?>">
                        <input type="submit" class="button button--primary full-width" name="loggedOrderBtn" value="Continue To Checkout">
                    </div>
                </form>
            <?php } else { ?>
                <form action="#" method="POST" id="continue-log-form">
                    <div class="alert-danger" id="loginAlert"></div>
                    <div class="col-sm-6 gap-bottom">
                        <input type="email" class="form__control" placeholder="Email" name="username" required>
                    </div>
                    <div class="col-sm-6 gap-bottom">
                        <input type="password" class="form__control" placeholder="Password" name="password" required>
                    </div>
                    <div class="col-sm-6 inline-align-fix">
                        <a href="forgot-password.php" class="link-secondary font-xsmall link-underline">Password Recovery</a>
                    </div>
                    <div class="col-sm-6">
                        <input type="hidden" name="cupId" value="<?= htmlspecialchars(isset($_POST['cupId']) ? $_POST['cupId'] : ''); ?>">
                        <input type="hidden" name="ordercode" value="<?= htmlspecialchars($_SESSION['ordercode'] ?? ''); ?>">
                        <input type="hidden" name="emailType" value="<?= htmlspecialchars($_SESSION['emailType'] ?? ''); ?>">
                        <input type="hidden" name="emailCategory" value="<?= htmlspecialchars($_SESSION['emailCategory'] ?? ''); ?>">
                        <input type="hidden" name="selectItem" value="<?= htmlspecialchars($_SESSION['selectItem'] ?? ''); ?>">
                        <input type="hidden" name="totalemail" value="<?= htmlspecialchars($_SESSION['totalemail'] ?? 0); ?>">
                        <input type="hidden" name="price" value="<?= htmlspecialchars($_SESSION['price'] ?? 0); ?>">
                        <input type="hidden" name="deliveryDays" value="<?= htmlspecialchars($_SESSION['deliveryDays'] ?? ''); ?>">
                        <input type="submit" class="button button--primary full-width continueBtn" id="continueBtn" value="Continue To Checkout">
                    </div>
                </form>
            <?php } ?>
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
                                        <span class="shopping-card-item__title font-xsmall">
                                            <?= htmlspecialchars($_SESSION['ordercode'] ?? ''); ?>
                                        </span>
                                        <span class="font-xsmall block text-primary">
                                            <span class="text-semibold">
                                                <?= isset($_SESSION['totalemail']) && is_numeric($_SESSION['totalemail']) ? number_format($_SESSION['totalemail']) : '0'; ?>
                                            </span> Contacts
                                        </span>
                                        <span class="font-xxsmall block">
                                            <?= htmlspecialchars($_SESSION['emailCategory'] ?? ''); ?><br>
                                            <?= htmlspecialchars($_SESSION['selectItem'] ?? ''); ?>
                                        </span>
                                    </td>
                                    <td align="right">
                                        <span class="shopping-card-item__price inline-block">
                                            <?php
                                            $price = $_SESSION['price'] ?? 0;
                                            echo '$' . number_format(is_numeric($price) ? $price : 0);
                                            ?>
                                        </span>
                                    </td>
                                </tr>
                                <tr class="cart-total">
                                    <td>
                                        <span class="shopping-card-item__title shopping-card-item__title--total">Total</span>
                                    </td>
                                    <td>
                                        <span class="shopping-card-item__price shopping-card-item__price--total">
                                            <?php
                                            $price = $_SESSION['price'] ?? 0;
                                            echo '$' . number_format(is_numeric($price) ? $price : 0);
                                            ?>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                </ul>
            </div>
        </div>

        <?php if (!isset($_SESSION['user'])) { ?>
            <hr class="hr-large">
            <div class="col-md-6" style="text-align: center;">
                <h3 class="primary-title clear-gap-bottom" style="margin-bottom: 10px;">New Customer? Signup</h3>
                <a href="../signup" class="button button--primary full-width">Create My Account</a>
            </div>
        <?php } ?>
    </div>
</div>

<hr class="hr-line">

<?php include_once 'footer.php'; ?>

<script>
    $(document).ready(function () {
        $(".continueBtn").click(function (e) {
            if ($("#continue-log-form")[0].checkValidity()) {
                e.preventDefault();
                $(".continueBtn").val('Please wait...');
                $.ajax({
                    url: '../assets/php/action',
                    type: 'post',
                    data: $("#continue-log-form").serialize() + '&action=login2',
                    success: function (response) {
                        $(".continueBtn").val('Continue To Checkout');
                        if (response === 'login2') {
                            window.location = 'step3';
                        } else {
                            $("#loginAlert").html(response);
                        }
                    }
                });
            }
        });
    });
</script>