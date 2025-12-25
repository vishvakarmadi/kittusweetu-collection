<?php
// SMTP Configuration for sending emails
// Note: This PHP config replaces the config.py reference mentioned in the original query
define('SMTP_HOST', 'smtp.gmail.com'); // SMTP server address
define('SMTP_PORT', 587); // SMTP port (587 for TLS, 465 for SSL)
define('SMTP_USERNAME', 'adityav2316672@gmail.com'); // Your email address
define('SMTP_PASSWORD', 'ivxw yfug gnhd pciq'); // Your email password or app password
define('SMTP_SECURE', 'tls'); // Encryption type (tls or ssl)
define('SMTP_FROM_EMAIL', 'adityav2316672@gmail.com'); // From email address
define('SMTP_FROM_NAME', 'KittuSweetu Collection'); // From name

// Function to send email
function sendEmail($to, $subject, $body) {
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: ' . SMTP_FROM_NAME . ' <' . SMTP_FROM_EMAIL . '>' . "\r\n";
    
    return mail($to, $subject, $body, $headers);
}
?>