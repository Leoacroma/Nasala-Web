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
            $httpUser = new HttpUserHelper();
            $params = [
                'username' => request('username'),
                'password' => request('password'),
            ];
            $result = $httpClient->postloginRequest('token', $params);
            $token_value = $result['access_token'];
           
            
            

            if (isset($result['error']) && $result['error'] === 'unauthorized') {
                Alert::error(' Please try again.', 'Username or password is incorrect.');
            } else {
               
                Cookie::queue('token', $token_value);
                $token = Cookie::get('token');
                $user = $httpClient->getRequest('/users/principal?'.$token);
                $userID = $user['data']['id'];
                Cookie::queue('user_Id', $userID);
                return redirect()->route('admin.dash');
            }
        } catch (\Exception $e) {
           alert($e->getMessage());
            // Alert::error('Error : '. 'Invalid User');
        }
        return redirect()->back();

    }

    public function logout(Request $request){            

        Cookie::forget('token');
        return redirect()->route('admin.login');
    }
}
