<?php
namespace AboGabalMyFatoorah\Src;

class checkoutPayment extends initCurlAndExecutePostFields
{
    /**
     * checkoutPayment constructor.
     * @param $paymentURL
     */
    public function __construct($paymentURL)
    {
        $this->setApiUrl($paymentURL);
    }
}