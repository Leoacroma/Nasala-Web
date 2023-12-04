<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClientHelper;
use App\Helpers\HttpUserHelper;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use RealRashid\SweetAlert\Facades\Alert;

class OuthController extends Controller
{
    //
    public function loginForm(Request $request){
       return view('Back-end.log.loginForm');
    }

    public function login(Request $request){
        try {
            $httpClient = new HttpClientHelper();
            
            $json = [
                'username' => request('username'),
                'password' => request('password'),
                "clientId" => "azUtbmFzbGEtY2xpZW50SWQ=",
                "clientSecret" => "YXpVdGJtRnpiR0V0WTJ4cFpXNTBVMlZqY21WMA=="
            ];
            
            $response = $httpClient->postloginRequest('/login', $json);
            // dd($response['qrCodeUrl']);
            
        
            if (isset($result['error']) && $result['error'] === 'unauthorized') {

                Alert::error(' Please try again.', 'Username or password is incorrect.');

            } else {

                $username =  request()->input('username');
                $password =  request()->input('password');
                $qrCode =  $response['qrCodeUrl'];

                Cookie::queue('username', $username);
                Cookie::queue('password', $password);
                Cookie::queue('qrCode', $qrCode);

                session('username', $username);
                session('password', $password);



                if($response['qrCodeUrl'] == null){

                    return redirect()->route('admin.2FA.otp');
                
                }
                else{

                    return redirect()->route('admin.2FA.qr')->with('qrCode', $qrCode);
                }

            }
        } catch (\Exception $e) {
        //    alert($e->getMessage());
            // dd($e -> getMessage());
            Alert::error('Error : '. 'Invalid User');
        }
        return redirect()->back();

    }

    public function logout(Request $request){            

        session()->forget('username');
        session()->forget('password');
        Cookie::forget('token');
        session()->forget('token');
        Cookie::forget('user_Id');
        Cookie::forget('user_Role');
        Cookie::forget('username');
        Cookie::forget('password');
        
        return redirect()->route('admin.login');
    }
}
