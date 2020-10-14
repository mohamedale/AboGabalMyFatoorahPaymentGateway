<?php

namespace AboGabalMyFatoorah\Src;

class paymentEnquiry extends initCurlAndExecutePostFields
{
    public function __construct()
    {
        $this->setApiUrl($this->api_url . '/v2/GetPaymentStatus');
    }
}
