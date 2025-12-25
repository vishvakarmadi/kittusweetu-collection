<?php
// Test the email configuration
include 'config.php';

echo "<h2>Email Configuration Test</h2>";
echo "<p>SMTP Host: " . SMTP_HOST . "</p>";
echo "<p>SMTP Port: " . SMTP_PORT . "</p>";
echo "<p>SMTP Username: " . SMTP_USERNAME . "</p>";
echo "<p>SMTP From Name: " . SMTP_FROM_NAME . "</p>";

// Test the sendEmail function exists
if (function_exists('sendEmail')) {
    echo "<p style='color: green;'>✓ sendEmail function is available</p>";
} else {
    echo "<p style='color: red;'>✗ sendEmail function is not available</p>";
}

echo "<p><strong>Note:</strong> For the email functionality to work properly with Gmail, you may need to use an App Password instead of your regular password. Visit <a href='https://myaccount.google.com/apppasswords'>Google App Passwords</a> to generate one.</p>";
?>