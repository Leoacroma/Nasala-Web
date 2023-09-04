<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cookie;

class HttpClientHelper
{
    private $apiBaseUrl = 'http://188.166.211.230:9091/v1/api';
    private $apiOuthUrl = 'http://188.166.211.230:9091/oauth/';


    private $accessToken = '';
    private $clientId = '';
    private $clientSecret = '';
  
    function __construct() {
        $this->accessToken = Cookie::get('token');
        $this->clientId = 'azUtbmFzbGEtY2xpZW50SWQ=';
        $this->clientSecret = 'YXpVdGJtRnpiR0V0WTJ4cFpXNTBVMlZqY21WMA==';
    }

    public function postloginRequest($url, $parems){
        $client = new Client();
        $grand_type = '?grant_type=password';
        $response = $client->post($this->apiOuthUrl . $url .$grand_type, [
            'headers' => [
                'Authorization' => 'Basic '. base64_encode($this->clientId . ':' . $this->clientSecret),
            ],
            'form_params' => $parems,
            ]);
        $data = json_decode($response->getBody(), true);
        return $data;
    }

    public function getRequest($url, $params = null){
        $client = new Client();
        $response = $client->get($this->apiBaseUrl . $url, [
            'headers' => [
                'Authorization' => 'Bearer' . $this->accessToken,
            ]
        ]);
        $data = json_decode($response->getBody(), true);
        return $data;
    }
    public function postRequest($url, $body = null){
        $client = new Client();
        $response = $client->post($this->apiBaseUrl . $url, [
            'headers' => [
                'Authorization' => 'Bearer'. $this->accessToken,
            ],
            'json' => $body,
        ]);
        
        // Process and display the response
        $result = json_decode($response->getBody(), true);
        return $result;
    }

    public function putRequest($url, $body = null){
        $client = new Client();
        $response = $client->patch($this->apiBaseUrl . $url, [
            'headers' => [
                'Authorization' => 'Bearer'. $this->accessToken,
            ],
            'json' => $body,
        ]);
        // Process and display the response
        $result = json_decode($response->getBody(), true);
        return $result;
    }

    public function deleteRequest($url){
        $client = new Client();
        $response = $client->delete($this->apiBaseUrl . $url, [
            'headers' => [
                'Authorization' => 'Bearer'. $this->accessToken,
            ],
        ]);
        // Process and display the response
        $result = json_decode($response->getBody(), true);
        return $result;
    }

}