<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\RequestException;

class UploadHelper
{
    private $apiBaseUrl = 'http://188.166.211.230:9091/v1/api';
    private $accessToken = '';
    function __construct() {
        $this->accessToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2OTM4ODEwMjUsInVzZXJfbmFtZSI6InNvdW1wYW5oYW91ZG9tQGdtYWlsLmNvbSIsImF1dGhvcml0aWVzIjpbIkZVTExfUEVSTUlTU0lPTiIsIlNZU1RFTV9BRE1JTiJdLCJqdGkiOiIxZmEzMzAyZi04MzBjLTQ2YjItYmZkZC04NWExODcxOTkxYzYiLCJjbGllbnRfaWQiOiJhelV0Ym1GemJHRXRZMnhwWlc1MFNXUT0iLCJzY29wZSI6WyJyZWFkIiwiY3JlYXRlIiwidXBkYXRlIiwiZGVsZXRlIl19.QQ1ahy8N4p_JeuewzJR-j2KP9c-1Wa8XKYO5nca7j5Q';

    }

    public function postRequest($url, $file){
        try {
            //code...
            $client = new Client();
            $response = $client->post($this->apiBaseUrl . $url, [
                'headers' => [
                    'Authorization' => 'Bearer'. $this->accessToken,
                ],
                'multipart' => [
                    [
                        'name'     => 'file',
                        'contents' => fopen($file->getPathname(), 'r'),
                        'filename' => $file->getClientOriginalName(),
                    ]
                ]
            ]);
            
            // Process and display the response
            $upload = json_decode($response->getBody(), true);
            return $upload;
        } catch (RequestException $e) {
            //throw $th;
            echo 'Error : '. $e->getMessage();
        }
       
    }
    
    public function putRequest($url, $file){
        try {
            //code...
            $client = new Client();
            $response = $client->patch($this->apiBaseUrl . $url, [
                'headers' => [
                    'Authorization' => 'Bearer'. $this->accessToken,
                ],
                'multipart' => [
                    [
                        'name'     => 'file',
                        'contents' => fopen($file->getPathname(), 'r'),
                        'filename' => $file->getClientOriginalName(),
                    ]
                ]
            ]);
            
            // Process and display the response
            $upload = json_decode($response->getBody(), true);
            return $upload;
        } catch (RequestException $e) {
            //throw $th;
            echo 'Error : '. $e->getMessage();
        }
       
    }
    


    public function postLibRequest($url, $file, $title, $cateId){
        try {
            //code...
            $client = new Client();
            $response = $client->post($this->apiBaseUrl . $url, [
                'headers' => [
                    'Authorization' => 'Bearer'. $this->accessToken,
                ],
                RequestOptions::MULTIPART => [
                    [
                        'name' => 'file',
                        'contents' => fopen($file->getPathname(), 'r'),
                        'filename' => $file->getClientOriginalName()
                    ],
                    [
                        'name' => 'title',
                        'contents' => $title
                    ],
                    [
                        'name' => 'categoryId',
                        'contents' => $cateId
                    ]
                ]
            ]);
            
            // Process and display the response
            $upload = json_decode($response->getBody(), true);
            return $upload;
        } catch (RequestException $e) {
            //throw $th;
            echo 'Error : '. $e->getMessage();
        }
       
    }
    
    public function patchLibRequest($url, $file, $title, $cateId){
        try {
            //code...
            $client = new Client();
            $response = $client->patch($this->apiBaseUrl . $url, [
                'headers' => [
                    'Authorization' => 'Bearer'. $this->accessToken,
                ],
                RequestOptions::MULTIPART => [
                    [
                        'name' => 'file',
                        'contents' => fopen($file->getPathname(), 'r'),
                        'filename' => $file->getClientOriginalName()
                    ],
                    [
                        'name' => 'title',
                        'contents' => $title
                    ],
                    [
                        'name' => 'categoryId',
                        'contents' => $cateId
                    ]
                ]
            ]);
            
            // Process and display the response
            $upload = json_decode($response->getBody(), true);
            return $upload;
        } catch (RequestException $e) {
            //throw $th;
            echo 'Error : '. $e->getMessage();
        }
       
    }

    public function patchwithoutfileLibRequest($url, $title, $cateId){
        try {
            //code...
            $client = new Client();
            $response = $client->patch($this->apiBaseUrl . $url, [
                'headers' => [
                    'Authorization' => 'Bearer'. $this->accessToken,
                ],
                RequestOptions::MULTIPART => [
                    [
                        'name' => 'title',
                        'contents' => $title
                    ],
                    [
                        'name' => 'categoryId',
                        'contents' => $cateId
                    ]
                ]
            ]);
            
            // Process and display the response
            $upload = json_decode($response->getBody(), true);
            return $upload;
        } catch (RequestException $e) {
            //throw $th;
            echo 'Error : '. $e->getMessage();
        }
       
    }

