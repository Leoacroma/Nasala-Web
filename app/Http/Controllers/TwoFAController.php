<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClientHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use RealRashid\SweetAlert\Facades\Alert;


class TwoFAController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('Back-end.log.2FA');
    }

     /**
     * Display a listing of the resource.
     */
    public function otp()
    {
        //
        

        return view('Back-end.log.nullQr');
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
        try {
            //code...
            $httpClient = new HttpClientHelper();
            $username = session('username');
            $password = session('password');
    
            $_COOKIE_Username = Cookie::get('username');
            $_COOKIE_Password = Cookie::get('password');
            
        
    
            $json = [
                'otp' => request('otp1'). request('otp2'). request('otp3').request('otp4'). request('otp5'). request('otp6'),
                'username' => $_COOKIE_Username,
                'password' => $_COOKIE_Password,
            ];
            
            $data = $httpClient->postloginVerifyRequest('/login/verify', $json);

          
                $token_value = $data['access_token'];
                Cookie::queue('token', $token_value);
                session(['token' => $token_value]);
                $token = session('token');
                $response2 = $httpClient->getUserOnLogin('/users/principal?'.$token);
                $userID = $response2['data']['id'];
    
                $result =[];
                foreach($response2['data']['roles'] as $dd){
                    $result = [
                        'name' => $dd['name']
                    ];
                }
                Cookie::queue('user_Id', $userID);
                Cookie::queue('user_Role', $result['name']);
                return redirect()->route('admin.dash');      
            
        } catch (\Exception $e) {
            //throw $th;
            
            Alert::error(' Please try again.', 'Incorrect Code');
            return redirect()->back();
        }
       
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
