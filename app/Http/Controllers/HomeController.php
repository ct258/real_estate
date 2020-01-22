<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function changeLanguage($language)
    {
        \Session::put('website_language', $language);

        return redirect()->back();
    }
}
