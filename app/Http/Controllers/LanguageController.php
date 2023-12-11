<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;


class LanguageController extends Controller
{
    //
    public function switchLanguage(Request $request)
    {
        try {
            //code...
            $locale = $request->input('locale');

            if (in_array($locale, ['en', 'kh'])) {
    
                app()->setLocale($locale);
                session()->put('locale', $locale);
                
            }
    
            return Redirect::back();
        } catch (\Exception $e) {
            return redirect()->route('not-found');
        }
       
    }
}
