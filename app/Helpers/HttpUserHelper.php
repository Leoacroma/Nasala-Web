<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cookie;

class HttpUserHelper
{
    private $apiBaseUrl = 'https://api-nasla.k5moi.com/v1/api';

    private $accessToken = '';
  
    function __construct() {
        $this->accessToken = config('app.user_token');
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