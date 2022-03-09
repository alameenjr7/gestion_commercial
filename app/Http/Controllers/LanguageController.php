<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
    public static function switchLang($lang)
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            session()->put('applocale', $lang);
        }
        return Redirect::back();
    }
}
