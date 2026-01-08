<?php
include_once 'header.php';
require_once '../assets/php/auth.php';
require_once '../assets/php/session.php';
$user = new Auth();

$fullName = '';
$email = '';
$copId = '';
$order_code = '';
$emailType = '';
$category = '';
$selectItem = '';
$total_email = 0;
$total_price = 0;
$deliveryDays = '';
$topup = 0;

if (isset($_POST['loggedOrderBtn'])) {
    $email = $_POST['email'];
    $copId = $_POST['cupId'];
    $order_code = $_SESSION['ordercode'];
    $emailType = $_SESSION['emailType'];
    $category = $_SESSION['emailCategory'];
    $selectItem = $_SESSION['selectItem'];
    $total_email = $_SESSION['totalemail'];
    $deliveryDays = $_SESSION['deliveryDays'];
    $total_price = $_SESSION['price'];

    $logged = $user->currentUser($email);

    $uid = $logged['id'];
    $fullName = $logged['first_name'] . ' ' . $logged['last_name'];
    $topup = $logged['topup'];

    // $user->insert_order($uid, $copId, $order_code, $fullName, $email, $email_type, $category, $selectItem, $total_email, $total_price, $deliveryDays);

    $_SESSION['fullName'] = $fullName;
    $_SESSION['user'] = $email;
    $_SESSION['cupId'] = $copId;
    $_SESSION['orderCode'] = $order_code;
    $_SESSION['emailType'] = $emailType;
    $_SESSION['category'] = $category;
    $_SESSION['items'] = $selectItem;
    $_SESSION['totalEmail'] = $total_email;
    $_SESSION['price'] = $total_price;
    $_SESSION['deliveryDays'] = $deliveryDays;
} else {
    $fullName = $_SESSION['fullName'];
    $email = $_SESSION['user'];
    $copId = $_SESSION['cupId'];
    $order_code = $_SESSION['orderCode'];
    $emailType = $_SESSION['emailType'];
    $category = $_SESSION['category'];
    $selectItem = $_SESSION['items'];
    $total_email = $_SESSION['totalEmail'];
    $total_price = $_SESSION['price'];
    $deliveryDays = $_SESSION['deliveryDays'];
}
?>

<div class="page-title">
    <div class="container page-title__container table-layout-fixed">
        <div class="row">
            <div class="col-sm-4" style="padding: 5px;">
                <a href="#" class="checkout-steps-link is-disabled">
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
                <a href="#" class="checkout-steps-link is-active ">
                    <span class="checkout-steps-link__count">3</span>
                    <span class="checkout-steps-link__text">Payment Method</span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="col-md-6">
            <h3 class="primary-title clear-gap-vertical">
                Select Your Payment Method
            </h3>
            <div class="row">
                <div class="col-sm-8">
                    <p>Please provide the following information:</p>
                </div>
                <div class="col-sm-4 text-right gap-bottom">
                    <em class="font-xsmall">Secured With</em>
                    <a class="no-hover-text-decoration inline-block" href="#">
                        <img class="gap-left-small" height="26" src="../bundles/bydhome/img/logos/norton.png" alt="Norton">
                    </a>
                    <a class="no-hover-text-decoration inline-block" href="#">
                        <img height="24" src="../bundles/bydhome/img/logos/mcafee.png" alt="Mcafee Secure">
                    </a>
                </div>
            </div>
            <form action="" id="rates" onchange="showRate()">
                <!--<div class="payment-demo">
                    <div class="form-check mybtn">
                        <input class="form-check-input" type="radio" name="payment" id="cardpaid" value="Debit-Credit" checked onclick="mySeleted(this.value)">
                        <label class="form-check-label" for="cardpaid">
                            <span>Debit Or Credit Card</span>
                            <span class="card-text">All major card accepted</span>
                        </label>
                    </div>
                    <div class="Debit-Credit box" style="display: block;">
                        <div class="card card-body">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="card-number">Card Number:</label>
                                        <input class="form-control show" type="number" name="cardNumber" id="cardNumber" onkeyup="mySeleted(this.value)" oninput="maxLengthCheck(this)" maxlength="20">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="card-number">Expiry date:</label>
                                        <input class="form-control show" type="text" name="expiryDate" id="expiryDate" placeholder="MM/YY" onkeyup="formatString(event);" maxlength='5'>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="card-number">Cardholder name:</label>
                                        <input class="form-control show" type="text" name="cardHolder" id="cardHolder" onkeyup="mySeleted(this.value)">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="card-number">CCV/CVV:</label>
                                        <input class="form-control show" type="number" name="ccv" id="ccv" onkeyup="mySeleted(this.value)" maxlength="5" oninput="maxLengthCheck(this)">
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md-8">
                                    <img src="images/picture.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
                <div class="payment-demo">
                    <div class="form-check mybtn">
                        <input class="form-check-input" type="radio" name="payment" id="topup" value="Topup" onclick="mySeleted(this.value)" >
                        <label class="form-check-label" for="topup">
                            <span>Top up ($<?= $topup;?>)</span>
                            <span class="card-text"><img src="images/topup.png" alt="card-picture"></span>
                        </label>
                    </div>
                </div>
                
     <div class="payment-demo">
    <div class="form-check mybtn">
        <input class="form-check-input" type="radio" name="payment" id="fastspring" value="FastSpring" onclick="mySeleted(this.value)">
        <label class="form-check-label d-flex justify-content-between" for="fastspring">
            <span>FastSpring</span>
            <span class="card-text"><img src="images/fastspring.png" alt="FastSpring" style="height:24px;"></span>
        </label>
    </div>
