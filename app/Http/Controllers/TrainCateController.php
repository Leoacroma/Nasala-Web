<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClientHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use RealRashid\SweetAlert\Facades\Alert;

class TrainCateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $httpClient = new HttpClientHelper();
        $data = $httpClient->getRequest('/training/categories');
        $_COOKIE = Cookie::get('user_Id');
        $user = $httpClient->getRequest('/users/'.$_COOKIE);
        $firstName = $user['data']['firstNameKh'];
        $lastName = $user['data']['lastNameKh'];
        $data1 = $httpClient->getRequest('/sub-menus');
        $result = [];
        foreach ($data['data'] as $item) {
           
            $result[] = [
                'id' => $item['id'],
                'name' => $item['name'],
                'nameKh' => $item['nameKh'],
                'subMenu' => $item['subMenu']['nameKh'],
                'editUrl' => route('admin.trian.cate.edit', $item['id']),
                'deleteUrl' => route('admin.trian.cate.delete', $item['id']),
            ];
        }
        $dataJson = json_encode($result);
        return view('Back-end.Pages.Training.traning-cate', [
            'dataJson' => $dataJson,
            'data1' => $data1,
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
        $validate = request()->validate([
            'name' => 'required|Max:255',
            'nameKh' => 'required|Max:255',
            'subMenuId' => 'required'
        ]);
        $body = [
            'name' => request('name'),
            'nameKh' => request('nameKh'),
            'subMenuId' => request('subMenuId'),
        ];
        // dd($body);
        $httpClient = new HttpClientHelper();
        $resultt = $httpClient->postRequest('/training/categories', $body);

        Alert::success('ទិន្នន័យបានបញ្ចូលជោគជ័យ');
        return redirect()->route('admin.train.cate');
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
        $requestId = $id;
        $httpClient = new HttpClientHelper();
        $data = $httpClient->getRequest('/training/categories');
        $datae = $httpClient->getRequest('/training/categories/'.$requestId);
        $data1 = $httpClient->getRequest('/sub-menus');
        $_COOKIE = Cookie::get('user_Id');
        $user = $httpClient->getRequest('/users/'.$_COOKIE);
        $firstName = $user['data']['firstNameKh'];
        $lastName = $user['data']['lastNameKh'];
        foreach ($data['data'] as $sub){
            $getSubMenu = $sub['subMenu']['id'];
        }
        $result = [];
        foreach ($data['data'] as $item) {
           
            $result[] = [
                'id' => $item['id'],
                'name' => $item['name'],
                'nameKh' => $item['nameKh'],
                'subMenu' => $item['subMenu']['nameKh'],
                'editUrl' => route('admin.trian.cate.edit', $item['id']),
                'deleteUrl' => route('admin.trian.cate.delete', $item['id']),
            ];
        }
        $dataJson = json_encode($result);
        return view('Back-end.Pages.Training.editcate', [
            'dataJson' => $dataJson,
            'datae' => $datae,
            'data1' => $data1,
            'getSubMenu' => $getSubMenu,
            'firstName' => $firstName,
            'lastName' => $lastName
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $requestId = $id;
        $validation = $request->validate([
            'name' => 'required|max:255',
            'nameKh' => 'required|max:255',
            'subMenu' => 'required'
        ]);
        $body = [
          'name' => request('name'),
          'nameKh' => request('nameKh'),
          'subMenuId' => request('subMenu')
        ];

        $httpClient = new HttpClientHelper();
        $data = $httpClient->putRequest('/training/categories/'.$requestId, $body);
        Alert::success('ទិន្នន័យបានផ្លាសប្តូរជោគជ័យ');
        return redirect()->route('admin.train.cate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $requestId = $id;
        $httpClient = new HttpClientHelper();
        $data = $httpClient->deleteRequest('/training/categories/'.$requestId);
        
        Alert::success('ទិន្នន័យបានលុប');
        return redirect()->route('admin.train.cate');
    }
}
