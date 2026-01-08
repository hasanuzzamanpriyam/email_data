<?php
// Load private key
$privateKey = openssl_pkey_get_private("file://" . __DIR__ . "/keys/privatekey-1754167028.pem");

// Build dynamic payload
$unencryptedPayload = json_encode([
    "contact" => [
        "firstName" => "John",
        "lastName"  => "Doe",
        "email"     => "john.doe@example.com",
        "country"   => "US",
        "zip" => "90012"
    ],
    "items" => [
        [
            "product" => "b2bemail",
            "quantity" => 2,
            "pricing" => [
                "price" => [
                    "USD" => 150.00
                ]
            ]
        ]
    ],
    "paymentMethod" => "paypal",
    "hideOtherPaymentMethods" => false
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
        data-storefront="prospct.onfastspring.com/popup-emailbigdata"
        data-access-key="U46CRMFZROOYBDPE-XUBUW">
    </script>
</head>
<body>
    <h2>FastSpring Secure Checkout</h2>
    <button onclick="fastspring.builder.checkout();">Checkout</button>
</body>
</html>