<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Redirect;


class LanguageController extends Controller
{
    //
    public function switchLanguage(Request $request)
    {
        $locale = $request->input('locale');

        if (in_array($locale, ['en', 'kh'])) {

            app()->setLocale($locale);
            session()->put('locale', $locale);
        }

        return Redirect::back();
    }
}
