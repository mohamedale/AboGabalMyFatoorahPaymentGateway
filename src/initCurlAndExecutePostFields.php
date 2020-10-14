<?php

namespace AboGabalMyFatoorah\Src;

use AboGabalMyFatoorah\config\configClass;

abstract class initCurlAndExecutePostFields extends configClass
{
    protected $url; // api url will sets from children classes
    private $curl;
    private $err; // curl error
    private $response;
    private $post_fields;

    private function initCurl()
    {
        $this->curl = curl_init();
    }

    /**
     * This method will run by (setCurlFields) method
     */
    private function preparePostFields()
    {
        $this->post_fields = json_encode($this->post_fields);
    }

    /**
     * @param $url
     * Will execute by children classes
     * @return initCurlAndExecutePostFields
     */
    protected function setApiUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @param array $fields
     * Step One
     * @return bool|string
     */
    public function setCurlFieldsThenExecuteCurl(array $fields)
    {
        $this->post_fields = $fields;
        $this->preparePostFields();
        return $this->executePostFields();
    }

    /**
     * Step Two
     * @return CurlResponse
     */
    private function executePostFields()
    {
        // initialization curl
        $this->initCurl();
        // set curl options array
        curl_setopt_array($this->curl, array(
            CURLOPT_URL => $this->url,
            CURLOPT_POSTFIELDS => $this->post_fields,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $this->api_token,
            ]
        ));
        // set curl option
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        // set response
        $this->response = curl_exec($this->curl);
        // set error
        $this->err = curl_error($this->curl);
        // close curl session
        curl_close($this->curl);
        // return
        return new CurlResponse($this->response, $this->err); // Step Three
    }

    /**
     * @return bool
     */
    public function curlErrorExist()
    {
        return !empty($this->err);
    }

    /**
     * @return mixed
     */
    public function getCurlError()
    {
        return !empty($this->err) ? $this->err : null;
    }

}