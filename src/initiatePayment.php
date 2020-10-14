<?php
namespace AboGabalMyFatoorah\Src;

class initiatePayment extends initCurlAndExecutePostFields
{
    public function __construct()
    {
        $this->setApiUrl($this->api_url . '/v2/initiatePayment');
    }
}