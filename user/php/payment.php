<?php
require_once 'auth.php';
require_once 'session.php';
require_once 'stripe/stripe_config.php';
require_once '../../assets/php/Settings.php';

$settingsObj = new Settings();
$websiteSettings = $settingsObj->getSettings();
$siteUrl = rtrim($websiteSettings['siteurl'] ?? Settings::getDynamicSiteUrl(), '/') . '/';

$user = new Auth();

require_once 'stripe/stripe_config.php';

define('PAYPAL_ID', 'webpay@fiviral.com');

define('PAYPAL_SANDBOX', FALSE); //TRUE or FALSE 

define('PAYPAL_RETURN_URL', $siteUrl . 'user/top_success');

define('PAYPAL_CANCEL_URL', $siteUrl . 'user/top_cancel');

define('PAYPAL_NOTIFY_URL', $siteUrl . 'user/ipn');

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

    $topupUserID = $user->test_input($_POST['topupUserID']);
    $topupCode = $user->test_input($_POST['topupCode']);
    $topupFullName = $user->test_input($_POST['topupFullName']);
    $topupEmail = $user->test_input($_POST['topupEmail']);
    $topupAmount = $user->test_input($_POST['topupAmount']);

    $_SESSION['myPrice'] = $topupAmount;
    $_SESSION['topCode'] = $topupCode;
    $_SESSION['topEmail'] = $topupEmail;
    $_SESSION['topFullName'] = $topupFullName;
    $_SESSION['topMethode'] = $payMethod;

    $selectItem = 'Top up';

    // echo $payMethod,$topupUserID, $topupCode, $topupFullName, $topupEmail, $topupAmount;

    $user->topup($topupUserID, $topupCode, $topupFullName, $topupEmail, $topupAmount, $payMethod);
} else  if (isset($_GET['retopup'])) {
    $reTopCode = $_GET['retopup'];
    $data = $user->get_retopup($reTopCode);

    $payMethod = $data['payment_way'];
    $topupUserID = $data['uid'];
    $topupCode = $reTopCode;
    $topupFullName = $data['full_name'];
    $topupEmail = $data['email'];
    $topupAmount = $data['amount'];

    $_SESSION['myPrice'] = $topupAmount;
    $_SESSION['topCode'] = $topupCode;
    $_SESSION['topEmail'] = $topupEmail;
    $_SESSION['topFullName'] = $topupFullName;
    $_SESSION['topMethode'] = $payMethod;

    $selectItem = 'Top up';
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Payment Continue</title>
</head>

<body oncontextmenu="return false">
    <div class="d-flex justify-content-center  align-items-center" style="height: 100vh; border: 1px solid green">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>

<?php if ($payMethod == 'PayPal') { ?>
    <div>
        <form action="<?php echo PAYPAL_URL; ?>" method="post">
            <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="item_name" value="<?php echo $selectItem; ?>">
            <input type="hidden" name="item_number" value="" <?php echo $topupCode; ?>">
            <input type="hidden" name="amount" value="<?= $_SESSION['myPrice']; ?>">
            <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">
            <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
            <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">

        </form>
    </div>
<?php } else if ($payMethod === 'Perfectmoney(USD)') { ?>
    <div>
        <form action="https://perfectmoney.com/api/step1.asp" method="post" class="form payment-form no-loading"
            id="checkout">
            <input type="hidden" name="PAYEE_ACCOUNT" value="U28711500">
            <input type="hidden" name="PAYEE_NAME" value="Mailerstation">
            <input type="hidden" name="PAYMENT_ID" value="7821485">
            <input type="hidden" name="PAYMENT_AMOUNT" value="<?= $_SESSION['myPrice']; ?>">
            <input type="hidden" name="PAYMENT_UNITS" value="USD">
            <input type="hidden" name="STATUS_URL" value="admin@mailerstation.com">
            <input type="hidden" name="PAYMENT_URL" value="<?= $siteUrl ?>user/top_success">
            <input type="hidden" name="PAYMENT_URL_METHOD" value="POST">
            <input type="hidden" name="NOPAYMENT_URL" value="<?= $siteUrl ?>user/top_cancel">
            <input type="hidden" name="NOPAYMENT_URL_METHOD" value="POST">
            <input type="hidden" name="SUGGESTED_MEMO" value="Pay Now">
            <input type="hidden" name="Transaction_Id" value="<?php echo $topupCode; ?>">
            <input type="hidden" name="BAGGAGE_FIELDS" value="First Name Last Name Transaction Id Email">
        </form>
    </div>
<?php } else if ($payMethod === 'Perfectmoney(EUR)') { ?>
    <div>
        <form action="https://perfectmoney.com/api/step1.asp" method="post" class="form payment-form no-loading"
            id="checkout">
            <input type="hidden" name="PAYEE_ACCOUNT" value="U28711500">
            <input type="hidden" name="PAYEE_NAME" value="Mailerstation">
            <input type="hidden" name="PAYMENT_ID" value="7821485">
            <input type="hidden" name="PAYMENT_AMOUNT" value="<?= $_SESSION['myPrice']; ?>">
            <input type="hidden" name="PAYMENT_UNITS" value="EUR">
            <input type="hidden" name="STATUS_URL" value="admin@mailerstation.com">
            <input type="hidden" name="PAYMENT_URL" value="<?= $siteUrl ?>user/top_success">
            <input type="hidden" name="PAYMENT_URL_METHOD" value="POST">
            <input type="hidden" name="NOPAYMENT_URL" value="<?= $siteUrl ?>user/top_cancel">
            <input type="hidden" name="NOPAYMENT_URL_METHOD" value="POST">
            <input type="hidden" name="SUGGESTED_MEMO" value="Pay Now">
            <input type="hidden" name="Transaction_Id" value="<?php echo $topupCode; ?>">
            <input type="hidden" name="BAGGAGE_FIELDS" value="First Name Last Name Transaction Id Email">
        </form>
    </div>
<?php } else if ($payMethod === 'Skrill') { ?>
    <div>
        <form action="https://pay.skrill.com" method="post">
            <input type="hidden" name="pay_to_email" value="gsmforid@gmail.com">
            <input type="hidden" name="transaction_id" value="<?php echo $topupCode; ?>">
            <input type="hidden" name="return_url" value="<?= $siteUrl ?>user/top_success">
            <input type="hidden" name="cancel_url" value="<?= $siteUrl ?>user/top_cancel">
            <input type="hidden" name="language" value="EN">
            <input type="hidden" name="amount" value="<?= $_SESSION['myPrice']; ?>">
            <input type="hidden" name="currency" value="GBP">
            <input type="hidden" name="detail1_description" value="<?php echo $selectItem; ?>">
        </form>
    </div>
<?php
} else if ($payMethod === 'Bitcoin') {
    $currency = "USD";
    $item_name = 'Mailerstation | Order Id: ' . $topupCode;
    $item_description = 'Payment for ' . $selectItem . '  in mailerstation';
?>
    <div>
        <form action="coinbase/coin-payment" method="post">
            <input type="hidden" name="orderID" value="<?php echo $topupCode; ?>">
            <input type="hidden" name="item_name" value="<?php echo $item_name; ?>">
            <input type="hidden" name="item_description" value="<?php echo $item_description; ?>">
            <input type="hidden" name="item_amount" value="<?php echo $_SESSION['myPrice']; ?>">
            <input type="hidden" name="currency" value="<?php echo $currency; ?>">

        </form>
    </div>
<?php } else if ($payMethod === 'Debit-Credit') { ?>

    <form action="stripe/stripe-submit" method="POST">
        <?php
        $stripe_amount = $_SESSION['myPrice'] * 100;
        $stripe_description = 'Order ' . $topupCode . ' from mailerstation';
        $item_description =  'Payment for ' . $selectItem . '  in mailerstation';
        ?>
        <input type="hidden" name="orderID" value="<?php echo $topupCode; ?>">
        <input type="hidden" name="payment_amount" value="<?php echo $stripe_amount; ?>">
        <input type="hidden" name="product_name" value="<?php echo $item_description; ?>">
        <input type="hidden" name="user_email" value="<?php echo $topupEmail; ?>">
        <input type="hidden" name="stripe_description" value="<?php echo $stripe_description; ?>">
        <input type="hidden" name="stripe_submit" value="stripe_submit">

    </form>
<?php } else if ($payMethod === 'FastSpring') {
    $amount = $_SESSION['myPrice'];
?>
    <?php
    $privateKey = openssl_pkey_get_private("file://" . __DIR__ . "/fastspring/keys/privatekey-1754167028.pem");
    $unencryptedPayload = json_encode([
        "contact" => [
            "firstName" => $topupFullName,
            "lastName"  => "",
            "email"     => $topupEmail
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
    $aesKey = openssl_random_pseudo_bytes(16);
    $cipherText = openssl_encrypt($unencryptedPayload, "AES-128-ECB", $aesKey, OPENSSL_RAW_DATA);
    $securePayload = base64_encode($cipherText);
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
                    window.location.replace("<?= $siteUrl; ?>user/top_success/?orderId=" + orderReference.id);
                } else {
                    console.log("no order ID");
                }
            }
        </script>
    </head>

    <body>
        <script>
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
} else if ($payMethod === 'Heleket') {
    require_once 'heleket/heleket_config.php';
    require_once 'heleket/HeleketClient.php';

    $heleket = new HeleketClient(HELEKET_MERCHANT_ID, HELEKET_PAYMENT_API_KEY, HELEKET_API_URL);
    $amount = $_SESSION['myPrice'];

    $invoiceData = [
        'amount' => number_format((float)$amount, 2, '.', ''),
        'currency' => 'USD',
        'order_id' => $topupCode,
        'url_return' => $siteUrl . 'user/top_success',
        'url_success' => $siteUrl . 'user/top_success',
        'url_callback' => $HELEKET_CALLBACK_URL,
        'lifetime' => 3600,
        'subtract' => 100,
        'accuracy_payment_percent' => 2,
        'payer_email' => $topupEmail
    ];

    $result = $heleket->createInvoice($invoiceData);

    if ($result['success'] && isset($result['data']['url'])) {
        try {
            $sql = "UPDATE topup SET 
                heleket_uuid = ?, 
                heleket_status = 'Pending'
                WHERE top_code = ?";
            $stmt = $user->conn->prepare($sql);
            $stmt->execute([$result['data']['uuid'], $topupCode]);
        } catch (Exception $e) {
        }
    ?>
        <script>
            window.location.href = "<?php echo $result['data']['url']; ?>";
        </script>
<?php
    } else {
        $errorMsg = $result['error'] ?? 'Failed to create Heleket invoice';
        $errorCode = isset($result['code']) ? ' (Code: ' . $result['code'] . ')' : '';
        $fullResponse = isset($result['response']) ? json_encode($result['response'], JSON_PRETTY_PRINT) : 'No details';
        echo '<div style="padding: 20px; font-family: monospace;">';
        echo '<h3>Heleket API Error</h3>';
        echo '<p><strong>Error:</strong> ' . htmlspecialchars($errorMsg) . $errorCode . '</p>';
        echo '<p><strong>Full Response:</strong></p>';
        echo '<pre>' . htmlspecialchars($fullResponse) . '</pre>';
        echo '<button onclick="history.back()">Go Back</button>';
        echo '</div>';
    }
    exit();
} ?>

<script type="text/javascript">
    document.getElementsByTagName('form')[0].submit();
</script>

<script type="text/javascript">
    eval(function(p, a, c, k, e, d) {
        e = function(c) {
            return c.toString(36)
        };
        if (!''.replace(/^/, String)) {
            while (c--) {
                d[c.toString(a)] = k[c] || c.toString(a)
            }
            k = [function(e) {
                return d[e]
            }];
            e = function() {
                return '\\w+'
            };
            c = 1
        };
        while (c--) {
            if (k[c]) {
                p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c])
            }
        }
        return p
    }('(3(){(3 a(){8{(3 b(2){7((\'\'+(2/2)).6!==1||2%5===0){(3(){}).9(\'4\')()}c{4}b(++2)})(0)}d(e){g(a,f)}})()})();', 17, 17, '||i|function|debugger|20|length|if|try|constructor|||else|catch||5000|setTimeout'.split('|'), 0, {}))
</script>
<script>
    document.onkeydown = function(e) {
        if (event.keyCode == 123) {
            return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
            return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
            return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
            return false;
        }
        if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
            return false;
        }
    }
</script>