<?php
// Database Configuration 
// define('DB_HOST', 'localhost'); 
// define('DB_NAME', 'waggingwheel_v1'); 
// define('DB_USERNAME', 'root'); 
// define('DB_PASSWORD', ''); 

// // PayPal Configuration
// define('PAYPAL_EMAIL', 'sb-djfop15256794@business.example.com'); 
// define('RETURN_URL', 'http://localhost/Pet-Transport-Booking-System/return.php'); 
// define('CANCEL_URL', 'http://localhost/Pet-Transport-Booking-System/cancel.php'); 
// define('NOTIFY_URL', 'http://localhost/Pet-Transport-Booking-System/notify.php'); 
// define('CURRENCY', 'SGD'); 
// define('SANDBOX', TRUE); // TRUE or FALSE 
// define('LOCAL_CERTIFICATE', FALSE); // TRUE or FALSE

// if (SANDBOX === TRUE){
// 	$paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
// }
// else{
// 	$paypal_url = "https://www.paypal.com/cgi-bin/webscr";
// }
// // PayPal IPN Data Validate URL
// define('PAYPAL_URL', $paypal_url);


?>

<?php 
/* 
 * PayPal and database configuration 
 */ 
  
// PayPal configuration 
define('PAYPAL_ID', 'sb-djfop15256794@business.example.com'); 
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE 
 
define('PAYPAL_RETURN_URL', 'http://localhost/Pet-Transport-Booking-System/return.php'); 
define('PAYPAL_CANCEL_URL', 'http://localhost/Pet-Transport-Booking-System/cancel.php'); 
define('PAYPAL_NOTIFY_URL', 'http://localhost/Pet-Transport-Booking-System/ipn.php'); 
define('PAYPAL_CURRENCY', 'SGD'); 
 
// Database configuration 
define('DB_HOST', 'localhost'); 
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', ''); 
define('DB_NAME', 'waggingwheel_v1'); 
 
// Change not required 
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");

?>
