<?php

    namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
    public function SwitchLang($lang)
    {
        if (array_key_exists($lang, Config::get('languages')))
        {
            Session::get('applocale', $lang);
        }
        return Redirect::back();
    }

    public function Languages()
    {
        return view('languages');
    }
}
