<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClientHelper;
use App\Helpers\HttpUserHelper;
use App\Models\User;
use GuzzleHttp\Client;
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
            // $httpUser = new HttpUserHelper();
            $params = [
                'username' => request('username'),
                'password' => request('password'),
            ];
            $response = $httpClient->postloginRequest('token', $params);
            $token_value = $response['access_token'];
            Cookie::queue('token', $token_value);
            session(['token' => $token_value]);
            

            if (isset($result['error']) && $result['error'] === 'unauthorized') {

                Alert::error(' Please try again.', 'Username or password is incorrect.');

            } else {

                $token = session('token');
                $response2 = $httpClient->getUserOnLogin('/users/principal?'.$token);
                $userID = $response2['data']['id'];
                Cookie::queue('user_Id', $userID);
                return redirect()->route('admin.dash');      
            }
        } catch (\Exception $e) {
        //    alert($e->getMessage());
            dd($e -> getMessage());
            // Alert::error('Error : '. 'Invalid User');
        }
        return redirect()->back();

    }

    public function logout(Request $request){            

        Cookie::forget('token');
        session()->forget('token');
        Cookie::forget('user_Id');
        return redirect()->route('admin.login');
    }
}
