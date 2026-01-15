<?php
require_once __DIR__ . "/vendor/autoload.php";

use CoinbaseCommerce\ApiClient;
use CoinbaseCommerce\Resources\Charge;

ApiClient::init("14e0ef49-23f9-4a2e-b48c-84f6bc060b68");

if (isset($_POST['item_amount'])) {
    $order_code = $_POST['orderID'];
    $name = $_POST['item_name'];
    $description = $_POST['item_description'];
    $amount = $_POST['item_amount'];
    $currency = $_POST['currency'];

    $chargeData = [
        'name' => $name,
        'description' => $description,
        'local_price' => [
            'amount' => $amount,
            'currency' => $currency
        ],
        'pricing_type' => 'fixed_price',
        'redirect_url' => 'http://localhost/emailbigdata.com/success',
        'cancel_url'  => 'http://localhost/emailbigdata.com/cancel'
    ];

    try {
        $charge = Charge::create($chargeData);
        header("Location:$charge->hosted_url");
    } catch (\Exception $exception) {
        echo sprintf("Enable to update name of checkout. Error: %s \n", $exception->getMessage());
    }
}
