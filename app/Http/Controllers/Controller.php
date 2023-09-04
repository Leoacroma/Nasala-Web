<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClientHelper;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use KhmerDateTime\KhmerDateTime;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    //Front-end
    public function home(){
        $httpClient = new HttpClientHelper();
        $dataSort1 = $httpClient->getRequest('/news?page=0&size=1&sortBy=createdAt&sortOrder=desc');
        $dataSort3 = $httpClient->getRequest('/news?page=0&size=3&sortBy=createdAt&sortOrder=desc');
        $cateSub = $httpClient->getRequest('/training/categories');
        $result = [];
        foreach ($dataSort1['data'] as $item) {
            $dateTime = KhmerDateTime::parse($item['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLLLT");
            $result[] = [
                'id' => $item['id'],
                'titleKh' => $item['titleKh'],
                'categoryId' => $item['categoryId'],
                'thumbnailImageId' => $item['thumbnailImageId'],
                'createdAt' => $formattedCreatedAt,
            ];
        }
        $result1 = [];
        foreach ($dataSort3['data'] as $item) {
            $dateTime = KhmerDateTime::parse($item['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLLLT");
            $result1[] = [
                'id' => $item['id'],
                'titleKh' => $item['titleKh'],
                'categoryId' => $item['categoryId'],
                'thumbnailImageId' => $item['thumbnailImageId'],
                'createdAt' => $formattedCreatedAt,
            ];
        }

        $subMenu = $httpClient->getRequest('/sub-menus');
        // dd($subMenu);

        return view('Front-end.homepage', [
            'subMenu' => $subMenu, 
            'result' => $result,
            'result1' => $result1,
            'cateSub' => $cateSub
        ]);
    }
    public function news(){
        $httpClient = new HttpClientHelper();
        $data = $httpClient->getRequest('/news');
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/categories');

        $result = [];
        foreach ($data['data'] as $item) {
            $dateTime = KhmerDateTime::parse($item['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLLLT");
            $result[] = [
                'id' => $item['id'],
                'titleKh' => $item['titleKh'],
                'categoryId' => $item['categoryId'],
                'thumbnailImageId' => $item['thumbnailImageId'],
                'createdAt' => $formattedCreatedAt,
            ];
        }
        return view('front-end.news', [
            'result' => $result,
            'subMenu' => $subMenu,
            'cateSub' => $cateSub,
        ]);
    }
    public function subenews(string $id){

        $request_Id = $id;
        $httpClient = new HttpClientHelper();
        $data = $httpClient->getRequest('/news/'.$request_Id);
        $categoriesId = $data['data']['categoryId'];
        $subMenu = $httpClient->getRequest('/sub-menus');
        $image_Id = $data['data']['thumbnailImageId'];
        $cate = $httpClient->getRequest('/categories/'.$categoriesId);
        $cateSub = $httpClient->getRequest('/training/categories');

        $image_Id = $data['data']['thumbnailImageId'];
        $image = 'http://188.166.211.230:9091/v1/api/files/'. $image_Id;
      
        // dd($image);
        $dateTime = KhmerDateTime::parse($data['data']['createdAt']);
        $formattedCreatedAt = $dateTime->format("LLL");

        return view('Front-end.sub-news.subnews',[
            'data' => $data, 
            'cate' => $cate, 
            'formattedCreatedAt' => $formattedCreatedAt,
            'image' => $image,
            'subMenu' => $subMenu,
            'cateSub' => $cateSub
            ]
        );
    }
    public function dp1(){
        $httpClient = new HttpClientHelper();
        $cateSub = $httpClient->getRequest('/training/categories');
        $subMenu = $httpClient->getRequest('/sub-menus');
        $data = $httpClient->getRequest('/training');

        return view('Front-end.work.dp1', ['data' => $data, 'subMenu' => $subMenu, 'cateSub' => $cateSub]);
    }
    public function dp2Content(string $id){
        $requestId = $id;
        $httpClient = new HttpClientHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/categories');

        // $subCate = $httpClient->getRequest('')
        return view('Front-end.work.dp2',['subMenu' => $subMenu, 'cateSub'=>$cateSub]);
    }
    public function dp3(){
        $httpClient = new HttpClientHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/categories');

        return view('Front-end.work.dp3',['subMenu' => $subMenu, 'cateSub'=>$cateSub]);
    }
    public function liby(){

        $httpClient = new HttpClientHelper();
        $lib = $httpClient->getRequest('/library');
        $httpClient = new HttpClientHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cate = $httpClient->getRequest('/library/categories');
        $cateSub = $httpClient->getRequest('/training/categories');

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
        return view('Front-end.liby', ['result' => $result, 'cate' => $cate, 'subMenu' => $subMenu, 'cateSub'=>$cateSub]);
    }
    public function scholar(){
        $httpClient = new HttpClientHelper();
        $data = $httpClient->getRequest('/publicize');
        $httpClient = new HttpClientHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/categories');
        $result = [];
        foreach ($data['data'] as $lib) {
            $dateTime = KhmerDateTime::parse($lib['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLL");
            $result[] = [
                'id' => $lib['id'],
                'title' => $lib['title'],
                'name' => $lib['name'],
                'thumbnailImageId' => $lib['thumbnailImageId'],
                'createdAt' => $formattedCreatedAt,
            ];
        }
        return view('Front-end.scholarship', ['result' => $result, 'subMenu' => $subMenu, 'cateSub' => $cateSub]);
    }
    public function subScholar(string $id){
        $httpClient = new HttpClientHelper();
        $cateSub = $httpClient->getRequest('/training/categories');
        $requestId = $id;
        return view('Front-end.subScholar', ['cateSub' => $cateSub, 'requestId' => $requestId]);
    }

    public function enrollMent(){
        $httpClient = new HttpClientHelper();
        $cateSub = $httpClient->getRequest('/training/categories');
        $reg = $httpClient->getRequest('/register');
        return view('Front-end.enrollment', ['reg' => $reg ,'cateSub' => $cateSub,]);
    }

    public function aboutSchooldp1(){
        $httpClient = new HttpClientHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/categories');

        return view('Front-end.aboutSchool.dp1', ['subMenu' => $subMenu, 'cateSub' => $cateSub]);
    }
    public function aboutSchooldp2(){
        $httpClient = new HttpClientHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/categories');

        return view('Front-end.aboutSchool.dp2',['subMenu' => $subMenu, 'cateSub'=>$cateSub]);
    }
    public function aboutSchooldp3(){
        $httpClient = new HttpClientHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/categories');

        return view('Front-end.aboutSchool.dp3',['subMenu' => $subMenu, 'cateSub' => $cateSub]);
    }
    public function aboutSchooldp4(){
        $httpClient = new HttpClientHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/categories');

        return view('Front-end.aboutSchool.dp4',['subMenu' => $subMenu, 'cateSub' => $cateSub]);
    }
    public function aboutSchooldp5(){
        $httpClient = new HttpClientHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/categories');

        return view('Front-end.aboutSchool.dp5',['subMenu' => $subMenu, 'cateSub' => $cateSub]);
    }
    public function aboutSchooldp6(){
        $httpClient = new HttpClientHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/categories');

        return view('Front-end.aboutSchool.dp6',['subMenu' => $subMenu, 'cateSub' => $cateSub]);
    }
    public function aboutSchooldp7(){
        $httpClient = new HttpClientHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/categories');

        return view('Front-end.aboutSchool.dp7', ['subMenu' => $subMenu, 'cateSub' => $cateSub]);
    }
    public function aboutSchooldp8(){
        $httpClient = new HttpClientHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/categories');

        return view('Front-end.aboutSchool.dp8', ['subMenu' => $subMenu, 'cateSub' => $cateSub]);
    }


    //Back-end
    public function dash(){
        $httpClient = new HttpClientHelper();
        $data = $httpClient->getRequest('/news');
        $pub = $httpClient->getRequest('/publicize');
        $lib = $httpClient->getRequest('/library');
        $cate = $httpClient->getRequest('/categories');

        // $response = $httpClient->getRequest('/news', [
        //     'query' => [
        //        'limit' => 1
        //     ]
        // ]);
        // dd($response);
        $count = count($data);
        $countFilePub = count($pub);
        $countLib = count($lib);
        return view('Back-end.Pages.homepage', [
            'count' => $count,
            'countFilePub' => $countFilePub,
            'countLib' => $countLib,
            'cate' => $cate
        
    ]);
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
