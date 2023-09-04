<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClientHelper;
use Illuminate\Http\Request;
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
        $result = [];
        foreach ($data['data'] as $item) {
            $dateTime = KhmerDateTime::parse($item['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLLLT");
            $result[] = [
                'id' => $item['id'],
                'firstNameKh' => $item['firstNameKh'],
                'lastNameKh' => $item['lastNameKh'],
                'createdAt' => $formattedCreatedAt,
            ];
        }
        return view('Back-end.user-managment.userManagment', ['result' => $result, 'role' => $role]);
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
            'role' => 'required',
            'userName' => 'required',
            'password' => 'required',

        ]);
        $body = [
            'firstName' => request('firstName'),
            'firstNameKh' => request('firstNameKh'),
            'lastName' => request('lastName'),
            'lastNameKh' => request('lastNameKh'),
            'userName' => request('userName'),
            'role' => request('role'),
            'password' => request('password'),
        ];
        $httpClient = new HttpClientHelper();
        $data = $httpClient->postRequest('/users', $body);

        Alert::success('Add Successfully', 'Success Message');
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
