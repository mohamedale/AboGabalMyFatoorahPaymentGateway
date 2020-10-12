<?php
use AboGabalMyFatoorah\src\checkoutPayment;

require_once 'config/config.php';
require_once 'src/autoload.php';

if (isset($_POST) && !empty($_POST)){
    ####### Checkout Payment ######
    $payment_url = $_POST['PaymentURL'];

    $checkoutPayment = new checkoutPayment($payment_url);
    $response = $checkoutPayment->setCurlFields(
        [
            'paymentType' => 'card',
            'card' => [
                'Number' => $_POST['Number'],
                'expiryMonth' => $_POST['expiry']['Month'],
                'expiryYear' => $_POST['expiry']['Year'],
                'securityCode' => $_POST['securityCode'],
            ],
            'saveToken' => false
        ])->executePostFields()->getResponse();

    if ($checkoutPayment->curl_err) {
        echo "cURL Error #:" . $checkoutPayment->getCurlError();
    } else {
        $json = json_decode((string)$response, true);
        // you can print this variable {$json} and show any data you want 
        if (isset($json['IsSuccess']) && $json['IsSuccess'] === true){
            require 'confirm-purchase.php';
        } else {
            if(!empty($json['Message']) && empty($json['ValidationErrors'])){
                echo "sorry! payment is failed. the reason is: \n {$json['Message']}";
            } elseif(empty($json['Message']) && !empty($json['ValidationErrors'])){
                echo "sorry! payment is failed. you have some errors and this errors is: \n {$json['Message']}";
            } elseif(!empty($json['Message']) && !empty($json['ValidationErrors'])){
                echo "sorry! payment is failed. the reason is: \n {$json['Message']} \n
                i you have some errors and this errors is: \n {$json['Message']}";
            } else {
                echo "sorry! payment is failed.";
            }
        }
    }
} else {
    echo 'error: go to <a href="/">Home</a>';
}