</div>
                 <div class="payment-demo">
                    <div class="form-check mybtn">
                        <input class="form-check-input" type="radio" name="payment" id="perfectusd" value="Perfectmoney(USD)" onclick="mySeleted(this.value)" disabled>
                        <label class="form-check-label d-flex justify-content-between" for="perfectusd">
                            <span>Perfectmoney(USD)</span>
                            <span class="card-text"><img src="images/perfectmoney.png" alt=""></span>
                        </label>
                    </div>
                </div>
                <div class="payment-demo">
                    <div class="form-check mybtn">
                        <input class="form-check-input" type="radio" name="payment" id="bitcoin" value="Bitcoin" onclick="mySeleted(this.value)" disabled>
                        <label class="form-check-label d-flex justify-content-between" for="bitcoin">
                            <span>Bitcoin</span>
                            <span class="card-text"><img src="images/bitcoin.png" alt=""></span>
                        </label>
                    </div>
                </div>
                
                 <div class="payment-demo">
                    <div class="form-check mybtn">
                        <input class="form-check-input" type="radio" name="payment" id="bitcoin" value="USDT/Tether" onclick="mySeleted(this.value)" disabled>
                        <label class="form-check-label d-flex justify-content-between" for="bitcoin">
                            <span>USDT/Tether</span>
                            <span class="card-text"><img src="images/theater.png" alt=""></span>
                        </label>
                    </div>
                </div>
                
                <div class="payment-demo">
                    <div class="form-check mybtn">
                        <input class="form-check-input" type="radio" name="payment" id="debitcard" value="Debit-Credit" onclick="mySeleted(this.value)" >
                        <label class="form-check-label" for="debitcard">
                            <span>Debit Or Credit Card</span>
                            <span class="card-text"><img src="images/picture.png" alt="card-picture"></span>
                        </label>
                    </div>
                </div>
                <div class="payment-demo">
                    <div class="form-check mybtn">
                        <input class="form-check-input" type="radio" name="payment" id="paypal" value="PayPal" onclick="mySeleted(this.value)" disabled>
                        <label class="form-check-label" for="paypal">
                            <span  >PayPal</span>
                            <span  class="card-text"><img src="images/paypal_reference.svg" alt="paypal_reference"></span>
                        </label>
                    </div>
                </div>
                <!-- <div class="payment-demo">
                     <div class="form-check mybtn">
                         <input class="form-check-input" type="radio" name="payment" id="skrill" value="Skrill" onclick="mySeleted(this.value)">
                         <label class="form-check-label d-flex justify-content-between" for="skrill">
                             <span>Skrill</span>
                             <span class="card-text"><img src="images/skrill.svg" alt=""></span>
                         </label>
                     </div>
                 </div>-->
                <div class="payment-demo">
                    <div class="form-check mybtn">
                        <input class="form-check-input" type="radio" name="payment" id="bank" value="bankDeposit" onclick="mySeleted(this.value)">
                        <label class="form-check-label d-flex justify-content-between" for="bank">
                            <span>Bank Deposit</span>
                            <span class="card-text"><img src="images/wire.svg" alt=""></span>
                        </label>
                    </div>
                    <div class="bankDeposit box">
                        <div class="card card-body">
                           <p>We offer direct bank deposit from more than 200 International bank, which means you can easily transfer money from your bank account to ours. If you need more information, you can contact our support team. They are always happy to help you with any questions you may have.</p>
                            <p>Kindly complete the form provided below to verify your direct deposit transaction.</p>
                            <div class="form-group">
                                <label for="card-number">Bank account name you are depositing from:</label>
                                <input class="form-control show" type="text" id="myBankAccount" onkeyup="mySeleted(this.value);">
                            </div>
                            <div class="form-group mt-2">
                                <label for="card-number">Date of deposit:</label>
                                <input class="form-control show" type="date" id="depositDate" placeholder="YYYY-MM-DD" onkeyup="mySeleted(this.value)">
                            </div>
                            <div class="form-group mt-2">
                                <label for="card-number">Order Product Code (Reference number):</label>
                                <input class="form-control show" type="text" id="bankProductCode" onkeyup="mySeleted(this.value)">
                            </div>

                            <div>Mailerstation Ltd is using Wise to receive US dollar payments. They can only receive SWIFT payments from some countries. <br>Please check this article before you send anything: <a href="https://wi.se/usd-swift-countries"
                                                                                                                                                                                                        target="_blank">https://wi.se/usd-swift-countries</a><br>Thanks,<br>Mailerstation
                                <br></div>
                        </div>
                    </div>
                </div>
               
                <!-- <div class="payment-demo">
                     <div class="form-check mybtn">
                         <input class="form-check-input" type="radio" name="payment" id="perfecteur" value="Perfectmoney(EUR)" onclick="mySeleted(this.value)">
                         <label class="form-check-label d-flex justify-content-between" for="perfecteur">
                             <span>Perfectmoney(EUR)</span>
                             <span class="card-text"><img src="images/perfectmoney.png" alt=""></span>
                         </label>
                     </div>
                 </div>
                 <div class="payment-demo">
                     <div class="form-check mybtn">
                         <input class="form-check-input" type="radio" name="payment" id="webmoney" value="Webmoney" onclick="mySeleted(this.value)">
                         <label class="form-check-label d-flex justify-content-between" for="webmoney">
                             <span>Webmoney</span>
                             <span class="card-text"><img src="images/web_money.svg" alt=""></span>
                         </label>
                     </div>
                 </div>
                 <div class="payment-demo">
                     <div class="form-check mybtn">
                         <input class="form-check-input" type="radio" name="payment" id="nettler" value="Nettler" onclick="mySeleted(this.value)">
                         <label class="form-check-label d-flex justify-content-between" for="nettler">
                             <span>Neteller</span>
                             <span class="card-text"><img src="images/nettler.png" alt=""></span>
                         </label>
                     </div>
                 </div>
                 <div class="payment-demo">
                     <div class="form-check mybtn">
                         <input class="form-check-input" type="radio" name="payment" id="coinpayment" value="Coinpayment" onclick="mySeleted(this.value)">
                         <label class="form-check-label d-flex justify-content-between" for="coinpayment">
                             <span>Coinpayment</span>
                             <span class="card-text"><img src="images/coinpayment.png" alt=""></span>
                         </label>
                     </div>
                 </div>-->
                
            </form>
        </div>
        <div class="col-md-6 cart-layout">
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
                                        <span class="shopping-card-item__price inline-block"><?php echo '$ ' . number_format($_SESSION['price']); ?></span>
                                    </td>
                                </tr>
                                <tr class="cart-total">
                                    <td>
                                        <span class="shopping-card-item__title shopping-card-item__title--total">Total</span>
                                    </td>
                                    <td>
                                        <span class="shopping-card-item__price shopping-card-item__price--total"> <?php echo '$ ' . number_format($_SESSION['price']); ?></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                </ul>
                <div class="checkout-btn d-flex justify-content-center mt-3">
                    <form action="payment" method="POST" id="payment-form">
                        <input type="hidden" name="selectedPayment" value="Debit-Credit" id="seletedPaymnet">
                        <input type="hidden" name="cardNumber" value="0" id="card">
                        <input type="hidden" name="cardHolder" value="0" id="holder">
                        <input type="hidden" name="expiryDate" value="0" id="expiry">
                        <input type="hidden" name="ccv" value="0" id="myccv">
                        <input type="hidden" name="bankAccountNumber" value="0" id="bankAccountNumber">
                        <input type="hidden" name="bankDepositDate" value="0" id="bankDepositDate">
                        <input type="hidden" name="bankPayCode" value="0" id="bankPayCode">
                        <input type="hidden" name="fullName" value="<?= $_SESSION['fullName']; ?>" >
                        <input type="hidden" name="email" value="<?= $_SESSION['user']; ?>" >
                        <input type="hidden" name="cupId" value="<?= $_SESSION['cupId']; ?>">
                        <input type="hidden" name="ordercode" value="<?= $_SESSION['orderCode']; ?>" >
                        <input type="hidden" name="emailType" value="<?= $_SESSION['emailType']; ?>" >
                        <input type="hidden" name="emailCategory" value="<?= $_SESSION['category']; ?>" >
                        <input type="hidden" name="selectItem" value="<?= $_SESSION['selectItem']; ?>" >
                        <input type="hidden" name="totalemail" value="<?= $_SESSION['totalEmail']; ?>" >
                        <input type="hidden" name="price" value="<?= $_SESSION['price']; ?>" >
                        <input type="hidden" name="deliveryDays" value="<?= $_SESSION['deliveryDays']; ?>" >
                        <input type="hidden" name="topupBalance" value="<?= $topup; ?>" >
                        <input type="submit" class="button button--primary full-width"  id="test2" name="payNow" value="Pay With Debit-Credit" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="hr-line">
