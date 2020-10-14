<?php
namespace AboGabalMyFatoorah\Src;

class executePayment extends initCurlAndExecutePostFields
{
    /**
     * executePayment constructor.
     */
    public function __construct()
    {
        $this->setApiUrl($this->api_url . '/v2/ExecutePayment');
    }
}