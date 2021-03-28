<?php

require 'vendor/autoload.php';

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost/SussexCompanions';
$amt = intval($_GET['amt']);
$checkout_session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'price_data' => [
      'currency' => 'GBP',
      'unit_amount' => $amt,
      'product_data' => [
        'name' => 'Your total due',
        'images' => ["https://i.imgur.com/EIPwDZY.jpg"],
      ],
    ],
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.php',
  'cancel_url' => $YOUR_DOMAIN . '/payment.php',
]);

echo json_encode(['id' => $checkout_session->id]);