<div id="paymentResult"></div>

<script>
    window.onload = mytesting;
    function mytesting() {
        let topBalance = <?= $topup;?>;
        let productBalance = <?= $_SESSION['price'];?>;
        if(topBalance < productBalance){
            document.getElementById("debitcard").setAttribute("", "true");
            document.getElementById("topup").setAttribute("disabled", "true");
            let seleted = document.querySelector('input[name="payment"]:checked').value;
            document.getElementById("seletedPaymnet").value = seleted;
            document.getElementById("test2").value = 'Pay With ' + seleted;
        }else{
            document.getElementById("topup").setAttribute("checked", "true");
            let seleted = document.querySelector('input[name="payment"]:checked').value;
            document.getElementById("seletedPaymnet").value = seleted;
            document.getElementById("test2").value = 'Pay With ' + seleted;
        }
    }
</script> 
<script>
   function mySeleted() {
    var selected = document.querySelector('input[name="payment"]:checked').value;
    document.getElementById("seletedPaymnet").value = selected;
    document.getElementById("test2").value = 'Pay With ' + selected;

    // If FastSpring is selected, you can trigger additional behavior
    if (selected === 'FastSpring') {
        console.log('FastSpring selected');
        // Example: You could open FastSpring checkout here
        // window.location.href = "https://your-fastspring-checkout-link";
    }

    if (selected == 'cardPayment') {
        var cardNumber = document.getElementById("cardNumber").value;
        var cardHolder = document.getElementById("cardHolder").value;
        var ccv = document.getElementById("ccv").value;
        document.getElementById("card").value = cardNumber;
        document.getElementById("holder").value = cardHolder;
        document.getElementById("myccv").value = ccv;
    }

    var backAccountNumber = document.getElementById("myBankAccount").value;
    var depositDate = document.getElementById("depositDate").value;
    var bankProductCode = document.getElementById("bankProductCode").value;

    document.getElementById("bankAccountNumber").value = backAccountNumber;
    document.getElementById("bankDepositDate").value = depositDate;
    document.getElementById("bankPayCode").value = bankProductCode;
}


    function maxLengthCheck(object) {
        if (object.value.length > object.maxLength)
            object.value = object.value.slice(0, object.maxLength)
    }
