<?php

namespace App\Tools;

class Curl
{
    protected $url;
    protected $authoriation;
    protected $timeout;
    protected $status;
    protected $info;
    protected $response;
    protected $errors;

    public function __construct($url, $authoriation = null, $timeout = 5, array $options = [])
    {
        $this->url = $url;
        $this->authoriation = $this->authoriation;
        $this->timeout = $timeout;
    }

    private function init(array $options = [])
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $options['url']);
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $this->response = curl_exec($ch);
        $this->errors = curl_errno($ch);
        $this->status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $this->info = curl_getinfo($ch);
        curl_close($ch);
    }

    /**
     * Make a get request and return if exits the request body content
     *
     * @param String $param - Param that will be passed to base url 
     * @param boolean $collectionFormat - If true return a laravel collection instance
     * @return
     */
    public function get(String $param = null, $collectionFormat = true)
    {
        $this->init([
            'url' => $param ? $this->url . "/$param" : $this->url
        ]);
        if ($collectionFormat) {
            return collect($this->getBody());
        }
        return $this->getBody();
    }

    public function post()
    {
        return;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getBody()
    {
        return json_decode($this->response, true);
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function getInfo()
    {
        return $this->info;
    }

    public function hasError()
    {
        return $this->errors > 0;
    }
}
