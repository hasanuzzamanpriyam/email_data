<?php
session_start();
require_once '../assets/php/auth.php';
require_once '../assets/php/session.php';
require_once 'stripe/stripe_config.php';
$siteUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . '/emailbigdata.com/';
$user = new Auth();

// PayPal settings
define('PAYPAL_ID', 'payment@mskeydeals.com');
define('PAYPAL_SANDBOX', FALSE);
define('PAYPAL_RETURN_URL', $siteUrl . 'success');
define('PAYPAL_CANCEL_URL', $siteUrl . 'cancel');
define('PAYPAL_NOTIFY_URL', $siteUrl . 'ipn');
define('PAYPAL_CURRENCY', 'USD');
define('PAYPAL_URL', (PAYPAL_SANDBOX == true) ? "https://www.sandbox.paypal.com/cgi-bin/webscr" : "https://www.paypal.com/cgi-bin/webscr");

if (isset($_POST['selectedPayment'])) {
    $payMethod = $user->test_input($_POST['selectedPayment']);
    $cardNumber = $user->test_input($_POST['cardNumber']);
    $cardHolder = $user->test_input($_POST['cardHolder']);
    $ccv = $user->test_input($_POST['ccv']);
    $bankAccountNumber = $user->test_input($_POST['bankAccountNumber']);
    $bankDepositDate = $user->test_input($_POST['bankDepositDate']);
    $bankPayCode = $user->test_input($_POST['bankPayCode']);

    $_SESSION['payMethod'] = $payMethod;
    $email = $_SESSION['user'];
    $copId = $_SESSION['cupId'];
    $order_code = $_SESSION['ordercode'];
    $email_type = $_SESSION['emailType'];
    $category = $_SESSION['emailCategory'];
    $selectItem = $_SESSION['selectItem'];
    $total_email = $_SESSION['totalemail'];
    $total_price = $_SESSION['price'];
    $deliveryDays = $_SESSION['deliveryDays'];

    $logged = $user->currentUser($email);
    $uid = $logged['id'];
    $fullName = $logged['first_name'] . ' ' . $logged['last_name'];
    $preTopBalance = $logged['topup'];

    $_SESSION['fullName'] = $fullName;

    if (isset($_SESSION['re-order'])) {
        $user->update_reorder_method($order_code, $payMethod);
    } else {
        if (!empty($copId)) {
            $user->insert_order($uid, $copId, $order_code, $fullName, $email, $email_type, $category, $selectItem, $total_email, $total_price, $deliveryDays, $payMethod);
        } else {
            $copId = 0;
            $user->insert_order($uid, $copId, $order_code, $fullName, $email, $email_type, $category, $selectItem, $total_email, $total_price, $deliveryDays, $payMethod);
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Continue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body oncontextmenu="return false">
    <?php if ($payMethod == 'PayPal') { ?>
        <form action="<?php echo PAYPAL_URL; ?>" method="post">
            <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="item_name" value="<?php echo $_SESSION['selectItem']; ?>">
            <input type="hidden" name="amount" value="<?= $_SESSION['price']; ?>">
            <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">
            <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
            <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">
        </form>

    <?php } else if ($payMethod === 'Perfectmoney(USD)') { ?>
        <form action="https://perfectmoney.com/api/step1.asp" method="post">
            <input type="hidden" name="PAYEE_ACCOUNT" value="U28711500">
            <input type="hidden" name="PAYEE_NAME" value="Email Big Data">
            <input type="hidden" name="PAYMENT_ID" value="<?php echo $_SESSION['ordercode']; ?>">
            <input type="hidden" name="PAYMENT_AMOUNT" value="<?= $_SESSION['price']; ?>">
            <input type="hidden" name="PAYMENT_UNITS" value="USD">
            <input type="hidden" name="STATUS_URL" value="admin@emailbigdata.com">
            <input type="hidden" name="PAYMENT_URL" value="<?= $siteUrl; ?>success">
            <input type="hidden" name="NOPAYMENT_URL" value="<?= $siteUrl; ?>cancel">
        </form>

    <?php } else if ($payMethod === 'Bitcoin') {
        $currency = "USD";
        $item_name = 'Email Big Data | Order Id: ' . $_SESSION['ordercode'];
        $item_description = 'Payment for ' . $_SESSION['selectItem'] . ' ' . number_format($_SESSION['totalemail']) . ' Contacts';
    ?>
        <form action="coinbase/coin-payment" method="post">
            <input type="hidden" name="orderID" value="<?php echo $_SESSION['ordercode']; ?>">
            <input type="hidden" name="item_name" value="<?php echo $item_name; ?>">
            <input type="hidden" name="item_description" value="<?php echo $item_description; ?>">
            <input type="hidden" name="item_amount" value="<?php echo $_SESSION['price']; ?>">
            <input type="hidden" name="currency" value="<?php echo $currency; ?>">
        </form>

    <?php } else if ($payMethod === 'Debit-Credit') {
        $stripe_amount = $_SESSION['price'] * 100;
        $stripe_description = 'Order ' . $_SESSION['ordercode'] . ' from emailbigdata';
        $item_description = 'Payment for ' . $_SESSION['selectItem'] . ' ' . number_format($_SESSION['totalemail']) . ' Contacts';
    ?>
        <form action="stripe/stripe-submit" method="POST">
            <input type="hidden" name="orderID" value="<?php echo $_SESSION['ordercode']; ?>">
            <input type="hidden" name="payment_amount" value="<?php echo $stripe_amount; ?>">
            <input type="hidden" name="product_name" value="<?php echo $item_description; ?>">
            <input type="hidden" name="user_email" value="<?php echo $_SESSION['user']; ?>">
            <input type="hidden" name="stripe_description" value="<?php echo $stripe_description; ?>">
            <input type="hidden" name="stripe_submit" value="stripe_submit">
        </form>

    <?php } else if ($payMethod === 'FastSpring') {
        $orderID = $_SESSION['ordercode'];
        $productName = $_SESSION['selectItem'];
        $amount = $_SESSION['price'];
        $customerEmail = $_SESSION['user'];
    ?>


        <?php
        // Load private key
        $privateKey = openssl_pkey_get_private("file://" . __DIR__ . "/fastspring/keys/privatekey-1754167028.pem");

        // Build dynamic payload
        $unencryptedPayload = json_encode([
            "contact" => [
                "firstName" => "John",
                "lastName"  => "Doe",
                "email"     => "john.doe@example.com"

            ],
            "items" => [
                [
                    "product" => "b2bemail",
                    "quantity" => 1,
                    "pricing" => [
                        "price" => [
                            "USD" => $amount
                        ]
                    ]
                ]
            ],


        ], JSON_UNESCAPED_SLASHES);

        // Generate AES key (16 bytes)
        $aesKey = openssl_random_pseudo_bytes(16);

        // Encrypt payload using AES-128-ECB
        $cipherText = openssl_encrypt($unencryptedPayload, "AES-128-ECB", $aesKey, OPENSSL_RAW_DATA);
        $securePayload = base64_encode($cipherText);

        // Encrypt AES key using private RSA key
        openssl_private_encrypt($aesKey, $aesKeyEncrypted, $privateKey);
        $secureKey = base64_encode($aesKeyEncrypted);
        ?>
        <!DOCTYPE html>
        <html>

        <head>
            <title>FastSpring Secure Checkout</title>

            <style>
                #compliance.flx,
                #compliance .flx {

                    display: none !important;
                }
            </style>
            <script>
                // Prepare session with secure data
                var fscSession = {
                    secure: {
                        payload: "<?php echo $securePayload; ?>",
                        key: "<?php echo $secureKey; ?>"
                    }
                };
            </script>
            <script
                id="fsc-api"
                src="https://sbl.onfastspring.com/sbl/1.0.5/fastspring-builder.min.js"
                type="text/javascript"
                data-popup-closed="onFSPopupClosed"
                data-storefront="prospct.onfastspring.com/popup-emailbigdata"
                data-access-key="U46CRMFZROOYBDPE-XUBUW">
            </script>
            <script>
                function onFSPopupClosed(orderReference) {
                    if (orderReference) {
                        console.log(orderReference.id);
                        fastspring.builder.reset();
                        window.location.replace("<?= $siteUrl; ?>success/?orderId=" + orderReference.id);
                    } else {
                        console.log("no order ID");
                    }
                }
            </script>

        </head>

        <body>

            <script>
                // Call checkout automatically when page loads
                window.onload = function() {
                    fastspring.builder.checkout();
                };
            </script>

            <div style="max-width:380px; margin:0px auto;padding: 40% 20%;">
                <p>FastSpring Secure Checkout</p>
                <button onclick="fastspring.builder.checkout();">Checkout Now</button>

            </div>
        </body>

        </html>

    <?php
        exit();
    } else {
        $productPrice = $_SESSION['price'];
        $remainedBalance = $preTopBalance - $productPrice;
        $user->update_topup_client_balance($uid, $remainedBalance);
        header("Location: " . $siteUrl . "success");
        exit();
    } ?>
    <script type="text/javascript">
        document.getElementsByTagName('form')[0]?.submit();
    </script>
</body>

</html>