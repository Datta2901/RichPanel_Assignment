<?php

require('config.php');

session_start();

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{

    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
             $host = "localhost";
             $user = "root";
             $password = "";
             $db = "richpanel_assignment";
             $conn = mysqli_connect($host,$user,$password,$db);
             if(!$conn){
                 echo "<img src = './../images/serverError.png' alt = 'This is an image' style = 'margin:50px 300px150px 0px 0px 50px'>";
                 echo "Connection failed : ".mysqli_connect_error();
                 die();
             }

             $email = $_SESSION["email"];
             date_default_timezone_set('Asia/Kolkata');
             $date = date('y-m-d h:i:s');
             echo $date;
             $token = $_SESSION['razorpay_order_id'];
             $amount = $_SESSION['plan'] / 100;
             $paymentId = ($_POST['razorpay_payment_id']);
             echo "Payment id is : {$paymentId}";
             $sql = "INSERT INTO payments(Email,Token,Date,Subscriptions,PaymentId) values('$email','$token','$date','$amount','$paymentId')";
             if(mysqli_query($conn,$sql)){
                echo "Data Stored Succesfully\n";
            }
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;
