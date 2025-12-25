<?php
include_once 'icici_config.php';

class IciciPayment {
    
    public static function generateRequest($order_id, $amount, $currency = 'INR', $customer_email = '', $customer_phone = '') {
        // Create the request parameters
        $request_params = array(
            'VERSION' => VERSION,
            'PASSCODE' => PASSCODE,
            'MERCHANTID' => MERCHANTID,
            'TERMINALID' => TERMINALID,
            'BANKID' => BANKID,
            'MCC' => MCC,
            'TXNID' => $order_id, // Use order ID as transaction ID
            'TXNAMOUNT' => $amount,
            'TXNCURRENCY' => $currency,
            'TXNDATE' => date('Y-m-d H:i:s'),
            'CUSTOMERID' => $customer_email,
            'CUSTOMEREMAIL' => $customer_email,
            'CUSTOMERPHONE' => $customer_phone,
            'RETURNURL' => RETURNURL,
            'SECURE_SECRET' => SECURE_SECRET
        );
        
        // Generate checksum
        $checksum = self::generateChecksum($request_params);
        $request_params['CHECKSUM'] = $checksum;
        
        return $request_params;
    }
    
    private static function generateChecksum($params) {
        // Create a string from parameters in specific order
        $checksum_string = '';
        foreach ($params as $key => $value) {
            if ($key !== 'CHECKSUM' && $key !== 'SECURE_SECRET') {
                $checksum_string .= $value . '|';
            }
        }
        $checksum_string .= SECURE_SECRET; // Add the secure secret at the end
        
        // Generate checksum using SHA256 and convert to uppercase
        return strtoupper(hash('sha256', $checksum_string));
    }
    
    public static function validateResponse($response_params) {
        if (!isset($response_params['CHECKSUM'])) {
            return false;
        }
        
        $received_checksum = $response_params['CHECKSUM'];
        unset($response_params['CHECKSUM']); // Remove checksum from validation
        
        $expected_checksum = self::generateChecksum($response_params);
        
        return $received_checksum === $expected_checksum;
    }
    
    public static function initiatePayment($order_id, $amount, $customer_email, $customer_phone) {
        $request_params = self::generateRequest($order_id, $amount, 'INR', $customer_email, $customer_phone);
        
        // Create form to submit to ICICI gateway
        $html = '<form name="icici_form" id="icici_form" method="post" action="' . GATEWAYURL . '">';
        
        foreach ($request_params as $key => $value) {
            $html .= '<input type="hidden" name="' . $key . '" value="' . $value . '">';
        }
        
        $html .= '<input type="submit" value="Processing Payment..." style="display:none;">';
        $html .= '</form>';
        $html .= '<script>document.getElementById("icici_form").submit();</script>';
        
        return $html;
    }
}

?>