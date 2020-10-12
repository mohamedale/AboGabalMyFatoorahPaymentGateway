<?php
use AboGabalMyFatoorah\Src\initiatePayment;

require_once 'config/config.php';
require_once 'src/autoload.php';

if (isset($_POST) && !empty($_POST)){
    ####### Initiate Payment ######

    $initiatePayment = new initiatePayment();
    $response = $initiatePayment->setCurlFields(
            [
                'InvoiceAmount' => $_POST['price'],
                'CurrencyIso' => $_POST['currency']
            ])->executePostFields()->getResponse();

    if ($initiatePayment->curl_err) {
        echo "cURL Error #:" . $initiatePayment->getCurlError();
    } else {
        $json = json_decode((string)$response, true);
        ?>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

        <br>
        <br>
        <br>
        <br>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center">Choose Your Payment Method</h3>
                    <br>
                    <br>
                </div>
                <?php
                    if (isset($json['Data']['PaymentMethods']) && !empty($json['Data']['PaymentMethods'])){
                        $paymentMethods = $json['Data']['PaymentMethods'];
                        foreach ($paymentMethods as $method) :
                            echo '<div class="col-md-3">
                                    <style>
                                        a{
                                             text-decoration: none;
                                             color: #777; 
                                             display: block; 
                                             margin-bottom: 30px; 
                                             border: 1px solid #eee;
                                             padding: 10px;
                                             transition: .2s all ease-in-out;
                                        }
                                        a:hover{
                                            background: #eee;
                                            text-decoration: none;
                                            color: #777; 
                                        }
                                    </style>
                                    <a href="/put_your_information.php?PaymentMethodId=' . $method["PaymentMethodId"] . '&TotalAmount=' . $method["TotalAmount"] . '&ServiceCharge=' . $method["ServiceCharge"] . '&CurrencyIso=' . $method["CurrencyIso"] . '">
                                        <div style="max-width: 150px; margin: 0 auto 15px;">
                                            <img src="' . $method["ImageUrl"] . '" class="img-fluid">
                                        </div>
                                        <h6 class="text-center">' . $method["PaymentMethodEn"] . '</h6>
                                        <br>
                                        <h6>Total Amount Is: <strong>' . $method["TotalAmount"] . ' ' . $method["CurrencyIso"] . '</strong></h6>
                                        <h6>Service Charge Is: <strong>' . $method["ServiceCharge"] . ' ' . $method["CurrencyIso"] . '</strong></h6>
                                        <h6>Total Price Is: <strong>' . ($method["TotalAmount"] + $method["ServiceCharge"]) . ' ' . $method["CurrencyIso"] . '</strong></h6>
                                    </a>
                                </div>';
                        endforeach;
                    } else {
                        echo 'Sorry!, There is no method available now';
                    }
                ?>
            </div>
        </div>

        <?php

    }
} else {
    echo 'error: go to <a href="/">Home</a>';
}