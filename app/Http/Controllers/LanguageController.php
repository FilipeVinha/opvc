<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /*public function chooser(){
        App::setLocale(Input::get('locale'));
        return Redirect::back();

    }*/
    public function switchLang($lang)
    {
        if (array_key_exists($lang, config('languages'))) {
            Session::put('applocale', $lang);
        }
        return redirect()->back();
    }
}
