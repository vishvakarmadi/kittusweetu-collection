# ICICI Payment Gateway Integration

## Overview
This document explains the integration of ICICI Payment Gateway with the KittuSweetu Collection e-commerce platform.

## Files Created/Modified

### 1. config/icici_config.php
- Contains all the ICICI merchant parameters
- Includes encryption key, secure secret, merchant ID, terminal ID, etc.

### 2. config/icici_utility.php
- Contains the IciciPayment class with methods for:
  - Generating payment requests
  - Creating checksums for security
  - Validating payment responses
  - Initiating payment redirection

### 3. code/checkout.php
- Modified to handle ICICI payment method
- When 'icici' is selected, creates a pending order and redirects to ICICI gateway
- For other payment methods, processes directly as before

### 4. code/responseSale.php
- Handles payment response from ICICI gateway
- Validates checksum for security
- Updates order status based on payment result
- Redirects to appropriate success/error pages

### 5. chechout.php
- Added ICICI payment option to the checkout page
- Updated payment method descriptions

### 6. update_orders_table.php
- Migration script to add payment gateway fields to orders table

## How It Works

### Payment Flow:
1. Customer selects "ICICI Bank Payment Gateway" during checkout
2. System creates a pending order in the database
3. System redirects customer to ICICI payment page with transaction details
4. Customer completes payment on ICICI's secure page
5. ICICI redirects back to responseSale.php with payment result
6. System validates the response and updates order status
7. Customer is redirected to thank you page

### Security Features:
- Checksum validation to prevent tampering
- Secure parameter transmission
- Proper error handling

## Configuration

Update the parameters in `config/icici_config.php` with your actual merchant credentials:
- ENC_KEY: Encryption key provided by ICICI
- SECURE_SECRET: Secure secret provided by ICICI
- MERCHANTID: Your merchant ID
- TERMINALID: Your terminal ID
- RETURNURL: The URL to which ICICI will return after payment

## Database Changes

The following columns were added to the `orders` table:
- `payment_ref_no`: Reference number from payment gateway
- `auth_code`: Authorization code from payment gateway
- `payment_error_code`: Error code if payment failed
- `payment_error_message`: Error message if payment failed

## Testing

For testing purposes, you may need to update the RETURNURL in the config file to match your test environment.

## Error Handling

The system handles various error scenarios:
- Invalid checksum (potential security breach)
- Payment failure
- Missing transaction ID
- Database update failures