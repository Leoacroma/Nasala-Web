<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClientHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use KhmerDateTime\KhmerDateTime;
use RealRashid\SweetAlert\Facades\Alert;


class AboutSchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //


        $httpClient = new HttpClientHelper();
        $data = $httpClient->getRequest('/home/video');
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
                'videoLink' => $dd['videoLink'],
                'createdAt' => $formattedCreatedAt,
            ];
        }
        return view('Back-end.Pages.video.video', [
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
        $httpClient = new HttpClientHelper();
        $body = [
            'videoLink' =>request('videoLink')
        ];
        $data = $httpClient->postRequest('/home/video',$body);
        Alert::success('ទិន្នន័យបានបញ្ចូលជោគជ័យ');
        return redirect()->back();

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
        $request_Id = $id;
        $httpClient = new HttpClientHelper();
        $body = [
            'videoLink' =>request('videoLink')
        ];
        $data = $httpClient->putRequest('/home/video/'.$request_Id,$body);
        Alert::success('ទិន្នន័យបានផ្លាសប្តូរជោគជ័យ');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $request_Id = $id;
        $httpClient = new HttpClientHelper();
        $body = [
            'videoLink' =>request('videoLink')
        ];
        $data = $httpClient->deleteRequest('/home/video/'.$request_Id,$body);
        Alert::success('ទិន្នន័យបានលុប');
        return redirect()->back();
    }
}