    public function postTfileRequest($url, $file, $title, $cateId){
        try {
            //code...
            $client = new Client();
            $response = $client->post($this->apiBaseUrl . $url, [
                'headers' => [
                    'Authorization' => 'Bearer'. $this->accessToken,
                ],
                RequestOptions::MULTIPART => [
                    [
                        'name' => 'file',
                        'contents' => fopen($file->getPathname(), 'r'),
                        'filename' => $file->getClientOriginalName()
                    ],
                    [
                        'name' => 'title',
                        'contents' => $title
                    ],
                    [
                        'name' => 'subMenuId',
                        'contents' => $cateId
                    ]
                ]
            ]);
            
            // Process and display the response
            $upload = json_decode($response->getBody(), true);
            return $upload;
        } catch (RequestException $e) {
            //throw $th;
            echo 'Error : '. $e->getMessage();
        }
       
    }
    public function patchTfileRequest($url, $file, $title, $cateId){
        try {
            //code...
            $client = new Client();
            $response = $client->patch($this->apiBaseUrl . $url, [
                'headers' => [
                    'Authorization' => 'Bearer'. $this->accessToken,
                ],
                RequestOptions::MULTIPART => [
                    [
                        'name' => 'file',
                        'contents' => fopen($file->getPathname(), 'r'),
                        'filename' => $file->getClientOriginalName()
                    ],
                    [
                        'name' => 'title',
                        'contents' => $title
                    ],
                    [
                        'name' => 'subMenuId',
                        'contents' => $cateId
                    ]
                ]
            ]);
            
            // Process and display the response
            $upload = json_decode($response->getBody(), true);
            return $upload;
        } catch (RequestException $e) {
            //throw $th;
            echo 'Error : '. $e->getMessage();
        }
       
    }

    public function patchwithoutTfileRequest($url, $title, $cateId){
        try {
            //code...
            $client = new Client();
            $response = $client->patch($this->apiBaseUrl . $url, [
                'headers' => [
                    'Authorization' => 'Bearer'. $this->accessToken,
                ],
                RequestOptions::MULTIPART => [
                    [
                        'name' => 'title',
                        'contents' => $title
                    ],
                    [
                        'name' => 'subMenuId',
                        'contents' => $cateId
                    ]
                ]
            ]);
            
            // Process and display the response
            $upload = json_decode($response->getBody(), true);
            return $upload;
        } catch (RequestException $e) {
            //throw $th;
            echo 'Error : '. $e->getMessage();
        }
       
    }
    public function postPubfilerequets($url, $filePdf, $title, $image){
        try {
            //code...
            $client = new Client();
            $response = $client->post($this->apiBaseUrl . $url, [
                'headers' => [
                    'Authorization' => 'Bearer'. $this->accessToken,
                ],
                RequestOptions::MULTIPART => [
                    [
                        'name' => 'file',
                        'contents' => fopen($filePdf->getPathname(), 'r'),
                        'filename' => $filePdf->getClientOriginalName()
                    ],
                    [
                        'name' => 'title',
                        'contents' => $title
                    ],
                    [
                        'name' => 'thumbnailImageId',
                        'contents' => $image
                    ],
                ]
            ]);
            
            // Process and display the response
            $upload = json_decode($response->getBody(), true);
            return $upload;
        } catch (RequestException $e) {
            //throw $th;
            echo 'Error : '. $e->getMessage();
        }
       
    }
    public function patchPubfilerequest($url ,$filePdf ,$title, $image){
        try {
            //code...
            $client = new Client();
            $response = $client->patch($this->apiBaseUrl . $url, [
                'headers' => [
                    'Authorization' => 'Bearer'. $this->accessToken,
                ],
                RequestOptions::MULTIPART => [
                    [
                        'name' => 'file',
                        'contents' => fopen($filePdf->getPathname(), 'r'),
                        'filename' => $filePdf->getClientOriginalName()
                    ],
                    [
                        'name' => 'title',
                        'contents' => $title
                    ],
                    [
                        'name' => 'thumbnailImageId',
                        'contents' => $image
                    ],
                ]
            ]);
            
            // Process and display the response
            $upload = json_decode($response->getBody(), true);
            return $upload;
        } catch (RequestException $e) {
            //throw $th;
            echo 'Error : '. $e->getMessage();
        }
       
    }
    public function patchPubwithoutfilerequest($url, $title, $image){
        try {
            //code...
            $client = new Client();
            $response = $client->patch($this->apiBaseUrl . $url, [
                'headers' => [
                    'Authorization' => 'Bearer'. $this->accessToken,
                ],
                RequestOptions::MULTIPART => [
                    [
                        'name' => 'title',
                        'contents' => $title
                    ],
                    [
                        'name' => 'thumbnailImageId',
                        'contents' => $image
                    ],
                ]
            ]);
            
            // Process and display the response
            $upload = json_decode($response->getBody(), true);
            return $upload;
        } catch (RequestException $e) {
            //throw $th;
            echo 'Error : '. $e->getMessage();
        }
       
    }
}