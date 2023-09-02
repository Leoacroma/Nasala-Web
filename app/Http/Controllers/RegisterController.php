<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClientHelper;
use Illuminate\Http\Request;
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
        
        $result = [];
        foreach($data['data'] as $dd){
            $dateTime = KhmerDateTime::parse($dd['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLLLT");
            $result[] = [
                'id' => $dd['id'],
                'courseName' => $dd['courseName'],
                'hypertext' => $dd['hypertext'],
                'hyperlink' => $dd['hyperlink'],
                'createdAt' => $formattedCreatedAt,
            ];
        }
        return view('Back-end.Pages.Register.register', ['result'=> $result]);
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
            'hyperlink' => 'required'
        ]);
        $body = [
            'courseName' => request('courseName'),
            'hypertext' => request('hypertext'),
            'hyperlink' => request('hyperlink'),
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
        $validation = $request->validate([
            'courseName' => 'required|max:255',
            'hypertext' => 'required|max:255',
            'hyperlink' => 'required'
        ]);
        $body = [
            'courseName' => request('courseName'),
            'hypertext' => request('hypertext'),
            'hyperlink' => request('hyperlink'),
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
