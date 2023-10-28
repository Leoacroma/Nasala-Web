<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Helpers\HttpClientHelper;
use Illuminate\Support\Facades\Cookie;
use Mockery\Expectation;
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
        $_COOKIE = Cookie::get('user_Id');
        $user = $httpClient->getRequest('/users/'.$_COOKIE);
        $firstName = $user['data']['firstNameKh'];
        $lastName = $user['data']['lastNameKh'];
        $result = [];
        foreach ($data['data'] as $item) {
            $result[] = [
                'id' => $item['id'],
                'name' => $item['name'],
                'nameKh' => $item['nameKh'],
                'editUrl' => route('admin.editcate', $item['id']),
                'deleteUrl' => route('admin.destroycate', $item['id']),
            ];
        }
        $dataJson = json_encode($result);
        return view('Back-end.Pages.Post.news.postcate', [
            'dataJson' => $dataJson,
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
        try {
            $validate = $request->validate([
                'nameKh' => 'required|Max:30',
            ]);

            $name = request('name');
            $nameKh = request('nameKh');
            if ($name === null) {
                $name = $nameKh;
            }

            $body = [
                'name' => $name,
                'nameKh' => $nameKh,
            ];
            // dd($body);
            $httpClient = new HttpClientHelper();
            $result = $httpClient->postRequest('/categories', $body);
            if($result){
                Alert::success('ទិន្នន័យបានបញ្ចូលជោគជ័យ');
                return redirect()->route('admin.postcate');    
            }
            return redirect()->back();
        } catch (Expectation $e) {
            return redirect()->route('not-found');
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

        $requestId = $id;
        $httpClient = new HttpClientHelper();
        $data = $httpClient->getRequest('/categories');
        $datae = $httpClient->getRequest('/categories/'.$requestId);
        $_COOKIE = Cookie::get('user_Id');
        $user = $httpClient->getRequest('/users/'.$_COOKIE);
        $firstName = $user['data']['firstNameKh'];
        $lastName = $user['data']['lastNameKh'];
        $result = [];
        foreach ($data['data'] as $item) {
            $result[] = [
                'id' => $item['id'],
                'name' => $item['name'],
                'nameKh' => $item['nameKh'],
                'editUrl' => route('admin.editcate', $item['id']),
                'deleteUrl' => route('admin.destroycate', $item['id']),
            ];
        }
        $dataJson = json_encode($result);

        return view('Back-end.Pages.Post.news.categories.editcate', [
            'dataJson' => $dataJson,
            'datae' => $datae,
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
        $body = [
            'name' => request('name'),
            'nameKh' => request('nameKh'),
        ];
        $httpClient = new HttpClientHelper();
        // $data = $httpClient->getRequest('/categories');
        $datae = $httpClient->putRequest('/categories/'.$requestId, $body);
        // $_COOKIE = Cookie::get('user_Id');
        // $user = $httpClient->getRequest('/users/'.$_COOKIE);
        // $firstName = $user['data']['firstNameKh'];
        // $lastName = $user['data']['lastNameKh'];

        if($datae){
            Alert::success('ទិន្នន័យបានផ្លាសប្តូរជោគជ័យ');
            return redirect()->route('admin.postcate');    
            // return view('Back-end.Pages.Post.news.postcate',['data' => $data , 'datae' => $datae,  'firstName' => $firstName,
            // 'lastName' => $lastName]);
        }
        return redirect()->back();
        
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
        Alert::success('ទិន្នន័យបានលុប');
        return redirect()->back();
        
    }
}
