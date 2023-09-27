<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClientHelper;
use App\Helpers\UploadHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use KhmerDateTime\KhmerDateTime;
use RealRashid\SweetAlert\Facades\Alert;


class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $httpClient = new HttpClientHelper();
        $data = $httpClient->getRequest('/register');
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
                'courseName' => $dd['courseName'],
                'hypertext' => $dd['hypertext'],
                'hyperlink' => $dd['hyperlink'],
                'description' => $dd['description'],
                'courseStartDate' => $dd['courseStartDate'],
                'courseEndDate' => $dd['courseEndDate'],
                'thumbnailImageId' => $dd['thumbnailImageId'],
                'createdAt' => $formattedCreatedAt,
            ];
        }
        return view('Back-end.Pages.Register.register', [
            'result'=> $result,
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
        $validation = $request->validate([
            'courseName' => 'required|max:255',
            'hypertext' => 'required|max:255',
            'hyperlink' => 'required',
            'description' => 'required',
            'courseStartDate' => 'required',
            'courseEndDate' => 'required',
        ]);

        $file = $request->file('image');
        $httpUpload = new UploadHelper();
        $upload =  $httpUpload->postRequest('/files/upload', $file);
        $thumbnailImageId = $upload['id'];

        $body = [
            'courseName' => request('courseName'),
            'hypertext' => request('hypertext'),
            'hyperlink' => request('hyperlink'),
            'description' => request('description'),
            'courseStartDate' => request('courseStartDate'),
            'courseEndDate' => request('courseEndDate'),
            'thumbnailImageId' => $thumbnailImageId,
        ];
        
        $httpClient = new HttpClientHelper();
        $data = $httpClient->postRequest('/register', $body);
        if($data){
            Alert::success('Add Successfully', 'Success Message');
        }
        return redirect()->route('admin.reg.index');
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
        $file = $request->file('image');
        if($file != null ){
            $maxFile = 20*1024*1024;
            $fileSize = $file -> getSize();
            if($fileSize > $maxFile){
                Alert::error('File Size Exceeded', 'Error Message');
                return redirect()->back();
            }else{
                $httpUpload = new UploadHelper();
                $upload =  $httpUpload->postRequest('  /upload/', $file);
                $thumbnailImageId = $upload['id'];
            }
        }else{
            $httpClient = new HttpClientHelper();
            $data = $httpClient->getRequest('/register/'.$requestId);
            $thumbnailImageId = $data['data']['thumbnailImageId'];
           if ($thumbnailImageId == null){
                Alert::error('Please Upload and Image', 'Error Message');
                return redirect()->back();
            } 
        }
        $body = [
            'courseName' => request('courseName'),
            'hypertext' => request('hypertext'),
            'hyperlink' => request('hyperlink'),
            'description' => request('description'),
            'courseStartDate' => request('courseStartDate'),
            'courseEndDate' => request('courseEndDate'),
            'thumbnailImageId' => $thumbnailImageId,
        ];
        $httpClient = new HttpClientHelper();
        $data = $httpClient->putRequest('/register/'.$requestId, $body);
        if($data){
            Alert::success('Add Successfully', 'Success Message');
        }
        return redirect()->route('admin.reg.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $requestId = $id;
        $httpClient = new HttpClientHelper();
        $data = $httpClient->deleteRequest('/register/'.$requestId);
        
        Alert::success('Delete Successfully', 'Success Message');
        return redirect()->route('admin.reg.index');
    }
}
