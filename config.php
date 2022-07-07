<?php

if(true)
{
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'uncle_jerry');
	$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
}
else
{
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'frizkoys_unclej');
	define('DB_PASSWORD', 'T3^tHo2R,Q4c');
	define('DB_DATABASE', 'frizkoys_unclejerry');
	$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
}

define('BASE_URL', "http://" . $_SERVER['SERVER_NAME']);
// define('BASE_DIR', "/uncle-jerry");
// define('BASE_URL', SERVER.BASE_DIR);

define('PAYPAL_URL', 'https://www.sandbox.paypal.com/cgi-bin/webscr');
define('PAYPAL_BUSINESS_ID', 'saad.nuces-facilitator@gmail.com');
define('PAYPAL_CANCEL_URL', BASE_URL.'/checkout.php');
define('PAYPAL_NOTIFY_URL', BASE_URL.'/success.php');
define('PAYPAL_SUCCESS_URL', BASE_URL);

?>