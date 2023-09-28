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
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Mockery\Expectation;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    //Front-end
    public function home(){
        try {
            $httpClient = new HttpUserHelper();
            $dataSort1 = $httpClient->getRequest('/news?page=0&size=1&sortBy=createdAt&sortOrder=desc');
            $dataSort3 = $httpClient->getRequest('/news?page=0&size=3&sortBy=createdAt&sortOrder=desc');
            $video = $httpClient->getRequest('/home/video?page=0&size=1&sortBy=createdAt&sortOrder=desc');
         
            $cateSub = $httpClient->getRequest('/training/posts');
            // session()->put('locale', 'kh');
            $SortLastedPub = $httpClient->getRequest('/publicize?page=0&sortOrder=desc&size=3&sortBy=createdAt');
            $result = [];
            foreach ($dataSort1['data'] as $item) {
                $dateTime = KhmerDateTime::parse($item['createdAt']);
                $formattedCreatedAt = $dateTime->format("LLLLT");
                $result[] = [
                    'id' => $item['id'],
                    'titleKh' => $item['titleKh'],
                    'title' => $item['title'],
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
                    'title' => $item['title'],
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
            };
         
            $subMenu = $httpClient->getRequest('/sub-menus');
            // dd($subMenu);
    
            return view('Front-end.homepage', [
                'subMenu' => $subMenu, 
                'result' => $result,
                'result1' => $result1,
                'cateSub' => $cateSub,
                'result2' => $result2,
                'video' => $video,
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('not-found');

        }
        
    }
    public function news(){
        try {
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
                    'title' => $item['title'],
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
        } catch (\Throwable $th) {
            return redirect()->route('not-found');
        }
        
    }
    
    public function searchNews(String $page){
        try {
            $request_page = $page;
            $requeste_Keyword = request()->input('searchNews');
            $httpUser = new HttpUserHelper();
            $subMenu = $httpUser->getRequest('/sub-menus');
            $cateSub = $httpUser->getRequest('/training/posts');
            $searchNews = $httpUser->getRequest('/news?page='.$request_page.'&size=9&sortOrder=desc&keyword='.$requeste_Keyword);
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
                    'title' => $item['title'],
                    'category' => $item['category'],
                    'thumbnailImageId' => $item['thumbnailImageId'],
                    'createdAt' => $formattedCreatedAt,
                ];
            }
            $totalpage= $searchNews['totalPage'];
            $currentPage = $searchNews['page'];
           
            return view('Front-end.newsSearch', [
                'result' => $result,
                'totalpage' => $totalpage,
                'currentPage' => $currentPage,
                'requeste_Keyword' => $requeste_Keyword,
                'subMenu' => $subMenu,
                'cateSub' => $cateSub,
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('not-found');
        }
        
    }

    public function pageNews(String $page){
        try {
            $request_Page = $page;
            $httpUser = new HttpUserHelper();
            $subMenu = $httpUser->getRequest('/sub-menus');
            $cateSub = $httpUser->getRequest('/training/posts');
            $pagination = $httpUser->getRequest('/news?page='.$request_Page.'&size=9&sortOrder=desc&sortBy=createdAt');
            $result = [];
            foreach ($pagination['data'] as $item) {
                $dateTime = KhmerDateTime::parse($item['createdAt']);
                $formattedCreatedAt = $dateTime->format("LLLLT");
                $result[] = [
                    'id' => $item['id'],
                    'titleKh' => $item['titleKh'],
                    'title' => $item['title'],
                    'category' => $item['category'],
                    'thumbnailImageId' => $item['thumbnailImageId'],
                    'createdAt' => $formattedCreatedAt,
                ];
            }
            $totalpage= $pagination['totalPage'];
            $currentPage = $pagination['page'];
         
            // dd($totalpage);
            return view('Front-end.newsPage', [
                'result' => $result,  
                'cateSub' => $cateSub,
                'pagination'=>$pagination,
                'totalpage' => $totalpage,
                'currentPage' => $currentPage
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('not-found');
        }
        
    }

    public function subenews(string $id){

        try {
            $request_Id = $id;
        $httpClient = new HttpUserHelper();
        $data = $httpClient->getRequest('/news/'.$request_Id);
        $subMenu = $httpClient->getRequest('/sub-menus');
        $image_Id = $data['data']['thumbnailImageId'];
        $cateSub = $httpClient->getRequest('/training/posts');
        $sortLastedAtNews = $httpClient->getRequest('/news?page=0&sortOrder=desc&size=5&sortBy=createdAt');
        $sortLastedAtNewswith6 = $httpClient->getRequest('/news?page=0&sortOrder=desc&size=6&sortBy=createdAt');

        // dd($sortLastedAtNews);
        // $image_Id = $data['data']['thumbnailImageId'];
        // $image = 'https://nasla.k5moi.com/v1/api/files/'. $image_Id;
      
        // dd($image);
        $dateTime = KhmerDateTime::parse($data['data']['createdAt']);
        $formattedCreatedAt = $dateTime->format("LLL");

        $result = [];
        foreach ($sortLastedAtNewswith6['data'] as $item) {
            $dateTime = KhmerDateTime::parse($item['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLLLT");
            $result[] = [
                'id' => $item['id'],
                'titleKh' => $item['titleKh'],
                'title' => $item['title'],
                'category' => $item['category'],
                'thumbnailImageId' => $item['thumbnailImageId'],
                'createdAt' => $formattedCreatedAt,
            ];
        }
        $result2 = [];
        foreach ($sortLastedAtNews['data'] as $item) {
            $dateTime = KhmerDateTime::parse($item['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLLLT");
            $result2[] = [
                'id' => $item['id'],
                'titleKh' => $item['titleKh'],
                'category' => $item['category'],
                'thumbnailImageId' => $item['thumbnailImageId'],
                'createdAt' => $formattedCreatedAt,
            ];
        }
      
        return view('Front-end.sub-news.subnews',[
            'data' => $data, 
            'formattedCreatedAt' => $formattedCreatedAt,
            'subMenu' => $subMenu,
            'cateSub' => $cateSub,
            'result2' => $result2,
             'result' => $result
            ]
        );
        } catch (\Throwable $th) {
            return redirect()->route('not-found');
        }
        
    }
    public function dp1(){
        try {
            $httpClient = new HttpUserHelper();
            $cateSub = $httpClient->getRequest('/training/posts');
            $subMenu = $httpClient->getRequest('/sub-menus');
            $data = $httpClient->getRequest('/training');
    
            return view('Front-end.work.dp1', ['data' => $data, 'subMenu' => $subMenu, 'cateSub' => $cateSub]);
        } catch (\Throwable $th) {
            return redirect()->route('not-found');
        }
       
    }
    public function dp2Content(string $id){
        try {
            $requestId = $id;
            $httpClient = new HttpUserHelper();
            $subMenu = $httpClient->getRequest('/sub-menus');
            $cateSub = $httpClient->getRequest('/training/posts'); 
            $Trian = $httpClient->getRequest('/training/posts');
            $trian = $httpClient->getRequest('/training/posts/'.$requestId);

            return view('Front-end.work.dp2',['subMenu' => $subMenu, 'cateSub'=>$cateSub, 'trian'=> $trian]);
        } catch (\Throwable $th) {
            return redirect()->route('not-found');
        }
    }
    public function dp3(){
        try {
            $httpClient = new HttpUserHelper();
            $subMenu = $httpClient->getRequest('/sub-menus');
            $cateSub = $httpClient->getRequest('/training/posts');
    
            return view('Front-end.work.dp3',['subMenu' => $subMenu, 'cateSub'=>$cateSub]);
        } catch (\Throwable $th) {
            return redirect()->route('not-found');
        }
        
    }
    public function liby(){

        try {
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
        } catch (\Throwable $th) {
            return redirect()->route('not-found');
        }
        
    }
    public function Nolib(String $id){
        try {
            $request_Id = $id;
        $httpUser = new HttpUserHelper();
        $Catelib = $httpUser->getRequest('/library?page=0&size=10&sortBy=createdAt&sortOrder=desc&categoryId='.$request_Id);
        $cate = $httpUser->getRequest('/library/categories');
        $cateSub = $httpUser->getRequest('/training/posts');

        
        return view('Front-end.nodaLib',['cate' => $cate, 'cateSub'=>$cateSub]);
        } catch (\Throwable $th) {
            return redirect()->route('not-found');
        }
        
    }

    public function pageLib(String $page){
        try {
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
        } catch (\Throwable $th) {
            return redirect()->route('not-found');

        }
       
    }

    public function searchLib(){
        try {
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
        } catch (\Throwable $th) {
            return redirect()->route('not-found');
        }
        
    }

    public function cateLib(String $id){
        try {
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
           return redirect()->route('front.nolib', $id);
        }
        return view('Front-end.Cateliby',['result' => $result, 'cate' => $cate,  'cateSub'=>$cateSub]);
        } catch (\Throwable $th) {
            return redirect()->route('not-found');
        }
       
    }

    public function scholar(){
        try {
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
        } catch (\Throwable $th) {
            return redirect()->route('not-found');
        }
        
    }
    public function pageScholar(String $page){
        try {
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
        } catch (\Throwable $th) {
            return redirect()->route('not-found');
        }
        
    }
    public function searchScholar(){
        try {
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
        } catch (\Throwable $th) {
            return redirect()->route('not-found');
        }
        
    }

    public function subScholar(string $id){
        try {
            $httpClient = new HttpUserHelper();
        $cateSub = $httpClient->getRequest('/training/posts');
        $requestId = $id;
        
        $response = Http::get('https://nasla.k5moi.com/v1/api/publicize/' . $id);

        if ($response->status() === 200) {
            $pdfFile = $response->body();
    
            // Display the PDF file in the browser
            $pdf = response($pdfFile, 200, [
                'Content-Type' => ['application/pdf', 'image/jpeg'],
                'Content-Disposition' => ['inline; filename="file.pdf"', 'inline; filename="image.jpg"'],
            ]);
        } else {
            abort(404);
        }
        return view('Front-end.subScholar',[], [
            'cateSub' => $cateSub, 
            'pdf' => $pdf,
        ]);
        } catch (\Throwable $th) {
            return redirect()->route('not-found');
        }
        
    }

    public function enrollMent(){
        try {
            $httpClient = new HttpUserHelper();
            $cateSub = $httpClient->getRequest('/training/posts');
            $reg = $httpClient->getRequest('/register');
            $result = [];
            foreach ($reg['data'] as $dd) {
                $courseStartDate = KhmerDateTime::parse($dd['courseStartDate']);
                $formatteddate1 = $courseStartDate->format("LL");
                
                $courseEndDate = KhmerDateTime::parse($dd['courseEndDate']);
                $formatteddate2 = $courseEndDate->format("LL");
                $result[] = [
                    'id' => $dd['id'],
                    'courseName' => $dd['courseName'],
                    'hyperlink' => $dd['hyperlink'],
                    'hypertext' => $dd['hypertext'],
                    'thumbnailImageId' => $dd['thumbnailImageId'],
                    'description' => $dd['description'],
                    'courseStartDate' => $formatteddate1,
                    'courseEndDate' => $formatteddate2,
            ];
    
        }
            return view('Front-end.enrollment', ['result' => $result ,'cateSub' => $cateSub,]);
        } catch (\Throwable $th) {
            return redirect()->route('not-found');
        }
    }

    public function aboutSchooldp1(){
        try {
            $httpClient = new HttpUserHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/posts');

        return view('Front-end.aboutSchool.dp1', ['subMenu' => $subMenu, 'cateSub' => $cateSub]);
        } catch (\Throwable $th) {
            return redirect()->route('not-found');
        }
        
    }
    public function aboutSchooldp2(){
        try {
            $httpClient = new HttpUserHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/posts');

        return view('Front-end.aboutSchool.dp2',['subMenu' => $subMenu, 'cateSub'=>$cateSub]);
        } catch (\Throwable $th) {
            return redirect()->route('not-found');
        }
       
    }
    public function aboutSchooldp3(){
        try {
            $httpClient = new HttpUserHelper();
            $subMenu = $httpClient->getRequest('/sub-menus');
            $cateSub = $httpClient->getRequest('/training/posts');
    
            return view('Front-end.aboutSchool.dp3',['subMenu' => $subMenu, 'cateSub' => $cateSub]);
        } catch (\Throwable $th) {
            return redirect()->route('not-found');
        }
        
    }
    public function aboutSchooldp4(){
        try {
            $httpClient = new HttpUserHelper();
            $subMenu = $httpClient->getRequest('/sub-menus');
            $cateSub = $httpClient->getRequest('/training/posts');
    
            return view('Front-end.aboutSchool.dp4',['subMenu' => $subMenu, 'cateSub' => $cateSub]);
        } catch (\Throwable $th) {
            return redirect()->route('not-found');
        }
        
    }
    public function aboutSchooldp5(){
        try {
            $httpClient = new HttpUserHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/posts');

        return view('Front-end.aboutSchool.dp5',['subMenu' => $subMenu, 'cateSub' => $cateSub]);
        } catch (\Throwable $th) {
            return redirect()->route('not-found');
        }
        
    }
    public function aboutSchooldp6(){
        try {
            $httpClient = new HttpUserHelper();
            $subMenu = $httpClient->getRequest('/sub-menus');
            $cateSub = $httpClient->getRequest('/training/posts');
    
            return view('Front-end.aboutSchool.dp6',['subMenu' => $subMenu, 'cateSub' => $cateSub]);
        } catch (\Throwable $th) {
            return redirect()->route('not-found');
        }
       
    }
    public function aboutSchooldp7(){
        try {
            $httpClient = new HttpUserHelper();
            $subMenu = $httpClient->getRequest('/sub-menus');
            $cateSub = $httpClient->getRequest('/training/posts');
    
            return view('Front-end.aboutSchool.dp7', ['subMenu' => $subMenu, 'cateSub' => $cateSub]);
        } catch (\Throwable $th) {
            return redirect()->route('not-found');

        }
        
    }
    public function aboutSchooldp8(){
        try {
            $httpClient = new HttpUserHelper();
            $subMenu = $httpClient->getRequest('/sub-menus');
            $cateSub = $httpClient->getRequest('/training/posts');
    
            return view('Front-end.aboutSchool.dp8', ['subMenu' => $subMenu, 'cateSub' => $cateSub]);
        } catch (\Throwable $th) {
            return redirect()->route('not-found');
        }
        
    }


    //Back-end
    public function dash($id = null){
        try {
            $httpClient = new HttpClientHelper();
            $data = $httpClient->getRequest('/news');
            $pub = $httpClient->getRequest('/publicize');
            $lib = $httpClient->getRequest('/library');
            $cate = $httpClient->getRequest('/categories');
            $trainFileCount = $httpClient->getRequest('/training');

            $train = $httpClient->getRequest('/training/posts');
            $trainLasted = $httpClient->getRequest('/training/posts?page=0&sortOrder=desc&size=5&sortBy=createdAt');
            $trainFile = $httpClient->getRequest('/training?page=0&sortOrder=desc&size=5&sortBy=createdAt');
            $register = $httpClient->getRequest('/register?page=0&sortOrder=desc&size=4&sortBy=createdAt');
            $user_Id_Store = Cookie::get('user_Id');
            $user = $httpClient->getRequest('/users/'.$user_Id_Store);
           
            // $userID = $user['data']['id'];
        
           
            
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
            $countTrianfile = count($trainFileCount['data']);
          
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
                'lastName' => $lastName,
                'countTrianfile' => $countTrianfile,
                'trainLasted' => $trainLasted,
                'trainFile' => $trainFile
        ]);
        } catch (Expectation $th) {
            return redirect()->route('not-found');
        }
           
        
    }
    public function newsSortCate(String $id){
        try {
            $request_Id = $id;
            $httpClient = new HttpClientHelper();
            $sortCateNews = $httpClient->getRequest('/news?page=0&size=3&sortBy=createdAt&sortOrder=desc&categoryId='.$request_Id);
            $data = $httpClient->getRequest('/news');
            $pub = $httpClient->getRequest('/publicize');
            $lib = $httpClient->getRequest('/library');
            $cate = $httpClient->getRequest('/categories');
            $trainFileCount = $httpClient->getRequest('/training');
            $train = $httpClient->getRequest('/training/posts');
            $trainLasted = $httpClient->getRequest('/training/posts?page=0&sortOrder=desc&size=5&sortBy=createdAt');
            $trainFile = $httpClient->getRequest('/training?page=0&sortOrder=desc&size=5&sortBy=createdAt');            $register = $httpClient->getRequest('/register?page=0&sortOrder=desc&size=4&sortBy=createdAt');
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
            $countTrianfile = count($trainFileCount['data']);
    
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
                'lastName' => $lastName,
                'trainLasted' => $trainLasted,
                'trainFile' => $trainFile,
                'countTrianfile' => $countTrianfile
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('not-found');
        }
        
    }

    public function pagemake(){
        return view('Back-end.Pages.makepage');
    }
    
    public function post(){
        return view('Back-end.Pages.Post.news.post');
    }

} 
