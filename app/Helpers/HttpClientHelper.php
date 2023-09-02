<?php

namespace App\Helpers;

use GuzzleHttp\Client;

class HttpClientHelper
{
    private $apiBaseUrl = 'http://188.166.211.230:9091/v1/api';
    private $accessToken = '';
    function __construct() {
        $this->accessToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2OTM3MDc3NzksInVzZXJfbmFtZSI6InNvdW1wYW5oYW91ZG9tQGdtYWlsLmNvbSIsImF1dGhvcml0aWVzIjpbIkZVTExfUEVSTUlTU0lPTiIsIlNZU1RFTV9BRE1JTiJdLCJqdGkiOiJhY2I4OTk0Ni1kMjAzLTQzOGUtYmE2OC0zYWYxMzNmOTA0NDUiLCJjbGllbnRfaWQiOiJhelV0Ym1GemJHRXRZMnhwWlc1MFNXUT0iLCJzY29wZSI6WyJyZWFkIiwiY3JlYXRlIiwidXBkYXRlIiwiZGVsZXRlIl19.pVUHhTsmiRGRj9g1VkhQbGY3GWcE2HPlx-RQ8bU0jKw';

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