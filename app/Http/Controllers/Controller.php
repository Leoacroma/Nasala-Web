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
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    //Front-end
    public function home(){
        // try {
            $httpClient = new HttpUserHelper();
            $dataSort1 = $httpClient->getRequest('/news?page=0&size=1&sortBy=createdAt&sortOrder=desc');
            $dataSort3 = $httpClient->getRequest('/news?page=0&size=3&sortBy=createdAt&sortOrder=desc');
            $video = $httpClient->getRequest('/home/video?page=0&size=1&sortBy=createdAt&sortOrder=asc');
            $Lastedvideo = $httpClient->getRequest('/home/video?page=0&size=3&sortBy=createdAt&sortOrder=desc');

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
                'Lastedvideo' => $Lastedvideo
            ]);
        // } catch (\Throwable $th) {
        //     return redirect()->route('not-found');

        // }
        
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
        $formattedCreatedAt = $dateTime->format("LL");

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
            $formattedCreatedAt = $dateTime->format("LL");
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
            $data = $httpClient->getRequest('/training?sortBy=updatedAt&sortOrder=desc');
    
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

    public function Nolib(String $id){
        // try {
        $request_Id = $id;
        $httpUser = new HttpUserHelper();
        $Catelib = $httpUser->getRequest('/library?page=0&size=10&sortBy=createdAt&sortOrder=desc&categoryId='.$request_Id);
        $cate = $httpUser->getRequest('/library/categories');
        $cateSub = $httpUser->getRequest('/training/posts');

        
        return view('Front-end.lib.nodaLib',['cate' => $cate, 'cateSub'=>$cateSub]);
        // } catch (\Throwable $th) {
        //     return redirect()->route('not-found');
        // }
        
    }
    public function cateLib($page, $id ){
        // try {
        $request_Page = $page;
        $request_Id = $id;
        $httpClient = new HttpUserHelper();
        $pagination = $httpClient->getRequest('/library?page='.$request_Page.'&size=10&sortOrder=desc&categoryId='.$request_Id.'');
        $cate = $httpClient->getRequest('/library/categories');
        $cateSub = $httpClient->getRequest('/training/posts');

        if($pagination['data'] != []){
            $result = [];
            foreach ($pagination['data'] as $lib) {
                $dateTime = KhmerDateTime::parse($lib['createdAt']);
                $formattedCreatedAt = $dateTime->format("LLL");
                $result[] = [
                    'id' => $lib['id'],
                    'title' => $lib['title'],
                    'fileSize' => $lib['fileSize'],
                    'category_id' => $lib['category']['id'],
                    'url' => $lib['url'],
                    'createdAt' => $formattedCreatedAt,
                ];
            }
        }else{
           return redirect()->route('front.nolib', $id);
        }
        $totalpage= $pagination['totalPage'];
        $currentPage = $pagination['page'];
        return view('Front-end.lib.Cateliby',[
            'result' => $result, 
            'cate' => $cate,  
            'cateSub'=>$cateSub,
            'totalpage' => $totalpage,
            'currentPage' => $currentPage,

        ]);
        // } catch (\Throwable $th) {
        //     return redirect()->route('not-found');
        // }
       
    }
    public function pageLib( $page){
        // try {
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
                    'category_id' => $lib['category']['id'],
                    'url' => $lib['url'],
                    'createdAt' => $formattedCreatedAt,
                ];
            }
             
            $result2 = [];
            foreach ($cate['data'] as $cate) {
                $result2[] = [
                    'id' => $cate['id'],
                    'nameKh' => $cate['nameKh'],
                    'name' => $cate['name'],
                ];
            }
            $totalpage= $pagination['totalPage'];
            $currentPage = $pagination['page'];
            return view('Front-end.lib.pageLiby', [
                'result' => $result, 
                'result2' => $result2, 
                'subMenu' => $subMenu, 
                'cateSub'=>$cateSub,
                'pagination'=>$pagination,
                'totalpage' => $totalpage,
                'currentPage' => $currentPage,
            ]);
        // } catch (\Throwable $th) {
        //     return redirect()->route('not-found');

        // }
       
    }

    public function searchLib(String $page){
        try {
            $request_Page = $page;
            $request_Keyword = request()->input('searchLibs');
            $httpUser = new HttpUserHelper;
            $subMenu = $httpUser->getRequest('/sub-menus');
            $cate = $httpUser->getRequest('/library/categories');
            $cateSub = $httpUser->getRequest('/training/posts');
            $search = $httpUser->getRequest('/library?page='.$request_Page.'&size=20&sortOrder=desc&keyword='.$request_Keyword);
    
            if($request_Keyword == null){
                return redirect()->route('page.lib.all', ['page' => 0]);
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
            $totalpage= $search['totalPage'];
            $currentPage = $search['page'];
            return view('Front-end.lib.Searchliby',[
                'result' => $result, 
                'subMenu' => $subMenu, 
                'cate' => $cate,
                'totalpage' => $totalpage,
                'currentPage' => $currentPage,
                'cateSub' => $cateSub,
                'request_Keyword' => $request_Keyword
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
            $totalpage= $pagination['totalPage'];
            $currentPage = $pagination['page'];
            return view('Front-end.scholarship.pageScholarship', [
                'result' => $result,
                 'subMenu' => $subMenu, 
                 'cateSub' => $cateSub,
                 'pagination' => $pagination,
                 'totalpage' => $totalpage,
                 'currentPage' => $currentPage,
                ]);
        } catch (\Throwable $th) {
            return redirect()->route('not-found');
        }
        
    }
    public function searchScholar(String $page){
        try {
            $requested_page = $page;
            $request_Keyword = request()->input('searchSch');
            
        $httpClient = new HttpUserHelper();
        $search = $httpClient->getRequest('/publicize?page='.$requested_page.'&size=6&sortOrder=desc&keyword='.$request_Keyword);
        $httpClient = new HttpUserHelper();
        $subMenu = $httpClient->getRequest('/sub-menus');
        $cateSub = $httpClient->getRequest('/training/posts');
        
        if($request_Keyword == null){
            return redirect()->route('front.page.scholar', ['page' => 0]);
        }

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
        $totalpage= $search['totalPage'];
        $currentPage = $search['page'];
        return view('Front-end.scholarship.searchScholarship', [
            'result' => $result,
            'subMenu' => $subMenu, 
            'cateSub' => $cateSub,
            'request_Keyword' => $request_Keyword,
            'totalpage' => $totalpage,
            'currentPage' => $currentPage,
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
        return view('Front-end.scholarship.subScholar',[], [
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

                $registerEndDate = KhmerDateTime::parse($dd['registerEndDate']);
                $formatteddate3 = $registerEndDate->format("LL");
                $result[] = [
                    'id' => $dd['id'],
                    'courseName' => $dd['courseName'],
                    'hyperlink' => $dd['hyperlink'],
                    'hypertext' => $dd['hypertext'],
                    'thumbnailImageId' => $dd['thumbnailImageId'],
                    'description' => $dd['description'],
                    'registerEndDate' => $formatteddate3,
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
            $result3 = [];
            foreach ($register['data'] as $dd) {
                $courseStartDate = KhmerDateTime::parse($dd['courseStartDate']);
                $formatteddate1 = $courseStartDate->format("LL");
                
                $courseEndDate = KhmerDateTime::parse($dd['courseEndDate']);
                $formatteddate2 = $courseEndDate->format("LL");

                $registerEndDate = KhmerDateTime::parse($dd['registerEndDate']);
                $formatteddate3 = $registerEndDate->format("LL");
                $result3[] = [
                    'id' => $dd['id'],
                    'courseName' => $dd['courseName'],
                    'hyperlink' => $dd['hyperlink'],
                    'hypertext' => $dd['hypertext'],
                    'thumbnailImageId' => $dd['thumbnailImageId'],
                    'description' => $dd['description'],
                    'registerEndDate' => $formatteddate3,
                    'courseStartDate' => $formatteddate1,
                    'courseEndDate' => $formatteddate2,
            ];
        }
        $result4 = [];
        foreach ($trainLasted['data']   as $item) {
            $dateTime = KhmerDateTime::parse($item['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLLLT");
            $result4[] = [
                'id' => $item['id'],
                'titleKh' => $item['titleKh'],
                'createdAt' => $formattedCreatedAt,
                
            ];
        }
        $result5 = [];
        foreach ($trainFile['data']   as $item) {
            $dateTime = KhmerDateTime::parse($item['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLLLT");
            $result5[] = [
                'id' => $item['id'],
                'title' => Str::limit($item['title'], $limit = 90, $end = '...'),
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
            $dataJson1 = json_encode($result4);
            $dataJson2 = json_encode($result5);
            return view('Back-end.Pages.homepage', [
                'count' => $count,
                'countFilePub' => $countFilePub,
                'countLib' => $countLib,
                'cate' => $cate,
                'result' => $result,
                'result1' => $result1,
                'result2' => $result2,
                'result3' => $result3,
                'dataJson1' => $dataJson1,
                'dataJson2' => $dataJson2,
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
            $trainFile = $httpClient->getRequest('/training?page=0&sortOrder=desc&size=5&sortBy=createdAt');          
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
            $result4 = [];
        foreach ($trainLasted['data']   as $item) {
            $dateTime = KhmerDateTime::parse($item['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLLLT");
            $result4[] = [
                'id' => $item['id'],
                'titleKh' => $item['titleKh'],
                'createdAt' => $formattedCreatedAt,
                
            ];
        }
        $result5 = [];
        foreach ($trainFile['data']   as $item) {
            $dateTime = KhmerDateTime::parse($item['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLLLT");
            $result5[] = [
                'id' => $item['id'],
                'title' => Str::limit($item['title'], $limit = 90, $end = '...'),
                'createdAt' => $formattedCreatedAt,
                
            ];
        }
            $firstName = $user['data']['firstNameKh'];
            $lastName = $user['data']['lastNameKh'];
            $dataJson1 = json_encode($result4);
            $dataJson2 = json_encode($result5);
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
                'dataJson1' => $dataJson1,
                'dataJson2' => $dataJson2,
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
