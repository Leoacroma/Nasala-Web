<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cookie;
use RealRashid\SweetAlert\Facades\Alert;

class UploadHelper
{
    private $apiBaseUrl = 'https://nasla.k5moi.com/v1/api';
    private $accessToken = '';
    

    function __construct() {
        $this->accessToken = Cookie::get('token');
        
    }
    public function postRequest($url, $file){
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
            return redirect()->route('not-found');

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
            return redirect()->route('not-found');

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
            return redirect()->route('not-found');

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
            return redirect()->route('not-found');

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
            return redirect()->route('not-found');

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
            return redirect()->route('not-found');

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
            return redirect()->route('not-found');

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
            return redirect()->route('not-found');

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
            return redirect()->route('not-found');

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
            return redirect()->route('not-found');

        }
       
    }
}