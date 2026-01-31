<?php

require_once 'stripe_config.php';
$siteUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . '/emailbigdata.com/';
header('Content-Type: application/json');

if (isset($_POST['payment_amount'])) {
  $order_code = $_POST['orderID'];
  $product_name = $_POST['product_name'];
  $payment_amount = $_POST['payment_amount'];
  $user_email = $_POST['user_email'];
  $description = $_POST['stripe_description'];

  $checkout_session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
      'price_data' => [
        'currency' => 'usd',
        'product_data' => [
          'name' => $product_name,
          'description' => $description
        ],
        'unit_amount' => $payment_amount,
      ],
      'quantity' => 1,
    ]],
    'customer_email' => $user_email,
    'mode' => 'payment',
    'allow_promotion_codes' => true,
    'success_url' => $siteUrl . 'success',
    'cancel_url' => $siteUrl . 'cancel',
  ]);

  // echo '<pre>';
  // print_r($checkout_session);

  header("HTTP/1.1 303 See Other");
  header("Location: " . $checkout_session->url);
}
