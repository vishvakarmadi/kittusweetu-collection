<?php
// Script to provide instructions for installing PHPMailer
echo "<h2>PHPMailer Installation Instructions</h2>";
echo "<p>To enable better email functionality, please install PHPMailer using Composer:</p>";
echo "<pre>composer require phpmailer/phpmailer</pre>";
echo "<p>After installation, the forgot password functionality will automatically use PHPMailer for more reliable email delivery.</p>";
echo "<p>If you don't have Composer installed, you can download PHPMailer manually:</p>";
echo "<ol>";
echo "<li>Download PHPMailer from: https://github.com/PHPMailer/PHPMailer</li>";
echo "<li>Extract to a 'vendor' folder in your project</li>";
echo "<li>Include the autoload file in your config.php</li>";
echo "</ol>";
?>