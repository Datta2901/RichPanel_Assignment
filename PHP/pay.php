
<?php
require "config.php";
Session_start();
// Create the Razorpay Order

use Razorpay\Api\Api;

$productID = $_GET['id'];

$api = new Api($keyId, $keySecret);


//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [

    'amount'          => $products[$productID]["price"] * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];
$_SESSION['plan'] = $orderData['amount'];



$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$checkout = 'automatic';

if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
{
    $checkout = $_GET['checkout'];
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => $products[$productID]['title'],
    "description"       => "Plan Details",
    "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
    // "prefill"           => [
    // "name"              => "Daft Punk",
    // "email"             => "customer@merchant.com",
    // "contact"           => "9999999999",
    // ],
    "notes"             => [
    "address"           => "",
    "merchant_order_id" => "",
    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);

// require("checkout/{$checkout}.php");
require("checkout/manual.php");
