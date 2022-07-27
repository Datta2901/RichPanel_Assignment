<?php
	require_once "stripe-php-master/init.php";
	require_once "products.php";

	$stripeDetails = array(
		"secretKey" => "sk_test_51LPVITSI2n9pZkOe9to5M3IoSVUTu6Jbwe9JnzdVhU5wMwuXFnp67xPnnAVOcMGepkXTkirIyccW8zDRkTKFDPMJ002Zaee8bB",
		"publishableKey" => "pk_test_51LPVITSI2n9pZkOeOk08wWazTvkBhRkz25Jd2BygUa1X9r6UdmUxjPq33OEKDuf060ydHdUeZ0nOorR8fkTuUlZc00IuQ3t4IY"
	);

	// Set your secret key: remember to change this to your live secret key in production
	// See your keys here: https://dashboard.stripe.com/account/apikeys
	\Stripe\Stripe::setApiKey($stripeDetails['secretKey']);
?>
