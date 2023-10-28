<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClientHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use KhmerDateTime\KhmerDateTime;
use RealRashid\SweetAlert\Facades\Alert;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $httpClient = new HttpClientHelper();
        $data = $httpClient->getRequest('/users');
        $role = $httpClient->getRequest('/roles');

        $_COOKIE = Cookie::get('user_Id');
        $user = $httpClient->getRequest('/users/'.$_COOKIE);
        $firstName = $user['data']['firstNameKh'];
        $lastName = $user['data']['lastNameKh'];
        $result = [];
        foreach ($data['data'] as $item) {
            $dateTime = KhmerDateTime::parse($item['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLLLT");
            $result[] = [
                'id' => $item['id'],
                'firstNameKh' => $item['firstNameKh'],
                'lastNameKh' => $item['lastNameKh'],
                'firstName' => $item['firstName'],
                'lastName' => $item['lastName'],
                'userName' => $item['userName'],
                'roles' => $item['roles'],
                'createdAt' => $formattedCreatedAt,
            ];
        }
        // dd($data['data']);
        return view('Back-end.user-managment.userManagment', [
            'result' => $result,
            'role' => $role,
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
            'firstName' => 'required|max:255',
            'firstNameKh' => 'required|max:255',
            'lastName' => 'required|max:255',
            'lastNameKh' => 'required|max:255',
            'userName' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
        $body = [
            'firstName' => request('firstName'),
            'lastName' => request('lastName'),
            'firstNameKh' => request('firstNameKh'),
            'lastNameKh' =>  request('lastNameKh'),
            'username' => request('userName'),
            'password' => request('password'),
            'roles' => [
                [
                    'id' => request('role')
                ]
            ]
        ];
        $httpClient = new HttpClientHelper();
        $data = $httpClient->postRequest('/users', $body);
        Alert::success('ទិន្នន័យបានបញ្ចូលជោគជ័យ');
        return redirect()->route('admin.user');
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
            'firstName' => 'required|max:255',
            'firstNameKh' => 'required|max:255',
            'lastName' => 'required|max:255',
            'lastNameKh' => 'required|max:255',
            'userName' => 'required',
            'role' => 'required',
        ]);
        $body = [
            'firstName' => request('firstName'),
            'lastName' => request('lastName'),
            'firstNameKh' => request('firstNameKh'),
            'lastNameKh' =>  request('lastNameKh'),
            'username' => request('userName'),
            'password' => request('password'),
            'roles' => [
                [
                    'id' => request('role')
                ]
            ]
        ];
        $httpClient = new HttpClientHelper();
        $data = $httpClient->putRequest('/users/'.$requestId, $body);
        Alert::success('ទិន្នន័យបានផ្លាសប្តូរជោគជ័យ');
        return redirect()->route('admin.user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $requestId = $id;
        $httpClient = new HttpClientHelper();
        $result = $httpClient->deleteRequest('/users/'.$requestId);
    
        Alert::success('ទិន្នន័យបានលុប');
        return redirect()->route('admin.user');
    }
}
