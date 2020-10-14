<?php
use AboGabalMyFatoorah\src\checkoutPayment;

require_once 'config/config.php';
require_once 'src/autoload.php';

if (isset($_POST) && !empty($_POST)){
    ####### Checkout Payment ######
    $payment_url = $_POST['PaymentURL'];

    $checkoutPayment = new checkoutPayment($payment_url);
    $response = $checkoutPayment->setCurlFieldsThenExecuteCurl(
        [
            'paymentType' => 'card',
            'card' => [
                'Number'        => str_replace(' ', '', $_POST['Number']), // remove any space in card number
                'expiryMonth'   => $_POST['expiry']['Month'],
                'expiryYear'    => $_POST['expiry']['Year'],
                'securityCode'  => $_POST['securityCode'],
            ],
            'saveToken' => false
        ]);

    if ($checkoutPayment->curlErrorExist()) {
        echo "cURL Error #: " . $checkoutPayment->getCurlError();
    } else {
        $json = json_decode((string)$response->getResponse(), true);
        // you can print this variable {$json} and show any data you want 
        if (isset($json['IsSuccess']) && $json['IsSuccess'] === true){
            echo 'Payment was checkout successfully! you will redirect now to billing page...';
            header("Refresh:5; url=payment-enquiry.php?payment_id={$json['Data']['PaymentId']}"); // go to billing page
            exit;
        } else {
            if(!empty($json['Message']) && empty($json['ValidationErrors'])){
                echo "sorry! payment is failed. the reason is: \n {$json['Message']}";
            } elseif(empty($json['Message']) && !empty($json['ValidationErrors'])){
                echo "sorry! payment is failed. you have some errors and this errors is: \n {$json['Message']}";
            } elseif(!empty($json['Message']) && !empty($json['ValidationErrors'])){
                echo "sorry! payment is failed. the reason is: \n {$json['Message']} \n
                i you have some errors and this errors is: \n {$json['Message']}";
            } elseif (!empty($json['Data']['Status']) && $json['Data']['Status'] === 'ERROR'){
                echo "sorry! payment is failed. the reason is: \n {$json['Data']['ErrorMessage']}";
            } else {
                echo "sorry! payment is failed. for more details you can print [json] variable";
            }
        }
    }
} else {
    echo 'error: go to <a href="/">Home</a>';
}