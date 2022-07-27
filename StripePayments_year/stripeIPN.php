<?php
	require_once "config.php";

	\Stripe\Stripe::setVerifySslCerts(false);
	echo '<script>Success! You have been charged ₹ . ($products[$productID]["price"]).</script>';
	// Token is created using Checkout or Elements!
	// Get the payment token ID submitted by the form:
	$productID = $_GET['id'];

	if (!isset($_POST['stripeToken']) || !isset($products[$productID])) {
		header("Location: pricing.php");
		exit();
	}

	$token = $_POST['stripeToken'];
	$email = $_POST["stripeEmail"];

	// Charge the user's card:
	$charge = \Stripe\Charge::create(array(
		"amount" => $products[$productID]["price"],
		"currency" => "inr",
		"description" => $products[$productID]["title"],
		"source" => $token,
	));

	//send an email
	//store information to the database
	echo '<script>Success! You have been charged ₹ . ($products[$productID]["price"]).</script>';
	// echo 'Success! You have been charged ₹' . ($products[$productID]["price"]);
?>