<?php

// PayPal configuration 
define('PAYPAL_ID', 'Info@mastertech.com'); 
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE  https://www.sandbox.paypal.com/webapps/hermes?token=8GE11848VY135422G&useraction=commit&mfid=1632862176270_e887df7887c67#
 
define('PAYPAL_RETURN_URL', 'http://localhost/MasterTech-Computer-Accessories/Front-End/checkout&cart/paypal_System/success.php'); 
define('PAYPAL_CANCEL_URL', 'http://localhost/MasterTech-Computer-Accessories/Front-End/checkout&cart/paypal_System/CancleOrder.html'); 
define('PAYPAL_NOTIFY_URL', 'http://localhost/MasterTech-Computer-Accessories/Front-End/checkout&cart/paypal_System/ipn.php'); 
define('PAYPAL_CURRENCY', 'USD'); 
 

 
// Change not required 
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");
?>