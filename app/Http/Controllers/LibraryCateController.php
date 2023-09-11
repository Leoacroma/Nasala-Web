<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClientHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use KhmerDateTime\KhmerDateTime;

use RealRashid\SweetAlert\Facades\Alert;


class LibraryCateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $httpClient = new HttpClientHelper();
        $data = $httpClient->getRequest('/library/categories');
        $lib = $httpClient->getRequest('/library');
        $_COOKIE = Cookie::get('user_Id');
        $user = $httpClient->getRequest('/users/'.$_COOKIE);
        $firstName = $user['data']['firstNameKh'];
        $lastName = $user['data']['lastNameKh'];
        $result = [];
        foreach ($lib['data'] as $lib) {
            $dateTime = KhmerDateTime::parse($lib['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLL");
            $result[] = [
                'id' => $lib['id'],
                'title' => $lib['title'],
                'fileSize' => $lib['fileSize'],
                'category' => $lib['category'],
                'url' => $lib['url'],
                'name' => $lib['name'],
                'createdAt' => $formattedCreatedAt,
            ];
        }
        return view('Back-end.Pages.library.libraryCate',[
            'data' => $data,
            'result' => $result,
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
        $validate = $request->validate([
            'name' => 'required|Max:30',
            'nameKh' => 'required|Max:30',
        ]);
        $body = [
            'name' => request('name'),
            'nameKh' => request('nameKh'),
        ];
        
        $httpClient = new HttpClientHelper();
        $result = $httpClient->postRequest('/library/categories', $body);
        
        Alert::success('Add Successfully', 'Success Message');
        return redirect()->route('admin.library');
       
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
        $request_Id = $id;
        $httpClient = new HttpClientHelper();
        $data = $httpClient->getRequest('/library/categories');
        $datae = $httpClient->getRequest('/library/categories/'.$request_Id);
        $lib = $httpClient->getRequest('/library');
        $_COOKIE = Cookie::get('user_Id');
        $user = $httpClient->getRequest('/users/'.$_COOKIE);
        $firstName = $user['data']['firstNameKh'];
        $lastName = $user['data']['lastNameKh'];
        $result = [];
        foreach ($lib['data'] as $item) {
            $dateTime = KhmerDateTime::parse($item['createdAt']);
            $formattedCreatedAt = $dateTime->format("LLL");
            $result[] = [
                'id' => $item['id'],
                'title' => $item['title'],
                'fileSize' => $item['fileSize'],
                'category' => $item['category'],
                'url' => $item['url'],
                'name' => $item['name'],
                'createdAt' => $formattedCreatedAt,
            ];
        }

        return view('Back-end.Pages.library.editlibCate', [
            'result' => $result,
            'data' => $data,
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
        $validation = $request->validate([
            'name' => 'required|Max:30',
            'nameKh' => 'required|Max:30',
        ]);
        $body = [
            'name' => request('name'),
            'nameKh' => request('nameKh'),
        ];
        $httpClient = new HttpClientHelper();
        $data = $httpClient->getRequest('/library/categories');
        $datae = $httpClient->putRequest('/library/categories/'.$requestId, $body);

        
        Alert::success('Update Successfully', 'Success Message');
        return redirect()->route('admin.library');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $requestId = $id;
        $httpClient = new HttpClientHelper();
        $result = $httpClient->deleteRequest('/library/categories/'.$requestId);

        Alert::success('Delete Successfully', 'Success Message');
        return redirect()->route('admin.library');
    }
}
