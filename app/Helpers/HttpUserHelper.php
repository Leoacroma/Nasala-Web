<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cookie;

class HttpUserHelper
{
    private $apiBaseUrl = 'http://188.166.211.230:9091/v1/api';

    private $accessToken = '';
  
    function __construct() {
        $this->accessToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX25hbWUiOiJ3ZWJ1c2VyQGdtYWlsLmNvbSIsImF1dGhvcml0aWVzIjpbIlJFQURfTElCUkFSWV9GSUxFX1BFUk1JU1NJT04iLCJSRUFEX0NBVEVHT1JZX1BFUk1JU1NJT04iLCJSRUFEX1BBR0VfUEVSTUlTU0lPTiIsIlJFQURfVFJBSU5JTkdfQ0FURUdPUllfUEVSTUlTU0lPTiIsIlJFQURfUE9TVF9QRVJNSVNTSU9OIiwiUkVBRF9GSUxFX1BFUk1JU1NJT04iLCJSRUFEX1JFR0lTVEVSX1BFUk1JU1NJT04iLCJXRUJfVVNFUl9ST0xFIiwiUkVBRF9VU0VSX1BFUk1JU1NJT04iLCJSRUFEX01FTlVfUEVSTUlTU0lPTiIsIlJFQURfUk9MRV9QRVJNSVNTSU9OIiwiUkVBRF9QRVJNSVNTSU9OX1BFUk1JU1NJT04iLCJSRUFEX1BVQkxJQ0laRV9QRVJNSVNTSU9OIiwiUkVBRF9MSUJSQVJZX0NBVEVHT1JZX1BFUk1JU1NJT04iLCJSRUFEX1RSQUlOSU5HX1BPU1RfUEVSTUlTU0lPTiIsIlJFQURfVFJBSU5JTkdfRklMRV9QRVJNSVNTSU9OIiwiUkVBRF9TVUJfTUVOVV9QRVJNSVNTSU9OIl0sImp0aSI6ImZlNmU2M2JkLWQ2NjAtNGI0Mi04ZjcyLTcyMDYyYzRjYzc5NyIsImNsaWVudF9pZCI6ImF6VXRibUZ6YkdFdFpuSnZiblF0WTJ4cFpXNTBVMlZqY21WMCIsInNjb3BlIjpbInJlYWQiXX0.6rQcScXRXloZrp9oyvpGNedf5goPbKB1vtGsslfCayY';
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