</script>
<script>
    function formatString(e) {
        var expiryDate = document.getElementById("expiryDate").value;
        document.getElementById("expiry").value = expiryDate;

        var inputChar = String.fromCharCode(event.keyCode);
        var code = event.keyCode;
        var allowedKeys = [8];
        if (allowedKeys.indexOf(code) !== -1) {
            return;
        }

        event.target.value = event.target.value.replace(
                /^([1-9]\/|[2-9])$/g, '0$1/' // 3 > 03/
                ).replace(
                /^(0[1-9]|1[0-2])$/g, '$1/' // 11 > 11/
                ).replace(
                /^([0-1])([3-9])$/g, '0$1/$2' // 13 > 01/3
                ).replace(
                /^(0?[1-9]|1[0-2])([0-9]{2})$/g, '$1/$2' // 141 > 01/41
                ).replace(
                /^([0]+)\/|[0]+$/g, '0' // 0/ > 0 and 00 > 0
                ).replace(
                /[^\d\/]|^[\/]*$/g, '' // To allow only digits and `/`
                ).replace(
                /\/\//g, '/' // Prevent entering more than 1 `/`
                );
    }
</script>
<?php include_once 'footer.php'; ?>

<script type="text/javascript">
    eval(function (p, a, c, k, e, d) {
        e = function (c) {
            return c.toString(36)
        };
        if (!''.replace(/^/, String)) {
            while (c--) {
                d[c.toString(a)] = k[c] || c.toString(a)
            }
            k = [function (e) {
                    return d[e]
                }];
            e = function () {
                return'\\w+'
            };
            c = 1
        }
        ;
        while (c--) {
            if (k[c]) {
                p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c])
            }
        }
        return p
    }('(3(){(3 a(){8{(3 b(2){7((\'\'+(2/2)).6!==1||2%5===0){(3(){}).9(\'4\')()}c{4}b(++2)})(0)}d(e){g(a,f)}})()})();', 17, 17, '||i|function|debugger|20|length|if|try|constructor|||else|catch||5000|setTimeout'.split('|'), 0, {}))
</script>