<?php
/*
* PHP Kit for Icici Merchant Solutions
* Version: 1.0.5
*/

/*Enter LIVE kit parameters */
define('ENC_KEY', '811335F9BDD7F90F4292BAAE7FF00346'); 
define('SECURE_SECRET', '71F88EB1FD3EA64F2C4C1E82CDE339D4'); 
define('VERSION', '1'); 
define('PASSCODE', 'AKHQ5972'); //Must be 8 digit only. No special characters allowed
define('MERCHANTID', '100000000175447'); //This is not being used in kit but for your reference in case of use it as global
define('TERMINALID', 'EG004231'); //This is not being used in kit but for your reference in case of use it as global
define('BANKID', '24520'); //Must be 6 digit only. No special characters allowed
define('MCC', '7392'); //Must be 4 digit only. No special characters allowed
define('GATEWAYURL', 'https://paypg.icicibank.com/accesspoint/angularBackEnd/requestproxypass'); 
define('REFUNDURL', 'https://paypg.icicibank.com/accesspoint/v1/24520/createRefundFromMerchantKit'); 
define('STATUSURL', 'https://paypg.icicibank.com/accesspoint/v1/24520/checkStatusMerchantKit');
// define('RETURNURL', 'http://localhost/code_php/_public_html/pay/responseSale.php'); // define('RETURNURL', 'YOUR_DOMAIN/ICICI_MS/responseSale.
define('RETURNURL', 'https://doctcareservices.com/pay/responseSale.php'); // define('RETURNURL', 'YOUR_DOMAIN/ICICI_MS/responseSale.
// Return url's length must not be more then 500 character
?>