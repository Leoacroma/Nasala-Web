<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cookie;
use RealRashid\SweetAlert\Facades\Alert;


class HttpClientHelper
{
    // private $apiBaseUrl = 'https://nasla.k5moi.com/v1/api';
    // private $apiOuthUrl = 'https://nasla.k5moi.com/oauth/';

    private $apiBaseUrl = 'http://157.230.250.96:8080/v1/api';
    private $apiOuthUrl = 'http://157.230.250.96:8080/oauth/';

    private $accessToken = '';
    private $clientId = '';
    private $clientSecret = '';
  
    function __construct() {
        $this->accessToken = Cookie::get('token');
        $this->clientId = 'azUtbmFzbGEtY2xpZW50SWQ=';
        $this->clientSecret = 'YXpVdGJtRnpiR0V0WTJ4cFpXNTBVMlZqY21WMA==';
    }

    public function postloginRequest($url, $parems){

        //code...
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
            //code...
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
        //code...
       
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