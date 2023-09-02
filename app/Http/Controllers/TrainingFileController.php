<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClientHelper;
use App\Helpers\UploadHelper;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class TrainingFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $file = $request->file('file');
        $title = $request->input('title');
        $cateId = $request->input('subMenuId');

        $maxFileSize = 20* 1024 * 1024;
        $fileSize = $file->getSize();
        //Check File Size
        if($fileSize > $maxFileSize){
            Alert::error('File Size Exceeded', 'Error Message');
            return redirect()->back();
        }
        $uploadFile = new UploadHelper();
        $upload = $uploadFile->postTfileRequest('/training', $file, $title, $cateId);

        if($upload){
            Alert::success('Add Successfully', 'Success Message');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         //Check Validation
        $validate = $request->validate([
            'title' => 'required|max:255',
            'file' => 'required',
            'subMenuId' => 'required'
        ]);
        $requestId = $id;
        $file = $request->file('file');
        $title = $request->input('title');
        $cateId = $request->input('subMenuId');

        //Check File Exist
        if($file !== null){
            $maxFileSize = 20* 1024 * 1024;
            $fileSize = $file->getSize();
            //Check File Size
            if($fileSize > $maxFileSize){
                Alert::error('File Size Exceeded', 'Error Message');
                return redirect()->back();
            }
            $uploadFile = new UploadHelper();
            $upload = $uploadFile->patchTfileRequest('/training/'.$requestId, $file, $title, $cateId);
        }
        else{
            $uploadFile = new UploadHelper();
            $upload = $uploadFile->patchwithoutTfileRequest('/training/'.$requestId, $title, $cateId);
        }       

        if($upload){
            Alert::success('Update Successfully', 'Success Message');
        }
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
        $result = $httpClient->deleteRequest('/training/'.$requestId);
    
        Alert::success('Delete Successfully', 'Success Message');
        return redirect()->route('admin.train.post');
    }
}
