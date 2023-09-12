<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClientHelper;
use App\Helpers\HttpUserHelper;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use KhmerDateTime\KhmerDateTime;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Expr\Cast\String_;
use RealRashid\SweetAlert\Facades\Alert;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    //Front-end
    public function home(){
        $httpClient = new HttpUserHelper();
        $dataSort1 = $httpClient->getRequest('/news?page=0&size=1&sortBy=createdAt&sortOrder=desc');
        $dataSort3 = $httpClient->getRequest('/news?page=0&size=3&sortBy=createdAt&sortOrder=desc');
        $cateSub = $httpClient->getRequest('/training/posts');
     
        $SortLastedPub = $httpClient->getRequest('/publicize?page=0&sortOrder=desc&size=3&sortBy=createdAt');
        $result = [];
        foreach ($dataSort1['data'] as $item) {
            $dateTime = KhmerDateTime::parse($item['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLLLT");
            $result[] = [
                'id' => $item['id'],
                'titleKh' => $item['titleKh'],
                'category' => $item['category'],
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
                'category' => $item['category'],
                'thumbnailImageId' => $item['thumbnailImageId'],
                'createdAt' => $formattedCreatedAt,
            ];
        }

        $result2 = [];
        foreach ($SortLastedPub['data'] as $item) {
            $dateTime = KhmerDateTime::parse($item['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLLLT");
            $result2[] = [
                'id' => $item['id'],
                'title' => $item['title'],
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
            'cateSub' => $cateSub,
            'result2' => $result2
        ]);
    }
    public function news(){
        $httpClient = new HttpUserHelper();
        $data = $httpClient->getRequest('/news');
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/posts');
        $pagination = $httpClient->getRequest('/news?page=0&size=9&sortOrder=desc&sortBy=createdAt');
        // dd($pagination);

        $result = [];
        foreach ($pagination['data'] as $item) {
            $dateTime = KhmerDateTime::parse($item['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLLLT");
            $result[] = [
                'id' => $item['id'],
                'titleKh' => $item['titleKh'],
                'category' => $item['category'],
                'thumbnailImageId' => $item['thumbnailImageId'],
                'createdAt' => $formattedCreatedAt,
            ];
        }

        return view('Front-end.news', [
            'result' => $result,
            'subMenu' => $subMenu,
            'cateSub' => $cateSub,
            'pagination'=>$pagination
        ]);
    }
    
    public function searchNews(){
        $requeste_Keyword = request()->input('searchNews');
        $httpUser = new HttpUserHelper();
        $subMenu = $httpUser->getRequest('/sub-menus');
        $cateSub = $httpUser->getRequest('/training/posts');
        $searchNews = $httpUser->getRequest('/news?page=0&size=20&sortOrder=desc&keyword='.$requeste_Keyword);
        if(empty($requeste_Keyword)){
            return redirect()->route('front.news');
        }
        $result = [];
        foreach ($searchNews['data'] as $item) {
            $dateTime = KhmerDateTime::parse($item['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLLLT");
            $result[] = [
                'id' => $item['id'],
                'titleKh' => $item['titleKh'],
                'category' => $item['category'],
                'thumbnailImageId' => $item['thumbnailImageId'],
                'createdAt' => $formattedCreatedAt,
            ];
        }
        return view('Front-end.newsSearch', [
            'result' => $result,
            'requeste_Keyword' => $requeste_Keyword,
            'subMenu' => $subMenu,
            'cateSub' => $cateSub,
        ]);
    }

    public function pageNews(String $page){
        $request_Page = $page;
        $httpUser = new HttpUserHelper();
        $subMenu = $httpUser->getRequest('/sub-menus');
        $cateSub = $httpUser->getRequest('/training/posts');
        $pagination = $httpUser->getRequest('/news?page='.$request_Page.'&size=9&sortOrder=desc&sortBy=createdAt');
        $result = [];
        foreach ($pagination    ['data'] as $item) {
            $dateTime = KhmerDateTime::parse($item['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLLLT");
            $result[] = [
                'id' => $item['id'],
                'titleKh' => $item['titleKh'],
                'category' => $item['category'],
                'thumbnailImageId' => $item['thumbnailImageId'],
                'createdAt' => $formattedCreatedAt,
            ];
        }
        return view('Front-end.newsPage', [
            'result' => $result,  
            'cateSub' => $cateSub,
            'pagination'=>$pagination
        ]);
    }

    public function subenews(string $id){

        $request_Id = $id;
        $httpClient = new HttpUserHelper();
        $data = $httpClient->getRequest('/news/'.$request_Id);
        $subMenu = $httpClient->getRequest('/sub-menus');
        $image_Id = $data['data']['thumbnailImageId'];
        $cateSub = $httpClient->getRequest('/training/posts');
        $sortLastedAtNews = $httpClient->getRequest('/news?page=0&sortOrder=desc&size=5&sortBy=createdAt');
        $image_Id = $data['data']['thumbnailImageId'];
        $image = 'http://188.166.211.230:9091/v1/api/files/'. $image_Id;
      
        // dd($image);
        $dateTime = KhmerDateTime::parse($data['data']['createdAt']);
        $formattedCreatedAt = $dateTime->format("LLL");

        return view('Front-end.sub-news.subnews',[
            'data' => $data, 
            'formattedCreatedAt' => $formattedCreatedAt,
            'image' => $image,
            'subMenu' => $subMenu,
            'cateSub' => $cateSub,
            'sortLastedAtNews' => $sortLastedAtNews
            ]
        );
    }
    public function dp1(){
        $httpClient = new HttpUserHelper();
        $cateSub = $httpClient->getRequest('/training/posts');
        $subMenu = $httpClient->getRequest('/sub-menus');
        $data = $httpClient->getRequest('/training');

        return view('Front-end.work.dp1', ['data' => $data, 'subMenu' => $subMenu, 'cateSub' => $cateSub]);
    }
    public function dp2Content(string $id){
        $requestId = $id;
        $httpClient = new HttpUserHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/posts'); 
        $Trian = $httpClient->getRequest('/training/posts');
        $trian = $httpClient->getRequest('/training/posts/'.$requestId);

        return view('Front-end.work.dp2',['subMenu' => $subMenu, 'cateSub'=>$cateSub, 'trian'=> $trian]);
    }
    public function dp3(){
        $httpClient = new HttpUserHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/posts');

        return view('Front-end.work.dp3',['subMenu' => $subMenu, 'cateSub'=>$cateSub]);
    }
    public function liby(){

        $httpClient = new HttpUserHelper();
        $lib = $httpClient->getRequest('/library');
        $httpClient = new HttpUserHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cate = $httpClient->getRequest('/library/categories');
        $cateSub = $httpClient->getRequest('/training/posts');
        $pagination = $httpClient->getRequest('/library?page=0&size=5&sortOrder=desc&sortBy=createdAt');
        

        $result = [];
        foreach ($pagination['data'] as $lib) {
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
        return view('Front-end.liby', [
            'result' => $result, 
            'cate' => $cate, 
            'subMenu' => $subMenu, 
            'cateSub'=>$cateSub,
            'pagination'=>$pagination
        ]);
    }
    public function pageLib(String $page){
        $request_Page = $page;
        $httpClient = new HttpUserHelper();
        $lib = $httpClient->getRequest('/library');
        $httpClient = new HttpUserHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cate = $httpClient->getRequest('/library/categories');
        $cateSub = $httpClient->getRequest('/training/posts');
        $pagination = $httpClient->getRequest('/library?page='.$request_Page.'&size=5&sortOrder=desc&sortBy=createdAt');

        $result = [];
        foreach ($pagination['data'] as $lib) {
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
        return view('Front-end.pageLiby', [
            'result' => $result, 
            'cate' => $cate, 
            'subMenu' => $subMenu, 
            'cateSub'=>$cateSub,
            'pagination'=>$pagination
        ]);
    }

    public function searchLib(){
        $request_Keyword = request()->input('searchLibs');
        $httpUser = new HttpUserHelper;
        $subMenu = $httpUser->getRequest('/sub-menus');
        $cate = $httpUser->getRequest('/library/categories');
        $cateSub = $httpUser->getRequest('/training/posts');
        $search = $httpUser->getRequest('/library?page=0&size=20&sortOrder=desc&keyword='.$request_Keyword);

        if($request_Keyword == null){
            return redirect()->route('front.liby');
        }

        $result = [];
        foreach ($search['data'] as $lib) {
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
        return view('Front-end.Searchliby',[
            'result' => $result, 
            'subMenu' => $subMenu, 
            'cate' => $cate,
            'cateSub' => $cateSub,
            'request_Keyword' => $request_Keyword
         ]);
    }

    public function cateLib(String $id){
        $request_Id = $id;
        $httpUser = new HttpUserHelper();
        $Catelib = $httpUser->getRequest('/library?page=0&size=10&sortBy=createdAt&sortOrder=desc&categoryId='.$request_Id);
        $cate = $httpUser->getRequest('/library/categories');
        $cateSub = $httpUser->getRequest('/training/posts');

        if($Catelib['data'] != []){
            $result = [];
            foreach ($Catelib['data'] as $lib) {
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
        }else{
            Alert::error('Error', '404 No data');
            return redirect()->back();
        }
        return view('Front-end.Cateliby',['result' => $result, 'cate' => $cate,  'cateSub'=>$cateSub]);
    }

    public function scholar(){
        $httpClient = new HttpUserHelper();
        $pagination = $httpClient->getRequest('/publicize?page=0&size=6&sortOrder=desc');
        $httpClient = new HttpUserHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/posts');
        $result = [];
        foreach ($pagination['data'] as $lib) {
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
        return view('Front-end.scholarship', [
            'result' => $result,
             'subMenu' => $subMenu, 
             'cateSub' => $cateSub,
             'pagination' => $pagination
            ]);
    }
    public function pageScholar(String $page){
        $request_Page = $page;
        $httpClient = new HttpUserHelper();
        $pagination = $httpClient->getRequest('/publicize?page='.$request_Page.'&size=6&sortOrder=desc');
        $httpClient = new HttpUserHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/posts');
        $result = [];
        foreach ($pagination['data'] as $lib) {
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
        return view('Front-end.pageScholarship', [
            'result' => $result,
             'subMenu' => $subMenu, 
             'cateSub' => $cateSub,
             'pagination' => $pagination
            ]);
    }
    public function searchScholar(){
        $request_Keyword = request()->input('searchSch');
        $httpClient = new HttpUserHelper();
        $search = $httpClient->getRequest('/publicize?page=0&size=6&sortOrder=desc&keyword='.$request_Keyword);
        $httpClient = new HttpUserHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/posts');
        $result = [];
        foreach ($search['data'] as $lib) {
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
        return view('Front-end.searchScholarship', [
            'result' => $result,
             'subMenu' => $subMenu, 
             'cateSub' => $cateSub,
            'request_Keyword' => $request_Keyword
        ]);
    }

    public function subScholar(string $id){
        $httpClient = new HttpUserHelper();
        $cateSub = $httpClient->getRequest('/training/posts');
        $requestId = $id;
        
        // $pub = $httpClient->getRequest('/publicize/'.$requestId);
        $pub = 'http://188.166.211.230:8080/v1/api/publicize/'.$requestId;
        // Generate a unique filename for the PDF
        $filename = 'generated_pdf_' . time() . '.pdf';

        // Save the PDF to the public path
        Storage::put($filename, $pub);

        // Access the URL of the saved PDF
        $pdfUrl = Storage::url($filename);

        return view('Front-end.subScholar',[], [
            'cateSub' => $cateSub, 
            'pdfUrl' => $pdfUrl,
        
        ]);
    }

    public function enrollMent(){
        $httpClient = new HttpUserHelper();
        $cateSub = $httpClient->getRequest('/training/posts');
        $reg = $httpClient->getRequest('/register');
        return view('Front-end.enrollment', ['reg' => $reg ,'cateSub' => $cateSub,]);
    }

    public function aboutSchooldp1(){
        $httpClient = new HttpUserHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/posts');

        return view('Front-end.aboutSchool.dp1', ['subMenu' => $subMenu, 'cateSub' => $cateSub]);
    }
    public function aboutSchooldp2(){
        $httpClient = new HttpUserHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/posts');

        return view('Front-end.aboutSchool.dp2',['subMenu' => $subMenu, 'cateSub'=>$cateSub]);
    }
    public function aboutSchooldp3(){
        $httpClient = new HttpUserHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/posts');

        return view('Front-end.aboutSchool.dp3',['subMenu' => $subMenu, 'cateSub' => $cateSub]);
    }
    public function aboutSchooldp4(){
        $httpClient = new HttpUserHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/posts');

        return view('Front-end.aboutSchool.dp4',['subMenu' => $subMenu, 'cateSub' => $cateSub]);
    }
    public function aboutSchooldp5(){
        $httpClient = new HttpUserHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/posts');

        return view('Front-end.aboutSchool.dp5',['subMenu' => $subMenu, 'cateSub' => $cateSub]);
    }
    public function aboutSchooldp6(){
        $httpClient = new HttpUserHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/posts');

        return view('Front-end.aboutSchool.dp6',['subMenu' => $subMenu, 'cateSub' => $cateSub]);
    }
    public function aboutSchooldp7(){
        $httpClient = new HttpUserHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/posts');

        return view('Front-end.aboutSchool.dp7', ['subMenu' => $subMenu, 'cateSub' => $cateSub]);
    }
    public function aboutSchooldp8(){
        $httpClient = new HttpUserHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/posts');

        return view('Front-end.aboutSchool.dp8', ['subMenu' => $subMenu, 'cateSub' => $cateSub]);
    }


    //Back-end
    public function dash($id = null){
        $httpClient = new HttpClientHelper();
        $data = $httpClient->getRequest('/news');
        $pub = $httpClient->getRequest('/publicize');
        $lib = $httpClient->getRequest('/library');
        $cate = $httpClient->getRequest('/categories');
        $train = $httpClient->getRequest('/training/posts?page=0&sortOrder=desc&size=10&sortBy=createdAt');
        $register = $httpClient->getRequest('/register?page=0&sortOrder=desc&size=4&sortBy=createdAt');
       
       
        
        $userName = $httpClient->getRequest('/users/');
        $lastAtSortNews = $httpClient->getRequest('/news?page=0&size=3&sortBy=createdAt&sortOrder=desc');
        
        $lastAtSortNewsByCate = $httpClient->getRequest('/news?page=0&size=3&sortBy=createdAt&sortOrder=desc&categoryId=35');
        $lastAtPub = $httpClient->getRequest('/publicize?page=0&size=3&sortBy=createdAt&sortOrder=desc');

       

        $result = [];
        foreach ($lastAtSortNews['data']   as $item) {
            $dateTime = KhmerDateTime::parse($item['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLLLT");
            $result[] = [
                'id' => $item['id'],
                'titleKh' => $item['titleKh'],
                'category' => $item['category'],
                'thumbnailImageId' => $item['thumbnailImageId'],
                'createdAt' => $formattedCreatedAt,
                
            ];
        }
        $result1 = [];
        foreach ($lastAtSortNewsByCate['data']  as $item) {
            $dateTime = KhmerDateTime::parse($item['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLLLT");
            $result1[] = [
                'id' => $item['id'],
                'titleKh' => $item['titleKh'],
                'category' => $item['category'],
                'thumbnailImageId' => $item['thumbnailImageId'],
                'createdAt' => $formattedCreatedAt,
                
            ];
        }
        $result2 = [];
        foreach ($lastAtPub['data']   as $item) {
            $dateTime = KhmerDateTime::parse($item['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLLLT");
            $result2[] = [
                'id' => $item['id'],
                'title' => $item['title'],
                'fileSize' => $item['fileSize'],
                'thumbnailImageId' => $item['thumbnailImageId'],
                'createdAt' => $formattedCreatedAt,
                
            ];
        }
        // dd(($data));
        $_COOKIE = Cookie::get('user_Id');
        $user = $httpClient->getRequest('/users/'.$_COOKIE);
        $firstName = $user['data']['firstNameKh'];
        $lastName = $user['data']['lastNameKh'];
        $count = count($data['data']);
        $countFilePub = count($pub['data']);
        $countTrian = count($train['data']);
        $countLib = count($lib['data']);
      
        // dd($firstName);
       
        return view('Back-end.Pages.homepage', [
            'count' => $count,
            'countFilePub' => $countFilePub,
            'countLib' => $countLib,
            'cate' => $cate,
            'result' => $result,
            'result1' => $result1,
            'result2' => $result2,
            'countTrian' => $countTrian,
            'train' => $train,
            'register' => $register,
            'firstName' => $firstName,
            'lastName' => $lastName
    ]);
    }
    public function newsSortCate(String $id){
        $request_Id = $id;
        $httpClient = new HttpClientHelper();
        $sortCateNews = $httpClient->getRequest('/news?page=0&size=3&sortBy=createdAt&sortOrder=desc&categoryId='.$request_Id);
        $data = $httpClient->getRequest('/news');
        $pub = $httpClient->getRequest('/publicize');
        $lib = $httpClient->getRequest('/library');
        $cate = $httpClient->getRequest('/categories');
        $train = $httpClient->getRequest('/training/posts?page=0&sortOrder=desc&size=10&sortBy=createdAt');
        $register = $httpClient->getRequest('/register?page=0&sortOrder=desc&size=4&sortBy=createdAt');
        $_COOKIE = Cookie::get('user_Id');
        $user = $httpClient->getRequest('/users/'.$_COOKIE);
       
        
        $userName = $httpClient->getRequest('/users/');
        $lastAtSortNews = $httpClient->getRequest('/news?page=0&size=3&sortBy=createdAt&sortOrder=desc');
        
        $lastAtSortNewsByCate = $httpClient->getRequest('/news?page=0&size=3&sortBy=createdAt&sortOrder=desc&categoryId=35');
        $lastAtPub = $httpClient->getRequest('/publicize?page=0&size=3&sortBy=createdAt&sortOrder=desc');

       

        $result = [];
        foreach ($lastAtSortNews['data']   as $item) {
            $dateTime = KhmerDateTime::parse($item['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLLLT");
            $result[] = [
                'id' => $item['id'],
                'titleKh' => $item['titleKh'],
                'category' => $item['category'],
                'thumbnailImageId' => $item['thumbnailImageId'],
                'createdAt' => $formattedCreatedAt,
                
            ];
        }
        $result1 = [];
        foreach ($lastAtSortNewsByCate['data']  as $item) {
            $dateTime = KhmerDateTime::parse($item['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLLLT");
            $result1[] = [
                'id' => $item['id'],
                'titleKh' => $item['titleKh'],
                'category' => $item['category'],
                'thumbnailImageId' => $item['thumbnailImageId'],
                'createdAt' => $formattedCreatedAt,
                
            ];
        }
        $result2 = [];
        foreach ($lastAtPub['data']   as $item) {
            $dateTime = KhmerDateTime::parse($item['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLLLT");
            $result2[] = [
                'id' => $item['id'],
                'title' => $item['title'],
                'fileSize' => $item['fileSize'],
                'thumbnailImageId' => $item['thumbnailImageId'],
                'createdAt' => $formattedCreatedAt,
                
            ];
        }
        // dd(($data));
        $count = count($data['data']);
        $countFilePub = count($pub['data']);
        $countTrian = count($train['data']);

        $countLib = count($lib['data']);
        $result = [];
        foreach ($sortCateNews['data']   as $item) {
            $dateTime = KhmerDateTime::parse($item['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLLLT");
            $result[] = [
                'id' => $item['id'],
                'titleKh' => $item['titleKh'],
                'category' => $item['category'],
                'thumbnailImageId' => $item['thumbnailImageId'],
                'createdAt' => $formattedCreatedAt,
                
            ];
        }
        $firstName = $user['data']['firstNameKh'];
        $lastName = $user['data']['lastNameKh'];
        return view('Back-end.Pages.SortNews',[
            'count' => $count,
            'countFilePub' => $countFilePub,
            'countLib' => $countLib,
            'cate' => $cate,
            'result' => $result,
            'result1' => $result1,
            'result2' => $result2,
            'countTrian' => $countTrian,
            'train' => $train,
            'register' => $register,
            'firstName' => $firstName,
            'lastName' => $lastName
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
