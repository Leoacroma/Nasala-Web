<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClientHelper;
use Illuminate\Http\Request;

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
        // dd($data);
        $data1 = $httpClient->getRequest('/sub-menus');
        return view('Back-end.Pages.Training.traning-cate', [
            'data' => $data,
            'data1' => $data1,
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
            'subMenu' => 'required'
        ]);
        $body = [
            'name' => request('name'),
            'nameKh' => request('nameKh'),
            'subMenu' => request('subMenu'),
        ];
        $httpClient = new HttpClientHelper();
        $resultt = $httpClient->postRequest('/training/categories', $body);


        Alert::success('Add Successfully', 'Success Message');
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
        foreach ($data['data'] as $sub){
            $getSubMenu = $sub['subMenu']['id'];
        }
        return view('Back-end.Pages.Training.editcate', [
            'data' => $data,
            'datae' => $datae,
            'data1' => $data1,
            'getSubMenu' => $getSubMenu
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
        Alert::success('Update Successfully', 'Success Message');
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
        
        Alert::success('Delete Successfully', 'Success Message');
        return redirect()->route('admin.train.cate');
    }
}
