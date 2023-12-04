<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClientHelper;
use App\Helpers\UploadHelper;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use KhmerDateTime\KhmerDateTime;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $httpClient = new HttpClientHelper();
        $data = $httpClient->getRequest('/news?page=0&sortOrder=desc'); 
        $_COOKIE = Cookie::get('user_Id');
        $user = $httpClient->getRequest('/users/'.$_COOKIE);
        $firstName = $user['data']['firstNameKh'];
        $lastName = $user['data']['lastNameKh'];
        $result = [];
        foreach ($data['data'] as $item) {
            $dateTime = KhmerDateTime::parse($item['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLT");
            $result[] = [
                'id' => $item['id'],
                'title' => $item['title'],
                'titleKh' => Str::limit($item['titleKh'], $limit = 150, '...') ,
                'createdAt' => $formattedCreatedAt,
                'editUrl' => route('admin.edit', $item['id']),
                'deleteUrl' => route('admin.destroy', $item['id']),
                'viewUrl' => route('admin.show', $item['id']),
            ];
        }
        $dataJson = json_encode($result);

        return view('Back-end.Pages.Post.news.post',[
            'dataJson' => $dataJson,
            'firstName' => $firstName,
            'lastName' => $lastName
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $httpClient = new HttpClientHelper();
        $data = $httpClient->getRequest('/categories');
        $_COOKIE = Cookie::get('user_Id');
        $user = $httpClient->getRequest('/users/'.$_COOKIE);
        $firstName = $user['data']['firstNameKh'];
        $lastName = $user['data']['lastNameKh'];
        return view('Back-end.Pages.Post.news.post.addPost',['data'=>$data, 'firstName' => $firstName,
        'lastName' => $lastName ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            //code...
            $validate = $request->validate([
                'titleKh' => 'required|max:255',
                'categoryId' => 'required',
                'contentKh' => 'required',
            ]);
    
            $file = $request->file('thumbnailImageId');
            $httpUpload = new UploadHelper();
            $upload =  $httpUpload->postRequest('/files/upload', $file);
            $thumbnailImageId = $upload['id'];
           
            $body = [ 
                'title' => request('title'),
                'titleKh' => request('titleKh'),
                'categoryId' => request('categoryId'),
                'thumbnailImageId' => $thumbnailImageId,
                'content' => request('content'),
                'contentKh' => request('contentKh'),
            ];
    
            $httpClient = new HttpClientHelper();
            $result = $httpClient->postRequest('/news', $body);
            
            if($upload){
                Alert::success('ទិន្នន័យបានបញ្ចូលជោគជ័យ');
            }
            return redirect()->route('admin.post');
        } catch (Exception $e) {
            // throw $e;
            Alert::error('ការបញ្ចូលទិន្នន័យមានភាពមិនប្រក្រដី');
            return redirect()->back();
        }
        //
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $request_Id = $id;
        $httpClient = new HttpClientHelper();
        $data = $httpClient->getRequest('/news/'.$request_Id);
        $image_Id = $data['data']['thumbnailImageId'];
        $image_Id = $data['data']['thumbnailImageId'];
        $_COOKIE = Cookie::get('user_Id');
        $user = $httpClient->getRequest('/users/'.$_COOKIE);
        $firstName = $user['data']['firstNameKh'];
        $lastName = $user['data']['lastNameKh'];
        $image = 'https://nasla.k5moi.com/v1/api/files/'. $image_Id;
      
        // dd($image);
        $dateTime = KhmerDateTime::parse($data['data']['createdAt']);
        $formattedCreatedAt = $dateTime->format("LLL");

        return view('Back-end.Pages.Post.news.post.preivews',[
            'data' => $data, 
            'formattedCreatedAt' => $formattedCreatedAt,
            'image' => $image,
            'firstName' => $firstName,
            'lastName' => $lastName
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $request_ID = $id;
        $httpClient = new HttpClientHelper();
        $data = $httpClient->getRequest('/news/'.$request_ID);
        $All_cate = $httpClient->getRequest('/categories');
        $_COOKIE = Cookie::get('user_Id');
        $user = $httpClient->getRequest('/users/'.$_COOKIE);
        $firstName = $user['data']['firstNameKh'];
        $lastName = $user['data']['lastNameKh'];

        $image_Id = $data['data']['thumbnailImageId'];
        $image = 'https://nasla.k5moi.com/v1/api/files/'. $image_Id;

        return view('Back-end.Pages.Post.news.post.editPost',[
            'data' => $data,
            'All_cate' => $All_cate,
            'image' => $image,
            'firstName' => $firstName,
            'lastName' => $lastName
        ]);
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request_ID = $id;
        $file = $request->file('thumbnailImageId');
        if($file != null ){
            $maxFile = 20*1024*1024;
            $fileSize = $file -> getSize();
            if($fileSize > $maxFile){
                Alert::error('File Size Exceeded', 'Error Message');
                return redirect()->back();
            }else{
                $httpUpload = new UploadHelper();
                $upload =  $httpUpload->postRequest('/files/upload/', $file);
                $thumbnailImageId = $upload['id'];
            }
        }else{
            $httpClient = new HttpClientHelper();
            $data = $httpClient->getRequest('/news/'.$request_ID);
            $thumbnailImageId = $data['data']['thumbnailImageId'];
           if ($thumbnailImageId == null){
                Alert::error('សូមបង្ហោះរូបភាព');
                return redirect()->back();
            } 
        }
        $body = [ 
            'title' => request('title'),
            'titleKh' => request('titleKh'),
            'categoryId' => request('categoryId'),
            'thumbnailImageId' => $thumbnailImageId,
            'content' => request('content'),
            'contentKh' => request('contentKh'),
        ];
        $httpClient = new HttpClientHelper();
        $result = $httpClient->putRequest('/news/'.$request_ID, $body);

        Alert::success('ទិន្នន័យបានផ្លាសប្តូរជោគជ័យ');
        return redirect()->route('admin.post');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $request_Id = $id;
        $httpClient = new HttpClientHelper();
        $result = $httpClient->deleteRequest('/news/'.$request_Id);

        Alert::success('ទិន្នន័យបានលុប');
        return redirect()->route('admin.post');
    }
}
