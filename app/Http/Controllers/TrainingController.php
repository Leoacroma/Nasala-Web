<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClientHelper;
use App\Helpers\UploadHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use KhmerDateTime\KhmerDateTime;
use RealRashid\SweetAlert\Facades\Alert;


class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $httpClient = new HttpClientHelper();
        $data = $httpClient->getRequest('/training/posts?page=0&sortOrder=desc&sortBy=createdAt');
        $sub = $httpClient->getRequest('/sub-menus');
        $file = $httpClient->getRequest('/training?page=0&sortOrder=desc&sortBy=createdAt');
        $_COOKIE = Cookie::get('user_Id');
        $user = $httpClient->getRequest('/users/'.$_COOKIE);
        $firstName = $user['data']['firstNameKh'];
        $lastName = $user['data']['lastNameKh'];

        $fileData = [];
        foreach($file['data'] as $dd){
            $dateTime = KhmerDateTime::parse($dd['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLLLT");
            $fileData[] = [
                'id' => $dd['id'],
                'title' => $dd['title'],
                'fileSize' => number_format($dd['fileSize'] / 1024) ,
                'subMenu'=> $dd['subMenu'],
                'name' => $dd['name'],
                'editUrl' => route('admin.train.edit', $dd['id']),
                'deleteUrl' => route('admin.train.delete', $dd['id']),
                'createdAt' => $formattedCreatedAt,
            ];
        }
        $dataJsonFile = json_encode($fileData);

        $result = [];
        foreach ($data['data'] as $item) {
            $dateTime = KhmerDateTime::parse($item['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLLLT");
            $result[] = [
                'id' => $item['id'],
                'title' => $item['title'],
                'titleKh' => $item['titleKh'],
                'createdAt' => $formattedCreatedAt,
                'editUrl' => route('admin.train.edit', $item['id']),
                'deleteUrl' => route('admin.train.delete', $item['id']),
            ];
        }
        $dataJson = json_encode($result);
        return view('Back-end.Pages.Training.traning',[
            'dataJson' => $dataJson,
            'fileData' => $fileData,
            'sub' => $sub,
            'dataJsonFile' => $dataJsonFile,
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
        $cate = $httpClient->getRequest('/training/categories');
        $_COOKIE = Cookie::get('user_Id');
        $user = $httpClient->getRequest('/users/'.$_COOKIE);
        $firstName = $user['data']['firstNameKh'];
        $lastName = $user['data']['lastNameKh'];
        return view('Back-end.Pages.Training.post.addtrain', ['cate' => $cate,  'firstName' => $firstName,
        'lastName' => $lastName]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'titleKh' => 'required|max:255',
            'categoryId' => 'required',
            'contentKh' => 'required'
        ]);
        
        $file = null;
        $body = [
            'title' => request('title'),
            'titleKh' => request('titleKh'),
            'categoryId' => request('categoryId'),
            'thumbnailImageId' => $file,
            'content' => request('content'),
            'contentKh' => request('contentKh'),
        ];
        // dd($body);
        $httpClient = new HttpClientHelper();
        $result = $httpClient->postRequest('/training/posts', $body);
      
        if($result){
            Alert::success('ទិន្នន័យបានបញ្ចូលជោគជ័យ');
        }
        return redirect()->route('admin.train.post');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $requestId = $id;
        $httpClient = new HttpClientHelper();
        $cate = $httpClient->getRequest('/training/categories');
        $data = $httpClient->getRequest('/training/posts/'.$requestId);
        $_COOKIE = Cookie::get('user_Id');
        $user = $httpClient->getRequest('/users/'.$_COOKIE);
        $firstName = $user['data']['firstNameKh'];
        $lastName = $user['data']['lastNameKh'];
        $image_Id = $data['data']['thumbnailImageId'];
        $image = 'http://188.166.211.230:9091/v1/api/files/'. $image_Id;

        return view('Back-end.Pages.Training.post.edittrain', [
            'cate' => $cate,
            'data' => $data,
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
        $requestId = $id;
        $validate = $request->validate([
            'titleKh' => 'required|max:255',
            'categoryId' => 'required',
            'contentKh' => 'required'
        ]);
        $file = 1;
        $body = [
            'title' => request('title'),
            'titleKh' => request('titleKh'),
            'categoryId' => request('categoryId'),
            'thumbnailImageId' => $file,
            'content' => request('content'),
            'contentKh' => request('contentKh'),
        ];
   
        $httpClient = new HttpClientHelper();
        $result = $httpClient->putRequest('/training/posts/'.$requestId, $body);
        
        Alert::success('ទិន្នន័យបានផ្លាសប្តូរជោគជ័យ');
        return redirect()->route('admin.train.post');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $requestId = $id;
        $httpClient = new HttpClientHelper();

        $result = $httpClient->deleteRequest('/training/posts/'.$requestId);

        Alert::success('ទិន្នន័យបានលុប');
        return redirect()->route('admin.train.post');
    }
}
