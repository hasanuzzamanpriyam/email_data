<?php
$keysDir = __DIR__ . "/keys";
if (!is_dir($keysDir)) mkdir($keysDir, 0777, true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uniqueName = time();

    // Generate new private + public key pair
    $config = [
        "private_key_bits" => 2048,
        "private_key_type" => OPENSSL_KEYTYPE_RSA,
    ];
    $res = openssl_pkey_new($config);

    // Extract private key
    openssl_pkey_export($res, $privateKey);

    // Extract public key (self-signed cert)
    $csr = openssl_csr_new([], $res);
    $x509 = openssl_csr_sign($csr, null, $res, 3650);
    openssl_x509_export($x509, $publicCert);

    // Save keys
    $privateKeyFile = "privatekey-$uniqueName.pem";
    $publicKeyFile  = "publiccert-$uniqueName.pem";
    file_put_contents("$keysDir/$privateKeyFile", $privateKey);
    file_put_contents("$keysDir/$publicKeyFile", $publicCert);

    // Build proper URLs (no double slashes)
    $baseUrl = rtrim((isset($_SERVER['HTTPS']) ? "https" : "http") . "://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']), "/");
    $privateKeyUrl = $baseUrl . "/keys/" . $privateKeyFile;
    $publicKeyUrl  = $baseUrl . "/keys/" . $publicKeyFile;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Generate FastSpring Key Pair</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 30px; }
        button { padding: 10px 20px; background: #007bff; color: #fff; border: none; cursor: pointer; }
        button:hover { background: #0056b3; }
        .result { margin-top: 20px; padding: 15px; background: #fff; border-radius: 8px; }
    </style>
</head>
<body>
<h2>Generate New Public & Private Key</h2>
<form method="POST">
    <button type="submit">Generate New Key Pair</button>
</form>

<?php if (!empty($privateKeyUrl)): ?>
    <div class="result">
        <p><strong>Private Key URL (keep secure):</strong><br>
            <a href="<?= $privateKeyUrl ?>" target="_blank"><?= $privateKeyUrl ?></a></p>
        <p><strong>Download Public Key (Upload to FastSpring):</strong><br>
            <a href="<?= $publicKeyUrl ?>" download>Download Public Key</a></p>
    </div>
<?php endif; ?>
</body>
</html>