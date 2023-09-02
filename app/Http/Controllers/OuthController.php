<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class OuthController extends Controller
{
    //
    public function oauth(Request $request){
        // Initialize a Guzzle client
        $client = new Client();

        // Set the request parameters
        $url = 'http://188.166.211.230:9091/oauth/token';
        $params = [
            'form_params' => [
                'grant_type' => 'password',
                'username' => 'soumpanhaoudom@gmail.com',
                'password' => 'password',
            ],
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode('azUtbmFzbGEtY2xpZW50SWQ=:YXpVdGJtRnpiR0V0WTJ4cFpXNTBVMlZqY21WMA=='),
            ],
        ];

        // Send the request
        $response = $client->post($url, $params);

        // Get the access token from the response
        $access_token = json_decode($response->getBody())->access_token;

    }
}
