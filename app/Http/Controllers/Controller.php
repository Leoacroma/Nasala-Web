<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClientHelper;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use KhmerDateTime\KhmerDateTime;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    //Front-end
    public function home(){
        $httpClient = new HttpClientHelper();
        $data = $httpClient->getRequest('/news');

        return view('Front-end.homepage');
    }
    public function news(){
        $httpClient = new HttpClientHelper();
        $data = $httpClient->getRequest('/news');
        // $cate = $httpClient->getRequest('/categories');

        // $categoryId = $cate['data']['nameKh'];
        $result = [];
        foreach ($data['data'] as $item) {
            $dateTime = KhmerDateTime::parse($item['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLLLT");
            $result[] = [
                'id' => $item['id'],
                'titleKh' => $item['titleKh'],
                'categoryId' =>$item['categoryId'],
                'createdAt' => $formattedCreatedAt,
            ];
        }


        return view('front-end.news', ['result' => $result]);
    }
    public function subenews(string $id){

        $request_Id = $id;
        $httpClient = new HttpClientHelper();
        $data = $httpClient->getRequest('/news/'.$request_Id);
        $categoriesId = $data['data']['categoryId'];
        $image_Id = $data['data']['thumbnailImageId'];
        $cate = $httpClient->getRequest('/categories/'.$categoriesId);
        $image_Id = $data['data']['thumbnailImageId'];
        $image = 'http://188.166.211.230:9091/v1/api/files/'. $image_Id;
      
        // dd($image);
        $dateTime = KhmerDateTime::parse($data['data']['createdAt']);
        $formattedCreatedAt = $dateTime->format("LLL");

        return view('Front-end.sub-news.subnews',[
            'data' => $data, 
            'cate' => $cate, 
            'formattedCreatedAt' => $formattedCreatedAt,
            'image' => $image
            ]
        );
    }
    public function dp1(){
        $httpClient = new HttpClientHelper();
        $data = $httpClient->getRequest('/training');

        return view('Front-end.work.dp1', ['data' => $data]);
    }
    public function dp2Content(){
        return view('Front-end.work.dp2');
    }
    public function dp3(){
        return view('Front-end.work.dp3');
    }
    public function liby(){

        $httpClient = new HttpClientHelper();
        $lib = $httpClient->getRequest('/library');
        $cate = $httpClient->getRequest('/library/categories');
        $result = [];
        foreach ($lib['data'] as $lib) {
            $dateTime = KhmerDateTime::parse($lib['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLL");
            $result[] = [
                'id' => $lib['id'],
                'title' => $lib['title'],
                'fileSize' => $lib['fileSize'],
                'url' => $lib['url'],
                'createdAt' => $formattedCreatedAt,
            ];
        }
        return view('Front-end.liby', ['result' => $result, 'cate' => $cate]);
    }
    public function scholar(){
        $httpClient = new HttpClientHelper();
        $data = $httpClient->getRequest('/publicize');
        $result = [];
        foreach ($data['data'] as $lib) {
            $dateTime = KhmerDateTime::parse($lib['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLL");
            $result[] = [
                'id' => $lib['id'],
                'title' => $lib['title'],
                'name' => $lib['name'],
                'createdAt' => $formattedCreatedAt,
            ];
        }
        return view('Front-end.scholarship', ['result' => $result]);
    }
    public function aboutSchooldp1(){
        return view('Front-end.aboutSchool.dp1');
    }
    public function aboutSchooldp2(){
        return view('Front-end.aboutSchool.dp2');
    }
    public function aboutSchooldp3(){
        return view('Front-end.aboutSchool.dp3');
    }
    public function aboutSchooldp4(){
        return view('Front-end.aboutSchool.dp4');
    }
    public function aboutSchooldp5(){
        return view('Front-end.aboutSchool.dp5');
    }
    public function aboutSchooldp6(){
        return view('Front-end.aboutSchool.dp6');
    }
    public function aboutSchooldp7(){
        return view('Front-end.aboutSchool.dp7');
    }
    public function aboutSchooldp8(){
        return view('Front-end.aboutSchool.dp8');
    }


    //Back-end
    public function dash(){
        return view('Back-end.Pages.homepage');
    }
    public function pagemake(){
        return view('Back-end.Pages.makepage');
    }
    
    public function post(){
        return view('Back-end.Pages.Post.news.post');
    }

    // public function postcate(){
    //     return view('Back-end.Pages.Post.news.postcate');
    // }
} 
