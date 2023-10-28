<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClientHelper;
use App\Helpers\UploadHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class LibraryFileController extends Controller
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
        
        $validator =  Validator::make($request->all(),[
            'title' => 'required|max:255',
            'file' => 'required|mimes:pdf',
            'categoryId' => 'required'
        ]);
        if ($validator->fails([])) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $file = $request->file('file');
        $title = $request->input('title');
        $cateId = $request->input('categoryId');

        $maxFileSize = 20* 1024 * 1024;
        $fileSize = $file->getSize();
        //Check File Size
        if($fileSize > $maxFileSize){
            Alert::error('File Size Exceeded', 'Error Message');
            return redirect()->back();
        }

        $uploadFile = new UploadHelper();
        $upload = $uploadFile->postLibRequest('/library', $file, $title, $cateId);

        Alert::success('ទិន្នន័យបានបញ្ចូលជោគជ័យ');
        return redirect()->route('admin.library');
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
        //Check Validation
        $validator =  Validator::make($request->all(),[
            'title' => 'required|max:255',
            'file' => 'required|mimes:pdf',
            'categoryId' => 'required'
        ]);
        if ($validator->fails([])) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $requestId = $id;
        $file = $request->file('file');
        $title = $request->input('title');
        $cateId = $request->input('categoryId');

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
            $upload = $uploadFile->patchLibRequest('/library/'.$requestId, $file, $title, $cateId);
        }
        else{
            $uploadFile = new UploadHelper();
            $upload = $uploadFile->patchwithoutfileLibRequest('/library/'.$requestId, $title, $cateId);
        }       
        Alert::success('ទិន្នន័យបានផ្លាសប្តូរជោគជ័យ');
        return redirect()->route('admin.library');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $requestId = $id;
        $httpClient = new HttpClientHelper();
        $result = $httpClient->deleteRequest('/library/'.$requestId);

        Alert::success('ទិន្នន័យបានលុប');
        return redirect()->route('admin.library');
    }
}
