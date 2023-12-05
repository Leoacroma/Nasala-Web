<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClientHelper;
use App\Helpers\UploadHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use KhmerDateTime\KhmerDateTime;
use RealRashid\SweetAlert\Facades\Alert;


class PublicztionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $httpClient = new HttpClientHelper();
        $data = $httpClient->getRequest('/publicize?page=0&sortOrder=desc&sortBy=createdAt');
        $_COOKIE = Cookie::get('user_Id');
        $user = $httpClient->getRequest('/users/'.$_COOKIE);
        $firstName = $user['data']['firstNameKh'];
        $lastName = $user['data']['lastNameKh'];
        $result = [];
        foreach($data['data'] as $dd){
            $dateTime = KhmerDateTime::parse($dd['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLLLT");
            $result[] = [
                'id' => $dd['id'],
                'title' => $dd['title'],
                'name' => $dd['name'],
                'thumbnailImageId' => $dd['thumbnailImageId'],
                'createdAt' => $formattedCreatedAt,
            ];
        }

        return view('Back-end.Pages.Public.publicManagment', [
            'result' => $result,
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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'title' => 'required|max:255',
        ]);

        $file = $request->file('image');
   
        $uploadFile = new UploadHelper();
        $upload = $uploadFile->postRequest('/files/upload', $file);
        $thumbnailId = $upload['id'];

        
        $image = $thumbnailId;
        $filePdf = $request->file('file');
        $title = $request->input('title');

        $maxFileSize = 20* 1024 * 1024;
        $fileSize = $file->getSize();
        //Check File Size
        if($fileSize > $maxFileSize){
            Alert::error('File Size Exceeded', 'Error Message');
            return redirect()->back();
        }

        $upload = $uploadFile->postPubfilerequets('/publicize', $filePdf, $title, $image);

        if($upload){
            Alert::success('ទិន្នន័យបានបញ្ចូលជោគជ័យ');
        }
        return redirect()->route('admin.pub.index');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $requestId = $id;
        //Check Image upload
        $file = $request->file('image');
        if($file != null ){
            $maxFile = 20*1024*1024;
            $fileSize = $file -> getSize();
            if($fileSize > $maxFile){
                Alert::error('File Size Exceeded', 'Error Message');
                return redirect()->back();
            }else{
                $uploadFile = new UploadHelper();
                $upload = $uploadFile->postRequest('/files/upload', $file);
                $thumbnailId = $upload['id'];
            }
        }else{
            $thumbnailId = $request->input('thumbnailImageId');
           if ($thumbnailId == null){
                Alert::error('Please Upload and Image', 'Error Message');
                return redirect()->back();
            } 
        }

        //Check file upload
        $image = $thumbnailId;
        $filePdf = $request->file('file');
        $title = $request->input('title');

        if($filePdf != null){
            $maxFileSize = 20* 1024 * 1024;
            $fileSize = $filePdf->getSize();
             //Check File Size
            if($fileSize > $maxFileSize){
                Alert::error('File Size Exceeded', 'Error Message');
                return redirect()->back();
            }
            $upload = $uploadFile->patchPubfilerequest('/publicize/'.$requestId, $filePdf, $title,$image);
        }else{
            $uploadFile = new UploadHelper();
            $upload = $uploadFile->patchPubwithoutfilerequest('/publicize/'.$requestId, $title, $image);
        }
        //Check upload
        if($upload){
            Alert::success('ទិន្នន័យបានផ្លាសប្តូរជោគជ័យ');
        }
        return redirect()->route('admin.pub.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $requestId = $id;
        $httpClient = new HttpClientHelper();
        $result = $httpClient->deleteRequest('/publicize/'.$requestId);
    
        Alert::success('ទិន្នន័យបានលុប');
        return redirect()->route('admin.pub.index');

    }
}
