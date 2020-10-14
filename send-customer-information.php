<?php

use AboGabalMyFatoorah\src\executePayment;

require_once 'config/config.php';
require_once 'src/autoload.php';

if (isset($_POST) && !empty($_POST)) {
    ####### Execute Payment ######

    $executePayment = new executePayment();
    $response = $executePayment->setCurlFieldsThenExecuteCurl(
        [
            'PaymentMethodId' => $_POST['PaymentMethodId'],
            'CustomerName' => $_POST['CustomerName'],
            'DisplayCurrencyIso' => $_POST['CurrencyIso'],
            'MobileCountryCode' => $_POST['MobileCountryCode'],
            'CustomerMobile' => $_POST['CustomerMobile'],
            'CustomerEmail' => $_POST['CustomerEmail'],
            'InvoiceValue' => $_POST['TotalAmount'],
            'CallBackUrl' => 'https://google.com',
            'ErrorUrl' => 'https://google.com',
            'Language' => 'en',
            'CustomerReference' => 'ref 1',
            'CustomerCivilId' => 12345678,
            'UserDefinedField' => 'Custom field',
            'ExpireDate' => '',
            'CustomerAddress' => [
                'Block' => $_POST['CustomerAddress']['Block'],
                'Street' => $_POST['CustomerAddress']['Street'],
                'HouseBuildingNo' => $_POST['CustomerAddress']['HouseBuildingNo'],
                'Address' => $_POST['CustomerAddress']['Address'],
                'AddressInstructions' => $_POST['CustomerAddress']['AddressInstructions'],
            ],
            'InvoiceItems' => [
                [
                    'ItemName' => 'Product 01',
                    'Quantity' => 1,
                    'UnitPrice' => $_POST['TotalAmount']
                ]
            ]
        ]);

    if ($executePayment->curlErrorExist()) {
        echo "cURL Error #: " . $executePayment->getCurlError();
    } else {
        $json = json_decode((string)$response->getResponse(), true);
        if ($json['IsSuccess']) {
            $payment_url = $json["Data"]["PaymentURL"];
            header('Location: put-card-information.php?PaymentURL=' . $payment_url);
            exit;
        } else {
           echo "failed: {$json['Message']}, for more details you can print [json] variable";
        }
    }
} else {
    echo 'error: go to <a href="/">Home</a>';
}