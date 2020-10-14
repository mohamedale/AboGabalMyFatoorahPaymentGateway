<?php
namespace AboGabalMyFatoorah\Src;

class CurlResponse
{
    private $response;
    private $curlError;

    /**
     * CurlResponse constructor.
     * @param $response
     * @param $curlError
     */
    public function __construct($response, $curlError)
    {
        $this->response = $response;
        $this->curlError = $curlError;
    }

    /**
     * @return bool|string
     * Step Three
     */
    public function getResponse(){
        return  empty($this->curlError) ? $this->response : false;
    }
}