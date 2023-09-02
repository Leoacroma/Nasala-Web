<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Helpers\HttpClientHelper;
use RealRashid\SweetAlert\Facades\Alert;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $httpClient = new HttpClientHelper();
        $data = $httpClient->getRequest('/categories');
        return view('Back-end.Pages.Post.news.postcate', ['data' => $data]);
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
        $validate = $request->validate([
            'name' => 'required|Max:30',
            'nameKh' => 'required|Max:30',
        ]);
        $body = [
            'name' => request('name'),
            'nameKh' => request('nameKh'),
        ];
        
        $httpClient = new HttpClientHelper();
        $result = $httpClient->postRequest('/categories', $body);
        
        Alert::success('Add Successfully', 'Success Message');
        return redirect()->route('admin.postcate');
       
        
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
        $requestId = $id;
        $httpClient = new HttpClientHelper();
        $data = $httpClient->getRequest('/categories');
        $datae = $httpClient->getRequest('/categories/'.$requestId);
        // dd($data); 
        return view('Back-end.Pages.Post.news.categories.editcate', ['data' => $data], ['datae' => $datae]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $requestId = $id;
        $validation = $request->validate([
            'name' => 'required|Max:30',
            'nameKh' => 'required|Max:30',
        ]);
        $body = [
            'name' => request('name'),
            'nameKh' => request('nameKh'),
        ];
        $httpClient = new HttpClientHelper();
        $data = $httpClient->getRequest('/categories');
        $datae = $httpClient->putRequest('/categories/'.$requestId, $body);

        Alert::success('Update Successfully', 'Success Message');
        return view('Back-end.Pages.Post.news.postcate',['data' => $data , 'datae' => $datae]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $requestId = $id;
        $httpClient = new HttpClientHelper();
        $data = $httpClient->deleteRequest('/categories/'.$requestId);
        Alert::success('Delete Successfully', 'Success Message');
        return redirect()->route('admin.postcate');
        
    }
}
