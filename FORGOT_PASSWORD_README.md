# Forgot Password Functionality

## Overview
The forgot password functionality allows users to reset their passwords by receiving an email with a secure reset link.

## Files Involved
- `forgot-password.php` - The main forgot password page
- `reset-password.php` - The password reset page accessed via the email link
- `config.php` - Configuration file with SMTP settings
- `create_password_reset_table.php` - Creates the necessary database table

## How It Works
1. User enters their email on the forgot password page
2. System verifies the email exists in the database
3. Generates a unique token and stores it in the `password_reset` table
4. Sends an email with a reset link containing the token
5. User clicks the link and is directed to the reset page
6. User enters new password and confirms it
7. Password is updated in the database and token is invalidated

## SMTP Configuration
The email functionality uses SMTP settings defined in `config.php`. Update the following values to match your email provider:
- SMTP_HOST: Your SMTP server (e.g., smtp.gmail.com)
- SMTP_PORT: Port number (587 for TLS, 465 for SSL)
- SMTP_USERNAME: Your email address
- SMTP_PASSWORD: Your email password or app-specific password
- SMTP_SECURE: Encryption type (tls or ssl)

## Enhanced Email Functionality
The system includes a flexible email function that will automatically use PHPMailer if installed, or fall back to the built-in PHP mail function. To install PHPMailer for better email delivery:
```
composer require phpmailer/phpmailer
```

## Security Features
- Reset tokens expire after 30 minutes
- Tokens are invalidated after use
- Uses prepared statements to prevent SQL injection
- Secure token generation using `random_bytes()`